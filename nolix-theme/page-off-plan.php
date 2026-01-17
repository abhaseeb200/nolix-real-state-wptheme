<?php
/**
 * Template Name: Off-Plan Page
 */

get_header();

// Hero Section
get_template_part('template-parts/hero', null, [
    'title' => "Invest in Dubai<span class='font-poppins'>'</span>s Future  <span class='text-theme'>Off Plan Excellence</span>",
    'subtitle' => 'Early access to premier developments with flexible payment plans and high ROI potential',
    'image' => get_template_directory_uri() . '/assets/images/mobile calulator.webp',
    'buttons' => [
        ['text' => 'Explore Projects', 'url' => '#featured-projects', 'style' => 'primary'],
        ['text' => 'Investment Consultation', 'url' => '#consultation-form', 'style' => 'secondary']
    ]
]);
?>

<!-- Featured Developers Section -->
<section class="py-16 lg:py-24 bg-white" data-aos="fade-up">
    <div class="container mx-auto px-6 lg:px-12">
        <div class="text-center mb-12" data-aos="fade-up">
            <h2 class="font-playfair text-h2-custom font-bold text-dark mb-4 uppercase">
                Featured <span class="text-theme">Developers</span>
            </h2>
        </div>
        
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4 md:gap-6">
            <?php
            $developers = [
                'Emaar Properties',
                'Dubai Properties',
                'Meraas',
                'Damac Properties',
                'Nakheel',
                'Sobha Realty'
            ];
            $delay = 100;
            foreach ($developers as $developer) :
            ?>
                <div class="bg-white border border-gray-200 rounded-lg p-6 text-center hover:shadow-md transition-shadow" data-aos="fade-up" data-aos-delay="<?php echo $delay; ?>">
                    <h3 class="font-playfair text-dark text-lg font-semibold leading-tight">
                        <?php echo esc_html($developer); ?>
                    </h3>
                </div>
            <?php 
            $delay += 50;
            endforeach; ?>
        </div>
    </div>
</section>

<!-- Featured Off-Plan Projects Section -->
<section id="featured-projects" class="py-16 lg:py-24 bg-[#FAFAFA]" data-aos="fade-up">
    <div class="container mx-auto px-6 lg:px-12">
        <div class="mb-12" data-aos="fade-up">
            <h2 class="font-playfair text-h2-custom font-bold text-dark mb-4 uppercase">
				Featured <span class="text-theme">Off Plan Projects</span>
            </h2>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php
            $projects = [
                [
                    'name' => 'Azure Residences',
                    'developer' => 'EMAAR PROPERTIES',
                    'location' => 'Dubai Marina',
                    'completion' => 'Q4 2026',
                    'payment_plan' => '60/40',
                    'price' => 'From AED 1',
                    'features' => ['Private beach access', 'Infinity pool', 'Panoramic sea views'],
                    'progress' => 20
                ],
                [
                    'name' => 'Verde Villas',
                    'developer' => 'DAMAC PROPERTIES',
                    'location' => 'Damac Hills 2',
                    'completion' => 'Q2 2027',
                    'payment_plan' => '70/30',
                    'price' => 'From AED 2',
                    'features' => ['Golf course views', 'Private pools', 'Walkable community'],
                    'progress' => 85
                ],
                [
                    'name' => 'The Sterling',
                    'developer' => 'DUBAI PROPERTIES',
                    'location' => 'Business Bay',
                    'completion' => 'Q1 2026',
                    'payment_plan' => '60/40',
                    'price' => 'From AED 980',
                    'features' => ['Canal views', 'Gym & spa facilities', 'Green building certified'],
                    'progress' => 45
                ]
            ];
            
            $project_delay = 100;
            foreach ($projects as $project) :
            ?>
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-lg transition-shadow" data-aos="fade-up" data-aos-delay="<?php echo $project_delay; ?>">
                    <div class="h-48 bg-gradient-to-br from-gray-200 to-gray-300 relative">
                        <div class="absolute inset-0 flex items-center justify-center">
                            <h3 class="font-playfair text-2xl font-bold text-dark"><?php echo esc_html($project['name']); ?></h3>
                        </div>
                    </div>
                    
                    <div class="p-6">
                        <p class="text-theme text-xs font-semibold uppercase tracking-wide mb-2"><?php echo esc_html($project['developer']); ?></p>
                        <h3 class="font-playfair text-xl font-bold text-dark mb-3"><?php echo esc_html($project['name']); ?></h3>
                        
                        <div class="flex items-center text-gray-600 text-sm mb-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            <span><?php echo esc_html($project['location']); ?></span>
                        </div>
                        
                        <div class="grid grid-cols-2 gap-4 mb-4 text-sm">
                            <div>
                                <p class="text-gray-500 mb-1">Completion</p>
                                <p class="font-semibold text-dark"><?php echo esc_html($project['completion']); ?></p>
                            </div>
                            <div>
                                <p class="text-gray-500 mb-1">Payment Plan</p>
                                <p class="font-semibold text-dark"><?php echo esc_html($project['payment_plan']); ?></p>
                            </div>
                        </div>
                        
                        <p class="text-theme font-bold text-lg mb-4"><?php echo esc_html($project['price']); ?></p>
                        
                        <div class="space-y-2 mb-4">
                            <?php foreach ($project['features'] as $feature) : ?>
                                <div class="flex items-center text-sm text-gray-700">
                                    <svg class="w-4 h-4 text-green-500 mr-2 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                    </svg>
                                    <span><?php echo esc_html($feature); ?></span>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        
                        <div class="mb-4">
                            <div class="flex justify-between text-sm text-gray-600 mb-1">
                                <span>Construction Progress</span>
                                <span class="font-semibold"><?php echo esc_html($project['progress']); ?>%</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-2">
                                <div class="bg-theme h-2 rounded-full" style="width: <?php echo esc_attr($project['progress']); ?>%"></div>
                            </div>
                        </div>
                        
                        <div class="flex gap-2 mt-6">
                            <button class="flex-1 border border-gray-300 text-dark py-2 px-4 rounded-lg font-medium hover:bg-gray-50 transition">
                                View Details
                            </button>
                            <button class="flex-1 bg-theme text-white py-2 px-4 rounded-lg font-medium hover:bg-opacity-90 transition">
                                Book Site Visit
                            </button>
                        </div>
                    </div>
                </div>
            <?php 
                $project_delay += 100;
            endforeach; ?>
        </div>
    </div>
