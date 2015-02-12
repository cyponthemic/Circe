<?php get_header(); ?>


	<div class="small-12 large-8 large-offset-4 window-height">

<?php
$datas='';
$path_layer=get_stylesheet_directory_uri().'/img/parallax/';
$layers=array(
				array('0-backgroung',0),
				array('1-vague-3',0.5),
				array('2-vague-4',0.8),
				array('3-bateau',0.3),
				array('4-vague-1',0.6),
				array('5-earth',0.1),
				array('6-writting',0.4),
				array('7-vague-1',0.3),
				array('8-flag',0.2),
				array('9-flag2',0.3),
				array('10-circe',0.4)
				);

echo '<ul id="scene" class="scene fullwidth" '.$datas.'>';
foreach ($layers as $layer):
echo '<li class="layer layers fullwidth " data-depth="'.$layer[1].'"><img src="'.$path_layer.$layer[0].'.png"></li>';
endforeach;
echo '</ul>';
?>

		
	</div>


<?php
get_footer();
?>

