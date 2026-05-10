<?php
/**
 * PixxiCRM Properties API Sync
 */

// 1. Add Update Listing Button on Property List Page
add_action('restrict_manage_posts', 'nolix_property_sync_button');
function nolix_property_sync_button($post_type)
{
    if ('property' === $post_type) {
        // Enqueue some inline CSS to hide the standard Filter items
        echo '<style>
            /* ---- Hide WP defaults ---- */
            #posts-filter .actions select[name="m"],
            #post-query-submit { display: none !important; }

            /* ---- Sync Buttons ---- */
            .nolix-sync-btn {
                position: relative;
                display: inline-flex !important;
                align-items: center;
                gap: 6px;
                margin-top: 1px !important;
                margin-right: 6px !important;
                padding: 0 14px !important;
                height: 30px !important;
                border-radius: 4px !important;
                font-size: 13px !important;
                font-weight: 600 !important;
                transition: opacity .2s, transform .1s !important;
                cursor: pointer;
            }
            .nolix-sync-btn:active { transform: scale(.97); }
            .nolix-sync-btn:disabled,
            .nolix-sync-btn.syncing {
                opacity: .55 !important;
                pointer-events: none !important;
                cursor: not-allowed !important;
            }
            .nolix-sync-btn .btn-icon { font-style: normal; }

            /* ---- Modal Overlay ---- */
            #nolix-sync-overlay {
                display: none;
                position: fixed;
                inset: 0;
                z-index: 999999;
                background: rgba(0,0,0,.55);
                backdrop-filter: blur(3px);
                align-items: center;
                justify-content: center;
            }
            #nolix-sync-overlay.active { display: flex; }

            /* ---- Modal Card ---- */
            #nolix-sync-card {
                background: #fff;
                border-radius: 12px;
                box-shadow: 0 24px 60px rgba(0,0,0,.3);
                padding: 36px 40px;
                width: 480px;
                max-width: 92vw;
                text-align: center;
                animation: nlx-pop .25s cubic-bezier(.34,1.56,.64,1);
            }
            @keyframes nlx-pop {
                from { opacity:0; transform:scale(.88); }
                to   { opacity:1; transform:scale(1); }
            }

            /* ---- Spinner ---- */
            .nolix-spinner {
                width: 54px; height: 54px;
                border: 5px solid #e0e6f0;
                border-top-color: #2271b1;
                border-radius: 50%;
                margin: 0 auto 20px;
                animation: nlx-spin .8s linear infinite;
            }
            @keyframes nlx-spin {
                to { transform: rotate(360deg); }
            }

            /* ---- Modal Text ---- */
            #nolix-sync-title {
                font-size: 17px;
                font-weight: 700;
                color: #1d2327;
                margin: 0 0 6px;
            }
            #nolix-sync-status {
                font-size: 13px;
                color: #50575e;
                min-height: 20px;
                margin-bottom: 20px;
            }

            /* ---- Progress Bar ---- */
            .nolix-progress-wrap {
                background: #f0f2f5;
                border-radius: 99px;
                height: 8px;
                overflow: hidden;
                margin-bottom: 20px;
            }
            #nolix-progress-bar {
                height: 100%;
                width: 0%;
                background: linear-gradient(90deg, #2271b1, #4facde);
                border-radius: 99px;
                transition: width .4s ease;
            }

            /* ---- Live Stats ---- */
            .nolix-stats {
                display: flex;
                gap: 16px;
                justify-content: center;
                margin-bottom: 14px;
            }
            .nolix-stat-box {
                flex: 1;
                background: #f6f8fa;
                border: 1px solid #e2e6ea;
                border-radius: 8px;
                padding: 10px 12px;
            }
            .nolix-stat-box .stat-num {
                font-size: 22px;
                font-weight: 700;
                color: #2271b1;
                line-height: 1;
            }
            .nolix-stat-box .stat-label {
                font-size: 11px;
                color: #888;
                margin-top: 3px;
                text-transform: uppercase;
                letter-spacing: .5px;
            }
            .nolix-stat-box.updated .stat-num { color: #8b5cf6; }

            /* ---- State colours ---- */
            .nolix-state-warning #nolix-sync-status { color: #b45309; }
            .nolix-state-warning #nolix-progress-bar { background: #f59e0b; }
            .nolix-state-error   #nolix-sync-status { color: #b91c1c; }
            .nolix-state-error   #nolix-progress-bar { background: #ef4444; }
            .nolix-state-success .nolix-spinner { border-top-color: #16a34a; }
            .nolix-state-success #nolix-sync-status { color: #15803d; font-weight:600; }
            .nolix-state-success #nolix-progress-bar { background: linear-gradient(90deg,#16a34a,#4ade80); width:100% !important; }

            /* ---- Retry countdown badge ---- */
            #nolix-retry-badge {
                display:none;
                margin-top:10px;
                padding: 6px 14px;
                border-radius: 99px;
                background: #fef3c7;
                color: #92400e;
                font-size: 12px;
                font-weight: 600;
            }
            #nolix-retry-badge.visible { display:inline-block; }
        </style>';

        echo '<button type="button" class="button button-primary nolix-sync-btn" data-type="RENT"><span class="btn-icon">&#8635;</span> Update Rent Listing</button>';
        echo '<button type="button" class="button button-primary nolix-sync-btn" data-type="SELL"><span class="btn-icon">&#8635;</span> Update Sell Listing</button>';
        echo '<button type="button" class="button button-primary nolix-sync-btn" data-type="NEW"><span class="btn-icon">&#8635;</span> Update New Listing</button>';

        // Modal overlay
        echo '
        <div id="nolix-sync-overlay">
            <div id="nolix-sync-card">
                <div class="nolix-spinner"></div>
                <p id="nolix-sync-title">Syncing Properties</p>
                <p id="nolix-sync-status">Preparing&hellip;</p>
                <div class="nolix-progress-wrap"><div id="nolix-progress-bar"></div></div>
                <div class="nolix-stats">
                    <div class="nolix-stat-box new">
                        <div class="stat-num" id="stat-new">0</div>
                        <div class="stat-label">New Added</div>
                    </div>
                    <div class="nolix-stat-box">
                        <div class="stat-num" id="stat-pages">0</div>
                        <div class="stat-label">Pages Done</div>
                    </div>
                </div>
                <span id="nolix-retry-badge"></span>
            </div>
        </div>';

        // Add nonce
        wp_nonce_field('nolix_sync_properties_nonce', 'nolix_sync_nonce');
    }
}

