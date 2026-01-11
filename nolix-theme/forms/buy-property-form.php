<?php
/**
 * Buy Property Form - UI and Shortcode
 * Shortcode: [buy_property_form]
 * 
 * Form for "Buy Property" page
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

/**
 * Render the Buy Property Form
 */
function nolix_buy_property_form_shortcode() {
    ob_start();
    ?>
    <div id="buy-property-form-container" class="bg-white p-6 md:p-10 rounded-2xl shadow-xl border border-gray-100 max-w-5xl mx-auto relative overflow-hidden">
        <div class="absolute top-0 left-0 w-full h-2 bg-gradient-to-r from-theme to-[#a37e45]"></div>
        
        <div class="text-center mb-10">
            <span class="text-theme font-bold tracking-wider uppercase text-sm font-playfair mb-2 block">Property Inquiry</span>
            <h3 class="font-playfair text-3xl md:text-4xl text-dark font-bold mb-4">Find Your Dream Property</h3>
            <p class="text-gray-500 max-w-2xl mx-auto font-poppins font-light">
                Tell us about your property requirements and we'll help you find the perfect match.
            </p>
        </div>
        
        <form id="buy-property-form" class="space-y-6">
            <!-- Property Type Selector -->
            <div class="col-span-1 md:col-span-2">
                <h4 class="font-playfair text-xl text-dark border-b border-gray-100 pb-2 mb-4">Property Type</h4>
            </div>
            
            <div>
                <label class="block text-gray-700 text-sm font-medium mb-2 font-poppins">What type of property are you looking to buy? <span class="text-red-500">*</span></label>
                <select name="projectType" id="projectType" required class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-200 focus:bg-white focus:border-theme focus:ring-1 focus:ring-theme outline-none transition-all appearance-none">
                    <option value="">Select property type</option>
                    <option value="off_plan">Off-plan (under construction / new launch)</option>
                    <option value="secondary">Secondary / Ready (completed property)</option>
                </select>
            </div>

            <!-- Grid Layout -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-6">
                
                <!-- Common Fields Section -->
                <div class="col-span-1 md:col-span-2">
                    <h4 class="font-playfair text-xl text-dark border-b border-gray-100 pb-2 mb-4 mt-6">Your Details</h4>
                </div>

                <!-- Full Name -->
                <div>
                    <label class="block text-gray-700 text-sm font-medium mb-2 font-poppins">Full Name <span class="text-red-500">*</span></label>
                    <input type="text" name="name" required class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-200 focus:bg-white focus:border-theme focus:ring-1 focus:ring-theme outline-none transition-all" placeholder="John Doe">
                </div>

                <!-- Mobile / WhatsApp -->
                <div>
                    <label class="block text-gray-700 text-sm font-medium mb-2 font-poppins">Mobile / WhatsApp Number <span class="text-red-500">*</span></label>
                    <input type="tel" name="phone" required class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-200 focus:bg-white focus:border-theme focus:ring-1 focus:ring-theme outline-none transition-all" placeholder="+971 50 000 0000">
                </div>

                <!-- Email -->
                <div>
                    <label class="block text-gray-700 text-sm font-medium mb-2 font-poppins">Email Address <span class="text-red-500">*</span></label>
                    <input type="email" name="email" required class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-200 focus:bg-white focus:border-theme focus:ring-1 focus:ring-theme outline-none transition-all" placeholder="name@example.com">
                </div>

                <!-- Budget Range -->
                <div>
                    <label class="block text-gray-700 text-sm font-medium mb-2 font-poppins">Budget Range (AED) <span class="text-red-500">*</span></label>
                    <input type="text" name="budget" required class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-200 focus:bg-white focus:border-theme focus:ring-1 focus:ring-theme outline-none transition-all" placeholder="e.g., 2000000">
                </div>

                <!-- Preferred Location -->
                <div>
                    <label class="block text-gray-700 text-sm font-medium mb-2 font-poppins">Preferred Location(s) <span class="text-red-500">*</span></label>
                    <input type="text" name="preferred_location" required class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-200 focus:bg-white focus:border-theme focus:ring-1 focus:ring-theme outline-none transition-all" placeholder="e.g., Dubai Marina, Downtown Dubai">
                </div>

                <!-- Bedrooms -->
                <div>
                    <label class="block text-gray-700 text-sm font-medium mb-2 font-poppins">Bedrooms <span class="text-red-500">*</span></label>
                    <select name="bedrooms" required class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-200 focus:bg-white focus:border-theme focus:ring-1 focus:ring-theme outline-none transition-all appearance-none">
                        <option value="">Select bedrooms</option>
                        <option value="studio">Studio</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5+">5+</option>
                    </select>
                </div>

                <!-- Purpose of Purchase -->
                <div>
                    <label class="block text-gray-700 text-sm font-medium mb-2 font-poppins">Purpose of Purchase <span class="text-red-500">*</span></label>
                    <select name="purchase_purpose" id="purchase_purpose" required class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-200 focus:bg-white focus:border-theme focus:ring-1 focus:ring-theme outline-none transition-all appearance-none">
                        <option value="">Select purpose</option>
                        <option value="End-use">End-use</option>
                        <option value="Investment">Investment</option>
                        <option value="Both">Both</option>
                    </select>
                </div>

                <!-- Buying Timeline -->
                <div>
                    <label class="block text-gray-700 text-sm font-medium mb-2 font-poppins">When are you planning to buy? <span class="text-red-500">*</span></label>
                    <select name="buying_timeline" required class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-200 focus:bg-white focus:border-theme focus:ring-1 focus:ring-theme outline-none transition-all appearance-none">
                        <option value="">Select timeline</option>
                        <option value="Now">Now</option>
                        <option value="1-3 months">1–3 months</option>
                        <option value="3-6 months">3–6 months</option>
                        <option value="Just exploring">Just exploring</option>
                    </select>
                </div>

            </div>

            <!-- Off-plan Conditional Fields -->
            <div id="off-plan-fields" class="hidden grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-6">
                <div class="col-span-1 md:col-span-2">
                    <h4 class="font-playfair text-xl text-dark border-b border-gray-100 pb-2 mb-4 mt-6">Off-plan Details</h4>
                </div>

                <!-- Payment Plan Interest -->
                <div>
                    <label class="block text-gray-700 text-sm font-medium mb-2 font-poppins">Are you open to payment plans over construction? <span class="text-red-500">*</span></label>
                    <select name="payment_plan_interest" class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-200 focus:bg-white focus:border-theme focus:ring-1 focus:ring-theme outline-none transition-all appearance-none">
                        <option value="">Select option</option>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                        <option value="Not sure">Not sure</option>
                    </select>
                </div>

                <!-- Completion Timeline -->
                <div>
                    <label class="block text-gray-700 text-sm font-medium mb-2 font-poppins">Preferred completion timeline <span class="text-red-500">*</span></label>
                    <select name="completion_timeline" class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-200 focus:bg-white focus:border-theme focus:ring-1 focus:ring-theme outline-none transition-all appearance-none">
                        <option value="">Select timeline</option>
                        <option value="Within 1 year">Within 1 year</option>
                        <option value="1-2 years">1–2 years</option>
                        <option value="3+ years">3+ years</option>
                    </select>
                </div>

                <!-- Priority for Off-plan -->
                <div>
                    <label class="block text-gray-700 text-sm font-medium mb-2 font-poppins">Priority for off-plan <span class="text-red-500">*</span></label>
                    <select name="priority_off_plan" class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-200 focus:bg-white focus:border-theme focus:ring-1 focus:ring-theme outline-none transition-all appearance-none">
                        <option value="">Select priority</option>
                        <option value="Capital appreciation">Capital appreciation</option>
                        <option value="Flexible payment plan">Flexible payment plan</option>
                        <option value="New community & amenities">New community & amenities</option>
                    </select>
                </div>

                <!-- Golden Visa -->
                <div>
                    <label class="block text-gray-700 text-sm font-medium mb-2 font-poppins">Do you need Golden Visa guidance with your purchase? <span class="text-red-500">*</span></label>
                    <select name="golden_visa_needed" class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-200 focus:bg-white focus:border-theme focus:ring-1 focus:ring-theme outline-none transition-all appearance-none">
                        <option value="">Select option</option>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                    </select>
                </div>
            </div>

            <!-- Secondary/Ready Conditional Fields -->
            <div id="secondary-fields" class="hidden grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-6">
                <div class="col-span-1 md:col-span-2">
                    <h4 class="font-playfair text-xl text-dark border-b border-gray-100 pb-2 mb-4 mt-6">Secondary / Ready Property Details</h4>
                </div>

                <!-- Mortgage -->
                <div>
                    <label class="block text-gray-700 text-sm font-medium mb-2 font-poppins">Do you need a mortgage? <span class="text-red-500">*</span></label>
                    <select name="mortgage_needed" class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-200 focus:bg-white focus:border-theme focus:ring-1 focus:ring-theme outline-none transition-all appearance-none">
                        <option value="">Select option</option>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                        <option value="Already pre-approved">Already pre-approved</option>
                    </select>
                </div>

                <!-- Looking For -->
                <div>
                    <label class="block text-gray-700 text-sm font-medium mb-2 font-poppins">Are you looking for: <span class="text-red-500">*</span></label>
                    <select name="looking_for" class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-200 focus:bg-white focus:border-theme focus:ring-1 focus:ring-theme outline-none transition-all appearance-none">
                        <option value="">Select option</option>
                        <option value="Move-in ready">Move-in ready</option>
                        <option value="Tenanted with rental income">Tenanted with rental income</option>
                        <option value="Either">Either</option>
                    </select>
                </div>

                <!-- Move-in Timeline -->
                <div>
                    <label class="block text-gray-700 text-sm font-medium mb-2 font-poppins">How soon do you need to move in or start renting it out? <span class="text-red-500">*</span></label>
                    <select name="move_in_timeline" class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-200 focus:bg-white focus:border-theme focus:ring-1 focus:ring-theme outline-none transition-all appearance-none">
                        <option value="">Select timeline</option>
                        <option value="Immediately">Immediately</option>
                        <option value="1-3 months">1–3 months</option>
                        <option value="Flexible">Flexible</option>
                    </select>
                </div>

                <!-- Must-have Features -->
                <div class="col-span-1 md:col-span-2">
                    <label class="block text-gray-700 text-sm font-medium mb-2 font-poppins">Any must-have features?</label>
                    <textarea name="must_have_features" rows="3" class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-200 focus:bg-white focus:border-theme focus:ring-1 focus:ring-theme outline-none transition-all" placeholder="e.g., View, balcony, parking, maid's room, specific tower, etc."></textarea>
                </div>
            </div>
            
            <div class="pt-6 border-t border-gray-100 flex flex-col items-center">
                <button type="submit" class="w-full md:w-1/2 px-8 py-4 bg-theme text-white font-bold rounded-lg shadow-lg hover:bg-dark hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-300">
                    Submit Inquiry
                </button>
                <div id="buy-property-message" class="hidden mt-4 font-medium p-4 rounded-lg w-full text-center"></div>
            </div>
        </form>
    </div>
    
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        var form = document.getElementById('buy-property-form');
        var projectTypeSelect = document.getElementById('projectType');
        var offPlanFields = document.getElementById('off-plan-fields');
        var secondaryFields = document.getElementById('secondary-fields');
        
        if (!form || !projectTypeSelect) return;

        // Show/hide conditional fields based on property type
        projectTypeSelect.addEventListener('change', function() {
            var selectedValue = this.value;
            
            if (selectedValue === 'off_plan') {
                offPlanFields.classList.remove('hidden');
                secondaryFields.classList.add('hidden');
                // Make off-plan fields required
                offPlanFields.querySelectorAll('select').forEach(function(select) {
                    select.setAttribute('required', 'required');
                });
                // Remove required from secondary fields
                secondaryFields.querySelectorAll('select').forEach(function(select) {
                    select.removeAttribute('required');
                });
            } else if (selectedValue === 'secondary') {
                secondaryFields.classList.remove('hidden');
                offPlanFields.classList.add('hidden');
                // Make secondary fields required
                secondaryFields.querySelectorAll('select').forEach(function(select) {
                    select.setAttribute('required', 'required');
                });
                // Remove required from off-plan fields
                offPlanFields.querySelectorAll('select').forEach(function(select) {
                    select.removeAttribute('required');
                });
            } else {
                offPlanFields.classList.add('hidden');
                secondaryFields.classList.add('hidden');
                // Remove required from both
                offPlanFields.querySelectorAll('select').forEach(function(select) {
                    select.removeAttribute('required');
                });
                secondaryFields.querySelectorAll('select').forEach(function(select) {
                    select.removeAttribute('required');
                });
            }
        });

        form.addEventListener('submit', function(e) {
            e.preventDefault();

            var btn = form.querySelector('button[type="submit"]');
            var msg = document.getElementById('buy-property-message');
            
            // UI Loading State
            if(btn) {
                btn.disabled = true;
                btn.innerHTML = '<span class="inline-block animate-spin mr-2 border-2 border-white border-t-transparent rounded-full w-4 h-4"></span> Sending...';
            }
            
            if(msg) {
                msg.className = 'hidden mt-4 font-medium p-4 rounded-lg w-full text-center'; 
            }

            var formData = new FormData(form);
            formData.append('action', 'buy_property_submit');
            formData.append('security', '<?php echo wp_create_nonce("buy_property_submit_nonce"); ?>');

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
                        msg.innerText = 'Thank you! Your inquiry has been submitted successfully. We will contact you shortly.';
                        msg.classList.add('bg-green-100', 'text-green-700');
                        form.reset();
                        // Hide conditional fields and remove required attributes
                        offPlanFields.classList.add('hidden');
                        secondaryFields.classList.add('hidden');
                        offPlanFields.querySelectorAll('select').forEach(function(select) {
                            select.removeAttribute('required');
                        });
                        secondaryFields.querySelectorAll('select').forEach(function(select) {
                            select.removeAttribute('required');
                        });
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
                    btn.innerText = 'Submit Inquiry';
                }
            });
        });
    });
    </script>
    <?php
    return ob_get_clean();
}
add_shortcode('buy_property_form', 'nolix_buy_property_form_shortcode');

