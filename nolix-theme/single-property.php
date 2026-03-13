<?php
/**
 * Template Name: Single Property
 * Template Post Type: property
 */

get_header();

$post_id = get_the_ID();
$title = get_the_title();

// --- Fetch all prominent fields ---
$api_price = get_post_meta($post_id, 'price', true);
$price = ($api_price !== '' && $api_price !== null) ? 'AED ' . number_format($api_price) : 'N/A';

$api_region = get_post_meta($post_id, 'region', true);
$api_city = get_post_meta($post_id, 'cityName', true);
$location = $api_region ? $api_region . ($api_city ? ', ' . $api_city : '') : 'N/A';

$status = get_post_meta($post_id, 'status', true) ?: 'N/A';
$listingType = get_post_meta($post_id, 'listingType', true) ?: 'N/A';
$description = get_post_meta($post_id, 'description', true) ?: get_the_content();
$beds = get_post_meta($post_id, 'bedRooms', true);
$size = get_post_meta($post_id, 'size', true);

// Fetch photos
$photos_json = get_post_meta($post_id, 'photos', true);
$photos = json_decode($photos_json, true) ?: [];

// --- Agent info ---
$agent_json = get_post_meta($post_id, 'agent', true);
$agent = json_decode($agent_json, true);

$portal_agent_json = get_post_meta($post_id, 'portalAgent', true);
$portal_agent = json_decode($portal_agent_json, true);

// --- Nested params ---
$rent_param_json = get_post_meta($post_id, 'rentParam', true);
$rent_param = json_decode($rent_param_json, true);

$sell_param_json = get_post_meta($post_id, 'sellParam', true);
$sell_param = json_decode($sell_param_json, true);

$new_param_json = get_post_meta($post_id, 'newParam', true);
$new_param = json_decode($new_param_json, true);

$new_param_json = get_post_meta($post_id, 'newParam', true);
$new_param = null;

if ($new_param_json) {
    // Attempt 1: direct decode
    $new_param = json_decode($new_param_json, true);

    // Attempt 2: Fix unescaped nested JSON strings in values
    if (!is_array($new_param)) {
        $fixed = preg_replace_callback(
            '/"([^"]+)":\s*"(\{[^}]+\})"/',
            function ($matches) {
            $inner_escaped = addslashes($matches[2]);
            return '"' . $matches[1] . '":"' . $inner_escaped . '"';
        },
            $new_param_json
        );
        $new_param = json_decode($fixed, true);
    }
}

$amenities_json = get_post_meta($post_id, 'amenities', true);
$amenities = json_decode($amenities_json, true) ?: [];

$property_type_json = get_post_meta($post_id, 'propertyType', true);
$property_type = json_decode($property_type_json, true) ?: [];

// Baths from nested params
$baths = null;
if (is_array($sell_param) && isset($sell_param['bathrooms'])) {
    $baths = $sell_param['bathrooms'];
}
elseif (is_array($rent_param) && isset($rent_param['bathrooms'])) {
    $baths = $rent_param['bathrooms'];
}

// Helper: output a value or N/A
function nolix_val($val)
{
    if ($val === null || $val === '' || $val === 'null' || $val === '[]')
        return 'N/A';
    return $val;
}

// Helper: format camelCase to Title Case
function nolix_format_key($key)
{
    if (empty($key))
        return '';
    $key = str_replace('_', ' ', $key);
    $key = preg_replace('/(?<!^)[A-Z]/', ' $0', $key);
    return ucwords(trim($key));
}

// Helper: truthy value check for contact fields
function nolix_has_value($val)
{
    return !($val === null || $val === '' || $val === 'null' || $val === '[]' || $val === 'N/A');
}

// Helper: first non-empty value from an array of keys
function nolix_get_agent_value($arr, $keys)
{
    if (!is_array($arr))
        return null;
    foreach ($keys as $key) {
        if (isset($arr[$key]) && nolix_has_value($arr[$key]))
            return $arr[$key];
    }
    return null;
}

// Helper: clean phone numbers for links
function nolix_clean_phone_tel($val)
{
    return preg_replace('/[^0-9+]/', '', (string) $val);
}

function nolix_clean_phone_wa($val)
{
    return preg_replace('/[^0-9]/', '', (string) $val);
}

