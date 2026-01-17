<?php
/**
 * Template Name: Sell Page
 */

get_header(); 

// Hero Section
get_template_part('template-parts/hero', null, [
    'title' => 'Sell Your Property<br><span class="text-theme">With Confidence</span>',
    'subtitle' => 'Expert advisory, premium positioning, and access to qualified buyers',
     'image' => get_template_directory_uri() . '/assets/images/house-property.webp',
    'buttons' => []
]);
?>

<!-- Why Sell With Nolix -->
<section class="py-16 lg:py-24 bg-[#F5F6FA]" data-aos="fade-up">
  <div class="container mx-auto px-6">
    <div class="text-center sm:mb-16 mb-8" data-aos="fade-up">
      <h2 class="font-playfair text-h2-custom font-bold text-dark mb-5 uppercase">Why Sell With Nolix</h2>
      <p class="text-[#474C59] md:text-[20px] text-sm tracking-wide mx-auto">Premium service that positions your property for maximum value</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
      <!-- Card 1 -->
      <div class="py-16 px-8 bg-white shadow-[0_0_24px_0_#00000014] text-center rounded-lg overflow-hidden transition-all duration-300 hover:-translate-y-1" data-aos="fade-up" data-aos-delay="100">
        <div class="w-16 h-16 bg-[#EFE7D9] rounded-lg flex items-center justify-center mx-auto mb-6 group-hover:bg-theme group-hover:text-white transition-colors duration-300 text-theme">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z" />
          </svg>
        </div>
        <h3 class="font-poppins text-xl font-bold mb-3 text-dark">Premium Marketing</h3>
        <p class="text-[#767C8C] md:text-[20px] text-sm leading-relaxed">Professional photography, 3D virtual tours, and targeted digital campaigns across major property portals. Your listing reaches thousands of qualified buyers through our multi-channel marketing
approach.
</p>
      </div>

      <!-- Card 2 -->
      <div class="py-16 px-8 bg-white shadow-[0_0_24px_0_#00000014] text-center rounded-lg overflow-hidden transition-all duration-300 hover:-translate-y-1" data-aos="fade-up" data-aos-delay="200">
        <div class="w-16 h-16 bg-[#EFE7D9] rounded-lg flex items-center justify-center mx-auto mb-6 group-hover:bg-theme group-hover:text-white transition-colors duration-300 text-theme">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
          </svg>
        </div>
        <h3 class="font-poppins text-xl font-bold mb-3 text-dark">Qualified Buyers</h3>
        <p class="text-[#767C8C] md:text-[20px] text-sm leading-relaxed">Access to our curated database of verified, serious buyers actively searching for properties like yours. Pre-qualified clients mean faster sales and fewer time-wasters.
</p>
      </div>

      <!-- Card 3 -->
      <div class="py-16 px-8 bg-white shadow-[0_0_24px_0_#00000014] text-center rounded-lg overflow-hidden transition-all duration-300 hover:-translate-y-1" data-aos="fade-up" data-aos-delay="300">
        <div class="w-16 h-16 bg-[#EFE7D9] rounded-lg flex items-center justify-center mx-auto mb-6 group-hover:bg-theme group-hover:text-white transition-colors duration-300 text-theme">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
          </svg>
        </div>
        <h3 class="font-poppins text-xl font-bold mb-3 text-dark">Expert Negotiation</h3>
        <p class="text-[#767C8C] md:text-[20px] text-sm leading-relaxed">Data-led pricing strategy combined with skilled negotiation to maximize your property value. Our team secures the best possible terms while ensuring a smooth transaction.
</p>
      </div>
    </div>
  </div>
</section>

