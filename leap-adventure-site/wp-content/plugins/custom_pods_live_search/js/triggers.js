jQuery(document).ready(function($) {

	var tabIndex = 0;
//	alert(tabIndex);
	var podNames = ['activities', 'accomodation', 'transport'];
	var podName = podNames[tabIndex];
	var $panels = $(".container");
	var $target = $panels.eq(tabIndex);

	$("div.tabs-panel li").click(function(){
		tabIndex = $(this).index();
	//	alert(tabIndex);
		podName = podNames[tabIndex];
	//	alert(podName);
		$target = $panels.eq(tabIndex);
		console.log($target);
		$("input#search").val("");
	});



	//alert("search triggers ready");
	$searchForm = $(".live-search-form");
	$searchInput = $searchForm.find(".search");
	

	$searchInput.keyup(function(){
		searchPod();
	});
	
	function searchPod(){
		//alert("search pod");
		var searchTerm = $searchInput.val(),
		ajaxURL = $searchForm.attr('action'),
		action = $searchForm.find('#action').val();

		//post searchTerm and podName to php action live-search
		$.post(ajaxURL, {'action': action, 'searchTerm' : searchTerm, 'podName' :  podName },function(data){
			$target.html(data);
	   });
		
	}
});
