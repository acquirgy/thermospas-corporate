<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

    <head>

        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />

        

        <title><?php wp_title('');

	    

		$logo = (get_option("hades_logo") == "") ? URL.'/sprites/i/logo.png' : get_option("hades_logo");

		$favico =  (get_option("hades_favico") == "") ? URL.'/images/favicon.ico' : get_option("hades_favico");

		

					  /*if(is_home()) {

					        echo bloginfo(__('name') , 'h-framework' );

					  } elseif(is_category()) {

					         _e('Browsing the Category ' , 'h-framework' );

					          wp_title(' ', true, '');

					  } elseif(is_archive()){

					       

					        wp_title(__(' ' , 'h-framework'), true,__( '' , 'h-framework') );

					  } elseif(is_search()) {

					          _e( 'Search Results for "'.$s.'"' , 'h-framework' );

					  } elseif(is_404()) {

					          _e( '404 - Page got lost!'  , 'h-framework');

					  } else {

					        bloginfo(__('name' , 'h-framework')); wp_title(__('-' , 'h-framework'), true, '');

					  }*/

?></title>

        

         <link href="<?php echo URL."/style.css"; ?>" rel="stylesheet" type="text/css" /><!-- Stylesheet  -->

         <link href="<?php echo URL."/skstyle.css"; ?>" rel="stylesheet" type="text/css" /><!-- Stylesheet  -->

         <link href="<?php echo URL."/promo.css"; ?>" rel="stylesheet" type="text/css" /><!-- Stylesheet  -->

       <?php include(HPATH."/helper/dynamic.php"); ?><!-- Dynamic Stylesheet  -->

        <link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" /><!-- Feed  -->

        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

        <link rel="shortcut icon" href="<?php echo $favico; ?>" />

    

       



       <?php if ( is_singular() && get_option( 'thread_comments' ) )

		      wp_enqueue_script( 'comment-reply' );

		     wp_head(); ?>

          <!--[if IE 9 ]>  

            <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>/ie9.css" />

        <![endif]-->

      <!--[if IE 8]>

            <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>/ie8.css" />

        <![endif]-->

      <!--[if IE 7]>

            <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>/ie7.css" />

        <![endif]-->  



		<script src="/showdiv.js" type="text/javascript"></script>

		<script type="text/javascript" src="/messages/messages.js"></script>



		<!-- modernizr -->

		<script type="text/javascript" src="<?=get_bloginfo('template_directory');?>/js/modernizr.full.min.js"></script>

		<script type="text/javascript" src="<?=get_bloginfo('template_directory');?>/js/validation.js"></script>



		<!-- SLIDERSHOW JQUERY FUNCTION -->

		<script type="text/javascript" src="<?=get_bloginfo('template_directory');?>/js/slides.jquery.js"></script>

		<script type="text/javascript">

			var j = jQuery;

			$(function(){

				$('#slides').slides({

					preload: true,

					preloadImage: 'sk/images/loading.gif',

   					effect: 'fade',

					next: 'next',

					pagination: false,

					generatePagination: false,

					autoHeight: true,

					autoHeightSpeed: 350

				});

			});

		</script>



		<!-- GALLERY POPUP JQUERY FUNCTION -->

	    <script type="text/javascript" src="<?=get_bloginfo('template_directory');?>/js/jquery.lightbox-0.5.js"></script>

		<link rel="stylesheet" type="text/css" href="<?=get_bloginfo('template_directory');?>/jquery.lightbox-0.5.css" media="screen" />

		<script type="text/javascript">

			var g = jQuery;

			g(function() {

				g('.gallery a').lightBox();

			});

		</script>

		<!--[if IE ]>  

			<link rel="stylesheet" type="text/css" href="<?=get_bloginfo('template_directory');?>/ieStyle.css" />

		<![endif]-->  





<!-- Google WebMaster Tools code start -->

<meta name="google-site-verification" content="0jszoTEWptyn2NdyTRPFVxe-NrTOEFxPm4xqPoJA6vk" />

<!-- End Google WebMaster Tools Code -->

<!-- Start Google Analytics code -->

<script type="text/javascript">



  var _gaq = _gaq || [];

  _gaq.push(['_setAccount', 'UA-33203294-1']);

  _gaq.push(['_trackPageview']);



  (function() {

    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;

    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';

    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);

  })();



</script>

<!-- End Google Analytics code -->



