<?php
$site_url      = get_site_url();
$template_path = get_template_directory_uri();
$site_name     = get_bloginfo( 'name' );
?>
<div class="main-menu">
    <div class="container inner">
        <div class="main-menu-mobile-bar" id="main-menu-mobile-bar">
            <div>
                <i class="bi bi-list menu-icon"></i>
                <span>Menu</span>
            </div>
            <div class="logo">
                <a href="<?php echo $site_url; ?>">
                    <img src="<?php echo $template_path; ?>/public/static/img/logo.png"
                         alt="<?php echo $site_name; ?>"/>
                </a>
            </div>
        </div>
        <div class="logo">
            <a href="<?php echo $site_url; ?>">
                <img src="<?php echo $template_path; ?>/public/static/img/logo.png" alt="<?php echo $site_name; ?>"/>
            </a>
        </div>
		<?php wp_nav_menu( array(
			"theme_location"  => "primary",
			"menu_class"      => "main-menu-ul",
			"container_class" => "menu",
			"container_id"    => "main-menu-container"
		) ); ?>
    </div>
</div>
