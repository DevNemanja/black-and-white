<?php
/**
 * Template for Product 
 */

get_header(); ?>


<main>

    <div class="container">
        <section class="single-product-section">
            <div class="single-product-gallery-section">
                <?php require('template-parts/product-gallery.php'); ?>

                <div class="single-product-content-wrapper">
                    <h1><?php the_title(); ?></h1>
                    <div class="single-product-content">
                        <?php the_content(); ?>
                    </div>


                    <?php 
                        $sirina = get_field('sirina');
                        $tezina = get_field('tezina');

                        // Display product details based on the language
                        if (get_locale() === 'sr_RS') :
                            $sirovinski_sastav = get_field('sirovinski_sastav');
                            $naziv = get_field('naziv_proizvoda');

                            if ($sirovinski_sastav || $sirina || $tezina) : ?>
                                <div class="single-product-details">
                                    <?php if ($sirovinski_sastav) : ?>
                                        <p><strong><?php _e('Sirovinski sastav', 'your-text-domain'); ?>:</strong> 
                                            <?php echo esc_html($sirovinski_sastav); ?>
                                        </p>
                                    <?php endif; ?>

                                    <?php if ($sirina) : ?>
                                        <p><strong><?php _e('Širina', 'your-text-domain'); ?>:</strong> 
                                            <?php echo esc_html($sirina); ?> cm
                                        </p>
                                    <?php endif; ?>

                                    <?php if ($tezina) : ?>
                                        <p><strong><?php _e('Težina', 'your-text-domain'); ?>:</strong> 
                                            <?php echo esc_html($tezina); ?> gr/m²
                                        </p>
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>

                        <?php else : ?>
                            <?php 
                                $sirovinski_sastav_eng = get_field('sirovinski_sastav_eng');

                                $nazivEng = get_field('naziv_proizvoda_eng');
                                
                                if ($sirovinski_sastav_eng || $sirina || $tezina) : ?>
                                <div class="single-product-details">
                                    <?php if ($sirovinski_sastav_eng) : ?>
                                        <p><stroform-info-dividerng><?php _e('Composition', 'your-text-domain'); ?>:</stroform-info-dividerng> 
                                            <?php echo esc_html($sirovinski_sastav_eng); ?>
                                        </p>
                                    <?php endif; ?>

                                    <?php if ($sirina) : ?>
                                        <p><strong><?php _e('Width', 'your-text-domain'); ?>:</strong> 
                                            <?php echo esc_html($sirina); ?> cm
                                        </p>
                                    <?php endif; ?>

                                    <?php if ($tezina) : ?>
                                        <p><strong><?php _e('Weight', 'your-text-domain'); ?>:</strong> 
                                            <?php echo esc_html($tezina); ?> gsm 
                                        </p>
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>
                        <?php endif; ?>

                </div>
            </div>
                    

<div>
    <?php
    global $product;

    $upsells = $product->get_upsell_ids(); // Get the upsell product IDs

    if ( ! empty( $upsells ) ) {
        echo '<div class="single-product-upsells">';

        if ( get_locale() === 'sr_RS' ) {
            echo '<h2>Možda će Vam se svideti</h2>';
        } else {
            echo '<h2>You might also like</h2>';
        }

        echo '<ul class="single-product-upsell-products">';

        foreach ( $upsells as $upsell_id ) {
            $upsell_product = wc_get_product( $upsell_id );

            if ( $upsell_product ) {
                $locale = get_locale();

                // Get ACF fields for the upsell product
                $sirovinski_sastav = get_field('sirovinski_sastav', $upsell_id);
                $sirovinski_sastav_eng = get_field('sirovinski_sastav_eng', $upsell_id);
                $sirina = get_field('sirina', $upsell_id);
                $tezina = get_field('tezina', $upsell_id);

                echo '<li>';
                echo '<a href="' . esc_url( get_permalink( $upsell_product->get_id() ) ) . '">';
                echo '<div class="product-image-wrapper">';
                echo $upsell_product->get_image(); // Display image

                // Output product details inside .product-image-wrapper
                if ($locale === 'sr_RS') {
                    if ($sirovinski_sastav || $sirina || $tezina) {
                        echo '<div class="product-details">';
                        if ($sirovinski_sastav) {
                            echo '<p><strong>' . __('Sirovinski sastav', 'your-text-domain') . ':</strong> ' . esc_html($sirovinski_sastav) . '</p>';
                        }
                        if ($sirina) {
                            echo '<p><strong>' . __('Širina', 'your-text-domain') . ':</strong> ' . esc_html($sirina) . ' cm</p>';
                        }
                        if ($tezina) {
                            echo '<p><strong>' . __('Težina', 'your-text-domain') . ':</strong> ' . esc_html($tezina) . ' gr/m²</p>';
                        }
                        echo '</div>';
                    }
                } else {
                    if ($sirovinski_sastav_eng || $sirina || $tezina) {
                        echo '<div class="product-details">';
                        if ($sirovinski_sastav_eng) {
                            echo '<p><strong>' . __('Composition', 'your-text-domain') . ':</strong> ' . esc_html($sirovinski_sastav_eng) . '</p>';
                        }
                        if ($sirina) {
                            echo '<p><strong>' . __('Width', 'your-text-domain') . ':</strong> ' . esc_html($sirina) . ' cm</p>';
                        }
                        if ($tezina) {
                            echo '<p><strong>' . __('Weight', 'your-text-domain') . ':</strong> ' . esc_html($tezina) . ' gsm</p>';
                        }
                        echo '</div>';
                    }
                }

                echo '</div>'; // close .product-image-wrapper
                echo '<h3>' . esc_html( $upsell_product->get_name() ) . '</h3>';

                echo '</a>';
                echo '</li>';
            }
        }

        echo '</ul>';
        echo '</div>'; // close .single-product-upsells
    }
    ?>
</div>

        </section>
    </div>
</main>






<?php get_footer(); ?>
