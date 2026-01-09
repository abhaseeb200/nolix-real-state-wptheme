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
// PixxiCRM Integration
// =========================================================================

// 1. Shortcode to render the form
function nolix_pixxicrm_form_shortcode() {
    ob_start();
    ?>
    <div id="pixxicrm-form-container" class="bg-white p-6 md:p-10 rounded-2xl shadow-xl border border-gray-100 max-w-5xl mx-auto my-12 relative overflow-hidden">
        <div class="absolute top-0 left-0 w-full h-2 bg-gradient-to-r from-theme to-[#a37e45]"></div>
        
        <div class="text-center mb-10">
            <span class="text-theme font-bold tracking-wider uppercase text-sm font-playfair mb-2 block">Get in Touch</span>
            <h3 class="font-playfair text-3xl md:text-4xl text-dark font-bold mb-4">Book a Private Consultation</h3>
            <p class="text-gray-500 max-w-2xl mx-auto font-poppins font-light">
                Connect with our experts. Please fill in the details below so we can prepare for our conversation.
            </p>
        </div>
        
        <form id="pixxicrm-form" class="space-y-6">
            <!-- Grid Layout -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-6">
                
                <!-- Personal Details -->
                <div class="col-span-1 md:col-span-2">
                    <h4 class="font-playfair text-xl text-dark border-b border-gray-100 pb-2 mb-4">Personal Details</h4>
                </div>

                <!-- Name -->
                <div>
                     <label class="block text-gray-700 text-sm font-medium mb-2 font-poppins">Full Name</label>
                     <input type="text" name="name" required class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-200 focus:bg-white focus:border-theme focus:ring-1 focus:ring-theme outline-none transition-all" placeholder="John Doe">
                </div>
                <!-- Email -->
                <div>
                     <label class="block text-gray-700 text-sm font-medium mb-2 font-poppins">Email Address</label>
                     <input type="email" name="email" required class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-200 focus:bg-white focus:border-theme focus:ring-1 focus:ring-theme outline-none transition-all" placeholder="name@example.com">
                </div>
                <!-- Phone -->
                <div>
                     <label class="block text-gray-700 text-sm font-medium mb-2 font-poppins">Phone Number</label>
                     <input type="tel" name="phone" required class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-200 focus:bg-white focus:border-theme focus:ring-1 focus:ring-theme outline-none transition-all" placeholder="+971 50 000 0000">
                </div>
                <!-- Nationality -->
                 <div>
                     <label class="block text-gray-700 text-sm font-medium mb-2 font-poppins">Nationality</label>
                     <input type="text" name="nationality" class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-200 focus:bg-white focus:border-theme focus:ring-1 focus:ring-theme outline-none transition-all" placeholder="Your Nationality">
                </div>
                <!-- Gender -->
                <div>
                     <label class="block text-gray-700 text-sm font-medium mb-2 font-poppins">Gender</label>
                     <select name="gender" class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-200 focus:bg-white focus:border-theme focus:ring-1 focus:ring-theme outline-none transition-all appearance-none">
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                     </select>
                </div>
                <!-- Buyer Type -->
                <div>
                     <label class="block text-gray-700 text-sm font-medium mb-2 font-poppins">I am a(n)</label>
                     <select name="buyerType" class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-200 focus:bg-white focus:border-theme focus:ring-1 focus:ring-theme outline-none transition-all appearance-none">
                        <option value="investor">Investor</option>
                        <option value="end_user">End User</option>
                     </select>
                </div>

                <!-- Property Preferences -->
                <div class="col-span-1 md:col-span-2 mt-4">
                    <h4 class="font-playfair text-xl text-dark border-b border-gray-100 pb-2 mb-4">Property Requirements</h4>
                </div>

                <!-- Budget -->
                <div>
                     <label class="block text-gray-700 text-sm font-medium mb-2 font-poppins">Approx. Budget (AED)</label>
                     <input type="number" name="budget" value="1000000" class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-200 focus:bg-white focus:border-theme focus:ring-1 focus:ring-theme outline-none transition-all" placeholder="1000000">
                </div>
                <!-- Preferred Size -->
                <div>
                     <label class="block text-gray-700 text-sm font-medium mb-2 font-poppins">Preferred Size (Sq. Ft)</label>
                     <input type="text" name="preferredSize" class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-200 focus:bg-white focus:border-theme focus:ring-1 focus:ring-theme outline-none transition-all" placeholder="e.g. 1200">
                </div>
                 <!-- Property Type -->
                <div>
                     <label class="block text-gray-700 text-sm font-medium mb-2 font-poppins">Property Type</label>
                     <select name="propertyType" class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-200 focus:bg-white focus:border-theme focus:ring-1 focus:ring-theme outline-none transition-all appearance-none">
                        <option value="Apartment">Apartment</option>
                        <option value="Villa">Villa</option>
                        <option value="Townhouse">Townhouse</option>
                        <option value="Penthouse">Penthouse</option>
                     </select>
                </div>
                <!-- Furnishing -->
                <div>
                     <label class="block text-gray-700 text-sm font-medium mb-2 font-poppins">Furnishing Status</label>
                     <select name="furnishing" class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-200 focus:bg-white focus:border-theme focus:ring-1 focus:ring-theme outline-none transition-all appearance-none">
                        <option value="furnished">Furnished</option>
                        <option value="unfurnished">Unfurnished</option>
                     </select>
                </div>
                <!-- Project Type -->
                <div>
                     <label class="block text-gray-700 text-sm font-medium mb-2 font-poppins">Project Status</label>
                     <select name="projectType" class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-200 focus:bg-white focus:border-theme focus:ring-1 focus:ring-theme outline-none transition-all appearance-none">
                        <option value="off_plan">Off-Plan</option>
                        <option value="ready">Ready</option>
                     </select>
                </div>
                <!-- Bedrooms -->
                <div>
                     <label class="block text-gray-700 text-sm font-medium mb-2 font-poppins">Bedrooms</label>
                     <select name="bedrooms" class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-200 focus:bg-white focus:border-theme focus:ring-1 focus:ring-theme outline-none transition-all appearance-none">
                        <option value="studio">Studio</option>
                        <option value="1">1 Bedroom</option>
                        <option value="2">2 Bedrooms</option>
                        <option value="3">3 Bedrooms</option>
                        <option value="4+">4+ Bedrooms</option>
                     </select>
                </div>
                 <!-- Payment Method -->
                <div>
                     <label class="block text-gray-700 text-sm font-medium mb-2 font-poppins">Preferred Payment</label>
                     <select name="paymentMethod" class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-200 focus:bg-white focus:border-theme focus:ring-1 focus:ring-theme outline-none transition-all appearance-none">
                        <option value="cash">Cash</option>
                        <option value="mortgage">Mortgage</option>
                        <option value="payment_plan">Payment Plan</option>
                     </select>
                </div>


            </div>
            
            <div class="pt-6 border-t border-gray-100 flex flex-col items-center">
                <button type="submit" class="w-full md:w-1/2 px-8 py-4 bg-theme text-white font-bold rounded-lg shadow-lg hover:bg-dark hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-300">
                    Submit Request
                </button>
                <div id="pixxicrm-message" class="hidden mt-4 font-medium p-4 rounded-lg w-full text-center"></div>
            </div>
        </form>
    </div>
    
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        var form = document.getElementById('pixxicrm-form');
        if (!form) return;

        form.addEventListener('submit', function(e) {
            e.preventDefault(); // STOP page reload

            var btn = form.querySelector('button[type="submit"]');
            var msg = document.getElementById('pixxicrm-message');
            
            // UI Loading State
            if(btn) {
                var originalText = btn.innerText;
                btn.disabled = true;
                btn.innerHTML = '<span class="inline-block animate-spin mr-2 border-2 border-white border-t-transparent rounded-full w-4 h-4"></span> Sending...';
            }
            
            if(msg) {
                msg.className = 'hidden mt-4 font-medium p-4 rounded-lg w-full text-center'; 
            }

            var formData = new FormData(form);
            formData.append('action', 'pixxicrm_submit');
            formData.append('security', '<?php echo wp_create_nonce("pixxicrm_submit_nonce"); ?>');

            // Convert FormData to URLSearchParams for x-www-form-urlencoded (standard WP AJAX preference, though multipart works too)
            // But let's stick to FormData which is simpler for modern browsers and works with WP.
            
            fetch('<?php echo admin_url('admin-ajax.php'); ?>', {
                method: 'POST',
                body: formData
            })
            .then(function(response) {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(function(data) {
                if(msg) {
                    msg.classList.remove('hidden');
                    if(data.success) {
                        msg.innerText = 'Thank you! Your request has been sent successfully. We will contact you shortly.';
                        msg.classList.add('bg-green-100', 'text-green-700');
                        form.reset();
                    } else {
                        msg.innerText = 'Error: ' + (data.data || 'Something went wrong. Please try again.');
                        msg.classList.add('bg-red-100', 'text-red-700');
                    }
                }
            })
            .catch(function(error) {
                 if(msg) {
                    msg.classList.remove('hidden');
                    msg.innerText = 'System error. Please check your connection and try again.';
                    msg.classList.add('bg-red-100', 'text-red-700');
                 }
                 console.error('Fetch Error:', error);
            })
            .finally(function() {
                if(btn) {
                    btn.disabled = false;
                    btn.innerText = 'Submit Request';
                }
            });
        });
    });
    </script>
    <?php
    return ob_get_clean();
}
add_shortcode('pixxicrm_form', 'nolix_pixxicrm_form_shortcode');

