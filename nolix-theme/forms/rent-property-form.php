<?php
/**
 * Rent Property Form - UI and Shortcode
 * Shortcode: [rent_property_form]
 * 
 * Form for "Find rent in Dubai" page
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

/**
 * Render the Rent Property Form
 */
function nolix_rent_property_form_shortcode() {
    ob_start();
    ?>
    <div id="rent-property-form-container" class="bg-white p-6 md:p-10 rounded-2xl shadow-xl border border-gray-100 max-w-5xl mx-auto relative overflow-hidden">
        <div class="absolute top-0 left-0 w-full h-2 bg-gradient-to-r from-theme to-[#a37e45]"></div>
        
        <div class="text-center mb-10">
            <span class="text-theme font-bold tracking-wider uppercase text-sm font-playfair mb-2 block">Tenant Inquiry</span>
            <h3 class="font-playfair text-3xl md:text-4xl text-dark font-bold mb-4">Find Rent in Dubai</h3>
            <p class="text-gray-500 max-w-2xl mx-auto font-poppins font-light">
                Tell us about your rental requirements and we'll help you find the perfect home.
            </p>
        </div>
        
        <form id="rent-property-form" class="space-y-6">
            
            <!-- Tenant & Contact Details Section -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-6">
                
                <div class="col-span-1 md:col-span-2">
                    <h4 class="font-playfair text-xl text-dark border-b border-gray-100 pb-2 mb-4">Tenant & Contact Details</h4>
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
                <div>
                    <label class="block text-gray-700 text-sm font-medium mb-2 font-poppins">Email Address <span class="text-red-500">*</span></label>
                    <input type="email" name="email" required class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-200 focus:bg-white focus:border-theme focus:ring-1 focus:ring-theme outline-none transition-all" placeholder="name@example.com">
                </div>

                <!-- Already in Dubai -->
                <div>
                    <label class="block text-gray-700 text-sm font-medium mb-2 font-poppins">Are you already in Dubai? <span class="text-red-500">*</span></label>
                    <select name="already_in_dubai" id="already_in_dubai" required class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-200 focus:bg-white focus:border-theme focus:ring-1 focus:ring-theme outline-none transition-all appearance-none">
                        <option value="">Select option</option>
                        <option value="Yes">Yes</option>
                        <option value="No">No, arriving on [date]</option>
                    </select>
                </div>

                <!-- Arrival Date (conditional) -->
                <div id="arrival-date-field" class="hidden col-span-1 md:col-span-2">
                    <label class="block text-gray-700 text-sm font-medium mb-2 font-poppins">Arrival Date <span class="text-red-500">*</span></label>
                    <input type="date" name="arrival_date" class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-200 focus:bg-white focus:border-theme focus:ring-1 focus:ring-theme outline-none transition-all">
                </div>

            </div>

            <!-- Requirements Section -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-6 mt-6 pt-6 border-t border-gray-100">
                
                <div class="col-span-1 md:col-span-2">
                    <h4 class="font-playfair text-xl text-dark border-b border-gray-100 pb-2 mb-4">Requirements</h4>
                </div>

                <!-- Looking For -->
                <div>
                    <label class="block text-gray-700 text-sm font-medium mb-2 font-poppins">Looking for: <span class="text-red-500">*</span></label>
                    <select name="looking_for" required class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-200 focus:bg-white focus:border-theme focus:ring-1 focus:ring-theme outline-none transition-all appearance-none">
                        <option value="">Select property type</option>
                        <option value="Apartment">Apartment</option>
                        <option value="Villa">Villa</option>
                        <option value="Townhouse">Townhouse</option>
                        <option value="Studio">Studio</option>
                        <option value="Room">Room</option>
                    </select>
                </div>

                <!-- Preferred Locations -->
                <div>
                    <label class="block text-gray-700 text-sm font-medium mb-2 font-poppins">Preferred Locations <span class="text-red-500">*</span></label>
                    <input type="text" name="preferred_locations" required class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-200 focus:bg-white focus:border-theme focus:ring-1 focus:ring-theme outline-none transition-all" placeholder="e.g., Marina, Downtown, Business Bay, JBR">
                    <p class="text-gray-400 text-xs mt-1 font-poppins">You can enter multiple locations separated by commas</p>
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

                <!-- Furnishing -->
                <div>
                    <label class="block text-gray-700 text-sm font-medium mb-2 font-poppins">Furnishing <span class="text-red-500">*</span></label>
                    <select name="furnishing" required class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-200 focus:bg-white focus:border-theme focus:ring-1 focus:ring-theme outline-none transition-all appearance-none">
                        <option value="">Select furnishing</option>
                        <option value="Furnished">Furnished</option>
                        <option value="Unfurnished">Unfurnished</option>
                        <option value="Either">Either</option>
                    </select>
                </div>

                <!-- Parking Needed -->
                <div>
                    <label class="block text-gray-700 text-sm font-medium mb-2 font-poppins">Parking Needed? <span class="text-red-500">*</span></label>
                    <select name="parking_needed" required class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-200 focus:bg-white focus:border-theme focus:ring-1 focus:ring-theme outline-none transition-all appearance-none">
                        <option value="">Select option</option>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                    </select>
                </div>

                <!-- Pets -->
                <div>
                    <label class="block text-gray-700 text-sm font-medium mb-2 font-poppins">Pets? <span class="text-red-500">*</span></label>
                    <select name="pets" required class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-200 focus:bg-white focus:border-theme focus:ring-1 focus:ring-theme outline-none transition-all appearance-none">
                        <option value="">Select option</option>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                    </select>
                </div>

            </div>

            <!-- Budget & Timing Section -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-6 mt-6 pt-6 border-t border-gray-100">
                
                <div class="col-span-1 md:col-span-2">
                    <h4 class="font-playfair text-xl text-dark border-b border-gray-100 pb-2 mb-4">Budget & Timing</h4>
                </div>

                <!-- Annual Rent Budget -->
                <div>
                    <label class="block text-gray-700 text-sm font-medium mb-2 font-poppins">Annual Rent Budget (AED) <span class="text-red-500">*</span></label>
                    <input type="text" name="annual_rent_budget" required class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-200 focus:bg-white focus:border-theme focus:ring-1 focus:ring-theme outline-none transition-all" placeholder="e.g., 80000">
                </div>

                <!-- Move-in Date -->
                <div>
                    <label class="block text-gray-700 text-sm font-medium mb-2 font-poppins">When do you need to move in? <span class="text-red-500">*</span></label>
                    <select name="move_in_timeline" id="move_in_timeline" required class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-200 focus:bg-white focus:border-theme focus:ring-1 focus:ring-theme outline-none transition-all appearance-none">
                        <option value="">Select timeline</option>
                        <option value="Within 2 weeks">Within 2 weeks</option>
                        <option value="1 month">1 month</option>
                        <option value="2-3 months">2–3 months</option>
                        <option value="specific_date">Specific date</option>
                    </select>
                </div>

                <!-- Specific Move-in Date (conditional) -->
                <div id="move-in-date-field" class="hidden">
                    <label class="block text-gray-700 text-sm font-medium mb-2 font-poppins">Move-in Date <span class="text-red-500">*</span></label>
                    <input type="date" name="move_in_date" class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-200 focus:bg-white focus:border-theme focus:ring-1 focus:ring-theme outline-none transition-all">
                </div>

                <!-- Preferred Lease Term -->
                <div>
                    <label class="block text-gray-700 text-sm font-medium mb-2 font-poppins">Preferred lease term <span class="text-red-500">*</span></label>
                    <select name="lease_term" required class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-200 focus:bg-white focus:border-theme focus:ring-1 focus:ring-theme outline-none transition-all appearance-none">
                        <option value="">Select lease term</option>
                        <option value="1 year">1 year</option>
                        <option value="Short-term">Short-term</option>
                        <option value="Open to options">Open to options</option>
                    </select>
                </div>

            </div>

            <!-- Lifestyle / Priorities Section -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-6 mt-6 pt-6 border-t border-gray-100">
                
                <div class="col-span-1 md:col-span-2">
                    <h4 class="font-playfair text-xl text-dark border-b border-gray-100 pb-2 mb-4">Lifestyle / Priorities</h4>
                </div>

                <!-- Who will be living -->
                <div>
                    <label class="block text-gray-700 text-sm font-medium mb-2 font-poppins">Who will be living in the property? <span class="text-red-500">*</span></label>
                    <select name="living_situation" required class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-200 focus:bg-white focus:border-theme focus:ring-1 focus:ring-theme outline-none transition-all appearance-none">
                        <option value="">Select option</option>
                        <option value="Single">Single</option>
                        <option value="Couple">Couple</option>
                        <option value="Family with children">Family with children</option>
                        <option value="Shared">Shared</option>
                    </select>
                </div>

                <!-- Top 3 Priorities -->
                <div class="col-span-1 md:col-span-2">
                    <label class="block text-gray-700 text-sm font-medium mb-2 font-poppins">Top 3 priorities <span class="text-red-500">*</span></label>
                    <textarea name="top_priorities" required rows="3" class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-200 focus:bg-white focus:border-theme focus:ring-1 focus:ring-theme outline-none transition-all" placeholder="e.g., Close to Metro, Sea view, New building, Family community, Schools nearby, Quiet area"></textarea>
                    <p class="text-gray-400 text-xs mt-1 font-poppins">Please list your top 3 priorities (separated by commas or new lines)</p>
                </div>

            </div>

            <!-- Extras Section -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-6 mt-6 pt-6 border-t border-gray-100">
                
                <div class="col-span-1 md:col-span-2">
                    <h4 class="font-playfair text-xl text-dark border-b border-gray-100 pb-2 mb-4">Extras</h4>
                </div>

                <!-- Ejari/Utilities Help -->
                <div>
                    <label class="block text-gray-700 text-sm font-medium mb-2 font-poppins">Do you need help with Ejari, utilities, or move-in services? <span class="text-red-500">*</span></label>
                    <select name="ejari_utilities_help" required class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-200 focus:bg-white focus:border-theme focus:ring-1 focus:ring-theme outline-none transition-all appearance-none">
                        <option value="">Select option</option>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                    </select>
                </div>

                <!-- Additional Notes -->
                <div class="col-span-1 md:col-span-2">
                    <label class="block text-gray-700 text-sm font-medium mb-2 font-poppins">Anything else we should know to find the right home for you?</label>
                    <textarea name="additional_notes" rows="4" class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-200 focus:bg-white focus:border-theme focus:ring-1 focus:ring-theme outline-none transition-all" placeholder="Any additional information that would help us find the perfect property for you..."></textarea>
                </div>

            </div>
            
            <div class="pt-6 border-t border-gray-100 flex flex-col items-center">
                <button type="submit" class="w-full md:w-1/2 px-8 py-4 bg-theme text-white font-bold rounded-lg shadow-lg hover:bg-dark hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-300">
                    Submit Inquiry
                </button>
                <div id="rent-property-message" class="hidden mt-4 font-medium p-4 rounded-lg w-full text-center"></div>
            </div>
        </form>
    </div>
    
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        var form = document.getElementById('rent-property-form');
        var alreadyInDubai = document.getElementById('already_in_dubai');
        var arrivalDateField = document.getElementById('arrival-date-field');
        var moveInTimeline = document.getElementById('move_in_timeline');
        var moveInDateField = document.getElementById('move-in-date-field');
        
        if (!form) return;

        // Show/hide arrival date field
        if (alreadyInDubai) {
            alreadyInDubai.addEventListener('change', function() {
                if (this.value === 'No') {
                    arrivalDateField.classList.remove('hidden');
                    arrivalDateField.querySelector('input[name="arrival_date"]').setAttribute('required', 'required');
                } else {
                    arrivalDateField.classList.add('hidden');
                    arrivalDateField.querySelector('input[name="arrival_date"]').removeAttribute('required');
                }
            });
        }

        // Show/hide specific move-in date field
        if (moveInTimeline && moveInDateField) {
            moveInTimeline.addEventListener('change', function() {
                if (this.value === 'specific_date') {
                    moveInDateField.classList.remove('hidden');
                    moveInDateField.querySelector('input[name="move_in_date"]').setAttribute('required', 'required');
                } else {
                    moveInDateField.classList.add('hidden');
                    moveInDateField.querySelector('input[name="move_in_date"]').removeAttribute('required');
                }
            });
        }

        form.addEventListener('submit', function(e) {
            e.preventDefault();

            var btn = form.querySelector('button[type="submit"]');
            var msg = document.getElementById('rent-property-message');
            
            // UI Loading State
            if(btn) {
                btn.disabled = true;
                btn.innerHTML = '<span class="inline-block animate-spin mr-2 border-2 border-white border-t-transparent rounded-full w-4 h-4"></span> Sending...';
            }
            
            if(msg) {
                msg.className = 'hidden mt-4 font-medium p-4 rounded-lg w-full text-center'; 
            }

            var formData = new FormData(form);
            formData.append('action', 'rent_property_submit');
            formData.append('security', '<?php echo wp_create_nonce("rent_property_submit_nonce"); ?>');

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
                        msg.innerText = 'Thank you! Your rental inquiry has been submitted successfully. We will contact you shortly.';
                        msg.classList.add('bg-green-100', 'text-green-700');
                        form.reset();
                        // Hide conditional fields
                        if(arrivalDateField) arrivalDateField.classList.add('hidden');
                        if(moveInDateField) moveInDateField.classList.add('hidden');
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
add_shortcode('rent_property_form', 'nolix_rent_property_form_shortcode');

