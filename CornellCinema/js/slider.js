 jQuery(document).ready(function($){
      $("a[rel^='prettyPhoto']").prettyPhoto({
		theme:'dark_square',
		default_width: 600
		
	}); 
    $('#my-slider').advancedSlider({
											 skin: 'minimal-small-cine',
											 slideshow: true,
											 shadow: false,
											 width:'100%',
											 height:400,
											 captionPosition: 'bottom',
											 captionBackgroundColor:'#111',
										   	 slideshowControls: true, 
										   	 slideshowControlsToggle: false,
										   	 slideArrowsToggle: false, 
										   	 slideButtonsNumber: true,
										   	 timerAnimationControls: false,
										   	 timerRadius: 15, 
											 timerStrokeColor1: '#ffffff', 
											 timerStrokeColor2: '#000000', 
											 timerStrokeOpacity1: 0.8, 
											 timerStrokeWidth1: 6, 
											 timerStrokeWidth2: 3, 
										   	 effectType: 'fade',
											 slideEasing: 'easeInOutExpo',
										   	 slideLoop: true,
										   	 overrideTransition: true
										 
		});
		
	});
	

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-32510604-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();