jQuery(document).ready(function($){
	
/*========================== Dissolve Image Gallery  ============================*/
		
		/*------------------Declare variables--------------------*/
											 
		var thumbOpacity = .65,
		thumbSpeed = 200,
		currentIndex = 0,
		dissolveSpeed = 400,
		$thumbs = $(".thumbs img"),
		$images = $(".images img"),
		numImages = $images.length;
		
		/*------------------ Initialisation -------------------*/
		
		//initialise thumbs
	 	$thumbs.css({"opacity":thumbOpacity}).eq(currentIndex).addClass("selected").css({"opacity":1});
	
		//initialise images
		$images.parent().css("position","relative");
	 	$images.css("position","absolute").hide().eq(currentIndex).fadeIn(dissolveSpeed);
		
		
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
			
				//fade out current image and remove selected class form thumb
				$images.eq(currentIndex).fadeOut(dissolveSpeed);
				$thumbs.eq(currentIndex).removeClass("selected").stop(true, true).fadeTo(thumbSpeed, thumbOpacity);
				
				//update the current index
				currentIndex = newIndex;
				
				//fade in the selected image and add selected class to thumb
				$images.eq(currentIndex).stop(true, true).fadeIn(dissolveSpeed);
				$thumbs.eq(currentIndex).addClass("selected").fadeTo(thumbSpeed, 1);
			
		};
		
		/*------------------ Thumbs Click Handler --------------------*/
		
		$thumbs.click(function(){
			
			var selectedIndex = $thumbs.index(this);
			
			//only change image if not the selected image
			if(currentIndex != selectedIndex){
				
				changeImage(selectedIndex);
				
			}
			
		});
		
			/*---------------------- Next and Previous Btns -----------------------*/
	 /*
		$nextBtn.click(function(){
			
			if(currentIndex<numImages-1){
				
				changeImage(currentIndex+1);
				
			}else{
				
				changeImage(0);
				
			}
		 
		});
		
		$prevBtn.click(function(){
			
			//update the current index
			if(currentIndex>0){
				
				changeImage(currentIndex-1);
				
			}else{
	
				changeImage(numImages-1);
				
			}
		
		 
		});*/
		
		
		
			//start of audio player
	
	var $song = $(".song li a");
	//$data-song = $("li");
	var $discoAudio = $('#disco');
	
	
	$song.click(function(e){
		
		$discoAudio.slideToggle('fast');
		e.preventDefault();
		
		
		//var selected
		$song.filter(".selected").removeClass("selected");
		$discoAudio.hide();
		$discoAudio.slideDown('5000').show;
		$(this).addClass("selected");
		var song = $(this).data("song");
		
		
		$discoAudio.find('source').attr("src", song);
   
        /****************/
        $discoAudio[0].pause();
        $discoAudio[0].load();//suspends and restores all audio element
		$discoAudio[0].play();
		
		});
		
		
		
		$('.nav-control').click(function(){
	//alert('.nav-control clicked');
	
	$('ul.menu').slideToggle("slow");
	
	
	});
	
	
	$(window).resize(function() {
	
	if($(window).width() >480 ){
			$('ul.menu').removeAttr("style");
	
	}

});
		
	
});//end ready handler