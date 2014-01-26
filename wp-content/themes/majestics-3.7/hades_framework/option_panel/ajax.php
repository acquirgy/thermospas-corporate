<?php
$path = __FILE__;
$pathwp = explode( 'wp-content', $path );
$wp_url = $pathwp[0];

require_once( $wp_url.'/wp-load.php' );
require_once("options.php");

if( ! isset($_POST['vfi']) || $_POST['vfi'] !== md5(THEMENAME) )
{
	die('Unauthoized Access !');
}



if ( 'save' == $_POST['action'] ) {
	
	
	$new_values =  $_POST['values'];
	
	
	foreach($new_values as $value)
	{
	 update_option( $value["name"], $value["value"] );
	}
	
	echo "success";

}