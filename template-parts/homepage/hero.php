<?php 
    $logo = get_field('logo'); // Logo image
    $naslovna_slika = get_field('naslovna_slika'); // Background image\
    $video_link = get_field('video'); // Video link
?>

<header class="hero" style="background-image: url('<?php echo esc_url($naslovna_slika); ?>');">
        <?php if ($video_link) : ?>
            <div class="hero-video-wrapper">
                <video autoplay muted loop>
                    <source src="<?php echo esc_url($video_link); ?>" type="video/mp4" />
                </video>
            </div>
        <?php endif; ?>
        <?php if ($logo) : ?>
            <div class="hero-logo">
                <img src="<?php echo esc_url($logo); ?>" alt="<?php bloginfo('name'); ?> Logo">
            </div>
        <?php endif; ?>
</header>
