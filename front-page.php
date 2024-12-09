<?php get_header(); ?>

	<main class="site-main">

    <?php 
    $logo = get_field('logo'); // Logo image
    $naslovna_slika = get_field('naslovna_slika'); // Background image
    $podnaslov = get_field('podnaslov'); // Text content
    $eng_podnaslov = get_field('engleski_podnaslov'); // Text content
    
    ?>

<header class="hero" style="background-image: url('<?php echo esc_url($naslovna_slika); ?>');">
    <?php if ($logo) : ?>
        <div class="hero-logo">
            <img src="<?php echo esc_url($logo); ?>" alt="<?php bloginfo('name'); ?> Logo">
        </div>
    <?php endif; ?>

    <?php if ($podnaslov) : ?>
        <div class="hero-text">
            <?php echo esc_html($podnaslov); ?>
        </div>
    <?php endif; ?>
    <?php if ($eng_podnaslov) : ?>
        <div class="hero-text">
            <?php echo esc_html($eng_podnaslov); ?>
        </div>
    <?php endif; ?>
</header>

	</main>

<?php
get_sidebar();
get_footer();
