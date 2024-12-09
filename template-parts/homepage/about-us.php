<?php 
    $title = get_field('o_nama_naslov'); 
    $text = get_field('o_nama_tekst');
    $buttonText = get_field('o_nama_dugme_tekst');
    $buttonLink = get_field('o_nama_dugme_link');
    $slika = get_field('o_nama_slika');

    require(get_template_directory() . '/template-parts/centered-content.php'); 