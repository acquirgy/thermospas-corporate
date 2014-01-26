<?

$dbname = "thermosp_thermospascom";

$db = mysql_connect("localhost", "thermosp_tscom", "*tscom07");



$mainurl = "http://www.thermospas.com";
$stepc = $_REQUEST['stepc'];
$tub = $_REQUEST['tub'];
$jets = $_REQUEST['jets'];
$location = $_REQUEST['location'];
$tcolor = $_REQUEST['tcolor'];
$bcolor = $_REQUEST['bcolor'];
$stereo = $_REQUEST['stereo'];
$led = $_REQUEST['led'];
$steps = $_REQUEST['steps'];
$ozonators = $_REQUEST['ozonators'];
$lifters = $_REQUEST['lifters'];
$fname = $_REQUEST['fname'];
$lname = $_REQUEST['lname'];
$zip = $_REQUEST['zip'];
$email = $_REQUEST['email'];
$correcte = $_REQUEST['correcte'];
$customerid = $_REQUEST['customerid'];
$quoteid = $_REQUEST['quoteid'];

switch ($tub) {

	case "23":
	$thistub = "gemini";
	break;

	case "34":
	$thistub = "atlantis";
	break;

	case "45":
	$thistub = "concord";
	break;

	case "56":
	$thistub = "parkave";

	break;

}



if (strlen($_REQUEST['quoteid']) > 5) {
	header ("Location: index.php?option=com_content&view=article&id=234&Itemid=414&tub=".$tub."&fname=".$fname."&lname=".$lname."&quoteid=".$quoteid."");

} else if ($stepc == "2") {
	header ("Location: index.php?option=com_content&view=article&id=231&Itemid=414&tub=".$tub."&jets=".$jets."&location=".$location."");

} else if ($stepc == "3") {
	header ("Location: index.php?option=com_content&view=article&id=232&Itemid=414&tub=".$tub."&jets=".$jets."&location=".$location."&tcolor=".$tcolor."&bcolor=".$bcolor."");

} else if ($stepc == "4") {
	header ("Location: index.php?option=com_content&view=article&id=233&Itemid=414&tub=".$tub."&jets=".$jets."&location=".$location."&tcolor=".$tcolor."&bcolor=".$bcolor."&stereo=".$stereo."&led=".$led."&steps=".$steps."&ozonators=".$ozonators."&coverlifters=".$coverlifters."");

} else if ($stepc == "done") {

	$sqlz = "SELECT * from `im_zipcodes` where zipcode = '".$zip."'";
	$resultz = MySQL($dbname,$sqlz);
	$numz = mysql_num_rows($resultz);

	if ($numz >= 1) {

		// ID 235 (IM)

		header ("Location: index.php?option=com_content&view=article&id=235&Itemid=414&tub=".$tub."&jets=".$jets."&fname=".$fname."&lname=".$lname."&email=".$email."&zip=".$zip."");

	} else {

		// ID 234 (OM)

		header ("Location: index.php?option=com_content&view=article&id=234&Itemid=414&tub=".$tub."&jets=".$jets."&fname=".$fname."&lname=".$lname."&email=".$email."&zip=".$zip."");

	}

} else if ($correcte == "y"){

	if ($loc == "in") {

	} else if ($loc == "om") {

		$fixe = mysql($dbname,"UPDATE leads set email = '".$email."' WHERE id='".$customerid."'");

		header ("Location: index.php?option=com_content&view=article&id=234&Itemid=414&tub=".$tub."&jets=".$jets."&fname=".$fname."&lname=".$lname."&email=".$email."&zip=".$zip."");

	}

} else {

	header ("Location: index.php?option=com_content&view=category&layout=blog&id=67&Itemid=414");

}

?>