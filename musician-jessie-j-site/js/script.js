$(document).ready(function(){
	
	
	
	var $tabs = $("nav a"),
	$footer = $("footer"),
	$panels = $(".panels section"),
	$slider = $(".slider"),
	$pages = $(".content > section"),
	panelWidth = $panels.width(),
	numPanels = $panels.size(),
	topOffset = 230,
	currentIndex = 0;
	
	
	//initialise  header
	$slider.width(panelWidth*numPanels);
	$tabs.eq(currentIndex).addClass("selected");
	
	//initialise  content
	$("header").css({"position":"fixed"});
	$(".wrapper clearfix").css({"position":"fixed", "top":0});
	$(".content").css({"margin-top":topOffset});
	
	var footerY = $pages.eq(currentIndex+1).offset().top;
	$footer.css({"top":footerY});
	$pages.eq(currentIndex).nextAll().hide();
	
	$(".calendar").hover(function(){
	//alert("video");
	$(".calendar").transition({
   perspective: '1000px',
   	rotateY: '360deg'
	},3000, function(){
		$(this).css({"rotateY": '0deg'})
	});
	
	});
	
	
	//tabs click handler
	$tabs.click(function(e){
		
		e.preventDefault();
		
		$pages.show();
		
		$tabs.eq(currentIndex).removeClass("selected");
		currentIndex =  $tabs.index(this);
		
		var endSlide = -currentIndex*panelWidth;
		footerY = $pages.eq(currentIndex+1).offset().top;
		
		
		$slider.animate({"margin-left": endSlide},1000, "easeOutExpo");
		$footer.animate({"top":footerY},  function(){
			
			$pages.eq(currentIndex).nextAll().hide();
	
			
		});
		
		var id = $(this).attr("href"),
		endScroll = $(id).offset().top - topOffset;
		$("html, body").animate({scrollTop:endScroll}, 500);
		
	
	
	//CODE FOR GALLERY SLIDER/////////////////////////////////////////////////
	
	var $thumbs = $('.thumbs img'),
	$images = $('.images img'),
	selectedimageIndex = 0,
	fadeSpeed = 500;
	
	
	//initiaise
	
	
	$images.hide().css({"position": "absolute", "align": "center"}).eq(selectedimageIndex).show();
	$thumbs.eq(selectedimageIndex).addClass("selected");
	
	
		$thumbs.click(function(){
			
			var selectedimageIndex = $thumbs.index(this);
			
			if(selectedimageIndex != currentIndex) {
				
				
				$images.eq(currentIndex).fadeOut(fadeSpeed);
				$thumbs.eq(currentIndex).removeClass("selected");
				
			
				currentIndex = selectedimageIndex;
				
				
				$images.eq(currentIndex).fadeIn(fadeSpeed);
				$thumbs.eq(currentIndex).addClass("selected");
			}
		});
	});
	

	//-----end of headerslide---------------------
	
	//start of audio player
	
	var $song = $(".song li a");
	//$data-song = $("li");
	var $discoAudio = $('#disco');
	
	$discoAudio.hide();
	
	
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

//start of home-albums jquery transit
		
		$('.home-albums img').hover(function(){
		
		
		$('.home-albums img').transition({
			 scale: 1.2 },100, function(){
				 $(this).transition({scale: 1.1})
				 
				 });
	});
});//end of doc ready


