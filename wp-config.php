<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'thermosp_thermospascom');

/** MySQL database username */
define('DB_USER', 'thermosp_tscom');

/** MySQL database password */
define('DB_PASSWORD', '*tscom07');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '?;+_!HZETs#0`$zG`#/9%f#O~1x^9(nE!%=-P3Jpo^Q??Pa|B_<|pZ=Kec2nj)Ql');
define('SECURE_AUTH_KEY',  '{Tkyq^}-@A7=?cCQeMz,~A!vaKl;5Z>P*3>v`.jLxhaT**%e~=1P[/ubRz-ZoH!.');
define('LOGGED_IN_KEY',    '9s.^{etfgCU%^GWgnL8U>^ R.z*awQC_v;W.T?}3|OTON#8e34lS/nEhlI2o}-;s');
define('NONCE_KEY',        '4o&tGDoy~V3CwO1;s2}|l~0Mc;Z=Jxw>cxCp<]I@pn&<m|][%<opw*c<yRc%>1Sw');
define('AUTH_SALT',        '1pY76V8rT!,7 hY(=beL|=>_-V?XCt]iWm!?n?r5QPw(`?8Atf3U7$;@_KVF-rGM');
define('SECURE_AUTH_SALT', '~BJSU/sg*+/PXe6H]Ec<M9|u6rzqYi;P!SUuF+R.O/uq<UeU1[eQa3a}0.VAU&9l');
define('LOGGED_IN_SALT',   'E}v*xNV]kt.e@4cnb$QLeCWLsU@=+Qxpxx-yvG,^2{I[nL|r-%.Y^OBvzOKU^7$e');
define('NONCE_SALT',       'GCaO4sj|}[tnCfmHNSqS6LBGV7)~]H_/_5t{H?yp>3<qF68_auwYH-iS,BAwRBTh');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = '2011_wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
