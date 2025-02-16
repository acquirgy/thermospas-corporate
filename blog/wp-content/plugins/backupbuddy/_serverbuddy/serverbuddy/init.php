<?php
/**
 *
 *	Plugin Name: ServerBuddy
 *	Plugin URI: http://pluginbuddy.com/
 *	Description: BackupBuddy Server Tool
 *	Version: 1.0.2
 *	Author: Dustin Bolton
 *	Author URI: http://dustinbolton.com/
 *
 *	Installation:
 * 
 *	1. Download and unzip the latest release zip file.
 *	2. If you use the WordPress plugin uploader to install this plugin skip to step 4.
 *	3. Upload the entire plugin directory to your `/wp-content/plugins/` directory.
 *	4. Activate the plugin through the 'Plugins' menu in WordPress Administration.
 * 
 *	Usage:
 * 
 *	1. Navigate to the new plugin menu in the Wordpress Administration Panel.
 *
 *	NOTE: DO NOT EDIT THIS OR ANY OTHER PLUGIN FILES. NO USER-CONFIGURABLE OPTIONS WITHIN.
 */

error_reporting( E_ERROR | E_WARNING | E_PARSE | E_NOTICE ); // HIGH
define( 'PB_STANDALONE', true );

$pluginbuddy_settings = array(
				'slug'				=>		'backupbuddy',
				'php_minimum'		=>		'5.2',
				'series'			=>		'',
				'default_options'	=>		array(
												'bb_version'				=>	PB_BB_VERSION,	// BB version to be filled in on download.
												'password'					=>	PB_PASSWORD,	// Hash to be filled in on download.
												'password_verify'			=>	'',				// Password entered on step 1 to be verified against hash.
												
												'step'						=>	1,
												'max_execution_time'		=>	30,
												
												
												'log_level'					=>	'1',						// Level of error logging.
											),
				'modules'			=>		array(
												'updater'				=>	false,						// Load PluginBuddy automatic upgrades.
												'downsizer'				=>	false,						// Load thumbnail image downsizer.
												'filesystem'			=>	true,						// File system helper methods.
												'format'				=>	true,						// Text / data formatting helper methods.
											)
			);



// $settings is expected to be populated prior to including PluginBuddy framework. Do not edit below.
require( dirname( __FILE__ ) . '/pluginbuddy/_pluginbuddy.php' );
?>