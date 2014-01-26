<?
$dbname = "thermosp_thermospascom";
$db = mysql_connect("localhost", "thermosp_tscom", "*tscom07");
mysql_select_db("thermosp_thermospascom",$db);

if ($_POST['zipcode'] == 'Your Zip Code *' || $_POST['name'] == 'Your Name *' || $_POST['phone'] == 'Your Phone *') {

	header("Location: http://www.thermospas.com/?page_id=".$_POST['post_id']);

} else {

	$iref = "IBRO";

	$insq = "INSERT INTO ht_form (`ht_date`,`name`,`email`,`zipcode`,`phone`,`iref`,`address1`,`city`,`state`)
						VALUES (NOW(),'".$_POST['name']."','".$_POST['email']."','".$_POST['zipcode']."','".
						$_POST['phone']."','".$iref."','".$_POST['address']."','".
						$_POST['city']."','".$_POST['state']."')";

	$result = mysql_query($insq);

	header("Location: http://www.thermospas.com/thermospas-dvd.html");

}

?>