<?php
// Proveravamo da li je aktiviran WPML ili Polylang za višejezičnost
if (function_exists('pll_home_url')) {
    // Koristimo Polylang funkciju za dobijanje početne stranice za trenutni jezik
    $home_url = pll_home_url();
} elseif (function_exists('icl_get_home_url')) {
    // Koristimo WPML funkciju za dobijanje početne stranice za trenutni jezik
    $home_url = icl_get_home_url();
} else {
    // Ako nema višejezičnih dodataka, koristimo standardnu WordPress funkciju
    $home_url = home_url('/');
}

// Preusmeravamo korisnika na početnu stranicu
wp_redirect($home_url);
exit;