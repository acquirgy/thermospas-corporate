<?
/*		Action Name: ThermoSpa   Lead
Action Criteria: Online leaad
Action ID (TYPE in pixel): 354381
Enterprise ID (CID in pixel): 1524481
Container Tag ID: 1204*/

$dbname = "thermosp_thermospascom";
$db = mysql_connect("localhost", "thermosp_tscom", "*tscom07");
mysql_select_db("thermosp_thermospascom",$db);

if (@strlen($_REQUEST['phone']) > 5) {
	$upp = mysql_query("UPDATE ht_form set phone = '".$_REQUEST['phone']."' WHERE ht_id = '".$_REQUEST['ht_id']."'");
}

if(@$_GET['ht_token'] != "") {
	$getqry = "SELECT * FROM ht_form WHERE ht_token = '".$_GET['ht_token']."'";
} else {
	$getqry = "SELECT * from ht_form WHERE ht_id = '".$_REQUEST['ht_id']."'";
}

$infoResult = mysql_query($getqry);

while($trow = mysql_fetch_array($infoResult)) {

	$name = $trow['name'];
	$fname = $trow['fname'];
	$lname = $trow['lname'];
	$phone = $trow['phone'];
	$email = $trow['email'];
	$address1 = $trow['address1'];
	$city = $trow['city'];
	$state = $trow['state'];
	$zipcode = $trow['zipcode'];
	$phone = $trow['phone'];
	$ht_type = $trow['ht_type'];
	$ht_location = $trow['ht_location'];
	$ht_use = $trow['ht_use'];
	$ht_seating = $trow['ht_seating'];
	$ht_jets = $trow['ht_jets'];
	$ht_owner = $trow['ht_owner'];
	$ht_id = $trow['ht_id'];
	$comments = $trow['comments'];

}

if ($ht_type == 'swim' || $ht_type == 'exercise') {

		$thistub = "gemini";
		$timg = "dyo_swim_done.jpg";
		$iwidth = "269";
		$person_text = "Swim Spas / Exercise Spas";

} else {

	switch ($ht_seating) {
		case "2to3":
			$thistub = "gemini";
			$timg = "dyo_23_done.jpg";
			$iwidth = "269";
			$person_text = "2 to 3 Person";
			break;

		case "3to4":
			$thistub = "atlantis";
			$timg = "dyo_34_done.jpg";
			$iwidth = "290";
			$person_text = "3 to 4 Person";
			break;

		case "4to5":
			$timg = "dyo_45_done.jpg";
			$thistub = "concord";
			$iwidth = "284";
			$person_text = "4 to 5 Person";
			break;

		case "5to6":
		$timg = "dyo_56_done.jpg";
		$thistub = "parkave";
		$iwidth = "343";
		$person_text = "5 to 6 Person";
		break;

		case "6to+":
			$timg = "dyo_56_done.jpg";
			$thistub = "parkave";
			$iwidth = "343";
			$person_text = "6 + Person";
			break;

		default:
			$timg = "dyo_56_done.jpg";
			$iwidth = "343";
			break;

	}

}

switch($ht_type) {

	case "portable":
		$type_text = "Portable";
		break;

	case "swim":
		$type_text = "Swim Spas / Exercise";
		break;

}


