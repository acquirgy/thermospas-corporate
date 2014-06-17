<?php
  session_start();
  $iref = '';
  if(isset($_GET['src'])) $iref = $_GET['src'];
  if(isset($_GET['SRC'])) $iref = $_GET['SRC'];
  if(isset($_GET['iref'])) $iref = $_GET['iref'];
  if(isset($_GET['IREF'])) $iref = $_GET['IREF'];
  $_SESSION['iref'] = $iref;
?>


<?php
/**
 * Front to the WordPress application. This file doesn't do anything, but loads
 * wp-blog-header.php which does and tells WordPress to load the theme.
 *
 * @package WordPress
 */

/**
 * Tells WordPress to load the WordPress theme and output it.
 *
 * @var bool
 */
define('WP_USE_THEMES', true);

/** Loads the WordPress Environment and Template */
require( dirname( __FILE__ ) . '/wp-blog-header.php' );
