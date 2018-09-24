<?php
/*
Plugin Name: Custom Pods Live Ajax Search
Version: 2.0
Author: Mason Herber, updated to Pods 2 by Matt Stevens Nov 2012
Description: A plugin to demonstrate a simple ajax search using Pods
*/

define("SEARCH_PLUGIN_URL", plugin_dir_url( __FILE__ ));
define("SEARCH_TRIGGER", SEARCH_PLUGIN_URL."js/triggers.js");

// --------------- ACTIONS ---------------------
add_action( 'wp_ajax_liveSearch', 'liveSearch' );
add_action( 'wp_ajax_nopriv_liveSearch', 'liveSearch' );

// --------------- FUNCTIONS ---------------------

//displays the serach form and accepts the pod to be searched as an argument
function display_live_search(){
?>
<div class="live-search clearfix">
  <form action="<?php echo admin_url('admin-ajax.php');?>" method="post" class="live-search-form searchbar">
  	<div class="search-icon"></div>
      <input type="text" name="search"  id="search" class="search"/>
      <input type="hidden" value="liveSearch" id="action" />
  </form>
  </div>
<?php	
}

// --------------- SCRIPTS ---------------------
//create custom hook (to use instead of wp_footer())
function ls_footer(){
    do_action('ls_footer');
}

//add function addSearchScripts to custom hook
add_action('ls_footer', 'addSearchScripts');

function addSearchScripts(){ ?>
	<script src="<?php echo SEARCH_TRIGGER ?>"></script>
<?php 
}

//live search function is called by Ajax, it queries the specified pod fields for 'LIKE' string and returns html results
function liveSearch(){
	$searchTerm = $_POST['searchTerm'];
	$podName= $_POST['podName'];
	$thePod = pods($podName);
	//This is searching one Pod at a time searching the bothe the description and name fields
	$params = array( 'orderby' => 't.name ASC', 'limit' => -1, 'where' => "t.name LIKE '%$searchTerm%'");
	$thePod->find($params);
	$numRows = $thePod->total_found();
		//var_dump($searchTerm);
		//var_dump($podName);	
	if($numRows > 0){
	    while ( $thePod->fetch() ):
	      $image = $thePod->field('image_1');
	      $image = wp_get_attachment_image_src($image['ID'], '');
	      ?>
        
           
        <div class="content clearfix">
          <div class="subcontent-1 clearfix">
            <div class="image-title-rating">
                <div class="title-rating2">
                    <div class="panel-title"><h4><?php echo $thePod->field('name'); ?></h4></div>
                    <div class="adv-rating">
                      <?php if($thePod->field('extreme_factor') < 1):?>
                      <?php else:?>
                      <img src="<?php bloginfo('template_url');?>/images/Adventureicon-<?php echo $thePod->field('extreme_factor');?>.png" alt="">
                      <?php endif;?>
                    </div>
                    <div class="area"><h4><?php echo $thePod->display('area');?></h4></div>
                </div><!--end of title-rating2-->
              
            <div class="panel-image"><img src="<?php echo $image[0];?>" alt="featured-activity"></div>
           
            <div class="description"><p><?php echo $thePod->field('blurb');?></p>
            </div> <!--end of description-->
            </div><!--end of image-title-rating-->
            <div class="price-readmore clearfix"> 
                <div class="total"><h3>Price $<?php echo $thePod->field('price');?></h3></div>
                <a href="<?php bloginfo('url');?>/<?php echo $podName; ?>/<?php echo $thePod->field('permalink');?>"><div class="readmore-btn"><h4>READ MORE</h4></div></a>
            </div><!--end of price-readmore-->
            </div><!--end of subcontent-1-->      
        </div><!--end of content-->
        <?php
        endwhile;

	} else {
		echo "<p>There are no matching results for \"$searchTerm\"</p>";
	}
	exit;
}
?>