<?php
    if ( class_exists( 'WooCommerce' ) ) {
        // Get the global post object (for the current product page)
        global $post;

        // Create the WooCommerce product object from the post
        $product = wc_get_product( $post->ID );

        if ( $product instanceof WC_Product ) {
            // Get gallery image IDs
            $gallery_image_ids = $product->get_gallery_image_ids();
        }

        $containerClass;
        if ( ! empty( $gallery_image_ids ) ) {
            $containerClass = 'single-product-gallery-slider';
        } else {
            $containerClass = 'single-product-gallery';
        }

    }
?>

<div class="<?php echo $containerClass; ?>">
    <?php
    // Ensure WooCommerce is active
    if ( class_exists( 'WooCommerce' ) ) {
        if ( ! empty( $gallery_image_ids ) ) {
            // If gallery images exist, show the sliders
            echo '<div class="single-product-images single-product-swiper-pagination">';
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
            echo '</div>';

            echo '<div class="single-product-main-image single-product-swiper">';
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
            echo '</div>';
        } else {
            // If no gallery images, show only the featured image
            $featured_image_id = $product->get_image_id();
            if ( $featured_image_id ) {
                $featured_image_url = wp_get_attachment_image_url( $featured_image_id, 'full' );
                $featured_image_alt = get_post_meta( $featured_image_id, '_wp_attachment_image_alt', true ) ?: 'Featured Product Image';

                echo '<div class="single-product-main-image">';
                echo '<img src="' . esc_url( $featured_image_url ) . '" alt="' . esc_attr( $featured_image_alt ) . '" />';
                echo '</div>';
            }
        }
    }
    ?>
</div>