</section>

<!-- ROI Calculator Section -->
<section class="py-16 lg:py-24 bg-white" data-aos="fade-up">
    <div class="container mx-auto px-6 lg:px-12">
        <div class="max-w-3xl mx-auto">
            <div class="text-center mb-12" data-aos="fade-up">
                <h2 class="font-playfair text-h2-custom font-bold text-dark mb-4 uppercase">
                    Calculate Your Off Plan Investment <span class="text-theme">Returns</span>
                </h2>
            </div>
            
            <div class="bg-[#F5F5F0] rounded-2xl p-8 md:p-12" data-aos="fade-up" data-aos-delay="100">
                <form id="roi-calculator-form" class="space-y-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-dark font-medium mb-2 font-poppins">Purchase Price (AED)</label>
                            <div class="relative">
                                <input type="number" id="purchase_price" value="1500000" min="0" step="1000" class="w-full px-4 py-3 rounded-lg bg-white border border-gray-200 focus:border-theme focus:ring-1 focus:ring-theme outline-none transition-all font-poppins">
                                <div class="absolute right-3 top-1/2 transform -translate-y-1/2 flex flex-col">
                                    <button type="button" class="roi-increment text-gray-400 hover:text-theme" data-field="purchase_price" data-direction="up">▲</button>
                                    <button type="button" class="roi-increment text-gray-400 hover:text-theme" data-field="purchase_price" data-direction="down">▼</button>
                                </div>
                            </div>
                        </div>
                        
                        <div>
                            <label class="block text-dark font-medium mb-2 font-poppins">Down Payment (%)</label>
                            <div class="relative">
                                <input type="number" id="down_payment" value="20" min="0" max="100" step="5" class="w-full px-4 py-3 rounded-lg bg-white border border-gray-200 focus:border-theme focus:ring-1 focus:ring-theme outline-none transition-all font-poppins">
                                <div class="absolute right-3 top-1/2 transform -translate-y-1/2 flex flex-col">
                                    <button type="button" class="roi-increment text-gray-400 hover:text-theme" data-field="down_payment" data-direction="up">▲</button>
                                    <button type="button" class="roi-increment text-gray-400 hover:text-theme" data-field="down_payment" data-direction="down">▼</button>
                                </div>
                            </div>
                        </div>
                        
                        <div>
                            <label class="block text-dark font-medium mb-2 font-poppins">Construction Period (months)</label>
                            <div class="relative">
                                <input type="number" id="construction_period" value="24" min="1" step="1" class="w-full px-4 py-3 rounded-lg bg-white border border-gray-200 focus:border-theme focus:ring-1 focus:ring-theme outline-none transition-all font-poppins">
                                <div class="absolute right-3 top-1/2 transform -translate-y-1/2 flex flex-col">
                                    <button type="button" class="roi-increment text-gray-400 hover:text-theme" data-field="construction_period" data-direction="up">▲</button>
                                    <button type="button" class="roi-increment text-gray-400 hover:text-theme" data-field="construction_period" data-direction="down">▼</button>
                                </div>
                            </div>
                        </div>
                        
                        <div>
                            <label class="block text-dark font-medium mb-2 font-poppins">Expected Appreciation (%)</label>
                            <div class="relative">
                                <input type="number" id="expected_appreciation" value="20" min="0" max="100" step="1" class="w-full px-4 py-3 rounded-lg bg-white border border-gray-200 focus:border-theme focus:ring-1 focus:ring-theme outline-none transition-all font-poppins">
                                <div class="absolute right-3 top-1/2 transform -translate-y-1/2 flex flex-col">
                                    <button type="button" class="roi-increment text-gray-400 hover:text-theme" data-field="expected_appreciation" data-direction="up">▲</button>
                                    <button type="button" class="roi-increment text-gray-400 hover:text-theme" data-field="expected_appreciation" data-direction="down">▼</button>
                                </div>
                            </div>
                        </div>
                        
                        <div class="md:col-span-2">
                            <label class="block text-dark font-medium mb-2 font-poppins">Expected Rental Yield (%)</label>
                            <div class="relative">
                                <input type="number" id="rental_yield" value="6" min="0" max="100" step="0.5" class="w-full px-4 py-3 rounded-lg bg-white border border-gray-200 focus:border-theme focus:ring-1 focus:ring-theme outline-none transition-all font-poppins">
                                <div class="absolute right-3 top-1/2 transform -translate-y-1/2 flex flex-col">
                                    <button type="button" class="roi-increment text-gray-400 hover:text-theme" data-field="rental_yield" data-direction="up">▲</button>
                                    <button type="button" class="roi-increment text-gray-400 hover:text-theme" data-field="rental_yield" data-direction="down">▼</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="text-center pt-4">
                        <button type="submit" class="bg-theme text-white px-8 py-3 rounded-lg font-medium hover:bg-opacity-90 transition font-poppins">
                            Calculate ROI
                        </button>
                    </div>
                    
                    <div id="roi-results" class="hidden mt-8 p-6 bg-white rounded-lg border border-gray-200">
                        <h3 class="font-playfair text-xl font-bold text-dark mb-4">Investment Analysis</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm">
                            <div>
                                <p class="text-gray-600">Total Investment</p>
                                <p class="font-bold text-dark text-lg" id="total-investment">-</p>
                            </div>
                            <div>
                                <p class="text-gray-600">Expected Property Value</p>
                                <p class="font-bold text-dark text-lg" id="expected-value">-</p>
                            </div>
                            <div>
                                <p class="text-gray-600">Capital Appreciation</p>
                                <p class="font-bold text-green-600 text-lg" id="capital-appreciation">-</p>
                            </div>
                            <div>
                                <p class="text-gray-600">Annual Rental Income</p>
                                <p class="font-bold text-dark text-lg" id="annual-rental">-</p>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- Why Buy Off-Plan with NOLIX Section -->
