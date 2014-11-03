<?

$url_ref = @$_SERVER['HTTP_REFERER'];

$iref = 'IPPC';
if(isset($_GET['iref'])) $iref = $_GET['iref'];
if(isset($_GET['IREF'])) $iref = $_GET['IREF'];
if(isset($_GET['src'])) $iref = $_GET['src'];
if(isset($_GET['SRC'])) $iref = $_GET['SRC'];

if(strtolower($iref) == 'g') $iref = 'IPPCG';
if(strtolower($iref) == 'm') $iref = 'IPPCB';

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

  if (strlen($_REQUEST['zipcode']) < 5 || $_REQUEST['zipcode'] == 'Your Zip Code') {
    $notice .= "Please enter your <strong>Zip Code</strong>.\n<BR>";
  }

}

switch (@$_REQUEST['kw']) {

  case "factory-direct":
    $heading = "Factory Direct Hot Tubs Made Affordable<br>Search below and we'll provide you a quote on the hot tub of your dreams.";
    $video = "GOQAbkgd6vg";
    $vtitle = "on Factory Direct Built Hot Tubs";
    break;

  case "portable":
    $heading = "Custom Built Portable Hot Tubs and Swim Spas by ThermoSpas<br>Watch the video below on Portable Hot Tubs and Spas";
    $video = "KFu8ImQLTA8";
    break;

  default:
    $heading = "Find the best hot tub that fits your needs, then get a quote!";
    $video = "c7AmDccjiS4";
    $vtitle = "on Factory Direct Built Hot Tubs";

}

if(@strlen($_REQUEST['ht_token']) == "" || $ht_token == "") {
  $ht_token = generateToken();
}


?>

<!doctype html>

<!--[if IEMobile 7 ]> <html dir="ltr" lang="en-US"class="no-js iem7"> <![endif]-->
<!--[if lt IE 7 ]> <html dir="ltr" lang="en-US" class="no-js ie6 oldie"> <![endif]-->
<!--[if IE 7 ]>    <html dir="ltr" lang="en-US" class="no-js ie7 oldie"> <![endif]-->
<!--[if IE 8 ]>    <html dir="ltr" lang="en-US" class="no-js ie8 oldie"> <![endif]-->
<!--[if (gte IE 9)|(gt IEMobile 7)|!(IEMobile)|!(IE)]><!--><html dir="ltr" lang="en-US" class="no-js"><!--<![endif]-->

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <title>ThermoSpas</title>

    <meta name="description" content="Portable hot tubs and spas that are luxurious, affordable, and custom built to match your needs and budget." />
    <meta name="keyword" content="Portable, hot, tubs, spas, luxurious, affordable, custom built, swiming spa, thermospas, thermospa, jacuzzi, chiropractor." />

    <link rel="stylesheet" href="sk/css/style.css">

    <!-- Grab Google CDN's jQuery, with a protocol relative URL; fall back to local if necessary -->
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="sk/js/jquery-1.7.1.min.js"><\/script>')</script>
    <script type='text/javascript' src='mediaplayer/jwplayer.js'></script>

    <!-- modernizr -->
    <script type="text/javascript" src="sk/js/modernizr.full.min.js"></script>
    <script type="text/javascript" src="sk/js/email-brochure.js"></script>

    <!-- SLIDERSHOW JQUERY FUNCTION -->
    <script type="text/javascript" src="sk/js/slides.jquery.js"></script>

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
    <script type="text/javascript" src="../sk/js/jquery.lightbox-0.5.js"></script>
    <link rel="stylesheet" type="text/css" href="../sk/css/jquery.lightbox-0.5.css" media="screen" />
    <script type="text/javascript">
      var g = jQuery;
      g(function() {
        g('.gallery a').lightBox();
      });
    </script>

    <!-- Start Google Analytics Code -->
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
    <!-- End Google Analytics Code -->

    <!--[if IE 7 ]>    <link rel="stylesheet" type="text/css" href="../sk/css/ie7style.css" media="screen" /> <![endif]-->
    <!--[if IE 8 ]>    <link rel="stylesheet" type="text/css" href="../sk/css/ie8style.css" media="screen" /> <![endif]-->
    <!--[if IE 9 ]>    <link rel="stylesheet" type="text/css" href="../sk/css/ie9style.css" media="screen" /> <![endif]-->

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

    <!-- Google Code for All  Site Visitors -->
    <!-- Remarketing tags may not be associated with personally identifiable information or placed on pages related to sensitive categories. For instructions on adding this tag and more information on the above requirements, read the setup guide: google.com/ads/remarketingsetup -->
    <script type="text/javascript">
    /* <![CDATA[ */
    var google_conversion_id = 1070435200;
    var google_conversion_label = "w9mUCOCF3QEQgJe2_gM";
    var google_custom_params = window.google_tag_params;
    var google_remarketing_only = true;
    /* ]]> */
    </script>
    <script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
    </script>

    <noscript>
    <div style="display:inline;">
    <img height="1" width="1" style="border-style:none;" alt="" src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/1070435200/?value=0&amp;label=w9mUCOCF3QEQgJe2_gM&amp;guid=ON&amp;script=0"/>
    </div>
    </noscript>


    <script type="text/javascript">
    var _ss = _ss || [];
    _ss.push(['_setDomain', 'https://koi-PLBR48.sharpspring.com/net']);
    _ss.push(['_setAccount', 'KOI-RUPIJ2']);
    _ss.push(['_trackPageView']);
    (function() {
    var ss = document.createElement('script');
    ss.type = 'text/javascript'; ss.async = true;
    ss.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'koi-PLBR48.sharpspring.com/client/ss.js?ver=1.1.1';
    var scr = document.getElementsByTagName('script')[0];
    scr.parentNode.insertBefore(ss, scr);
    })();
    </script>

  </head>

  <body>