// Contact data for agent and portal agent
$agent_email = nolix_get_agent_value($agent, ['email', 'emailAddress', 'email_address']);
$agent_phone = nolix_get_agent_value($agent, ['phone', 'phoneNumber', 'mobile', 'mobilePhone', 'cell', 'telephone']);
$agent_whatsapp = nolix_get_agent_value($agent, ['whatsapp', 'whatsApp', 'wa', 'whatsappNumber']);
$agent_whatsapp = $agent_whatsapp ?: $agent_phone;

$portal_email = nolix_get_agent_value($portal_agent, ['email', 'emailAddress', 'email_address']);
$portal_phone = nolix_get_agent_value($portal_agent, ['phone', 'phoneNumber', 'mobile', 'mobilePhone', 'cell', 'telephone']);
$portal_whatsapp = nolix_get_agent_value($portal_agent, ['whatsapp', 'whatsApp', 'wa', 'whatsappNumber']);
$portal_whatsapp = $portal_whatsapp ?: $portal_phone;

// --- Build the "All Details" table from ALL post meta ---
$all_meta = get_post_meta($post_id);

// Keys shown prominently elsewhere or internal WordPress keys
$exclude_keys = [
    '_edit_lock', '_edit_last', '_thumbnail_id', '_pixxi_api_id', '_wp_old_date',
    'photos', 'description', 'agent', 'portalAgent', 'rentParam', 'sellParam', 'newParam',
    'amenities', 'propertyType', 'price', 'region', 'cityName', 'status',
    'listingType', 'size', 'bedRooms', 'title', 'name', 'developerLogo',
    '_nolix_price', '_nolix_location', '_nolix_size', '_nolix_beds', '_nolix_baths', '_nolix_type'
];

// Keys whose values are image URLs and should render as <img> tags
$image_keys = ['developerLogo', 'avatar', 'originalAvatar'];

$details_rows = [];
foreach ($all_meta as $key => $values) {
    // Skip internal WP keys (start with _) and our excluded list
    if (strpos($key, '_') === 0)
        continue;
    if (in_array($key, $exclude_keys))
        continue;

    $val = $values[0];

    // Try to decode JSON
    $decoded = json_decode($val, true);
    if (!$decoded)
        $decoded = json_decode(stripslashes($val), true);

    if (is_array($decoded)) {
        foreach ($decoded as $sub_key => $sub_val) {
            if (is_array($sub_val)) {
                $details_rows[nolix_format_key($sub_key)] = !empty($sub_val) ? implode(', ', $sub_val) : 'N/A';
            }
            else {
                $details_rows[nolix_format_key($sub_key)] = nolix_val($sub_val);
            }
        }
    }
    else {
        $details_rows[nolix_format_key($key)] = nolix_val($val);
    }
}
?>

<div class="bg-[#F5F6FA] min-h-screen py-12 font-poppins text-dark">
    <div class="container mx-auto sm:px-6 px-4">
        <!-- Breadcrumbs & Status -->
        <div class="flex flex-wrap items-center justify-between mb-6 gap-4">
            <div class="text-sm text-gray-500">
                <a href="<?php echo home_url('/'); ?>" class="hover:text-theme transition">Home</a>
                <span class="mx-2">/</span>
                <a href="<?php echo home_url('/properties'); ?>" class="hover:text-theme transition">Properties</a>
                <span class="mx-2">/</span>
                <span class="text-dark font-medium"><?php echo esc_html($title); ?></span>
            </div>
            <div class="flex gap-3">
                <span class="bg-gray-800 text-white text-xs px-3 py-1 font-bold rounded tracking-wider uppercase"><?php echo esc_html($listingType); ?></span>
                <?php if ($status === 'SOLD' || $status === 'RENTED'): ?>
                    <span class="bg-[#C19A5C] text-white text-xs px-3 py-1 font-bold rounded tracking-wider uppercase"><?php echo esc_html($status); ?></span>
                <?php
elseif ($status === 'ACTIVE'): ?>
                    <span class="bg-green-600 text-white text-xs px-3 py-1 font-bold rounded tracking-wider uppercase">Active</span>
                <?php
