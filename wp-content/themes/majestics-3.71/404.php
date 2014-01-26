<?php 
    
	get_header(); 
	?>   



   <div class="page-title-wrapper">
       <div class="page-inner-title-wrapper">
         <h1 class="custom-font page-heading container"><?php _e("Page not found",'h-framework'); ?></h1>
       </div>
   </div>
       


     
  <div class="container clearfix page">
  
      <div class="content clearfix">
                         
            <div class="full-width">
             
             
                   <div class="single-content">
                   
                   
                      <h2 class="not-found"><?php _e( get_option("hades_notfound_title") , 'h-framework'); ?> </h2>
                 
                 <p class="not-found"><img src=" <?php 
				     if(!get_option("hades_notfound_logo")) echo URL."/images/notfound.png"; 
				     else echo get_option("hades_notfound_logo"); ?>" atl="Page Not Found" title="Page Not Found" />
                 </p>
                 <p class="not-found"> <?php _e( get_option("hades_notfound_text") , 'h-framework' ); ?> </p>
                 <div class="error-search clearfix"><?php get_search_form(); ?></div>
                   
                   
                    </div> <!-- main content  -->
            
            
              
               </div>    
                                     
           
            
              <?php  	 wp_reset_query();
		   
			if($sidebar=="true")  
			get_sidebar();  ?>      
                 
      </div>
                  
    
</div> 
    
<?php get_footer(); ?>
      