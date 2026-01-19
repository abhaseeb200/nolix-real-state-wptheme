<?php get_header(); ?>

    <!-- Hero Section -->
    <section
        class="relative h-[87vh] w-full bg-cover bg-center bg-[linear-gradient(180deg,rgba(0,0,0,0)_-29.3%,rgba(0,0,0,0.65)_100%)]"
        style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/pexels-alex-staudinger.jpg');">
        <!-- Overlay -->
        <div class="absolute inset-0 bg-black/50 md:bg-black/40"></div>

        <div
            class="relative z-10 container mx-auto px-6 lg:px-12 h-full flex flex-col justify-center items-center text-center">
            <div class="my-14 max-w-5xl">
                <!-- Trust Badge -->
                <div class="flex md:flex-row flex-col md:gap-0 gap-2 items-center justify-center mb-3">
                    <div class="flex -space-x-2 mr-3">
                        <img class="w-8 h-8 rounded-full object-cover"
                            src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-1.2.1&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                            alt="Client">
                        <img class="w-8 h-8 rounded-full object-cover"
                            src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                            alt="Client">
                        <img class="w-8 h-8 rounded-full object-cover"
                            src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?ixlib=rb-1.2.1&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                            alt="Client">
                    </div>
                    <span class="text-white text-sm md:text-lg font-poppins">Relied on by 2M+ satisfied clients</span>
                </div>

                <!-- H1 Heading -->
                <h1
                    class="text-h1-custom font-playfair text-white font-bold leading-tight mb-6 uppercase drop-shadow-lg">
                    A Curated Approach to <br>
                    <span class="text-theme">Luxury Property</span> in the UAE.
                </h1>

                <!-- Paragraph -->
                <p
                    class="text-p-custom text-[#EBEDF0] font-poppins mb-10 max-w-4xl mx-auto leading-relaxed drop-shadow-md">
                    NOLIX PRESENTS A SELECTIVE PORTFOLIO OF VILLAS, APARTMENTS AND OFF-PLAN RESIDENCES. OUR OFFERS ARE
                    PAIRED WITH ADVISORY-LED SERVICE FOR BUYERS, SELLERS AND INVESTORS.
                </p>

                <!-- Buttons -->
                <div class="flex flex-col md:items-start items-center sm:flex-row justify-center gap-5">
                    <a href="<?php echo site_url('/buy-property/'); ?>"
                        class="bg-theme cursor-pointer rounded-full text-white px-5 md:px-8 sm:py-4 py-3 font-poppins text-[15px] md:text-base font-medium hover:bg-opacity-90 transition-all">
                        Request a Private Consultation
                    </a>
                    <a href="<?php echo site_url('/buy'); ?>"
                        class="bg-white rounded-full text-gray-900 px-5 md:px-8 sm:py-4 py-3 font-poppins text-[15px] md:text-base font-medium hover:bg-gray-100 transition-all">
                        Explore Properties
                    </a>
                </div>
            </div>

        </div>
    </section>

    <!-- Stats Section -->
    <section class="pt-24 bg-[#F5F6FA]" data-aos="fade-up">
        <div class="container max-w-[1280px] mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-16 text-center items-center">

                <!-- Stat 1 -->
                <div class="flex flex-col items-center justify-center gap-6" data-aos="fade-up" data-aos-delay="100">
                    <span
                        class="md:text-[80px] text-[60px] font-bold text-counter leading-none font-helvetica tracking-tighter relative"><span class="counter-number" data-target="8">0</span>k<sup
                            class="absolute sm:top-4 top-2.5 right-0 text-[24px] text-theme font-medium">+</sup></span>
                    <span
                        class="bg-dark text-white text-[16px] font-poppins px-4 py-1.5 rounded-full shadow-lg">Properties
                        Sold</span>
                </div>

                <!-- Stat 2 -->
                <div class="flex flex-col items-center justify-center gap-6" data-aos="fade-up" data-aos-delay="200">
                    <span
                        class="md:text-[80px] text-[60px] font-bold text-counter leading-none font-helvetica tracking-tighter relative"><span class="counter-number" data-target="14">0</span>k<sup
                            class="absolute sm:top-4 top-2.5 right-0 text-[24px] text-theme font-medium">+</sup></span>
                    <span class="bg-dark text-white text-[16px] font-poppins px-4 py-1.5 rounded-full shadow-lg">Happy
                        Clients</span>
                </div>

                <!-- Stat 3 -->
                <div class="flex flex-col items-center justify-center gap-6" data-aos="fade-up" data-aos-delay="300">
                    <span
                        class="md:text-[80px] text-[60px] font-bold text-counter leading-none font-helvetica tracking-tighter relative"><span class="counter-number" data-target="16">0</span>k<sup
                            class="absolute sm:top-4 top-2.5 right-0 text-[24px] text-theme font-medium">+</sup></span>
                    <span class="bg-dark text-white text-[16px] font-poppins px-4 py-1.5 rounded-full shadow-lg">Listed
                        Properties</span>
                </div>

            </div>
        </div>
    </section>
 <!-- Why Nolix Section -->
    <section class="py-24 bg-[#F5F6FA]" data-aos="fade-up">
        <div class="container max-w-[1280px] mx-auto px-6">

            <!-- Heading -->
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="text-h2-custom font-playfair font-bold text-gray-900 mb-4 uppercase tracking-wide">
                    Why <span class="text-theme">Nolix?</span>
                </h2>
                <p class="md:text-lg text-[14px] font-poppins max-w-2xl mx-auto leading-relaxed text-[#00291B]">
                   A NOLIX curates a private portfolio of prime and luxury homes across the UAE
                </p>
            </div>

            <!-- Grid -->
            <div class="grid md:grid-cols-3 gap-12">
                <!-- Item 1 -->
                <div class="flex flex-col md:justify-center items-center text-center" data-aos="fade-up" data-aos-delay="100">
                    <div
                        class="w-14 h-14 rounded-full border border-gray-200 bg-white flex items-center justify-center mb-6">
                        <svg class="w-6 h-6 text-gray-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                        </svg>
                    </div>
                    <h3 class="text-h3-custom font-helvetica font-medium text-gray-900 mb-4 leading-tight">Curated
                        Inventory</h3>
                    <p class="text-[18px] text-[#767C8C] font-poppins leading-relaxed">
                        We focus on the highest quality properties so each client receives considered options, not
                        endless lists.
                    </p>
                </div>

                <!-- Item 2 -->
                <div class="flex flex-col items-center text-center" data-aos="fade-up" data-aos-delay="200">
                    <div
                        class="w-14 h-14 rounded-full border border-gray-200 bg-white flex items-center justify-center mb-6">
                        <svg class="w-6 h-6 text-gray-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                    </div>
                    <h3 class="text-h3-custom font-helvetica font-medium text-gray-900 mb-4 leading-tight">Advisory, not
                        sales</h3>
                    <p class="text-[18px] text-[#767C8C] font-poppins leading-relaxed">
                        We provide transparent guidance on pricing, yields and timing, backed by market data and
                        on-ground expertise.
                    </p>
                </div>

                <!-- Item 3 -->
                <div class="flex flex-col items-center text-center" data-aos="fade-up" data-aos-delay="300">
                    <div
                        class="w-14 h-14 rounded-full border border-gray-200 bg-white flex items-center justify-center mb-6">
                        <svg class="w-6 h-6 text-gray-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-h3-custom font-helvetica font-medium text-gray-900 mb-4 leading-tight">End-to-end
                        management</h3>
                    <p class="text-[18px] text-[#767C8C] font-poppins leading-relaxed">
                        One team remains dedicated to you from first conversation to handover and leasing.
                    </p>
                </div>
            </div>

        </div>
    </section>

    <!-- Legacy Section -->
    <section class="pb-[62px] pt-[62px] bg-white" data-aos="fade-up">
        <div class="container max-w-[1280px] mx-auto px-6">
            <div class="flex flex-col md:flex-row gap-9 items-center">
                <!-- Image Side -->
                <div class="sm:max-w-[45%] max-w-full relative h-[330px] md:h-[550px] w-full rounded-lg overflow-hidden" data-aos="fade-right">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/emaar.webp" alt="Legacy Skyscraper"
                        class="w-full h-full object-cover object-top">
                </div>

                <!-- Text Side -->
                <div class="sm:max-w-[55%] max-w-full" data-aos="fade-left">
                    <div class="border-l-4 border-theme pl-5 py-2">
                        <h2 class="md:text-[33px] text-[26px] font-playfair font-bold text-gray-900 uppercase leading-tight">
                            A Legacy of Excellence:<br> Redefining Landscapes, Elevating Lives
                        </h2>
                    </div>

                    <div class="pl-5 mt-8">
                        <p class="md:text-[18px] text-[16px] text-[#767C8C] font-poppins leading-relaxed">
                            At NOLIX Developments, we believe that each property possesses the potential to transcend
                            the ordinary and evolve into a true masterpiece. Every project we embark upon is an endeavor
                            and a profound opportunity to redefine
                            landscapes and enhance lives. Our unwavering commitment to crafting spaces that inspire,
                            innovate, and uplift is strengthened by an uncompromising moral compass.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

	 <!-- Quote / Slider Section -->
    <section class="relative h-[500px] w-full bg-cover bg-center flex items-center justify-center" data-aos="fade-up"
        style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/pexels-apasaric-325193.webp');">
        <!-- Overlay -->
        <div class="absolute inset-0 bg-black/60"></div>

        <div class="relative z-10 container mx-auto px-6 lg:px-12 text-center">

            <!-- Quote Slider -->
            <div class="swiper myJourneySwiper max-w-5xl mx-auto mb-12">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <h2 class="md:text-[44px] text-[26px] max-w-[800px] font-playfair text-white text-center leading-tight mx-auto drop-shadow-2xl">
                            <span class="font-poppins">"</span>Excellence is not a destination but a continuous journey of refined service. <span class="font-poppins">"</span>
                        </h2>
                    </div>
                    <div class="swiper-slide">
                        <h2 class="md:text-[44px] text-[26px] max-w-[1000px] font-playfair text-white text-center leading-tight mx-auto drop-shadow-2xl">
                            <span class="font-poppins">"</span>True luxury is about the details that others overlook—creating moments of perfection. <span class="font-poppins">"</span>
                        </h2>
                    </div>
                    <div class="swiper-slide">
                        <h2 class="md:text-[44px] text-[26px] max-w-[1000px] font-playfair text-white text-center leading-tight mx-auto drop-shadow-2xl">
                             <span class="font-poppins">"</span>Our commitment extends beyond the transaction, building lasting legacies for generations. <span class="font-poppins">"</span>
                        </h2>
                    </div>
                </div>
            </div>

            <!-- CTA Button -->
            <a href="<?php echo site_url('/property-management'); ?>"
                class="bg-[#526370] backdrop-blur-md text-white border border-white/20 px-8 py-3 rounded-full font-poppins text-sm uppercase tracking-wide transition-all mb-16 shadow-2xl hover:shadow-theme/20">
                Explore Properties
            </a>

            <!-- Slider Controls -->
            <div class="flex items-center justify-center gap-4 max-w-2xl mx-auto mt-6">
                <!-- Prev Button -->
                <button id="journey-prev"
                    class="w-10 h-10 rounded-full bg-white/10 hover:bg-white/20 backdrop-blur flex items-center justify-center text-white transition-all group z-20">
                    <svg class="w-5 h-5 group-hover:-translate-x-1 transition-transform" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7">
                        </path>
                    </svg>
                </button>

                <!-- Progress Bar -->
                <div class="h-1 bg-white/20 rounded-full flex-1 overflow-hidden">
                    <div id="journey-progress" class="h-full bg-theme w-1/3 rounded-full relative overflow-hidden transition-all duration-300">
                        <div class="absolute inset-0 bg-white/30 animate-pulse"></div>
                    </div>
                </div>

                <!-- Next Button -->
                <button id="journey-next"
                    class="w-10 h-10 rounded-full bg-white/10 hover:bg-white/20 backdrop-blur flex items-center justify-center text-white transition-all group z-20">
                    <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </button>
            </div>

        </div>
    </section>

    <!-- Our Services Section -->
    <section class="py-24 bg-navy" data-aos="fade-up">
        <div class="container max-w-[1280px] mx-auto px-6 text-center">

            <div class="mb-12" data-aos="fade-up">
                <h2 class="text-h2-custom font-playfair font-bold text-white mb-2 uppercase tracking-wide">
                    Our <span class="text-theme">Services</span>
                </h2>
                <p class="text-white/80 font-poppins text-[14px] md:text-lg">Comprehensive real estate solutions tailored to your
                    unique needs</p>
            </div>

            <div class="grid md:grid-cols-3 gap-8 text-left">
                  <!-- Buy -->
                <div class="group" data-aos="fade-up" data-aos-delay="100">
                    <div class="rounded-xl overflow-hidden mb-6 relative h-64">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/property-bg.webp"
                            alt="Buy"
                            class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                        <div class="absolute top-4 left-4 bg-white/90 p-3 rounded-full">
                            <svg class="w-6 h-6 text-theme" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                                </path>
                            </svg>
                        </div>
                    </div>
                    <h3 class="md:text-3xl text-2xl font-helvetica font-bold text-white mb-3">Buy</h3>
                    <p class="text-white/70 font-poppins mb-6 min-h-[48px]">Professional tailored guidance for the
                        end-users and investors.</p>
                    <a href="<?php echo site_url('/buy'); ?>"
                        class="bg-theme text-white px-8 py-3 rounded-full font-poppins font-medium hover:bg-white hover:text-theme transition-all">Buy
                        with NOLIX</a>
                </div>

                <!-- Sell -->
                <div class="group" data-aos="fade-up" data-aos-delay="200">
                    <div class="rounded-xl overflow-hidden mb-6 relative h-64">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/pexels-a-darmel-7642000.webp"
                            alt="Sell"
                            class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                        <div class="absolute top-4 left-4 bg-white/90 p-3 rounded-full">
                            <svg class="w-6 h-6 text-theme" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M8 11V7a4 4 0 118 0m-4 8v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2z">
                                </path>
                            </svg>
                        </div>
                    </div>
                    <h3 class="md:text-3xl text-2xl font-helvetica font-bold text-white mb-3">Sell</h3>
                    <p class="text-white/70 font-poppins mb-6 min-h-[48px]">Positioning your property to the right
                        buyers with discretion.</p>
                    <a href="<?php echo site_url('/sell'); ?>"
                        class="bg-theme text-white px-8 py-3 rounded-full font-poppins font-medium hover:bg-white hover:text-theme transition-all">Sell
                        with NOLIX</a>
                </div>

                <!-- Rent -->
                <div class="group" data-aos="fade-up" data-aos-delay="300">
                    <div class="rounded-xl overflow-hidden mb-6 relative h-64">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/key-inside-door.webp"
                            alt="Rent"
                            class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                        <div class="absolute top-4 left-4 bg-white/90 p-3 rounded-full">
                            <svg class="w-6 h-6 text-theme" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                </path>
                            </svg>
                        </div>
                    </div>
                    <h3 class="md:text-3xl text-2xl font-helvetica font-bold text-white mb-3">Rent</h3>
                    <p class="text-white/70 font-poppins mb-6 min-h-[48px]">Reliable, streamlined support for landlords
                        and tenants.</p>
                    <a href="<?php echo site_url('/rent'); ?>"
                        class="bg-theme text-white px-8 py-3 rounded-full font-poppins font-medium hover:bg-white hover:text-theme transition-all">Rent
                        with NOLIX</a>
                </div>
            </div>

        </div>
    </section>

    <!-- Latest Properties -->
    <section class="py-24 bg-white" data-aos="fade-up">
        <div class="container max-w-[1280px] mx-auto px-6">
            <div class="flex justify-between items-end mb-12" data-aos="fade-up">
                <div>
                    <h2 class="text-h2-custom font-playfair font-bold text-gray-900 mb-2 uppercase">Latest Properites
                    </h2>
