<?php
//pb_backupbuddy::load_script( 'jquery-ui-core', true ); // WP core script.
pb_backupbuddy::load_script( 'jquery-ui-datepicker', true ); // WP core script.
pb_backupbuddy::load_script( 'jquery-ui-slider', true ); // WP core script.
pb_backupbuddy::load_script( 'timepicker.js' );

pb_backupbuddy::load_style( 'admin.css', false ); // Plugin-specific file.
pb_backupbuddy::load_style( 'jquery_smoothness.css', false ); // Plugin-specific file.
?>


<script type="text/javascript">
jQuery(document).ready(function(){
	
	// WP 3.2.1 does not like the datepicker and breaks other JS so we omit it if it failed to load properly.
	if (jQuery.isFunction(jQuery.fn.datepicker)) {
		jQuery( '#pb_backupbuddy_first_run' ).datetimepicker({
			ampm: true
		});
	}
	
});
</script>

<?php

pb_backupbuddy::$classes['core']->versions_confirm();
$date_format_example = 'mm/dd/yyyy hh:mm [am/pm]'; // Example date format for displaying to user.


// HANDLE SCHEDULE DELETION.
if ( pb_backupbuddy::_POST( 'bulk_action' ) == 'delete_schedule' ) {
	pb_backupbuddy::verify_nonce( pb_backupbuddy::_POST( '_wpnonce' ) ); // Security check to prevent unauthorized deletions by posting from a remote place.
	$deleted_schedules = array();
	foreach( pb_backupbuddy::_POST( 'items' ) as $id ) {
		$deleted_schedules[] = htmlentities( pb_backupbuddy::$options['schedules'][$id]['title'] );
		$next_scheduled_time = wp_next_scheduled( 'pb_backupbuddy-cron_scheduled_backup', array( (int)$id ) );
		if ( FALSE === pb_backupbuddy::$classes['core']->unschedule_event( $next_scheduled_time, 'pb_backupbuddy-cron_scheduled_backup', array( (int)$id ) ) ) {
			pb_backupbuddy::alert( 'Error #67686793. Unable to remove schedule. Please check your BackupBuddy error log.' );
		}
		unset( pb_backupbuddy::$options['schedules'][$id] );
	}
	pb_backupbuddy::save();
	pb_backupbuddy::alert( __( 'Deleted schedule(s):', 'it-l10n-backupbuddy' ) . ' ' . implode( ', ', $deleted_schedules ) );
} // End if deleting backup(s).



if ( pb_backupbuddy::_GET( 'edit' ) != '' ) {
	$mode = 'edit';
	$data['mode_title'] = __('Edit Schedule', 'it-l10n-backupbuddy' );
	$savepoint = 'schedules#' . pb_backupbuddy::_GET( 'edit' );
	
	$first_run_value = date('m/d/Y h:i a', pb_backupbuddy::$options['schedules'][pb_backupbuddy::_GET( 'edit' )]['first_run'] + ( get_option( 'gmt_offset' ) * 3600 ) );
	
	$remote_destinations = explode( '|', pb_backupbuddy::$options['schedules'][pb_backupbuddy::_GET( 'edit' )]['remote_destinations'] );
	$remote_destinations_html = '';
	foreach( $remote_destinations as $destination ) {
		if ( isset( $destination ) && ( $destination != '' ) ) {
			$remote_destinations_html .= '<li id="pb_remotedestination_' . $destination . '">';
			$remote_destinations_html .= pb_backupbuddy::$options['remote_destinations'][$destination]['title'];
			$remote_destinations_html .= ' (' . pb_backupbuddy::$classes['core']->pretty_destination_type( pb_backupbuddy::$options['remote_destinations'][$destination]['type'] ) . ') ';
			$remote_destinations_html .= '<img class="pb_remotedestionation_delete" src="' . pb_backupbuddy::plugin_url() . '/images/redminus.png" style="vertical-align: -3px; cursor: pointer;" title="' . __( 'Remove remote destination from this schedule.', 'it-l10n-backupbuddy' ) . '" />';
			$remote_destinations_html .= '</li>';
		}
	}
	$remote_destinations = '<ul id="pb_backupbuddy_remotedestinations_list">' . $remote_destinations_html . '</ul>';
} else {
	$mode = 'add';
	$data['mode_title'] = __('Add New Schedule', 'it-l10n-backupbuddy' );
	$savepoint = false;
	
	$first_run_value = date('m/d/Y h:i a', time() + ( ( get_option( 'gmt_offset' ) * 3600 ) + 86400 ) );
	$remote_destinations = '<ul id="pb_backupbuddy_remotedestinations_list"></ul>';
}




