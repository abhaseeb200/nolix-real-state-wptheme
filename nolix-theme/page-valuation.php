<?php
/**
 * Template Name: Valuation Page
 */

get_header();

// Hero Section
get_template_part('template-parts/hero', null, [
    'title' => 'PROPERTY <span class="text-theme">VALUATION</span>',
    'subtitle' => 'Get a complimentary property valuation and discover how we can maximize your property\'s potential.',
    'image' => 'https://images.unsplash.com/photo-1560518883-ce09059eeffa?auto=format&fit=crop&q=80&w=2670', // Placeholder
    'buttons' => [
        [
            'text' => 'Request Valuation',
            'url' => '#',
            'style' => 'solid'
        ]
    ]
]);
?>

<!-- Empty Content Section (Placeholder) -->
<section class="py-20">
    <div class="container mx-auto px-6 lg:px-12 text-center text-gray-500">
        <p>Content for Property Valuation goes here.</p>
    </div>
</section>

<?php 
// CTA Section
get_template_part('template-parts/cta');
?>

<?php get_footer(); ?>
