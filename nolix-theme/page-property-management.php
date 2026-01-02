<?php
/**
 * Template Name: Property Management Page
 */

get_header();

// Hero Section
get_template_part('template-parts/hero', null, [
    'title' => 'QUIETLY MANAGED.<br/> <span class="text-theme">CONSISTENTLY PERFORMING</span>',
    'subtitle' => 'Designed for owners who expect reliability without constant oversight, our property management ensures your asset is maintained, compliant, and income-stable.',
    'image' => 'https://images.unsplash.com/photo-1560518883-ce09059eeffa?auto=format&fit=crop&q=80&w=2670',
    'buttons' => []
]);
?>
 <!-- What We Handle Section -->
   <section class="py-16 lg:py-24">
  <div class="container px-4">
    <div class="text-center mb-8 md:mb-16">
      <h2 class="font-playfair text-h2-custom font-bold text-dark mb-4 uppercase">
        WHAT <span class="text-theme">WE HANDLE</span>
      </h2>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 md:gap-4">
      <div class="bg-white rounded-2xl p-5 shadow-[0_0_20px_rgba(0,0,0,0.03)] hover:shadow-[0_0_30px_rgba(193,154,92,0.1)] transition-all duration-300">
        <div class="flex items-center gap-4 mb-8">
          <div class="w-14 h-14 rounded-xl bg-[#EFE7D9] flex items-center justify-center flex-shrink-0">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/users.png" alt="Property Care Icon" class="w-7 h-7" />
          </div>
          <h3 class="font-poppins font-semibold text-xl text-dark">
            Property Care
          </h3>
        </div>

        <ul class="space-y-4">
          <li class="flex items-start gap-3">
            <div class="bg-theme rounded-full flex justify-center w-6 h-6">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/check-circle.webp" alt="Check Icon" class="w-4 h-4 mt-1 flex-shrink-0" />
            </div>
            <span class="text-[#767C8C] md:text-lg text-base font-light">Preventive maintenance</span>
          </li>
          <li class="flex items-start gap-3">
            <div class="bg-theme rounded-full flex justify-center w-6 h-6">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/check-circle.webp" alt="Check Icon" class="w-4 h-4 mt-1 flex-shrink-0" />
            </div>
            <span class="text-[#767C8C] md:text-lg text-base font-light">Repair coordination with approved vendors</span>
          </li>
          <li class="flex items-start gap-3">
            <div class="bg-theme rounded-full flex justify-center w-6 h-6">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/check-circle.webp" alt="Check Icon" class="w-4 h-4 mt-1 flex-shrink-0" />
            </div>
            <span class="text-[#767C8C] md:text-lg text-base font-light">Routine inspections</span>
          </li>
          <li class="flex items-start gap-3">
            <div class="bg-theme rounded-full flex justify-center w-6 h-6">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/check-circle.webp" alt="Check Icon" class="w-4 h-4 mt-1 flex-shrink-0" />
            </div>
            <span class="text-[#767C8C] md:text-lg text-base font-light">Move-in and move out management</span>
          </li>
        </ul>
      </div>

      <div class="bg-white rounded-2xl p-5 shadow-[0_0_20px_rgba(0,0,0,0.03)] hover:shadow-[0_0_30px_rgba(193,154,92,0.1)] transition-all duration-300">
        <div class="flex items-center gap-4 mb-8">
          <div class="w-14 h-14 rounded-xl bg-[#EFE7D9] flex items-center justify-center flex-shrink-0">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/credit-card.webp" alt="Financial Reporting Icon" class="w-8 h-8" />
          </div>
          <h3 class="font-poppins font-semibold text-xl text-dark">
            Financial Reporting
          </h3>
        </div>

        <ul class="space-y-4">
          <li class="flex items-start gap-3">
            <div class="bg-theme rounded-full flex justify-center w-6 h-6">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/check-circle.webp" alt="Check Icon" class="w-4 h-4 mt-1 flex-shrink-0" />
            </div>
            <span class="text-[#767C8C] md:text-lg text-base font-light">Monthly statements</span>
          </li>
          <li class="flex items-start gap-3">
            <div class="bg-theme rounded-full flex justify-center w-6 h-6">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/check-circle.webp" alt="Check Icon" class="w-4 h-4 mt-1 flex-shrink-0" />
            </div>
            <span class="text-[#767C8C] md:text-lg text-base font-light">Expense tracking</span>
          </li>
          <li class="flex items-start gap-3">
            <div class="bg-theme rounded-full flex justify-center w-6 h-6">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/check-circle.webp" alt="Check Icon" class="w-4 h-4 mt-1 flex-shrink-0" />
            </div>
            <span class="text-[#767C8C] md:text-lg text-base font-light">Renewal reminders</span>
          </li>
          <li class="flex items-start gap-3">
            <div class="bg-theme rounded-full flex justify-center w-6 h-6">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/check-circle.webp" alt="Check Icon" class="w-4 h-4 mt-1 flex-shrink-0" />
            </div>
            <span class="text-[#767C8C] md:text-lg text-base font-light">Market-based rent reviews</span>
          </li>
        </ul>
      </div>

      <div class="bg-white rounded-2xl p-5 shadow-[0_0_20px_rgba(0,0,0,0.03)] hover:shadow-[0_0_30px_rgba(193,154,92,0.1)] transition-all duration-300">
        <div class="flex items-center gap-4 mb-8">
          <div class="w-14 h-14 rounded-xl bg-[#EFE7D9] flex items-center justify-center flex-shrink-0">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/notification-text2.webp" alt="Tenant Management Icon" class="w-8 h-8" />
          </div>
          <h3 class="font-poppins font-semibold text-xl text-dark">
            Tenant Management
          </h3>
        </div>

        <ul class="space-y-4">
          <li class="flex items-start gap-3">
            <div class="bg-theme rounded-full flex justify-center w-6 h-6">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/check-circle.webp" alt="Check Icon" class="w-4 h-4 mt-1 flex-shrink-0" />
            </div>
            <span class="text-[#767C8C] md:text-lg text-base font-light">Sourcing and screening tenants</span>
          </li>
          <li class="flex items-start gap-3">
            <div class="bg-theme rounded-full flex justify-center w-6 h-6">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/check-circle.webp" alt="Check Icon" class="w-4 h-4 mt-1 flex-shrink-0" />
            </div>
            <span class="text-[#767C8C] md:text-lg text-base font-light">Contract drafting and renewals</span>
          </li>
          <li class="flex items-start gap-3">
            <div class="bg-theme rounded-full flex justify-center w-6 h-6">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/check-circle.webp" alt="Check Icon" class="w-4 h-4 mt-1 flex-shrink-0" />
            </div>
            <span class="text-[#767C8C] md:text-lg text-base font-light">Rent collection and timely follow ups</span>
          </li>
          <li class="flex items-start gap-3">
            <div class="bg-theme rounded-full flex justify-center w-6 h-6">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/check-circle.webp" alt="Check Icon" class="w-4 h-4 mt-1 flex-shrink-0" />
            </div>
            <span class="text-[#767C8C] md:text-lg text-base font-light">Handling notices and legal compliance</span>
          </li>
        </ul>
      </div>
    </div>
  </div>
