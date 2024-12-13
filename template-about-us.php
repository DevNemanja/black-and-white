<?php
/**
 * Template Name: About Us Page Template
 * Description: A custom template for displaying the About Us page with the title based on the current language.
 */

// Load WordPress header
get_header();

$naslov = get_field('naslov');
$podnaslov = get_field('podnaslov');
$naslovna_slika = get_field('glavna_slika');

$title = get_field('sekundarni_naslov');
$text = get_field('opis_ispod_sekundarnog_naslova');

require('template-parts/hero.php');
require('template-parts/about-us/slider.php');
require('template-parts/about-us/icons-section.php');

// Load WordPress footer
get_footer();
