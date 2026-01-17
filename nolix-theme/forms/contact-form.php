<?php
/**
 * Contact Form - UI and Shortcode
 * Shortcode: [contact_form]
 * 
 * Form for "Contact" page
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

/**
 * Render the Contact Form
 */
function nolix_contact_form_shortcode() {
    ob_start();
    ?>
    <div id="contact-form-container" class="bg-white p-6 md:p-10 rounded-2xl shadow-xl border border-gray-100 max-w-5xl mx-auto relative overflow-hidden" data-aos="fade-up">
        <div class="absolute top-0 left-0 w-full h-2 bg-gradient-to-r from-theme to-[#a37e45]"></div>
        
        <div class="text-center mb-10" data-aos="fade-up" data-aos-delay="100">
            <span class="text-theme font-bold tracking-wider uppercase text-sm font-playfair mb-2 block">Get In Touch</span>
            <h3 class="font-playfair text-3xl md:text-4xl text-dark font-bold mb-4">Send Us a Message</h3>
            <p class="text-gray-500 max-w-2xl mx-auto font-poppins font-light">
                Have a question or need assistance? Fill out the form below and we'll get back to you as soon as possible.
            </p>
        </div>
        
        <form id="contact-form" class="space-y-6">
            <!-- Grid Layout -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-6">
                
                <!-- Full Name -->
                <div>
                    <label class="block text-gray-700 text-sm font-medium mb-2 font-poppins">Full Name <span class="text-red-500">*</span></label>
                    <input type="text" name="name" required class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-200 focus:bg-white focus:border-theme focus:ring-1 focus:ring-theme outline-none transition-all" placeholder="John Doe">
                </div>

                <!-- Email Address -->
                <div>
                    <label class="block text-gray-700 text-sm font-medium mb-2 font-poppins">Email Address <span class="text-red-500">*</span></label>
                    <input type="email" name="email" required class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-200 focus:bg-white focus:border-theme focus:ring-1 focus:ring-theme outline-none transition-all" placeholder="name@example.com">
                </div>

                <!-- Phone Number -->
                <div>
                    <label class="block text-gray-700 text-sm font-medium mb-2 font-poppins">Phone Number <span class="text-red-500">*</span></label>
                    <input type="tel" name="phone" required class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-200 focus:bg-white focus:border-theme focus:ring-1 focus:ring-theme outline-none transition-all" placeholder="+971 50 000 0000">
                </div>

                <!-- Subject -->
                <div>
                    <label class="block text-gray-700 text-sm font-medium mb-2 font-poppins">Subject <span class="text-red-500">*</span></label>
                    <select name="subject" required class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-200 focus:bg-white focus:border-theme focus:ring-1 focus:ring-theme outline-none transition-all appearance-none">
                        <option value="">Select Subject</option>
                        <option value="General Inquiry">General Inquiry</option>
                        <option value="Property Inquiry">Property Inquiry</option>
                        <option value="Sales Inquiry">Sales Inquiry</option>
                        <option value="Rental Inquiry">Rental Inquiry</option>
                        <option value="Property Management">Property Management</option>
                        <option value="Valuation Service">Valuation Service</option>
                        <option value="Mortgage Service">Mortgage Service</option>
                        <option value="Consultancy">Consultancy</option>
                        <option value="Other">Other</option>
                    </select>
                </div>

                <!-- Message -->
                <div class="col-span-1 md:col-span-2">
                    <label class="block text-gray-700 text-sm font-medium mb-2 font-poppins">Message <span class="text-red-500">*</span></label>
                    <textarea name="message" required rows="6" class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-200 focus:bg-white focus:border-theme focus:ring-1 focus:ring-theme outline-none transition-all resize-y" placeholder="Tell us how we can help you..."></textarea>
                </div>

            </div>
            
            <div class="pt-6 border-t border-gray-100 flex flex-col items-center">
                <button type="submit" class="w-full md:w-1/2 px-8 py-4 bg-theme text-white font-bold rounded-lg shadow-lg hover:bg-dark hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-300">
                    Send Message
                </button>
                <div id="contact-message" class="hidden mt-4 font-medium p-4 rounded-lg w-full text-center"></div>
            </div>
        </form>
    </div>
    
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        var form = document.getElementById('contact-form');
        if (!form) return;
        
        form.addEventListener('submit', function(e) {
            e.preventDefault();

            var btn = form.querySelector('button[type="submit"]');
            var msg = document.getElementById('contact-message');
            
            // UI Loading State
            if(btn) {
                btn.disabled = true;
                btn.innerHTML = '<span class="inline-block animate-spin mr-2 border-2 border-white border-t-transparent rounded-full w-4 h-4"></span> Sending...';
            }
            
            if(msg) {
                msg.className = 'hidden mt-4 font-medium p-4 rounded-lg w-full text-center'; 
            }

            var formData = new FormData(form);
            formData.append('action', 'contact_form_submit');
            formData.append('security', '<?php echo wp_create_nonce("contact_form_submit_nonce"); ?>');

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
                        msg.innerText = 'Thank you! Your message has been sent successfully. We will get back to you shortly.';
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
                    btn.innerText = 'Send Message';
                }
            });
        });
    });
    </script>
    <?php
    return ob_get_clean();
}
add_shortcode('contact_form', 'nolix_contact_form_shortcode');

