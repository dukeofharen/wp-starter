<?php
$theme_version = wp_get_theme()->get( 'Version' );
function starter_scripts() {
	global $theme_version;
	$template_dir = get_template_directory_uri();
	$template_path = get_template_directory();

	// Load site script
	wp_enqueue_script(
		"wp-starter-js",
		$template_dir . "/public/scripts/main.bundle.js",
		array(),
		$theme_version,
		true
	);

	// Load site style, if found (only exists if running in "production" mode).
	$style_path = $template_path . "/public/main.bundle.css";
	if(file_exists($style_path)) {
		wp_enqueue_style('starter-style', get_template_directory_uri() . '/public/main.bundle.css', array(), $theme_version);
	}
}

add_action( 'wp_enqueue_scripts', 'starter_scripts' );