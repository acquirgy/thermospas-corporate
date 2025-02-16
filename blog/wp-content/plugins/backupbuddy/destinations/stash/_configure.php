<?php // Settings to display in a form for a user to configure.
/*
	Pre-populated variables coming into this script:
		$destination_settings
		$mode
*/

global $pb_hide_test, $pb_hide_save;
$pb_hide_test = false;

$itxapi_username = '';
$itxapi_password = '';


if ( $mode == 'add' ) { // ADD MODE.
	
	$credentials_form = new pb_backupbuddy_settings( 'pre_settings', false, 'action=pb_backupbuddy_destination_picker&add=' . htmlentities( pb_backupbuddy::_GET( 'add' ) ) . '&callback_data=' . htmlentities( pb_backupbuddy::_GET( 'callback_data' ) ) ); // name, savepoint|false, additional querystring
	
	$credentials_form->add_setting( array(
		'type'		=>		'text',
		'name'		=>		'itxapi_username',
		'title'		=>		__( 'iThemes username', 'it-l10n-backupbuddy' ),
		'tip'		=>		__( '[Example: kerfuffle] - Your iThemes.com / PluginBuddy membership username.', 'it-l10n-backupbuddy' ),
		'rules'		=>		'required|string[1-45]',
	) );
	$credentials_form->add_setting( array(
		'type'		=>		'password',
		'name'		=>		'itxapi_password_raw',
		'title'		=>		__( 'iThemes password', 'it-l10n-backupbuddy' ),
		'tip'		=>		__( '[Example: 48dsds!s08K%x2s] - Your iThemes.com / PluginBuddy membership password.', 'it-l10n-backupbuddy' ),
		'rules'		=>		'required|string[1-45]',
	) );
	
	$settings_result = $credentials_form->process();
	
	$login_welcome = __( 'Log in with your iThemes.com member account to begin.', 'it-l10n-backupbuddy' );
	
	if ( count( $settings_result ) == 0 ) { // No form submitted.
		
		echo $login_welcome;
		$credentials_form->display_settings( 'Submit' );
		
		$pb_hide_test = true;
		$pb_hide_save = true;
		return;
	} else { // Form submitted.
		if ( count( $settings_result['errors'] ) > 0 ) { // Form errors.
			echo $login_welcome;
			pb_backupbuddy::alert( implode( '<br>', $settings_result['errors'] ) );
			$credentials_form->display_settings( 'Submit' );
			
			$pb_hide_test = true;
			$pb_hide_save = true;
			return;
		} else { // No form errors; process!
			
			require_once( dirname( __FILE__ ) . '/lib/class.itx_helper.php' );
			
			$itxapi_username = strtolower( $settings_result['data']['itxapi_username'] );
			$itxapi_password = ITXAPI_Helper::get_password_hash( $itxapi_username, $settings_result['data']['itxapi_password_raw'] ); // Generates hash for use as password for API.
			
			$account_info = pb_backupbuddy_destination_stash::get_quota(
				array(
					'itxapi_username' => $itxapi_username,
					'itxapi_password' => $itxapi_password,
				),
				true // bypass caching.
			);
			
			if ( $account_info === false ) {
				$credentials_form->display_settings( 'Submit' );
			}
			
		}
		
	} // end form submitted.
	
	
} elseif ( $mode == 'edit' ) { // EDIT MODE.
	
	
	//echo 'editmode?';
	$account_info = pb_backupbuddy_destination_stash::get_quota(
		array(
			'itxapi_username' => $destination_settings['itxapi_username'],
			'itxapi_password' => $destination_settings['itxapi_password'],
		)
	);
	$itxapi_username = $destination_settings['itxapi_username'];
}


