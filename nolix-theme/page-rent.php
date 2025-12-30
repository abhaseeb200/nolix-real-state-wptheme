<?php
/**
 * Template Name: Rent Page
 */

get_header();

// Hero Section
get_template_part('template-parts/hero', null, [
    'title' => 'FIND YOUR PERFECT<br><span class="text-theme">RENTAL IN THE UAE</span>',
    'subtitle' => 'From short-term stays to long-term homes, we have the perfect option for you to call home.',
    'image' => 'https://images.unsplash.com/photo-1515263487990-61b07816b324?q=80&w=2670&auto=format&fit=crop', // Image from rent.html comment
    'buttons' => [
        [
            'text' => 'I Want to Rent',
            'url' => '#',
            'style' => 'solid'
        ],
        [
            'text' => 'I Want to List for Rent',
            'url' => '#',
            'style' => 'outline' // Assuming hero supports outline or handled otherwise. If not, default to secondary style or something.
        ]
    ]
]);
?>

<!-- Available Rentals Section -->
<section class="py-16 lg:py-24 bg-white">
  <div class="container mx-auto px-6 lg:px-12">
    <!-- Header & Toggle -->
    <div class="flex flex-col md:flex-row md:justify-between md:items-center mb-8 gap-4">
      <div class="md:w-1/2">
        <h2 class="font-playfair text-h2-custom font-bold text-dark">
          AVAILABLE RENTALS
        </h2>
        <p class="text-[#474C59] md:text-[16px] text-xs tracking-wide mt-2">
          156 properties available for rent
        </p>
      </div>
      <div class="flex border border-[#C8CCD9] px-2 py-2 rounded-lg gap-4 self-start md:self-auto">
        <!-- Grid View (Active) -->
        <button id="btn-grid-view" class="md:w-10 md:h-10 w-8 h-8 flex items-center justify-center bg-theme text-white rounded hover:bg-opacity-90 transition">
          <svg class="md:w-5 md:h-5 w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
            <path d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path>
          </svg>
        </button>
        <!-- List View (Inactive) -->
        <button id="btn-list-view" class="md:w-10 md:h-10 w-8 h-8 flex items-center justify-center border border-gray-200 bg-white text-[#00291B] rounded hover:bg-gray-50 transition">
          <svg class="md:w-5 md:h-5 w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
          </svg>
        </button>
      </div>
    </div>

    <div class="flex flex-col lg:flex-row gap-10">
      <!-- Sidebar Filters -->
      <aside class="w-full lg:w-1/4 border border-[#C8CCD9] bg-white p-6 rounded-lg shadow-sm h-fit">
        <h3 class="font-poppins text-xl font-bold mb-6 text-[#474C59] opacity-90">
          Filters
        </h3>

        <div class="mb-6">
          <button class="flex justify-between items-center w-full font-semibold mb-4 text-sm uppercase tracking-wide">
            PROPERTY TYPE
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
            </svg>
          </button>
          <div class="space-y-3">
             <!-- Static Checkboxes from HTML -->
            <?php 
            $types = ['Villa', 'Apartment', 'Penthouse', 'Townhouse', 'Studio'];
            foreach($types as $type): ?>
            <label class="flex items-center space-x-3 cursor-pointer group">
              <div class="relative flex items-center">
                <input type="checkbox" class="peer h-5 w-5 cursor-pointer appearance-none rounded border border-gray-300 transition-all checked:border-theme checked:bg-theme hover:border-theme" />
                <svg class="absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 w-3.5 h-3.5 pointer-events-none opacity-0 peer-checked:opacity-100 text-white transition-opacity" viewBox="0 0 14 14" fill="none">
                  <path d="M3 7L5.5 9.5L11.5 3.5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
              </div>
              <span class="text-sm text-gray-600 group-hover:text-theme transition"><?php echo $type; ?></span>
            </label>
            <?php endforeach; ?>
          </div>
        </div>

        <div class="mb-6">
          <label class="block font-semibold mb-3 text-sm uppercase tracking-wide">Bedrooms</label>
          <div class="relative">
            <select class="w-full appearance-none border border-gray-200 rounded px-4 py-2.5 text-sm bg-[#F5F6FA] text-gray-600 focus:outline-none focus:border-theme">
              <option class="text-gray-400">Bedrooms</option>
              <option>1</option>
              <option>2</option>
              <option>3+</option>
            </select>
            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-[#00291B]">
              <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
              </svg>
            </div>
          </div>
        </div>

        <div class="mb-8">
          <label class="block font-semibold mb-3 text-sm uppercase tracking-wide">Annual Rent Range (AED)</label>
          <div class="space-y-3">
            <div class="relative">
              <input type="text" placeholder="Min: 30,000" class="w-full border border-gray-200 rounded px-4 py-2.5 text-sm bg-[#F5F6FA] focus:outline-none focus:border-theme" />
            </div>
            <div class="relative">
              <input type="text" placeholder="Max: 30,000" class="w-full border border-gray-200 rounded px-4 py-2.5 text-sm bg-[#F5F6FA] focus:outline-none focus:border-theme" />
            </div>
          </div>
        </div>

        <button class="w-full bg-theme text-white py-3.5 rounded-lg text-sm hover:bg-opacity-90 transition shadow-sm">
          Apply
        </button>
      </aside>

      <!-- Listings -->
      <div class="w-full lg:w-3/4">
        <div id="property-container" class="grid grid-cols-1 md:grid-cols-2 gap-6 transition-all duration-300">
            <?php
            $properties_query = new WP_Query(array(
                'post_type' => 'property',
                'posts_per_page' => 6 
            ));

            if ($properties_query->have_posts()) :
                while ($properties_query->have_posts()) : $properties_query->the_post();
                    get_template_part('template-parts/content-property-card');
                endwhile;
                wp_reset_postdata();
            else:
                echo '<p class="col-span-full text-center">No properties found.</p>';
            endif; 
            ?>
        </div>
        
        <!-- Pagination Placeholder -->
        <div class="text-center mt-12">
            <a href="#" class="inline-block bg-theme text-white px-8 py-3 rounded-full hover:bg-opacity-90 transition font-medium uppercase shadow-lg hover:shadow-xl">
            Load More
            </a>
        </div>
      </div>
    </div>
  </div>
</section>


    <!-- Why Rent With Nolix -->
    <section class="py-20 bg-navy text-white">
      <div class="container mx-auto px-6 lg:px-12">
        <div class="text-center mb-16">
          <h2 class="font-playfair text-h2-custom font-bold mb-4">
            WHY RENT <span class="text-theme">WITH NOLIX</span>
          </h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-5 text-left">
          <!-- Feature 1 -->
          <div
            class="bg-[linear-gradient(0.1deg,rgba(247,184,116,0.15)_0%,rgba(97,97,97,0.09)_100%)] p-5 rounded-lg border border-white/10 hover:border-theme/50 transition duration-300"
          >
            <div
              class="w-12 h-12 mb-6 bg-theme rounded-full flex items-center justify-center text-white"
            >
              <img src="<?php echo get_template_directory_uri(); ?>/assets/check-circle.png" class="w-7 h-7" alt="">
            </div>
            <h3 class="font-poppins tracking-wider text-xl font-bold mb-3 text-white">
              Verified Listings
            </h3>
            <p class="text-[#FFFFFF99] text-sm leading-relaxed tracking-wide">
              Every property on our platform is personally verified by our
              agents to ensure accuracy and quality.
            </p>
          </div>
          <!-- Feature 2 -->
          <div
            class="bg-[linear-gradient(0.1deg,rgba(247,184,116,0.15)_0%,rgba(97,97,97,0.09)_100%)] p-5 rounded-lg border border-white/10 hover:border-theme/50 transition duration-300"
          >
            <div
              class="w-12 h-12 mb-6 bg-theme rounded-full flex items-center justify-center text-white"
            >
              <img src="<?php echo get_template_directory_uri(); ?>/assets/notification-text.png" class="w-7 h-7" alt="">
            </div>
            <h3 class="font-poppins tracking-wider text-xl font-bold mb-3 text-white">
              Transparent Pricing
            </h3>
            <p class="text-[#FFFFFF99] text-sm leading-relaxed tracking-wide">
              No hidden fees or surprise costs. What you see is what you pay
              when you rent with us.
            </p>
          </div>
          <!-- Feature 3 -->
          <div
            class="bg-[linear-gradient(0.1deg,rgba(247,184,116,0.15)_0%,rgba(97,97,97,0.09)_100%)] p-5 rounded-lg border border-white/10 hover:border-theme/50 transition duration-300"
          >
            <div
              class="w-12 h-12 mb-6 bg-theme rounded-full flex items-center justify-center text-white"
            >
             <img src="<?php echo get_template_directory_uri(); ?>/assets/star-02.png" class="w-7 h-7" alt="">
            </div>
            <h3 class="font-poppins tracking-wider text-xl font-bold mb-3 text-white">
              Dedicated Support
            </h3>
            <p class="text-[#FFFFFF99] text-sm leading-relaxed tracking-wide">
              From viewing to move-in and beyond, our dedicated relationship
              managers are here to assist you.
            </p>
          </div>
        </div>
      </div>
    </section>

    <!-- Your Rental Process -->
    <section class="py-20 bg-white">
      <div class="container mx-auto px-6 lg:px-12">
        <div class="text-center mb-16">
          <h2 class="font-playfair text-h2-custom font-bold text-dark mb-4">
            YOUR RENTAL PROCESS
          </h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
          <!-- Step 1 -->
          <div
            class="text-left bg-white p-6 border border-[#C8CCD9] rounded-xl shadow-sm hover:shadow-md transition"
          >
            <div
              class="w-10 h-10 rounded-full bg-theme text-white text-sm font-bold flex items-center justify-center mb-4"
            >
              01
            </div>
            <h4 class="font-bold text-dark mb-2 text-base uppercase">
              SEARCH & SHORTLIST
            </h4>
            <p class="text-sm text-[#00291B]">
              Browse verified listings and save your favorites
            </p>
          </div>
          <!-- Step 2 -->
          <div
            class="text-left bg-white p-6 border border-[#C8CCD9] rounded-xl shadow-sm hover:shadow-md transition"
          >
            <div
              class="w-10 h-10 rounded-full bg-theme text-white text-sm font-bold flex items-center justify-center mb-4"
            >
              02
            </div>
            <h4 class="font-bold text-dark mb-2 text-base uppercase">
              BOOK VIEWING
            </h4>
            <p class="text-sm text-[#00291B]">
              Schedule property tours at your convenience
            </p>
          </div>
          <!-- Step 3 -->
          <div
            class="text-left bg-white p-6 border border-[#C8CCD9] rounded-xl shadow-sm hover:shadow-md transition"
          >
            <div
              class="w-10 h-10 rounded-full bg-theme text-white text-sm font-bold flex items-center justify-center mb-4"
            >
              03
            </div>
            <h4 class="font-bold text-dark mb-2 text-base uppercase">
              SUBMIT APPLICATION
            </h4>
            <p class="text-sm text-[#00291B]">
              Quick and easy rental application process
            </p>
          </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6 lg:w-2/3 mx-auto">
          <!-- Step 4 -->
          <div
            class="text-left bg-white p-6 border border-[#C8CCD9] rounded-xl shadow-sm hover:shadow-md transition"
          >
            <div
              class="w-10 h-10 rounded-full bg-theme text-white text-sm font-bold flex items-center justify-center mb-4"
            >
              04
            </div>
            <h4 class="font-bold text-dark mb-2 text-base uppercase">
              SIGN TENANCY CONTRACT
            </h4>
            <p class="text-sm text-[#00291B]">
              Secure your rental with proper documentation
            </p>
          </div>
          <!-- Step 5 -->
          <div
            class="text-left bg-white p-6 border border-[#C8CCD9] rounded-xl shadow-sm hover:shadow-md transition"
          >
            <div
              class="w-10 h-10 rounded-full bg-theme text-white text-sm font-bold flex items-center justify-center mb-4"
            >
              05
            </div>
            <h4 class="font-bold text-dark mb-2 text-base uppercase">
              MOVE IN
            </h4>
            <p class="text-sm text-[#00291B]">
              Get your keys and settle into your new home
            </p>
          </div>
        </div>
      </div>
    </section>

    <!-- Tenant Services -->
    <section class="py-20 bg-navy text-white">
      <div class="container mx-auto px-6 lg:px-12">
        <div class="text-center mb-16">
          <h2 class="font-playfair text-h2-custom font-bold mb-4">
            TENANT <span class="text-theme">SERVICES</span>
          </h2>
          <p class="text-gray-400 md:text-lg max-w-2xl mx-auto">
            Comprehensive support throughout your tenancy period
          </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
          <!-- Service 1 -->
          <div
            class="block p-5 bg-[linear-gradient(0.1deg,rgba(247,184,116,0.15)_0%,rgba(97,97,97,0.09)_100%)] rounded-lg border border-white/10 hover:border-theme/50 transition duration-300"
          >
            <div
              class="w-12 h-12 mb-6 bg-theme rounded-full flex items-center justify-center text-white"
            >
              <img src="<?php echo get_template_directory_uri(); ?>/assets/notification-text.png" class="w-7 h-7" alt="">
            </div>
            <h3 class="font-poppins text-xl font-semibold tracking-wider mb-3 text-white">
              Visa Processing Support
            </h3>
            <p class="text-[#FFFFFF99] md:text-lg text-sm leading-relaxed tracking-wider">
              Assistance with tenancy contract registration and visa
              requirements for you and your family.
            </p>
          </div>

          <!-- Service 2 -->
          <div
            class="block p-5 bg-[linear-gradient(0.1deg,rgba(247,184,116,0.15)_0%,rgba(97,97,97,0.09)_100%)] rounded-lg border border-white/10 hover:border-theme/50 transition duration-300"
          >
            <div
              class="w-12 h-12 mb-6 bg-theme rounded-full flex items-center justify-center text-white"
            >
             <img src="<?php echo get_template_directory_uri(); ?>/assets/wifi.png" class="w-7 h-7" alt="">
            </div>
            <h3 class="font-poppins text-xl font-semibold tracking-wider mb-3 text-white">
              Utility Connection
            </h3>
            <p class="text-[#FFFFFF99] md:text-lg text-sm leading-relaxed tracking-wider">
              Help with DEWA, internet, and other utility setup and activation.
            </p>
          </div>

          <!-- Service 3 -->
          <div
            class="block p-5 bg-[linear-gradient(0.1deg,rgba(247,184,116,0.15)_0%,rgba(97,97,97,0.09)_100%)] rounded-lg border border-white/10 hover:border-theme/50 transition duration-300"
          >
            <div
              class="w-12 h-12 mb-6 bg-theme rounded-full flex items-center justify-center text-white"
            >
             <img src="<?php echo get_template_directory_uri(); ?>/assets/home-03.png" class="w-7 h-7" alt="">
            </div>
            <h3 class="font-poppins text-xl font-semibold tracking-wider mb-3 text-white">
              Ejari Registration
            </h3>
            <p class="text-[#FFFFFF99] md:text-lg text-sm leading-relaxed tracking-wider">
              Complete tenancy contract registration with Dubai Land Department.
            </p>
          </div>

          <!-- Service 4 -->
          <div
            class="block p-5 bg-[linear-gradient(0.1deg,rgba(247,184,116,0.15)_0%,rgba(97,97,97,0.09)_100%)] rounded-lg border border-white/10 hover:border-theme/50 transition duration-300"
          >
            <div
              class="w-12 h-12 mb-6 bg-theme rounded-full flex items-center justify-center text-white"
            >
              <img src="<?php echo get_template_directory_uri(); ?>/assets/settings-02.png" class="w-7 h-7" alt="">
            </div>
            <h3 class="font-poppins text-xl font-semibold tracking-wider mb-3 text-white">
              Maintenance Coordination
            </h3>
            <p class="text-[#FFFFFF99] md:text-lg text-sm leading-relaxed tracking-wider">
              24/7 support for maintenance requests and emergency repairs.
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
    'image' => 'https://lightyellow-hippopotamus-770612.hostingersite.com/wp-content/uploads/2025/12/Testimonals.png', // Reusing from Page Buy, assuming consistent CTA
    'buttons' => [
        [
            'text' => 'Request a Private Consultation',
            'url' => '#',
            'style' => 'gradient'
        ]
    ]
]);
?>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const btnGrid = document.getElementById('btn-grid-view');
    const btnList = document.getElementById('btn-list-view');
    const container = document.getElementById('property-container');

    // Helper to switch button styles
    function setActiveButton(activeBtn, inactiveBtn) {
        // Active Style: bg-theme text-white
        // Inactive Style: bg-white text-[#00291B] border-gray-200
        
        activeBtn.classList.remove('bg-white', 'text-[#00291B]', 'border-gray-200');
        activeBtn.classList.add('bg-theme', 'text-white', 'border-transparent'); // removed border-gray-200, added bg-theme

        inactiveBtn.classList.remove('bg-theme', 'text-white', 'border-transparent');
        inactiveBtn.classList.add('bg-white', 'text-[#00291B]', 'border-gray-200');
    }

    if(btnGrid && btnList && container) {
        btnGrid.addEventListener('click', function() {
            // Switch to Grid
            container.classList.remove('grid-cols-1');
            container.classList.add('md:grid-cols-2');
            setActiveButton(btnGrid, btnList);
        });

        btnList.addEventListener('click', function() {
            // Switch to List
            container.classList.remove('md:grid-cols-2');
            container.classList.add('grid-cols-1'); // Force 1 column
            setActiveButton(btnList, btnGrid);
        });
    }
});
</script>

<?php get_footer(); ?>
