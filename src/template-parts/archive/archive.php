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
$title = "Todo"; // TODO set title
switch ( $object->taxonomy ) {
	case "category":
		$query_args["cat"] = $object->term_id;
		break;
	case "post_tag":
		$query_args["tag_id"] = $object->term_id;
		break;
	// TODO add author
}

$paging_query = new WP_Query( $query_args );
?>
<div class="archive-page">
    <div class="inner container">
        <h1><?php echo $title; ?></h1>
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