<!-- The Selling Process -->
<section class="py-20 bg-navy text-white" data-aos="fade-up">
	  <div class="container mx-auto px-6 lg:px-12">
          <div class="text-center sm:mb-16 mb-8" data-aos="fade-up">
      <h2 class="font-playfair text-h2-custom font-bold mb-4"><span class="text-white">THE </span><span class="text-theme">SELLING PROCESS</span></h2>
      <p class="text-[#F0F1F5] text-p-custom max-w-2xl mx-auto">A streamlined journey from listing to successful sale</p>
    </div>

        <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-5 gap-6">
          <!-- Step 1 -->
            <div class="" data-aos="fade-up" data-aos-delay="100">
          <div class="bg-[linear-gradient(0.1deg,rgba(247,184,116,0.15)_0%,rgba(97,97,97,0.09)_100%)] h-full p-5 rounded-lg border border-white/10 hover:border-theme/50 transition duration-300">
            <h3 class="font-poppins text-3xl font-bold mb-4 text-white">01</h3>
            <h4 class="font-poppins text-xl font-semibold tracking-wider mb-4 text-white pl-1">Property Valuation</h4>
            <p class="text-[#FFFFFF99] md:text-[15px] text-sm leading-relaxed tracking-wide pl-1">Free assessment by certified experts analyzing comparable sales, market trends, and unique property features to determine optimal pricing.</p>
          </div>
        </div>
          <!-- Step 2 -->
          <div class="h-full" data-aos="fade-up" data-aos-delay="200">
          <div class="bg-[linear-gradient(0.1deg,rgba(247,184,116,0.15)_0%,rgba(97,97,97,0.09)_100%)] h-full p-5 rounded-lg border border-white/10 hover:border-theme/50 transition duration-300">
            <h3 class="font-poppins text-3xl font-bold mb-4 text-white">02</h3>
            <h4 class="font-poppins text-xl font-semibold tracking-wider mb-4 text-white pl-1">Marketing Plan</h4>
            <p class="text-[#FFFFFF99] md:text-[15px] text-sm leading-relaxed tracking-wide pl-1">Tailored strategy for your property including professional media production, listing optimization, and targeted promotion to reach the right buyers.</p>
          </div>
        </div>
          <!-- Step 3 -->
       <div class="bg-[linear-gradient(0.1deg,rgba(247,184,116,0.15)_0%,rgba(97,97,97,0.09)_100%)] p-5 rounded-lg border border-white/10 hover:border-theme/50 transition duration-300" data-aos="fade-up" data-aos-delay="300">
            <h3 class="font-poppins text-3xl font-bold mb-4 text-white">03</h3>
            <h4 class="font-poppins text-xl font-semibold tracking-wider mb-4 text-white pl-1">Viewings</h4>
            <p class="text-[#FFFFFF99] md:text-[15px] text-sm leading-relaxed tracking-wide pl-1">Coordinated showings with pre-qualified buyers at times convenient for you. We handle all scheduling, screening, and follow-ups.</p>
          </div>
<!--         </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6 lg:w-2/3 mx-auto"> -->
          <!-- Step 4 -->
          <div class="bg-[linear-gradient(0.1deg,rgba(247,184,116,0.15)_0%,rgba(97,97,97,0.09)_100%)] p-5 rounded-lg border border-white/10 hover:border-theme/50 transition duration-300" data-aos="fade-up" data-aos-delay="400">
            <h3 class="font-poppins text-3xl font-bold mb-4 text-white">04</h3>
            <h4 class="font-poppins text-xl font-semibold tracking-wider mb-4 text-white pl-1">Negotiation</h4>
            <p class="text-[#FFFFFF99] md:text-[15px] text-sm leading-relaxed tracking-wide pl-1">Expert handling of offers, counteroffers, and terms. We ensure you receive the best possible price while maintaining deal momentum.</p>
          </div>
          <!-- Step 5 -->
         <div class="bg-[linear-gradient(0.1deg,rgba(247,184,116,0.15)_0%,rgba(97,97,97,0.09)_100%)] p-5 rounded-lg border border-white/10 hover:border-theme/50 transition duration-300" data-aos="fade-up" data-aos-delay="500">
            <h3 class="font-poppins text-3xl font-bold mb-4 text-white">05</h3>
            <h4 class="font-poppins text-xl font-semibold tracking-wider mb-4 text-white pl-1">Completion</h4>
            <p class="text-[#FFFFFF99] md:text-[15px] text-sm leading-relaxed tracking-wide pl-1">Smooth handover with comprehensive legal support. We coordinate all documentation, payment transfers, and final property handover.</p>
          </div>
        </div>
      </div>
