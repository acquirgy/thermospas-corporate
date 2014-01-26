
<div class="slide-wrapper">
<a href="#" class="f-next">next</a>
        <a href="#" class="f-prev">prev</a>
    <div class="featured-slider"><!-- Start of featured slider -->
        
       
        <ul class="featured-post clearfix ">
        <?php 
		$slides = get_option('hades_slides');
		
		if(!is_array($slides))
		$slides = array();
		
		 foreach($slides as $slide) : ?>
		 
          <li class="clearfix"><!-- Start of featured slide -->
            <div class="imageholder"><a href="<?php echo $slide["link"] ?>"><?php
			 $theImageSrc = $slide['src'];
							global $blog_id;
							if (isset($blog_id) && $blog_id > 0) {
							$imageParts = explode('/files/', $theImageSrc);
							if (isset($imageParts[1])) {
								$theImageSrc = '/blogs.dir/' . $blog_id . '/files/' . $imageParts[1];
							}
						}
				 ?>
                
			         <?php 	                   
	echo "<img src='".URL."/timthumb.php?src=".urlencode($theImageSrc)."&amp;h=461&amp;w=980'  />";
	
			 ?>
		 
			</a></div>
           <div class="description">
            <h2 class="custom-font"><?php echo $slide['title']; ?> </h2>
                <p>   <?php echo stripslashes($slide['description']); ?> </p>
             </div>
          </li><!-- End of featured slide -->
        <?php 
		
		endforeach; 
		?>
        </ul>
        
        </div><!-- End of featured slider -->
 </div>   
    
    
    