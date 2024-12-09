<?php 
    $title = get_field('veleprodaja_naslov'); 
    $text = get_field('veleprodaja_tekst');
    $buttonText = get_field('veleprodaja_dugme_tekst');
    $buttonLink = get_field('veleprodaja_dugme_link');
    $slika = get_field('veleprodaja_slika');

    require(get_template_directory() . '/template-parts/centered-content.php'); 