<?php

	get_header();
	$hasSidebar = "";

	$sidebar =    get_post_meta($post->ID,'_enable_sidebar',true);
	$sidebar = ($sidebar=="") ? "false" : $sidebar;

	$align =  get_post_meta($post->ID,'_sidebar_align',true);
	if($align=="") $align = "right";

	if($sidebar=="true") {
  	if($align == "right") {
      $hasSidebar = "hasRightSidebar";
    } else {
      $hasSidebar = "hasLeftSidebar";
    }
	}

	$image_flag = false;

  $video_id =    get_post_meta($post->ID,'video_id',true);
  $video_start =    get_post_meta($post->ID,'video_start',true);
  $video_image =    get_post_meta($post->ID,'video_image',true);

  $GLOBALS[$video_id] = $video_id;
  $GLOBALS[$video_image] = $video_image;

?>

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

    <?php if (strlen($video_id) > 5) { ?>

      <script type="text/javascript" src="<?=get_bloginfo('template_directory');?>/js/jquery.validate.min.js"></script>
      <script type="text/javascript" src="<?=get_bloginfo('template_directory');?>/js/additional-methods.min.js"></script>

      <div style="<?= $sidebar == "true" ? 'padding-top:40px' : 'margin-top:40px' ?>">

        <table width="100%" border="0" align="left" cellpadding="0" cellspacing="0" style="margin:0px;">
          <tr>
            <td align="right" valign="top" style="vertical-align:top">
              <form id="topform" action="/buying-guide-form.php" class="general-form free-brochure-form" method="post">
                <table border="0" cellpadding="0" cellspacing="0" bgcolor="#e5e5e5">
                  <tr>
                    <td colspan="2">
                      <h3 class="custom-font" style="font-size:18px; font-weight:bold; padding:0px; margin:0px">
                        Free Brochure, DVD & $1,000 Coupon
                      </h3>
                    </td>
                  </tr>
                  <tr>
                    <td colspan="2">
                      Get instant access to learn more about our hot tubs designed to improve your life.
                    </td>
                  </tr>
                  <tr>
                    <td colspan="2" align="center">
                      <input name="name" type="text" class="name textf required defaultInvalid" value="Your Name *" />
                    </td>
                  </tr>
                  <tr>
                    <td colspan="2" align="center">
                      <input name="email" type="text" class="textf required defaultInvalid" value="Your Email *" />
                    </td>
                  </tr>
                  <tr>
                    <td colspan="2" align="center">
                      <input name="address" type="text" class="textf" value="Your Address" />
                    </td>
                  </tr>
                  <tr>
                    <td colspan="2" align="center">
                      <input name="city" type="text" class="textf" value="Your City" />
                    </td>
                  </tr>
                  <tr>
                    <td colspan="2" align="center">
                      <input name="state" type="text" class="textf" value="Your State" />
                    </td>
                  </tr>
                  <tr>
                    <td colspan="2" align="center">
                      <input name="zipcode" type="text" class="textf required defaultInvalid" value="Your Zip Code *" />
                    </td>
                  </tr>
          		    <tr>
                    <td colspan="2" align="center" style="vertical-align:top">
                      <input name="phone" type="text" class="textf required phone defaultInvalid" placeholder="Your Phone *" value="Your Phone *" />
                      <a href="javascript:ModalPopupsAlert1();">
                        <img src="/slides/question1.png" alt="Question" class="question" border="0" />
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <td colspan="2" align="center">
                		  <input name="subf" type="hidden" value="y" />
                		  <input name="post_id" type="hidden" value="<?= $post->ID ?>" />
                		  <button type="submit" class="primary-button">Download Now</button>
          		        <a class="privacy-policy" href="/privacy-policy.html" target="_new">privacy policy</a>
          		      </td>
                  </tr>
                </table>
              </form>
              <script type="text/javascript">
                  var __ss_noform = __ss_noform || [];
                  __ss_noform.push(['baseURI', 'https://app-PLBR48.sharpspring.com/webforms/receivePostback/MzQyNQAA/']);
                  __ss_noform.push(['endpoint', '4285987c-0b3c-481e-ab06-c55b8d021837']);
              </script>
              <script type="text/javascript" src="https://koi-PLBR48.sharpspring.com/client/noform.js?ver=1.0" ></script>
            </td>
            <td width="610" align="left" valign="top">
              <div id='mediaplayer'></div>
            </td>
          </tr>
          <tr>
            <td colspan="2" style="text-align:center; padding-top:15px;">
              <img src="/slides/shadow.jpg" width="962" height="38" />
            </td>
          </tr>
        </table>
      </div>

      <script type='text/javascript' src='/mediaplayer/jwplayer.js'></script>
      <script type="text/javascript">
        jwplayer("mediaplayer").setup({
          flashplayer: "/mediaplayer/player.swf",
          width: 600,
          height: 367,
          file: "http://www.youtube.com/watch?v=<?=$video_id?>",
          <? if (strlen($video_start) >= 1) { ?>start: <?=$video_start?>,<? } ?>
          <? if (1==2) { ?>controlbar: "bottom",<? } ?>
          stretching: "fill",
          <? if (1==1) { ?>skin: "/mediaplayer/skins/stormtrooper.zip",<? } ?>
          <? if (1==2) { ?>skin: "/mediaplayer/skins/nemesis.zip",<? } ?>
          image: "/slides/<?=$video_image?>"
        });
      </script>

      <script type="text/javascript" src="/modal/ModalPopups.js" language="javascript"></script>
      <script type="text/javascript">
        function ModalPopupsAlert1() {
          ModalPopups.Alert("jsAlert1",
              "Why do you need a phone number?",
              "<div style='padding:25px;'>Based upon your responses, we may need to give you a quick call to talk with one of our Senior Hot Tub Support Specialists.  They will be able to provide you some additional pricing information - including the quotes on your hot tub, delivery costs, as well as inform you of any coupons or specials that are available.</div>",
              {
                  width: 500,
            height: 230,
            okButtonText: "Close"
              }
          );
        }
      </script>

      <script>
        $(document).ready(function() {

          $.mask.definitions['~'] = "[+-]";

          $('.free-brochure-form input').each( function() {

            $(this).focus( function() {
              if( $(this).hasClass('phone') ) {
                $(this).mask("(999) 999-9999");
              } else {
                if(this.value==this.defaultValue)this.value='';
              }
            });

            $(this).blur( function() {
              if( $(this).hasClass('phone') ) {
                $(this).mask();
              } else {
                if(this.value=='') this.value = this.defaultValue;
              }

            });
          });

          $('.free-brochure-form').validate({
            focusInvalid: false,
            errorPlacement: function(error,element) {}
          });

        });

        jQuery.validator.addMethod("defaultInvalid", function(value, element) {
            return !(element.value == element.defaultValue);
        },"This field is required.");

      </script>

    <?php } ?>

    <div class="<?= $sidebar == "true" ? 'two-third-width' : 'full-width' ?>">
      <?php wp_reset_query(); if(have_posts()): while(have_posts()) : the_post(); ?>
      <div class="single-content">
        <?php the_content(); ?>
      </div>
      <!-- main content  -->
      <?php endwhile; endif; ?>
    </div>
    <?php wp_reset_query(); if($sidebar=="true") { get_sidebar(); } ?>
  </div>
</div>



<?php get_footer(); ?>