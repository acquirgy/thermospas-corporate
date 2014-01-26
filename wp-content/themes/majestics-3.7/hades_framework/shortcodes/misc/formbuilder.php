<?php

function createcontactform($atts,$content)
{
	extract(
	shortcode_atts(array(  
       
		"id" => '' ,
		"width" => "300px"
    ), $atts)); 
	
	if($id=="")
	{
		return "Invalid ID";
	}
	
	  $forms = get_option("hades_forms");
	  $cform = '' ;
	 $test_flag = true; 
	foreach($forms as $form)
	{
		if($id == $form["key"]  )
		{
			$cform = $form;$test_flag = false;  break; 
		}
	}
	
	if($test_flag)
	{
		return "Invalid ID";
	}
	
	
	
	$form = "    <div class=\"dynamic_forms clearfix\" style='{$width}'> 
	
	 <div class='loader success-box clearfix'>
          <p> Message Sent ! </p>
          </div>
      <form action='".get_bloginfo('template_url')."/hades_framework/helper/form_request.php' method='post' />
	   <span class='ajax-loading-icon'></span>";
	 
	$name_value = $cform["name_value"];
	$form_element = $cform["form_element"];
	$email_notification_mail = $cform["email_notification_mail"];
	
	$captacha_verification  = $cform["captacha_verification"];
	
	
	if($cform["email_notification"]!="true")
	$email_notification_mail = "none";
	
	$label_values = $cform["label_values"];
	$i =0;
	foreach($form_element as $input)
	{
		$label = $label_values[$i];
		$name = $name_value[$i];
		
		if($name=="Click to edit name, optional" || trim($name) == "" )
		{
			$name = $input.$i;
		}
		 
		switch($input)
		{
			case "text" :  $form = $form." <p class='clearfix'>
						    <label for='{$name}'> $label </label>
							<input type='text' value='' name='{$name}' id='{$name}' />
						  </p> ";
			              break;
			case "textarea" :  $form = $form." <p class='clearfix'>
						    <label for='{$name}'> $label </label>
							<textarea name='{$name}' id='{$name}' /></textarea>
						  </p> ";
			              break;
			default :  
			             $form = $form." <p class='clearfix'>
						    <label for='{$name}'> $label </label>
							<select id='{$name}' name='{$name}' >";
						 $options = explode(":",$input);
						 $options = $options[1];
						 $options = explode(",",$options);
						  foreach($options as $option)
							$form = $form."<option value='{$option}'>{$option}</option>";
						 $form = $form."</select></p>";	
						
			              break;			  			  
		}
		$i++;
	}
	// print_r($cform);
	
	if($captacha_verification=="true")
	{
		require(HPATH."/helper/recaptchalib.php");
		$publickey = get_option("hades_captcha_public_key"); // you got this from the signup page
        $form = $form. recaptcha_get_html($publickey);
	}
	
	
	$form = $form."  <input type='hidden' name='notify_email' value='{$email_notification_mail}' class='notify_email' /><input type='hidden' name='form_key' value='{$id}' class='form_key' /><input type='submit' name='qsubmit' value='Send' class='d_submit' /></form></div>";
	return $form;
}


add_shortcode("contactform","createcontactform");