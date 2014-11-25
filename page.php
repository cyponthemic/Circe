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
<?php global $post; ?>
<?php
$src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), "full", false, '' );
?>

<style>
.parralax {
	background: url(<?php echo $src[0]; ?> );
	
           }
</style>
<header class="parralax"
data-0="background-position:  50% 0%;"
data-top-bottom="background-position: 50% 100%;"
>
	<div class="row">
		<div class="large-offset-4 small-8 columns">
		<h1 class="entry-title"><?php the_title(); ?></h1>
		</div>
	</div>
</header>
<div class="row">
	<div id="primary" class="site-content small-12 medium-8 large-8 large-offset-4 columns">
		<div id="content" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

					

					<div class="entry-content">
						<?php the_content(); ?>
					</div>

					<footer class="entry-meta">
						<?php edit_post_link( __( 'Edit', 'cornerstone' ), '<span class="edit-link">', '</span>' ); ?>
					</footer>

				</article>

				<?php comments_template( '', true ); ?>

			<?php endwhile; ?>

		</div>
	</div>

	

</div>

<?php get_footer(); ?>