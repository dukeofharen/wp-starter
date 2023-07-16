<?php
$breadcrumbs = get_breadcrumbs();
?>
<?php if ( $breadcrumbs && sizeof( $breadcrumbs ) > 0 ): ?>
    <div class="breadcrumbs">
        <div class="inner container">
            <ul>
				<?php foreach ( $breadcrumbs as $breadcrumb ): ?>
                    <li><a href="<?php echo $breadcrumb["link"]; ?>"><?php echo $breadcrumb["label"]; ?></a></li>
				<?php endforeach; ?>
            </ul>
        </div>
    </div>
<?php endif; ?>