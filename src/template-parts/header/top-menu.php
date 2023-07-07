<?php
$post = get_post();
$wrapper_classes = 'site-header';
$show_menu = $post->post_type != 'page' || get_custom_field_value("toon-top-menu");
$template_uri = get_template_directory_uri();
$site_url = get_site_url();
$menu_items = get_menu_items_by_registered_slug("primary");
?>
<?php if ($show_menu): ?>
    <div class="top-menu" id="top-menu">
        <div class="inner container">
            <a href="<?php echo $site_url; ?>" class="logo">
                <img src="<?php echo $template_uri; ?>/assets/img/logo.png" />
            </a>
            <ul class="menu-items">
                <?php foreach ($menu_items as $menu_item): ?>
                    <?php
                    $object_id = $menu_item->object_id;
                    $icon_name = get_custom_field_value("icoon", $menu_item);
                    $is_button = get_custom_field_value("is_knop", $menu_item);
                    $permalink = get_permalink($object_id);
                    $css_classes = array("regular");
                    if ($is_button) {
                        $css_classes[] = "menu-button";
                    }

                    if ($post->ID == $object_id) {
                        $css_classes[] = "current-page";
                    }
                    ?>
                    <li class="<?php echo join(" ", $css_classes); ?>">
                        <a href="<?php echo $permalink; ?>">
                            <?php if ($icon_name): ?>
                                <img
                                        src="<?php echo $template_uri; ?>/assets/img/menu-icons/<?php echo $icon_name; ?>.svg"/>
                            <?php endif; ?>
                            <span><?php echo $menu_item->title; ?></span>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
            <div class="mobile-menu-button">
                <input type="checkbox" class="open-sidebar-menu" id="open-sidebar-menu">
                <label for="open-sidebar-menu" class="sidebar-icon-toggle">
                    <div class="spinner diagonal part-1"></div>
                    <div class="spinner horizontal"></div>
                    <div class="spinner diagonal part-2"></div>
                </label>
            </div>
        </div>
    </div>
    <div id="sidebar-menu" class="mobile-menu">
        <ul class="sidebar-menu-inner">
            <?php foreach ($menu_items as $menu_item): ?>
                <?php
                $object_id = $menu_item->object_id;
                $is_button = get_custom_field_value("is-registratiepagina", $object_id);
                $permalink = get_permalink($object_id);
                $css_classes = array();
                if ($is_button) {
                    $css_classes[] = "register";
                }

                if ($post->ID == $object_id) {
                    $css_classes[] = "current-page";
                }
                ?>
                <li class="<?php echo join(" ", $css_classes); ?>">
                    <a href="<?php echo $permalink; ?>"><?php echo $menu_item->title; ?></a>
                </li>
            <?php endforeach; ?>
        </ul>
        <div class="socials">
            <a href="mailto:<?php echo EMAIL; ?>" class="social-button social-icon icon-email"></a>
            <a href="<?php echo FACEBOOK_URL; ?>" class="social-button social-icon icon-facebook"></a>
            <a href="<?php echo TWITTER_URL; ?>" class="social-button social-icon icon-twitter"></a>
            <a href="<?php echo INSTAGRAM_URL; ?>" class="social-button social-icon icon-instagram"></a>
        </div>
    </div>
<?php endif; ?>