<script>

var versaTag = {};
versaTag.id = "762"
versaTag.sync = 0
versaTag.dispType = "js"
versaTag.ptcl = "HTTP"
versaTag.bsUrl = "bs.serving-sys.com/BurstingPipe"
//versaTag.mobile = 1
//VersaTag activity parameters include all conversion parameters including custom parameters. Syntax: "ParamName1":"ParamValue1", "ParamName2":"ParamValue2". ParamValue can be empty.
versaTag.activityParams = {};
//Static retargeting tags parameters. Syntax: "TagID1":"ParamValue1", "TagID2":"ParamValue2". ParamValue can be empty.
versaTag.retargetParams = {};
//Dynamic retargeting tags parameters. Syntax: "TagID1":"ParamValue1", "TagID2":"ParamValue2". ParamValue can be empty.
versaTag.dynamicRetargetParams = {};
//Third party tags conditional parameters. Syntax: "TagID1":"ParamValue1", "TagID2":"ParamValue2". ParamValue can be empty.
versaTag.conditionalParams = {};
</script>

<script id="ebOneTagUrlId" src="http://ds.serving-sys.com/SemiCachedScripts/ebOneTag.js"></script>
<noscript>
<iframe src="http://bs.serving-sys.com/BurstingPipe?
cn=ot&amp;
onetagid=762&amp;
ns=1&amp;
activityValues=$$
Value=[Value]0&amp;
OrderID=[OrderID]0&amp;
ProductID=[ProductID]&amp;
ProductInfo=[ProductInfo]&amp;
Quantity=[Quantity]&amp;$$&amp;
retargetingValues=$$&amp;
dynamicRetargetingValues=$$&amp;
acp=$$$$&amp;"
style="display:none;width:0px;height:0px"></iframe>
</noscript>





      <header role="main">

        <div id="inner-header" class="clearfix">

          <div id="logo" class="h1"><a href="" rel="nofollow"><img src="../slanding/images/logo.png" alt="ThermoSpas" align="Thermospas"><span class="hidden">Thermospas</span></a></div>

          <p>Phone Support? <span>Call 800-876-0158</span></p>

        </div> <!-- end #inner-header -->

      </header>

 <!-- end header -->

            <section role="main">

      <div id="container">



            <div id="content" class="clearfix">

                <div id="main" class="col940 left first clearfix" role="main">



        <article>

        <!--Main center aligned heading-->

        <h1><span class="heading">

          <script src="/sk/js/thermoheadline.js" type="text/javascript"></script><!--<?=$heading?>-->

                </span></h1>



          <form id="ht_form" action="" method="post">

            <div id="slides">

                <div class="slides_container">

                  <div class="slide">

                    <!--slide Content starts-->
                    <div id="slide_content">
                      <div id='mediaplayer'></div>
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
                        </select>
                        <div id="ht_seatingInfo" class="ht_seatingInfo"></div>
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

                      <?php $ht_date = date('Y-m-d ', strtotime('now')); ?>

                      <input name="ht_date" type="hidden" value="<?=$ht_date?>">
                      <input name="ht_token" type="hidden" value="<?=$ht_token?>" id="ht_token">
                      <input name="lf" type="hidden" value="c1">
                      <input name="url_ref" type="hidden" value="<?=@$url_ref_db?>">
                      <input name="iref" type="hidden" value="<?=$iref?>">
                      <a href="#" class="next" ><button type="submit" name="submit_first" id="submit_first" >Next Step</button></a>
                    </div><!-- #subscribe_pricing -->


                    <div class="caption" style="bottom:0">

                    </div>

                  </div>

                  <div class="slide">

                    <div id="slide_content">
                      <img src="../sk/images/hot-tub.jpg" alt="ThermoSpas Hot Tub" width="570" height="584"/>
                    </div>
                    <div id="subscribe_pricing" >

                      <p>Let us know a little about where you would like to put your hot tub.  This will allow us to come up with accurate pricing information.</p>

                      <div>
                        <select name="ht_location" class="customDropDown" id="ht_location">
                          <option value="">Do you have a location?</option>
                          <option value="outside">Yes: Outside</option>
                          <option value="inside">Yes: Inside</option>
                          <option value="no">Unsure</option>
                        </select>
                        <span id="ht_locationInfo" class="ht_locationInfo"></span>
                      </div>

                      <div>
                        <select name="ht_owner" id="ht_owner" class="customDropDown" >
                          <option value="">Have you owned a hot tub before?</option>
                          <option value="yes">Yes</option>
                          <option value="no">No</option>
                        </select>
                        <span id="ht_ownerInfo" class="ht_ownerInfo"></span>
                      </div>

                      <input type="hidden" name="ht_jets" value="0" />

                      <div>
                        <select name="ht_siteinspection" id="ht_siteinspection" class="customDropDown" />
                          <option value="">Have you had a site inspection?</option>
                          <option value="yes">Yes</option>
                          <option value="no">No</option>
                        </select> <span id="ht_siteinspectionInfo" class="ht_siteinspectionInfo"></span>
                      </div>

                      <div>
                        <input type="text" id="email" name="email" value="" placeholder="*Email"/>
                      </div>

                      <!-- <div>
                        <input type="checkbox" name="email-optin" id="email-optin" style="width:25px; float: left;"><label for="email-optin" style="width: 200px; display: block; padding: 5px 15px; font-size: .95em; line-height: 1.25em;">Yes, I would like to receive emailed ThermoSpas news and discounts</label>
                      </div> -->

                      <p><strong>Good News!</strong> Your FREE information is instantly available to download or view online! If you would prefer to receive it by mail instead, please fill in your address below. Packets may take up to 10 business days for delivery.</p>

                      <div>
                        <input type="text" id="address" name="address" value=""  placeholder="Address (Optional)" />
                      </div>

                      <div>
                        <input type="text" id="city" name="city" value=""  placeholder="City (Optional)" />
                      </div>

                      <div>
                        <select name="state1" id="state1" class="customDropDown" >

                                                <option value="">State (Optional)</option>

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

                      <a href="#" class="next" >
                        <button type="submit" name="submit_second" id="submit_second" >Get Your Quote</button>
                      </a>

                    </div><!--subscribe_pricing ends-->

                    <div class="caption" style="bottom:0"></div>

                  </div>

                </div>

              </div>

          </form>

          <script type="text/javascript">
          var __ss_noform = __ss_noform || [];
          __ss_noform.push(['baseURI', 'https://app-PLBR48.sharpspring.com/webforms/receivePostback/MzQyNQAA/']);
          __ss_noform.push(['endpoint', '879d392a-4705-4b0e-b190-e00e69ec694a']);
          __ss_noform.push(['form', 'ht_form']); // this goes inside of the actual embed, along with
          __ss_noform.push(['submitType', 'manual']);
          </script>
          <script type="text/javascript" src="https://koi-PLBR48.sharpspring.com/client/noform.js?ver=1.0" ></script>

        <!--business tagline here-->

        <div id="tagline">

          <h2>Watch the video <?=$vtitle?> now and learn more about ThermoSpas Hot Tubs</h2>

        </div> <!-- #tagline end-->

        </article>



        <div class="grid_4_container">

        <!-- Start Box 1 -->

        <div class="grid_4">

          <div class="box"> <img src='../landing/images/download.jpg' alt='' width="38" height="32" class='alignleft_icon'/>

            <h3>FREE DVD &amp; BROCHURE </h3>

            <hr />

            Get the facts about what to look for in a hot tub including expert insight on:
            <ul style="list-style-type: disc; padding-left: 20px;">
              <li>Proven therapeutic benefits of hot tubs</li>
              <li>The most important component in a hot tub</li>
              <li>Which heaters last up to 10 years longer</li>
              <li>Detailed information on available models</li>
            </ul>

          </div>

        </div>

        <!-- Box 1 END -->

        <!-- Box 2 START-->

        <div class="grid_4">

          <div class="box"> <img src='../landing/images/coupon.jpg' alt='' width="37" height="32" class='alignleft_icon'/>

            <h3>$1000 SAVINGS COUPON </h3>

            <hr />

            $1000 Savings Coupon Includes:
            <ul style="list-style-type: disc; padding-left: 20px;">
              <li>Instant Cash Discount ($400)</li>
              <li>Free Delivery &amp; Installation ($450)</li>
              <li>Free Chemicals Startup Kit ($150)</li>
            </ul>

          </div>

        </div>

        <!-- Box 2 END -->

        <!-- Box 3 START -->

        <div class="grid_4">

          <div class="box"> <img src='../landing/images/secure.jpg' alt='' width="25" height="32" class='alignleft_icon'/>

            <h3>YOUR INFO <br />IS SECURE </h3>

            <hr />

            ThermoSpas takes every precaution to keep your information secure.
            <p>View our <a href="http://www.thermospas.com/privacy-policy.html" target="_new" style="color: #0b58a7;">Privacy Policy</a></p>

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



     <li><a class="simple_image" href="/slides/lounge.jpg" title="ThermoSpas Wave Lounges - Available in many of our hot tubs" target="_blank"><img alt="example6" src="/wp-content/themes/majestics-3.71/timthumb.php?src=/slides/lounge.jpg&h=60&w=60" /></a> </li>

    <li><a class="simple_image" href="/slides/lighting.jpg" title="ThermoSpas Elegant Lighting Effects and Sound Systems" target="_blank"><img alt="ThermoSpas Elegant Lighting Effects and Sound Systems" src="/wp-content/themes/majestics-3.71/timthumb.php?src=/slides/lighting.jpg&h=60&w=60" /></a> </li>

    <li> <a class="simple_image" href="/slides/bubbling-video.jpg" title="Everyone loves the ThermoSpas Bubbling System" target="_blank"><img alt="example6" src="/wp-content/themes/majestics-3.71/timthumb.php?src=/slides/bubbling-video.jpg&h=60&w=60" /></a> </li>

     <li><a class="simple_image" href="/slides/filtration-video.jpg" title="ThermoSpas Filtration System filters the water over 100x more then our competitors" target="_blank"><img alt="example6" src="/wp-content/themes/majestics-3.71/timthumb.php?src=/slides/filtration-video.jpg&h=60&w=60" /></a> </li>

    <li> <a class="simple_image" href="/slides/siteinspection.jpg" title="Request a Free Site Inspection to help measure and plan out your hot tub." target="_blank"><img alt="example6" src="/wp-content/themes/majestics-3.71/timthumb.php?src=/slides/siteinspection.jpg&h=60&w=60" /></a> </li>

