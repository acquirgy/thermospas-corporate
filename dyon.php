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
$city = $_REQUEST['city'];
$phone = $_REQUEST['phone'];
$email = $_REQUEST['email'];
$correcte = $_REQUEST['correcte'];
$customerid = $_REQUEST['customerid'];
$quoteid = $_REQUEST['quoteid'];

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
	header ("Location: index.php?option=com_content&view=article&id=234&Itemid=414&tub=".$tub."&jets=".$jets."&fname=".$fname."&lname=".$lname."&quoteid=".$quoteid."");
} else if ($stepc == "2") {
	if ($tub == "swim" || $tub == "exercise" || $tub == "swimexercise") {
		header ("Location: index.php?option=com_content&view=article&id=233&Itemid=414&tub=".$tub."");
	} else {
		header ("Location: index.php?option=com_content&view=article&id=231&Itemid=414&tub=".$tub."&jets=".$jets."&location=".$location."");
	}
} else if ($stepc == "3") {
	header ("Location: index.php?option=com_content&view=article&id=232&Itemid=414&tub=".$tub."&jets=".$jets."&location=".$location."&tcolor=".$tcolor."&bcolor=".$bcolor."");
} else if ($stepc == "4") {
	header ("Location: index.php?option=com_content&view=article&id=233&Itemid=414&tub=".$tub."&jets=".$jets."&location=".$location."&tcolor=".$tcolor."&bcolor=".$bcolor."&stereo=".$stereo."&led=".$led."&steps=".$steps."&ozonators=".$ozonators."&coverlifters=".$coverlifters."");
} else if ($stepc == "done") {
	//$sqlz = "SELECT * from `im_zipcodes` where zipcode = '".$zip."'";
		
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
	
	$acode = $pa[0];
	
	$sqlz = "select b.code from USA_zipcodes as a, TS_zipcodes as b where a.ZIPCode = '".$zip."' AND a.ZIPCode = b.zipcode limit 1";
	//echo $sqlz;
	$resultz = MySQL($dbname,$sqlz);
	$rowz = mysql_fetch_row($resultz);
	$numz = mysql_num_rows($resultz);
	if ($lname == "OMQUOTE") {
	
		echo "<meta http-equiv=\"refresh\" content=\"0;url=index.php?option=com_content&view=article&id=234&Itemid=414&tub=".$tub."&jets=".$jets."&fname=".$fname."&lname=".$lname."&email=".$email."&zip=".$zip."&city=".$city."\" />";
	
	} else if ($numz == 0 || ($rowz[0] != 'OM') || $tub == "swim" || $tub == "exercise" || $tub == "swimexercise") {
		// ID 235 (IM)
		echo "<script>
			if(typeof(urchinTracker)!='function')document.write('<sc'+'ript src=\"'+
			'http'+(document.location.protocol=='https:'?'s://ssl':'://www')+
			'.google-analytics.com/urchin.js'+'\"></sc'+'ript>')
			</script>
			<script>
			_uacct = 'UA-86818-9';
			urchinTracker(\"/3327221160/goal\");
			</script>";
			
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
			
		echo "<!-- Google Code for Lead Conversion Page -->
				<script language=\"JavaScript\" type=\"text/javascript\">
				<!--
				var google_conversion_id = 1070435200;
				var google_conversion_language = \"en_US\";
				var google_conversion_format = \"1\";
				var google_conversion_color = \"ffffff\";
				var google_conversion_label = \"kGb9CPSFPRCAl7b-Aw\";
				//-->
				</script>
				<script language=\"JavaScript\" src=\"http://www.googleadservices.com/pagead/conversion.js\">
				</script>
				<noscript>
				<img height=\"1\" width=\"1\" border=\"0\" src=\"http://www.googleadservices.com/pagead/conversion/1070435200/?label=kGb9CPSFPRCAl7b-Aw&amp;guid=ON&amp;script=0\"/>
				</noscript>
				";
			
			if ($_COOKIE['intsource'] == "IOTO" || $_COOKIE['intsource'] == "" || !isset($_COOKIE['intsource'])) { 
			// NATURAL
				include ("org_conv.php");
			} else {
				include ("paid_conv.php");
			}
			
		echo "<div align=\"center\" style=\"margin-top:20px;\">\n
<h1 style=\"color: #565656;\">Please wait while we transfer your quote page, if this takes longer then 5 seconds, please click here:</h1>\n
<A href=\"http://www.thermospas.com/index.php?option=com_content&view=article&id=235&Itemid=414&tub=".$tub."&jets=".$jets."&fname=".$fname."&lname=".$lname."&email=".$email."&zip=".$zip."&city=".$city."\"><h2>Video and Brochure</h2></A></div>\n
<meta http-equiv=\"refresh\" content=\"0;url=index.php?option=com_content&view=article&id=235&Itemid=414&tub=".$tub."&jets=".$jets."&fname=".$fname."&lname=".$lname."&email=".$email."&zip=".$zip."&city=".$city."\" />";
		//header ("Location: index.php?option=com_content&view=article&id=235&Itemid=414&tub=".$tub."&jets=".$jets."&fname=".$fname."&lname=".$lname."&email=".$email."&zip=".$zip."");
	} else {
		// ID 234 (OM)
		echo "<script>
			if(typeof(urchinTracker)!='function')document.write('<sc'+'ript src=\"'+
			'http'+(document.location.protocol=='https:'?'s://ssl':'://www')+
			'.google-analytics.com/urchin.js'+'\"></sc'+'ript>')
			</script>
			<script>
			_uacct = 'UA-86818-9';
			urchinTracker(\"/3327221160/goal\");
			</script>";
		
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
			
		echo "<!-- Google Code for Lead Conversion Page -->
				<script language=\"JavaScript\" type=\"text/javascript\">
				<!--
				var google_conversion_id = 1070435200;
				var google_conversion_language = \"en_US\";
				var google_conversion_format = \"1\";
				var google_conversion_color = \"ffffff\";
				var google_conversion_label = \"kGb9CPSFPRCAl7b-Aw\";
				//-->
				</script>
				<script language=\"JavaScript\" src=\"http://www.googleadservices.com/pagead/conversion.js\">
				</script>
				<noscript>
				<img height=\"1\" width=\"1\" border=\"0\" src=\"http://www.googleadservices.com/pagead/conversion/1070435200/?label=kGb9CPSFPRCAl7b-Aw&amp;guid=ON&amp;script=0\"/>
				</noscript>
				";
			
			if ($_COOKIE['intsource'] == "IOTO" || $_COOKIE['intsource'] == "" || !isset($_COOKIE['intsource'])) { 
			// NATURAL
				include ("org_conv.php");
			} else {
				include ("paid_conv.php");
			}
			
		echo "<meta http-equiv=\"refresh\" content=\"0;url=index.php?option=com_content&view=article&id=234&Itemid=414&tub=".$tub."&jets=".$jets."&fname=".$fname."&lname=".$lname."&email=".$email."&zip=".$zip."&city=".$city."\" />";
		//header ("Location: index.php?option=com_content&view=article&id=234&Itemid=414&tub=".$tub."&jets=".$jets."&fname=".$fname."&lname=".$lname."&email=".$email."&zip=".$zip."");
	}
} else if ($correcte == "y"){ 
	if ($loc == "in") {
	} else if ($loc == "om") {
		$fixe = mysql($dbname,"UPDATE leads set email = '".$email."' WHERE id='".$customerid."'");
		header ("Location: index.php?option=com_content&view=article&id=234&Itemid=414&tub=".$tub."&jets=".$jets."&fname=".$fname."&lname=".$lname."&email=".$email."&zip=".$zip."&city=".$city."");
	}
} else {
	header ("Location: index.php?option=com_content&view=category&layout=blog&id=67&Itemid=414"); 
	/*echo "<script>
			if(typeof(urchinTracker)!='function')document.write('<sc'+'ript src=\"'+
			'http'+(document.location.protocol=='https:'?'s://ssl':'://www')+
			'.google-analytics.com/urchin.js'+'\"></sc'+'ript>')
			</script>
			<script>
			_uacct = 'UA-86818-9';
			urchinTracker(\"/3327221160/goal\");
			</script>";*/
}
?>