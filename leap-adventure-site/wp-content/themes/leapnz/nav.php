                	<nav class="main-nav">
                    		<ul class="option-set" data-filter-group="type">
                            	<li><a class="filter odd <?php if (!is_pod_page()){ echo 'selected'; } ?>" href="<?php echo home_url(); ?>" data-filter-value="">HOME</a></li>
                            	<li><a class="filter even <?php if (is_pod_page(385)){ echo 'selected'; } ?>" href="<?php echo home_url(); ?>" data-filter-value=".activities">ACTIVITIES</a></li>
                            	<li><a class="filter odd <?php if (is_pod_page(398)){ echo 'selected'; } ?>" href="<?php echo home_url(); ?>" data-filter-value=".transport">TRANSPORT</a></li>
                            	<li><a class="filter even <?php if (is_pod_page(396)){ echo 'selected'; } ?>" href="<?php echo home_url(); ?>" data-filter-value=".accomodation">ACCOMODATION</a></li>
                              <li><a class="filter odd <?php if (is_pod_page(314)){ echo 'selected'; } ?>" href="<?php echo home_url(); ?>" data-filter-value=".packages">PACKAGES</a></li>
                            	<li><a class="even <?php if (is_pod_page(405)){ echo 'selected'; } ?>" href="<?php echo home_url(); ?>/contact">CONTACT</a></li>
                            	<li><a class="odd <?php if (is_pod_page(407)){ echo 'selected'; } ?>" href="<?php echo home_url(); ?>/nz-info">NZ INFO</a></li>
                        	</ul>
                           <a class="even" id="cart-btn" href="#">
                           	<div>
                            	<img src="<?php bloginfo('template_url'); ?>/images/cart.png" alt="cart" title="cart">
                           		<div id="counter">0</div>
                                <span class="arrow"></span>
                          	</div>
                          </a>
                    </nav>