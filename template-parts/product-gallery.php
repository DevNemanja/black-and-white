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

<div class="<?php echo esc_attr($containerClass); ?>">
    <?php if (!empty($gallery_image_ids)) : ?>
        <!-- Thumbnail Pagination Swiper -->
        <div class="single-product-swiper-pagination">

            <?php foreach ($gallery_image_ids as $image_id) :
                $image_url = wp_get_attachment_image_url($image_id, 'thumbnail');
                $image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', true) ?: 'Product Thumbnail';
            ?>
                <div class="thumb">
                    <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($image_alt); ?>" />
                </div>
            <?php endforeach; ?>

        </div>

        <!-- Main Image Swiper -->
        <div class="swiper single-product-swiper">
            <div class="swiper-wrapper">
                <?php foreach ($gallery_image_ids as $image_id) :
                    $image_url = wp_get_attachment_image_url($image_id, 'full');
                    $image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', true) ?: 'Product Image';
                ?>
                    <div class="swiper-slide">
                        <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($image_alt); ?>" />
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    <?php else : ?>
        <!-- Just the Featured Image -->
        <?php if ($featured_image_id) :
            $featured_image_url = wp_get_attachment_image_url($featured_image_id, 'full');
            $featured_image_alt = get_post_meta($featured_image_id, '_wp_attachment_image_alt', true) ?: 'Featured Image';
        ?>
            <div class="single-product-main-image">
                <img src="<?php echo esc_url($featured_image_url); ?>" alt="<?php echo esc_attr($featured_image_alt); ?>" />
            </div>
        <?php endif; ?>
    <?php endif; ?>
</div>

<style>
    .single-product-swiper {
        width: 100%;
        height: 100%;
        overflow: hidden;
    }

    .single-product-swiper-pagination {
        display: flex;
        flex-direction: column;
        flex-wrap: nowrap;
        gap: 12px;
        overflow-x: auto;
        scrollbar-width: thin;
        /* za Firefox */
    }

    .single-product-swiper-pagination .thumb {
        flex: 0 0 auto;
        width: 100px;
        height: 100px;
    }

    .single-product-swiper-pagination .thumb img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
    }

    /* Responsive ponašanje za max-width: 1240px */
    @media screen and (max-width: 1240px) {
        .single-product-swiper-pagination {
            width: 100%;
            min-height: 100px;
            max-height: 100px;
            flex-direction: row;
        }
    }

    .single-product-swiper-pagination .swiper-slide {
        opacity: 0.5;
        cursor: pointer;
        transition: opacity 0.2s;
    }

    .single-product-swiper-pagination .swiper-slide:hover {
        opacity: 1;
    }

    .single-product-swiper-pagination .swiper-slide.custom-active {
        opacity: 1;
    }

    .single-product-swiper .swiper-slide img {
        display: block;
        width: 100%;
        height: 100%;
        object-fit: cover;
        aspect-ratio: 1;
    }

    .single-product-swiper-pagination .swiper-slide img {
        display: block;
        width: 100%;
        height: 100%;
        object-fit: cover;
        aspect-ratio: 1;
    }
</style>