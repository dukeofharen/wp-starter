<?php
function execute( $command ) {
	$result_code = 0;
	$output      = null;
	$result      = exec( $command, $output, $result_code );
	if ( ! $result && $result_code !== 0 ) {
		throw new Exception( "Command '" . $command . "' failed with exit code " . $result_code . "." );
	}

	return $result;
}

$metadata_path          = "/etc/clidata";
$sql_dump_file          = "/etc/wp-starter/restore/dump.sql";
$should_import_sql_dump = file_exists( $sql_dump_file );
$sql_dump_imported_file = "$metadata_path/sql_dump_imported";
if ( $should_import_sql_dump && ! file_exists( $sql_dump_imported_file ) ) {
	throw new Exception("File $sql_dump_file exists but $sql_dump_imported_file does not. SQL import should be executed.");
	exit( 1 );
}

if ( $should_import_sql_dump ) {
	echo "Handle SQL dump commands.";
} else {
	echo execute( 'wp core install --path="/var/www/html" --url="http://localhost:8000" --title="WP Starter" --admin_user=user --admin_password=pass --admin_email=info@ducode.org --allow-root' );
	echo execute( "wp theme activate wp-starter --allow-root" );
	echo execute( "wp rewrite structure '/%postname%/' --allow-root" );
	echo execute( "wp plugin activate wp-starter-plugin --allow-root" );

	$lipsum_path = __DIR__ . "/lorem-ipsum.txt";

// Create posts.
	$posts_created_metadata_path = $metadata_path . "/posts_created";
	if ( ! file_exists( $posts_created_metadata_path ) ) {
		$images = [ "featured1.jpg", "featured2.jpg", "featured3.jpg", "featured4.jpg", "featured5.jpg" ];
		for ( $i = 0; $i < 20; $i ++ ) {
			$title = "Post " . $i;
			echo "\nAdding post with title " . $title . ".\n";
			$post_id           = (int) trim( execute( "wp post create " . $lipsum_path . " --post_title='" . $title . "' --post_status='publish' --user=user --porcelain --allow-root" ) );
			$random_image      = $images[ array_rand( $images ) ];
			$random_image_path = __DIR__ . "/img/" . $random_image;
			echo execute( "wp media import " . $random_image_path . " --post_id=" . $post_id . " --featured_image --allow-root" );
		}

		file_put_contents( $posts_created_metadata_path, "ok" );
	} else {
		echo "Posts already added.\n";
	}

// Create pages and menus
	$pages_created_metadata_path = $metadata_path . "/pages_created";
	if ( ! file_exists( $pages_created_metadata_path ) ) {
		$menus = [ "primary", "footer1", "footer2", "footer3" ];
		foreach ( $menus as $menu ) {
			$menu_id = (int) trim( execute( "wp menu create '" . $menu . "' --porcelain --allow-root" ) );
			for ( $i = 0; $i < 5; $i ++ ) {
				$page_id = (int) trim( execute( "wp post create " . $lipsum_path . " --post_title='Page " . $i . "' --post_type=page --post_status='publish' --porcelain --allow-root" ) );
				echo execute( "wp menu item add-post " . $menu . " " . $page_id . " --allow-root" );
				echo execute( "wp menu location assign " . $menu . " " . $menu . " --allow-root" );
			}
		}

		file_put_contents( $pages_created_metadata_path, "ok" );
	} else {
		echo "Pages already added.\n";
	}
}