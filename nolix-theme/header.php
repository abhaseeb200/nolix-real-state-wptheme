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
    </style>
</head>

<body <?php body_class('bg-white'); ?>>
    <?php wp_body_open(); ?>

    <!-- Navigation -->
    <header
        class="bg-white py-6 px-6 lg:px-12 flex justify-between items-center sticky top-0 z-50 shadow-sm font-poppins">
        <!-- Left Links -->
        <nav class="hidden lg:flex gap-8 text-sm font-medium text-[#181818] uppercase tracking-wide">
            <a href="#" class="flex items-center gap-1 hover:text-theme transition-colors">About <svg class="w-4 h-4"
                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg></a>
            <a href="#" class="flex items-center gap-1 hover:text-theme transition-colors">Properties
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg></a>
            <a href="#" class="flex items-center gap-1 hover:text-theme transition-colors">Services
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg></a>
        </nav>

        <!-- Logo -->
        <div class="absolute left-1/2 top-1/2 transform -translate-x-1/2 -translate-y-1/2">
            <div class="flex flex-col items-center">
                <!-- Use dynamic path for logo -->
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.svg" width="111" height="74" alt="Logo">
            </div>
        </div>

        <!-- Right Links -->
        <div class="hidden lg:flex items-center gap-8">
            <nav class="flex gap-8 text-sm font-medium text-[#181818] uppercase tracking-wide">
                <a href="#" class="hover:text-theme transition-colors">Insights</a>
                <a href="#" class="hover:text-theme transition-colors">Contact Us</a>
            </nav>
            <a href="#"
                class="rounded-full bg-theme text-white px-6 py-3 text-sm font-medium hover:bg-opacity-90 transition-all font-poppins">Book
                Consultation</a>
        </div>

        <!-- Mobile Menu Button -->
        <button class="lg:hidden text-gray-800">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16">
                </path>
            </svg>
        </button>
    </header>
