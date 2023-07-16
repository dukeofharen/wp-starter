<?php
echo shell_exec( 'wp core install --path="/var/www/html" --url="http://localhost:8000" --title="WP Starter" --admin_user=user --admin_password=pass --admin_email=info@ducode.org' );
echo shell_exec( "wp theme activate wp-starter" );
echo shell_exec( "wp rewrite structure '/%postname%/'" );
echo shell_exec( "wp plugin activate wp-starter-plugin" );

$lipsum_path = __DIR__ . "/lorem-ipsum.txt";

// Create posts.
$images = [ "featured1.jpg", "featured2.jpg", "featured3.jpg", "featured4.jpg", "featured5.jpg" ];
for ( $i = 0; $i < 20; $i ++ ) {
	$title = "Post " . $i;
	echo "Adding post with title " . $title . ".\n";
	$post_id           = (int) trim( shell_exec( "wp post create " . $lipsum_path . " --post_title='" . $title . "' --post_status='publish' --user=user --porcelain" ) );
	$random_image      = $images[ array_rand( $images ) ];
	$random_image_path = __DIR__ . "/img/" . $random_image;
	echo shell_exec( "wp media import " . $random_image_path . " --post_id=" . $post_id . " --featured_image" );
}