<?php
$path = __FILE__;
$pathwp = explode( 'wp-content', $path );
$wp_url = $pathwp[0];

require_once( $wp_url.'/wp-load.php' );

$textures = array();



if(isset($_GET["download"]))
{
	$texture_link = $_GET["link"];
	
    $file_name = explode("/",$texture_link);
	$file_name = $file_name[count($file_name)-1];
	$path = TEMPLATEPATH."/sprites/textures/$file_name";
	$size = file_put_contents( $path , file_get_contents($texture_link));
	
	
}
$texture_files = glob(TEMPLATEPATH."/sprites/textures/*.*");

if(!is_array($texture_files))
$texture_files = array();

foreach ($texture_files as $filename) {
  $temp = explode(TEMPLATEPATH."/sprites/textures/",$filename);
    $textures[] = $temp[1];
}

?>



<div class="panel">



<?php 

 createHadesSelect(array( 
						  "name" => "Top bar's Texture",
						  "desc" => "select the texture for top.",
						  "id" => $shortname."_top_bg_texture",
						  "type" => "select",
						  "options" => $textures,
						  "std" => "texture.jpg" 
				  	 ));

createHadesColorpicker(array( 
						  "name" => " Top bar background color",
						  "desc" => "select the color for top.",
						  "id" => $shortname."_top_bg_color",
						  "type" => "colorpickerfield",
						  "std" => "434c5c" 
				  	 ));					 

createHadesSelect(array( 
						  "name" => "Slider's Background Texture",
						  "desc" => "select the texture for slider.",
						  "id" => $shortname."_header_texture",
						  "type" => "select",
						  "options" => $textures,
						  "std" => "texture.jpg" 
				  	 ));

createHadesColorpicker(array( 
						  "name" => " Slider's Background color",
						  "desc" => "select the color for slider.",
						  "id" => $shortname."_header_bg_color",
						  "type" => "colorpickerfield",
						  "std" => "434c5c" 
				  	 ));	
					 
					 
createHadesSelect(array( 
						  "name" => "Page Title Box's Background Texture",
						  "desc" => "select the texture for page intro action box.",
						  "id" => $shortname."_blurb_texture",
						  "type" => "select",
						  "options" => $textures,
						  "std" => "texture.png" 
				  	 ));

createHadesColorpicker(array( 
						  "name" => " Page Title Box's Background color",
						  "desc" => "select the color for slider.",
						  "id" => $shortname."_blurb_bg_color",
						  "type" => "colorpickerfield",
						  "std" => "434c5c" 
				  	 ));	
					 
createHadesSelect(array( 
						  "name" => "Footer's Background Texture",
						  "desc" => "select the texture for footer.",
						  "id" => $shortname."_footer_texture",
						  "type" => "select",
						  "options" => $textures,
						  "std" => "texture.png" 
				  	 ));					 					 

createHadesColorpicker(array( 
						  "name" => " Footer's Background color",
						  "desc" => "select the color for Footer.",
						  "id" => $shortname."_footer_bg_color",
						  "type" => "colorpickerfield",
						  "std" => "434c5c" 
				  	 ));	
					 					 
					 
					  ?>
  
  
       

<?php if($size>0) echo "<div class='hades_information'><p>Texture Download succesfully</p></div>"; ?>
 
 <div id="inline-texture" class="hide"> 
  
<div class="textures clearfix ">
<ul>
<?php

$data = wp_remote_get("http://wptitans.com/pool/wp-content/themes/pool/query_textures.php?theme=sneak&license=".get_option("hades_product_license"));

$arr = unserialize($data["body"]);

if($arr["invalid"]===true)
{
	echo "<li> Invalid Item Code, please enter again. </li>";
	
}
else {
foreach($arr as $texture) :
 ?>

<li> 

<img src="<?php echo $texture["preview_image"]; ?>" />
<a href="<?php echo get_admin_url(); ?>admin.php?page=elements.php&download=texture&link=<?php echo $texture["download_link"]; ?>" class="button"> Download </a>

</li>

<?php endforeach; } ?>
</ul>
</div>      
			
    </div>        
            		 
</div>

					 
					 