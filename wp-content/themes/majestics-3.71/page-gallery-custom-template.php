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
         <h1 class="custom-font page-heading container"><?php the_title(); ?></h1>
       </div>
   </div>
       


     
  <div class="container clearfix page  <?php echo $hasSidebar; ?>">
  
      <div class="content clearfix">
                         
            <div class="<?php if($sidebar=="true") echo 'two-third-width'; else echo 'full-width';  ?>">
             
             
              
              
             <?php 	wp_reset_query(); if(have_posts()): while(have_posts()) : the_post(); ?>
             
              
              
             <div class="single-content"> 
			 
             
                
              <div id="galleria-gallery">
              <?php 
              $slides = get_post_meta($post->ID,"gallery_items",true);
                
			    foreach($slides as $slide) :
                  
               $theImageSrc = $slide["src"];
                          global $blog_id;
                          if (isset($blog_id) && $blog_id > 0) {
                          $imageParts = explode('/files/', $theImageSrc);
                          if (isset($imageParts[1])) {
                              $theImageSrc = '/blogs.dir/' . $blog_id . '/files/' . $imageParts[1];
                          }
                      }
                         
               echo " <a href=\"".$slide["src"]."\"  > 
			         <img src='".URL."/timthumb.php?src=".urlencode($theImageSrc)."&amp;h=80&amp;w=80' alt='$slide[description]'  title='$slide[title]' /> </a>";
                          
                          
                          endforeach;
			  
			  
			  ?>
              
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
      