<section class="py-20 bg-navy text-white" data-aos="fade-up">
    <div class="container mx-auto px-6 lg:px-12">
        <div class="text-center mb-16" data-aos="fade-up">
            <h2 class="font-playfair text-h2-custom font-bold mb-4">
                <span class="text-white">WHY BUY OFF PLAN WITH <span class="font-poppins">&</span> </span><span class="text-theme">NOLIX</span>
            </h2>
            <p class="text-[#F0F1F5] text-p-custom max-w-3xl mx-auto">
                Comprehensive support throughout your off-plan investment journey
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Benefit 1 -->
            <div class="bg-[linear-gradient(0.1deg,rgba(247,184,116,0.15)_0%,rgba(97,97,97,0.09)_100%)] p-6 rounded-lg border border-white/10 hover:border-theme/50 transition duration-300" data-aos="fade-up" data-aos-delay="100">
                <div class="w-12 h-12 bg-theme rounded-full flex items-center justify-center mb-6 text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                </div>
                <h3 class="font-poppins text-xl font-semibold tracking-wider mb-3 md:min-h-[50px] h-auto">
                    Developer Relationships
                </h3>
                <p class="text-[#FFFFFF99] md:text-base text-sm leading-relaxed tracking-wider">
                    Priority access and exclusive inventory through our established partnerships with Dubai's top developers.
                </p>
            </div>
            
            <!-- Benefit 2 -->
            <div class="bg-[linear-gradient(0.1deg,rgba(247,184,116,0.15)_0%,rgba(97,97,97,0.09)_100%)] p-6 rounded-lg border border-white/10 hover:border-theme/50 transition duration-300" data-aos="fade-up" data-aos-delay="200">
                <div class="w-12 h-12 bg-theme rounded-full flex items-center justify-center mb-6 text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                    </svg>
                </div>
                <h3 class="font-poppins text-xl font-semibold tracking-wider mb-3 md:min-h-[50px] h-auto">
                    Market Intelligence
                </h3>
                <p class="text-[#FFFFFF99] md:text-base text-sm leading-relaxed tracking-wider">
                    Data-driven recommendations on growth areas backed by comprehensive market analysis and forecasting.
                </p>
            </div>
            
            <!-- Benefit 3 -->
            <div class="bg-[linear-gradient(0.1deg,rgba(247,184,116,0.15)_0%,rgba(97,97,97,0.09)_100%)] p-6 rounded-lg border border-white/10 hover:border-theme/50 transition duration-300" data-aos="fade-up" data-aos-delay="300">
                <div class="w-12 h-12 bg-theme rounded-full flex items-center justify-center mb-6 text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <h3 class="font-poppins text-xl font-semibold tracking-wider mb-3 md:min-h-[50px] h-auto">
                    End-to-End Support
                </h3>
                <p class="text-[#FFFFFF99] md:text-base text-sm leading-relaxed tracking-wider">
                    From reservation to rental management, we guide you through every step of your investment journey.
                </p>
            </div>
            
            <!-- Benefit 4 -->
            <div class="bg-[linear-gradient(0.1deg,rgba(247,184,116,0.15)_0%,rgba(97,97,97,0.09)_100%)] p-6 rounded-lg border border-white/10 hover:border-theme/50 transition duration-300" data-aos="fade-up" data-aos-delay="400">
                <div class="w-12 h-12 bg-theme rounded-full flex items-center justify-center mb-6 text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                    </svg>
                </div>
                <h3 class="font-poppins text-xl font-semibold tracking-wider mb-3 md:min-h-[50px] h-auto">
                    Investment Protection
                </h3>
                <p class="text-[#FFFFFF99] md:text-base text-sm leading-relaxed tracking-wider">
                    Due diligence on developer track records to ensure you invest with trusted, proven developers.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Investor Success Stories Section -->
