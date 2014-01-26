<?
$dbname = "thermosp_thermospascom";
$db = mysql_connect("localhost", "thermosp_tscom", "*tscom07");

$today = date("m-d-y", mktime(0, 0, 0, date("m")  , date("d"), date("Y")));

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
$city = $_REQUEST['city'];
$phone = $_REQUEST['phone'];
$email = $_REQUEST['email'];
$correcte = $_REQUEST['correcte'];
$customerid = $_REQUEST['customerid'];
$quoteid = $_REQUEST['quoteid'];


$sqlid = "SELECT id from `ht_form` where zipcode = '".$zip."' AND email = '".$email."' ORDER by id DESC LIMIT 1";
$resultid = MySQL($dbname,$sqlid);
$id = mysql_fetch_row($resultid);
$OID = $id[0];
//echo $_COOKIE['leadid'];
setcookie("leadid",$id[0],$time);

switch ($tub) {
	case "23":
	$thistub = "gemini";
	$ht_seating = "2to3";
	break;
	case "34":
	$thistub = "atlantis";
	$ht_seating = "3to4";
	break;
	case "45":
	$thistub = "concord";
	$ht_seating = "4to5";
	break;
	case "56":
	$thistub = "parkave";
	$ht_seating = "5to6";
	break;
}

if (strlen($_REQUEST['quoteid']) > 5) {
	header ("Location: index.php?option=com_content&view=article&id=234&Itemid=414&tub=".$tub."&jets=".$jets."&fname=".$fname."&lname=".$lname."&quoteid=".$quoteid."");
} else if ($stepc == "2") {
	if ($tub == "swim" || $tub == "exercise" || $tub == "swimexercise") {
		header ("Location: index.php?option=com_content&view=article&id=233&Itemid=414&tub=".$tub."");
	} else {
		header ("Location: step-3-choose-shell-and-cabinet-color.html?tub=".$tub."&jets=".$jets."&location=".$location."");
	}
} else if ($stepc == "3") {
	header ("Location: step-4-select-additional-options.html?tub=".$tub."&jets=".$jets."&location=".$location."&tcolor=".$tcolor."&bcolor=".$bcolor."");
} else if ($stepc == "4") {
	header ("Location: step-5-get-a-quote.html?tub=".$tub."&jets=".$jets."&location=".$location."&tcolor=".$tcolor."&bcolor=".$bcolor."&stereo=".$stereo."&led=".$led."&steps=".$steps."&ozonators=".$ozonators."&coverlifters=".$coverlifters."");
} else if ($stepc == "done") {

			$name = $_REQUEST['name'];
			$address1 = $_REQUEST['address1'];
			$city = $_REQUEST['city'];
			$state = $_REQUEST['state'];
			$zipcode = $_REQUEST['zip'];
			$email = $_REQUEST['email'];
			$phone = $_REQUEST['phone'];
			$referrer = $_COOKIE['intsource'];
			$DYO_tub = $_REQUEST['tub'];
			$DYO_jets = $_REQUEST['jets'];
			$DYO_location = $_REQUEST['location'];

			if (substr($phone,0,1) == '1') {
			$phone = ltrim($phone,'1');
			}
			if (substr($phone,0,1) == '0') {
				$phone = ltrim($phone,'0');
			}
			$phone = str_replace('(','',$phone);
			$phone = str_replace(')','',$phone);
			$phone = str_replace('/','',$phone);
			$phone = str_replace('=','',$phone);
			$phone = str_replace('+1','',$phone);
			$phone = str_replace('+','',$phone);
			$phone = str_replace('-','',$phone);
			$phone = str_replace(' ','',$phone);
			$phone = str_replace('.','',$phone);
			$pa = str_split($phone,3);


			$insertsql = "INSERT INTO `ht_form` (`name` , `address1`, `city`, `state`, `zipcode`, `email`, `phone`, `iref`, `ht_seating`, `ht_jets`, `ht_location`, `ht_date`)"
			." VALUES ( "
			." '$name', '$address1', '$city', '$state', '$zipcode', '$email', '$phone', 'IDYO', '$ht_seating', '$DYO_jets', '$DYO_location', NOW())";

			//echo $insertsql;

			$insert = mysql_query($insertsql);
			$OID = mysql_insert_id();


		echo "<img src=\"https://www.emjcd.com/u?AMOUNT=0&CID=1502276&TYPE=312422&METHOD=IMG&OID=".$OID."\" height=\"1\" width=\"20\">";

		echo '<img border="0" src="http://www.thermospas.com/affiliate/sale.php?profile=44&idev_leadamt=35.00&idev_ordernum='.$OID.'" width="1" height="1">';

		echo "<div align=\"center\" style=\"margin-top:20px;\">\n
<h1 style=\"color: #565656;\">Please wait while we transfer your pricing information page, if this takes longer then 5 seconds, please click here:</h1>\n
<A href=\"http://www.thermospas.com/design-your-own-results.php?lead_id=$OID\"><h2>Pricing Information </h2></A></div>\n
<meta http-equiv=\"refresh\" content=\"0;url=http://www.thermospas.com/design-your-own-results.php?lead_id=$OID\" />";



} else {
	header ("Location: index.php?option=com_content&view=category&layout=blog&id=67&Itemid=414");
}
?>