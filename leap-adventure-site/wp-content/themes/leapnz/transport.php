<?php 
/*Template Name: Transport Single Template*/

  // INIT TRANS FEATURED POD
  $transportPermaLink = pods_var(-1, 'url');
  $podName1 = "transport"; // pod name
  $featuredPod = pods($podName1, $transportPermaLink); //create new pod from results of $podname
  $transportsPod = pods($podName1);
  $params = array( 'orderby' => 'name ASC'); //filter results
  $transportsPod->find($params); //apply the filters
  $featuredArea = $featuredPod->field('area');
?>
<?php
  // INIT ACT POD
  $podName2 = "activities"; // pod name
  $actPod = pods($podName2); //create new pod from results of $podname
  $params = array( 'orderby' => 'name ASC', 'limit' => -1, 'where' => "area = '$featuredArea'"); //filter results
  $actPod->find($params); //apply the filters
  $numAct = $actPod->total_found(); // total number of activities
?>
<?php
  // INIT TRANS POD
  $podName3 = "transport"; // pod name
  $transPod = pods($podName3); //create new pod from results of $podname
  $params = array( 'orderby' => 'name ASC', 'limit' => -1, 'where' => "area = '$featuredArea'"); //filter results
  $transPod->find($params); //apply the filters
  //$numTrans = $transPod->total_found(); // total number of transportation
?>
<?php
  // INIT ACC POD
  $podName4 = "accomodation"; // pod name
  $accPod = pods($podName4); //create new pod from results of $podname
  $params = array( 'orderby' => 'name ASC', 'limit' => -1, 'where' => "area = '$featuredArea'"); //filter results
  $accPod->find($params); //apply the filters
  //$numAcc = $accPod->total_found(); // total number of accomodation
?>
<?php get_header(); ?>
<?php include ('map.php'); ?>
<?php 
  $image = $featuredPod->field('image_1');
  $image = wp_get_attachment_image_src($image['ID'], '');
