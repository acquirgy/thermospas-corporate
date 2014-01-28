<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="description" content="softivo, business, app landing page, corporate landing page" />
<meta name="keywords" content="business, corporate, landing page, software landing page, app page, template" />
<meta name="author" content="Tansh" />
<title>Softivo by Tansh_v2_video</title>
<!--Attached CSS files here-->
<link rel="stylesheet" media="screen" href="slanding/css/reset.css"/>
<link rel="stylesheet" media="screen" href="slanding/css/style.css"/>
<link rel="stylesheet" media="screen" href="slanding/fancybox/jquery.fancybox-1.3.4.css"/>
<script src="slanding/js/modernizr-1.5.min.js" type="text/javascript"></script>
<script src="slanding/js/jquery-1.6.2.min.js" type="text/javascript"></script>
</head>

<body>
<!--header_top_bg starts-->
<div id="header_top_bg">
  <div id="header_top"> <img src="slanding/images/logo.png" width="135" height="42" alt="logo" class="logo">
    <p>Phone Support? <span>Call 123-456-7890</span></p>
    <div class="clear"></div>
  </div>
</div>
<!--header_top_bg ends--> 

<!--wrapper_bg starts-->
<div id="wrapper_bg">
  <div id="wrapper"> 
    
    <!--header starts-->
    <div id="header"> 
      
      <!--Main center aligned heading-->
      <h1><span class="heading">
        <?=$heading?>
      </span></h1>
      
      <!--video starts-->
      <div id="video_bg">
       <script type='text/javascript' src='/mediaplayer/jwplayer.js'></script>
    <div id='mediaplayer'></div>
    <script type="text/javascript">
