<?php
$mode = 'html';


/********** AJAX **********/

$ajax = '';
if ( pb_backupbuddy::_POST( 'ajax' ) != '' ) {
	$ajax = pb_backupbuddy::_POST( 'ajax' );
} elseif ( pb_backupbuddy::_GET( 'ajax' ) != '' ) {
	$ajax = pb_backupbuddy::_GET( 'ajax' );
}
if ( $ajax != '' ) {	
	$page = ABSPATH . 'importbuddy/controllers/ajax/' . $ajax . '.php';
	if ( file_exists( $page ) ) {
		require_once( $page );
	} else {
		echo '{Error: Invalid AJAX action `' . htmlentities( $ajax ) . '`.}';
	}




/********** PAGES **********/
} elseif ( ( pb_backupbuddy::_GET( 'step' ) != '' ) && is_numeric( pb_backupbuddy::_GET( 'step' ) ) ) {
	$page = ABSPATH . 'importbuddy/controllers/pages/' . pb_backupbuddy::_GET( 'step' ) . '.php';
	if ( file_exists( $page ) ) {
		$step = pb_backupbuddy::_GET( 'step' );
		
		if ( $step > 1 ) { // After step 1 we just verify password is valid here.
			if (pb_backupbuddy::$options['password_verify'] != pb_backupbuddy::$options['password'] ) {
				die( 'Authentication failed. Please return to step 1 and re-authenticate.' );
			}
		}
		
		pb_backupbuddy::status( 'details', 'Starting step ' . htmlentities( pb_backupbuddy::_GET( 'step' ) ) . '...' );
		require_once( $page );
		pb_backupbuddy::status( 'details', 'Finished step ' . htmlentities( pb_backupbuddy::_GET( 'step' ) ) . '.' );
	} else {
		echo '{Error: Invalid page `' . htmlentities( pb_backupbuddy::_GET( 'step' ) ) . '.php' . '`.}';
		die();
	}
	
	
/********** ASSUME DEFAULT PAGE **********/
} else {
	require_once( '1.php' );
}
?>