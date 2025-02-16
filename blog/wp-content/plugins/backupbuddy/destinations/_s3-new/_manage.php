<?php
// @author Dustin Bolton 2012.
?>


<script type="text/javascript">
	jQuery(document).ready(function() {
		
		jQuery( '.pb_backupbuddy_hoveraction_copy' ).click( function() {
			var backup_file = jQuery(this).attr( 'rel' );
			var backup_url = '<?php echo pb_backupbuddy::page_url(); ?>&custom=remoteclient&destination_id=<?php echo pb_backupbuddy::_GET( 'destination_id' ); ?>&remote_path=<?php echo htmlentities( pb_backupbuddy::_GET( 'remote_path' ) ); ?>&copy_file=' + backup_file;
			
			window.location.href = backup_url;
			
			return false;
		} );
		
		jQuery( '.pb_backupbuddy_hoveraction_download_link' ).click( function() {
			var backup_file = jQuery(this).attr( 'rel' );
			var backup_url = '<?php echo pb_backupbuddy::page_url(); ?>&custom=remoteclient&destination_id=<?php echo pb_backupbuddy::_GET( 'destination_id' ); ?>&remote_path=<?php echo htmlentities( pb_backupbuddy::_GET( 'remote_path' ) ); ?>&downloadlink_file=' + backup_file;
			
			window.location.href = backup_url;
			
			return false;
		} );
		
	});
</script>


<?php



// Load required files.
require_once( dirname( __FILE__ ) . '/init.php' );
require_once( dirname( dirname( __FILE__ ) ) . '/_s3lib/aws-sdk/sdk.class.php' );


// Settings.
if ( isset( pb_backupbuddy::$options['remote_destinations'][pb_backupbuddy::_GET('destination_id')] ) ) {
	$settings = &pb_backupbuddy::$options['remote_destinations'][pb_backupbuddy::_GET('destination_id')];
}
$settings = array_merge( pb_backupbuddy_destination_s3::$default_settings, $settings );

$remote_path = pb_backupbuddy_destination_s3::get_remote_path(); // Has leading and trailng slashes.  $settings['directory']


pb_backupbuddy::$ui->title( __( 'Amazon S3 Destination', 'it-l10n-backupbuddy' ) . ' "' . $destination['title'] . '"' );



$manage_data = pb_backupbuddy_destination_s3::get_manage_data( $settings );

// Connect to S3.
$s3 = new AmazonS3( $manage_data );    // the key, secret, token
if ( $settings['ssl'] == '0' ) {
	@$s3->disable_ssl(true);
}


// Handle deletion.
if ( pb_backupbuddy::_POST( 'bulk_action' ) == 'delete_backup' ) {
	pb_backupbuddy::verify_nonce();
	$deleted_files = array();
	foreach( (array)pb_backupbuddy::_POST( 'items' ) as $item ) {
		
		$response = $s3->delete_object( $manage_data['bucket'], $manage_data['subkey'] . $remote_path . $item );
		if ( $response->isOK() ) {
			$deleted_files[] = $item;
		} else {
			pb_backupbuddy::alert( 'Error: Unable to delete `' . $item . '`. Verify permissions.' );
		}
		
		
	}
	
}


// Handle copying files to local
if ( pb_backupbuddy::_GET( 'copy_file' ) != '' ) {
	pb_backupbuddy::alert( sprintf( _x('The remote file is now being copied to your %1$slocal backups%2$s', '%1$s and %2$s are open and close <a> tags', 'it-l10n-backupbuddy' ), '<a href="' . pb_backupbuddy::page_url() . '">', '</a>.<br>If the backup gets marked as bad during copying, please wait a bit then click the `Refresh` icon to rescan after the transfer is complete.' ) );
	pb_backupbuddy::status( 'details',  'Scheduling Cron for creating S3 copy.' );
	$schedule_result = pb_backupbuddy::$classes['core']->schedule_single_event( time(), pb_backupbuddy::cron_tag( 'process_remote_copy' ), array( 's3', pb_backupbuddy::_GET( 'copy_file' ), $settings ) );
	if ( ! TRUE === $schedule_result ) {
		pb_backupbuddy::alert( 'Error #454455454. Unable to schedule cron file transfer.' );
	}
	spawn_cron( time() + 150 ); // Adds > 60 seconds to get around once per minute cron running limit.
	update_option( '_transient_doing_cron', 0 ); // Prevent cron-blocking for next item.
}


