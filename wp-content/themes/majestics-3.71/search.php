<?php 
    
	get_header(); 
	$hasSidebar = "";
	$sidebar = "true";	
    $hasSidebar = "hasRightSidebar";
	
	global $query_string;

$query_args = explode("&", $query_string);
$search_query = array();

foreach($query_args as $key => $string) {
	$query_split = explode("=", $string);
	$search_query[$query_split[0]] = urldecode($query_split[1]);
} // foreach

$search = new WP_Query($search_query);
		?>   



   <div class="page-title-wrapper">
       <div class="page-inner-title-wrapper">
         <h1 class="custom-font page-heading container"><?php printf( __( 'Search Results for: %s', 'h-framework' ), get_search_query()  ); ?> </h1>
       </div>
   </div>
       


     
  <div class="container clearfix page  <?php echo $hasSidebar; ?>">
  <div class="breadcrumb-wrapper"><div class="breadcrumb clearfix"><?php $helper->the_breadcrumb();?></div></div>
      <div class="content clearfix">
                         
            <div class="<?php if($sidebar=="true") echo 'two-third-width'; else echo 'full-width';  ?>">
             
             
                  <div class="single-content"> 
			 
                 <div class="posts-list clearfix posts-grid">
					<?php   
                    global $paged;
                    global $post;
                    global $more ; 
                    query_posts("orderby=date".'&paged='.$paged);
					$image_width = 260;
					$image_height = 180;
                    ?>
            
		           <ul class="clearfix">
                   <?php $i = 0;
	        	        if ( $search->have_posts() ) : while ( $search->have_posts() ) : $search->the_post();
		                $more = 0;
	                ?>
                      <li class="clearfix <?php  if($i%2==0) echo ' clearleft'; else echo ' clearright'; ?>">
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
                       <ul class="extra_info clearfix">
              <li class="author">By <?php the_author_posts_link() ?> </li>
              <li class="date">on <?php echo get_the_date("j F Y"); ?> </li>
              <li class="comment">with <?php comments_number('No Comments', 'One Comment', '% Comments' );?> </li>
             </ul>
                       <a href="<?php the_permalink(); ?>" >
			           <?php 
					  
	                  	echo "<img src='".get_bloginfo('template_directory')."/timthumb.php?src=".urlencode($theImageSrc)."&amp;h={$image_height}&amp;w={$image_width}' alt='postimage' />";
	              
			          ?></a>
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
							  $helper->shortenContent( 200,  strip_tags( $content  ) ); ?>
                             
                              </p>
                               <a class="more-link" href="<?php the_permalink() ?>">Continue &rarr;</a>
                              
                              
                              
                      
                       </div>
                </li>
               
          <?php   $i++; endwhile; else:
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
             
             
             
              </div> <!-- main content  -->
            
             
            
              
               </div>    
                                     
           
            
              <?php  	 wp_reset_query();
		   
			if($sidebar=="true")  
			get_sidebar();  ?>      
                 
      </div>
                  
    
</div> 
    
<?php get_footer(); ?>
      