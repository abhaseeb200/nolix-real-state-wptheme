<?php
/**
 * Template Name: Buy Property Form Page 
 */

get_header(); 

// Hero Section
get_template_part('template-parts/hero', null, [
    'title' => 'Buy Property',
    'subtitle' => 'Find your dream property with expert guidance',
    'image' => get_template_directory_uri() . '/assets/images/Hero-section.webp',
    'buttons' => []
]);
?>

<section class="py-16 lg:py-24 bg-[#F5F6FA]" data-aos="fade-up">
  <div class="container mx-auto px-6 lg:px-12">
    <?php echo do_shortcode('[buy_property_form]'); ?>
  </div>
</section>

<?php 
get_footer(); 
?>

