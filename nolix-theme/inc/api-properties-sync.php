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
            #posts-filter .actions select[name="m"],
            #post-query-submit {
                display: none !important;
            }
        </style>';

        $sync_rent_url = add_query_arg(
            array(
            'action' => 'sync_pixxicrm_properties',
            'listing_type' => 'RENT',
            '_wpnonce' => wp_create_nonce('sync_pixxicrm_properties_nonce'),
        ),
            admin_url('admin-post.php')
        );

        $sync_sell_url = add_query_arg(
            array(
            'action' => 'sync_pixxicrm_properties',
            'listing_type' => 'SELL',
            '_wpnonce' => wp_create_nonce('sync_pixxicrm_properties_nonce'),
        ),
            admin_url('admin-post.php')
        );

        $sync_new_url = add_query_arg(
            array(
            'action' => 'sync_pixxicrm_properties',
            'listing_type' => 'NEW',
            '_wpnonce' => wp_create_nonce('sync_pixxicrm_properties_nonce'),
        ),
            admin_url('admin-post.php')
        );

        echo '<a href="' . esc_url($sync_rent_url) . '" class="button button-primary" style="margin-top: 1px; display: inline-block; margin-right: 5px;">Update Rent Listing</a>';
        echo '<a href="' . esc_url($sync_sell_url) . '" class="button button-primary" style="margin-top: 1px; display: inline-block; margin-right: 5px;">Update Sell Listing</a>';
    // echo '<a href="' . esc_url($sync_new_url) . '" class="button button-primary" style="margin-top: 1px; display: inline-block;">Update New Listing</a>';
    }
}

// 2. Handle the Fetch and Sync
add_action('admin_post_sync_pixxicrm_properties', 'nolix_handle_property_sync');
function nolix_handle_property_sync()
{
    // Basic auth check
    if (!current_user_can('manage_options') && !current_user_can('edit_posts')) {
        wp_die('Unauthorized');
    }
    check_admin_referer('sync_pixxicrm_properties_nonce');

    $api_url = 'https://dataapi.pixxicrm.ae/pixxiapi/v1/properties';
    $token = 'Dg-OW9Z2pp5QLc-zCWznx5W4shPTNptK';

    // Dynamic API query based on the button clicked
    $listing_type = isset($_GET['listing_type']) ? sanitize_text_field($_GET['listing_type']) : '';

    $body_args = array(
        'page' => 1,
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
        'timeout' => 60,
        'method' => 'POST',
    );

    $response = wp_remote_post($api_url, $args);

    $redirect_url = admin_url('edit.php?post_type=property');

    if (is_wp_error($response)) {
        $error_message = $response->get_error_message();
        wp_redirect(add_query_arg(array('sync_status' => 'error', 'sync_msg' => urlencode(escapeshellarg($error_message))), $redirect_url));
        exit;
    }

    $response_code = wp_remote_retrieve_response_code($response);
    if (200 !== $response_code && 201 !== $response_code) {
        wp_redirect(add_query_arg(array('sync_status' => 'error', 'sync_msg' => urlencode('API Error Code: ' . $response_code)), $redirect_url));
        exit;
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
        wp_redirect(add_query_arg(array('sync_status' => 'empty'), $redirect_url));
        exit;
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
            // Can't uniquely identify, skip to avoid duplicates
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

            // Re-saving to keep title fresh and flag changes
            wp_update_post(array(
                'ID' => $post_id,
                'post_title' => $post_title,
                'post_status' => 'publish', // Ensure it stays published when updating
            ));

            $count_updated++;
        }
        else {
            // Create a new post
            $post_id = wp_insert_post(array(
                'post_type' => 'property',
                'post_title' => $post_title,
                'post_status' => 'publish',
            ));

            // Store unique identifier to avoid duplicates in the future
            update_post_meta($post_id, '_pixxi_api_id', $identifier);
            $count_new++;
        }

        if (!is_wp_error($post_id)) {
            // Iterate and save every key from the API response object directly into database meta
            foreach ($prop as $key => $value) {
                if (is_array($value) || is_object($value)) {
                    // Encode complex arrays/objects before saving to meta
                    update_post_meta($post_id, $key, wp_json_encode($value));
                }
                else {
                    update_post_meta($post_id, $key, $value);
                }
            }

            // Try mapping some common properties to theme specific fields just in case it's needed for the frontend layout to behave completely properly
            // Themes typically have these fields as meta.
            // But we already saved all keys. Just in case they differ from '_nolix_type', '_nolix_price', etc.
            if (isset($prop['listingType'])) {
                update_post_meta($post_id, '_nolix_type', $prop['listingType']);
            }
        }
    }

    // Redirect to WP Admin Properties screen with status
    wp_redirect(add_query_arg(array(
        'sync_status' => 'success',
        'synced_new' => $count_new,
        'synced_updated' => $count_updated,
    ), $redirect_url));
    exit;
}

// 3. Admin Notice Feedback
add_action('admin_notices', 'nolix_property_sync_notice');
function nolix_property_sync_notice()
{
    $screen = get_current_screen();
    if ($screen && 'edit-property' === $screen->id && isset($_GET['sync_status'])) {
        if ('success' === $_GET['sync_status']) {
            $new = isset($_GET['synced_new']) ? intval($_GET['synced_new']) : 0;
            $updated = isset($_GET['synced_updated']) ? intval($_GET['synced_updated']) : 0;
            $class = 'notice notice-success is-dismissible';
            $message = sprintf('API Sync Complete: <strong>%d</strong> new properties created, <strong>%d</strong> properties updated.', $new, $updated);
            printf('<div class="%1$s"><p>%2$s</p></div>', esc_attr($class), wp_kses_post($message));
        }
        elseif ('empty' === $_GET['sync_status']) {
            $class = 'notice notice-warning is-dismissible';
            $message = 'API Sync triggered but no properties were retrieved or found.';
            printf('<div class="%1$s"><p>%2$s</p></div>', esc_attr($class), esc_html($message));
        }
        elseif ('error' === $_GET['sync_status']) {
            $class = 'notice notice-error is-dismissible';
            $message = 'API Sync Error: ' . (isset($_GET['sync_msg']) ? urldecode($_GET['sync_msg']) : 'Unknown error.');
            printf('<div class="%1$s"><p>%2$s</p></div>', esc_attr($class), esc_html($message));
        }
    }
}
