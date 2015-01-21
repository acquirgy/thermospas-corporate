<?php
/*
Template Name: Hot Tub Price Page Template
*/
?>
<?php

	get_header();
	$hasSidebar = "";


	$sidebar = "true";




	$align =    get_post_meta($post->ID,'_sidebar_align',true);
	if($align=="")
  	$align = "right";

	if($sidebar=="true") {

	if($align == "right")
	$hasSidebar = "hasRightSidebar";
	else
	$hasSidebar = "hasLeftSidebar";
	}

	$image_flag = false;

	 $content_limit =  get_option("hades_bloggrid_limit");
	 $content_limit = (int) (!$content_limit) ? 250 : $content_limit;
//print_r($_COOKIE);
$url_ref = $_SERVER['HTTP_REFERER'];
if ($_REQUEST['source'] == "IHSAFF" || $_REQUEST['src'] == "IHSAFF" || stristr($url_ref, 'IHSAFF') ) {
$iref = 'IHSAFF';
$time = time() + (30 * 24 * 60 * 60);
setcookie ("intsource",$iref, $time);
} else if ($_REQUEST['source'] == "INTCMJ" || $_REQUEST['src'] == "INTCMJ" || stristr($url_ref, 'INTCMJ') ) {
$iref = 'INTCMJ';
//$month = 60 * 60 * 24 * 30 + time();
//echo "c".$_COOKIE['INETCJ'];
//setcookie('INETCJ', date("G:i - m/d/y"), $month);
} else if ($_REQUEST['source'] == "IPPCVSW" || $_REQUEST['src'] == "IPPCVSW" || stristr($url_ref, 'IPPCVSW') ) {
$iref = 'IPPCVSW';
} else if ($_REQUEST['src'] == "RSVP" || stristr($url_ref, 'RSVP') ) {
//$url_ref_db = "bing";
$iref = 'RSVP';
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
if ($_REQUEST['ht_seating'] == "NG") {
$notice .= "Please selcect a <strong>Hot Tub Seating</strong>.\n<BR>";
}
if ($_REQUEST['ht_use'] == "NG") {
$notice .= "Please selcect a <strong>Hot Tub Use</strong>.\n<BR>";
}
if (strlen($_REQUEST['name']) < 2 || $_REQUEST['name'] == 'Your Name') {
$notice .= "Please enter your <strong>First Name</strong>.\n<BR>";
}
if ((stristr($_REQUEST['email'], '@') === FALSE) || (stristr($_REQUEST['email'], '.') === FALSE) || strlen($_REQUEST['email']) < 5 || $_REQUEST['email'] == 'Your Email') {
$notice .= "Please enter a valid <b>Email Address</b>\n<BR>";
}
if (strlen($_REQUEST['address']) < 2 || $_REQUEST['Address'] == 'Your Address') {
$notice .= "Please enter your <strong>Address</strong>.\n<BR>";
}
if (strlen($_REQUEST['city']) < 2 || $_REQUEST['city'] == 'Your city') {
$notice .= "Please enter your <strong>City</strong>.\n<BR>";
}
/*
if (strlen($_REQUEST['state']) < 2 || $_REQUEST['state'] == 'Your State') {
$notice .= "Please enter your <strong>State</strong>.\n<BR>";
}
*/
if (strlen($_REQUEST['zipcode']) < 5 || $_REQUEST['zipcode'] == 'Your Zip Code') {
$notice .= "Please enter your <strong>Zip Code</strong>.\n<BR>";
}

}


