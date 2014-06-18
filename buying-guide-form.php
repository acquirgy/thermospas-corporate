<?
$dbname = "thermosp_thermospascom";
$db = mysql_connect("localhost", "thermosp_tscom", "*tscom07");
mysql_select_db("thermosp_thermospascom",$db);

if ($_POST['zipcode'] == 'Your Zip Code *' || $_POST['name'] == 'Your Name *' || $_POST['phone'] == 'Your Phone *') {

	header("Location: /?page_id=".$_POST['post_id']);

} else {

	$iref = "IBRO";
  session_start();
	if(isset($_SESSION['s_iref']) && $_SESSION['s_iref']) {
	  $iref = $_SESSION['s_iref'];
	  unset($_SESSION['s_iref']);
	}

	$insq = "INSERT INTO ht_form (`ht_date`,`name`,`email`,`zipcode`,`phone`,`iref`,`address1`,`city`,`state`)
						VALUES (NOW(),'".$_POST['name']."','".$_POST['email']."','".$_POST['zipcode']."','".
						$_POST['phone']."','".$iref."','".$_POST['address']."','".
						$_POST['city']."','".$_POST['state']."')";

	$result = mysql_query($insq);

	header("Location: /thermospas-dvd.html");

}

$ht_id = mysql_insert_id();

// Send Email Notification
require_once($_SERVER['DOCUMENT_ROOT'] . '/classes/HtDb.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/classes/HtEmail.php');

$db = new HtDb();
$email = new HtEmail();

$submission = $db->get('ht_form', array('ht_id', $ht_id));
$email->sendSubmission($submission, 'Free Brochure, DVD & $1,000 Coupon Form');

?>