<?php
function split_on_newlines( $input ) {
	return preg_split( "/\r\n|\n|\r/", $input );
}

function is_whitespace( $input ) {
	return ctype_space( $input ) || $input == "";
}

function shorten( $input, $max_length = 300 ) {
	if ( strlen( $input ) < $max_length ) {
		return $input;
	}

	return substr( $input, 0, $max_length ) . "...";
}

function ws_get_category( $post = false ): array {
	$categories    = get_the_category();
	$category_name = "";
	$category_link = "";
	if ( sizeof( $categories ) > 0 ) {
		$category      = $categories[0];
		$category_name = $category->name;
		$category_link = get_category_link( $category );
	}

	return [ "name" => $category_name, "link" => $category_link ];
}

function ws_get_featured_image( $size, $post_thumbnail_id = false, $default_image_name = "default-image.webp" ) {
	$default_image = get_template_directory_uri() . "/public/static/img/" . $default_image_name;
	$result        = $default_image;
	if ( $post_thumbnail_id ) {
		$image = wp_get_attachment_image_src( $post_thumbnail_id, $size );
		if ( $image ) {
			$result = $image[0];
		}
	}

	return $result;
}

function get_current_url() {
	return $_SERVER['REQUEST_URI'];
}

function get_breadcrumbs() {
	global $wp_query;
	$result   = array();
	$result[] = array( "label" => translate( "Home", "mijn-borg" ), "link" => get_site_url(), "is_home" => true );

	$post = get_post();
	if ( is_archive() ) {
		$object = get_queried_object();
		if ( $object instanceof WP_Term ) {
			$title = single_cat_title( '', false );
			if ( $title ) {
				$result[] = array( "label" => $title, "link" => get_current_url() );
			}
		} else if ( $object instanceof WP_User ) {
			$result[] = array( "label" => $object->display_name, "link" => get_current_url() );
		} else if ( isset( $wp_query->query["year"] ) && $wp_query->query["monthnum"] ) {
			$result[] = array(
				"label" => $wp_query->query["year"] . "/" . $wp_query->query["monthnum"],
				"link"  => get_current_url()
			);
		}
	} else if ( is_404() ) {
		$result[] = array( "label" => translate( "Not found", "mijn-borg" ), "link" => get_current_url() );
	} else if ( is_search() ) {
		$result[] = array( "label" => get_query_var( "s" ), "link" => get_current_url() );
	} else if ( ! is_home() && ! is_front_page() && $post ) {
		if ( $post->post_type === "post" ) {
			$categories = get_the_category( $post );
			if ( $categories && sizeof( $categories ) ) {
				$category = $categories[0];
				$result[] = array( "label" => $category->name, "link" => get_category_link( $category ) );
			}

			$result[] = array( "label" => $post->post_title, "link" => get_permalink( $post ) );
		} else {
			$post_results   = array();
			$post_results[] = $post;
			while ( $post->post_parent ) {
				$post           = get_post( $post->post_parent );
				$post_results[] = $post;
			}

			$post_results = array_reverse( $post_results );
			foreach ( $post_results as $post_result ) {
				$result[] = array( "label" => $post_result->post_title, "link" => get_permalink( $post_result ) );
			}
		}
	}

	return apply_filters("wps_breadcrumbs", $result);
}