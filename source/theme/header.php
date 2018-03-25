<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Carpel_Anther
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div class="site">

	<header id="masthead" class="site-header">
		<div class="site-branding">
			<?php
			the_custom_logo();
			if ( is_front_page() && is_home() ) : ?>
				<div class="site-title">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" title="<?php bloginfo( 'name' ); ?>">
						<svg class="carpel-anther-logo" data-name="carpel-anther-logo" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 288 288"><path d="M42.32 84V40.65l4.22-4.23H64l4.22 4.23v10.69h-8.68v-5.45l-1-1H52l-1 1v32.82l1 1h6.54l1-1v-5.45h8.65V84L64 88.17H46.54zm52.97-7H84.67l-2.32 11.17H73.5l12.25-51.75h8.45l12.25 51.75H97.6zm-1.71-8.37L90 51.2l-3.63 17.43zm20.09 19.54V36.42H136l4.22 4.23V63.8L136 68l4.22 20.15h-8.51L127.49 68h-5.17v20.17zm17-28.53l1-1V45.82l-1-1h-8.3v14.82zm18.4 28.53V36.42h22l4.23 4.23V63.8l-4.24 4.2h-13.34v20.17zm16.48-28.53l1-1V45.82l-1-1h-7.83v14.82zm18.18 28.53V36.42h24.78v8.38h-16.14v12.87h12V66h-12v13.8h16.14v8.37zm56.98 0H217V36.42h8.72V79.8h15zm-191.65 81.7h-8.92l8.92-51.74H58zm12.86 70.54H51.3L49 251.58h-8.86l12.25-51.75h8.44l12.26 51.75h-8.85zm-1.7-8.41l-3.61-17.4L53 232zm20.09 19.58v-51.75h9.32l11.24 31.73v-31.73h8.65v51.75h-9.33L89 219.85v31.73zm63.93-43.38h-9.33v43.38h-8.65V208.2h-9.32v-8.37h27.3zm16.07-8.37v21.38H170v-21.38h8.65v51.75H170v-22h-9.73v22h-8.65v-51.75zm27.78 51.75v-51.75h24.78v8.37h-16.14v12.87h12v8.38h-12v13.75h16.14v8.38zm33.22 0v-51.75h22.33l4.22 4.22v23.15l-4.22 4.22 4.22 20.16h-8.51l-4.22-20.16H230v20.16zm16.95-28.53l1-1v-12.8l-1-1H230v14.78z" fill="#231f20"/></svg>
					</a>
				</div>
			<?php else : ?>
				<div class="site-title">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" title="<?php bloginfo( 'name' ); ?>">
						<svg class="carpel-anther-logo" data-name="carpel-anther-logo" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 288 288"><path d="M42.32 84V40.65l4.22-4.23H64l4.22 4.23v10.69h-8.68v-5.45l-1-1H52l-1 1v32.82l1 1h6.54l1-1v-5.45h8.65V84L64 88.17H46.54zm52.97-7H84.67l-2.32 11.17H73.5l12.25-51.75h8.45l12.25 51.75H97.6zm-1.71-8.37L90 51.2l-3.63 17.43zm20.09 19.54V36.42H136l4.22 4.23V63.8L136 68l4.22 20.15h-8.51L127.49 68h-5.17v20.17zm17-28.53l1-1V45.82l-1-1h-8.3v14.82zm18.4 28.53V36.42h22l4.23 4.23V63.8l-4.24 4.2h-13.34v20.17zm16.48-28.53l1-1V45.82l-1-1h-7.83v14.82zm18.18 28.53V36.42h24.78v8.38h-16.14v12.87h12V66h-12v13.8h16.14v8.37zm56.98 0H217V36.42h8.72V79.8h15zm-191.65 81.7h-8.92l8.92-51.74H58zm12.86 70.54H51.3L49 251.58h-8.86l12.25-51.75h8.44l12.26 51.75h-8.85zm-1.7-8.41l-3.61-17.4L53 232zm20.09 19.58v-51.75h9.32l11.24 31.73v-31.73h8.65v51.75h-9.33L89 219.85v31.73zm63.93-43.38h-9.33v43.38h-8.65V208.2h-9.32v-8.37h27.3zm16.07-8.37v21.38H170v-21.38h8.65v51.75H170v-22h-9.73v22h-8.65v-51.75zm27.78 51.75v-51.75h24.78v8.37h-16.14v12.87h12v8.38h-12v13.75h16.14v8.38zm33.22 0v-51.75h22.33l4.22 4.22v23.15l-4.22 4.22 4.22 20.16h-8.51l-4.22-20.16H230v20.16zm16.95-28.53l1-1v-12.8l-1-1H230v14.78z" fill="#231f20"/></svg>
					</a>
				</div>
			<?php
			endif;

			$description = get_bloginfo( 'description', 'display' );
			if ( $description || is_customize_preview() ) : ?>
				<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
			<?php
			endif; ?>
		</div><!-- .site-branding -->

		<!-- TODO :: mobile nav here -->

		<nav class="main-navigation main-navigation--upper">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'carpel-anther' ); ?></button>
			<?php
				wp_nav_menu( array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'primary-menu',
				) );
			?>
		</nav><!-- .main-navigation--upper -->

	</header><!-- #masthead -->

	<div class="site-content">
