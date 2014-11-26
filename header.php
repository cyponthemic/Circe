<!DOCTYPE html>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
<head>
<meta charset="utf-8" />

<!-- Set the viewport width to device width for mobile -->
<meta name="viewport" content="initial-scale=1.0" />

<title><?php wp_title( '|', true, 'right' ); ?></title>
<link href='http://fonts.googleapis.com/css?family=Quicksand:300,400,700' rel='stylesheet' type='text/css'>
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div class="hide-for-large-up sticky">
<nav class="top-bar" data-topbar>
  <ul class="title-area">
    <li class="name">
    	<a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
    </li>
    <!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
    <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
  </ul>

  <section class="top-bar-section">
    <?php
      // Left Nav Section
      if ( has_nav_menu( 'header-menu-left' ) ) {
          wp_nav_menu( array(
              'theme_location' => 'header-menu-left',
              'container' => false,
              'depth' => 0,
              'items_wrap' => '<ul class="left">%3$s</ul>',
              'fallback_cb' => false,
              'walker' => new cornerstone_walker( array(
                  'in_top_bar' => true,
                  'item_type' => 'li'
              ) ),
          ) );
        }
      ?>

    <?php
      //Right Nav Section
      if ( has_nav_menu( 'header-menu-right' ) ) {
          wp_nav_menu( array(
              'theme_location' => 'header-menu-right',
              'container' => false,
              'depth' => 0,
              'items_wrap' => '<ul class="right">%3$s</ul>',
              'fallback_cb' => false,
              'walker' => new cornerstone_walker( array(
                  'in_top_bar' => true,
                  'item_type' => 'li'
              ) ),
          ) );
        }
      ?>
  </section>
</nav>
</div>
<nav id="floating"
data--350-bottom-bottom='opactity :1 !important;'
data--150-bottom-bottom='opactity :0 !important;'
>
	<img src="<?php echo get_stylesheet_directory_uri()?>/img/circe_wines_logo.gif">
	<img class="logotype" src="<?php echo get_stylesheet_directory_uri()?>/img/circe_wines_logotype.png">
	 <?php
      // Left Nav Section
      if ( has_nav_menu( 'header-menu-left' ) ) {
          wp_nav_menu( array(
              'theme_location' => 'header-menu-left',
              'container' => false,
              'depth' => 0,
              'items_wrap' => '<ul class="left">%3$s</ul>',
              'fallback_cb' => false,
              'after' => '<hr>',
          ) );
        }
      ?>
	<!-- </div> -->
</nav>

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
		<div class="large-offset-3 small-9 columns">
		<h1 class="entry-title"><?php the_title(); ?></h1>
		</div>
	</div>
</header>