?>

        <div class="feature">
            <div class="feature-inner">
            <div class="title-rating">
                <div class="feature-title"><h3><?php echo $featuredPod->field('name'); ?></h3></div>
            </div>
            <div class="top-feature clearfix">
                <div class="feature-image-thumbs">
                <div class="feature-image"><img src="<?php echo $image[0]?>" alt=""></div>
                </div><!--end of feature-image-thumbs-->
                <div class="google-map"><a href="<?php echo esc_html($featuredPod->field('google_map_link')); ?>" target="_blank"><h4>VIEW GOOGLE MAP</h4></a></div>
                
                <div class="google-map-image">
                <?php echo $featuredPod->field('google_map'); ?>
                </div>
            </div><!--end of (top-feature)feature-image-thumbs-map-->
              <div class="description-total-boxes clearfix">
    
                      <div class="feature-description">
                        <?php echo $featuredPod->field('description'); ?>
                      </div><!--end of div.description-->
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

        <div class="tabs-panel">
          <nav>
            <ul class="clearfix">
                  <li class="panel1"><a href="javascript:void(0);"><img src="<?php bloginfo('template_url');?>/images/activities.png" alt=""></a></li>
                  <li class="panel2"><a href="javascript:void(0);"><img src="<?php bloginfo('template_url');?>/images/accommodation.png" alt=""></a></li>
                  <li class="panel3"><a href="javascript:void(0);"><img src="<?php bloginfo('template_url');?>/images/transport.png" alt=""></a></li>
              </ul>
          </nav> 
            
            <div class="searchbar-tabs clearfix">
                  <?php   
                    if(function_exists(display_live_search)):
                      display_live_search();
                    endif;        
                  ?>  
            </div>
            
            <div class="panels">
              <section id="nearby-activities">
                <div class="container">
                  <?php
                    while ( $actPod->fetch() ):
                      $actImage = $actPod->field('image_1');
                      $actImage = wp_get_attachment_image_src($actImage['ID'], '');
                  ?>                
                <div class="content clearfix">
                  <div class="subcontent-1 clearfix">
                    <div class="image-title-rating">
                        <div class="title-rating2">
                            <div class="panel-title"><h4><?php echo $actPod->field('name'); ?></h4></div>
                            <div class="adv-rating"><img src="<?php bloginfo('template_url');?>/images/Adventureicon-<?php echo $actPod->field('extreme_factor');?>.png" alt=""></div>
                            <div class="area"><h4><?php echo $actPod->display('area');?></h4></div>
                        </div><!--end of title-rating2-->
                      
                    <div class="panel-image"><img src="<?php echo $actImage[0];?>" alt=""></div>
                   
                    <div class="description"><p><?php echo $actPod->field('blurb');?></p>
                    </div> <!--end of description-->
                    </div><!--end of image-title-rating-->
                    <div class="price-readmore clearfix"> 
                        <div class="total"><h3>Price $<?php echo $actPod->field('price');?></h3></div>
                        <a href="<?php bloginfo('url');?>/<?php echo $podName2; ?>/<?php echo $actPod->field('permalink');?>"><div class="readmore-btn"><h4>READ MORE</h4></div></a>
                    </div><!--end of price-readmore-->
                    </div><!--end of subcontent-1-->      
                </div><!--end of content-->
                <?php endwhile; ?>
              </div>
                </section>
                
                
                <section id="nearby-accommodation">
                  <div class="container">
                  <?php
                    while ( $accPod->fetch() ):
                      $accImage = $accPod->field('image_1');
                      $accImage = wp_get_attachment_image_src($accImage['ID'], '');
                  ?>                    
                 <div class="content clearfix">
                  <div class="subcontent-1 clearfix">
                    <div class="image-title-rating">
                        <div class="title-rating2 clearfix">
                            <div class="panel-title"><h4><?php echo $accPod->field('name');?></h4></div>
                            <div class="area"><h4><?php echo $accPod->display('area');?></h4></div>
                        </div><!--end of title-rating2-->
                      
                    <div class="panel-image"><img src="<?php echo $accImage[0];?>" alt=""></div>
                   
                    <div class="description"><p><?php echo $accPod->field('blurb'); ?></p>
                    </div> <!--end of description-->
                    </div><!--end of image-title-rating-->
                    <div class="price-readmore clearfix"> 
                        <div class="total"><h3>Price  $<?php echo $accPod->field('price');?></h3></div>
                        <a href="<?php bloginfo('url');?>/<?php echo $podName4; ?>/<?php echo $accPod->field('permalink');?>"><div class="readmore-btn"><h4>READ MORE</h4></div></a>
                    </div><!--end of price-readmore-->
                    </div><!--end of subcontent-1-->      
                </div><!--end of content-->
                <?php endwhile; ?>
              </div>
                </section>
                
                
                <section id="nearby-transport">
                  <div class="container">
                  <?php
                    while ( $transPod->fetch() ):
                      $transImage = $transPod->field('image_1');
                      $transImage = wp_get_attachment_image_src($transImage['ID'], '');
                  ?> 
                  <?php if ( $transPod->field('id') != $featuredPod->field('id') ): ?>     
                <div class="content clearfix">
                  <div class="subcontent-1 clearfix">
                    <div class="image-title-rating">
                        <div class="title-rating2 clearfix">
                            <div class="panel-title"><h4><?php echo $transPod->field('name');?></h4></div>
                            <div class="area"><h4><?php echo $transPod->display('area');?></h4></div>
                        </div><!--end of title-rating2-->
                      
                    <div class="panel-image"><img src="<?php echo $transImage[0];?>" alt=""></div>
                   
                    <div class="description"><p><?php echo $transPod->field('blurb'); ?></p>
                    </div> <!--end of description-->
                    </div><!--end of image-title-rating-->
                    <div class="price-readmore clearfix"> 
                        <div class="total"><h3>Price  $<?php echo $transPod->field('price');?></h3></div>
                        <a href="<?php bloginfo('url');?>/<?php echo $podName3; ?>/<?php echo $transPod->field('permalink');?>"><div class="readmore-btn"><h4>READ MORE</h4></div></a>
                    </div><!--end of price-readmore-->
                    </div><!--end of subcontent-1-->      
                </div><!--end of content-->
                <?php endif;?>
                <?php endwhile; ?>
              </div>
                </section>
                
                
               
                
               
            </div><!--end of panels-->
        </div><!--end of tabs-panel cleafix-->        
<?php get_footer(); ?>             