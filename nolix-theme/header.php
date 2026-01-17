<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php bloginfo('name'); ?> <?php wp_title('|'); ?></title>
    <!-- Tailwind Config injected via functions.php -->
    
    <?php wp_head(); ?>
    
    <!-- AOS CSS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    
    <style>
        .swiper-button-next:after,
        .swiper-button-prev:after {
            background: #C19A5C;
            width: 38px;
            display: flex;
            height: 38px;
            border-radius: 100px;
            font-size: 16px;
            color: #fff;
            justify-content: center;
            align-items: center;
        }
        body {
            font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
        }
        .text-shadow {
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
        }
        /* Sidebar transition */
        .sidebar-enter {
            transform: translateX(-100%);
        }
        .sidebar-enter-active {
            transform: translateX(0);
            transition: transform 0.3s ease-out;
        }
        .sidebar-exit {
            transform: translateX(0);
        }
        .sidebar-exit-active {
            transform: translateX(-100%);
            transition: transform 0.3s ease-in;
        }
        /* Overlay transition */
        .overlay-enter {
            opacity: 0;
        }
        .overlay-enter-active {
            opacity: 1;
            transition: opacity 0.3s ease-out;
        }
        .overlay-exit {
            opacity: 1;
        }
        .overlay-exit-active {
            opacity: 0;
            transition: opacity 0.3s ease-in;
        }
        /* Responsive Navigation */
        @media (max-width: 1023px) {
            header nav {
                display: none;
            }
        }
        /* Prevent dropdown menu from being cut off */
        .relative.group:hover .absolute {
            z-index: 1000;
        }
        /* Ensure header items don't overflow on smaller desktop screens */
        @media (min-width: 1024px) and (max-width: 1280px) {
            header nav {
                gap: 0.75rem;
                font-size: 0.875rem;
            }
            header nav a:not(.rounded-full) {
                padding: 0.25rem 0.5rem;
            }
        }
    </style>
</head>
<body <?php body_class('bg-white'); ?>>
    <?php wp_body_open(); ?>
    
    <!-- Mobile Sidebar Overlay -->
    <div id="sidebarOverlay" class="fixed inset-0 bg-dark bg-opacity-50 z-40 hidden lg:hidden transition-opacity duration-300"></div>
    
    <!-- Mobile Sidebar -->
    <aside id="mobileSidebar" class="fixed top-0 right-0 h-full w-80 bg-white z-50 transform translate-x-full transition-transform duration-300 ease-out shadow-2xl lg:hidden">
        <div class="flex flex-col h-full">
            <!-- Sidebar Header -->
            <div class="flex items-center justify-between p-6 border-b border-gray-200">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.svg" width="80" height="53" alt="Logo">
                <button id="closeSidebar" class="p-2 hover:bg-lightgray rounded-full transition-colors">
                    <svg class="w-6 h-6 text-dark" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            
            <!-- Sidebar Navigation -->
            <nav class="flex-1 overflow-y-auto px-4 py-12">
                <div class="space-y-2">
					<!-- Home -->
                    <div class="border-b border-gray-100 pb-2">
                        <a href="<?php echo site_url('/'); ?>" class="block px-4 py-3 text-dark hover:bg-lightgray rounded-lg transition-colors font-medium">
                            <span class="text-sm uppercase tracking-wide">Home</span>
                        </a>
                    </div>
                    <!-- Buy -->
                    <div class="border-b border-gray-100 pb-2">
                        <a href="<?php echo site_url('/buy'); ?>" class="block px-4 py-3 text-dark hover:bg-lightgray rounded-lg transition-colors font-medium">
                            <span class="text-sm uppercase tracking-wide">Buy</span>
                        </a>
                    </div>
                    
                    <!-- Sell -->
                    <div class="border-b border-gray-100 pb-2">
                        <a href="<?php echo site_url('/sell'); ?>" class="block px-4 py-3 text-dark hover:bg-lightgray rounded-lg transition-colors font-medium">
                            <span class="text-sm uppercase tracking-wide">Sell</span>
                        </a>
                    </div>
                    
                    <!-- Rent -->
                    <div class="border-b border-gray-100 pb-2">
                        <a href="<?php echo site_url('/rent'); ?>" class="block px-4 py-3 text-dark hover:bg-lightgray rounded-lg transition-colors font-medium">
                            <span class="text-sm uppercase tracking-wide">Rent</span>
                        </a>
                    </div>
                    
                    <!-- Off-Plan -->
                    <div class="border-b border-gray-100 pb-2">
                        <a href="<?php echo site_url('/off-plan'); ?>" class="block px-4 py-3 text-dark hover:bg-lightgray rounded-lg transition-colors font-medium">
                            <span class="text-sm uppercase tracking-wide">Off-Plan</span>
                        </a>
                    </div>
                    
                    <!-- Services Menu Item with Dropdown -->
                    <div class="border-b border-gray-100 pb-2">
                        <button id="mobileServicesToggle" class="w-full flex items-center justify-between px-4 py-3 text-dark hover:bg-lightgray rounded-lg transition-colors font-medium">
                            <span class="text-sm uppercase tracking-wide">Services</span>
                            <svg id="mobileServicesIcon" class="w-4 h-4 text-black transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div id="mobileServicesDropdown" class="hidden pl-6 mt-2 space-y-1">
                            <a href="<?php echo site_url('/services/valuation'); ?>" class="block px-4 py-2 text-sm text-gray-700 hover:bg-lightgray rounded-lg transition-colors">Valuation</a>
                            <a href="<?php echo site_url('/services/consultancy'); ?>" class="block px-4 py-2 text-sm text-gray-700 hover:bg-lightgray rounded-lg transition-colors">Consultancy</a>
                            <a href="<?php echo site_url('/services/mortgage'); ?>" class="block px-4 py-2 text-sm text-gray-700 hover:bg-lightgray rounded-lg transition-colors">Mortgage Services</a>
                            <a href="<?php echo site_url('/property-management'); ?>" class="block px-4 py-2 text-sm text-gray-700 hover:bg-lightgray rounded-lg transition-colors">Property Management</a>
                        </div>
                    </div>
                    
                    <!-- About us / Meet the Team -->
                    <div class="border-b border-gray-100 pb-2">
                        <a href="<?php echo site_url('/team'); ?>" class="block px-4 py-3 text-dark hover:bg-lightgray rounded-lg transition-colors font-medium">
                            <span class="text-sm uppercase tracking-wide">About us</span>
                        </a>
                    </div>
                    
                    <!-- Insights Menu Item with Dropdown -->
                    <div class="border-b border-gray-100 pb-2">
                        <button id="mobileInsightsToggle" class="w-full flex items-center justify-between px-4 py-3 text-dark hover:bg-lightgray rounded-lg transition-colors font-medium">
                            <span class="text-sm uppercase tracking-wide">Insights</span>
                            <svg id="mobileInsightsIcon" class="w-4 h-4 text-black transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div id="mobileInsightsDropdown" class="hidden pl-6 mt-2 space-y-1">
                            <a href="<?php echo site_url('/insights'); ?>" class="block px-4 py-2 text-sm text-gray-700 hover:bg-lightgray rounded-lg transition-colors">Blog & Guides</a>
                        </div>
                    </div>
                    
                    <!-- Contact -->
