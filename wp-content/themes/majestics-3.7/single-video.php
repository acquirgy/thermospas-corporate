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
                 
                 <?php
				 $video_type = get_post_meta($post->ID,"_video_type",true);
				 $video_link = get_post_meta($post->ID,"_video_link",true);
				 $work_link = get_post_meta($post->ID,"_work",true);
				switch($video_type){
					
					case "dedicated" : echo do_shortcode("[video src='{$video_link}' height=530 width=530 title='' ]");  break;
					case "youtube" : 
					 $video_link = explode("v=", $video_link);
				    echo do_shortcode("[youtube id='{$video_link[1]}' height=530 width=530 title='' ]");  break;
					case "vimeo" :  
					$video_link = explode("/", $video_link);
				    echo do_shortcode("[vimeo id='".$video_link[count($video_link)-1]."' height=530 width=530 title='' ]");  break;
					
					
					}
						
						?>
                 
                 
               </div>
        
                 <div class="single-description">
                     <div class="title">
                         <h1 class="custom-font page-heading"><?php the_title(); ?></h1>
                     </div>
                    <p>
			        <?php the_content(); ?>
			        
			        
			        <?php if(trim($work_link)!="") echo " <a href=\"{$work_link}\" class=\"workbutton\">Visit this project.</a>"; ?>
			        
                     </p>
                      
               </div>      
                     
                 
             <div class="clearleft">
               <p class="prev-post-link">
              <?php previous_post_link('%link','Previous Project'); ?>
              </p>
              
              <p class="next-post-link">
              <?php next_post_link('%link','Next Project'); ?>
              </p>    
             </div>
            
            
            
             <?php endwhile; endif; ?>
             
             </div> <!-- main content  -->
            
              
                
                                     
            </div>  
            
              <?php  	 wp_reset_query();
		   
			if($sidebar=="true")  
			get_sidebar();  ?>      
                 
      </div>
                  
    
</div> 
    
<?php get_footer(); ?>
      