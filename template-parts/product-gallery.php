<?php
if (class_exists('WooCommerce')) {
    global $post;
    $product = wc_get_product($post->ID);

    if ($product instanceof WC_Product) {
        $gallery_image_ids = $product->get_gallery_image_ids();
        $featured_image_id = $product->get_image_id();
        $containerClass = !empty($gallery_image_ids) ? 'single-product-gallery-slider' : 'single-product-gallery';
    }
}
?>

<div class="<?php echo esc_attr($containerClass); ?> images-wrapper">
    <!-- Main Image Swiper -->
    <div class="swiper single-product-swiper">
        <div class="swiper-wrapper">
            <?php foreach ($gallery_image_ids as $image_id) :
                $image_url = wp_get_attachment_image_url($image_id, 'full');
                $image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', true) ?: 'Product Image';
            ?>
                <div class="swiper-slide">
                    <img class="zoom-in" src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($image_alt); ?>" />
                </div>
            <?php endforeach; ?>
        </div>

    </div>

    <?php if (!empty($gallery_image_ids)) : ?>
        <!-- Thumbnail Pagination Swiper -->
        <div class="single-product-swiper-pagination">

            <?php foreach ($gallery_image_ids as $image_id) :
                $image_url = wp_get_attachment_image_url($image_id, 'thumbnail');
                $image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', true) ?: 'Product Thumbnail';
            ?>
                <div class="thumb<?php echo ($image_id === reset($gallery_image_ids)) ? ' active' : ''; ?>">
                    <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($image_alt); ?>" />
                </div>
            <?php endforeach; ?>

        </div>



    <?php else : ?>
        <!-- Just the Featured Image -->
        <?php if ($featured_image_id) :
            $featured_image_url = wp_get_attachment_image_url($featured_image_id, 'full');
            $featured_image_alt = get_post_meta($featured_image_id, '_wp_attachment_image_alt', true) ?: 'Featured Image';
        ?>
            <div class="single-product-main-image">
                <img class="zoom-in" src="<?php echo esc_url($featured_image_url); ?>" alt="<?php echo esc_attr($featured_image_alt); ?>" />
            </div>
        <?php endif; ?>
    <?php endif; ?>
</div>