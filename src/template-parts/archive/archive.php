<?php
global $wp_query;
$query = $args['query'] ?? $wp_query;
$page   = max( get_query_var( 'paged' ), 1 );
$object = get_queried_object();
$title  = "";
$search = get_search_query();
if ( $object instanceof WP_Term ) {
	if ( $object->taxonomy === "category" ) {
		$title = translate( "Posts for category", "hamam" ) . " " . $object->name;
	} else if ( $object->taxonomy === "post_tag" ) {
		$title = translate( "Posts for tag", "hamam" ) . " " . $object->name;
	}
} else if ( $object instanceof WP_User ) {
	$title = translate( "Posts for user", "hamam" ) . " " . $object->display_name;
} else if ( isset( $query->query["year"] ) && $query->query["monthnum"] ) {
	$title = translate( "Posts for year and month", "hamam" )." " . $query->query["year"] . "/" . $query->query["monthnum"];
} else if ( $search ) {
	$title = translate( "Search results for", "hamam" ) . " '" . $search . "'";
}
?>
<div class="archive-page">
    <div class="inner container">
		<?php if ( $title ): ?>
            <h1><?php echo $title; ?></h1>
		<?php endif; ?>
        <div class="posts">
			<?php while ( $query->have_posts() ) {
				$query->the_post();
				get_template_part( "template-parts/archive/archive-item" );
			}

			wp_reset_query();
			?>

            <div class="paging">
				<?php echo paginate_links( array(
					'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
					'total'        => $query->max_num_pages,
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
