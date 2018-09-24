<?php
/*
Theme Name: Ballistic
Theme URI: vimeography.com/themes/ballistic
Version: 1.3
Description: is a simple list view of the videos from your Vimeo source.
Author: Dave Kiss
Author URI: vimeography.com
*/
class Vimeography_Themes_Ballistic extends Mustache
{
	public $version = '1.3';
    public $data;
    public $featured;
    public $gallery_id;
    public $gallery_width;
    
    public function __construct()
	{
		// Without the @, this generates warnings?
		// Notice: Undefined offset: 0 in /Sites/vimeography.com/wp-includes/plugin.php on line 762/780
		@add_action('wp_enqueue_scripts', $this->_load_scripts());
	}
	
	public function _load_scripts()
	{
		// First things first. jQuery.
		wp_enqueue_script('jquery');
		
		// Register our common scripts
		wp_register_script('fitvids', VIMEOGRAPHY_ASSETS_URL.'js/plugins/jquery.fitvids.js', array('jquery'));
  
		wp_register_style('ballistic', VIMEOGRAPHY_THEME_URL.'ballistic/media/ballistic.css');
		
		wp_enqueue_script('fitvids');
				
		wp_enqueue_style('ballistic');
	}

    public function info()
    {
    	// optional helpers
    	require_once(VIMEOGRAPHY_PATH .'lib/helpers.php');
    	$helpers = new Vimeography_Helpers;
    	
    	// add featured video to the beginning of the array
    	if (is_array($this->featured))
    		array_unshift($this->data, $this->featured[0]);
    	
    	$items = array();
    	    	
    	foreach($this->data as $item)
    	{
			if ($item->duration AND ! strpos($item->duration, ':'))
			{
				$item->duration = $helpers->seconds_to_minutes($item->duration);
			}
			$items[] = $item;
    	}
    	
    	return $items;
    }
}