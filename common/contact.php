<?
$pgid="w-137";
require ($_SERVER["DOCUMENT_ROOT"]."/mainfile.php");
$action = $_REQUEST['action'];
if (!isset($action) || $action == "contact") {

	$location = "<?=$mainurl?>/support/";
	header ('HTTP/1.1 301 Moved Permanently');
	header ('Location: '.$location);

} else {

if ($subform == "Y") {

	if (strlen($first_name) < 2) { 
		$notice .= "Please update your <b>First Name</b>\n<BR>";
	}
	if (strlen($last_name) < 2) { 
		$notice .= "Please update your <b>Last Name</b>\n<BR>";
	}
	if (strlen($address1) < 2) { 
		$notice .= "Please update your <b>Address</b>\n<BR>";
	}
	if (strlen($city) < 2) { 
		$notice .= "Please update your <b>City</b>\n<BR>";
	}
	if ($state == "ZZZ") { 
		$notice .= "Please select your <b>State</b>\n<BR>";
	} else {
		$gotstate = "Y";
	}
	if (strlen($zipcode) < 5) { 
		$notice .= "Please select your <b>Zip Code</b>\n<BR>";
	}
	
	if ((stristr($email, '@') == FALSE) || (stristr($email, '.') == FALSE)) { 
		$notice .= "Please enter a valid <b>Email Address</b>\n<BR>";
	}
	
	if (((is_numeric($phone1) == FALSE) || (is_numeric($phone2) == FALSE) || (is_numeric($phone3) == FALSE)) || ((strlen($phone1) < 3) || (strlen($phone1) < 3) || (strlen($phone3) < 4))) { 
		$notice .= "Please enter a valid numeric <b>Phone Number</b>\n<BR>";
	}
		
	// CHECK IF FORM IS COMPLETED
	
	if (strlen($notice) > 10) {
		$final_notice = "We are sorry, but we may have gotten some wrong information on the request form, could you please review the following items for accuracy?<BR>
		Thank you very much, Thermospas\n\n<BR><BR>".$notice;
		
	} else {
	
	// FORM COMPLETED, WHAT TYPE OF FORM IS IT?
	
		if ($action == "" || $action == "contact") {
		
			// REQUEST FORMS
			$MessageSubject = "Web Inquiry: General Inquires";
				
			if ($GeneralInquiries == "y") {
				$MessageSubject .= "General Inquires";
				$rept .= "webinquiries@thermospas.com, ";
				//$rept .= "mbryers@thermospas.com, ";
			}
			
			if ($SiteInspection == "y") {
				$MessageSubject .= ", Site Inspection";
				$rept .= "webinspection@thermospas.com, ";
				//$rept .= "mbryers@thermospas.com, ";
			}
			
			if ($SalesSupport == "y") {
				$MessageSubject .= ", Sales Support";
				$rept .= "websalessupport@thermospas.com, ";
				//$rept .= "mbryers@thermospas.com, ";
			}
			
			if ($SpaDelivery == "y") {
				$MessageSubject .= ", Spa Delivery";
				$rept .= "webspadelivery@thermospas.com, ";
				//$rept .= "mbryers@thermospas.com, ";
			}
			
			if ($BillingInquiries == "y") {
				$MessageSubject .= ", Billing Inquiries";
				$rept .= "webbilling@thermospas.com, ";
				//$rept .= "mbryers@thermospas.com, ";
			}
			
			if ($CustCareSupport == "y") {
				$MessageSubject .= ", Cust Care Support";
				$rept .= "webcustcare@thermospas.com, ";
				//$rept .= "mbryers@thermospas.com, ";
			}
			
			if ($ChemAddons == "y") {
				$MessageSubject .= ", Chemical Products/Add-ons";
				$rept .= "webaddonproducts@thermospas.com, ";
				//$rept .= "mbryers@thermospas.com, ";
			}
			
			if ($TechnicalService == "y") {
				$MessageSubject .= ", Technical Service";
				$rept .= "webtechservice@thermospas.com, ";
				//$rept .= "mbryers@thermospas.com, ";
			}
			
			if ($WebsiteFeedback == "y") {
				$MessageSubject .= ", Website Feedback/Suggestion";
				$rept .= "websitefeedback@thermospas.com, ";
				//$rept .= "mbryers@thermospas.com, ";
			}
			
			// NO PARTICULAR MESSAGE SUBJECT SEND GENERAL
			
			if ($MessageSubject == "") {
				$MessageSubject = "General Inquiries";
				$rept = "webinquiries@thermospas.com, ";
				//$rept = "mbryers@thermospas.com";
			}
			
			$body = "Name: " . $first_name . " " . $last_name . "<br>";
			$body .= "Addr1: " . $address1 . "<br>";
			$body .= "Addr2: " . $address2 . "<br>";
			$body .= "City: " . $city . "<br>";
			$body .= "State: " . $state . "<br>";
			$body .= "Zip: " . $zipcode . "<br>";
			$body .= "Email: " . $email . "<br>";
			$body .= "Phone: (" . $phone1 . ") " . $phone2 . "-" . $phone3 . "<br>";
			$body .= "Inquiry: ";
			$body .= $MessageSubject . "<br><br>";
       		$body .= "Comments: ". $comments;
			
			$rept = $rept.", ".$email;
			
		} else {
			
		// LEAD GEN FORM

			$rept = $email;
			$MessageSubject = "ThermoSpas Information Request";
			
			$body = "<html><body style='font-name:verdana; font-size:11pt;'> <img src='<?=$mainurl?>/email/ts_logo.gif'><br><br>";
            $body .= "Dear $first_name $last_name, <BR><BR>";
            $body .= "Thank you for visiting the ThermoSpas Web site and for your interest in ThermoSpas.<br><br>";
            $body .= "The information you requested has been submitted and we will be in touch with you soon to answer any questions and verify the receipt of this information. <br><br>";
            $body .= "You may also download the latest version of our brochure online at <a href='<?=$mainurl?>/pdf'><?=$mainurl?>/pdf</a>. <br><br>";
            $body .= "If you have any questions, please contact us via e-mail or at 866-702-9200. <br><br>";
            $body .= "Best Regards,<br><br> Thermospas";
            $body .= "</body></html>";
			
			// INSERT INTO DB
			$dbname = "tspas_thermospascom";
			$db = mysql_connect("localhost", "tspas_tscom", "*tscom07");
			
			$phone = $phone1."-".$phone2."-".$phone3;
			
			$create_date = date('m-d-y');
			$create_time = date('h:i:s');
			

			$insertsql = "INSERT INTO `leads` (`fname` , `lname` , `address1` , `address2` , `city` , `state` , `zip` , `country` , `type` , `phone`"
			." , `email` , `referrer` , `other` , `comments` , `create_date` , `create_time` , `promo` )"
			." VALUES ( "
			." '$first_name', '$last_name', '$address1', '$address2' , '$city', '$state', '$zipcode', 'US', '$action', '$phone',"
			." '$email', '$referrer', NULL , '$varcomments' , '$create_date', '$create_time', NULL)";
			
			//echo $insertsql;
			
			$insert = MySQL($dbname,$insertsql);
			$OID = mysql_insert_id();

		}
		
	// LETS SUBMIT THE FORM
	
		//echo $rept."<BR>";	
		//echo $MessageSubject."<BR>";
		
		//$body = "Information Request from: $first_name $lastname<BR><BR>";
		$body = str_replace(',',' ',$body);
		$body = str_replace('"',' ',$body); 
		$body = str_replace("'"," ",$body); 
		   
		
		
		$headers = "From: hottubs@thermospas.com \r\n";
		$headers .= "Content-Type: text/html; charset=ISO-8859-1 ";
		$headers .= "MIME-Version: 1.0 ";
		$headers .= 'To: $first_name <$email>' . "\r\n";
		$headers .= 'From: Thermospas <hottubs@thermospas.com>' . "\r\n";
		if ($siteinspect == "y") {
			$headers .= 'Bcc: webinspection@thermospas.com' . "\r\n";
		} else {
			
		}
		
		mail($rept, $MessageSubject, $body, $headers);
		
		// SEND TO THANK YOU PAGE
		
		$fullname = $first_name." ".$last_name;
		
		header ("Location: <?=$mainurl?>/thankyou.php?t=$action&n=$fullname&OID=$OID");

	}
	
} 

// SET BUTTON ACTION

if (!isset($action) || $action == "contact") {
	$button_msg = "Send Information Request";
} else if ($action == "getinfo") {
	$button_msg = "Yes! Please send me the FREE DVD!";
	$dvd_input = "checked=\"CHECKED\" disabled=\"disabled\"";
} else  if ($action == "specials") {
	$button_msg = "Yes! Please send me the Coupon!!";
	$coupon_input = "checked=\"CHECKED\" disabled=\"disabled\"";
	$dvd_input = "checked=\"CHECKED\" disabled=\"disabled\"";
} else if ($action = "siteinspection") {
	$button_msg = "FREE Site Inspetion Please!";
	$siteinspect_input = "checked=\"CHECKED\" disabled=\"disabled\"";
	$dvd_input = "checked=\"CHECKED\" disabled=\"disabled\"";

}

$incmain = "n";
require ($_SERVER["DOCUMENT_ROOT"]."/inc-topmain.php");
?>
<script language="JavaScript">
function IsEmpty(aTextField) {
   if ((aTextField.value.length==0) ||
   (aTextField.value==null)) {
      return true;
   }
   else { return false; }
}
var isNN = (navigator.appName.indexOf("Netscape")!=-1);

function autoTab(input,len, e) {
	var keyCode = (isNN) ? e.which : e.keyCode; 
	var filter = (isNN) ? [0,8,9] : [0,8,9,16,17,18,37,38,39,40,46];
	if(input.value.length >= len && !containsElement(filter,keyCode)) {
		input.value = input.value.slice(0, len);
		input.form[(getIndex(input)+1) % input.form.length].focus();
}

function containsElement(arr, ele) {
	var found = false, index = 0;
	while(!found && index < arr.length)
	if(arr[index] == ele)
		found = true;
	else
		index++;
	return found;
}
function getIndex(input) {
	var index = -1, i = 0, found = false;
	while (i < input.form.length && index == -1)
	if (input.form[i] == input) index = i;
	else i++;
		return index;
	}
	return true;
}

function intOnly(i) {
	if(i.value.length>0) {
		i.value = i.value.replace(/[^\d]+/g, ''); 
	}
}
			
			function CheckState(sender, args)
			{
				
				if (args.Value == 'ZZZ') 
				{
					args.IsValid = false;
					return;
				}

				args.IsValid = true;
			}

			
</script>
<style>

fieldset {  
position: relative;
margin: 0 0 1em 0;
padding-left:40px;
padding-right:0px;
float: left;  
clear: both;  
width: 500px; 
display:block;   
border: 1px solid #BFBAB0;  
background-color: #f8f4f4;  
background-image: url(gradient.jpg);  
background-repeat: repeat-x;
}
legend {
position: absolute;
top: -.5em;
left: .2em; 
color: #000000;  
font-weight: bold;
font-size:18px;
}

input,select
{
border: 1px double #999999;
border-top-color: #CCCCCC;
border-left-color: #CCCCCC;
padding: 0.25em;
background-color: #FFFFFF;
background-image: url(http://www.macromedia.com/images/master/background_form_element.gif);
background-repeat: repeat-x;
color: #333333;
font-size: 100%;
font-weight: bold;
font-family: Verdana, Helvetica, Arial, sans-serif;
}
.phone{
width:40px;
}

textarea{
border: 1px double #999999;
border-top-color: #CCCCCC;
border-left-color: #CCCCCC;
padding: 0.25em;
background-color:#FFFFFF;
background-repeat: repeat-x;
color: #333333;
font-size: 75%;
font-weight: bold;
font-family: Verdana, Helvetica, Arial, sans-serif;
overflow:auto;
width:175px;
height:100px;
}


.required{
color:#0066FF;
}

.validate{
font-size:11px;
}
.red{
color:red;
}
.style1 {
	color: #009900;
	font-weight: bold;
}
</style>
<form method="post" action="contact.php" enctype="multipart/form-data">
<div style="float:left; width:306px;">
  <table id="" class="tborder" cellspacing="2" cellpadding="2" align="center" border="0">
    <tr>
      <td align="center" valign="top"><img src="brochure.jpg" alt="Send Free DVD!" width="300" height="249" id=""/></td>
    </tr>
    <tr align="left">
      <td valign="top"><span disabled="disabled">
        <input name="free_dvd" type="checkbox" id="free_dvd" value="y" <?=$dvd_input?> />
      </span><span id="" class="dvd_header12">FREE Educational DVD &amp; Brochure</span></td>
    </tr>
    <tr>
      <td align="center" valign="top"><strong>I am also interested in:</strong> </td>
    </tr>
    <tr align="left">
      <td style="width:80%;"><input id="coupon" type="checkbox" name="coupon" value="y" <?=$coupon_input?>/>
          <span id="" class="red"><strong>THE $1000 SAVINGS COUPON!</strong></span></td>
    </tr>
    <tr align="left">
      <td style="width:80%;"><input id="siteinspect" type="checkbox" name="siteinspect" value="y" <?=$siteinspect_input?> />
          <span id="" class="dvd_header12">FREE Site Inspection</span></td>
    </tr>
  </table>
</div>
<div style="float:left; margin-left:25px;">
  <fieldset>
  <legend>Request A Free DVD</legend>
  <?php echo $final_notice; ?> <br />
  <table border="0" cellpadding="1" cellspacing="1">
    <tr valign="top">
      <td><table border="0" cellpadding="1" cellspacing="1">
          <tr>
            <td align="left"><span id=""><span class="required">*</span> First Name:</span></td>
            <td align="left">&nbsp;</td>
          </tr>
          <tr>
            <td colspan="2" align="left"><input name="first_name" id="first_name" maxlength="50" value="<?php if($first_name){ echo $first_name;} ?>" type="text" /></td>
          </tr>
          <tr align="left">
            <td align="left"><span class="required">*</span> Last Name:</td>
            <td align="left">&nbsp;</td>
          </tr>
          <tr align="left">
            <td colspan="2" align="left"><input name="last_name" id="last_name" maxlength="50" value="<?php if($last_name){ echo $last_name;} ?>" type="text" /></td>
          </tr>
        </table>
        <table border="0" cellpadding="1" cellspacing="1">
          <tr align="left">
            <td align="left"><span id=""><span class="required">*</span> Address:</span></td>
            <td align="left">&nbsp;</td>
          </tr>
          <tr>
            <td colspan="2" align="left"><input name="address1" id="address1" value="<?php if($address1){ echo $address1;} ?>"></td>
          </tr>
          <tr align="left">
            <td align="left"><span id=""><span class="required">*</span> Address 2:</span></td>
            <td align="left">&nbsp;</td>
          </tr>
          <tr>
            <td colspan="2" align="left"><input name="address2" id="address2" value="<?php if($address2){ echo $address2;} ?>" /></td>
          </tr>
          <tr>
            <td align="left"><span id=""><span class="required">*</span> City:</span></td>
            <td align="left">&nbsp;</td>
          </tr>
          <tr align="left">
            <td colspan="2" align="left"><input name="city" id="city" maxlength="50" value="<?php if($city){ echo $city;} ?>" type="text" /></td>
          </tr>
          <tr>
            <td align="left"><span id=""><span class="required">*</span> State:</span></td>
            <td align="left">&nbsp;</td>
          </tr>
          <tr align="left">
            <td colspan="2" align="left"><select name="state" id="state" maxlength="10">
                <? if ($gotstate == "Y") { ?>
                <option selected="selected" value="<?=$state?>">
                <?=$state?>
                </option>
                <? } else { ?>
                <option selected="selected" value="ZZZ">-Choose-</option>
                <option value="AK">AK</option>
                <option value="AL">AL</option>
                <option value="AR">AR</option>
                <option value="AZ">AZ</option>
                <option value="CA">CA</option>
                <option value="CO">CO</option>
                <option value="CT">CT</option>
                <option value="DC">DC</option>
                <option value="DE">DE</option>
                <option value="FL">FL</option>
                <option value="GA">GA</option>
                <option value="HI">HI</option>
                <option value="IA">IA</option>
                <option value="ID">ID</option>
                <option value="IL">IL</option>
                <option value="IN">IN</option>
                <option value="KS">KS</option>
                <option value="KY">KY</option>
                <option value="LA">LA</option>
                <option value="MA">MA</option>
                <option value="MD">MD</option>
                <option value="ME">ME</option>
                <option value="MI">MI</option>
                <option value="MN">MN</option>
                <option value="MO">MO</option>
                <option value="MS">MS</option>
                <option value="MT">MT</option>
                <option value="NC">NC</option>
                <option value="ND">ND</option>
                <option value="NE">NE</option>
                <option value="NH">NH</option>
                <option value="NJ">NJ</option>
                <option value="NM">NM</option>
                <option value="NV">NV</option>
                <option value="NY">NY</option>
                <option value="OH">OH</option>
                <option value="OK">OK</option>
                <option value="OR">OR</option>
                <option value="PA">PA</option>
                <option value="RI">RI</option>
                <option value="SC">SC</option>
                <option value="SD">SD</option>
                <option value="TN">TN</option>
                <option value="TX">TX</option>
                <option value="UT">UT</option>
                <option value="VA">VA</option>
                <option value="VT">VT</option>
                <option value="WA">WA</option>
                <option value="WI">WI</option>
                <option value="WV">WV</option>
                <option value="WY">WY</option>
                <? } ?>
              </select>            </td>
          </tr>
          <tr align="left">
            <td align="left"><span id=""><span class="required">*</span> Zip Code:</span></td>
            <td align="left"><span id=""></span></td>
          </tr>
          <tr align="left">
            <td align="left"><input name="zipcode" id="zipcode" maxlength="10" value="<?php if($zipcode){ echo $zipcode;} ?>" type="text" /></td>
            <td align="left">&nbsp;</td>
          </tr>
        </table>
        <br />
      </td>
      <td width="5%">&nbsp;</td>
      <td><table border="0" cellpadding="1" cellspacing="1">
          <tr align="left">
            <td align="left"><span id=""><span class="required">*</span> Phone:</span></td>
          </tr>
          <tr>
            <td align="left"><input name="phone1" type="text" maxlength="3" id="phone1" value="<?=$phone1?>" size="2" onkeyup="intOnly(this); return autoTab(this, 3, event);" onchange="intOnly(this);" onkeypress="intOnly(this);" />
              <input name="phone2" type="text" maxlength="3" id="phone2" value="<?=$phone2?>" onkeyup="intOnly(this); return autoTab(this, 3, event);" onchange="intOnly(this);" onkeypress="intOnly(this);" size="2" />
              -
              <input name="phone3" type="text" maxlength="4" id="phone3" value="<?=$phone3?>" onkeyup="intOnly(this); return autoTab(this, 4, event);" onchange="intOnly(this);" onkeypress="intOnly(this);" size="3" />
            </td>
          </tr>
          <tr>
            <td align="left" nowrap="nowrap"><span class="required">*</span> Email:</td>
          </tr>
          <tr>
            <td align="left"><input name="email_address" id="email_address" value="<?php if($email_address){ echo $email_address;} ?>" type="text" /></td>
          </tr>
        </table>
        <table border="0" cellpadding="1" cellspacing="1">
          <tr align="left">
            <td colspan="2" align="left"> Comment: <br />
              <textarea  name="comments" id="comments"><?php if($comments){ echo $comments;} ?>
</textarea></td>
          </tr>
          <tr align="left">
            <td colspan="2" align="left"><input name="subform" value="y" type="hidden" />
              <input name="date" type="hidden" value="<?php echo date("m-d-Y"); ?>" />
              <input name="dvd" type="hidden" value="<?php echo "dvd" ?>" />
              <input name="action" type="hidden" value="<?=$action?>" />
              <input name="subform" type="hidden" value="Y" />
              <input name="Submit" style="border-style: double; border-color: rgb(204, 204, 204) rgb(153, 153, 153) rgb(153, 153, 153) rgb(204, 204, 204); border-width: 3px; padding: 0.25em; width: 250px; background-color: rgb(238, 238, 238); background-image: url(http://www.macromedia.com/images/master/background_form_element.gif); background-repeat: repeat-x; color: rgb(51, 51, 51); font-size: 100%; font-weight: bold; font-family: Verdana,Helvetica,Arial,sans-serif;" value="<?=$button_msg?>" type="submit" />
              <div style="width: 250px; margin-top:15px;"> <small><span class="style1">Your privacy is important to us.</span> <br />
                Personal information will NOT be shared<br />
                <br />
                DVD and brochure will be sent in 48 hours. You will receive an email notification when your package is sent. </small></div></td>
          </tr>
        </table></td>
    </tr>
  </table>
  <!--split-->
  </fieldset>
</div>
</form>
<? require ($_SERVER["DOCUMENT_ROOT"]."/inc-botmain.php"); ?>
<? } ?>
