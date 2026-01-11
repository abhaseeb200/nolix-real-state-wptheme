<?php
/**
 * Template Name: Team Page (About us / Meet the Team)
 */

get_header();

// Hero Section
get_template_part('template-parts/hero', null, [
    'title' => 'ABOUT US / <span class="text-theme">MEET THE TEAM</span>',
    'subtitle' => 'Nolix is a premier real estate agency in Dubai, dedicated to providing exceptional service. Meet our experienced team of professionals.',
    'image' => 'https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&q=80&w=2670', // Placeholder or generic
    'buttons' => [] 
]);
?>
<section class="py-20 lg:py-28 bg-[#F5F6FA]">
  <div class="container px-4">
    <div class="flex flex-col lg:flex-row items-center gap-12 lg:gap-20">
      <div class="w-full lg:w-1/2 text-left">
        <span class="block text-theme font-bold tracking-wide uppercase mb-6 font-playfair text-lg">
          Our Philosophy
        </span>
        <h2 class="font-playfair text-4xl lg:text-5xl font-medium leading-tight text-dark mb-8">
          NOLIX exists to serve clients who prefer depth over pushy sales.
        </h2>
        <div class="space-y-6 text-[#767C8C] text-sm md:text-lg font-light leading-relaxed font-poppins">
          <p>
            We believe that fewer clients and deeper relationships produce
            better outcomes than volume-driven transactions.
          </p>
          <p>
            Every property in our portfolio is hand-selected. Every client
            receives tailored guidance. Every transaction is managed with
            care from initial inquiry through handover and beyond.
          </p>
        </div>
      </div>

      <div class="w-full lg:w-1/2 relative">
        <div class="relative md:ml-0 ml-5">
          <div
            class="rounded-2xl sm:p-4 p-0 z-10 relative before:content-[''] before:bg-transparent before:w-[90%] before:h-[92%] before:flex before:absolute before:border-2 before:border-theme before:rounded-[16px] before:top-[48px] md:before:left-[-6px] before:left-[-18px] before:z-[-1]">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/our-philosophy.webp" alt="Academy"
              class="h-[240px] md:h-[443px] rounded-lg shadow-2xl md:w-[553px] object-cover" />
          </div>
        </div>

        <div
          class="absolute md:-bottom-12 -bottom-3 md:left-3 left-8 bg-navy text-white p-4 rounded-xl shadow-xl z-20 max-w-[420px]">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/apostrophe.webp" class="w-[20px] h-[20px] mb-2" alt="" />
          <p class="font-poppins text-base md:text-xl">
            Quality over quantity, always.
          </p>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="py-20 lg:py-28 bg-white">
  <div class="container">
    <div class="text-center pb-8 md:pb-16">
      <h2 class="font-playfair text-h2-custom font-bold text-dark mb-4 uppercase">
        OUR <span class="text-theme">CORE VALUES</span>
      </h2>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 lg:px-10">
      <div
        class="p-10 bg-white shadow-[0_0_24px_0_#00000014] rounded-2xl transition-all duration-300 hover:-translate-y-1">
        <div class="w-16 h-16 bg-[#EFE7D9] rounded-xl flex items-center justify-center mb-6">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/heart.webp" alt="Depth Over Volume" class="w-8 h-8 opacity-80" />
        </div>
        <h3 class="font-poppins text-xl font-bold mb-4 text-dark">
          Depth Over Volume
        </h3>
        <p class="text-[#767C8C] text-[16px] leading-relaxed font-light">
          Fewer clients, deeper relationships. We believe this approach
          produces better outcomes than volume-driven transactions.
        </p>
      </div>

      <div
        class="p-10 bg-white shadow-[0_0_24px_0_#00000014] rounded-2xl transition-all duration-300 hover:-translate-y-1">
        <div class="w-16 h-16 bg-[#EFE7D9] rounded-xl flex items-center justify-center mb-6">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/shield.webp" alt="Hand-Selected Portfolio" class="w-8 h-8 opacity-80" />
        </div>
        <h3 class="font-poppins text-xl font-bold mb-4 text-dark">
          Hand-Selected Portfolio
        </h3>
        <p class="text-[#767C8C] text-[16px] leading-relaxed font-light">
          Every property in our portfolio is carefully chosen. We curate,
          not collect.
        </p>
      </div>

      <div
        class="p-10 bg-white shadow-[0_0_24px_0_#00000014] rounded-2xl transition-all duration-300 hover:-translate-y-1">
        <div class="w-16 h-16 bg-[#EFE7D9] rounded-xl flex items-center justify-center mb-6">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/users.png" alt="Tailored Guidance" class="w-8 h-8 opacity-80" />
        </div>
        <h3 class="font-poppins text-xl font-bold mb-4 text-dark">
          Tailored Guidance
        </h3>
        <p class="text-[#767C8C] text-[16px] leading-relaxed font-light">
          Each client receives personalized advisory. No templated
          responses, no generic solutions.
        </p>
      </div>

      <div
        class="p-10 bg-white shadow-[0_0_24px_0_#00000014] rounded-2xl transition-all duration-300 hover:-translate-y-1">
        <div class="w-16 h-16 bg-[#EFE7D9] rounded-xl flex items-center justify-center mb-6">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/award.webp" alt="End-to-End Care" class="w-8 h-8 opacity-80" />
        </div>
        <h3 class="font-poppins text-xl font-bold mb-4 text-dark">
          End-to-End Care
        </h3>
        <p class="text-[#767C8C] text-[16px] leading-relaxed font-light">
          Every transaction is managed with care from initial inquiry
          through handover and beyond.
        </p>
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
          Comprehensive, Real-Time Insights and Data Driven Trends from the
          Local Real Estate Market to Help Buyers, Sellers, and Investors
          Make Smarter Decisions.
        </p>
      </div>
    </div>

    <div class="flex flex-col lg:flex-row gap-8 lg:gap-16 items-center">
      <div class="w-full lg:w-1/2">
        <div class="rounded-2xl overflow-hidden shadow-lg h-full">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/house.webp" alt="Market Performance" class="w-full h-full object-cover min-h-[280px]" />
        </div>
      </div>

      <div class="w-full lg:w-1/2">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
          <div class="bg-white p-8 rounded-2xl shadow-[0_0_24px_0_#00000014] text-center border border-gray-50 flex flex-col justify-center items-center h-[200px]">
            <h3 class="font-poppins text-2xl md:text-4xl font-semibold text-dark mb-2">500+</h3>
            <p class="text-[#767C8C] text-base md:text-lg font-medium">Properties Managed</p>
          </div>
          <div class="bg-white p-8 rounded-2xl shadow-[0_0_24px_0_#00000014] text-center border border-gray-50 flex flex-col justify-center items-center h-[200px]">
            <h3 class="font-poppins text-2xl md:text-4xl font-semibold text-dark mb-2">AED 2B+</h3>
            <p class="text-[#767C8C] text-base md:text-lg font-medium">Transaction Value</p>
          </div>
          <div class="bg-white p-8 rounded-2xl shadow-[0_0_24px_0_#00000014] text-center border border-gray-50 flex flex-col justify-center items-center h-[200px]">
            <h3 class="font-poppins text-2xl md:text-4xl font-semibold text-dark mb-2">98%</h3>
            <p class="text-[#767C8C] text-base md:text-lg font-medium">Client Satisfaction</p>
          </div>
          <div class="bg-white p-8 rounded-2xl shadow-[0_0_24px_0_#00000014] text-center border border-gray-50 flex flex-col justify-center items-center h-[200px]">
            <h3 class="font-poppins text-2xl md:text-4xl font-semibold text-dark mb-2">10+</h3>
            <p class="text-[#767C8C] text-base md:text-lg font-medium">Years Experience</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php 
// CTA Section
get_template_part('template-parts/cta', null, [
    'title' => 'Ready to Work With Us?',
    'text' => "Whether you're buying, selling, or investing, our team is here to provide the guidance and expertise you deserve.",
	'image' => get_template_directory_uri() . '/assets/images/flyover with glowing light.webp', 
    'buttons' => [
        [
            'text' => 'Explore Our Services',
            'url' => site_url('/services'),
            'style' => 'gradient'
        ],
		 [
            'text' => 'Request a Consultation',
            'url' => site_url('/services/consultancy'),
            'style' => 'white'
        ]
    ]
]);
?>

<?php get_footer(); ?>