// 2. AJAX Handler
add_action('wp_ajax_pixxicrm_submit', 'nolix_handle_pixxicrm_submit');
add_action('wp_ajax_nopriv_pixxicrm_submit', 'nolix_handle_pixxicrm_submit');

function nolix_handle_pixxicrm_submit() {
    check_ajax_referer('pixxicrm_submit_nonce', 'security');
    
    // 1. Prepare Data Payload
    $body = [
        "formId" => "3a838868-5ece-41b4-bfd6-e88711458656",
        "name" => sanitize_text_field($_POST['name'] ?? ''),
        "email" => sanitize_email($_POST['email'] ?? ''),
        "phone" => sanitize_text_field($_POST['phone'] ?? ''),
        "nationality" => sanitize_text_field($_POST['nationality'] ?? ''),
        "budget" => sanitize_text_field($_POST['budget'] ?? ''),
        "preferredSize" => sanitize_text_field($_POST['preferredSize'] ?? ''),
        "propertyType" => sanitize_text_field($_POST['propertyType'] ?? 'Apartment'),
        "furnishing" => sanitize_text_field($_POST['furnishing'] ?? 'furnished'),
        "projectType" => sanitize_text_field($_POST['projectType'] ?? 'off_plan'),
        "bedrooms" => sanitize_text_field($_POST['bedrooms'] ?? 'studio'),
        "paymentMethod" => sanitize_text_field($_POST['paymentMethod'] ?? 'cash'),
        "buyerType" => sanitize_text_field($_POST['buyerType'] ?? 'investor'),
        "gender" => sanitize_text_field($_POST['gender'] ?? 'male')
    ];
    
    // 2. Define API Endpoint & Headers
    // NOTE: Please replace with the correct PIXXI CRM API URL if different
    $api_url = 'https://dataapi.pixxicrm.ae/pixxiapi/webhook/v1/form'; 
    $api_token = 'Dg-OW9Z2pp5QLc-zCWznx5W4shPTNptK'; 

    $args = [
        'body' => json_encode($body),
        'headers' => [
            'Content-Type' => 'application/json',
            'X-PIXXI-TOKEN' => $api_token
        ],
        'timeout' => 30,
        'blocking' => true,
    ];
    
    // 3. Send Request
    $response = wp_remote_post($api_url, $args);
    
    // 4. Handle Response
    if (is_wp_error($response)) {
        wp_send_json_error('Connection failed: ' . $response->get_error_message());
    }
    
    $code = wp_remote_retrieve_response_code($response);
    $response_body = wp_remote_retrieve_body($response);
    
    if ($code >= 200 && $code < 300) {
        wp_send_json_success('Form submitted successfully.');
    } else {
        // Logging for debug
        error_log('PixxiCRM API Error: ' . $code . ' - ' . $response_body);
        wp_send_json_error('Submission failed. Server responded with ' . $code);
    }
}

