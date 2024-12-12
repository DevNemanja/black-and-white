<?php 
    $slika_levo = get_field('slika_iznad_footera'); 
    $naslov_veleprodaja = get_field('naslov_za_veleprodaju_u_footeru');
    $naslov_maloprodaja = get_field('naslov_za_maloprodaju_u_footeru');
    $pon_pet = get_field('od_ponedeljka_do_petka');
    $sub = get_field('subotom');
?>

<section>
    <div class="find-us-wrapper">
        <img class="find-us-main-image" src="<?php echo $slika_levo; ?>" alt="<?php echo $title; ?>">
        <div class="find-us-info-wrapper">

            <?php 
                $location = get_theme_mod('wholesale_address');
                $monFriHrs = get_theme_mod('wholesale_working_hours_mon_fri');
                $satHrs = get_theme_mod('wholesale_working_hours_sat');
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
                    <img src="<?php echo $slika; ?>" alt="<?php echo $title; ?>">
                </div>
            </div>

            <?php 
                $location = get_theme_mod('retail_address');
                $monFriHrs = get_theme_mod('retail_working_hours_mon_fri');
                $satHrs = get_theme_mod('retail_working_hours_sat');
                $mail = get_theme_mod('retail_email');

                $phone_numbers = [
                    get_theme_mod('retail_phone_number')
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
                    <h3 class="find-us-title"><?php echo $naslov_maloprodaja; ?></h3>
                    <?php 
                        $slika = get_field('slika_mape_maloprodaje'); 
                        require('find-us-list.php'); 
                    ?>
                </div>
                <div class="find-us-map">
                    <img src="<?php echo $slika; ?>" alt="<?php echo $title; ?>">
                </div>
            </div>
        </div>
    </div>

</section>