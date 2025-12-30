<?php
/**
 * Template part for displaying the CTA section
 *
 * Arguments:
 * - title: Heading
 * - text: Description text
 * - buttons: Array of buttons [['text' => '...', 'url' => '...', 'style' => 'gradient|white']]
 * - image: Background image URL
 */

$defaults = [
    'title' => 'Ready to Sell Your Property?',
    'text' => 'Get a complimentary property valuation and discover how we can maximize your property\'s potential.',
    'image' => get_template_directory_uri() . '/assets/images/pexels-a-darmel-7642000.jpg', // Fallback or placeholder
    'buttons' => [
        [
            'text' => 'Get Free Valuation ↗',
            'url' => '#',
            'style' => 'gradient'
        ],
        [
            'text' => 'Schedule a Call ↗',
            'url' => '#',
            'style' => 'white'
        ]
    ]
];

$args = wp_parse_args( $args, $defaults );
?>

<section class="relative py-32 flex items-center justify-center">
    <!-- Background Image Parallax Effect -->
    <div class="absolute inset-0 z-0">
        <?php if ( $args['image'] ) : ?>
            <img src="<?php echo esc_url( $args['image'] ); ?>" alt="Background" class="w-full h-full object-cover">
        <?php endif; ?>
        <div class="absolute inset-0 bg-black/60 mix-blend-multiply"></div>
    </div>

    <div class="container relative z-10 text-center text-white">
        <h2 class="font-playfair tracking-wider text-h2-custom font-bold mb-6">
            <?php echo wp_kses_post( $args['title'] ); ?>
        </h2>
        <p class="text-[#C8CCD9] md:text-[16px] text-sm mx-auto mb-10">
            <?php echo wp_kses_post( $args['text'] ); ?>
        </p>

        <?php if ( ! empty( $args['buttons'] ) ) : ?>
            <div class="flex items-center mt-5 flex-col md:flex-row gap-4 justify-center">
                <?php foreach ( $args['buttons'] as $button ) : 
                     $btn_class = 'capitalize inline-block px-5 py-4 rounded-lg transition duration-300 font-medium tracking-wider';
                     if ( isset($button['style']) && $button['style'] === 'white' ) {
                         $btn_class .= ' bg-white text-black hover:bg-white/90 hover:text-navy';
                     } else {
                         // gradient default
                         $btn_class .= ' bg-[linear-gradient(90deg,#D4AF37_0%,#B8860B_100%)] text-white hover:bg-white hover:text-navy uppercase';
                     }
                ?>
                    <a href="<?php echo esc_url( $button['url'] ); ?>" class="<?php echo esc_attr( $btn_class ); ?>">
                        <?php echo esc_html( $button['text'] ); ?>
                    </a>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>
