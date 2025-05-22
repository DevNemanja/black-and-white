<?php
/**
 * Template Name: Category Template
 * Description: A custom template for displaying the Category with the title based on the current language.
 */

get_header(); ?>

<main class="site-main">
    <?php 
        // Get the current term object
        $term = get_queried_object();

        // Fetch custom fields associated with the term
        $naslov = get_field('naslov', $term);
        $podnaslov = get_field('podnaslov', $term);
        $naslovna_slika = get_field('slika', $term);
        $is_small = TRUE;

        $title = get_field('sekundarni_naslov', $term);
        $text = get_field('opis_ispod_sekundarnog_naslova', $term);
        $category_id = get_field('kategorija', $term);

        // Include the hero and centered content templates
        require('template-parts/hero.php'); 
        require('template-parts/centered-content.php');
    ?>

    <div class="container">
        <div class="product-category-page">
            <?php if ($category_id) : 
                // Define query arguments for fetching products
                $args = array(
                    'post_type' => 'product',
                    'posts_per_page' => 12, // Number of products per page
                    'paged' => get_query_var('paged') ? get_query_var('paged') : 1,
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'product_cat',
                            'field'    => 'term_id',
                            'terms'    => $category_id,
                        ),
                    ),
                );

                // Execute the product query
                $query = new WP_Query($args);
            ?>

                <?php if ($query->have_posts()) : ?>
                    <div class="products-grid">
                        <?php while ($query->have_posts()) : $query->the_post(); ?>
                            <div class="product-item">
                                <?php if (has_post_thumbnail()) : ?>
                                    <div class="product-image-wrapper">
                                        <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title_attribute(); ?>" class="product-image">

                                        <?php 
                                            $sirina = get_field('sirina');
                                            $tezina = get_field('tezina');

                                            // Display product details based on the language
                                            if (get_locale() === 'sr_RS') :
                                                $sirovinski_sastav = get_field('sirovinski_sastav');
                                                $naziv = get_field('naziv_proizvoda');

                                                if ($sirovinski_sastav || $sirina || $tezina) : ?>
                                                    <div class="product-details">
                                                        <?php if ($sirovinski_sastav) : ?>
                                                            <p><strong><?php _e('Sirovinski sastav', 'your-text-domain'); ?>:</strong> 
                                                                <?php echo esc_html($sirovinski_sastav); ?>
                                                            </p>
                                                        <?php endif; ?>

                                                        <?php if ($sirina) : ?>
                                                            <p><strong><?php _e('Širina', 'your-text-domain'); ?>:</strong> 
                                                                <?php echo esc_html($sirina); ?> cm
                                                            </p>
                                                        <?php endif; ?>

                                                        <?php if ($tezina) : ?>
                                                            <p><strong><?php _e('Težina', 'your-text-domain'); ?>:</strong> 
                                                                <?php echo esc_html($tezina); ?> gr/m²
                                                            </p>
                                                        <?php endif; ?>
                                                    </div>
                                                <?php endif; ?>

                                            <?php else : ?>
                                                <?php 
                                                    $sirovinski_sastav_eng = get_field('sirovinski_sastav_eng');

                                                    $nazivEng = get_field('naziv_proizvoda_eng');
                                                    
                                                    if ($sirovinski_sastav_eng || $sirina || $tezina) : ?>
                                                    <div class="product-details">
                                                        <?php if ($sirovinski_sastav_eng) : ?>
                                                            <p><stroform-info-dividerng><?php _e('Composition', 'your-text-domain'); ?>:</stroform-info-dividerng> 
                                                                <?php echo esc_html($sirovinski_sastav_eng); ?>
                                                            </p>
                                                        <?php endif; ?>

                                                        <?php if ($sirina) : ?>
                                                            <p><strong><?php _e('Width', 'your-text-domain'); ?>:</strong> 
                                                                <?php echo esc_html($sirina); ?> cm
                                                            </p>
                                                        <?php endif; ?>

                                                        <?php if ($tezina) : ?>
                                                            <p><strong><?php _e('Weight', 'your-text-domain'); ?>:</strong> 
                                                                <?php echo esc_html($tezina); ?> gsm 
                                                            </p>
                                                        <?php endif; ?>
                                                    </div>
                                                <?php endif; ?>
                                            <?php endif; ?>

                                    </div>
                                    <h2 class="product-title">
                                        <?php 
                                            // Display the product title based on the current language
                                            echo esc_html(get_locale() === 'sr_RS' ? ($naziv ? $naziv : get_the_title()) : ($nazivEng ? $nazivEng : get_the_title()));
                                        ?>
                                    </h2>
                                <?php else : ?>
                                    <div class="product-image-wrapper">
                                        <img src="<?php echo get_template_directory_uri() . '/images/product-placeholder.png'; ?>" alt="<?php the_title_attribute(); ?>" class="product-image">
                                    </div>
                                    <h2 class="product-title"><?php the_title(); ?></h2>
                                <?php endif; ?>
                            </div>
                        <?php endwhile; ?>
                    </div>
                <?php endif; ?>

                <!-- Pagination -->
                <div class="pagination">
                    <?php 
                    echo paginate_links(array(
                        'total' => $query->max_num_pages,
                        'prev_text' => '«',
                        'next_text' => '»',
                    ));
                    ?>
                </div>

                <?php 
                // Reset the WP_Query object
                wp_reset_postdata(); 
            else : ?>
                <p><?php _e('Category ID is missing or invalid.', 'your-text-domain'); ?></p>
            <?php endif; ?>
        </div>
    </div>
</main>

<?php get_footer(); ?>
