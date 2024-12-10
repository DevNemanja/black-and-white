<?php 
    $title = get_field('drustvene_mreze_naslov'); 
    $text = get_field('drustvene_mreze_tekst');

    $facebook_link = get_theme_mod('facebook_link');
    $instagram_link = get_theme_mod('instagram_link');
    $email_link = get_theme_mod('email_link');

    $facebook_icon = get_theme_mod('facebook_icon');
    $instagram_icon = get_theme_mod('instagram_icon');
    $email_icon = get_theme_mod('email_icon');
?>

<section>
    <div class="container">
        <div class="homepage-social">
            <h2 class="title"><?php echo $title; ?></h2>
            <div class="description">
                <?php echo $text; ?>
            </div>
            <ul class="social-icons-wrapper">
                <?php if ($facebook_link && $facebook_icon): ?>
                    <li class="social-icon">
                        <a href="<?php echo esc_url($facebook_link); ?>" target="_blank" rel="noopener noreferrer">
                            <img src="<?php echo esc_url($facebook_icon); ?>" alt="Facebook Icon">
                        </a>
                    </li>
                <?php endif; ?>
                <?php if ($instagram_link && $instagram_icon): ?>
                    <li class="social-icon">
                        <a href="<?php echo esc_url($instagram_link); ?>" target="_blank" rel="noopener noreferrer">
                            <img src="<?php echo esc_url($instagram_icon); ?>" alt="instagram Icon">
                        </a>
                    </li>
                <?php endif; ?>
                <?php if ($email_link && $email_icon): ?>
                    <li class="social-icon">
                        <a href="<?php echo esc_url($email_link); ?>" target="_blank" rel="noopener noreferrer">
                            <img src="<?php echo esc_url($email_icon); ?>" alt="email Icon">
                        </a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</section>