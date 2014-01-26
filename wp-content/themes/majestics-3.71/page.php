<?php 
    
	get_header(); 
	$hasSidebar = "";
	
	$sidebar =    get_post_meta($post->ID,'_enable_sidebar',true);
	$sidebar = ($sidebar=="") ? "false" : $sidebar;	
	
	
	
  
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
    
<? 


// CHECK FOR VIDEO EXISTS


$video_id =    get_post_meta($post->ID,'video_id',true);
$video_start =    get_post_meta($post->ID,'video_start',true);
$video_image =    get_post_meta($post->ID,'video_image',true);

$GLOBALS[$video_id] = $video_id;
$GLOBALS[$video_image] = $video_image;


if (strlen($video_id) > 5) { ?>
	
<style type="text/css">
<!--
input.textf {
	font-family: Arial, Helvetica, sans-serif !IMPORTANT;
	font-size: 11px !IMPORTANT;
	color: #333333 !IMPORTANT;
	width: 240px !IMPORTANT;
	padding: 3px !IMPORTANT;
	text-align: left !IMPORTANT;
	margin: 5px !IMPORTANT;
	height: 30px !IMPORTANT;
	background-color:#FFFFFF !IMPORTANT;
}
input.texta {
	font-family: Arial, Helvetica, sans-serif !IMPORTANT;
	font-size: 11px !IMPORTANT;
	color: #333333 !IMPORTANT;
	width: 140px !IMPORTANT;
	padding: 3px !IMPORTANT;
	text-align: left !IMPORTANT;
	margin: 5px !IMPORTANT;
	height: 30px !IMPORTANT;
	background-color:#FFFFFF !IMPORTANT;
}
-->
</style>
<div style=" <? if($sidebar=="true") { ?>padding-top:40px;<? } else { ?> margin-top:40px; <? } ?> ">

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
  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" style="margin:0px;">
    <tr>
      <td align="right" valign="top" style="vertical-align:top"><table width="300" height="367" border="0" cellpadding="0" cellspacing="0" bgcolor="#e5e5e5" style="vertical-align:top; background-color:#e5e5e5; background-image:url('http://www.thermospas.com/slides/tbbg.jpg'); background-repeat:repeat-x; padding:5px; border:solid 1px #CCCCCC;">
        <form id="topform" action="/buying-guide-form.php">
        <tr>
          <td colspan="2" style="padding:8px;"><h3 class="custom-font" style="font-size:18px; font-weight:bold; padding:0px; margin:0px">Buying Guide,  DVD & Brochure</h3></td>
        </tr>
        <tr>
          <td colspan="2" style="padding:8px;">Fill out the form to download our Buying Guide,  Brochure and DVD. </td>
        </tr>
        <tr>
          <td colspan="2" align="center"><input name="name" type="text" class="textf" value="Your Name *" onfocus="if (this.value == 'Your Name *') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Your Name *';}"></td>
        </tr>
        <tr>
          <td colspan="2" align="center"><input name="email" type="text" class="textf" value="Your Email *" onfocus="if (this.value == 'Your Email *') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Your Email *';}"></td>
        </tr>

 <tr>
          <td colspan="2" align="center"><input name="address" type="text" class="textf" value="Your Address *" onfocus="if (this.value == 'Your Address *') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Your Address *';}"></td>
        </tr>
 <tr>
          <td colspan="2" align="center"><input name="city" type="text" class="textf" value="Your City *" onfocus="if (this.value == 'Your City *') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Your City *';}"></td>
        </tr>
<tr>
          <td colspan="2" align="center"><input name="state" type="text" class="textf" value="Your State *" onfocus="if (this.value == 'Your State *') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Your State *';}"></td>
        </tr>

        <tr>
          <td colspan="2" align="center"><input name="zip" type="text" class="textf" value="Your Zip Code *" onfocus="if (this.value == 'Your Zip Code *') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Your Zip Code *';}"></td>
        </tr>
		 <tr>
          <td colspan="2" align="center" style="vertical-align:top"><input name="phone" type="text" class="textf" value="Your Phone *" style="float:left" onfocus="if (this.value == 'Your Phone *') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Your Phone *';}"><a href="javascript:ModalPopupsAlert1();"><img src="/slides/question1.png" alt="Question" style="float:left; margin:5px 5px 0px 0px;" border="0" /></a></td>
        </tr>
        <tr>
          <td width="97" align="center" style="vertical-align:top"><img src="http://www.thermospas.com/images/answer.png" width="97" height="11" alt="Answer" style="padding-top:23px; padding-left:4px;" /></td>
          <td align="left"><input name="answer" type="text" class="texta" value="Click Here to Answer" onfocus="if (this.value == 'Click Here to Answer') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Click Here to Answer';}" /></td>
        </tr>
        <tr>
          <td colspan="2" align="center">
		  <input name="subf" type="hidden" value="y" />
		  <input name="post_id" type="hidden" value="<?=$post->ID?>" />
		  <input type="image" src="/slides/download.jpg" alt="Download" style="padding:0px; margin:10px 0px 0px 20px">
		<a href="http://www.thermospas.com/thermospas_privacy_policy.html" target="_new">privacy policy</a>
		</td>
        </tr>
        
        <tr>
          <td colspan="2">&nbsp;</td>
        </tr></form>
      </table></td>
      <td width="610" align="left" valign="top"><script type='text/javascript' src='/mediaplayer/jwplayer.js'></script>
        <div id='mediaplayer'></div>
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
image: "http://www.thermospas.com/slides/<?=$video_image?>"
});
</script></td>
    </tr>
    <tr>
      <td colspan="2" style="text-align:center; padding-top:15px;"><img src="http://www.thermospas.com/slides/shadow.jpg" width="962" height="38" /></td>
    </tr>
  </table>
</div>

<? } 

// END CHECK IF VIDEO EXISTS

?>
    
    <div class="<?php if($sidebar=="true") echo 'two-third-width'; else echo 'full-width';  ?>">
      <?php 	wp_reset_query(); if(have_posts()): while(have_posts()) : the_post(); ?>
      <div class="single-content">
        <?php the_content(); ?>
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