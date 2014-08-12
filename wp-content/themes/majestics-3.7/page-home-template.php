<?php
/*
Template Name: Home Page Template
*/
?>
<?php get_header(); ?>
<?php  if( ( !get_option("hades_enable_feature_slider") || get_option("hades_enable_feature_slider")=="true" ))
  {  ?>

<div class="slider-wrapper">
  <!-- The Slider Module Begin -->
  <div class="inner-slider-shade clearfix">
    <?php include(HPATH."/slidermanager/slidersettings.php"); ?>
  </div>
</div>
<?php }  ?>
<!-- The Slider Module Ends -->

<!--- ADD CONTACT FORM -->
	<?php include("includes/hp-leadgen-form.php"); ?>
<!-- END CONTACT FORM -->


<div class="clearfix page homepage container">
  <!-- The Homepage Begin -->
  <div class="content">

    <!--- ADD CTA -->
	<?php include("includes/home-special.php"); ?>
    <!-- END CTA -->


  <div class="showcase-section container">
      <div class="title"> <a href="#" class="sprev" style="top: 35px;"></a><a href="#" class="snext" style="top: 35px;"></a>
     	 <div style="text-align:center;"><img src="/slides/tagline1.png" /></div>
      </div>
      <div class="scrollable-section">
        <ul>
          <?php

			 //$query = new  WP_Query("post_type=portfolio&posts_per_page=-1");

			 $query = new WP_Query( array(
			 	'post_type' => 'page',
				'post__in' => array( 521,524,539,527,596,1072 ),
				'orderby' => 'rand'
				)
				);

			 if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post();
			  ?>
          <li>

            <?php


			$home_title = get_post_meta($post->ID, 'home_title', true);
			$home_desc = get_post_meta($post->ID, 'home_desc', true);


		       if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail()) ) :


						 $id = get_post_thumbnail_id();
	          	          $ar = wp_get_attachment_image_src( $id , array(9999,9999) );

				          $theImageSrc = $ar[0];
							global $blog_id;
							if (isset($blog_id) && $blog_id > 0) {
							$imageParts = explode('/files/', $theImageSrc);
							if (isset($imageParts[1])) {
								$theImageSrc = '/blogs.dir/' . $blog_id . '/files/' . $imageParts[1];
							}
						}
				 ?>
            <a href="<?php the_permalink(); ?>" class="">
            <?php

	echo "<img src='".URL."/timthumb.php?src=".urlencode($theImageSrc)."&amp;h=97&amp;w=210' alt='postimage' />";

			          ?>
            </a>
            <?php endif; ?>
            <h2 class="custom-font" style="font-weight:bold; font-size:17px;"><a href="<?php the_permalink() ?>" style="font-weight:bold; font-size:17px;">
            <?
			if (strlen($home_title) > 5) {
				echo $home_title;
			} else {
				the_title();
			}
			?>
              </a></h2>
            <p>

			  <?
			if (strlen($home_desc) > 5) {
				$helper->shortenContent(150,strip_tags($home_desc));
			} else {
				$helper->shortenContent(150,strip_tags(get_the_content()));

			}
			?>
			<div style="margin-top:10px;"><a href="<?php the_permalink() ?>" style="text-decoration:underline; color:#AAAAAA; text-transform:uppercase; float:right; font-size:11px;">Learn More</a></div>

			  <?php  ?>
            </p>
          </li>
          <?php endwhile; endif; ?>
        </ul>
      </div>
    </div>


	<? if (1==2) { ?>


    <div class="homepage-top-columns clearfix">
      <?php if( trim( get_option($shortname."_top_title") ) != ""  || 1==1 ): ?>
      <div class="title">
        <div style="text-align:center;"><img src="/slides/tagline1.png" /></div><? if (1==2) { ?><h4 class='custom-font' style="font-weight:bold">We Turn Water Into Therapy</h4><? } ?>
      </div>
      <?php endif; ?>
      <ul>
        <li>
          <h4 class='custom-font' style="font-weight:bold"><?php echo get_option($shortname."_column1_title"); ?> </h4>
          <div><?php echo stripslashes(get_option($shortname."_column1_text")); ?> </div>
          <a href="<?php echo stripslashes(get_option($shortname."_column1_link")); ?>"><?php echo stripslashes(get_option($shortname."_column1_label")); ?> </a> </li>
        <li>
          <h4 class='custom-font' style="font-weight:bold"><?php echo  stripslashes(get_option($shortname."_column2_title")); ?> </h4>
          <div><?php echo stripslashes(get_option($shortname."_column2_text")); ?> </div>
          <a href="<?php echo stripslashes(get_option($shortname."_column2_link")); ?>"><?php echo stripslashes(get_option($shortname."_column2_label")); ?> </a> </li>
        <li>
          <h4 class='custom-font' style="font-weight:bold"><?php echo stripslashes(get_option($shortname."_column3_title")); ?> </h4>
          <div><?php echo stripslashes(get_option($shortname."_column3_text")); ?> </div>
          <a href="<?php echo stripslashes(get_option($shortname."_column3_link")); ?>"> <?php echo stripslashes(get_option($shortname."_column3_label")); ?> </a> </li>
        <li>
          <h4 class='custom-font' style="font-weight:bold"><?php echo stripslashes(get_option($shortname."_column4_title")); ?> </h4>
          <div><?php echo stripslashes(get_option($shortname."_column4_text")); ?> </div>
          <a href="<?php echo stripslashes(get_option($shortname."_column4_link")); ?>"><?php echo get_option($shortname."_column4_label"); ?> </a> </li>
      </ul>
    </div>
    <!-- The Top 4 columns Ends -->

	<? } ?>

    <!-- START VIDEO -->
	<div class="title" style="margin:10px 0px">
      <div style="text-align:center;"><img src="/slides/tagline3.jpg" /></div><? if (1==2) { ?><h4 class='custom-font' style="font-weight:bold">ThermoSpas Hot Tub Videos</h4><? } ?>
    </div>
    <div class="  clearfix two-third">
      <h4 class="custom-font">New Aquatic Series Hot Tubs</h4>
      <p>Our new elegant and highest quality ThermoSpas Hot Tubs.</p>
      <script type='text/javascript' src='/mediaplayer/jwplayer.js'></script>
      <div id='mediaplayer'></div>
      <script type="text/javascript">
