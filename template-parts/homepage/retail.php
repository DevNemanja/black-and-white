<?php 
    $title = get_field('maloprodaja_naslov'); 
    $text = get_field('maloprodaja_tekst');
    $buttonText = get_field('maloprodaja_dugme_tekst');
    $buttonLink = get_field('maloprodaja_dugme_link');
    $slika = get_field('maloprodaja_slika');

    require(get_template_directory() . '/template-parts/centered-content.php'); 