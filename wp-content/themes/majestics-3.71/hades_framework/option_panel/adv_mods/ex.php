<!-- <div class="panel">
<?php


createHadesTextarea(array( 
					  "name" => "Import Settings",
					  "desc" => "paste the settings text here",
					  "id" => $shortname."_import",
					  "type" => "textarea",
					  "std" => ""
					));

     global $wpdb;
	 $output = $wpdb->get_results("SELECT option_name,option_value FROM $wpdb->options WHERE option_name like 'hades%'",ARRAY_A );
	 
	
	 
	 $output = json_encode($output);
	$output = base64_encode($output);	
	
	echo "<textarea> $output </textarea>";
			
  ?>
<a href="<?php get_admin_url()?>admin.php?page=elements.php&import=true" class="button"> Run Importer </a>
</div> -->  
  
  <?php
   
createHadesTextarea(array( 
					  "name" => "Export Settings",
					  "desc" => "copy the settings text here",
					  "id" => $shortname."_export",
					  "type" => "textarea",
					  "std" =>  $output
					));					

				