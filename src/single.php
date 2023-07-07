<?php
get_header();
?>
    <div class="page-post-content">
<?php
/* Start the Loop */
while (have_posts()) :
    the_post();

    get_template_part('template-parts/content/content-single');

    if (is_attachment()) {
        // Parent post navigation.
        the_post_navigation(
            array(
                /* translators: %s: Parent post link. */
                'prev_text' => sprintf(__('<span class="meta-nav">Published in</span><span class="post-title">%s</span>', 'ducode-wp-starter'), '%title'),
            )
        );
    }

    ?>
    <div class="comments">
        <div class="inner container">
            <?php
            // If comments are open or there is at least one comment, load up the comment template.
            if (comments_open() || get_comments_number()) {
                comments_template();
            }
            ?>
        </div>
    </div>
    </div>

<?php
endwhile; // End of the loop.
get_footer();
