<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php bloginfo('name'); ?> <?php wp_title('|'); ?></title>
    <!-- Tailwind Config injected via functions.php -->
    
    <?php wp_head(); ?>
    
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
                    <!-- About Menu Item -->
                    <div class="border-b border-gray-100 pb-2">
                        <a href="<?php echo site_url('/about-us'); ?>" class="w-full flex items-center justify-between px-4 py-3 text-dark hover:bg-lightgray rounded-lg transition-colors font-medium">
                            <span class="text-sm uppercase tracking-wide">About</span>
                            <svg class="w-4 h-4 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </a>
                    </div>
                    
                    <!-- Properties Menu Item -->
                    <div class="border-b border-gray-100 pb-2">
                        <a href="<?php echo site_url('/property-management'); ?>" class="w-full flex items-center justify-between px-4 py-3 text-dark hover:bg-lightgray rounded-lg transition-colors font-medium">
                            <span class="text-sm uppercase tracking-wide">Properties</span>
                            <svg class="w-4 h-4 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </a>
                    </div>
                    
                    <!-- Services Menu Item -->
                    <div class="border-b border-gray-100 pb-2">
                        <a href="<?php echo site_url('/our-services'); ?>" class="w-full flex items-center justify-between px-4 py-3 text-dark hover:bg-lightgray rounded-lg transition-colors font-medium">
                            <span class="text-sm uppercase tracking-wide">Services</span>
                            <svg class="w-4 h-4 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </a>
                    </div>
                    
                    <!-- Insights Menu Item -->
                    <div class="border-b border-gray-100 pb-2">
                        <a href="#" class="block px-4 py-3 text-dark hover:bg-lightgray rounded-lg transition-colors font-medium">
                            <span class="text-sm uppercase tracking-wide">Insights</span>
                        </a>
                    </div>
                    
                    <!-- Contact Us Menu Item -->
                    <div class="border-b border-gray-100 pb-2">
                        <a href="#" class="block px-4 py-3 text-dark hover:bg-lightgray rounded-lg transition-colors font-medium">
                            <span class="text-sm uppercase tracking-wide">Contact Us</span>
                        </a>
                    </div>
                </div>
            </nav>
            
            <!-- Sidebar Footer -->
            <div class="p-6 border-t border-gray-200 bg-lightgray">
                <a href="<?php echo site_url('/consultancy'); ?>" class="block w-full text-center rounded-full bg-theme text-white px-6 py-4 text-sm font-semibold hover:bg-opacity-90 transition-all shadow-lg">
                    Book Consultation
				</a>
            </div>
        </div>
    </aside>
    
    <!-- Navigation -->
    <header class="bg-white py-6 px-6 lg:px-12 flex justify-between items-center sticky top-0 z-50 shadow-sm font-poppins">
        <!-- Left Links -->
        <nav class="hidden lg:flex gap-8 text-sm font-medium text-[#181818] uppercase tracking-wide">
            <a href="<?php echo site_url('/about-us'); ?>" class="flex items-center gap-1 hover:text-theme transition-colors">About <svg class="w-4 h-4"
                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg></a>
            <a href="<?php echo site_url('/property-management'); ?>" class="flex items-center gap-1 hover:text-theme transition-colors">Properties
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg></a>
            <a href="<?php echo site_url('/our-services'); ?>" class="flex items-center gap-1 hover:text-theme transition-colors">Services
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg></a>
        </nav>
        <!-- Logo -->
        <div class="absolute left-1/2 top-1/2 transform -translate-x-1/2 -translate-y-1/2">
            <div class="flex flex-col items-center">
                <!-- Use dynamic path for logo -->
                <a href="<?php echo home_url(); ?>">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.svg" width="111" height="74" class="w-full md:h-auto h-[60px]" alt="Logo">
                </a>
            </div>
        </div>
        <!-- Right Links -->
        <div class="hidden lg:flex items-center gap-8">
            <nav class="flex gap-8 text-sm font-medium text-[#181818] uppercase tracking-wide">
                <a href="#" class="hover:text-theme transition-colors">Insights</a>
                <a href="#" class="hover:text-theme transition-colors">Contact Us</a>
            </nav>
            <a href="<?php echo site_url('/consultancy'); ?>"
                class="rounded-full bg-theme text-white px-6 py-3 text-sm font-medium hover:bg-opacity-90 transition-all font-poppins">Book
                Consultation</a>
        </div>
        <!-- Mobile Menu Button -->
        <button id="openSidebar" class="lg:hidden text-gray-800 p-2 rounded-lg transition-colors w-full flex justify-end">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16">
                </path>
            </svg>
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
    </script>