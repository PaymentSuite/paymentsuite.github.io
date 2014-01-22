$(document).ready(function() {

	$(".navigator").on("click", "a", function(event) {

		var name = event.target.text;
			name = name.replace(/[' ']/g, '-');
			name = "#" + name;

		var target = $(name).offset().top - 50;

		$("html, body").animate({scrollTop:target}, {scrollSpeed:200}, {easingType:'linear'});

		return false;
	});
});
