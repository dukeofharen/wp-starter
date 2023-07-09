<?php
$site_url      = get_site_url();
$site_name = get_bloginfo( 'name' );
$year      = date( 'Y' );
?>
<div class="copyright-footer">
    <div class="container inner">
        &copy; <?php echo $year; ?> <a href="<?php echo $site_url; ?>"><?php echo $site_name; ?></a>
    </div>
</div>