<script type="text/javascript">

  (function() {

    window._pa = window._pa || {};

    // _pa.orderId = "myUser@email.com"; // OPTIONAL: include your user's email address or order ID

    // _pa.revenue = "19.99"; // OPTIONAL: include dynamic purchase value for the conversion

    // _pa.onLoadEvent = "sign_up"; // OPTIONAL: name of segment/conversion to be fired on script load

    var pa = document.createElement('script'); pa.type = 'text/javascript'; pa.async = true;

    pa.src = ('https:' == document.location.protocol ? 'https:' : 'http:') + "//tag.perfectaudience.com/serve/510fa0ed4c9c5b000200036a.js";

    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(pa, s);

  })();

</script>
<script>
     $(document).ready(function() {
       <!-- $('#menu-item-3166 a').attr('href','http://www.thermospas.com/blog/');-->
	   
	   $('#menu li.menu-item a').last().attr('href','http://www.thermospas.com/blog/');
    });     
	</script>





     </head>

<body id="standard-page" <? if (is_front_page()) { ?> style="background-image: url('http://www.thermospas.com/slides/bg_1.jpg');" <? } ?>>







<? if (is_front_page()) { ?>

<? } else { ?>



 

 <? } ?>



<div id="top-bar" >

  <div class="inner-top-bar-wrapper">

  <div class="container clearfix">

       <?php 

            if(function_exists("wp_nav_menu") && 1==2)

            {

                wp_nav_menu(array(

                            'theme_location'=>'top_nav',

                            'container'=>'',

                            'depth' => 3,

                            'container_class' => 'clearfix',

                            'menu_id' => 'topmenu')

                            );

            }

        ?>

       

	   <? $h1_text =    get_post_meta($post->ID,'h1_text',true);

	   

	   if (strlen($h1_text < 4)) { $h1_text = "It's Not Just a Hot Tub, It's a ThermoSpa"; }

	   

	   ?>

	   

	  <div style="height:50px; float:left">

	  	 <span style="font-size:25px; padding-top:5px; color:#FFFFFF; font-weight:bold; text-shadow: 1px 1px 2px #111;font-family: 'Lucida Sans Unicode', 'Lucida Grande', sans-serif;"><?=$h1_text?></span>

	  </div>

	   

	   

      <?php if(get_option("hades_enable_top_widget")!="false") : ?> 

       <? if (1==2) { ?> 

        <ul id="top-social-menu" class="clearfix">

         <li></li>

       

	   

	   <?php if(get_option("hades_top_feedburner_id")!="") : ?>   <li class="rss"> <a href="<?php if(!get_option("hades_top_feedburner_id")) bloginfo('rss2_url'); else echo "http://feeds.feedburner.com/".trim(get_option("hades_top_feedburner_id")); ?>"> <span>Subscribe</span> </a> </li> <?php endif; ?>

        

       <?php if(get_option("hades_top_contact_no")!="") : ?>    <li class="skype"><a href="#"> <span><?php echo get_option("hades_top_contact_no"); ?></span></a> </li><?php endif; ?>

        

       <?php if(get_option("hades_top_fb")!="") : ?>    <li class="fb"> <a href="<?php echo get_option("hades_top_fb"); ?>"> <span>Become a Fan</span></a> </li><?php endif; ?>

        

        <?php if(get_option("hades_top_twitter")!="") : ?>   <li class="twitter"> <a href="http://twitter.com/#!/<?php echo get_option("hades_top_twitter"); ?>"> <span><?php echo get_option("hades_top_twitter"); ?></span> </a> </li><?php endif; ?>

		<? } ?>

    

   

        </ul> 

       

       <?php endif; ?> 

        

  </div>

  </div> 

</div>





<div class="top-section">

 <div class="container clearfix">

 

   <div class="top-section-divider"></div>

   <a href="<?php echo home_url(); ?>" id="logo"><img src="<?php echo $logo; ?>" alt="logo" /></a>
   
  
   

   



   <?php

   if(is_page('2601'))

   {

	?>

				<div id="inner-header" class="clearfix">

					<p class="custom-font">Call Us: 1-800-876-0158</p>

				</div> <!-- end #inner-header -->

	<?php

   }

   else{ 

				if(function_exists("wp_nav_menu"))

				{

					wp_nav_menu(array(

								'theme_location'=>'primary_nav',

								'container'=>false,

								'depth' => 3,

								'container_class' => 'clearfix',

								'menu_id' => 'menu',

								'walker' => new H_Menu_Frontend()
								)

								);

				}?>
				
				

	<?php }

			?>

           

            

   </div>         

</div>