<!--     <div class="text-center sm:mb-16 mb-8">
      <h2 class="font-playfair text-h2-custom font-bold mb-4"><span class="text-white">THE </span><span class="text-theme">SELLING PROCESS</span></h2>
      <p class="text-[#F0F1F5] text-p-custom max-w-2xl mx-auto">A streamlined journey from listing to successful sale</p>
    </div> -->

    <!-- Timeline Steps -->
<!--     <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
      <!-- Step 1 -->
<!--         <div class="md:w-1/2 md:pr-16 mb-8 md:mb-0">
          <div class="bg-[linear-gradient(0.1deg,rgba(247,184,116,0.15)_0%,rgba(97,97,97,0.09)_100%)] p-5 rounded-lg border border-white/10 hover:border-theme/50 transition duration-300">
            <h3 class="font-poppins text-3xl font-bold mb-4 text-white">01</h3>
            <h4 class="font-poppins text-xl font-semibold tracking-wider mb-4 text-white pl-1">Property Valuation</h4>
            <p class="text-[#FFFFFF99] md:text-[15px] text-sm leading-relaxed tracking-wide pl-1">Free assessment by certified experts analyzing comparable sales, market trends, and unique property features to determine optimal pricing.</p>
          </div>
        </div>
      </div> -->

      <!-- Step 2 -->
<!--       <div class="relative md:flex items-center sm:mb-16 mb-8">
        <div class="md:w-1/2 md:pr-16 mb-8 md:mb-0"></div>
        <div class="absolute left-1/2 transform -translate-x-1/2 w-4 h-4 rounded-full hidden md:block border border-theme bg-theme shadow-[0_0_10px_rgba(193,154,92,0.5)]"></div>
        <div class="md:w-1/2 md:pl-16">
          <div class="bg-[linear-gradient(0.1deg,rgba(247,184,116,0.15)_0%,rgba(97,97,97,0.09)_100%)] p-5 rounded-lg border border-white/10 hover:border-theme/50 transition duration-300">
            <h3 class="font-poppins text-3xl font-bold mb-4 text-white">02</h3>
            <h4 class="font-poppins text-xl font-semibold tracking-wider mb-4 text-white pl-1">Marketing Plan</h4>
            <p class="text-[#FFFFFF99] md:text-[15px] text-sm leading-relaxed tracking-wide pl-1">Tailored strategy for your property including professional media production, listing optimization, and targeted promotion to reach the right buyers.</p>
          </div>
        </div>
      </div> -->
      
      <!-- Step 3, 4, 5 omitted for brevity but following same pattern -->
       <!-- Step 3 -->
<!--       <div class="relative md:flex items-center sm:mb-16 mb-8">
        <div class="md:w-1/2 md:pr-16 mb-8 md:mb-0">
          <div class="bg-[linear-gradient(0.1deg,rgba(247,184,116,0.15)_0%,rgba(97,97,97,0.09)_100%)] p-5 rounded-lg border border-white/10 hover:border-theme/50 transition duration-300">
            <h3 class="font-poppins text-3xl font-bold mb-4 text-white">03</h3>
            <h4 class="font-poppins text-xl font-semibold tracking-wider mb-4 text-white pl-1">Viewings</h4>
            <p class="text-[#FFFFFF99] md:text-[15px] text-sm leading-relaxed tracking-wide pl-1">Coordinated showings with pre-qualified buyers at times convenient for you. We handle all scheduling, screening, and follow-ups.</p>
          </div>
        </div>
        <div class="absolute left-1/2 transform -translate-x-1/2 w-4 h-4 rounded-full hidden md:block border border-theme bg-theme shadow-[0_0_10px_rgba(193,154,92,0.5)]"></div>
        <div class="md:w-1/2 md:pl-16"></div>
      </div>
	</div> -->

       <!-- Step 4 -->
