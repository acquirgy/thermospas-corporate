<?php
$dbname = "thermosp_thermospascom";
$db = mysql_connect("localhost", "thermosp_tscom", "*tscom07");
mysql_select_db("thermosp_thermospascom",$db);
//echo "success";
$table	= "ht_form";
$table2 = "leads";
json_encode( $_POST );

$ts_date	= $_POST['ts_date'];
$ts_use		= $_POST['ts_use'];
$ts_seating = $_POST['ts_seating'];
$name		= $_POST['name'];
$zipcode	= $_POST['zipcode'];
$phone		= $_POST['phone'];
$url_ref	= @$_POST['url_ref'];
$iref		= $_POST['iref'];
session_start();
if(isset($_SESSION['s_iref']) && $_SESSION['s_iref']) {
  $iref = $_SESSION['s_iref'];
  unset($_SESSION['s_iref']);
}
$ts_token	= $_POST['ts_token'];

$name_arr = explode(" ",$name);
$fname = $name_arr[0];
$lname = $name_arr[1];

$search1  = array('(', ')');
$search2  = array('+', ' ');
$phone = str_replace($search1, "", $phone);
$phone = str_replace($search2, "-", $phone);

$sql_ts_form = "INSERT INTO ".$table."
		(`ht_date`, `ht_use`,`ht_seating`,`zipcode`,`url_ref`,`iref`,`name`,`fname`,`lname`,`phone`,`ht_token`)
		VALUES ('".$ts_date."','".$ts_use."','".$ts_seating."','".$zipcode."','".$url_ref."','".$iref."','".$name."','".$fname."','".$lname."','".$phone."','".$ts_token."')";
echo $sql_ts_form;
$lead_date = date('m-d-y', strtotime($_POST['ts_date']));
$lead_time = date('H:i:s');

$sql_leads = "INSERT INTO ".$table2."
		(`create_date`,`create_time`, `DYO_use`,`DYO_tub`,`zip`,`referrer`,`name`,`fname`,`lname`,`phone`,`leads_token`)
		VALUES ('".$lead_date."','".$lead_time."','".$ts_use."','".$ts_seating."','".$zipcode."','".$iref."','".$name."','".$fname."','".$lname."','".$phone."','".$ts_token."')";
//echo $sql_leads;
mysql_query($sql_ts_form);
$ht_id = mysql_insert_id();

mysql_query($sql_leads);
$lead_id = mysql_insert_id();

// Send Email Notification
require_once($_SERVER['DOCUMENT_ROOT'] . '/classes/HtDb.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/classes/HtEmail.php');

$db = new HtDb();
$email = new HtEmail();

$submission = $db->get('ht_form', array('ht_id', $ht_id));
$lead = $db->get('leads', $lead_id);
$email->sendSubmission($submission, 'Request a Quote - step 1', $lead);
// End Send Email Notification

?>