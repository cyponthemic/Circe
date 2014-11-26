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
	<div id="primary" class="site-content small-12 medium-8 large-5 large-offset-3 columns">
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
	<div class="side-content small-12 medium-4 columns">
	<img src="<?php echo get_stylesheet_directory_uri()?>/img/Dan-Aaron.jpg">
	<h3>Follow Dan on Twitter:</h3>
	<li >
	<a href="https://twitter.com/danbuckle"><span class="genericon genericon-twitter"></span>@DanBuckle</a>
	<h3>Our last blog posts:</h3>
	<ul>
	<li><span class="genericon genericon-pinned"></span>Chris Bain on Musings of a grumpy winemaker – November newsletter</li>
	<li><span class="genericon genericon-pinned"></span>Chris Bain on Musings of a grumpy winemaker – November newsletter</li>
	<li><span class="genericon genericon-pinned"></span>Chris Bain on Musings of a grumpy winemaker – November newsletter</li>
	<li><span class="genericon genericon-pinned"></span>Chris Bain on Musings of a grumpy winemaker – November newsletter</li>
	</ul>
	</div>
	

</div>

<?php get_footer(); ?>