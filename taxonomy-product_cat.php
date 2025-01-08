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
                            <div class="product-item">
                                <?php if (has_post_thumbnail()) : ?>
                                    <div class="product-image-wrapper">
                                        <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title_attribute(); ?>" class="product-image">
                                    </div>
                                <?php endif; ?>
                                    
                                <?php if (get_locale() === 'sr_RS') : // Provera za srpski jezik ?>
                                    <h2 class="product-title"><?php the_title(); ?></h2>
                                    <div class="product-details">
                                        <p><strong><?php _e('Sirovinski sastav', 'your-text-domain'); ?>:</strong> 
                                            <?php echo esc_html(get_field('sirovinski_sastav')); ?>
                                        </p>
                                        <p><strong><?php _e('Širina', 'your-text-domain'); ?>:</strong> 
                                            <?php echo esc_html(get_field('sirina')); ?> cm
                                        </p>
                                        <p><strong><?php _e('Težina', 'your-text-domain'); ?>:</strong> 
                                            <?php echo esc_html(get_field('tezina')); ?> kg
                                        </p>
                                    </div>
                                <?php else : // Za sve ostale jezike, npr. engleski ?>
                                    <div class="product-details">
                                        <p>ENG</p>
                                    </div>
                                <?php endif; ?>



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
