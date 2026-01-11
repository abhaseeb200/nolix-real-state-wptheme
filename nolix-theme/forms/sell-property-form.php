<?php
/**
 * Sell Property Form - UI and Shortcode
 * Shortcode: [sell_property_form]
 * 
 * Form for "Sell your Property in the UAE" page
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

/**
 * Render the Sell Property Form
 */
function nolix_sell_property_form_shortcode() {
    ob_start();
    ?>
    <div id="sell-property-form-container" class="bg-white p-6 md:p-10 rounded-2xl shadow-xl border border-gray-100 max-w-5xl mx-auto relative overflow-hidden">
        <div class="absolute top-0 left-0 w-full h-2 bg-gradient-to-r from-theme to-[#a37e45]"></div>
        
        <div class="text-center mb-10">
            <span class="text-theme font-bold tracking-wider uppercase text-sm font-playfair mb-2 block">Property Listing</span>
            <h3 class="font-playfair text-3xl md:text-4xl text-dark font-bold mb-4">Sell your Property in the UAE</h3>
            <p class="text-gray-500 max-w-2xl mx-auto font-poppins font-light">
                Tell us about your property and we'll help you get the best value for your investment.
            </p>
        </div>
        
        <form id="sell-property-form" class="space-y-6">
            
            <!-- Owner & Contact Details Section -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-6">
                
                <div class="col-span-1 md:col-span-2">
                    <h4 class="font-playfair text-xl text-dark border-b border-gray-100 pb-2 mb-4">Owner & Contact Details</h4>
                </div>

                <!-- Full Name -->
                <div>
                    <label class="block text-gray-700 text-sm font-medium mb-2 font-poppins">Full Name <span class="text-red-500">*</span></label>
                    <input type="text" name="name" required class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-200 focus:bg-white focus:border-theme focus:ring-1 focus:ring-theme outline-none transition-all" placeholder="John Doe">
                </div>

                <!-- Mobile / WhatsApp Number -->
                <div>
                    <label class="block text-gray-700 text-sm font-medium mb-2 font-poppins">Mobile / WhatsApp Number <span class="text-red-500">*</span></label>
                    <input type="tel" name="phone" required class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-200 focus:bg-white focus:border-theme focus:ring-1 focus:ring-theme outline-none transition-all" placeholder="+971 50 000 0000">
                </div>

                <!-- Email Address -->
                <div class="col-span-1 md:col-span-2">
                    <label class="block text-gray-700 text-sm font-medium mb-2 font-poppins">Email Address <span class="text-gray-400 text-xs font-normal">(optional but preferred)</span></label>
                    <input type="email" name="email" class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-200 focus:bg-white focus:border-theme focus:ring-1 focus:ring-theme outline-none transition-all" placeholder="name@example.com">
                </div>

            </div>

            <!-- Property Basics Section -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-6 mt-6 pt-6 border-t border-gray-100">
                
                <div class="col-span-1 md:col-span-2">
                    <h4 class="font-playfair text-xl text-dark border-b border-gray-100 pb-2 mb-4">Property Basics</h4>
                </div>

                <!-- Property Location -->
                <div class="col-span-1 md:col-span-2">
                    <label class="block text-gray-700 text-sm font-medium mb-2 font-poppins">Property Location <span class="text-gray-400 text-xs">(community / building)</span></label>
                    <input type="text" name="property_location" class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-200 focus:bg-white focus:border-theme focus:ring-1 focus:ring-theme outline-none transition-all" placeholder="e.g., Dubai Marina, Building Name">
                </div>

                <!-- Property Type -->
                <div>
                    <label class="block text-gray-700 text-sm font-medium mb-2 font-poppins">Property Type</label>
                    <select name="property_type" class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-200 focus:bg-white focus:border-theme focus:ring-1 focus:ring-theme outline-none transition-all appearance-none">
                        <option value="">Select property type</option>
                        <option value="Apartment">Apartment</option>
                        <option value="Villa">Villa</option>
                        <option value="Townhouse">Townhouse</option>
                        <option value="Penthouse">Penthouse</option>
                        <option value="Residential Land">Plot / Residential Land</option>
                    </select>
                </div>

                <!-- Bedrooms -->
                <div>
                    <label class="block text-gray-700 text-sm font-medium mb-2 font-poppins">Bedrooms</label>
                    <select name="bedrooms" class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-200 focus:bg-white focus:border-theme focus:ring-1 focus:ring-theme outline-none transition-all appearance-none">
                        <option value="">Select bedrooms</option>
                        <option value="studio">Studio</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7+">7+</option>
                    </select>
                </div>

                <!-- Bathrooms -->
                <div>
                    <label class="block text-gray-700 text-sm font-medium mb-2 font-poppins">Bathrooms</label>
                    <select name="bathrooms" class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-200 focus:bg-white focus:border-theme focus:ring-1 focus:ring-theme outline-none transition-all appearance-none">
                        <option value="">Select bathrooms</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5+">5+</option>
                    </select>
                </div>

                <!-- Built-up Area -->
                <div>
                    <label class="block text-gray-700 text-sm font-medium mb-2 font-poppins">Built-up Area (sqft)</label>
                    <input type="number" name="built_up_area" class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-200 focus:bg-white focus:border-theme focus:ring-1 focus:ring-theme outline-none transition-all" placeholder="e.g., 1200">
                </div>

            </div>

            <!-- Status & Pricing Section -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-6 mt-6 pt-6 border-t border-gray-100">
                
                <div class="col-span-1 md:col-span-2">
                    <h4 class="font-playfair text-xl text-dark border-b border-gray-100 pb-2 mb-4">Status & Pricing</h4>
                </div>

                <!-- Current Status -->
                <div>
                    <label class="block text-gray-700 text-sm font-medium mb-2 font-poppins">Current Status</label>
                    <select name="current_status" id="current_status" class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-200 focus:bg-white focus:border-theme focus:ring-1 focus:ring-theme outline-none transition-all appearance-none">
                        <option value="">Select status</option>
                        <option value="Vacant">Vacant</option>
                        <option value="Tenanted">Tenanted</option>
                        <option value="Owner-occupied">Owner-occupied</option>
                    </select>
                </div>

                <!-- Estimated Market Value -->
                <div>
                    <label class="block text-gray-700 text-sm font-medium mb-2 font-poppins">Estimated Market Value (AED)</label>
                    <input type="number" name="estimated_market_value" class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-200 focus:bg-white focus:border-theme focus:ring-1 focus:ring-theme outline-none transition-all" placeholder="e.g., 2000000">
                </div>

                <!-- Current Annual Rent (conditional - only if tenanted) -->
                <div id="annual-rent-field" class="col-span-1 md:col-span-2 hidden">
                    <label class="block text-gray-700 text-sm font-medium mb-2 font-poppins">Current Annual Rent (AED) <span class="text-gray-400 text-xs">(if tenanted)</span></label>
                    <input type="number" name="current_annual_rent" class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-200 focus:bg-white focus:border-theme focus:ring-1 focus:ring-theme outline-none transition-all" placeholder="e.g., 150000">
                </div>

            </div>

            <!-- Timing & Motivation Section -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-6 mt-6 pt-6 border-t border-gray-100">
                
                <div class="col-span-1 md:col-span-2">
                    <h4 class="font-playfair text-xl text-dark border-b border-gray-100 pb-2 mb-4">Timing & Motivation</h4>
                </div>

                <!-- When would you like to sell? -->
                <div>
                    <label class="block text-gray-700 text-sm font-medium mb-2 font-poppins">When would you like to sell?</label>
                    <select name="sell_timeline" class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-200 focus:bg-white focus:border-theme focus:ring-1 focus:ring-theme outline-none transition-all appearance-none">
                        <option value="">Select timeline</option>
                        <option value="Urgent – within 30 days">Urgent – within 30 days</option>
                        <option value="1–3 months">1–3 months</option>
                        <option value="3–6 months">3–6 months</option>
                        <option value="Just exploring">Just exploring</option>
                    </select>
                </div>

                <!-- Preferred contact method -->
                <div>
                    <label class="block text-gray-700 text-sm font-medium mb-2 font-poppins">Preferred Contact Method</label>
                    <select name="preferred_contact_method" class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-200 focus:bg-white focus:border-theme focus:ring-1 focus:ring-theme outline-none transition-all appearance-none">
                        <option value="">Select method</option>
                        <option value="Phone call">Phone call</option>
                        <option value="WhatsApp">WhatsApp</option>
                        <option value="Email">Email</option>
                    </select>
                </div>

                <!-- Best time to contact -->
                <div class="col-span-1 md:col-span-2">
                    <label class="block text-gray-700 text-sm font-medium mb-2 font-poppins">Best Time to Contact You</label>
                    <select name="best_contact_time" class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-200 focus:bg-white focus:border-theme focus:ring-1 focus:ring-theme outline-none transition-all appearance-none">
                        <option value="">Select time</option>
                        <option value="Morning">Morning</option>
                        <option value="Afternoon">Afternoon</option>
                        <option value="Evening">Evening</option>
                    </select>
                </div>

            </div>
            
            <div class="pt-6 border-t border-gray-100 flex flex-col items-center">
                <button type="submit" class="w-full md:w-1/2 px-8 py-4 bg-theme text-white font-bold rounded-lg shadow-lg hover:bg-dark hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-300">
                    Submit Property Listing
                </button>
                <div id="sell-property-message" class="hidden mt-4 font-medium p-4 rounded-lg w-full text-center"></div>
            </div>
        </form>
    </div>
    
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        var form = document.getElementById('sell-property-form');
        var currentStatusSelect = document.getElementById('current_status');
        var annualRentField = document.getElementById('annual-rent-field');
        
        if (!form || !currentStatusSelect) return;

        // Show/hide annual rent field based on current status
        currentStatusSelect.addEventListener('change', function() {
            if (this.value === 'Tenanted') {
                annualRentField.classList.remove('hidden');
                annualRentField.querySelector('input[name="current_annual_rent"]').setAttribute('required', 'required');
            } else {
                annualRentField.classList.add('hidden');
                annualRentField.querySelector('input[name="current_annual_rent"]').removeAttribute('required');
            }
        });

        form.addEventListener('submit', function(e) {
            e.preventDefault();

            var btn = form.querySelector('button[type="submit"]');
            var msg = document.getElementById('sell-property-message');
            
            // UI Loading State
            if(btn) {
                btn.disabled = true;
                btn.innerHTML = '<span class="inline-block animate-spin mr-2 border-2 border-white border-t-transparent rounded-full w-4 h-4"></span> Sending...';
            }
            
            if(msg) {
                msg.className = 'hidden mt-4 font-medium p-4 rounded-lg w-full text-center'; 
            }

            var formData = new FormData(form);
            formData.append('action', 'sell_property_submit');
            formData.append('security', '<?php echo wp_create_nonce("sell_property_submit_nonce"); ?>');

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
                        msg.innerText = 'Thank you! Your property listing has been submitted successfully. We will contact you shortly.';
                        msg.classList.add('bg-green-100', 'text-green-700');
                        form.reset();
                        // Hide annual rent field after reset
                        if(annualRentField) {
                            annualRentField.classList.add('hidden');
                        }
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
                    btn.innerText = 'Submit Property Listing';
                }
            });
        });
    });
    </script>
    <?php
    return ob_get_clean();
}

// Register shortcode
add_shortcode('sell_property_form', 'nolix_sell_property_form_shortcode');