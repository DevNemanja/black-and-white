<?php get_header(); ?>
	<main class="site-main">
                <?php 
                        require('template-parts/homepage/hero.php'); 
                        require('template-parts/homepage/counter.php'); 
                        require('template-parts/homepage/about-us.php'); 
                        require('template-parts/homepage/wholesale.php'); 
                        require('template-parts/homepage/retail.php'); 
                        require('template-parts/homepage/embroidery.php'); 
                        require('template-parts/homepage/social.php'); 
                        require('template-parts/homepage/find-us.php'); 

                ?>
	</main>
<?php
    
    get_footer();
