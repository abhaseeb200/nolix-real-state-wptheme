<?php
/**
 * Template Name: Valuation Page
 */

get_header();

// Hero Section
get_template_part('template-parts/hero', null, [
    'title' => 'Accurate, data<span class="font-poppins">-</span>driven valuations supported by <span class="text-theme">on<span class="font-poppins">-</span>ground experience and transparent methodology</span>',
    'subtitle' => 'Our valuations combine transaction data, community trends, property condition, and buyer demand. We give you a clear, realistic understanding of your assets current market value.',
	'image' => get_template_directory_uri() . '/assets/images/contract.webp',
    'buttons' => []
]);
?>
<!-- Why Accurate Valuation Matters -->
<section class="py-20 bg-[#F5F6FA] font-poppins text-black" data-aos="fade-up">
  <div class="container">
    <div class="text-center mb-8 md:mb-16" data-aos="fade-up">
      <h2 class="font-playfair uppercase text-h2-custom font-bold mb-5">
        <span class="text-black">Why Accurate </span><span class="text-theme">Valuation Matters</span>
      </h2>
      <p class="text-[#767C8C] text-base md:text-[20px] max-w-xl mx-auto">
        A refined valuation ensures:
      </p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-6">
      <div class="text-center flex flex-col items-center" data-aos="fade-up" data-aos-delay="100">
        <div class="w-16 h-16 bg-theme rounded-full flex items-center justify-center mb-6 text-black">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/home-03.webp" class="w-8 h-8" alt="Positioning Icon" />
        </div>
        <h3 class="font-poppins md:text-lg font-semibold tracking-wider mb-3">
          Proper positioning <br />
          when selling
        </h3>
      </div>

      <div class="text-center flex flex-col items-center" data-aos="fade-up" data-aos-delay="200">
        <div class="w-16 h-16 bg-theme rounded-full flex items-center justify-center mb-6 text-black">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/line-chart-up.webp" class="w-8 h-8" alt="Negotiation Leverage Icon" />
        </div>
        <h3 class="font-poppins md:text-lg font-semibold tracking-wider mb-3">
          Strong negotiation <br />
          leverage
        </h3>
      </div>

      <div class="text-center flex flex-col items-center" data-aos="fade-up" data-aos-delay="300">
        <div class="w-16 h-16 bg-theme rounded-full flex items-center justify-center mb-6 text-black">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/clock.webp" class="w-8 h-8" alt="Timeline Icon" />
        </div>
        <h3 class="font-poppins md:text-lg font-semibold tracking-wider mb-3">
          Realistic <br />
          timelines
        </h3>
      </div>

      <div class="text-center flex flex-col items-center" data-aos="fade-up" data-aos-delay="400">
        <div class="w-16 h-16 bg-theme rounded-full flex items-center justify-center mb-6 text-white">
          <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path>
          </svg>
        </div>
        <h3 class="font-poppins md:text-lg font-semibold tracking-wider mb-3">
          Informed decisions for refinancing <br />
          or rental planning
        </h3>
      </div>

      <div class="text-center flex flex-col items-center md:col-span-2 lg:col-span-1" data-aos="fade-up" data-aos-delay="500">
        <div class="w-16 h-16 bg-theme rounded-full flex items-center justify-center mb-6 text-black">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/shield-02.webp" class="w-8 h-8" alt="Protection Icon" />
        </div>
        <h3 class="font-poppins md:text-lg font-semibold tracking-wide mb-3">
          Protection against underpricing or overpricing
        </h3>
      </div>
    </div>
  </div>
