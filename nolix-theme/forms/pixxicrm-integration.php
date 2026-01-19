<?php
/**
 * PixxiCRM API Integration Handler
 * Handles form submissions to PixxiCRM API
 * 
 * This file contains all PixxiCRM integration logic for form submissions
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

/**
 * PixxiCRM API Configuration
 * Global configuration for all PixxiCRM form integrations
 */
define('PIXXICRM_API_URL', 'https://dataapi.pixxicrm.ae/pixxiapi/webhook/v1/form');
define('PIXXICRM_API_TOKEN', 'Dg-OW9Z2pp5QLc-zCWznx5W4shPTNptK'); 

// Form IDs for different forms
define('PIXXICRM_SELL_FORM_ID', '0bac4537-2af3-454c-a7e6-37dbb5b2cea9'); 
define('PIXXICRM_BUY_FORM_ID', 'f0cc7c84-f175-4c4a-b1fe-d8136cfc9a2a'); 
define('PIXXICRM_RENT_FORM_ID', '355802a8-4738-4dc4-8ae3-ace771d018dd'); 
define('PIXXICRM_LEASE_FORM_ID', 'd89157a3-3f2a-40ab-9eb9-883b2a8bce28');  
define('PIXXICRM_OFF_PLAN_CONSULTATION_FORM_ID', '7372dc7c-238c-4d78-b004-89a76b5747fb'); 
define('PIXXICRM_CONTACT_FORM_ID', '81c55242-992d-4d67-836f-564b0d53508'); 

/**
 * Send data to PixxiCRM API
 * 
 * @param array $data Form data to send
 * @param string $form_id Optional form ID, uses default if not provided
 * @return array Response with 'success' and 'message' keys
 */
function nolix_pixxicrm_api_submit($data, $form_id = '') {
    if (empty($form_id)) {
        $form_id = PIXXICRM_DEFAULT_FORM_ID;
    }

    // Prepare API request body
    $body = array_merge([
        'formId' => $form_id,
        'extraData' => []
    ], $data);

    // Ensure extraData is an object/array
    if (!isset($body['extraData']) || !is_array($body['extraData'])) {
        $body['extraData'] = [];
    }

    // API Request Arguments
    $args = [
        'body' => json_encode($body),
        'headers' => [
            'Content-Type' => 'application/json',
            'X-PIXXI-TOKEN' => PIXXICRM_API_TOKEN
        ],
        'timeout' => 30,
        'blocking' => true,
    ];
    
    // Send Request
    $response = wp_remote_post(PIXXICRM_API_URL, $args);
    
    // Handle Response
    if (is_wp_error($response)) {
        return [
            'success' => false,
            'message' => 'Connection failed: ' . $response->get_error_message(),
            'code' => 0
        ];
    }
    
    $code = wp_remote_retrieve_response_code($response);
    $response_body = wp_remote_retrieve_body($response);
    
    if ($code >= 200 && $code < 300) {
        return [
            'success' => true,
            'message' => 'Form submitted successfully.',
            'code' => $code,
            'body' => $response_body
        ];
    } else {
        // Logging for debug
        error_log('PixxiCRM API Error: ' . $code . ' - ' . $response_body);
        return [
            'success' => false,
            'message' => 'Submission failed. Server responded with ' . $code,
            'code' => $code,
            'body' => $response_body
        ];
    }
}

/**
 * AJAX Handler for Sell Property Form Submission
 */
