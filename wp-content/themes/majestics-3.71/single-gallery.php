<?php 

if(get_option("hades_enable_gheight")=="true")
$height = "height : ".get_option("hades_gheight");
else
$height = "height : 550";

if(get_option("hades_enable_gwidth")=="true")
$width = " , width : ".get_option("hades_gwidth");
else
$width = "";

if(get_option("hades_enable_gcrop")=="false")
$crop = " , imageCrop : false";
else
$crop = " , imageCrop : true";

if(get_option("hades_enable_gthumbnail_crop")=="false")
$thumb_crop = " , thumbCrop : false";
else
$thumb_crop = " , thumbCrop : true";

if(get_option("hades_enable_gpan")=="false")
$pan = " , imagePan : false";
else
$pan = " , imagePan : true";

if(get_option("hades_enable_gautoplay")=="true")
$auto = ", autoplay : ".get_option("hades_autoplay_duration");
else
$auto = ", autoplay : false";

$generate_query = $height.$width.$crop.$thumb_crop.$pan.$auto;


if(get_post_type()=="gallery")
	{
		
		wp_enqueue_script('galleria', URL . '/js/galleria-1.2.4.min.js', array('jquery'), '1.2.4' );
		wp_enqueue_script('galleria-theme', URL . '/js/classic/galleria.classic.min.js', array('jquery'), '1.2.4' );
        
		
		
		
		$smoothness = (!get_option("hades_enable_gpansmoothness")) ? ", imagePanSmoothness : 20" :  ", imagePanSmoothness : ".get_option("hades_enable_gpansmoothness");
		
		$generate_query = $height.$width.$crop.$thumb_crop.$pan.$auto;
		
		function galleria_init(){ global $generate_query; ?>
	   
		<script type="text/javascript">
		 jQuery(function($){
			 
			 
			 $('#galleria-gallery').galleria({ <?php echo $generate_query; ?> });
			 
				});
		</script>
	 
		 <?php	}
         add_action("wp_head","galleria_init");
			
		
		$custom = get_post_custom($post->ID);
        $gallery_column = $custom["gallery_column"][0];
		switch($gallery_column)
		{
			
			case "custom" :  include('page-gallery-custom-template.php'); break;
			case "flickr" :  include('page-gallery-flickr-template.php'); break;
			default : include('page-gallery-template.php'); break;
		}
		
		
		return;
	}
	
?>	
