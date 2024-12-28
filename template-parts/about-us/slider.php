<?php
    $prviSlajdNaslov = get_field('prvi_slajd_naslov');
    $prviSlajdTekst = get_field('prvi_slajd_tekst');
    $prviSlajdSlika = get_field('prvi_slajd_slika');

    $drugiSlajdNaslov = get_field('drugi_slajd_naslov');
    $drugiSlajdTekst = get_field('drugi_slajd_tekst');
    $drugiSlajdSlika = get_field('drugi_slajd_slika');

    $treciSlajdNaslov = get_field('treci_slajd_naslov');
    $treciSlajdTekst = get_field('treci_slajd_tekst');
    $treciSlajdSlika = get_field('treci_slajd_slika');
?>

<section>
    <div class="container">
        <div class="swiper-container">
            <div class="about-us-slider">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class=" about-us-slider-item">
                            <div class="about-us-slider-content">
                                <h3 class="about-us-slider-title"><?php echo $prviSlajdNaslov; ?></h3>
                                <p class="about-us-slider-text"><?php echo $prviSlajdTekst; ?></p>
                            </div>
                            <div class="about-us-slider-image">
                                <img src="<?php echo $prviSlajdSlika; ?>" alt="<?php echo $prviSlajdNaslov; ?>" />
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="about-us-slider-item">
                            <div class="about-us-slider-content">
                                <h3 class="about-us-slider-title"><?php echo $drugiSlajdNaslov; ?></h3>
                                <p class="about-us-slider-text"><?php echo $drugiSlajdTekst; ?></p>
                            </div>
                            <div class="about-us-slider-image">
                                <img src="<?php echo $drugiSlajdSlika; ?>" alt="<?php echo $drugiSlajdNaslov; ?>" />
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="about-us-slider-item">
                            <div class="about-us-slider-content">
                                <h3 class="about-us-slider-title"><?php echo $treciSlajdNaslov; ?></h3>
                                <p class="about-us-slider-text"><?php echo $treciSlajdTekst; ?></p>
                            </div>
                            <div class="about-us-slider-image">
                                <img src="<?php echo $treciSlajdSlika; ?>" alt="<?php echo $treciSlajdNaslov; ?>" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-pagination"></div>
            </div>

        </div>
    </div>
</section>