<?php

$db_name = 'thermosp_thermospascom';
$db_host = 'localhost';
$db_user = 'thermosp_tscom';
$db_pass = '*tscom07';
@mysql_connect($db_host,$db_user,$db_pass);
@mysql_select_db($db_name) or die( "Unable to select database");

$name  = mysql_real_escape_string($_POST['name']);
$zip   = mysql_real_escape_string($_POST['zip']);
$phone = mysql_real_escape_string($_POST['phone']);

$iref = 'iGeoAL';
session_start();
if(isset($_SESSION['s_iref']) && $_SESSION['s_iref']) {
	$iref = $_SESSION['s_iref'];
	unset($_SESSION['s_iref']);
	session_destroy();
}

$sql  = 'INSERT INTO ht_form (iref,name,zipcode,phone, ht_date)';
$sql .= " VALUES ('$iref','$name','$zip','$phone', CURDATE())";

$result = mysql_query($sql);
$ht_id  = mysql_insert_id();

// Send Email Notification
require_once($_SERVER['DOCUMENT_ROOT'] . '/classes/HtDb.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/classes/HtEmail.php');

$db = new HtDb();
$email = new HtEmail();

$submission = $db->get('ht_form', array('ht_id', $ht_id));
$email->sendSubmission($submission, 'Geotarget AL submission');

// Output the OK!
if($result) echo $ht_id;
