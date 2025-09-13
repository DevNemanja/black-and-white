<?php
$naslov = get_field('slider_naslov');
$tekst = get_field('slider_tekst');
?>

<section class="embroidery-slider">
    <div class="container">
        <h3 class="embroidery-slider-title"><?php echo $naslov; ?></h3>
        <p class="embroidery-slider-text"><?php echo $tekst; ?></p>
        <div class="embroidery-image-gallery">
            <?php if (have_posts()) : while (have_posts()) : the_post();
                    $content = get_the_content();

                    if (!empty($content)) {
                        // Omogućava parsiranje HTML-a
                        libxml_use_internal_errors(true);
                        $doc = new DOMDocument();
                        $doc->loadHTML('<?xml encoding="utf-8" ?>' . $content);

                        // Pronađi sve <img> tagove
                        $images = $doc->getElementsByTagName('img');
            ?>
                        <div class="embroidery-swiper swiper">
                            <div class="swiper-wrapper">
                                <?php
                                foreach ($images as $index => $image) {
                                    $image_url = $image->getAttribute('src');
                                    $alt_text = $image->getAttribute('alt');
                                    if ($image_url) {
                                        echo '<div class="swiper-slide"><img src="' . esc_url($image_url) . '" alt="' . esc_attr($alt_text ?: 'Slider image ' . ($index + 1)) . '"></div>';
                                    }
                                }
                                ?>
                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
            <?php }
                endwhile;
            endif; ?>
        </div>
    </div>
</section>