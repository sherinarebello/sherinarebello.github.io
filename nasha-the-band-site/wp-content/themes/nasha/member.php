<?php /*Template Name: Team - Member Template*/ ?>
<?php get_header(); ?>

<?php

	

	$found_member = false;
	
	global $pods;
	$current_member_slug = pods_url_variable(-1);
	if($current_member_slug=='team'){
		//if team page then set default team member to display
		$current_member_slug = 'mark';
	}
	$member = new Pod('team_member', $current_member_slug);
	
	
	
	if( !empty( $member->data ) )
	{
		$found_member =  true;
		
		
		
		//set our variables
		$member_id = $member->get_field('id');
		$member_name = $member->get_field('name');
		$member_instrument = $member->get_field('instrument');
		$member_image = $member->get_field('image');
		$member_about = $member->get_field('about');
		$member_description = $member->get_field('description');
		$member_contact = $member->get_field('contact');
		$member_email = $member->get_field('email');
		$member_phone = $member->get_field('phone');
		
		//$member_image = wp_get_attachment_image_src($image[0]['ID'], 'thumbnail');
		
?>

         	<div class="left-column">
            
            

                <!-- start posts area -->
            	<article class="post" id="post-<?php echo $member_id; ?>">
                    <h3><?php echo $member_name; ?></h3>
                    <p class="meta"><?php echo $member_instrument; ?></p>
                    <img src="<?php echo $member_image[0]['guid']; ?>" alt="Photo of <?php echo $member_name; ?>">
                </article>
                
                
                <article class="post">
                    <h3><?php echo $member_about; ?></h3>
                    <?php echo $member_description; ?>
                    <p><?php echo $member_contact; ?></p>
					<p><?php echo $member_email; ?></p>
					<p>Phone: <?php echo $member_phone; ?></p>
                </article>
                <!-- end posts area -->
                
               <?php } ?>
			</div><!-- #left-column -->
            
            
           
            
            
            
          
            <!--sidebar-->
            <div class="sidebar">
             <?php
         		 $team = new Pod('team_member');
          		$team->findRecords('number ASC');       
          		$total_members = $team->getTotalRows();
				//echo "total_members = $total_members";
			
        	?>
            	<!-- categories panel -->
                <div class="panel">
                	<h4>Team</h4>
                    <ul>
                    	<?php  
						if( $total_members>0 ) {
          		 			while ( $team->fetchRecord() ) { 
							 	$member_id = $team->get_field('id');
              					$member_name = $team->get_field('name');
								$member_about = $team->get_field('about');
								$member_slug = $team->get_field('slug');
								$member_instrument = $team->get_field('instrument');
							?>
					 
                      <li>
                      		<a <?php if($member_slug==$current_member_slug){echo 'class="selected "';}?> href="<?php echo get_bloginfo("url")."/team/".$member_slug; ?>">
                            <p><?php echo $member_name; ?></p>
                            <span><?php echo $member_instrument; ?></span>
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
	