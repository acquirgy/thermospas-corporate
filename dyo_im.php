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

$tub_class = $_REQUEST['email'];

$stereo = $_REQUEST['stereo'];

$led = $_REQUEST['led'];

$steps = $_REQUEST['steps'];

$ozonators = $_REQUEST['ozonators'];

$lifters = $_REQUEST['lifters'];

$fname = $_REQUEST['fname'];

$lname = $_REQUEST['lname'];

$zip = $_REQUEST['zip'];

$email = $_REQUEST['email'];



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



switch ($tub) {

	case "23":

	$thistub = "Gemini";

	$img = "gemini_plat.jpg";

	break;

	case "34":

	$thistub = "Atlantis";

	$img = "atlantis_gold.jpg";

	break;

	case "45":

	$thistub = "Concord";

	$img = "concord_plat.jpg";

	break;

	case "56":

	$thistub = "Park Ave";

	$img = "parkave_diamond.jpg";

	break;

	case "swim":

	$thistub = "Swim Spas";

	$img = "swimspa-final.jpg";

	$avg_price = "$30,749";

	$range_start = "$29,999";

	$range_end = "$34,999";

	$start_range_start = "$29,999";

	break;

	case "exercise":

	$thistub = "Aquacisor and Exercise Spas";

	$img = "exercise-final.jpg";

	$avg_price = "$21,349";

	$range_start = "$16,995";

	$range_end = "$23,995";

	$start_range_start = "$16,995";

	break;

	case "swimexercise":

	$thistub = "Swim Spas, Aquacisor, and Exercise Spas";

	$img = "swimexercise-final.jpg";

	$avg_price = "$28,375";

	$range_start = "$16,995";

	$range_end = "$34,999";

	$start_range_start = "$16,995";

	break;

}



if ($tub != "swim" || $tub != "exercise" || $tub != "swimexercise") {



	$sqlt = "SELECT `range_start`,`range_end`,`avg_price` from `tub_config` where tub_name = '$thistub' AND base = 'y'";

	$resultt = MySQL($dbname,$sqlt);

	while ($tt = mysql_fetch_array ($resultt)) {

		$start_range_start = $tt['range_start'];

		$start_range_end = $tt['range_end'];

		$avg_price = $tt['avg_price'];

	}

	$sql = "SELECT * from `tub_config` where tub_class = '".$tub_class."' and tub_name = '$thistub'";

	$result = MySQL($dbname,$sql);

	//echo $sql;

	while ($t = mysql_fetch_array ($result)) {

		$tub_type = $t['tub_type'];

		$tub_name = $t['tub_name'];

		$tub_series = $t['tub_series'];

		$tub_image = $t['tub_image'];

		$tub_thumb = $t['tub_thumb'];

		$tub_price = $t['tub_price'];

		$range_start = $t['range_start'];

		$range_end = $t['range_end'];

		$range_between = $t['range_between'];

		$tub_includes = $t['tub_includes'];

	}



}







$rept = $email;

$MessageSubject = "Design Your Own Quote for $fname $lname";

$body .= "<html>\n";

$body .= "<body style='font-name:verdana; font-size:11pt;'>\n";

$body .= "<div style=\"width: 600px; text-align:left\">\n";

$body .= "  <p><img src='/logo2.jpg' width=\"288\" height=\"116\" border='0'><br>\n";

$body .= "    <br>\n";

$body .= "    Dear $fname $lname, <BR>\n";

$body .= "    <BR>\n";

$body .= "    Thank you for visiting the ThermoSpas Web site and giving us the opportunity to present you with an  price range for the $thistub hot tub you selected! </p>\n";

$body .= "  <p><span style = \"font-size: 14pt;font-weight: bold;font-family:'Trebuchet MS';color: #0066CC;\">Why am I receiving a Price &quot;Range&quot;?</span> <br />\n";

$body .= "Every ThermoSpas hot tub is custom built to each customer’s needs and their budget. The number of jets within the range you have selected determines both the number of pumps and their associated horsepower. But the customizing doesn’t stop there. ThermoSpas customers can choose from a long list of optional features (automatic purification systems, lighting options, stereo packages, etc) that may vary the price of the package you have selected from $range_start - $range_end.</p>\n";

$body .= "  <p><span style=\"font-size: 16pt; font-weight: bold; font-family: 'Trebuchet MS'; color: #FF0000;\">The lowest selling price of the $thistub model is $start_range_start</span></p>\n";

$body .= "  <p>In 2008 the average selling price of this model in the US, with all factory discount coupons and specials included was $avg_price. This price also included delivery and installation</p>";

$body .= "  <p><span style = \"font-size: 14pt;font-weight: bold;font-family: 'Trebuchet MS';color: #0066CC;\"><strong>Plus! Take advantage of coupons and specials! </strong></span><strong><br>\n";

$body .= "    </strong>There are always coupons and specials available to  provide a significant savings off our internet prices ranges. <strong>To find out how to take advantage of these savings, please call: 1-800-876-0158</strong></p>\n";

