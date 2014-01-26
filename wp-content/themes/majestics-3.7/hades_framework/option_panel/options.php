<?php 

/* 

======================================================================================
------------------------------- Hades Option Panel -----------------------------------
======================================================================================

Version 1.0 
Current Elements - text, textarea, checkbox, toggle button, slider, color picker, drop down lists.
Sub Panel Activated - True
======================================================================================

*/
$cfonts = get_option("hades_custom_fonts",array());
$cufon_fonts = array("Acid","akaDora","Aller","Androgyne","Champagne__Limousines","Colaborate","Delicious","DistrictThin","Existence_Light","GeosansLight");

 
 if(is_array($cfonts))
	foreach($cfonts as $font)
	{
		$cufon_fonts[] = $font;
	}


$options = array (
 

  // ====================================== General Theme options [ Tab 1] ======================================

	array( 
		    "name" => "General",
	  	    "type" => "section"
		  ),
		  
	array( 
			"name" => $themename." Options",
			"type" => "information",
			"description" => "In this option panel your able to change the basic setting of Ambience. Just follow the info besides the functions and you will be ready in a snap."
		  ),
		  
	array( "type" => "open"), 
	
  // ======================================Sub Panel 1 Begins ======================================
               array(
						"name" => "&rarr; Top Contact Info Details" , 
						"type"=>"subtitle", 
						"id"=>"topdetails"
					  ), 
				
				
				array( 
						"name" => "FeedBurner Email ID",
						"desc" => "Add your Feedburner ID here.",
						"id" => $shortname."_top_feedburner_id",
						"type" => "text",
						"std" => "yourID"
					),
				
				array( 
						"name" => "Contact Number",
						"desc" => "Add your Contact number here.",
						"id" => $shortname."_top_contact_no",
						"type" => "text",
						"std" => "+91-941113222"
					),

	            array( 
						"name" => "Twitter Id",
						"desc" => "Add your twitter user name here.",
						"id" => $shortname."_top_twitter",
						"type" => "text",
						"std" => "@yourName"
					),

		       array( 
						"name" => "Facebook URL ",
						"desc" => "enter the http://facebook.com/<strong>yourDirectID</strong> link  .",
						"id" => $shortname."_top_fb",
						"type" => "text",
						"std" => "YouatFB"
					),	 
			
			  array( 
						"name" => "Enable/Disable Top Contact Widget",
						"desc" => "Enable/Disable Top Contact Widget",
						"id" => $shortname."_enable_top_widget",
						"type" => "toggle",					
						"std" => "true"
					  ),		 
					 
				array("type"=>"close_subtitle"),
				
					  
					  
				array(
						"name" => "&rarr; Basic" , 
						"type"=>"subtitle", 
						"id"=>"colorschemes"
					  ), 
			   
			 	array( 
						"name" => "Logo URL",
						"desc" => "Upload your logo. Please keep the dimensions 195x92. ",
						"id" => $shortname."_logo",
						"type" => "upload",
						"std" => URL."/images/logo.png"
					),
			
				
				array( 
						"name" => "Fav ICO",
						"desc" => "Upload your favicon.",
						"id" => $shortname."_favico",
						"type" => "upload",
						"std" => URL."/images/favico.ico"
					),	
					/*
			   array( 
						"name" => "Styles",
						"desc" => ".",
						"id" => $shortname."_stylesheet",
						"type" => "select",
						"options" => array("style.css","style1.css", "style2.css", "style3.css", "style4.css", "style5.css", "style6.css", "style7.css", "style8.css", "style9.css", "style10.css", "style11.css", "style12.css", "style13.css", "style14.css", "style15.css", "style16.css", "style17.css", "style18.css", "style19.css", "style20.css"),
						"std" => "style.css"
					  ),
					  */
					   
			 	array( 
						"name" => "Feedburner URL",
						"desc" => "Add the url from your FeedBurner account in here.",
						"id" => $shortname."_feedburner",
						"type" => "text",
						"std" => "http://feeds.feedburner.com/yourID"
					),
					
				array( 
						"name" => "FeedBurner Email URL",
						"desc" => "Add the url from your FeedBurners email subscription settings in here so visitors can subscribe to your site.",
						"id" => $shortname."_feedburner_email",
						"type" => "text",
						"std" => "http://feedburner.google.com/fb/a/mailverify?uri=yourID"
					),
					
				
				  array( "name" => "Google API Key",
					"desc" => "Required for the Smart Sense url shortener to work. For more details <a href='http://code.google.com/apis/loader/signup.html'>visit</a> Google for more info about there API",
					"id" => $shortname."_api_key",
					"type" => "text",
					"std" =>  "" ),		
					
				  array( "name" => "ReCaptacha Public Key",
					"desc" => "Required for the captcha to work, get your key from <a href='http://www.google.com/recaptcha/whyrecaptcha'>here</a>",
					"id" => $shortname."_captcha_public_key",
					"type" => "text",
					"std" =>  "" ),		
				
				   array( "name" => "ReCaptacha Private Key",
					"desc" => "Required for the captcha to work, get your key from <a href='http://www.google.com/recaptcha/whyrecaptcha'>here</a>",
					"id" => $shortname."_captcha_private_key",
					"type" => "text",
					"std" =>  "" ),				
				
			
					
					
					  
							
				array("type"=>"close_subtitle"),
				
 // ================================ End of Sub panel ==============================================
 
  // ======================================Sub Panel 2 Begins ======================================				
				array(
						"name" => "&rarr; Footer" , 
						"type"=>"subtitle" , 
						"id"=>"subfooter"
						),	
				
					
	
				array( 
						"name" => "Google Analytics Code",
						"desc" => "Add your Google Analytics code in here, it will be added at bottom of body tag, do not include &lt;script tags.",
						"id" => $shortname."_ga",
						"type" => "textarea",
						"std" => ""
						),		
                array( 
						"name" => "Bottom footer text",
						"desc" => "This text will appear at the bottom of the footer",
						"id" => $shortname."_footer_bottom_text",
						"type" => "text",
						"std" => ""
					),
				array("type"=>"close_subtitle"),
              
			  
			  
			  array(
						"name" => "&rarr; 404 Not Found" , 
						"type"=>"subtitle" , 
						"id"=>"notfound"
						),	
				
					array( 
						"name" => "404 page title here",
						"desc" => "Add your 404 text here.",
						"id" => $shortname."_notfound_title",
						"type" => "text",
						"std" => ""
						),		
					
					array( 
						"name" => "404 image URL",
						"desc" => "Upload your 404 image.  ",
						"id" => $shortname."_notfound_logo",
						"type" => "upload",
						"std" => URL."/images/notfound.png"
					),	
				
	
				array( 
						"name" => "404 page text here",
						"desc" => "Add your 404 text here.",
						"id" => $shortname."_notfound_text",
						"type" => "textarea",
						"std" => ""
						),		
                
				array("type"=>"close_subtitle"),
				
				
            array(
						"name" => "&rarr; Call to Action" , 
						"type"=>"subtitle" , 
						"id"=>"notfound"
						),	
				
				  array( 
						"name" => "Enable/Disable Call to Action",
						"desc" => "Enable/Disable Call to Action",
						"id" => $shortname."_enable_blurb",
						"type" => "toggle",					
						"std" => "true"
					  ),
				
					  	  
					  
					array( 
						"name" => "Text",
						"desc" => "Add your  text here.",
						"id" => $shortname."_blurb_text",
						"type" => "textarea",
						"std" => ""
						),		
					
					array( 
						"name" => "Button Link",
						"desc" => "add your link here.",
						"id" => $shortname."_blurb_link",
						"type" => "text",
						"std" => ""
					),	
				
		            array( 
						"name" => "Button Label",
						"desc" => "add your label here.",
						"id" => $shortname."_blurb_label",
						"type" => "text",
						"std" => ""
					),
					
				
			
                
				array("type"=>"close_subtitle"),
		  
		      	  
 // ================================ End of Sub panel ==============================================	
	array( "type" => "close"),


  // ======================================Tab 2 Begins ======================================			
 
 	array( 
			"name" => "Homepage",
			"type" => "section"
		  ),
		  
	array( 
			"name" => $themename." Options",
			"type" => "information",
			"description" => "In this option panel your able to change the slider settings of Ambience. Some cool options to chose from here and especially the Picemaker2 Slider is a cool addition."
		  ),
	
	array( "type" => "open"),
	
	array(
							"name" => "&rarr; Home Page Top Columns" , 
							"type"=>"subtitle", 
							"id"=>"homesliders"
						), // Sub section 1 Title	
				
				  array( 
						"name" => "Top Columns Title",
						"desc" => "This title will appear on top of 4 columns",
						"id" => $shortname."_top_title",
						"type" => "text",
						"std" => ""
					),
					
				   array( 
						"name" => "Column 1 Title",
						"desc" => "This title will appear in column 1",
						"id" => $shortname."_column1_title",
						"type" => "text",
						"std" => ""
					),
					
					  array( 
						"name" => "Column 1 Text",
						"desc" => "This text will appear in column 1",
						"id" => $shortname."_column1_text",
						"type" => "textarea",
						"std" => ""
					),
					
					  array( 
						"name" => "Column 1 Button Label",
						"desc" => "This label will appear in column 1",
						"id" => $shortname."_column1_label",
						"type" => "text",
						"std" => ""
					),
					
					  array( 
						"name" => "Column 1 Link",
						"desc" => "This link will appear in column 1",
						"id" => $shortname."_column1_link",
						"type" => "text",
						"std" => ""
					),
					
					
					
					  array( 
						"name" => "Column 2 Title",
						"desc" => "This title will appear in column 2",
						"id" => $shortname."_column2_title",
						"type" => "text",
						"std" => ""
					),
					
					  array( 
						"name" => "Column 2 Text",
						"desc" => "This text will appear in column 2",
						"id" => $shortname."_column2_text",
						"type" => "textarea",
						"std" => ""
					),
					
					  array( 
						"name" => "Column 2 Button Label",
						"desc" => "This label will appear in column 2",
						"id" => $shortname."_column2_label",
						"type" => "text",
						"std" => ""
					),
					
					  array( 
						"name" => "Column 2 Link",
						"desc" => "This link will appear in column 2",
						"id" => $shortname."_column2_link",
						"type" => "text",
						"std" => ""
					),
					
					
					
					  array( 
						"name" => "Column 3 Title",
						"desc" => "This title will appear in column 3",
						"id" => $shortname."_column3_title",
						"type" => "text",
						"std" => ""
					),
					
					  array( 
						"name" => "Column 3 Text",
						"desc" => "This text will appear in column 3",
						"id" => $shortname."_column3_text",
						"type" => "textarea",
						"std" => ""
					),
					
					  array( 
						"name" => "Column 3 Button Label",
						"desc" => "This label will appear in column 3",
						"id" => $shortname."_column3_label",
						"type" => "text",
						"std" => ""
					),
					
					  array( 
						"name" => "Column 3 Link",
						"desc" => "This link will appear in column 3",
						"id" => $shortname."_column3_link",
						"type" => "text",
						"std" => ""
					),
					
					
					
					
					  array( 
						"name" => "Column 4 Title",
						"desc" => "This title will appear in column 4",
						"id" => $shortname."_column4_title",
						"type" => "text",
						"std" => ""
					),
					
					  array( 
						"name" => "Column 4 Text",
						"desc" => "This text will appear in column 4",
						"id" => $shortname."_column4_text",
						"type" => "textarea",
						"std" => ""
					),
					
					  array( 
						"name" => "Column 4 Button Label",
						"desc" => "This label will appear in column 4",
						"id" => $shortname."_column4_label",
						"type" => "text",
						"std" => ""
					),
					
					  array( 
						"name" => "Column 4 Link",
						"desc" => "This link will appear in column 4",
						"id" => $shortname."_column4_link",
						"type" => "text",
						"std" => ""
					),
					
					
					
					
				array("type"=>"close_subtitle"),	
				
				array(
							"name" => "&rarr; Slider" , 
							"type"=>"subtitle", 
							"id"=>"homesliders"
						), // Sub section 1 Title	
				
				array( 
						"name" => "Auto play",
						"desc" => "Want to auto play or not then you can select it here.",
						"id" => $shortname."_auto_feature_slider",
						"type" => "toggle",
						"std" => "true"
					  ),
					  
				array( 
						"name" => "Enable Slider",
						"desc" => "Want a homepage without a slider then disable it here.",
						"id" => $shortname."_enable_feature_slider",
						"type" => "toggle",
						"std" => "true"
					  ),
					  				
				array( "name" => "Slider Type",
					"desc" => "Select the slider type between a html5 slider with 7 effects, jQuery with more then 35 effect and the piecemaker2 slider.",
					"id" => $shortname."_feature_slider",
					"type" => "select",
					"options" => array("Feature Slider","Nivo Slider","3D Slider","Accordion","HTML 5 slider","jQuery Slider","Fade","Cubes Grow","Strips alternate","Strips fade","Strips half fade","Red Channel(html5)","Green Channel(html5)","Overlay","Color burn"),
					"std" => "Feature Slider"),
				
				array( "name" => "Slider Duration",
					"desc" => "Set the time in between the effects.",
					"id" => $shortname."_feature_slider_duration",
					"type" => "text",
					"std" => "3000"),
					
				array("type"=>"close_subtitle"),	
	// ================================ End of Sub panel ==============================================			
		
	

	array( "type" => "close"),
	
	// ======================================End of Sub Panel ======================================		

 // ====================================== Tab 3 begins ======================================		
 
 
	 array( "name" => "Blog",
			"type" => "section"),
			array( "name" => $themename."blog",
			"type" => "information",
			"description" => "Enable or Disable social setting, author bio and edit your related posts here."
			),
	array( "type" => "open"),
		array("name" => "&rarr; Posts" , "type"=>"subtitle", "id"=>"postsettings"), // Sub section 1 Title	
	

					  	
	array( 
						"name" => "Show Author BIO",
						"desc" => "Don't you need an Author Bio then just disbale it here.",
						"id" => $shortname."_author_bio",
						"type" => "toggle",
						"std" => "true"
					  ),
					
	array( 
						"name" => "Show Related Posts",
						"desc" => "Want to show your related posts? Then enable them here.",
						"id" => $shortname."_popular",
						"type" => "toggle",
						"std" => "true"
					  ),
					  
	array( 				"name" => "No of posts to be displayed",
						"desc" => "The related post section is using a scroller so you ad as many as you want.",
						"id" => $shortname."_popular_no",
						"type" => "text",
						"std" => "4"),
					
	array( 
						"name" => "Enable AddThis Social Set",
						"desc" => "Enable or disable the retweet button below the post.",
						"id" => $shortname."_social_set",
						"type" => "toggle",
						"std" => "true"
					  ),
	 array( 
						"name" => "Set AddThis Icon Style",
						"desc" => "In here you can decide which icon style you want.",
						"id" => $shortname."_social_set_style",
						"type" => "select",
						"std" => "Google Webfonts",
						"options" => array( "Style 1","Style 2","Style 3","Style 4","Style 5","Style 6","Style 7","Style 8" )
					  ),
	
					  								  	
	  array("type"=>"close_subtitle"),
	    array(
						"name" => "&rarr; Social Links" , 
						"type"=>"subtitle", 
						"id"=>"sociallinks"
					  ),
				array( 
						"name" => "Twitter Profile ID",
						"desc" => "Add your twitter profile name to enable tweet button, this is for all twitter related stuff inside the Widgets and SmartSense.",
						"id" => $shortname."_twitter_id",
						"type" => "text",
						"std" => ""
						),	
				array( 
						"name" => "Facebook Fan Page Link",
						"desc" => "Add your Facebook page URL name to enable facebook like, this is for all facebook related stuff inside the Widgets and SmartSense.",
						"id" => $shortname."_fb_id",
						"type" => "text",
						"std" => ""
						),				
               
					  
				array("type"=>"close_subtitle"),
	  
	    		  
	array( "type" => "close"),
	
   
	 // ====================================== Tab  begins ======================================	
	 array( "name" => "Typography",
			"type" => "section"),
			array( "name" => $themename." theme",
			"type" => "information",
			"description" => "This panel contains the settings of heading and body font sizes and other typography related settings."
			),
	     array( "type" => "open"),
	    
	            array(
						"name" => "&rarr; Font Settings & Color" , 
						"type"=>"subtitle", 
						"id"=>"fontfamily"
					  ), 
	            
	array(
						"name" => "Typography Panel File", 
						"type"=>"include", 
						"std"=> HPATH."/option_panel/adv_mods/typo.php"
					  ),			
						
	 array( 
						"name" => "H1 Font size",
						"desc" => "Select the h1 font size used all over the site.",
						"id" => $shortname."_h1",
						"type" => "slider",
						"std" => "28",
						"max" => 108,
						"suffix" => "px"
								),					
							
			
			 array( 
					"name" => "H2 Font size",
					"desc" => "Select the h2 font size used all over the site.",
					"id" => $shortname."_h2",
					"type" => "slider",
					"std" => "32",
					"max" => 26,
					"suffix" => "px"
							),					
							
			 array( 
					"name" => "H3 Font size",
					"desc" => "Select the h3 font size used all over the site.",
					"id" => $shortname."_h3",
					"type" => "slider",
					"std" => "24",
					"max" => 108,
					"suffix" => "px"
							),					
			 array( 
					"name" => "H4 Font size",
					"desc" => "Select the h1 font size used all over the site.",
					"id" => $shortname."_h4",
					"type" => "slider",
					"std" => "18",
					"max" => 108,
					"suffix" => "px"
							),					
																				
			 array( 
					"name" => "H5 Font size",
					"desc" => "Select the h5 font size used all over the site.",
					"id" => $shortname."_h5",
					"type" => "slider",
					"std" => "12",
					"max" => 108,
					"suffix" => "px"
							),					
										
			 array( 
					"name" => "H6 Font size",
					"desc" => "Select the h6 font size used all over the site.",
					"id" => $shortname."_h6",
					"type" => "slider",
					"std" => "10",
					"max" => 108,
					"suffix" => "px"
							),
			
			 array( 
					"name" => "Sidebar Title Font size",
					"desc" => "Select the sidebar title font size used all over sidebars.",
					"id" => $shortname."_sidebar_title",
					"type" => "slider",
					"std" => "20",
					"max" => 108,
					"suffix" => "px"
							),
																				
			 array( 
					"name" => "Footer Title Font size",
					"desc" => "Select the footer title font size used in the footer widgets.",
					"id" => $shortname."_footer_title",
					"type" => "slider",
					"std" => "20",
					"max" => 108,
					"suffix" => "px"
							),
									
								
								
	array("type"=>"close_subtitle"),	
		
	
					  			
	array( "type" => "close"),
	
	 // ====================================== Tab  begins ======================================	
	 array( "name" => "Media",
			"type" => "section"),
			array( "name" => $themename." theme",
			"type" => "information",
			"description" => "This tab contains the settings for image related effects. And the Flickr API and Username also has to be filed in here for the Gallery."
			),
	    array( "type" => "open"),
	    
		
	      
			
			 array(
						"name" => "&rarr; Portfolio" , 
						"type"=>"subtitle", 
						"id"=>"portfolio"
					  ), 
		   	   	   
				   
			
			array("name"=>"Portfolio 1 Column Items Limit",
			      "desc"=>"set your items per page limit here",
				   "id" => $shortname."_portfolio1_item_limit",
				   "type"=>"slider",
				   "max"=>50,
				   "std"=>6,
				   "suffix"=>"Items"),
			
			array("name"=>"Portfolio 2 Column Items Limit",
			      "desc"=>"set your items per page limit here",
				   "id" => $shortname."_portfolio2_item_limit",
				   "type"=>"slider",
				   "max"=>50,
				   "std"=>6,
				   "suffix"=>"Items"),
			
			array("name"=>"Portfolio 3 Column Items Limit",
			      "desc"=>"set your items per page limit here",
				   "id" => $shortname."_portfolio3_item_limit",
				   "type"=>"slider",
				   "max"=>50,
				   "std"=>6,
				   "suffix"=>"Items"),
			
			array("name"=>"Portfolio 4 Column Items Limit",
			      "desc"=>"set your items per page limit here",
				   "id" => $shortname."_portfolio4_item_limit",
				   "type"=>"slider",
				   "max"=>50,
				   "std"=>6,
				   "suffix"=>"Items"),	   	
				      	   
			array("name"=>"Video Portfolio Items Limit",
			      "desc"=>"set your items per page limit here",
				   "id" => $shortname."_video_item_limit",
				   "type"=>"slider",
				   "max"=>50,
				   "std"=>6,
				   "suffix"=>"Items"),
				   	   
			
			array("name"=>"Portfolio 1 Column Words Limit",
			      "desc"=>"set your word limit here",
				   "id" => $shortname."_portfolio1_limit",
				   "type"=>"slider",
				   "max"=>1000,
				   "std"=>250,
				   "suffix"=>"letters"),
				   
			array("name"=>"Portfolio 2 Column Words Limit",
			      "desc"=>"set your word limit here",
				   "id" => $shortname."_portfolio2_limit",
				   "type"=>"slider",
				   "max"=>1000,
				   "std"=>200,
				   "suffix"=>"letters"),
				   
			array("name"=>"Portfolio 3 Column Words Limit",
			      "desc"=>"set your word limit here",
				   "id" => $shortname."_portfolio3_limit",
				   "type"=>"slider",
				   "max"=>1000,
				   "std"=>170,
				   "suffix"=>"letters"),
				   
			array("name"=>"Portfolio 4 Column Words Limit",
			      "desc"=>"set your word limit here",
				   "id" => $shortname."_portfolio4_limit",
				   "type"=>"slider",
				   "max"=>1000,
				   "std"=>150,
				   "suffix"=>"letters"),	
				   
		   		array("name"=>"Video Portfolio Column Words Limit",
			      "desc"=>"set your word limit here",
				   "id" => $shortname."_video_limit",
				   "type"=>"slider",
				   "max"=>1000,
				   "std"=>50,
				   "suffix"=>"letters"),	   
				   	   		  
			array("type"=>"close_subtitle"),
					  	  	 
  // ======================================Sub Panel 2 Begins ======================================				
				array(
						"name" => "&rarr; Flickr API" , 
						"type"=>"subtitle" , 
						"id"=>"flickrapi"
						),	      
				
				array(
				  		"name" => "Flickr API Key",
				  		"desc" => "Enter your Flickr Key, to get yours visit <a target='_blank' href='http://www.flickr.com/services/api/misc.api_keys.html'> this page </a>.",
				  		"id" => $shortname."_flickr_key",
				  		"type"=> "text"
						), 
				array(
				  		"name" => "Flickr Account Name",
				  		"desc" => " Enter your Flickr account name in here.",
				  		"id" => $shortname."_flickr_name",
				 	 	"type"=> "text"
						), 
					  
			array("type"=>"close_subtitle"),
			
		
		array(
						"name" => "&rarr; Gallery Options" , 
						"type"=>"subtitle" , 
						"id"=>"galleria"
						),	      
			
			
			array( 
					  "name" => "Enable/Disable Autoplay",
					  "desc" => "Enable or disable autoplay.",
					  "id" => $shortname."_enable_gautoplay",
					  "type" => "toggle",
					  "std" => "false"
					),
					
			array( 
					  "name" => "Auto play duration",
					  "desc" => "set the duration of slide changing.",
					  "id" => $shortname."_autoplay_duration",
					  "type" => "slider",
					  "max"=>60000,
					  "std" => "5000",
					  "suffix"=> " milli seconds"
					),	
							
				
			array( 
					  "name" => "Enable/Disable Global Height",
					  "desc" => "Enable or disable fix height for all galleries.",
					  "id" => $shortname."_enable_gheight",
					  "type" => "toggle",
					  "std" => "false"
					),
			
			array( 
					  "name" => "Enable/Disable Global Width",
					  "desc" => "Enable or disable fix width for all galleries.",
					  "id" => $shortname."_enable_gwidth",
					  "type" => "toggle",
					  "std" => "false"
					),
					
			array(
				  		"name" => "Enter Gallery Height",
				  		"desc" => "Enter the gallery height.",
				  		"id" => $shortname."_gheight",
				  		"type"=> "text"
						), 		
			
			array(
				  		"name" => "Enter Gallery Width",
				  		"desc" => "Enter the gallery Width.",
				  		"id" => $shortname."_gwidth",
				  		"type"=> "text"
						), 		
						
			array( 
					  "name" => "Enable/Disable Image crop",
					  "desc" => "Enable or disable image cropping.",
					  "id" => $shortname."_enable_gcrop",
					  "type" => "toggle",
					  "std" => "true"
					),							
			
			array( 
					  "name" => "Enable/Disable Thumbnail crop",
					  "desc" => "Enable or disable thumbnail cropping.",
					  "id" => $shortname."_enable_gthumbnail_crop",
					  "type" => "toggle",
					  "std" => "false"
					),	
					
				array( 
					  "name" => "Enable/Disable Image pan",
					  "desc" => "Enable or disable image paning.",
					  "id" => $shortname."_enable_gpan",
					  "type" => "toggle",
					  "std" => "true"
					),		
			
			array( 
					  "name" => "Set Pan smoothness",
					  "desc" => "Note the higher the value more it will consume CPU.",
					  "id" => $shortname."_enable_gpansmoothness",
					  "type" => "slider",
					  "max"=>1000,
					  "std" => "12",
					  "suffix"=> ""
					),
					
							  
			array("type"=>"close_subtitle"),			
					  			
		array( "type" => "close"),
	
	 // ====================================== Tab  begins ======================================	
	
	 array( "name" => "Visual",
			"type" => "section"),
			array( "name" => $themename." theme",
			"type" => "information",
			"description" => "This panel contains the settings for theme's background and color."
			),
	    array( "type" => "open"),
	    
	            array(
						"name" => "Texture and Background Visuals " , 
						"type"=>"subtitle", 
						"id"=>"headervisual"
					  ), 
	       
		    array(
						"name" => "Texture Pool", 
						"type"=>"include", 
						"std"=> HPATH."/option_panel/adv_mods/texture_pool.php"
					  ),	
					 
			array("type"=>"close_subtitle"),	
			array(
						"name" => "Top Menu Visuals " , 
						"type"=>"subtitle", 
						"id"=>"headervisual"
					  ), 
					  
			array( 
						  "name" => "Top Menu Links Color",
						  "desc" => "Select the color for the top menu links.",
						  "id" => $shortname."_top_menu_links_color",
						  "type" => "colorpickerfield",
						  "std" => "a4aec0" 
				  	 ),
			
			array( 
						  "name" => "Top Menu Links Hover Color",
						  "desc" => "Select the hover color for the top menu links.",
						  "id" => $shortname."_top_menu_links_color_hover",
						  "type" => "colorpickerfield",
						  "std" => "ffffff" 
				  	 ),
			
			array("type"=>"close_subtitle"),	
			array(
						"name" => "Main Menu & Slider Visuals" , 
						"type"=>"subtitle", 
						"id"=>"mainmenu"
					  ), 
			array( 
						  "name" => "Main Menu links color",
						  "desc" => "Select the color for the main menu links.",
						  "id" => $shortname."_menu_links_color",
						  "type" => "colorpickerfield",
						  "std" => "818792" 
				  	 ),
			
			array( 
						  "name" => "Main Menu links hover color",
						  "desc" => "Select the hover color for the main menu links.",
						  "id" => $shortname."_menu_links_color_hover",
						  "type" => "colorpickerfield",
						  "std" => "ffffff" 
				  	 ),
					 	 
			
			array( 
						  "name" => "Main Menu Active Link Color",
						  "desc" => "Select the active color state for the main menu links.",
						  "id" => $shortname."_menu_active_color",
						  "type" => "colorpickerfield",
						  "std" => "ffffff" 
				  	 ),
			
			
			array( 
						  "name" => "Main Menu Button Hover Color",
						  "desc" => "Select the background color for top menu links on hover.",
						  "id" => $shortname."_menu_links_bg_color_hover",
						  "type" => "colorpickerfield",
						  "std" => "262e37" 
				  	 ),
					 	 
			
			array( 
						  "name" => "Main Menu Button Active Color",
						  "desc" => "Select the background color for top menu active.",
						  "id" => $shortname."_menu_active_bg_color",
						  "type" => "colorpickerfield",
						  "std" => "262e37" 
				  	 ),		 					 		 	  		  		  		 					 		 	  		  		  
			
			array( 
						  "name" => "Main Menu Button Hover Border Color",
						  "desc" => "Select the background color for top menu links on hover.",
						  "id" => $shortname."_menu_links_border_color_hover",
						  "type" => "colorpickerfield",
						  "std" => "111111" 
				  	 ),
					 	 
			
			array( 
						  "name" => "Main Menu Active Border Color",
						  "desc" => "Select the background color for top menu active.",
						  "id" => $shortname."_menu_active_border_color",
						  "type" => "colorpickerfield",
						  "std" => "111111" 
				  	 ),	
			
			
					  
			array( 
						  "name" => "Slider Button Background color",
						  "desc" => "Select the background color for top menu active.",
						  "id" => $shortname."_slider_bg_color",
						  "type" => "colorpickerfield",
						  "std" => "eeeeee" 
				  	 ),	
		
		array("type"=>"close_subtitle"),	
			array(
						"name" => "Body Visuals" , 
						"type"=>"subtitle", 
						"id"=>"body"
					  ),
					  	
		 array( 
						  "name" => "Body Link Color",
						  "desc" => "Select the general body link color.",
						  "id" => $shortname."_body_a_color",
						  "type" => "colorpickerfield",
						  "std" => "111111" 
				  	 ),	
		 array( 
						  "name" => "Body Link Hover Color",
						  "desc" => "Select the general body hover link color.",
						  "id" => $shortname."_body_a_hover_color",
						  "type" => "colorpickerfield",
						  "std" => "555555" 
				  	 ),		
		 
		
		array("type"=>"close_subtitle"),	
			array(
						"name" => "Footer Visuals" , 
						"type"=>"subtitle", 
						"id"=>"footervisual"
					  ),
					  
		 array( 
						  "name" => "Footer Text Color",
						  "desc" => "Select the footer text color.",
						  "id" => $shortname."_body_footer_color",
						  "type" => "colorpickerfield",
						  "std" => "ffffff" 
				  	 ),		
		 
		  array( 
						  "name" => "Footer Link Color",
						  "desc" => "Select the footer linkcolor.",
						  "id" => $shortname."_footer_link_color",
						  "type" => "colorpickerfield",
						  "std" => "b5c1db" 
				  	 ),	
					 
			 array( 
						  "name" => "Footer Link Hover Color",
						  "desc" => "Select the footer color.",
						  "id" => $shortname."_footer_link_hover_color",
						  "type" => "colorpickerfield",
						  "std" => "ffffff" 
				  	 ),	
			
			 array( 
						  "name" => "Footer Widget Button Background Color",
						  "desc" => "Select the footer widgets button background color.",
						  "id" => $shortname."_footer_button_bg_color",
						  "type" => "colorpickerfield",
						  "std" => "eeeeee" 
				  	 ),			 
		 	
			 array( 
						  "name" => "Footer Menu Button Hover Background Color",
						  "desc" => "Select the footer button menu background color.",
						  "id" => $shortname."_footer_menu_bg_color",
						  "type" => "colorpickerfield",
						  "std" => "262e37" 
				  	 ),			 	
			
			 array( 
						  "name" => "Footer Menu Button Hover Border Color",
						  "desc" => "Select the footer menu button border color.",
						  "id" => $shortname."_footer_menu_border_color",
						  "type" => "colorpickerfield",
						  "std" => "111111" 
				  	 ),
			
			array( 
						  "name" => "Footer Button Menu Link Hover Color",
						  "desc" => "Select the footer menu  color.",
						  "id" => $shortname."_footer_menu_color",
						  "type" => "colorpickerfield",
						  "std" => "ffffff" 
				  	 ),
					 		 					 		 
		 			 		 		  
	array("type"=>"close_subtitle"),	
	
					  			
	array( "type" => "close"),
	 array( "name" => "Plus",
			"type" => "section"),
			array( "name" => $themename." theme",
			"type" => "information",
			"description" => "Super cool features of Hades Plus Framework with Smart Sense."
			),
	    array( "type" => "open"),
	    
		
	      /*
			
			 array(
						"name" => "&rarr; Updates" , 
						"type"=>"subtitle", 
						"id"=>"updates"
					  ), 
		   	   	   
				   
			
				array(
						"name" => "Typography Panel File", 
						"type"=>"include", 
						"std"=> HPATH."/option_panel/adv_mods/query_update.php"
					  ),	
		   	   
				   	   		  
			array("type"=>"close_subtitle"),	
		*/
		
			 array(
						"name" => "&rarr; Enchancements" , 
						"type"=>"subtitle", 
						"id"=>"enchancements"
					  ),
			
			array( 
					  "name" => "Enable/Disable Smart Scroll",
					  "desc" => "Enable or disable the smart scroll.",
					  "id" => $shortname."_smartscroll",
					  "type" => "toggle",
					  "std" => "false"
					),
			
				array( 
					  "name" => "Item Purchase Code",
					  "desc" => "add your license here to enjoy more benefits and direct updates !",
					  "id" => $shortname."_product_license",
					  "type" => "text",
					  "std" => ""
					),
					
					  
			array("type"=>"close_subtitle"),
			
			
			 array(
						"name" => "&rarr; Import / Export Settings" , 
						"type"=>"subtitle", 
						"id"=>"importexport"
					  ),

			array(
						"name" => "Import", 
						"type"=>"include", 
						"std"=> HPATH."/option_panel/adv_mods/ex.php"
					  ),			
					  
			array("type"=>"close_subtitle"),
					 
					  					  			
	array( "type" => "close"),
	
	
	
);

