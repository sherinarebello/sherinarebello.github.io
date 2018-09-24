$(document).ready(function(){

//Preloader

	 /*----Preloader----*/
	 
	    $(".panels").hide();
	    $("header").hide();
   if(!$("html").hasClass("lt-ie8")){
   

	   $("body").queryLoader2({
			barColor: "#e1e1e1",
			backgroundColor: "#000",
			barHeight: 1,
			completeAnimation: "grow",
			minimumTime: 100
		});

		
		$(".wrapper").fadeIn();
		$(".panels").show();
		$("header").show();
    }else{
		$(".lt-ie8 .wrapper").show().css("display","none");  
	}
	
	var $mainTabs = $("header nav a"),
	$mainPanels = $(".panels section"),
	tabIndex = 0,
	fadeSpeed = 500,
	$panels = $(".panels section"),
	$slider = $(".slider"),
	panelWidth = $panels.width(),
	numPanels = $panels.size(),
	currentIndex = 0,
	buttonIndex = 0,
	$button = $(".button"),
	$name = $("#name"),
	$email = $("#email"),
	$subject = $("#subject"),
	$message = $("#message"),
	$spam = $("#spam"),
	$formFields = $("input:text, textarea"),
	$status = $("#status"),
	$resetBtn = $("input:reset"),
	$contactForm = $(".contact-form");
	// alert('worknav'+$workNav.size());
	
	//initialise
	
	//,"margin-left":"5% "position":"absolute""
	$mainPanels.hide().eq(tabIndex).show();
	$mainTabs.eq(tabIndex).addClass("selected");
	
	//tab click handler
	$mainTabs.click(function(e){
		
		e.preventDefault();
		
		var selectedIndex = $mainTabs.index(this);
		
		if(tabIndex != selectedIndex){
		
			$mainPanels.eq(tabIndex).fadeOut(fadeSpeed);
			$mainTabs.eq(tabIndex).removeClass("selected");
			
			tabIndex = selectedIndex;
			//alert("clicked: "+tabIndex);
			
			$mainPanels.eq(tabIndex).fadeIn(fadeSpeed);
			$mainTabs.eq(tabIndex).addClass("selected");
		}
		
	});
	
	$(".button").click(function(){
		$(this).addClass("selected");	

		var selectedState = $button.index(this);
		
		if(buttonIndex != selectedState){

		$(".button").removeClass("selected");
		}
});



	
	//$workNav.click(function(){
		//alert('clicked');
	//})
	
	
		//initialise
	$status.hide();
	
	/*submit handler for contact form*/
	$contactForm.formvalidation();
	//backtotop
	
$("#back-top").hide();
    $(window).scroll(function () {
        if ($(this).scrollTop() > 150) {
            $('#back-top').fadeIn();
        } else {
            $('#back-top').fadeOut();
        }
    });
});
jQuery('.back-to-top').click(function () {
    jQuery('html, body').animate({
        scrollTop: 0
    }, 'slow');
    
   
	
	
});