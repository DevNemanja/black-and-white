<?php
    $naslov = get_field('sekundarni_naslov');
    $tekst = get_field('tekst_ispod_sekundarnog_naslova');
    $slika = get_field('slika_pored_forme');
    $naslovVeleprodaja = get_field('naslov_iznad_podataka_za_veleprodaju');
    $naslovMaloprodaja = get_field('naslov_iznad_podataka_za_maloprodaju');
?>



<section class="form-section">
    <div class="container">
        <h2 class="form-section-title"><?php echo $naslov; ?></h2>
        <p class="form-section-text"><?php echo $tekst; ?></p>
        <div class="form-wrapper">
            <?php if (!empty($slika)) : ?>
                <img class="form-image" src="<?php echo $slika; ?>" alt="<?php echo !empty($title) ? $title : ''; ?>">
            <?php endif; ?>
            <div class="form-mock"></div>
        </div>
        <div>
            <h3 class="form-info-title"><?php echo $naslovVeleprodaja; ?></h3>

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
            
                require('form-info-row.php'); 
            ?>
        </div>  
        <div class="form-info-divider"></div>
        <div>
            <h3 class="form-info-title"><?php echo $naslovMaloprodaja; ?></h3>

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
            
                require('form-info-row.php'); 
            ?>
        </div>  
    </div>
</section>