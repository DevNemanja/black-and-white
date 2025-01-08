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
				</nav>
			</div>

		</div>
	</header> 
