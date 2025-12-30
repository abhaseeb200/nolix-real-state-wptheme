<?php
/**
 * Template Name: Buy Page
 */

get_header(); 

// Hero Section
get_template_part('template-parts/hero', null, [
    'title' => 'BUY YOUR DREAM PROPERTY<br><span class="text-theme">IN THE UAE</span>',
    'subtitle' => 'Explore curated villas, apartments, and penthouses tailored guidance for end-users and investors.',
    'image' => 'https://images.unsplash.com/photo-1613977257363-707ba9348227?q=80&w=2670&auto=format&fit=crop',
    'buttons' => [] // No buttons needed here based on buy.html, but structure allows it
]);

?>

<!-- Featured Properties Section -->
<section class="py-16 lg:py-24 bg-[#F5F6FA]">
  <div class="container mx-auto px-6 lg:px-12">
    <div class="text-center mb-12">
      <h2 class="font-playfair text-h2-custom font-bold text-dark mb-5">
        FEATURED PROPERTIES
      </h2>
      <p class="text-[#474C59] md:text-[20px] text-sm tracking-wide">
        Handpicked selection of premium properties across the UAE
      </p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
        <?php
        $properties_query = new WP_Query(array(
            'post_type' => 'property',
            'posts_per_page' => 6 // Limit to 6 as per design
        ));

        if ($properties_query->have_posts()) :
            while ($properties_query->have_posts()) : $properties_query->the_post();
                $location = get_post_meta(get_the_ID(), '_nolix_location', true);
                $price = get_post_meta(get_the_ID(), '_nolix_price', true);
                $beds = get_post_meta(get_the_ID(), '_nolix_beds', true);
                $baths = get_post_meta(get_the_ID(), '_nolix_baths', true);
                $size = get_post_meta(get_the_ID(), '_nolix_size', true);
                
                // Fallback image
                $thumb_url = get_the_post_thumbnail_url(get_the_ID(), 'large');
                if(!$thumb_url) $thumb_url = 'https://images.unsplash.com/photo-1512917774080-9991f1c4c750?auto=format&fit=crop&q=80&w=800';
                ?>
                <!-- Property Card -->
                <div class="group bg-white shadow-[0_0_24px_0_#00000014] rounded-lg overflow-hidden transition-all duration-300 hover:-translate-y-1">
                    <div class="relative h-64 overflow-hidden">
                      <img src="<?php echo esc_url($thumb_url); ?>" alt="<?php the_title(); ?>" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" />
                      <?php if($price): ?>
                      <div class="absolute bottom-4 left-4 bg-[#FFFFFF1C] backdrop-blur-sm px-3 py-1 rounded text-white text-sm font-medium">
                        <?php echo esc_html($price); ?>
                      </div>
                      <?php endif; ?>
                    </div>
                    <div class="p-6">
                      <h3 class="font-poppins text-lg font-bold mb-2 truncate uppercase text-dark">
                        <?php the_title(); ?>
                      </h3>
                      <?php if($location): ?>
                      <div class="flex items-center text-gray-500 text-sm mb-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1 text-theme" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <?php echo esc_html($location); ?>
                      </div>
                      <?php endif; ?>

                      <div class="flex justify-between items-center text-sm text-gray-600 mb-6 font-medium">
                        <?php if($beds): ?>
                        <div class="flex items-center gap-2">
                          <svg class="w-5 h-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 12v6h16v-6M3 9h18M5 18v2M19 18v2" />
                          </svg>
                          <span><span class="font-bold text-dark"><?php echo esc_html($beds); ?></span> Beds</span>
                        </div>
                        <?php endif; ?>
                        
                        <?php if($baths): ?>
                        <div class="flex items-center gap-2">
                          <svg class="w-5 h-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 14h18M4 14V9a3 3 0 016 0v5M14 9a3 3 0 016 0v5M6 20v-6M18 20v-6" />
                          </svg>
                          <span><span class="font-bold text-dark"><?php echo esc_html($baths); ?></span> Baths</span>
                        </div>
                        <?php endif; ?>
                        
                        <?php if($size): ?>
                        <div class="flex items-center gap-2">
                          <svg class="w-5 h-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 6h16M4 10h16M4 14h16M4 18h16M6 4v16M10 4v16M14 4v16M18 4v16" />
                          </svg>
                          <span><span class="font-bold text-dark"><?php echo esc_html($size); ?></span> sqft</span>
                        </div>
                        <?php endif; ?>
                      </div>

                      <a href="<?php the_permalink(); ?>" class="flex items-center justify-center w-[50%] bg-theme text-white py-3 rounded-md hover:bg-opacity-90 transition duration-300 font-medium text-sm">
                        View Details <span class="ml-2">→</span>
                      </a>
                    </div>
                </div>
            <?php endwhile;
            wp_reset_postdata();
        else:
            echo '<p class="col-span-3 text-center">No properties found.</p>';
        endif; 
        ?>
    </div>

    <div class="text-center mt-12">
      <a href="#" class="inline-block bg-theme text-white px-8 py-3 rounded-full hover:bg-opacity-90 transition font-medium uppercase shadow-lg hover:shadow-xl">
        View All Properties
      </a>
    </div>
  </div>
