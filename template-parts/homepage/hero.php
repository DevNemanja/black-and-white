<?php 
    $logo = get_field('logo'); // Logo image
    $naslovna_slika = get_field('naslovna_slika'); // Background image
?>

<header class="hero" style="background-image: url('<?php echo esc_url($naslovna_slika); ?>');">
        <?php if ($logo) : ?>
            <div class="hero-logo">
                <img src="<?php echo esc_url($logo); ?>" alt="<?php bloginfo('name'); ?> Logo">
            </div>
        <?php endif; ?>
</header>