</section>

<section class="py-20 bg-navy text-white">
  <div class="container">
    <div class="text-center mb-8 md:mb-16">
      <h2 class="font-playfair uppercase text-h2-custom font-bold mb-4">
        <span class="text-white">Why owners </span><span class="text-theme">Choose Nolix</span>
      </h2>
      <p class="text-[#FFFFFF99] text-base md:text-[18px] max-w-3xl mx-auto">
        Peace of mind, without unnecessary calls or interruptions.
      </p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
      <div class="bg-[linear-gradient(0.1deg,rgba(247,184,116,0.15)_0%,rgba(97,97,97,0.09)_100%)] text-center flex flex-col items-center justify-center p-8 rounded-lg border border-white/10 hover:border-theme/50 transition duration-300">
        <div class="w-16 h-16 bg-[#314A6E] rounded-full flex items-center justify-center mb-6 text-white">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/message-chat-circle.webp" class="w-8 h-8" alt="Communication Icon" />
        </div>
        <h3 class="font-poppins md:text-xl font-semibold tracking-wider mb-3">
          Consistent <br /> communication
        </h3>
      </div>

      <div class="bg-[linear-gradient(0.1deg,rgba(247,184,116,0.15)_0%,rgba(97,97,97,0.09)_100%)] text-center flex flex-col items-center justify-center p-8 rounded-lg border border-white/10 hover:border-theme/50 transition duration-300">
        <div class="w-16 h-16 bg-[#314A6E] rounded-full flex items-center justify-center mb-6 text-white">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/notification-text.webp" class="w-8 h-8" alt="Reporting Icon" />
        </div>
        <h3 class="font-poppins md:text-xl font-semibold tracking-wider mb-3">
          Clear <br /> reporting
        </h3>
      </div>

      <div class="bg-[linear-gradient(0.1deg,rgba(247,184,116,0.15)_0%,rgba(97,97,97,0.09)_100%)] text-center flex flex-col items-center justify-center p-8 rounded-lg border border-white/10 hover:border-theme/50 transition duration-300">
        <div class="w-16 h-16 bg-[#314A6E] rounded-full flex items-center justify-center mb-6 text-white">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/shield-02.webp" class="w-8 h-8" alt="Standards Icon" />
        </div>
        <h3 class="font-poppins md:text-xl font-semibold tracking-wider mb-3">
          Professional <br /> standards
        </h3>
      </div>

      <div class="bg-[linear-gradient(0.1deg,rgba(247,184,116,0.15)_0%,rgba(97,97,97,0.09)_100%)] text-center flex flex-col items-center justify-center p-8 rounded-lg border border-white/10 hover:border-theme/50 transition duration-300">
        <div class="w-16 h-16 bg-[#314A6E] rounded-full flex items-center justify-center mb-6 text-white">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/clock.webp" class="w-8 h-8" alt="Efficiency Icon" />
        </div>
        <h3 class="font-poppins md:text-xl font-semibold tracking-wider mb-3">
          Reduced vacancy and tenant turnover
        </h3>
      </div>
    </div>
  </div>