<!--       <div class="relative md:flex items-center sm:mb-16 mb-8">
        <div class="md:w-1/2 md:pr-16 mb-8 md:mb-0"></div>
        <div class="absolute left-1/2 transform -translate-x-1/2 w-4 h-4 rounded-full hidden md:block border border-theme bg-theme shadow-[0_0_10px_rgba(193,154,92,0.5)]"></div>
        <div class="md:w-1/2 md:pl-16">
          <div class="bg-[linear-gradient(0.1deg,rgba(247,184,116,0.15)_0%,rgba(97,97,97,0.09)_100%)] p-5 rounded-lg border border-white/10 hover:border-theme/50 transition duration-300">
            <h3 class="font-poppins text-3xl font-bold mb-4 text-white">04</h3>
            <h4 class="font-poppins text-xl font-semibold tracking-wider mb-4 text-white pl-1">Negotiation</h4>
            <p class="text-[#FFFFFF99] md:text-[15px] text-sm leading-relaxed tracking-wide pl-1">Expert handling of offers, counteroffers, and terms. We ensure you receive the best possible price while maintaining deal momentum.</p>
          </div>
        </div>
      </div> -->

       <!-- Step 5 -->
<!--       <div class="relative md:flex items-center sm:mb-16 mb-8">
        <div class="md:w-1/2 md:pr-16 mb-8 md:mb-0">
          <div class="bg-[linear-gradient(0.1deg,rgba(247,184,116,0.15)_0%,rgba(97,97,97,0.09)_100%)] p-5 rounded-lg border border-white/10 hover:border-theme/50 transition duration-300">
            <h3 class="font-poppins text-3xl font-bold mb-4 text-white">05</h3>
            <h4 class="font-poppins text-xl font-semibold tracking-wider mb-4 text-white pl-1">Completion</h4>
            <p class="text-[#FFFFFF99] md:text-[15px] text-sm leading-relaxed tracking-wide pl-1">Smooth handover with comprehensive legal support. We coordinate all documentation, payment transfers, and final property handover.</p>
          </div>
        </div>
        <div class="absolute left-1/2 transform -translate-x-1/2 w-4 h-4 rounded-full hidden md:block border border-theme bg-theme shadow-[0_0_10px_rgba(193,154,92,0.5)]"></div>
        <div class="md:w-1/2 md:pl-16"></div>
      </div> -->
</section>

<!-- Recently Sold -->
<section class="py-16 lg:py-24 bg-white" data-aos="fade-up">
  <div class="container mx-auto px-6">
    <div class="text-center sm:mb-16 mb-8" data-aos="fade-up">
      <h2 class="font-playfair text-h2-custom font-bold text-dark mb-4 uppercase">RECENTLY SOLD</h2>
