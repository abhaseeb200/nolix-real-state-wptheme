<?php
/**
 * Template Name: About Us Page
 */

get_header();

// Hero Section
get_template_part('template-parts/hero', null, [
    'title' => 'ABOUT <span class="text-theme">US</span>',
    'subtitle' => 'Nolix is a premier real estate agency in Dubai, dedicated to providing exceptional service.',
    'image' => 'https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&q=80&w=2670', // Placeholder or generic
    'buttons' => [] 
]);
?>

<!-- Empty Content Section (Placeholder) -->
<section class="py-20">
    <div class="container mx-auto px-6 lg:px-12 text-center text-gray-500">
        <p>Content for About Us goes here.</p>
    </div>
</section>

<?php 
// CTA Section
get_template_part('template-parts/cta', null, [
    'title' => 'Ready to Work With Us?',
    'text' => 'Get in touch with our team today.',
    'buttons' => [
        [
            'text' => 'Contact Us',
            'url' => '#',
            'style' => 'gradient'
        ]
    ]
]);
?>

<?php get_footer(); ?>
