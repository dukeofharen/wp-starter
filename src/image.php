<?php
get_header();
?>
    <div class="image-post">
		<?php
		while ( have_posts() ) :
			the_post();
			?>
            <div class="inner container">
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <div class="post-contents">
                        <header>
                            <div class="entry-title">
                                <h1><?php echo get_the_title(); ?></h1>
                            </div>
                        </header>
                        <div class="entry-content">
                            <figure class="wp-block-image">
								<?php
								$image_size = apply_filters( 'ws_attachment_size', 'full' );
								echo wp_get_attachment_image( get_the_ID(), $image_size );
								?>

								<?php if ( wp_get_attachment_caption() ) : ?>
                                    <figcaption
                                            class="wp-caption-text"><?php echo wp_kses_post( wp_get_attachment_caption() ); ?></figcaption>
								<?php endif; ?>
                            </figure>

							<?php
							the_content();
							?>
                        </div>
                    </div>
                </article>
                <div class="comments">
					<?php
					// If comments are open or there is at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) {
						comments_template();
					}
					?>
                </div>
            </div>
		<?php
		endwhile;
		?>

    </div>
<?php
get_footer();