// 2. Add JavaScript to handle the AJAX requests
add_action('admin_footer', 'nolix_property_sync_javascript');
function nolix_property_sync_javascript() {
    $screen = get_current_screen();
    if ( ! $screen || 'edit-property' !== $screen->id ) {
        return;
    }
    ?>
    <script type="text/javascript">
    jQuery(document).ready(function($) {

        var overlay   = $('#nolix-sync-overlay');
        var card      = $('#nolix-sync-card');
        var title     = $('#nolix-sync-title');
        var statusEl  = $('#nolix-sync-status');
        var bar       = $('#nolix-progress-bar');
        var statNew   = $('#stat-new');
        var statUpd   = $('#stat-updated');
        var statPages = $('#stat-pages');
        var retryBadge = $('#nolix-retry-badge');

        function openModal(listingType) {
            card.removeClass('nolix-state-error nolix-state-warning nolix-state-success');
            title.text('Syncing ' + listingType + ' Listings');
            statusEl.text('Preparing\u2026');
            bar.css('width', '5%');
            statNew.text('0'); statUpd.text('0'); statPages.text('0');
            retryBadge.removeClass('visible').text('');
            overlay.addClass('active');
        }

        function updateModal(page, totalNew, totalUpdated) {
            statusEl.text('Fetching page ' + page + '\u2026');
            statNew.text(totalNew);
            statUpd.text(totalUpdated);
            statPages.text(page - 1);
            // Animate bar — keep at max 90% until done
            var pct = Math.min(5 + (page - 1) * 8, 90);
            bar.css('width', pct + '%');
        }

        function successModal(totalNew, totalUpdated, pages) {
            card.addClass('nolix-state-success');
            statusEl.text('\u2714 All done! Reloading the page\u2026');
            statNew.text(totalNew); statUpd.text(totalUpdated); statPages.text(pages);
            retryBadge.removeClass('visible');
            bar.css('width', '100%');
        }

        // Unified error handler — auto-retries after 10s with live countdown on button
        function showError(msg, listingType, page, nonce, totalNew, totalUpdated) {
            card.addClass('nolix-state-error').removeClass('nolix-state-warning');
            statusEl.html('<strong>Error on page ' + page + ':</strong><br>' + msg);
            bar.css('width', '100%');

            var autoRetrySeconds = 10;
            var remaining = autoRetrySeconds;
            var countdownInterval = null;
            var autoRetryTimer = null;

            var retryBtn = $('<button class="button button-primary" style="margin:12px 6px 0; padding:0 16px; height:30px;">&#8635; Retry Page ' + page + ' (' + remaining + 's)</button>');
            var cancelBtn = $('<button class="button" style="margin:12px 6px 0; padding:0 14px; height:30px;">&#x2715; Cancel</button>');

            retryBadge
                .addClass('visible')
                .css({background: 'transparent', padding: 0})
                .empty()
                .append(retryBtn)
                .append(cancelBtn);

            // Live countdown on the button label
            countdownInterval = setInterval(function() {
                remaining--;
                if (remaining <= 0) {
                    clearInterval(countdownInterval);
                    retryBtn.text('&#8635; Retrying...');
                } else {
                    retryBtn.html('&#8635; Retry Page ' + page + ' (' + remaining + 's)');
                }
            }, 1000);

            // Auto-fire retry after 10s
            autoRetryTimer = setTimeout(function() {
                clearInterval(countdownInterval);
                retryBadge.empty().removeClass('visible');
                card.removeClass('nolix-state-error');
                syncPage(listingType, page, nonce, totalNew, totalUpdated);
            }, autoRetrySeconds * 1000);

            // Manual immediate retry
            retryBtn.on('click', function() {
                clearInterval(countdownInterval);
                clearTimeout(autoRetryTimer);
                retryBadge.empty().removeClass('visible');
                card.removeClass('nolix-state-error');
                syncPage(listingType, page, nonce, totalNew, totalUpdated);
            });

            // Cancel — stop countdown and close modal
            cancelBtn.on('click', function() {
                clearInterval(countdownInterval);
                clearTimeout(autoRetryTimer);
                overlay.removeClass('active');
                $('.nolix-sync-btn').removeClass('syncing');
            });
        }

        $('.nolix-sync-btn').on('click', function(e) {
            e.preventDefault();
            var listingType = $(this).data('type');
            var nonce       = $('#nolix_sync_nonce').val();
            $('.nolix-sync-btn').addClass('syncing');
            openModal(listingType);
            syncPage(listingType, 1, nonce, 0, 0);
        });

        function syncPage(listingType, page, nonce, totalNew, totalUpdated) {

            card.removeClass('nolix-state-warning nolix-state-error');
            retryBadge.removeClass('visible');
            updateModal(page, totalNew, totalUpdated);

            $.ajax({
                url: ajaxurl,
                type: 'POST',
                dataType: 'json',
                timeout: 130000,
                data: {
                    action: 'nolix_sync_properties',
                    listing_type: listingType,
                    page: page,
                    nonce: nonce
                },
                success: function(response) {
                    if (response.success) {
                        var data        = response.data;
                        var newTotalNew = totalNew    + data.synced_new;
                        var newTotalUpd = totalUpdated + data.synced_updated;

                        if (data.next_page) {
                            syncPage(listingType, data.next_page, nonce, newTotalNew, newTotalUpd);
                        } else {
                            successModal(newTotalNew, newTotalUpd, page);
                            setTimeout(function() { location.reload(); }, 2500);
                        }
                    } else {
                        // PHP returned an error (e.g. cURL timeout) — show retry buttons
                        showError(response.data, listingType, page, nonce, totalNew, totalUpdated);
                    }
                },
                error: function(xhr, status, error) {
                    // JS-level timeout — also show retry buttons
                    showError(error, listingType, page, nonce, totalNew, totalUpdated);
                }
            });
        }
    });
    </script>
    <?php
}

