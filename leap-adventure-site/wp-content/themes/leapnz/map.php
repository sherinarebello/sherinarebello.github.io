 <div id="map-container">
        <div id="map-btn">
            <h4>MAP</h4>
            <div class="map-icon"><img src="<?php bloginfo('template_url'); ?>/images/map-icon-sml.png" alt="mapiconsml"></div>
        </div>
            <div id="map-content" class="option-set" data-filter-group="regions">
            <div id="full-map">
                <img id="map-default" src="<?php bloginfo('template_url'); ?>/images/map-new/map-default.png" alt="map" />
                
                <a class="filter" href="<?php echo home_url(); ?>" data-filter-value=".1">
                    <img class="regions" id="upper-nth" src="<?php bloginfo('template_url'); ?>/images/map-new/upper-nth-island.png" alt="upper north island" />
                    <div class="arrow1" id="upper-nth-title">
                        <img class="arrowpic" src="<?php bloginfo('template_url'); ?>/images/maparrowleftblack.png" alt="arrow">
                        <img class="region-selected" src="<?php bloginfo('template_url'); ?>/images/maparrowleftselected.png" alt="arrow">
                            <h3 class="region-name">Upper North</h3>
                    </div>
                </a>
                    
                <a class="filter" href="<?php echo home_url(); ?>" data-filter-value=".2">
                    <img class="regions" id="mid-nth" src="<?php bloginfo('template_url'); ?>/images/map-new/central-nth-island.png" alt="middle north island" />
                    <div class="arrow2" id="mid-nth-title">
                        <img class="arrowpic" src="<?php bloginfo('template_url'); ?>/images/maparrowleftblack.png" alt="arrow">
                        <img class="region-selected" src="<?php bloginfo('template_url'); ?>/images/maparrowleftselected.png" alt="arrow">
                            <h3 class="region-name">Mid North</h3>
                    </div>
                </a>
                    
                <a class="filter" href="<?php echo home_url(); ?>" data-filter-value=".3">
                    <img class="regions" id="lower-nth" src="<?php bloginfo('template_url'); ?>/images/map-new/lower-nth-island.png" alt="lower north island" />
                    <div class="arrow3" id="lower-nth-title">
                    <img class="arrowpic" src="<?php bloginfo('template_url'); ?>/images/maparrowleftblack.png" alt="arrow">
                        <img class="region-selected" src="<?php bloginfo('template_url'); ?>/images/maparrowleftselected.png" alt="arrow">
                            <h3 class="region-name">Lower North</h3>
                    </div>
                </a>
                    
                <a class="filter" href="<?php echo home_url(); ?>" data-filter-value=".4">
                    <img class="regions" id="upper-sth" src="<?php bloginfo('template_url'); ?>/images/map-new/upper-sth-island.png" alt="upper south island" />
                    <div class="arrow4" id="upper-sth-title">
                        <img class="arrowpic" src="<?php bloginfo('template_url'); ?>/images/maparrowrightblack.png" alt="arrow">
                        <img class="region-selected" src="<?php bloginfo('template_url'); ?>/images/maparrowrightselected.png" alt="arrow">
                            <h3 class="region-name">Upper South</h3>
                    </div>
                </a>
                    
                <a class="filter" href="<?php echo home_url(); ?>" data-filter-value=".5">
                    <img class="regions" id="lower-sth" src="<?php bloginfo('template_url'); ?>/images/map-new/lower-sth-island.png" alt="lower south island" />
                    <div class="arrow5" id="lower-sth-title">
                        <img class="arrowpic" src="<?php bloginfo('template_url'); ?>/images/maparrowrightblack.png" alt="arrow">
                        <img class="region-selected" src="<?php bloginfo('template_url'); ?>/images/maparrowrightselected.png" alt="arrow">
                            <h3 class="region-name">Lower South</h3>
                    </div>
                </a>
            </div>
               <a id="clearFilters" class="filter" href="<?php echo home_url(); ?>" data-filter-value="">View all Regions</a> 
            </div>
    </div>