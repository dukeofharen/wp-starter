<?php
$title = get_the_title();
$author = get_the_author();
$author_link = get_author_posts_url($post->post_author);
$category = ws_get_category();
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
            <?php if($post->post_type === "post"): ?>
            <div class="metadata">
                <h2><a href="<?php echo $author_link; ?>"><?php echo $author; ?></a> | <a
                            href="<?php echo $category["link"]; ?>"><?php echo $category["name"]; ?></a></h2>
                <p>
		            <?php echo the_date(); ?>, <?php echo get_the_time(); ?>
                </p>
            </div>
            <?php endif; ?>
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