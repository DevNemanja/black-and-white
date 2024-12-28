<?php
/**
 * Template for Product 
 */

get_header(); ?>


<main>
    <?php 


    ?>
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
                <div class="single-product-gallery">
                    <div class="single-product-images">
                        <?php
                            // Ensure WooCommerce is active
                            if ( class_exists( 'WooCommerce' ) ) {

                                // Get the global post object (for the current product page)
                                global $post;

                                // Create the WooCommerce product object from the post
                                $product = wc_get_product( $post->ID );

                                // Ensure we have a valid product object
                                if ( $product instanceof WC_Product ) {
                                    // Get gallery image IDs
                                    $gallery_image_ids = $product->get_gallery_image_ids();

                                    // Display gallery images if available
                                    if ( ! empty( $gallery_image_ids ) ) {

                                        foreach ( $gallery_image_ids as $image_id ) {
                                            // Get the image URL
                                            $image_url = wp_get_attachment_image_url( $image_id, 'full' );

                                            // Get the image alt text
                                            $image_alt = get_post_meta( $image_id, '_wp_attachment_image_alt', true ) ?: 'Product Gallery Image';

                                            // Output the image
                                            echo '<img src="' . esc_url( $image_url ) . '" alt="' . esc_attr( $image_alt ) . '" />';
                                        }

                                    } else {
                                        echo '';
                                    }
                                } else {
                                    echo '<p>Product not found.</p>';
                                }
                            }
                        ?>
                    </div>
                    <div class="single-product-main-image">
                        <?php
                            $featured_image_id = $product->get_image_id();
                            if ( $featured_image_id ) {
                                $featured_image_url = wp_get_attachment_image_url( $featured_image_id, 'full' );
                                $featured_image_alt = get_post_meta( $featured_image_id, '_wp_attachment_image_alt', true ) ?: 'Featured Product Image';
                
                                echo '<img src="' . esc_url( $featured_image_url ) . '" alt="' . esc_attr( $featured_image_alt ) . '" />';
  
                            }
                        ?>
                    </div>
                </div>
                <div class="single-product-content-wrapper">
                        <h1><?php the_title(); ?></h1>
                        <div class="single-product-content">
                            <?php the_content(); ?>
                        </div>
                            <?php
                                global $product;

                                // Check if the product is variable
                                if ( $product->is_type( 'variable' ) ) {
                                    // Get the attributes of the product (e.g., Color, Size)
                                    $attributes = $product->get_attributes();

                                    // Check if there are any attributes
                                    if ( ! empty( $attributes ) ) {
                                        // Assuming you want the first attribute (e.g., Color)
                                        $attribute_name = key( $attributes );
                                        $attribute_label = $product->get_attribute( $attribute_name );
                                        $attribute_display_name = wc_attribute_label( $attribute_name ); // Get the attribute's display name (e.g., "Color")
                                        
                                        echo '<h2 class="single-product-variable-title">' . esc_html( $attribute_display_name ) . '</h2>';
                                    }

                                    // Get variations of the variable product
                                    $available_variations = $product->get_available_variations();

                                    if ( $available_variations ) {
                                        echo '<div class="single-product-product-variations">';
                                        
                                        foreach ( $available_variations as $variation ) {
                                            $variation_id = $variation['variation_id'];
                                            $variation_product = wc_get_product( $variation_id );

                                            if ( $variation_product ) {
                                                $variation_title = $variation_product->get_name();
                                                $variation_title = str_replace( $product->get_name() . ' -', '', $variation_title );
                                                $variation_image = wp_get_attachment_image_src( $variation['image_id'], 'thumbnail' );
                                                $variation_image_url = $variation_image ? $variation_image[0] : wc_placeholder_img_src();
                                                $variation_permalink = get_permalink( $variation_id ); // Get variation permalink

                                                echo '<div class="single-product-variation">';
                                                echo '<a href="' . esc_url( $variation_permalink ) . '" class="single-product-variation-link">';
                                                echo '<img src="' . esc_url( $variation_image_url ) . '" alt="' . esc_attr( $variation_title ) . '" />';
                                                echo '<h3>' . esc_html( $variation_title ) . '</h3>';
                                                echo '</a>';
                                                echo '</div>';
                                            }
                                        }

                                        echo '</div>';
                                    } else {
                                        echo '<p>No variations available.</p>';
                                    }
                                } else {
                                    // For non-variable products, you can optionally show a message or content
                                    echo '';
                                }
                            ?>
                    </div>
            </div>
            <div class="single-product-details-section">
                <div>
                    <h3 class="single-product-details-title">GOLDEN SATIN FABRIC123</h3>
                    <div>
                        <?php echo apply_filters( 'woocommerce_short_description', $product->get_short_description() ); ?>
                    </div>
                </div>
                <div>
                    <h3 class="single-product-details-title">Specifications123</h3>
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
