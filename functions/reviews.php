<?php
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
?>