<!--                     <div class="border-b border-gray-100 pb-2">
                        <a href="<?php echo site_url('/contact'); ?>" class="block px-4 py-3 text-dark hover:bg-lightgray rounded-lg transition-colors font-medium">
                            <span class="text-sm uppercase tracking-wide">Contact</span>
                        </a>
                    </div> -->
                </div>
            </nav>
            
            <!-- Sidebar Footer -->
            <div class="p-6 border-t border-gray-200 bg-lightgray">
                <a href="<?php echo site_url('/contact'); ?>" class="block w-full text-center rounded-full bg-theme text-white px-6 py-4 text-sm font-semibold hover:bg-opacity-90 transition-all shadow-lg">
                    Contact Us
				</a>
            </div>
        </div>
    </aside>
    
    <!-- Navigation -->
    <header class="bg-white py-4 px-4 sm:px-6 lg:py-4 lg:px-12 flex flex-col gap-5 justify-center items-center sticky top-0 z-50 shadow-sm font-poppins">
        <!-- Logo - Left Side -->
        <div class="flex-shrink-0 z-10">
            <a href="<?php echo home_url(); ?>" class="flex items-center">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.svg" width="111" height="74" class="sm:ml-0 ml-[10px] transform sm:scale-110 scale-150 h-8 sm:h-10 lg:h-[60px] w-auto" alt="Logo">
            </a>
        </div>

        <!-- Menu Items - Right Side (Desktop) -->
        <nav class="hidden lg:flex items-center gap-4 xl:gap-6 text-sm font-medium text-[#181818] uppercase tracking-wide">
			<a href="<?php echo site_url('/'); ?>" class="hover:text-theme transition-colors whitespace-nowrap">Home</a>
            <a href="<?php echo site_url('/buy'); ?>" class="hover:text-theme transition-colors whitespace-nowrap">Buy</a>
            <a href="<?php echo site_url('/sell'); ?>" class="hover:text-theme transition-colors whitespace-nowrap">Sell</a>
            <a href="<?php echo site_url('/rent'); ?>" class="hover:text-theme transition-colors whitespace-nowrap">Rent</a>
            <a href="<?php echo site_url('/off-plan'); ?>" class="hover:text-theme transition-colors whitespace-nowrap">Off-Plan</a>
            
            <!-- Services Dropdown -->
            <div class="relative group">
                <a href="<?php echo site_url('/services'); ?>" class="flex items-center gap-1 hover:text-theme transition-colors cursor-pointer whitespace-nowrap">
                    Services
                    <svg class="w-4 h-4 transition-transform group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </a>
                <div class="absolute top-full right-0 mt-2 w-64 bg-white shadow-lg rounded-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 border border-gray-100 py-2 z-50">
                    <a href="<?php echo site_url('/services/valuation'); ?>" class="block px-[20px!important] py-[12px!important] hover:bg-lightgray hover:text-theme transition-colors">Valuation</a>
                    <a href="<?php echo site_url('/services/consultancy'); ?>" class="block px-[20px!important] py-[12px!important] hover:bg-lightgray hover:text-theme transition-colors">Consultancy</a>
                    <a href="<?php echo site_url('/services/mortgage'); ?>" class="block px-[20px!important] py-[12px!important] hover:bg-lightgray hover:text-theme transition-colors">Mortgage Services</a>
                    <a href="<?php echo site_url('/property-management'); ?>" class="block px-[20px!important] py-[12px!important] hover:bg-lightgray hover:text-theme transition-colors">Property Management</a>
                </div>
            </div>

            <a href="<?php echo site_url('/team'); ?>" class="hover:text-theme transition-colors whitespace-nowrap">About us</a>
            
            <!-- Insights Dropdown -->
            <div class="relative group">
                <a href="<?php echo site_url('/insights'); ?>" class="flex items-center gap-1 hover:text-theme transition-colors cursor-pointer whitespace-nowrap">
                    Insights
                    <svg class="w-4 h-4 transition-transform group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </a>
                <div class="absolute top-full right-0 mt-2 w-64 bg-white shadow-lg rounded-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 border border-gray-100 py-2 z-50">
                    <a href="<?php echo site_url('/insights'); ?>" class="block px-[20px!important] py-[12px!important] hover:bg-lightgray hover:text-theme transition-colors">Blog & Guides</a>
                </div>
            </div>
            