switch ($_REQUEST['kw']) {

case "factory-direct":
	$heading = "Factory Direct Hot Tubs Made Affordable<br>Search below and we'll provide you a quote on the hot tub of your dreams.";
	$video = "GOQAbkgd6vg";
	$vtitle = "on Factory Direct Built Hot Tubs";
	$dynamic_link = "?kw=factory-direct";
	break;
case "portable":
	$heading = "Custom Built Portable Hot Tubs and Swim Spas by ThermoSpas<br>Watch the video below on Portable Hot Tubs and Spas";
	$video = "KFu8ImQLTA8";
	$dynamic_link = "?kw=portable";
	break;
default:
	$heading = "Find the best hot tub that fits your needs, then get a quote!";
	$video = "1yHdoHP8sGY";
	$vtitle = "on Factory Direct Built Hot Tubs";
	$dynamic_link = "";
}
if(strlen($_REQUEST['ht_token']) == "" || $ht_token == "")
{
	$ht_token = generateToken();
}
//echo $ht_token;

	?>
  <div id="section">
      <div class="content clearfix">

				<!--Main center aligned heading-->
				<h1><span class="heading">
					<script src="../js/thermoheadline.js" type="text/javascript"></script><!--<?=$heading?>-->
                </span></h1>

					<form id="ht_form" action="" method="post">
                    <div id="slides">
                        <div class="slides_container">
                            <div class="slide">

								<!--slide Content starts-->
								<div id="slide_content">
									<div id='mediaplayer'>
                                    <iframe width="570" height="450" src="/ht-video.php<?=$dynamic_link?>" frameborder="0" scrolling="no" allowfullscreen></iframe>
									</div>
								</div><!--#slide_content end-->
								<!--subscribe_bg starts-->
								<div id="subscribe_pricing">
									<h2>Let us know what you're looking for...</h2>
									<p>...and we'll provide you a quote on the hot tub of your dreams.</p>
									<div>
										<select name="ht_use" class="customDropDown" id="ht_use">
										<? if (strlen($_REQUEST['ht_use']) > 2) { ?>
											<option value="<?=$_REQUEST['ht_use']?>" disabled="disabled">Already Selected</option>
										<? } else { ?>
											<option value="">Primary Hot Tub Use?</option>
											<option value="relaxation">Relaxation</option>
											<option value="hydrotherapy">Hydrotherapy/Pain Relief</option>
											<option value="exercise">Exercise</option>
											<option value="other">Other </option>
										<? } ?>
										</select><div id="ht_useInfo" class="ht_useInfo"></div>
									</div>
									<div>
										<select name="ht_seating" class="customDropDown" id="ht_seating">
										<? if (strlen($_REQUEST['ht_seating']) > 2) { ?>
											<option value="<?=$_REQUEST['ht_seating']?>" disabled="disabled">Already Selected</option>
										<? } else { ?>
											<option value="">How many people?</option>
											<option value="2to3">2-3 person</option>
											<option value="3to4">3-4 person</option>
											<option value="4to5">4-5 person</option>
											<option value="5to6">5-6 person</option>
											<option value="6to+">6+ person</option>
										<? } ?>
										</select><div id="ht_seatingInfo" class="ht_seatingInfo"></div>
                   			      </div>
									<div>
										<input type="text" id="name" name="name" value="" placeholder="*Your Name"/>
									</div>
									<div>
										<input type="text" id="zipcode" name="zipcode" value="" placeholder="*Your Zip Code"/>
									</div>
									<div>
										<input type="text" id="phone" name="phone" value="" placeholder="*Phone" />
									</div>
									<?php
										$ht_date = date('Y-m-d ', strtotime('now'));
										//echo $ht_date;
									?>
									<input name="ht_date" type="hidden" value="<?=$ht_date?>">
									<input name="ht_token" type="hidden" value="<?=$ht_token?>" id="ht_token">
									<input name="lf" type="hidden" value="c1">
									<input name="url_ref" type="hidden" value="<?=$url_ref_db?>">
									<input name="iref" type="hidden" value="<?=$iref?>">
									<a href="#" class="next" ><button type="submit" name="submit_first" id="submit_first" onClick="ga('send', 'event', 'leadgen', 'formsubmit', 'hottubpricing');">Next Step</button></a>
								</div><!-- #subscribe_pricing -->
                                <div class="caption" style="bottom:0">
                                </div>
                            </div>
                          <div class="slide">
								<div id="slide_content">
						<img src="../sk/images/park-ave.jpg" alt="ThermoSpas Hot Tub" width="570" height="450"/>
								</div><!--#slide_content end-->
                                <!--subscribe_pricing starts-->
								<div id="subscribe_pricing" >
									<h2>Please let us know about the location</h2>
									<p>Let us know where a little about where you would like to put your hot tub.  This will allow us to come up with accurate pricing information and send you a $1,000 coupon, DVD, and complete information package.</p>
									<div>
										<select name="ht_location" class="customDropDown" id="ht_location">
											<option value="">Do you have a location?</option>
											<option value="outside">Yes: Outside</option>
											<option value="inside">Yes: Inside</option>
											<option value="no">Unsure</option>
										</select> <span id="ht_locationInfo" class="ht_locationInfo"></span>
									</div>
									<div>
										<select name="ht_jets" id="ht_jets" class="customDropDown" >
											<option selected="selected" value="">What type of jets?</option>
											<option value="">What type of jets would you like?</option>
											<option value="unsure">Not Sure</option>
											<option value="massage">Massaging / Swirling</option>
											<option value="neck">Neck Jets</option>
											<option value="foot">Foot Jets</option>
											<option value="laser">Direct "Laser" Jets</option>
											<option value="combation">Combination</option>
                        			    </select> <span id="ht_jetsInfo" class="ht_jetsInfo"></span>
									</div>
									<div>
										<select name="ht_owner" id="ht_owner" class="customDropDown" >
											<option value="">Have you owned a hot tub before?</option>
											<option value="yes">Yes</option>
											<option value="no">No</option>
										</select> <span id="ht_ownerInfo" class="ht_ownerInfo"></span>
									</div>
									<div>
										<select name="ht_siteinspection" id="ht_siteinspection" class="customDropDown" />
											<option value="">Have you had a site inspection?</option>
											<option value="yes">Yes</option>
                		            	    <option value="no">No</option>
                        			    </select> <span id="ht_siteinspectionInfo" class="ht_siteinspectionInfo"></span>
									</div>
									<div>
										<input type="text" id="address" name="address" value=""  placeholder="*Your Address" />
									</div>
									<div>
										<input type="text" id="city" name="city" value=""  placeholder="*Your city" />
									</div>
									<div style="clear:both;">
										<select name="state1" id="state1" class="customDropDown" >
                                            <option value="">*Select State</option>
                                            <option value="AL">Alabama</option>
                                            <option value="AK">Alaska</option>
                                            <option value="AZ">Arizona</option>
                                            <option value="AR">Arkansas</option>
                                            <option value="CA">California</option>
                                            <option value="CO">Colorado</option>
                                            <option value="CT">Connecticut</option>
                                            <option value="DE">Delaware</option>
                                            <option value="FL">Florida</option>
                                            <option value="GA">Georgia</option>
                                            <option value="HI">Hawaii</option>
                                            <option value="ID">Idaho</option>
                                            <option value="IL">Illinois</option>
                                            <option value="IN">Indiana</option>
                                            <option value="IA">Iowa</option>
                                            <option value="KS">Kansas</option>
                                            <option value="KY">Kentucky</option>
                                            <option value="LA">Louisiana</option>
                                            <option value="ME">Maine</option>
                                            <option value="MD">Maryland</option>
                                            <option value="MA">Massachusetts</option>
                                            <option value="MI">Michigan</option>
                                            <option value="MN">Minnesota</option>
                                            <option value="MS">Mississippi</option>
                                            <option value="MO">Missouri</option>
                                            <option value="MT">Montana</option>
                                            <option value="NE">Nebraska</option>
                                            <option value="NV">Nevada</option>
                                            <option value="NH">New Hampshire</option>
                                            <option value="NJ">New Jersey</option>
                                            <option value="NM">New Mexico</option>
                                            <option value="NY">New York</option>
                                            <option value="NC">North Carolina</option>
                                            <option value="ND">North Dakota</option>
                                            <option value="OH">Ohio</option>
                                            <option value="OK">Oklahoma</option>
                                            <option value="OR">Oregon</option>
                                            <option value="PA">Pennsylvania</option>
                                            <option value="RI">Rhode Island</option>
                                            <option value="SC">South Carolina</option>
                                            <option value="SD">South Dakota</option>
                                            <option value="TN">Tennessee</option>
                                            <option value="TX">Texas</option>
                                            <option value="UT">Utah</option>
                                            <option value="VT">Vermont</option>
                                            <option value="VA">Virginia</option>
                                            <option value="WA">Washington</option>
                                            <option value="WV">West Virginia</option>
                                            <option value="WI">Wisconsin</option>
                                            <option value="WY">Wyoming</option>
										</select> <span id="state1Info" class="state1Info"></span>
									</div>
									<div>
										<input type="text" id="email" name="email" value="" placeholder=" Your Email"/>
									</div>
									<a href="#" class="next" ><button type="submit" name="submit_second" id="submit_second" >Get a Quote and DVD Now</button></a>
								</div><!--subscribe_pricing ends-->
								<div class="caption" style="bottom:0">
                                </div>
                          </div>
                        </div>
                    </div>
					</form>
				<!--business tagline here-->
				<div id="tagline">
					<h2>Watch the video <?=$vtitle?> now and learn more about ThermoSpas Hot Tubs</h2>
				</div> <!-- #tagline end-->
				</article>

				<div class="grid_4_container">
				<!-- Box 1 START -->
				<div class="grid_4">
					<div class="box"> <img src='../landing/images/secure.jpg' alt='' width="25" height="32" class='alignleft_icon'/>
						<h3>YOUR INFO <br />IS SECURE </h3>
						<hr />
						Thermospas takes every precaution to keep your information secure.
					</div>
				</div>
				<!-- Box 1 END -->
				<!-- Box 2 START-->
				<div class="grid_4">
					<div class="box"> <img src='../landing/images/coupon.jpg' alt='' width="37" height="32" class='alignleft_icon'/>
						<h3>$1000 SAVINGS COUPON </h3>
						<hr />
						<p>Let us know what you are looking for and we'll provide you a $1000 Savings Coupon. Which includes $400 cash off, Free Delivery and Installation ($450) and Free Chemicals Startup Kit ($150) </p>
					</div>
				</div>
				<!-- Box 2 END -->
				<!-- Start Box 3 -->
				<div class="grid_4">
					<div class="box"> <img src='../landing/images/download.jpg' alt='' width="38" height="32" class='alignleft_icon'/>
						<h3>FREE DVD &amp; BROCHURE </h3>
						<hr />
						<p>We'll send you our Free DVD &amp; Brochure. This also includes our 60 page Hot Tub Buying Guide. You can watch it immediately online or have it delivered to your home. </p>
					</div>
				</div>
				<!-- Box 3 END -->
				</div>


				<div id="content-middle">

      <!--column_half starts-->
      <div class="column_half">
        <div class="feature_topleft">
          <h4>Affordable</h4>
          <p>ThermoSpas sells factory-direct to our customers. This makes our hot tubs more affordable and higher quality. We're  100% USA Made. </p>
        </div>
        <div class="feature_topright">
          <h4>Energy Efficient </h4>
          <p>ThermoSpas meets energy standards that no other hot tub manufacturers meet. Our energy effcient hot tubs save you money and time. </p>
        </div>
        <div class="feature_center">
          <h2>Why ThermoSpas?</h2>
        </div>
        <div class="feature_bottomleft">
          <h4>Warranty</h4>
          <p> We believe 100% in our hot tubs and are willing to provide it by offering you the best hot tub warranty.</p>
        </div>
        <div class="feature_bottomright">
          <h4>Service</h4>
          <p> Everywhere ThermoSpas sells hot tubs, we have permanently stationed, local service and delivery staff. </p>
        </div>
      </div>
      <!--column_half ends-->

      <!--column_half_last starts-->
      <div class="column_half_last">
        <h3>ThermoSpas custom-builds each individual hot tub to your specific needs, specifications and budget. </h3>
        <ul class="checklist">
          <li>ThermoSpas sells hot tubs directly to the consumer, eliminating the middleman. This way our customers get the highest-quality hot tub for the lowest possible price. When comparing hot tub prices, buying factory-direct can save you thousands of dollars and you will get exactly the features you want and the service you deserve. </li>
        </ul>
        <ul class="star_bullet">
          <li>The highest quality hot tub components used in the industry </li>
          <li>Energy efficient and safe hot tubs </li>
          <li>Customize from 10 jets to 160 jets </li>
          <li>Factory-Direct Hot Tubs to Save BIG </li>
          <li>We're local for delivery, installation and service </li>
        </ul>
        <!--this clear div is necessary to separate gallery form above content-->
        <div class="clear"></div>
        <h3>View our Hot Tubs </h3>
        <p>ThermoSpas designs some of the most luxurious hot tubs in the world </p>
        <!--gallery starts-->
        <ul class="gallery">

		 <li><a class="simple_image" href="/slides/lounge.jpg" title="ThermoSpas Wave Lounges - Available in many of our hot tubs" target="_blank"><img alt="example6" src="/wp-content/themes/majestics/timthumb.php?src=/slides/lounge.jpg&h=60&w=60" /></a> </li>
		<li><a class="simple_image" href="/slides/lighting.jpg" title="ThermoSpas Elegant Lighting Effects and Sound Systems" target="_blank"><img alt="ThermoSpas Elegant Lighting Effects and Sound Systems" src="/wp-content/themes/majestics/timthumb.php?src=/slides/lighting.jpg&h=60&w=60" /></a> </li>
		<li> <a class="simple_image" href="/slides/bubbling-video.jpg" title="Everyone loves the ThermoSpas Bubbling System" target="_blank"><img alt="example6" src="/wp-content/themes/majestics/timthumb.php?src=/slides/bubbling-video.jpg&h=60&w=60" /></a> </li>
		 <li><a class="simple_image" href="/slides/filtration-video.jpg" title="ThermoSpas Filtration System filters the water over 100x more then our competitors" target="_blank"><img alt="example6" src="/wp-content/themes/majestics/timthumb.php?src=/slides/filtration-video.jpg&h=60&w=60" /></a> </li>
		<li> <a class="simple_image" href="/slides/siteinspection.jpg" title="Request a Free Site Inspection to help measure and plan out your hot tub." target="_blank"><img alt="example6" src="/wp-content/themes/majestics/timthumb.php?src=/slides/siteinspection.jpg&h=60&w=60" /></a> </li>