if ( ( $mode == 'save' ) || ( $mode == 'edit' ) || ( $itxapi_username != '' ) ) {
	$default_name = '';
	
	if ( $mode != 'save' ) {
		if ( $account_info === false ) {
			$pb_hide_test = true;
			$pb_hide_save = true;
			return false;
		}
		
		
		
		
		$account_details = 'Welcome to your BackupBuddy Stash, <b>' . $itxapi_username . '</b>. Your account is ';
		if ( $account_info['subscriber_locked'] == '1' ) {
			$account_details .= 'LOCKED';
		} elseif ( $account_info['subscriber_expired'] == '1' ) {
			$account_details .= 'EXPIRED';
		} elseif ( $account_info['subscriber_active'] == '1' ) {
			$account_details .= 'active';
		} else {
			$account_details .= 'Unknown';
		}
		$account_details .= '.';
		
		if ( $mode == 'add' ) {
			$default_name = 'My Stash';
			
			echo $account_details;
			//echo '<br>';
			echo ' ' . __( 'To jump right in using the defaults just hit "Add Destination" below.', 'it-l10n-backupbuddy' );
		} else {
			echo '<div style="text-align: center;">' . $account_details . '</div>';
		}
		
		if ( $mode == 'add' ) {
			// Check to see if user already has a Stash with this username set up for this site. No need for multiple same account Stashes.
			foreach( (array)pb_backupbuddy::$options['remote_destinations'] as $destination ) {
				if ( ( isset( $destination['itxapi_username'] ) ) && ( strtolower( $destination['itxapi_username'] ) == strtolower( $itxapi_username ) ) ) {
					pb_backupbuddy::alert( 'Note: You already have a Stash destination set up under the provided iThemes account username.  It is unnecessary to create multiple Stash destinations that go to the same user account as they are effectively the same destination and a duplicate.' );
					break;
				}
			}
		}
		
		echo '<br><br>';
		echo pb_backupbuddy_destination_stash::get_quota_bar( $account_info );
		
		echo '<div style="text-align: center;">';
		echo '<a href="http://ithemes.com/member/stash.php" target="_new">Manage Offsite</a> &nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp; <a href="http://ithemes.com/member/stash.php" target="_new">Upgrade to More Storage</a><br><br>';
		echo '</div>';
		
		/*
		$settings_form->add_setting( array(
			'type'		=>		'plaintext',
			'name'		=>		'plaintext_account',
			'title'		=>		__('Account', 'it-l10n-backupbuddy' ),
			'default'	=>		$account_details,
		) );
		$settings_form->add_setting( array(
			'type'		=>		'plaintext',
			'name'		=>		'plaintext_quotausage',
			'title'		=>		__('Quota Usage', 'it-l10n-backupbuddy' ),
			'default'	=>		pb_backupbuddy::$format->file_size( $account_info['quota_used'] ) . ' / ' . pb_backupbuddy::$format->file_size( $account_info['quota_total'] ) . ' (' . $account_info['quota_used_percent'] . '%)&nbsp;&nbsp;&nbsp;<a href="http://ithemes.com/member/stash.php" target="_new" style="color: #C63D05; text-decoration: none;">Upgrade</a>',
		) );
		$settings_form->add_setting( array(
			'type'		=>		'plaintext',
			'name'		=>		'plaintext_quotalimit',
			'title'		=>		__('Quota Limit', 'it-l10n-backupbuddy' ),
			'default'	=>		$account_info['quota_free_nice'] . ' free + ' . $account_info['quota_paid_nice'] . ' paid = ' . $account_info['quota_total_nice'] . ' max storage',
		) );
		
		if ( isset( $account_info['quota_warning'] ) && ( $account_info['quota_warning'] != '' ) ) {
			$settings_form->add_setting( array(
				'type'		=>		'plaintext',
				'name'		=>		'plaintext_quotawarning',
				'title'		=>		'&nbsp;',
				'default'	=>		'<span style="color: red;"><b>Warning</b>: ' . $account_info['quota_warning'] . '</span>',
			) );
		}
		*/
		echo '<!-- STASH DETAILS: ' . print_r( $account_info, true ) . ' -->';
		
	} // end if NOT in save mode.
	
	
	// Form settings.
	$settings_form->add_setting( array(
		'type'		=>		'text',
		'name'		=>		'title',
		'title'		=>		__( 'Destination name', 'it-l10n-backupbuddy' ),
		'tip'		=>		__( 'Name of the new destination to create. This is for your convenience only.', 'it-l10n-backupbuddy' ),
		'rules'		=>		'required|string[1-45]',
		'default'	=>		$default_name,
	) );
	/*
	$settings_form->add_setting( array(
		'type'		=>		'text',
		'name'		=>		'directory',
		'title'		=>		__( 'Directory (optional)', 'it-l10n-backupbuddy' ),
		'tip'		=>		__( '[Example: database] - All Stash backups are already stored within a directory named after your site URL. You can however specify an additional directory within this for further organization.  For instance, you could set up a Stash destination for your database backups in one directory with one archive limit and full backups in another directory with a separate limit. This should only be one level deep.', 'it-l10n-backupbuddy' ),
		'rules'		=>		'string[0-45]',
	) );
	*/
	$settings_form->add_setting( array(
		'type'		=>		'text',
		'name'		=>		'db_archive_limit',
		'title'		=>		__( 'Database backup limit', 'it-l10n-backupbuddy' ),
		'tip'		=>		__( '[Example: 5] - Enter 0 for no limit. This is the maximum number of database backup archives to be stored in this specific destination. If this limit is met the oldest backup of this type will be deleted.', 'it-l10n-backupbuddy' ),
		'rules'		=>		'required|int[0-9999999]',
		'css'		=>		'width: 50px;',
		'after'		=>		' backups',
	) );
	$settings_form->add_setting( array(
		'type'		=>		'text',
		'name'		=>		'full_archive_limit',
		'title'		=>		__( 'Full backup limit', 'it-l10n-backupbuddy' ),
		'tip'		=>		__( '[Example: 5] - Enter 0 for no limit. This is the maximum number of full backup archives to be stored in this specific destination. If this limit is met the oldest backup of this type will be deleted.', 'it-l10n-backupbuddy' ),
		'rules'		=>		'required|int[0-9999999]',
		'css'		=>		'width: 50px;',
		'after'		=>		' backups',
	) );
	$settings_form->add_setting( array(
		'type'		=>		'text',
		'name'		=>		'max_chunk_size',
		'title'		=>		__( 'Max chunk size', 'it-l10n-backupbuddy' ),
		'tip'		=>		__( '[Example: 5] - Enter 0 for no chunking; minimum of 5 if enabling. This is the maximum file size to send in one whole piece. Files larger than this will be transferred in pieces up to this file size one part at a time. This allows to transfer of larger files than you server may allow by breaking up the send process. Chunked files may be delayed if there is little site traffic to trigger them.', 'it-l10n-backupbuddy' ),
		'rules'		=>		'required|int[0-9999999]',
		'css'		=>		'width: 50px;',
		'after'		=>		' MB (leave at 0 if unsure)',
	) );
	$settings_form->add_setting( array(
		'type'		=>		'checkbox',
		'name'		=>		'ssl',
		'options'	=>		array( 'unchecked' => '0', 'checked' => '1' ),
		'title'		=>		__( 'Encrypt connection', 'it-l10n-backupbuddy' ),
		'tip'		=>		__( '[Default: enabled] - When enabled, all transfers will be encrypted with SSL encryption. Disabling this may aid in connection troubles but results in lessened security. Note: Once your files arrive on our server they are encrypted using AES256 encryption. They are automatically decrypted upon download as needed.', 'it-l10n-backupbuddy' ),
		'css'		=>		'',
		'after'		=>		'<span class="description"> ' . __('Enable connecting over SSL', 'it-l10n-backupbuddy' ) . '</span>',
		'rules'		=>		'',
	) );
	if ( $mode !== 'edit' ) {
		$settings_form->add_setting( array(
			'type'		=>		'checkbox',
			'name'		=>		'manage_all_files',
			'options'	=>		array( 'unchecked' => '0', 'checked' => '1' ),
			'title'		=>		__( 'Manage all files', 'it-l10n-backupbuddy' ),
			'tip'		=>		__( '[Default: enabled] - When enabled, you have access to manage and view all files stored in your Stash account. You will be prompted for your password to access backups for sites other than this one.  If disabled the option is entirely removed for added security. For example, you may wish to disable this feature if a client has access and you want to keep them away from your files. This option can NOT be changed without deleting and re-creating the Stash destination for added security.', 'it-l10n-backupbuddy' ),
			'css'		=>		'',
			'after'		=>		'<span class="description"> ' . __('Enabling allows access to manage all Stash files (not just this site\'s).', 'it-l10n-backupbuddy' ) . '</span>',
			'rules'		=>		'',
		) );
	}
	$settings_form->add_setting( array(
		'type'		=>		'hidden',
		'name'		=>		'itxapi_username',
		'default'	=>		$itxapi_username,
	) );
	$settings_form->add_setting( array(
		'type'		=>		'hidden',
		'name'		=>		'itxapi_password',
		'default'	=>		$itxapi_password,
	) );
}