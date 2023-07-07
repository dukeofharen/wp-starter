<?php
get_header();
$newest_query = new WP_Query([
    'post_type' => 'post',
    'posts_per_page' => 4,
    'orderby' => 'post_date',
    'order' => 'DESC',
    'post_status' => 'publish'
]);

$page = max(get_query_var('paged'), 1);
$object = get_queried_object();
$query_args = [
    'post_type' => 'post',
    'paged' => $page,
    'orderby' => 'post_date',
    'order' => 'DESC',
    'post_status' => 'publish'
];
switch ($object->taxonomy) {
    case "category":
        $query_args["cat"] = $object->term_id;
        break;
    case "post_tag":
        $query_args["tag_id"] = $object->term_id;
        break;
}

$paging_query = new WP_Query($query_args);
get_template_part("template-parts/archive/archive", "archive", ["newest_query" => $newest_query, "paging_query" => $paging_query]);
get_footer();