$body .= "  <p><span style = \"font-size: 14pt;font-weight: bold;font-family: 'Trebuchet MS';color: #0066CC;\"><strong>Does choosing a lesser priced package lessen the quality?</strong></span><br>\n";

$body .= "  <p>ABSOLUTELY NOT! Excluding certain features that you may not need or want will never diminish the quality, integrity, and service that symbolize the ThermoSpas brand. </p>\n";

$body .= "  <p align=\"left\"><span style = \"font-size: 14pt;font-weight: bold;font-family: 'Trebuchet MS';color: #0066CC;\"><strong>Online Special! - FREE Site Inspection and Consultation ($150 Value)</strong></span> <br>\n";

$body .= "    Since buying a hot tub is a big decision, our factory trained technicians can give you all the information you need on electrical requirements, spa locations, installation and more. Take advantage of this service free of charge today and <strong class=\"range\">without obligation</strong>.  Our goal is to help you make an educated decision on which custom built Thermospas hot tub is right for your lifestyle and budget. </p>\n";

$body .= "  <p align=\"left\"><strong>AND </strong>You'll find that the survey results are helpful in shopping for ANY hot tub, regardless of which brand you choose! <BR>\n";

$body .= "    <BR>\n";

$body .= "    You may also download the latest version of our brochure online at <a href='/pdf' style=\"color: #0066CC\">/pdf</a>.<br>\n";

$body .= "    If you have any questions, please contact us via e-mail or at 800-876-0158. <br>\n";

$body .= "    <br>\n";

$body .= "    If you have any questions or would like to talk more with one of our representatives, <strong>please call us</strong> at:</p>\n";

$body .= "  <p align=\"center\"> <strong class=\"header3\" style=\"font-size: 36px;color: #FF0000;\">1-800-876-0158</strong></p>\n";

$body .= "  Best Regards,<br>\n";

$body .= "  <br>\n";

$body .= "  <strong>ThermoSpas</strong></div>\n";

$body .= "</body>\n";

$body .= "</html>\n";

$headers .= "Content-Type: text/html; charset=ISO-8859-1 ";

$headers .= "MIME-Version: 1.0 ";

$headers .= 'To: $fname $lname <$email>' . "\r\n";

$headers .= 'From: ThermoSpas <info@thermospa.com>' . "\r\n";

mail($rept, $MessageSubject, $body, $headers);

?>

<style type="text/css">

<!--

.style5 {	color: #18a1f0;

	font-weight: bold;

}

-->

</style>

<div align="center" class="header"><strong>Congratulations

  <?=$fname?>

  ! You&rsquo;re off to a great start toward custom designing your very own Thermospas! </strong></div>

<p align="center" class="header3">Your quote for the

  <?=$tub_name?>

  hot tub you have designed has been emailed to you at: <span class="style2">

  <?=$email?>

  </span>. If  we have the wrong address, please correct it below.</p>

<img src="/images/dyo/<?=$img?>" align="left" hspace="15">

<p align="left" class="">Thank you for researching ThermoSpas Hot Tubs! We also recommend our<strong> FREE no-obligation Site Inspection</strong>. During Thermospas free home site survey the technician will check the site where you are planning to put the hot tub and address all the structural, electrical, and safety concerns that go along with owning any hot tub. He will explain what to look for in a quality hot tub and what to avoid in a poorly built hot tub. This is valuable information to have as you shop around. Lastly he will help you finalize your hot tub design around your needs and budget, and answer any questions you have. He will also inform you of any special offers or incentives that may be available at the time of his visit.</p>

<p align="left" class="">We understand that finding and choosing the right hot tub is an involved process. Please call us with any questions or concerns that you have (<span class="style5">1-800-876-0158</span>), even if you don't decide on a Thermospas!</p>

<form name="form1" method="post" action="/dyo.php">

  <table border="0" align="center" cellpadding="0" cellspacing="0" style="border:solid 2px #e1e1e1;">

    <tr>

      <td colspan="2" align="left" style="padding:3px;"><strong>Correct Email Address</strong> </td>

    </tr>

    <tr>

      <td align="left" style="padding:3px;"><label>

        <input name="email" type="text" id="email">

        </label></td>

      <td align="left" style="padding:3px;"><label>

        <input type="submit" name="Submit" value="Submit">

        </label></td>

    </tr>

  </table>

  <input type="hidden" name="tub" id="tub" value="<?=$tub?>" />

  <input type="hidden" name="jets" id="jets" value="<?=$jets?>" />

  <input type="hidden" name="fname" id="fname" value="<?=$fname?>" />

  <input type="hidden" name="lname" id="lname" value="<?=$lname?>" />

  <input type="hidden" name="zip" id="zip" value="<?=$zip?>" />

  <input type="hidden" name="stepc" id="stepc" value="done" />

</form>

<p align="center" valign="top" style="padding:6px;"><a href="/thermospas-dvd.html"><strong>Download our lastest brochure and watch our DVD online! </strong><br />

  <img src="images/brochure.jpg" alt="Download Brochure" width="300" height="249" border="0" /></a></p>

