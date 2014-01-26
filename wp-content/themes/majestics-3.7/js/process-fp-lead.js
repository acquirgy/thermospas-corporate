$(document).ready(function() {

	preload = new Image(); 
	preload.src = "/wp-content/themes/majestics-3.7/images/getbtn-hover.png";

	$.mask.definitions['~'] = "[+-]";

	$('.fp-lead-form input').each( function() {
	
		$(this).focus( function() {			
			if( $(this).hasClass('phone') ) {
				$(this).mask("(999) 999-9999");
			} else {
				if(this.value==this.defaultValue)this.value='';
			}
		});
		
		$(this).blur( function() {
			if(this.value=='') this.value = this.defaultValue;
		});
	});
	
	$('.fp-lead-form').validate({	
		submitHandler: function() { 
			var loader = $('.loader');
			var thankyou = $('.thankyou');
			var form = $('.fp-lead-form');
			
			loader.show();
			form.hide();
			
			data = $('.fp-lead-form').serialize();
			
			$.ajax({
				type: 'POST',
				url: '/wp-content/themes/majestics-3.7/process-fp-lead.php',
				data: data,
				success: function(output) {
					if( output == 'ok' ) {
						loader.hide();
						$('.leadgen #title').hide();
						thankyou.show();
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

jQuery.validator.addMethod("defaultInvalid", function(value, element) {
    return !(element.value == element.defaultValue);
},"This field is required.");