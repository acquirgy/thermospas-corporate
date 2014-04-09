$(document).ready(function(){
	// global vars
	// first step
	var form = $("#ht_form");
	var ht_use = $("#ht_use");
	var ht_useInfo = $("#ht_useInfo");
	var ht_seating = $("#ht_seating");
	var ht_seatingInfo = $("#ht_seatingInfo");
	var fname = $("#name");
	var fnameInfo = $("#nameInfo");
	var zipcode = $("#zipcode");
	var zipcodeInfo = $("#zipcodeInfo");
	var phone = $("#phone");
	var phoneInfo = $("#phoneInfo");

	// second step
	var ht_location = $("#ht_location");
	var ht_locationInfo = $("#ht_locationInfo");
	var ht_jets = $("#ht_jets");
	var ht_jetsInfo = $("#ht_jetsInfo");
	var ht_owner = $("#ht_owner");
	var ht_ownerInfo = $("#ht_ownerInfo");
	var ht_siteinspection = $("#ht_siteinspection");
	var ht_siteinspectionInfo = $("#ht_siteinspectionInfo");
	var address = $("#address");
	var addressInfo = $("#addressInfo");
	var city = $("#city");
	var cityInfo = $("#cityInfo");
	var state = $("#custState");
	var stateInfo = $("#custStateInfo");
	var email = $("#email");
	var emailInfo = $("#emailInfo");

	// On blur
	// first step
	ht_use.blur(validate_ht_use);
	ht_seating.blur(validate_ht_seating);
	fname.blur(validateName);
	//email.blur(validateEmail);
	zipcode.blur(validateZipcode);
	phone.blur(validatePhone);

	// second step

	ht_location.blur(validate_ht_location);
	ht_jets.blur(validate_ht_jets);
	ht_owner.blur(validate_ht_owner);
	ht_siteinspection.blur(validate_ht_siteinspection);

	address.blur(validateAddress);
	city.blur(validateCity);
	state.blur(validateState);

	//On key press
	// first step
	ht_use.change(validate_ht_use);
	ht_seating.change(validate_ht_seating);
	fname.keyup(validateName);
	//email.keyup(validateEmail);
	zipcode.keyup(validateZipcode);
	phone.keyup(validatePhone);

	// second step
	ht_location.change(validate_ht_location);
	ht_jets.change(validate_ht_jets);
	ht_owner.change(validate_ht_owner);
	ht_siteinspection.change(validate_ht_siteinspection);
	address.keyup(validateAddress);
	city.keyup(validateCity);
	state.change(validateState);

	$('#submit_first').click(function(){
		//if( validate_ht_use() & validate_ht_seating() & validateName() & validateZipcode() & validatePhone()){
		if( validateName() & validateZipcode() & validatePhone()){
			submit_data_step1();
			return true;
		}else{
			return false;
		}
	});

	$('#submit_second').click(function(){
		//if( validate_ht_location() & validate_ht_jets() & validate_ht_owner() & validate_ht_siteinspection() & validateAddress() & validateCity() & validateState() ){
		if( validateAddress() & validateCity() & validateState() ){
			var ht_token = $("#ht_token").val();
			submit_data_step2(ht_token);
			return false;
		}else{
			return false;
		}
	});

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

	function validate_ht_use(){
		//testing regular expression
		var a = $("#ht_use").val();
		var filter = /^[a-zA-Z0-9]+/;
		//if it's valid email
		if(filter.test(a)){
			ht_use.removeClass("error");
			ht_useInfo.text("");
			ht_useInfo.removeClass("error");
			return true;
		}
		//if it's NOT valid
		else{
			ht_use.addClass("error");
			ht_useInfo.text("Please select primary use");
			ht_useInfo.attr("placeholder","Select Hot Tub Use");
			ht_useInfo.addClass("error");
			return false;
		}
	}
	function validate_ht_seating(){
		//testing regular expression
		var a = $("#ht_seating").val();
		var filter = /^[a-zA-Z0-9]+/;
		//if it's valid email
		if(filter.test(a)){
			ht_seating.removeClass("error");
			ht_seatingInfo.text("");
			ht_seatingInfo.removeClass("error");
			return true;
		}
		//if it's NOT valid
		else{
			ht_seating.addClass("error");
			ht_seatingInfo.text("Please select a seat option");
			ht_seatingInfo.attr("placeholder","Select Number of Seats");
			ht_seatingInfo.addClass("error");
			return false;
		}
	}
	function validate_ht_location(){
		//testing regular expression
		var a = $("#ht_location").val();
		var filter = /^[a-zA-Z0-9]+/;
		//if it's valid email
		if(filter.test(a)){
			ht_location.removeClass("error");
			ht_locationInfo.text("");
			ht_locationInfo.removeClass("error");
			return true;
		}
		//if it's NOT valid
		else{
			ht_location.addClass("error");
			ht_locationInfo.text("Please select hot tub location");
			ht_locationInfo.attr("placeholder","Select Location");
			ht_locationInfo.addClass("error");
			return false;
		}
	}
	function validate_ht_jets(){
		//testing regular expression
		var a = $("#ht_jets").val();
		var filter = /^[a-zA-Z0-9]+/;
		//if it's valid email
		if(filter.test(a)){
			ht_jets.removeClass("error");
			ht_jetsInfo.text("");
			ht_jetsInfo.removeClass("error");
			return true;
		}
		//if it's NOT valid
		else{
			ht_jets.addClass("error");
			ht_jetsInfo.text("Please select a jet type");
			ht_jetsInfo.attr("placeholder","Select Jet");
			ht_jetsInfo.addClass("error");
			return false;
		}
	}
	function validate_ht_owner(){
		//testing regular expression
		var a = $("#ht_owner").val();
		var filter = /^[a-zA-Z0-9]+/;
		//if it's valid email
		if(filter.test(a)){
			ht_owner.removeClass("error");
			ht_ownerInfo.text("");
			ht_ownerInfo.removeClass("error");
			return true;
		}
		//if it's NOT valid
		else{
			ht_owner.addClass("error");
			ht_ownerInfo.text("Please select answer");
			ht_ownerInfo.attr("placeholder","Select Owner");
			ht_ownerInfo.addClass("error");
			return false;
		}
	}
	function validate_ht_siteinspection(){
		//testing regular expression
		var a = $("#ht_siteinspection").val();
		var filter = /^[a-zA-Z0-9]+/;
		//if it's valid email
		if(filter.test(a)){
			ht_siteinspection.removeClass("error");
			ht_siteinspectionInfo.text("");
			ht_siteinspectionInfo.removeClass("error");
			return true;
		}
		//if it's NOT valid
		else{
			ht_siteinspection.addClass("error");
			ht_siteinspectionInfo.text("Please select answer");
			ht_siteinspectionInfo.attr("placeholder","Select Inspection");
			ht_siteinspectionInfo.addClass("error");
			return false;
		}
	}
	function validateState(){
		//testing regular expression
		var a = $("#state1").val();
		var filter = /^[a-zA-Z0-9]+/;
		//if it's valid email
		if(filter.test(a)){
			state.removeClass("error");
			state.text("");
			state.removeClass("error");
			return true;
		}
		//if it's NOT valid
		else{
			state.addClass("error");
			stateInfo.text("Please select your state");
			stateInfo.attr("placeholder","Select state");
			stateInfo.addClass("error");
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
		//jQuery('#ht_form').live('submit',function(event) {
		$.ajax({
			url: 'sk/submit-step1.php',
			type: 'POST',
			dataType: 'json',
			data: $('#ht_form').serialize(),
			complete: function(html){
				ppcconversion();
			}
		});
	}
	function submit_data_step2(ht_token){
		$.ajax({
			url: 'sk/submit-step2.php',
			type: 'POST',
			dataType: 'json',
			data: $('#ht_form').serialize(),
			complete: function(html){
				window.location = "/hot-tub-pricing-results.php?ht_token="+ht_token;

			}
		});
	}
	function ppcconversion() {
		var iframe = document.createElement('iframe');
		iframe.style.width = '0px';
		iframe.style.height = '0px';
		document.body.appendChild(iframe);
		iframe.src = '/sk/tracking.html';
	}
	function cjconversion() {
		var iframe = document.createElement('iframe');
		iframe.style.width = '0px';
		iframe.style.height = '0px';
		document.body.appendChild(iframe);
		iframe.src = '/sk/cjtracking.html';
	}
});

