<?php
function starter_widgets_init() {
	$areas = [
		[ "key" => "footer", "name" => "Footer", "description" => 'Add widgets here to appear in your footer.' ]
	];
	foreach ( $areas as $area ) {
		register_sidebar(
			array(
				'name'          => esc_html__( $area["name"], 'ducode-wp-starter' ),
				'id'            => $area["key"],
				'description'   => esc_html__( $area["description"], 'ducode-wp-starter' ),
				'before_widget' => '',
				'after_widget'  => '',
				'before_title'  => '<h2 class="widget-title">',
				'after_title'   => '</h2>',
			)
		);
	}

}

add_action( 'widgets_init', 'starter_widgets_init' );