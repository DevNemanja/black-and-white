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

                <?php
                $contact_slug = (function_exists('pll_current_language') && pll_current_language() === 'sr') ? 'kontakt' : 'contact-us';
                $contact_url = get_permalink(get_page_by_path($contact_slug));
                ?>

                <li class="social-icon">
                    <a href="<?php echo esc_url($contact_url); ?>" target="_blank" rel="noopener noreferrer">
                        <svg width="43" height="43" viewBox="0 0 43 43" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect width="42.6406" height="42.6406" rx="5" fill="#171717" />
                            <path d="M26.1309 23.5877L24.4581 24.5278C24.2574 24.6406 24.0252 24.6847 23.7969 24.6534C23.5687 24.6221 23.357 24.5172 23.1942 24.3547L17.6112 18.7849C17.4484 18.6224 17.3433 18.4112 17.3119 18.1836C17.2806 17.9559 17.3247 17.7243 17.4376 17.524L18.38 15.8552C18.5496 15.5549 18.616 15.2074 18.5691 14.8658C18.5221 14.5243 18.3644 14.2075 18.12 13.9638L15.6129 11.4626C15.4659 11.316 15.2915 11.1996 15.0994 11.1202C14.9074 11.0409 14.7016 11 14.4937 11C14.2859 11 14.0801 11.0409 13.888 11.1202C13.696 11.1996 13.5215 11.316 13.3746 11.4626L12.2362 12.5975C11.5706 13.2616 11.1465 14.1286 11.0316 15.0608C10.9166 15.9929 11.1174 16.9366 11.6019 17.7419L12.173 18.6916C15.0899 23.5414 19.207 27.5621 24.1293 30.3681L24.2421 30.4328C25.9237 31.3913 28.0012 31.1119 29.3475 29.7696L30.5363 28.5836C30.6833 28.437 30.7999 28.263 30.8795 28.0714C30.959 27.8798 31 27.6745 31 27.4671C31 27.2598 30.959 27.0544 30.8795 26.8629C30.7999 26.6713 30.6833 26.4972 30.5363 26.3506L28.0276 23.8479C27.7833 23.6038 27.4657 23.4461 27.1231 23.3992C26.7806 23.3522 26.4321 23.4184 26.1309 23.5877Z" fill="white" />
                        </svg>

                    </a>
                </li>

            </ul>
        </div>
    </div>
</section>