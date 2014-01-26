<?php
function add_button() {  
   if ( current_user_can('edit_posts') &&  current_user_can('edit_pages') )  
   {  
     add_filter('mce_external_plugins', 'add_plugin');  
     add_filter('mce_buttons', 'register_button');  
   }  
}  

function register_button($buttons) {
   array_push($buttons, "button");
   return $buttons;
}
function add_plugin($plugin_array) {
   $plugin_array['button'] = HURL.'/shortcodes/js/customcodes.js';
   return $plugin_array;
}


add_action('init', 'add_button');  


function createAction($atts,$content)
{
	extract(
	shortcode_atts(array(  
        "link" => '' ,
		"class"=> '',
		"id" => '' ,
		"buttontitle" => 'ACTION BUTTON' ,
		"width" => "650px"
    ), $atts)); 
	
	$content = do_shortcode($content);
	if($id!="")
	$id='id = "$id" ';
	
	$temp = "<div class='action-box clearfix $class' $id style='width:$width'><a href='$link' class='action'>$buttontitle</a><p> $content </p></div>";
	
	return $temp;
}

add_shortcode("action","createAction");


function createBox($atts,$content)
{
	extract(
	shortcode_atts(array(  
        "type" => 'error' ,
		"class"=> '',
		"id" => '' ,
		"title" => 'Box' ,
		"width" => "600px"
    ), $atts)); 
	
	if($id!="")
	$id='id = "$id" ';
	
	$content = do_shortcode($content);
	$button = "<div class='$type-box $class' $id style='width:$width'>";
	
	if($title!="")
	$button = $button . "<h4> $title </h4> ";
	
	$button = $button."<p> $content </p> </div>";
	
	return $button;
}

add_shortcode("box","createBox");

function createButton($atts,$content)
{
	extract(
	shortcode_atts(array(  
        "to" => '' ,
		"class"=> '',
		"id" => '' ,
		"color" => '#fff',
		'bg_color'=>'#282d35',
		'style' => 'default' ,
		'border_radius' => '2'
    ), $atts)); 
	
	if($id!="")
	$id='id = "$id" ';
	 
	 

    $border_color = $bg_color;
	$border_radius = $border_radius.'px';
	
	$code = "style=' color: {$color}; background-color:{$bg_color}; border-radius:{$border_radius}; -moz-border-radius:{$border_radius}; border:1px solid {$border_color}; '";
	
	$button = "<a $code   href='$to' class=' button-{$style} $class' $id> $content </a>";
	
	
	return $button;
}

add_shortcode("button","createButton");

function createList($atts,$content)
{
	extract(
	shortcode_atts(array(  
        "style" => 'style1' ,
		"class"=> '',
		"id" => '' ,
		"color" => 'blue' 
    ), $atts)); 
	$content = do_shortcode($content);
	if($style!="style1")
	$color = '';
	else
	$style='';
	
	if($id!="")
	$id='id = "$id" ';
	
	return "<div class='$style $class list{$color} styled' $id>$content</div>";
}

add_shortcode("list","createList");


function createSeparator($atts)
{
	extract(
	shortcode_atts(array(  
        "class"=>"narrow",
		"width" => "100%"
    ), $atts)); 
	
	if($class=="narrow")
	$class = "separator-narrow";
	else
	$class = "separator-full";
	

	$temp = "<p class='separator {$class} clearfix clearleft' ></p>";
   
	
	return $temp;
}

add_shortcode("separator","createSeparator");

function createLinkSeparator($atts,$content)
{
	extract(
	shortcode_atts(array(  
       "class"=>"narrow",
		"width" => "100%"
    ), $atts)); 
	
	if($class=="narrow")
	$class = "separator1-narrow";
	else
	$class = "separator1-full";
	
	
    $temp = "<p class='separator1 clearfix $class '><a href='#'>Top</a></p>";
 
	
	return $temp;
}

add_shortcode("separator1","createLinkSeparator");

function createTable($atts,$content)
{
	
	return "<div class='styled-table'>$content</div>";
}

add_shortcode("styledTable","createTable");


function createBigButtons($atts,$content)
{
	
	
	extract(
	shortcode_atts(array(  
        "to" => '' ,
		"class"=> '',
		"id" => '' ,
		"color" => 'blue' 
    ), $atts)); 
	
	if($id!="")
	$id='id = "$id" ';
	
	$button = "<a href='$to' class='{$color}-bigroundbutton $class clearfix' $id><img src='".get_bloginfo('template_url')."/hades_framework/shortcodes/css/i/rbig{$color}-begin.png' alt='button' /> $content</a>  ";
	
	
	return $button;
}

add_shortcode("bigbutton","createBigButtons");


function createRoundedButtons($atts,$content)
{
	
	
	extract(
	shortcode_atts(array(  
        "to" => '' ,
		"class"=> '',
		"id" => '' ,
		"color" => 'blue' 
    ), $atts)); 
	
	if($id!="")
	$id='id = "$id" ';
	
	$button = "<a href='$to' class='{$color}-roundbutton $class clearfix' $id><img src='".get_bloginfo('template_url')."/hades_framework/shortcodes/css/i/r{$color}-begin.png' alt='button' /> $content</a>  ";
	
	
	return $button;
}

