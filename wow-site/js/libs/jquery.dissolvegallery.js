//Gallery plugin

//create a private scope
(function($){

	//create jQuery function dissolvegallery();
	$.fn.dissolvegallery = function(){
		
		//return the wrapped set and loop through the set and apply functionality to each member of the set
		return this.each(function(){
		
			/*------------------Declare variables--------------------*/
												 
//			var $tabs = $('section nav a');
//			$panels = $('.gal section'),
//			$images = $('.images img'),
//			$thumbs = $('.thumbs img'),
//			$caption = $('.caption h2'),
//			currentIndex = 0,
//			selectedIndex = 0,
//			selectedimageIndex = 0,
//			fadeSpeed = 500;
			
			/*------------------ Initialisation -------------------*/
			
			//initialise
//			$panels.hide().css({"position":"absolute"}).eq(currentIndex).show();
//			$tabs.eq(currentIndex).addClass('selected');
			
			/*------------------ Tabs Click Handler --------------------*/
			
			//tab click handler
			//$tabs.click(function(e){
//			//$panels.eq(currentIndex).hide();
//			e.preventDefault();
//		
//			var selectedIndex = $tabs.index(this);
//		
//			if(currentIndex != selectedIndex){
//		
//		
//			$panels.eq(currentIndex).fadeOut(fadeSpeed);
//			$tabs.eq(currentIndex).removeClass('selected');
//		
//			currentIndex = selectedIndex;
//			//alert('clicked:' +currentIndex);
//		
//			//$panels.eq(currentIndex).show();
//			$panels.eq(currentIndex).fadeIn(fadeSpeed);
//			$tabs.eq(currentIndex).addClass('selected');
//			};
//			});//end of tabs.click function
			
			///TABS CODE END//////////////////////////////////////////////////////////////////////		
		
	//	$images.hide().css({"position":"absolute"}).eq(selectedimageIndex).show();
//		$caption.hide().css({"position":"relative"}).eq(selectedimageIndex).show();
//		$thumbs.eq(selectedimageIndex).addClass('selected');
//		
//		
//		
//		$thumbs.click(function(){
//			
//			var selectedIndex = $thumbs.index(this);
//			//alert('clicked');
//			
//			if(selectedimageIndex != selectedIndex) {
//				
//				
//				$images.eq(selectedimageIndex).fadeOut(fadeSpeed);
//				$caption.eq(selectedimageIndex).fadeOut(fadeSpeed);
//				$thumbs.eq(selectedimageIndex).removeClass('selected');
//				
//			
//				selectedimageIndex = selectedIndex;
//				
//				
//				$images.eq(selectedimageIndex).fadeIn(fadeSpeed);
//				$caption.eq(selectedimageIndex).fadeIn(fadeSpeed);
//				$thumbs.eq(selectedimageIndex).addClass('selected');
//				
//			};
//			
//			
//			
//		});




//NEW CODE

			var thumbOpacity = .65,
			thumbSpeed = 200,
			currentIndex = 0,
			dissolveSpeed = 400,
		//	$tabs = $('section nav a'),
//			$panels = $('.gal section'),
			$caption = $(this).find('.gal-caption h2'),
			$thumbs = $(this).find(".thumbs img"),
			$images = $(this).find(".images img"),
			$nextBtn = $(this).find(".next-btn"),
			$prevBtn = $(this).find(".prev-btn"),
			numImages = $images.length;
			lastIndex = numImages-1;
			
			
			/*------------------ Initialisation -------------------*/
			
			//initialise
		/*	$panels.hide().css({"position":"absolute"}).eq(currentIndex).show();
			$tabs.eq(currentIndex).addClass('selected');*/
			
			//initialise thumbs
			$thumbs.css({"opacity":thumbOpacity}).eq(currentIndex).addClass("selected").css({"opacity":1});
		
			//initialise caption
			$caption.parent().css("position","relative");
			$caption.css("position","absolute").hide().eq(currentIndex).fadeIn(dissolveSpeed);
			
			
			//initialise images
			$images.parent().css("position","relative");
			$images.css("position","absolute").hide().eq(currentIndex).fadeIn(dissolveSpeed);
			
			
			
			
		/*	//tab click handler
			$tabs.click(function(e){
			//$panels.eq(currentIndex).hide();
			e.preventDefault();
		
			var selectedIndex = $tabs.index(this);
		
			if(currentIndex != selectedIndex){
		
		
			$panels.eq(currentIndex).fadeOut(fadeSpeed);
			$tabs.eq(currentIndex).removeClass('selected');
		
			currentIndex = selectedIndex;
			//alert('clicked:' +currentIndex);
		
			//$panels.eq(currentIndex).show();
			$panels.eq(currentIndex).fadeIn(fadeSpeed);
			$tabs.eq(currentIndex).addClass('selected');
			};
			});//end of tabs.click function*/
			
			
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
			
			function changeImage(newIndex){
				
					//alert(newIndex);
					//fade out current image and remove selected class form thumb
					$caption.eq(currentIndex).fadeOut(dissolveSpeed);
					$images.eq(currentIndex).fadeOut(dissolveSpeed);
					$thumbs.eq(currentIndex).removeClass("selected").stop(true, true).fadeTo(thumbSpeed, thumbOpacity);
					
					//update the current index
					currentIndex = newIndex;
					
					//fade in the selected image and add selected class to thumb
					$caption.eq(currentIndex).stop(true, true).fadeIn(dissolveSpeed);
					$images.eq(currentIndex).stop(true, true).fadeIn(dissolveSpeed);
					$thumbs.eq(currentIndex).addClass("selected").fadeTo(thumbSpeed, 1);
				
			};
			
			/*------------------ Thumbs Click Handler --------------------*/
			
			$thumbs.click(function(){
				
				var selectedIndex = $thumbs.index(this);
				
				//only change image if not the selected image
				if(currentIndex != selectedIndex){
					
					changeImage(selectedIndex);
					changeCaption(selectedIndex);
					
				}
				
			});
			
				/*---------------------- Next and Previous Btns -----------------------*/
		 
			$nextBtn.click(function(){
				
				if(currentIndex<lastIndex){
					
					changeImage(currentIndex+1);
					changeCaption(currentIndex+1);
					
				}else{
					
					changeImage(0);
					changeCaption(0);
					
				}
			 
			});
			
			$prevBtn.click(function(){
									
									
				
				//update the current index
				if(currentIndex>0){
					
					changeImage(currentIndex-1);
					changeCaption(currentIndex-1);
					
				}else{
					
					//alert(lastIndex);
		
					changeImage(lastIndex);
					changeCaption(lastIndex);
					
				}
			
			 
			});
		
		
			
			
			
		});//RETURN function
	};//end $.fn.dissolvegallery

		  
})(jQuery);