<?php
$path = __FILE__;
$pathwp = explode( 'wp-content', $path );
$wp_url = $pathwp[0];

require_once( $wp_url.'/wp-load.php' );

$header_texture = get_option("hades_header_texture");
$header_texture = (!$header_texture) ? "texture.jpg" : $header_texture; 
$header_texture = get_template_directory_uri()."/sprites/textures/".$header_texture;

$header_color = get_option("hades_header_bg_color");
$header_color = (!$header_color) ? "#434c5c" : "#".$header_color; 

$footer_texture = get_option("hades_footer_texture");
$footer_texture = (!$footer_texture) ? "texture.jpg" : $footer_texture; 
$footer_texture = get_template_directory_uri()."/sprites/textures/".$footer_texture;

$footer_color = get_option("hades_footer_bg_color");
$footer_color = (!$footer_color) ? "#434c5c" : "#".$footer_color; 

$blurb_texture = get_option("hades_blurb_texture");
$blurb_texture = (!$blurb_texture) ? "texture.jpg" : $blurb_texture; 
$blurb_texture = get_template_directory_uri()."/sprites/textures/".$blurb_texture;

$blurb_color = get_option("hades_blurb_bg_color");
$blurb_color = (!$blurb_color) ? "#434c5c" : "#".$blurb_color; 

$top_texture = get_option("hades_top_bg_texture");
$top_texture = (!$top_texture) ? "texture.jpg" : $top_texture; 
$top_texture = get_template_directory_uri()."/sprites/textures/".$top_texture;

$top_color = get_option("hades_top_bg_color");
$top_color = (!$top_color) ? "#434c5c" : "#".$top_color; 

$top_menu_color = get_option("hades_top_menu_links_color");
$top_menu_color = (!$top_menu_color) ? "#a4aec0" : "#".$top_menu_color; 

$top_menu_color_hover = get_option("hades_top_menu_links_color_hover");
$top_menu_color_hover = (!$top_menu_color_hover) ? "#ffffff" : "#".$top_menu_color_hover; 

$menu_color = get_option("hades_menu_links_color");
$menu_color = (!$menu_color) ? "#818792" : "#".$menu_color; 

$menu_color_hover = get_option("hades_menu_links_color_hover");
$menu_color_hover = (!$menu_color_hover) ? "#ffffff" : "#".$menu_color_hover; 

$menu_color_active = get_option("hades_menu_active_color");
$menu_color_active = (!$menu_color_active) ? "#ffffff" : "#".$menu_color_active; 

$menu_bgcolor_hover = get_option("hades_menu_links_bg_color_hover");
$menu_bgcolor_hover = (!$menu_bgcolor_hover) ? "#262e37" : "#".$menu_bgcolor_hover; 

$menu_bgcolor_active = get_option("hades_menu_active_bg_color");
$menu_bgcolor_active = (!$menu_bgcolor_active) ? "#262e37" : "#".$menu_bgcolor_active; 

$menu_bordercolor_hover = get_option("hades_menu_links_border_color_hover");
$menu_bordercolor_hover = (!$menu_bordercolor_hover) ? "#eeeeee" : "#".$menu_bordercolor_hover; 

$menu_bordercolor_active = get_option("hades_menu_active_border_color");
$menu_bordercolor_active = (!$menu_bordercolor_active) ? "#eeeeee" : "#".$menu_bordercolor_active; 

$slider_bg_color = get_option("hades_slider_bg_color");
$slider_bg_color = (!$slider_bg_color) ? "#eeeeee" : "#".$slider_bg_color; 

$a = get_option("hades_body_a_color");
$a = (!$a) ? "#111111" : "#".$a; 

$ah = get_option("hades_body_a_hover_color");
$ah= (!$ah) ? "#555555" : "#".$ah; 

$footer_text_color = get_option("hades_body_footer_color");
$footer_text_color = (!$footer_text_color) ? "#ffffff" : "#".$footer_text_color; 

$fa = get_option("hades_footer_link_color");
$fa = (!$fa) ? "#b5c1db" : "#".$fa; 

$fah = get_option("hades_footer_link_hover_color");
$fah = (!$fah) ? "#ffffff" : "#".$fah; 

$fb = get_option("hades_footer_button_bg_color");
$fb = (!$fb) ? "#eeeeee" : "#".$fb; 

