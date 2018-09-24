<?php 
/*Template Name: Contact Template*/




?>
<?php get_header(); ?>
<?php include ('map.php'); ?>

        <div class="main">
        	<div class="contact-intro">
        		<h1>CONTACT US.</h1>
            	<p>Leap New Zealand offers the very best in New Zealand adventure tours. If you have a question, our team are proud to provide first-class customer service and are more than happy to help. We also recommend you check out our <a href="<?php echo home_url(); ?>/nz-info">NZ INFO</a> section.</p>
        	</div>
            <div class="contact-details">
            	<h2>POSTAL ADDRESS.</h2>
            	<p>Leap New Zealand Limited<br>
				518 Linwood Ave<br>
				Christchurch<br>
				8062<br>
				New Zealand</p>
            	<h2>CONTACT DETAILS.</h2>
            	<p>Email: office@leap-nz.com<br>
				Phone: +64 3 980 4252<br>
				Fax: +64 3 980 4292</p>
             </div>
              
              <form id="contact-form" class="contact-form clearfix" method="post">
              <img src="<?php bloginfo('template_url'); ?>/images/LEAPspeechbubbleicon.png" alt="speech bubble">
                  <h2>GET IN TOUCH!</h2>
                  <p>Ask us a question, let us know your thoughts or simply say hello! All messages below go direct to our inbox. One of the team will get back to you within 48 hours, if not sooner! Please give us as much detail as you can in order to help you with your enquiry.</p>
                  <p id="contact-status"></p>
                  <div class="contact-form-details">
                    <div>
                      <label for="contact-name">Full name</label>
                      <input type="text" id="contact-name" name="contact-name" />
                    </div>
                    <div>
                      <label for="contact-email">Email address</label>
                      <input type="text" id="contact-email" name="contact-email" />
                    </div>
                    <div>
                      <label for="contact-subject">Subject</label>
                      <input type="text" id="contact-subject" name="contact-subject" />
                    </div>
                  </div>
                  <div class="contact-form-message">
                    <div>
                      <label for="contact-message">Message</label>
                      <textarea name="contact-message" id="contact-message"></textarea>
                    </div>
                  </div>
                  <div>
                  	<input id="reset" class="button" type="reset" value="Reset" />
                    <input id="sendMail" class="button" type="submit" value="Send" />
                  </div>
                  <input id="contact-spam" class="hidden" name="spam" type="text" value="" />
              </form>
        </div><!--end of main-->
<?php get_footer(); ?>   