<?php
/**
 * Template Name: Our Services Page
 */

get_header();

// Hero Section
get_template_part('template-parts/hero', null, [
    'title' => 'OUR <span class="text-theme">SERVICES</span>',
    'subtitle' => 'We offer a wide range of real estate services to meet your needs.',
    'image' => 'https://images.unsplash.com/photo-1560518883-ce09059eeffa?auto=format&fit=crop&q=80&w=2670', // Placeholder
    'buttons' => [] 
]);
?>

<!-- Empty Content Section (Placeholder) -->
<section class="py-20">
    <div class="container mx-auto px-6 lg:px-12 text-center text-gray-500">
        <p>Content for Our Services goes here.</p>
    </div>
</section>

<?php 
// CTA Section
get_template_part('template-parts/cta');
?>

<?php get_footer(); ?>
