<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <?php if ( is_singular() ) : ?>
            <?php the_title( '<h1 class="entry-title default-max-width">', '</h1>' ); ?>
        <?php else : ?>
            <?php the_title( sprintf( '<h2 class="entry-title default-max-width"><a href="%s">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
        <?php endif; ?>
    </header><!-- .entry-header -->

    <div class="entry-content">
        <?php
        wp_link_pages(
            array(
                'before'   => '<nav class="page-links" aria-label="' . esc_attr__( 'Page', 'ducode-wp-starter' ) . '">',
                'after'    => '</nav>',
                /* translators: %: Page number. */
                'pagelink' => esc_html__( 'Page %', 'ducode-wp-starter' ),
            )
        );

        ?>
    </div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->
