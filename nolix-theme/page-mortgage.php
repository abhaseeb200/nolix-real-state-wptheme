<?php
/**
 * Template Name: Mortgage Page
 */

get_header();

// Hero Section
get_template_part('template-parts/hero', null, [
    'title' => 'MORTGAGE <span class="text-theme">SERVICES</span>',
    'subtitle' => 'Expert mortgage consultation connecting you with top UAE banks for the best rates.',
    'image' => 'https://images.unsplash.com/photo-1554224155-8d04cb21cd6c?auto=format&fit=crop&q=80&w=2670', // Placeholder
    'buttons' => [
        [
            'text' => 'Get Prequalified',
            'url' => '#',
            'style' => 'solid'
        ]
    ]
]);
?>

<!-- Empty Content Section (Placeholder) -->
<section class="py-20">
    <div class="container mx-auto px-6 lg:px-12 text-center text-gray-500">
        <p>Content for Mortgage Services goes here.</p>
    </div>
</section>

<?php 
// CTA Section
get_template_part('template-parts/cta');
?>

<?php get_footer(); ?>
