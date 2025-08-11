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
    <button class="zoom-button">
        <svg width="24px" height="24px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M15.7955 15.8111L21 21M18 10.5C18 14.6421 14.6421 18 10.5 18C6.35786 18 3 14.6421 3 10.5C3 6.35786 6.35786 3 10.5 3C14.6421 3 18 6.35786 18 10.5Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
    </button>
    <div class="modal-wrapper hidden">
        <div class="overlay"></div>
        <div class="image-container"></div>
    </div>
</div>

<script>
    const overlay = document.querySelector('.overlay');
    const modalWrapper = document.querySelector('.modal-wrapper');

    overlay.addEventListener('click', () => {
        modalWrapper.classList.add('hidden');
    });

    document.querySelector('.zoom-button').addEventListener('click', () => {
        const mainImage = document.querySelector('.single-product-main-image img');
        const activeImage = document.querySelector('.swiper-slide-active img');
        const modalImageContainer = document.querySelector('.image-container');

        modalImageContainer.innerHTML = `<img src="${mainImage?.src ?? activeImage?.src}" alt="${mainImage?.alt ?? activeImage?.alt}" />`;
        modalWrapper.classList.remove('hidden');
    });

</script>

<style>
    .modal-wrapper.hidden {
        opacity: 0;
        z-index: -1;
    }

    .modal-wrapper {
        border: 1px solid #000;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 1000;
        transition: opacity 0.2s;
        z-index: 1000;
    }

    .overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.6);
        z-index: -1;
    }

    .image-container {
        width: 100%;
        height: 100%;
        max-width: 80vw;
        max-height: 80vh;
    }

    .images-wrapper {
        position: relative;
    }

    .zoom-button {
        position: absolute;
        bottom: 10px;
        right: 10px;
        background-color: rgba(255, 255, 255, 0.8);
        border: none;
        padding: 10px;
        cursor: pointer;
        z-index: 10;
        border-radius: 50%;
        transition: opacity 0.2s;
        opacity: 0.8
    }
    
    .zoom-button:hover {
        opacity: 1
    }

    .single-product-main-image img {
        display: block;
    }

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
        min-width: 100px;
    }

    .single-product-swiper-pagination .thumb {
        flex: 0 0 auto;
        width: 100px;
        height: 100px;
        opacity: 0.6;
        transition: opacity 0.2s;
    }

    .single-product-swiper-pagination .thumb.active {
        opacity: 1;
    }

    .single-product-swiper-pagination .thumb img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
    }

    /* Responsive ponašanje za max-width: 900px */
    @media screen and (max-width: 900px) {
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