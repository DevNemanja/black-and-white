<?php
    $naslov = get_field('slider_naslov');
    $tekst = get_field('slider_tekst');

?>

<section class="embroidery-slider">
    <div class="container">
        <h3 class="embroidery-slider-title"><?php echo $naslov; ?></h3>
        <p class="embroidery-slider-text"><?php echo $tekst; ?></p>
        <div class="embroidery-image-gallery">
            <div class="embroidery-swiper swiper">
                <div class="swiper-wrapper">
                    <?php
                    for ($i = 1; $i <= 10; $i++) {
                        $image_url = get_field("image{$i}");
                        if ($image_url) {
                            echo '<div class="swiper-slide"><img src="' . esc_url($image_url) . '" alt="Slider image ' . $i . '"></div>';
                        }
                    }
                    ?>
                </div>
                <!-- Add Pagination -->
                <div class="swiper-pagination">123</div>

            </div>
        </div>
    </div>

</section>