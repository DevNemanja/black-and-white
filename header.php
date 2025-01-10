<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package black-and-white
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'black-and-white' ); ?></a>

	 <header class="site-header">
		<div class="container">
			<div class="header">
				<a class="header-logo-link" href="<?php echo esc_url(home_url(null, get_locale())); ?>">
					<img src="<?php echo esc_url(get_theme_mod('footer_logo')); ?>" alt="Logo" class="header-logo">
				</a>
				
				<button type="button" class="hamburger" for="check">
					<span></span>
					<span></span>
					<span></span>
				</button>

				<nav class="navigation">
					<?php
						wp_nav_menu(
							array(
								'theme_location' => 'menu-1',
								'menu_id'        => 'primary-menu',
							)
						);
					?>
					<div class="mobile-nav-addition">
						<img class="mobile-nav-logo" src="<?php echo get_template_directory_uri(); ?>/images/black-logo.svg" />
						
						<?php
							$facebook_link = get_theme_mod('facebook_link');
							$instagram_link = get_theme_mod('instagram_link');
							$email_link = get_theme_mod('email_link');

							$facebook_icon = get_theme_mod('facebook_icon');
							$instagram_icon = get_theme_mod('instagram_icon');
							$email_icon = get_theme_mod('email_icon');
						?>
						
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
				</nav>
			</div>
		</div>
	</header> 
