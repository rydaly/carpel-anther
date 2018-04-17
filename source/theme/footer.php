<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Carpel_Anther
 */

?>

</div><!-- .site-content -->

	<footer id="colophon" class="site-footer">

		<nav class="main-navigation main-navigation--lower hidden-mobile">
			<?php
				wp_nav_menu( array(
					'theme_location' => 'menu-2',
					'menu_id'        => 'secondary-menu',
				) );
			?>
		</nav><!-- .main-navigation--lower -->

		<div class="site-info"></div><!-- .site-info -->

	</footer><!-- #colophon -->

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
