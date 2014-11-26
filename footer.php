<div id="footer">
	<footer class="row">
	<div class="small-13  columns logo">
	<img class="logotype centered" src="<?php echo get_stylesheet_directory_uri()?>/img/circe_wines_logotype_wb.png">
	</div>
		<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer Sidebar')) : ?>
		<?php endif; ?>
		<?php if ( has_nav_menu( 'footer-menu' ) ) {
			echo '<div class="row">';
			wp_nav_menu( array( 'theme_location' => 'footer-menu', 'menu_class' => 'inline-list', 'container' => 'nav', 'container_class' => 'small-12 medium-12 columns' ) );
			echo '</div>';
		} ?>
	<div class="small-13  columns logo">
	<img class="logotype centered" src="<?php echo get_stylesheet_directory_uri()?>/img/circe_wines_logotype_wb.png">
	</div>
	</footer>
</div>
<?php wp_footer(); ?>
</body>
</html>