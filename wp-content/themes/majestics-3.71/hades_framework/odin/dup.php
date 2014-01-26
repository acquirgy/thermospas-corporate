<?php

$h_slides = array();
$h_images_sources = array(URL."/images/1.jpg",URL."/images/2.jpg",URL."/images/3.jpg",URL."/images/4.jpg",URL."/images/5.jpg",URL."/images/6.jpg",URL."/images/7.jpg",URL."/images/8.jpg",URL."/images/9.jpg",URL."/images/10.jpg");
$h_description =  array(
"Aliquam commodo, justo scelerisque suscipit varius, purus ligula posuere justo, gravida dictum odio neque in quam. Vestibulum luctus placerat tincidunt. Sed a est magna, at semper nulla. Fusce pretium bibendum vestibulum. ",
"In pretium blandit mi. Proin odio massa, sagittis a euismod ac, varius non nunc. In hac habitasse platea dictumst. Nullam commodo, urna a blandit faucibus, turpis dui porta lorem, ac varius massa est quis arcu.",
"Morbi porttitor, magna sed rhoncus semper, sapien ipsum auctor orci, in pretium orci nisi a ipsum. Morbi ut ligula purus, a blandit ante. Nullam suscipit, quam non varius tempus, mi tellus vulputate nulla, in pharetra elit ante nec tortor. ",
"Aliquam commodo, justo scelerisque suscipit varius, purus ligula posuere justo, gravida dictum odio neque in quam. Vestibulum luctus placerat tincidunt. Sed a est magna, at semper nulla. Fusce pretium bibendum vestibulum. ",
"In sem magna, pharetra eu pulvinar vitae, porta sit amet arcu. Nunc sagittis convallis egestas. Phasellus vel metus quis neque rhoncus tristique in eu sem. ",
"Aliquam commodo, justo scelerisque suscipit varius, purus ligula posuere justo, gravida dictum odio neque in quam. Vestibulum luctus placerat tincidunt. Sed a est magna, at semper nulla. Fusce pretium bibendum vestibulum. ",
" Aliquam commodo, justo scelerisque suscipit varius, purus ligula posuere justo, gravida dictum odio neque in quam. Vestibulum luctus placerat tincidunt. Sed a est magna, at semper nulla. Fusce pretium bibendum vestibulum.  ",
"Aliquam commodo, justo scelerisque suscipit varius, purus ligula posuere justo, gravida dictum odio neque in quam. Vestibulum luctus placerat tincidunt. Sed a est magna, at semper nulla. Fusce pretium bibendum vestibulum. ",
" Aliquam commodo, justo scelerisque suscipit varius, purus ligula posuere justo, gravida dictum odio neque in quam. Vestibulum luctus placerat tincidunt. Sed a est magna, at semper nulla. Fusce pretium bibendum vestibulum.  ",
"Aliquam commodo, justo scelerisque suscipit varius, purus ligula posuere justo, gravida dictum odio neque in quam. Vestibulum luctus placerat tincidunt. Sed a est magna, at semper nulla. Fusce pretium bibendum vestibulum. ",

);
$h_title =  array(
"Aliquam commodo justo scelerisque. ",
"Vestibulum luctus placerat tincidunt",
"Morbi porttitor, magna sed rhoncus semper ",
"Nullam commodo urna a blandit faucibus. ",
"Vestibulum ante ipsum primis in faucibus orci",
"Morbi ut ligula purus, a blandit ante",
"In sem magna, pharetra eu pulvinar  ",
"Aliquam commodo justo scelerisque",
"In pretium blandit miroin odio massa",
"Aliquam commodo justo scelerisque",
);

$i =0;
foreach($h_title as $title)
{
	$h_slides[] = array(
				'src' => $h_images_sources[$i],
				'link' => "http://themeforest.net/user/wptitans/portfolio" ,
				'description' => $h_description[$i++] ,
				'type' => "upload",
				'id' => "",
				'title' => $title
				);
}

