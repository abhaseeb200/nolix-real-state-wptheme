<?php
/**
 * Template Name: Consultancy Page
 */

get_header();

// Hero Section
get_template_part('template-parts/hero', null, [
    'title' => 'Strategic advisory for buyers, <br/> <span class="text-theme">sellers, and investors</span>',
    'subtitle' => 'NOLIX provides clarity at every stage: from acquisition and portfolio planning to  timing, pricing, and exit strategy.',
	'image' => get_template_directory_uri() . '/assets/images/two person sitting on table.webp',
    'buttons' => []
]);
?>
<!-- What We Cover -->
<section class="py-24 bg-[#FAFAFA] border-t border-gray-100">
  <div class="container mx-auto px-6 text-center">
    <h2 class="text-h2-custom font-playfair font-bold text-gray-900 mb-9 uppercase">
      What <span class="text-theme">We Cover</span>
    </h2>

    <div class="flex justify-center mb-16">
      <div class="inline-flex bg-white border border-gray-200 rounded-full p-1 shadow-sm">
        <button onclick="switchConsultancyTab('buyers')" id="tab-consult-buyers" class="tab-consult-btn px-4 md:px-8 py-2 rounded-full text-base md:text-lg font-bold transition-all bg-theme text-white">
          Buyers
        </button>
        <button onclick="switchConsultancyTab('sellers')" id="tab-consult-sellers" class="tab-consult-btn px-4 md:px-8 py-2 rounded-full text-base md:text-lg font-bold transition-all text-gray-600 hover:text-theme">
          Sellers
        </button>
        <button onclick="switchConsultancyTab('investors')" id="tab-consult-investors" class="tab-consult-btn px-4 md:px-8 py-2 rounded-full text-base md:text-lg font-bold transition-all text-gray-600 hover:text-theme">
          Investors
        </button>
      </div>
    </div>

    <!-- Buyers Content -->
    <div class="flex flex-col lg:flex-row items-center gap-16 lg:gap-32 tab-content-consult" id="content-consult-buyers">
      <div class="w-full lg:w-1/2 text-left">
        <div class="flex items-center gap-4 mb-8">
          <div class="w-14 h-14 rounded-xl bg-[#EFE7D9] flex items-center justify-center flex-shrink-0">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/users.png" alt="Users Icon" class="w-7 h-7" />
          </div>
          <h2 class="font-playfair text-[24px] md:text-[28px] font-medium text-dark">
            Mortgage Buyer Advisory & Selection
          </h2>
        </div>
        <ul class="space-y-2 text-[#767C8C] text-sm md:text-lg font-light leading-relaxed font-poppins">
          <li class="flex items-start px-2 py-2 border border-[#EBEDF0] rounded-[16px] gap-3">
            <div class="bg-theme rounded-full flex justify-center w-6 h-6">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/check-circle.webp" alt="Check Icon" class="w-4 h-4 mt-1 flex-shrink-0" />
            </div>
            <span class="text-[#767C8C] md:text-lg text-sm">Area and community guidance</span>
          </li>
          <li class="flex items-start px-2 py-2 border border-[#EBEDF0] rounded-[16px] gap-3">
            <div class="bg-theme rounded-full flex justify-center w-6 h-6">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/check-circle.webp" alt="Check Icon" class="w-4 h-4 mt-1 flex-shrink-0" />
            </div>
            <span class="text-[#767C8C] md:text-lg text-sm">Shortlisting aligned to lifestyle or investment goals</span>
          </li>
          <li class="flex items-start px-2 py-2 border border-[#EBEDF0] rounded-[16px] gap-3">
            <div class="bg-theme rounded-full flex justify-center w-6 h-6">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/check-circle.webp" alt="Check Icon" class="w-4 h-4 mt-1 flex-shrink-0" />
            </div>
            <span class="text-[#767C8C] md:text-lg text-sm">Yield and long-term growth analysis</span>
          </li>
          <li class="flex items-start px-2 py-2 border border-[#EBEDF0] rounded-[16px] gap-3">
            <div class="bg-theme rounded-full flex justify-center w-6 h-6">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/check-circle.webp" alt="Check Icon" class="w-4 h-4 mt-1 flex-shrink-0" />
            </div>
            <span class="text-[#767C8C] md:text-lg text-sm">Off-plan vs. ready comparison</span>
          </li>
          <li class="flex items-start px-2 py-2 border border-[#EBEDF0] rounded-[16px] gap-3">
            <div class="bg-theme rounded-full flex justify-center w-6 h-6">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/check-circle.webp" alt="Check Icon" class="w-4 h-4 mt-1 flex-shrink-0" />
            </div>
            <span class="text-[#767C8C] md:text-lg text-sm">Negotiation support</span>
          </li>
        </ul>
      </div>

      <div class="w-full lg:w-1/2 relative">
        <div class="relative md:ml-0 ml-5">
          <div class="rounded-2xl sm:p-4 p-0 z-10 relative before:content-[''] before:bg-transparent before:w-[90%] before:h-[92%] before:absolute before:border-2 before:border-theme before:rounded-[16px] before:top-[48px] md:before:left-[-6px] before:left-[-18px] before:z-[-1] after:content-[''] after:bg-transparent after:w-[90%] after:h-[92%] after:absolute after:border-2 after:border-theme after:rounded-[16px] after:bottom-[48px] md:after:right-[-6px] after:right-[-18px] after:z-[-1]">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/mortgage-buyer.webp" alt="Mortgage Buyer Advisory" class="h-[240px] md:h-[400px] rounded-lg w-full shadow-2xl md:w-[500px] object-cover" />
          </div>
        </div>
      </div>
    </div>

    <!-- Sellers Content -->
    <div class="flex flex-col lg:flex-row items-center gap-16 lg:gap-32 tab-content-consult hidden" id="content-consult-sellers" style="display: none;">
      <div class="w-full lg:w-1/2 text-left">
        <div class="flex items-center gap-4 mb-8">
           <div class="w-14 h-14 rounded-xl bg-[#EFE7D9] flex items-center justify-center flex-shrink-0">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/shield-tick.webp" alt="Sellers Icon" class="w-7 h-7" />
          </div>
          <h2 class="font-playfair text-[24px] md:text-[28px] font-medium text-dark">
            Strategic Sales & Marketing
          </h2>
        </div>
        <ul class="space-y-2 text-[#767C8C] text-sm md:text-lg font-light leading-relaxed font-poppins">
            <li class="flex items-start px-2 py-2 border border-[#EBEDF0] rounded-[16px] gap-3">
            <div class="bg-theme rounded-full flex justify-center w-6 h-6">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/check-circle.webp" alt="Check Icon" class="w-4 h-4 mt-1 flex-shrink-0" />
            </div>
            <span class="text-[#767C8C] md:text-lg text-sm">Accurate market valuation</span>
          </li>
          <li class="flex items-start px-2 py-2 border border-[#EBEDF0] rounded-[16px] gap-3">
            <div class="bg-theme rounded-full flex justify-center w-6 h-6">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/check-circle.webp" alt="Check Icon" class="w-4 h-4 mt-1 flex-shrink-0" />
            </div>
            <span class="text-[#767C8C] md:text-lg text-sm">Professional staging and photography</span>
          </li>
           <li class="flex items-start px-2 py-2 border border-[#EBEDF0] rounded-[16px] gap-3">
            <div class="bg-theme rounded-full flex justify-center w-6 h-6">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/check-circle.webp" alt="Check Icon" class="w-4 h-4 mt-1 flex-shrink-0" />
            </div>
            <span class="text-[#767C8C] md:text-lg text-sm">Targeted marketing campaigns</span>
          </li>
           <li class="flex items-start px-2 py-2 border border-[#EBEDF0] rounded-[16px] gap-3">
            <div class="bg-theme rounded-full flex justify-center w-6 h-6">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/check-circle.webp" alt="Check Icon" class="w-4 h-4 mt-1 flex-shrink-0" />
            </div>
            <span class="text-[#767C8C] md:text-lg text-sm">Viewing management and feedback</span>
          </li>
        </ul>
      </div>
      <div class="w-full lg:w-1/2 relative">
         <div class="relative md:ml-0 ml-5">
           <div class="rounded-2xl sm:p-4 p-0 z-10 relative before:content-[''] before:bg-transparent before:w-[90%] before:h-[92%] before:absolute before:border-2 before:border-theme before:rounded-[16px] before:top-[48px] md:before:left-[-6px] before:left-[-18px] before:z-[-1] after:content-[''] after:bg-transparent after:w-[90%] after:h-[92%] after:absolute after:border-2 after:border-theme after:rounded-[16px] after:bottom-[48px] md:after:right-[-6px] after:right-[-18px] after:z-[-1]">
             <!-- Placeholder image for Sellers -->
            <img src="https://images.unsplash.com/photo-1560518883-ce09059eeffa?auto=format&fit=crop&q=80&w=1000" alt="Strategic Sales" class="h-[240px] md:h-[400px] rounded-lg w-full shadow-2xl md:w-[500px] object-cover" />
          </div>
        </div>
      </div>
    </div>

    <!-- Investors Content -->
    <div class="flex flex-col lg:flex-row items-center gap-16 lg:gap-32 tab-content-consult hidden" id="content-consult-investors" style="display: none;">
      <div class="w-full lg:w-1/2 text-left">
        <div class="flex items-center gap-4 mb-8">
           <div class="w-14 h-14 rounded-xl bg-[#EFE7D9] flex items-center justify-center flex-shrink-0">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/users.png" alt="Users Icon" class="w-7 h-7" />
          </div>
          <h2 class="font-playfair text-[24px] md:text-[28px] font-medium text-dark">
            Portfolio Growth & ROI
          </h2>
        </div>
        <ul class="space-y-2 text-[#767C8C] text-sm md:text-lg font-light leading-relaxed font-poppins">
            <li class="flex items-start px-2 py-2 border border-[#EBEDF0] rounded-[16px] gap-3">
            <div class="bg-theme rounded-full flex justify-center w-6 h-6">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/check-circle.webp" alt="Check Icon" class="w-4 h-4 mt-1 flex-shrink-0" />
            </div>
            <span class="text-[#767C8C] md:text-lg text-sm">Market trend analysis</span>
          </li>
          <li class="flex items-start px-2 py-2 border border-[#EBEDF0] rounded-[16px] gap-3">
            <div class="bg-theme rounded-full flex justify-center w-6 h-6">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/check-circle.webp" alt="Check Icon" class="w-4 h-4 mt-1 flex-shrink-0" />
            </div>
            <span class="text-[#767C8C] md:text-lg text-sm">High-yield opportunity identification</span>
          </li>
           <li class="flex items-start px-2 py-2 border border-[#EBEDF0] rounded-[16px] gap-3">
            <div class="bg-theme rounded-full flex justify-center w-6 h-6">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/check-circle.webp" alt="Check Icon" class="w-4 h-4 mt-1 flex-shrink-0" />
            </div>
            <span class="text-[#767C8C] md:text-lg text-sm">Risk assessment and mitigation</span>
          </li>
           <li class="flex items-start px-2 py-2 border border-[#EBEDF0] rounded-[16px] gap-3">
            <div class="bg-theme rounded-full flex justify-center w-6 h-6">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/check-circle.webp" alt="Check Icon" class="w-4 h-4 mt-1 flex-shrink-0" />
            </div>
            <span class="text-[#767C8C] md:text-lg text-sm">Exit strategy planning</span>
          </li>
        </ul>
      </div>
      <div class="w-full lg:w-1/2 relative">
         <div class="relative md:ml-0 ml-5">
           <div class="rounded-2xl sm:p-4 p-0 z-10 relative before:content-[''] before:bg-transparent before:w-[90%] before:h-[92%] before:absolute before:border-2 before:border-theme before:rounded-[16px] before:top-[48px] md:before:left-[-6px] before:left-[-18px] before:z-[-1] after:content-[''] after:bg-transparent after:w-[90%] after:h-[92%] after:absolute after:border-2 after:border-theme after:rounded-[16px] after:bottom-[48px] md:after:right-[-6px] after:right-[-18px] after:z-[-1]">
            <!-- Placeholder image for Investors -->
             <img src="https://images.unsplash.com/photo-1460925895917-afdab827c52f?auto=format&fit=crop&q=80&w=1000" alt="Portfolio Growth" class="h-[240px] md:h-[400px] rounded-lg w-full shadow-2xl md:w-[500px] object-cover" />
          </div>
        </div>
      </div>
    </div>
    
    <!-- Script for Consultancy Tabs -->
    <script>
    function switchConsultancyTab(tab) {
        // Reset all buttons
        document.querySelectorAll('.tab-consult-btn').forEach(btn => {
            btn.classList.remove('bg-theme', 'text-white');
            btn.classList.add('text-gray-600', 'hover:text-theme');
        });
        
        // Activate clicked button
        const activeBtn = document.getElementById(`tab-consult-${tab}`);
        if(activeBtn) {
            activeBtn.classList.remove('text-gray-600', 'hover:text-theme');
            activeBtn.classList.add('bg-theme', 'text-white');
        }

        // Hide all content
        document.querySelectorAll('.tab-content-consult').forEach(content => {
            content.style.display = 'none';
        });

        // Show selected content
        const activeContent = document.getElementById(`content-consult-${tab}`);
        if(activeContent) {
            activeContent.style.display = 'flex';
        }
    }
    </script>
    </div>
