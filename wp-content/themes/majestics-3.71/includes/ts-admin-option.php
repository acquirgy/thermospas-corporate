<?php

$themename = "ThermoSpas";
$shortname = "ts";

$categories = get_categories('hide_empty=0&orderby=name');
$wp_cats = array();
foreach ($categories as $category_list ) {
       $wp_cats[$category_list->cat_ID] = $category_list->cat_name;
}
array_unshift($wp_cats, "Choose a category"); 

$options = array (
 
array( "name" => $themename." Options",
	"type" => "title"),
 

array( "name" => "Homepage",
	"type" => "section"),
array( "type" => "open"),

array( "name" => "ThermoSpas Facebook",
	"desc" => "Enter ThermoSpas Facebook link for the main navigation on the top",
	"id" => $shortname."_facebook_link",
	"type" => "text",
	"std" => ""),

array( "name" => "ThermoSpas Twitter",
	"desc" => "Enter ThermoSpas Twitter link for the main navigation on the top",
	"id" => $shortname."_twitter_link",
	"type" => "text",
	"std" => ""),

array( "name" => "Miss D Page ID",
	"desc" => "Miss D Page ID here",
	"id" => $shortname."_missd_id",
	"type" => "text",
	"std" => ""),

array( "name" => "Design Your Hot Tub ID",
	"desc" => "Design Your Own ID here",
	"id" => $shortname."_dyht_id",
	"type" => "text",
	"std" => ""),

array( "name" => "Promo Section 1",
	"desc" => "Promo content ID here",
	"id" => $shortname."_promo_id1",
	"type" => "text",
	"std" => ""),

array( "name" => "Promo Section 2",
	"desc" => "Promo content ID here",
	"id" => $shortname."_promo_id2",
	"type" => "text",
	"std" => ""),

array( "name" => "Promo Section 3",
	"desc" => "Promo content ID here",
	"id" => $shortname."_promo_id3",
	"type" => "text",
	"std" => ""),

array( "name" => "Promo Section 4",
	"desc" => "Promo content ID here",
	"id" => $shortname."_promo_id4",
	"type" => "text",
	"std" => ""),

array( "name" => "Promo Section 5",
	"desc" => "Promo content ID here",
	"id" => $shortname."_promo_id5",
	"type" => "text",
	"std" => ""),
	
array( "type" => "close")
/*
array( "name" => "Contact Page",
	"type" => "section"),
array( "type" => "open"),

array( "name" => "Contact Information",
	"desc" => "Enter the your contact information.",
	"id" => $shortname."_contact_inforamtion",
	"type" => "textarea",
	"std" => ""),

array( "type" => "close"),

array( "name" => "About Us Page",
	"type" => "section"),
array( "type" => "open"),
	
array( "name" => "Message Title",
	"desc" => "Message title can be here",
	"id" => $shortname."_message_title",
	"type" => "text",
	"std" => ""),
	
array( "name" => "Owl Message",
	"desc" => "Owl's message can be here",
	"id" => $shortname."_owl_message",
	"type" => "textarea",
	"std" => ""),
	
array( "name" => "Google Analytics Code",
	"desc" => "You can paste your Google Analytics or other tracking code in this box. This will be automatically added to the footer.",
	"id" => $shortname."_ga_code",
	"type" => "textarea",
	"std" => ""),	
array( "type" => "close"),

array( "name" => "Submit your own Page",
	"type" => "section"),
array( "type" => "open"),

array( "name" => "Owl Intro",
	"desc" => "Enter the intro message.",
	"id" => $shortname."_submit_intro",
	"type" => "textarea",
	"std" => ""),

array( "name" => "Owl Guidelines",
	"desc" => "Enter the guideline.",
	"id" => $shortname."_submit_guide",
	"type" => "textarea",
	"std" => ""),

array( "name" => "Owl Complete Message",
	"desc" => "Enter the complete message.",
	"id" => $shortname."_submit_complete",
	"type" => "textarea",
	"std" => ""),

array( "name" => "facebook Slogan",
	"desc" => "Enter the facebook text.",
	"id" => $shortname."_submit_facebook",
	"type" => "textarea",
	"std" => ""),

array( "name" => "facebook Link",
	"desc" => "Enter the facebook url.",
	"id" => $shortname."_submit_facebook_link",
	"type" => "text",
	"std" => ""),

array( "name" => "twitter Slogan",
	"desc" => "Enter the twitter text.",
	"id" => $shortname."_submit_twitter",
	"type" => "textarea",
	"std" => ""),

array( "name" => "twitter Link",
	"desc" => "Enter the twitter url.",
	"id" => $shortname."_submit_twitter_link",
	"type" => "text",
	"std" => ""),
array( "type" => "close")
*/ 
);


