<?
$url_ref = $_SERVER['HTTP_REFERER'];

if ($_REQUEST['source'] == "IHSAFF" || $_REQUEST['src'] == "IHSAFF" || stristr($url_ref, 'IHSAFF') ) { 

	$iref = 'IHSAFF';
	$time = time() + (30 * 24 * 60 * 60);
	setcookie ("intsource",$iref, $time);

} else if ($_REQUEST['source'] == "INTCMJ" || $_REQUEST['src'] == "INTCMJ" || stristr($url_ref, 'INTCMJ') ) { 

	//$url_ref_db = "bing";
	$iref = 'INTCMJ';
	$time = time() + (30 * 24 * 60 * 60);
	setcookie ("intsource",$iref, $time);

} else if ($_REQUEST['src'] == "RSVP" || stristr($url_ref, 'RSVP') ) { 

	//$url_ref_db = "bing";
	$iref = 'RSVP';
	$time = time() + (30 * 24 * 60 * 60);
	setcookie ("intsource",$iref, $time);

} else if ($_REQUEST['src'] == "g" || stristr($url_ref, 'src=g') ) {

	//$url_ref_db = "google";
	$iref = 'IPPCG';

} else if ($_REQUEST['src'] == "y" || stristr($url_ref, 'src=y') ) { 

	//$url_ref_db = "yahoo";
	$iref = 'IPPCY';

} else if ($_REQUEST['src'] == "m" || stristr($url_ref, 'src=m') ) { 

	//$url_ref_db = "bing";
	$iref = 'IPPCB';

} else if ($_REQUEST['src'] == "fb" || stristr($url_ref, 'src=fb') ) { 

	//$url_ref_db = "bing";
	$iref = 'IFACE';
	
} else if ($_REQUEST['source'] == "INTSWMW" || $_REQUEST['src'] == "INTSWMW" || stristr($url_ref, 'INTSWMW') ) { 

	//$url_ref_db = "bing";
	$iref = 'INTSWMW';

} else if ($_REQUEST['source'] == "videoad" || $_REQUEST['src'] == "videoad" || stristr($url_ref, 'videoad') ) { 

	//$url_ref_db = "bing";
	$iref = 'INTGVID';
	

} else {

	//$url_ref_db = $url_ref;
	$iref = 'IOTO';

}


if (isset($_REQUEST['ht_type']) || isset($_REQUEST['ht_location']) || isset($_REQUEST['email'])) {

	if ($_REQUEST['ht_type'] == "NG") {
		$notice .= "Please selcect a <strong>Hot Tub Type</strong>.\n<BR>";	
	}
	
	if (strlen($_REQUEST['name']) < 2) {
		$notice .= "Please enter your <strong>First Name</strong>.\n<BR>";	
	}

	if ((stristr($_REQUEST['email'], '@') === FALSE) || (stristr($_REQUEST['email'], '.') === FALSE) || strlen($_REQUEST['email']) < 5) { 
		$notice .= "Please enter a valid <b>Email Address</b>\n<BR>";
	}
	if (strlen($_REQUEST['zipcode']) < 5) {
		$notice .= "Please enter your <strong>Zip Code</strong>.\n<BR>";	
	}

}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<!-- <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" /> -->
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

	<title>ThermoSpas Hot Tubs</title>
	
	<!-- ########## CSS Files ########## -->
	<!-- Screen CSS -->
	<link rel="stylesheet" href="css/style.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="css/skins/style_blue.css" type="text/css" media="screen" />
	
	<!-- Framework CSS -->
	<link rel="stylesheet" href="css/960.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="css/reset.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="css/text.css" type="text/css" media="screen" />
	
	<!-- UItoTop CSS -->
	<link rel="stylesheet" href="css/ui.totop.css" type="text/css" media="screen,projection" />
	
	<!-- Fancybox CSS -->
	<link rel="stylesheet" type="text/css" href="css/fancybox.css" media="screen" />
	
	<!-- ########## end css ########## -->	
	
	<!--[if IE 7]>
	<link rel="stylesheet" href="css/ie7.css" type="text/css" />
 	<![endif]-->
 	
 	<!--[if lt IE 8]>
	<script src="http://ie7-js.googlecode.com/svn/version/2.0(beta3)/IE8.js" type="text/javascript"></script>
	<![endif]-->
	
	<!-- Jquery -->
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>

	<script type="text/javascript" src="js/jquery.mousewheel-3.0.4.pack.js"></script>
	<script type="text/javascript" src="js/jquery.fancybox-1.3.4.pack.js"></script>
	
	<!-- UItoTop -->
	<script type="text/javascript" src="js/jquery.ui.totop.js"></script>
	<!-- easing plugin ( optional ) -->
	<script src="js/easing.js" type="text/javascript"></script>
	
	<!-- Cufon Font Replacement -->
	<script type="text/javascript" src="js/cufon.js"></script>
	<script type="text/javascript" src="js/Bebas_Neue_400.font.js"></script>
	
	<!-- To customise any of the above, please use this file -->
	<script type="text/javascript" src="js/custom.js"></script>
	<SCRIPT SRC="/boxover.js"></SCRIPT>
	
	<script type="text/javascript">
		$(document).ready(function() {
			/*
			var defaults = {
	  			containerID: 'moccaUItoTop', // fading element id
				containerHoverClass: 'moccaUIhover', // fading element hover class
				scrollSpeed: 1200,
				easingType: 'linear' 
	 		};
			*/
			
			$().UItoTop({ easingType: 'easeOutQuart' });
			
		});
	</script>

