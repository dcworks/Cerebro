	$ = jQuery.noConflict();
	$(document).ready(function(){	
		$("#featured_slider").easySlider({
			auto: true, 
			continuous: true,
			pause: 5000,
			numeric: true,
			numericId: 'featured_controls'
		});
		
		$("#article_slider").easySlider({
			auto: false, 
			continuous: true,
			pause: 5000,
			speed: 750,
			numeric: true,
			numericId: 'article_controls'
		});
		
		$(".crunch").hover(
			function () {
				$(this).find(".caption").slideDown("fast");
			}, 
			function () {
				$(this).find(".caption").slideUp("fast");
			}
		);
		
	});	