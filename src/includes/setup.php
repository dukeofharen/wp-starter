<?php
if (!function_exists('starter_theme_setup')) {
	function starter_theme_setup()
	{
		add_theme_support('automatic-feed-links');
		add_theme_support('title-tag');
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
		add_theme_support('post-thumbnails');
		set_post_thumbnail_size(1568, 9999);
		register_nav_menus(
			array(
				'primary' => esc_html__('Primary menu', 'ducode-wp-starter'),
				'footer1' => esc_html__('Footer menu 1', 'ducode-wp-starter'),
				'footer2' => esc_html__('Footer menu 2', 'ducode-wp-starter'),
				'footer3' => esc_html__('Footer menu 3', 'ducode-wp-starter'),
			)
		);
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
		add_theme_support('responsive-embeds');
		add_theme_support('custom-line-height');
		add_theme_support('custom-spacing');
		add_filter('rss_widget_feed_link', '__return_empty_string');
	}

	add_action('after_setup_theme', 'starter_theme_setup');
}