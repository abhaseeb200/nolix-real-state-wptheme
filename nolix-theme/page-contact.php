<?php
/**
 * Template Name: Contact Page
 */

get_header();

// Hero Section
get_template_part('template-parts/hero', null, [
    'title' => 'CONTACT <span class="text-theme">US</span>',
    'subtitle' => 'Get in touch with our team. We are here to help you with all your real estate needs.',
    'image' => get_template_directory_uri() . '/assets/images/mobile calulator.webp',
    'buttons' => []
]);
?>

<!-- Contact Info Section -->
<section class="py-16 lg:py-24 bg-white" data-aos="fade-up">
    <div class="container mx-auto px-6 lg:px-12">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-16">
            <!-- Contact Info Card 1 -->
            <div class="bg-lightgray p-8 rounded-xl text-center" data-aos="fade-up" data-aos-delay="100">
                <div class="w-16 h-16 bg-theme rounded-full flex items-center justify-center mx-auto mb-6">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                </div>
                <h3 class="font-playfair text-xl font-bold text-dark mb-3 uppercase">Email</h3>
                <p class="text-gray-600 font-poppins mb-2">
                    <a href="mailto:hello@nolix.com" class="hover:text-theme transition-colors">hello@nolix.com</a>
                </p>
                <p class="text-gray-600 font-poppins">
                    <a href="mailto:info@nolix.com" class="hover:text-theme transition-colors">info@nolix.com</a>
                </p>
            </div>

            <!-- Contact Info Card 2 -->
            <div class="bg-lightgray p-8 rounded-xl text-center" data-aos="fade-up" data-aos-delay="200">
                <div class="w-16 h-16 bg-theme rounded-full flex items-center justify-center mx-auto mb-6">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                    </svg>
                </div>
                <h3 class="font-playfair text-xl font-bold text-dark mb-3 uppercase">Phone</h3>
                <p class="text-gray-600 font-poppins mb-2">
                    <a href="tel:+971501234567" class="hover:text-theme transition-colors">+971 50 123 4567</a>
                </p>
                <p class="text-gray-600 font-poppins">
                    <a href="tel:+97142123456" class="hover:text-theme transition-colors">+971 4 212 3456</a>
                </p>
            </div>

            <!-- Contact Info Card 3 -->
            <div class="bg-lightgray p-8 rounded-xl text-center" data-aos="fade-up" data-aos-delay="300">
                <div class="w-16 h-16 bg-theme rounded-full flex items-center justify-center mx-auto mb-6">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                </div>
                <h3 class="font-playfair text-xl font-bold text-dark mb-3 uppercase">Address</h3>
                <p class="text-gray-600 font-poppins leading-relaxed">
                    Office 12, 32nd Floor<br>
                    Parklane Tower, Business Bay<br>
                    ORN 56000<br>
                    Dubai, UAE
                </p>
            </div>
        </div>

        <!-- Map Section -->
        <div class="mt-16 rounded-xl overflow-hidden shadow-lg" data-aos="fade-up" data-aos-delay="400">
            <iframe 
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3610.198509824605!2d55.2618939!3d25.1852338!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e5f692eb870c16f%3A0x7296bac774e84392!2sNolix%20Real%20Estate!5e0!3m2!1sen!2s!4v1699999999999!5m2!1sen!2s" 
                width="100%" 
                height="450" 
                style="border:0;" 
                allowfullscreen="" 
                loading="lazy" 
                referrerpolicy="no-referrer-when-downgrade"
                class="w-full">
            </iframe>
            <div class="mt-4 text-center">
                <a href="https://maps.app.goo.gl/zjL9KTUcMuGqm489A" target="_blank" rel="noopener noreferrer" class="text-theme hover:text-dark transition-colors font-poppins underline">
                    Open in Google Maps
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Contact Form Section -->
<section class="py-16 lg:py-24 bg-[#F5F6FA]" data-aos="fade-up">
    <div class="container mx-auto px-6 lg:px-12">
        <?php echo do_shortcode('[contact_form]'); ?>
    </div>
</section>

<?php get_footer(); ?>

