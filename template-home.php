<?php
/**
 * Template Name: Home Page Template
 * Description: A custom template for displaying the homepage with the title based on the current language.
 */

// Load WordPress header
get_header();

// Check the current language (Polylang)
$current_lang = pll_current_language(); // For Polylang

// For WPML, you would use: $current_lang = ICL_LANGUAGE_CODE;

// Get the current page title (localized)
$page_title = get_the_title();

// Check if the page title needs translation
if ($current_lang == 'en') {
    // The title should be in English (you can customize the English version here)
    $translated_title = $page_title; // Default to the page title
} elseif ($current_lang == 'sr') {
    // The title should be in Serbian (you can customize the Serbian version here)
    $translated_title = pll__($page_title); // For Polylang, this function translates the title
} else {
    // Default title if the language is not set
    $translated_title = $page_title;
}

// Output the translated title
echo '<h1>' . esc_html($translated_title) . '</h1>';
echo '<h1>BRAPOOOO</h1>';

// Load WordPress footer
get_footer();