</section>

<section class="py-20 lg:py-28 bg-[#F5F6FA]">
  <div class="container px-4">
    <div class="flex flex-col lg:flex-row items-center gap-12 lg:gap-20">
      <div class="w-full lg:w-1/2 text-left">
        <span class="block text-theme font-bold tracking-wide uppercase mb-6 font-playfair text-lg">
          Our Commitment
        </span>
        <h2 class="font-playfair text-4xl lg:text-5xl font-medium leading-tight text-dark mb-8">
          Your Asset, Our Priority
        </h2>
        <div class="space-y-6 text-[#767C8C] text-sm md:text-lg font-light leading-relaxed font-poppins">
          <p>
            We treat every property as if it were our own. From routine
            maintenance to tenant relations, our team ensures your
            investment performs consistently while you focus on what matters
            most.
          </p>
          <p>
            Our hands-on approach means fewer vacancies, happier tenants,
            and better returns. We handle the details so you don't have to.
          </p>
        </div>
      </div>

      <div class="w-full lg:w-1/2 relative">
        <div class="relative md:ml-0 ml-5">
          <div class="rounded-2xl sm:p-4 p-0 z-10 relative before:content-[''] before:bg-transparent before:w-[90%] before:h-[92%] before:flex before:absolute before:border-2 before:border-theme before:rounded-[16px] before:top-[48px] md:before:left-[-6px] before:left-[-18px] before:z-[-1]">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/our-philosophy.webp" alt="Our Philosophy Asset Management" class="h-[240px] md:h-[443px] rounded-lg shadow-2xl md:w-[553px] object-cover" />
          </div>
        </div>

        <div class="absolute md:-bottom-8 flex items-center gap-6 -bottom-8 md:left-12 left-8 bg-navy text-white py-6 px-4 rounded-xl shadow-xl z-20 max-w-[420px]">
          <div class="text-center">
            <h1 class="text-theme md:text-xl font-bold mb-1">98%</h1>
            <h2 class="font-light md:text-base text-sm">Tenant Retention</h2>
          </div>
          <div class="text-center">
            <h1 class="text-theme md:text-xl font-bold mb-1">24h</h1>
            <h2 class="font-light md:text-base text-sm">Response Time</h2>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php get_template_part('template-parts/section-team'); ?>

    <!-- Discuss Your Portfolio Section -->
   <section
  class="relative py-20 lg:py-28 bg-cover bg-center bg-no-repeat"
  style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/form-bg.webp')"
>
  <div class="absolute inset-0 bg-black/50"></div>
  <div class="container relative z-10 px-4">
    <div class="text-center mb-8 md:mb-16">
      <h2
        class="font-playfair text-h2-custom font-bold text-white uppercase tracking-wide"
      >
        DISCUSS <span class="text-theme">YOUR PORTFOLIO</span>
      </h2>
    </div>

    <div class="max-w-4xl mx-auto">
      <form class="space-y-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
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

        <div>
          <button
            type="submit"
            class="bg-theme text-white px-8 py-3 rounded-full font-medium hover:bg-opacity-90 transition duration-300"
          >
            Book Consultation
          </button>
        </div>
      </form>
    </div>
  </div>
</section>

<?php


get_footer();
