<?php
/**
 * Template Name: Blog & Guides Page
 */

get_header();

// Hero Section
get_template_part('template-parts/hero', null, [
    'title' => 'BLOG AND <span class="text-theme">GUIDES</span>',
    'subtitle' => 'Insights, tips, and guides to help you navigate the real estate market in the UAE.',
    'image' => get_template_directory_uri() . '/assets/images/our-service-bg.webp',
    'buttons' => []
]);
?>

<!-- Blog Posts Grid Section -->
<section class="py-16 lg:py-24 bg-white">
    <div class="container mx-auto px-6 lg:px-12">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php
            $blog_query = new WP_Query(array(
                'post_type'      => 'post',
                'posts_per_page' => 9,
                'orderby'        => 'date',
                'order'          => 'DESC'
            ));

            if ($blog_query->have_posts()) :
                while ($blog_query->have_posts()) :
                    $blog_query->the_post();
                    
                    $excerpt = get_the_excerpt();
                    if (empty($excerpt)) {
                        $excerpt = wp_trim_words(get_the_content(), 20, '...');
                    }
                    ?>
                    <article class="bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-lg transition-shadow duration-300 border border-gray-100">
                        <?php if (has_post_thumbnail()) : ?>
                            <a href="<?php the_permalink(); ?>" class="block aspect-[4/3] overflow-hidden">
                                <?php the_post_thumbnail('large', ['class' => 'w-full h-full object-cover transition-transform duration-500 hover:scale-110']); ?>
                            </a>
                        <?php else: ?>
                            <a href="<?php the_permalink(); ?>" class="block aspect-[4/3] bg-lightgray flex items-center justify-center">
                                <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </a>
                        <?php endif; ?>
                        
                        <div class="p-6">
                            <div class="flex items-center gap-2 text-sm text-gray-500 mb-3 font-poppins">
                                <time datetime="<?php echo get_the_date('c'); ?>"><?php echo get_the_date('F j, Y'); ?></time>
                                <?php
                                $categories = get_the_terms(get_the_ID(), 'category');
                                if ($categories && !is_wp_error($categories)) :
                                    $cat = array_shift($categories);
                                    ?>
                                    <span class="text-theme">•</span>
                                    <span class="text-theme font-medium"><?php echo esc_html($cat->name); ?></span>
                                <?php endif; ?>
                            </div>
                            
                            <h2 class="font-playfair text-xl font-bold text-dark mb-3 uppercase">
                                <a href="<?php the_permalink(); ?>" class="hover:text-theme transition-colors">
                                    <?php the_title(); ?>
                                </a>
                            </h2>
                            
                            <?php if ($excerpt) : ?>
                                <p class="text-gray-600 text-sm leading-relaxed mb-4 font-poppins line-clamp-3">
                                    <?php echo esc_html($excerpt); ?>
                                </p>
                            <?php endif; ?>
                            
                            <a href="<?php the_permalink(); ?>" class="inline-flex items-center gap-2 text-theme font-medium text-sm hover:gap-3 transition-all font-poppins uppercase tracking-wide">
                                Read More
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                                </svg>
                            </a>
                        </div>
                    </article>
                    <?php
                endwhile;
                wp_reset_postdata();
            else :
                ?>
                <div class="col-span-full text-center py-12">
                    <p class="text-gray-500 text-lg font-poppins">No blog posts found. Please add some blog posts in the admin panel.</p>
                </div>
                <?php
            endif;
            ?>
        </div>

        <?php
        // Pagination
        $total_pages = $blog_query->max_num_pages;
        if ($total_pages > 1) :
            ?>
            <div class="flex justify-center gap-2 mt-12">
                <?php
                $current_page = max(1, get_query_var('paged'));
                echo paginate_links(array(
                    'base'      => str_replace(999999999, '%#%', esc_url(get_pagenum_link(999999999))),
                    'format'    => '?paged=%#%',
                    'current'   => $current_page,
                    'total'     => $total_pages,
                    'prev_text' => '← Previous',
                    'next_text' => 'Next →',
                    'type'      => 'list',
                    'end_size'  => 2,
                    'mid_size'  => 1,
                ));
                ?>
            </div>
            <?php
        endif;
        ?>
    </div>
</section>

<?php get_footer(); ?>

