<?php
/**
 * Template part for displaying property card
 */

$location = get_post_meta(get_the_ID(), '_nolix_location', true);
$price = get_post_meta(get_the_ID(), '_nolix_price', true);
$beds = get_post_meta(get_the_ID(), '_nolix_beds', true);
$baths = get_post_meta(get_the_ID(), '_nolix_baths', true);
$size = get_post_meta(get_the_ID(), '_nolix_size', true);

// Fetch parameters from API logic
$api_price = get_post_meta(get_the_ID(), 'price', true);
$api_region = get_post_meta(get_the_ID(), 'region', true);
$api_city = get_post_meta(get_the_ID(), 'cityName', true);
$api_beds = get_post_meta(get_the_ID(), 'bedRooms', true);
$api_size = get_post_meta(get_the_ID(), 'size', true);

// Extract baths from sellParam or rentParam JSON
$api_baths = '';
$sell_param_json = get_post_meta(get_the_ID(), 'sellParam', true);
$rent_param_json = get_post_meta(get_the_ID(), 'rentParam', true);

if (!empty($rent_param_json) && $rent_param_json !== 'null') {
    $param_data = json_decode(stripslashes($rent_param_json), true);
    if (!$param_data)
        $param_data = json_decode($rent_param_json, true);
    if (isset($param_data['bathrooms'])) {
        $api_baths = $param_data['bathrooms'];
    }
}
elseif (!empty($sell_param_json) && $sell_param_json !== 'null') {
    $param_data = json_decode(stripslashes($sell_param_json), true);
    if (!$param_data)
        $param_data = json_decode($sell_param_json, true);
    if (isset($param_data['bathrooms'])) {
        $api_baths = $param_data['bathrooms'];
    }
}

// Unify manually added and API fields (give API preference if present)
$price = $api_price ? 'AED ' . number_format($api_price) : $price;
$location = $api_region ? $api_region . ($api_city ? ', ' . $api_city : '') : ($api_city ? $api_city : $location);
$beds = ($api_beds !== '' && $api_beds !== false) ? $api_beds : $beds;
$baths = ($api_baths !== '' && $api_baths !== false) ? $api_baths : $baths;
$size = ($api_size !== '' && $api_size !== false) ? $api_size : $size;

// Fetch photos from API data
$photos_json = get_post_meta(get_the_ID(), 'photos', true);
$photos = json_decode($photos_json, true);

// Fallback image logic
if (!empty($photos) && is_array($photos)) {
    $thumb_url = $photos[0];
}
else if (has_post_thumbnail()) {
    $thumb_url = get_the_post_thumbnail_url(get_the_ID(), 'large');
}
else {
    $thumb_url = get_template_directory_uri() . '/assets/images/placeholder.jpg';
}
?>

<div class="group bg-white shadow-[0_0_24px_0_#00000014] rounded-lg overflow-hidden transition-all duration-300 hover:-translate-y-1 h-full block"> <!-- added h-full block to ensure consistency -->
    <div class="relative h-64 overflow-hidden">
        <img src="<?php echo esc_url($thumb_url); ?>" alt="<?php echo esc_attr(get_the_title()); ?>" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" />
        
        <?php
$status = get_post_meta(get_the_ID(), 'status', true);
if ($status === 'SOLD' || $status === 'RENTED'): ?>
            <div class="absolute top-4 left-4 bg-[#C19A5C] text-white text-[10px] font-bold px-3 py-1.5 rounded uppercase tracking-wider">
                <?php echo esc_html($status); ?>
            </div>
        <?php
endif; ?>
        <?php
// Optional: Featured Badge (logic can be added here if needed, or passed via args)
// For now, consistent with buy page
?>

        <?php if ($price): ?>
        <div class="absolute bottom-4 left-4 bg-[#FFFFFF1C] backdrop-blur-sm px-3 py-1 rounded text-white text-sm font-medium">
            <?php echo esc_html($price); ?>
        </div>
        <?php
endif; ?>
    </div>
    
    <div class="p-6 flex flex-col items-center">
        <div>
            <h3 class="text-center font-poppins text-lg font-bold mb-2 uppercase text-dark">
            <?php the_title(); ?>
        </h3>
        
        <?php if ($location): ?>
        <div class="flex items-center text-gray-500 text-sm mb-3">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1 text-theme" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
            </svg>
            <?php echo esc_html($location); ?>
        </div>
        <?php
endif; ?>

        <div class="flex justify-between w-full items-center text-sm text-gray-600 mb-6 font-medium">
            <div class="flex items-center gap-2">
                <svg class="w-5 h-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 12v6h16v-6M3 9h18M5 18v2M19 18v2" />
                </svg>
                <span><span class="font-bold text-dark"><?php echo(!empty($beds) && $beds > 0) ? esc_html($beds) : '0'; ?></span> Beds</span>
            </div>
            
            <div class="flex items-center gap-2">
                <svg class="w-5 h-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 14h18M4 14V9a3 3 0 016 0v5M14 9a3 3 0 016 0v5M6 20v-6M18 20v-6" />
                </svg>
                <span><span class="font-bold text-dark"><?php echo(!empty($baths) && $baths > 0) ? esc_html($baths) : '0'; ?></span> Baths</span>
            </div>
            
            <div class="flex items-center gap-2">
                <svg class="w-5 h-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 6h16M4 10h16M4 14h16M4 18h16M6 4v16M10 4v16M14 4v16M18 4v16" />
                </svg>
                <span><span class="font-bold text-dark"><?php echo(!empty($size) && $size > 0) ? esc_html($size) : '0'; ?></span> sqft</span>
            </div>
        </div>

        </div>

        <a href="<?php the_permalink(); ?>" class="flex items-center justify-center w-[50%] bg-theme text-white py-3 rounded-md hover:bg-opacity-90 transition duration-300 font-medium text-sm">
            View Details
        </a>
    </div>
</div>
