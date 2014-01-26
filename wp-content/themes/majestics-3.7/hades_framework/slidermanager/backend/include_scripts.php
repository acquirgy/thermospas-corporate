<?php

if(is_admin())
return;

function init_slider_scripts(){ 
$slider = (!get_option("hades_feature_slider")) ? "Feature Slider" : get_option("hades_feature_slider");
$auto = (!get_option("hades_auto_feature_slider")) ? "true" : get_option("hades_auto_feature_slider");


switch($slider){   
		  case "Feature Slider" : wp_enqueue_script("jquery-feature", URL. "/js/featureslider.js", array('jquery'), "1.0"); break; 
		  case "Accordion" :  wp_enqueue_script("jquery-kwick", URL . "/js/jquery.kwicks-1.5.1.js", array('jquery'), "1.0"); 
		   case "Nivo Slider" : wp_enqueue_script("jquery-nivo-slider",URL . "/js/jquery.nivo.slider.pack.js", array('jquery'), "2.5.1"); break;
		  case "Fade" : 
		  case "HTML 5 slider" : 
		  case "Cubes Grow Center"  :
		  case "Cubes Grow"  : 
		  case "Strips alternate" :
		  case "Strips fade" :
		  case "Strips half fade" :
		  case "Cube side grow" :
		  case "Blue Channel(html5)" :
		  case "Red Channel(html5)" : 
		  case "Green Channel(html5)" :
		  case "Overlay" :
		  case "Color burn" :
		  case "Screen" :
		  case "jQuery Slider" : wp_enqueue_script("jquery-quartz", URL. "/js/jquery.quartz.3.0.js", array('jquery','custom_script'), "1.0");
		  break;
	}
	
}
add_action('init', 'init_slider_scripts');


function slidersettings(){ 
$slider = (get_option("hades_feature_slider")=="") ? "Feature Slider" : get_option("hades_feature_slider");
$auto = (get_option("hades_auto_feature_slider")=="") ? "true" : get_option("hades_auto_feature_slider");
$slider_duration = (get_option("hades_feature_slider_duration")=="") ? "3000" : get_option("hades_feature_slider_duration");

$autoplay = ', autoplay: true';
if($auto=="false")
$autoplay = ', autoplay: false';

?>
<script type="text/javascript">
jQuery(function($){
<?php

switch($slider){   
   case "Feature Slider" : ?>
$(".feature-slider>ul").featureslider({ time:<?php echo $slider_duration; ?>, height:330,width:496  <?php echo $autoplay; ?> , controls:true });	
	<?php break;  
	
    case "Accordion" : ?>
	 $('.kwicks').kwicks({  
        max : 880,  
        spacing : 0  
    });
	var elt;
	$('.kwicks li').hover(function(){
	elt = $(this);
		elt.children(".description").css("visibility","visible").delay(700).animate({opacity:1},1000);
		},function(){
			
			$(this).children(".description").stop(true,true).css({"visibility":"hidden","opacity":0 });
			
			});
	
	<?php break; 
     case "HTML 5 slider" : ?>
		$(".quartz-slider>ul").quartzslider({ time:<?php echo $slider_duration; ?>, arrowControls:false ,height:371,width:980 , mode:'html5' <?php echo $autoplay; ?> , controls:true });	
	<?php break; 
	 case "jQuery Slider" : ?>
		$(".quartz-slider>ul").quartzslider({ time:<?php echo $slider_duration; ?> , arrowControls:false,height:371,width:980 , mode:'default'<?php echo $autoplay; ?> , controls:true});	
	<?php break; 
	case "Fade" : ?>
		$(".quartz-slider>ul").quartzslider({ time:<?php echo $slider_duration; ?> , arrowControls:false,height:371,width:980 ,  effect:0  <?php echo $autoplay; ?>, controls:true});	
	<?php break; 
	case "Cubes Grow Center"  : ?>
		$(".quartz-slider>ul").quartzslider({ time:<?php echo $slider_duration; ?> , arrowControls:false,height:371,width:980 ,  effect:1 <?php echo $autoplay; ?> , controls:true});	
	<?php break; 
	case "Cubes Grow"  : ?>
		$(".quartz-slider>ul").quartzslider({ time:<?php echo $slider_duration; ?> , arrowControls:false,height:371,width:980 ,  effect:2 <?php echo $autoplay; ?> , controls:true});	
	<?php break; 
	case "Strips alternate" : ?>
		$(".quartz-slider>ul").quartzslider({ time:<?php echo $slider_duration; ?>, arrowControls:false ,height:371,width:980 ,  effect:3 <?php echo $autoplay; ?> , controls:true});	
	<?php break; 
	case "Strips fade" : ?>
		$(".quartz-slider>ul").quartzslider({ time:<?php echo $slider_duration; ?>, arrowControls:false ,height:371,width:980 ,  effect:4 <?php echo $autoplay; ?> , controls:true});	
	<?php break; 
	case "Strips half fade" : ?>
		$(".quartz-slider>ul").quartzslider({time:<?php echo $slider_duration; ?> , arrowControls:false, height:371,width:980 ,  effect:5 <?php echo $autoplay; ?> , controls:true});	
	<?php break; 
	case "Cube side grow" : ?>
		$(".quartz-slider>ul").quartzslider({ time:<?php echo $slider_duration; ?>, arrowControls:false ,height:371,width:980 ,  effect:6<?php echo $autoplay; ?>  , controls:true});	
	<?php break; 
	case "Blue Channel(html5)" : ?>
		$(".quartz-slider>ul").quartzslider({ time:<?php echo $slider_duration; ?> , arrowControls:false,height:371,width:980 ,  effect:7 <?php echo $autoplay; ?> , controls:true});	
	<?php break; 
	case "Red Channel(html5)" : ?>
		$(".quartz-slider>ul").quartzslider({ time:<?php echo $slider_duration; ?> , arrowControls:false,height:371,width:980 ,  effect:8 <?php echo $autoplay; ?> , controls:true});	
	<?php break; 
	case "Green Channel(html5)" : ?>
		$(".quartz-slider>ul").quartzslider({ time:<?php echo $slider_duration; ?> , arrowControls:false,height:371,width:980 ,  effect:9  <?php echo $autoplay; ?>, controls:true});	
	<?php break; 
	case "Overlay" : ?>
		$(".quartz-slider>ul").quartzslider({ time:<?php echo $slider_duration; ?> , arrowControls:false,height:371,width:980 ,  effect:10 <?php echo $autoplay; ?> , controls:true});	
	<?php break; 
	case "Color burn" : ?>
		$(".quartz-slider>ul").quartzslider({ time:<?php echo $slider_duration; ?>, arrowControls:false ,height:371,width:980 ,  effect:11 <?php echo $autoplay; ?> , controls:true});	
	<?php break; 
	case "Screen" : ?>
		$(".quartz-slider>ul").quartzslider({time:<?php echo $slider_duration; ?>, arrowControls:false , height:371,width:980 ,  effect:12  <?php echo $autoplay; ?>, controls:true});	
	<?php break; 
   case "Nivo Slider" : ?>
        
		<?php if($auto=="true"){ ?>
        $('#nivoslider').nivoSlider({ pauseTime:<?php echo $slider_duration; ?> , height:371,width:980 });
		<?php } else { ?>
		$('#nivoslider').nivoSlider({ pauseTime:<?php echo $slider_duration; ?> , height:371,width:980 ,  manualAdvance:true });
	<?php } break; 	
	}
?>

});
</script>
<?php
	
}
add_action("wp_head","slidersettings");
