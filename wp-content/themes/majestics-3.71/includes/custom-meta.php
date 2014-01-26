<?php
/* Meta boxes */

function thermospas_add_metabox_settings(){
	add_meta_box("ts_post_meta", "Custom Post Meta", "thermospas_display_options", "post", "normal", "high");
	add_meta_box("ts_post_meta", "Custom Post Meta", "thermospas_display_options", "page", "normal", "high");
}
add_action("admin_init", "thermospas_add_metabox_settings");

function thermospas_display_options($callback_args) {
	global $post;

	$thumbs = array();
	$custom = get_post_custom($post->ID);
	
	$description =  isset($custom["description"][0]) ? $custom["description"][0] : '';
	$featured_link = isset($custom["featured_link"][0]) ? $custom["featured_link"][0] : '';
	$featured_image = isset($custom["featured_image"][0]) ? $custom["featured_image"][0] : '';
	?>	
	<p style="margin-bottom: 22px;">
		<label for="description">Featured Description: </label><br/>
		<textarea id="description" name="description" style="width: 90%"><?php echo esc_textarea($description); ?></textarea><br/>
		<small>(used on Home)</small>
	</p>
	
	<p style="margin-bottom: 22px;">
		<label for="featured_link">Featured Content Custom Link</label>
		<input name="featured_link" id="featured_link" type="text" value="<?php echo esc_attr($featured_link); ?>" size="90" />
		<br /><small>(ex. http://www.thermospas.com)</small>
	</p>
	
	<p style="margin-bottom: 22px;">
		<label for="featured_image">Featured Alternative Image: </label><br/>
		<input id="featured_image" type="text" size="90" name="featured_image" value="<?php echo esc_attr($featured_image); ?>" />
		<input class="upload_image_button" type="button" value="Upload Image" /><br/>
		<small>(enter an URL or upload an image to use as Featured Product Alternative Image)</small>
	</p>
	
	<?php
}

function thermospas_save_details($post_id){
	global $pagenow;
	if ( 'post.php' != $pagenow ) return $post_id;
	
	if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) 
		return $post_id;
		
	if (isset($_POST["description"])) update_post_meta($post_id, "description", stripslashes($_POST["description"]));
	if (isset($_POST["featured_link"])) update_post_meta($post_id, "featured_link", esc_attr($_POST["featured_link"]));
	if (isset($_POST["featured_image"])) update_post_meta($post_id, "featured_image", esc_attr($_POST["featured_image"]));
}
add_action('save_post', 'thermospas_save_details');

function thermospas_upload_scripts() {
	wp_enqueue_script('media-upload');
	wp_enqueue_script('thickbox');
	wp_register_script('my-upload', get_bloginfo('template_directory').'/js/custom_uploader.js', array('jquery','media-upload','thickbox'));
	wp_enqueue_script('my-upload');
}
	 
function thermospas_upload_styles() {
	wp_enqueue_style('thickbox');
}
add_action('admin_print_scripts', 'thermospas_upload_scripts');
add_action('admin_print_styles', 'thermospas_upload_styles');

?>