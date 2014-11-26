<?php

// Enqueue CSS and scripts

function load_cornerstone_child_scripts() {
	
	wp_enqueue_style(
		'icon_css',
		get_stylesheet_directory_uri() . '/css/genericons.css',
		false,
		'all'
	);
	
	wp_enqueue_style(
		'circe_css',
		get_stylesheet_directory_uri() . '/css/style.css',
		false,
		'all'
	);
	
	wp_enqueue_style(
		'cornerstone_child_css',
		get_stylesheet_directory_uri() . '/style.css',
		false,
		'all'
	);
	
	wp_enqueue_script(
	'skrollr',
	get_stylesheet_directory_uri() . '/js/skrollr.js',
	array(),
	'1.0',
	true
	);
	
	wp_enqueue_script(
	'cornerstone_child_js',
	get_stylesheet_directory_uri() . '/js/app.js',
	array(),
	'1.0',
	true
	);
	
	
	
}

add_action('wp_enqueue_scripts', 'load_cornerstone_child_scripts',50);



// WOOCOMERCE DISABLE STYLES
add_filter( 'woocommerce_enqueue_styles', '__return_false' );

//WOOCOMERCE DROPDOWN

// Place the following code in your theme's functions.php file
// override the quantity input with a dropdown

function woocommerce_quantity_input_dd() {

global $product;
$defaults = array(
'input_name' => 'quantity',
'input_value' => '1',
'max_value' => apply_filters( 'woocommerce_quantity_input_max', '', $product ),
'min_value' => apply_filters( 'woocommerce_quantity_input_min', '', $product ),
'step' => apply_filters( 'woocommerce_quantity_input_step', '1', $product ),
'style'	=> apply_filters( 'woocommerce_quantity_style', 'float:left; margin-right:10px;', $product )
);
if ( ! empty( $defaults['min_value'] ) )
$min = $defaults['min_value'];
else $min = 1;
if ( ! empty( $defaults['max_value'] ) )
$max = $defaults['max_value'];
else $max = 20;
if ( ! empty( $defaults['step'] ) )
$step = $defaults['step'];
else $step = 1;
$options = '';
for ( $count = $min; $count <= $max; $count = $count+$step ) {
$options .= '<option value="' . $count . '">' . $count . '</option>';
}
echo '<div class="quantity_select" style="' . $defaults['style'] . '"><select name="' . esc_attr( $defaults['input_name'] ) . '" title="' . _x( 'Qty', 'Product quantity input tooltip', 'woocommerce' ) . '" class="qty">' . $options . '</select></div>';

} 


add_action('woocommerce_single_product_summary', 'Professionalrating',25);


function Professionalrating(){
echo get_the_ID();
}
?>