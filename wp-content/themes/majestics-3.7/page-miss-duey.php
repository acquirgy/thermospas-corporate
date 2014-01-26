<?php
/*
Template Name: Miss Duey Page Template
*/
?>
<?php
	get_header(); 

/*
//Load Geo Target Class
include('includes/ip2locationlite.class.php');
$ipLite = new ip2location_lite;
$ipLite->setKey('0720a2f9444a3e300d9109d4daec2ce4dcc6c3f211287e0661dac9473bc70a67');
 
//Get errors and locations
$locations = $ipLite->getCity($_SERVER['REMOTE_ADDR']);
$errors = $ipLite->getError();
if (!empty($locations) && is_array($locations)) {
//	echo $locations['regionName'];
	if($locations['regionName'] == "MASSACHUSETTS" || $locations['regionName'] == "FLORIDA" || $locations['regionName'] == "VIRGINIA" || $locations['regionName'] == "CONNECTICUT" || $locations['regionName'] == "CALIFORNIA" ):
	else:
	header('Location: http://www.thermospas.com/hot-tubs/hot-tub-spas.html');
	endif;
}
*/

require_once 'includes/mobile_detector.php';
$detect = new Mobile_Detect();
if($detect->isMobile()):
header('Location: http://www.thermospas.com/hot-tubs/hot-tub-spas.html');
endif; 
?>    
<!--
<script src="DWConfiguration/ActiveContent/IncludeFiles/AC_RunActiveContent.js" type="text/javascript"></script>
-->
<div class="page-title-wrapper">
  <div class="page-inner-title-wrapper">
    <h1 class="custom-font page-heading container">
      <?php the_title(); ?>
    </h1>
  </div>
</div>
<div class="container clearfix page  <?php echo $hasSidebar; ?>">
  <div class="breadcrumb-wrapper">
    <div class="breadcrumb clearfix">
      <?php $helper->the_breadcrumb();?>
    </div>
  </div>
  <div class="content clearfix">

    <div class="<?php if($sidebar=="true") echo 'two-third-width'; else echo 'full-width';  ?>">
      <?php 	wp_reset_query(); if(have_posts()): while(have_posts()) : the_post(); ?>
      <div class="single-content">
        <?php the_content(); ?>
		<div id="missd-container">
<OBJECT classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,0,0" WIDTH="600" HEIGHT="380" id="TSMissDueyTour_sg06PHP_email" ALIGN="">

<PARAM NAME=movie VALUE="missduey/TSMsDueyTour_sg10a.swf">
<PARAM NAME=quality VALUE=high>
<PARAM NAME=bgcolor VALUE=#FFFFFF>

<EMBED src="missduey/TSMsDueyTour_sg10a.swf" quality=high bgcolor=#FFFFFF WIDTH="600" HEIGHT="380" NAME="TSMissDueyTour_sg06PHP_email" ALIGN="" TYPE="application/x-shockwave-flash" PLUGINSPAGE="http://www.macromedia.com/go/getflashplayer"></EMBED>

</OBJECT>
		</div>
      </div>
      <!-- main content  -->
      <?php endwhile; endif; ?>
    </div>
    <?php  	 wp_reset_query();
		   
			if($sidebar=="true")  
			get_sidebar();  ?>
  </div>
</div>
<?php get_footer(); ?>