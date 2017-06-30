$(document).ready(function(){
	window.width = $(window).width();
	// big_slider


	$("#example").zAccordion({
		tabWidth: "15%",
		width: "100%",
		height: "852px",
	});
	if(width <= 1600 && width > 1200){
		$("#example").zAccordion({
			tabWidth: "15%",
			width: "100%",
			height: "800px",
		});
	}else if(width <= 1200 && width > 1050){
		$("#example").zAccordion({
			tabWidth: "15%",
			width: "100%",
			height: "650px",
		});
	}else if(width <= 1050 && width > 750){
		$("#example").zAccordion({
			tabWidth: "15%",
			width: "100%",
			height: "500px",
		});
	}else if(width <= 750 && width > 600){
		$("#example").zAccordion({
			tabWidth: "15%",
			width: "100%",
			height: "400px",
		});
	}else if(width <= 600 && width > 400){
		$("#example").zAccordion({
			tabWidth: "15%",
			width: "100%",
			height: "300px",
		});
	}else if(width <= 400){
		$("#example").zAccordion({
			tabWidth: "15%",
			width: "100%",
			height: "200px",
		});
	}

	$("#example").children(":first").children(".slide_img_abs2").css({
		"background-color":"rgba(0,0,0,0)",
	});

	$("#example").children(":first").children(".slide_img_abs").css({
		"display":"block",
	});
	$("#example").children(":first").children(".slide_img_abs2").find(".slide_img_title").css({
		"border-bottom": "0px solid #fdc93a",
	});
	$("#example").children(":first").children(".slide_img_abs2").find(".smallslider_order_btn").css({
		"display": "block",
	});

	$(".example_child").click(function(){
		$(".slide_img_abs").css({
			"display":"none",
		});

		$(this).children(".slide_img_abs").css({
			"display":"block",
		});

		$(".slide_img_abs2").css({
			"background-color":"rgba(0,0,0,0.5)",
		});

		$(this).children(".slide_img_abs2").css({
			"background-color":"rgba(0,0,0,0)",
		});

		$(".slide_img_title").css({
			"border-bottom": "6px solid #fdc93a",
		});

		$(this).children(".slide_img_abs2").find(".slide_img_title").css({
			"border-bottom": "0px solid #fdc93a",
		});

		$(".smallslider_order_btn").css({
			"display": "none",
		});

		$(this).children(".slide_img_abs2").find(".smallslider_order_btn").css({
			"display": "block",
		});
	});

	// big_slider
});