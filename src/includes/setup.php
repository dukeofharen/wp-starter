<?php
if ( ! function_exists( 'starter_theme_setup' ) ) {
	function starter_theme_setup() {
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'title-tag' );
		add_theme_support(
			'post-formats',
			array(
				'link',
				'aside',
				'gallery',
				'image',
				'quote',
				'status',
				'video',
				'audio',
				'chat',
			)
		);
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 1568, 9999 );

		$menus = [
			[ "key" => "primary", "name" => "Primary menu" ],
			[ "key" => "footer1", "name" => "Footer menu 1" ],
			[ "key" => "footer2", "name" => "Footer menu 2" ],
			[ "key" => "footer3", "name" => "Footer menu 3" ]
		];

		foreach ( $menus as $menu ) {
			register_nav_menus(
				array(
					$menu["key"] => esc_html__( $menu["name"], 'ducode-wp-starter' )
				)
			);
		}

		add_theme_support(
			'html5',
			array(
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
				'navigation-widgets',
			)
		);
		add_theme_support( 'responsive-embeds' );
		add_theme_support( 'custom-line-height' );
		add_theme_support( 'custom-spacing' );
		add_filter( 'rss_widget_feed_link', '__return_empty_string' );
		add_filter( 'wps_breadcrumbs', 'filter_breadcrumbs' );
	}

	add_action( 'after_setup_theme', 'starter_theme_setup' );
}

function filter_breadcrumbs( $result ) {
	// Hide the breadcrumbs on the home / front page.
	if ( is_home() || is_front_page() ) {
		return false;
	}

	return $result;
}