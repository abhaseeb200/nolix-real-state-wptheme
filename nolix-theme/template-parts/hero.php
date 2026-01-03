<?php
/**
 * Template part for displaying the Hero section
 *
 * Arguments:
 * - title: Main heading
 * - subtitle: Subheading text (optional)
 * - image: Background image URL
 * - buttons: Array of buttons [['text' => '...', 'url' => '...', 'style' => 'primary|secondary']]
 */

$defaults = [
    'title' => 'Title Here',
    'subtitle' => '',
    'image' => '',
    'buttons' => []
];

$args = wp_parse_args( $args, $defaults );
?>

<section class="relative w-full h-[450px] lg:h-[500px] flex items-center justify-center text-center text-white overflow-hidden">
    <!-- Background Image -->
    <div class="absolute inset-0 z-0">
        <?php if ( $args['image'] ) : ?>
            <img src="<?php echo esc_url( $args['image'] ); ?>" alt="<?php echo esc_attr( $args['title'] ); ?>" class="w-full h-full object-cover">
        <?php endif; ?>
        <div class="absolute inset-0 bg-black/40"></div>
    </div>

    <div class="container relative z-10 px-4">
        <h1 class="font-playfair text-h1-custom mb-4 font-bold tracking-wide uppercase">
            <?php echo wp_kses_post( $args['title'] ); ?>
        </h1>
        
        <?php if ( $args['subtitle'] ) : ?>
            <p class="text-p-custom max-w-2xl mx-auto mb-8 uppercase tracking-wider text-sm md:text-base font-medium opacity-90">
                <?php echo wp_kses_post( $args['subtitle'] ); ?>
            </p>
        <?php endif; ?>

        <?php if ( ! empty( $args['buttons'] ) ) : ?>
            <div class="flex flex-col sm:flex-row justify-center gap-4 mt-8">
                <?php foreach ( $args['buttons'] as $button ) : 
                    $btn_class = 'inline-block px-8 py-3 rounded-full font-medium transition duration-300';
                    if ( isset($button['style']) && $button['style'] === 'secondary' ) {
                        $btn_class .= ' bg-white text-dark hover:bg-gray-100';
                    } else {
                        // Primary default
                        $btn_class .= ' bg-theme text-white hover:bg-opacity-90';
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