<!--             <a href="<?php echo site_url('/contact'); ?>" class="hover:text-theme transition-colors whitespace-nowrap">Contact</a> -->
            
            <a href="<?php echo site_url('/contact'); ?>" class="rounded-full bg-theme text-white px-6 py-3 text-sm font-medium hover:bg-opacity-90 transition-all font-poppins whitespace-nowrap ml-2">
                Contact Us
            </a>
        </nav>

        <!-- Mobile Menu Button - Right Side -->
        <button id="openSidebar" class="lg:hidden text-gray-800 p-2 rounded-lg transition-colors hover:bg-lightgray z-10 flex-shrink-0">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16">
                </path>
            </svg>
            <span class="sr-only">Open menu</span>
        </button>
    </header>

    <script>
        // Sidebar functionality
        const openSidebarBtn = document.getElementById('openSidebar');
        const closeSidebarBtn = document.getElementById('closeSidebar');
        const sidebar = document.getElementById('mobileSidebar');
        const overlay = document.getElementById('sidebarOverlay');
        let isSidebarOpen = false;

        function openSidebar() {
            sidebar.classList.remove('translate-x-full');
            overlay.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
            isSidebarOpen = true;
        }

        function closeSidebar() {
            sidebar.classList.add('translate-x-full');
            overlay.classList.add('hidden');
            document.body.style.overflow = '';
            isSidebarOpen = false;
        }

        function toggleSidebar() {
            if (isSidebarOpen) {
                closeSidebar();
            } else {
                openSidebar();
            }
        }

        openSidebarBtn.addEventListener('click', toggleSidebar);
        closeSidebarBtn.addEventListener('click', closeSidebar);
        overlay.addEventListener('click', closeSidebar);

        // Close sidebar on escape key
        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape') {
                closeSidebar();
            }
        });

        // Mobile dropdown functionality
        const servicesToggle = document.getElementById('mobileServicesToggle');
        const servicesDropdown = document.getElementById('mobileServicesDropdown');
        const servicesIcon = document.getElementById('mobileServicesIcon');
        
        const insightsToggle = document.getElementById('mobileInsightsToggle');
        const insightsDropdown = document.getElementById('mobileInsightsDropdown');
        const insightsIcon = document.getElementById('mobileInsightsIcon');

        if (servicesToggle && servicesDropdown && servicesIcon) {
            servicesToggle.addEventListener('click', function() {
                const isHidden = servicesDropdown.classList.contains('hidden');
                if (isHidden) {
                    servicesDropdown.classList.remove('hidden');
                    servicesIcon.style.transform = 'rotate(180deg)';
                } else {
                    servicesDropdown.classList.add('hidden');
                    servicesIcon.style.transform = 'rotate(0deg)';
                }
            });
        }

        if (insightsToggle && insightsDropdown && insightsIcon) {
            insightsToggle.addEventListener('click', function() {
                const isHidden = insightsDropdown.classList.contains('hidden');
                if (isHidden) {
                    insightsDropdown.classList.remove('hidden');
                    insightsIcon.style.transform = 'rotate(180deg)';
                } else {
                    insightsDropdown.classList.add('hidden');
                    insightsIcon.style.transform = 'rotate(0deg)';
                }
            });
        }
    </script>