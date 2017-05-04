// hamburger menu toggle
function togglemenu() {
	$('#mobile').slideToggle();
}

// slider initialization
$(document).ready(function () {
	$('#coin-slider').coinslider({
		width: "960",
		height: "536",
		navigation: false,
		effect: 'straight',
		HoverPause: false,
		links: false,
		opacity: 0.8
	});
});
