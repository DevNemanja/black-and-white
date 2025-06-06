<section class="centered-content-section">
    <div class="centered-content <?php if (isset($noTopMargin) && $noTopMargin) echo 'no-top-margin' ?>">
        <?php if (!empty($title)) : ?>
            <h2 class="title"><?php echo $title; ?></h2>
        <?php endif; ?>

        <?php if (!empty($text)) : ?>
            <div class="description"><?php echo $text; ?></div>
        <?php endif; ?>

        <?php if (!empty($buttonLink) && !empty($buttonText)) : ?>
            <a class="button" href="<?php echo $buttonLink; ?>">
                <?php echo $buttonText; ?>
                <?php require(get_template_directory() . '/template-parts/white-right-arrow.php'); ?>
            </a>
        <?php endif; ?>
    </div>

    <?php if (!empty($video)) : ?>
        <div class="centered-content-video-wrapper">
            <video autoplay muted loop>
                <source src="<?php echo esc_url($video); ?>" type="video/mp4" />
            </video>
        </div>

    <?php endif; ?>



    <?php if (!empty($slika) and empty($video)) : ?>
        <img class="centered-content-image" src="<?php echo $slika; ?>" alt="<?php echo !empty($title) ? $title : ''; ?>">
    <?php endif; ?>
</section>

<?php $video = null; ?>