<?php
/**
 * Template Name: Valuation Page
 */

get_header();

// Hero Section
get_template_part('template-parts/hero', null, [
    'title' => 'Precise valuations for <br> <span class="text-theme">confident decisions</span>',
    'subtitle' => 'Our valuations combine transaction data, community trends, property condition, and buyer demand. We give you a clear, realistic understanding of your assets current market value.',
    'image' => 'https://images.unsplash.com/photo-1560518883-ce09059eeffa?auto=format&fit=crop&q=80&w=2670', // Placeholder
    'buttons' => []
]);
?>
<!-- Why Accurate Valuation Matters -->
<section class="py-20 bg-[#F5F6FA] font-poppins text-black">
  <div class="container">
    <div class="text-center mb-8 md:mb-16">
      <h2 class="font-playfair uppercase text-h2-custom font-bold mb-5">
        <span class="text-black">Why Accurate </span><span class="text-theme">Valuation Matters</span>
      </h2>
      <p class="text-[#767C8C] text-base md:text-[20px] max-w-xl mx-auto">
        A refined valuation ensures you make informed decisions at every
        stage of your property journey.
      </p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
      <div class="text-center flex flex-col items-center justify-center">
        <div class="w-16 h-16 bg-theme rounded-full flex items-center justify-center mb-6 text-black">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/message-chat-circle.webp" class="w-8 h-8" alt="Communication Icon" />
        </div>
        <h3 class="font-poppins md:text-xl font-semibold tracking-wider mb-3">
          Consistent <br />
          communication
        </h3>
      </div>

      <div class="text-center flex flex-col items-center justify-center">
        <div class="w-16 h-16 bg-theme rounded-full flex items-center justify-center mb-6 text-black">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/line-chart-up.webp" class="w-8 h-8" alt="Negotiation Leverage Icon" />
        </div>
        <h3 class="font-poppins md:text-xl font-semibold tracking-wider mb-3">
          Strong negotiation <br />
          leverage
        </h3>
      </div>

      <div class="text-center flex flex-col items-center justify-center">
        <div class="w-16 h-16 bg-theme rounded-full flex items-center justify-center mb-6 text-black">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/clock.webp" class="w-8 h-8" alt="Timeline Icon" />
        </div>
        <h3 class="font-poppins md:text-xl font-semibold tracking-wider mb-3">
          Realistic <br />
          timelines
        </h3>
      </div>

      <div class="text-center flex flex-col items-center justify-center">
        <div class="w-16 h-16 bg-theme rounded-full flex items-center justify-center mb-6 text-black">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/shield-02.webp" class="w-8 h-8" alt="Protection Icon" />
        </div>
        <h3 class="font-poppins md:text-xl font-semibold tracking-wide mb-3">
          Protection against underpricing or overpricing
        </h3>
      </div>
    </div>
  </div>
</section>
<!-- Methodology -->
<section class="py-20 lg:py-20 font-poppins bg-white">
  <div class="container px-4">
    <div class="flex flex-col lg:flex-row items-center gap-12 lg:gap-20">
      <div class="w-full lg:w-1/2 text-left">
        <span class="block text-theme font-bold tracking-wide uppercase mb-6 font-playfair text-lg">
          Methodology
        </span>
        <h2 class="font-playfair text-4xl lg:text-5xl font-medium leading-tight text-dark mb-5">
          What You Receive
        </h2>
        <p class="text-[#767C8C] md:text-base text-sm mb-5">
          Transparent, analytical, and aligned with the UAE's market
          realities. We evaluate your property using comprehensive data and
          on-ground expertise.
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

      <div class="w-full lg:w-1/2 relative">
        <div class="relative md:ml-0 ml-5">
          <div class="rounded-2xl sm:p-4 p-0 z-10 relative before:content-[''] before:bg-transparent before:w-[90%] before:h-[92%] before:absolute before:border-2 before:border-theme before:rounded-[16px] before:top-[48px] md:before:left-[-6px] before:left-[-18px] before:z-[-1] after:content-[''] after:bg-transparent after:w-[90%] after:h-[92%] after:absolute after:border-2 after:border-theme after:rounded-[16px] after:bottom-[48px] md:after:right-[-6px] after:right-[-18px] after:z-[-1]">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/our-approach.webp" alt="Our Valuation Approach" class="h-[240px] md:h-[443px] rounded-lg w-full shadow-2xl md:w-[553px] object-cover" />
          </div>
        </div>
        <div class="absolute md:-bottom-5 px-5 -bottom-3 md:left-0 left-8 bg-navy text-white py-4 rounded-xl shadow-xl z-20 max-w-[420px]">
          <h1 class="text-theme text-2xl mb-3 font-bold">500+</h1>
          <p class="font-poppins text-base md:text-xl">Properties Valued</p>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Request Your Valuation -->
