<?php 
/*Template Name: Package Single Template*/
 
  // INIT PKG FEATURED POD
  $packagePermaLink = pods_var(-1, 'url');
  $podName1 = "packages"; // pod name
  $featuredPod = pods($podName1, $packagePermaLink); //create new pod from results of $podname
?>
<?php
  // INIT PKG POD
  $podName4 = "packages"; // pod name
  $pkgPod = pods($podName4); //create new pod from results of $podname
  $params = array( 'orderby' => 'name ASC', 'limit' => -1); //filter results
  $pkgPod->find($params); //apply the filters
  $numPkg = $pkgPod->total(); // total number of packages
?>

<?php get_header(); ?>
<?php include ('map.php'); ?>

<?php 

$mainImage = $featuredPod->field('main_image');
$mainImage = wp_get_attachment_image_src($mainImage['ID'], '');

$thumb1 = $featuredPod->field('image_1');
$thumb1 = wp_get_attachment_image_src($thumb1['ID'], '');

$thumb2 = $featuredPod->field('image_2');
$thumb2 = wp_get_attachment_image_src($thumb2['ID'], '');

$thumb3 = $featuredPod->field('image_3');
$thumb3 = wp_get_attachment_image_src($thumb3['ID'], '');

$numberOfDays = $featuredPod->field('number_of_days');

