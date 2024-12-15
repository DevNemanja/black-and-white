<?php 
    $title = get_field('maloprodaja_naslov'); 
    $text = get_field('maloprodaja_tekst');
    $buttonText = get_field('maloprodaja_dugme_tekst');
    $term = get_term(28, 'product_cat');
    $buttonLink = get_term_link($term);

    $slika = get_field('maloprodaja_slika');



    require(get_template_directory() . '/template-parts/centered-content.php'); 