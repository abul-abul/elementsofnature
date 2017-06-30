$(document).ready(function(){

	var smallMenuPlace = $(".small_menu_place").offset().top;

	$(window).scroll(function(){

		var scrollTop = $(window).scrollTop();

		if(scrollTop + 100 >= smallMenuPlace){
			$(".small_menu_place").css({
				"position":"fixed",
				"left":"0px",
				"top":"100px",
			});
		}else{
			$(".small_menu_place").css({
				"position":"relative",
				"left":"0px",
				"top":"0px",
			});
		}
	});
});