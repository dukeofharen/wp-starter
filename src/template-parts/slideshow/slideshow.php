<?php
$query_args = [
	'post_type'      => 'post',
	'orderby'        => 'post_date',
	'order'          => 'DESC',
	'post_status'    => 'publish',
	'posts_per_page' => 5
];
$query      = new WP_Query( $query_args );
if ( $query->have_posts() ):
	?>
    <div class="swiper slideshow">
        <div class="swiper-wrapper">
			<?php
			while ( $query->have_posts() ):
				$query->the_post();
				$post           = get_post();
				$featured_image = ws_get_featured_image( "medium_full", get_post_thumbnail_id(), "default-post-image-large.jpg" );
				$link           = get_permalink();
				?>
                <div class="swiper-slide">
                    <a href="<?php echo $link; ?>">
                        <div class="content" style="background-image: url(<?php echo $featured_image; ?>);">
                            <div class="container">
                                <h1><?php echo get_the_title(); ?></h1>
                            </div>
                        </div>
                    </a>
                </div>
			<?php
			endwhile;
			wp_reset_query();
			?>
        </div>
    </div>
<?php
endif;
?>