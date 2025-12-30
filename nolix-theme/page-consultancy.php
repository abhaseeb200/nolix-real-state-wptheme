<?php
/**
 * Template Name: Consultancy Page
 */

get_header();

// Hero Section
get_template_part('template-parts/hero', null, [
    'title' => 'REAL ESTATE <span class="text-theme">CONSULTANCY</span>',
    'subtitle' => 'Professional guidance for all your real estate investment needs.',
    'image' => 'https://images.unsplash.com/photo-1556761175-5973dc0f32e7?auto=format&fit=crop&q=80&w=2670', // Placeholder
    'buttons' => [
        [
            'text' => 'Book Consultation',
            'url' => '#',
            'style' => 'solid'
        ]
    ]
]);
?>

<!-- Empty Content Section (Placeholder) -->
<section class="py-20">
    <div class="container mx-auto px-6 lg:px-12 text-center text-gray-500">
        <p>Content for Consultancy Services goes here.</p>
    </div>
</section>

<?php 
// CTA Section
get_template_part('template-parts/cta');
?>

<?php get_footer(); ?>
