<?php
get_header();
$title = get_the_title();
?>
    <div class="page-post-content">
		<?php
		while ( have_posts() ) :
			the_post();
			?>

            <div class="inner container">
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <div class="post-contents">
                        <header>
                            <div class="entry-title">
                                <h1><?php echo $title; ?></h1>
                            </div>
                        </header>
                        <div class="entry-content">
							<?php
							the_content();
							?>
                        </div>
                    </div>

					<?php if ( get_edit_post_link() ) : ?>
                        <footer class="entry-footer default-max-width">
							<?php
							edit_post_link(
								sprintf(
								/* translators: %s: Post title. Only visible to screen readers. */
									esc_html__( 'Edit %s', 'ducode-wp-starter' ),
									'<span class="screen-reader-text">' . get_the_title() . '</span>'
								),
								'<span class="edit-link">',
								'</span>'
							);
							?>
                        </footer>
					<?php endif; ?>
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
		endwhile; // End of the loop.
		?>

    </div>
<?php
get_footer();
