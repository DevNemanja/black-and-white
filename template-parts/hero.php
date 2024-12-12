<header class="hero <?php echo !empty($is_small) ? 'hero-small' : ''; ?>" style="background-image: url('<?php echo esc_url($naslovna_slika); ?>');">
        <?php if ($naslov) : ?>
            <div class="hero-title">
                <h1><?php echo $naslov;?></h1>
                <p><?php echo $podnaslov;?></p>
            </div>
        <?php endif; ?>
</header>
