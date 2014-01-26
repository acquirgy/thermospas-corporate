<div id="footer" class="clearfix footer-column4">
  <div class="inner-footer-wrapper clearfix">
    <div class="container clearfix">
    
      
      <div id="bot_item">
        <div id="bi_list_l">
          <div id="bi_top">
          
        </div>
      </div>
	  
	  
	  <div style="text-align:center"><span class="custom-font" style="text-align:center; font-size:30px; margin:30px 0px 0px 0px; color:#FFFFFF">Call Us: 1-800-876-0158</span>
	 </br><div id="footer-social">
<a href="https://www.facebook.com/ThermoSpas"><img src="http://thermospas.com/images/social/facebook-thermospas.png"></a>
<a href="http://pinterest.com/thermospas/"><img src="http://thermospas.com/images/social/thermospas-pinterest.png"></a>
<a href="http://www.youtube.com/user/ThermoSpaInc?feature=watch"><img src="http://thermospas.com/images/social/thermospas-youtube.png">
<a href="https://www.twitter.com/thermospas"><img src="http://thermospas.com/images/social/thermospas-twitter.png"></a>
</div></div>
	</br>  
<a href="http://www.thermospas.com/thermospas_privacy_policy.html"><div style="text-align:center; color: #ececec;">Thermospas Privacy Policy</div></a>


      <? if (1==2) { ?>
      <div class="footer-cols">
        <?php 
                     if ( function_exists ( dynamic_sidebar("Footer Column 1") ) ) : 
                          dynamic_sidebar ("Footer Column 1"); 
                      endif; 
                     
                      ?>
      </div>
      <div class="footer-cols">
        <?php 
                     if ( function_exists ( dynamic_sidebar("Footer Column 2") ) ) : 
                          dynamic_sidebar ("Footer Column 2"); 
                      endif; 
                     
                      ?>
      </div>
      <div class="footer-cols">
        <?php 
                     if ( function_exists ( dynamic_sidebar("Footer Column 3") ) ) : 
                          dynamic_sidebar ("Footer Column 3"); 
                      endif; 
                     
                      ?>
      </div>
      <div class="footer-cols">
        <?php 
                     if ( function_exists ( dynamic_sidebar("Footer Column 4") ) ) : 
                          dynamic_sidebar ("Footer Column 4"); 
                      endif; 
                     
                      ?>
      </div>
      <? } ?>
    </div>
  </div>
</div>
<div id="footer-menu" class=" clearfix">
  <div class="container">
    <p class="footer-text"><?php echo get_option("hades_footer_bottom_text"); ?></p>
    <?php 
                      if(function_exists("wp_nav_menu") && 1==2)
                      {
                          wp_nav_menu(array(
                                      'theme_location'=>'footer_nav',
                                      'container'=>'ul',
                                      'depth' => 1
                                      )
                                      );
                      }
               ?>
  </div>
</div>
<?php if(get_option("hades_smartscroll")!="false") echo "<span id='smartscroll'></span>"; ?>
<script type="text/javascript">
<?php if (get_option("hades_ga")) { 
  echo stripslashes(get_option("hades_ga")); } ?>
</script>
<?php  wp_footer();  ?>

		<!-- MASKED INPUT JQUERY FUNCTION -->
		<script type="text/javascript" src="<?=get_bloginfo('template_directory')?>/js/customSelect.js"></script>
		<script type="text/javascript" src="<?=get_bloginfo('template_directory')?>/js/jquery.maskedinput.js"></script>
		<script type="text/javascript" src="<?=get_bloginfo('template_directory')?>/js/jquery.placeholder.min.js"></script>

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

<!--Commenting out old GA code
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-86818-1']);
  _gaq.push(['_setDomainName', '.thermospas.com']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
End comment out old GA code 
-->
<? #require_once("/home/thermosp/public_html/chatc.php"); ?>

</body></html>