$h1 = get_option("hades_h1");
$h1 = (!$h1) ? "28px" : $h1."px"; 

$h2 = get_option("hades_h2");
$h2 = (!$h2) ? "26px" : $h2."px"; 

$h3 = get_option("hades_h3");
$h3 = (!$h3) ? "24px" : $h3."px"; 

$h4 = get_option("hades_h4");
$h4 = (!$h4) ? "18px" : $h4."px"; 

$h5 = get_option("hades_h5");
$h5 = (!$h5) ? "12px" : $h5."px"; 

$h6 = get_option("hades_h6");
$h6 = (!$h6) ? "10px" : $h6."px"; 


$fwf = get_option("hades_footer_title");
$fwf = (!$fwf) ? "20px" : $fwf."px"; 

$swf = get_option("hades_sidebar_title");
$swf = (!$swf) ? "20px" : $swf."px"; 

$body_size = get_option("hades_bd_size");
$body_size = (!$body_size) ? "12px" : $body_size."px"; 

$fmbg = get_option("hades_footer_menu_bg_color");
$fmbg = (!$fmbg) ? "#262e37" : "#".$fmbg; 

$fmbr = get_option("hades_footer_menu_border_color");
$fmbr = (!$fmbr) ? "#111111" : "#".$fmbr;

$fmc = get_option("hades_footer_menu_color");
$fmc = (!$fmc) ? "#ffffff" : "#".$fmc;

 ?>

<style type="text/css">


#top-bar { background:url(<?php echo $top_texture; ?>) <?php echo $top_color; ?>;  }
.slider-wrapper{ background:url(<?php echo $header_texture; ?>) <?php echo $header_color; ?>;  }
#footer  { background:url(<?php echo $footer_texture; ?>) <?php echo $footer_color; ?>;  }
.page-title-wrapper  { background:url(<?php echo $blurb_texture; ?>) <?php echo $blurb_color; ?>;  }

#top-bar #topmenu li a { color:<?php echo $top_menu_color; ?>;  }
#top-bar #topmenu li:hover a { color:<?php echo $top_menu_color_hover; ?>;  }

#menu>li>a { color:<?php echo $menu_color; ?>;  }
#menu>li>a:hover  { color:<?php echo $menu_color_hover; ?>; background-color:<?php echo $menu_bgcolor_hover; ?>; border:1px solid <?php echo $menu_bordercolor_hover;?> }
#menu li.current_page_item a , #menu li.current-menu-ancestor a { color:<?php echo $menu_color_active; ?>;  background-color:<?php echo $menu_bgcolor_active; ?>;  border:1px solid <?php echo $menu_bordercolor_active;?> }

.feature-slider li div.description a  { background-color:<?php echo $slider_bg_color;?> }

body{ font-size:<?php echo $body_size; ?> ; }

.content a { color:<?php echo $a; ?>; }
.content a:hover {  color:<?php echo $ah; ?>; }
.content h1 { font-size:<?php echo $h1; ?> ; }
.content h2 { font-size:<?php echo $h2; ?> ; } 
.content h3 { font-size:<?php echo $h3; ?> ; }
.content h4 { font-size:<?php echo $h4; ?> ; }
.content h5 { font-size:<?php echo $h5; ?> ; }
.content h6 { font-size:<?php echo $h6; ?> ; } 

.footer-cols .footer-wrap { color:<?php echo $footer_text_color; ?>!important; }
.footer-cols .footer-wrap a { color:<?php echo $fa; ?>!important;  }
.footer-cols .footer-wrap a:hover { color:<?php echo $fah; ?>!important;  }

.footer-cols .footer-wrap #qsubmit , .footer-cols .footer-wrap a.more { background-color:<?php echo $fb;?> }

#menu-footer-menu li a:hover { background: <?php echo $fmbg; ?>; border:1px solid  <?php echo $fmbr; ?>; color:<?php echo $fmc; ?>; }

.footer-wrap h3.custom-box-title , #footer h3.custom-font , #footer h4.custom-font   { font-size:<?php echo $fwf; ?>!important;  }
.sidebar-wrap h3.custom-box-title ,  .sidebar-wrap h5   { font-size:<?php echo $swf; ?> ; }
	 	 
</style>