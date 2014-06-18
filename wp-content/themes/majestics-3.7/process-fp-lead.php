<?php

$db_name = 'thermosp_thermospascom';
$db_host = 'localhost';
$db_user = 'thermosp_tscom';
$db_pass = '*tscom07';
mysql_connect($db_host,$db_user,$db_pass);
@mysql_select_db($db_name) or die( "Unable to select database");

$fname = mysql_real_escape_string($_POST['fname']);
$lname = mysql_real_escape_string($_POST['lname']);
$address = mysql_real_escape_string($_POST['address']);
$city = mysql_real_escape_string($_POST['city']);
$state = mysql_real_escape_string($_POST['state']);
$zip = mysql_real_escape_string($_POST['zip']);
$phone = mysql_real_escape_string($_POST['phone']);
$email = mysql_real_escape_string($_POST['email']);

$iref = 'IHOME';
session_start();
if(isset($_SESSION['s_iref']) && $_SESSION['s_iref']) {
  $iref = $_SESSION['s_iref'];
  unset($_SESSION['s_iref']);
}

$sql = 'INSERT INTO ht_form (iref,fname,lname,address1,city,state,zipcode,phone,email, ht_date)';
$sql .= " VALUES ('$iref','$fname','$lname','$address','$city','$state','$zip','$phone','$email', CURDATE())";

$result = mysql_query($sql);
$ht_id = mysql_insert_id();

// Send Email Notification
require_once($_SERVER['DOCUMENT_ROOT'] . '/classes/HtDb.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/classes/HtEmail.php');

$db = new HtDb();
$email = new HtEmail();

$submission = $db->get('ht_form', array('ht_id', $ht_id));
$email->sendSubmission($submission, 'front page lead');

// Output the OK!
if($result) echo 'ok';