$schedule_form = new pb_backupbuddy_settings( 'scheduling', $savepoint, 'edit=' . pb_backupbuddy::_GET( 'edit' ), 250 );

$schedule_form->add_setting( array(
	'type'		=>		'text',
	'name'		=>		'title',
	'title'		=>		'Schedule name',
	'tip'		=>		__('This is a name for your reference only.', 'it-l10n-backupbuddy' ),
	'rules'		=>		'required',
) );
$schedule_form->add_setting( array(
	'type'		=>		'radio',
	'name'		=>		'type',
	'title'		=>		'Backup type',
	'options'	=>		array( 'db' => 'Database only', 'full' => 'Full backup' ),
	//'default'	=>		'db',
	'tip'		=>		__( 'Full backups contain all files (except exclusions) and your database. Database only backups consist of an export of your mysql database; no WordPress files or media. Database backups are typically much smaller and faster to perform and are typically the most quickly changing part of a site.', 'it-l10n-backupbuddy' ),
	'rules'		=>		'required',
) );
$schedule_form->add_setting( array(
	'type'		=>		'select',
	'name'		=>		'interval',
	'title'		=>		'Backup interval',
	'options'	=>		array(
							'monthly'		=>		'Monthly',
							'twicemonthly'	=>		'Twice Monthly',
							'weekly'		=>		'Weekly',
							'daily'			=>		'Daily',
							'hourly'		=>		'Hourly',
						),
	'tip'		=>		 __( 'Time period between backups.', 'it-l10n-backupbuddy' ),
	'rules'		=>		'required',
	'after'		=>		'&nbsp;&nbsp;&nbsp;<span class="pb_label">Tip</span> Unsure how often to schedule? Try starting with daily database-only and weekly full backups.',
) );
$schedule_form->add_setting( array(
	'type'		=>		'text',
	'name'		=>		'first_run',
	'title'		=>		'Date/time of next run',
	'tip'		=>		__( 'IMPORTANT: For scheduled events to occur someone (or you) must visit this site on or after the scheduled time. If no one visits your site for a long period of time some backup events may not be triggered.', 'it-l10n-backupbuddy' ),
	'rules'		=>		'required',
	'default'	=>		$first_run_value,
	'after'		=>		' ' . __('Currently', 'it-l10n-backupbuddy' ) . ' <code>' . date( 'm/d/Y h:i a ' . get_option( 'gmt_offset' ), time() + ( get_option( 'gmt_offset' ) * 3600 ) ) . ' UTC</code> ' . __('based on', 'it-l10n-backupbuddy' ) . ' <a href="' . admin_url( 'options-general.php' ) . '">' . __( 'WordPress settings', 'it-l10n-backupbuddy' ) . '</a>.',
) );
$schedule_form->add_setting( array(
	'type'		=>		'text',
	'name'		=>		'remote_destinations',
	'title'		=>		'Remote backup destination',
	'rules'		=>		'',
	'css'		=>		'display: none;',
	'after'		=>		$remote_destinations . '<a href="' . pb_backupbuddy::ajax_url( 'destination_picker' ) . '&#038;TB_iframe=1&#038;width=640&#038;height=600" class="thickbox button secondary-button" style="margin-top: 3px;" title="' . __( 'Select a Destination', 'it-l10n-backupbuddy' ) . '">' . __('+ Add Remote Destination', 'it-l10n-backupbuddy' ) . '</a>',
) );
$schedule_form->add_setting( array(
	'type'		=>		'checkbox',
	'name'		=>		'delete_after',
	'title'		=>		'&nbsp;',
	'after'		=>		' '. __( 'Delete local backup file after remote send success', 'it-l10n-backupbuddy' ),
	'options'	=>		array( 'checked' => '1', 'unchecked' => '0' ),
	'rules'		=>		'',
) );
$schedule_form->add_setting( array(
	'type'		=>		'checkbox',
	'name'		=>		'on_off',
	'title'		=>		'Schedule enabled?',
	'options'	=>		array( 'checked' => '1', 'unchecked' => '0' ),
	'default'	=>		'1',
	'tip'		=>		__( '[Default: enabled] When disabled this schedule will be effectively turned off. This scheduled backup will not occur when disabled / off. You can re-enable schedules by editing them.', 'it-l10n-backupbuddy' ),
	'after'		=>		' ' . __( 'Enable schedule to run', 'it-l10n-backupbuddy' ),
) );



