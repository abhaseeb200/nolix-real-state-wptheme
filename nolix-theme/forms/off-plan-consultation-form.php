<?php
/**
 * Off-Plan Consultation Form - UI and Shortcode
 * Shortcode: [off_plan_consultation_form]
 * 
 * Form for "Start Your Off-Plan Investment Journey" section
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

/**
 * Render the Off-Plan Consultation Form
 */
function nolix_off_plan_consultation_form_shortcode() {
    ob_start();
    ?>
    <div id="off-plan-consultation-form-container" class="bg-white p-6 md:p-10 rounded-2xl shadow-xl border border-gray-100 max-w-5xl mx-auto relative overflow-hidden">
        <div class="absolute top-0 left-0 w-full h-2 bg-gradient-to-r from-theme to-[#a37e45]"></div>
        
        <div class="text-center mb-10">
            <span class="text-theme font-bold tracking-wider uppercase text-sm font-playfair mb-2 block">Off-Plan Investment</span>
            <h3 class="font-playfair text-3xl md:text-4xl text-dark font-bold mb-4">Start Your Off Plan Investment Journey</h3>
            <p class="text-gray-500 max-w-2xl mx-auto font-poppins font-light">
                Tell us about your investment goals and we'll help you find the perfect off-plan opportunity.
            </p>
        </div>
        
        <form id="off-plan-consultation-form" class="space-y-6">
            <!-- Grid Layout -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-6">
                
                <!-- Common Fields Section -->
                <div class="col-span-1 md:col-span-2">
                    <h4 class="font-playfair text-xl text-dark border-b border-gray-100 pb-2 mb-4">Your Details</h4>
                </div>

                <!-- Full Name -->
                <div>
                    <label class="block text-gray-700 text-sm font-medium mb-2 font-poppins">Full Name <span class="text-red-500">*</span></label>
                    <input type="text" name="name" required class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-200 focus:bg-white focus:border-theme focus:ring-1 focus:ring-theme outline-none transition-all font-poppins" placeholder="John Doe">
                </div>
                
                <!-- Email Address -->
                <div>
                    <label class="block text-gray-700 text-sm font-medium mb-2 font-poppins">Email Address <span class="text-red-500">*</span></label>
                    <input type="email" name="email" required class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-200 focus:bg-white focus:border-theme focus:ring-1 focus:ring-theme outline-none transition-all font-poppins" placeholder="name@example.com">
                </div>
                
                <!-- Phone Number -->
                <div>
                    <label class="block text-gray-700 text-sm font-medium mb-2 font-poppins">Mobile / WhatsApp Number <span class="text-red-500">*</span></label>
                    <input type="tel" name="phone" required class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-200 focus:bg-white focus:border-theme focus:ring-1 focus:ring-theme outline-none transition-all font-poppins" placeholder="+971 50 000 0000">
                </div>

                <!-- Budget Range -->
                <div>
                    <label class="block text-gray-700 text-sm font-medium mb-2 font-poppins">Select Budget Range <span class="text-red-500">*</span></label>
                    <select name="budget_range" required class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-200 focus:bg-white focus:border-theme focus:ring-1 focus:ring-theme outline-none transition-all appearance-none font-poppins">
                        <option value="">Select Budget Range</option>
                        <option value="Under AED 1M">Under AED 1M</option>
                        <option value="AED 1M - 2M">AED 1M - 2M</option>
                        <option value="AED 2M - 5M">AED 2M - 5M</option>
                        <option value="AED 5M - 10M">AED 5M - 10M</option>
                        <option value="Above AED 10M">Above AED 10M</option>
                    </select>
                </div>

                <!-- Investment Goals -->
                <div class="col-span-1 md:col-span-2">
                    <label class="block text-gray-700 text-sm font-medium mb-2 font-poppins">Investment Goals & Interested Projects</label>
                    <textarea name="investment_goals" rows="4" class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-200 focus:bg-white focus:border-theme focus:ring-1 focus:ring-theme outline-none transition-all resize-y font-poppins" placeholder="Tell us about your investment goals, preferred locations, property types, and any specific projects you're interested in..."></textarea>
                </div>
            </div>
            
            <div class="pt-6 border-t border-gray-100 flex flex-col items-center">
                <button type="submit" class="w-full md:w-1/2 px-8 py-4 bg-theme text-white font-bold rounded-lg shadow-lg hover:bg-dark hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-300">
                    Request Consultation
                </button>
                <div id="off-plan-consultation-message" class="hidden mt-4 font-medium p-4 rounded-lg w-full text-center"></div>
            </div>
        </form>
    </div>
    
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        var form = document.getElementById('off-plan-consultation-form');
        if (!form) return;
        
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            
            var btn = form.querySelector('button[type="submit"]');
            var msg = document.getElementById('off-plan-consultation-message');
            
            // UI Loading State
            if(btn) {
                btn.disabled = true;
                btn.innerHTML = '<span class="inline-block animate-spin mr-2 border-2 border-white border-t-transparent rounded-full w-4 h-4"></span> Sending...';
            }
            
            if(msg) {
                msg.className = 'hidden mt-4 font-medium p-4 rounded-lg w-full text-center'; 
            }
            
            var formData = new FormData(form);
            formData.append('action', 'off_plan_consultation_submit');
            formData.append('security', '<?php echo wp_create_nonce("off_plan_consultation_submit_nonce"); ?>');
            
            fetch('<?php echo admin_url('admin-ajax.php'); ?>', {
                method: 'POST',
                body: formData
            })
            .then(function(response) {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(function(data) {
                if(msg) {
                    msg.classList.remove('hidden');
                    if(data.success) {
                        msg.innerText = 'Thank you! Your consultation request has been submitted successfully. We will contact you shortly.';
                        msg.classList.add('bg-green-100', 'text-green-700');
                        form.reset();
                    } else {
                        msg.innerText = 'Error: ' + (data.data || 'Something went wrong. Please try again.');
                        msg.classList.add('bg-red-100', 'text-red-700');
                    }
                }
            })
            .catch(function(error) {
                 if(msg) {
                    msg.classList.remove('hidden');
                    msg.innerText = 'System error. Please check your connection and try again.';
                    msg.classList.add('bg-red-100', 'text-red-700');
                 }
                 console.error('Fetch Error:', error);
            })
            .finally(function() {
                if(btn) {
                    btn.disabled = false;
                    btn.innerText = 'Request Consultation';
                }
            });
        });
    });
    </script>
    <?php
    return ob_get_clean();
}
add_shortcode('off_plan_consultation_form', 'nolix_off_plan_consultation_form_shortcode');