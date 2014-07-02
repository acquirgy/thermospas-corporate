<?php

/*

Plugin Name: ThermoSpas Form

Plugin URI: http://www.thermospas.com

Description: Plugin for lead form

Author: S. Kim

Version: 1.0

Author URI: http://www.thermospas.com

*/



function ts_form_display($form_option=1) {

	$ts_form_path = plugins_url()."/ts_form";

	?>

    <style>

	<?php include($ts_form_path.'/css/ts_style.css'); ?>

	</style>

    <?php

    $tk_char = "0123456789abcdefghijklmnopqrstuvwxyABCDEFGHIJKLMNOPQRSTUVWXY";

    $randomStr = '';

    $datetime = strtotime('now');

	$tk_date = date("YmdHis", $datetime);



	for ($i = 0; $i < 8; $i++) {

        $randomStr .= $tk_char[rand(0, strlen($tk_char) - 1)];

    }

    $ts_token = $randomStr."Z".$tk_date;

	//if($form_option==1):

	?>

		<script type="text/javascript">
		  var __ss_noform = __ss_noform || [];
		  __ss_noform.push(['baseURI', 'https://app-PLBR48.sharpspring.com/webforms/receivePostback/MzQyNQAA/']);
		  __ss_noform.push(['endpoint', '77882009-d797-4a89-a905-1a5e2f7b12f7']);
		</script>
		<script type="text/javascript" src="https://koi-PLBR48.sharpspring.com/client/noform.js?ver=1.0" ></script>

		<form id="ts_form" action="" method="post">

		<div id="ts_container">

			<div id="form_step1">

				<!--<h2>Quick Hot Tub Quote</h2>-->

				<div class="tsFormRow">

				<select name="ts_use" class="tsCustomDropDown" id="ts_use">

					<option value="">Primary Hot Tub Use?</option>

					<option value="relaxation">Relaxation</option>

					<option value="hydrotherapy">Hydrotherapy/Pain Relief</option>

					<option value="exercise">Exercise</option>

					<option value="other">Other </option>

				</select><!--<div id="ts_useInfo" class="ts_useInfo"></div>-->

				</div>

				<div class="tsFormRow">

				<select name="ts_seating" class="tsCustomDropDown" id="ts_seating">

					<option value="">How many people?</option>

					<option value="2to3">2-3 person</option>

					<option value="3to4">3-4 person</option>

					<option value="4to5">4-5 person</option>

					<option value="5to6">5-6 person</option>

					<option value="6to+">6+ person</option>

				</select><!--<div id="ts_seatingInfo" class="ts_seatingInfo"></div>-->

				</div>

				<div class="tsFormRow"><input type="text" id="name" name="name" value="" placeholder="*Your Name"/></div>

				<div class="tsFormRow"><input type="text" id="zipcode" name="zipcode" value="" placeholder="*Your Zip Code"/></div>

				<div class="tsFormRow"><input type="text" id="phone" name="phone" value="" placeholder="*Phone" /></div>

				<?php $ts_date = date('Y-m-d ', strtotime('now'));?>

				<input name="ts_date" type="hidden" value="<?=$ts_date?>">

				<input name="ts_token" type="hidden" value="<?=$ts_token?>" id="ts_token">

				<input name="iref" type="hidden" value="IOTO">

				<button type="submit" name="ts_step1" id="ts_step1" >Get My Quote</button>

			</div><!-- #form_step1 -->



			<div id="form_step2" >

				<h2>Thank you,</h2>

                <div class="form-content">We are processing your pricing request.

				If you would like us to mail you the ThermoSpas Full Series Brochure, Educational DVD, and $1000 Savings Coupon please enter your information below.

                <!--<span id="request_size">A ThermoSpas Representative will be contacting you to provide pricing information</span>.

				If you would like us to mail you the ThermoSpas Full Series Brochure, Educational DVD, and $1000 Savings Coupon please enter your information below. -->

				</div>

				<div class="tsFormRow"><input type="text" id="address" name="address" value=""  placeholder="*Address" /></div>

				<div class="tsFormRow"><input type="text" id="city" name="city" value=""  placeholder="*City" /></div>

				<div class="tsFormRow"><select name="state1" id="state1" class="tsCustomDropDown" >

						<option value="">*State</option>

						<option value="AL">Alabama</option>

						<option value="AK">Alaska</option>

						<option value="AZ">Arizona</option>

						<option value="AR">Arkansas</option>

						<option value="CA">California</option>

						<option value="CO">Colorado</option>

						<option value="CT">Connecticut</option>

						<option value="DE">Delaware</option>

						<option value="FL">Florida</option>

						<option value="GA">Georgia</option>

						<option value="HI">Hawaii</option>

						<option value="ID">Idaho</option>

						<option value="IL">Illinois</option>

						<option value="IN">Indiana</option>

						<option value="IA">Iowa</option>

						<option value="KS">Kansas</option>

						<option value="KY">Kentucky</option>

						<option value="LA">Louisiana</option>

						<option value="ME">Maine</option>

						<option value="MD">Maryland</option>

						<option value="MA">Massachusetts</option>

						<option value="MI">Michigan</option>

						<option value="MN">Minnesota</option>

						<option value="MS">Mississippi</option>

						<option value="MO">Missouri</option>

						<option value="MT">Montana</option>

						<option value="NE">Nebraska</option>

						<option value="NV">Nevada</option>

						<option value="NH">New Hampshire</option>

						<option value="NJ">New Jersey</option>

						<option value="NM">New Mexico</option>

						<option value="NY">New York</option>

						<option value="NC">North Carolina</option>

						<option value="ND">North Dakota</option>

						<option value="OH">Ohio</option>

						<option value="OK">Oklahoma</option>

						<option value="OR">Oregon</option>

						<option value="PA">Pennsylvania</option>

						<option value="RI">Rhode Island</option>

						<option value="SC">South Carolina</option>

						<option value="SD">South Dakota</option>

						<option value="TN">Tennessee</option>

						<option value="TX">Texas</option>

						<option value="UT">Utah</option>

						<option value="VT">Vermont</option>

						<option value="VA">Virginia</option>

						<option value="WA">Washington</option>

						<option value="WV">West Virginia</option>

						<option value="WI">Wisconsin</option>

						<option value="WY">Wyoming</option>

					</select> <span id="state1Info" class="state1Info"></span>

				</div>

				<div class="tsFormRow"><input type="text" id="email" name="email" value="" placeholder="Email"/></div>

				<button type="submit" name="ts_step2" id="ts_step2" >Get Brochure & DVD</button>

			</div><!-- #form_step2 ends-->

			<div id="form_step3" >

				<h2>Thank you <span id="customer_name"></span></h2>

				<dev id="request_size"></dev>

                <a href="<?=$ts_form_path?>/downloads/Full_Series_Brochure.pdf" target="_new" ><img src="<?=$ts_form_path?>/downloads/button_brochure.png" alt="Download Brochure"></a>

                <a href="<?=$ts_form_path?>/downloads/thermospas-savings-coupon.pdf" target="_new" ><img src="<?=$ts_form_path?>/downloads/button_coupon.png" alt="Download Coupon"></a>

				<div></div>

			</div><!-- #form_step2 ends-->

		</div><!-- #ts_container -->

		</form>

<script type="text/javascript">

$(document).ready(function(){

	//initial div

	$('#form_step1').show('slow', function() {

		// Animation complete.

	});



	$("#ts_seating").change(function () {

		var str = "";

		var seatings = $("#ts_seating").val();

		switch(seatings)

		{

			case "": str = "A ThermoSpas Representative will be contacting you to provide pricing information"; break;

			case "2to3": str = "A ThermoSpas Representative will be contacting you to provide pricing information"; break;

			case "3to4": str = "A ThermoSpas Representative will be contacting you to provide pricing information"; break;

			case "4to5": str = "A ThermoSpas Representative will be contacting you to provide pricing information"; break;

			case "5to6": str = "A ThermoSpas Representative will be contacting you to provide pricing information"; break;

			case "6to+": str = "A ThermoSpas Representative will be contacting you to provide pricing information"; break;

			case "exercise": str = "A ThermoSpas Representative will be contacting you to provide pricing information"; break;

			case "swim": str = "A ThermoSpas Representative will be contacting you to provide pricing information"; break;



		}

		$("#request_size").text(str);

	})

	$("#name").change(function () {

		var name = $("#name").val();

		$("#customer_name").text(name);

	})



	// global vars

	// first step

	var form = $("#ts_form");

	var ts_use = $("#ts_use");

	var ts_useInfo = $("#ts_useInfo");

	var ts_seating = $("#ts_seating");

	var ts_seatingInfo = $("#ts_seatingInfo");

	var fname = $("#name");

	var fnameInfo = $("#nameInfo");

	var zipcode = $("#zipcode");

	var zipcodeInfo = $("#zipcodeInfo");

	var phone = $("#phone");

	var phoneInfo = $("#phoneInfo");



	// second step

	var address = $("#address");

	var addressInfo = $("#addressInfo");

	var city = $("#city");

	var cityInfo = $("#cityInfo");

	var state = $("#custState");

	var stateInfo = $("#custStateInfo");

	var email = $("#email");

	var emailInfo = $("#emailInfo");



	// On blur

	// step1

	ts_use.blur(validate_ts_use);

	ts_seating.blur(validate_ts_seating);

	fname.blur(validateName);

	//email.blur(validateEmail);

	zipcode.blur(validateZipcode);

	phone.blur(validatePhone);



	// step2

	address.blur(validateAddress);

	city.blur(validateCity);

	state.blur(validateState);



	//On key press

	// step1

	ts_use.change(validate_ts_use);

	ts_seating.change(validate_ts_seating);

	fname.keyup(validateName);

	//email.keyup(validateEmail);

	zipcode.keyup(validateZipcode);

	phone.keyup(validatePhone);



	// step2

	address.keyup(validateAddress);

	city.keyup(validateCity);

	state.keyup(validateState);

	state.change(validateState);



	$('#ts_step1').click(function(){

		//if( validate_ts_use() & validate_ts_seating() & validateName() & validateZipcode() & validatePhone()){

		if( validateName() & validateZipcode() & validatePhone()){

			submit_data_step1();

			$('#form_step1').hide('slow', function() {

		// Animation complete.

			});

			$('#form_step2').show('slow', function() {

		// Animation complete.

			});

			return false;

		}else{

			return false;

		}

	});



	$('#ts_step2').click(function(){

		//if( validate_ts_location() & validate_ts_jets() & validate_ts_owner() & validate_ts_siteinspection() & validateAddress() & validateCity() & validateState() ){

		if( validateAddress() & validateCity() & validateState() ){

			var ts_token = $("#ts_token").val();

			submit_data_step2(ts_token);

			$('#form_step2').hide('slow', function() {

		// Animation complete.

			});

			$('#form_step3').show('slow', function() {

		// Animation complete.

			});

			return false;

		}else{

			return false;

		}

	});



	function validateState(){

		//testing regular expression

		var a = $("#state1").val();

		var filter = /^[a-zA-Z0-9]+/;

		//if it's valid email

		if(filter.test(a)){

			$(".tsCustomStyleSelectBox").removeClass("error");

			state.text("");

			$(".tsCustomStyleSelectBox").removeClass("error");

			return true;

		}

		//if it's NOT valid

		else{

			$(".tsCustomStyleSelectBox").addClass("error");

			stateInfo.text("Please select your state");

			stateInfo.attr("placeholder","Select state");

			stateInfo.addClass("error");

			return false;

		}

	}

	//validation functions

	function validateEmail(){

		//testing regular expression

		var a = $("#email").val();

		var filter = /^[a-zA-Z0-9]+[a-zA-Z0-9_.-]+[a-zA-Z0-9_-]+@[a-zA-Z0-9]+[a-zA-Z0-9.-]+[a-zA-Z0-9]+.[a-z]{2,4}$/;

		//if it's valid email

		if(filter.test(a)){

			email.removeClass("error");

			emailInfo.text("Valid E-mail please!");

			emailInfo.removeClass("error");

			return true;

		}

		//if it's NOT valid

		else{

			email.addClass("error");

			emailInfo.text("Stop cowboy! Type a valid e-mail please ");

			emailInfo.attr("placeholder","Enter Valid Email	");

			emailInfo.addClass("error");

			return false;

		}

	}



	//validation functions

	function validateName(){

		//testing regular expression

		var a = $("#name").val();

		var filter = /^[a-zA-Z0-9]+/;

		//if it's valid email

		if(filter.test(a)){

			fname.removeClass("error");

			fnameInfo.text("Valid Name Please!");

			fnameInfo.removeClass("error");

			return true;

		}

		//if it's NOT valid

		else{

			fname.addClass("error");

			fnameInfo.text("Stop cowboy! Type a valid name please ");

			fnameInfo.attr("placeholder","Enter Valid Name	");

			fnameInfo.addClass("error");

			return false;

		}

	}



	//validation functions

	function validateCity(){

		//testing regular expression

		var a = $("#city").val();

		var filter = /^[a-zA-Z0-9]+/;

		//if it's valid email

		if(filter.test(a)){

			city.removeClass("error");

			cityInfo.text("Valid City Please!");

			cityInfo.removeClass("error");

			return true;

		}

		//if it's NOT valid

		else{

			city.addClass("error");

			cityInfo.text("Stop cowboy! Type a valid city please ");

			cityInfo.attr("placeholder","Enter Valid City	");

			cityInfo.addClass("error");

			return false;

		}

	}

	//validation functions

	function validateAddress(){

		//testing regular expression

		var a = $("#address").val();

		var filter = /^[a-zA-Z0-9]+/;

		//if it's valid email

		if(filter.test(a)){

			address.removeClass("error");

			addressInfo.text("Valid Address Please!");

			addressInfo.removeClass("error");

			return true;

		}

		//if it's NOT valid

		else{

			address.addClass("error");

			addressInfo.text("Stop cowboy! Type a valid address please ");

			addressInfo.attr("placeholder","Enter Valid Address	");

			addressInfo.addClass("error");

			return false;

		}

	}



	function validate_ts_use(){

		//testing regular expression

		var a = $("#ts_use").val();

		var filter = /^[a-zA-Z0-9]+/;

		//if it's valid email

		if(filter.test(a)){

			ts_use.removeClass("error");

			ts_useInfo.text("");

			ts_useInfo.removeClass("error");

			return true;

		}

		//if it's NOT valid

		else{

			ts_use.addClass("error");

			ts_useInfo.text("Please select primary use");

			ts_useInfo.attr("placeholder","Select Hot Tub Use");

			ts_useInfo.addClass("error");

			return false;

		}

	}

	function validate_ts_seating(){

		//testing regular expression

		var a = $("#ts_seating").val();

		var filter = /^[a-zA-Z0-9]+/;

		//if it's valid email

		if(filter.test(a)){

			ts_seating.removeClass("error");

			ts_seatingInfo.text("");

			ts_seatingInfo.removeClass("error");

			return true;

		}

		//if it's NOT valid

		else{

			ts_seating.addClass("error");

			ts_seatingInfo.text("Please select a seat option");

			ts_seatingInfo.attr("placeholder","Select Number of Seats");

			ts_seatingInfo.addClass("error");

			return false;

		}

	}

	function validateZipcode(){

		var b = $("#zipcode").val();

		var filter = /^[0-9]{5}$|^[0-9]{5}-[0-9]{4}$/;

		//if it's valid phone

		if(filter.test(b)){

			zipcode.removeClass("error");

			zipcodeInfo.text("Valid Phone please!");

			zipcodeInfo.removeClass("error");

			return true;

		}

		//if it's NOT valid

		else{

			zipcode.addClass("error");

			zipcodeInfo.text("Stop cowboy! Type a valid phone please ");

			zipcodeInfo.addClass("error");

			return false;

		}

	}

	function validatePhone(){

		var b = $("#phone").val();

		var filter = /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;

		//if it's valid phone

		if(filter.test(b)){

			phone.removeClass("error");

			phoneInfo.text("Valid Phone please!");

			phoneInfo.removeClass("error");

			return true;

		}

		//if it's NOT valid

		else{

			phone.addClass("error");

			phoneInfo.text("Stop cowboy! Type a valid phone please ");

			phoneInfo.addClass("error");

			return false;

		}

	}

	function submit_data_step1(){

		//jQuery('#ts_form').live('submit',function(event) {

		$.ajax({

			url: '<?=$ts_form_path?>/ts-step1.php',

			type: 'POST',

			dataType: 'json',

			data: $('#ts_form').serialize(),

			complete: function(html){

				_gaq.push(['_trackPageview', '/request-qoute-step1']);

//				ppcconversion();

			}

		});

		//return false;

	//});

	}

	function submit_data_step2(ts_token){

		$.ajax({

			url: '<?=$ts_form_path?>/ts-step2.php',

			type: 'POST',

			dataType: 'json',

			data: $('#ts_form').serialize(),

			complete: function(html){

				_gaq.push(['_trackPageview', '/request-qoute-step2']);

//				ppcconversion2();

			}

		});

	}

	function ppcconversion() {

		var iframe = document.createElement('iframe');

		iframe.style.width = '0px';

		iframe.style.height = '0px';

		document.body.appendChild(iframe);

		_gaq.push(['_trackPageview', '/step1-ajax']);

//		iframe.src = '<?=$ts_form_path?>/request-qoute-step1';

	}

	function ppcconversion2() {

		var iframe = document.createElement('iframe');

		iframe.style.width = '0px';

		iframe.style.height = '0px';

		document.body.appendChild(iframe);

		_gaq.push(['_trackPageview', '/request-qoute-step2']);

//		iframe.src = '<?=$ts_form_path?>/ts_form2.html';

	}

});



</script>

		<!-- MASKED INPUT JQUERY FUNCTION -->

		<script type="text/javascript" src="<?=$ts_form_path?>/js/tsCustomSelect.js"></script>

		<script type="text/javascript" src="<?=$ts_form_path?>/js/jquery.maskedinput.js"></script>

		<script type="text/javascript" src="<?=$ts_form_path?>/js/jquery.placeholder.min.js"></script>



		<script type="text/javascript">

		$(function() {

			$('select.tsCustomDropDown').tsCustomStyle();

			$('input').placeholder();

		});

		</script>



		<script type="text/javascript">

			var jmask = jQuery;

			jmask(function() {

				jmask.mask.definitions['~'] = "[+-]";

				jmask("#phone").mask("(999) 999-9999");



				jmask("#phone").blur(function() {

					jmask("#phoneinfo").html("Unmasked value: " + jmask(this).mask());

				});



			});

		</script>



    <?php

	//endif;

}



function tsGenerateToken($length = 8) {

    $characters = "0123456789abcdefghijklmnopqrstuvwxyABCDEFGHIJKLMNOPQRSTUVWXY";

    $randomString = '';

    $datetime = strtotime('now');

	$token = date("YmdHis", $datetime);



	for ($i = 0; $i < $length; $i++) {

        $randomString .= $characters[rand(0, strlen($characters) - 1)];

    }

    return $randomString."Z".$token;

}



//*************** Admin function ***************

function ts_admin() {

//	include('ts_form_admin.php');

}



function ts_form_admin_actions() {

    add_options_page("ThermoSpas Form", "ThermoSpas Form", 1, "ThermoSpas Form", "ts_admin");

}



add_action('admin_menu', 'ts_form_admin_actions');

add_action('publish_post', 'ts_form_display');

?>