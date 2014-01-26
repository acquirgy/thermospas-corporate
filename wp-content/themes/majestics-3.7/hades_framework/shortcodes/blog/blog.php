<?php

/* ===================================================== */
/* -------------------- Recent Posts ------------------- */
/* ===================================================== */
function createRecentPosts($atts,$content)
{
	extract(
	shortcode_atts(array(  
       
		"class"=> '',
		"id" => '' ,
		"count" => 4 ,
		"excerpt" => true,
		"excerpt_length" =>100
    ), $atts)); 
	
	 global $post;
     global $helper;
	 $myposts = get_posts('numberposts='.$count.'&order=DESC&orderby=post_date');
     $retour="<div class='recentposts_shortcode'><ul class='clearfix' >";
       foreach($myposts as $post) :
                setup_postdata($post);
			
			 $retour.='<li>';	
				
				        $custom = get_post_custom($post->ID);
		                $id = get_post_thumbnail_id();
	          	        $ar = wp_get_attachment_image_src( $id , array(9999,9999) );
	    	  
				          $theImageSrc = $ar[0];
							global $blog_id;
							if (isset($blog_id) && $blog_id > 0) {
							$imageParts = explode('/files/', $theImageSrc);
							if (isset($imageParts[1])) {
								$theImageSrc = '/blogs.dir/' . $blog_id . '/files/' . $imageParts[1];
							}
						}
	$retour.='<a href="'.$ar[0].'"  class="lightbox"  ><img src="'.get_bloginfo('template_directory').'/timthumb.php?src='.urlencode($theImageSrc).'&h=115&w=180"  /></a>';
	             
			          
             $retour.='<h4><a href="'.get_permalink().'">'.the_title("","",false).'</a></h4>';
			 if($excerpt==true)
			$retour.= "<p>".$helper->getShortenContent($excerpt_length,get_the_content())."</p>";
			 $retour.= "</li>";
        endforeach;
        $retour.='</ul></div> ';
        return $retour;
}

add_shortcode("recentposts","createRecentPosts");

/* ===================================================== */
/* -------------------- Popular Posts ------------------ */
/* ===================================================== */

function createPopularPosts($atts,$content)
{
	extract(
	shortcode_atts(array(  
       
		"class"=> '',
		"id" => '' ,
		"count" => 4 ,
		"excerpt" => true,
		"excerpt_length" =>100
    ), $atts)); 
	
	 global $post;
     global $helper;
	 $myposts = get_posts('numberposts='.$count.'&order=DESC&orderby=comment_count');
      $retour="<div class='popularposts_shortcode'><ul class='clearfix'>";
       foreach($myposts as $post) :
                setup_postdata($post);
			
			 $retour.='<li>';	
				
				        $custom = get_post_custom($post->ID);
		                $id = get_post_thumbnail_id();
	          	        $ar = wp_get_attachment_image_src( $id , array(9999,9999) );
	    	  
				          $theImageSrc = $ar[0];
							global $blog_id;
							if (isset($blog_id) && $blog_id > 0) {
							$imageParts = explode('/files/', $theImageSrc);
							if (isset($imageParts[1])) {
								$theImageSrc = '/blogs.dir/' . $blog_id . '/files/' . $imageParts[1];
							}
						}
	$retour.='<a href="'.$ar[0].'"  class="lightbox"  ><img src="'.get_bloginfo('template_directory').'/timthumb.php?src='.urlencode($theImageSrc).'&h=115&w=180"  /></a>';
	             
			          
             $retour.='<h4><a href="'.get_permalink().'">'.the_title("","",false).'</a></h4>';
			 if($excerpt==true)
			$retour.= "<p>".$helper->getShortenContent($excerpt_length,get_the_content())."</p>";
			 $retour.= "</li>";
        endforeach;
        $retour.='</ul></div> ';
        return $retour;
}

add_shortcode("popularposts","createPopularPosts");


/* ===================================================== */
/* -----------------------  Posts ---------------------- */
/* ===================================================== */

