<?php
function starter_widgets_init()
{
	register_sidebar(
		array(
			'name' => esc_html__('Footer', 'ducode-wp-starter'),
			'id' => 'sidebar-1',
			'description' => esc_html__('Add widgets here to appear in your footer.', 'ducode-wp-starter'),
			'before_widget' => '',
			'after_widget' => '',
			'before_title' => '<h2 class="widget-title">',
			'after_title' => '</h2>',
		)
	);
}

add_action('widgets_init', 'starter_widgets_init');