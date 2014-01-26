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


$sql = 'INSERT INTO ht_form (iref,fname,lname,address1,city,state,zipcode,phone,email, ht_date)';
$sql .= " VALUES ('IHOME','$fname','$lname','$address','$city','$state','$zip','$phone','$email', CURDATE())";

$result = mysql_query($sql);

if($result) echo 'ok';

