<?php
/**
 * Lease Property Form - UI and Shortcode
 * Shortcode: [lease_property_form]
 * 
 * Form for "Lease Out My Property" page
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

/**
 * Render the Lease Property Form
 */
function nolix_lease_property_form_shortcode() {
    ob_start();
    ?>
    <div id="lease-property-form-container" class="bg-white p-6 md:p-10 rounded-2xl shadow-xl border border-gray-100 max-w-5xl mx-auto relative overflow-hidden">
        <div class="absolute top-0 left-0 w-full h-2 bg-gradient-to-r from-theme to-[#a37e45]"></div>
        
        <div class="text-center mb-10">
            <span class="text-theme font-bold tracking-wider uppercase text-sm font-playfair mb-2 block">Property Listing</span>
            <h3 class="font-playfair text-3xl md:text-4xl text-dark font-bold mb-4">Lease Out My Property</h3>
            <p class="text-gray-500 max-w-2xl mx-auto font-poppins font-light">
                List your property for lease and find qualified tenants quickly.
            </p>
        </div>
        
        <form id="lease-property-form" class="space-y-6">
            
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
                    <label class="block text-gray-700 text-sm font-medium mb-2 font-poppins">Email Address <span class="text-red-500">*</span></label>
                    <input type="email" name="email" required class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-200 focus:bg-white focus:border-theme focus:ring-1 focus:ring-theme outline-none transition-all" placeholder="name@example.com">
                </div>

            </div>

            <!-- Property Details Section -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-6 mt-6 pt-6 border-t border-gray-100">
                
                <div class="col-span-1 md:col-span-2">
                    <h4 class="font-playfair text-xl text-dark border-b border-gray-100 pb-2 mb-4">Property Details</h4>
                </div>

                <!-- Property Location -->
                <div class="col-span-1 md:col-span-2">
                    <label class="block text-gray-700 text-sm font-medium mb-2 font-poppins">Property Location (community / building) <span class="text-red-500">*</span></label>
                    <input type="text" name="property_location" required class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-200 focus:bg-white focus:border-theme focus:ring-1 focus:ring-theme outline-none transition-all" placeholder="e.g., Dubai Marina, Building Name">
                </div>

                <!-- Property Type -->
                <div>
                    <label class="block text-gray-700 text-sm font-medium mb-2 font-poppins">Property Type <span class="text-red-500">*</span></label>
                    <select name="property_type" required class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-200 focus:bg-white focus:border-theme focus:ring-1 focus:ring-theme outline-none transition-all appearance-none">
                        <option value="">Select property type</option>
                        <option value="Apartment">Apartment</option>
                        <option value="Villa">Villa</option>
                        <option value="Townhouse">Townhouse</option>
                        <option value="Penthouse">Penthouse</option>
                    </select>
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

                <!-- Bathrooms -->
                <div>
                    <label class="block text-gray-700 text-sm font-medium mb-2 font-poppins">Bathrooms <span class="text-red-500">*</span></label>
                    <select name="bathrooms" required class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-200 focus:bg-white focus:border-theme focus:ring-1 focus:ring-theme outline-none transition-all appearance-none">
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
                    <label class="block text-gray-700 text-sm font-medium mb-2 font-poppins">Built-up Area (sqft) <span class="text-red-500">*</span></label>
                    <input type="text" name="built_up_area" required class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-200 focus:bg-white focus:border-theme focus:ring-1 focus:ring-theme outline-none transition-all" placeholder="e.g., 1200">
                </div>

                <!-- Furnishing -->
                <div>
                    <label class="block text-gray-700 text-sm font-medium mb-2 font-poppins">Furnishing <span class="text-red-500">*</span></label>
                    <select name="furnishing" required class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-200 focus:bg-white focus:border-theme focus:ring-1 focus:ring-theme outline-none transition-all appearance-none">
                        <option value="">Select furnishing</option>
                        <option value="Furnished">Furnished</option>
                        <option value="Unfurnished">Unfurnished</option>
                        <option value="Semi-furnished">Semi-furnished</option>
                    </select>
                </div>

            </div>

            <!-- Lease Expectations Section -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-6 mt-6 pt-6 border-t border-gray-100">
                
                <div class="col-span-1 md:col-span-2">
                    <h4 class="font-playfair text-xl text-dark border-b border-gray-100 pb-2 mb-4">Lease Expectations</h4>
                </div>

                <!-- Expected Annual Rent -->
                <div>
                    <label class="block text-gray-700 text-sm font-medium mb-2 font-poppins">Expected Annual Rent (AED) <span class="text-red-500">*</span></label>
                    <input type="text" name="expected_annual_rent" required class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-200 focus:bg-white focus:border-theme focus:ring-1 focus:ring-theme outline-none transition-all" placeholder="e.g., 80000">
                </div>

                <!-- Minimum Lease Term -->
                <div>
                    <label class="block text-gray-700 text-sm font-medium mb-2 font-poppins">Minimum Lease Term <span class="text-red-500">*</span></label>
                    <select name="minimum_lease_term" required class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-200 focus:bg-white focus:border-theme focus:ring-1 focus:ring-theme outline-none transition-all appearance-none">
                        <option value="">Select lease term</option>
                        <option value="1 year">1 year</option>
                        <option value="2 years">2 years</option>
                        <option value="Short-term allowed">Short-term allowed</option>
                    </select>
                </div>

                <!-- Available From -->
                <div>
                    <label class="block text-gray-700 text-sm font-medium mb-2 font-poppins">Available From (date) <span class="text-red-500">*</span></label>
                    <input type="date" name="available_from" required class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-200 focus:bg-white focus:border-theme focus:ring-1 focus:ring-theme outline-none transition-all">
                </div>

                <!-- Current Status -->
                <div>
                    <label class="block text-gray-700 text-sm font-medium mb-2 font-poppins">Current Status <span class="text-red-500">*</span></label>
                    <select name="current_status" id="current_status" required class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-200 focus:bg-white focus:border-theme focus:ring-1 focus:ring-theme outline-none transition-all appearance-none">
                        <option value="">Select status</option>
                        <option value="Vacant">Vacant</option>
                        <option value="Tenanted until [date]">Tenanted until [date]</option>
                        <option value="Owner-occupied">Owner-occupied</option>
                    </select>
                </div>

                <!-- Tenanted Until Date (conditional) -->
                <div id="tenanted-until-field" class="hidden col-span-1 md:col-span-2">
                    <label class="block text-gray-700 text-sm font-medium mb-2 font-poppins">Tenanted Until Date <span class="text-red-500">*</span></label>
                    <input type="date" name="tenanted_until_date" class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-200 focus:bg-white focus:border-theme focus:ring-1 focus:ring-theme outline-none transition-all">
                </div>

            </div>

            <!-- Management & Services Section -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-6 mt-6 pt-6 border-t border-gray-100">
                
                <div class="col-span-1 md:col-span-2">
                    <h4 class="font-playfair text-xl text-dark border-b border-gray-100 pb-2 mb-4">Management & Services</h4>
                </div>

                <!-- Property Management Interest -->
                <div>
                    <label class="block text-gray-700 text-sm font-medium mb-2 font-poppins">Are you interested in full property management? <span class="text-red-500">*</span></label>
                    <select name="property_management_interest" required class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-200 focus:bg-white focus:border-theme focus:ring-1 focus:ring-theme outline-none transition-all appearance-none">
                        <option value="">Select option</option>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                        <option value="Maybe, send details">Maybe, send details</option>
                    </select>
                </div>

                <!-- Cheque Preference -->
                <div>
                    <label class="block text-gray-700 text-sm font-medium mb-2 font-poppins">Do you prefer: <span class="text-red-500">*</span></label>
                    <select name="cheque_preference" required class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-200 focus:bg-white focus:border-theme focus:ring-1 focus:ring-theme outline-none transition-all appearance-none">
                        <option value="">Select preference</option>
                        <option value="Single cheque">Single cheque</option>
                        <option value="2 cheques">2 cheques</option>
                        <option value="4 cheques">4 cheques</option>
                        <option value="Flexible">Flexible</option>
                    </select>
                </div>

                <!-- Restrictions -->
                <div class="col-span-1 md:col-span-2">
                    <label class="block text-gray-700 text-sm font-medium mb-2 font-poppins">Any restrictions?</label>
                    <textarea name="restrictions" rows="3" class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-200 focus:bg-white focus:border-theme focus:ring-1 focus:ring-theme outline-none transition-all" placeholder="e.g., No pets, Families only, No sharing, etc."></textarea>
                </div>

            </div>

            <!-- Extras Section -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-6 mt-6 pt-6 border-t border-gray-100">
                
                <div class="col-span-1 md:col-span-2">
                    <h4 class="font-playfair text-xl text-dark border-b border-gray-100 pb-2 mb-4">Extras</h4>
                </div>

                <!-- Recently Renovated -->
                <div>
                    <label class="block text-gray-700 text-sm font-medium mb-2 font-poppins">Has the property been recently renovated or upgraded? <span class="text-red-500">*</span></label>
                    <select name="recently_renovated" id="recently_renovated" required class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-200 focus:bg-white focus:border-theme focus:ring-1 focus:ring-theme outline-none transition-all appearance-none">
                        <option value="">Select option</option>
                        <option value="Yes">Yes</option>
                        <option value="No">No, with brief description</option>
                    </select>
                </div>

                <!-- How Quickly Need Tenant -->
                <div>
                    <label class="block text-gray-700 text-sm font-medium mb-2 font-poppins">How quickly do you need a tenant? <span class="text-red-500">*</span></label>
                    <select name="tenant_urgency" required class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-200 focus:bg-white focus:border-theme focus:ring-1 focus:ring-theme outline-none transition-all appearance-none">
                        <option value="">Select timeline</option>
                        <option value="Immediately">Immediately</option>
                        <option value="Within 1 month">Within 1 month</option>
                        <option value="Flexible">Flexible</option>
                    </select>
                </div>

                <!-- Renovation Description (conditional) -->
                <div id="renovation-description-field" class="hidden col-span-1 md:col-span-2">
                    <label class="block text-gray-700 text-sm font-medium mb-2 font-poppins">Brief Description <span class="text-red-500">*</span></label>
                    <textarea name="renovation_description" rows="3" class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-200 focus:bg-white focus:border-theme focus:ring-1 focus:ring-theme outline-none transition-all" placeholder="Brief description of renovations or upgrades..."></textarea>
                </div>

                <!-- Additional Notes -->
                <div class="col-span-1 md:col-span-2">
                    <label class="block text-gray-700 text-sm font-medium mb-2 font-poppins">Anything else we should know about your property or ideal tenant?</label>
                    <textarea name="additional_notes" rows="4" class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-200 focus:bg-white focus:border-theme focus:ring-1 focus:ring-theme outline-none transition-all" placeholder="Any additional information about your property, ideal tenant preferences, etc..."></textarea>
                </div>

            </div>
            
            <div class="pt-6 border-t border-gray-100 flex flex-col items-center">
                <button type="submit" class="w-full md:w-1/2 px-8 py-4 bg-theme text-white font-bold rounded-lg shadow-lg hover:bg-dark hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-300">
                    Submit Property Listing
                </button>
                <div id="lease-property-message" class="hidden mt-4 font-medium p-4 rounded-lg w-full text-center"></div>
            </div>
        </form>
    </div>
    
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        var form = document.getElementById('lease-property-form');
        var currentStatus = document.getElementById('current_status');
        var tenantedUntilField = document.getElementById('tenanted-until-field');
        var recentlyRenovated = document.getElementById('recently_renovated');
        var renovationDescriptionField = document.getElementById('renovation-description-field');
        
        if (!form) return;

        // Show/hide tenanted until date field
        if (currentStatus) {
            currentStatus.addEventListener('change', function() {
                if (this.value === 'Tenanted until [date]') {
                    tenantedUntilField.classList.remove('hidden');
                    tenantedUntilField.querySelector('input[name="tenanted_until_date"]').setAttribute('required', 'required');
                } else {
                    tenantedUntilField.classList.add('hidden');
                    tenantedUntilField.querySelector('input[name="tenanted_until_date"]').removeAttribute('required');
                }
            });
        }

        // Show/hide renovation description field
        if (recentlyRenovated) {
            recentlyRenovated.addEventListener('change', function() {
                if (this.value === 'No') {
                    renovationDescriptionField.classList.remove('hidden');
                    renovationDescriptionField.querySelector('textarea[name="renovation_description"]').setAttribute('required', 'required');
                } else {
                    renovationDescriptionField.classList.add('hidden');
                    renovationDescriptionField.querySelector('textarea[name="renovation_description"]').removeAttribute('required');
                }
            });
        }

        form.addEventListener('submit', function(e) {
            e.preventDefault();

            var btn = form.querySelector('button[type="submit"]');
            var msg = document.getElementById('lease-property-message');
            
            // UI Loading State
            if(btn) {
                btn.disabled = true;
                btn.innerHTML = '<span class="inline-block animate-spin mr-2 border-2 border-white border-t-transparent rounded-full w-4 h-4"></span> Sending...';
            }
            
            if(msg) {
                msg.className = 'hidden mt-4 font-medium p-4 rounded-lg w-full text-center'; 
            }

            var formData = new FormData(form);
            formData.append('action', 'lease_property_submit');
            formData.append('security', '<?php echo wp_create_nonce("lease_property_submit_nonce"); ?>');

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
                        // Hide conditional fields
                        if(tenantedUntilField) tenantedUntilField.classList.add('hidden');
                        if(renovationDescriptionField) renovationDescriptionField.classList.add('hidden');
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
add_shortcode('lease_property_form', 'nolix_lease_property_form_shortcode');

