
<?php

/*
Template Name: Reviews Page
*/


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

<div class="main-row row">
	<div id="primary" class="site-content small-12 medium-12 large-9 large-offset-3 columns">
		<div id="filters">
		
		
			<div class="ui-group">
				<div  class="button-group" data-filter-group="vintage">
					<button class="filter is-checked" data-filter="">All Vintages</button>
					<?php isotope_filter( 'WC','vintage') ?>
				</div>
			</div>
			<div class="ui-group">
				<div  class="button-group" data-filter-group="wine">
					<button class="filter is-checked" data-filter="">All Circe Wines</button>
					<?php isotope_filter('WC','winename') ?>
				</div>
			</div>
			<!--
<div class="ui-group">
				<div class="button-group" data-filter-group="author">
					<button class="filter is-checked" data-filter="">All Authors</button>
					<?php isotope_filter('WP','author') ?>
				</div>
			</div>
-->
		</div>
	<!--
	<div id="sorts" class="button-group">
			<button class="sort button is-checked" data-sort-value="vintage">Vintage</button>
			<button class="sort button" data-sort-value="author">Author</button>
		</div>
-->
		<div id="reviews" class="row" role="main">
<?php $loop = new WP_Query( array( 'post_type' => 'review','posts_per_page'=>0) ); ?>
	<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
			<div class="review small-12 medium-6 columns <?php super_isotope_classes() ?> ">
			<span class="sort-vintage"><?php isotope_classes('WC','vintage')?></span>
			<span class="sort-author"><?php isotope_classes('WP','author')?></span>
			<span class="sort-wine"><?php isotope_classes('WC','winename')?></span>
			<span class="sort-rating"><?php echo get_field('Rating') ?></span>
			<div id="" class=" inner row">
			
				
				<div style="opacity:0;" class="small-12 columns meta">
					<span class="genericon genericon-month"></span> <?php the_field('date'); ?>
				</div>
				
				<div class="small-12 columns meta">
					<span class="genericon genericon-tag"></span>	<?php echo the_product_reviewed()?> 			</div>
				<div class="small-4 columns meta" <?php if(get_field('Rating')<1){echo 'style="display:none;"';}?>>
					<span class="genericon genericon-star"></span><?php if(get_field('Rating')>1){echo get_field('Rating')." pts";}?>
				</div>
				<div class="small-6  columns meta">
					<span class="genericon genericon-user"></span><?php echo get_field('author')?>
				</div>
				<hr>
				
				<div class="small-12 columns review-text <?php scrollslim_class(); ?>">
				<p class="scrollslim-content">
					<?php the_content(); ?>
					<?php edit_post_link('Edit');?>
				</p>
				</div>
			</div></div>
			

			<?php endwhile; ?>

		</div>
		
	</div>

	

</div>

<?php get_footer(); ?>