<section
      class="relative py-20 font-poppins lg:py-28 bg-cover bg-center bg-no-repeat"
      style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/form-bg.webp')"
    >
      <div class="absolute inset-0 bg-black/50"></div>
      <div class="container relative z-10 px-4">
        <div class="text-center mb-8 md:mb-16">
          <h2
            class="font-playfair text-h2-custom font-bold text-white uppercase tracking-wide"
          >
            Request <span class="text-theme">Your Valuation</span>
          </h2>
        </div>

        <div class="max-w-4xl mx-auto">
          <form class="space-y-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
              <!-- Name -->
              <div>
                <label
                  class="block text-white md:text-lg text-base mb-2 font-poppins"
                  >Full Name</label
                >
                <input
                  type="text"
                  placeholder="Your Name"
                  class="w-full bg-[#E5E7EB] text-dark placeholder-[#19191A] px-4 py-3 rounded focus:outline-none focus:ring-2 focus:ring-theme"
                />
              </div>

              <!-- Email -->
              <div>
                <label
                  class="block text-white md:text-lg text-base mb-2 font-poppins"
                  >Email Address</label
                >
                <input
                  type="email"
                  placeholder="realestate112@gmail.com"
                  class="w-full bg-[#F3F4F6] text-dark placeholder-[#19191A] px-4 py-3 rounded focus:outline-none focus:ring-2 focus:ring-theme"
                />
              </div>

              <!-- Phone -->
              <div>
                <label
                  class="block text-white md:text-lg text-base mb-2 font-poppins"
                  >Phone Number</label
                >
                <input
                  type="tel"
                  placeholder="+92"
                  class="w-full bg-[#F3F4F6] text-dark placeholder-[#19191A] px-4 py-3 rounded focus:outline-none focus:ring-2 focus:ring-theme"
                />
              </div>

              <!-- Property Type -->
              <div>
                <label
                  class="block text-white md:text-lg text-base mb-2 font-poppins"
                  >Property Type</label
                >
                <div class="relative">
                  <select
                    class="w-full bg-[#F3F4F6] text-dark px-4 py-3 rounded appearance-none focus:outline-none focus:ring-2 focus:ring-theme"
                  >
                    <option>Select type</option>
                    <option>Residential</option>
                    <option>Commercial</option>
                    <option>Mixed Use</option>
                  </select>
                  <div
                    class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-dark"
                  >
                    <svg
                      class="fill-current h-4 w-4"
                      xmlns="http://www.w3.org/2000/svg"
                      viewBox="0 0 20 20"
                    >
                      <path
                        d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"
                      />
                    </svg>
                  </div>
                </div>
              </div>
            </div>

            <!-- Units -->
            <div>
              <label
                class="block text-white md:text-lg text-base mb-2 font-poppins"
                >Number of Units</label
              >
              <input
                type="text"
                placeholder="e.g., 1, 5, 10+"
                class="w-full bg-[#F3F4F6] text-dark placeholder-[#19191A] px-4 py-3 rounded focus:outline-none focus:ring-2 focus:ring-theme"
              />
            </div>

            <!-- Message -->
            <div>
              <label
                class="block text-white md:text-lg text-base mb-2 font-poppins"
                >Your Goals & Questions</label
              >
              <textarea
                rows="6"
                placeholder="Tell us more about your situation..."
                class="w-full bg-[#F3F4F6] text-dark placeholder-[#19191A] px-4 py-3 rounded focus:outline-none focus:ring-2 focus:ring-theme resize-none"
              ></textarea>
            </div>

            <!-- Submit -->
            <div>
              <button
                type="submit"
                class="bg-theme text-white px-8 py-3 rounded-full font-medium hover:bg-opacity-90 transition duration-300"
              >
                Learn More
              </button>
            </div>
          </form>
        </div>
      </div>
    </section>

<?php get_footer(); ?>
