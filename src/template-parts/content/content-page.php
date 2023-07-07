<?php
$title = get_the_title();
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <div class="inner container">
        <div class="post-contents">
            <header>
                <div class="entry-title">
                    <h1><?php echo $title; ?></h1>
                </div>
                <?php breadcrumbs(); ?>
                <?php if (has_post_thumbnail()): ?>
                    <?php $thumbnail = get_the_post_thumbnail_url(); ?>
                    <img class="post-thumbnail" src="<?php echo $thumbnail; ?>" alt="<?php echo $title; ?>"/>
                <?php endif; ?>
            </header>
            <div class="entry-content">
                <?php
                the_content();
                ?>
            </div><!-- .entry-content -->
        </div>
    </div>


    <?php if (get_edit_post_link()) : ?>
        <footer class="entry-footer default-max-width">
            <?php
            edit_post_link(
                sprintf(
                /* translators: %s: Post title. Only visible to screen readers. */
                    esc_html__('Edit %s', 'ducode-wp-starter'),
                    '<span class="screen-reader-text">' . get_the_title() . '</span>'
                ),
                '<span class="edit-link">',
                '</span>'
            );
            ?>
        </footer>
    <?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->
