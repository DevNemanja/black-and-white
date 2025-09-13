<?php

/**
 * Template Name: Embroidery Page Template
 * Description: A custom template for displaying the Embroidery page with the title based on the current language.
 */

// Load WordPress header
get_header();

$naslov = get_field('naslov');
$podnaslov = get_field('podnaslov');
$naslovna_slika = get_field('glavna_slika');

$title = get_field('sekundarni_naslov');
$text = get_field('opis_ispod_sekundarnog_naslova');

require('template-parts/hero.php');

$tekstIznadNaslova = get_field('tekst_iznad_sekundarnog_naslova');
$sekNaslov = get_field('sekundarni_naslov');
$slikaIza = get_field('slika_iza');
$slikaIspred = get_field('slika_ispred');
$naslovZaDveSlike = get_field('naslov_za_dve_slike');
$tekstDveSlike = get_field('tekst_dve_slike');
$poklonTekst = get_field('poklon_tekst');
$logoTekst = get_field('logo_tekst');
$majicaTekst = get_field('majica_tekst');

require('template-parts/overlapping-images-section.php');
require('template-parts/embroidery-slider-section.php');



// Load WordPress footer
get_footer();