function createPosts($atts,$content)
{
	extract(
	shortcode_atts(array(  
       
		"class"=> '',
		"id" => '' ,
		"count" => 4 ,
		"excerpt" => true,
		"excerpt_length" =>100,
		"author_name" => '',
		"category_name" => '',
		 "tag"=>''
    ), $atts)); 
	
	 global $post;
     global $helper;
	 
	 if($author_name!="")
	 $author_name = "&author_name={$author_name}";
	 
	 if($category_name!="")
	 $category_name = "&category_name={$category_name}";
	 
	 if($tag!="")
	 $tag = "&tag={$tag}";
	 
	
	 
	 $myposts = get_posts('numberposts='.$count."&order=DESC{$author_name}{$category_name}{$tag}");
      $retour="<div class='posts_shortcode'><ul class='clearfix'>";
     
             foreach($myposts as $post) :
                setup_postdata($post);
			
			 $retour.='<li>';	
				
				        $custom = get_post_custom($post->ID);
		                $id = get_post_thumbnail_id();
	          	        $ar = wp_get_attachment_image_src( $id , array(9999,9999) );
	    	  
				          $theImageSrc = $ar[0];
							global $blog_id;
							if (isset($blog_id) && $blog_id > 0) {
							$imageParts = explode('/files/', $theImageSrc);
							if (isset($imageParts[1])) {
								$theImageSrc = '/blogs.dir/' . $blog_id . '/files/' . $imageParts[1];
							}
						}
	$retour.='<a href="'.$ar[0].'"  class="lightbox"  ><img src="'.get_bloginfo('template_directory').'/timthumb.php?src='.urlencode($theImageSrc).'&h=115&w=180"  /></a>';
	             
			          
             $retour.='<h4><a href="'.get_permalink().'">'.the_title("","",false).'</a></h4>';
			 if($excerpt==true)
			 $retour.= "<p>".$helper->getShortenContent($excerpt_length,get_the_content())."</p>";
			 $retour.= "</li>";
        endforeach;
      
        $retour.='</ul></div> ';
        return $retour;
}

add_shortcode("posts","createPosts");

/* ===================================================== */
/* -------------------- Related Posts ------------------ */
/* ===================================================== */

function createRelatedPosts($atts,$content)
{
	extract(
	shortcode_atts(array(  
       
		"class"=> '',
		"count" => 4 ,
		
    ), $atts)); 
	
	global $wpdb, $post, $table_prefix;
    
	$i =0;
   
	if ($post->ID) {
		$retval = '<div class="relatedposts_shortcode'.$class.'"><ul>';
 		// Get tags
		$tags = wp_get_post_tags($post->ID);
		$tagsarray = array();
		foreach ($tags as $tag) {
			$tagsarray[] = $tag->term_id;
		}
		$tagslist = implode(',', $tagsarray);

		// Do the query
		$q = "SELECT p.*, count(tr.object_id) as count
			FROM $wpdb->term_taxonomy AS tt, $wpdb->term_relationships AS tr, $wpdb->posts AS p WHERE tt.taxonomy ='post_tag' AND tt.term_taxonomy_id = tr.term_taxonomy_id AND tr.object_id  = p.ID AND tt.term_id IN ($tagslist) AND p.ID != $post->ID
				AND p.post_status = 'publish'
				AND p.post_date_gmt < NOW()
 			GROUP BY tr.object_id
			ORDER BY count DESC, p.post_date_gmt DESC
			LIMIT $limit;";

		$related = $wpdb->get_results($q);
 		if ( $related ) {
			foreach($related as $r) {
				$retval .= '<li><a title="'.wptexturize($r->post_title).'" href="'.get_permalink($r->ID).'">'.wptexturize($r->post_title).'</a></li>';
				if($i>=$count)
				break;
				
				$i++;
			}
		} else {
			$retval .= '
	<li>No related posts found</li>';
		}
		$retval .= '</ul></div>';
		return $retval;
	}
	return;
}

add_shortcode("relatedposts","createRelatedPosts");