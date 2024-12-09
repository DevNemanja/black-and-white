<?php
/**
 * Template for Product Categories
 * This template displays a single product category with its image, title, heading, description, and products.
 */

get_header(); ?>

<div class="product-category-page">
    <?php if (is_product_category()) : ?>
        <header class="category-header">
            <?php
            $category = get_queried_object();
            $thumbnail_id = get_term_meta($category->term_id, 'thumbnail_id', true);
            $image_url = wp_get_attachment_url($thumbnail_id);
            ?>
            <?php if ($image_url): ?>
                <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($category->name); ?>">
            <?php endif; ?>
            
            <h1><?php echo esc_html($category->name); ?></h1>
            <h2>Explore Products in NEMANJA <?php echo esc_html($category->name); ?></h2>
            <p><?php echo esc_html($category->description); ?></p>
        </header>
        
        <div class="products-list">
            <?php if (have_posts()) : ?>
                <?php woocommerce_product_loop_start(); ?>
                    <?php while (have_posts()) : the_post(); ?>
                        <?php wc_get_template_part('content', 'product'); ?>
                    <?php endwhile; ?>
                <?php woocommerce_product_loop_end(); ?>
            <?php else : ?>
                <p>No products found in this category.</p>
            <?php endif; ?>
        </div>
    <?php endif; ?>
</div>

<?php get_footer(); ?>