if ((@$_REQUEST['call_day'] == 'choose' || @$_REQUEST['call_time'] == 'choose' || @strlen($_REQUEST['phone']) < 10) && @$_REQUEST['subform'] == "y" ) {

	header ("Location: /hot-tub-pricing-results.html?ht_id=".$_REQUEST['ht_id']."&call=err#call");

} else if (@$_REQUEST['subform'] == "y" && (@$_REQUEST['call_day'] != 'choose' && @$_REQUEST['call_time'] != 'choose')) {

	$call_date = date("Y-m-d", $_REQUEST['call_day']);
	$call_day = date('l - F jS', $_REQUEST['call_day']);
	$lead_date = date("Y-m-d", $_REQUEST['call_day']);

	$upleads = "UPDATE ht_form set call_date = '".$call_date."', call_day = '".$call_day."', call_time = '".$_REQUEST['call_time']."' WHERE ht_id = '".$_REQUEST['ht_id']."'";
	$result = mysql_query($upleads);

	$callid = mysql_insert_id();

	$to = "";
	$subject = "";
	$message = "";
	$headers = "";

	// multiple recipients
	$to = ''.$_REQUEST['email'].'';

	// subject
	$subject = 'ThermoSpas Phone Call Request';

	// message
	$message = '<html>
		<body style="font-family: Arial, Helvetica, sans-serif; color: #666666; font-size: 13px; ">
		<div style="width:550px;">
		  <div style="text-align:center"><img src="http://www.thermospas.com/images/dvd/header2.jpg" border="0"></div>
		  <div style="font-weight: bold; font-size: 19px; margin-bottom: 25px; color: #aa1428; text-align:center">Thank you for requesting a phone call.</div>
		  <p style="margin-bottom: 10px;font-size: 13px; line-height: 20px;">A ThermoSpas representative will be in contacting you at: '.$_REQUEST['call_time'].' on '.$call_day.' </p>
		  <p align="center" style="font-size:15px; font-weight:bold">You may also view our DVD and download our brochure online. </p>
		  <p align="center"> <a href="http://www.thermospas.com/thermospas-dvd.html"><img alt="Click To View our DVD and Brochure" border="0" src="http://www.thermospas.com/images/dvd/dvdBrochure.png" /></a> </p>
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

	// multiple recipients
	$to  = 'agratton@thermospas.com' . ', '; // note the comma
	$to .= 'callcenter@thermospas.com' . ''; // note the comma

	// subject
	$subject = 'New ThermoSpas Phone Call Request';

	$comments = json_decode($comments);

	$comments_html = '';
	foreach($comments as $key => $value) {
		$comments_html .= "<li><strong>{$key}</strong>: {$value}";
	}

	// message
	$message = '<html>
		<body style="font-family: Arial, Helvetica, sans-serif; color: #666666; font-size: 13px; ">
		<div style="width:550px;">
			<strong>GENERAL</strong>
		  <ul>
		  	<li><strong>Customer Name</strong>: '.$name.'</li>
				<li><strong>Customer Address</strong>: '.$address1.'</li>
				<li><strong>Customer City</strong>: '.$city.'</li>
				<li><strong>Customer State</strong>: '.$state.'</li>
				<li><strong>Customer Zip Code</strong>: '.$zipcode.'</li>
				<li><strong>Customer Phone Number</strong>: '.$phone.'</li>
				<li><strong>Customer Email Address</strong>: '.$email.' </li>
				<li><strong>Hot Tub Seating</strong>: '.ucfirst($ht_seating).'</li>
				<li><strong>Number of Jets Selected</strong>: '.$ht_jets.'</li>
				<li><strong>Hot Tub Use</strong>: '.$ht_use.'</li>
				<li><strong>Location</strong>: '.$ht_location.'</li>
				<li><strong>Previous Hot Tub Owner?</strong>: '.$ht_owner.'</li>
				<li><strong>Call Day</strong>: '.$call_day.'</li>
				<li><strong>Call Time</strong>: '.$_REQUEST['call_time'].'</li>
		  </ul>';
	if($comments_html) $message .= '<hr /><strong>OTHER INFORMATION</strong><ul>' . $comments_html . '</ul>';
	$message .= '</div></body></html>';

	// To send HTML mail, the Content-type header must be set
	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

	// Additional headers
	$headers .= 'From: ThermoSpas <sales@thermospa.com>' . "\r\n";

	// Mail it
	mail($to, $subject, $message, $headers);

	?>

	<script type="text/javascript">

	<!--

	window.location = "/thermospas-dvd.html?callid=$callid&call_time=<?= $_REQUEST['call_time'] ?>&call_day=<?= $call_day ?>"

	//-->

	</script>



	<?

	exit();

} else {

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>ThermoSpas Hot Tubs</title>

	<!-- ########## CSS Files ########## -->

	<!-- Screen CSS -->
	<link rel="stylesheet" href="landing/css/style.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="landing/css/skins/style_blue.css" type="text/css" media="screen" />

	<!-- Framework CSS -->
	<link rel="stylesheet" href="landing/css/960.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="landing/css/reset.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="landing/css/text.css" type="text/css" media="screen" />

	<!-- UItoTop CSS -->
	<link rel="stylesheet" href="landing/css/ui.totop.css" type="text/css" media="screen,projection" />

	<!-- Fancybox CSS -->
	<link rel="stylesheet" type="text/css" href="landing/css/fancybox.css" media="screen" />

	<!-- ########## end css ########## -->

	<!--[if IE 7]>
	<link rel="stylesheet" href="css/ie7.css" type="text/css" />
 	<![endif]-->

 	<!--[if lt IE 8]>
	<script src="http://ie7-js.googlecode.com/svn/version/2.0(beta3)/IE8.js" type="text/javascript"></script>
	<![endif]-->

	<!-- Jquery -->
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
	<script type="text/javascript" src="landing/js/jquery.mousewheel-3.0.4.pack.js"></script>
	<script type="text/javascript" src="landing/js/jquery.fancybox-1.3.4.pack.js"></script>

	<!-- UItoTop -->
	<script type="text/javascript" src="landing/js/jquery.ui.totop.js"></script>

	<!-- easing plugin ( optional ) -->
	<script src="landing/js/easing.js" type="text/javascript"></script>

	<!-- Cufon Font Replacement -->
	<script type="text/javascript" src="landing/js/cufon.js"></script>
	<script type="text/javascript" src="landing/js/Bebas_Neue_400.font.js"></script>

	<!-- To customise any of the above, please use this file -->
	<script type="text/javascript" src="landing/js/custom.js"></script>
	<SCRIPT SRC="/boxover.js"></SCRIPT>

	<script type="text/javascript">

		$(document).ready(function() {
			$().UItoTop({ easingType: 'easeOutQuart' });
		});

	</script>

	<!--Start Google Analytics Code -->
	<script type="text/javascript">
	  var _gaq = _gaq || [];
	  _gaq.push(['_setAccount', 'UA-33203294-1']);
	  _gaq.push(['_trackPageview']);
	  (function() {
	    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
	    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
	    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	  })();
	</script>
	<!--End Google Analytics Code -->

	<!-- VSW CONVERSIONS -->
	<div id="vswcnv" style="display:none"><script type="text/javascript" id="vswcnvscript">
	var u='https://secure.featurelink.com/Tracking/ConversionProcessing/ConversionTracking.aspx?aid=Thermospas&cnv_name=purchase&cnv_type=1';
	var s=document.createElement('script');s.src=u;document.write(unescape("%3Cscript src='"+u+"' type='text/javascript'%3E%3C/script%3E"));
	</script><script type="text/javascript">(function(){ VSW_Conversion();})();</script>
	<noscript><iframe name="vswcnvf" width="0" height="0" src="https://secure.featurelink.com/Tracking/TrackConversion.ashx?aid=Thermospas&cnv_name=purchase&noscript=1&cnv_type=1" frameborder="0" marginwidth="0" marginheight="0" vspace="0" hspace="0" allowtransparency="true" scrolling="no"></iframe></noscript></div>
	<!-- END VSW CONVERSIONS -->

	<script type="text/javascript">
	  (function() {
	    window._pa = window._pa || {};
	    var pa = document.createElement('script'); pa.type = 'text/javascript'; pa.async = true;
	    pa.src = ('https:' == document.location.protocol ? 'https:' : 'http:') + "//tag.perfectaudience.com/serve/510fa0ed4c9c5b000200036a.js";
	    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(pa, s);
	  })();
	</script>

	<!-- Facebook Ads Conversion Tracking -->
	<script type="text/javascript">
	var fb_param = {};
	fb_param.pixel_id = '6008116627884';
	fb_param.value = '0.00';
	(function(){
	  var fpw = document.createElement('script');
	  fpw.async = true;
	  fpw.src = (location.protocol=='http:'?'http':'https')+'://connect.facebook.net/en_US/fp.js';
	  var ref = document.getElementsByTagName('script')[0];
	  ref.parentNode.insertBefore(fpw, ref);
	})();
	</script>
	<noscript><img height="1" width="1" alt="" style="display:none" src="https://www.facebook.com/offsite_event.php?id=6008116627884&amp;value=0" /></noscript>
	<!-- End Facebook Ads Conversion Tracking -->

	<!-- BING -->
	<script type="text/javascript"> if (!window.mstag) mstag = {loadTag : function(){},time : (new Date()).getTime()};</script> <script id="mstag_tops" type="text/javascript" src="//flex.msn.com/mstag/site/7eda56ec-dae3-4bd4-915b-8a11f9d7ad95/mstag.js"></script> <script type="text/javascript"> mstag.loadTag("analytics", {dedup:"1",domainId:"572823",type:"1",actionid:"66891"})</script> <noscript> <iframe src="//flex.msn.com/mstag/tag/7eda56ec-dae3-4bd4-915b-8a11f9d7ad95/analytics.html?dedup=1&domainId=572823&type=1&actionid=66891" frameborder="0" scrolling="no" width="1" height="1" style="visibility:hidden;display:none"> </iframe> </noscript>
	<!-- End BING -->

	<!-- Google Code for Clix Conversion Conversion Page -->
	<script type="text/javascript">
	/* <![CDATA[ */
	var google_conversion_id = 1070435200;
	var google_conversion_language = "en";
	var google_conversion_format = "3";
	var google_conversion_color = "ffffff";
	var google_conversion_label = "UstwCKjK2QEQgJe2_gM";
	var google_conversion_value = 0;
	var google_remarketing_only = false;
	/* ]]> */
	</script>
	<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
	</script>
	<noscript>
		<div style="display:inline;">
			<img height="1" width="1" style="border-style:none;" alt="" src="//www.googleadservices.com/pagead/conversion/1070435200/?value=0&amp;label=UstwCKjK2QEQgJe2_gM&amp;guid=ON&amp;script=0"/>
		</div>
	</noscript>
	<!-- page -->

	<!-- Google Code for All  Site Visitors -->
	<!-- Remarketing tags may not be associated with personally identifiable information or placed on pages related to sensitive categories. For instructions on adding this tag and more information on the above requirements, read the setup guide: google.com/ads/remarketingsetup -->
	<script type="text/javascript">
	/* <![CDATA[ */
	var google_conversion_id = 1070435200;
	var google_conversion_label = "w9mUCOCF3QEQgJe2_gM";
	var google_custom_params = window.google_tag_params;
	var google_remarketing_only = true;
	/* ]]> */
	</script>
	<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js"></script>

	<noscript>
	<div style="display:inline;">
	<img height="1" width="1" style="border-style:none;" alt="" src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/1070435200/?value=0&amp;label=w9mUCOCF3QEQgJe2_gM&amp;guid=ON&amp;script=0"/>
	</div>
	</noscript>
	<!-- End Google Code for All  Site Visitors -->

</head>



<body id="top" style="background:none;">

	<script type='text/javascript'>
	var ebRand = Math.random()+'';
	ebRand = ebRand * 1000000;
	//<![CDATA[
	document.write('<scr'+'ipt src="HTTP://bs.serving-sys.com/BurstingPipe/ActivityServer.bs?cn=as&amp;ActivityID=378691&amp;rnd=' + ebRand + '"></scr' + 'ipt>');
	//]]>
	</script>

	<noscript>
		<img width="1" height="1" style="border:0" src="HTTP://bs.serving-sys.com/BurstingPipe/ActivityServer.bs?cn=as&amp;ActivityID=378691&amp;ns=1"/>
	</noscript>

		<!-- Start Head Container -->
		<div class="container_12" style="margin-top:5px;">

			<!-- Logo -->
			<h1 class="grid_6 logo"><a href="http://www.thermospas.com" class='ie6fix'>ThermoSpas</a></h1>

			<!-- Call Us -->
			<div class="grid_6 call">
				<span>Call Us! 1-800-876-0158</span>
			</div><!-- Call Us END -->

		</div><!-- Head Container END -->

		<div class="clear"></div><!-- CLEAR -->

		<!-- Start Header Break Line -->
		<div class="container_12">

			<hr class="grid_12" />

		</div><!-- Header Break Line END -->

		<div class="clear"></div><!-- CLEAR -->

		<!-- Start Teaser -->
		<div class="container_12 ">

			<!-- Start Centered Text -->
			<div class="grid_12 middle">

				<!-- Heading -->
				<h1 class="heading">Congratulations <?=$name?>!</h1>

				<!-- Subheading -->
				<span class="subhead">
					You&rsquo;re off to a great start in learning about the Finest <?=$person_text?> Hot Tubs in the world.
				</span>

			</div><!-- Centered Text END -->

		</div><!-- Teaser END -->

	<div class="clear"></div>

	<!-- Start Container 12 -->
	<div id="main_content" class="container_12">

		<div style="margin:10px 0px;">
		  <div style="float: left; width:<?=$iwidth?>; margin-right:20px; padding:10px;">
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
		  <p>Thank you for visiting the ThermoSpas web site. We offer many patented features that  not only provide safety but make your hot tub fun to use and easier to maintain than any other spa on the market. There are no chemical odors and no off-gasses that deteriorate your spa over time. An added benefit is that it is the only spa that doesn&rsquo;t require you to change the water and clean the shell every 90 days. Most of our customers do it only every 6 to 12 months.<u></u></p>
		</div>

		<div style="margin:10px 0px;">
		  <h5 style="color:#0381cc; padding:0px; margin:5px 0px;">Pricing Information</h5>
		  <? if (@strlen($_REQUEST['fq']) > 1) { } else { ?>
		  	<h6 style="margin:5px 0px; padding:0px"><span style="font-style: italic">We are processing your pricing request, please see below </span></h6>
		  <? } ?>
		  A  Marketing Representative at ThermoSpas will be in contact to provide you with pricing information on the model you have custom designed or are interested in, and also the lowest price on that model, less the optional features you have selected. To speak to a marketing representative choose from the  following:
		  <div style="margin:14px 30px;">
		  	<h7>
			  	<span style="font-size:20px; color:#0381cc;">&#8250;</span>
			  	<span style="color:#f37901;font-size:16px; font-weight:bold;">Option  1</span>:  To receive immediate price information please <strong><a href="/hot-tub-pricing-results.php?ht_id=<?=@$_REQUEST['ht_id']?>#call">click here</a> </strong>and select a time for a senior marketing representative  to call you.
		  	</h7>
		  </div>
		  <div style="margin:14px 30px;">
		  	<h7>
			  	<span style="font-size:20px; color:#0381cc;">&#8250;</span>
			  	<span style="color:#f37901;font-size:16px; font-weight:bold;">Option  2</span>:
			  	To call a marketing representative dial <span style="font-weight: bold">1-800-876-0158
			  	(Option 1) between Mon &ndash; Thurs: 9am &ndash; 10pm, Fri: 9am &ndash;
			  	8pm, and Sat 9am &ndash; 5pm EST.&nbsp; <br><br>
			  	<span style="font-style: italic; font-weight: bold">Please note:</span>
			  	computer software requires 24 hours to prepare price  information on calls coming into home office.
		  	</h7>
		  </div>
		  <div style="margin-top:40px;">
		    <form action="hot-tub-pricing-results.php" method="get">
		      <a name="call" id="call"></a>
		      <? if (@$_REQUEST['call'] == "err") { ?>
		      <div style="margin:6px; text-align:center; color:#990000; font-weight:bold;">Please enter a day, call time and phone number (with area code) for us to contact you. Your information will NOT be shared. Thank you.</div>
		      <? } ?>
		      <table border="0" align="center" cellpadding="2" cellspacing="2" style="border: solid 1px #e2e3e4;">
		        <tr>
		          <td bgcolor="#F3F3F4"><strong>Confirm Phone Number</strong></td>
		          <td bgcolor="#F3F3F4"><strong>Upcoming Day</strong></td>
		          <td bgcolor="#F3F3F4"><strong>Time</strong></td>
		        </tr>
		        <tr>
		          <td bgcolor="#ffffff">
			          <label>
			            <input type="text" name="phone" value="<?=$phone?>" />
			          </label>
			        </td>
			        <? if (@$_REQUEST['call'] == "err") { $cstyle = '"style="color: #990000;"'; } ?>
		          <td bgcolor="#ffffff">
		            <?
									$months = array (1 => 'January', 'February', 'March', 'April', 'May', 'June','July', 'August', 'September', 'October', 'November', 'December');
									$weekday = array('Monday','Tuesday','Wednesday','Thursday','Friday','Saturday');
									$days = range (1, 31);

									echo "<select name='call_day'>";
									echo '<option value="choose" '.@$cstyle.'>Choose Day</option>\n';

									$i = 0;

									while ($i < 7) {
										$day = mktime(0, 0, 0, date("m")  , date("d")+$i, date("Y"));
										if(stristr(date('l - F jS', $day), 'Sunday') === FALSE) {
											echo '<option value="'.$day.'">'.date('l - F jS', $day).'</option>';
										}
										$i++;
									}

									echo '</select><br />';
								?>
							</td>
		          <td bgcolor="#ffffff">
		          	<?
									$start = strtotime('9:00am');
									$end = strtotime('9:00pm');
									echo '<select name="call_time" >';
									echo '<option value="choose" '.@$cstyle.'>Choose Time</option>\n';
									echo '<option value="morning" '.@$cstyle.'>Morning</option>\n';
									echo '<option value="mid-day" '.@$cstyle.'>Mid-Day</option>\n';
									echo '<option value="evening" '.@$cstyle.'>Evening</option>\n';
									echo '<option value="choose" style="text-align:center">-------</option>\n';
									for ($i = $start; $i <= $end; $i += 900) {
										echo '<option>' . date('g:i a', $i);
									}
									echo '</select>';
							  ?>
							  (EST)
		          </td>
		        </tr>

		        <tr>
		          <td colspan="3" align="center" bgcolor="#ffffff">
		          	<label>
		            	<input type="submit" name="Submit" value="Schedule Phone Call" style="background-color:#d2effd; border:solid 2px #0381cc; padding:3px; font-size:12px; font-weight:bold; color:#666666;" />
								</label>
							</td>
		        </tr>

		      </table>

		      <input type="hidden" name="ht_id" value="<?=$ht_id?>" />
		      <input type="hidden" name="email" value="<?=$email?>" />
			  	<input type="hidden" name="subform" value="y" />

		    </form>
		  </div>
		</div>

		<br clear="all">

<div class="note">
  <p style="font-weight: bold">The  phone call should take approximately 5 minutes and requires NO Obligation to  purchase or sign up for anything. It&rsquo;s our way of providing you the best  information on one day owning the hot tub of your dreams.</p>
</div>

<div style="margin:10px 0px;">
  <h5 style="color:#0381cc">Best in Delivery  &amp; Best in Service!</h5>
  <p>Though  we may not have a showroom in your area we do offer the best in delivery and service.  ThermoSpas &ldquo;White Glove Delivery Program&rdquo; means that we don&rsquo;t leave until you&rsquo;re  satisfied. We not only deliver the spa but install it in place, train you on  the operation and maintenance functions, and provide a complete inspection. <br>
    Service  is the most important benefit in buying from ThermoSpas. Our  technicians are prompt, courteous, and professional. Every van is fully stocked  with ThermoSpas factory parts minimizing the opportunity for a return trip. &nbsp;&nbsp;</p>
</div>

<div style="margin:10px 0px;">
  <h5 style="color:#0381cc">Free Site Inspection</h5>
  <p>ThermoSpas  offers a Free Site Inspection for those seeking answers on the ideal site location  and how to save on electrical usage. Our professional factory trained  technician in your area can answer questions on structural, electrical, and  safety concerns along with assistance on custom designing the perfect hot tub  at the best value. This FREE service requires No Obligation to buy anything but  will satisfy any concerns on hot tub ownership and answer questions on making  quality choices. If interested ask our marketing representative for a date and  time convenient for you and our local technician. &nbsp;&nbsp;</p>
</div>

<div style="margin:10px 0px;">
  <h5 style="color:#0381cc">Additional Savings </h5>
  <p>Ask  about Special Sales Discounts Now available on Select Models. Along with  Special Financing Packages!&nbsp;</p>
</div>

<? } ?>

		<div class="clear"></div><!-- CLEAR -->

		<!-- Start Box 1 -->
		<div class="grid_4">
			<div class="box">
				<img src='landing/images/secure.jpg' alt='' width="25" height="32" class='alignleft_icon'/>
				<h3>YOUR INFO IS SECURE </h3>
				<hr />
				<p>Your privacy and security is important us.</p>
			</div>
		</div><!-- Box 1 END -->

		<!-- Start Box 2 -->
		<div class="grid_4">
			<div class="box">
				<img src='landing/images/coupon.jpg' alt='' width="37" height="32" class='alignleft_icon'/>
				<h3>$1000 SaVINGS COUPON </h3>
				<hr />
				<p>Let us know what you are looking for and we'll provide you a $1000 Savings Coupon. Which includes $400 cash off, Free Delivery and Installation ($450) and Free Chemicals Startup Kit ($150) </p>
			</div>
		</div><!-- Box 2 END -->

		<!-- Start Box 3 -->
		<div class="grid_4">
			<div class="box">
				<img src='landing/images/download.jpg' alt='' width="38" height="32" class='alignleft_icon'/>
				<h3>FREE DVD &amp; BRoCHURE </h3>
				<hr />
				<p>We'll send you our Free DVD &amp; Brochure. This also includes our 60 page Hot Tub Buying Guide. You can watch it immediately online or have it delivered to your home. </p>
			</div>
		</div><!-- Box 3 END -->

		<div class="clear"></div><!-- CLEAR -->

		<!-- Start Features 1 -->
		<div class="grid_6">
			<div class="feat margin-1">
				<h4>Hot Tubs Custom Built to Your Specs &amp; Budget </h4>
				<hr />
				<p>ThermoSpas custom-builds each individual hot tub to your specific needs, specifications and budget. </p>
				<ul class="checklist">
					<li>The highest quality hot tub components used in the industry </li>
					<li>Energy efficient and safe hot tubs </li>
					<li>Customize from 8 jets to 172 jets </li>
					<li>Factory-Direct Hot Tubs to Save BIG </li>
					<li>We're local for delivery, installation and service </li>
				</ul>
				<p> ThermoSpas sells hot tubs directly to the consumer, eliminating the middleman. This way our customers get the highest-quality hot tub for the lowest possible price. When comparing hot tub prices, buying factory-direct can save you thousands of dollars and you will get exactly the features you want and the service you deserve. </p>
		  </div>

		</div><!-- Features 1 END -->

		<!-- Start Features 2 -->
		<div class="grid_6 feat margin-1">
			<h4>View the Screenshots</h4>
			<hr />
			<a id="example6" href="/slides/lounge.jpg" title="ThermoSpas Wave Lounges - Available in many of our hot tubs"><img alt="example6" src="/wp-content/themes/majestics-3.71/timthumb.php?src=/slides/lounge.jpg&h=134&w=138" /></a>
			<a id="example6" href="/slides/lighting.jpg" title="ThermoSpas Elegant Lighting Effects and Sound Systems"><img alt="ThermoSpas Elegant Lighting Effects and Sound Systems" src="/wp-content/themes/majestics-3.71/timthumb.php?src=/slides/lighting.jpg&h=134&w=138" /></a>
			<a id="example6" href="/slides/bubbling-video.jpg" title="Everyone loves the ThermoSpas Bubbling System"><img alt="example6" src="/wp-content/themes/majestics-3.71/timthumb.php?src=/slides/bubbling-video.jpg&h=134&w=138" /></a>
			<a id="example6" href="/slides/filtration-video.jpg" title="ThermoSpas Filtration System filters the water over 100x more then our competitors"><img alt="example6" src="/wp-content/themes/majestics-3.71/timthumb.php?src=/slides/filtration-video.jpg&h=134&w=138" /></a>
			<a id="example6" href="/slides/siteinspection.jpg" title="Request a Free Site Inspection to help measure and plan out your hot tub."><img alt="example6" src="/wp-content/themes/majestics-3.71/timthumb.php?src=/slides/siteinspection.jpg&h=134&w=138" /></a>
			<a id="example6" href="/slides/jets-video.jpg" title="Thermospas allows you to choose from 10 to 160 jets"><img alt="example6" src="/wp-content/themes/majestics-3.71/timthumb.php?src=/slides/jets-video.jpg&h=134&w=138" /></a>
		</div><!-- Features 2 END -->

		<div class="clear"></div><!-- CLEAR -->
		<div class="grid_12">
			<div class="callto">
				<a href="#top"><span class="calltoaction"><img class='alignleft_action' src='landing/images/Forward.png' alt=''/> Do you need a free site inspection now? Give us a call: 1-800-876-0158 </span></a>
			</div>
		</div>

		<div class="clear"></div><!-- CLEAR -->

	</div><!-- Container 12 END-->

	<div class="clear"></div><!-- CLEAR -->

	<!-- Start Footer Bottom -->
	<div id="fullwidth_footer_bottom">

		<!-- Start Footer Bottom Container -->
		<div class="container_12">

       <!-- Start Copyright -->
			<div class="grid_8 copyright">
				<p class="rights">Copyright 2011 by <a href="landing/index.html" title="ThermoSpas">ThermoSpas</a>. All rights reserved. <a href="/thermospas_privacy_policy.html" target="_new">thermospas privacy policy</a></p>
			</div><!-- Copyright END -->

			<!-- Start Social Footer -->
			<div class="grid_4">
				<ul class="social_bookmarks_footer">
					<li class="twitter"><a href="#" class="" title="Twitter">Twitter</a></li>
					<li class="facebook"><a href="#" class="" title="Facebook">Facebook</a></li>
					<li class="rss"><a href="#" class="" title="RSS">RSS Feed</a></li>
				</ul>
			</div><!-- Social Footer END -->

		</div><!-- Footer Bottom Container END -->

    </div><!-- Footer Bottom END -->

    <!-- Clearfix -->
	<div class="clear"></div>


<!-- IE fix -->
<script type="text/javascript"> Cufon.now(); </script>
</body>

</html>