jwplayer("mediaplayer").setup({
flashplayer: "/mediaplayer/player.swf",
width: 600,
height: 450,
file: "http://www.youtube.com/watch?v=<?=$video?>",
stretching: "fill",
skin: "/mediaplayer/skins/stormtrooper.zip",
image: "http://www.thermospas.com/slides/aquatic_video.jpg"
});
</script>
      </div>
      <!--video ends--> 
      
      <!--subscribe_bg starts-->
      <div class="subscribe_bg">
        <div class="subscribe">
          <h2>Let us know what you're looking for...</h2>
          <p>...and we'll provide you pricing information, a FREE DVD &amp; Brochure; with a $1000 Savings Coupon!</p>
          <form id="subform" action="http://tanshcreative.com/softivo-lp-preview/php/subscribe-form.php" method="post">
            <fieldset>
			<p><select name="ht_use" style="width:250px; padding:3px; margin:5px 0px; border:solid 1px #CCCCCC;">
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
			</p>
            <p><select name="ht_seating"  style="width:250px; padding:3px; margin:5px 0px; border:solid 1px #CCCCCC;">
              <? if (strlen($_REQUEST['ht_seating']) > 2) { ?>
              <option value="<?=$_REQUEST['ht_seating']?>" disabled="disabled">Already Selected</option>
              <? } else { ?>
              <option value="NG" selected="selected">How many people?</option>
              <option value="2to3">2-3 person</option>
              <option value="3to4">3-4 person</option>
              <option value="4to5">4-5 person</option>
              <option value="5to6">5-6 person</option>
              <option value="6to+">6+ person</option>
              <? } ?>
            </select>
			</p>
              <p>
                <input id="name" name="name" onFocus="if (this.value == 'Your Name') {this.value = '';}" onBlur="if (this.value == '') {this.value = 'Your Name';}" value="Your Name"/>
              </p>
              <p>
                <input id="email" name="email" onFocus="if (this.value == 'Your Email') {this.value = '';}" onBlur="if (this.value == '') {this.value = 'Your Email';}" value="Your Email"  class="required email" />
              </p>
			  <p>
                <input id="zip" name="zip" onFocus="if (this.value == 'Your Zip Code') {this.value = '';}" onBlur="if (this.value == '') {this.value = 'Your Zip Code';}" value="Your Zip Code"  class="required email" />
              </p>
              <p>
                <input class="submit" type="submit" value="Get a Quote and DVD Now!"/>
              </p>
              <div id="result_sub"></div>
            </fieldset>
          </form>
        </div>
      </div>
      <!--subscribe_bg ends--> 
      
      <!--business tagline here-->
      <div id="tagline">
        <h2>Softivo. The powerful, easy and affordable application software ever built for etal lorem ipsum dolor sit consecteuteur.</h2>
      </div>
      
      <!--button here-->
      <div class="button_1"><a href="#">Purchase Now</a></div>
      <div class="clear"></div>
    </div>
    <!--header ends--> 
    
    <!--social starts-->
    <div id="social"> 
      
      <!--twitter starts-->
      <div id="twitter"><a title="Follow on twitter" class="tweet_bird" href="http://twitter.com/envato" target="blank"><img src="slanding/images/twitter.png" width="30" height="30" alt="twitter"></a>
        <div id="twitter_list" class="rotate"></div>
        <script src="slanding/js/twitter-feed.js" type="text/javascript"></script> 
        <!-- change the count=4 to the number of your choice to increase number of twits --> 
        <script type="text/javascript" src="http://twitter.com/statuses/user_timeline/envato.json?callback=twitterCallback2&amp;count=4"></script> 
      </div>
      <!--twitter ends--> 
      
      <!--facebook starts-->
      <div id="fb-root"></div>
      <script src="http://connect.facebook.net/en_US/all.js#appId=240024006031970&amp;xfbml=1"></script>
      <fb:like href="http://tanshcreative.com/projecto/index.html" send="true" layout="button_count" width="200" style="padding: 13px 0px 10px 0px;" show_faces="false" action="recommend" font="arial"></fb:like>
      <!--facebook ends--> 
      
    </div>
    <!--social ends--> 
    
    <!--content starts-->
    <div id="content"> 
      
      <!--column_half starts-->
      <div class="column_half">
        <div class="feature_topleft">
          <h4>Powerful</h4>
          <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magnaniam.</p>
        </div>
        <div class="feature_topright">
          <h4>Standard</h4>
          <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magnaniam.</p>
        </div>
        <div class="feature_center">
          <h2>Why Softivo?</h2>
        </div>
        <div class="feature_bottomleft">
          <h4>Affordable</h4>
          <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magnaniam.</p>
        </div>
        <div class="feature_bottomright">
          <h4>Easy</h4>
          <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magnaniam.</p>
        </div>
      </div>
      <!--column_half ends--> 
      
      <!--column_half_last starts-->
      <div class="column_half_last">
        <h3>Findout how powerful, easy and affordable application software for the lorem ipsum dolor.</h3>
        <p>Run your retail store more efficiently with Checkout. Download the free trial and you'll be sold and selling in minutes. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit.</p>
        <ul class="star_bullet">
          <li>Lorem ipsum dolor sit amet elit, consectetuer adipiscing</li>
          <li>Lorem ipsum dolor sit amet elit, consectetuer adipiscing</li>
          <li>Lorem ipsum dolor sit amet elit, consectetuer adipiscing</li>
          <li>Lorem ipsum dolor sit amet elit, consectetuer adipiscing</li>
          <li>Lorem ipsum dolor sit amet elit, consectetuer adipiscing</li>
        </ul>
        <!--this clear div is necessary to separate gallery form above content-->
        <div class="clear"></div>
        <h3>Screenshots of softivo</h3>
        <p>Checkout has a clean and simple interface that lets you focus on your business.</p>
        <!--gallery starts-->
        <ul class="gallery">
          <li><a href="slanding/images/preview/large-1.jpg" class="simple_image" rel="category" title="This is title of image 1"><img src="slanding/images/preview/thumb-1.jpg" width="60" height="60" alt="Image 1" /></a></li>
          <li><a href="slanding/images/preview/large-2.jpg" class="simple_image" rel="category" title="This is title of image 2"><img src="slanding/images/preview/thumb-2.jpg" width="60" height="60" alt="Image 2"/></a> </li>
          <li><a href="slanding/images/preview/large-3.jpg" class="simple_image" rel="category" title="This is title of image 3"><img src="slanding/images/preview/thumb-3.jpg" width="60" height="60" alt="Image 3" /></a> </li>
          <li><a href="slanding/images/preview/large-4.jpg" class="simple_image" rel="category" title="This is title of image 4"><img src="slanding/images/preview/thumb-4.jpg" width="60" height="60" alt="Image 4" /></a> </li>
          <li><a href="slanding/images/preview/large-5.jpg" class="simple_image" rel="category" title="This is title of image 5"><img src="slanding/images/preview/thumb-5.jpg" width="60" height="60" alt="Image 5" /></a> </li>
          <li class="last_image"><a href="slanding/images/preview/large-6.jpg" class="simple_image" rel="category" title="This is title of image 6"><img src="slanding/images/preview/thumb-6.jpg" width="60" height="60" alt="Image 6" /></a> </li>
        </ul>
        <!--gallery ends--> 
      </div>
      <!--column_half_last ends--> 
      
    </div>
    <!--content ends--> 
    
  </div>
  <div class="clear"></div>