</head>

<body id="top">
	
		<!-- Start Head Container -->
		<div class="container_12" style="margin-top:5px;">
		
			<!-- Logo -->
			<h1 class="grid_6 logo"><a href="index.html" class='ie6fix'>ThermoSpas</a></h1>
			
			<!-- Call Us -->
			<div class="grid_6 call">
			
			<span>Call Us! 1-800-876-0158</span>
							
			</div><!-- Call Us END -->

		</div><!-- Head Container END -->
		
		<div class="clear"></div><!-- CLEAR -->
		
		<!-- Start Header Break Line -->
		<div class="container_12">
			<hr class="grid_12"></hr>
		</div><!-- Header Break Line END -->
		
		<div class="clear"></div><!-- CLEAR -->
	
		<!-- Start Teaser -->
		<div class="container_12 ">
			
			<!-- Start Centered Text -->
			<div class="grid_12 middle">
				
				<!-- Heading -->	
				<h1 class="heading">Find the best hot tub that fits your needs, then get a quote!</h1>
				
				<!-- Subheading -->
				<span class="subhead">Watch the video now and learn more about ThermoSpas Hot Tubs</span>

			</div><!-- Centered Text END -->
	
		</div><!-- Teaser END -->
	
	<div class="clear"></div>
		
	<!-- Start Container 12 -->
	<div id="main_content" class="container_12">
	
		<!-- Start Video -->
		<div class="grid_8 featured">
		
			
			<script type='text/javascript' src='/mediaplayer/jwplayer.js'></script>
				<div id='mediaplayer'></div>
				<script type="text/javascript">
		jwplayer("mediaplayer").setup({
		flashplayer: "/mediaplayer/player.swf",
		width: 620,
		height: 465,
		file: "http://www.youtube.com/watch?v=1yHdoHP8sGY",
		stretching: "fill",
		skin: "/mediaplayer/skins/stormtrooper.zip",
		image: "http://www.thermospas.com/dev/slides/aquatic_video.jpg"
		});
		</script>
					
		</div><!-- Video END -->
		
		<!-- Start Newsletter Signup -->
		<div class="grid_4">
			
			<!-- Start Background Image -->
			<div class="signup">
			
				<!-- Start Newsletter Box -->
				<div class="newsletter">
			
					<h2>Let us know what you're looking for... </h2>
				
					<p>...and we'll provide you pricing information, a FREE DVD &amp; Brochure; with a $1000 Savings Coupon!</p>
					
					<!-- Start Form -->
					<div class="searchDiv">
					<form action="lead_form.php" method="post" style="padding:0px; margin:0px;">
                        	<select name="ht_type" class="inputbg">
							<? if (strlen($_REQUEST['ht_type']) > 2) { ?>
							<? if ($_REQUEST['ht_type'] == "portable") { ?>
							<option value="portable">Portable Hot Tub</option>
							<? } else if ($_REQUEST['ht_type'] == "swim") { ?>
							<option value="swim">Swim or Exercise Spa</option>
							<? } else if ($_REQUEST['ht_type'] == "not_sure") { ?>
							<option value="not_sure">Not Sure</option>
							<? } ?>
							<? } else { ?>
							<option value="NG" selected="selected">What type of Hot Tub?</option>
							<option value="portable">Portable Hot Tub</option>
							<option value="swim">Swim or Exercise Spa</option>
							<option value="not_sure">Not Sure</option>
							<? } ?>
						  </select> 
						  
						  <select name="ht_use" class="inputbg">
						  <? if (strlen($_REQUEST['ht_use']) > 2) { ?>
						   <option value="<?=$_REQUEST['ht_use']?>" disabled="disabled">Already Selected</option>
						  <? } else { ?>
						  <option value="NG" selected="selected">Primary Hot Tub Use?</option>
						  <option value="relaxation">Relaxation</option>
						  <option value="hydrotherapy">Hydrotherapy/Pain Relief</option>
						  <option value="exercise">Exercise</option>
						  <option value="other">Other </option>
						  <? } ?>
						</select>
						  
							<input type="text" class="inputbg" name="name"  onfocus="if (this.value == 'Your Name') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Your Name';}" value="Your Name" />
                        	<input type="text" class="inputbg" name="email" onfocus="if (this.value == 'Your Email') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Your Email';}" value="Your Email" />
							<input type="text" class="inputbg" name="zipcode" onfocus="if (this.value == 'Your Zip Code') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Your Zip Code';}" value="Your Zip Code" />
							<input name="lf" type="hidden" value="c1">
							  <input name="url_ref" type="hidden" value="<?=$url_ref_db?>">
							  <input name="iref" type="hidden" value="<?=$iref?>">
                        	<input type="image" value="submit" src="images/continue.png"/>
							</form>
					</div><!-- Form END -->
					
					<div class="clear"></div><!-- CLEAR -->
					
				</div><!-- Newsletter Box END -->
			
			</div><!-- Background Image END-->
			
		</div><!-- Newsletter Signup END -->
		
		<div class="clear"></div><!-- CLEAR -->
		
		<!-- Start Box 1 -->
		<div class="grid_4">
		<div class="box">
			<img src='images/secure.jpg' alt='' width="25" height="32" class='alignleft_icon'/>
			<h3>YOU'RE INFO IS SECURE </h3>
			<hr />
			<p>Your privacy and security is important us.  That's we're protected by...<br />
			<a href="//privacy-policy.truste.com/click-to-verify/www.thermospas.com" target="_blank"><img style="border: none" alt="Privacy-Policy-By-TRUSTe" src="//privacy-policy.truste.com/verified-seal/www.thermospas.com/green/h.png"/></a></p>
		</div>
		</div><!-- Box 1 END -->
		
		<!-- Start Box 2 -->
		<div class="grid_4">
		<div class="box">
			<img src='images/coupon.jpg' alt='' width="37" height="32" class='alignleft_icon'/>
			<h3>$1000 SaVINGS COUPON </h3>
			<hr />
			<p>Let us know what you are looking for and we'll provide you a $1000 Savings Coupon. Which includes $400 cash off, Free Delivery and Installation ($450) and Free Chemicals Startup Kit ($150) </p>
		</div>
		</div><!-- Box 2 END -->
		
		<!-- Start Box 3 -->
		<div class="grid_4">
		<div class="box">
			<img src='images/download.jpg' alt='' width="38" height="32" class='alignleft_icon'/>
			<h3>FREE DVD &amp; BRoCHURE </h3>
			<hr />
			<p>We'll send you our Free DVD &amp; Brochure. This also includes our 60 page Hot Tub Buying Guide. You can watch it immediately online or have it delivered to your home. </p>
		</div>
		</div><!-- Box 3 END -->
		
		<div class="clear"></div><!-- CLEAR -->
		
		<!-- Start Features 1 -->
		<div class="grid_6">
		<div class="feat margin-1">
			<h4>Hot Tubs Custom Built to Your Specs &amp; Budget </h4>
			<hr />
			<p>ThermoSpas custom-builds each individual hot tub to your specific needs, specifications and budget. </p>
			
			<ul class="checklist">
				<li>The highest quality hot tub components used in the industry </li>
				<li>Energy efficient and safe hot tubs </li>
				<li>Customize from 10 jets to 160 jets </li>
				<li>Factory-Direct Hot Tubs to Save BIG </li>
				<li>We're local for delivery, installation and service </li>
			</ul>
			
			<p> ThermoSpas sells hot tubs directly to the consumer, eliminating the middleman. This way our customers get the highest-quality hot tub for the lowest possible price. When comparing hot tub prices, buying factory-direct can save you thousands of dollars and you will get exactly the features you want and the service you deserve. </p>
			
		  </div>
		</div><!-- Features 1 END -->
		
		<!-- Start Features 2 -->
		<div class="grid_6 feat margin-1">
		
			<h4>View the Screenshots</h4>
			<hr />

			<a id="example6" href="/dev/slides/lounge.jpg" title="ThermoSpas Wave Lounges - Available in many of our hot tubs"><img alt="example6" src="http://www.thermospas.com/dev/wp-content/themes/majestics/timthumb.php?src=/dev/slides/lounge.jpg&h=134&w=138" /></a>
			<a id="example6" href="/dev/slides/lighting.jpg" title="ThermoSpas Elegant Lighting Effects and Sound Systems"><img alt="ThermoSpas Elegant Lighting Effects and Sound Systems" src="http://www.thermospas.com/dev/wp-content/themes/majestics/timthumb.php?src=/dev/slides/lighting.jpg&h=134&w=138" /></a>
			<a id="example6" href="/dev/slides/bubbling-video.jpg" title="Everyone loves the ThermoSpas Bubbling System"><img alt="example6" src="http://www.thermospas.com/dev/wp-content/themes/majestics/timthumb.php?src=/dev/slides/bubbling-video.jpg&h=134&w=138" /></a>
			<a id="example6" href="/dev/slides/filtration-video.jpg" title="ThermoSpas Filtration System filters the water over 100x more then our competitors"><img alt="example6" src="http://www.thermospas.com/dev/wp-content/themes/majestics/timthumb.php?src=/dev/slides/filtration-video.jpg&h=134&w=138" /></a>
			<a id="example6" href="/dev/slides/siteinspection.jpg" title="Request a Free Site Inspection to help measure and plan out your hot tub."><img alt="example6" src="http://www.thermospas.com/dev/wp-content/themes/majestics/timthumb.php?src=/dev/slides/siteinspection.jpg&h=134&w=138" /></a>
			<a id="example6" href="/dev/slides/jets-video.jpg" title="Thermospas allows you to choose from 10 to 160 jets"><img alt="example6" src="http://www.thermospas.com/dev/wp-content/themes/majestics/timthumb.php?src=/dev/slides/jets-video.jpg&h=134&w=138" /></a>

		</div><!-- Features 2 END -->
		
		<div class="clear"></div><!-- CLEAR -->
		
		<div class="grid_12">
			<div class="callto">
			
				<a href="#top"><span class="calltoaction"><img class='alignleft_action' src='images/Forward.png' alt=''/> Do you need a free site inspection now? Give us a call: 1-800-876-0158 </span></a>
			
			</div>
		</div>
		
		<div class="clear"></div><!-- CLEAR -->
		
		<? if (1==2) { ?>
		<div class="grid_12">
			
			<h1 class="heading">You like it? Share your love...</h1>
			
			<div class="fb">
			<div id="fb-root"></div><script src="http://connect.facebook.net/en_US/all.js#appId=127329393972279&amp;xfbml=1"></script><fb:comments href="lista.wickedshot.de" num_posts="5" width="700"></fb:comments>
			</div>
			
			<div class="clear"></div><!-- CLEAR -->

		</div>
		<? } ?>
	
	</div><!-- Container 12 END-->
	
	<div class="clear"></div><!-- CLEAR -->
	
	<!-- Start Footer Bottom -->
	<div id="fullwidth_footer_bottom">
	
		<!-- Start Footer Bottom Container -->
		<div class="container_12">
        	
        	<!-- Start Copyright -->
			<div class="grid_8 copyright">          
				<p class="rights">Copyright 2011 by <a href="index.html" title="ThermoSpas">Lista</a>. All rights reserved. <a href="//privacy-policy.truste.com/click-to-verify/www.thermospas.com">Privacy Policy</a></p>
			</div><!-- Copyright END -->

			<!-- Start Social Footer -->
			<div class="grid_4">
				<ul class="social_bookmarks_footer">
					<li class="twitter"><a href="#" class="" title="Twitter">Twitter</a></li>
					<li class="facebook"><a href="#" class="" title="Facebook">Facebook</a></li>
					<li class="rss"><a href="#" class="" title="RSS">RSS Feed</a></li>
				</ul>
			</div><!-- Social Footer END -->
			            
		</div><!-- Footer Bottom Container END -->
		
    </div><!-- Footer Bottom END --> 
    <!-- Clearfix -->    
	<div class="clear"></div>

		
<!-- IE fix -->
<script type="text/javascript"> Cufon.now(); </script>	

</body>
</html>