// =========================================================================
// Buy Property Form - PixxiCRM Integration
// =========================================================================

// 1. Shortcode to render the buy property form
function nolix_buy_property_form_shortcode() {
    ob_start();
    ?>
    <div id="buy-property-form-container" class="bg-white p-6 md:p-10 rounded-2xl shadow-xl border border-gray-100 max-w-5xl mx-auto my-12 relative overflow-hidden">
        <div class="absolute top-0 left-0 w-full h-2 bg-gradient-to-r from-theme to-[#a37e45]"></div>
        
        <div class="text-center mb-10">
            <span class="text-theme font-bold tracking-wider uppercase text-sm font-playfair mb-2 block">Property Inquiry</span>
            <h3 class="font-playfair text-3xl md:text-4xl text-dark font-bold mb-4">Find Your Dream Property</h3>
            <p class="text-gray-500 max-w-2xl mx-auto font-poppins font-light">
                Tell us about your property requirements and we'll help you find the perfect match.
            </p>
        </div>
        
        <form id="buy-property-form" class="space-y-6">
            <!-- Property Type Selector -->
            <div class="col-span-1 md:col-span-2">
                <h4 class="font-playfair text-xl text-dark border-b border-gray-100 pb-2 mb-4">Property Type</h4>
            </div>
            
            <div>
                <label class="block text-gray-700 text-sm font-medium mb-2 font-poppins">What type of property are you looking to buy? <span class="text-red-500">*</span></label>
                <select name="projectType" id="projectType" required class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-200 focus:bg-white focus:border-theme focus:ring-1 focus:ring-theme outline-none transition-all appearance-none">
                    <option value="">Select property type</option>
                    <option value="off_plan">Off-plan (under construction / new launch)</option>
                    <option value="secondary">Secondary / Ready (completed property)</option>
                </select>
            </div>

            <!-- Grid Layout -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-6">
                
                <!-- Common Fields Section -->
                <div class="col-span-1 md:col-span-2">
                    <h4 class="font-playfair text-xl text-dark border-b border-gray-100 pb-2 mb-4 mt-6">Your Details</h4>
                </div>

                <!-- Full Name -->
                <div>
                    <label class="block text-gray-700 text-sm font-medium mb-2 font-poppins">Full Name <span class="text-red-500">*</span></label>
                    <input type="text" name="name" required class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-200 focus:bg-white focus:border-theme focus:ring-1 focus:ring-theme outline-none transition-all" placeholder="John Doe">
                </div>

                <!-- Mobile / WhatsApp -->
                <div>
                    <label class="block text-gray-700 text-sm font-medium mb-2 font-poppins">Mobile / WhatsApp Number <span class="text-red-500">*</span></label>
                    <input type="tel" name="phone" required class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-200 focus:bg-white focus:border-theme focus:ring-1 focus:ring-theme outline-none transition-all" placeholder="+971 50 000 0000">
                </div>

                <!-- Email -->
                <div>
                    <label class="block text-gray-700 text-sm font-medium mb-2 font-poppins">Email Address <span class="text-red-500">*</span></label>
                    <input type="email" name="email" required class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-200 focus:bg-white focus:border-theme focus:ring-1 focus:ring-theme outline-none transition-all" placeholder="name@example.com">
                </div>

                <!-- Budget Range -->
                <div>
                    <label class="block text-gray-700 text-sm font-medium mb-2 font-poppins">Budget Range (AED) <span class="text-red-500">*</span></label>
                    <input type="text" name="budget" required class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-200 focus:bg-white focus:border-theme focus:ring-1 focus:ring-theme outline-none transition-all" placeholder="e.g., 2000000">
                </div>

                <!-- Preferred Location -->
                <div>
                    <label class="block text-gray-700 text-sm font-medium mb-2 font-poppins">Preferred Location(s) <span class="text-red-500">*</span></label>
                    <input type="text" name="preferred_location" required class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-200 focus:bg-white focus:border-theme focus:ring-1 focus:ring-theme outline-none transition-all" placeholder="e.g., Dubai Marina, Downtown Dubai">
                </div>

                <!-- Bedrooms -->
                <div>
                    <label class="block text-gray-700 text-sm font-medium mb-2 font-poppins">Bedrooms <span class="text-red-500">*</span></label>
                    <select name="bedrooms" required class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-200 focus:bg-white focus:border-theme focus:ring-1 focus:ring-theme outline-none transition-all appearance-none">
                        <option value="">Select bedrooms</option>
                        <option value="studio">Studio</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5+">5+</option>
                    </select>
                </div>

                <!-- Purpose of Purchase -->
                <div>
                    <label class="block text-gray-700 text-sm font-medium mb-2 font-poppins">Purpose of Purchase <span class="text-red-500">*</span></label>
                    <select name="purchase_purpose" id="purchase_purpose" required class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-200 focus:bg-white focus:border-theme focus:ring-1 focus:ring-theme outline-none transition-all appearance-none">
                        <option value="">Select purpose</option>
                        <option value="End-use">End-use</option>
                        <option value="Investment">Investment</option>
                        <option value="Both">Both</option>
                    </select>
                </div>

                <!-- Buying Timeline -->
                <div>
                    <label class="block text-gray-700 text-sm font-medium mb-2 font-poppins">When are you planning to buy? <span class="text-red-500">*</span></label>
                    <select name="buying_timeline" required class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-200 focus:bg-white focus:border-theme focus:ring-1 focus:ring-theme outline-none transition-all appearance-none">
                        <option value="">Select timeline</option>
                        <option value="Now">Now</option>
                        <option value="1-3 months">1–3 months</option>
                        <option value="3-6 months">3–6 months</option>
                        <option value="Just exploring">Just exploring</option>
                    </select>
                </div>

            </div>

            <!-- Off-plan Conditional Fields -->
            <div id="off-plan-fields" class="hidden grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-6">
                <div class="col-span-1 md:col-span-2">
                    <h4 class="font-playfair text-xl text-dark border-b border-gray-100 pb-2 mb-4 mt-6">Off-plan Details</h4>
                </div>

                <!-- Payment Plan Interest -->
                <div>
                    <label class="block text-gray-700 text-sm font-medium mb-2 font-poppins">Are you open to payment plans over construction? <span class="text-red-500">*</span></label>
                    <select name="payment_plan_interest" class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-200 focus:bg-white focus:border-theme focus:ring-1 focus:ring-theme outline-none transition-all appearance-none">
                        <option value="">Select option</option>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                        <option value="Not sure">Not sure</option>
                    </select>
                </div>

                <!-- Completion Timeline -->
                <div>
                    <label class="block text-gray-700 text-sm font-medium mb-2 font-poppins">Preferred completion timeline <span class="text-red-500">*</span></label>
                    <select name="completion_timeline" class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-200 focus:bg-white focus:border-theme focus:ring-1 focus:ring-theme outline-none transition-all appearance-none">
                        <option value="">Select timeline</option>
                        <option value="Within 1 year">Within 1 year</option>
                        <option value="1-2 years">1–2 years</option>
                        <option value="3+ years">3+ years</option>
                    </select>
                </div>

                <!-- Priority for Off-plan -->
                <div>
                    <label class="block text-gray-700 text-sm font-medium mb-2 font-poppins">Priority for off-plan <span class="text-red-500">*</span></label>
                    <select name="priority_off_plan" class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-200 focus:bg-white focus:border-theme focus:ring-1 focus:ring-theme outline-none transition-all appearance-none">
                        <option value="">Select priority</option>
                        <option value="Capital appreciation">Capital appreciation</option>
                        <option value="Flexible payment plan">Flexible payment plan</option>
                        <option value="New community & amenities">New community & amenities</option>
                    </select>
                </div>

                <!-- Golden Visa -->
                <div>
                    <label class="block text-gray-700 text-sm font-medium mb-2 font-poppins">Do you need Golden Visa guidance with your purchase? <span class="text-red-500">*</span></label>
                    <select name="golden_visa_needed" class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-200 focus:bg-white focus:border-theme focus:ring-1 focus:ring-theme outline-none transition-all appearance-none">
                        <option value="">Select option</option>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                    </select>
                </div>
            </div>

            <!-- Secondary/Ready Conditional Fields -->
            <div id="secondary-fields" class="hidden grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-6">
                <div class="col-span-1 md:col-span-2">
                    <h4 class="font-playfair text-xl text-dark border-b border-gray-100 pb-2 mb-4 mt-6">Secondary / Ready Property Details</h4>
                </div>

                <!-- Mortgage -->
                <div>
                    <label class="block text-gray-700 text-sm font-medium mb-2 font-poppins">Do you need a mortgage? <span class="text-red-500">*</span></label>
                    <select name="mortgage_needed" class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-200 focus:bg-white focus:border-theme focus:ring-1 focus:ring-theme outline-none transition-all appearance-none">
                        <option value="">Select option</option>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                        <option value="Already pre-approved">Already pre-approved</option>
                    </select>
                </div>

                <!-- Looking For -->
                <div>
                    <label class="block text-gray-700 text-sm font-medium mb-2 font-poppins">Are you looking for: <span class="text-red-500">*</span></label>
                    <select name="looking_for" class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-200 focus:bg-white focus:border-theme focus:ring-1 focus:ring-theme outline-none transition-all appearance-none">
                        <option value="">Select option</option>
                        <option value="Move-in ready">Move-in ready</option>
                        <option value="Tenanted with rental income">Tenanted with rental income</option>
                        <option value="Either">Either</option>
                    </select>
                </div>

                <!-- Move-in Timeline -->
                <div>
                    <label class="block text-gray-700 text-sm font-medium mb-2 font-poppins">How soon do you need to move in or start renting it out? <span class="text-red-500">*</span></label>
                    <select name="move_in_timeline" class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-200 focus:bg-white focus:border-theme focus:ring-1 focus:ring-theme outline-none transition-all appearance-none">
                        <option value="">Select timeline</option>
                        <option value="Immediately">Immediately</option>
                        <option value="1-3 months">1–3 months</option>
                        <option value="Flexible">Flexible</option>
                    </select>
                </div>

                <!-- Must-have Features -->
                <div class="col-span-1 md:col-span-2">
                    <label class="block text-gray-700 text-sm font-medium mb-2 font-poppins">Any must-have features?</label>
                    <textarea name="must_have_features" rows="3" class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-200 focus:bg-white focus:border-theme focus:ring-1 focus:ring-theme outline-none transition-all" placeholder="e.g., View, balcony, parking, maid's room, specific tower, etc."></textarea>
                </div>
            </div>
            
            <div class="pt-6 border-t border-gray-100 flex flex-col items-center">
                <button type="submit" class="w-full md:w-1/2 px-8 py-4 bg-theme text-white font-bold rounded-lg shadow-lg hover:bg-dark hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-300">
                    Submit Inquiry
                </button>
                <div id="buy-property-message" class="hidden mt-4 font-medium p-4 rounded-lg w-full text-center"></div>
            </div>
        </form>
    </div>
    
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        var form = document.getElementById('buy-property-form');
        var projectTypeSelect = document.getElementById('projectType');
        var offPlanFields = document.getElementById('off-plan-fields');
        var secondaryFields = document.getElementById('secondary-fields');
        
        if (!form || !projectTypeSelect) return;

        // Show/hide conditional fields based on property type
        projectTypeSelect.addEventListener('change', function() {
            var selectedValue = this.value;
            
            if (selectedValue === 'off_plan') {
                offPlanFields.classList.remove('hidden');
                secondaryFields.classList.add('hidden');
                // Make off-plan fields required
                offPlanFields.querySelectorAll('select').forEach(function(select) {
                    select.setAttribute('required', 'required');
                });
                // Remove required from secondary fields
                secondaryFields.querySelectorAll('select').forEach(function(select) {
                    select.removeAttribute('required');
                });
            } else if (selectedValue === 'secondary') {
                secondaryFields.classList.remove('hidden');
                offPlanFields.classList.add('hidden');
                // Make secondary fields required
                secondaryFields.querySelectorAll('select').forEach(function(select) {
                    select.setAttribute('required', 'required');
                });
                // Remove required from off-plan fields
                offPlanFields.querySelectorAll('select').forEach(function(select) {
                    select.removeAttribute('required');
                });
            } else {
                offPlanFields.classList.add('hidden');
                secondaryFields.classList.add('hidden');
                // Remove required from both
                offPlanFields.querySelectorAll('select').forEach(function(select) {
                    select.removeAttribute('required');
                });
                secondaryFields.querySelectorAll('select').forEach(function(select) {
                    select.removeAttribute('required');
                });
            }
        });

        form.addEventListener('submit', function(e) {
            e.preventDefault();

            var btn = form.querySelector('button[type="submit"]');
            var msg = document.getElementById('buy-property-message');
            
            // UI Loading State
            if(btn) {
                var originalText = btn.innerText;
                btn.disabled = true;
                btn.innerHTML = '<span class="inline-block animate-spin mr-2 border-2 border-white border-t-transparent rounded-full w-4 h-4"></span> Sending...';
            }
            
            if(msg) {
                msg.className = 'hidden mt-4 font-medium p-4 rounded-lg w-full text-center'; 
            }

            var formData = new FormData(form);
            formData.append('action', 'buy_property_submit');
            formData.append('security', '<?php echo wp_create_nonce("buy_property_submit_nonce"); ?>');

            fetch('<?php echo admin_url('admin-ajax.php'); ?>', {
                method: 'POST',
                body: formData
            })
            .then(function(response) {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(function(data) {
                if(msg) {
                    msg.classList.remove('hidden');
                    if(data.success) {
                        msg.innerText = 'Thank you! Your inquiry has been submitted successfully. We will contact you shortly.';
                        msg.classList.add('bg-green-100', 'text-green-700');
                        form.reset();
                        // Hide conditional fields and remove required attributes
                        offPlanFields.classList.add('hidden');
                        secondaryFields.classList.add('hidden');
                        offPlanFields.querySelectorAll('select').forEach(function(select) {
                            select.removeAttribute('required');
                        });
                        secondaryFields.querySelectorAll('select').forEach(function(select) {
                            select.removeAttribute('required');
                        });
                    } else {
                        msg.innerText = 'Error: ' + (data.data || 'Something went wrong. Please try again.');
                        msg.classList.add('bg-red-100', 'text-red-700');
                    }
                }
            })
            .catch(function(error) {
                 if(msg) {
                    msg.classList.remove('hidden');
                    msg.innerText = 'System error. Please check your connection and try again.';
                    msg.classList.add('bg-red-100', 'text-red-700');
                 }
                 console.error('Fetch Error:', error);
            })
            .finally(function() {
                if(btn) {
                    btn.disabled = false;
                    btn.innerText = 'Submit Inquiry';
                }
            });
        });
    });
    </script>
    <?php
    return ob_get_clean();
}
add_shortcode('buy_property_form', 'nolix_buy_property_form_shortcode');

