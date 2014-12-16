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
	'slimscroll',
	get_stylesheet_directory_uri() . '/js/jquery.slimscroll.min.js',
	array(),
	'1.0',
	true
	);
	
	wp_enqueue_script(
	'isotope',
	get_stylesheet_directory_uri() . '/js/isotope.pkgd.js',
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

// PERSONAL CUSTOMING FOR SCROLLSLIM
function scrollslim_class() {
				if (strlen(get_the_content())>300):
						$class_scrolling= "SSscroll";
						else:
						$class_scrolling= "SSno-scroll";
						endif;
						echo $class_scrolling;
				}		

//Display product name
function the_product_reviewed() {
	$product= get_field('wine');
	$wcproduct = new WC_Product($product->ID);
	
	if ($wcproduct->is_in_stock()){
	$price = $wcproduct->price;
	/* var_dump($wcproduct); */
	echo '<a class="to-product" href="';
	echo $product->guid;
	echo '">';
	echo $product->post_title;
	
	echo " - ".$price." $</a>";
	}
	
	else {
	echo '<a class="to-product" href="';
	echo $product->guid;
	echo '">';
	echo $product->post_title;
	echo "</a>";}	
	}
	
        
	
//Isotope classes
	function isotope_classes($plugin,$entry) {
		if($plugin=='WC'):
		$product= get_field('wine');
		$wcproduct = new WC_Product($product->ID);
		$subheadingvalues = get_the_terms( $wcproduct->id, 'pa_'.$entry);
		foreach ( $subheadingvalues as $subheadingvalue ) {
		$l= str_replace(' ','-',$subheadingvalue->name)." ";
		echo str_replace('.','-',$l)." ";}
		else:
		$m= str_replace(' ','-',get_field('author'))." ";
		echo str_replace('.','-',$m)." ";
		endif;
		}
		
//Super isotope classes
	function super_isotope_classes() {
		isotope_classes('WC','wine');
		
		isotope_classes('WC','vintage');
		isotope_classes('WC','name');
		isotope_classes('WC','winename');
		isotope_classes('WP','author');
	}
//Isotope filter 
	
	function isotope_filter($plugin,$entry) {
		$field_filter=array();
		$loop = new WP_Query( array( 'post_type' => 'review') );
		while ( $loop->have_posts() ) : $loop->the_post();
		$product= get_field('wine');
		$wcproduct = new WC_Product($product->ID);
		if($plugin=='WC'):
			$subheadingvalues = get_the_terms( $wcproduct->id, 'pa_'.$entry);
			foreach ( $subheadingvalues as $subheadingvalue ) {
					$field=$subheadingvalue->name;
					array_push($field_filter,$field);}
		else:
			$field=get_field($entry);
		array_push($field_filter,$field);
		endif;
		endwhile;
		$field_filter_unique=array_unique($field_filter);
		/* var_dump($vintage_filter_unique); */
		
		foreach ( $field_filter_unique as $vu ) {
		$vu_class=str_replace(' ','-',$vu);
		$vu_class=str_replace('.','-',$vu_class);
		echo'<button class="filter" data-filter=".'.$vu_class.'">'.$vu.'</button>';
		}
	}



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
echo '<Span>Last rating'.' by '.'. ->see all</span>';
}

//TAB TEMPLATING

add_filter( 'woocommerce_product_tabs', 'woo_rename_tabs', 98 );
function woo_rename_tabs( $tabs ) {
 
	$tabs['description']['title'] = __( 'Description' );		// Rename the description tab
	$tabs['reviews']['title'] = __( 'Comments' );				// Rename the reviews tab
 
	return $tabs;
 
}
add_filter( 'woocommerce_product_tabs', 'woo_reorder_tabs', 98 );
function woo_reorder_tabs( $tabs ) {
 
	$tabs['reviews']['priority'] = 20;			// Reviews first
	$tabs['description']['priority'] = 10;			// Description second
	$tabs['reviews-award']['priority'] = 15;	// Additional information third
 
	return $tabs;
}





add_filter( 'woocommerce_product_tabs', 'woo_new_product_tab' );
function woo_new_product_tab( $tabs ) {
	
	// Adds the new tab
	
	$tabs['reviews-award'] = array(
		'title' 	=> __( 'Reviews & Awards', 'woocommerce' ),
		'priority' 	=> 50,
		'callback' 	=> 'woo_new_product_tab_content'
	);
 
	return $tabs;
 
}
function woo_new_product_tab_content() {
 
	// The new tab content
	$WPID= get_the_id();
	echo '<h2>Reviews</h2>';
	echo '<p>for '.$WPID.'</p>';
	echo '<div class="row">';
	
	$loop = new WP_Query( 
			array( 
					'post_type' => 'review',
					'posts_per_page'=>0
				) 
			);
			
	while ( $loop->have_posts() ) : $loop->the_post();
	echo '<div class="row">';
	
	$productwine= get_field('wine');
	$WCID=$productwine->ID;
	
	if($WPID==$WCID):
	echo '<h2>'.get_field('author');
	if(get_field('Rating')>1){
		echo ' - '.get_field('Rating').' pts';
		}
	echo '</h2>';
	echo '<p>'.the_content().'</p>';
	endif;
	echo '</div>';
	endwhile;
	wp_reset_postdata();
	echo '</div>';
}







?>