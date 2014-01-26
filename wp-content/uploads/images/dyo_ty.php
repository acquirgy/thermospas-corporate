<?
$dbname = "tspas_thermospascom";
$db = mysql_connect("localhost", "tspas_tscom", "*tscom07");
mysql_select_db("tspas_thermospascom",$db);

if ($_REQUEST['call_day'] == 'choose' || $_REQUEST['call_time'] == 'choose') {

	header ("Location: http://www.thermospas.com/pricing-information.html?tub=45&fname=Matt&lname=Bryers&zip=06416&city=Cromwell&phone=8607883880&email=mbryers@fightauthority.com&call=err#call");

} else if ($_REQUEST['subform'] == "y" && ($_REQUEST['call_day'] != 'choose' && $_REQUEST['call_time'] != 'choose')) {

	$sql = "INSERT INTO lead_calls (`id`, `first_name`, `last_name`, `phone`, `email`, `tub`, `call_day`, `call_time`, `date_added`) VALUES 
	('".$_REQUEST['lead_id']."','".$_REQUEST['first_name']."', '".$_REQUEST['last_name']."', '".$_REQUEST['phone']."', '".$_REQUEST['email']."', 
	'".$_REQUEST['tub']."', '".$_REQUEST['call_day']."', '".$_REQUEST['call_time']."', NOW())";
	
	//echo $sql;
	
	$result = mysql_query("INSERT INTO lead_calls (`id`, `first_name`, `last_name`, `phone`, `email`, `tub`, `call_day`, `call_time`, `date_added`) VALUES 
	('".$_REQUEST['lead_id']."','".$_REQUEST['first_name']."', '".$_REQUEST['last_name']."', '".$_REQUEST['phone']."', '".$_REQUEST['email']."', 
	'".$_REQUEST['tub']."', '".$_REQUEST['call_day']."', '".$_REQUEST['call_time']."', NOW())");
	
	$callid = mysql_insert_id();
	
// multiple recipients
/*$to  = ''.$_REQUEST['email'].'' . ', '; // note the comma
$to .= 'wez@example.com';*/
$to = ''.$_REQUEST['email'].'';

// subject
$subject = 'Pricing Information Requestion from ThermoSpas';

// message
$message = '<html>
	<body style="font-family: Arial, Helvetica, sans-serif; color: #666666; font-size: 13px; ">
	<div style="width:550px;">
	  <div style="font-weight: bold; font-size: 19px; margin-bottom: 25px; color: #aa1428; text-align:center">Thank You for requesting pricing information - we are preparing your pricing info.</div>
	  <p style="margin-bottom: 10px;font-size: 13px; line-height: 20px;">A ThermoSpsa representative will be in contact with you in 24-48 hours with the details and pricing information for the hot tub you have designed. </p>
	  <p style="margin-bottom: 10px;font-size: 13px; line-height: 20px;">If you would like to have them manually process your quote immediately, please give us a call at:
	  <h2 style="font-weight: bold; font-size: 19px; margin:5px; color: #aa1428; text-align:center; padding:0px;">1-800-876-0158</h2></p>
	  <p align="center" style="font-size:15px; font-weight:bold">You may also view our DVD and download our brochure online. </p>
	  <p align="center"> <a href="http://www.thermospas.com/thermospas-dvd.html"><img alt="Click To View our DVD and Brochure" border="0" src="http://www.thermospas.com/images/dvd/dvdBrochure.png" /></a> </p>
	</div>
	</body>
	</html>';

// To send HTML mail, the Content-type header must be set
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

// Additional headers
$headers .= 'To: '.$_REQUEST['first_name'].' <'.$_REQUEST['email'].'>' . "\r\n";
$headers .= 'From: ThermoSpas <info@thermospa.com>' . "\r\n";

// Mail it
mail($to, $subject, $message, $headers);



	//header ("Location: http://www.thermospas.com/thermospas-dvd.html?callid=$callid");
	
} else {

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

/* 
dyo_ty.php?tub=45&fname=Matt&lname=Bryers&zip=06416&city=Cromwell&phone=8607883880&email=mbryers@fightauthority.com&stepc=done
*/


$sqlid = "SELECT id from `leads` where zip = '".$zip."' AND email = '".$email."' ORDER by id DESC LIMIT 1";
$resultid = MySQL($dbname,$sqlid);
$id = mysql_fetch_row($resultid);
$OID = $id[0];
//echo $_COOKIE['leadid'];
setcookie("leadid",$id[0],$time);

if (isset($_COOKIE['CJOID'])) {
	// DO NOTHING THIS PERSON HAS COME FROM CJ ALREADY - DUPLICATE LEAD	
	//echo "COOKIE SET:".$_COOKIE['CJOID']."";
} else {
	setcookie ("CJOID",$OID, $time);
	
	if ($_COOKIE['intsource'] != 'INTCMJ') {
	
	} else if (strlen($OID) < 5) {
	
	} else {
		echo "<img src=\"https://www.emjcd.com/u?AMOUNT=0&CID=1502276&TYPE=312422&METHOD=IMG&OID=".$OID."\" height=\"1\" width=\"20\">";
	}

}

switch ($tub) {
	case "23":
	$thistub = "gemini";
	$timg = "dyo_23_done.jpg";
	$iwidth = "269";
	break;
	case "34":
	$thistub = "atlantis";
	$timg = "dyo_34_done.jpg";
	$iwidth = "290";	
	break;
	case "45":
	$timg = "dyo_45_done.jpg";
	$thistub = "concord";
	$iwidth = "284";	
	break;
	case "56":
	$timg = "dyo_56_done.jpg";
	$thistub = "parkave";
	$iwidth = "343";	
	break;
}


?>

<div style="margin:10px 0px;">
 <h5 style="color:#0381cc">Congratulations <?=$fname?> <?=$lname?>! You&rsquo;re off to a great start in learning about the finest built hot tub in the world. </h5>
  <div style="float: left; width:<?=$iwidth?>">
  <table border="0" cellspacing="4" cellpadding="4" style="margin:6px; width:<?=$iwidth?>px; float:left;" width="<?=$iwidth?>">
  <tr>
    <td><img src="/images/<?=$timg?>" alt="ThermoSpas Hot Tub" width="<?=$iwidth?>"></td>
  </tr>
  <tr>
    <td><img src="images/coupon_sm.jpg" alt="Coupon" width="275" height="351" align="left" style="border:solid 2px #CCCCCC; padding:1px;"></td>
  </tr>
</table>
</div>
  
   We offer many patented  features exclusive to ThermoSpas that not only provide safety but make your hot  tub fun to use. Imagine owning a hot tub that heats up faster than any other  model and one that will also cool the water at the push of a button. The  greatest gift provided to a ThermoSpas owner is a system that cleans and  purifies the water so that it is actually drinkable. There are no chemical  odors and no off-gasses that deteriorate your spa over time. An added benefit  is that it is the only spa that doesn&rsquo;t require you to change the water and  clean the shell every 90 days. Most of our customers do it only every 6 to 12  months. </div>
<div style="margin:10px 0px;">
  <h5 style="color:#0381cc">More Good News</h5>
  Since ThermoSpas is a manufacturer that sells direct to the consumer you save a  great deal of money off of any of our custom built spas. </div>
<div style="margin:10px 0px;">
  <h5 style="color:#0381cc">Receive a Price Discount valued at up to $1,000 off</h5>
  on any New Designer Built ThermoSpas Hot  Tub that is good for 90 days from time of receipt.</div>
<div style="margin:10px 0px;">
  <h5 style="color:#0381cc">Best in Delivery  &amp; Best in Service!</h5>
  We  may not have a retail showroom in your area but we have something much better.  Our delivery team does not dropped It &nbsp;</div>
<div style="margin:10px 0px;">
  <h5 style="color:#0381cc">Pricing Information</h5>
  To receive pricing information on your custom built spa and many of the proprietary  features found only in a ThermoSpas simply do one of the following:

    <div style="margin:14px 30px;"><span style="font-size:16px; font-weight:bold; color:#0381cc;">&#8250;</span> <strong>Call our  International Offices in Connecticut  between the hours of xxxxx and press x to receive a marketing technician</strong></div>
    <div style="margin:14px 30px;"><span style="font-size:16px; font-weight:bold; color:#0381cc;">&#8250;</span> <strong>Select a time  range: morning, afternoon, or evening for us to call with best number to use.</strong></div>
    <div style="margin:14px 30px;"><span style="font-size:16px; font-weight:bold; color:#0381cc;">&#8250;</span> <strong>Actually choose  an exact time (within 15 minute intervals) during our office hours to be  assured to speak to a veteran technician.</strong></div>
	<div>
  <form action="dyo_ty.php" method="post">
    <table border="0" align="center" cellpadding="2" cellspacing="2" style="border: solid 1px #e2e3e4;">
      <tr>
        <td bgcolor="#F3F3F4"><strong><a name="call"></a>Confirm Phone Number</strong></td>
        <td bgcolor="#F3F3F4"><strong>Day</strong></td>
        <td bgcolor="#F3F3F4"><strong>Time</strong></td>
      </tr>
      <tr>
        <td bgcolor="#ffffff"><label>
          <input type="text" name="phone" value="<?=$phone?>">
          </label></td>
        <td bgcolor="#ffffff">Upcoming
          <?
						  #
						$months = array (1 => 'January', 'February', 'March', 'April', 'May', 'June','July', 'August', 'September', 'October', 'November', 'December');
						#
						$weekday = array('Monday','Tuesday','Wednesday','Thursday','Friday','Saturday');
						#
						$days = range (1, 31);

						echo "<select name='call_day'>";
						echo '<option value="choose">Choose Day</option>\n';
						foreach ($weekday as $value) {
						echo '<option value="'.$value.'">'.$value.'</option>\n';
						} echo '</select><br />';?></td>
        <td bgcolor="#ffffff">at
          <?
						$start = strtotime('9:00am');
						$end = strtotime('11:00pm');
						echo '<select name="call_time">';
						echo '<option value="choose">Choose Time</option>\n';
						for ($i = $start; $i <= $end; $i += 900)
						{
						echo '<option>' . date('g:i a', $i);
						}
						echo '</select>';
					  ?>        </td>
      </tr>
      <tr>
        <td colspan="3" align="center" bgcolor="#ffffff">
		<? if ($_REQUEST['call'] == "err") { ?><div style="margin:6px; color:#990000;">Please select a day and call time for us to contact you.  Thank you.</div><? } ?>
		<label>
          <input type="submit" name="Submit" value="Schedule Phone Call" style="background-color:#d2effd; border:solid 2px #0381cc; padding:3px; font-size:12px; font-weight:bold; color:#666666;">
        </label></td>
      </tr>
    </table>
	<input type="hidden" name="lead_id" value="<?=$OID?>">
	<input type="hidden" name="tub" value="<?=$thistub?>">
	<input type="hidden" name="subform" value="y">
	<input type="hidden" name="first_name" value="<?=$fname?>">
	<input type="hidden" name="last_name" value="<?=$lname?>">
	<input type="hidden" name="email" value="<?=$email?>">
  </form>
</div>
  <br clear="all">
  <div class="note"><strong>The phone call  should take approximately 5 minutes and requires NO Obligation to purchase or  sign up for anything. It&rsquo;s our way of providing you the best information on one  day owning the hot tub of your dreams.</strong></div>
</div>

<div style="margin:10px 0px;">If you would like  a Site Inspection by a professional technician, a ThermoSpas employee (not an  independent contractor) trained to answer questions on the ideal site location,  hot to save on electric usage, address all the structural, electrical, and  safety concerns of owning a hot tub. You&rsquo;ll learn how to spot a quality built  spa and how to avoid a poorly built product. Best of all he can help you  finalize the hot tub design around your needs, wants, and budget of your hot  tub. The Site Inspection is currently FREE with No Obligation to buy anything.</div>
<? } ?>