function nolix_handle_sell_property_submit() {
    check_ajax_referer('sell_property_submit_nonce', 'security');
    
    // Sanitize and collect form data
    $name = sanitize_text_field($_POST['name'] ?? '');
    $phone = sanitize_text_field($_POST['phone'] ?? '');
    $email = sanitize_email($_POST['email'] ?? '');
    
    $property_location = sanitize_text_field($_POST['property_location'] ?? '');
    $property_type = sanitize_text_field($_POST['property_type'] ?? '');
    $bedrooms = sanitize_text_field($_POST['bedrooms'] ?? '');
    $bathrooms = sanitize_text_field($_POST['bathrooms'] ?? '');
    $built_up_area = sanitize_text_field($_POST['built_up_area'] ?? '');
    
    $current_status = sanitize_text_field($_POST['current_status'] ?? '');
    $estimated_market_value = sanitize_text_field($_POST['estimated_market_value'] ?? '');
    $current_annual_rent = sanitize_text_field($_POST['current_annual_rent'] ?? '');
    
    $sell_timeline = sanitize_text_field($_POST['sell_timeline'] ?? '');
    $preferred_contact_method = sanitize_text_field($_POST['preferred_contact_method'] ?? '');
    $best_contact_time = sanitize_text_field($_POST['best_contact_time'] ?? '');
    
    // Validate required fields
    if (empty($name) || empty($phone)) {
        wp_send_json_error('Name and phone number are required fields.');
        return;
    }
    
    // Email is optional in form but required by API
    // If email is empty, use a placeholder email format
    // Note: You may want to configure this based on your PixxiCRM settings
    if (empty($email) || !is_email($email)) {
        // Use a placeholder email - API requires email field, but form allows optional
        // Format: not-provided-[timestamp]@nolix-placeholder.local
        // This ensures API requirements are met while keeping form optional
        $email = 'not-provided-' . time() . '@nolix-placeholder.local';
    }
    
    // Build extraData object for additional fields
    $extra_data = [];
    
    // Property details - match custom field titles if they exist in your CRM
    if (!empty($property_location)) {
        $extra_data['Property Location'] = $property_location;
    }
    if (!empty($bathrooms)) {
        $extra_data['Bathrooms'] = $bathrooms;
    }
    if (!empty($built_up_area)) {
        $extra_data['Built-up Area (sqft)'] = $built_up_area;
    }
    if (!empty($current_status)) {
        $extra_data['Current Status'] = $current_status;
    }
    if (!empty($estimated_market_value)) {
        $extra_data['Estimated Market Value (AED)'] = $estimated_market_value;
    }
    if (!empty($current_annual_rent)) {
        $extra_data['Current Annual Rent (AED)'] = $current_annual_rent;
    }
    if (!empty($sell_timeline)) {
        $extra_data['When would you like to sell?'] = $sell_timeline;
    }
    if (!empty($preferred_contact_method)) {
        $extra_data['Preferred Contact Method'] = $preferred_contact_method;
    }
    if (!empty($best_contact_time)) {
        $extra_data['Best Time to Contact'] = $best_contact_time;
    }
    
    // Prepare API payload with required fields
    $api_data = [
        'name' => $name,
        'phone' => $phone,
        'email' => $email, // Required by API
        'extraData' => $extra_data
    ];
    
    // Add property type if provided (maps to API propertyType field)
    if (!empty($property_type)) {
        $api_data['propertyType'] = $property_type;
    }
    
    // Add bedrooms if provided (maps to API bedrooms field)
    if (!empty($bedrooms)) {
        $api_data['bedrooms'] = $bedrooms;
    }
    
    // Add budget/market value if provided (maps to API budget field)
    if (!empty($estimated_market_value)) {
        $api_data['budget'] = $estimated_market_value;
    }
    
    // Add built-up area if provided (maps to API preferredSize field)
    if (!empty($built_up_area)) {
        $api_data['preferredSize'] = $built_up_area;
    }
    
    // Submit to PixxiCRM API
    $result = nolix_pixxicrm_api_submit($api_data);
    
    if ($result['success']) {
        wp_send_json_success($result['message']);
    } else {
        wp_send_json_error($result['message']);
    }
}

// Register AJAX handlers
add_action('wp_ajax_sell_property_submit', 'nolix_handle_sell_property_submit');
add_action('wp_ajax_nopriv_sell_property_submit', 'nolix_handle_sell_property_submit');

/**
 * AJAX Handler for Rent Property Form Submission
 */