jwplayer("mediaplayer").setup({
flashplayer: "/mediaplayer/player.swf",
width: 560,
height: 360,
file: "http://www.youtube.com/watch?v=1t7eByMGADc",
controlbar: "bottom",
skin: "/mediaplayer/skins/nemesis.zip"
});
</script>
    </div>
	 <div class=" clearright clearfix one-third">
      <h4 class="custom-font">Latest ThermoSpas Blog Posts</h4>


	  <?php
include_once(ABSPATH.WPINC.'/rss.php'); // path to include script
$feed = fetch_rss('http://feeds.feedburner.com/ThermospasHotTubs'); // specify feed url
$items = array_slice($feed->items, 0, 10); // specify first and last item
?>

<?php if (!empty($items)) : ?>
<ul>
<?php foreach ($items as $item) : ?>

<li><a href="<?php echo $item['link']; ?>"><p><?php echo $item['title']; ?></a></p></li>

<?php endforeach; ?>
</ul>
<?php endif; ?>


    </div>

	<br clear="all" />
    <!-- END VIDEO -->
    <?php if(get_option("hades_enable_blurb")!="false") : ?>
    <div class="blurb-wrapper">
      <div class="blurb clearfix">
        <div class="blurb-text"><?php echo get_option("hades_blurb_text");?> </div>
        <a class="more" href="<?php echo get_option("hades_blurb_link");?> "><span class="edge"></span> <span class="mtext"><?php echo get_option("hades_blurb_label");?> </span> </a> </div>
    </div>
    <?php endif; ?>

	<? if (1==2) { ?>

	<div class="showcase-section container">
      <div class="title"> <a href="#" class="sprev"></a><a href="#" class="snext"></a>
        <h4 class='custom-font'>Our latest work</h4>
      </div>
      <div class="scrollable-section">
        <ul>
          <?php

			 $query = new  WP_Query("post_type=portfolio&posts_per_page=-1");
			 if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post();
			  ?>
          <li>
            <?php

		       if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail()) ) :


						 $id = get_post_thumbnail_id();
	          	          $ar = wp_get_attachment_image_src( $id , array(9999,9999) );

				          $theImageSrc = $ar[0];
							global $blog_id;
							if (isset($blog_id) && $blog_id > 0) {
							$imageParts = explode('/files/', $theImageSrc);
							if (isset($imageParts[1])) {
								$theImageSrc = '/blogs.dir/' . $blog_id . '/files/' . $imageParts[1];
							}
						}
				 ?>
            <a href="<?php the_permalink(); ?>" class="">
            <?php

	echo "<img src='".URL."/timthumb.php?src=".urlencode($theImageSrc)."&amp;h=97&amp;w=210' alt='postimage' />";

			          ?>
            </a>
            <?php endif; ?>
            <h2 class="custom-font"><a href="<?php the_permalink() ?>">
              <?php the_title(); ?>
              </a></h2>
            <span> <?php echo get_the_date("M,d Y"); ?> </span>
            <p>
              <?php $helper->shortenContent(100,strip_tags(get_the_content())); ?>
            </p>
          </li>
          <?php endwhile; endif; ?>
        </ul>
      </div>
    </div>

	<? } ?>

    <div class="home-bottom-elements container clearfix">
      <div class="home-widget-area">
        <?php
		  if (   function_exists ( dynamic_sidebar("Home Bottom Widget Area") )   ) dynamic_sidebar ("Home Bottom Widget Area");
		?>
      </div>
      <div class="testimonials clearfix">
        <ul>
          <?php $testimonials = get_option('hades_testimonial'); if(!is_array($testimonials) ) $testimonials = array(); foreach($testimonials as $testimonial) : ?>
          <li>
            <div class="t-text"> <?php echo stripslashes($testimonial["description"]); ?> <span class="tip"></span> </div>
            <ul class="meta-data">
              <li class="testimonial-avatar"> <a href="<?php echo $testimonial["link"]; ?>"> <img src="<?php echo $testimonial["picture"]; ?>" alt="testimonial-image" /> </a> </li>
              <li class="more-info"> <a href=""><?php echo $testimonial["title"]; ?></a> , <span><?php echo $testimonial["extra"]; ?></span> </li>
            </ul>
          </li>
          <?php endforeach; ?>
        </ul>
      </div>
    </div>
  </div>
</div>


<!-- The Homepage Ends -->
<?php get_footer(); ?>
