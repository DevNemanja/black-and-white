<?php
/**
 * Template Name: Wholesale Page Template
 * Description: A custom template for displaying the Wholesale page with the title based on the current language.
 */

// Load WordPress header
get_header();

?>

<main class="site-main">
    <?php 
            require('template-parts/wholesale/hero.php'); 
            require('template-parts/wholesale/assortment.php'); 
    ?>
</main>


<?php

// Load WordPress footer
get_footer();
