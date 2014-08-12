$(document).ready(function() {

  $.mask.definitions['~'] = "[+-]";

  $('.request-quote-form input').each( function() {
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

  $('.request-quote-form').validate({
    focusInvalid: false,
    errorPlacement: function(error,element) {}
  });

});

jQuery.validator.addMethod("defaultInvalid", function(value, element) {
    return !(element.value == element.defaultValue);
},"This field is required.");