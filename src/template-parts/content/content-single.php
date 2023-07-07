<?php
$post = get_post();
$title = get_the_title();
$author = get_the_author();
$author_link = get_author_posts_url($post->post_author);
$categories = get_the_category();
$category_name = "";
$category_link = "";
if (sizeof($categories) > 0) {
    $category = $categories[0];
    $category_name = $category->name;
    $category_link = get_category_link($category);
}
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="container inner">

        <div class="post-contents">
            <header>
                <div class="entry-title">
                    <h1><?php echo $title; ?></h1>
                </div>
                <?php breadcrumbs(); ?>
                <?php if (has_post_thumbnail()): ?>
                    <?php $thumbnail = get_the_post_thumbnail_url(); ?>
                    <img class="post-thumbnail" src="<?php echo $thumbnail; ?>" alt="<?php echo $title; ?>"/>
                <?php endif; ?>
            </header>

            <div class="entry-content">
                <?php
                the_content();
                wp_link_pages(
                    array(
                        'before' => '<nav class="page-links" aria-label="' . esc_attr__('Page', '') . '">',
                        'after' => '</nav>',
                        'pagelink' => esc_html__('Page %', 'ducode-wp-starter'),
                    )
                );
                ?>
            </div><!-- .entry-content -->

            <div class="post-metadata">
                <div class="left">
                    <h2><a href="<?php echo $author_link; ?>"><?php echo $author; ?></a> | <a
                                href="<?php echo $category_link; ?>"><?php echo $category_name; ?></a></h2>
                    <p>
                        <?php echo the_date(); ?>, <?php echo the_time(); ?>
                    </p>
                </div>
                <div class="right">
                    <?php add_to_any(); ?>
                </div>
            </div>
        </div>
        <div class="popular-posts">
            <?php
            popular_posts([
                "header" => "Meest gelezen nieuws",
                "thumbnail_width" => 75,
                "thumbnail_height" => 75,
                "post_html" => '<li class="popular-post"><img src="{thumb_url}" title="{title_attr} "/> <span>{title}</span></li>'
            ]);
            ?>
        </div>
    </div>

</article><!-- #post-<?php the_ID(); ?> -->
