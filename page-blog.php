<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage Cornerstone
 * @since Cornerstone 1.0
 */

get_header(); ?>

<div class="row main-row">
	<div id="primary" class="site-content small-12 medium-8 large-9 large-offset-3 columns">
		<div id="content" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

					

					<div class="entry-content">
						<?php the_content(); ?>
					</div>


				</article>

			<?php endwhile; ?>

		</div>
	</div>	

</div>

<?php get_footer(); ?>