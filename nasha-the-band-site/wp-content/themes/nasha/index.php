<?php /*Template Name: Index Template*/ ?>
<?php get_header(); ?>

<?php

	
	
	$index = new Pod('index', 1);

//set our variables
		$index_id = $index->get_field('id');
		$index_name = $index->get_field('name');
		$index_p1 = $index->get_field('p1');
		$index_slider1 = $index->get_field('slider1');
		$index_p2 = $index->get_field('p2');
		$index_slider2 = $index->get_field('slider2');
		$index_p3 = $index->get_field('p3');
		$index_slider3 = $index->get_field('slider3');
		$index_message = $index->get_field('message');
?>        
       	<div class="home-column">

                <!-- start posts area -->
            	<article class="post" id="post-<?php echo $index_id; ?>">
                    <h3><?php echo $index_name; ?></h3>
                              
         <div id="container">
		<div id="story-slider">
		
			<div id="slides">
				<div class="slides_container">
					<div class="slide">
                    <div class="caption" style="bottom:0">
							<p><?php echo $index_p1; ?></p>
						</div>
						<img src="<?php echo $index_slider1[0]['guid']; ?>" alt="Photo of <?php echo $index_name; ?>">
						
					</div>
					<div class="slide">
						
						<div class="caption">
							<p><?php echo $index_p2; ?></p>
						</div>
                        <img src="<?php echo $index_slider2[0]['guid']; ?>" alt="Photo of <?php echo $index_name; ?>">
					</div>
                    
					<div class="slide">
                    <div class="caption">
							<p><?php echo $index_p3; ?></p>
						</div>
						<img src="<?php echo $index_slider3[0]['guid']; ?>" alt="Photo of <?php echo $index_name; ?>">
						
					</div>
					
					
				</div><!--end of slides container-->
				
			</div><!--end of slides-->
			
		</div><!--end of story-slider-->
		
	</div><!--end of container div-->
                    
   

                </article>
                <div class="bars">
                <img src="<?php bloginfo('template_url'); ?>/images/bars.png" alt="bars">
                </div>
                <article class="post"> 
                    <?php echo $index_message; ?>
                </article>
                <!-- end posts area -->
              
			</div><!-- #left-column -->
             

<?php get_footer(); ?>

