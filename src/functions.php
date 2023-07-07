<?php
$overrides_index_path = __DIR__ . "/overrides/index.php";
if ( file_exists( $overrides_index_path ) ) {
	require $overrides_index_path;
}

require __DIR__ . "/includes/enqueue.php";
require __DIR__ . "/includes/helpers.php";
require __DIR__ . "/includes/setup.php";
require __DIR__ . "/includes/widgets.php";