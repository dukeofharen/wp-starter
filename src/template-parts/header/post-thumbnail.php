<?php
if ( ! is_archive() && ! is_front_page() ):
	$post = get_post();
	$featured_image = has_post_thumbnail() ?
		wp_get_attachment_image_src( get_post_thumbnail_id(), "medium_full" )[0] : "";
	if ( $featured_image ):
		?>
        <header class="post-thumbnail" style="background-image: url(<?php echo $featured_image; ?>);"></header>
	<?php
	endif;
endif;