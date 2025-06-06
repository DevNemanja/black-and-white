<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package black-and-white
 */


 	$footer_logo = get_theme_mod('footer_logo');
?>

	<footer class="footer">
		<div class="container">
			<div class="site-footer">
				<!-- First Section: Logo and Copyright -->
				<div class="footer-section">
					<div class="footer-logo">
						<a href="/">
							<img src="<?php echo esc_url(get_theme_mod('footer_logo')); ?>" alt="Logo">
						</a>
						<p>Copyright © Black&White</p>
					</div>
				</div>

				<!-- Second Section: WordPress Menu 1 -->
				<div class="footer-section footer-menu-1">
					<?php
						wp_nav_menu(array(
							'theme_location' => 'footer_menu_1',
							'menu_class' => 'footer-menu',
							'fallback_cb' => false
						));
					?>
				</div>

				<!-- Third Section: WordPress Menu 2 -->
				<div class="footer-section footer-menu-2">
					<?php
						wp_nav_menu(array(
							'theme_location' => 'footer_menu_2',
							'menu_class' => 'footer-menu',
							'fallback_cb' => false
						));
					?>
				</div>

				<!-- Fourth Section: WordPress Menu 3 -->
				<div>
					<div class="footer-section footer-menu-3">
						<?php
						wp_nav_menu(array(
							'theme_location' => 'footer_menu_3',
							'menu_class' => 'footer-menu',
							'fallback_cb' => false
						));
						?>
					</div>
					<!-- Social Icons Section -->
					<div class="footer-section footer-social-icons">
						<ul class="social-icons-list">
							<?php if (get_theme_mod('facebook_link')) : ?>
								<li class="social-icon">
									<a href="<?php echo esc_url(get_theme_mod('facebook_link')); ?>" target="_blank" rel="noopener noreferrer">
										<img src="<?php echo esc_url(get_theme_mod('facebook_icon')); ?>" alt="Facebook Icon">
									</a>
								</li>
							<?php endif; ?>

							<?php if (get_theme_mod('instagram_link')) : ?>
								<li class="social-icon">
									<a href="<?php echo esc_url(get_theme_mod('instagram_link')); ?>" target="_blank" rel="noopener noreferrer">
										<img src="<?php echo esc_url(get_theme_mod('instagram_icon')); ?>" alt="Instagram Icon">
									</a>
								</li>
							<?php endif; ?>

							<?php if (get_theme_mod('email_link')) : ?>
								<li class="social-icon">
									<a href="<?php echo esc_url(get_theme_mod('email_link')); ?>" target="_blank" rel="noopener noreferrer">
										<img src="<?php echo esc_url(get_theme_mod('email_icon')); ?>" alt="Email Icon">
									</a>
								</li>
							<?php endif; ?>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</footer>


	<footer class="devBy">
		Developed by: <a href="https://www.alpha-digital.rs">Alpha digital</a>
	</footer>


<?php wp_footer(); ?>

</body>
</html>
