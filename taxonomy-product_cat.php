<?php
/**
 * Template for Product Categories
 * This template displays a single product category with its image, title, heading, description, and products.
 */

get_header(); ?>


<main class="site-main">
    <?php 
        $term = get_queried_object();

        $naslov = get_field('naslov', $term);
        $podnaslov = get_field('podnaslov', $term);
        $naslovna_slika = get_field('slika', $term);
        $is_small = TRUE;

        $title = get_field('sekundarni_naslov', $term);
        $text = get_field('opis_ispod_sekundarnog_naslova', $term);

        require('template-parts/hero.php'); 
        require('template-parts/centered-content.php');
    ?>
    <div class="container">
        <div class="product-category-page">
            <?php if (is_product_category()) : ?>

                <!-- Add Sorting Dropdown -->
                <?php 
                    ob_start(); 
                    woocommerce_catalog_ordering(); 
                    $sorting_html = ob_get_clean();

                    if ( ! empty( $sorting_html ) ) : ?>
                        <div class="woocommerce-sorting">
                            <span>Sort by:</span>
                            <?php echo $sorting_html; ?>
                        </div>
                <?php endif; ?>

                <?php if (have_posts()) : ?>
                <div class="products-grid">
                        <?php while (have_posts()) : the_post(); ?>
                            <div class="product-card">
                                <a href="<?php the_permalink(); ?>" class="product-link">
                                    <?php if (has_post_thumbnail()) : ?>
                                        <img src="<?php echo get_the_post_thumbnail_url(null, 'woocommerce_thumbnail'); ?>" alt="<?php the_title_attribute(); ?>" class="product-image">
                                    <?php else : ?>
                                        <img src="<?php echo esc_url(woocommerce_placeholder_img_src()); ?>" alt="Placeholder" class="product-image">
                                    <?php endif; ?>
                                    <h2 class="product-name"><?php the_title(); ?></h2>
                                </a>
                            </div>
                        <?php endwhile; ?>
                    </div>
                    <?php else : ?>
                        <p class="product-not-found-any">No products found in this category.</p>
                    <?php endif; ?>

                <!-- Add Pagination -->
                <div class="pagination">
                    <?php woocommerce_pagination(); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</main>






<?php get_footer(); ?>
