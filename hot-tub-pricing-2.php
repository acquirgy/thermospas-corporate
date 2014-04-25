<?
$url_ref = @$_SERVER['HTTP_REFERER'];

if (@$_REQUEST['source'] == "IHSAFF" || @$_REQUEST['src'] == "IHSAFF" || stristr($url_ref, 'IHSAFF') ) {
    $iref = 'IHSAFF';
    $time = time() + (30 * 24 * 60 * 60);
    setcookie ("intsource",$iref, $time);
} else if (@$_REQUEST['source'] == "INTCMJ" || @$_REQUEST['src'] == "INTCMJ" || stristr($url_ref, 'INTCMJ') ) {
    $iref = 'INTCMJ';
    $month = 60 * 60 * 24 * 30 + time();
    if(!isset($_COOKIE['INETCJ']))
        setcookie('INETCJ', date("G:i - m/d/y"), $month);
} else if (@$_REQUEST['src'] == "RSVP" || stristr($url_ref, 'RSVP') ) {
    $iref = 'RSVP';
} else if (@$_REQUEST['src'] == "g" || stristr($url_ref, 'src=g') ) {
    $iref = 'IPPCG';
} else if (@$_REQUEST['src'] == "y" || stristr($url_ref, 'src=y') ) {
    $iref = 'IPPCY';
} else if (@$_REQUEST['src'] == "m" || stristr($url_ref, 'src=m') ) {
    $iref = 'IPPCB';
} else if (@$_REQUEST['src'] == "fb" || stristr($url_ref, 'src=fb') ) {
    $iref = 'IFACE';
} else if (@$_REQUEST['source'] == "INTSWMW" || @$_REQUEST['src'] == "INTSWMW" || stristr($url_ref, 'INTSWMW') ) {
    $iref = 'INTSWMW';
} else if (@$_REQUEST['source'] == "videoad" || @$_REQUEST['src'] == "videoad" || stristr($url_ref, 'videoad') ) {
    $iref = 'INTGVID';
} else if (@$_REQUEST['source'] == "ivalpak" || @$_REQUEST['src'] == "ivalpak" || stristr($url_ref, 'ivalpak') ) {
    $iref = 'INTVALPAK';
} else if (@$_REQUEST['source'] == "IBAMA" || @$_REQUEST['src'] == "IBAMA" || stristr($url_ref, 'IBAMA') ) {
    $iref = 'IBAMA';
} else if (@$_REQUEST['source'] == "ISOCIAL" || @$_REQUEST['src'] == "ISOCIAL" || stristr($url_ref, 'ISOCIAL') ) {
    $iref = 'ISOCIAL';
} else if (@$_REQUEST['source'] == "IPPCF" || @$_REQUEST['src'] == "IPPCF" || stristr($url_ref, 'IPPCF') ) {
    $iref = 'IPPCF';
} else if (@$_REQUEST['source'] == "IPPCPA" || @$_REQUEST['src'] == "IPPCPA" || stristr($url_ref, 'IPPCPA') ) {
    $iref = 'IPPCPA';
} else if (@$_REQUEST['source'] == "IDISP" || @$_REQUEST['src'] == "IDISP" || stristr($url_ref, 'IDISP') ) {
    $iref = 'IDISP';
} else {
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

    <link rel="stylesheet" href="sk/css/style2.css">

    <!-- Grab Google CDN's jQuery, with a protocol relative URL; fall back to local if necessary -->
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="sk/js/jquery-1.7.1.min.js"><\/script>')</script>
    <script type='text/javascript' src='mediaplayer/jwplayer.js'></script>

    <!-- modernizr -->
    <script type="text/javascript" src="sk/js/modernizr.full.min.js"></script>
    <script type="text/javascript" src="sk/js/validation.js"></script>

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

    <!--[if IE 7 ]>    <link rel="stylesheet" type="text/css" href="../sk/css/ie7style.css" media="screen" /> <![endif]-->
    <!--[if IE 8 ]>    <link rel="stylesheet" type="text/css" href="../sk/css/ie8style.css" media="screen" /> <![endif]-->
    <!--[if IE 9 ]>    <link rel="stylesheet" type="text/css" href="../sk/css/ie9style.css" media="screen" /> <![endif]-->

</head>

<body>
    <header role="main">
        <div id="inner-header" class="clearfix">
            <div id="logo" class="h1">
                <a href="" rel="nofollow">
                    <img src="/images/logo-blue-1.png" alt="ThermoSpas" align="Thermospas">
                    <span class="hidden">Thermospas</span>
                </a>
            </div>
            <p>Phone Support? <span>Call 800-876-0158</span></p>
        </div>
    </header>

    <section role="main">
        <div id="container">
            <div id="content" class="clearfix">
                <div id="main" class="col940 left first clearfix" role="main">
                    <article>
                        <h1>
                            <span class="heading">
                                <script src="/sk/js/thermoheadline.js" type="text/javascript"></script><!--<?=$heading?>-->
                            </span>
                        </h1>
                        <form id="ht_form" action="" method="post">
                            <div id="slides">
                                <div class="slides_container">
                                    <div class="slide">
                                        <div id="slide_content">
                                            <div id='mediaplayer'></div>
                                        </div>
                                        <div id="subscribe_pricing">
                                            <h2>Let us know what you're looking for...</h2>
                                            <p>...and we'll provide you a quote on the hot tub of your dreams.</p>
                                            <div>
                                                <select name="ht_use" class="customDropDown" id="ht_use">
                                                <? if (isset($_REQUEST['ht_use']) && strlen($_REQUEST['ht_use']) > 2) { ?>
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
                                            <div><input type="text" id="name" name="name" value="" placeholder="*Your Name"/></div>
                                            <div><input type="text" id="zipcode" name="zipcode" value="" placeholder="*Your Zip Code"/></div>
                                            <div><input type="text" id="phone" name="phone" value="" placeholder="*Phone" /></div>
                                            <?php $ht_date = date('Y-m-d ', strtotime('now')); ?>
                                            <input name="ht_date" type="hidden" value="<?=$ht_date?>">
                                            <input name="ht_token" type="hidden" value="<?=$ht_token?>" id="ht_token">
                                            <input name="lf" type="hidden" value="c1">
                                            <input name="url_ref" type="hidden" value="<?=@$url_ref_db?>">
                                            <input name="iref" type="hidden" value="<?=$iref?>">
                                            <a href="#" class="next" ><button type="submit" name="submit_first" id="submit_first" >Next Step</button></a>
                                        </div>
                                        <div class="caption" style="bottom:0"></div>
                                    </div>
                                    <div class="slide">
                                        <div id="slide_content">
                                            <img src="../sk/images/park-ave.jpg" alt="ThermoSpas Hot Tub" width="570" height="450"/>
                                        </div>
                                        <div id="subscribe_pricing" >
                                            <h2>Please let us know about the location</h2>
                                            <p>Let us know where a little about where you would like to put your hot tub.  This will allow us to come up with accurate pricing information and send you a $1,000 coupon, DVD, and complete information package.</p>
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
                                                <select name="ht_jets" id="ht_jets" class="customDropDown" >
                                                    <option selected="selected" value="">What type of jets?</option>
                                                    <option value="">What type of jets would you like?</option>
                                                    <option value="unsure">Not Sure</option>
                                                    <option value="massage">Massaging / Swirling</option>
                                                    <option value="neck">Neck Jets</option>
                                                    <option value="foot">Foot Jets</option>
                                                    <option value="laser">Direct "Laser" Jets</option>
                                                    <option value="combation">Combination</option>
                                                </select>
                                                <span id="ht_jetsInfo" class="ht_jetsInfo"></span>
                                            </div>
                                            <div>
                                                <select name="ht_owner" id="ht_owner" class="customDropDown" >
                                                    <option value="">Have you owned a hot tub before?</option>
                                                    <option value="yes">Yes</option>
                                                    <option value="no">No</option>
                                                </select>
                                                <span id="ht_ownerInfo" class="ht_ownerInfo"></span>
                                            </div>
                                            <div>
                                                <select name="ht_siteinspection" id="ht_siteinspection" class="customDropDown">
                                                    <option value="">Have you had a site inspection?</option>
                                                    <option value="yes">Yes</option>
                                                    <option value="no">No</option>
                                                </select>
                                                <span id="ht_siteinspectionInfo" class="ht_siteinspectionInfo"></span>
                                            </div>
                                            <div><input type="text" id="address" name="address" value=""  placeholder="*Your Address" /></div>
                                            <div><input type="text" id="city" name="city" value=""  placeholder="*Your city" /></div>
                                            <div>
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
                                                </select>
                                                <span id="state1Info" class="state1Info"></span>
                                            </div>
                                            <div>
                                                <input type="text" id="email" name="email" value="" placeholder=" Your Email"/>
                                            </div>
                                            <a href="#" class="next" >
                                                <button type="submit" name="submit_second" id="submit_second" >Get a Quote and DVD Now</button>
                                            </a>
                                        </div>
                                        <div class="caption" style="bottom:0"></div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div id="tagline">
                            <h2>Watch the video <?=$vtitle?> now and learn more about ThermoSpas Hot Tubs</h2>
                        </div>
                    </article>
                    <div class="grid_4_container">
                        <div class="grid_4">
                            <div class="box">
                                <img src='../landing/images/secure.jpg' alt='' width="25" height="32" class='alignleft_icon'/>
                                <h3>YOUR INFO <br />IS SECURE </h3>
                                <hr />Thermospas takes every precaution to keep your information secure.
                            </div>
                        </div>
                        <div class="grid_4">
                            <div class="box">
                                <img src='../landing/images/coupon.jpg' alt='' width="37" height="32" class='alignleft_icon'/>
                                <h3>$1000 SAVINGS COUPON </h3>
                                <hr />
                                <p>Let us know what you are looking for and we'll provide you a $1000 Savings Coupon. Which includes $400 cash off, Free Delivery and Installation ($450) and Free Chemicals Startup Kit ($150) </p>
                            </div>
                        </div>

                        <div class="grid_4">
                            <div class="box">
                                <img src='../landing/images/download.jpg' alt='' width="38" height="32" class='alignleft_icon'/>
                                <h3>FREE DVD &amp; BROCHURE </h3>
                                <hr />
                                <p>We'll send you our Free DVD &amp; Brochure. The free information package will tell you everything you need to know about hot tubs. You can view it immediately online or have it delivered to your home. </p>
                            </div>
                        </div>
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
                            <div class="clear"></div>
                            <h3>View our Hot Tubs </h3>
                            <p>ThermoSpas designs some of the most luxurious hot tubs in the world </p>
                            <ul class="gallery">
                                <li>
                                    <a class="simple_image" href="/slides/lounge.jpg" title="ThermoSpas Wave Lounges - Available in many of our hot tubs" target="_blank">
                                        <img alt="example6" src="/wp-content/themes/majestics-3.71/timthumb.php?src=/slides/lounge.jpg&h=60&w=60" />
                                    </a>
                                </li>
                                <li>
                                    <a class="simple_image" href="/slides/lighting.jpg" title="ThermoSpas Elegant Lighting Effects and Sound Systems" target="_blank">
                                        <img alt="ThermoSpas Elegant Lighting Effects and Sound Systems" src="/wp-content/themes/majestics-3.71/timthumb.php?src=/slides/lighting.jpg&h=60&w=60" />
                                    </a>
                                </li>
                                <li>
                                    <a class="simple_image" href="/slides/bubbling-video.jpg" title="Everyone loves the ThermoSpas Bubbling System" target="_blank">
                                        <img alt="example6" src="/wp-content/themes/majestics-3.71/timthumb.php?src=/slides/bubbling-video.jpg&h=60&w=60" />
                                    </a>
                                </li>
                                <li>
                                    <a class="simple_image" href="/slides/filtration-video.jpg" title="ThermoSpas Filtration System filters the water over 100x more then our competitors" target="_blank">
                                        <img alt="example6" src="/wp-content/themes/majestics-3.71/timthumb.php?src=/slides/filtration-video.jpg&h=60&w=60" />
                                    </a>
                                </li>
                                <li>
                                    <a class="simple_image" href="/slides/siteinspection.jpg" title="Request a Free Site Inspection to help measure and plan out your hot tub." target="_blank">
                                        <img alt="example6" src="/wp-content/themes/majestics-3.71/timthumb.php?src=/slides/siteinspection.jpg&h=60&w=60" />
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!--column_half_last ends-->
                    </div>
                    <!--content_bottom_bg starts-->
                    <div id="content_bottom">
                        <div class="column_3">
                            <h4>What others say</h4>
                            <div class="testimonial">
                                <div>
                                    <p>"  It is very relaxing and lets us melt away the tensions of the day. It is a great opportunity to talk undisturbed. No phone, no computer, no distractions . "</p>
                                    <p> Rosalind Gambardella </p>
                                </div>
                                <div>
                                    <p>"  I would like to say that I would recommend ThermoSpa for whatever reason whether it be entertainment, stress or therapy. It has helped my husband and I immeasurably!  "</p>
                                    <p> Mrs. Christine L. Silva </p>
                                </div>
                            </div>
                        </div>
                        <div class="column_3">
                            <h4>Financing Available </h4>
                            <p>Let us know what hot tub you're looking for and we'll provide you with some financing information. </p>
                        </div>
                        <div class="column_3_last">
                        </div>
                    </div> <!--content_bottom ends-->
                </div> <!-- #main end -->
            </div> <!-- #content end -->
        </div> <!-- end #container -->
    </section>
    <footer role="main">
        <div id="inner-footer" class="clearfix">
            <p class="left">&copy; <?php echo date('Y'); ?> ThermoSpas</p>
            <p class="right"><a href="/privacy-policy.html" target="_new">ThermoSpas Privacy Policy</a></p>
        </div>
    </footer>

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