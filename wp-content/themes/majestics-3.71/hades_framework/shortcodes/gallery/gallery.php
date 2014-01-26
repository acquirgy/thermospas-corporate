<?php

function titan_createSlide($atts,$content)
{
	extract(
	shortcode_atts(array(  
        "src" => '',
	    "jquery" => false,
		"sense" => false
	    ), $atts)); 
	
	  $theImageSrc = $src;
							global $blog_id;
							if (isset($blog_id) && $blog_id > 0) {
							$imageParts = explode('/files/', $theImageSrc);
							if (isset($imageParts[1])) {
								$theImageSrc = '/blogs.dir/' . $blog_id . '/files/' . $imageParts[1];
							}
						}	
		
	if($jquery)
	$src = urlencode($theImageSrc);
	
	$tab = " <img src=\"{$src}\" alt=\"$content\" width='{width}' height='{height}' /> ";
	return $tab;
}

add_shortcode("slide","titan_createSlide");

function titan_createSliderWidget($atts,$content)
{
	extract(
	shortcode_atts(array(  
        "width" => 300,
		"height" => 250,
		"sense" => false
		
	    ), $atts)); 
	
	if($sense)
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
		
	$data = "	<div class='shortcode_slider_wrapper' style='width:{$width};height:{$height}'> 
	  <div class=\"shortcode_slider\" style='width:{$width};height:{$height}'> 
            ".do_shortcode($content)."
        </div> <span></span></div> ";
	
	$data = str_replace("{width}",$width,$data);
	$data = str_replace("{height}",$height,$data);
		
	return $data;
}
add_shortcode("slider","titan_createSliderWidget");


function titan_createjSliderWidget($atts,$content)
{
	extract(
	shortcode_atts(array(  
        "width" => 300,
		"height" => 250,
		"sense" => false
		
	    ), $atts)); 
	
	
		
	$data = "	
	  <div class=\"shortcode_jslider\" style='width:{$width}px;height:{$height}px'> ".do_shortcode($content)." </div> ";
	
	$data = str_replace("{width}",'',$data);
	$data = str_replace("{height}",'',$data);
	$data = str_replace("alt","title",$data);	
	
    $image_path = URL."/timthumb.php?w={$width}&amp;h={$height}&amp;src=";
	
	
	 
	$data = str_replace("src=\"","src=\"$image_path",$data);
		
	return $data;
}
add_shortcode("jslider","titan_createjSliderWidget");

function titan_createItem($atts,$content)
{
	extract(
	shortcode_atts(array(  
        "src" => ''
	    ), $atts)); 
	$content = do_shortcode($content);	
	
	  $theImageSrc = $src;
							global $blog_id;
							if (isset($blog_id) && $blog_id > 0) {
							$imageParts = explode('/files/', $theImageSrc);
							if (isset($imageParts[1])) {
								$theImageSrc = '/blogs.dir/' . $blog_id . '/files/' . $imageParts[1];
							}
						}
						
	$tab = "<a href=\"{$src}\">
			  <img src=\"{$src}\" alt=\"$content\">
			</a>";
	return $tab;
}

add_shortcode("item","titan_createItem");

function titan_createGalleria($atts,$content)
{
	extract(
	shortcode_atts(array(  
        "width" => 300,
		"height" => 250,
		"sense" => false
		
	    ), $atts)); 
		
	if($sense)
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
		
	$data = "<div class=\"shortcode_gallery\" style='width:{$width};height:{$height};'> ".do_shortcode($content)."</div>";
		
	return $data;
}
add_shortcode("galleria","titan_createGalleria");




function titan_createImageBox($atts,$content)
{
	extract(
	shortcode_atts(array(  
        "align" => 'none' ,
		"class"=> '',
		"id" => '' ,
		"caption" => "",
		"src"=>'',
		"width"=>"300",
		"height"=>"300",
		"sense" => false
    ), $atts)); 
	
	
	
	if( trim($width)=="" || trim($height) == "")
	{
		switch($sense)
		{
		case "full_width" : $height = "350px";
		$width = "100%"; break;
		case "one_third" : $height = "300px";
		$width = "90%"; break;
		case "two_third" : $height = "300px";
		$width = "90%"; break;
		case "one_half" : $height = "300px";
		$width = "90%"; break;
		case "three_fourth" : $height = "300px";
		$width = "90%"; break;
		case "one_fourth" : $height = "200px";
		$width = "90%"; break;
		case "one_fifth" : $height = "150px";
		$width = "90%"; break;
		case "four_fifth" : $height = "320px";
		$width = "90%"; break;
		
		}
	}
	
	if($id!="")
	$id='id = "$id" ';
	if($caption!="")
	$caption = "<span class='caption'>".$caption."<span>";
	
	
	
	$temp = "<div class='image-wrapper $class' $id style='float:$align'> <img src='$src' alt='image' width='{$width}'  height='{$height}' /> $caption </div> ";
	

	
	return $temp;
}

add_shortcode("imagewrapper","titan_createImageBox");