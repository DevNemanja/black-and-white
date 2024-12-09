<?php get_header(); ?>
	<main class="site-main">
        <?php require('template-parts/homepage/hero.php'); ?>
        <?php require('template-parts/homepage/counter.php'); ?>
        <?php require('template-parts/homepage/about-us.php'); ?>
        <?php require('template-parts/homepage/wholesale.php'); ?>
        <?php require('template-parts/homepage/retail.php'); ?>
        <?php require('template-parts/homepage/embroidery.php'); ?>

	</main>

<?php
    get_sidebar();
    get_footer();
