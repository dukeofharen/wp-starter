<?php
$newest_query = $args["newest_query"] ?? null;
$paging_query = $args["paging_query"] ?? null;
?>
<div class="tha-archive">
    <div class="inner container">
        <div class="news-items-wrapper">
            <div class="newest-news-items">
                <?php while ($newest_query->have_posts()) {
                    $newest_query->the_post();
                    get_template_part("template-parts/news/news-block");
                }
                ?>
            </div>
            <div class="paged-news-items">
                <?php while ($paging_query->have_posts()) {
                    $paging_query->the_post();
                    get_template_part("template-parts/news/paged-news-item");
                }

                wp_reset_query();
                ?>

                <div class="paging">
                    <?php echo paginate_links(array(
                        'base' => str_replace(999999999, '%#%', esc_url(get_pagenum_link(999999999))),
                        'total' => $paging_query->max_num_pages,
                        'format' => '?paged=%#%',
                        'show_all' => false,
                        'type' => 'plain',
                        'end_size' => 2,
                        'mid_size' => 1,
                        'prev_next' => true,
                        'prev_text' => sprintf('<i></i> %1$s', __('&lt;', 'ducode-wp-starter')),
                        'next_text' => sprintf('%1$s <i></i>', __('&gt;', 'ducode-wp-starter')),
                        'add_args' => false,
                        'add_fragment' => '',
                    )); ?>
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
</div>