<?php
/*
Plugin Name: 1 Flash Gallery Update Airion
Plugin URI: http://1plugin.com/
Description: Updates the Airion flash gallery for more functionality. 
Version: 0.0.1
Author: 1plugin.com
Author URI: http://1plugin.com/
*/

function update_airion_error() {
	echo "<div id='update_airion-error' class='error fade'><p><strong>".__('1 Flash Gallery is not installed on your WordPress.')."</strong>".__('You need to install it first')."</p></div>";
}

function update_airion_install() {
	if (!is_plugin_active('1-flash-gallery/fgallery.php')) {
		update_airion_error();
		die();
	}
	// Clean old updates
	delete_option('1_flash_gallery_airion');
	// Set up new updates
	add_option('1_flash_gallery_airion', 'mus1cPath', '', 'no');
	
	return true;
}

function update_airion_uninstall() {
	//Clean old updates
	delete_option('1_flash_gallery_airion');
	return true;
}

register_activation_hook(__FILE__,'update_airion_install');
register_deactivation_hook(__FILE__, 'update_airion_uninstall');