function nolix_handle_rent_property_submit() {
    check_ajax_referer('rent_property_submit_nonce', 'security');
    
    // Sanitize and collect form data
    $name = sanitize_text_field($_POST['name'] ?? '');
    $phone = sanitize_text_field($_POST['phone'] ?? '');
    $email = sanitize_email($_POST['email'] ?? '');
    
    $already_in_dubai = sanitize_text_field($_POST['already_in_dubai'] ?? '');
    $arrival_date = sanitize_text_field($_POST['arrival_date'] ?? '');
    
    $looking_for = sanitize_text_field($_POST['looking_for'] ?? '');
    $preferred_locations = sanitize_text_field($_POST['preferred_locations'] ?? '');
    $bedrooms = sanitize_text_field($_POST['bedrooms'] ?? '');
    $furnishing = sanitize_text_field($_POST['furnishing'] ?? '');
    $parking_needed = sanitize_text_field($_POST['parking_needed'] ?? '');
    $pets = sanitize_text_field($_POST['pets'] ?? '');
    
    $annual_rent_budget = sanitize_text_field($_POST['annual_rent_budget'] ?? '');
    $move_in_timeline = sanitize_text_field($_POST['move_in_timeline'] ?? '');
    $move_in_date = sanitize_text_field($_POST['move_in_date'] ?? '');
    $lease_term = sanitize_text_field($_POST['lease_term'] ?? '');
    
    $living_situation = sanitize_text_field($_POST['living_situation'] ?? '');
    $top_priorities = sanitize_textarea_field($_POST['top_priorities'] ?? '');
    
    $ejari_utilities_help = sanitize_text_field($_POST['ejari_utilities_help'] ?? '');
    $additional_notes = sanitize_textarea_field($_POST['additional_notes'] ?? '');
    
    // Validate required fields
    if (empty($name) || empty($phone) || empty($email)) {
        wp_send_json_error('Name, phone number, and email are required fields.');
        return;
    }
    
    // Build extraData object
    $extra_data = [];
    
    // Tenant details
    if (!empty($already_in_dubai)) {
        $extra_data['already_in_dubai'] = $already_in_dubai;
        if ($already_in_dubai === 'No' && !empty($arrival_date)) {
            $extra_data['arrival_date'] = $arrival_date;
        }
    }
    
    // Requirements
    if (!empty($preferred_locations)) {
        $extra_data['preferred_locations'] = $preferred_locations;
    }
    if (!empty($furnishing)) {
        $extra_data['furnishing'] = $furnishing;
    }
    if (!empty($parking_needed)) {
        $extra_data['parking_needed'] = $parking_needed;
    }
    if (!empty($pets)) {
        $extra_data['pets'] = $pets;
    }
    
    // Budget & timing
    if (!empty($move_in_timeline)) {
        $extra_data['move_in_timeline'] = $move_in_timeline;
        if ($move_in_timeline === 'specific_date' && !empty($move_in_date)) {
            $extra_data['move_in_date'] = $move_in_date;
        }
    }
    if (!empty($lease_term)) {
        $extra_data['lease_term'] = $lease_term;
    }
    
    // Lifestyle
    if (!empty($living_situation)) {
        $extra_data['living_situation'] = $living_situation;
    }
    if (!empty($top_priorities)) {
        $extra_data['top_priorities'] = $top_priorities;
    }
    
    // Extras
    if (!empty($ejari_utilities_help)) {
        $extra_data['ejari_utilities_help'] = $ejari_utilities_help;
    }
    if (!empty($additional_notes)) {
        $extra_data['additional_notes'] = $additional_notes;
    }
    
    // Prepare API payload
    $api_data = [
        'name' => $name,
        'phone' => $phone,
        'email' => $email,
        'budget' => $annual_rent_budget,
        'bedrooms' => $bedrooms,
        'propertyType' => $looking_for,
        'extraData' => $extra_data
    ];
    
    // Submit to PixxiCRM API with rent form ID
    $result = nolix_pixxicrm_api_submit($api_data, PIXXICRM_RENT_FORM_ID);
    
    if ($result['success']) {
        wp_send_json_success($result['message']);
    } else {
        wp_send_json_error($result['message']);
    }
}

// Register AJAX handlers for rent form
add_action('wp_ajax_rent_property_submit', 'nolix_handle_rent_property_submit');
add_action('wp_ajax_nopriv_rent_property_submit', 'nolix_handle_rent_property_submit');

