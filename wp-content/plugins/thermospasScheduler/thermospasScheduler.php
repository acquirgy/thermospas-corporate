<?php

/**
 * Plugin Name: Thermospas Scheduler
 * Plugin URI: http://capacitr.com
 * Description: Scheduling for Thermospas clients
 * Version: 1.0
 * Author: Justin Brown
 * Author URI: http://capacitr.com
 * License: Copyright 2013 Capacitr
 */



class TSScheduler {

	const db_version = '1.0';
	const prefix = 'tss_';
	static $table_name;
	static $raw_table_name = 'tsscheduler';
	static $initialized = false;
	static $options;

	// initialize things (called directly after class definition)
	public static function init()
	{
		if(static::$initialized) { return; }
		global $wpdb;
		static::$table_name = $wpdb->prefix . static::$raw_table_name;

		$prefix = static::prefix;

		static::$options = array(

			$prefix.'to_email' => array(
				'type'  => 'string',
				'label' => 'To Email',
				'desc'  => 'Send an email to this address for every appointment submitted.',
			),

			$prefix.'from_email' => array(
				'type'  => 'string',
				'label' => 'From Email',
				'desc'  => 'The From: field for emails sent to clients (e.g. noreply@thermospas.com).',
			),

			$prefix.'send_customer_email' => array(
				'type'  => 'boolean',
				'label' => 'Send email to customer',
				'desc'  => 'Clients will receive an automated email upon appointment submission.',
			),

			$prefix.'email_subject' => array(
				'type'  => 'string',
				'label' => 'Email subject',
				'desc'  => 'The subject of the email.',
			),

			$prefix.'email_template' => array(
				'type'  => 'text',
				'label' => 'Email template',
				'desc'  => 'The email sent upon submission. These tags will be replaced with the applicable data: [client_name] [address] [city] [state] [zip] [email] [phone] [appt_date] [appt_time]',
			),

		);

		static::fillOptionValues();
		static::$initialized = true;

		add_action('admin_menu', array(get_called_class(), 'addPages'));
		add_action('plugins_loaded', array(get_called_class(), 'addShortcodes'));

	}

	public static function install()
	{

		global $wpdb;
		$db_version = static::db_version;

		$table_name = static::$table_name;

		$sql = "CREATE TABLE $table_name (
		id int(11) NOT NULL AUTO_INCREMENT,
		client_name varchar(200) NOT NULL,
		address varchar(255) NOT NULL,
		city varchar(200) NOT NULL,
		state varchar(3) NOT NULL,
		zip varchar(10) NOT NULL,
		email varchar(200) NOT NULL,
		phone varchar(23) NOT NULL,
		appt_date date DEFAULT '0000-00-00' NOT NULL,
		appt_time time DEFAULT '00:00:00' NOT NULL,
		created_at datetime NOT NULL,
		updated_at datetime NOT NULL,
		PRIMARY KEY  id (id)
		);";

		require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
		dbDelta( $sql );

		add_option( "tss_db_version", $db_version );

	}

	public static function fillOptionValues()
	{
		array_walk(static::$options, function(&$option_info, $option_name){
			$option_info['value'] = get_option($option_name);
		});

	}



	// $options = option_name => option_value
	// updates the WP DB
	public static function updateOptions($newValues)
	{
		$newValues = stripslashes_deep($newValues);
		foreach(static::$options as $option_name => $option_info)
		{
			// If a value is set for the option name and it doesn't match what we already have,
			// update the DB
			if(isset($newValues[$option_name]) && ($newValues[$option_name] != $option_info['value']))
			{
				static::$options[$option_name]['value'] = $newValues[$option_name];
				update_option($option_name, $newValues[$option_name]);
			}

		}

	}



	public static function addPages()
	{
		add_menu_page('Appointments', 'Appointments', 'manage_options', 'tss-menu', array(get_called_class(), 'createMainMenuPage'));
		add_submenu_page('tss-menu', 'ThermospasScheduler Options', 'Options', 'manage_options', 'tss-submenu', array(get_called_class(), 'createOptionsPage'));
	}



	public static function addShortcodes()
	{
		add_shortcode('tsscheduler', array(get_called_class(), 'createMainShortcode'));
	}

	public static function echoFile($filename)
	{
		include dirname(__FILE__) . '/' . $filename . '.php';
	}

	public static function createMainShortcode()
	{
		static::echoFile('_shortcode_main');
	}

	public static function createMainMenuPage()
	{
		static::echoFile('_menu_page_main');
	}

	public static function createOptionsPage()
	{
		static::echoFile('_menu_page_options');
	}

	public static function sendAppointmentEmail($data)
	{
		$to      = $data['email'];
		$subject = get_option(static::prefix . 'email_subject');
		$message = get_option(static::prefix . 'email_template');


		$dataNames = array('client_name', 'address', 'city', 'state', 'zip', 'email', 'phone', 'appt_date', 'appt_time');

		// replace tags in message with data
		foreach($dataNames as $dataName)
		{
			$message = str_replace("[$dataName]", $data[$dataName], $message);
		}

		$args = array(
			'to'      => $to,
			'subject' => $subject,
			'message' => $message,
		);

		static::sendEmail($args);

	}

	// $args = [to, subject, message, headers]
	// For now we're just using our one email template for this
	public static function sendEmail($args)
	{
		$argNames = array('to', 'subject', 'message');
		foreach($argNames as $argName)
		{
			$$argName = isset($args[$argName]) ? $args[$argName] : '';
		}
		$from    = get_option(static::prefix . 'from_email');
		$toAdmin = get_option(static::prefix . 'to_email');
		$headers = array(
			"From: $from",
			"Bcc: $toAdmin",
			'Content-type: text/html',
		);
		wp_mail($to, $subject, $message, $headers);
	}

}

TSScheduler::init();

register_activation_hook( __FILE__, array('TSScheduler', 'install') );