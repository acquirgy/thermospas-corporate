<?php 


class Video extends WP_Widget {
	
	function Video() {
		/* Widget settings. */
		$widget_ops = array( 'classname' => 'Video', 'description' => __('Create a video widget.','h-framework') );

		/* Widget control settings. */
		$control_ops = array(  );
		 parent::WP_Widget(false,__("Video",'h-framework'),$widget_ops,$control_ops); }
	
	function update($new_instance, $old_instance) {
			$instance = $old_instance; 
			$instance['video_code']= $new_instance['video_code']; 
			$instance['description']= strip_tags($new_instance['description']);
			$instance['title']= strip_tags($new_instance['title']);
			$instance['height']= strip_tags($new_instance['height']);
			$instance['width']= strip_tags($new_instance['width']);
			return $instance;
	}
	function form($instance) {
		 
		$code = esc_attr($instance['video_code']);
		$description = esc_attr($instance['description']);
		$title = esc_attr($instance['title']);
		$width = esc_attr($instance['width']);
		$height = esc_attr($instance['height']); 
		
		
		?>
    
       
       	 <p class="hades-custom">
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'h-framework') ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
		</p>

		<!-- Embed Code: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'video_code' ); ?>"><?php _e('Video Code (280px max) ', 'h-framework') ?></label>
			<textarea style="height:200px;" class="widefat" id="<?php echo $this->get_field_id( 'video_code' ); ?>" name="<?php echo $this->get_field_name( 'video_code' ); ?>"><?php echo  $instance['video_code']; ?></textarea>
		</p>
		
		<!-- Description: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'description' ); ?>"><?php _e('Short Description:', 'h-framework') ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'description' ); ?>" name="<?php echo $this->get_field_name( 'description' ); ?>" value="<?php echo stripslashes( $instance['description'] ); ?>" />
		</p>
        
        <p>
			<label for="<?php echo $this->get_field_id( 'width' ); ?>"><?php _e('Set Width:', 'h-framework') ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'width' ); ?>" name="<?php echo $this->get_field_name( 'width' ); ?>" value="<?php echo stripslashes( $instance['width'] ); ?>" />
		</p>
        
        <p>
			<label for="<?php echo $this->get_field_id( 'height' ); ?>"><?php _e('Set Height:', 'h-framework') ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'height' ); ?>" name="<?php echo $this->get_field_name( 'height' ); ?>" value="<?php echo stripslashes( $instance['height'] ); ?>" />
		</p>
		
<?php
		
		 }
	function widget($args, $instance) { 
	
	extract($args); 
	
	$code = $instance['video_code'];
	$description = esc_attr($instance['description']);
	$title = esc_attr($instance['title']);
	$width = esc_attr($instance['width']);
	$height = esc_attr($instance['height']);
	
		echo $before_widget;
	if($title!="")
		echo $before_title." ".$title .$after_title;
		
		$trick_src = "$code<titan>$height<titan>$width<titan>$title";
		 $temp = "<div id=\"videoowidget\">
			<a href=\"http://www.adobe.com/go/getflashplayer\">
				<img border=\"0\" src=\"http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif\" alt=\"Get Adobe Flash player\" />
			</a>
		</div>
		<script type='text/javascript'>
			// DOCUMENTATION: http://code.google.com/p/swfobject/wiki/documentation
			var flashvars = {};
			flashvars.xmlFile = '".HURL."/helper/request_video.php?src={$trick_src}'; 
			var params = {};
			params.scale = 'noscale';
			params.salign = 'tl';
			params.bgcolor = '#000000';
			params.seamlesstabbing = 'false';
			params.swliveconnect = 'true';
			params.allowfullscreen = 'true';
			params.allowscriptaccess = 'always';
			params.allownetworking = 'all';
			params.base = '';
			var attributes = {};
			attributes.id = 'oxylusflash';
			attributes.align = 'top';
			swfobject.embedSWF('".URL."/js/main.swf', 'videoowidget', '{$width}', '{$height}','9.0.0', false, flashvars, params, attributes);
		</script>
		
		";
  
			
			
		echo "<div class='video-widget'> $temp  <p> $description </p> </div>";
		
		echo  $after_widget;
		
		}
	
	}

add_action('widgets_init', create_function('', 'return
register_widget("Video");'));
?>