<!--       <p class="text-[#474C59] md:text-[18px] text-sm tracking-wide font-poppins">A track record of successful transactions</p> -->
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
      <!-- Sold Property Placeholder Card 1 -->
      <div class="group bg-white rounded-2xl overflow-hidden shadow-lg border border-[#C8CCD9]/50 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1" data-aos="fade-up" data-aos-delay="100">
        <div class="relative h-52 overflow-hidden">
          <img src="https://images.unsplash.com/photo-1545324418-cc1a3fa10c00?q=80&w=800&auto=format&fit=crop" alt="Sold Property" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" />
          <div class="absolute top-4 left-4 bg-[#C19A5C] text-white text-[10px] font-bold px-3 py-1.5 rounded uppercase tracking-wider">SOLD</div>
        </div>
        <div class="p-6">
          <div class="flex items-center gap-2 mb-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-theme" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
            </svg>
            <span class="text-sm font-medium text-gray-600">Downtown Dubai</span>
          </div>
          <h3 class="text-lg font-bold font-poppins text-dark mb-4">6 Bed Villa</h3>
          <div class="border-t border-[#C8CCD9] my-4"></div>
          <div class="flex justify-between items-end">
            <div class="font-bold md:text-lg text-sm text-dark">AED 28,000,000</div>
            <div class="text-right">
              <div class="text-xs text-black tracking-wider">DAYS ON MARKET</div>
              <div class="text-xl font-bold text-dark leading-none mt-1">45</div>
            </div>
          </div>
        </div>
      </div>
      
      <!-- More cards would go here based on dynamic loop if 'sold' status exists, using placeholders for now as per HTML -->
       <!-- Sold Property Placeholder Card 2 -->
      <div class="group bg-white rounded-2xl overflow-hidden shadow-lg border border-[#C8CCD9]/50 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1" data-aos="fade-up" data-aos-delay="200">
        <div class="relative h-52 overflow-hidden">
          <img src="https://images.unsplash.com/photo-1545324418-cc1a3fa10c00?q=80&w=800&auto=format&fit=crop" alt="Sold Property" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" />
          <div class="absolute top-4 left-4 bg-[#C19A5C] text-white text-[10px] font-bold px-3 py-1.5 rounded uppercase tracking-wider">SOLD</div>
        </div>
        <div class="p-6">
          <div class="flex items-center gap-2 mb-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-theme" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
            </svg>
            <span class="text-sm font-medium text-gray-600">Downtown Dubai</span>
          </div>
          <h3 class="text-lg font-bold font-poppins text-dark mb-4">6 Bed Villa</h3>
          <div class="border-t border-[#C8CCD9] my-4"></div>
          <div class="flex justify-between items-end">
            <div class="font-bold md:text-lg text-sm text-dark">AED 28,000,000</div>
            <div class="text-right">
              <div class="text-xs text-black tracking-wider">DAYS ON MARKET</div>
              <div class="text-xl font-bold text-dark leading-none mt-1">45</div>
            </div>
          </div>
        </div>
      </div>
      
       <!-- Sold Property Placeholder Card 3 -->
      <div class="group bg-white rounded-2xl overflow-hidden shadow-lg border border-[#C8CCD9]/50 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1" data-aos="fade-up" data-aos-delay="300">
        <div class="relative h-52 overflow-hidden">
          <img src="https://images.unsplash.com/photo-1545324418-cc1a3fa10c00?q=80&w=800&auto=format&fit=crop" alt="Sold Property" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" />
          <div class="absolute top-4 left-4 bg-[#C19A5C] text-white text-[10px] font-bold px-3 py-1.5 rounded uppercase tracking-wider">SOLD</div>
        </div>
        <div class="p-6">
          <div class="flex items-center gap-2 mb-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-theme" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
            </svg>
            <span class="text-sm font-medium text-gray-600">Downtown Dubai</span>
          </div>
          <h3 class="text-lg font-bold font-poppins text-dark mb-4">6 Bed Villa</h3>
          <div class="border-t border-[#C8CCD9] my-4"></div>
          <div class="flex justify-between items-end">
            <div class="font-bold md:text-lg text-sm text-dark">AED 28,000,000</div>
            <div class="text-right">
              <div class="text-xs text-black tracking-wider">DAYS ON MARKET</div>
              <div class="text-xl font-bold text-dark leading-none mt-1">45</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Testimonials -->
