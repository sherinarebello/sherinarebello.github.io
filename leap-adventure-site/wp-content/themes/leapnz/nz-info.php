<?php 
/*Template Name: NZ Info Template*/

  // INIT INFO POD
  $podName1 = "nz_info"; // pod name
  $infoPod = pods($podName1); //create new pod from results of $podname
  $params = array( 'orderby' => 'id ASC'); //filter results
  $infoPod->find($params); //apply the filters

?>
<?php get_header(); ?>
<?php include ('map.php'); ?>

        <div class="feature">
            <div class="feature-inner">
          <div class="description-total-boxes clearfix">      
          <?php 
            while ($infoPod->fetch()):
            $infoImage = $infoPod->field('image');
            $infoImage = wp_get_attachment_image_src($infoImage['ID'], '');
          ?>       
          <div class="nz-info">
                    <div class="content clearfix">
                  <div class="subcontent-1 clearfix">
                    <div class="image-title-rating">
                    <div class="info-image"><img src="<?php echo $infoImage[0]; ?>" alt=""></div>
                   <div class="info-title"><h4><?php echo $infoPod->field('name');?></h4></div>
                    <div class="description"><?php echo $infoPod->field('information');?>
                    </div> <!--end of description-->
                    </div><!--end of image-title-rating-->
                    </div><!--end of subcontent-1-->      
                </div><!--end of content-->
                
         </div> <!--end of nz-info div-->
      <?php endwhile; ?>            
                    </div><!--description-total-boxes-->
            </div><!--end of div.feature-inner-->
        </div><!--end of div.feature-->
<?php get_footer(); ?>   