?>








        <div class="feature">
            <div class="feature-inner">
            <div class="title-rating">
                <div class="feature-title"><h3><?php echo $featuredPod->field('name'); ?></h3></div>
                <div class="adv-rating"><img src="<?php bloginfo('template_url');?>/images/Adventureicon-<?php echo $pkgPod->field('extreme_factor');?>.png" alt=""></div>
            </div>
            <div class="top-feature clearfix">
                <div class="feature-image-thumbs">
                <div class="feature-image"><img src="<?php echo $thumb1[0]?>" alt=""></div>
                <div class="feature-image"><img src="<?php echo $thumb2[0]?>" alt=""></div>
                <div class="feature-image"><img src="<?php echo $thumb3[0]?>" alt=""></div>
                <div class="feature-thumbs">
                	<div class="thumb-1"><img src="<?php echo $thumb1[0];?>" alt="thumb-1"></div>
                	<div class="thumb-2"><img src="<?php echo $thumb2[0];?>" alt="thumb-2"></div>
                    <div class="thumb-3"><img src="<?php echo $thumb3[0];?>" alt="thumb-3"></div>
                </div>
                </div><!--end of feature-image-thumbs-->
                
                <div class="packages-description">
                	<?php echo $featuredPod->field('introduction'); ?>
                </div><!--end of div.description-->
            </div><!--end of (top-feature)feature-image-thumbs-map-->
            <div class="description-total-boxes clearfix">
                
        <?php 
            $i = 1;
        //    if ( $i < $totalNumberOfDays

        while ( $i <= $numberOfDays ):

            $getAct = $featuredPod->get_field('day_'.$i.'_activity');
            $activityPermaLink = $getAct[0]['permalink'];
            $activityPod = pods("activities", $activityPermaLink);
            $actImg = $activityPod->field('image_1');
            $actArea = $activityPod->display('area');


            $getAcc = $featuredPod->get_field('day_'.$i.'_accomodation');
            $accomodationPermaLink = $getAcc[0]['permalink'];
            $accomodationPod = pods('accomodation', $accomodationPermaLink);
            $accImg = $accomodationPod->field('image_1');
            $accArea = $accomodationPod->display('area');

            $getTrans = $featuredPod->get_field('day_'.$i.'_transportation');
            $transportationPermaLink = $getTrans[0]['permalink'];
            $transportationPod = pods('transport', $transportationPermaLink);
            $transImg = $transportationPod->field('image_1');
            $transArea = $transportationPod->display('area');           
        ?>   



          <!-- START OF DAYS -->    

          <div class="day-packages">
                    <div class="days"><h3>DAY <?php echo $i; ?></h3></div>
                   


                    <div class="content clearfix">
                	<div class="subcontent-1 clearfix">
                    <div class="image-title-rating">
                        <div class="title-rating2">
                            <div class="panel-title">
                                <h4>
                                    <a href="<?php echo home_url(); ?>/activities/<?php echo $getAct[0]['permalink'];?>"><?php echo $getAct[0]['name']; ?></a>
                                </h4>
                            </div>
                            <div class="adv-rating"><img src="<?php bloginfo('template_url');?>/images/Adventureicon-<?php echo $getAct[0]['extreme_factor'];?>.png" alt=""></div>
                            <div class="area"><h4><?php echo $actArea; ?></h4></div>
                        </div><!--end of title-rating2-->	
                    <div class="panel-image"><img src="<?php echo $actImg['guid']; ?>" alt=""></div>
                    <div class="description">
                        <p><?php echo $getAct[0]['blurb']; ?></p>
                    </div> <!--end of description-->
                    </div><!--end of image-title-rating-->
                    </div><!--end of subcontent-1-->      
                </div><!--end of content-->
                
                <div class="content clearfix">
                	<div class="subcontent-1 clearfix">
                    <div class="image-title-rating">
                        <div class="title-rating2">
                            <div class="panel-title">
                                <h4>
                                    <a href="<?php echo home_url(); ?>/accomodation/<?php echo $getAcc[0]['permalink'];?>"><?php echo $getAcc[0]['name']; ?></a>
                                </h4>
                            </div>
                            <div class="area"><h4><?php echo $accArea; ?></h4></div>
                        </div><!--end of title-rating2-->
                    <div class="panel-image"><img src="<?php echo $accImg['guid']; ?>" alt=""></div>
                    <div class="description">
                        <p><?php echo $getAcc[0]['blurb']; ?></p>
                    </div> <!--end of description-->
                    </div><!--end of image-title-rating-->
                    </div><!--end of subcontent-1-->      
                </div><!--end of content-->
                
                
                <div class="content clearfix">
                	<div class="subcontent-1 clearfix">
                    <div class="image-title-rating">
                        <div class="title-rating2">
                            <div class="panel-title">
                                <h4>
                                    <a href="<?php echo home_url(); ?>/transport/<?php echo $getTrans[0]['permalink'];?>"><?php echo $getTrans[0]['name']; ?></a>
                                </h4>
                            </div>
                            <div class="area"><h4><?php echo $transArea; ?></h4></div>
                        </div><!--end of title-rating2-->
                    <div class="panel-image"><img src="<?php echo $transImg['guid']; ?>" alt=""></div>
                    <div class="description">
                        <p><?php echo $getTrans[0]['blurb']; ?></p>
                    </div> <!--end of description-->
                    </div><!--end of image-title-rating-->
                    </div><!--end of subcontent-1-->      
                </div><!--end of content-->
                
         </div><!--end of day packages-->
        

        <?php 
            $i++; 
            endwhile;
        ?>

              <div class="description-total-boxes clearfix">
                      <div class="add-to-cart">
                        <p class="addtocart-price">$<? echo $featuredPod->field('price'); ?></p> 
                        <?php 
                          if(function_exists('displayAddToCart')):
                            displayAddToCart($featuredPod->field('id'), $podName1);
                          endif;
                        ?>
                      </div><!-- end of add-to-cart -->
              </div><!--description-total-boxes-->                    
            </div><!--end of div.feature-inner-->
        </div><!--end of div.feature-->
	</div>

        <div class="tabs-panel clearfix">
            
            <div class="other-packages"><h3>OTHER PACKAGES</h3></div>
            
        <?php 
            while ($pkgPod->fetch()): 
            $pkgImage = $pkgPod->field('image_1');
            $pkgImage = wp_get_attachment_image_src($pkgImage['ID'], '');
        ?>
        <?php if ( $pkgPod->field('id') != $featuredPod->field('id') ): ?> 
        <div class="panels">
            <div class="content clearfix">
                <div class="subcontent-1 clearfix">
                    <div class="image-title-rating">
                        <div class="title-rating2">
                            <div class="panel-title">
                                <h4>
                                    <a href="<?php bloginfo('url');?>/<?php echo $podName4; ?>/<?php echo $pkgPod->field('permalink');?>"><?php echo $pkgPod->field('name');?></a>
                                </h4>
                            </div>
                            <div class="adv-rating"><img src="<?php bloginfo('template_url');?>/images/Adventureicon-<?php echo $pkgPod->field('extreme_factor');?>.png" alt=""></div>
                            <div class="area"><h4><?php echo $pkgPod->display('area');?></h4></div>
                        </div>
                    
                    
                        <div class="panel-image">
                            <img src="<?php echo $pkgImage[0]; ?>" alt="">
                        </div>

                        <div class="description">
                            <?php echo $pkgPod->field('introduction'); ?>
                        </div>
                    </div>

                    <div class="price-readmore clearfix"> 
                        <div class="total"><h3>Price: $<?php echo $pkgPod->field('price');?></h3></div>
                        <a href="<?php bloginfo('url');?>/<?php echo $podName4; ?>/<?php echo $pkgPod->field('permalink');?>"><div class="readmore-btn"><h4>READ MORE</h4></div></a>
                    </div><!--end of price-readmore-->

                </div>
            </div><!--end of content-->
        </div>

        <?php endif; ?>
        <?php endwhile; ?>


        </div><!--end of tabs-panel cleafix-->       
<?php get_footer(); ?>        