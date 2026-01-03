<?php
/**
 * Template Name: Mortgage Page
 */

get_header();

// Hero Section
get_template_part('template-parts/hero', null, [
    'title' => 'CLEAR <span class="text-theme">MORTGAGE GUIDANCE</span>',
    'subtitle' => 'Whether you are a first-time buyer or expanding your portfolio, NOLIX provides structured, unbiased guidance on mortgage options, eligibility, documentation, and bank approvals. We make sure the whole process is transparent, and aligned with your goals.',
    'image' => 'https://images.unsplash.com/photo-1554224155-8d04cb21cd6c?auto=format&fit=crop&q=80&w=2670', // Placeholder
    'buttons' => []
]);
?>

<section class="py-16 lg:py-24 font-poppins bg-[#F5F6FA]">
  <div class="container px-4">
    <div class="text-center mb-8 md:mb-16">
      <h2 class="font-playfair text-h2-custom font-bold text-dark mb-4 uppercase">
        WHAT WE<span class="text-theme"> HELP YOU WITH</span>
      </h2>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 md:gap-4">
      <div class="bg-white rounded-2xl p-5 shadow-[0_0_20px_rgba(0,0,0,0.03)] hover:shadow-[0_0_30px_rgba(193,154,92,0.1)] transition-all duration-300">
        <div class="flex items-center gap-4 mb-8">
          <div class="w-14 h-14 rounded-xl bg-[#EFE7D9] flex items-center justify-center flex-shrink-0">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/file-check.webp" alt="File Check Icon" class="w-7 h-7" />
          </div>
          <h3 class="font-poppins font-semibold text-xl text-dark">
            Pre Approval Support
          </h3>
        </div>

        <ul class="space-y-4">
          <li class="flex items-start gap-3">
            <div class="bg-theme rounded-full flex justify-center w-6 h-6">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/check-circle.webp" alt="Checkmark" class="w-4 h-4 mt-1 flex-shrink-0" />
            </div>
            <span class="text-[#767C8C] md:text-lg text-base">Fast pre-approval guidance</span>
          </li>
          <li class="flex items-start gap-3">
            <div class="bg-theme rounded-full flex justify-center w-6 h-6">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/check-circle.webp" alt="Checkmark" class="w-4 h-4 mt-1 flex-shrink-0" />
            </div>
            <span class="text-[#767C8C] md:text-lg text-base">Required documents checklist</span>
          </li>
          <li class="flex items-start gap-3">
            <div class="bg-theme rounded-full flex justify-center w-6 h-6">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/check-circle.webp" alt="Checkmark" class="w-4 h-4 mt-1 flex-shrink-0" />
            </div>
            <span class="text-[#767C8C] md:text-lg text-base">Income assessment and affordability planning</span>
          </li>
          <li class="flex items-start gap-3">
            <div class="bg-theme rounded-full flex justify-center w-6 h-6">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/check-circle.webp" alt="Checkmark" class="w-4 h-4 mt-1 flex-shrink-0" />
            </div>
            <span class="text-[#767C8C] md:text-lg text-base">Bank comparisons (rates, fees, benefits)</span>
          </li>
        </ul>
      </div>

      <div class="bg-white rounded-2xl p-5 shadow-[0_0_20px_rgba(0,0,0,0.03)] hover:shadow-[0_0_30px_rgba(193,154,92,0.1)] transition-all duration-300">
        <div class="flex items-center gap-4 mb-8">
          <div class="w-14 h-14 rounded-xl bg-[#EFE7D9] flex items-center justify-center flex-shrink-0">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/camera.webp" alt="Selection Icon" class="w-8 h-8" />
          </div>
          <h3 class="font-poppins font-semibold text-xl text-dark">
            Mortgage Selection
          </h3>
        </div>

        <ul class="space-y-4">
          <li class="flex items-start gap-3">
            <div class="bg-theme rounded-full flex justify-center w-6 h-6">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/check-circle.webp" alt="Checkmark" class="w-4 h-4 mt-1 flex-shrink-0" />
            </div>
            <span class="text-[#767C8C] md:text-lg text-base">Fixed vs. variable rates</span>
          </li>
          <li class="flex items-start gap-3">
            <div class="bg-theme rounded-full flex justify-center w-6 h-6">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/check-circle.webp" alt="Checkmark" class="w-4 h-4 mt-1 flex-shrink-0" />
            </div>
            <span class="text-[#767C8C] md:text-lg text-base">Islamic vs. conventional options</span>
          </li>
          <li class="flex items-start gap-3">
            <div class="bg-theme rounded-full flex justify-center w-6 h-6">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/check-circle.webp" alt="Checkmark" class="w-4 h-4 mt-1 flex-shrink-0" />
            </div>
            <span class="text-[#767C8C] md:text-lg text-base">Loan-to-value requirements</span>
          </li>
          <li class="flex items-start gap-3">
            <div class="bg-theme rounded-full flex justify-center w-6 h-6">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/check-circle.webp" alt="Checkmark" class="w-4 h-4 mt-1 flex-shrink-0" />
            </div>
            <span class="text-[#767C8C] md:text-lg text-base">Total cost of borrowing</span>
          </li>
        </ul>
      </div>

      <div class="bg-white rounded-2xl p-5 shadow-[0_0_20px_rgba(0,0,0,0.03)] hover:shadow-[0_0_30px_rgba(193,154,92,0.1)] transition-all duration-300">
        <div class="flex items-center gap-4 mb-8">
          <div class="w-14 h-14 rounded-xl bg-[#EFE7D9] flex items-center justify-center flex-shrink-0">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/bank.webp" alt="Bank Icon" class="w-8 h-8" />
          </div>
          <h3 class="font-poppins font-semibold text-xl text-dark">
            Bank Coordination
          </h3>
        </div>

        <ul class="space-y-4">
          <li class="flex items-start gap-3">
            <div class="bg-theme rounded-full flex justify-center w-6 h-6">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/check-circle.webp" alt="Checkmark" class="w-4 h-4 mt-1 flex-shrink-0" />
            </div>
            <span class="text-[#767C8C] md:text-lg text-base">Introduction to trusted banking partners</span>
          </li>
          <li class="flex items-start gap-3">
            <div class="bg-theme rounded-full flex justify-center w-6 h-6">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/check-circle.webp" alt="Checkmark" class="w-4 h-4 mt-1 flex-shrink-0" />
            </div>
            <span class="text-[#767C8C] md:text-lg text-base">Direct communication with mortgage advisors</span>
          </li>
          <li class="flex items-start gap-3">
            <div class="bg-theme rounded-full flex justify-center w-6 h-6">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/check-circle.webp" alt="Checkmark" class="w-4 h-4 mt-1 flex-shrink-0" />
            </div>
            <span class="text-[#767C8C] md:text-lg text-base">Tracking application progress</span>
          </li>
          <li class="flex items-start gap-3">
            <div class="bg-theme rounded-full flex justify-center w-6 h-6">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/check-circle.webp" alt="Checkmark" class="w-4 h-4 mt-1 flex-shrink-0" />
            </div>
            <span class="text-[#767C8C] md:text-lg text-base">Handling valuation reports and compliance</span>
          </li>
        </ul>
      </div>

      <div class="bg-white rounded-2xl p-5 shadow-[0_0_20px_rgba(0,0,0,0.03)] hover:shadow-[0_0_30px_rgba(193,154,92,0.1)] transition-all duration-300">
        <div class="flex items-center gap-4 mb-8">
          <div class="w-14 h-14 rounded-xl bg-[#EFE7D9] flex items-center justify-center flex-shrink-0">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/shopping-bag.webp" alt="Investor Support Icon" class="w-8 h-8" />
          </div>
          <h3 class="font-poppins font-semibold text-xl text-dark">
            Specialist Support for Investors
          </h3>
        </div>

        <ul class="space-y-4">
          <li class="flex items-start gap-3">
            <div class="bg-theme rounded-full flex justify-center w-6 h-6">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/check-circle.webp" alt="Checkmark" class="w-4 h-4 mt-1 flex-shrink-0" />
            </div>
            <span class="text-[#767C8C] md:text-lg text-base">Portfolio structuring</span>
          </li>
          <li class="flex items-start gap-3">
            <div class="bg-theme rounded-full flex justify-center w-6 h-6">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/check-circle.webp" alt="Checkmark" class="w-4 h-4 mt-1 flex-shrink-0" />
            </div>
            <span class="text-[#767C8C] md:text-lg text-base">Off-plan financing</span>
          </li>
          <li class="flex items-start gap-3">
            <div class="bg-theme rounded-full flex justify-center w-6 h-6">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/check-circle.webp" alt="Checkmark" class="w-4 h-4 mt-1 flex-shrink-0" />
            </div>
            <span class="text-[#767C8C] md:text-lg text-base">Re-mortgaging</span>
          </li>
          <li class="flex items-start gap-3">
            <div class="bg-theme rounded-full flex justify-center w-6 h-6">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/check-circle.webp" alt="Checkmark" class="w-4 h-4 mt-1 flex-shrink-0" />
            </div>
            <span class="text-[#767C8C] md:text-lg text-base">Equity release</span>
          </li>
        </ul>
      </div>
    </div>
  </div>