<section class="py-20 bg-[FAFAFA]" data-aos="fade-up">
    <div class="container mx-auto px-6">
        <div class="text-center sm:mb-16 mb-8" data-aos="fade-up">
            <h2 class="font-playfair text-h2-custom font-bold text-dark mb-4 uppercase">
                Investor <span class="text-theme">Success Stories</span>
            </h2>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <?php
            $testimonials = [
                [
                    'quote' => 'Bought off-plan in 2023, property increased 22% by handover in 2025. NOLIX\'s market insight was invaluable.',
                    'author' => 'Ahmed K.',
                    'role' => 'Real Estate Investor',
                    'image' => 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?ixlib=rb-1.2.1&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80'
                ],
                [
                    'quote' => 'NOLIX\'s payment plan structuring helped me invest in three projects simultaneously. Smart investment strategy.',
                    'author' => 'Sarah M.',
                    'role' => 'Portfolio Investor',
                    'image' => 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80'
                ],
                [
                    'quote' => 'Their market analysis was spot-on. My Dubai Marina apartment is now worth 30% more than purchase price.',
                    'author' => 'James L.',
                    'role' => 'International Investor',
                    'image' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-1.2.1&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80'
                ]
            ];
            
            $testimonial_delay = 100;
            foreach ($testimonials as $testimonial) :
            ?>
                <div class="p-8 bg-white border border-[#C8CCD9] rounded-lg shadow-sm" data-aos="fade-up" data-aos-delay="<?php echo $testimonial_delay; ?>">
                    <div class="text-[#767C8C] mb-6 leading-relaxed">
                        "<?php echo esc_html($testimonial['quote']); ?>"
                    </div>
                    <div class="flex items-center gap-4">
                        <img src="<?php echo esc_url($testimonial['image']); ?>" alt="<?php echo esc_attr($testimonial['author']); ?>" class="w-12 h-12 rounded-full object-cover">
                        <div>
                            <h4 class="font-bold text-dark font-poppins"><?php echo esc_html($testimonial['author']); ?></h4>
                            <p class="text-xs text-[#A4A7B0]"><?php echo esc_html($testimonial['role']); ?></p>
                        </div>
                    </div>
                </div>
            <?php 
                $testimonial_delay += 100;
            endforeach; ?>
        </div>
    </div>
