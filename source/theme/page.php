<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Carpel_Anther
 */

get_header(); ?>

	<?php
	// TODO :: only render the gallery if home 
	$images = get_field('images');
	if( $images ): ?>
		<div class="bg-gallery">
			<?php foreach( $images as $image ): ?>
				<div class="bg-gallery-img" style="background-image: url(<?php echo $image['url']; ?>)"></div>
			<?php endforeach; ?>
		</div>
	<?php endif; ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
