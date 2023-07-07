<?php
get_header();
?>
    <div class="page-post-content">
        <?php
        while (have_posts()) :
            the_post();
            get_template_part('template-parts/content/content-page');
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
        <?php
        endwhile; // End of the loop.
        ?>

    </div>
<?php
get_footer();
