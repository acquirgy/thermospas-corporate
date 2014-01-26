<?php
/*
Template Name: Blog Default Page Template
*/
?>
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
	
	 $content_limit =  get_option("hades_bloglist_limit");
	  $content_limit = (int) (!$content_limit) ? 250 : $content_limit;
	 
	?>   



   <div class="page-title-wrapper">
       <div class="page-inner-title-wrapper">
         <h1 class="custom-font page-heading container"><?php the_title(); ?></h1>
       </div>
   </div>
       


     
  <div class="container clearfix page blog <?php echo $hasSidebar; ?>">
  <div class="breadcrumb-wrapper"><div class="breadcrumb clearfix"><?php $helper->the_breadcrumb();?></div></div>
      <div class="content clearfix">
                         
            <div class="<?php if($sidebar=="true") echo 'two-third-width'; else echo 'full-width';  ?>">
             
             
            <div class="posts-list clearfix">
					<?php   
                    global $paged;
                    global $post;
                    global $more ; 
                    query_posts("orderby=date".'&paged='.$paged);
					$image_width = 280;
					$image_height = 245;
                    ?>
            
		           <ul class="clearfix">
                   <?php 
	        	        if ( have_posts() ) : while ( have_posts() ) : the_post();
		                $more = 0;
	                ?>
                      <li class="clearfix">
                      <?php 
			        	$width = "full";
			          if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) : 
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
								$width = "half";  
						   ?>
                     <div class="imageholder">
                       <a href="<?php the_permalink(); ?>" >
			           <?php 
	                  	 echo "<img src='".get_bloginfo('template_directory')."/timthumb.php?src=".urlencode($theImageSrc)."&amp;h=300&amp;w=570' alt='postimage' />";
	              
			          ?></a>
                       <ul class="extra_info clearfix">
              <li class="author">Posted by <?php the_author_posts_link() ?> </li>
              <li class="date">Posted on <?php echo get_the_date("j F Y"); ?> </li>
              <li class="cat">Posted in  <?php  
                              
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
              <li class="comment"><?php comments_number('No Comments', 'One Comment', '% Comments' );?> </li>
             </ul>
                      </div>
                       <?php else: $width = "full";  endif; ?>
                       
                       
                      <div class="description <?php echo $width;?> ">
                              <h2 class="custom-font"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                              
                             
                              <p>
                                 <?php  
							  global $more;    // Declare global $more (before the loop).
                              $more = 1;
							  $content = get_the_content('');
							  $content = apply_filters('the_content', $content);
                              $content = str_replace(']]>', ']]&gt;', $content);
							  $helper->shortenContent( $content_limit ,  strip_tags( $content  ) ); ?>
                             
                              </p>
                               <a class="more-link" href="<?php the_permalink() ?>">Continue &rarr;</a>
                              
                               
                      
                       </div>
                </li>
               
          <?php  $i++; endwhile; else:
              _e( '<h4>No posts yet !</h4>' , 'h-framework' );
            endif;
        	?>
     </ul>
                    
                  </div>
                  
                  
                  <div class="pagination-panel clearfix">
  
                  <!-- Pagination -->
                  <p class='pagination-prev'>
                     <?php previous_posts_link("Previous Page"); ?>
                  </p>
                  
                  <p class='pagination-next'>
                     <?php next_posts_link("Next Page"); ?>
                  </p> 
                  
                  </div>
              
               </div>    
                                     
           
            
              <?php  	 wp_reset_query();
		   
			if($sidebar=="true")  
			get_sidebar();  ?>      
                 
      </div>
                  
    
</div> 
    
<?php get_footer(); ?>
      