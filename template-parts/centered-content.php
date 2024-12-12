<section class="centered-content-section">
    <div class="centered-content">
        <h2 class="title"><?php echo $title; ?></h2>
        <div class="description">
            <?php echo $text; ?>
        </div>
        <a class="button" href="<?php echo $buttonLink; ?>">
            <?php echo $buttonText; ?>
            <?php require(get_template_directory() . '/template-parts/white-right-arrow.php'); ?>
        </a>
    </div>

    <?php if ($slika) : ?>
        <img class="centered-content-image" src="<?php echo $slika; ?>" alt="<?php echo $title; ?>">
        <?php endif; ?>
</section>