// 3. Handle the AJAX request in PHP
add_action('wp_ajax_nolix_sync_properties', 'nolix_ajax_sync_properties');
function nolix_ajax_sync_properties()
{
    // Basic auth check
    if (!current_user_can('manage_options') && !current_user_can('edit_posts')) {
        wp_send_json_error('Unauthorized');
    }
    
    check_ajax_referer('nolix_sync_properties_nonce', 'nonce');

    $listing_type = isset($_POST['listing_type']) ? sanitize_text_field($_POST['listing_type']) : '';
    $page = isset($_POST['page']) ? intval($_POST['page']) : 1;
    $size = 50;

    $api_url = 'https://dataapi.pixxicrm.ae/pixxiapi/v1/properties';
    $token = 'Dg-OW9Z2pp5QLc-zCWznx5W4shPTNptK';

    $body_args = array(
        'page' => $page,
        'size' => $size,
        'sortType' => 'DESC',
    );
    
    if (!empty($listing_type)) {
        $body_args['listingType'] = $listing_type;
    }
    
    $body = wp_json_encode($body_args);

    $args = array(
        'body' => $body,
        'headers' => array(
            'Content-Type' => 'application/json',
            'X-PIXXI-TOKEN' => $token,
        ),
        'timeout' => 120,
        'method' => 'POST',
    );

    $response = wp_remote_post($api_url, $args);

    if (is_wp_error($response)) {
        wp_send_json_error($response->get_error_message());
    }

    $response_code = wp_remote_retrieve_response_code($response);
    if (200 !== $response_code && 201 !== $response_code) {
        wp_send_json_error('API Error Code: ' . $response_code);
    }

    $body_data = wp_remote_retrieve_body($response);
    $data = json_decode($body_data, true);

    // Extract properties array from the response structure
    $properties = array();
    if (isset($data['data']['list']) && is_array($data['data']['list'])) {
        $properties = $data['data']['list'];
    }
    elseif (isset($data['data']) && is_array($data['data'])) {
        $properties = $data['data'];
    }
    elseif (isset($data['properties']) && is_array($data['properties'])) {
        $properties = $data['properties'];
    }
    elseif (is_array($data) && !empty($data) && isset($data[0]) && is_array($data[0])) {
        $properties = $data;
    }
    else {
        if (is_array($data)) {
            $properties = $data;
        }
    }

    if (empty($properties)) {
        // No more properties, we are done
        wp_send_json_success(array(
            'next_page' => false,
            'synced_new' => 0,
            'synced_updated' => 0
        ));
    }

    $count_new = 0;
    $count_updated = 0;

    foreach ($properties as $prop) {
        if (!is_array($prop))
            continue;

        // Find identifier
        $identifier = '';
        if (isset($prop['id'])) {
            $identifier = $prop['id'];
        }
        elseif (isset($prop['reference'])) {
            $identifier = $prop['reference'];
        }
        elseif (isset($prop['uuid'])) {
            $identifier = $prop['uuid'];
        }

        if (empty($identifier)) {
            continue;
        }

        // Generate Post Title
        $post_title = 'Property ' . $identifier;
        if (isset($prop['title'])) {
            $post_title = $prop['title'];
        }
        elseif (isset($prop['name'])) {
            $post_title = $prop['name'];
        }

        // Check if property exists based on the identifier
        $existing_posts = get_posts(array(
            'post_type' => 'property',
            'meta_query' => array(
                    array(
                    'key' => '_pixxi_api_id',
                    'value' => $identifier,
                    'compare' => '=',
                ),
            ),
            'post_status' => 'any',
            'posts_per_page' => 1,
        ));

        if (!empty($existing_posts)) {
            $post_id = $existing_posts[0]->ID;

            wp_update_post(array(
                'ID' => $post_id,
                'post_title' => $post_title,
                'post_status' => 'publish',
            ));

            $count_updated++;
        }
        else {
            $post_id = wp_insert_post(array(
                'post_type' => 'property',
                'post_title' => $post_title,
                'post_status' => 'publish',
            ));

            update_post_meta($post_id, '_pixxi_api_id', $identifier);
            $count_new++;
        }

        if (!is_wp_error($post_id)) {
            foreach ($prop as $key => $value) {
                if (is_array($value) || is_object($value)) {
                    update_post_meta($post_id, $key, wp_json_encode($value));
                }
                else {
                    update_post_meta($post_id, $key, $value);
                }
            }

            if (isset($prop['listingType'])) {
                update_post_meta($post_id, '_nolix_type', $prop['listingType']);
            }
        }
    }

    // Determine if we need to fetch the next page
    $has_next_page = count($properties) >= $size;

    wp_send_json_success(array(
        'next_page' => $has_next_page ? ($page + 1) : false,
        'synced_new' => $count_new,
        'synced_updated' => $count_updated
    ));
}