<!--

    <li class="last_image"><a class="simple_image" href="/slides/jets-video.jpg" title="Thermospas allows you to choose from 10 to 160 jets" target="_blank"><img alt="example6" src="/wp-content/themes/majestics-3.71/timthumb.php?src=/slides/jets-video.jpg&h=60&w=60" /></a> </li>

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

            </section>



      <footer role="main">

        <div id="inner-footer" class="clearfix">

          <p class="left">&copy; <?php echo date('Y'); ?> ThermoSpas</p>

                    <p class="right"><a href="/privacy-policy.html" target="_new">ThermoSpas Privacy Policy</a></p>

        </div> <!-- end #inner-footer -->



      </footer> <!-- end footer -->





    <!-- scripts are now optimized via Modernizr.load -->

    <script src="slanding/js/cufon-yui.js" type="text/javascript"></script>

    <script src="slanding/js/Qlassik_Bold_700.font.js" type="text/javascript"></script>

        <script type="text/javascript"> Cufon.now(); </script>

    <script type="text/javascript" src="sk/js/scripts.js"></script>

    <script type="text/javascript">

      jwplayer("mediaplayer").setup({

          flashplayer: "../mediaplayer/player.swf",

          width: 570,

          height: 450,

          file: "http://www.youtube.com/watch?v=<?=$video?>",

          stretching: "fill",

          skin: "../mediaplayer/skins/stormtrooper.zip",

          image: "/slides/aquatic_video.jpg"

      });

    </script>



    <!-- MASKED INPUT JQUERY FUNCTION -->

    <script type="text/javascript" src="sk/js/customSelect.js"></script>

    <script type="text/javascript" src="sk/js/jquery.maskedinput.js"></script>

    <script type="text/javascript" src="sk/js/jquery.placeholder.min.js"></script>



    <script type="text/javascript">

    $(function() {

      $('select.customDropDown').customStyle();

      $('input').placeholder();

    });

    </script>



    <script type="text/javascript">

      var jmask = jQuery;

      jmask(function() {

        jmask.mask.definitions['~'] = "[+-]";

        jmask("#phone").mask("(999) 999-9999");



        jmask("#phone").blur(function() {

          jmask("#phoneinfo").html("Unmasked value: " + jmask(this).mask());

        });



      });

    </script>

  <!--[if lt IE 7 ]>

        <script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script>

        <script>window.attachEvent('onload',function(){CFInstall.check({mode:'overlay'})})</script>

    <![endif]-->


  </body>


<?php

function generateToken($length = 8) {

    $characters = "0123456789abcdefghijklmnopqrstuvwxyABCDEFGHIJKLMNOPQRSTUVWXY";

    $randomString = '';

    $datetime = strtotime('now');

  $token = date("YmdHis", $datetime);



  for ($i = 0; $i < $length; $i++) {

        $randomString .= $characters[rand(0, strlen($characters) - 1)];

    }

    return $randomString."Z".$token;

}

?>