else: ?>
                    <span class="bg-gray-500 text-white text-xs px-3 py-1 font-bold rounded tracking-wider uppercase"><?php echo esc_html($status); ?></span>
                <?php
endif; ?>
            </div>
        </div>

        <!-- Property Header -->
        <div class="flex flex-col md:flex-row justify-between sm:mb-8 mb-4 gap-4">
            <div>
                <h1 class="font-[poppins!important] text-3xl md:text-5xl font-bold font-playfair mb-3 text-dark"><?php echo esc_html($title); ?></h1>
                <div class="flex items-center text-gray-500 text-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-theme" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    <?php echo esc_html($location); ?>
                </div>
            </div>
            <div class="sm:w-[365px] text-end text-3xl md:text-5xl font-bold text-dark font-poppins">
                <?php echo esc_html($price); ?>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 sm:gap-10 gap-4">
            <!-- Main Content (Left 2/3) -->
            <div class="lg:col-span-2 sm:space-y-10 space-y-4">

                <!-- Photo Gallery (Swiper) -->
                <style>
                    .property-gallery { width: 100%; }
                    .property-gallery .gallery-slider { width: 100%; margin: 0 0 10px 0; border-radius: 12px; overflow: hidden; }
                    .property-gallery .gallery-slider .swiper-slide { height: 500px; }
                    .property-gallery .gallery-slider .swiper-slide img { display: block; width: 100%; height: 100%; object-fit: cover; }
                    .property-gallery .gallery-slider .swiper-button-prev,
                    .property-gallery .gallery-slider .swiper-button-next {
                        color: #fff;
                        background: rgba(0,0,0,0.35);
                        width: 44px; height: 44px;
                        border-radius: 50%;
                        transition: background 0.3s;
                    }
                    .property-gallery .gallery-slider .swiper-button-prev:hover,
                    .property-gallery .gallery-slider .swiper-button-next:hover { background: rgba(193,154,92,0.85); }
                    .property-gallery .gallery-slider .swiper-button-prev::after,
                    .property-gallery .gallery-slider .swiper-button-next::after { font-size: 18px; }
                    .property-gallery .gallery-thumbs { width: 100%; overflow: hidden; border-radius: 0 0 12px 12px; }
                    .property-gallery .gallery-thumbs .swiper-slide {
                        height: 90px;
                        border-radius: 8px; overflow: hidden;
                        opacity: 0.4; cursor: pointer;
                        transition: opacity 0.3s, border-color 0.3s;
                        border: 2px solid transparent;
                    }
                    .property-gallery .gallery-thumbs .swiper-slide-thumb-active { opacity: 1; border-color: #C19A5C; }
                    .property-gallery .gallery-thumbs .swiper-slide img { width: 100%; height: 100%; object-fit: cover; display: block; }
                    @media (max-width: 768px) {
                        .property-gallery .gallery-slider .swiper-slide { height: 300px; }
                        .property-gallery .gallery-thumbs .swiper-slide { height: 60px; }
                    }
                </style>

                <?php if (!empty($photos)): ?>
                <div class="property-gallery mt-[0!important] shadow-lg border border-[#C8CCD9]/50 rounded-xl bg-white overflow-hidden">
                    <!-- Main Slider -->
                    <div class="swiper gallery-slider">
                        <div class="swiper-wrapper">
                            <?php foreach ($photos as $index => $photo): ?>
                            <div class="swiper-slide">
                                <img src="<?php echo esc_url($photo); ?>" alt="<?php echo esc_attr($title); ?> - Photo <?php echo($index + 1); ?>" />
                            </div>
                            <?php
    endforeach; ?>
                        </div>
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-button-next"></div>
                    </div>

                    <!-- Thumbnail Slider -->
                    <?php if (count($photos) > 1): ?>
                    <div class="swiper gallery-thumbs p-2 bg-gray-50">
                        <div class="swiper-wrapper">
                            <?php foreach ($photos as $index => $photo): ?>
                            <div class="swiper-slide">
                                <img src="<?php echo esc_url($photo); ?>" alt="Thumb <?php echo($index + 1); ?>" />
                            </div>
                            <?php
        endforeach; ?>
                        </div>
                    </div>
                    <?php
    endif; ?>
                </div>

                <script>
                document.addEventListener('DOMContentLoaded', function() {
                    // Initialize thumbs first
                    var galleryThumbs = new Swiper('.gallery-thumbs', {
                        spaceBetween: 10,
                        slidesPerView: 5,
                        watchSlidesProgress: true,
                        breakpoints: {
                            0:   { slidesPerView: 4 },
                            768: { slidesPerView: 5 },
                            1024:{ slidesPerView: 6 },
                        },
                    });

                    // Then initialize main slider with thumbs reference
                    var gallerySlider = new Swiper('.gallery-slider', {
                        slidesPerView: 1,
                        loop: true,
                        navigation: {
                            nextEl: '.swiper-button-next',
                            prevEl: '.swiper-button-prev',
                        },
                        thumbs: {
                            swiper: galleryThumbs,
                        },
                    });
                });
                </script>
                <?php
else: ?>
                <div class="rounded-xl overflow-hidden shadow-lg border border-[#C8CCD9]/50 sm:h-[500px] h-[300px]">
                    <img src="<?php echo get_template_directory_uri() . '/assets/images/placeholder.jpg'; ?>" alt="Placeholder" class="w-full h-full object-cover" />
                </div>
                <?php
endif; ?>

                <!-- Core Features Ribbon -->
                <div class="flex flex-wrap sm:flex-row flex-col sm:items-center sm:gap-0 gap-3 items-start justify-between p-6 bg-white rounded-xl shadow border border-[#C8CCD9]/50">
                    <div class="flex items-center gap-3">
                        <div class="p-3 bg-gray-50 rounded-lg text-theme">
                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 12v6h16v-6M3 9h18M5 18v2M19 18v2" /></svg>
                        </div>
                        <div>
                            <div class="text-xs text-gray-500 uppercase tracking-wide">Bedrooms</div>
                            <div class="text-xl font-bold"><?php echo($beds !== '' && $beds !== null && $beds !== false) ? esc_html($beds) : 'N/A'; ?></div>
                        </div>
                    </div>
                    <div class="w-px h-12 bg-gray-200 hidden md:block"></div>
                    <div class="flex items-center gap-3">
                        <div class="p-3 bg-gray-50 rounded-lg text-theme">
                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 14h18M4 14V9a3 3 0 016 0v5M14 9a3 3 0 016 0v5M6 20v-6M18 20v-6" /></svg>
                        </div>
                        <div>
                            <div class="text-xs text-gray-500 uppercase tracking-wide">Bathrooms</div>
                            <div class="text-xl font-bold"><?php echo($baths !== '' && $baths !== null) ? esc_html($baths) : 'N/A'; ?></div>
                        </div>
                    </div>
                    <div class="w-px h-12 bg-gray-200 hidden md:block"></div>
                    <div class="flex items-center gap-3">
                        <div class="p-3 bg-gray-50 rounded-lg text-theme">
                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 6h16M4 10h16M4 14h16M4 18h16M6 4v16M10 4v16M14 4v16M18 4v16" /></svg>
                        </div>
                        <div>
                            <div class="text-xs text-gray-500 uppercase tracking-wide">Area (sqft)</div>
                            <div class="text-xl font-bold"><?php echo($size !== '' && $size !== null && $size !== false) ? esc_html(number_format($size)) : 'N/A'; ?></div>
                        </div>
                    </div>
                </div>

                <!-- Description -->
                <div class="bg-white p-8 rounded-xl shadow border border-[#C8CCD9]/50">
                    <h2 class="text-2xl font-playfair font-bold text-dark mb-6">Property Description</h2>
                    <div class="prose max-w-none text-gray-600 leading-relaxed whitespace-pre-line">
                        <?php echo $description ? nl2br(esc_html($description)) : '<span class="text-gray-400">N/A</span>'; ?>
                    </div>
                </div>



                <!-- Sell Parameters (if SELL listing) -->
                <?php if (is_array($sell_param)): ?>
                <div class="bg-white p-8 rounded-xl shadow border border-[#C8CCD9]/50">
                    <h2 class="text-2xl font-playfair font-bold text-dark mb-6">Sell Parameters</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <?php foreach ($sell_param as $sp_key => $sp_val): ?>
                        <div class="flex justify-between gap-2 border-b border-gray-100 pb-3">
                            <span class="text-gray-500 text-sm font-medium"><?php echo esc_html(nolix_format_key($sp_key)); ?></span>
                            <span class="text-dark font-bold text-sm truncate "><?php echo esc_html(nolix_val($sp_val)); ?></span>
                        </div>
                        <?php
    endforeach; ?>
                    </div>
                </div>
                <?php
endif; ?>

                <!-- Rent Parameters (if RENT listing) -->
                <?php if (is_array($rent_param)): ?>
                <div class="bg-white p-8 rounded-xl shadow border border-[#C8CCD9]/50">
                    <h2 class="text-2xl font-playfair font-bold text-dark mb-6">Rent Parameters</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <?php foreach ($rent_param as $rp_key => $rp_val): ?>
                        <div class="flex justify-between border-b border-gray-100 pb-3 gap-2">
                            <span class="text-gray-500 text-sm font-medium"><?php echo esc_html(nolix_format_key($rp_key)); ?></span>
                            <span class="text-dark font-bold text-sm truncate "><?php echo esc_html(nolix_val($rp_val)); ?></span>
                        </div>
                        <?php
    endforeach; ?>
                    </div>
                </div>
                <?php
endif; ?>

                <!-- New / Off-Plan Parameters -->
                <?php if (is_array($new_param)): ?>
                <div class="bg-white p-8 rounded-xl shadow border border-[#C8CCD9]/50">
                    <h2 class="text-2xl font-playfair font-bold text-dark mb-6">Off<span class="font-poppins"> - </span>Plan <span class="font-poppins"> / </span> New Parameters</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <?php
    // Separate floorPlan for special rendering
    $floor_plan = isset($new_param['floorPlan']) ? $new_param['floorPlan'] : null;
    foreach ($new_param as $np_key => $np_val):
        if ($np_key === 'floorPlan')
            continue;

        // paymentPlan is a JSON string inside the JSON
        if ($np_key === 'paymentPlan' && is_string($np_val)) {
            $pp_decoded = json_decode($np_val, true);
            if (is_array($pp_decoded)) {
                $pp_labels = ['one' => 'Down Payment', 'two' => 'During Construction', 'three' => 'On Handover', 'four' => 'Post Handover'];
                foreach ($pp_decoded as $pp_key => $pp_amount):
                    if (empty($pp_amount) || $pp_amount === '0' || $pp_amount === 0)
                        continue;
                    $pp_label = isset($pp_labels[$pp_key]) ? $pp_labels[$pp_key] : nolix_format_key($pp_key);
?>
                                    <div class="flex justify-between border-b border-gray-100 pb-3 gap-2">
                                        <span class="text-gray-500 text-sm font-medium"><?php echo esc_html($pp_label); ?></span>
                                        <span class="text-dark font-bold text-sm truncate "><?php echo esc_html($pp_amount); ?>%</span>
                                    </div>
                                    <?php
                endforeach;
                continue;
            }
        }
?>
                        <div class="flex justify-between border-b border-gray-100 pb-3 gap-2">
                            <span class="text-gray-500 text-sm font-medium"><?php echo esc_html(nolix_format_key($np_key)); ?></span>
                            <span class="text-dark font-bold text-sm truncate "><?php echo esc_html(nolix_val($np_val)); ?></span>
                        </div>
                        <?php
    endforeach; ?>
                    </div>

                    <?php if (is_array($floor_plan) && !empty($floor_plan)): ?>
                    <h3 class="text-lg font-bold text-dark mt-8 mb-4">Floor Plans</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <?php foreach ($floor_plan as $fp): ?>
                        <div class="border border-gray-200 rounded-xl overflow-hidden">
                            <?php if (!empty($fp['imgUrl']) && is_array($fp['imgUrl'])): ?>
                            <img src="<?php echo esc_url($fp['imgUrl'][0]); ?>" alt="<?php echo esc_attr($fp['name'] ?? 'Floor Plan'); ?>" class="w-full h-48 object-contain" />
                            <?php
            endif; ?>
                            <div class="p-4 space-y-2">
                                <div class="font-bold text-dark"><?php echo esc_html(nolix_val($fp['name'] ?? null)); ?></div>
                                <?php if (!empty($fp['price'])): ?>
                                <div class="text-sm text-gray-500">Price: <span class="font-bold text-dark">AED <?php echo esc_html(number_format($fp['price'])); ?></span></div>
                                <?php
            endif; ?>
                                <?php if (!empty($fp['area'])): ?>
                                <div class="text-sm text-gray-500">Area: <span class="font-bold text-dark"><?php echo esc_html(number_format($fp['area'])); ?> sqft</span></div>
                                <?php
            endif; ?>
                            </div>
                        </div>
                        <?php
        endforeach; ?>
                    </div>
                    <?php
    endif; ?>
                </div>
                <?php
endif; ?>

                <!-- All Details -->
                <div class="bg-white p-8 rounded-xl shadow border border-[#C8CCD9]/50">
                    <h2 class="text-2xl font-playfair font-bold text-dark mb-6">All Details</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <?php if (!empty($details_rows)): ?>
                            <?php foreach ($details_rows as $label => $value): ?>
                            <div class="flex justify-between border-b border-gray-100 pb-3 gap-2">
                                <span class="text-gray-500 text-sm font-medium"><?php echo esc_html($label); ?></span>
                                <?php
        // Check if the value looks like an image URL
        $is_image_url = (strpos($value, 'http') === 0 && preg_match('/\.(jpg|jpeg|png|gif|svg|webp)/i', $value));
        if ($is_image_url): ?>
                                    <img src="<?php echo esc_url($value); ?>" alt="<?php echo esc_attr($label); ?>" class="h-10 w-auto object-contain rounded" />
                                <?php
        else: ?>
                                    <span class="text-dark font-bold text-sm truncate  text-right"><?php echo esc_html($value); ?></span>
                                <?php
        endif; ?>
                            </div>
                            <?php
    endforeach; ?>
                        <?php
else: ?>
                            <p class="text-gray-400 col-span-2">No additional details available.</p>
                        <?php
endif; ?>
                    </div>
                </div>

            </div>

            <!-- Sidebar (Right 1/3) -->
            <div class="sm:space-y-8 space-y-4">

                <!-- Agent Card -->
                <div class="bg-white p-8 rounded-xl shadow border border-theme/20 border-t-4 border-t-theme">
                    <h2 class="text-2xl font-playfair font-bold text-dark mb-6">Agent</h2>
                    <?php if (is_array($agent) && !empty($agent)): ?>
                    <div class="flex items-center gap-4 mb-6">
                        <?php if (!empty($agent['avatar'])): ?>
                            <img src="<?php echo esc_url($agent['avatar']); ?>" alt="<?php echo esc_attr($agent['name'] ?? ''); ?>" class="w-16 h-16 rounded-full object-cover border-2 border-theme" />
                        <?php
    else: ?>
                            <div class="w-16 h-16 rounded-full bg-gray-200 flex items-center justify-center text-gray-400 text-2xl font-bold">?</div>
                        <?php
    endif; ?>
                        <div>
                            <div class="font-bold text-dark text-lg"><?php echo esc_html(nolix_val($agent['name'] ?? null)); ?></div>
                        </div>
                    </div>
                    <div class="space-y-3">
                        <?php foreach ($agent as $a_key => $a_val):
        if (in_array($a_key, ['avatar', 'originalAvatar', 'email', 'emailAddress', 'email_address', 'phone', 'phoneNumber', 'mobile', 'mobilePhone', 'cell', 'telephone', 'whatsapp', 'whatsApp', 'wa', 'whatsappNumber']))
            continue; ?>
                        <div class="flex justify-between gap-4 border-b border-gray-100 pb-2 last:border-0">
                            <span class="text-gray-500 text-sm"><?php echo esc_html(nolix_format_key($a_key)); ?></span>
                            <span class="text-dark font-bold text-sm truncate  text-right"><?php echo esc_html(nolix_val($a_val)); ?></span>
                        </div>
                        <?php
    endforeach; ?>
                    </div>
                    <?php
    $agent_email_link = $agent_email ? 'mailto:' . antispambot($agent_email) : null;
    $agent_phone_tel = $agent_phone ? nolix_clean_phone_tel($agent_phone) : '';
    $agent_phone_link = $agent_phone_tel ? 'tel:' . $agent_phone_tel : null;
    $agent_wa = $agent_whatsapp ? nolix_clean_phone_wa($agent_whatsapp) : '';
    $agent_wa_link = $agent_wa ? 'https://wa.me/' . $agent_wa : null;
    ?>
                    <?php if ($agent_email_link || $agent_phone_link || $agent_wa_link): ?>
                    <div class="mt-6 flex flex-wrap gap-3">
                        <?php if ($agent_email_link): ?>
                        <a href="<?php echo esc_url($agent_email_link); ?>" class="inline-flex items-center justify-center gap-2 px-4 py-2 rounded-lg text-sm font-semibold bg-blue-600 text-white hover:bg-blue-700 transition flex-1 " aria-label="Email agent">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6" d="M3 7.5A2.5 2.5 0 015.5 5h13A2.5 2.5 0 0121 7.5v9A2.5 2.5 0 0118.5 19h-13A2.5 2.5 0 013 16.5v-9z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6" d="M21 7l-9 6-9-6"/></svg>
                            <span>Email</span>
                        </a>
                        <?php
        endif; ?>
                        <?php if ($agent_phone_link): ?>
                        <a href="<?php echo esc_url($agent_phone_link); ?>" class="inline-flex items-center justify-center gap-2 px-4 py-2 rounded-lg text-sm font-semibold bg-theme text-white hover:bg-[#9B7E3F] transition flex-1 " aria-label="Call agent">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" /></svg>
                            <span>Call</span>
                        </a>
                        <?php
        endif; ?>
                        <?php if ($agent_wa_link): ?>
                        <a href="<?php echo esc_url($agent_wa_link); ?>" target="_blank" rel="noopener" class="inline-flex items-center justify-center gap-2 px-4 py-2 rounded-lg text-sm font-semibold bg-green-600 text-white hover:bg-green-700 transition flex-1 " aria-label="WhatsApp agent">
                            <svg class="w-4 h-4" viewBox="0 0 448 512" fill="currentColor" aria-hidden="true"><path d="M380.9 97.1C339 55.1 283.2 32 224.1 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 222-99.6 222-222 0-59.3-25.2-115-67.1-157zM224.1 438.7c-33.4 0-66.2-9-94.8-26l-6.8-4-69.8 18.3 18.6-68.1-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54s56.2 81.1 56.2 130.4c0 101.8-82.8 184.6-184.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.5-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66.2-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7.9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.5-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.2 59.9 95 84 13.3 5.7 23.7 9.1 31.8 11.6 13.4 4.3 25.6 3.7 35.2 2.3 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z"/></svg>
                            <span>WhatsApp</span>
                        </a>
                        <?php
        endif; ?>
                    </div>
                    <?php
    endif; ?>
                    <?php
else: ?>
                        <p class="text-gray-400">N/A</p>
                    <?php
endif; ?>
                </div>

                <!-- Portal Agent Card -->
                <div class="bg-white p-8 rounded-xl shadow border border-[#C8CCD9]/50">
                    <h2 class="text-2xl font-playfair font-bold text-dark mb-6">Portal Agent</h2>
                    <?php if (is_array($portal_agent) && !empty($portal_agent)): ?>
                    <div class="space-y-3">
                        <?php foreach ($portal_agent as $pa_key => $pa_val):
        if (in_array($pa_key, ['avatar', 'originalAvatar', 'email', 'emailAddress', 'email_address', 'phone', 'phoneNumber', 'mobile', 'mobilePhone', 'cell', 'telephone', 'whatsapp', 'whatsApp', 'wa', 'whatsappNumber']))
            continue; ?>
                        <div class="flex justify-between gap-4 border-b border-gray-100 pb-2 last:border-0">
                            <span class="text-gray-500 text-sm"><?php echo esc_html(nolix_format_key($pa_key)); ?></span>
                            <span class="text-dark font-bold text-sm truncate  text-right"><?php echo esc_html(nolix_val($pa_val)); ?></span>
                        </div>
                        <?php
    endforeach; ?>
                    </div>
                    <?php
    $portal_email_link = $portal_email ? 'mailto:' . antispambot($portal_email) : null;
    $portal_phone_tel = $portal_phone ? nolix_clean_phone_tel($portal_phone) : '';
    $portal_phone_link = $portal_phone_tel ? 'tel:' . $portal_phone_tel : null;
    $portal_wa = $portal_whatsapp ? nolix_clean_phone_wa($portal_whatsapp) : '';
    $portal_wa_link = $portal_wa ? 'https://wa.me/' . $portal_wa : null;
    ?>
                    <?php if ($portal_email_link || $portal_phone_link || $portal_wa_link): ?>
                    <div class="mt-6 flex flex-wrap gap-3">
                        <?php if ($portal_email_link): ?>
                        <a href="<?php echo esc_url($portal_email_link); ?>" class="inline-flex items-center justify-center gap-2 px-4 py-2 rounded-lg text-sm font-semibold bg-blue-600 text-white hover:bg-blue-700 transition flex-1 " aria-label="Email portal agent">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6" d="M3 7.5A2.5 2.5 0 015.5 5h13A2.5 2.5 0 0121 7.5v9A2.5 2.5 0 0118.5 19h-13A2.5 2.5 0 013 16.5v-9z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6" d="M21 7l-9 6-9-6"/></svg>
                            <span>Email</span>
                        </a>
                        <?php
        endif; ?>
                        <?php if ($portal_phone_link): ?>
                        <a href="<?php echo esc_url($portal_phone_link); ?>" class="inline-flex items-center justify-center gap-2 px-4 py-2 rounded-lg text-sm font-semibold bg-theme text-white hover:bg-[#9B7E3F] transition flex-1 " aria-label="Call portal agent">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" /></svg>
                            <span>Call</span>
                        </a>
                        <?php
        endif; ?>
                        <?php if ($portal_wa_link): ?>
                        <a href="<?php echo esc_url($portal_wa_link); ?>" target="_blank" rel="noopener" class="inline-flex items-center justify-center gap-2 px-4 py-2 rounded-lg text-sm font-semibold bg-green-600 text-white hover:bg-green-700 transition flex-1 " aria-label="WhatsApp portal agent">
                            <svg class="w-4 h-4" viewBox="0 0 448 512" fill="currentColor" aria-hidden="true"><path d="M380.9 97.1C339 55.1 283.2 32 224.1 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 222-99.6 222-222 0-59.3-25.2-115-67.1-157zM224.1 438.7c-33.4 0-66.2-9-94.8-26l-6.8-4-69.8 18.3 18.6-68.1-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54s56.2 81.1 56.2 130.4c0 101.8-82.8 184.6-184.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.5-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66.2-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7.9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.5-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.2 59.9 95 84 13.3 5.7 23.7 9.1 31.8 11.6 13.4 4.3 25.6 3.7 35.2 2.3 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z"/></svg>
                            <span>WhatsApp</span>
                        </a>
                        <?php
        endif; ?>
                    </div>
                    <?php
    endif; ?>
                    <?php
else: ?>
                        <p class="text-gray-400">N/A</p>
                    <?php
endif; ?>
                </div>

                <!-- Property Type & Amenities -->
                <div class="bg-white p-8 rounded-xl shadow border border-[#C8CCD9]/50">
                    <h2 class="text-2xl font-playfair font-bold text-dark mb-6">Property Type <span class="font-poppins">&</span> Amenities</h2>
                    <div class="mb-6">
                        <span class="text-gray-500 text-sm font-medium">Property Type:</span>
                        <span class="ml-2 font-bold text-dark"><?php echo !empty($property_type) ? esc_html(implode(', ', $property_type)) : 'N/A'; ?></span>
                    </div>
                    <div>
                        <span class="text-gray-500 text-sm font-medium">Amenities:</span>
                        <?php if (!empty($amenities)): ?>
                            <div class="flex flex-wrap gap-2 mt-2">
                                <?php foreach ($amenities as $amenity): ?>
                                    <span class="bg-gray-100 text-dark text-sm px-3 py-1 rounded-full"><?php echo esc_html($amenity); ?></span>
                                <?php
    endforeach; ?>
                            </div>
                        <?php
else: ?>
                            <span class="ml-2 font-bold text-dark">N/A</span>
                        <?php
endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>
