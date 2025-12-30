<?php
/**
 * Template Name: Property Management Page
 */

get_header();

// Hero Section
get_template_part('template-parts/hero', null, [
    'title' => 'PROPERTY <span class="text-theme">MANAGEMENT</span>',
    'subtitle' => 'Professional management services to maximize your investment returns.',
    'image' => 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?auto=format&fit=crop&q=80&w=2426', 
    'buttons' => [
        [
            'text' => 'Get a Quote',
            'url' => '#',
            'style' => 'solid'
        ]
    ]
]);
?>

<!-- Empty Content Section (Placeholder) -->
<section class="py-20">
    <div class="container mx-auto px-6 lg:px-12 text-center text-gray-500">
        <p>Content for Property Management goes here.</p>
    </div>
</section>

<?php 
// CTA Section
get_template_part('template-parts/cta');
?>

<?php get_footer(); ?>
