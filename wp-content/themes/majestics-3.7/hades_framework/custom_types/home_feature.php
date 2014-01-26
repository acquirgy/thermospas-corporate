<?php


add_action('init', 'homefeatured_register');
 
function homefeatured_register() {
 
	$labels = array(
		'name' => _x('Home Featured', 'post type general name'),
		'singular_name' => _x('Home Featured Item', 'post type singular name'),
		'add_new' => _x('Add New', 'portfolio item'),
		'add_new_item' => __('Add New Home Featured Item'),
		'edit_item' => __('Edit Home Featured Item'),
		'new_item' => __('New Home Featured Item'),
		'view_item' => __('View Home Featured Item'),
		'search_items' => __('Search Home Featured'),
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
 
	register_post_type( 'homefeatured' , $args );
}

register_taxonomy("homefeaturedcategory", array("homefeatured"), array("hierarchical" => true, "label" => "Home Featured Category", "singular_label" => "type", "rewrite" => true));


add_action("admin_init", "homefeatured_admin_init");
 
function homefeatured_admin_init(){
  add_meta_box("exhomefeatured_credits_meta", "Upload Extra Projects Images", "exhomefeatured_credits_meta", "homefeatured", "normal", "high");
  
 
}
 



function exhomefeatured_credits_meta() {
  global $post;
  $icon = get_post_meta($post->ID,"icon_link",true);
  
 
  ?>
  
  <p class='clearfix'><label for="icon_link" style='float:left'> Upload Icon </label><input type="text" name="icon_link" id="icon_link"  style='float:left' value="<?php echo $icon;?>" /> 
   <a href="#" class="custom_upload_image_button button" style='float:left'> Upload </a> </p>
  
  <?php
 
}

add_action('save_post', 'exhomefeatured_save_details');




function exhomefeatured_save_details(){
  global $post;
  
    update_post_meta($post->ID, "icon_link", $_POST["icon_link"]);

}

