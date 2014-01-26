<?php

function titan_createYoutube($atts,$content)
{
	extract(
	shortcode_atts(array(  
        "width" => "",
		"height" => "",
		"id" => '' ,
		"sense" => false
		
    ), $atts)); 
	
	
	if( trim($width)=="" || trim($height) == "")
	{
		switch($sense)
		{
		case "full_width" : $height = "350px";
		$width = "100%"; break;
		case "one_third" : $height = "300px";
		$width = "100%"; break;
		case "two_third" : $height = "300px";
		$width = "100%"; break;
		case "one_half" : $height = "300px";
		$width = "100%"; break;
		case "three_fourth" : $height = "300px";
		$width = "100%"; break;
		case "one_fourth" : $height = "200px";
		$width = "100%"; break;
		case "one_fifth" : $height = "150px";
		$width = "100%"; break;
		case "four_fifth" : $height = "320px";
		$width = "100%"; break;
		
		}
	}
	
	$id = stripslashes(strip_tags($id));
	
	$temp = "<iframe title=\"YouTube video player\" width=\"{$width}\" height=\"{$height}\" src=\"http://www.youtube.com/embed/{$id}?rel=0\" frameborder=\"0\" allowfullscreen></iframe>";
  
	
	return $temp;
}


add_shortcode("youtube","titan_createYoutube");



function titan_createVimeo($atts,$content)
{
	extract(
	shortcode_atts(array(  
        "width" => "300",
		"height" => "250",
		"id" => '' ,
		"sense" => false
		
    ), $atts)); 
	
	$id = stripslashes(strip_tags($id));
	
	if( trim($width)=="" || trim($height) == "")
	{
		switch($sense)
		{
		case "full_width" : $height = "350px";
		$width = "100%"; break;
		case "one_third" : $height = "300px";
		$width = "100%"; break;
		case "two_third" : $height = "300px";
		$width = "100%"; break;
		case "one_half" : $height = "300px";
		$width = "100%"; break;
		case "three_fourth" : $height = "300px";
		$width = "100%"; break;
		case "one_fourth" : $height = "200px";
		$width = "100%"; break;
		case "one_fifth" : $height = "150px";
		$width = "100%"; break;
		case "four_fifth" : $height = "320px";
		$width = "100%"; break;
		
		}
	}
	
	$temp = "<iframe title=\"Vimeo video player\" width=\"{$width}\" height=\"{$height}\" src=\"http://player.vimeo.com/video/{$id}\" frameborder=\"0\" ></iframe>";
  
	
	return $temp;
}


add_shortcode("vimeo","titan_createVimeo");

function createImageBox($atts,$content)
{
	extract(
	shortcode_atts(array(  
        "align" => 'none' ,
		"class"=> '',
		"id" => '' ,
		"caption" => "",
		"src"=>'',
		"width"=>"300",
		"height"=>"300"
    ), $atts)); 
	
	$content = do_shortcode($content);
	if($id!="")
	$id='id = "$id" ';
	if($caption!="")
	$caption = "<span class='caption'>".$caption."<span>";
	
	$temp = "<div class='image-wrapper $class' $id style='float:$align'> <img src='$src' alt='image' width='{$width}'  height='{$height}' /> $caption </div> ";
	

	
	return $temp;
}

add_shortcode("imagewrapper","createImageBox");


function titan_createVideo($atts)
{
	extract(
	shortcode_atts(array(  
        "width" => "300",
		"height" => "250",
		"src" => '' ,
		"title" => 'video',
		"sense" => false
		
    ), $atts)); 
	
	$id = stripslashes(strip_tags($id));
	
	if( trim($width)=="" || trim($height) == "")
	{
		switch($sense)
		{
		case "full_width" : $height = "450";
		$width = "940"; break;
		case "one_third" : $height = "300";
		$width = "100%"; break;
		case "two_third" : $height = "300";
		$width = "100%"; break;
		case "one_half" : $height = "300";
		$width = "100%"; break;
		case "three_fourth" : $height = "300";
		$width = "100%"; break;
		case "one_fourth" : $height = "200";
		$width = "100%"; break;
		case "one_fifth" : $height = "150";
		$width = "100%"; break;
		case "four_fifth" : $height = "320";
		$width = "100%"; break;
		
		}
	}
	
	// serialize dont work !!
	$trick_src = "$src{titan}$height{titan}$width{titan}$title";
	
	// unique ID 
	$id = 'd'.uniqid();
	
	$temp = "<div id=\"{$id}\">
			<a href=\"http://www.adobe.com/go/getflashplayer\">
				<img border=\"0\" src=\"http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif\" alt=\"Get Adobe Flash player\" />
			</a>
		</div>
		<script type='text/javascript'>
			// DOCUMENTATION: http://code.google.com/p/swfobject/wiki/documentation
			var flashvars = {};
			flashvars.xmlFile = '".HURL."/helper/request_video.php?src={$trick_src}'; 
			var params = {};
			params.scale = 'noscale';
			params.salign = 'tl';
			params.bgcolor = '#000000';
			params.seamlesstabbing = 'false';
			params.swliveconnect = 'true';
			params.allowfullscreen = 'true';
			params.allowscriptaccess = 'always';
			params.allownetworking = 'all';
			params.base = '';
			var attributes = {};
			attributes.id = 'oxylusflash';
			attributes.align = 'top';
			swfobject.embedSWF('".URL."/js/main.swf', '{$id}', '$width', '$height','9.0.0', false, flashvars, params, attributes);
		</script>
		
		";
  
	
	return $temp;
}


add_shortcode("video","titan_createVideo");