add_shortcode("roundbutton","createRoundedButtons");


// == Social Shortcodes ===========================================================

function registerTweetButton($atts)
{
	extract(
	shortcode_atts(array( 
		"name" => "" , "text" => "" , "hashtags" => "" , "type" => "none"
		
    ), $atts)); 
	
	
	return '<a href="https://twitter.com/share" class="twitter-share-button" data-lang="en" data-via="'.$name.'" data-text="'.$text.'" data-hashtags='.$hashtags.'" data-count="'.$type.'" >Tweet</a><script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>';
}


add_shortcode("tweet","registerTweetButton");


function registerFbButton($atts)
{
	global $post;
	extract(
	shortcode_atts(array( 
		"url" => get_permalink() , "layout" => "standard"
		
    ), $atts)); 
	
	$w  = 250;
	$h = 35;
	if($layout=="button_count" || $layout=="box_count") $w = 70;
	if($layout=="box_count") $h = 75;
	
	return '<iframe src="//www.facebook.com/plugins/like.php?href='.urlencode($url).';send=false&amp;layout='.$layout.'&amp;width=450&amp;show_faces=false&amp;action=like&amp;colorscheme=light&amp;font&amp;height=35&amp;appId=165111413574616" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:'.$w.'px; height:'.$h.'px;" allowTransparency="true"></iframe>';
}


add_shortcode("facebook","registerFbButton");

function registerGButton($atts)
{
	global $post;
	extract(
	shortcode_atts(array( 
		 "size" => "small"
		
    ), $atts)); 
	
	
	return '<g:plusone size="'.$size.'"></g:plusone><script type="text/javascript">
  (function() {
    var po = document.createElement(\'script\'); po.type = \'text/javascript\'; po.async = true;
    po.src = \'https://apis.google.com/js/plusone.js\';
    var s = document.getElementsByTagName(\'script\')[0]; s.parentNode.insertBefore(po, s);
  })();
</script>';
}


add_shortcode("google","registerGButton");

function registerDiggButton($atts)
{
	global $post;
	extract(
	shortcode_atts(array( 
		 "size" => "Icon"
		
    ), $atts)); 
	
	
	return '<script type="text/javascript">
(function() {
var s = document.createElement(\'SCRIPT\'), s1 = document.getElementsByTagName(\'SCRIPT\')[0];
s.type = \'text/javascript\';
s.async = true;
s.src = \'http://widgets.digg.com/buttons.js\';
s1.parentNode.insertBefore(s, s1);
})();
</script>
<!-- Wide Button -->
<a class="DiggThisButton Digg'.$size.'"></a>';
}


add_shortcode("digg","registerDiggButton");


function registerStumbleButton($atts)
{
	global $post;
	extract(
	shortcode_atts(array( 
		 "layout" => "1"
		
    ), $atts)); 
	
	
	
	return '<su:badge layout="'.$layout.'"></su:badge> 
 <script type="text/javascript"> 
 (function() { 
     var li = document.createElement(\'script\'); li.type = \'text/javascript\'; li.async = true; 
      li.src = \'https://platform.stumbleupon.com/1/widgets.js\'; 
      var s = document.getElementsByTagName(\'script\')[0]; s.parentNode.insertBefore(li, s); 
 })(); 
 </script>';
}


add_shortcode("stumbleupon","registerStumbleButton");


function registerpinfollome($atts)
{
	global $post;
	extract(
	shortcode_atts(array( 
		 "user" => ""
		
    ), $atts)); 
	
	
	
	return '<a href="http://pinterest.com/'.$user.'/"><img src="http://passets-cdn.pinterest.com/images/follow-on-pinterest-button.png" width="156" height="26" alt="Follow Me on Pinterest" /></a>';
}


add_shortcode("pinterestfollow","registerpinfollome");

function registerpinterestfollow_small($atts)
{
	global $post;
	extract(
	shortcode_atts(array( 
		 "user" => ""
		
    ), $atts)); 
	
	
	
	return '<a href="http://pinterest.com/'.$user.'/"><img src="http://passets-cdn.pinterest.com/images/small-p-button.png" width="16" height="16" alt="Follow Me on Pinterest" /></a>';
}


add_shortcode("pinterestfollow_small","registerpinterestfollow_small");

function registerpinbutton($atts)
{
	global $post;


	extract(
	shortcode_atts(array( 
		 "on_url" => "" , "to_url" => ""
		
    ), $atts)); 
	
	
	
	return '<a href="http://pinterest.com/pin/create/button/?url='.$on_url.'&media='.$to_url.'" class="pin-it-button" count-layout="horizontal"><img border="0" src="//assets.pinterest.com/images/PinExt.png" title="Pin It" /></a>';
}


add_shortcode("pinterest","registerpinbutton");