// Handle download link
if ( pb_backupbuddy::_GET( 'downloadlink_file' ) != '' ) {
	
	$link = $s3->get_object( $manage_data['bucket'], $manage_data['subkey'] . $remote_path . pb_backupbuddy::_GET( 'downloadlink_file' ), array('preauth'=>time()+3600));
	pb_backupbuddy::alert( 'You may download this backup (' . pb_backupbuddy::_GET( 'downloadlink_file' ) . ') with <a href="' . $link . '">this link</a>. The link is valid for one hour.' );
}





// Get file listing.
$response = $s3->list_objects(
	$manage_data['bucket'],
	array(
		'prefix' => $remote_path
	)
);     // list all the files in the subscriber account



// Get list of files.
$backup_list_temp = array();
foreach( $response->body->Contents as $object ) {
	
	$file = str_ireplace( $manage_data['subkey'] . $remote_path, '', $object->Key );
	$last_modified = strtotime( $object->LastModified );
	$size = (double) $object->Size;
	if ( substr( $file, 0, 3 ) == 'db/' ) {
		$backup_type = 'Database';
	} elseif ( substr( $file, 0, 5 ) == 'full/' ) {
		$backup_type = 'Full';
	} elseif( $file == 'importbuddy.php' ) {
		$backup_type = 'ImportBuddy Tool';
	} else {
		if ( stristr( $file, '/db/' ) !== false ) {
			$backup_type = 'Database';
		} elseif( stristr( $file, '/full/' ) !== false ) {
			$backup_type = 'Full';
		} else {
			$backup_type = 'Unknown';
		}
	}
	
	// Generate array of table rows.
	$backup_list_temp[$last_modified] = array(
		$file,
		pb_backupbuddy::$format->date(
			pb_backupbuddy::$format->localize_time( $last_modified )
		) . '<br /><span class="description">(' .
		pb_backupbuddy::$format->time_ago( $last_modified ) .
		' ago)</span>',
		pb_backupbuddy::$format->file_size( $size ),
		$backup_type
	);

}


krsort( $backup_list_temp );
$backup_list = array();
foreach( $backup_list_temp as $backup_item ) {
	$backup_list[ $backup_item[0] ] = $backup_item; //str_replace( 'db/', '', str_replace( 'full/', '', $backup_item ) );
}
unset( $backup_list_temp );


// Render table listing files.
if ( count( $backup_list ) == 0 ) {
	echo '<b>';
	_e( 'You have not completed sending any backups to Amazon S3 for this site yet.', 'it-l10n-backupbuddy' );
	echo '</b>';
} else {
	pb_backupbuddy::$ui->list_table(
		$backup_list,
		array(
			'action'		=>	pb_backupbuddy::page_url() . '&custom=remoteclient&destination_id=' . htmlentities( pb_backupbuddy::_GET( 'destination_id' ) ) . '&remote_path=' . htmlentities( pb_backupbuddy::_GET( 'remote_path' ) ),
			'columns'		=>	array( 'Backup File', 'Uploaded <img src="' . pb_backupbuddy::plugin_url() . '/images/sort_down.png" style="vertical-align: 0px;" title="Sorted most recent first">', 'File Size', 'Type' ),
			'hover_actions'	=>	array( 'copy' => 'Copy to Local', 'download_link' => 'Get download link' ),
			'hover_action_column_key'	=>	'0',
			'bulk_actions'	=>	array( 'delete_backup' => 'Delete' ),
			'css'			=>		'width: 100%;',
		)
	);
}

// Display troubleshooting subscriber key.
echo '<br style="clear: both;">';

return;