// 2. AJAX Handler for Buy Property Form
add_action('wp_ajax_buy_property_submit', 'nolix_handle_buy_property_submit');
add_action('wp_ajax_nopriv_buy_property_submit', 'nolix_handle_buy_property_submit');

function nolix_handle_buy_property_submit() {
    check_ajax_referer('buy_property_submit_nonce', 'security');
    
    // Get form data
    $project_type = sanitize_text_field($_POST['projectType'] ?? '');
    $name = sanitize_text_field($_POST['name'] ?? '');
    $phone = sanitize_text_field($_POST['phone'] ?? '');
    $email = sanitize_email($_POST['email'] ?? '');
    $budget = sanitize_text_field($_POST['budget'] ?? '');
    $preferred_location = sanitize_text_field($_POST['preferred_location'] ?? '');
    $bedrooms = sanitize_text_field($_POST['bedrooms'] ?? '');
    $purchase_purpose = sanitize_text_field($_POST['purchase_purpose'] ?? '');
    $buying_timeline = sanitize_text_field($_POST['buying_timeline'] ?? '');
    
    // Determine buyer type based on purchase purpose
    $buyer_type = 'investor';
    if ($purchase_purpose === 'End-use') {
        $buyer_type = 'end_user';
    } elseif ($purchase_purpose === 'Both') {
        $buyer_type = 'both';
    }
    
    // Build extraData object
    $extra_data = array(
        'preferred_location' => $preferred_location,
        'purchase_purpose' => $purchase_purpose,
        'buying_timeline' => $buying_timeline
    );
    
    // Add conditional fields based on property type
    if ($project_type === 'off_plan') {
        $extra_data['payment_plan_interest'] = sanitize_text_field($_POST['payment_plan_interest'] ?? '');
        $extra_data['completion_timeline'] = sanitize_text_field($_POST['completion_timeline'] ?? '');
        $extra_data['priority_for_off-plan'] = sanitize_text_field($_POST['priority_off_plan'] ?? '');
        $extra_data['golden_visa_needed'] = sanitize_text_field($_POST['golden_visa_needed'] ?? '');
    } elseif ($project_type === 'secondary') {
        $extra_data['mortgage_needed'] = sanitize_text_field($_POST['mortgage_needed'] ?? '');
        $extra_data['looking_for'] = sanitize_text_field($_POST['looking_for'] ?? '');
        $extra_data['move_in_timeline'] = sanitize_text_field($_POST['move_in_timeline'] ?? '');
        $must_have = sanitize_textarea_field($_POST['must_have_features'] ?? '');
        if (!empty($must_have)) {
            $extra_data['must_have_features'] = $must_have;
        }
    }
    
    // Prepare Data Payload
    $body = array(
        "formId" => "3a838868-5ece-41b4-bfd6-e88711458656",
        "name" => $name,
        "phone" => $phone,
        "email" => $email,
        "budget" => $budget,
        "bedrooms" => $bedrooms,
        "projectType" => $project_type,
        "buyerType" => $buyer_type,
        "extraData" => $extra_data
    );
    
    // Define API Endpoint & Headers
    $api_url = 'https://dataapi.pixxicrm.ae/pixxiapi/webhook/v1/form'; 
    $api_token = 'Dg-OW9Z2pp5QLc-zCWznx5W4shPTNptK'; 

    $args = array(
        'body' => json_encode($body),
        'headers' => array(
            'Content-Type' => 'application/json',
            'X-PIXXI-TOKEN' => $api_token
        ),
        'timeout' => 30,
        'blocking' => true,
    );
    
    // Send Request
    $response = wp_remote_post($api_url, $args);
    
    // Handle Response
    if (is_wp_error($response)) {
        wp_send_json_error('Connection failed: ' . $response->get_error_message());
    }
    
    $code = wp_remote_retrieve_response_code($response);
    $response_body = wp_remote_retrieve_body($response);
    
    if ($code >= 200 && $code < 300) {
        wp_send_json_success('Form submitted successfully.');
    } else {
        // Logging for debug
        error_log('PixxiCRM Buy Form API Error: ' . $code . ' - ' . $response_body);
        wp_send_json_error('Submission failed. Server responded with ' . $code);
    }
}






