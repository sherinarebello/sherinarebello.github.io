<?php get_header(); ?>
<?php include('threecol.php'); ?>
<?php include ('map.php'); ?>

<?php
  // INIT ACT POD
  $podName1 = "activities"; // pod name
  $actPod = pods($podName1); //create new pod from results of $podname
  $params = array( 'orderby' => 'name ASC', 'limit' => -1); //filter results
  $actPod->find($params); //apply the filters
  $numAct = $actPod->total_found(); // total number of activities
?>
<?php
  // INIT TRANS POD
  $podName2 = "transport"; // pod name
  $transPod = pods($podName2); //create new pod from results of $podname
  $params = array( 'orderby' => 'name ASC', 'limit' => -1); //filter results
  $transPod->find($params); //apply the filters
  $numTrans = $transPod->total_found(); // total number of transportation
?>
<?php
  // INIT ACC POD
  $podName3 = "accomodation"; // pod name
  $accPod = pods($podName3); //create new pod from results of $podname
  $params = array( 'orderby' => 'name ASC', 'limit' => -1); //filter results
  $accPod->find($params); //apply the filters
  $numAcc = $accPod->total_found(); // total number of accomodation
?>
<?php
  // INIT PKG POD
  $podName4 = "packages"; // pod name
  $pkgPod = pods($podName4); //create new pod from results of $podname
  $params = array( 'orderby' => 'name ASC', 'limit' => -1); //filter results
  $pkgPod->find($params); //apply the filters
  $numPkg = $pkgPod->total_found(); // total number of packages
?>

          <div class="isotope">
            <?php 
            $i = 0;
            while($i < $numAct || $i < $numTrans || $i < $numAcc || $i < $numPkg):
              $actPod->fetch();
              $transPod->fetch();
              $accPod->fetch();
              $pkgPod->fetch();

              $actImage = $actPod->field('main_image');
              $actImage = wp_get_attachment_image_src($actImage['ID'], '');

              $transImage = $transPod->field('main_image');
              $transImage = wp_get_attachment_image_src($transImage['ID'], '');   

              $accImage = $accPod->field('main_image');
              $accImage = wp_get_attachment_image_src($accImage['ID'], '');      

              $pkgImage = $pkgPod->field('main_image');
              $pkgImage = wp_get_attachment_image_src($pkgImage['ID'], '');                               
            ?>      
              <!-- activity --> 
              <?php if ( $i < $numAct ):?> 
             	<a href="<?php bloginfo('url');?>/<?php echo $podName1;?>/<?php echo $actPod->field('permalink');?>">
                <div class="box <?php echo $podName1 ?> <?php echo $actPod->field('size');?> <?php echo $actPod->field('area');?>">
                  <img class="background-boximage" src="<?php echo $actImage[0];?>" alt="<?php echo $actPod->field('name'); ?>" />
                  <div class="hover-text">
                    <h3><?php echo $actPod->field('name'); ?></h3>
                    <h4><?php echo $actPod->display('area'); ?></h4>
                    <img src="<?php bloginfo('template_url');?>/images/Adventureicon-<?php echo $actPod->field('extreme_factor');?>.png" alt="">
                  </div>
                </div>
              </a>
              <?php endif; ?>
              <!-- transport -->
              <?php if ( $i < $numTrans ):?> 
              <a href="<?php bloginfo('url');?>/<?php echo $podName2;?>/<?php echo $transPod->field('permalink');?>">
                <div class="box <?php echo $podName2 ?> <?php echo $transPod->field('size');?> <?php echo $transPod->field('area');?>">
                  <img class="background-boximage" src="<?php echo $transImage[0];?>" alt="<?php echo $transPod->field('name'); ?>" />
                  <div class="hover-text">
                    <h3><?php echo $transPod->field('name'); ?></h3>
                    <h4><?php echo $transPod->display('area'); ?></h4>
                  </div>
                </div>
              </a>
              <?php endif; ?>
              <!-- accomodation -->
              <?php if ( $i < $numAcc ):?> 
              <a href="<?php bloginfo('url');?>/<?php echo $podName3;?>/<?php echo $accPod->field('permalink');?>">
                <div class="box <?php echo $podName3 ?> <?php echo $accPod->field('size');?> <?php echo $accPod->field('area');?>">
                  <img class="background-boximage" src="<?php echo $accImage[0];?>" alt="<?php echo $accPod->field('name'); ?>" />
                  <div class="hover-text">
                    <h3><?php echo $accPod->field('name'); ?></h3>
                    <h4><?php echo $accPod->display('area'); ?></h4>
                  </div>
                </div>
              </a> 
              <?php endif; ?>       
              <!-- package -->
              <?php if ( $i < $numPkg ):?>
              <a href="<?php bloginfo('url');?>/<?php echo $podName4;?>/<?php echo $pkgPod->field('permalink');?>">
                <div class="box <?php echo $podName4 ?> <?php echo $pkgPod->field('size');?> <?php echo $pkgPod->field('area');?>">
                  <img class="background-boximage" src="<?php echo $pkgImage[0];?>" alt="<?php echo $pkgPod->field('name'); ?>" />
                  <div class="hover-text">
                    <h3><?php echo $pkgPod->field('name'); ?></h3>
                    <h4><?php echo $pkgPod->display('area'); ?></h4>
                    <img src="<?php bloginfo('template_url');?>/images/Adventureicon-<?php echo $pkgPod->field('extreme_factor');?>.png" alt="">
                  </div>
                </div>
              </a>
              <?php endif;                      
            $i++;
            endwhile;?>          
        </div>
<?php get_footer(); ?>