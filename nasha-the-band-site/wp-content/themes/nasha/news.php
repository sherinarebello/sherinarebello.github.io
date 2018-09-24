<?php /*Template Name: News Template*/ ?>
<?php get_header(); ?>

<?php

	

	$found_news = false;
	
	global $pods;
	$current_news_slug = pods_url_variable(-1);
	if($current_news_slug=='news'){
		//if team page then set default news to display
		$current_news_slug = 'mbis';
	}
	$news = new Pod('news', $current_news_slug);
	
	
	
	if( !empty( $news->data ) )
	{
		$found_news =  true;
		
		
		
		//set our variables
		$news_id = $news->get_field('id');
		$news_name = $news->get_field('name');
		$news_details = $news->get_field('details');
		$news_blurb = $news->get_field('blurb');
		$news_image = $news->get_field('image');
		$news_description = $news->get_field('description');
		
		//$news_image = wp_get_attachment_image_src($image[0]['ID'], 'thumbnail');
		
?>

         	<div class="left-column">
            
            

                <!-- start posts area -->
            	<article class="post" id="post-<?php echo $news_id; ?>">
                    <h3><?php echo $news_name; ?></h3>
                    <p class="meta"><?php echo $news_details; ?></p>
                    <p><?php echo $news_blurb; ?></p>
                  
             
                    <img src="<?php echo $news_image[0]['guid']; ?>" alt="Photo of <?php echo $news_name; ?>">
                    
                   <?php echo $news_description; ?>
             
                    
                    
                </article>
                
                <!-- end posts area -->
               <?php } ?>
			</div><!-- #left-column -->
            
            
           
            
            
            
          
            <!--sidebar-->
            <div class="sidebar">
             <?php
         		 $news = new Pod('news');
          		$news->findRecords('number ASC');       
          		$total_news = $news->getTotalRows();
				//echo "total_newss = $total_newss";
			
        	?>
            	<!-- categories panel -->
                <div class="panel">
                	<h4>News</h4>
                    <ul>
                    	<?php  
						if( $total_news>0 ) {
          		 			while ( $news->fetchRecord() ) { 
							 	$news_id = $news->get_field('id');
              					$news_name = $news->get_field('name');
								$news_slug = $news->get_field('slug');
								$news_details = $news->get_field('details');
							?>
					 
                      <li>
                      	<a <?php if($news_slug==$current_news_slug){echo 'class="selected "';}?> href="<?php echo get_bloginfo("url")."/news/".$news_slug; ?>">
                            <p><?php echo $news_name; ?></p>
                            <span><?php echo $news_details; ?></span>
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
	  
 