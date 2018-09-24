</section><!--end .main-->
                 
        <!-- Begin Footer -->
        <footer>
        
          <nav><p>Copyright © Jinglewell Productions Limited 2012.</p>
            <ul>
               	 	<li><a <?php if(is_front_page()){echo 'class="selected"';}?> href="<?php bloginfo('url'); ?>">About</a></li>
                    <li><a <?php if(is_pod_page('team')){echo 'class="selected"';}?> href="<?php bloginfo('url'); ?>/team">Team</a></li>
                    <li><a <?php if(is_pod_page('gigs')){echo 'class="selected"';}?> href="<?php bloginfo('url'); ?>/gigs">Gigs</a></li>
                    <li><a <?php if(is_pod_page('soundbytes')){echo 'class="selected"';}?> href="<?php bloginfo('url'); ?>/soundbytes">Soundbytes</a></li>
                    <li><a <?php if(is_pod_page('news')){echo 'class="selected"';}?> href="<?php bloginfo('url'); ?>/news">News</a></li>
                    <li><a <?php if(is_pod_page('testimonials')){echo 'class="selected"';}?> href="<?php bloginfo('url'); ?>/testimonials">Testimonials</a></li>
                    <li><a <?php if(is_pod_page('contact')){echo 'class="selected"';}?> href="<?php bloginfo('url'); ?>/contact">Contact</a></li>
            </ul> 
           
            </nav>
            
               
        </footer>
       
     
            
	</div><!-- .wrapper -->
    
    <div class="ie-message">
<p>You are using an older version.<br>Download the latest browsers or if you are having trouble with vidoes downlaod Flash player below.<br></p>
	 <a href="https://www.google.com/intl/en/chrome/browser/" title="Download Now">Google Chrome</a>
	 <br/>
 	<a href="http://www.mozilla.org/en-US/firefox/new/" title="Download Now">Mozilla Firfox</a>
    <br/>
 	<a href="http://get.adobe.com/flashplayer/" title="Download Now">Adobe Flash Player</a>
    
 	
 
</div>
    
	<link href='http://fonts.googleapis.com/css?family=Fanwood+Text' rel='stylesheet' type='text/css'>
    
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
    <script src="<?php bloginfo('template_url'); ?>/js/libs/jquery.easing-1.3.min.js"></script>
    <script src="<?php bloginfo('template_url'); ?>/js/storyslideshow.js"></script>
	<script src="<?php bloginfo('template_url'); ?>/js/slides.min.jquery.js"></script>
    <script src="<?php bloginfo('template_url'); ?>/js/myscripts.js"></script>
   <?php cfm_footer(); ?>
  
</body>
</html>
