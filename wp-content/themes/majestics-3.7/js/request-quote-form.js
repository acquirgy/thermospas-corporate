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

});

jQuery.validator.addMethod("defaultInvalid", function(value, element) {
    return !(element.value == element.defaultValue);
},"This field is required.");

function validateForm() {
  return $('.request-quote-form').valid({
    focusInvalid: false,
    errorPlacement: function(error,element) {}
  });

}