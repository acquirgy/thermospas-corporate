<?php // Settings to display in a form for a user to configure.

$settings_form->add_setting( array(
	'type'		=>		'text',
	'name'		=>		'title',
	'title'		=>		__( 'Destination name', 'it-l10n-backupbuddy' ),
	'tip'		=>		__( 'Name of the new destination to create. This is for your convenience only.', 'it-l10n-backupbuddy' ),
	'rules'		=>		'required|string[1-45]',
) );

$settings_form->add_setting( array(
	'type'		=>		'text',
	'name'		=>		'username',
	'title'		=>		__( 'Username', 'it-l10n-backupbuddy' ),
	'tip'		=>		__( '[Example: badger] - Your Rackspace Cloudfiles username.', 'it-l10n-backupbuddy' ),
	'rules'		=>		'required|string[1-100]',
) );

$settings_form->add_setting( array(
	'type'		=>		'text',
	'name'		=>		'api_key',
	'title'		=>		__( 'API key', 'it-l10n-backupbuddy' ),
	'tip'		=>		__( '[Example: 9032jk09jkdspo9sd32jds9swd039dwe] - Log in to your Rackspace Cloudfiles Account and navigate to Your Account: API Access', 'it-l10n-backupbuddy' ),
	'after'		=>		' ' . pb_backupbuddy::video( 'lfTs_GtAp1I#14s', __('Get your Rackspace Cloudfiles API key', 'it-l10n-backupbuddy' ), false ),
	'css'		=>		'width: 255px;',
	'rules'		=>		'required|string[1-100]',
) );


$settings_form->add_setting( array(
	'type'		=>		'text',
	'name'		=>		'container',
	'title'		=>		__( 'Container', 'it-l10n-backupbuddy' ),
	'tip'		=>		__( '[Example: wordpress_backups] - This container will NOT be created for you automatically if it does not already exist. Please create it first.', 'it-l10n-backupbuddy' ),
	'after'		=>		' ' . pb_backupbuddy::video( 'lfTs_GtAp1I#26', __('Create a container from the Rackspace Cloudfiles panel', 'it-l10n-backupbuddy' ), false ),
	'css'		=>		'width: 255px;',
	'rules'		=>		'string[0-500]',
) );

$settings_form->add_setting( array(
	'type'		=>		'text',
	'name'		=>		'archive_limit',
	'title'		=>		__( 'Archive limit', 'it-l10n-backupbuddy' ),
	'tip'		=>		__( '[Example: 5] - Enter 0 for no limit. This is the maximum number of archives to be stored in this specific destination. If this limit is met the oldest backups will be deleted.', 'it-l10n-backupbuddy' ),
	'rules'		=>		'required|int[0-9999999]',
	'css'		=>		'width: 50px;',
	'after'		=>		' backups',
) );

$settings_form->add_setting( array(
	'type'		=>		'select',
	'name'		=>		'server',
	'title'		=>		__( 'Cloud network', 'it-l10n-backupbuddy' ),
	'options'	=>		array(
								'https://auth.api.rackspacecloud.com'		=>		'USA',
								'https://lon.auth.api.rackspacecloud.com'		=>		'UK',
							),
	'rules'		=>		'required',
) );


