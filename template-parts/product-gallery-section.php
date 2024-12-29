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
                        echo '</div>';
                    } else {
                        echo '';
                    }
                ?>
            </div>