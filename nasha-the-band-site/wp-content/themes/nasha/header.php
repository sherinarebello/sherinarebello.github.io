<!doctype html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->

<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->

<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->

<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta name="robots" content="noindex,nofollow">
    
    <title><?php bloginfo('name'); ?></title>
    
    <meta name="description" content="<?php bloginfo('description'); ?>">
    <meta name="author" content="Sherina Mendes">
    
    <link rel="icon" href="<?php bloginfo('template_url'); ?>/images/favicon.gif">
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/style.css">
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/fancybox/jquery.fancybox-1.3.4.css">
  
    
    <script src="<?php bloginfo('template_url'); ?>/js/libs/modernizr-2.5.3.min.js"></script>  
</head>

<body>

	<div class="wrapper clearfix">
     <div class="social-icons">
<a href="https://www.facebook.com/NashaTheBand" target="_blank"><img src="<?php bloginfo('template_url'); ?>/images/facebooklogo.png" alt="facebook-logo"></a>
<a href="https://twitter.com/NashaTheBand" target="_blank"><img src="<?php bloginfo('template_url'); ?>/images/twitterlogo.png" alt="twitter-logo"></a>
<a href="https://www.youtube.com/watch?v=M9tte46dQNw" target="_blank"><img src="<?php bloginfo('template_url'); ?>/images/youtubelogo.png" alt="youtube-logo"></a>
</div><!--END OF SOCIAL ICONS DIV-->
        <header>
       
            <div class="logo">
            	<img src="<?php bloginfo('template_url'); ?>/images/nasha-final-logo.png" alt="nasha-logo">
                
            </div> 
             
            <nav class="clearfix">
            <div class="nav-control">
				<a href="#nav">Menu</a>
			</div>
            <ul class="menu clearfix">
                    <li><a <?php if(is_front_page()){echo 'class="selected "';}?> href="<?php bloginfo('url'); ?>">About</a></li>
                    <li><a <?php if(is_pod_page('team')||is_pod_page('team/*')){echo 'class="selected "';}?> href="<?php bloginfo('url'); ?>/team">Team</a></li>
                    <li><a <?php if(is_pod_page('gigs')||is_pod_page('gigs/*')){echo 'class="selected "';}?> href="<?php bloginfo('url'); ?>/gigs">Gigs</a></li>
                    <li><a <?php if(is_pod_page('soundbytes')){echo 'class="selected "';}?> href="<?php bloginfo('url'); ?>/soundbytes">Soundbytes</a></li>
                    <li><a <?php if(is_pod_page('news')||is_pod_page('news/*')){echo 'class="selected "';}?> href="<?php bloginfo('url'); ?>/news">News</a></li>
                    <li><a <?php if(is_pod_page('testimonials')){echo 'class="selected "';}?> href="<?php bloginfo('url'); ?>/testimonials">Testimonials</a></li>
                    <li><a <?php if(is_pod_page('contact')){echo 'class="selected "';}?> href="<?php bloginfo('url'); ?>/contact">Contact</a></li>
        </ul>
            </nav>
        </header>
  
        <section class="main clearfix" role="main">