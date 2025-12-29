<?php get_header(); ?>

<div class="py-24 bg-white">
    <div class="container mx-auto px-6 lg:px-12">
        <?php
        if ( have_posts() ) :
            while ( have_posts() ) : the_post();
                ?>
                <div class="mb-12">
                     <h1 class="text-h1-custom font-playfair font-bold text-gray-900 mb-6 uppercase"><?php the_title(); ?></h1>
                    
                    <?php if ( has_post_thumbnail() ) : ?>
                        <div class="mb-8 rounded-xl overflow-hidden h-[400px]">
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
            echo '<p>No content found.</p>';
        endif;
        ?>
    </div>
</div>

<?php get_footer(); ?>
