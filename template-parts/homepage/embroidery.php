<?php 
    $title = get_field('vezionica_naslov'); 
    $text = get_field('vezionica_tekst');
    $buttonText = get_field('vezionica_dugme_tekst');
    $buttonLink = get_field('vezionica_dugme_link');
    $slika = get_field('vezionica_slika');

    require(get_template_directory() . '/template-parts/centered-content.php'); 