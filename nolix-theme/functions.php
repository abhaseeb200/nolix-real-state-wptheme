<?php

function nolix_enqueue_assets() {
    // Google Fonts
    wp_enqueue_style('nolix-google-fonts', 'https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400&family=Poppins:wght@300;400;500;600&display=swap', array(), null);

    // Swiper CSS
    wp_enqueue_style('nolix-swiper-css', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css', array(), '11.0.0');

    // Tailwind CSS (CDN)
    // Note: For production, a local build process is recommended.
    wp_enqueue_script('nolix-tailwind', 'https://cdn.tailwindcss.com', array(), null, false);
    
    // Tailwind Config
    wp_add_inline_script('nolix-tailwind', "
        tailwind.config = {
            theme: {
			 	container: {
				  center: true,
				  padding: {
					DEFAULT: '1rem',
					sm: '1.5rem',
					lg: '2rem',
				  },
				  screens: {
					xl: '1280px',
				  },
				},
                extend: {
                    colors: {
                        theme: '#C19A5C',
                        dark: '#19191A',
                        counter: '#C8CCD9',
                        navy: '#092947',
                        lightgray: '#F3F4F6',
                    },
                    fontFamily: {
                        playfair: ['\"The Seasons\"', '\"Playfair Display\"', 'serif'],
                        poppins: ['\"Poppins\"', 'sans-serif'],
                        helvetica: ['\"Helvetica Neue\"', 'Helvetica', 'Arial', 'sans-serif'],
                    },
                    fontSize: {
                        'h1-custom': ['clamp(34px, 5vw, 54px)', { lineHeight: '1.2' }],
						'h2-custom': ['clamp(26px, 4vw, 48px)', { lineHeight: '1.25' }],
						'h3-custom': ['clamp(22px, 3vw, 32px)', { lineHeight: '1.3' }],
						'p-custom': ['clamp(14px, 2vw, 20px)', { lineHeight: '1.6' }],
                    }
                }
            }
        }
    ");

    // Swiper JS
    wp_enqueue_script('nolix-swiper-js', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', array(), '11.0.0', true);

    // Theme Main CSS
    wp_enqueue_style('nolix-style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'nolix_enqueue_assets');


// Register Custom Post Types
function nolix_register_post_types() {
    
    // Properties CPT
    $labels_property = array(
        'name'                  => _x( 'Properties', 'Post Type General Name', 'nolix' ),
        'singular_name'         => _x( 'Property', 'Post Type Singular Name', 'nolix' ),
        'menu_name'             => __( 'Properties', 'nolix' ),
        'name_admin_bar'        => __( 'Property', 'nolix' ),
        'archives'              => __( 'Property Archives', 'nolix' ),
        'attributes'            => __( 'Property Attributes', 'nolix' ),
        'parent_item_colon'     => __( 'Parent Property:', 'nolix' ),
        'all_items'             => __( 'All Properties', 'nolix' ),
        'add_new_item'          => __( 'Add New Property', 'nolix' ),
        'add_new'               => __( 'Add New', 'nolix' ),
        'new_item'              => __( 'New Property', 'nolix' ),
        'edit_item'             => __( 'Edit Property', 'nolix' ),
        'update_item'           => __( 'Update Property', 'nolix' ),
        'view_item'             => __( 'View Property', 'nolix' ),
        'view_items'            => __( 'View Properties', 'nolix' ),
        'search_items'          => __( 'Search Property', 'nolix' ),
        'not_found'             => __( 'Not found', 'nolix' ),
        'not_found_in_trash'    => __( 'Not found in Trash', 'nolix' ),
        'featured_image'        => __( 'Property Image', 'nolix' ),
        'set_featured_image'    => __( 'Set property image', 'nolix' ),
        'remove_featured_image' => __( 'Remove property image', 'nolix' ),
        'use_featured_image'    => __( 'Use as property image', 'nolix' ),
    );
    $args_property = array(
        'label'                 => __( 'Property', 'nolix' ),
        'description'           => __( 'Real Estate Properties', 'nolix' ),
        'labels'                => $labels_property,
        'supports'              => array( 'title', 'editor', 'thumbnail' ),
        'taxonomies'            => array( 'category', 'post_tag' ), // Can add custom taxs if needed
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'menu_icon'             => 'dashicons-building',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'post',
    );
    register_post_type( 'property', $args_property );

    // Testimonials CPT
    $labels_testimonial = array(
        'name'                  => _x( 'Testimonials', 'Post Type General Name', 'nolix' ),
        'singular_name'         => _x( 'Testimonial', 'Post Type Singular Name', 'nolix' ),
        'menu_name'             => __( 'Testimonials', 'nolix' ),
    );
    $args_testimonial = array(
        'label'                 => __( 'Testimonial', 'nolix' ),
        'labels'                => $labels_testimonial,
        'supports'              => array( 'title', 'editor', 'thumbnail' ), // Title = Name, Editor = Quote
        'public'                => true,
        'show_ui'               => true,
        'menu_icon'             => 'dashicons-format-quote',
        'exclude_from_search'   => true,
        'publicly_queryable'    => false, // Usually just for display on front
    );
    register_post_type( 'testimonial', $args_testimonial );

    // Team Members CPT
    $labels_team = array(
        'name'                  => _x( 'Team Members', 'Post Type General Name', 'nolix' ),
        'singular_name'         => _x( 'Team Member', 'Post Type Singular Name', 'nolix' ),
        'menu_name'             => __( 'Team Members', 'nolix' ),
        'add_new'               => __( 'Add New Member', 'nolix' ),
        'add_new_item'          => __( 'Add New Team Member', 'nolix' ),
        'edit_item'             => __( 'Edit Team Member', 'nolix' ),
        'new_item'              => __( 'New Team Member', 'nolix' ),
        'view_item'             => __( 'View Team Member', 'nolix' ),
        'search_items'          => __( 'Search Team Members', 'nolix' ),
        'not_found'             => __( 'No team members found', 'nolix' ),
        'not_found_in_trash'    => __( 'No team members found in Trash', 'nolix' ),
    );
    $args_team = array(
        'label'                 => __( 'Team Member', 'nolix' ),
        'labels'                => $labels_team,
        'supports'              => array( 'title', 'thumbnail' ), // Title = Name, Thumbnail = Photo
        'public'                => false, // Not publicly queryable as single pages
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_icon'             => 'dashicons-groups',
        'exclude_from_search'   => true,
        'publicly_queryable'    => false,
        'hierarchical'          => false,
        'show_in_nav_menus'     => false,
        'has_archive'           => false,
    );
    register_post_type( 'team_member', $args_team );

    // Using WordPress default 'post' post type for blog/insights instead of custom CPT
}
add_action( 'init', 'nolix_register_post_types', 0 );

// Add Meta Boxes for Team Members
function nolix_add_team_meta_boxes() {
    add_meta_box(
        'nolix_team_details',
        'Team Member Details',
        'nolix_team_details_callback',
        'team_member',
        'normal',
        'high'
    );
}
add_action( 'add_meta_boxes', 'nolix_add_team_meta_boxes' );

function nolix_team_details_callback( $post ) {
    wp_nonce_field( 'nolix_save_team_details', 'nolix_team_details_nonce' );

    $role = get_post_meta( $post->ID, '_nolix_role', true );

    echo '<p><label for="nolix_role">Job Role (e.g. "Managing Director"):</label><br>';
    echo '<input type="text" id="nolix_role" name="nolix_role" value="' . esc_attr( $role ) . '" class="widefat"></p>';
}

function nolix_save_team_details( $post_id ) {
    if ( ! isset( $_POST['nolix_team_details_nonce'] ) ) return;
    if ( ! wp_verify_nonce( $_POST['nolix_team_details_nonce'], 'nolix_save_team_details' ) ) return;
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
    if ( ! current_user_can( 'edit_post', $post_id ) ) return;

    if ( isset( $_POST['nolix_role'] ) ) {
        update_post_meta( $post_id, '_nolix_role', sanitize_text_field( $_POST['nolix_role'] ) );
    }
}
add_action( 'save_post', 'nolix_save_team_details' );


// Add Meta Boxes for Properties
function nolix_add_property_meta_boxes() {
    add_meta_box(
        'nolix_property_details',
        'Property Details',
        'nolix_property_details_callback',
        'property',
        'normal',
        'high'
    );
}
add_action( 'add_meta_boxes', 'nolix_add_property_meta_boxes' );

function nolix_property_details_callback( $post ) {
    wp_nonce_field( 'nolix_save_property_details', 'nolix_property_details_nonce' );

    $price = get_post_meta( $post->ID, '_nolix_price', true );
    $location = get_post_meta( $post->ID, '_nolix_location', true );
    $beds = get_post_meta( $post->ID, '_nolix_beds', true );
    $baths = get_post_meta( $post->ID, '_nolix_baths', true );
    $size = get_post_meta( $post->ID, '_nolix_size', true );
    $type = get_post_meta( $post->ID, '_nolix_type', true );

    echo '<div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">';
    
    echo '<p><label for="nolix_price">Price:</label><br>';
    echo '<input type="text" id="nolix_price" name="nolix_price" value="' . esc_attr( $price ) . '" class="widefat"></p>';

    echo '<p><label for="nolix_location">Location:</label><br>';
    echo '<input type="text" id="nolix_location" name="nolix_location" value="' . esc_attr( $location ) . '" class="widefat"></p>';

    echo '<p><label for="nolix_beds">Bedrooms:</label><br>';
    echo '<input type="number" id="nolix_beds" name="nolix_beds" value="' . esc_attr( $beds ) . '" class="widefat"></p>';

    echo '<p><label for="nolix_baths">Baths:</label><br>';
    echo '<input type="number" id="nolix_baths" name="nolix_baths" value="' . esc_attr( $baths ) . '" class="widefat"></p>';

    echo '<p><label for="nolix_size">Size (sq ft):</label><br>';
    echo '<input type="text" id="nolix_size" name="nolix_size" value="' . esc_attr( $size ) . '" class="widefat"></p>';

    echo '<p><label for="nolix_type">Property Type:</label><br>';
    echo '<select id="nolix_type" name="nolix_type" class="widefat">';
    $types = ['Apartment', 'Villa', 'Townhouse', 'Penthouse'];
    foreach($types as $t) {
        $selected = ($type == $t) ? 'selected' : '';
        echo "<option value='$t' $selected>$t</option>";
    }
    echo '</select></p>';
    
    echo '</div>';
}

function nolix_save_property_details( $post_id ) {
    if ( ! isset( $_POST['nolix_property_details_nonce'] ) ) return;
    if ( ! wp_verify_nonce( $_POST['nolix_property_details_nonce'], 'nolix_save_property_details' ) ) return;
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
    if ( ! current_user_can( 'edit_post', $post_id ) ) return;

    $fields = ['nolix_price', 'nolix_location', 'nolix_beds', 'nolix_baths', 'nolix_size', 'nolix_type'];
    
    foreach ( $fields as $field ) {
        if ( isset( $_POST[ $field ] ) ) {
            update_post_meta( $post_id, '_' . $field, sanitize_text_field( $_POST[ $field ] ) );
        }
    }
}
add_action( 'save_post', 'nolix_save_property_details' );

// Add Thumbnail Support
add_theme_support( 'post-thumbnails' );

// Add Meta Boxes for Testimonials
function nolix_add_testimonial_meta_boxes() {
    add_meta_box(
        'nolix_testimonial_details',
        'Testimonial Details',
        'nolix_testimonial_details_callback',
        'testimonial',
        'normal',
        'high'
    );
}
add_action( 'add_meta_boxes', 'nolix_add_testimonial_meta_boxes' );

function nolix_testimonial_details_callback( $post ) {
    wp_nonce_field( 'nolix_save_testimonial_details', 'nolix_testimonial_details_nonce' );

    $role = get_post_meta( $post->ID, '_nolix_role', true );
    $headline = get_post_meta( $post->ID, '_nolix_headline', true );
    $type = get_post_meta( $post->ID, '_nolix_type', true );

    echo '<p><label for="nolix_headline">Headline (Short Quote):</label><br>';
    echo '<input type="text" id="nolix_headline" name="nolix_headline" value="' . esc_attr( $headline ) . '" class="widefat"></p>';

    echo '<p><label for="nolix_role">Role Display Text (e.g. "Senior Design Director"):</label><br>';
    echo '<input type="text" id="nolix_role" name="nolix_role" value="' . esc_attr( $role ) . '" class="widefat"></p>';
    
    echo '<p><label for="nolix_type">Testimonial Type (for filtering):</label><br>';
    echo '<select id="nolix_type" name="nolix_type" class="widefat">';
    $options = [
        'buyers' => 'Buyer',
        'sellers' => 'Seller',
        'investors' => 'Investor'
    ];
    foreach($options as $val => $label) {
        $selected = ($type == $val) ? 'selected' : '';
        echo "<option value='$val' $selected>$label</option>";
    }
    echo '</select></p>';
}

function nolix_save_testimonial_details( $post_id ) {
    if ( ! isset( $_POST['nolix_testimonial_details_nonce'] ) ) return;
    if ( ! wp_verify_nonce( $_POST['nolix_testimonial_details_nonce'], 'nolix_save_testimonial_details' ) ) return;
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
    if ( ! current_user_can( 'edit_post', $post_id ) ) return;

    if ( isset( $_POST['nolix_role'] ) ) {
        update_post_meta( $post_id, '_nolix_role', sanitize_text_field( $_POST['nolix_role'] ) );
    }
    if ( isset( $_POST['nolix_headline'] ) ) {
        update_post_meta( $post_id, '_nolix_headline', sanitize_text_field( $_POST['nolix_headline'] ) );
    }
	 if ( isset( $_POST['nolix_type'] ) ) {
        update_post_meta( $post_id, '_nolix_type', sanitize_text_field( $_POST['nolix_type'] ) );
    }
}
add_action( 'save_post', 'nolix_save_testimonial_details' );


// Custom Columns for Testimonials
function nolix_set_testimonial_columns($columns) {
    $newColumns = array();
    $newColumns['cb'] = 'CheckBox';
    $newColumns['title'] = __('Title', 'nolix');
    $newColumns['type'] = __('Type', 'nolix'); // Add Type column
    $newColumns['date'] = __('Date', 'nolix');
    return $newColumns;
}
add_filter('manage_testimonial_posts_columns', 'nolix_set_testimonial_columns');

function nolix_show_testimonial_custom_columns($column, $post_id) {
    switch ($column) {
        case 'type':
            $type = get_post_meta($post_id, '_nolix_type', true);
            $options = [
                'buyers' => 'Buyer',
                'sellers' => 'Seller',
                'investors' => 'Investor'
            ];
            echo isset($options[$type]) ? $options[$type] : $type;
            break;
    }
}
add_action('manage_testimonial_posts_custom_column', 'nolix_show_testimonial_custom_columns', 10, 2);

// Make Type Column Sortable (Optional but good UX)
function nolix_sortable_testimonial_columns($columns) {
    $columns['type'] = 'type';
    return $columns;
}
add_filter('manage_edit_testimonial_sortable_columns', 'nolix_sortable_testimonial_columns');


/*
 * Duplicate Post Logic
 */
function nolix_duplicate_post_as_draft() {
    global $wpdb;
    if (! ( isset( $_GET['post']) || isset( $_POST['post'])  || ( isset($_REQUEST['action']) && 'nolix_duplicate_post_as_draft' == $_REQUEST['action'] ) ) ) {
        wp_die('No post to duplicate has been supplied!');
    }

    if ( !isset( $_GET['duplicate_nonce'] ) || !wp_verify_nonce( $_GET['duplicate_nonce'], basename( __FILE__ ) ) )
        return;

    $post_id = (isset($_GET['post']) ? absint( $_GET['post'] ) : absint( $_POST['post'] ) );
    $post = get_post( $post_id );

    $current_user = wp_get_current_user();
    $new_post_author = $current_user->ID;

    if (isset( $post ) && $post != null) {
        $args = array(
            'comment_status' => $post->comment_status,
            'ping_status'    => $post->ping_status,
            'post_author'    => $new_post_author,
            'post_content'   => $post->post_content,
            'post_excerpt'   => $post->post_excerpt,
            'post_name'      => $post->post_name,
            'post_parent'    => $post->post_parent,
            'post_password'  => $post->post_password,
            'post_status'    => 'draft',
            'post_title'     => $post->post_title . ' (Copy)',
            'post_type'      => $post->post_type,
            'to_ping'        => $post->to_ping,
            'menu_order'     => $post->menu_order
        );

        $new_post_id = wp_insert_post( $args );

        $taxonomies = get_object_taxonomies($post->post_type);
        foreach ($taxonomies as $taxonomy) {
            $post_terms = wp_get_object_terms($post_id, $taxonomy, array('fields' => 'slugs'));
            wp_set_object_terms($new_post_id, $post_terms, $taxonomy, false);
        }

        $post_meta_infos = $wpdb->get_results("SELECT meta_key, meta_value FROM $wpdb->postmeta WHERE post_id=$post_id");
        if (count($post_meta_infos)!=0) {
            $sql_query = "INSERT INTO $wpdb->postmeta (post_id, meta_key, meta_value) ";
            foreach ($post_meta_infos as $meta_info) {
                $meta_key = $meta_info->meta_key;
                if( $meta_key == '_wp_old_slug' ) continue;
                $meta_value = addslashes($meta_info->meta_value);
                $sql_query_sel[]= "SELECT $new_post_id, '$meta_key', '$meta_value'";
            }
            $sql_query.= implode(" UNION ALL ", $sql_query_sel);
            $wpdb->query($sql_query);
        }

        wp_redirect( admin_url( 'edit.php?post_type=' . $post->post_type ) );
        exit;
    } else {
        wp_die('Post creation failed, could not find original post: ' . $post_id);
    }
}
add_action( 'admin_action_nolix_duplicate_post_as_draft', 'nolix_duplicate_post_as_draft' );

// Add the duplicate link to action list for post_row_actions
function nolix_duplicate_post_link( $actions, $post ) {
    if (current_user_can('edit_posts')) {
        $actions['duplicate'] = '<a href="' . wp_nonce_url('admin.php?action=nolix_duplicate_post_as_draft&post=' . $post->ID, basename(__FILE__), 'duplicate_nonce') . '" title="Duplicate this item" rel="permalink">Duplicate</a>';
    }
    return $actions;
}

add_filter( 'post_row_actions', 'nolix_duplicate_post_link', 10, 2 );
add_filter( 'page_row_actions', 'nolix_duplicate_post_link', 10, 2 );

// =========================================================================
// AJAX Handler for Rent Property Filtering
// =========================================================================

function nolix_filter_rent_properties() {
    $page = isset($_POST['page']) ? intval($_POST['page']) : 1;
    $posts_per_page = 6;

    // Build base query args
    $base_args = array(
        'post_type' => 'property',
        'post_status' => 'publish'
    );

    $meta_query = array('relation' => 'AND');

    // Property types filter
    if (isset($_POST['property_types']) && !empty($_POST['property_types'])) {
        $property_types = json_decode(stripslashes($_POST['property_types']), true);
        if (is_array($property_types) && !empty($property_types)) {
            $meta_query[] = array(
                'key' => '_nolix_type',
                'value' => $property_types,
                'compare' => 'IN'
            );
        }
    }

    // Bedrooms filter
    if (isset($_POST['bedrooms']) && !empty($_POST['bedrooms'])) {
        $bedrooms = sanitize_text_field($_POST['bedrooms']);
        if ($bedrooms === '5+') {
            $meta_query[] = array(
                'key' => '_nolix_beds',
                'value' => 5,
                'compare' => '>=',
                'type' => 'NUMERIC'
            );
        } else {
            $meta_query[] = array(
                'key' => '_nolix_beds',
                'value' => intval($bedrooms),
                'compare' => '=',
                'type' => 'NUMERIC'
            );
        }
    }

    // Rent range filter
    $rent_min = isset($_POST['rent_min']) ? floatval(str_replace(',', '', $_POST['rent_min'])) : 0;
    $rent_max = isset($_POST['rent_max']) ? floatval(str_replace(',', '', $_POST['rent_max'])) : 0;

    // If we have rent filters, we need to filter by price string (stored as text)
    if ($rent_min > 0 || $rent_max > 0) {
        // First, get all properties matching other filters
        $filter_args = array_merge($base_args, array(
            'posts_per_page' => -1,
            'meta_query' => $meta_query
        ));

        $all_properties = new WP_Query($filter_args);
        $filtered_ids = array();
        
        while ($all_properties->have_posts()) {
            $all_properties->the_post();
            $price_str = get_post_meta(get_the_ID(), '_nolix_price', true);
            $price_value = nolix_extract_price_value($price_str);

            $match = true;
            if ($rent_min > 0 && $price_value < $rent_min) {
                $match = false;
            }
            if ($rent_max > 0 && $price_value > $rent_max) {
                $match = false;
            }

            if ($match) {
                $filtered_ids[] = get_the_ID();
            }
        }
        wp_reset_postdata();

        $total_count = count($filtered_ids);
        
        if (!empty($filtered_ids)) {
            // Paginate the filtered IDs
            $offset = ($page - 1) * $posts_per_page;
            $paginated_ids = array_slice($filtered_ids, $offset, $posts_per_page);
            
            $args = array_merge($base_args, array(
                'post__in' => $paginated_ids,
                'orderby' => 'post__in',
                'posts_per_page' => $posts_per_page
            ));
            $has_more = $total_count > ($offset + $posts_per_page);
        } else {
            $args = array_merge($base_args, array(
                'post__in' => array(0), // Return no results
                'posts_per_page' => $posts_per_page
            ));
            $has_more = false;
        }
    } else {
        // No rent filter, use normal query with meta_query
        $args = array_merge($base_args, array(
            'posts_per_page' => $posts_per_page,
            'paged' => $page
        ));
        
        if (!empty($meta_query)) {
            $args['meta_query'] = $meta_query;
        }
        
        // Get count first
        $count_args = array_merge($args, array('posts_per_page' => -1));
        $count_query = new WP_Query($count_args);
        $total_count = $count_query->found_posts;
        wp_reset_postdata();
        
        $query = new WP_Query($args);
        $has_more = $query->max_num_pages > $page;
        wp_reset_postdata();
    }

    // Execute final query
    $query = new WP_Query($args);
    
    ob_start();
    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            get_template_part('template-parts/content-property-card');
        }
    } else {
        echo '<p class="col-span-full text-center">No properties found.</p>';
    }
    $html = ob_get_clean();
    wp_reset_postdata();

    wp_send_json_success(array(
        'html' => $html,
        'count' => isset($total_count) ? $total_count : 0,
        'has_more' => isset($has_more) ? $has_more : false,
        'page' => $page
    ));
}
add_action('wp_ajax_filter_rent_properties', 'nolix_filter_rent_properties');
add_action('wp_ajax_nopriv_filter_rent_properties', 'nolix_filter_rent_properties');

// Helper function to extract numeric value from price string
function nolix_extract_price_value($price_string) {
    if (empty($price_string)) return 0;
    // Remove all non-numeric characters except commas and periods
    $cleaned = preg_replace('/[^\d,.]/', '', $price_string);
    // Remove commas and convert to number
    return floatval(str_replace(',', '', $cleaned));
}

// =========================================================================
// Include Form Files
// =========================================================================

// Include PixxiCRM Integration Handler (must be first to define constants)
require_once get_template_directory() . '/forms/pixxicrm-integration.php';

// Include Sell Property Form
require_once get_template_directory() . '/forms/sell-property-form.php';

// Include Rent Property Form
require_once get_template_directory() . '/forms/rent-property-form.php';

// Include Buy Property Form
require_once get_template_directory() . '/forms/buy-property-form.php';

// Include Lease Property Form
require_once get_template_directory() . '/forms/lease-property-form.php';

// Include Off-Plan Consultation Form
require_once get_template_directory() . '/forms/off-plan-consultation-form.php';

// Include Contact Form
require_once get_template_directory() . '/forms/contact-form.php';
