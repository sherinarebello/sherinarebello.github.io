$(document).ready(function(){

	//alert("ready");
	var $mainNavItems = $('.navmenu a'),
	$htmlBody = $('html, body'),
	topOffset= 150,
	rightOffset= 400,
	duration = 1000,
	windowWidth = $(window).width(),
	$costumePanels = $('.costume-panels'),
	$costumeImages = $('.costume-panels img'),
	costumeWidth = 700;
	currentIndex = 0;
	
	
	//initialise
	$(".content").css({"margin-top":topOffset});
	
	$costumePanels.css({"position":'fixed', "top": 0, "left": windowWidth});
	$costumeImages.css({"position":'absolute', "top": 0, "left":0}).eq(currentIndex).animate({"left":-costumeWidth}, 500);
	$mainNavItems.eq(currentIndex).addClass("selected");
	
	$(window).resize(function(){
		
		windowWidth = $(window).width();
		$costumePanels.css({"left": windowWidth});
		
	});


	//navmenu click handler
	$mainNavItems.click(function(e){
		
		e.preventDefault();
		
	
	$mainNavItems.eq(currentIndex).removeClass("selected");
	/*		currentIndex =  $mainNavItems.index(this);
		$mainNavItems.eq(currentIndex).addClass("selected");*/
		
		$costumeImages.eq(currentIndex).animate({"left":0}, 500);
		
		currentIndex = $mainNavItems.index($(this));
		var id = $(this).attr("href"),
		endScroll = $(id).offset().top -topOffset;
		
		//alert('click: '+endScroll);
		$htmlBody.animate({scrollTop:endScroll}, 1500, function(){
			
			$costumeImages.eq(currentIndex).animate({"left":-costumeWidth}, 500);
			
			
		});
		
		
	});
	
	////gallery CODE //////////////////////////////////////////////////////////////////////		



	
	$(".galcontent").dissolvegallery();
	


	var $tabs = $('section nav a');
	$panels = $('.gal section');
	$caption = $('.gal-caption h2'),
	currentTabIndex = 0,
	selectedTabIndex = 0,
	fadeSpeed = 500;

	//initialise
	$panels.hide().css({"position":"absolute"}).eq(currentTabIndex).show();
	$tabs.eq(currentTabIndex).addClass('selected');
	
	//tab click handler
	$tabs.click(function(e){
		//$panels.eq(currentIndex).hide();
		e.preventDefault();
		
		var selectedTabIndex = $tabs.index(this);
		
		if(currentTabIndex != selectedTabIndex){
		
			$caption.eq(currentTabIndex).fadeOut(fadeSpeed);
			$panels.eq(currentTabIndex).fadeOut(fadeSpeed);
			$tabs.eq(currentTabIndex).removeClass('selected');
			
			currentTabIndex = selectedTabIndex;
			//alert('clicked:' +currentIndex);
			
			//$panels.eq(currentIndex).show();
			$caption.eq(currentTabIndex).fadeIn(fadeSpeed);
			$panels.eq(currentTabIndex).fadeIn(fadeSpeed);
			$tabs.eq(currentTabIndex).addClass('selected');
		};
		
	});//end of tabs.click function
	
		
/////CONTACT FORM VALIDATION//////////////////////////////////////////////////////////////////

	
	//set variables references for all the various form elements;
	var $name = $("#name"),
	$email = $("#email"),
	$subject = $("#subject"),
	$message = $("#message"),
	$spam = $("#spam"),
	$formFields = $("input:text, textarea"),
	$status = $("#status"),
	$resetBtn = $("input:reset"),
	$contactForm = $(".contact-form");
	
	//initialise
	$status.hide();
	
	/*submit handler for contact form*/
	$contactForm.submit(function(e) {	
			
			//prevent default form submit action
		 	e.preventDefault();
			
			//clear all error borders from form fields
			$formFields.removeClass("error-focus");
			
			//check required fields are not empty and that the email address is valid
			if($name.val()==""){
				
					setStatusMessage("Please Enter Your Name");
					$name.setFocus();
				
			}else if($email.val()==""){
				
					setStatusMessage("Please Enter Your Email Address");
					$email.setFocus();
				
			}else if(!isValidEmail($email.val())){
				
					setStatusMessage("Please Enter a Correct Email Address");
					$email.setFocus();
				
			}else if($subject.val()==""){
				
					setStatusMessage("Please Enter a Subject");
					$subject.setFocus();
				
			}else if($message.val()==""){
				
					setStatusMessage("Please Enter Your Message");
					$message.setFocus();
				
			}else if(!$spam.val()==""){
				
					setStatusMessage("Spam Attack!!");

			}else{
				
					//if all fields are valid then send data to the server for processing and didplay "please wait" message
					setStatusMessage("Email being sent... please wait");
				
					//serialize all the form field values as a string
					var formData = $(this).serialize();
				
				//send serialized data string to the send mail php via POST method
				
				$.post("send_mail.php", function(sent){
					
					if(sent=="error"){ 
						 
							 	setStatusMessage("Opps, something went wrong - message not sent");
							 
						  } else if(sent=="success"){
								
								setStatusMessage("Thanks "+$name.val()+", your message has been successfully sent");
								
								//clear form fields
								$formFields.val("");
								
						  }//end if else
					 
					},"html");
				
			}//end else

   });//end submit
	
	//click handler for reset button
	$resetBtn.click(function(){
			$status.slideUp("fast");
			$formFields.removeClass("error-focus");														
	});
	
	//helper functions
	function setStatusMessage(message){
		$status.html(message).slideDown("fast");
	}
	
	$.fn.setFocus = function(){
		return this.focus().addClass("error-focus");
	}
	
	function isValidEmail(email) {
		var emailRx = /^[\w\.-]+@[\w\.-]+\.\w+$/;
		return  emailRx.test(email);
	}
		
			//Code for Team Image hover
			$('.team-members').hover(function(){
			//alert('click');
			$(this).find('.title').stop(true, true).animate({'margin-top': '118px'}, 400); 
			}, function(){
				
			$(this).find('.title').stop(true, true).animate({'margin-top': '150px'}, 400); 												
	});	
	
			//Code for Designer Image hover
			$('.design-members').hover(function(){
			//alert('click');
			$(this).find('.title').stop(true, true).animate({'margin-top': '118px'}, 400); 
			}, function(){
				
			$(this).find('.title').stop(true, true).animate({'margin-top': '150px'}, 400); 												
	});	
			
			//Code for Nav menu hover styles
			var $nav = $(".navmenu a");
			
			$nav.click(function(e){
		
			e.preventDefault();
			$nav.filter(".selected").removeClass("selected");
			$(this).addClass("selected");
		

	});

		
			//Code for ENTER landing page
			var $enter = $('#enter a'),
			homePageURL = "home.html",
			fadingSpeed = 400;
			
			$enter.click(function(e){
			
			e.preventDefault();
		
			//alert('clicked');
		
			$('body').fadeOut(fadingSpeed, function(){
				window.location = homePageURL;
			});
			
		
		
	});//end of enter.click function
	
		
		

});	