function ts_theme_add_admin() {
 
global $themename, $shortname, $options;
 
if ( $_GET['page'] == basename(__FILE__) ) {
 
	if ( 'save' == $_REQUEST['action'] ) {
 
		foreach ($options as $value) {
		update_option( $value['id'], $_REQUEST[ $value['id'] ] ); }
 
foreach ($options as $value) {
	if( isset( $_REQUEST[ $value['id'] ] ) ) { update_option( $value['id'], $_REQUEST[ $value['id'] ]  ); } else { delete_option( $value['id'] ); } }
 
	header("Location: admin.php?page=ts-admin-option.php&saved=true");
die;
 
} 
else if( 'reset' == $_REQUEST['action'] ) {
 
	foreach ($options as $value) {
		delete_option( $value['id'] ); }
 
	header("Location: admin.php?page=ts-admin-option.php&reset=true");
die;
 
}
}
 
add_menu_page($themename, $themename, 'administrator', basename(__FILE__), 'mytheme_admin');
}

function ts_theme_add_init() {

$file_dir=get_bloginfo('template_directory');
wp_enqueue_style("functions", $file_dir."/library/css/ts_admin_option.css", false, "1.0", "all");
wp_enqueue_script("rm_script", $file_dir."/library/js/rm_script.js", false, "1.0");

}
function mytheme_admin() {
 
global $themename, $shortname, $options;
$i=0;
 
if ( $_REQUEST['saved'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings saved.</strong></p></div>';
if ( $_REQUEST['reset'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings reset.</strong></p></div>';
 
?>
<div class="wrap rm_wrap">
<h2><?php echo $themename; ?> Settings</h2>
 
<div class="rm_opts">
<form method="post">
<?php foreach ($options as $value) {
switch ( $value['type'] ) {
 
case "open":
?>
 
<?php break;
 
case "close":
?>
 
</div>
</div>
<br />

 
<?php break;
 
case "title":
?>
<p>To easily use the <?php echo $themename;?> theme, you can use the menu below.</p>

 
<?php break;
 
case 'text':
?>

<div class="rm_input rm_text">
	<div class="option_title">
	<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
    <small><?php echo $value['desc']; ?></small>
    </div>
 	<input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_settings( $value['id'] ) != "") { echo stripslashes(get_settings( $value['id'])  ); } else { echo $value['std']; } ?>" />
 <div class="clearfix"></div>
 
 </div>
<?php
break;
 
case 'textarea':
?>

<div class="rm_input rm_textarea">
	<label for="<?php echo $value['id']; ?>" style="width:50%;"><?php echo $value['name']; ?></label>
 	<small><?php echo "- (". $value['desc'] . ")"; ?></small>
 	<textarea name="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" cols="20" rows="10" style="width:50%;"><?php if ( get_settings( $value['id'] ) != "") { echo stripslashes(get_settings( $value['id']) ); } else { echo $value['std']; } ?></textarea>
<div class="clearfix"></div>
 
 </div>
  
<?php
break;
 
case 'select':
?>

<div class="rm_input rm_select">
	<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
	
<select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>">
<?php foreach ($value['options'] as $option) { ?>
		<option <?php if (get_settings( $value['id'] ) == $option) { echo 'selected="selected"'; } ?>><?php echo $option; ?></option><?php } ?>
</select>

	<small><?php echo $value['desc']; ?></small><div class="clearfix"></div>
</div>
<?php
break;
 
case "checkbox":
?>

<div class="rm_input rm_checkbox">
	<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
	
<?php if(get_option($value['id'])){ $checked = "checked=\"checked\""; }else{ $checked = "";} ?>
<input type="checkbox" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" value="true" <?php echo $checked; ?> />


	<small><?php echo $value['desc']; ?></small><div class="clearfix"></div>
 </div>
<?php break; 
case "section":

$i++;

?>

<div class="rm_section">
<div class="rm_title"><h3><img src="<?php bloginfo('template_directory')?>/library/images/trans.png" class="inactive" alt="""><?php echo $value['name']; ?></h3><span class="submit"><input name="save<?php echo $i; ?>" type="submit" value="Save changes" />
</span><div class="clearfix"></div></div>
<div class="rm_options">

 
<?php break;
 
}
}
?>
 
<input type="hidden" name="action" value="save" />
</form>
<form method="post">
<p class="submit">
<!--
<input name="reset" type="submit" value="Reset" />
-->
<input type="hidden" name="action" value="reset" />
</p>
</form>
</div> 
 

<?php
}
?>
<?php
add_action('admin_init', 'ts_theme_add_init');
add_action('admin_menu', 'ts_theme_add_admin');
?>