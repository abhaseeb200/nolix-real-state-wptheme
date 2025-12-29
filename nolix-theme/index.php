<?php get_header(); ?>

<div class="container mx-auto px-6 py-12">
    <?php
    if ( have_posts() ) :
        while ( have_posts() ) : the_post();
            ?>
            <div class="mb-12">
                <h1 class="text-4xl font-playfair font-bold mb-4"><?php the_title(); ?></h1>
                <div class="prose font-poppins text-gray-700">
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

<?php get_footer(); ?>
