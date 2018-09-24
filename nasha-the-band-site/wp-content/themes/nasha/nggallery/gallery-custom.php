<?php 
/**
Template Page for the gallery overview

Follow variables are useable :

	$gallery     : Contain all about the gallery
	$images      : Contain all images, path, title
	$pagination  : Contain the pagination content

 You can check the content when you insert the tag <?php var_dump($variable) ?>
 If you would like to show the timestamp of the image ,you can use <?php echo $exif['created_timestamp'] ?>
**/
//var_dump($images);
?>
<?php if (!defined ('ABSPATH')) die ('No direct access allowed'); ?>

	<?php if (!empty ($gallery)) : ?>
    
     <section class="images">
      <?php foreach($images as $image):?>
        
           <img src="<?php echo $image->imageURL ?>" alt="<?php echo $image->alttext ?>" />
        <?php endforeach; ?>
 	</section>
    
	<div class="thumbs">
    	
        <?php foreach($images as $image):?>
        
        	
           <img src="<?php echo $image->thumbnailURL ?>" alt="<?php echo $image->alttext ?>" />
           
        <?php endforeach; ?>
    
    </div>
   

	<?php endif; ?>