</div>
<!--wrapper_bg ends-->

<div class="clear"></div>

<!--content_bottom_bg starts-->
<div id="content_bottom_bg">
  <div id="content_bottom"> 
    
    <!--first column_3 starts-->
    <div class="column_3">
      <h4>What others say</h4>
      <!--testimonial starts-->
      <div class="testimonial"> 
        <!--first testimonial-->
        <div>
          <p>"Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim veniam, quis nostrud consequat. "</p>
          <p><span>John Doe, CEO, Lorem Inc.</span></p>
        </div>
        <!--second testimonial-->
        <div>
          <p>"Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim. "</p>
          <p><span>Willy Joe, CEO, Lorem Inc.</span></p>
        </div>
      </div>
      <!--testimonial ends--> 
    </div>
    <!--first column_3 ends--> 
    
    <!--second column_3 starts-->
    <div class="column_3">
      <h4>Payment method</h4>
      <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>
      <ul class="payment">
        <li><img src="slanding/images/Credit_ card.png" width="32" height="32" alt="credit card"></li>
        <li><img src="slanding/images/PayPal.png" width="32" height="32" alt="credit card"></li>
        <li><img src="slanding/images/master_card.png" width="32" height="32" alt="credit card"></li>
      </ul>
    </div>
    <!--second column_3 ends--> 
    
    <!--last column_3 starts-->
    <div class="column_3_last">
      <h4>Drop us a line!</h4>
      <form  id="form" method="post" action="http://tanshcreative.com/softivo-lp-preview/php/submit-form.php">
        <fieldset>
          <div class="left">
          <p>
            <label for="name">Name </label>
            <input id="name" name="name">
          </p>
          <p>
            <label for="email">E-Mail* </label>
            <input id="email" name="email" class="required email" />
          </p>
          </div> <div class="right">
          <p>
            <label for="message">Message* </label>
            <textarea id="message" name="message" class="required" onFocus="if (this.value == 'Your Message') {this.value = '';}" onBlur="if (this.value == '') {this.value = 'Your Message';}"></textarea>
          </p>
          </div>
          <p class="submit_btn">
            <input class="submit" type="submit" value=""/>
          </p>
          <div id="result"></div>
        </fieldset>
      </form>
    </div>
    <!--last column_3 ends--> 
    
  </div>
  <div class="clear"></div>
</div>
<!--content_bottom ends-->

<div class="clear"></div>

<!--footer_bg starts-->
<div id="footer_bg">
  <div id="footer">
    <p>© copyright 2011 companyname.com</p>
    <ul>
      <li><a href="#">Terms</a></li>
      <li><a href="#">Privacy policy</a></li>
    </ul>
    <div class="clear"></div>
  </div>
</div>
<!--footer_bg ends--> 

<!--Attached jquery files here--> 
<script src="slanding/js/jquery.fancybox-1.3.4.js" type="text/javascript"></script> 
<script src="slanding/js/jquery.cycle.all.min.js" type="text/javascript"></script> 
<script src="slanding/js/jquery.validate.js" type="text/javascript"></script> 
<script src="slanding/js/jquery.form.js" type="text/javascript"></script> 
<script src="slanding/js/cufon-yui.js" type="text/javascript"></script> 
<script src="slanding/js/Qlassik_Bold_700.font.js" type="text/javascript"></script> 
<script src="slanding/js/custom.js" type="text/javascript"></script> 
<script type="text/javascript"> Cufon.now(); </script>
</body>
</html>
