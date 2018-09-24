$(document).ready(function(){

	// Vars Setup
		// THREE COL VARS
	var $threeCol = $("div.colhead"),
		$cols = $(".col1, .col2, .col3"),
		// WINDOW VARIABLES
		windowWidth,
        isMobile,
		// MAP VARS
		$mapContainer = $("#map-container"),
		$mapBtn = $("#map-btn"),
		$map = $("#map-content"),
		$fullMap = $("#full-map"),
		$clearFilters = $("#clearFilters"),
	    // ISOTOPE VARS
	    $container = $(".isotope"),
	    filters = {},
		// OTHER VARS
		$backtoTop = $("div.backtotop"),
		// SPEED VARS
		animSpeed = 400,
		fadeSpeed = 1500;

	// INIT
	// ==============================================
	$(window).load(function(){
		setSize();
	});
	
	checkWindowWidth();
	
		if ( isMobile == false ){
			$.backstretch("http://kasper-l.dmlive.co.nz/summatives/04/wp-content/themes/leapnz/images/background.jpg");
		}else{
			// do nothing
		}
	
	

	$('.contact-form').formvalidation();

		//PRELOADER


		
		// FUNCTIONS
		// ==============================================
		function setSize(){
			var $localMap = $(".google-map-image iframe"),
				$featureImageHeight = $(".feature-image").height(),
				$featureThumbnailHeight = $(".feature-thumbs").height(),
				margin = 10,
				$combinedHeight = $featureImageHeight + $featureThumbnailHeight + margin;

				$localMap.height($combinedHeight);
		}
	    function checkWindowWidth(){
	        var windowWidth = $(window).width();
	            if ( windowWidth <= 752 ){
	                isMobile = true;
	            }else {
	                isMobile = false;
	            }
	    }	
		function repositionMapUp(){
			$mapContainer.animate({right:-500},0);
			$map.show();
			$mapContainer.removeClass("slided-down");
		}
		function repositionMapDown(){
			$mapContainer.animate({right:0},0);
			$map.hide();
			$mapContainer.removeClass("slided-right");
		}


		function closeMap(){
			$mapContainer.removeClass("slided-right");
			$mapContainer.stop().animate({right:-500}, 500);
		}

		function openMap(){
			$mapContainer.addClass("slided-right");
			$mapContainer.stop().animate({right:0}, 500);
		}
		// ==============================================
		// END OF FUNCTIONS

		// START OF WINDOW
		// ==============================================
			$(window).resize(function(){
				setSize();
			});	
		// ==============================================	
		// END OF WINDOW


		// START OF MAP
		// ==============================================
		    // REPOSITION MAP WHEN GOING FROM MOBILE -> DESKTOP.

		    // INIT MAP STATE
		    if( $(window).width() <= 752 ){
		    	$map.hide();
		    }else{
		    	$map.show();
		    };

		    // REPOSITION MAP DEPENDING ON WINDOW SIZE
		    $(window).resize(function(){
		    	checkWindowWidth();
		    	if (isMobile == true && $mapContainer.hasClass("slided-down")){
		    		//repositionMapDown();
		    	}else if(isMobile == true && !$mapContainer.hasClass("slided-down")){
		    		repositionMapDown();
		    	}else if(isMobile == false && $mapContainer.hasClass("slided-right")){
	    			//repositionMapUp();
		    	}else if(isMobile == false && !$mapContainer.hasClass("slided-right")){
		    		repositionMapUp();
		    	};
		    });
		                    
		    // TOGGLE MAP FUNCTION
			$mapContainer.on("click", "#map-btn", function(){
				checkWindowWidth(); //check the window width
				if ( isMobile == true ){ //mobile function
					$map.slideToggle(animSpeed);
					$mapContainer.toggleClass("slided-down");
				} else { // not-mobile function
					if( !$mapContainer.hasClass("slided-right")){
						openMap();
					}else{
						closeMap();
					};		
				};
			});
			// HOVER FUNCTION
			$fullMap.children("a").hover(function(){
				var $this = $(this);
				$this.children(".regions").animate({opacity:1}, 200);
				$this.find(".arrowpic").animate({opacity:0}, 200);
			}, function(){
				var $this = $(this);
				$this.children(".regions").animate({opacity:0}, 200);
				$this.find(".arrowpic").animate({opacity:1}, 200);		
			});
		// ==============================================	
		// END OF MAP


		// START OF ISOTOPE 
		// ==============================================
	    
			// ISOTOPE -> FILTERS
		    $('.main-nav ul li a.filter , #full-map a, #clearFilters, a.filter.selected').click(function(e){
			      if (window.location.href.indexOf('packages') != -1){
			      	// do nothing	
			      }else if (window.location.href.indexOf('activities') != -1){
			      	// do nothing
			      }else if (window.location.href.indexOf('accomodation') != -1){
			      	// do nothing
			      }else if (window.location.href.indexOf('transport') != -1){
			      	// do nothing
			      }else if (window.location.href.indexOf('contact') != -1){
			      	// do nothing
			      }else if (window.location.href.indexOf('nz-info') != -1){
			      	// do nothing
			      }else{
			      	e.preventDefault()
			      }		     
		      var $this = $(this);
		      // don't proceed if already selected
		      if ( $this.hasClass('selected') ) {
		        return;
		      }
		      
		      if ( $this.hasClass("filter") ){
			      var $optionSet = $this.parents('.option-set');
			      // change selected class
			      $optionSet.find('.selected').removeClass('selected');
			      $this.addClass('selected');
		      }
		      // store filter value in object
		      // i.e. filters.color = 'red'
		      var group = $optionSet.attr('data-filter-group');
		      filters[ group ] = $this.attr('data-filter-value');
		      // convert object into array
		      var isoFilters = [];
		      for ( var prop in filters ) {
		        isoFilters.push( filters[ prop ] )
		      }
		      var selector = isoFilters.join('');
		      $container.isotope({ filter: selector });
		    });

			$(".hover-text").hide();

			$(".small , .medium , .large").hover(function(){
			$(this).children(".hover-text").show();
				$(this).children("img").animate({opacity:0}, 200);	
			}, function(){
			$(this).children(".hover-text").hide();
				$(this).children("img").animate({opacity:1}, 200);
				
			});

		// ==============================================
		// END OF ISOTOPE


		// START OF CART
		// ==============================================
			// TOGGLE CART FUNCTION
			$("#cart-btn").click(function(e){
				e.preventDefault();
				var $displayCart = $("#display-cart"),
					$bookContainer = $("#details");
					$(this).toggleClass("selected");

					$displayCart.slideToggle(animSpeed);

					if( $("header").hasClass("fixedHeader") ){
						$("html,body").animate({scrollTop:0}, 250);
						$("header").removeClass("fixedHeader");
					}

						// scroll up the book container when closing the full cart container
						var $bookContainer = $("#details");
			
						if ($bookContainer.is(':visible')){
							$bookContainer.slideUp(animSpeed);
				};
			});
		// ==============================================	
		// END OF CART


		// START OF THE REST
		// ==============================================
			// THREE COLUMN ACCORDION FUNCTION

			$cols.children("div").not(".colhead").hide();

			$(window).resize(function(){
				if (isMobile == true && $threeCol.next("div").hasClass("expanded")){
					$threeCol.next("div").hide().removeClass("expanded");
					$threeCol.removeClass("selected");
				}else{
					// do nothing
				};
			});

			$threeCol.on("click", $(this), function(e){
				var $this = $(this);
				e.preventDefault();
				checkWindowWidth();

				$cols.children(".selected").removeClass("selected");
				
				if ( isMobile == true ){
					$(".expanded").slideUp(animSpeed);
						if (!$this.next("div").is(":visible")){
							$this.addClass("selected");
							$this.next("div").slideToggle(animSpeed);
							$this.next("div").addClass("expanded");
						}else if ($this.next("div").is(":visible")){
							$this.removeClass("selected");
						}
				}else if ( isMobile == false ){//not mobile	
					$this.next("div").slideToggle(0).addClass("expanded");
					$this.addClass("selected");
					$cols.not($this.parent()).children(".expanded").slideUp(0);
					$cols.not($this.parent()).children(".selected").removeClass("selected");

					if(!$this.next("div").is(":visible")){
						$this.removeClass("selected");
					}
				}//end if/else Mobile
			});// end function







			// BACK TO TOP FUNCTION
			$backtoTop.click(function(e){
				e.preventDefault();
				$("html, body").animate({scrollTop: 0}, animSpeed);
			});
			// Tabbed Panels
				  var   $tabs = $(".tabs-panel nav a"),
						$panels = $(".panels section"),
						$panelContainer = ("div.panels"),
						currentIndex = 0;
				//initialise
				$panels.hide().eq(currentIndex).show();
				$tabs.eq(currentIndex).addClass("selected");
				
				//tabs click handler
				$tabs.click(function(e){
					e.preventDefault();
					
					var selectedIndex = $tabs.index(this);
					
					//only change panels if not currently selected
					if(selectedIndex != currentIndex){
						//hide previous panel
						$panels.hide();
						//clear selected tab
						$tabs.eq(currentIndex).removeClass("selected");
						
						//update currentIndex to clicked on tab's index
						currentIndex = selectedIndex;
						
						//show selected panel
						$panels.eq(currentIndex).fadeIn(fadeSpeed);
						//set selected tab
						$tabs.eq(currentIndex).addClass("selected");
					}
					
				});
					/*========================== Dissolve Image Gallery  ============================*/
					var	thumbOpacity = .65,
						thumbSpeed = 200,
						currentIndex = 0,
						$thumbs = $(".feature-thumbs img"),
						$images = $(".feature-image img");
														 		
					/*------------------ Initialisation -------------------*/
					
					//initialise thumbs
				 	$thumbs.css({"opacity":thumbOpacity}).eq(currentIndex).css({"opacity":1});
				
					//initialise images
				 	$images.hide().eq(currentIndex).show();
					
					
					/*------------------ Thumbs Hover Handler --------------------*/
				 
				 	//add hover event handler to the set of thumbs
				 	$thumbs.hover(function(){
						
						//on mouse enter fade the thumb in to full thumbOpacity
					 	$(this).stop(true, true).fadeTo(thumbSpeed, 1);
						
					}, function(){
						
						//on mouse leave fade the thumb out to thumbOpacity
						if($thumbs.index(this)!==currentIndex){
							$(this).stop(true, true).fadeTo(thumbSpeed, thumbOpacity);
						}
						
					});
					
					/*------------------ Thumbs Click Handler --------------------*/
					
					$thumbs.click(function(){
						
						var selectedIndex = $thumbs.index(this);
						
						//only change image if not the selected image
						if(currentIndex != selectedIndex){
							
							//fade out current image and remove selected class form thumb
							$images.eq(currentIndex).hide();
							$thumbs.eq(currentIndex).removeClass("selected").stop(true, true).fadeTo(thumbSpeed, thumbOpacity);
							
							//update the current index
							currentIndex = selectedIndex;
							
							//fade in the selected image and add selected class to thumb
							$images.eq(currentIndex).stop(true, true).show();
							$thumbs.eq(currentIndex);
						}
						
					});	

					/* FIXED HEADER FUNCTION */

					$(window).scroll(function(){
						var $cart = $("#display-cart");
						if( isMobile == false && !$cart.is(":visible") ){
							if( $(this).scrollTop() > 30 ){
								$("header").addClass("fixedHeader");
							}else{
								$("header").removeClass("fixedHeader");
							}							
						}else{
							// do nothing
						}						
					});
		// ==============================================
		// END OF THE REST
		
}); // END OF DOC.READY