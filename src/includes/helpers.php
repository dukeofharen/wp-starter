<?php
function split_on_newlines($input)
{
	return preg_split("/\r\n|\n|\r/", $input);
}

function is_whitespace($input)
{
	return ctype_space($input) || $input == "";
}

function shorten($input, $max_length = 300)
{
	if (strlen($input) < $max_length) {
		return $input;
	}

	return substr($input, 0, $max_length) . "...";
}

function ws_get_category($post = false)
{
	$categories = get_the_category();
	$category_name = "";
	if (sizeof($categories) > 0) {
		$category = $categories[0];
		$category_name = $category->name;
	}

	return $category_name;
}

function ws_get_featured_image($size, $post_thumbnail_id = false, $default_image_name = "default-image.webp")
{
	$default_image = get_template_directory_uri() . "/public/static/img/" . $default_image_name;
	$result = $default_image;
	if ($post_thumbnail_id) {
		$image = wp_get_attachment_image_src($post_thumbnail_id, $size);
		if ($image) {
			$result = $image[0];
		}
	}

	return $result;
}