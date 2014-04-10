<?php
/*-----------------------------------------------------------------------------------*/

/* Start WooThemes Functions - Please refrain from editing this section */

/*-----------------------------------------------------------------------------------*/



// Set path to WooFramework and theme specific functions

$functions_path = get_template_directory() . '/functions/';

$includes_path = get_template_directory() . '/includes/';

#code to insert the data in blog database ht_form table(18-MAY-2013)
$db_name = 'thermosp_thermospascom';
$db_host = 'localhost';
$db_user = 'thermosp_tscom';
$db_pass = '*tscom07';
mysql_connect($db_host,$db_user,$db_pass);
@mysql_select_db($db_name) or die( "Unable to select database");
if(!empty($_POST['input_1'])){
  $fname = mysql_real_escape_string($_POST['input_1']);
  $lname = mysql_real_escape_string($_POST['input_2']);
  $address = mysql_real_escape_string($_POST['input_8']);
  $city = mysql_real_escape_string($_POST['input_9']);
  $state = mysql_real_escape_string($_POST['input_10']);
  $zip = mysql_real_escape_string($_POST['input_11']);
  $phone = mysql_real_escape_string($_POST['input_7']);
  $email = mysql_real_escape_string($_POST['input_5']);
  $sql = 'INSERT INTO ht_form (iref,fname,lname,address1,city,state,zipcode,phone,email, ht_date)';
  $sql .= " VALUES ('IBLOG','$fname','$lname','$address','$city','$state','$zip','$phone','$email', CURDATE())";
  $result = mysql_query($sql);
  $ht_id = mysql_insert_id();

  // Send Email Notification
  require_once($_SERVER['DOCUMENT_ROOT'] . '/classes/HtDb.php');
  require_once($_SERVER['DOCUMENT_ROOT'] . '/classes/HtEmail.php');

  $db = new HtDb();
  $email = new HtEmail();

  $submission = $db->get('ht_form', array('ht_id', $ht_id));
  $email->sendSubmission($submission, 'BLOG - Free Brochure');
}


// Don't load alt stylesheet from WooFramework

if ( ! function_exists( 'woo_output_alt_stylesheet' ) ) {

	function woo_output_alt_stylesheet () {}

}



// Define the theme-specific key to be sent to PressTrends.

define( 'WOO_PRESSTRENDS_THEMEKEY', 'tnla49pj66y028vef95h2oqhkir0tf3jr' );



// WooFramework

require_once ( $functions_path . 'admin-init.php' );	// Framework Init



if ( get_option( 'woo_woo_tumblog_switch' ) == 'true' ) {

	//Enable Tumblog Functionality and theme is upgraded

	update_option( 'woo_needs_tumblog_upgrade', 'false' );

	update_option( 'tumblog_woo_tumblog_upgraded', 'true' );

	update_option( 'tumblog_woo_tumblog_upgraded_posts_done', 'true' );

	require_once ( $functions_path . 'admin-tumblog-quickpress.php' );  // Tumblog Dashboard Functionality

}



/*-----------------------------------------------------------------------------------*/

/* Load the theme-specific files, with support for overriding via a child theme.

/*-----------------------------------------------------------------------------------*/



$includes = array(

				'includes/theme-options.php', 			// Options panel settings and custom settings

				'includes/theme-functions.php', 		// Custom theme functions

				'includes/theme-actions.php', 			// Theme actions & user defined hooks

				'includes/theme-comments.php', 			// Custom comments/pingback loop

				'includes/theme-js.php', 				// Load JavaScript via wp_enqueue_script

				'includes/sidebar-init.php', 			// Initialize widgetized areas

				'includes/theme-widgets.php',			// Theme widgets

				'includes/theme-advanced.php',			// Advanced Theme Functions

				'includes/theme-shortcodes.php',	 	// Custom theme shortcodes

				'includes/woo-layout/woo-layout.php',	// Layout Manager

				'includes/woo-meta/woo-meta.php',		// Meta Manager

				'includes/woo-hooks/woo-hooks.php'		// Hook Manager

				);



// Allow child themes/plugins to add widgets to be loaded.

$includes = apply_filters( 'woo_includes', $includes );



foreach ( $includes as $i ) {

	locate_template( $i, true );

}



// Load WooCommerce functions, if applicable.

if ( is_woocommerce_activated() ) {

	locate_template( 'includes/theme-woocommerce.php', true );

}



/*-----------------------------------------------------------------------------------*/

/* You can add custom functions below */

/*-----------------------------------------------------------------------------------*/

    function custom_excerpt_length( $length ) {

	return 28;

}

add_filter( 'excerpt_length', 'custom_excerpt_length', 20 );

function new_excerpt_more( $more ) {

	return ' <a class="read-more" href="'. get_permalink( get_the_ID() ) . '">Read More..</a>';

}

add_filter( 'excerpt_more', 'new_excerpt_more' );

add_filter("gform_input_masks", "add_mask");

array(

    'US Phone' => '(999) 999-9999',

    'US Phone + Ext' => '(999) 999-9999? x99999',

    'Date' => '99/99/9999',

    'Tax ID' => '99-9999999',

    'SSN' => '999-99-9999',

    'Zip Code' => '99999',

    'Full Zip Code' => '99999?-9999'

);

/* Change Archive Template H1 */



add_filter( 'woo_archive_title', 'new_woo_archive_title' );



function new_woo_archive_title () {



$category = single_cat_title("", false);

$new_title = '<h1 class="archive_header">'. $category .'</h1>' . '<div class="new-archive-description">' . strip_tags(category_description($category_id)) . '</div>';



return $new_title;



} // End filter

















/*-----------------------------------------------------------------------------------*/

/* Don't add any code below here or the sky will fall down */

/*-----------------------------------------------------------------------------------*/

?>