/**
 * AJAX Handler for Buy Property Form Submission
 */
function nolix_handle_buy_property_submit() {
    check_ajax_referer('buy_property_submit_nonce', 'security');
    
    // Get form data
    $project_type = sanitize_text_field($_POST['projectType'] ?? '');
    $name = sanitize_text_field($_POST['name'] ?? '');
    $phone = sanitize_text_field($_POST['phone'] ?? '');
    $email = sanitize_email($_POST['email'] ?? '');
    $budget = sanitize_text_field($_POST['budget'] ?? '');
    $preferred_location = sanitize_text_field($_POST['preferred_location'] ?? '');
    $bedrooms = sanitize_text_field($_POST['bedrooms'] ?? '');
    $purchase_purpose = sanitize_text_field($_POST['purchase_purpose'] ?? '');
    $buying_timeline = sanitize_text_field($_POST['buying_timeline'] ?? '');
    
    // Validate required fields
    if (empty($name) || empty($phone) || empty($email)) {
        wp_send_json_error('Name, phone number, and email are required fields.');
        return;
    }
    
    // Determine buyer type based on purchase purpose
    $buyer_type = 'investor';
    if ($purchase_purpose === 'End-use') {
        $buyer_type = 'end_user';
    } elseif ($purchase_purpose === 'Both') {
        $buyer_type = 'both';
    }
    
    // Build extraData object
    $extra_data = array(
        'preferred_location' => $preferred_location,
        'purchase_purpose' => $purchase_purpose,
        'buying_timeline' => $buying_timeline
    );
    
    // Add conditional fields based on property type
    if ($project_type === 'off_plan') {
        $extra_data['payment_plan_interest'] = sanitize_text_field($_POST['payment_plan_interest'] ?? '');
        $extra_data['completion_timeline'] = sanitize_text_field($_POST['completion_timeline'] ?? '');
        $extra_data['priority_for_off-plan'] = sanitize_text_field($_POST['priority_off_plan'] ?? '');
        $extra_data['golden_visa_needed'] = sanitize_text_field($_POST['golden_visa_needed'] ?? '');
    } elseif ($project_type === 'secondary') {
        $extra_data['mortgage_needed'] = sanitize_text_field($_POST['mortgage_needed'] ?? '');
        $extra_data['looking_for'] = sanitize_text_field($_POST['looking_for'] ?? '');
        $extra_data['move_in_timeline'] = sanitize_text_field($_POST['move_in_timeline'] ?? '');
        $must_have = sanitize_textarea_field($_POST['must_have_features'] ?? '');
        if (!empty($must_have)) {
            $extra_data['must_have_features'] = $must_have;
        }
    }
    
    // Prepare API payload
    $api_data = array(
        "name" => $name,
        "phone" => $phone,
        "email" => $email,
        "budget" => $budget,
        "bedrooms" => $bedrooms,
        "projectType" => $project_type,
        "buyerType" => $buyer_type,
        "extraData" => $extra_data
    );
    
    // Submit to PixxiCRM API using global function
    $result = nolix_pixxicrm_api_submit($api_data, PIXXICRM_BUY_FORM_ID);
    
    if ($result['success']) {
        wp_send_json_success($result['message']);
    } else {
        wp_send_json_error($result['message']);
    }
}

// Register AJAX handlers for buy form
add_action('wp_ajax_buy_property_submit', 'nolix_handle_buy_property_submit');
add_action('wp_ajax_nopriv_buy_property_submit', 'nolix_handle_buy_property_submit');

/**
 * AJAX Handler for Lease Property Form Submission
 */
