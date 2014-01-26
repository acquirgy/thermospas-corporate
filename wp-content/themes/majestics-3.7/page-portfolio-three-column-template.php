<?php
/*
Template Name: Portfolio 3 Columns Page Template
*/
?>


<?php 
    
	get_header(); 
	
	$items_limit = get_option("hades_portfolio3_item_limit");
	$items_limit =  (!$items_limit) ? 6 : $items_limit ; 
	$limit = get_option("hades_portfolio3_limit");
    $limit = (int) (!$limit) ? 250 : $limit;
	
	
	?>   

   <div class="page-title-wrapper">
       <div class="page-inner-title-wrapper">
         <h1 class="custom-font page-heading container"><?php the_title(); ?></h1>
       </div>
   </div>
       


     
  <div class="container clearfix page portfolio-page  <?php echo $hasSidebar; ?>">
  <div class="breadcrumb-wrapper"><div class="breadcrumb clearfix"><?php $helper->the_breadcrumb();?></div></div>
      <div class="content clearfix">
                         
            <div class="<?php if($sidebar=="true") echo 'two-third-width'; else echo 'full-width';  ?>">
              
              <div class="single-content"> 
			 <div class="portfolio-taxonomy clearfix">
                    <ul class="clearfix">
                      <li class="active"><a href="#"> All </a></li>  
                      <?php  wp_list_categories("&title_li=&taxonomy=portfoliocategory");  ?> 
                     </ul>
               </div>
			    <div class="portfolio-three-column portfolio">
              
              <?php $helper->showPortfolioPosts(array( "post_type"=>"portfolio" , "image_width"=> 275 , "image_height"=> 170, 'extras' => true , 'clear' => 3 , 'content_limit' => $limit , 'limit'=> $items_limit ));  ?>
              
              </div>
                  
               <?php kriesi_pagination(); ?>
            
             
             
             </div> <!-- main content  -->
            
                                      
            </div>  
            
              <?php  	 wp_reset_query();
		   
			if($sidebar=="true")  
			get_sidebar();  ?>      
                 
      </div>
                  
    
</div> 
    
<?php get_footer(); ?>
      