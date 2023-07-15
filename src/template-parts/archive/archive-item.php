<?php
$post = get_post();
$link = get_permalink();
$category_name = ws_get_category();
$post_title = $post->post_title;
$excerpt = $post->post_excerpt ?: shorten(wp_strip_all_tags(get_the_content()));
$featured_image = ws_get_featured_image([150, 150], get_post_thumbnail_id(), "default-post-image.png");
?>
<div class="item grid-container">
    <div class="image">
        <a href="<?php echo $link; ?>"><img src="<?php echo $featured_image; ?>" alt="<?php echo $post_title; ?>" title="<?php echo $post_title; ?>"/></a>
    </div>
    <div class="excerpt">
        <h3 class="category-date"><?php echo $category_name; ?> <?php echo get_the_time("d-m-Y"); ?></h3>
        <h2 class="title"><a href="<?php echo $link; ?>"><?php echo $post_title; ?></a></h2>
        <div class="content-wrapper">
            <span class="content"><?php echo $excerpt; ?></span>
            <a href="<?php echo $link; ?>" class="read-more-link"><?php _e("Read more", "ducode-wp-starter"); ?></a>
        </div>
    </div>
</div>