</section>
<!-- Methodology -->
<section class="py-20 lg:py-20 font-poppins bg-white" data-aos="fade-up">
  <div class="container px-4">
    <div class="flex flex-col lg:flex-row items-center gap-12 lg:gap-20">
      <div class="w-full lg:w-1/2 text-left" data-aos="fade-up">
        <span class="block text-theme font-bold tracking-wide mb-6 font-playfair text-lg">
          Methodology
        </span>
        <h2 class="font-playfair text-4xl lg:text-5xl font-medium leading-tight text-dark mb-5">
         Our Approach
        </h2>
        <p class="text-[#767C8C] md:text-base text-sm mb-5">
         Transparent, analytical, and aligned with the UAEs market realities.
        </p>
        <ul class="space-y-2 text-[#767C8C] text-sm md:text-lg font-light leading-relaxed font-poppins">
          <li class="flex items-start px-2 py-2 border border-[#EBEDF0] rounded-[16px] gap-3">
            <div class="bg-theme rounded-full flex justify-center w-6 h-6">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/check-circle.webp" alt="Check Icon" class="w-4 h-4 mt-1 flex-shrink-0" />
            </div>
            <span class="text-[#767C8C] md:text-lg text-sm">Recent comparable sales</span>
          </li>
          <li class="flex items-start px-2 py-2 border border-[#EBEDF0] rounded-[16px] gap-3">
            <div class="bg-theme rounded-full flex justify-center w-6 h-6">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/check-circle.webp" alt="Check Icon" class="w-4 h-4 mt-1 flex-shrink-0" />
            </div>
            <span class="text-[#767C8C] md:text-lg text-sm">Live buyer demand</span>
          </li>
          <li class="flex items-start px-2 py-2 border border-[#EBEDF0] rounded-[16px] gap-3">
            <div class="bg-theme rounded-full flex justify-center w-6 h-6">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/check-circle.webp" alt="Check Icon" class="w-4 h-4 mt-1 flex-shrink-0" />
            </div>
            <span class="text-[#767C8C] md:text-lg text-sm">Community performance and pricing forecasts</span>
          </li>
          <li class="flex items-start px-2 py-2 border border-[#EBEDF0] rounded-[16px] gap-3">
            <div class="bg-theme rounded-full flex justify-center w-6 h-6">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/check-circle.webp" alt="Check Icon" class="w-4 h-4 mt-1 flex-shrink-0" />
            </div>
            <span class="text-[#767C8C] md:text-lg text-sm">Property condition and upgrades</span>
          </li>
          <li class="flex items-start px-2 py-2 border border-[#EBEDF0] rounded-[16px] gap-3">
            <div class="bg-theme rounded-full flex justify-center w-6 h-6">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/check-circle.webp" alt="Check Icon" class="w-4 h-4 mt-1 flex-shrink-0" />
            </div>
            <span class="text-[#767C8C] md:text-lg text-sm">Unique attributes (layout, view, elevation, plot advantages)</span>
          </li>
        </ul>
      </div>

      <div class="w-full lg:w-1/2 relative" data-aos="fade-up">
        <div class="relative md:ml-0 ml-5">
          <div class="rounded-2xl md:mr-0 mr-[18px] sm:p-4 p-0 z-10 relative before:content-[''] before:bg-transparent before:w-[90%] before:h-[92%] before:absolute before:border-2 before:border-theme before:rounded-[16px] before:top-[48px] md:before:left-[-6px] before:left-[-18px] before:z-[-1] after:content-[''] after:bg-transparent lg:after:w-[90%] lg:after:h-[92%] after:absolute after:border-2 after:border-theme after:rounded-[16px] after:bottom-[48px] md:after:right-[-6px] after:right-[-18px] after:z-[-1]">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/our-approach.webp" alt="Our Valuation Approach" class="h-[240px] md:h-[443px] rounded-lg w-full shadow-2xl md:w-[553px] object-cover" />
          </div>
        </div>
        <div class="absolute md:-bottom-5 px-5 -bottom-3 md:left-0 left-8 bg-navy text-white py-4 rounded-xl shadow-xl z-20 max-w-[420px]" data-aos="fade-up" data-aos-delay="300">
          <h1 class="text-theme text-2xl mb-3 font-bold">500+</h1>
          <p class="font-poppins text-base md:text-xl">Properties Valued</p>
        </div>
      </div>
    </div>
  </div>
</section>

<?php 
// CTA Section
get_template_part('template-parts/cta', null, [
    'title' => 'Request Your Valuation',
	'image' => get_template_directory_uri() . '/assets/images/flyover with glowing light.webp', 
    'text' => 'A senior advisor will contact you personally to discuss your property, goals and guides you with clear, practical advice.',
    'buttons' => [
        [
            'text' => 'Request Valuation',
            'url' => site_url('/sell-your-property-in-the-uae'),
            'style' => 'gradient'
        ],
		[
            'text' => 'Learn More',
            'url' => site_url('/services/consultancy'),
            'style' => 'white'
        ]
    ]
]);
?>

<?php get_footer(); ?>
