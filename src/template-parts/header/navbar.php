<!-- TODO logo -->
<div class="main-menu">
    <div class="container inner">
        <div class="main-menu-mobile-bar" id="main-menu-mobile-bar"><i class="bi bi-list menu-icon"></i>
            <span>Menu</span>
        </div>
	    <?php wp_nav_menu( array(
		    "theme_location"  => "primary",
		    "menu_class"      => "main-menu-ul",
		    "container_class" => "menu",
		    "container_id"    => "main-menu-container"
	    ) ); ?>
    </div>
</div>
