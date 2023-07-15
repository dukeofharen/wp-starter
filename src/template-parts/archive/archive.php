<?php
$page       = max( get_query_var( 'paged' ), 1 );
$object     = get_queried_object();
$query_args = [
	'post_type'   => 'post',
	'paged'       => $page,
	'orderby'     => 'post_date',
	'order'       => 'DESC',
	'post_status' => 'publish'
];

$search = get_query_var( "s" );
if ( $search ) {
	$query_args["s"] = $search;
}

$title = "";
if ( $object instanceof WP_Term ) {
	if ( $object->taxonomy === "category" ) {
		$query_args["cat"] = $object->term_id;
		$title             = translate( "Posts for category", "ducode-wp-starter" ) . " " . $object->name;
	} else if ( $object->taxonomy === "post_tag" ) {
		$query_args["tag_id"] = $object->term_id;
		$title                = translate( "Posts for tag", "ducode-wp-starter" ) . " " . $object->name;
	}
} else if ( $object instanceof WP_User ) {
	$query_args["author"] = $object->ID;
	$title                = translate( "Posts for user", "ducode-wp-starter" ) . " " . $object->display_name;
}

$paging_query = new WP_Query( $query_args );
?>
<div class="archive-page">
    <div class="inner container">
		<?php if ( $title ): ?>
            <h1><?php echo $title; ?></h1>
		<?php endif; ?>
        <div class="posts">
			<?php while ( $paging_query->have_posts() ) {
				$paging_query->the_post();
				get_template_part( "template-parts/archive/archive-item" );
			}

			wp_reset_query();
			?>

            <div class="paging">
				<?php echo paginate_links( array(
					'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
					'total'        => $paging_query->max_num_pages,
					'format'       => '?paged=%#%',
					'show_all'     => false,
					'type'         => 'plain',
					'end_size'     => 2,
					'mid_size'     => 1,
					'prev_next'    => true,
					'prev_text'    => sprintf( '<i></i> %1$s', __( '&lt;', 'tweedehandsauto' ) ),
					'next_text'    => sprintf( '%1$s <i></i>', __( '&gt;', 'tweedehandsauto' ) ),
					'add_args'     => false,
					'add_fragment' => '',
				) ); ?>
            </div>
        </div>
    </div>
</div>
