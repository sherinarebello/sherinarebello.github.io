<?php /*Template Name: Contact Template*/ ?>
<?php get_header(); ?>
         	<div class="left-column">
             <!-- start posts area -->
            	<article class="post">
                    <h3>Contact Us</h3> 
                    <p>Have a new venture for Nasha?or would you like to leave your feedback...</p>
                    <p>Email us : nasha.bandnz@gmail.com</p>
                    <p>Alternatively fill in the form below and we will reply to you soon.</p> 
            	 <?php 
		if(function_exists(displayContactForm)):
			displayContactForm();
		else:
		 	echo "Cannot find function displayContactForm";
		endif;
	?>

                
                
              
              </article><!-- end posts area -->
            
			</div><!-- #left-column -->
<?php get_footer(); ?>
