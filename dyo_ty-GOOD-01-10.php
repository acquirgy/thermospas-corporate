<?

$dbname = "thermosp_thermospascom";

$db = mysql_connect("localhost", "thermosp_tscom", "*tscom07");

mysql_select_db("thermosp_thermospascom",$db);



if (strlen($_REQUEST['lead_id']) < 5) {

	$leadid = mysql_query("SELECT id FROM leads WHERE email = '".$_REQUEST['email']."' ORDER BY id DESC LIMIT 1");

	$leadidr = mysql_fetch_row($leadid);

	$myleadid = $leadidr[0];

} else {

	$myleadid = $_REQUEST['lead_id'];

}



$getq = "SELECT * FROM leads WHERE id = '".$myleadid."'";

//echo $getq;

$getqr = mysql_query($getq);

while ($getqa = mysql_fetch_array($getqr)) {

	$fname = $getqa['fname'];

	$lname = $getqa['lname'];

	$address1 = $getqa['address1'];

	$address2 = $getqa['address2'];

	$city = $getqa['city'];

	$state = $getqa['state'];

	$zip = $getqa['zip'];

	$phone = $getqa['phone'];

}



if ($_REQUEST['call_day'] == 'choose' || $_REQUEST['call_time'] == 'choose') {



	header ("Location: /pricing-information.html?tub=".$_REQUEST['tub']."&fname=".$_REQUEST['fname']."&lname=".$_REQUEST['lname']."&phone=".$_REQUEST['phone']."&email=".$_REQUEST['email']."&jets=".$_REQUEST['jets']."&tub=".$_REQUEST['tub']."&lead_id=".$_REQUEST['lead_id']."&call=err#call");



} else if ($_REQUEST['subform'] == "y" && ($_REQUEST['call_day'] != 'choose' && $_REQUEST['call_time'] != 'choose')) {



	$call_date = date("Y-m-d", $_REQUEST['call_day']);



	$call_day = date('l - F jS', $_REQUEST['call_day']);



	$lead_date = date("m-d-y", $_REQUEST['call_day']);



	$result = mysql_query("INSERT INTO lead_calls (`id`, `first_name`, `last_name`, `phone`, `email`, `tub`, `jets`,`call_date`,`call_day`, `call_time`, `date_added`) VALUES

	('".$_REQUEST['lead_id']."','".$_REQUEST['fname']."', '".$_REQUEST['lname']."', '".$_REQUEST['phone']."', '".$_REQUEST['email']."',

	'".$_REQUEST['tub']."', '".$_REQUEST['jets']."', '".$call_date."', '".$call_day."', '".$_REQUEST['call_time']."', NOW())");



	$callid = mysql_insert_id();



	$up_leads = mysql_query("UPDATE leads SET create_date = '".$lead_date."' WHERE id = '".$myleadid."'");



	//echo $up_leads;





// multiple recipients

$to = ''.$_REQUEST['email'].'';



// subject

$subject = 'ThermoSpas Phone Call Request';



// message

$message = '<html>

	<body style="font-family: Arial, Helvetica, sans-serif; color: #666666; font-size: 13px; ">

	<div style="width:550px;">

	  <div style="text-align:center"><img src="/images/dvd/header2.jpg" border="0"></div>

	  <div style="font-weight: bold; font-size: 19px; margin-bottom: 25px; color: #aa1428; text-align:center">Thank you for requesting a phone call.</div>

	  <p style="margin-bottom: 10px;font-size: 13px; line-height: 20px;">A ThermoSpas representative will be in contacting you at: '.$_REQUEST['call_time'].' on '.$call_day.' </p>

	  <p align="center" style="font-size:15px; font-weight:bold">You may also view our DVD and download our brochure online. </p>

	  <p align="center"> <a href="/thermospas-dvd.html"><img alt="Click To View our DVD and Brochure" border="0" src="/images/dvd/dvdBrochure.png" /></a> </p>

	</div>

	</body>

	</html>';



// To send HTML mail, the Content-type header must be set

$headers  = 'MIME-Version: 1.0' . "\r\n";

$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";



// Additional headers

$headers .= 'From: ThermoSpas <sales@thermospa.com>' . "\r\n";



// Mail it



mail($to, $subject, $message, $headers);



$to = "";

$subject = "";

$message = "";

$headers = "";



///////////////////////////////////////// EMAIL CUSTOMER SERVICE  //////////////////////////////////////////////



// multiple recipients

$to  = 'mbryers@thermospas.com' . ', '; // note the comma

//$to  .= 'sdavidson@thermospas.com' . ', '; // note the comma

//$to  .= 'skenesky@thermospas.com' . ', '; // note the comma

$to .= 'web@thermospas.com';



// subject

$subject = 'New Design Your Own Phone Call Request';



// message

$message = '<html>

	<body style="font-family: Arial, Helvetica, sans-serif; color: #666666; font-size: 13px; ">

	<div style="width:550px;">

	  <ul>

	  	<li><strong>Customer First Name</strong>: '.$_REQUEST['fname'].'</li>

		<li><strong>Customer Last Name</strong>: '.$_REQUEST['lname'].'</li>

		<li><strong>Customer Address</strong>: '.$address1.'</li>

		<li><strong>Customer Address 2</strong>: '.$address2.'</li>

		<li><strong>Customer City</strong>: '.$city.'</li>

		<li><strong>Customer State</strong>: '.$state.'</li>

		<li><strong>Customer Zip Code</strong>: '.$zip.'</li>

		<li><strong>Customer Phone Number</strong>: '.$_REQUEST['phone'].'</li>

		<li><strong>Customer Email Address</strong>: '.$_REQUEST['email'].' </li>

		<li><strong>Hot Tub Designed</strong>: '.ucfirst($_REQUEST['tub']).'</li>

		<li><strong>Number of Jets Selected</strong>: '.$_REQUEST['jets'].'</li>

		<li><strong>Call Day</strong>: '.$call_day.'</li>

		<li><strong>Call Time</strong>: '.$_REQUEST['call_time'].'</li>

	  </ul>

	</div>

	</body>

	</html>';



// To send HTML mail, the Content-type header must be set

$headers  = 'MIME-Version: 1.0' . "\r\n";

$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";



// Additional headers

//$headers .= 'To: Call Center <callcenter@thermospas.com>' . "\r\n";

$headers .= 'From: ThermoSpas <sales@thermospa.com>' . "\r\n";



// Mail it

mail($to, $subject, $message, $headers);



	header ("Location: /thermospas-dvd.html?callid=$callid&call_time=".$_REQUEST['call_time']."&call_day=".$call_day."");



} else {



// multiple recipients

$to = ''.$_REQUEST['email'].'';



// subject

$subject = 'Pricing Information Requestion from ThermoSpas';



// message

$message = '<html>

	<body style="font-family: Arial, Helvetica, sans-serif; color: #666666; font-size: 13px; ">

	<div style="width:550px;">

	  <div style="text-align:center"><img src="/images/dvd/header2.jpg" border="0"></div>

	  <div style="font-weight: bold; font-size: 19px; margin-bottom: 25px; color: #aa1428; text-align:center">Thank You for requesting pricing information - we are preparing your pricing info.</div>

	  <p style="margin-bottom: 10px;font-size: 13px; line-height: 20px;">A ThermoSpas representative will be in contact with you in 24-48 hours with the details and pricing information for the hot tub you have designed. </p>

	  <p style="margin-bottom: 10px;font-size: 13px; line-height: 20px;">If you would like to have them manually process your quote immediately, please give us a call at:

	  <h2 style="font-weight: bold; font-size: 19px; margin:5px; color: #aa1428; text-align:center; padding:0px;">1-800-876-0158</h2></p>

	  <p align="center" style="font-size:15px; font-weight:bold">You may also view our DVD and download our brochure online. </p>

	  <p align="center"> <a href="/thermospas-dvd.html"><img alt="Click To View our DVD and Brochure" border="0" src="/images/dvd/dvdBrochure.png" /></a> </p>

	</div>

	</body>

	</html>';



// To send HTML mail, the Content-type header must be set

$headers  = 'MIME-Version: 1.0' . "\r\n";

$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";



// Additional headers

$headers .= 'From: ThermoSpas <sales@thermospa.com>' . "\r\n";



// Mail it

if ($_REQUEST['lname'] != 'Bryers') {

mail($to, $subject, $message, $headers);

}



$to = "";

$subject = "";

$message = "";

$headers = "";



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

$fname = htmlspecialchars($_REQUEST['fname']);

$lname = htmlspecialchars($_REQUEST['lname']);

$zip = htmlspecialchars($_REQUEST['zip']);

$state = htmlspecialchars($_REQUEST['state']);

$address1 = htmlspecialchars($_REQUEST['address1']);

$city = htmlspecialchars($_REQUEST['city']);

$phone = htmlspecialchars($_REQUEST['phone']);

$email = htmlspecialchars($_REQUEST['email']);

$correcte = $_REQUEST['correcte'];

$customerid = $_REQUEST['customerid'];

$quoteid = $_REQUEST['quoteid'];







/*

dyo_ty.php?tub=45&fname=Matt&lname=Bryers&zip=06416&city=Cromwell&phone=8607883880&email=mbryers@fightauthority.com&jets=70

*/





$sqlid = "SELECT id from `leads` where email = '".$email."' ORDER by id DESC LIMIT 1";

$resultid = MySQL($dbname,$sqlid);

$id = mysql_fetch_row($resultid);

$OID = $id[0];

//echo $_COOKIE['leadid'];

setcookie("leadid",$id[0],$time);



$lead_date1 = date("m-d-y", mktime(0, 0, 0, date("m")  , date("d"), date("Y")));



$up_leads1 = mysql_query("UPDATE leads SET

create_date = '".$lead_date1."',

DYO_tub = '".$tub."',

DYO_jets = '".$jets."',

address1 = '".$address1."',

city = '".$city."',

state = '".$state."',

zip = '".$zip."',

phone = '".$phone."'

WHERE id = '".$id[0]."'");



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

switch($jets) {

	case "s":

	$tub_class = "Silver";

	break;

	case "g":

	$tub_class = "Gold";

	break;

	case "p":

	$tub_class = "Platinum";

	break;

	case "d":

	$tub_class = "Diamond";

	break;

}



?>

<div style="margin:10px 0px;">

  <h5 style="color:#0381cc">Congratulations

    <?=$fname?>

    <?=$lname?>

    ! <br>

    You&rsquo;re off to a great start in learning about the finest built hot tub in the world. </h5>

  <div style="float: left; width:<?=$iwidth?>">

    <table border="0" cellspacing="4" cellpadding="4" style="margin:6px; width:<?=$iwidth?>px; float:left;" width="<?=$iwidth?>">

      <tr>

        <td><img src="/images/<?=$timg?>" alt="ThermoSpas Hot Tub" width="<?=$iwidth?>"></td>

      </tr>

      <tr>

        <td><img src="/images/service.jpg" alt="Hot Tub Service" width="275" height="191"  style="border:solid 2px #CCCCCC; padding:1px;"></td>

      </tr>

      <tr>

        <td><img src="/images/1000-saving-3.jpg" alt="Coupon" width="275" height="153" align="left" style="border:solid 2px #CCCCCC; padding:1px;"></td>

      </tr>

    </table>

  </div>

  <p>Thank  you for visiting the ThermoSpas web site. We offer many patented features that  not only provide safety but make your hot tub fun to use and easier to maintain  than any other spa on the market. The greatest gift provided to a ThermoSpas  owner is a system that cleans and purifies the water so that it is actually  drinkable. There are no chemical odors and no off-gasses that deteriorate your  spa over time. An added benefit is that it is the only spa that doesn&rsquo;t require  you to change the water and clean the shell every 90 days. Most of our  customers do it only every 6 to 12 months.<u></u></p>

</div>

<div style="margin:10px 0px;">

  <h5 style="color:#0381cc">More Good News</h5>

  ThermoSpas  has been manufacturing hot tubs for over a quarter of a century and today is  also the largest retailer of hot tubs in the world. We are a manufacturer that  sells direct to the consumer so you are guaranteed to receive the best value  for your money.</div>

<div style="margin:10px 0px;">

  <h5 style="color:#0381cc; padding:0px; margin:5px 0px;">Pricing Information</h5>

  <h6 style="margin:5px 0px; padding:0px"><span style="font-style: italic">We are processing your pricing request, please see below </span></h6>

  A  Marketing Representative at ThermoSpas will not only provide you with pricing  information on the model you have custom designed, but also the lowest price on  that model, less the optional features you have selected, along with the  average selling price of that model packaged with the most desired options sold  in the US market. To speak to a marketing representative choose from the  following:

  <div style="margin:14px 30px;">

  <h7><span style="font-size:20px; color:#0381cc;">&#8250;</span> <span style="color:#f37901;font-size:16px; font-weight:bold;">Option  1</span>:  To receive immediate price information please <strong><a href="/pricing-information.html?tub=<?=$_REQUEST['tub']?>&amp;fname=<?=$_REQUEST['fname']?>&amp;lname=<?=$_REQUEST['lname']?>&amp;phone=<?=$_REQUEST['phone']?>&amp;email=<?=$_REQUEST['email']?>#call">click here</a> </strong>and select a time for a senior marketing representative  to call you.</h7> </div>

  <div style="margin:14px 30px;">

  <h7><span style="font-size:20px; color:#0381cc;">&#8250;</span> <span style="color:#f37901;font-size:16px; font-weight:bold;">Option  2</span>:  To call a marketing representative dial <span style="font-weight: bold">1-800-876-0158</span> (Option 1) between Mon &ndash;  Thurs: 9AM - 12AM, Fri 9AM &ndash; 10pm, and Sat 9AM &ndash; 6PM EST.&nbsp; <span style="font-style: italic; font-weight: bold">Please note:</span> computer software requires 24 hours to prepare price  information on calls coming into home office.</h7> </div>

  <div style="margin-top:40px;">

    <form action="dyo_ty.php" method="post">

      <a name="call" id="call"></a>

      <? if ($_REQUEST['call'] == "err") { ?>

      <div style="margin:6px; text-align:center; color:#990000; font-weight:bold;">Please select a day and call time for us to contact you.  Thank you.</div>

      <? } ?>

      <table border="0" align="center" cellpadding="2" cellspacing="2" style="border: solid 1px #e2e3e4;">

        <tr>

          <td bgcolor="#F3F3F4"><strong>Confirm Phone Number</strong></td>

          <td bgcolor="#F3F3F4"><strong>Day</strong></td>

          <td bgcolor="#F3F3F4"><strong>Time</strong></td>

        </tr>

        <tr>

          <td bgcolor="#ffffff"><label>

            <input type="text" name="phone" value="<?=$phone?>" />

          </label></td>

          <td bgcolor="#ffffff">Upcoming

            <? if ($_REQUEST['call'] == "err") { $cstyle = '"style="color: #990000;"'; } ?>

              <?

						  #

						$months = array (1 => 'January', 'February', 'March', 'April', 'May', 'June','July', 'August', 'September', 'October', 'November', 'December');

						#

						$weekday = array('Monday','Tuesday','Wednesday','Thursday','Friday','Saturday');

						#

						$days = range (1, 31);



						echo "<select name='call_day'>";

						echo '<option value="choose" '.$cstyle.'>Choose Day</option>\n';





						$i = 0;

						while ($i < 7) {

						$day = mktime(0, 0, 0, date("m")  , date("d")+$i, date("Y"));



						if(stristr(date('l - F jS', $day), 'Sunday') === FALSE) {

							echo '<option value="'.$day.'">'.date('l - F jS', $day).'</option>';

						}

						$i++;

						}



						echo '</select><br />';?></td>

          <td bgcolor="#ffffff">at

            <?

						$start = strtotime('9:00am');

						$end = strtotime('11:00pm');

						echo '<select name="call_time" >';

						echo '<option value="choose" '.$cstyle.'>Choose Time</option>\n';

						echo '<option value="morning" '.$cstyle.'>Morning</option>\n';

						echo '<option value="mid-day" '.$cstyle.'>Mid-Day</option>\n';

						echo '<option value="evening" '.$cstyle.'>Evening</option>\n';

						echo '<option value="choose" style="text-align:center">-------</option>\n';

						for ($i = $start; $i <= $end; $i += 900)

						{

						echo '<option>' . date('g:i a', $i);

						}

						echo '</select>';

					  ?> (EST)          </td>

        </tr>

        <tr>

          <td colspan="3" align="center" bgcolor="#ffffff"><label>

            <input type="submit" name="Submit" value="Schedule Phone Call" style="background-color:#d2effd; border:solid 2px #0381cc; padding:3px; font-size:12px; font-weight:bold; color:#666666;" />

          </label></td>

        </tr>

      </table>

      <input type="hidden" name="lead_id" value="<?=$OID?>" />

      <input type="hidden" name="tub" value="<?=$thistub?>" />

      <input type="hidden" name="jets" value="<?=$tub_class?>" />

      <input type="hidden" name="subform" value="y" />

      <input type="hidden" name="fname" value="<?=$fname?>" />

      <input type="hidden" name="lname" value="<?=$lname?>" />

      <input type="hidden" name="email" value="<?=$email?>" />

    </form>



  </div>

</div>

<br clear="all" />

<div class="note">

      <p style="font-weight: bold">The  phone call should take approximately 5 minutes and requires NO Obligation to  purchase or sign up for anything. It&rsquo;s our way of providing you the best  information on one day owning the hot tub of your dreams.</p>

    </div>

<div style="margin:10px 0px;">

  <h5 style="color:#0381cc">Best in Delivery  &amp; Best in Service!</h5>

  <p>Though  we may not have a showroom in your area we do employ factory trained  technicians (not sub-contractors) that offer the best in delivery and service.  ThermoSpas &ldquo;White Glove Delivery Program&rdquo; means that we don&rsquo;t leave until you&rsquo;re  satisfied. We not only deliver the spa but install it in place, train you on  the operation and maintenance functions, and provide a complete inspection. <br>

    Service  is the most important benefit in buying from ThermoSpas. No one can service a  product better than an employee that undergoes extensive factory training. Our  technicians are prompt, courteous, and professional. Every van is fully stocked  with ThermoSpas factory parts minimizing the opportunity for a return trip. &nbsp;&nbsp;</p>

</div>

<div style="margin:10px 0px;">

  <h5 style="color:#0381cc">Free Site Inspection</h5>

  <p>ThermoSpas  offers a Free Site Inspection for those seeking answers on the ideal site location  and how to save on electrical usage. Our professional factory trained  technician in your area can answer questions on structural, electrical, and  safety concerns along with assistance on custom designing the perfect hot tub  at the best value. This FREE service requires No Obligation to buy anything but  will satisfy any concerns on hot tub ownership and answer questions on making  quality choices. If interested ask our marketing representative for a date and  time convenient for you and our local technician. &nbsp;&nbsp;</p>

</div>

<div style="margin:10px 0px;">

  <h5 style="color:#0381cc">Additional Savings </h5>

  <p>Ask  about Special Sales Discounts Now available on Select Models. Along with  Special Financing Packages!&nbsp;</p>

</div>

<!-- Google Code for Lead Conversion Page -->

<script language="JavaScript" type="text/javascript">

<!--

var google_conversion_id = 1070435200;

var google_conversion_language = "en_US";

var google_conversion_format = "1";

var google_conversion_color = "ffffff";

var google_conversion_label = "kGb9CPSFPRCAl7b-Aw";

//-->

</script>

<script language="JavaScript" src="http://www.googleadservices.com/pagead/conversion.js">

</script>

<noscript>

<img height="1" width="1" border="0" src="http://www.googleadservices.com/pagead/conversion/1070435200/?label=kGb9CPSFPRCAl7b-Aw&amp;guid=ON&amp;script=0"/>

</noscript>

<script type="text/javascript">

var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");

document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));

</script>

<script type="text/javascript">

try {

var pageTracker = _gat._getTracker("UA-86818-1");

pageTracker._trackPageview();

} catch(err) {}</script>



<?

echo "<!-- GOOGLE OPTIMIZER TESTING -->

			<script>

			if(typeof(urchinTracker)!='function')document.write('<sc'+'ript src=\"'+

			'http'+(document.location.protocol=='https:'?'s://ssl':'://www')+

			'.google-analytics.com/urchin.js'+'\"></sc'+'ript>')

			</script>

			<script>

			_uacct = 'UA-86818-9';

			urchinTracker(\"/3901324741/goal\");

			</script>";



} ?>

