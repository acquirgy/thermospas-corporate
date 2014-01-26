<?php 
    include(HPATH."/lib/phpFlickr/phpFlickr.php");
    $key = (!get_option("hades_flickr_key")) ? false : get_option("hades_flickr_key");
    $flickr_name = (!get_option("hades_flickr_name")) ? NULL : get_option("hades_flickr_name");    
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
	
	
	?>   



   <div class="page-title-wrapper">
       <div class="page-inner-title-wrapper">
         <h1 class="custom-font page-heading container"><?php the_title(); ?></h1>
       </div>
   </div>
       


     
  <div class="container clearfix page  <?php echo $hasSidebar; ?>">
  <div class="breadcrumb-wrapper"><div class="breadcrumb clearfix"><?php $helper->the_breadcrumb();?></div></div>
      <div class="content clearfix">
                         
            <div class="<?php if($sidebar=="true") echo 'two-third-width'; else echo 'full-width';  ?>">
             
             
              
              
             <?php 	wp_reset_query(); if(have_posts()): while(have_posts()) : the_post(); ?>
             
              
              
              <div class="single-content">
             
             
             <?php if(!$key) { echo '<p class="info"> No API KEY ADDED </p>'; } else { 
  
  $f = new phpFlickr($key);
  $person = $f->people_findByUsername($flickr_name);
  $photos_url = $f->urls_getUserPhotos($person['id']);
  $photos = $f->people_getPublicPhotos($person['id'], NULL, NULL, 16);
 
				   }
   
  ?>
  
              <div id="galleria-gallery">
              <?php 
              $slides = get_post_meta($post->ID,"gallery_items",true);
                
			   foreach ((array)$photos['photos']['photo'] as $photo) { 
		       $theImageSrc = $f->buildPhotoURL($photo, "medium_640");
				echo "<a href='".($theImageSrc)."'  ><img src='".($theImageSrc)."' alt=\"".$photos_url.$photo["id"]."\" title='$photo[title]' /></a>";
				
		}
			  
			  
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
      