<?php 
	
/**
* Plugin Name: EmailMe
* Plugin URI: http://www.ahsanmirza.com/
* Description: Email me plugin.
* Version: 1.0
* Author: Muhammad Ahsan Mirza
* Author URI: http://ahsanmirza.com/
**/

	add_action( 'wp_ajax_emailMe', 'emailMe');
 	add_action('wp_ajax_nopriv_emailMe', 'emailMe');
	function emailMe(){

		if( check_ajax_referer( 'emailMe-ajax-nonce', 'security', false ) && isset($_POST['name']) && isset($_POST['email']) && isset($_POST['subject']) && isset($_POST['message']) ){

			$name = sanitize_text_field( $_POST['name'] );
			$email = sanitize_text_field( $_POST['email'] );
			$subject = sanitize_text_field( $_POST['subject'] );
			$message = sanitize_text_field( $_POST['message'] );
			$message .= "    Name: ".$name."  Email: ".$email;
			$headers = array('Content-Type: text/html; charset=UTF-8');
			$headers[] = 'From: '.$name.' <'.$email.'>';

			wp_mail('mohd.ahsan.mirza@gmail.com', $subject, $message);
		}

		wp_die();
	}

?>