<!--
		<li class="last_image"><a class="simple_image" href="/slides/jets-video.jpg" title="Thermospas allows you to choose from 10 to 160 jets" target="_blank"><img alt="example6" src="/wp-content/themes/majestics/timthumb.php?src=/slides/jets-video.jpg&h=60&w=60" /></a> </li>
-->
        </ul>
        <!--gallery ends-->
      </div>
      <!--column_half_last ends-->

 				</div>


<!--content_bottom_bg starts-->
  <div id="content_bottom">

    <!--first column_3 starts-->
    <div class="column_3">
      <h4>What others say</h4>
      <!--testimonial starts-->
      <div class="testimonial">
        <!--first testimonial-->
        <div>
          <p>"  It is very relaxing and lets us melt away the tensions of the day. It is a great opportunity to talk undisturbed. No phone, no computer, no distractions . "</p>
          <p> Rosalind Gambardella </p>
        </div>
        <!--second testimonial-->
        <div>
          <p>"  I would like to say that I would recommend ThermoSpa for whatever reason whether it be entertainment, stress or therapy. It has helped my husband and I immeasurably!  "</p>
          <p> Mrs. Christine L. Silva </p>
        </div>
      </div>
      <!--testimonial ends-->
    </div>
    <!--first column_3 ends-->

    <!--second column_3 starts-->
    <div class="column_3">
      <h4>Financing Available </h4>
      <p>Let us know what hot tub you're looking for and we'll provide you with some financing information. </p>
<!--
      <ul class="payment">
        <li><img src="slanding/images/Credit_ card.png" width="32" height="32" alt="credit card"></li>
        <li><img src="slanding/images/PayPal.png" width="32" height="32" alt="credit card"></li>
        <li><img src="slanding/images/master_card.png" width="32" height="32" alt="credit card"></li>
      </ul>
-->
    </div>
    <!--second column_3 ends-->

    <!--last column_3 starts-->
    <div class="column_3_last">
    </div>
    <!--last column_3 ends-->

  </div>
<!--content_bottom ends-->

               </div> <!-- #main end -->
            </div><!-- #content end -->

			</div> <!-- end #container -->

</div>
</div> <!-- #section -->

<?php get_footer(); ?>