</section>

<!-- Buyer & Investor Services Section -->
<section class="py-20 bg-navy text-white">
  <div class="container mx-auto px-6 lg:px-12">
    <div class="text-center mb-16">
      <h2 class="font-playfair text-h2-custom font-bold mb-4">
        <span class="text-white">BUYER & </span><span class="text-theme">INVESTOR SERVICES</span>
      </h2>
      <p class="text-[#F0F1F5] text-p-custom max-w-3xl mx-auto">
        Comprehensive support throughout your property acquisition journey
      </p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
      <!-- Service 1 -->
      <div class="bg-[linear-gradient(0.1deg,rgba(247,184,116,0.15)_0%,rgba(97,97,97,0.09)_100%)] p-8 rounded-lg border border-white/10 hover:border-theme/50 transition duration-300">
        <div class="w-12 h-12 bg-theme rounded-full flex items-center justify-center mb-6 text-white">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
          </svg>
        </div>
        <h3 class="font-poppins text-xl font-semibold tracking-wider mb-3">
          Golden Visa Support
        </h3>
        <p class="text-[#FFFFFF99] md:text-base text-sm leading-relaxed tracking-wider">
          Assistance with application and eligibility for the UAE 10-year Golden Visa through property ownership, including family sponsorship and renewal guidance.
        </p>
      </div>

      <!-- Service 2 -->
      <div class="bg-[linear-gradient(0.1deg,rgba(247,184,116,0.15)_0%,rgba(97,97,97,0.09)_100%)] p-8 rounded-lg border border-white/10 hover:border-theme/50 transition duration-300">
        <div class="w-12 h-12 bg-theme rounded-full flex items-center justify-center mb-6 text-white">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
          </svg>
        </div>
        <h3 class="font-poppins text-xl font-semibold tracking-wider mb-3">
          Mortgage Advisory
        </h3>
        <p class="text-[#FFFFFF99] md:text-base text-sm leading-relaxed tracking-wider">
          Expert mortgage consultation, connecting you with top UAE banks for the best rates and helping you understand payment plans and eligibility criteria.
        </p>
      </div>

      <!-- Service 3 -->
      <div class="bg-[linear-gradient(0.1deg,rgba(247,184,116,0.15)_0%,rgba(97,97,97,0.09)_100%)] p-8 rounded-lg border border-white/10 hover:border-theme/50 transition duration-300">
        <div class="w-12 h-12 bg-theme rounded-full flex items-center justify-center mb-6 text-white">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
          </svg>
        </div>
        <h3 class="font-poppins text-xl font-semibold tracking-wider mb-3">
          Legal & Compliance Guidance
        </h3>
        <p class="text-[#FFFFFF99] md:text-base text-sm leading-relaxed tracking-wider">
          Full support with contract review, safe transfer of funds, and developer due diligence for off-plan and resale properties.
        </p>
      </div>

      <!-- Service 4 -->
      <div class="bg-[linear-gradient(0.1deg,rgba(247,184,116,0.15)_0%,rgba(97,97,97,0.09)_100%)] p-8 rounded-lg border border-white/10 hover:border-theme/50 transition duration-300">
        <div class="w-12 h-12 bg-theme rounded-full flex items-center justify-center mb-6 text-white">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
          </svg>
        </div>
        <h3 class="font-poppins text-xl font-semibold tracking-wider mb-3">
          Ownership & Move-in Services
        </h3>
        <p class="text-[#FFFFFF99] md:text-base text-sm leading-relaxed tracking-wider">
          Help with property registration, title deed transfer, DEWA & utility activation, and move-in coordination including snagging support.
        </p>
      </div>
    </div>
  </div>
</section>

<?php 
// CTA Section
get_template_part('template-parts/cta', null, [
    'title' => 'Ready to Sell Your Property?',
    'text' => 'Get a complimentary property valuation and discover how we can maximize your property\'s potential.',
    'image' => 'https://lightyellow-hippopotamus-770612.hostingersite.com/wp-content/uploads/2025/12/Testimonals.png',
    'buttons' => [
        [
            'text' => 'Request a Private Consultation',
            'url' => '#',
            'style' => 'gradient'
        ]
    ]
]);
?>

<?php get_footer(); ?>
