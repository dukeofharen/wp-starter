<?php
/* Template Name: Blog

Useful for showing blog posts on a custom page.
*/
$page         = max( get_query_var( 'paged' ), 1 );
$paging_query = new WP_Query( [
	'post_type'   => 'post',
	'paged'       => $page,
	'orderby'     => 'post_date',
	'order'       => 'DESC',
	'post_status' => 'publish'
] );
get_header();
get_template_part( "template-parts/archive/archive", "archive", [ "query" => $paging_query ] );
get_footer();