function nolix_handle_lease_property_submit() {
    check_ajax_referer('lease_property_submit_nonce', 'security');
    
    // Sanitize and collect form data
    $name = sanitize_text_field($_POST['name'] ?? '');
    $phone = sanitize_text_field($_POST['phone'] ?? '');
    $email = sanitize_email($_POST['email'] ?? '');
    
    $property_location = sanitize_text_field($_POST['property_location'] ?? '');
    $property_type = sanitize_text_field($_POST['property_type'] ?? '');
    $bedrooms = sanitize_text_field($_POST['bedrooms'] ?? '');
    $bathrooms = sanitize_text_field($_POST['bathrooms'] ?? '');
    $built_up_area = sanitize_text_field($_POST['built_up_area'] ?? '');
    $furnishing = sanitize_text_field($_POST['furnishing'] ?? '');
    
    $expected_annual_rent = sanitize_text_field($_POST['expected_annual_rent'] ?? '');
    $minimum_lease_term = sanitize_text_field($_POST['minimum_lease_term'] ?? '');
    $available_from = sanitize_text_field($_POST['available_from'] ?? '');
    $current_status = sanitize_text_field($_POST['current_status'] ?? '');
    $tenanted_until_date = sanitize_text_field($_POST['tenanted_until_date'] ?? '');
    
    $property_management_interest = sanitize_text_field($_POST['property_management_interest'] ?? '');
    $cheque_preference = sanitize_text_field($_POST['cheque_preference'] ?? '');
    $restrictions = sanitize_textarea_field($_POST['restrictions'] ?? '');
    
    $recently_renovated = sanitize_text_field($_POST['recently_renovated'] ?? '');
    $renovation_description = sanitize_textarea_field($_POST['renovation_description'] ?? '');
    $tenant_urgency = sanitize_text_field($_POST['tenant_urgency'] ?? '');
    $additional_notes = sanitize_textarea_field($_POST['additional_notes'] ?? '');
    
    // Validate required fields
    if (empty($name) || empty($phone) || empty($email)) {
        wp_send_json_error('Name, phone number, and email are required fields.');
        return;
    }
    
    // Build extraData object
    $extra_data = [];
    
    // Property details
    if (!empty($property_location)) {
        $extra_data['property_location'] = $property_location;
    }
    if (!empty($bathrooms)) {
        $extra_data['bathrooms'] = $bathrooms;
    }
    if (!empty($built_up_area)) {
        $extra_data['built_up_area'] = $built_up_area;
    }
    if (!empty($furnishing)) {
        $extra_data['furnishing'] = $furnishing;
    }
    
    // Lease expectations
    if (!empty($minimum_lease_term)) {
        $extra_data['minimum_lease_term'] = $minimum_lease_term;
    }
    if (!empty($available_from)) {
        $extra_data['available_from'] = $available_from;
    }
    if (!empty($current_status)) {
        $extra_data['current_status'] = $current_status;
        if ($current_status === 'Tenanted until [date]' && !empty($tenanted_until_date)) {
            $extra_data['tenanted_until_date'] = $tenanted_until_date;
        }
    }
    
    // Management & services
    if (!empty($property_management_interest)) {
        $extra_data['property_management_interest'] = $property_management_interest;
    }
    if (!empty($cheque_preference)) {
        $extra_data['cheque_preference'] = $cheque_preference;
    }
    if (!empty($restrictions)) {
        $extra_data['restrictions'] = $restrictions;
    }
    
    // Extras
    if (!empty($recently_renovated)) {
        $extra_data['recently_renovated'] = $recently_renovated;
        if ($recently_renovated === 'No' && !empty($renovation_description)) {
            $extra_data['renovation_description'] = $renovation_description;
        }
    }
    if (!empty($tenant_urgency)) {
        $extra_data['tenant_urgency'] = $tenant_urgency;
    }
    if (!empty($additional_notes)) {
        $extra_data['additional_notes'] = $additional_notes;
    }
    
    // Prepare API payload
    $api_data = [
        'name' => $name,
        'phone' => $phone,
        'email' => $email,
        'budget' => $expected_annual_rent,
        'bedrooms' => $bedrooms,
        'propertyType' => $property_type,
        'extraData' => $extra_data
    ];
    
    // Submit to PixxiCRM API with lease form ID
    $result = nolix_pixxicrm_api_submit($api_data, PIXXICRM_LEASE_FORM_ID);
    
    if ($result['success']) {
        wp_send_json_success($result['message']);
    } else {
        wp_send_json_error($result['message']);
    }
}

