<?php

// DO NOTE CALL THIS CLASS DIRECTLY. CALL VIA: pb_backupbuddy_destination in bootstrap.php.

class pb_backupbuddy_destination_email {
	
	public static $destination_info = array(
		'name'			=>		'Email',
		'description'	=>		'Send files as email attachments. With most email servers attachments are typically <b>limited to about 10 MB</b> in size so only small backups typically can be sent this way.',
	);
	
	// Default settings. Should be public static for auto-merging.
	public static $default_settings = array(
		'type'				=>		'email',	// MUST MATCH your destination slug.
		'title'				=>		'',			// Required destination field.
		'address'			=>		'',
	);
	
	
	
	/*	send()
	 *	
	 *	Send one or more files.
	 *	
	 *	@param		array			$files		Array of one or more files to send.
	 *	@return		boolean						True on success, else false.
	 */
	public static function send( $settings = array(), $files = array() ) {
				
		$email = $settings['address'];
		
		pb_backupbuddy::status( 'details',  'Sending remote email.' );
		$headers = 'From: BackupBuddy <' . get_option('admin_email') . '>' . "\r\n\\";
		$wp_mail_result = wp_mail( $email, 'BackupBuddy Backup', 'BackupBuddy backup for ' . site_url(), $headers, $files );
		pb_backupbuddy::status( 'details',  'Sent remote email.' );
		
		if ( $wp_mail_result === true ) { // WP sent. Hopefully it makes it!
			return true;
		} else { // WP couldn't try to send.
			return false;
		}
		
	} // End send().
	
	
	
	/*	test()
	 *	
	 *	Sends a text email with ImportBuddy.php zipped up and attached to it.
	 *	
	 *	@param		array			$settings	Destination settings.
	 *	@return		bool|string					True on success, string error message on failure.
	 */
	public static function test( $settings ) {
		
		$email = $settings['address'];
		
		pb_backupbuddy::status( 'details', 'Testing email destination. Sending ImportBuddy.php.' );
		$importbuddy_temp = pb_backupbuddy::$options['temp_directory'] . 'importbuddy_' . pb_backupbuddy::random_string( 10 ) . '.php.tmp'; // Full path & filename to temporary importbuddy
		pb_backupbuddy::$classes['core']->importbuddy( $importbuddy_temp ); // Create temporary importbuddy.
		
		$files = array( $importbuddy_temp );
		
		
		$headers = 'From: BackupBuddy <' . get_option('admin_email') . '>' . "\r\n\\";
		$wp_mail_result = wp_mail( $email, 'BackupBuddy Test', 'BackupBuddy destination test for ' . site_url(), $headers, $files );
		pb_backupbuddy::status( 'details',  'Sent test email.' );
		
		@unlink( $importbuddy_temp );
		
		if ( $wp_mail_result === true ) { // WP sent. Hopefully it makes it!
			return true;
		} else { // WP couldn't try to send.
			echo 'WordPress was unable to attempt to send email. Check your WordPress & server settings.';
			return false;
		}
		
	} // End test().
	
	
} // End class.