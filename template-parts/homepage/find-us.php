<?php
$slika_levo = get_field('slika_iznad_footera');
$naslov_veleprodaja = get_field('naslov_za_veleprodaju_u_footeru');
$naslov_maloprodaja = get_field('naslov_za_maloprodaju_u_footeru');
$pon_pet = get_field('od_ponedeljka_do_petka');
$sub = get_field('subotom');
?>

<section>
    <div class="find-us-wrapper">
        <div class="container">


            <div class="find-us-info-wrapper">

                <?php
                $locale = get_locale(); // Get the current locale

                if ($locale === 'sr_RS') {
                    $monFriHrs = get_theme_mod('wholesale_working_hours_mon_fri');
                    $satHrs = get_theme_mod('wholesale_working_hours_sat');
                } else {
                    $monFriHrs = get_theme_mod('wholesale_working_hours_mon_fri_eng');
                    $satHrs = get_theme_mod('wholesale_working_hours_sat_eng');
                }

                $location = get_theme_mod('wholesale_address');
                $mail = get_theme_mod('wholesale_email');

                $phone_numbers = [
                    get_theme_mod('wholesale_number_1'),
                    get_theme_mod('wholesale_number_2'),
                    get_theme_mod('wholesale_number_3'),
                    get_theme_mod('wholesale_number_4'),
                ];

                // Filter out empty numbers
                $phone_links = array_filter($phone_numbers, function ($number) {
                    return !empty($number);
                });

                $phone = '';
                foreach ($phone_links as $number) {
                    $phone .= '<li><a href="tel:' . esc_attr($number) . '">' . esc_html($number) . '</a></li>';
                }
                ?>

                <div class="find-us-info">
                    <div class="find-us-infobox">
                        <h3 class="find-us-title"><?php echo $naslov_veleprodaja; ?></h3>
                        <?php
                        $slika = get_field('slika_mape_veleprodaje');
                        require('find-us-list.php');
                        ?>
                    </div>
                    <div class="find-us-map">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2827.375895219282!2d20.32857877738683!3d44.874998772556275!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x475a6f75eecee2fd%3A0xe9283f522de8ff65!2sBlack%20%26%20White%20-%20maloprodaja%20tekstila!5e0!3m2!1sen!2srs!4v1757760483022!5m2!1sen!2srs&zoom=11" width="100%" height="450" style="border:0;" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>


            </div>
        </div>
    </div>


</section>