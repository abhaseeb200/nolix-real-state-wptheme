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
                extend: {
                    colors: {
                        theme: '#C19A5C',
                        dark: '#19191A',
                        counter: '#C8CCD9',
                        navy: '#092947',
                        lightgray: '#F3F4F6',
                    },
                    fontFamily: {
                        playfair: ['\"Playfair Display\"', 'serif'],
                        poppins: ['\"Poppins\"', 'sans-serif'],
                        helvetica: ['\"Helvetica Neue\"', 'Helvetica', 'Arial', 'sans-serif'],
                    },
                    fontSize: {
                        'h1-custom': '54px',
                        'h2-custom': '48px',
                        'h3-custom': '32px',
                        'p-custom': '20px',
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
}
add_action( 'init', 'nolix_register_post_types', 0 );


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

    echo '<p><label for="nolix_headline">Headline (Short Quote):</label><br>';
    echo '<input type="text" id="nolix_headline" name="nolix_headline" value="' . esc_attr( $headline ) . '" class="widefat"></p>';

    echo '<p><label for="nolix_role">Role (e.g. Buyer, Seller):</label><br>';
    echo '<input type="text" id="nolix_role" name="nolix_role" value="' . esc_attr( $role ) . '" class="widefat"></p>';
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
}
add_action( 'save_post', 'nolix_save_testimonial_details' );


