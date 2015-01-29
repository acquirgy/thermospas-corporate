$(document).ready(function() {

	preload = new Image();
	preload.src = "/wp-content/themes/majestics-3.7/images/getbtn-hover.png";

	$.mask.definitions['~'] = "[+-]";

	$('#alabamaSidebarForm form input').each( function() {

		// if the input is a submit button, don't do anything
		if($(this).is(':submit')) { return false; }

		$(this).focus( function() {
			if( $(this).hasClass('phone') ) {
				$(this).mask("(999) 999-9999");
			}
			else {
				if(this.value==this.defaultValue)this.value='';
			}
		});

		$(this).blur( function() {
			if(this.value=='') this.value = this.defaultValue;
		});
	});

	$('#alabamaSidebarForm form').validate({
		submitHandler: function() {

			var loader   = $('.loader');
			var thankyou = $('.thankyou');
			var form     = $('#alabamaSidebarForm form');
			var privacy  = $('#alabamaSidebarForm .privacy');

			loader.show();
			form.hide();

			__ss_noform.push(['submit', null]);

			data = $('#alabamaSidebarForm form').serialize();

			$.ajax({
				type: 'POST',
				url: '/wp-content/themes/majestics-3.7/includes/alabama/process-alabama-form.php',
				data: data,
				success: function(output) {
					if( output ) {
						loader.hide();
						privacy.hide();
						thankyou.show();
						ppcconversion();
					} else {
						alert('Woops, something broke.  Please try that again');
						loader.hide();
						form.show();
					}
				},
				error: function() {
					loader.hide();
					form.show();
				}
			});
		},
		errorPlacement: function(error,element) {},
		focusInvalid: false
	});

});

// jQuery.validator.addMethod("defaultInvalid", function(value, element) {
// 	return !(element.value == element.defaultValue);
// },"This field is required.");

	function ppcconversion() {
		var iframe = document.createElement('iframe');
		iframe.style.width = '0px';
		iframe.style.height = '0px';
		document.body.appendChild(iframe);
		iframe.src = '/wp-content/themes/majestics-3.7/includes/alabama/alabama-tracking.html';
	}