function sethomecolumns()
{
  
  $home_titles = array("We have integrated our TitanEditor Plugin ","Visual Composer at your service!","Powerfull Gallery with built-in Flickr API","Use any font you want or need!");
  $home_text = array("Yes, that's right. Now have full control over what and how your content will look. Create the perfect page with this Shortcode editor on steroids!","Change the secondary color to any color you want, need a nice texture on top of that then it's not a problem. With over 10 textures to choose from anything is possible.","Use your Flickr images between your normal gallery in a very easy to manage gallery manager","Yes, with our font manager your able to ad your own font in a snap and use it for body or titles.");
  $home_label = array("See what's possible","more info","Check the gallery","Learn more");
  $home_link = array("http://wptitans.com/echea/what-we-do/","http://wptitans.com/echea/visual-editor/","http://wptitans.com/echea/gallery/","http://wptitans.com/echea/font-manager/");
   
   for($i=1;$i<5;$i++) {	
   $j = $i -1;
	update_option("hades_column{$i}_title",$home_titles[$j]);
	update_option("hades_column{$i}_text",$home_text[$j]);
	update_option("hades_column{$i}_label",$home_label[$j]);
	update_option("hades_column{$i}_link",$home_link[$j]);
	
   }
	
}

function enable_footer_widgets()
{




		

$sidebars = get_option("sidebars_widgets");
$sidebars["sidebar-3"] = array ( "custombox-7" , "tabbedwidget-4","tag_cloud-4","links-4","contactform-4");
$sidebars["sidebar-4"] = array ( "custombox-8" , "tabbedwidget-9","links-5");
$sidebars["sidebar-5"] = array ( "scrollabepost-4");
$sidebars["sidebar-6"] = array ( "links-6");
$sidebars["sidebar-7"] = array ( "featurepost-6");
$sidebars["sidebar-8"] = array ( "latesttweets-5");
$sidebars["sidebar-9"] = array ( "custombox-9");
$sidebars["sidebar-10"] = array ( );
$sidebars["sidebar-11"] = array ( "nav_menu-4");
$sidebars["sidebar-12"] = array ( "nav_menu-5");
      
//update_option("sidebars_widgets",$sidebars);


// first all the custom boxes

$custom_box = get_option("widget_custombox");	
array_pop($custom_box);
$custom_box[7] =  array
        (
            "link" => "#",
			"description" => "<p>Donec fringilla molestie metus id venenatis. Suspendisse at ornare felis. Quisque sed varius ante. Nullam auctor risus vel lorem feugiat at vulputate felis posuere. Curabitur ut interdum urna. Curabitur nec dui nunc, non feugiat eros. Suspendisse vel ligula turpis. Ut facilisis neque id risus commodo mattis ac in turpis.</p>",
			"title" => "Nunc neque ante, sagittis pharetra faucibus at, sagittis eu eros. Nullam dapibus semper luctus.",
			"intro_image_link" => ""
         ); 		

$custom_box[8] =  array
        (
            "link" => "",
			"description" => "<p>Donec fringilla molestie metus id venenatis. Suspendisse at ornare felis. Quisque sed varius ante. Nullam auctor risus vel lorem feugiat at vulputate felis posuere. Curabitur ut interdum urna. Curabitur nec dui nunc, non feugiat eros. Suspendisse vel ligula turpis. Ut facilisis neque id risus commodo mattis ac in turpis.</p>",
			"title" => "Nunc neque ante, sagittis pharetra faucibus at, sagittis eu eros. Nullam dapibus semper luctus.",
			"intro_image_link" => ""
         ); 		

$custom_box[9] =  array
        (
            "link" => "#",
			"description" => "<p>Vivamus pulvinar, tellus nec scelerisque ornare, nulla eros fermentum quam, ut blandit nisl nisi quis nisl. Ut aliquet dapibus ipsum eu sodales. Donec neque lorem, gravida eu porttitor ac, feugiat.</p>",
			"title" => "Phasellus in placerat est. Proin a justo eu mi tempor interdum sed eget metus. ",
			"intro_image_link" => "http://wptitans.com/echea/files/2011/03/wordpress.png"
         ); 		 		 
		 
$custom_box["_multiwidget"] =   1 ;
//update_option("widget_custombox",$custom_box);

	echo "<pre>"; print_r($sidebars);	echo "</pre>";	
}