<!--                     <p class="text-[#00291B] text-[14px] md:text-lg font-poppins">Experience our communities and amenities from the comfort of
                        your home.</p> -->
                </div>
                <a href="<?php echo site_url('/rent'); ?>"
                    class="hidden md:block bg-theme text-white px-8 py-3 rounded-full font-poppins font-medium hover:bg-opacity-90">View
                    All Properties</a>
            </div>

            <div class="grid md:grid-cols-3 gap-6">
                <!-- Dynamic Property Loop -->
                <?php
                $properties_query = new WP_Query(array(
                    'post_type' => 'property',
                    'posts_per_page' => 6
                ));

                if ($properties_query->have_posts()) :
                    while ($properties_query->have_posts()) : $properties_query->the_post();
                        $location = get_post_meta(get_the_ID(), '_nolix_location', true);
                        $price = get_post_meta(get_the_ID(), '_nolix_price', true);
                        ?>
                        <div class="relative rounded-xl overflow-hidden group aspect-[4/3] cursor-pointer" data-aos="fade-up" data-aos-delay="<?php echo ($properties_query->current_post * 100); ?>">
                            <?php if (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail('large', ['class' => 'w-full h-full object-cover transition-transform duration-700 group-hover:scale-110']); ?>
                            <?php else: ?>
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/placeholder.jpg"
                                    alt="<?php the_title(); ?>"
                                    class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                            <?php endif; ?>
                            
                            <div class="absolute bottom-0 inset-x-0 bg-gradient-to-t from-black/80 to-transparent p-6">
                                <span class="text-white text-lg font-bold font-helvetica text-center block"><?php the_title(); ?></span>
                            </div>
                        </div>
                    <?php
                    endwhile;
                    wp_reset_postdata();
                else:
                    // Fallback visual if no properties
                ?>
                     <div class="col-span-3 text-center text-gray-500 py-10">
                        <p>No properties found. Please add some in the admin panel.</p>
                     </div>
                <?php endif; ?>
            </div>
            
            <a href="<?php echo site_url('/team'); ?>"
                class="mt-8 mx-auto block md:hidden bg-theme text-white px-8 py-3 rounded-full font-poppins font-medium hover:bg-opacity-90">View
                All Properties</a>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="py-24 bg-[#FAFAFA] border-t border-gray-100 text-center" data-aos="fade-up">
        <div class="container max-w-[1280px] mx-auto px-6">

            <h2 class="text-h2-custom font-playfair font-bold text-gray-900 mb-2 uppercase" data-aos="fade-up">
                What Buyers <span class="text-theme">Are Saying</span>
            </h2>
            <p class="text-[#00291B] text-[14px] md:text-lg font-poppins mb-12 max-w-2xl mx-auto" data-aos="fade-up" data-aos-delay="100">
                Explore our handpicked selection of homes that combine style, comfort, and location. Each property is
                carefully.
            </p>

            <!-- Tabs -->
            <div class="flex justify-center mb-16" data-aos="fade-up" data-aos-delay="200">
                <div class="inline-flex bg-white border border-gray-200 rounded-full p-1 shadow-sm">
                    <button onclick="switchTab('buyers')" id="tab-buyers"
                        class="tab-btn px-4 md:px-8 py-2 rounded-full text-base md:text-lg font-bold transition-all bg-theme text-white">Buyers</button>
                    <button onclick="switchTab('sellers')" id="tab-sellers"
                        class="tab-btn px-4 md:px-8 py-2 rounded-full text-base md:text-lg font-bold transition-all text-gray-600 hover:text-theme">Sellers</button>
                    <button onclick="switchTab('investors')" id="tab-investors"
                        class="tab-btn px-4 md:px-8 py-2 rounded-full text-base md:text-lg font-bold transition-all text-gray-600 hover:text-theme">Investors</button>
                </div>
            </div>

            <!-- Swiper -->
            <div class="swiper testimonialSwiper sm:px-4 px-0 pb-12">
                <div class="swiper-wrapper" id="testimonial-container">
                    
                    <!-- Dynamic Testimonial Loop -->
                    <?php
                    $testimonials_query = new WP_Query(array(
                        'post_type' => 'testimonial',
                        'posts_per_page' => -1
                    ));

                    if ($testimonials_query->have_posts()) :
                        while ($testimonials_query->have_posts()) : $testimonials_query->the_post();
                            $role = get_post_meta(get_the_ID(), '_nolix_role', true);
                            $headline = get_post_meta(get_the_ID(), '_nolix_headline', true);
                            $thumbnail = get_the_post_thumbnail_url(get_the_ID(), 'thumbnail');
                            if(!$thumbnail) $thumbnail = 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?ixlib=rb-1.2.1&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80';
                            ?>
                             <div class="swiper-slide h-auto">
                                <div class="bg-white border border-[#C8CCD9] p-8 rounded-xl h-full flex flex-col shadow-sm hover:shadow-md transition-shadow">
                                    <?php if($headline): ?>
                                        <h4 class="text-xl text-left font-helvetica font-bold text-[#19191A] mb-4">"<?php echo esc_html($headline); ?>"</h4>
                                    <?php endif; ?>
                                    
                                    <div class="text-[#767C8C] text-left font-poppins leading-relaxed mb-6 flex-grow">
                                        <?php the_content(); ?>
                                    </div>
                                    
                                    <div class="flex items-center gap-4 mt-auto">
                                        <img src="<?php echo esc_url($thumbnail); ?>" alt="<?php the_title(); ?>" class="w-12 h-12 rounded-full object-cover">
                                        <div>
                                            <div class="text-left font-bold text-[#1E2A39]"><?php the_title(); ?></div>
                                            <div class="text-left text-sm text-[#767C8C] font-poppins"><?php echo esc_html($role); ?></div>
                                        </div>
                                    </div>
                                </div>
                             </div>
                        <?php
                        endwhile;
                        wp_reset_postdata();
                    else:
                        // No testimonials
                         echo '<p>No testimonials found.</p>';
                    endif;
                    ?>
                    
                </div>
                <!-- Pagination -->
                <div class="swiper-pagination"></div>
                <!-- Navigation -->
                <div class="hidden md:block swiper-button-next !text-theme"></div>
                <div class="hidden md:block swiper-button-prev !text-theme"></div>
            </div>
			
			<?php
            // Prepare Testimonial Data from WP Loop
            $testimonial_data = [];
            $testimonials_query = new WP_Query(array(
                'post_type' => 'testimonial',
                'posts_per_page' => -1
            ));

            if ($testimonials_query->have_posts()) :
                while ($testimonials_query->have_posts()) : $testimonials_query->the_post();
                    $role = get_post_meta(get_the_ID(), '_nolix_role', true);
                    $headline = get_post_meta(get_the_ID(), '_nolix_headline', true);
                    $type = get_post_meta(get_the_ID(), '_nolix_type', true);
                    $thumbnail = get_the_post_thumbnail_url(get_the_ID(), 'thumbnail');
                    if(!$thumbnail) $thumbnail = 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?ixlib=rb-1.2.1&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80';
                    
                    // Use explicit type or fallback
                    $category = $type ? $type : 'buyers'; // Default to buyers if not set
                    
                    $testimonial_data[] = [
                        'quote' => $headline,
                        'text' => get_the_content(),
                        'author' => get_the_title(),
                        'role' => $role,
                        'category' => $category,
                        'image' => $thumbnail
                    ];
                endwhile;
                wp_reset_postdata();
            endif;
            ?>
            <script>
                const testimonialData = <?php echo json_encode($testimonial_data); ?>;
            </script>
        </div>
    </section>

    <!-- Academy Section -->
    <section class="py-24 bg-[#F5F6FA]" data-aos="fade-up">
        <div class="container max-w-[1280px] mx-auto px-6">
            <div class="grid md:grid-cols-2 gap-10 items-center">
                <!-- Content -->
                <div data-aos="fade-right">
                    <h2 class="text-h2-custom font-playfair font-bold text-gray-900 mb-4">NOLIX Academy</h2>
                    <p class="text-xl text-[#00291B] font-playfair italic mb-6">Clarity for first-time and seasoned
                        owners</p>
                    <p class="text-[#767C8C] md:text-base text-[14px] font-poppins leading-relaxed mb-8">
                        We believe informed clients make confident decisions. NOLIX Academy demystifies the UAE property
                        market—covering financing options, ownership structures, legal requirements and investment
                        strategies. Whether you're a first-time buyer or a seasoned investor, our educational resources
                        equip you with the knowledge to navigate every transaction with clarity.
                    </p>

                    <ul class="space-y-4 mb-10">
                        <li class="flex items-center gap-4">
                            <div class="w-12 h-12 rounded-full bg-theme/10 flex items-center justify-center text-theme">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                        d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253">
                                    </path>
                                </svg>
                            </div>
                            <span class="text-[#767C8C] text-[14px] md:text-base font-poppins">Comprehensive market guides and reports</span>
                        </li>
                        <li class="flex items-center gap-4">
                            <div class="w-12 h-12 rounded-full bg-theme/10 flex items-center justify-center text-theme">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                    </path>
                                </svg>
                            </div>
                            <span class="text-[#767C8C] text-[14px] md:text-base font-poppins">Legal and financing documentation explained</span>
                        </li>
                        <li class="flex items-center gap-4">
                            <div class="w-12 h-12 rounded-full bg-theme/10 flex items-center justify-center text-theme">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                        d="M12 14l9-5-9-5-9 5 9 5z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                        d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z">
                                    </path>
                                </svg>
                            </div>
                            <span class="text-[#767C8C] text-[14px] md:text-base font-poppins">One-on-one consultation sessions</span>
                        </li>
                    </ul>

                    <button
                        class="bg-theme text-white px-8 py-3 rounded-full font-poppins font-medium hover:bg-opacity-90">Explore
                        Academy</button>
                </div>

                <!-- Image -->
                <div class="relative" data-aos="fade-left">
                    <div
                        class="rounded-2xl sm:p-4 p-0 z-10 relative before:content-[''] before:bg-transparent before:w-[90%] before:h-[92%] before:flex before:absolute before:border-2 before:border-theme before:rounded-[16px] before:top-[48px] md:before:left-[-6px] before:left-[-18px] before:z-[-1] ">
                        <img src="https://images.unsplash.com/photo-1560518883-ce09059eeffa?ixlib=rb-1.2.1&auto=format&fit=crop&w=1000&q=80"
                            alt="Academy" class="h-[350px] md:h-full rounded-xl shadow-2xl w-full object-cover">
                    </div>
                    <!-- Floating Badge -->
                    <div
                        class="absolute md:bottom-10 bottom-5 md:left-11 left-5 bg-navy text-white p-4 rounded-xl shadow-xl z-20 max-w-[300px]">
                        <div class="flex items-start gap-3">
                            <div class="flex items-center justify-center text-theme">
                                <svg class="md:size-8 size-4 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                        d="M12 14l9-5-9-5-9 5 9 5z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                        d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z">
                                    </path>
                                </svg>
                            </div>

                            <div>
                                <span class="text-theme font-bold text-[22px] md:text-[24px]">500+</span>
                                <p class="md:text-[22px] text-[14px] font-poppins">Clients Educated</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="py-24 bg-white" data-aos="fade-up">
        <div class="container max-w-[1280px] mx-auto px-6 text-center">
            <h2 class="text-h2-custom font-playfair font-bold text-gray-900 mb-8 md:mb-16 uppercase" data-aos="fade-up">
                Frequently <span class="text-theme">Asked Questions</span>
            </h2>

            <div class="space-y-4 text-left">
                <!-- Item 1 -->
                <div class="rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition-all" data-aos="fade-up" data-aos-delay="100">
                    <button
                        class="faq-btn w-full flex items-center justify-between px-6 py-6 bg-white">
                        <div class="flex items-center md:px-2 gap-4">
                            <span
                                class="w-8 h-6 md:h-8 rounded-full bg-theme text-white flex items-center justify-center text-xs font-bold">01</span>
                            <span class="md:text-lg text-left text-base font-bold font-helvetica text-[#00291B]">What is the process of Buying a
                                Home?</span>
                        </div>
                        <svg class="w-5 h-5 text-gray-400 transform transition-transform" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </button>
                    <div class="faq-content h-0overflow-hidden transition-all duration-300 ease-in-out">
                        <div class="pb-6 sm:pl-[1.2rem] sm:pr-[1.2rem] pl-16 pr-5  md:text-base text-p-custom md:px-20 text-[#767C8C] font-poppins leading-relaxed border-t border-gray-50">
                            Lorem Ipsum is simply dummy of the printing and typesetting industry Ipsum has been the
                            industry's dummy text ever since the 1500s.
                        </div>
                    </div>
                </div>

                <!-- Item 2 -->
                <div class="rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition-all" data-aos="fade-up" data-aos-delay="200">
                    <button
                        class="faq-btn w-full flex items-center justify-between px-6 py-6 bg-white">
                        <div class="flex items-center md:px-2 gap-4">
                            <span
                                class="md:w-8 w-[2.4rem] h-6 md:h-8 rounded-full bg-theme text-white flex items-center justify-center text-xs font-bold">02</span>
                            <span class="md:text-lg text-left text-base font-bold font-helvetica text-[#00291B] ">How much should I offer when I
                                buying the home?</span>
                        </div>
                        <svg class="w-5 h-5 text-gray-400 transform transition-transform" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </button>
                    <div class="faq-content h-0 overflow-hidden transition-all duration-300 ease-in-out">
                        <div class="pb-6 sm:pl-[1.2rem] sm:pr-[1.2rem] pl-16 pr-5  md:text-base text-p-custom md:px-20 text-[#767C8C] font-poppins leading-relaxed border-t border-gray-50">
                            Determine your budget and check market rates. We assist you in valuing property correctly
                            before making an offer.
                        </div>
                    </div>
                </div>

                <!-- Item 3 -->
                <div class="rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition-all" data-aos="fade-up" data-aos-delay="300">
                    <button
                        class="faq-btn w-full flex items-center justify-between px-6 py-6 bg-white">
                        <div class="flex items-center md:px-2 gap-4">
                            <span
                                class="w-8 h-6 md:h-8 rounded-full bg-theme text-white flex items-center justify-center text-xs font-bold">03</span>
                            <span class="md:text-lg text-left text-base font-bold font-helvetica text-[#00291B] ">What is the process of Buying a
                                Home?</span>
                        </div>
                        <svg class="w-5 h-5 text-gray-400 transform transition-transform" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </button>
                    <div class="faq-content h-0 overflow-hidden transition-all duration-300 ease-in-out">
                        <div class="pb-6 sm:pl-[1.2rem] sm:pr-[1.2rem] pl-16 pr-5  md:text-base text-p-custom md:px-20 text-[#767C8C] font-poppins leading-relaxed border-t border-gray-50">
                            Typically involves viewing, making an offer, signing an MOU, and completing the transfer at
                            the DLD.
                        </div>
                    </div>
                </div>

                <!-- Item 4 -->
                <div class="rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition-all" data-aos="fade-up" data-aos-delay="400">
                    <button
                        class="faq-btn w-full flex items-center justify-between p-6 bg-white">
                        <div class="flex items-center md:px-2 gap-4">
                            <span
                                class="w-8 h-6 md:h-8 rounded-full bg-theme text-white flex items-center justify-center text-xs font-bold">04</span>
                            <span class="md:text-lg text-left text-base font-bold font-helvetica text-[#00291B] ">Can I tour a property before
                                purchasing?</span>
                        </div>
                        <svg class="w-5 h-5 text-gray-400 transform transition-transform" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </button>
                    <div class="faq-content h-0 overflow-hidden transition-all duration-300 ease-in-out">
                        <div class="pb-6 sm:pl-[1.2rem] sm:pr-[1.2rem] pl-16 pr-5  md:text-base text-p-custom md:px-20 text-[#767C8C] font-poppins leading-relaxed border-t border-gray-50">
                            Absolutely. Viewing is an essential part of the buying process to ensure the property meets
                            your expectations.
                        </div>
                    </div>
                </div>

                <!-- Item 5 -->
                <div class="rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition-all" data-aos="fade-up" data-aos-delay="500">
                    <button
                        class="faq-btn w-full flex items-center justify-between px-6 py-6 bg-white">
                        <div class="flex items-center md:px-2 gap-4">
                            <span
                                class="w-8 h-6 md:h-8 rounded-full bg-theme text-white flex items-center justify-center text-xs font-bold">05</span>
                            <span class="md:text-lg text-left text-base font-bold font-helvetica text-[#00291B] ">How I know which property I
                                should buy?</span>
                        </div>
                        <svg class="w-5 h-5 text-gray-400 transform transition-transform" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </button>
                    <div class="faq-content h-0 overflow-hidden transition-all duration-300 ease-in-out">
                        <div class="pb-6 sm:pl-[1.2rem] sm:pr-[1.2rem] pl-16 pr-5  md:text-base text-p-custom md:px-20 text-[#767C8C] font-poppins leading-relaxed border-t border-gray-50">
                            Our agents help identify your needs, budget, and lifestyle preferences to recommend the best
                            options for you.
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

<?php get_footer(); ?>
