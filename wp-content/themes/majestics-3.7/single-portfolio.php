<?php 
    
	get_header(); 
	?>   

   <div class="page-title-wrapper">
       <div class="page-inner-title-wrapper">
         <h1 class="custom-font page-heading container"><?php the_title(); ?></h1>
       </div>
   </div>
       


     
  <div class="container clearfix page  <?php echo $hasSidebar; ?>">

      <div class="content clearfix">
                         
            <div class="<?php if($sidebar=="true") echo 'two-third-width'; else echo 'full-width';  ?>">
             
            
            
              
              
            <div class="single-content"> 
			
           <?php 	wp_reset_query(); if(have_posts()): while(have_posts()) : the_post(); ?>
                                 
               <div class="portfolio-stage clearfix">
                    <span class="portfolio-zoom"></span>
                   
               <?php 
              	  $work_link = get_post_meta($post->ID,"_portfolio_link",true);
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
	
			      <?php 
	     	  echo " <a href='".$ar[0]."' class='lightbox' title=''><img src='".URL."/timthumb.php?src=".urlencode($theImageSrc)."&amp;h=&amp;w=530' alt=''  />";
		          ?>
                  </a>
             </div>
        
                 <div class="single-description">

                    <p>
			        <?php the_content(); ?>
			        
			        
			        <?php if(trim($work_link)!="") echo " <a href=\"{$work_link}\" class=\"workbutton\">Visit this project.</a>"; ?>
			        
                     </p>
                      
               </div>      
                     
                 
              <div class="extra-projects clearfix images clearleft">
                    
                       <a href="<?php echo URL."/timthumb.php?src=".urlencode($theImageSrc)."&amp;h=&amp;w=530" ?>" class="active"    >
			         <?php 					
	echo "<img src='".URL."/timthumb.php?src=".urlencode($theImageSrc)."&amp;h=80&amp;w=80' alt='".$ar[0]."'  />";
	              
			          ?></a>
                           
                 <?php 
				 $i = 1;
				
                      
            
              $slides =  get_post_meta($post->ID,"gallery_items",true);
              $first_slide = $slides[0];
			  if(!is_array($slides)) $slides = array();
              foreach($slides as $slide) :
                  
               
                          $theImageSrc = $slide["src"];
                          global $blog_id;
                          if (isset($blog_id) && $blog_id > 0) {
                          $imageParts = explode('/files/', $theImageSrc);
                          if (isset($imageParts[1])) {
                              $theImageSrc = '/blogs.dir/' . $blog_id . '/files/' . $imageParts[1];
                          }
                      }
          $cl = '';
              
                          
                          echo " <a  href=\"".URL."/timthumb.php?src=".urlencode($theImageSrc)."&amp;h=&amp;w=530\"  >  <img src='".URL."/timthumb.php?src=".urlencode($theImageSrc)."&amp;h=80&amp;w=80' alt='$slide[src]'  />  </a> ";
                          
                          
               $i++;           endforeach; ?>
                    </div>
                        
                
           
            
                       <p class="prev-post-link">
                      <?php previous_post_link('%link','Previous Project'); ?>
                      </p>
                      
                      <p class="next-post-link">
                      <?php next_post_link('%link','Next Project'); ?>
                      </p>    
             
            
            
            
             <?php endwhile; endif; ?>
             
             </div> <!-- main content  -->
            
              
                
                                     
            </div>  
            
              <?php  	 wp_reset_query();
		   
			if($sidebar=="true")  
			get_sidebar();  ?>      
                 
      </div>
                  
    
</div> 
    
<?php get_footer(); ?>
      