<?php 
    $naslov = get_field('veleprodaja_naslov');
    $podnaslov = get_field('veleprodaja_ispod_naslova');
    $naslovna_slika = get_field('glavna_slika'); // Background image
?>

<?php require(get_template_directory() . '/template-parts/hero.php'); ?>