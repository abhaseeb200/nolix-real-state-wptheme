<?php
/**
 * Template Name: Find Rent in Dubai Form Page 
 */

get_header(); 

// Hero Section
get_template_part('template-parts/hero', null, [
    'title' => 'Find Rent in Dubai',
    'subtitle' => 'Discover your perfect rental property with expert guidance',
    'image' => get_template_directory_uri() . '/assets/images/Hero-section.webp',
    'buttons' => []
]);
?>

<section class="py-16 lg:py-24 bg-[#F5F6FA]">
  <div class="container mx-auto px-6 lg:px-12">
    <?php echo do_shortcode('[rent_property_form]'); ?>
  </div>
</section>

<?php 
get_footer(); 
?>

