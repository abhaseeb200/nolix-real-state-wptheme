<?php
/**
 * Template Name: Rent Page
 */

get_header();

// Hero Section
get_template_part('template-parts/hero', null, [
    'title' => 'FIND YOUR PERFECT<br><span class="text-theme">RENTAL IN THE UAE</span>',
    'subtitle' => 'From short-term stays to long-term homes, we have the perfect option for you to call home.',
     'image' => get_template_directory_uri() . '/assets/images/key-inside-door.webp',
    'buttons' => [
        [
            'text' => 'I Want to Rent',
            'url'   => site_url('/find-rent-dubai'),
            'style' => 'solid'
        ],
        [
            'text' => 'I Want to List for Rent',
            'url'   => site_url('/lease-out-my-property'),
            'style' => 'secondary' 
        ]
    ]
]);
?>

<section class="py-16 lg:py-24 bg-white" data-aos="fade-up">
  <div class="container mx-auto px-6 lg:px-12">
    <div class="flex flex-col md:flex-row md:justify-between md:items-center mb-8 gap-4" data-aos="fade-up">
      <div class="md:w-1/2">
        <h2 class="font-playfair text-h2-custom font-bold text-dark">
          AVAILABLE RENTALS
        </h2>
        <p class="text-[#474C59] md:text-[16px] text-xs tracking-wide mt-2">
          <span id="property-count"><?php 
            $count_query = new WP_Query(array('post_type' => 'property', 'posts_per_page' => -1));
            echo $count_query->found_posts;
            wp_reset_postdata();
          ?></span> properties available for rent
        </p>
      </div>
      <div class="flex border border-[#C8CCD9] px-2 py-2 rounded-lg gap-4 self-start md:self-auto">
        <button id="btn-grid-view" class="md:w-10 md:h-10 w-8 h-8 flex items-center justify-center bg-theme text-white rounded hover:bg-opacity-90 transition">
          <svg class="md:w-5 md:h-5 w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
            <path d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path>
          </svg>
        </button>
        <button id="btn-list-view" class="md:w-10 md:h-10 w-8 h-8 flex items-center justify-center border border-gray-200 bg-white text-[#00291B] rounded hover:bg-gray-50 transition">
          <svg class="md:w-5 md:h-5 w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
          </svg>
        </button>
      </div>
    </div>

    <div class="flex flex-col lg:flex-row gap-10">
      <aside class="w-full lg:w-1/4 border border-[#C8CCD9] bg-white p-6 rounded-lg shadow-sm h-fit">
        <h3 class="font-poppins text-xl font-bold mb-6 text-[#474C59] opacity-90">Filters</h3>
        <form id="property-filters-form">
          <div class="mb-6">
            <button type="button" class="flex justify-between items-center w-full font-semibold mb-4 text-sm uppercase tracking-wide">
              PROPERTY TYPE
              <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
              </svg>
            </button>
            <div class="space-y-3">
              <?php 
              $types = ['Villa', 'Apartment', 'Penthouse', 'Townhouse', 'Studio'];
              foreach($types as $type): ?>
              <label class="flex items-center space-x-3 cursor-pointer group">
                <div class="relative flex items-center">
                  <input type="checkbox" name="property_type[]" value="<?php echo esc_attr($type); ?>" class="filter-checkbox peer h-5 w-5 cursor-pointer appearance-none rounded border border-gray-300 transition-all checked:border-theme checked:bg-theme hover:border-theme" />
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
              <select name="bedrooms" id="filter-bedrooms" class="filter-select w-full appearance-none border border-gray-200 rounded px-4 py-2.5 text-sm bg-[#F5F6FA] text-gray-600 focus:outline-none focus:border-theme">
                <option value="">Bedrooms</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="5+">5+</option>
              </select>
              <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-[#00291B]">
                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                  <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                </svg>
              </div>
            </div>
          </div>

          <div class="mb-8">
            <label class="block font-semibold mb-3 text-sm uppercase tracking-wide">Annual Rent Range (AED)</label>
            <div class="space-y-3">
              <div class="relative">
                <input type="text" name="rent_min" id="filter-rent-min" placeholder="Min: 30,000" class="filter-input w-full border border-gray-200 rounded px-4 py-2.5 text-sm bg-[#F5F6FA] focus:outline-none focus:border-theme" />
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-400">
                  <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l4-4 4 4m0 6l-4 4-4-4"></path>
                  </svg>
                </div>
              </div>
              <div class="relative">
                <input type="text" name="rent_max" id="filter-rent-max" placeholder="Max: 30,000" class="filter-input w-full border border-gray-200 rounded px-4 py-2.5 text-sm bg-[#F5F6FA] focus:outline-none focus:border-theme" />
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-400">
                  <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l4-4 4 4m0 6l-4 4-4-4"></path>
                  </svg>
                </div>
              </div>
            </div>
          </div>

          <div class="flex gap-3">
            <button type="button" id="apply-filters" class="flex-1 bg-theme text-white py-3.5 rounded-lg text-sm hover:bg-opacity-90 transition shadow-sm disabled:opacity-70 disabled:cursor-not-allowed flex items-center justify-center gap-2">
              <span id="apply-text">Apply</span>
              <svg id="apply-spinner" class="hidden animate-spin h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
              </svg>
            </button>
            <button type="button" id="reset-filters" class="flex-1 bg-gray-200 text-gray-700 py-3.5 rounded-lg text-sm hover:bg-gray-300 transition shadow-sm disabled:opacity-70 disabled:cursor-not-allowed flex items-center justify-center gap-2">
              <span id="reset-text">Reset</span>
              <svg id="reset-spinner" class="hidden animate-spin h-4 w-4 text-gray-700" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
              </svg>
            </button>
          </div>
        </form>
      </aside>

      <div class="w-full lg:w-3/4">
        <div id="property-container" class="grid grid-cols-1 md:grid-cols-2 gap-6 transition-all duration-300 view-grid">
            <?php
            $properties_query = new WP_Query(array('post_type' => 'property', 'posts_per_page' => 6));
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
        <div class="text-center mt-12" id="load-more-container">
            <button id="load-more-btn" data-page="2" class="inline-flex items-center justify-center gap-2 bg-theme text-white px-8 py-3 rounded-full hover:bg-opacity-90 transition font-medium uppercase shadow-lg hover:shadow-xl disabled:opacity-70 disabled:cursor-not-allowed">
              <span id="load-more-text">Load More</span>
              <svg id="load-more-spinner" class="hidden animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
              </svg>
            </button>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="py-20 bg-navy text-white" data-aos="fade-up">
  <div class="container mx-auto px-6 lg:px-12">
    <div class="text-center mb-16" data-aos="fade-up">
      <h2 class="font-playfair text-h2-custom font-bold mb-4">
        WHY RENT <span class="text-theme">WITH NOLIX</span>
      </h2>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-5 text-left">
      <div class="bg-[linear-gradient(0.1deg,rgba(247,184,116,0.15)_0%,rgba(97,97,97,0.09)_100%)] p-5 rounded-lg border border-white/10 hover:border-theme/50 transition duration-300" data-aos="fade-up" data-aos-delay="100">
        <div class="w-12 h-12 mb-6 bg-theme rounded-full flex items-center justify-center text-white">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/check-circle.webp" class="w-7 h-7" alt="">
        </div>
        <h3 class="font-poppins tracking-wider text-xl font-bold mb-3 text-white">Verified Listings</h3>
        <p class="text-[#FFFFFF99] text-sm leading-relaxed tracking-wide">Every property on our platform is personally verified by our agents.</p>
      </div>
      <div class="bg-[linear-gradient(0.1deg,rgba(247,184,116,0.15)_0%,rgba(97,97,97,0.09)_100%)] p-5 rounded-lg border border-white/10 hover:border-theme/50 transition duration-300" data-aos="fade-up" data-aos-delay="200">
        <div class="w-12 h-12 mb-6 bg-theme rounded-full flex items-center justify-center text-white">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/notification-text.webp" class="w-7 h-7" alt="">
        </div>
        <h3 class="font-poppins tracking-wider text-xl font-bold mb-3 text-white">Transparent Pricing</h3>
        <p class="text-[#FFFFFF99] text-sm leading-relaxed tracking-wide">No hidden fees or surprise costs.</p>
      </div>
      <div class="bg-[linear-gradient(0.1deg,rgba(247,184,116,0.15)_0%,rgba(97,97,97,0.09)_100%)] p-5 rounded-lg border border-white/10 hover:border-theme/50 transition duration-300" data-aos="fade-up" data-aos-delay="300">
        <div class="w-12 h-12 mb-6 bg-theme rounded-full flex items-center justify-center text-white">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/star-02.png" class="w-7 h-7" alt="">
        </div>
        <h3 class="font-poppins tracking-wider text-xl font-bold mb-3 text-white">Dedicated Support</h3>
        <p class="text-[#FFFFFF99] text-sm leading-relaxed tracking-wide">From viewing to move-in and beyond.</p>
      </div>
    </div>
  </div>
</section>

  <!-- Your Rental Process -->
    <section class="py-20 bg-white" data-aos="fade-up">
      <div class="container mx-auto px-6 lg:px-12">
        <div class="text-center mb-16" data-aos="fade-up">
          <h2 class="font-playfair text-h2-custom font-bold text-dark mb-4">
            YOUR <span class="text-theme"> RENTAL PROCESS </span>
          </h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-6">
          <!-- Step 1 -->
          <div
            class="bg-white p-6 border border-[#C8CCD9] flex flex-col items-center text-center rounded-xl shadow-sm hover:shadow-md transition" data-aos="fade-up" data-aos-delay="100"
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
            class="flex flex-col items-center text-center bg-white p-6 border border-[#C8CCD9] rounded-xl shadow-sm hover:shadow-md transition" data-aos="fade-up" data-aos-delay="200"
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
            class="flex flex-col items-center text-center bg-white p-6 border border-[#C8CCD9] rounded-xl shadow-sm hover:shadow-md transition" data-aos="fade-up" data-aos-delay="300"
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
<!--         </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6 lg:w-2/3 mx-auto"> -->
          <!-- Step 4 -->
          <div
            class="flex flex-col items-center text-center bg-white p-6 border border-[#C8CCD9] rounded-xl shadow-sm hover:shadow-md transition" data-aos="fade-up" data-aos-delay="400"
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
            class="flex flex-col items-center text-center bg-white p-6 border border-[#C8CCD9] rounded-xl shadow-sm hover:shadow-md transition" data-aos="fade-up" data-aos-delay="500"
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

<section class="py-20 bg-navy text-white" data-aos="fade-up">
  <div class="container mx-auto px-6 lg:px-12">
    <div class="text-center mb-16" data-aos="fade-up">
      <h2 class="font-playfair text-h2-custom font-bold mb-4">
        TENANT <span class="text-theme">SERVICES</span>
      </h2>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
      <div class="block p-5 bg-[linear-gradient(0.1deg,rgba(247,184,116,0.15)_0%,rgba(97,97,97,0.09)_100%)] rounded-lg border border-white/10 hover:border-theme/50 transition duration-300" data-aos="fade-up" data-aos-delay="100">
        <div class="w-12 h-12 mb-6 bg-theme rounded-full flex items-center justify-center text-white">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/notification-text.webp" class="w-7 h-7" alt="">
        </div>
        <h3 class="font-poppins text-xl font-semibold tracking-wider mb-3 text-white">Visa Processing Support</h3>
        <p class="text-[#FFFFFF99] md:text-lg text-sm leading-relaxed tracking-wider">Assistance with residence visa appllications and renewals for you and your family.</p>
      </div>

      <div class="block p-5 bg-[linear-gradient(0.1deg,rgba(247,184,116,0.15)_0%,rgba(97,97,97,0.09)_100%)] rounded-lg border border-white/10 hover:border-theme/50 transition duration-300" data-aos="fade-up" data-aos-delay="200">
        <div class="w-12 h-12 mb-6 bg-theme rounded-full flex items-center justify-center text-white">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/wifi.png" class="w-7 h-7" alt="">
        </div>
        <h3 class="font-poppins text-xl font-semibold tracking-wider mb-3 text-white">Utility Connection</h3>
        <p class="text-[#FFFFFF99] md:text-lg text-sm leading-relaxed tracking-wider">Help with DEWA, internet, and other utility setup.</p>
      </div>

      <div class="block p-5 bg-[linear-gradient(0.1deg,rgba(247,184,116,0.15)_0%,rgba(97,97,97,0.09)_100%)] rounded-lg border border-white/10 hover:border-theme/50 transition duration-300" data-aos="fade-up" data-aos-delay="300">
        <div class="w-12 h-12 mb-6 bg-theme rounded-full flex items-center justify-center text-white">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/home-03.webp" class="w-7 h-7" alt="">
        </div>
        <h3 class="font-poppins text-xl font-semibold tracking-wider mb-3 text-white">Ejari Registration</h3>
        <p class="text-[#FFFFFF99] md:text-lg text-sm leading-relaxed tracking-wider">Complete tenancy contract registration with Dubai Land Department.</p>
      </div>

      <div class="block p-5 bg-[linear-gradient(0.1deg,rgba(247,184,116,0.15)_0%,rgba(97,97,97,0.09)_100%)] rounded-lg border border-white/10 hover:border-theme/50 transition duration-300" data-aos="fade-up" data-aos-delay="400">
        <div class="w-12 h-12 mb-6 bg-theme rounded-full flex items-center justify-center text-white">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/settings-02.webp" class="w-7 h-7" alt="">
        </div>
        <h3 class="font-poppins text-xl font-semibold tracking-wider mb-3 text-white">Maintenance Coordination</h3>
        <p class="text-[#FFFFFF99] md:text-lg text-sm leading-relaxed tracking-wider">24/7 support for maintenance requests and emergency repairs.</p>
      </div>
    </div>
  </div>
</section>

<?php 
get_template_part('template-parts/cta', null, [
    'title' => 'Find Rent in Dubai',
    'text' => 'Discover your perfect rental property with expert guidance.',
   'image' => get_template_directory_uri() . '/assets/images/pexels-a-darmel-7642000.webp',
    'buttons' => [['text' => 'Request a Private Consultation', 'url'   => site_url('/find-rent-dubai'), 'style' => 'gradient']]
]);
?>

<script>
(function() {
    const ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';
    let currentPage = 1;
    let isLoading = false;
    let hasMorePosts = true;
    let isFiltered = false; // Track if filters are active

    // Helper functions to manage button states
    function setButtonLoading(buttonId, textId, spinnerId, isLoading) {
        const btn = document.getElementById(buttonId);
        const text = document.getElementById(textId);
        const spinner = document.getElementById(spinnerId);
        
        if (btn && text && spinner) {
            btn.disabled = isLoading;
            if (isLoading) {
                spinner.classList.remove('hidden');
                text.style.opacity = '0.7';
            } else {
                spinner.classList.add('hidden');
                text.style.opacity = '1';
            }
        }
    }

    // Function to load properties via AJAX
    function loadProperties(page = 1, append = false, showApplySpinner = false) {
        if (isLoading) return;
        
        isLoading = true;
        const loadMoreBtn = document.getElementById('load-more-btn');
        const container = document.getElementById('property-container');
        
        // Show spinner in Apply button if requested
        if (showApplySpinner) {
            setButtonLoading('apply-filters', 'apply-text', 'apply-spinner', true);
        }
        
        // Show spinner in Load More button if appending
        if (append) {
            setButtonLoading('load-more-btn', 'load-more-text', 'load-more-spinner', true);
        } else if (loadMoreBtn) {
            loadMoreBtn.style.display = 'none';
        }

        // Collect filter values
        const formData = new FormData();
        formData.append('action', 'filter_rent_properties');
        formData.append('page', page);
        formData.append('append', append ? '1' : '0');

        // Property types
        const propertyTypes = [];
        document.querySelectorAll('.filter-checkbox:checked').forEach(cb => {
            propertyTypes.push(cb.value);
        });
        if (propertyTypes.length > 0) {
            formData.append('property_types', JSON.stringify(propertyTypes));
            isFiltered = true;
        }

        // Bedrooms
        const bedrooms = document.getElementById('filter-bedrooms')?.value;
        if (bedrooms) {
            formData.append('bedrooms', bedrooms);
            isFiltered = true;
        }

        // Rent range
        const rentMin = document.getElementById('filter-rent-min')?.value;
        const rentMax = document.getElementById('filter-rent-max')?.value;
        if (rentMin || rentMax) {
            if (rentMin) formData.append('rent_min', rentMin.replace(/,/g, ''));
            if (rentMax) formData.append('rent_max', rentMax.replace(/,/g, ''));
            isFiltered = true;
        }

        // If no filters and page 1 and not appending, don't make AJAX call (use initial PHP load)
        // For Load More (append=true) or when filters are active, always make AJAX call
        // But if showApplySpinner is true, we need to make the call to show/hide the spinner properly
        if (!isFiltered && page === 1 && !append && !showApplySpinner) {
            isLoading = false;
            // Hide spinner in Apply button if it was shown
            if (showApplySpinner) {
                setButtonLoading('apply-filters', 'apply-text', 'apply-spinner', false);
            }
            if (loadMoreBtn) {
                loadMoreBtn.style.display = 'inline-flex';
                setButtonLoading('load-more-btn', 'load-more-text', 'load-more-spinner', false);
            }
            return;
        }

        fetch(ajaxurl, {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            isLoading = false;
            
            // Hide spinner in Apply button if it was shown
            if (showApplySpinner) {
                setButtonLoading('apply-filters', 'apply-text', 'apply-spinner', false);
            }
            
            // Hide spinner in Load More button
            if (append) {
                setButtonLoading('load-more-btn', 'load-more-text', 'load-more-spinner', false);
            }

            if (data.success) {
                if (!append) {
                    container.innerHTML = data.data.html;
                } else {
                    container.insertAdjacentHTML('beforeend', data.data.html);
                }

                // Update property count
                const countEl = document.getElementById('property-count');
                if (countEl && data.data.count !== undefined) {
                    countEl.textContent = data.data.count;
                }

                // Update pagination
                hasMorePosts = data.data.has_more;
                currentPage = page;

                if (hasMorePosts && loadMoreBtn) {
                    loadMoreBtn.style.display = 'inline-flex';
                    loadMoreBtn.setAttribute('data-page', page + 1);
                    setButtonLoading('load-more-btn', 'load-more-text', 'load-more-spinner', false);
                } else if (loadMoreBtn) {
                    loadMoreBtn.style.display = 'none';
                }
                
                // Apply current view after loading properties
                if (typeof window.updateViewAfterLoad === 'function') {
                    window.updateViewAfterLoad();
                }
            } else {
                if (!append) {
                    container.innerHTML = '<p class="col-span-full text-center">No properties found.</p>';
                }
                if (loadMoreBtn) loadMoreBtn.style.display = 'none';
                hasMorePosts = false;
            }
        })
        .catch(error => {
            console.error('Error:', error);
            isLoading = false;
            
            // Hide spinner in Apply button if it was shown
            if (showApplySpinner) {
                setButtonLoading('apply-filters', 'apply-text', 'apply-spinner', false);
            }
            
            // Hide spinner in Load More button
            if (append) {
                setButtonLoading('load-more-btn', 'load-more-text', 'load-more-spinner', false);
            }
            
            if (loadMoreBtn) {
                loadMoreBtn.style.display = 'inline-flex';
            }
        });
    }

    // Reset filters function
    function resetFilters() {
        // Clear all checkboxes
        document.querySelectorAll('.filter-checkbox').forEach(cb => {
            cb.checked = false;
        });

        // Reset bedrooms dropdown
        const bedroomsSelect = document.getElementById('filter-bedrooms');
        if (bedroomsSelect) {
            bedroomsSelect.value = '';
        }

        // Clear rent range inputs
        const rentMin = document.getElementById('filter-rent-min');
        const rentMax = document.getElementById('filter-rent-max');
        if (rentMin) rentMin.value = '';
        if (rentMax) rentMax.value = '';

        // Reset filter state and reload properties without filters
        isFiltered = false;
        currentPage = 1;
        hasMorePosts = true;

        // Force load properties without filters (bypass the early return check)
        // We'll make a direct AJAX call with no filters
        if (isLoading) return;
        
        isLoading = true;
        const formData = new FormData();
        formData.append('action', 'filter_rent_properties');
        formData.append('page', 1);
        formData.append('append', '0');

        const loadMoreBtn = document.getElementById('load-more-btn');
        const container = document.getElementById('property-container');
        
        // Show spinner in Reset button
        setButtonLoading('reset-filters', 'reset-text', 'reset-spinner', true);
        
        if (loadMoreBtn) loadMoreBtn.style.display = 'none';

        fetch(ajaxurl, {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            isLoading = false;
            
            // Hide spinner in Reset button
            setButtonLoading('reset-filters', 'reset-text', 'reset-spinner', false);

            if (data.success) {
                container.innerHTML = data.data.html;

                // Update property count
                const countEl = document.getElementById('property-count');
                if (countEl && data.data.count !== undefined) {
                    countEl.textContent = data.data.count;
                }

                // Update pagination
                hasMorePosts = data.data.has_more;
                currentPage = 1;

                if (hasMorePosts && loadMoreBtn) {
                    loadMoreBtn.style.display = 'inline-flex';
                    loadMoreBtn.setAttribute('data-page', 2);
                    setButtonLoading('load-more-btn', 'load-more-text', 'load-more-spinner', false);
                } else if (loadMoreBtn) {
                    loadMoreBtn.style.display = 'none';
                }
                
                // Apply current view after resetting filters
                if (typeof window.updateViewAfterLoad === 'function') {
                    window.updateViewAfterLoad();
                }
            }
        })
        .catch(error => {
            console.error('Error:', error);
            isLoading = false;
            
            // Hide spinner in Reset button
            setButtonLoading('reset-filters', 'reset-text', 'reset-spinner', false);
            
            if (loadMoreBtn) {
                loadMoreBtn.style.display = 'inline-flex';
            }
        });
    }

    // Apply filters button
    const applyBtn = document.getElementById('apply-filters');
    if (applyBtn) {
        applyBtn.addEventListener('click', function() {
            isFiltered = false; // Reset to check filters again
            currentPage = 1;
            hasMorePosts = true;
            // Pass true to show spinner in Apply button
            loadProperties(1, false, true);
        });
    }

    // Reset filters button
    const resetBtn = document.getElementById('reset-filters');
    if (resetBtn) {
        resetBtn.addEventListener('click', function() {
            resetFilters();
        });
    }

    // Load more button
    const loadMoreBtn = document.getElementById('load-more-btn');
    if (loadMoreBtn) {
        loadMoreBtn.addEventListener('click', function() {
            const nextPage = parseInt(this.getAttribute('data-page')) || 2;
            // If not filtered, we need to check if we should use AJAX or not
            if (!isFiltered) {
                // For unfiltered load more, we still need AJAX but with no filters
                isFiltered = false;
            }
            loadProperties(nextPage, true);
        });
    }

    // Grid/List view toggle functionality
    let currentView = 'grid'; // Default to grid view
    
    function toggleView(view) {
        const container = document.getElementById('property-container');
        const gridBtn = document.getElementById('btn-grid-view');
        const listBtn = document.getElementById('btn-list-view');
        
        if (!container || !gridBtn || !listBtn) return;
        
        currentView = view;
        
        // Remove existing view classes
        container.classList.remove('view-grid', 'view-list');
        
        if (view === 'grid') {
            // Grid view
            container.classList.add('view-grid', 'grid', 'grid-cols-1', 'md:grid-cols-2');
            container.classList.remove('flex', 'flex-col');
            
            // Update button states
            gridBtn.classList.add('bg-theme', 'text-white');
            gridBtn.classList.remove('border', 'border-gray-200', 'bg-white', 'text-[#00291B]');
            listBtn.classList.remove('bg-theme', 'text-white');
            listBtn.classList.add('border', 'border-gray-200', 'bg-white', 'text-[#00291B]');
            
            // Update property cards
            document.querySelectorAll('#property-container > div').forEach(card => {
                card.classList.remove('flex-row', 'items-center', 'w-full');
                card.classList.add('h-full');
                
                // Reset image container
                const imgContainer = card.querySelector('.relative');
                if (imgContainer) {
                    imgContainer.classList.remove('w-1/3', 'h-auto', 'flex-shrink-0');
                    imgContainer.classList.add('h-64');
                    // Remove inline styles
                    imgContainer.style.height = '';
                }
                
                // Reset content container
                const contentContainer = card.querySelector('.p-6');
                if (contentContainer && !contentContainer.parentElement.classList.contains('relative')) {
                    contentContainer.classList.remove('flex-1', 'flex', 'flex-col', 'justify-between');
                }
            });
        } else {
            // List view
            container.classList.add('view-list', 'flex', 'flex-col');
            container.classList.remove('grid', 'grid-cols-1', 'md:grid-cols-2');
            
            // Update button states
            listBtn.classList.add('bg-theme', 'text-white');
            listBtn.classList.remove('border', 'border-gray-200', 'bg-white', 'text-[#00291B]');
            gridBtn.classList.remove('bg-theme', 'text-white');
            gridBtn.classList.add('border', 'border-gray-200', 'bg-white', 'text-[#00291B]');
            
            // Update property cards
            document.querySelectorAll('#property-container > div').forEach(card => {
                card.classList.add('flex-row', 'items-center', 'w-full');
                card.classList.remove('h-full');
                
                // Update image container
                const imgContainer = card.querySelector('.relative');
                if (imgContainer) {
                    imgContainer.classList.add('w-1/3', 'flex-shrink-0');
                    imgContainer.classList.remove('h-64');
                    imgContainer.style.height = '200px';
                }
                
                // Update content container
                const contentContainer = card.querySelector('.p-6');
                if (contentContainer && !contentContainer.parentElement.classList.contains('relative')) {
                    contentContainer.classList.add('flex-1', 'flex', 'flex-col', 'justify-between');
                }
            });
        }
        
        // Save view preference to localStorage
        localStorage.setItem('propertyView', view);
    }
    
    // Grid view button
    const gridBtn = document.getElementById('btn-grid-view');
    if (gridBtn) {
        gridBtn.addEventListener('click', function() {
            toggleView('grid');
        });
    }
    
    // List view button
    const listBtn = document.getElementById('btn-list-view');
    if (listBtn) {
        listBtn.addEventListener('click', function() {
            toggleView('list');
        });
    }
    
    // Load saved view preference on page load
    function initViewPreference() {
        const savedView = localStorage.getItem('propertyView') || 'grid';
        if (savedView === 'list') {
            // Small delay to ensure DOM is fully rendered
            setTimeout(() => toggleView('list'), 100);
        }
    }
    
    // Initialize view preference when DOM is ready
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initViewPreference);
    } else {
        // DOM already loaded
        initViewPreference();
    }
    
    // Update view when new properties are loaded via AJAX
    window.updateViewAfterLoad = function() {
        if (currentView === 'list') {
            const container = document.getElementById('property-container');
            if (!container) return;
            
            // Apply list view to new cards
            setTimeout(() => {
                document.querySelectorAll('#property-container > div').forEach(card => {
                    if (!card.classList.contains('flex-row')) {
                        card.classList.add('flex-row', 'items-center', 'w-full');
                        
                        const imgContainer = card.querySelector('.relative');
                        if (imgContainer && !imgContainer.classList.contains('w-1/3')) {
                            imgContainer.classList.add('w-1/3', 'flex-shrink-0');
                            imgContainer.classList.remove('h-64');
                            imgContainer.style.height = '200px';
                        }
                        
                        const contentContainer = card.querySelector('.p-6');
                        if (contentContainer && !contentContainer.parentElement.classList.contains('relative')) {
                            contentContainer.classList.add('flex-1', 'flex', 'flex-col', 'justify-between');
                        }
                    }
                });
            }, 50);
        }
    };
})();
</script>

<style>
/* List view styles for property cards */
#property-container.view-list > div {
    display: flex !important;
    flex-direction: row !important;
    align-items: center;
}

#property-container.view-list > div .relative {
    min-height: 200px;
    height: 100%;
}

#property-container.view-list > div .relative img {
    height: 100%;
    object-fit: cover;
}

@media (max-width: 768px) {
    #property-container.view-list > div {
        flex-direction: column !important;
    }
    
    #property-container.view-list > div .relative {
        width: 100% !important;
        height: 250px;
    }
}
</style>

<?php
get_footer(); 
?>