</section>

<!-- Consultation Form Section -->
<section id="consultation-form" class="py-16 lg:py-24 bg-[#F5F6FA]" data-aos="fade-up">
    <div class="container mx-auto px-6 lg:px-12">
        <?php echo do_shortcode('[off_plan_consultation_form]'); ?>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // ROI Calculator Increment/Decrement Buttons
    document.querySelectorAll('.roi-increment').forEach(function(btn) {
        btn.addEventListener('click', function() {
            var fieldId = this.getAttribute('data-field');
            var direction = this.getAttribute('data-direction');
            var input = document.getElementById(fieldId);
            if (!input) return;
            
            var currentValue = parseFloat(input.value) || 0;
            var step = parseFloat(input.getAttribute('step')) || 1;
            var min = parseFloat(input.getAttribute('min')) || 0;
            var max = parseFloat(input.getAttribute('max')) || Infinity;
            
            if (direction === 'up') {
                currentValue = Math.min(currentValue + step, max);
            } else {
                currentValue = Math.max(currentValue - step, min);
            }
            
            input.value = currentValue;
            input.dispatchEvent(new Event('input'));
        });
    });
    
    // ROI Calculator Form Submission
    var roiForm = document.getElementById('roi-calculator-form');
    if (roiForm) {
        roiForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            var purchasePrice = parseFloat(document.getElementById('purchase_price').value) || 0;
            var downPaymentPercent = parseFloat(document.getElementById('down_payment').value) || 0;
            var constructionPeriod = parseFloat(document.getElementById('construction_period').value) || 0;
            var appreciationPercent = parseFloat(document.getElementById('expected_appreciation').value) || 0;
            var rentalYieldPercent = parseFloat(document.getElementById('rental_yield').value) || 0;
            
            var downPayment = purchasePrice * (downPaymentPercent / 100);
            var loanAmount = purchasePrice - downPayment;
            
            var expectedValue = purchasePrice * (1 + appreciationPercent / 100);
            var capitalAppreciation = expectedValue - purchasePrice;
            var annualRental = expectedValue * (rentalYieldPercent / 100);
            
            // Display results
            document.getElementById('total-investment').textContent = 'AED ' + downPayment.toLocaleString('en-US');
            document.getElementById('expected-value').textContent = 'AED ' + expectedValue.toLocaleString('en-US');
            document.getElementById('capital-appreciation').textContent = 'AED ' + capitalAppreciation.toLocaleString('en-US');
            document.getElementById('annual-rental').textContent = 'AED ' + annualRental.toLocaleString('en-US');
            
            document.getElementById('roi-results').classList.remove('hidden');
            document.getElementById('roi-results').scrollIntoView({ behavior: 'smooth', block: 'nearest' });
        });
    }
});
</script>

<?php get_footer(); ?>

