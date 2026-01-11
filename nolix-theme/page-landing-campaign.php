<?php
/**
 * Template Name: Landing Page (Campaign-Specific)
 */

get_header();

// Hero Section
get_template_part('template-parts/hero', null, [
    'title' => get_the_title() ? get_the_title() : 'CAMPAIGN <span class="text-theme">LANDING PAGE</span>',
    'subtitle' => get_the_excerpt() ? get_the_excerpt() : 'Welcome to our special campaign. Discover exclusive offers and opportunities.',
    'image' => has_post_thumbnail() ? get_the_post_thumbnail_url(get_the_ID(), 'full') : get_template_directory_uri() . '/assets/images/our-service-bg.webp',
    'buttons' => []
]);
?>

<!-- Campaign Content Section -->
<section class="py-16 lg:py-24 bg-white">
    <div class="container mx-auto px-6 lg:px-12">
        <?php
        if (have_posts()) :
            while (have_posts()) :
                the_post();
                ?>
                <div class="max-w-4xl mx-auto">
                    <?php if (has_post_thumbnail() && !get_the_post_thumbnail_url(get_the_ID(), 'full')) : ?>
                        <div class="rounded-xl overflow-hidden mb-8 aspect-[16/9]">
                            <?php the_post_thumbnail('full', ['class' => 'w-full h-full object-cover']); ?>
                        </div>
                    <?php endif; ?>
                    
                    <div class="prose max-w-none font-poppins text-[#5F6D7E] text-lg leading-relaxed">
                        <?php the_content(); ?>
                    </div>
                </div>
                <?php
            endwhile;
        else :
            ?>
            <div class="max-w-4xl mx-auto text-center">
                <p class="text-gray-500 text-lg font-poppins">Content will be added here soon.</p>
            </div>
            <?php
        endif;
        ?>
    </div>
</section>

<?php get_footer(); ?>

