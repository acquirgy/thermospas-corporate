<?php

/* =================================================================== */
/* ====================== Testimonial Manager ======================== */
/* =================================================================== */

/*

Author - Abhin Sharma ( WPTitans )

*/

add_action('admin_init', 'testimonialmanager_add_init');
add_action('admin_menu', 'testimonialmanager_add_admin');

function testimonialmanager_add_admin() {
	 	add_submenu_page("elements.php","Testimonial Manager","Testimonial Manager", 'administrator',"testimonial_manager", 'testimonialmanager_admin');
}



function testimonialmanager_add_init() { 
    
	$path = URL;
  
	if(isset($_GET['page'])&&($_GET['page']=='testimonial_manager')){	
	
	 wp_enqueue_style( 'slidermanager',HURL.'/slidermanager/css/slidermanager.css',false);
	 wp_enqueue_script('slidermanager-script', HURL. '/slidermanager/js/slidermanager.js', array('jquery'), '0.1' );
	 wp_enqueue_script('jquery-ui-sortable');
	 wp_enqueue_script('thickbox');
	 wp_enqueue_style('thickbox');	
	}
	

}



function testimonialmanager_admin() {
      
	  $slide['type'] = 'testimonial';
	  
	  if(isset($_GET['page'])&&$_GET['page']=='testimonial_manager'){
	
		if(isset($_POST['action'])&&$_POST['action']=='save')
		{
			global $flag;
			$flag =true;
            $slides = array();
			
			
			 foreach ( $_POST['slide_type'] as $key => $value )
			{
				$id = '';
				
				$urlimage = '';
				$ilink =  $_POST['link_src'][$key];
				$title =  $_POST['title'][$key];
				$idesc =  $_POST['description'][$key];
				$extra =  $_POST['extra'][$key];
				$picture =  $_POST['picture'][$key];
				$type = "testimonial";
			
				
				$slides[] = array(
				'src' => $urlimage,
				'link' => $ilink ,
				'extra' => $extra,
				'picture' => $picture,
				'description' => $idesc ,
				'type' => $value,
				'id' => $id,
				'title' => $title
				);
				
			}
	
			update_option('hades_testimonial',$slides);
		}
	}
	
	   ?>
	  
     <?php  if(isset($_POST["action"])) echo '<div class="hades_information"><p><strong>Saved.</strong></p></div>'; ?>
      
 
	
    <div class="wrap" id="slider_manager_wrap">
    
      <h2>Testimonial Manager</h2>
        <?php 
	  
	   $slides = get_option("hades_testimonial");
	 
	  
	  ?>
     <div id="slidermanager">
    
     <form action="" method="post" enctype="multipart/form-data">
      
          <div class="toppanel clearfix">
          <a href="#" id="addslide">Add</a>
          <input type="submit" class="button-submit" value="Save" name="managersubmit" />
          </div>
          <div class="slider-lists">
      <ul>
      
      <?php if(get_option("hades_testimonial")){ 
	  $slides = get_option("hades_testimonial");
	  if(!is_array($slides)) $slides = array();
	  foreach($slides as $slide) {
	  ?>
       
       <li class="clearfix contract">
         <div class="slide-head">
             <a href="#" class="move-icon"></a>
             <a href="#" class="max-slide-button slide-toggle-button">Expand</a>
             <a href="#" class="delete-slide-button removeslide">Delete</a>
         </div>
         <div class="slide-body">
                  
          <div class="image-slide slide-panels"> 
          
            <div class="separator clearfix">
                <label for="">Site Link:</label>
                <input type="text" class="inputs" name="link_src[]" value="<?php echo $slide['link'] ?>" />
           </div>
           <div class="separator clearfix">
                <label for="">Client Picture:</label>
                <input type="text" class="inputs" name="picture[]" value="<?php echo $slide['picture'] ?>" />
                <a href="#" class="custom_upload_image_button button"> Upload </a>
           </div>
            <div class="separator clearfix">
                <label for="">Client Name:</label>
                <input type="text" class="inputs" name="title[]" value="<?php echo $slide['title'] ?>" />
           </div>
           
            <div class="separator clearfix">
                <label for="">Extra Info:</label>
                <input type="text" class="inputs" name="extra[]" value="<?php echo $slide['extra'] ?>" />
           </div>
            <div class="lseparator clearfix">     
                <label for="">Testimonial:</label>
                <textarea  cols="30" rows="10" class="inputs" name="description[]"><?php echo stripslashes($slide['description']); ?></textarea>
           </div>      
                
          
          </div>
          
         
          
         
           
          </div> 
          <input type="hidden" name="slide_type[]" value="<?php echo $slide['type'] ?>" class="slide_type" />
        </li>
      
      
      <?php }
	  } else { ?>
        <li class="clearfix">
         <div class="slide-head">
         <a href="#" class="move-icon"></a>
          <a href="#" class="min-slide-button slide-toggle-button">Collapse</a>
         <a href="#" class="delete-slide-button removeslide">Delete</a>
         
         
          
           </div>
         <div class="slide-body">
           
          
           
          <div class="image-slide slide-panels"> 
            <div class="separator clearfix">
                <label for="">Site Link:</label>
                <input type="text" class="inputs" name="link_src[]" value="<?php echo $slide['link'] ?>" />
           </div>
            <div class="separator clearfix">
                <label for="">Client Picture:</label>
                <input type="text" class="inputs" name="picture[]" value="<?php echo $slide['picture'] ?>" />
                <a href="#" class="custom_upload_image_button button"> Upload </a>
           </div>
            <div class="separator clearfix">
                <label for="">Client Name:</label>
                <input type="text" class="inputs" name="title[]" value="<?php echo $slide['title'] ?>" />
           </div>
             <div class="separator clearfix">
                <label for="">Extra Info:</label>
                <input type="text" class="inputs" name="extra[]" value="<?php echo $slide['extra'] ?>" />
           </div>
            <div class="lseparator clearfix">     
                <label for="">Testimonial:</label>
                <textarea  cols="30" rows="10" class="inputs" name="description[]"><?php echo stripslashes($slide['description']); ?></textarea>
           </div>   
                
                
          
          </div>
          
         
          
          
           
          </div> 
          <input type="hidden" name="slide_type[]" value="upload" class="slide_type" />
        </li>
        
       <?php } ?> 
      </ul>
     </div> 
      <input type="hidden" name="action" value="save" />
      </form>
  </div>   
	
</div>	
	<?php
	
	
	
	
	 }