// PROCESS ADDING SCHEDULE.
$submitted_schedule = $schedule_form->process(); // Handles processing the submitted form (if applicable).

if ( ( $submitted_schedule != '' ) && ( count ( $submitted_schedule['errors'] ) == 0 ) ) {
	
	// ADD SCHEDULE.
	if ( pb_backupbuddy::_GET( 'edit' ) == '' ) { // ADD SCHEDULE.
		$error = false;
		
		// Don't allow 'delete file after send to destination' if no destination picked.
		if ( ( $submitted_schedule['data']['delete_after'] == '1' ) && ( '' == trim( $submitted_schedule['data']['remote_destinations'] ) ) ) {
			pb_backupbuddy::alert( 'Error: You have selected to delete backups after sending but did not specify any remote destinations. Click "Add Remote Destination" to select a destination.', true );
			$error = true;
		}
		
		$schedule = pb_backupbuddy::settings( 'schedule_defaults' );
		$schedule['title'] = $submitted_schedule['data']['title'];
		if ( isset( $submitted_schedule['data']['type'] ) ) {
			$schedule['type'] = $submitted_schedule['data']['type'];
		}
		$schedule['interval'] = $submitted_schedule['data']['interval'];
		$schedule['first_run'] = pb_backupbuddy::$format->unlocalize_time( strtotime( $submitted_schedule['data']['first_run'] ) );
		//$schedule['first_run'] = $submitted_schedule['data']['first_run'];
		if ( ( $schedule['first_run'] == 0 ) || ( $schedule['first_run'] == 18000 ) ) {
			pb_backupbuddy::alert( sprintf(__('Invalid time format. Please use the specified format / example %s', 'it-l10n-backupbuddy' ) , $date_format_example) );
			$error = true;
		}
		$schedule['remote_destinations'] = $submitted_schedule['data']['remote_destinations'];
		$schedule['delete_after'] = $submitted_schedule['data']['delete_after'];
		
		//echo 'first: ' . $schedule['first_run'];
		
		if ( $error === false ) {
			$next_index = pb_backupbuddy::$options['next_schedule_index']; // v2.1.3: $next_index = end( array_keys( pb_backupbuddy::$options['schedules'] ) ) + 1;
			pb_backupbuddy::$options['next_schedule_index']++; // This change will be saved in savesettings function below.
			pb_backupbuddy::$options['schedules'][$next_index] = $schedule;
			$result = pb_backupbuddy::$classes['core']->schedule_event( $schedule['first_run'], $schedule['interval'], 'pb_backupbuddy-cron_scheduled_backup', array( $next_index ) );
			if ( $result === false ) {
				pb_backupbuddy::alert( 'Error scheduling event with WordPress. Your schedule may not work properly. Please try again. Error #3488439. Check your BackupBuddy error log for details.', true );
			}
			pb_backupbuddy::save();
			$schedule_form->clear_values();
			pb_backupbuddy::alert( 'Added new schedule `' . htmlentities( $schedule['title'] ) . '`.' );
		}
	} else { // EDIT SCHEDULE. Forma handles saving; just need to update timestamp.
		$first_run = pb_backupbuddy::$format->unlocalize_time( strtotime( $submitted_schedule['data']['first_run'] ) );
		if ( ( $first_run == 0 ) || ( $first_run == 18000 ) ) {
			pb_backupbuddy::alert( sprintf(__('Invalid time format. Please use the specified format / example %s', 'it-l10n-backupbuddy' ) , $date_format_example) );
			$error = true;
		}
		
		pb_backupbuddy::$options['schedules'][pb_backupbuddy::_GET( 'edit' )]['first_run'] = $first_run;
		//echo 'first: ' . $first_run;
		
		$next_scheduled_time = wp_next_scheduled( 'pb_backupbuddy-cron_scheduled_backup', array( (int)$_GET['edit'] ) );
		$result = pb_backupbuddy::$classes['core']->unschedule_event( $next_scheduled_time, 'pb_backupbuddy-cron_scheduled_backup', array( (int)$_GET['edit'] ) ); // Remove old schedule. pb_backupbuddy::$options['schedules'][$_GET['edit']]['first_run']
		if ( $result === FALSE ) {
			pb_backupbuddy::alert( 'Error #589689. Unable to unschedule scheduled cron job with WordPress. Please see your BackupBuddy error log for details.' );
		}
		$result = pb_backupbuddy::$classes['core']->schedule_event( $first_run, $submitted_schedule['data']['interval'], 'pb_backupbuddy-cron_scheduled_backup', array( (int)$_GET['edit'] ) ); // Add new schedule.
		if ( $result === FALSE ) {
			pb_backupbuddy::alert( 'Error scheduling event with WordPress. Your schedule may not work properly. Please try again. Error #3488439. Check your BackupBuddy error log for details.', true );
		}
		pb_backupbuddy::save();
		pb_backupbuddy::alert( 'Edited schedule `' . htmlentities( $submitted_schedule['data']['title'] ) . '`.' );
	}
	
} elseif ( count ( $submitted_schedule['errors'] ) > 0 ) {
	foreach( $submitted_schedule['errors'] as $error ) {
		pb_backupbuddy::alert( $error );
	}
}
$data['schedule_form'] = $schedule_form;









