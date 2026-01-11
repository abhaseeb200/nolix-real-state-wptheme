<?php
/**
 * Template Name: Lease Out My Property Form Page 
 */

get_header(); 

// Hero Section
get_template_part('template-parts/hero', null, [
    'title' => 'Lease Out My Property',
    'subtitle' => 'List your property and find qualified tenants quickly',
    'image' => get_template_directory_uri() . '/assets/images/Hero-section.webp',
    'buttons' => []
]);
?>

<section class="py-16 lg:py-24 bg-[#F5F6FA]">
  <div class="container mx-auto px-6 lg:px-12">
    <?php echo do_shortcode('[lease_property_form]'); ?>
  </div>
</section>

<?php 
get_footer(); 
?>

