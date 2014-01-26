<?php
class Twitter_Widget extends WP_Widget {
    function __construct() {
        $params = array(
	    'description' => 'Display and cache recent tweets to your readers.',
	    'name' => 'Display Your Tweets'
        );
        
        // id, name, params
        parent::__construct('Twitter_Widget', '', $params);
    }
    
    public function form($instance) {
        extract($instance);
        ?>
        
        <p>
	    <label for="<?php echo $this->get_field_id('title');?>">Title: </label>
	    <input type="text"
		class="widefat"
		id="<?php echo $this->get_field_id('title'); ?>"
		name="<?php echo $this->get_field_name('title'); ?>"
		value="<?php if ( isset($title) ) echo esc_attr($title); ?>" />
        </p>
        
        <p>
	    <label for="<?php echo $this->get_field_id('username'); ?>">Twitter Username:</label>
	    
	    <input class="widefat"
		type="text"
		id="<?php echo $this->get_field_id('username'); ?>"
		name="<?php echo $this->get_field_name('username'); ?>"
		value="<?php if ( isset($username) ) echo esc_attr($username); ?>" />
        </p>
        
        <p>
	    <label for="<?php echo $this->get_field_id('tweet_count'); ?>">
		Number of Tweets to Retrieve:
	    </label>
	     
	    <input
		type="number"
		class="widefat"
		style="width: 40px;"
		id="<?php echo $this->get_field_id('tweet_count');?>"
		name="<?php echo $this->get_field_name('tweet_count');?>"
		min="1"
		max="10"
		value="<?php echo !empty($tweet_count) ? $tweet_count : 5; ?>" />
        </p>
        <?php
    }
    
    // What the visitor sees...
    public function widget($args, $instance) {
	extract($instance);
        extract( $args );
        
        if ( empty($title) ) $title = 'Recent Tweets';
        
        $data = $this->twitter($tweet_count, $username);
        if ( false !== $data && isset($data->tweets) ) {
            echo $before_widget;
		echo $before_title;
		    echo $title;
		echo $after_title;

		echo '<ul class="latest-tweets"><li>' . implode('</li><li>', $data->tweets) . '</li></ul>';
            echo $after_widget;
        }
    }
    
    private function twitter($tweet_count, $username)
    {
        if ( empty($username) ) return;
        
        $tweets = get_transient('recent_tweets_widget');
        if ( !$tweets ||
	    $tweets->username !== $username ||
	    $tweets->tweet_count !== $tweet_count )
	{
	    return $this->fetch_tweets($tweet_count, $username);
	}
        return $tweets;
    }
    
   private function fetch_tweets($tweet_count, $username)
    {
	$tweets = wp_remote_get("https://api.twitter.com/1/statuses/user_timeline.json?screen_name=$username");
	
	if( is_wp_error( $tweets ) ) {
  			
			 
			 $data = new StdClass();
	$data->username = $username;
	$data->tweet_count = 1;
	$data->tweets[] = "Feeds Not Available !"; 
		}
   else { 
	$tweets = json_decode($tweets['body']);
   
	// An error retrieving from the Twitter API?
	if ( isset($tweets->error) ) return false;

	$data = new StdClass();
	$data->username = $username;
	$data->tweet_count = $tweet_count;

	foreach($tweets as $tweet) {
	    if ( $tweet_count-- === 0 ) break;
	    $data->tweets[] = $this->filter_tweet( $tweet->text );
	}

	set_transient('recent_tweets_widget', $data, 60 * 5); // five minutes
   }
	
	return $data;
    }

    private function filter_tweet($tweet)
    {
        // Username links
        $tweet = preg_replace('/(http[^\s]+)/im', '<a href="$1">$1</a>', $tweet);
        $tweet = preg_replace('/@([^\s]+)/i', '<a href="http://twitter.com/$1">@$1</a>', $tweet);
        // URL links
        return $tweet;
    }
    
}

// Here we gooooooo! (Mario voice)
add_action('widgets_init', 'register_Twitter_Widget');
function register_Twitter_Widget()
{
    register_widget('Twitter_Widget');
}