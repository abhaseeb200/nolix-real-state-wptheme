<?php
/**
 * Template part for displaying the Team section
 */
?>

<section class="py-20 bg-[#F9FAFB]">
  <div class="container">
    <div class="text-center md:pb-16 pb-8">
      <h2 class="font-playfair text-h2-custom font-bold text-dark mb-4 uppercase">
        MEET <span class="text-theme">THE TEAM</span>
      </h2>
      <p class="text-[#474C59] text-base md:text-[20px] max-w-xl mx-auto">
        Experienced professionals dedicated to delivering exceptional service and results.
      </p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
      <?php
        $team_query = new WP_Query(array(
            'post_type' => 'team_member',
            'posts_per_page' => -1,
            'order' => 'ASC'
        ));

        if ($team_query->have_posts()) :
            while ($team_query->have_posts()) : $team_query->the_post();
                $role = get_post_meta(get_the_ID(), '_nolix_role', true);
                $image_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
                // Fallback image if no thumbnail
                if (!$image_url) {
                    $image_url = get_template_directory_uri() . '/assets/images/member1.webp'; 
                }
      ?>
      <div class="text-left group">
        <div class="relative overflow-hidden rounded-lg mb-6 shadow-sm">
          <img src="<?php echo esc_url($image_url); ?>" alt="<?php the_title_attribute(); ?>" class="w-full h-[308px] object-cover transition-transform duration-500 group-hover:scale-105" />
        </div>
        <h3 class="font-poppins text-xl font-bold text-dark mb-1"><?php the_title(); ?></h3>
        <?php if ($role) : ?>
            <p class="text-theme text-sm tracking-wide"><?php echo esc_html($role); ?></p>
        <?php endif; ?>
      </div>
      <?php
            endwhile;
            wp_reset_postdata();
        else:
      ?>
        <!-- Fallback/Placeholder content if no team members are added yet (Optional, or just show nothing) -->
        <p class="text-center col-span-full">No team members found.</p>
      <?php endif; ?>
    </div>
  </div>
</section>
