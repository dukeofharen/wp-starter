<?php
get_header();
?>
    <div class="page-post-content">
		<?php
		while ( have_posts() ) :
			the_post();
			get_template_part( "template-parts/content/content" );
		endwhile;
		?>

    </div>
<?php
get_footer();
