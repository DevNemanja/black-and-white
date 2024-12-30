<?php
/**
 * Template for Product 
 */

get_header(); ?>


<main>
    <div class="container">
        <section class="single-product-section">
            <div class="single-product-breadcrumbs-wrapper">
                <?php
                    // Display breadcrumbs on the product page
                    if ( function_exists( 'woocommerce_breadcrumb' ) ) {
                        woocommerce_breadcrumb();
                    }
                ?>

            </div>
            <div class="single-product-gallery-section">
                <?php require('template-parts/product-gallery.php'); ?>

                <div class="single-product-content-wrapper">
                    <h1><?php the_title(); ?></h1>
                    <div class="single-product-content">
                        <?php the_content(); ?>
                    </div>


                    <?php global $product;
                        $upsells = $product->get_upsell_ids(); // Get the upsell product IDs

                        if ( ! empty( $upsells ) ) {
                            echo '<div class="single-product-product-variations">';

                            foreach ( $upsells as $upsell_id ) {
                                $upsell_product = wc_get_product( $upsell_id );

                                if ( $upsell_product ) {
                                    echo '<div class="single-product-variation">';
                                    echo '<a href="' . esc_url( get_permalink( $upsell_product->get_id() ) ) . '" class="single-product-variation-link">';
                                    echo $upsell_product->get_image(); // Display the upsell product image
                                    echo '<h3>' . esc_html( $upsell_product->get_name() ) . '</h3>';
                                    echo '</a>';
                                    echo '</div>';
                                }
                            }

                            echo '</div>';
                        } else {
                            echo '';
                        }
                    ?>
                </div>
            </div>
                    
            <div class="single-product-details-section">
                <div>
                    <h3 class="single-product-details-title">GOLDEN SATIN FABRIC</h3>
                    <div>
                        <?php echo apply_filters( 'woocommerce_short_description', $product->get_short_description() ); ?>
                    </div>
                </div>
                <div>
                    <h3 class="single-product-details-title">Specifications</h3>
                    <div>
                        <?php echo apply_filters( 'woocommerce_short_description', $product->get_short_description() ); ?>
                    </div>
                </div>
            </div>
            <div>
                <?php
                    global $product;

                    $upsells = $product->get_upsell_ids(); // Get the upsell product IDs

                    if ( ! empty( $upsells ) ) {
                        echo '<div class="single-product-upsells">';
                        echo '<h2>You might also like</h2>';
                        echo '<ul class="single-product-upsell-products">';

                        foreach ( $upsells as $upsell_id ) {
                            $upsell_product = wc_get_product( $upsell_id );

                            if ( $upsell_product ) {
                                echo '<li>';
                                echo '<a href="' . esc_url( get_permalink( $upsell_product->get_id() ) ) . '">';
                                echo $upsell_product->get_image(); // Display the upsell product image
                                echo '<h3>' . esc_html( $upsell_product->get_name() ) . '</h3>';
                                echo '</a>';
                                echo '</li>';
                            }
                        }

                        echo '</ul>';
                        echo '</div>';
                    } else {
                        echo '';
                    }
                ?>
            </div>
        </section>
    </div>
</main>






<?php get_footer(); ?>
