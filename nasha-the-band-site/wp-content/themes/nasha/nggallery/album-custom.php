<?php 
/**
Template Page for the album overview

Follow variables are useable :

	$album     	 : Contain information about the album
	$galleries   : Contain all galleries inside this album
	$pagination  : Contain the pagination content

 You can check the content when you insert the tag <?php var_dump($variable) ?>
 If you would like to show the timestamp of the image ,you can use <?php echo $exif['created_timestamp'] ?>
**/
?>
<?php if (!defined ('ABSPATH')) die ('No direct access allowed'); ?>

<?php if (!empty ($galleries)) : ?>

<h2><?php echo $album->name;?></h2>

<nav class="gallery-nav">

	<ul class="clearfix">
    <?php foreach($galleries as $gallery):?>
    	<li><a href="#"><?php echo $gallery->title;?></a></li>
    <?php endforeach;?>    
    </ul>
</nav>

<div class="galleries">
	<?php foreach($galleries as $gallery):?>
    
    	<div class="gallery post clearfix">
        
        	<?php echo nggShowGallery($gallery->gid, 'custom');?>
        
        </div>
    	
    <?php endforeach;?> 
</div>

<?php endif; ?>














