<?php


add_action('init', 'portfolio_register');
 
function portfolio_register() {
 
	$labels = array(
		'name' => _x('Portfolio', 'post type general name'),
		'singular_name' => _x('Portfolio Item', 'post type singular name'),
		'add_new' => _x('Add New', 'portfolio item'),
		'add_new_item' => __('Add New Portfolio Item'),
		'edit_item' => __('Edit Portfolio Item'),
		'new_item' => __('New Portfolio Item'),
		'view_item' => __('View Portfolio Item'),
		'search_items' => __('Search Portfolio'),
		'not_found' =>  __('Nothing found'),
		'not_found_in_trash' => __('Nothing found in Trash'),
		'parent_item_colon' => ''
	);
 
	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'query_var' => true,
		'menu_icon' => HURL. '/css/i/image.png',
		'rewrite' => true,
		'capability_type' => 'post',
	    '_edit_link' => 'post.php?post=%d',
		'rewrite'=>true,
		'hierarchical' => false,
		'menu_position' => null,
		'supports' => array('title','editor','thumbnail','excerpt')
	  ); 
 
	register_post_type( 'portfolio' , $args );
}

register_taxonomy("portfoliocategory", array("portfolio"), array("hierarchical" => true, "label" => "Portfolio Category", "singular_label" => "type", "rewrite" => true));


add_action("admin_init", "portfolio_admin_init");
 
function portfolio_admin_init(){
  add_meta_box("exportfolio_credits_meta", "Upload Extra Projects Images", "exportfolio_credits_meta", "portfolio", "normal", "high");
  add_meta_box("portfolio_credits_meta", "Upload Images", "portfolio_credits_meta", "portfolio", "normal", "high");
 
}
 

function portfolio_credits_meta() {
  global $post;
  $custom = get_post_custom($post->ID);
  $link = $custom["_portfolio_link"][0];
   if(!$slides) $slides = array( array( "src"=>'' , "link"=>'your link here', "description" => ' some information ' ));
  ?>
  
  <div id="hades_portfolio">
  
  
   <label for="portfolio_link"><?php _e('Project Link','h-framework'); ?></label><input type="text" name="portfolio_link" id="portfolio_link" value="<?php echo $link; ?>" />
  
  
  </div>
  
  <?php
 
}

add_action('save_post', 'portfolio_save_details');

function portfolio_save_details(){
  global $post;
  
  $_POST["portfolio_link"] = (!isset($_POST["portfolio_link"])) ? '' : $_POST["portfolio_link"];
  update_post_meta($post->ID, "_portfolio_link", $_POST["portfolio_link"]);

}



function exportfolio_credits_meta() {
  global $post;
  $custom = get_post_custom($post->ID);
  $slides = unserialize($custom["gallery_items"][0]);
  
  
  
   if(!$slides) $slides = array( array( "src"=>'' , "link"=>'your link here' ));
  ?>
  
  <div id="hades_gallery">
  
  
   <div class="toppanel clearfix">
          <a href="#" id="addslide" class="button"><?php _e('Add item','h-framework'); ?></a>
   </div>
   <div class="slider-lists">
      <ul>
      <?php  foreach($slides as $slide) { ?>
          <li class="clearfix contract">
          
          
         <div class="slide-head">
         <a href="#" class="move-icon"></a>
          <a href="#" class="max-slide-button slide-toggle-button"><?php _e('Expand','h-framework'); ?></a>
         <a href="#" class="delete-slide-button removeslide"><?php _e('Delete','h-framework'); ?></a>
         
         
          
           </div>
         <div class="slide-body">
           
           <div class="image-slide">
            <div class="separator clearfix">
                <label for=""><?php _e('Upload Image:','h-framework'); ?></label>
                <input type="text" class="" name="imagesrc[]" value="<?php echo $slide['src'] ?>" />
                <a href="#" class="custom_upload_image_button button"><?php _e('Upload','h-framework'); ?></a>
           </div>     
            <div class="separator clearfix">
                <label for=""><?php _e('Image Link:','h-framework'); ?></label>
                <input type="text" class="" name="link_src[]" value="<?php echo $slide['link'] ?>" />
           </div>
        
          </div>
          </div>
          
          <input type="hidden" class="hide_mercury" />
           <input type="hidden" name="slide_type[]" value="upload" class="slide_type" />
          </li>
          <?php } ?>
      </ul>
      
   </div>
  
  
  
  </div>
  
  <?php
 
}

add_action('save_post', 'exportfolio_save_details');




function exportfolio_save_details(){
  global $post;
  
   
   
	if(isset($_POST['slide_type'])) {
		
		
			$slides = array();
			
			 foreach ( $_POST['slide_type'] as $key => $value )
			{
				$urlimage = $_POST['imagesrc'][$key];
				$ilink =  $_POST['link_src'][$key];
	
				
				$slides[] = array(
				'src' => $urlimage,
				'link' => $ilink ,
				'type' => $value,
				'title' => ''
				);
				
				
				
			}
			
	 update_post_meta($post->ID, "gallery_items", $slides);
	  update_post_meta($post->ID, "gallery_column", $_POST['gallery_column']);
	}
 

// update_post_meta($post->ID, "video_link", $_POST["video_link"]);

}

function add_exportfolio_scripts()
{
     
  
  wp_enqueue_script('jquery-ui-core');
  wp_enqueue_script('jquery-ui-sortable');
	
    
}

add_action('admin_init','add_exportfolio_scripts');