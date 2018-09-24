<?php /*Template Name: Soundbytes Template*/ ?>
<?php get_header(); ?>

<?php

	

	$found_soundbytes = false;
	
	global $pods;
	$soundbytes_slug = pods_url_variable(-1);
	if($soundbytes_slug=='soundbytes'){
		//if team page then set default team soundbytes to display
		$soundbytes_slug = 'mera';
	}
	$soundbytes = new Pod('soundbytes_songs', $soundbytes_slug);
	
	
	
	if( !empty( $soundbytes->data ) )
	{
		$found_soundbytes =  true;
		
		
		
		//set our variables
		$soundbytes_id = $soundbytes->get_field('id');
		$soundbytes_name = $soundbytes->get_field('name');
		$soundbytes_details = $soundbytes->get_field('details');
		$soundbytes_image = $soundbytes->get_field('image');
		$soundbytes_track = $soundbytes->get_field('track');
		$soundbytes_video = $soundbytes->get_field('video');
		$soundbytes_blurb = $soundbytes->get_field('blurb');
		$soundbytes_description = $soundbytes->get_field('description');
		//$soundbytes_image = wp_get_attachment_image_src($image[0]['ID'], 'thumbnail');
		
?>

         	<div class="left-column">
            
             

            
            

                <!-- start posts area -->
            	<article class="post" id="post-<?php echo $soundbytes_id; ?>">
                    <h3><?php echo $soundbytes_name; ?></h3>
                    <p class="meta"><?php echo $soundbytes_blurb; ?></p>
                    <img src="<?php echo $soundbytes_image[0]['guid']; ?>" alt="Photo of <?php echo $soundbytes_name; ?>">
                    <?php echo $soundbytes_description; ?>
                    
                   
                    
                </article>
                
              
                    
                <!-- end posts area -->
               <?php } ?>
			</div><!-- #left-column -->
            
            
           
            
            
            
          
            <!--sidebar-->
            <div class="sidebar">
             <?php
         		 $soundbytes = new Pod('soundbytes_songs');
          		$soundbytes->findRecords('number ASC');       
          		$total_soundbytes = $soundbytes->getTotalRows();
				//echo "total_soundbytes = $total_soundbytes";
			
        	?>
            	<!-- categories panel -->
                <div class="panel">
                	<h4>Playlist</h4>
                    <ul>
                    	<?php  
						if( $total_soundbytes>0 ) {
          		 			while ( $soundbytes->fetchRecord() ) { 
							 	$soundbytes_id = $soundbytes->get_field('id');
              					$soundbytes_name = $soundbytes->get_field('name');
								$soundbytes_about = $soundbytes->get_field('about');
								$soundbytes_slug = $soundbytes->get_field('slug');
								$soundbytes_details = $soundbytes->get_field('details');
								$soundbytes_track = $soundbytes->get_field('track');
							?>
					 
                      <li>
                      	<?php echo do_shortcode($soundbytes_track); ?>
                      </li>
                            <?php }//endwhile 
						}
                       ?>
               			
                    </ul>
                </div>
           		<!-- end categories panel --> 
            
            </div><!--end #sidebar-->
      <?php get_footer(); ?>
