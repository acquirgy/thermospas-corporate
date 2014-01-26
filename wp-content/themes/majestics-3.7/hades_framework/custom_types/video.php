<?php


add_action('init', 'video_register');
 
function video_register() {
 
	$labels = array(
		'name' => _x('video', 'post type general name'),
		'singular_name' => _x('video Item', 'post type singular name'),
		'add_new' => _x('Add New', 'video item'),
		'add_new_item' => __('Add New video Item'),
		'edit_item' => __('Edit video Item'),
		'new_item' => __('New video Item'),
		'view_item' => __('View video Item'),
		'search_items' => __('Search video'),
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
		'menu_icon' => HURL. '/css/i/video.png',
		'rewrite' => true,
		'capability_type' => 'post',
	    '_edit_link' => 'post.php?post=%d',
		'rewrite'=>true,
		'hierarchical' => false,
		'menu_position' => null,
		'supports' => array('title','editor','thumbnail','excerpt')
	  ); 
 
	register_post_type( 'video' , $args );
}

register_taxonomy("videocategory", array("video"), array("hierarchical" => true, "label" => "video Category", "singular_label" => "type", "rewrite" => true));


add_action("admin_init", "video_admin_init");
 
function video_admin_init(){

  add_meta_box("video_credits_meta", "Video Details", "video_credits_meta", "video", "normal", "high");
 
}
 

function video_credits_meta() {
  global $post;
  $link = get_post_meta($post->ID,"_video_link",true);
  $type = get_post_meta($post->ID,"_video_type",true);
  $work = get_post_meta($post->ID,"_work",true);
  $options = array("youtube"=>"Youtube Link","vimeo"=>"Vimeo Link","dedicated"=>"Dedicated Video Link");
  ?>
  
  <div id="hades_video">
  
   <div class="hades_input no-border">
   <label for="work">Project Link</label><input type="text" name="work" id="work" value="<?php echo $work; ?>" />
 </div>
 
 
  <div class="hades_input no-border">
   <label for="video_link">Video Link</label><input type="text" name="video_link" id="video_link" value="<?php echo $link; ?>" />
 </div> 
 
  <div class="hades_input no-border">
   <label for="video_type">Video Select</label>
 
    <select name="video_type" id="video_type" class="force-show">
     <?php 
	 $temp = '';
	 foreach($options as $key => $val)
	 {
		 
		 if($key==$type)
		 $temp = "<option value='$key' selected>$val</option>";
		 else
		  $temp = "<option value='$key' >$val</option>";
		  echo $temp;
	 }
	 ?>
	</select>
   </div>
  
  </div>
  
  <?php
 
}

add_action('save_post', 'video_save_details');

function video_save_details(){
  global $post;
  if(isset($_POST["work"]))
  update_post_meta($post->ID, "_work", $_POST["work"]);
  if(isset($_POST["video_link"]))
  update_post_meta($post->ID, "_video_link", $_POST["video_link"]);
  if(isset($_POST["video_type"]))
  update_post_meta($post->ID, "_video_type", $_POST["video_type"]);

}


