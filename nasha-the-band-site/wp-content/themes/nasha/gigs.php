<?php /*Template Name: Gigs Template*/ ?>
<?php get_header(); ?>

<?php

	

	$found_gigs = false;
	
	global $pods;
	$current_gig_slug = pods_url_variable(-1);
	if($current_gig_slug=='gigs'){
		//if gigs page then set default gigs to display
		$current_gig_slug = 'diwali';
	}
	$gigs = new Pod('gigs', $current_gig_slug);
	
	
	
	if( !empty( $gigs->data ) )
	{
		$found_gigs =  true;
		
		//set our variables
		$gigs_id = $gigs->get_field('id');
		$gigs_name = $gigs->get_field('name');
		$gigs_details = $gigs->get_field('details');
		$gigs_upload_date = $gigs->get_field('upload_date');
		$gigs_vimeo = $gigs->get_field('vimeo');
		$gigs_gallery = $gigs->get_field('gallery');
		
		
		//gigs_largeimage = wp_get_attachment_image_src($image[0]['ID'], 'thumbnail');
		
?>



        
         	<div class="left-column">

                <!-- start posts area -->
            	<article class="post" id="post-<?php echo $gigs_id; ?>">
                    <h3><?php echo $gigs_name; ?></h3>
                    <p class="meta"><?php echo $gigs_details; ?></p>
                    
                    <section class="main clearfix" role="main">

            		<div class="gallery">
            		<?php 
					$gigs_gallery = str_replace( "]" , " template=custom]" , $gigs_gallery);
					echo do_shortcode($gigs_gallery); ?>
            		</div>
        
        			</section>
             
<?php } ?>           
                    
                </article>
                
                <article class="post">
                    <h3>Videos</h3>
                    <p class="meta">10th October 2012</p>
                    <div class="videos">
                    <?php echo do_shortcode($gigs_vimeo); ?>
           			
                    </div>
                </article>
                <!-- end posts area -->
              
			</div><!-- #left-column -->
          
            <!--sidebar-->
           <!--sidebar-->
            <div class="sidebar">
             <?php
         		$gigs = new Pod('gigs');
          		$gigs->findRecords('id ASC', -1, 'past=0');       
          		$total_gigs = $gigs->getTotalRows();
				//echo "total_gigs = $total_gigs";
			
        	?>
            	<!-- categories panel -->
                <div class="panel">
                	<h4>Recent Gigs</h4>
                    <ul>
                    	<?php  
						if( $total_gigs>0 ) {
          		 			while ( $gigs->fetchRecord() ) { 
							 	$gigs_id = $gigs->get_field('id');
              					$gigs_name = $gigs->get_field('name');
								$gigs_about = $gigs->get_field('details');
								$gigs_slug = $gigs->get_field('slug');
							?>
					 
                      <li>
                      	<a <?php if($gigs_slug==$current_gig_slug){echo 'class="selected "';}?> href="<?php echo get_bloginfo("url")."/gigs/".$gigs_slug; ?>">
         
                            <p><?php echo $gigs_name; ?></p>
                            <span><?php echo $gigs_details; ?></span>
                        </a>
                      </li>
                            <?php }//endwhile 
						 }//endif
                       ?>
               			
                    </ul>
                </div>
           		<!-- end categories panel --> 
                
                <!-- categories panel -->
                
            <?php
         		$gigs = new Pod('gigs');
          		$gigs->findRecords('id ASC', -1 ,'past=1');       
          		$total_gigs = $gigs->getTotalRows();
				//echo "total_gigs = $total_gigs";
			
        	?>
                <div class="panel">
                	<h4>Past Gigs</h4>
                    <ul>
                    	<?php  
						if( $total_gigs>0 ) {
          		 			while ( $gigs->fetchRecord() ) { 
							 	$gigs_id = $gigs->get_field('id');
              					$gigs_name = $gigs->get_field('name');
								$gigs_about = $gigs->get_field('details');
								$gigs_slug = $gigs->get_field('slug');
							?>
					 
                      <li>
                      	<a <?php if($gigs_slug==$current_gig_slug){echo 'class="selected "';}?> href="<?php echo get_bloginfo("url")."/gigs/".$gigs_slug; ?>">
                            <p><?php echo $gigs_name; ?></p>
                            <span><?php echo $gigs_details; ?></span>
                        </a>
                      </li>
                            <?php }//endwhile 
						 }//endif
                       ?>
               			
                    </ul>
                </div>
           		<!-- end categories panel --> 
            
            </div><!--end #sidebar-->
      <?php get_footer(); ?>