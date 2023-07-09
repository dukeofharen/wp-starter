<?php
$menus = array( "footer1", "footer2", "footer3" );
?>
<div class="menu-widgets-footer">
	<div class="container inner grid-container">
        <div class="widgets">
	        <?php dynamic_sidebar( "footer" ); ?>
        </div>
		<?php foreach($menus as $menu): ?>
			<div class="footer-menu-wrapper">
                <h6><?php echo wp_get_nav_menu_name( $menu ); ?></h6>
				<?php wp_nav_menu( array(
					"theme_location"  => $menu,
					"menu_class"      => "footer-menu-ul",
					"container_class" => "footer-menu-container",
					"container_id"    => "footermenu-" . $menu
				) ); ?>
			</div>
		<?php endforeach; ?>
	</div>
</div>