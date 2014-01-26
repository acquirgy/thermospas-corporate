<?php
/*
Template Name: Sitemap
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
	?>   



<div class="page-body-wrapper"></div> 
<div class="container clearfix page <?php echo $hasSidebar; ?>">
           
         <?php	if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) { 	?>
                 <div class="intro-image-holder clearfix">
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
	
			      <?php 
	     	  echo "<img src='".URL."/timthumb.php?src=".urlencode($theImageSrc)."&amp;h=178&amp;w=980' alt='topimage' />";
		          ?>
        </div>
        
        <?php $image_flag = true; } ?> 
           
         <div class="page-content <?php if($image_flag) echo "processmargin"; ?> ">
			  
              <div class="breadcrumb clearfix"><?php $helper->the_breadcrumb();?></div>
			  <div class="content clearfix">
                 
                 <span id="left-divider"></span>
                 <span id="right-divider"></span>
                 
                 
                <?php if($align=="left" && $sidebar=="true") : 
				        get_sidebar(); 
				 endif; ?>
                 
                 <?php 	wp_reset_query(); if(have_posts()): while(have_posts()) : the_post(); ?>
   	            <div class="<?php if($sidebar=="true") echo 'two-third-width'; else echo 'full-width';  ?>">
                  
                  
                  
                  <div class="full_width clearfix"> 
				 <h4>Pages</h4>
                     <ul class="page-list clearfix"><?php wp_list_pages( array( "title_li"=>"" , "depth" => 1 ) ); ?></ul>
                 </div>
                 
               <div class="one-third">
               
                 <h4>Categories</h4>
                      <ul class="page-list"><?php wp_list_categories (array(
					  'title_li'           => ''
					  )); ?></ul>
              
              </div>
              <div class="two-third">   
                 <h4>All Blog Posts:</h4>
                      <ul class="blog-list"><?php $archive_query = new WP_Query('showposts=1000&cat=-8');
                        while ($archive_query->have_posts()) : $archive_query->the_post(); ?>
                         <li>
                          <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a>
                          (<?php comments_number('0', '1', '%'); ?>)
                          </li>
                         <?php endwhile; ?>
                       </ul>
</div>
<div class="one-third">
                 <h4>Archives</h4>
                      <ul class="page-list">
                          <?php wp_get_archives('type=monthly&show_post_count=true'); ?>
                      </ul>
           </div>
				 
                  
                  
                  
                 </div>
            <?php endwhile; endif; ?>
            
            
            <?php  
	 wp_reset_query();
	if($align=="right" &&  $sidebar=="true") 
	        get_sidebar();  ?>      
               
               </div> 
                  
          </div>
    
    
	
            
            
</div>
<?php get_footer(); ?>
      