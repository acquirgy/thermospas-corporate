<?php 
    
	get_header(); 
	$hasSidebar = "";
	
	$sidebar =    get_post_meta($post->ID,'_enable_sidebar',true);
	$sidebar = ($sidebar=="") ? "true" : $sidebar;	
	
	
	
  
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
         <h1 class="custom-font page-heading container"><?php the_title(); ?></h1>
       </div>
   </div>
       
     
  <div class="container clearfix page single <?php echo $hasSidebar; ?>">
  <div class="breadcrumb-wrapper"><div class="breadcrumb clearfix"><?php $helper->the_breadcrumb();?></div></div>
      <div class="content clearfix">
                         
            <div class="<?php if($sidebar=="true") echo 'two-third-width'; else echo 'full-width';  ?>">
             
              <?php 	wp_reset_query(); if(have_posts()): while(have_posts()) : the_post(); ?>
             
             <div class="single-content"> 
			 
             
              <?php 
		
		if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) {
		?>
                       		
            
                              
        <div class="single-image clearfix">
         <ul class="extra_info clearfix">
              <li class="author">Posted by <?php the_author_posts_link() ?> </li>
              <li class="date">on <?php echo get_the_date("j F Y"); ?> </li>
              <li class="cat">in  <?php  
                              
                              $cats = wp_get_post_categories( $post->ID );
                              $str = ' '; $temp = false;
                              foreach($cats as $c)
                              {
                                  $cat = get_category( $c );
                                  $link = get_category_link( $c );
                                  if(!$temp)
                                   {
                                       
                                       $str = $str."  <a href=' $link' >".$cat->name."</a>";
                                       $temp = true;
                                   }
                                   else
                                    $str = $str."  <a href=' $link' >".$cat->name."</a>";
                              
                              }
                              echo " $str ";
                               ?> </li>
              <li class="comment">with <?php comments_number('No Comments', 'One Comment', '% Comments' );?> </li>
             </ul>
               <?php 
		
		$id = get_post_thumbnail_id();
		$ar = wp_get_attachment_image_src( $id, array(9999,9999) );
	    $theImageSrc = $ar[0];
							global $blog_id;
							if (isset($blog_id) && $blog_id > 0) {
							$imageParts = explode('/files/', $theImageSrc);
							if (isset($imageParts[1])) {
								$theImageSrc = '/blogs.dir/' . $blog_id . '/files/' . $imageParts[1];
							}
						} ?>
	<a href="<?php echo $ar[0]; ?>" class="lightbox">
			         <?php 
	 if($sidebar=="true")                  
	  echo "<img src='".get_bloginfo('template_directory')."/timthumb.php?src=".urlencode($theImageSrc)."&h=300&w=570'  />";
	 else      
	  echo "<img src='".get_bloginfo('template_directory')."/timthumb.php?src=".urlencode($theImageSrc)."&h=360&w=980'  />";
		          
			          ?></a>
        </div>
        
        <?php } ?> 
			      <?php the_content(); ?>
       
                     <?php if(get_option("hades_social_set")==""||get_option("hades_social_set")=="true") { ?>     
         <div class="social-stuff clearfix">
                <h6 class="custom-font heading">Share this:</h6> <?php include(HPATH."/helper/social-stuff.php"); ?>   
         </div>  
        <?php } ?>  
           
            <?php if(get_option("hades_author_bio")=="" || get_option("hades_author_bio")=="true") { ?>                    
                  <div id="authorbox" class="clearfix">  
                            <div class="author-avatar">
                            <?php if (function_exists('get_avatar')) { echo get_avatar( get_the_author_meta('email'), '80' ); }?>  
                            </div>
                            <div class="authortext">   
                             <p><?php the_author_meta('description'); ?></p>  
                             
                          
                          </div>  
              </div>
       <?php }?>     
       
         <?php if(get_option("hades_popular")==""||get_option("hades_popular")=="true") { ?>    
             
           <div class="single-scroller-posts-wrapper">      
  <a href="#" class="single-showcase-next"></a>
 <a href="#" class="single-showcase-prev"></a>
<h6 class="custom-font heading">Related Posts</h6>
 <div class="single-scroller-posts">
  

 <ul class="clearfix" >
            			<?php 
						
						
						$tags = wp_get_post_tags($post->ID);
						if ($tags) {
							$tag_ids = array();
							foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;
							$args=array(
							'tag__in' => $tag_ids,
							'post__not_in' => array($post->ID),
							'posts_per_page'=>5, // Number of related posts that will be shown.
							'caller_get_posts'=>1
							);
						}

						
						$popPosts = new WP_Query( $args );
					  
						while ($popPosts->have_posts()) : $popPosts->the_post();  $more = 0;?>
                        
                        <li class="clearfix" >
                        	<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) : /* if post has post thumbnail */ ?>
                            <div class="image">
                                <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail(array(86,86)); ?></a>
                                <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><h5 class="custom-font"><?php the_title(); ?></h5></a>
                            </div><!--image-->
                            <?php endif; ?>
                        </li>
                        
                        <?php endwhile; ?>
                        
                        <?php wp_reset_query(); ?>

                    </ul>
        
		</div>
        </div>
           
     <?php }?>   
   
               
    <div id="comments_template">
              <?php comments_template(); ?>
    </div>
             
             
              </div> <!-- main content  -->
            
               <?php endwhile; endif; ?>
                
                                     
            </div>  
            
              <?php  	 wp_reset_query();
		   
			if($sidebar=="true")  
			get_sidebar();  ?>      
                 
      </div>
                  
    
</div> 
    
<?php get_footer(); ?>
      