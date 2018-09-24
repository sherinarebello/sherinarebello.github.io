<?php /*Template Name: Testimonials Template*/ ?>
<?php get_header(); ?>




         	<div class="left-column"> 
             
             <article class="testimonial-header">
                	<h3>Testimonials :</h3>
                    <h3 class= "meta">We always love to hear some great reviews from our fans, You too can send us a message or comment</h3>
                    </article>
                    

                <!-- start posts area -->
            	
<?php
         		 $testimonials = new Pod('testimonials');
          		$testimonials->findRecords('number DESC');       
          		$total_testimonials = $testimonials->getTotalRows();
				//echo "total_testimonials = $total_testimonials";
			
        	?>
            
             
                    	<?php  
						if( $total_testimonials>0 ) {
          		 			while ( $testimonials->fetchRecord() ) { 
							 	$testimonials_id = $testimonials->get_field('id');
              					$testimonials_name = $testimonials->get_field('name');
								$testimonials_slug = $testimonials->get_field('slug');
								$testimonials_details = $testimonials->get_field('details');
								$testimonials_description = $testimonials->get_field('description');
							?>
                            
                  
                    
                    <article class="post">
                    <h4><?php echo $testimonials_name; ?></h4>
                    <p class="meta"><?php echo $testimonials_details; ?></p>
                    <?php echo $testimonials_description; ?>
                	</article>
                    
           			<?php }//endwhile 
				}//endif
         ?>

                  
                    
                                
              
              <!-- end posts area -->
              
			</div><!-- #left-column -->
          
           
           
<?php get_footer(); ?>

