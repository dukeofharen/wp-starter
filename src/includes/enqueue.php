<?php
$theme_version = wp_get_theme()->get( 'Version' );
function starter_scripts() {
	global $theme_version;
//	wp_enqueue_style('starter-style', get_template_directory_uri() . '/assets/css/style.css', array(), $theme_version);
//
	$template_dir = get_template_directory_uri();

	// jQuery
	wp_enqueue_script( "jquery" );

	// Load site script
	wp_enqueue_script(
		"wp-starter-js",
		$template_dir . "/public/scripts/main.bundle.js",
		array(),
		$theme_version,
		true
	);
//
//	// Landing page
//	wp_enqueue_script(
//		'landing-page-js',
//		get_template_directory_uri() . '/assets/js/landing-page.js',
//		array(),
//		$theme_version,
//		true
//	);
//
//	// lease.auto
//	wp_enqueue_script(
//		'lease.auto-js',
//		'https://partner.lease.auto/js/calculator.js',
//		array(),
//		$theme_version,
//		true
//	);
//
//	// Site scripts
//	wp_enqueue_script(
//		'site-js',
//		get_template_directory_uri() . '/assets/js/site.js',
//		array(),
//		$theme_version,
//		true
//	);
//	wp_enqueue_script(
//		'home-js',
//		get_template_directory_uri() . '/assets/js/home.js',
//		array(),
//		$theme_version,
//		true
//	);
//	wp_enqueue_script(
//		'viewed-by-others-js',
//		get_template_directory_uri() . '/assets/js/viewed-by-others.js',
//		array(),
//		$theme_version,
//		true
//	);
//	wp_enqueue_script(
//		'search-js',
//		get_template_directory_uri() . '/assets/js/search.js',
//		array(),
//		$theme_version,
//		true
//	);
//	wp_enqueue_script(
//		'vehicle-details-js',
//		get_template_directory_uri() . '/assets/js/vehicle-details.js',
//		array(),
//		$theme_version,
//		true
//	);
//
//	// TwentyTwenty
//	wp_enqueue_script(
//		'jquery-event-move-js',
//		get_template_directory_uri() . '/assets/vendor/twentytwenty/jquery.event.move.js',
//		array(),
//		$theme_version,
//		true
//	);
//	wp_enqueue_script(
//		'twentytwenty-js',
//		get_template_directory_uri() . '/assets/vendor/twentytwenty/twentytwenty.js',
//		array(),
//		$theme_version,
//		true
//	);
//	wp_enqueue_style('twentytwenty-style', get_template_directory_uri() . '/assets/vendor/twentytwenty/twentytwenty.css', array(), $theme_version);
//
//	// Lottie
//	wp_enqueue_script(
//		'lottie-player-js',
//		get_template_directory_uri() . '/assets/vendor/lottie/lottie-player.js',
//		array(),
//		$theme_version,
//		true
//	);
//
//	// FontAwesome
//	wp_enqueue_style('fontawesome-style', get_template_directory_uri() . '/assets/vendor/fontawesome/css/all.min.css', array(), $theme_version);
}

add_action( 'wp_enqueue_scripts', 'starter_scripts' );