<?php
/*
Template Name: Video Page Template
*/
?>
<?php 
    
	get_header(); 
	$image_flag = false;
	$no_bottom_bar = "yes";

	?>   

<?php 
    
	get_header(); 
	
	$items_limit = get_option("hades_video_item_limit");
	$items_limit =  (!$items_limit) ? 6 : $items_limit ; 
	$limit = get_option("hades_video_limit");
    $limit = (int) (!$limit) ? 250 : $limit;
	
	
	
	
	?>   

   <div class="page-title-wrapper">
       <div class="page-inner-title-wrapper">
         <h1 class="custom-font page-heading container"><?php the_title(); ?></h1>
       </div>
   </div>
       


     
  <div class="container clearfix page video-portfolio-page  <?php echo $hasSidebar; ?>">
  <div class="breadcrumb-wrapper"><div class="breadcrumb clearfix"><?php $helper->the_breadcrumb();?></div></div>
      <div class="content clearfix">
                         
            <div class="<?php if($sidebar=="true") echo 'two-third-width'; else echo 'full-width';  ?>">
             
              <div class="single-content">
             <div class="portfolio-taxonomy clearfix">
                    <ul class="clearfix">
                      <li class="active"><a href="#"> All </a></li>  
                      <?php  wp_list_categories("&title_li=&taxonomy=videocategory");  ?> 
                     </ul>
               </div>
			   <div class="portfolio-four-column portfolio">
              
                <?php query_posts("post_type=video&posts_per_page={$items_limit}&paged=".$paged);   ?>
                <ul class="clearfix">
                   <?php 
                     $d_counter = 0;
                      while ( have_posts() ) : the_post();
					    $video_type = get_post_meta($post->ID,"_video_type",true);
						$video_link = get_post_meta($post->ID,"_video_link",true);
						
						if($video_type=="dedicated")
						{
							$trick_src = $video_link;
							$video_link = "#ded".$d_counter;
							
						}
						
						$id = get_post_thumbnail_id();
						$ar = wp_get_attachment_image_src( $id, array(9999,9999) );
						 $theImageSrc = $ar[0];
											global $blog_id;
											if (isset($blog_id) && $blog_id > 0) {
											$imageParts = explode('/files/', $theImageSrc);
											if (isset($imageParts[1])) {
												$theImageSrc = '/blogs.dir/' . $blog_id . '/files/' . $imageParts[1];
											}
										} 
                        
                        
                          echo "<li><div class='imageholder'><a href='$video_link' class='lightbox' title='".get_the_title()."' >  <span class=\"video-overlay\"></span><img src='".URL."/timthumb.php?src=".urlencode($theImageSrc)."&amp;w=210&amp;h=145' alt=''/></a></div>";
                           
						if($video_type=="dedicated")
						{	
                            $temp = "<div id=\"ded{$d_counter}\" class='hide'>".do_shortcode("[video src='{$trick_src}' height=500 width=500 title='' ]")."</div>
		";
							
				echo $temp;			
						} 
						$cats = get_the_terms( $post->ID , 'videocategory' );
					$str = '';
					if(!is_array($cats))
					$cats = array();
					foreach($cats as $cat)
					{
						$str = $str."<a href='".get_term_link($cat,'videocategory')."'>".$cat->name."</a>";
					}
					
                          echo "  <div class='description'>";	
						   ?>
						  <h2 class="custom-font"><a href="<?php the_permalink() ?>"> <?php the_title(); ?> </a></h2>
                          <?php echo "<small>$str</small>"; ?>
                          <div> 
						   <?php
                          $content = get_the_content('');
                          $content = apply_filters('the_content', $content);
                          $content = str_replace(']]>', ']]&gt;', $content);
                          $helper->shortenContent( $limit ,  strip_tags( $content  ) ); 
                                   
                          echo '</div><a href="'.get_permalink().'" class="more-link">'.__('read more').'</a></div></li>';  $d_counter++;
                       endwhile; 
                   ?>
                </ul>
             
              
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
      