<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if IE 9]>         <html class="no-js ie9"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta name="robots" content="noindex,nofollow">
        <title>Leap Nz</title>
        <meta name="description" content="To find the best deals in adventure tourism, Leap Nz is the website for you.">
        <meta name="viewport" content="width=device-width">
        
        <link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/favicon.ico">
        <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/normalize.css"> <!-- style reset -->
        <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/style.css"> <!-- main styles -->
        
        <script src="//cdnjs.cloudflare.com/ajax/libs/modernizr/2.6.2/modernizr.min.js"></script> <!-- cdn hosted modernizr + fallback -->
        <script>window.jQuery || document.write('<script src="<?php bloginfo('template_url'); ?>/js/vendor/modernizr-2.6.2.min.js"><\/script>')</script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/respond.js/1.1.0/respond.min.js"></script> <!-- cdn hosted respond.js + fallback -->
        <script>window.jQuery || document.write('<script src="<?php bloginfo('template_url'); ?>/js/vendor/respond.min.js"><\/script>')</script>
    </head>
    <body>    

        <div class="wrapper">

      <header>
        <div id="status"></div><!-- cart status message -->          
        <div class="header-bar">
        	<div class="inner">  
        	<img class="logo" src="<?php bloginfo('template_url'); ?>/images/logo.png" alt="logo">
          <?php include('nav.php'); ?>
          </div>	
        </div><!--end of header-bar-->
         <?php 
              if(function_exists('displayCart')):
                 displayCart();
              endif;
            ?>       
        </header>         
