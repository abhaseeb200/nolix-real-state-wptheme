<?php

get_header();
?>

<article class="py-16 lg:py-24 bg-white">
    <div class="container mx-auto px-6 lg:px-12">
        <?php
        if (have_posts()) :
            while (have_posts()) :
                the_post();
                ?>
                
                <!-- Featured Image (Full Width) -->
                <?php if (has_post_thumbnail()) : ?>
                    <div class="mb-8 lg:mb-12 rounded-xl overflow-hidden aspect-[16/9] max-w-full">
                        <?php the_post_thumbnail('full', ['class' => 'w-full h-full object-cover']); ?>
                    </div>
                <?php endif; ?>
                
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 lg:gap-12 max-w-7xl mx-auto">
                    <!-- Main Content -->
                    <div class="lg:col-span-2">
                        <!-- Post Header -->
                        <header class="mb-8">
                            <div class="flex items-center gap-2 text-sm text-gray-500 mb-4 font-poppins">
                                <time datetime="<?php echo get_the_date('c'); ?>"><?php echo get_the_date('F j, Y'); ?></time>
                                <?php
                                $categories = get_the_category();
                                if ($categories && !is_wp_error($categories)) :
                                    $cat = $categories[0];
                                    ?>
                                    <span class="text-theme">•</span>
                                    <a href="<?php echo esc_url(get_category_link($cat->term_id)); ?>" class="text-theme font-medium hover:underline">
                                        <?php echo esc_html($cat->name); ?>
                                    </a>
                                <?php endif; ?>
                            </div>
                            
                            <h1 class="font-playfair text-h1-custom font-bold text-dark mb-6 uppercase">
                                <?php the_title(); ?>
                            </h1>
                        </header>

                        <!-- Post Content -->
                        <div class="prose max-w-none font-poppins text-[#5F6D7E] text-lg leading-relaxed mb-12">
                            <?php the_content(); ?>
                        </div>

                        <!-- Post Tags -->
                        <?php
                        $tags = get_the_tags();
                        if ($tags && !is_wp_error($tags)) :
                            ?>
                            <div class="flex flex-wrap gap-2 mb-8 pt-8 border-t border-gray-200">
                                <span class="text-sm font-semibold text-dark uppercase tracking-wide mr-2">Tags:</span>
                                <?php foreach ($tags as $tag) : ?>
                                    <a href="<?php echo esc_url(get_tag_link($tag->term_id)); ?>" class="px-4 py-2 bg-lightgray text-dark rounded-full text-sm hover:bg-theme hover:text-white transition-colors font-poppins">
                                        <?php echo esc_html($tag->name); ?>
                                    </a>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>

                        <!-- Navigation Links -->
                        <nav class="flex justify-between items-center pt-8 border-t border-gray-200 mb-12">
                            <div>
                                <?php
                                $prev_post = get_previous_post();
                                if ($prev_post) :
                                    ?>
                                    <a href="<?php echo esc_url(get_permalink($prev_post)); ?>" class="flex items-center gap-2 text-theme hover:gap-3 transition-all font-medium font-poppins">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                                        </svg>
                                        Previous Post
                                    </a>
                                    <p class="text-sm text-gray-600 mt-1 font-poppins"><?php echo esc_html(get_the_title($prev_post)); ?></p>
                                <?php endif; ?>
                            </div>
                            
                            <div class="text-right">
                                <?php
                                $next_post = get_next_post();
                                if ($next_post) :
                                    ?>
                                    <a href="<?php echo esc_url(get_permalink($next_post)); ?>" class="flex items-center gap-2 text-theme hover:gap-3 transition-all font-medium font-poppins">
                                        Next Post
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                        </svg>
                                    </a>
                                    <p class="text-sm text-gray-600 mt-1 font-poppins"><?php echo esc_html(get_the_title($next_post)); ?></p>
                                <?php endif; ?>
                            </div>
                        </nav>

                        <!-- Back to Blog Link -->
                        <div class="text-center pt-8 border-t border-gray-200">
                            <a href="<?php echo site_url('/insights'); ?>" class="inline-flex items-center gap-2 bg-theme text-white px-8 py-3 rounded-full hover:bg-opacity-90 transition-all font-medium uppercase tracking-wide font-poppins">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                                </svg>
                                Back to Blog & Guides
                            </a>
                        </div>
                    </div>

                    <!-- Sidebar -->
                    <aside class="lg:col-span-1">
                        <div class="sticky top-24 space-y-8">
                            <!-- Recent Posts -->
                            <div class="bg-lightgray rounded-xl p-6">
                                <h3 class="font-playfair text-2xl font-bold text-dark mb-6 uppercase">Recent Posts</h3>
                                <?php
                                $recent_posts = new WP_Query(array(
                                    'post_type' => 'post',
                                    'posts_per_page' => 5,
                                    'post__not_in' => array(get_the_ID()),
                                    'orderby' => 'date',
                                    'order' => 'DESC'
                                ));
                                
                                if ($recent_posts->have_posts()) :
                                    ?>
                                    <ul class="space-y-4">
                                        <?php while ($recent_posts->have_posts()) : $recent_posts->the_post(); ?>
                                            <li class="border-b border-gray-300 pb-4 last:border-0 last:pb-0">
                                                <a href="<?php the_permalink(); ?>" class="block group">
                                                    <?php if (has_post_thumbnail()) : ?>
                                                        <div class="aspect-[4/3] rounded-lg overflow-hidden mb-3">
                                                            <?php the_post_thumbnail('medium', ['class' => 'w-full h-full object-cover transition-transform duration-300 group-hover:scale-105']); ?>
                                                        </div>
                                                    <?php endif; ?>
                                                    <h4 class="font-playfair text-lg font-bold text-dark mb-2 uppercase group-hover:text-theme transition-colors line-clamp-2">
                                                        <?php the_title(); ?>
                                                    </h4>
                                                    <time class="text-xs text-gray-500 font-poppins" datetime="<?php echo get_the_date('c'); ?>">
                                                        <?php echo get_the_date('F j, Y'); ?>
                                                    </time>
                                                </a>
                                            </li>
                                        <?php endwhile; ?>
                                    </ul>
                                    <?php
                                    wp_reset_postdata();
                                else :
                                    ?>
                                    <p class="text-gray-500 text-sm font-poppins">No recent posts found.</p>
                                <?php endif; ?>
                            </div>

                            <!-- Categories -->
                            <div class="bg-lightgray rounded-xl p-6">
                                <h3 class="font-playfair text-2xl font-bold text-dark mb-6 uppercase">Categories</h3>
                                <?php
                                $categories = get_categories(array(
                                    'orderby' => 'count',
                                    'order' => 'DESC',
                                    'number' => 10,
                                    'hide_empty' => true
                                ));
                                
                                if ($categories) :
                                    ?>
                                    <ul class="space-y-3">
                                        <?php foreach ($categories as $category) : ?>
                                            <li>
                                                <a href="<?php echo esc_url(get_category_link($category->term_id)); ?>" class="flex items-center justify-between text-dark hover:text-theme transition-colors font-poppins group">
                                                    <span class="group-hover:underline"><?php echo esc_html($category->name); ?></span>
                                                    <span class="text-sm text-gray-500 bg-white px-2 py-1 rounded-full"><?php echo $category->count; ?></span>
                                                </a>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                <?php else : ?>
                                    <p class="text-gray-500 text-sm font-poppins">No categories found.</p>
                                <?php endif; ?>
                            </div>

                            <!-- Popular Tags -->
                            <div class="bg-lightgray rounded-xl p-6">
                                <h3 class="font-playfair text-2xl font-bold text-dark mb-6 uppercase">Popular Tags</h3>
                                <?php
                                $tags = get_tags(array(
                                    'orderby' => 'count',
                                    'order' => 'DESC',
                                    'number' => 15,
                                    'hide_empty' => true
                                ));
                                
                                if ($tags) :
                                    ?>
                                    <div class="flex flex-wrap gap-2">
                                        <?php foreach ($tags as $tag) : ?>
                                            <a href="<?php echo esc_url(get_tag_link($tag->term_id)); ?>" class="px-3 py-1.5 bg-white text-dark rounded-full text-sm hover:bg-theme hover:text-white transition-colors font-poppins">
                                                <?php echo esc_html($tag->name); ?>
                                            </a>
                                        <?php endforeach; ?>
                                    </div>
                                <?php else : ?>
                                    <p class="text-gray-500 text-sm font-poppins">No tags found.</p>
                                <?php endif; ?>
                            </div>

                            <!-- CTA -->
                            <div class="bg-theme rounded-xl p-6 text-white text-center">
                                <h3 class="font-playfair text-xl font-bold mb-3 uppercase">Need Help?</h3>
                                <p class="text-sm font-poppins mb-4 opacity-90">Get expert advice from our team</p>
                                <a href="<?php echo site_url('/services/consultancy'); ?>" class="inline-block bg-white text-theme px-6 py-2 rounded-full text-sm font-semibold hover:bg-opacity-90 transition-all font-poppins uppercase">
                                    Book Consultation
                                </a>
                            </div>
                        </div>
                    </aside>
                </div>
                
                <?php
            endwhile;
        else :
            ?>
            <div class="text-center py-12">
                <p class="text-gray-500 text-lg font-poppins">Post not found.</p>
                <a href="<?php echo site_url('/insights'); ?>" class="inline-block mt-4 text-theme hover:underline font-poppins">
                    ← Back to Blog & Guides
                </a>
            </div>
            <?php
        endif;
        ?>
    </div>
</article>

<?php get_footer(); ?>

