<?php
/**
 * Template Name: Our Services Page
 */

get_header();

// Hero Section
get_template_part('template-parts/hero', null, [
    'title' => 'OUR <span class="text-theme">SERVICES</span>',
    'subtitle' => 'We offer a wide range of real estate services to meet your needs.',
    'image' => 'https://images.unsplash.com/photo-1560518883-ce09059eeffa?auto=format&fit=crop&q=80&w=2670', // External URL remains unchanged
    'buttons' => [] 
]);
?>

  <section class="py-16 lg:py-20">
      <div class="container px-4">
        <div class="text-center pb-8 md:pb-16">
          <h2 class="font-playfair text-h2-custom font-bold text-dark mb-4 uppercase">
            EXPERTISE <span class="text-theme">AT EVERY STAGE</span>
          </h2>
          <p class="text-[#767C8C] md:text-lg text-base max-w-2xl mx-auto leading-relaxed">
            Our team offers valuation expertise, market consultancy, and end-to-end property management.
          </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 md:gap-5">
          <div class="group bg-white rounded-lg shadow-[0_0_24px_0_#00000014] transition-all duration-300 overflow-hidden">
            <div class="md:h-[359px] h-[280px] relative">
              <img
                src="<?php echo get_template_directory_uri(); ?>/assets/images/house-keychain.webp"
                alt="Valuation"
                class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105"
              />
            </div>
            <div class="p-5">
              <div class="w-12 h-12 rounded-xl bg-[#EFE7D9] flex items-center justify-center mb-6">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/award.webp" class="w-7 h-7" alt="" />
              </div>
              <h3 class="font-bold text-lg font-poppins text-dark uppercase tracking-wide mb-3">VALUATION</h3>
              <p class="text-[#00291B] text-sm leading-relaxed mb-6 min-h-[48px]">
                Accurate, data-driven valuations supported by on-ground experience and transparent methodology.
              </p>
              <a href="<?php echo site_url('/valuation'); ?>" class="inline-flex items-center mb-3 justify-center px-6 py-3 bg-[#C19A5C] text-white text-sm rounded hover:bg-[#A38045] transition-colors w-full sm:w-auto">
                Request Valuation
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                </svg>
              </a>
            </div>
          </div>

          <div class="group bg-white rounded-lg shadow-[0_0_24px_0_#00000014] transition-all duration-300 overflow-hidden">
            <div class="md:h-[359px] h-[280px] relative">
              <img
                src="<?php echo get_template_directory_uri(); ?>/assets/images/highfive.webp"
                alt="Consultancy"
                class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105"
              />
            </div>
            <div class="p-5">
              <div class="w-12 h-12 rounded-xl bg-[#EFE7D9] flex items-center justify-center mb-6">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/award.webp" class="w-7 h-7" alt="" />
              </div>
              <h3 class="font-bold text-lg font-poppins text-dark uppercase tracking-wide mb-3">CONSULTANCY</h3>
              <p class="text-[#00291B] text-sm leading-relaxed mb-6 min-h-[48px]">
                Strategic guidance for acquisitions, disposals, portfolio planning, and market entry, tailored to your goals.
              </p>
              <a  href="<?php echo site_url('/consultancy'); ?>" class="inline-flex items-center mb-3 justify-center px-6 py-3 bg-[#C19A5C] text-white text-sm rounded hover:bg-[#A38045] transition-colors w-full sm:w-auto">
                Speak With an Advisor
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                </svg>
              </a>
            </div>
          </div>

          <div class="group bg-white rounded-lg shadow-[0_0_24px_0_#00000014] transition-all duration-300 overflow-hidden">
            <div class="md:h-[359px] h-[280px] relative">
              <img
                src="<?php echo get_template_directory_uri(); ?>/assets/images/calculator.webp"
                alt="Mortgage Services"
                class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105"
              />
            </div>
            <div class="p-5">
              <div class="w-12 h-12 rounded-xl bg-[#EFE7D9] flex items-center justify-center mb-6">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/award.webp" class="w-7 h-7" alt="" />
              </div>
              <h3 class="font-bold text-lg font-poppins text-dark uppercase tracking-wide mb-3">MORTGAGE SERVICES</h3>
              <p class="text-[#00291B] text-sm leading-relaxed mb-6">
                Straightforward mortgage guidance for buyers and investors.
              </p>
              <a  href="<?php echo site_url('/mortgage'); ?>" class="inline-flex items-center mb-3 justify-center px-6 py-3 bg-[#C19A5C] text-white text-sm rounded hover:bg-[#A38045] transition-colors w-full sm:w-auto">
                Speak to a Mortgage Advisor
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                </svg>
              </a>
            </div>
          </div>

          <div class="group bg-white rounded-lg shadow-[0_0_24px_0_#00000014] transition-all duration-300 overflow-hidden">
            <div class="md:h-[359px] h-[280px] relative">
              <img
                src="<?php echo get_template_directory_uri(); ?>/assets/images/buildings.webp"
                alt="Valuation"
                class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105"
              />
            </div>
            <div class="p-5">
              <div class="w-12 h-12 rounded-xl bg-[#EFE7D9] flex items-center justify-center mb-6">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/award.webp" class="w-7 h-7" alt="" />
              </div>
              <h3 class="font-bold text-lg font-poppins text-dark uppercase tracking-wide mb-3">MANAGEMENT</h3>
              <p class="text-[#00291B] text-sm leading-relaxed mb-6 min-h-[48px]">
                Quiet, reliable management designed to protect your asset and deliver consistent performance.
              </p>
              <a  href="<?php echo site_url('/property-management'); ?>" class="inline-flex items-center mb-3 justify-center px-6 py-3 bg-[#C19A5C] text-white text-sm rounded hover:bg-[#A38045] transition-colors w-full sm:w-auto">
                Explore Management
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                </svg>
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>

     <?php get_template_part('template-parts/section-team'); ?>


    <section class="py-20 lg:py-28 bg-white">
      <div class="container">
        <div class="flex flex-col md:flex-row justify-between md:items-center items-start mb-8 md:mb-16 gap-8">
          <div class="w-full">
            <h2 class="font-playfair text-h2-custom font-bold uppercase leading-tight text-dark">
              COMPREHENSIVE MARKET <br />
              <span class="text-theme">PERFORMANCE ANALYSIS</span>
            </h2>
          </div>
          <div class="max-w-md">
            <p class="text-[#474C59] text-base leading-relaxed">
              Comprehensive, Real-Time Insights and Data Driven Trends from the Local Real Estate Market to Help Buyers, Sellers, and Investors Make Smarter Decisions.
            </p>
          </div>
        </div>

        <div class="flex flex-col lg:flex-row gap-8 lg:gap-16 items-center">
          <div class="w-full lg:w-1/2">
            <div class="rounded-2xl overflow-hidden shadow-lg h-full">
              <img
                src="<?php echo get_template_directory_uri(); ?>/assets/images/house.webp"
                alt="Market Performance"
                class="w-full h-full object-cover min-h-[280px]"
              />
            </div>
          </div>

          <div class="w-full lg:w-1/2">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
              <div class="bg-white p-8 rounded-2xl shadow-[0_0_24px_0_#0000000F] text-center border border-gray-50 flex flex-col justify-center items-center h-[200px]">
                <h3 class="font-poppins text-2xl md:text-4xl font-semibold text-dark mb-2">500+</h3>
                <p class="text-[#767C8C] text-base md:text-lg font-medium">Properties Managed</p>
              </div>
              <div class="bg-white p-8 rounded-2xl shadow-[0_0_24px_0_#0000000F] text-center border border-gray-50 flex flex-col justify-center items-center h-[200px]">
                <h3 class="font-poppins text-2xl md:text-4xl font-semibold text-dark mb-2">AED 2B+</h3>
                <p class="text-[#767C8C] text-base md:text-lg font-medium">Transaction Value</p>
              </div>
              <div class="bg-white p-8 rounded-2xl shadow-[0_0_24px_0_#0000000F] text-center border border-gray-50 flex flex-col justify-center items-center h-[200px]">
                <h3 class="font-poppins text-2xl md:text-4xl font-semibold text-dark mb-2">98%</h3>
                <p class="text-[#767C8C] text-base md:text-lg font-medium">Client Satisfaction</p>
              </div>
              <div class="bg-white p-8 rounded-2xl shadow-[0_0_24px_0_#0000000F] text-center border border-gray-50 flex flex-col justify-center items-center h-[200px]">
                <h3 class="font-poppins text-2xl md:text-4xl font-semibold text-dark mb-2">10+</h3>
                <p class="text-[#767C8C] text-base md:text-lg font-medium">Years Experience</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

<?php 
get_template_part('template-parts/cta', null, [
    'title' => 'Ready to Get Started?',
	'image' => 'https://lightyellow-hippopotamus-770612.hostingersite.com/wp-content/uploads/2025/12/Testimonals.png',
    'text' => 'Connect with our team to discuss how we can support your property goals with clarity and expertise.',
    'buttons' => [
        [
            'text' => 'Request a Consultation',
            'url' => site_url('/consultancy'),
            'style' => 'gradient'
        ]
    ]
]);

get_footer(); 
?>