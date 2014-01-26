<?php




if(isset($_GET['query']))
{

$path = __FILE__;
$pathwp = explode( 'wp-content', $path );
$wp_url = $pathwp[0];

require_once( $wp_url.'/wp-load.php' );
$theme_data = get_theme_data(get_stylesheet_uri());
 
 $choice = $_GET["query"];

 switch($choice)
 {
	 case "version" :  echo $theme_data['Version']; break;
	 case "mame" :  echo $theme_data['Name']; break;
	 case "changelog" :  echo $theme_data['Changelog']; break;
 }
 	
	return;
}


$theme_data = get_theme_data(get_stylesheet_uri());

// Request to check the latest version no
$data = wp_remote_get($theme_data["URI"]."wp-content/themes/".strtolower($theme_data["Name"])."/hades_framework/option_panel/adv_mods/query_update.php?query=version");

if($data->errors)
return;


$v_no = (float)($data['body']);
$theme_vo =(float)($theme_data['Version']); 

if($v_no>$theme_vo)
{
	echo "<div class='hades_information'><p>New Version available :D</p></div>";
	$log_url = $theme_data["URI"]."wp-content/themes/".strtolower($theme_data["Name"])."/changelog.txt";
	echo "<div class='changelog'><h2>Change Log</h2> <p>
		<iframe  src='$log_url' width='100%' height='250'></iframe>
	</p></div>";
	
}
else
{
	echo "<div class='hades_information'><p>your theme is upto date</p></div>";
}
?>

<div class="panel">

<?php createHadesToggle( array( 
					  "name" => "Enable/Disable Sticky update",
					  "desc" => "Enable or disable the sticky note at the top right of options panel.",
					  "id" => $shortname."_sticky_note",
					  "type" => "toggle",
					  "std" => "true"
					)); ?>

</div>