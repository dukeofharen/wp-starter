<?php
add_action( 'phpmailer_init', 'starter_setup_phpmailer' , 0);
function starter_setup_phpmailer( $phpmailer ) {
	$phpmailer->isSMTP();
	$phpmailer->Host = 'mailpit';
	$phpmailer->SMTPAuth = false;
	$phpmailer->Port = 1025;
}

add_action( 'wp_mail_failed', 'on_mail_error');
function on_mail_error( $wp_error ) {
	echo "<pre>";
	print_r($wp_error);
	echo "</pre>";
}

add_filter( 'wp_mail_from', 'starter_wp_mail_from' );
function starter_wp_mail_from( $original_email_address ) {
	//Make sure the email is from the same domain
	//as your website to avoid being marked as spam.
	return 'info@ducode.org';
}