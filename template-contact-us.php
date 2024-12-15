<?php
/**
 * Template Name: Contact Us Page Template
 * Description: A custom template for displaying the Contact Us page with the title based on the current language.
 */

    // Load WordPress header
    get_header();

    $naslov = get_field('naslov');
    $podnaslov = get_field('podnaslov');
    $naslovna_slika = get_field('naslovna_slika');
    $is_small = TRUE;

    $title = get_field('sekundarni_naslov');
    $text = get_field('tekst_ispod_sekundarnog_naslova');

    require('template-parts/hero.php');
    require('template-parts/contact-us/form-section.php');

// Load WordPress footer
get_footer();
