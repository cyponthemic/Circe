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



?>