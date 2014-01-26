<?php
/*
File to include custom font settings and other typographic related functions.


*/

if(is_admin())
return;

$font_option = (!get_option("hades_toggle_custom_font")) ? "Google Webfonts" : get_option("hades_toggle_custom_font");
$mainfont = '';
$fcode = 'no font';

if($font_option=="Google Webfonts") :

		$font_name = get_option('hades_custom_font');
		if($font_name=="")
		$font_name = "Droid Sans";
		
		if(get_option("hades_custom_g_font_enable")=="true") 
		 $font_name = get_option("hades_custom_g_font"); 
		 
		$script_font = str_replace(" ","+",$font_name);
		 
		$mainfont = "http://fonts.googleapis.com/css?family={$script_font}&v2";
        $code = "<style type='text/css'> .custom-font  {  font-family: '".$font_name."', sans-serif; } </style>" ;
 
  wp_enqueue_style("webfont",$mainfont);
  

function addcustomheadingstyle()
 {
	global $code;
	 echo $code;
 }
 
 add_action("wp_head","addcustomheadingstyle"); 
 
 
 elseif($font_option=="Cufon") :
 
 $font_name = (get_option("hades_cufon_font")=="") ? "Androgyne" : get_option("hades_cufon_font") ;
 
 $c_check = substr ($font_name,0,7);
 if($c_check=="custom_")
 $font_name = "uploaded/".$font_name;
 else
 $font_name = $font_name.".font.js";
 
 wp_enqueue_script("cufon", URL . "/js/cufon-yui.js", array('jquery'), "2.0");
 wp_enqueue_script("cufon-font", URL . "/js/cufon-fonts/$font_name", array('cufon'), "2.0");
 
 function addcufonscripts()
 {
	
	 $script = "<script type='text/javascript'>
		 
		
		
		Cufon.replace('.custom-font');
		 
		 </script> ";
	 echo $script;
 }
 
 if(!is_admin())
 add_action("wp_head","addcufonscripts"); 


 endif;
 
 
$body_font = get_option("hades_body_font");
$body_font = ($body_font == "") ? 'Droid Sans' : $body_font;
 
 
$body_font_color = get_option("hades_font_color");
$body_font_color = (!$body_font_color) ? "888888" : $body_font_color; 
		 
$link_font_color = get_option("hades_link_font_color");
$link_font_color = (!$link_font_color) ? "888888" : $link_font_color; 
		 
$link_hover_font_color = get_option("hades_link_hover_font_color");
$link_hover_font_color = (!$link_hover_font_color) ? "888888" : $link_hover_font_color; 
		
		 
if($body_font=="")
$body_font = "Droid Sans";
		 
$bscript_font = str_replace(" ","+",$body_font);
$bmainfont = "http://fonts.googleapis.com/css?family={$bscript_font}&v2";
$bcode = "<style type='text/css'> body  {  font-family: '".$body_font."', sans-serif; } </style>" ;

wp_enqueue_style("body-font",$bmainfont);		  

function addtypostyles()
 {
	global $bcode;	 echo $bcode;
 }
 
if(!is_admin())
add_action("wp_head","addtypostyles");   