<section class="py-20 bg-[FAFAFA]" data-aos="fade-up">
  <div class="container mx-auto px-6">
    <div class="text-center sm:mb-16 mb-8" data-aos="fade-up">
      <h2 class="font-playfair text-h2-custom font-bold text-dark mb-4 uppercase">
        What Our <span class="text-theme">Sellers Say</span> 
      </h2>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8" data-aos="fade-up" data-aos-delay="100">
      <!-- Dynamic Testimonials Loop (filtering for sellers maybe?) -->
      <?php
      $seller_testimonials = new WP_Query(array(
          'post_type' => 'testimonial',
          'posts_per_page' => 3,
          'meta_key' => '_nolix_type',
          'meta_value' => 'sellers'
      ));

      if ($seller_testimonials->have_posts()) :
          while ($seller_testimonials->have_posts()) : $seller_testimonials->the_post();
              $headline = get_post_meta(get_the_ID(), '_nolix_headline', true);
              $role = get_post_meta(get_the_ID(), '_nolix_role', true);
              $thumb = get_the_post_thumbnail_url(get_the_ID(), 'thumbnail') ?: 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?ixlib=rb-1.2.1&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80';
              ?>
              <div class="p-8 bg-white border border-[#C8CCD9] rounded-lg shadow-sm">
                <?php if($headline): ?>
                    <!-- <h4 class="font-bold mb-2">"<?php echo esc_html($headline); ?>"</h4> -->
                <?php endif; ?>
                <div class="text-[#767C8C] mb-6 leading-relaxed">
                   "<?php echo wp_trim_words(get_the_content(), 20); ?>"
                </div>
                <div class="flex items-center gap-4">
                  <img src="<?php echo esc_url($thumb); ?>" alt="<?php the_title(); ?>" class="w-12 h-12 rounded-full object-cover">
                  <div>
                    <h4 class="font-bold text-dark font-poppins"><?php the_title(); ?></h4>
                    <p class="text-xs text-[#A4A7B0]"><?php echo esc_html($role); ?></p>
                  </div>
                </div>
              </div>
          <?php endwhile;
          wp_reset_postdata();
      else:
           // Fallback if no seller testimonials found
           ?>
           <div class="p-8 bg-white border border-[#C8CCD9] rounded-lg shadow-sm">
             <p class="text-[#767C8C] mb-6 leading-relaxed">"Sold above asking price within 6 weeks. The team's market knowledge was exceptional."</p>
             <div class="flex items-center gap-4">
               <div>
                 <h4 class="font-bold text-dark font-poppins">Michael T.</h4>
                 <p class="text-xs text-[#A4A7B0]">Palm Jumeirah</p>
               </div>
             </div>
           </div>
           <!-- Card 2 -->
           <div class="p-8 bg-white border border-[#C8CCD9] rounded-lg shadow-sm">
             <p class="text-[#767C8C] mb-6 leading-relaxed">"Professional, transparent, and always available. Made selling stress-free."</p>
             <div class="flex items-center gap-4">
               <div>
                 <h4 class="font-bold text-dark font-poppins">Sarah L.</h4>
                 <p class="text-xs text-[#A4A7B0]">Downtown Dubai</p>
               </div>
             </div>
           </div>
           <!-- Card 3 -->
           <div class="p-8 bg-white border border-[#C8CCD9] rounded-lg shadow-sm">
             <p class="text-[#767C8C] mb-6 leading-relaxed">"Their marketing strategy attracted serious buyers immediately. Highly recommended."</p>
             <div class="flex items-center gap-4">
               <div>
                 <h4 class="font-bold text-dark font-poppins">James R.</h4>
                 <p class="text-xs text-[#A4A7B0]">Dubai Marina</p>
               </div>
             </div>
           </div>
      <?php endif; ?>
    </div>
  </div>
</section>


<?php 
// CTA Section
get_template_part('template-parts/cta', null, [
    'title' => 'Ready to Sell Your Property?',
    'text' => 'Get a complimentary property valuation and discover how we can maximize your property\'s potential.',
     'image' => get_template_directory_uri() . '/assets/images/pexels-a-darmel-7642000.webp',
    'buttons' => [
        [
            'text' => 'Get Free Valuation',
 			'url' => site_url('/sell-your-property-in-the-uae/'),
            'style' => 'gradient'
        ],
        [
            'text' => 'Schedule a Call',
            'url' => site_url('/sell-your-property-in-the-uae/'),
            'style' => 'white'
        ]
    ]
]);

get_footer(); 
?>
