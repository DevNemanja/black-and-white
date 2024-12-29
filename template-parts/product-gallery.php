<div class="single-product-gallery">
    <div class="single-product-images single-product-swiper-pagination">
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
                        echo '<div class="swiper-wrapper">';
                        foreach ( $gallery_image_ids as $image_id ) {
                            // Get the image URL
                            $image_url = wp_get_attachment_image_url( $image_id, 'full' );

                            // Get the image alt text
                            $image_alt = get_post_meta( $image_id, '_wp_attachment_image_alt', true ) ?: 'Product Gallery Image';

                            // Output the image
                            echo '<div class="swiper-slide">';
                                echo '<img src="' . esc_url( $image_url ) . '" alt="' . esc_attr( $image_alt ) . '" />';
                            echo '</div>';
                        }
                        echo '</div>';

                    } else {
                        echo '';
                    }
                } else {
                    echo '<p>Product not found.</p>';
                }
            }
        ?>
    </div>
    <div class="single-product-main-image single-product-swiper">


        <!-- Additional required wrapper -->
        <div class="swiper-wrapper">
            <!-- Slides -->
             <?php
                foreach ( $gallery_image_ids as $image_id ) {
                    // Get the image URL
                    $image_url = wp_get_attachment_image_url( $image_id, 'full' );

                    // Get the image alt text
                    $image_alt = get_post_meta( $image_id, '_wp_attachment_image_alt', true ) ?: 'Product Gallery Image';
            ?>
                <div class="swiper-slide"><?php echo '<img src="' . esc_url( $image_url ) . '" alt="' . esc_attr( $image_alt ) . '" />'; ?></div>
            <?php
                }             
             ?>
            

        </div>

        
    </div>
</div>

<!-- FEATURED IMAGE PRINT -->
<!-- <?php
            $featured_image_id = $product->get_image_id();
            if ( $featured_image_id ) {
                $featured_image_url = wp_get_attachment_image_url( $featured_image_id, 'full' );
                $featured_image_alt = get_post_meta( $featured_image_id, '_wp_attachment_image_alt', true ) ?: 'Featured Product Image';

                echo '<img src="' . esc_url( $featured_image_url ) . '" alt="' . esc_attr( $featured_image_alt ) . '" />';

            }
        ?> -->