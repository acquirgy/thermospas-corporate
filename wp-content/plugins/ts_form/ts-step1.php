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
$url_ref	= $_POST['url_ref'];
$iref		= $_POST['iref'];
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
//echo $sql_ts_form;
$lead_date = date('m-d-y', strtotime($_POST['ts_date']));
$lead_time = date('H:i:s');

$sql_leads = "INSERT INTO ".$table2."
		(`create_date`,`create_time`, `DYO_use`,`DYO_tub`,`zip`,`referrer`,`name`,`fname`,`lname`,`phone`,`leads_token`) 
		VALUES ('".$lead_date."','".$lead_time."','".$ts_use."','".$ts_seating."','".$zipcode."','".$iref."','".$name."','".$fname."','".$lname."','".$phone."','".$ts_token."')";
//echo $sql_leads;
if(mysql_query($sql_ts_form)&&mysql_query($sql_leads)):
else:
endif;
?>