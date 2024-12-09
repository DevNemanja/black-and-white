<?php get_header(); ?>
	<main class="site-main">

    <?php 
        $logo = get_field('logo'); // Logo image
        $naslovna_slika = get_field('naslovna_slika'); // Background image
        $podnaslov = get_field('podnaslov'); // Text content
        $eng_podnaslov = get_field('engleski_podnaslov'); // Text content
    ?>
    <?php require('template-parts/homepage/hero.php'); ?>

	</main>

<?php
    get_sidebar();
    get_footer();