</section>
<!-- Our Difference Section -->
<section class="py-20 lg:py-24 bg-white">
  <div class="container px-4">
    <div class="flex flex-col lg:flex-row-reverse items-center gap-12 lg:gap-20">
      <div class="w-full lg:w-1/2 text-left">
        <span class="block text-theme font-bold tracking-wide uppercase mb-6 font-playfair text-lg">
          Our Difference
        </span>
        <h2 class="font-playfair text-4xl lg:text-5xl font-medium text-dark mb-3">
          Why NOLIX <br />
          Consultancy Works
        </h2>
        <div class="space-y-6 text-[#767C8C] text-sm md:text-lg font-light leading-relaxed font-poppins">
          <div class="border-b border-[#C8CCD9] py-4">
            <div class="flex gap-3 items-center mb-3">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/shield-tick.webp" class="w-6 h-6" alt="Shield Tick Icon" />
              <h1 class="md:text-lg text-black font-bold">
                We operate as a filter, not a funnel.
              </h1>
            </div>
            <p class="px-9">
              Our role is to simplify decisions, reduce noise, and provide
              grounded, data-led guidance based on your objectives.
            </p>
          </div>
          <p>
            Unlike traditional agencies that push volume, we prioritize
            depth over breadth. Each client receives personalized attention
            and strategic advice tailored to their unique situation.
          </p>
        </div>
      </div>

      <div class="w-full lg:w-1/2 relative">
        <div class="relative md:ml-0 ml-5">
          <div class="rounded-2xl sm:p-4 p-0 z-10 relative before:content-[''] before:bg-transparent before:w-[90%] before:h-[92%] before:absolute before:border-2 before:border-theme before:rounded-[16px] before:top-[48px] md:before:left-[-6px] before:left-[-18px] before:z-[-1] after:content-[''] after:bg-transparent after:w-[90%] after:h-[92%] after:absolute after:border-2 after:border-theme after:rounded-[16px] after:bottom-[48px] md:after:right-[-6px] after:right-[-18px] after:z-[-1]">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/nolix-consultancy.webp" alt="NOLIX Consultancy Team" class="h-[240px] md:h-[400px] rounded-lg w-full shadow-2xl md:w-[500px] object-cover" />
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php 
// CTA Section
get_template_part('template-parts/cta', null, [
    'title' => 'Book a consultation ',
	'image' => get_template_directory_uri() . '/assets/images/flyover with glowing light.webp', 
    'text' => 'Speak directly with a senior advisor who understands your property goals and guides you with clear, practical advice.',
    'buttons' => [
        [
            'text' => 'Book Consultation',
            'url' => '#',
            'style' => 'gradient'
        ],
		[
            'text' => 'Learn More',
            'url' => '#',
            'style' => 'white'
        ]
    ]
]);
?>


<?php get_footer(); ?>