$schedules = array();
foreach ( pb_backupbuddy::$options['schedules'] as $schedule_id => $schedule ) {
	
	$title = $schedule['title'];
	if ( $schedule['type'] == 'full' ) {
		$type = 'Full';
	} elseif ( $schedule['type'] == 'db' ) {
		$type = 'Database';
	} else {
		$type = 'Unknown (' . $schedule['type'] . ')';
	}
	$interval = $schedule['interval'];
	
	if ( isset( $schedule['on_off'] ) && ( $schedule['on_off'] == '0' ) ) {
		$on_off = '<font color=red>Disabled</font>';
	} else {
		$on_off = 'Enabled';
	}
	
	$destinations = explode( '|', $schedule['remote_destinations'] );
	$destination_array = array();
	foreach( $destinations as $destination ) {
		if ( isset( $destination ) && ( $destination != '' ) ) {
			$destination_array[] = pb_backupbuddy::$options['remote_destinations'][$destination]['title'] . ' (' . pb_backupbuddy::$classes['core']->pretty_destination_type( pb_backupbuddy::$options['remote_destinations'][$destination]['type'] ) . ')';
		}
	}
	$destinations = implode( ', ', $destination_array );
	
	// Determine first run.
	$first_run = pb_backupbuddy::$format->date( pb_backupbuddy::$format->localize_time( $schedule['first_run'] ) );
	
	// Determine last run.
	if ( isset( $schedule['last_run'] ) ) { // backward compatibility before last run tracking added. Pre v2.2.11. Eventually remove this.
		if ( $schedule['last_run'] == 0 ) {
			$last_run = '<i>' . __( 'Never', 'it-l10n-backupbuddy' ) . '</i>';
		} else {
			$last_run = pb_backupbuddy::$format->date( pb_backupbuddy::$format->localize_time( $schedule['last_run'] ) );
		}
	} else { // backward compatibility for before last run tracking was added.
		$last_run = '<i> ' . __( 'Unknown', 'it-l10n-backupbuddy' ) . '</i>';
	}
	
	// Determine next run.
	$next_run = wp_next_scheduled( 'pb_backupbuddy-cron_scheduled_backup', array( (int)$schedule_id ) );
	$next_run = pb_backupbuddy::$format->date( pb_backupbuddy::$format->localize_time( $next_run ) );
	
	$run_time = 'First run: ' . $first_run . '<br>' .
		'Last run: ' . $last_run . '<br>' .
		'Next run: ' . $next_run;
	
	$schedules[$schedule_id] = array(
		$title,
		$type,
		$interval,
		$destinations,
		$run_time,
		$on_off,
	);
	
} // End foreach.
$data['schedules'] = $schedules;



// Load view.
pb_backupbuddy::load_view( 'scheduling', $data );


?>