// Register AJAX handlers for lease form
add_action('wp_ajax_lease_property_submit', 'nolix_handle_lease_property_submit');
add_action('wp_ajax_nopriv_lease_property_submit', 'nolix_handle_lease_property_submit');

/**
 * AJAX Handler for Off-Plan Consultation Form Submission
 */
function nolix_handle_off_plan_consultation_submit() {
    check_ajax_referer('off_plan_consultation_submit_nonce', 'security');
    
    // Get form data
    $name = sanitize_text_field($_POST['name'] ?? '');
    $email = sanitize_email($_POST['email'] ?? '');
    $phone = sanitize_text_field($_POST['phone'] ?? '');
    $budget_range = sanitize_text_field($_POST['budget_range'] ?? '');
    $investment_goals = sanitize_textarea_field($_POST['investment_goals'] ?? '');
    
    // Validate required fields
    if (empty($name) || empty($phone) || empty($email)) {
        wp_send_json_error('Name, phone number, and email are required fields.');
        return;
    }
    
    // Build extraData object
    $extra_data = [];
    
    if (!empty($budget_range)) {
        $extra_data['Budget Range'] = $budget_range;
    }
    
    if (!empty($investment_goals)) {
        $extra_data['Investment Goals & Interested Projects'] = $investment_goals;
    }
    
    // Add form source
    $extra_data['Form Source'] = 'Off-Plan Consultation Form';
    $extra_data['Page'] = 'Off-Plan Page';
    
    // Prepare API payload
    $api_data = [
        'name' => $name,
        'phone' => $phone,
        'email' => $email,
        'extraData' => $extra_data
    ];
    
    // Submit to PixxiCRM API with off-plan consultation form ID
    $result = nolix_pixxicrm_api_submit($api_data, PIXXICRM_OFF_PLAN_CONSULTATION_FORM_ID);
    
    if ($result['success']) {
        wp_send_json_success($result['message']);
    } else {
        wp_send_json_error($result['message']);
    }
}

// Register AJAX handlers for off-plan consultation form
add_action('wp_ajax_off_plan_consultation_submit', 'nolix_handle_off_plan_consultation_submit');
add_action('wp_ajax_nopriv_off_plan_consultation_submit', 'nolix_handle_off_plan_consultation_submit');

/**
 * AJAX Handler for Contact Form Submission
 */
function nolix_handle_contact_form_submit() {
    check_ajax_referer('contact_form_submit_nonce', 'security');
    
    // Get form data
    $name = sanitize_text_field($_POST['name'] ?? '');
    $email = sanitize_email($_POST['email'] ?? '');
    $phone = sanitize_text_field($_POST['phone'] ?? '');
    $subject = sanitize_text_field($_POST['subject'] ?? '');
    $message = sanitize_textarea_field($_POST['message'] ?? '');
    
    // Validate required fields
    if (empty($name) || empty($phone) || empty($email) || empty($subject) || empty($message)) {
        wp_send_json_error('All fields are required.');
        return;
    }
    
    // Build extraData object
    $extra_data = [];
    
    if (!empty($subject)) {
        $extra_data['Subject'] = $subject;
    }
    
    if (!empty($message)) {
        $extra_data['Message'] = $message;
    }
    
    // Add form source
    $extra_data['Form Source'] = 'Contact Form';
    $extra_data['Page'] = 'Contact Page';
    
    // Prepare API payload
    $api_data = [
        'name' => $name,
        'phone' => $phone,
        'email' => $email,
        'extraData' => $extra_data
    ];
    
    // Submit to PixxiCRM API with contact form ID
    $result = nolix_pixxicrm_api_submit($api_data, PIXXICRM_CONTACT_FORM_ID);
    
    if ($result['success']) {
        wp_send_json_success($result['message']);
    } else {
        wp_send_json_error($result['message']);
    }
}

// Register AJAX handlers for contact form
add_action('wp_ajax_contact_form_submit', 'nolix_handle_contact_form_submit');
add_action('wp_ajax_nopriv_contact_form_submit', 'nolix_handle_contact_form_submit');