</section>

<section class="py-20 lg:py-20 font-poppins bg-white">
  <div class="container px-4">
    <div class="flex flex-col lg:flex-row items-center gap-12 lg:gap-20">
      <div class="w-full lg:w-1/2 text-left">
        <span class="block text-theme font-bold tracking-wide uppercase mb-6 font-playfair text-lg">
          Your Deliverables
        </span>
        <h2 class="font-playfair text-4xl lg:text-5xl font-medium leading-tight text-dark mb-8">
          What You Receive
        </h2>
        <ul class="space-y-2 text-[#767C8C] text-sm md:text-lg font-light leading-relaxed font-poppins">
          <li class="flex items-start px-2 py-2 border border-[#EBEDF0] rounded-[16px] gap-3">
            <div class="bg-theme rounded-full flex justify-center w-6 h-6">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/check-circle.webp" alt="Checkmark" class="w-4 h-4 mt-1 flex-shrink-0" />
            </div>
            <span class="text-[#767C8C] md:text-lg text-base">A personalised mortgage assessment</span>
          </li>
          <li class="flex items-start px-2 py-2 border border-[#EBEDF0] rounded-[16px] gap-3">
            <div class="bg-theme rounded-full flex justify-center w-6 h-6">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/check-circle.webp" alt="Checkmark" class="w-4 h-4 mt-1 flex-shrink-0" />
            </div>
            <span class="text-[#767C8C] md:text-lg text-base">A comparison of available bank products</span>
          </li>
          <li class="flex items-start px-2 py-2 border border-[#EBEDF0] rounded-[16px] gap-3">
            <div class="bg-theme rounded-full flex justify-center w-6 h-6">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/check-circle.webp" alt="Checkmark" class="w-4 h-4 mt-1 flex-shrink-0" />
            </div>
            <span class="text-[#767C8C] md:text-lg text-base">A timeline breakdown</span>
          </li>
          <li class="flex items-start px-2 py-2 border border-[#EBEDF0] rounded-[16px] gap-3">
            <div class="bg-theme rounded-full flex justify-center w-6 h-6">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/check-circle.webp" alt="Checkmark" class="w-4 h-4 mt-1 flex-shrink-0" />
            </div>
            <span class="text-[#767C8C] md:text-lg text-base">A step-by-step roadmap from pre-approval to handover</span>
          </li>
          <li class="flex items-start px-2 py-2 border border-[#EBEDF0] rounded-[16px] gap-3">
            <div class="bg-theme rounded-full flex justify-center w-6 h-6">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/check-circle.webp" alt="Checkmark" class="w-4 h-4 mt-1 flex-shrink-0" />
            </div>
            <span class="text-[#767C8C] md:text-lg text-base">Ongoing support for renewals, refinancing, or early settlement</span>
          </li>
        </ul>
      </div>

      <div class="w-full lg:w-1/2 relative">
        <div class="relative md:ml-0 ml-5">
          <div class="rounded-2xl sm:p-4 p-0 z-10 relative before:content-[''] before:bg-transparent before:w-[90%] before:h-[92%] before:absolute before:border-2 before:border-theme before:rounded-[16px] before:top-[48px] md:before:left-[-6px] before:left-[-18px] before:z-[-1] after:content-[''] after:bg-transparent after:w-[90%] after:h-[92%] after:absolute after:border-2 after:border-theme after:rounded-[16px] after:bottom-[48px] md:after:right-[-6px] after:right-[-18px] after:z-[-1]">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/what-you-recieve.webp" alt="Deliverables Showcase" class="h-[240px] md:h-[443px] rounded-lg shadow-2xl md:w-[553px] object-cover" />
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php 
// CTA Section
get_template_part('template-parts/cta', null, [
    'title' => 'Start Your Mortgage Journey ',
	'image' => get_template_directory_uri() . '/assets/images/flyover with glowing light.webp', 
    'text' => 'A senior advisor will contact you personally. You will get   clear and confident guidance.',
    'buttons' => [
        [
            'text' => 'Learn More',
            'url' => site_url('/consultancy'),
            'style' => 'gradient'
        ]
    ]
]);
?>


<?php get_footer(); ?>
