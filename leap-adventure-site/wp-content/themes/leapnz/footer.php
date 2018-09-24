        <footer>
            <div class="copyright">
            <div class="social-icons clearfix">
               <a href="https://www.facebook.com/"><div class="socialmedia1"></div></a>
               <a href="https://twitter.com/"><div class="socialmedia2"></div></a>
               <a href="http://www.youtube.com/"><div class="socialmedia3"></div></a>
            </div><!--end of social-icons-->
            <div class="copyright-info"><p>This site was created for educational purposes only. © Thomas - Kasper - Suzannah - Sherina 2012</p></div>
            </div>
        </footer>
        </div><!--end wrapper-->
        <div class="backtotop"><a href="index.html"><h4>BACK TO TOP</h4></a></div>

        <?php include('ie-message.php'); ?>
 
        <!-- End your site or application content here -->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="<?php bloginfo('template_url'); ?>/js/vendor/jquery-1.8.2.min.js"><\/script>')</script>
        <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/vendor/jpreloader.min.js"></script>
        <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.isotope.min.js"></script>
        <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.isotope.center.min.js"></script> 
        <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/vendor/backstretch.min.js"></script>
        <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/script.min.js"></script>    
        <?php 
            sc_footer();
            ls_footer();
            cfm_footer();
        ?>

        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
            (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
            g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
            s.parentNode.insertBefore(g,s)}(document,'script'));
        </script> 
        <script type="text/javascript">
           $(document).ready(function() {
            $('.isotope').jpreLoader();
            $(".isotope").isotope({
              animationEngine : 'best-available',
              animationOptions: {
                 duration: 800,
                 easing: 'linear',
                 queue: false
                },      
                itemSelector : '.box',
                layoutMode : 'masonry'
            }); 
           });
        </script>             
    </body>
  

</html>