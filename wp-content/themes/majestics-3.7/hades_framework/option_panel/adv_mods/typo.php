<?php 
$path = __FILE__;
$pathwp = explode( 'wp-content', $path );
$wp_url = $pathwp[0];

require_once( $wp_url.'/wp-load.php' );

$google_webfonts =  array("Aclonica","Allan","Allerta","Allerta Stencil","Amaranth","Anonymous Pro","Anton","Arimo","Artifika","Arvo","Bentham","Bevan","Brawler","Buda","Cabin","Cardo","Cousine","Cabin","Copse","Crimson Text","Cuprum","Cantarell","Dancing Script","Damion","Droid Serif","Droid Sans Mono","Droid Sans","Francois One","Kreon","Gruppo","Inconsolata","Lobster","Lobster Two","Josefin Slab","Josefin Sans","Maiden Orange","Maven Pro","Merriweather","News Cycle","Nova Round","Nova Script","Nova Slim","Open Sans Condensed","Oswald","PT Sans Narrow","PT Sans","PT Sans Narrow","PT Serif","Pacifico","Philosopher","Rosario","Shanti","Tangerine","Terminal Dosis Light","Tenor Sans","Tienne","Tinos","Ubuntu","Yanone Kaffeesatz","Yellowtail");

 $gf = array( 
					    "name" => "Google Web Font",
						"desc" => "When you've decided to go for Google Web Fonts then you need to select your font for the headings here.",
						"id" => $shortname."_gcustom_font",
						"type" => "select",
						"options" =>  $google_webfonts,
						"std" => "Droid Sans"
								);



$body_font_lists_safe = array("Arial","Georgia","Lucida Sans","Lucida Grande","Verdana","Helvetica","Tahoma");
$body_font_lists = array_merge($body_font_lists_safe,$google_webfonts);

$body_font =   array( 
						"name" => "Body Font",
						"desc" => "Select the main font used all over the site.",
						"id" => $shortname."_body_font",
						"type" => "select",
						"options" => $body_font_lists,
						"std" => "Droid Sans"
								);



$cfonts = get_option("hades_custom_fonts",array());
$cufon_fonts = array("Acid","akaDora","Aller","Androgyne","Champagne__Limousines","Colaborate","Delicious","DistrictThin","Existence_Light","GeosansLight");

 
 if(is_array($cfonts))
	foreach($cfonts as $font)
	{
		$cufon_fonts[] = $font;
	}

 								
 
?>

<div class="panel">
<script type="text/javascript">
jQuery(function($){
	
	var source = $("#gfont-frame").attr("src");

	$("#hades_body_font-menu li a").click(function(){
		
		var font = jQuery.trim($("#hades_body_font-button").find(".custom-select-status").html());
		$("#gfont-frame").attr("src",source+font+"&fontsize="+$("#hades_bd_size").val());
	
		});
	
	
	
	
	$("#hades_custom_font-menu li a").click(function(){
		
		var font = jQuery.trim($("#hades_custom_font-button").find(".custom-select-status").html());
		$("#tfont-frame").attr("src",source+font+"&fontsize=18");
	
		});
	
	$("#hades_cufon_font-menu li a").click(function(){
		
		var font = jQuery.trim($("#hades_cufon_font-button").find(".custom-select-status").html());
		$("#tfont-frame").attr("src",source+font+"&fontsize=18&cufon=true&path=<?php echo get_template_directory_uri()?>/js");
	
		});
				
	$("#hades_custom_g_font").focusout(function(){
		
		var font = jQuery.trim($(this).val());
		$("#tfont-frame").attr("src",source+font+"&fontsize=18");
	
		});
	
	
	$("#hades_bd_size").parent().find(".hades_slider").bind( "slidechange", function(event, ui) {
       $("#gfont-frame").contents().find("#inject-font").css("font-size",ui.value); });
		
});

</script>

<div class="preview-font">
  <iframe id="gfont-frame" src="<?php echo HURL; ?>/option_panel/adv_mods/gfont_input.php?font=" width="100%" height="130">
 
  </iframe>
 </div>
 
<?php  createHadesSelect($body_font); 
       createHadesSlider( array( 
						"name" => "Body Font size",
						"desc" => "Select the body font size used all over the site.",
						"id" => $shortname."_bd_size",
						"type" => "slider",
						"std" => "12",
						"max" => 18,
						"suffix" => "px"
								)); 
	 						
								?>

 
 
 <?php 
 
   createHadesSelect(  array( 
						"name" => "Google Web font or Cufon Font",
						"desc" => "In here your able to switch between Google Fonts and Cufon Fonts. Be aware that this option is only made for titles and such. Body font is managed by google web font or websafe fonts",
						"id" => $shortname."_toggle_custom_font",
						"type" => "select",
						"std" => "Google Webfonts",
						"options" => array( "Google Webfonts","Cufon","None" )
					  ));	
					  
	createHadesSelect(  array( 
						"name" => "Cufon Font",
						"desc" => "When you've decided to go for Cufon Fonts then you need to select your font for the headings here.<strong>Note this is for titles only, if you want to use this font in your tags add class 'custom-font'.</strong>",
						"id" => $shortname."_cufon_font",
						"type" => "select",
						"options" =>  $cufon_fonts,
						"std" => "Androgyne"
								));					  
					  
	createHadesSelect( array( 
					    "name" => "Google Web Font",
						"desc" => "When you've decided to go for Google Web Fonts then you need to select your font for the headings here.",
						"id" => $shortname."_custom_font",
						"type" => "select",
						"options" =>  $google_webfonts,
						"std" => "Droid"
								)); 			   
 
   
   createHadesToggle( array( 
						"name" => "Custom Google Web Font On/Off",
						"desc" => "Don't like the fonts we've selected and want to use a different one then activate this option and enter the name of the font below",
						"id" => $shortname."_custom_g_font_enable",
						"type" => "toggle",
						"std" => "false"
					  )); 	
					  
 ?>
 
   <div class="preview-font">
  <iframe id="tfont-frame" src="<?php echo HURL; ?>/option_panel/adv_mods/gfont_input.php?font=" width="100%" height="130">
 
  </iframe>
 </div>
 
 <?php					  
					  
	createHadesTextbox(  array( 
						"name" => "Enter font name for Titles",
						"desc" => "you can select the fonts from <a href='http://www.google.com/webfonts'>here</a> , just enter the name of the font.",
						"id" => $shortname."_custom_g_font",
						"type" => "text",
						"std" => "",
								)); 								
 
 
 ?>

 

</div>