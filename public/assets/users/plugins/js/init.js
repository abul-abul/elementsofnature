$(document).ready(function(){

	// window 

	window.width = $(window).width();
	var headerTop = $("header").offset().top;

	// continue_btn

	$(".continue_btn").click(function(){
		$("body").animate({
			scrollTop : headerTop,
		},700);
	});

	// continue_btn

	// scroll function

	$(window).scroll(function(){

		var scrollTop = $(window).scrollTop();

		if(scrollTop >= 2000){
			$(".back_to_top").css({
				"display":"block",
			});
		}else{
			$(".back_to_top").css({
				"display":"none",
			});
		}

		if(scrollTop >= headerTop){
			$("header").css({
				"position":"fixed",
				"top":"0px",
				"left":"0px",
			});

			$(".big_slider_place").css({
				"margin-top":"100px",
			});
		}else{
			$("header").css({
				"position":"relative",
			});

			$(".big_slider_place").css({
				"margin-top":"0px",
			});
		}
	});

	// scroll function

	// back to top

	$(".back_to_top").click(function(){
		$("body").animate({
			scrollTop:0,
		}, 1000);
	});

	// back to top

	// header hide menu

	var headHideMenu = 0;
	$(".header_menu_hide_place").click(function(){
		if(headHideMenu == 0){
			if(width <= 400){
				$(".header_menu_hide_place").css({
					"width":"26px",
					"height":"25px",
				});
				$(".header_hide_menu").animate({
					"height":"170px",
					"padding":"15px 0px",
				}, 500);
				$(".header_menu_hide_burger").css({
					"display":"none",
				});
				$(".burger_closeb").css({
					"display":"block",
				});
				headHideMenu++;
			}else{
				$(".header_menu_hide_place").css({
					"width":"26px",
					"height":"25px",
				});
				$(".header_hide_menu").animate({
					"height":"230px",
					"padding":"15px 0px",
				}, 500);
				$(".header_menu_hide_burger").css({
					"display":"none",
				});
				$(".burger_closeb").css({
					"display":"block",
				});
				headHideMenu++;
			}
		}else if(headHideMenu == 1){
			$(".header_menu_hide_place").css({
				"width":"34px",
				"height":"20px",
			});
			$(".header_hide_menu").animate({
				"height":"0px",
				"padding":"0px",
			}, 500);
			$(".header_menu_hide_burger").css({
				"display":"block",
			});
			$(".burger_closeb").css({
				"display":"none",
			});
			headHideMenu = 0;
		}
	});

	$(".header_hide_menu").click(function(e){
		e.stopPropagation();
	})

	// header hide menu

	// bunner click
	var hideMenu = 0;
	$(".bg_burger_rel").click(function(){
		if(hideMenu == 0){
			if(width <= 1080){
				$(".bg_burger_abs").css({
					"right":"-50px",
					"height":"26px",
				});
				$(".bg_burger_btn").css({
					"display":"none",
				});
				$(".burger_close").css({
					"display":"block",
				});
				$(".bg_abs_menu_place").animate({
					"left":"0px",
				}, 800);
				hideMenu++;
			}else{
				$(".bg_burger_abs").css({
					"right":"-60px",
					"height":"26px",
				});
				$(".bg_burger_btn").css({
					"display":"none",
				});
				$(".burger_close").css({
					"display":"block",
				});
				$(".bg_abs_menu_place").animate({
					"left":"0px",
				}, 800);
				hideMenu++;
			}
		}else if(hideMenu == 1){
			if(width <= 1080 && width > 940){
				$(".bg_burger_abs").css({
					"right":"-50px",
					"height":"20px",
				});
				$(".bg_burger_btn").css({
					"display":"block",
				});
				$(".burger_close").css({
					"display":"none",
				});
				$(".bg_abs_menu_place").animate({
					"left":"-318px",
				}, 800);
				hideMenu = 0;
			}else if(width <= 940 && width > 850){
				$(".bg_burger_abs").css({
					"right":"-50px",
					"height":"20px",
				});
				$(".bg_burger_btn").css({
					"display":"block",
				});
				$(".burger_close").css({
					"display":"none",
				});
				$(".bg_abs_menu_place").animate({
					"left":"-274px",
				}, 800);
				hideMenu = 0;
			}else if(width <= 850 && width > 680){
				$(".bg_burger_abs").css({
					"right":"-50px",
					"height":"20px",
				});
				$(".bg_burger_btn").css({
					"display":"block",
				});
				$(".burger_close").css({
					"display":"none",
				});
				$(".bg_abs_menu_place").animate({
					"left":"-220px",
				}, 800);
				hideMenu = 0;
			}else if(width <= 680){
				$(".bg_burger_abs").css({
					"right":"-50px",
					"height":"20px",
				});
				$(".bg_burger_btn").css({
					"display":"block",
				});
				$(".burger_close").css({
					"display":"none",
				});
				$(".bg_abs_menu_place").animate({
					"left":"-160px",
				}, 800);
				hideMenu = 0;
			}else{
				$(".bg_burger_abs").css({
					"right":"-80px",
					"height":"20px",
				});
				$(".bg_burger_btn").css({
					"display":"block",
				});
				$(".burger_close").css({
					"display":"none",
				});
				$(".bg_abs_menu_place").animate({
					"left":"-318px",
				}, 800);
				hideMenu = 0;
			}
		}
	});

	$(".bg_burger_rel").hover(function(){
		var close1 = $(".burger_close");
		var close2 = $(".burger_closey");
		if(close1.css('display') == 'none' && close2.css('display') == 'none'){
			close1.css({
				"display":"none",
			});
			close2.css({
				"display":"none",
			});
		}else if(close2.css('display') == 'none'){
			close1.css({
				"display":"none",
			});
			close2.css({
				"display":"block",
			});
		}else if(close2.css('display') == 'block'){
			close1.css({
				"display":"block",
			});
			close2.css({
				"display":"none",
			});
		}
	});

	// bunner click

	// product
	$(".product_place_center").click(function(e){
		e.stopPropagation();
	});

	$(".product_img_child").click(function(e){
		e.stopPropagation();

		window.src = $(this).children(":first").attr("src");
		window.text = $(this).parent().children(".product_text").html();
		window.longText = $(this).parent().children(".product_text_hide").html();

		$(".product_img_abs").css({
			"display":"block",
		});

		$(this).find(".product_img_abs").css({
			"display":"none",
		});

		$(".product_yellow_place").css({
			"display":"none",
		});

		$(".product_big_image_place").css({
			"display":"block",
		});

		$(".fa-caret-down").css({
			"display":"none",
		});
		$(this).parent().find(".fa-caret-down").css({
			"display":"block",
		});

		$(".product_big_image").attr('src', src);
		$(".product_big_title").text(text);
		$(".product_big_text").text(longText);
	});

	$(".product_big_place_center").click(function(e){
		e.stopPropagation();
	});

	// body click

	$("body").click(function(){
		$(".product_img_abs").css({
			"display":"none",
		});

		$(".fa-caret-down").css({
			"display":"none",
		});

		$(".product_yellow_place").css({
			"display":"block",
		});

		$(".product_big_image_place").css({
			"display":"none",
		});

		$(".select_size_place").css({
    		"display":"none",
    	});
    	$(".select_down").css({
			"display":"block",
		});
		$(".select_up").css({
			"display":"none",
		});
	});

	// body click


	// product open size & frame
	var openSize = 0;
	var openFrame = 0;
	$(".product_size").click(function(e){
		e.stopPropagation();
		if(openSize == 0){
			$(".select_size_place").css({
	    		"display":"none",
	    	});
	    	$(".select_down").css({
				"display":"block",
			});
			$(".select_up").css({
				"display":"none",
			});
			$(this).find(".select_size_place").css({
				"display":"block",
			});
			$(this).find(".select_down").css({
				"display":"none",
			});
			$(this).find(".select_up").css({
				"display":"block",
			});
			openSize++;
			openFrame = 0;
		}else if(openSize == 1){
			$(this).find(".select_size_place").css({
				"display":"none",
			});
			$(this).find(".select_down").css({
				"display":"block",
			});
			$(this).find(".select_up").css({
				"display":"none",
			});
			openSize = 0;
		}
	});

	$(".select_size").click(function(e){
		e.stopPropagation();
		window.sizeText = $(this).text();
		$(".select_size_place").css({
    		"display":"none",
    	});
    	$(".select_down").css({
			"display":"block",
		});
		$(".select_up").css({
			"display":"none",
		});
		$(this).parent().parent().children(":first").text(sizeText);
		openSize = 0;
	});

	$(".product_frame").click(function(e){
		e.stopPropagation();
		if(openFrame == 0){
			$(".select_size_place").css({
	    		"display":"none",
	    	});
	    	$(".select_down").css({
				"display":"block",
			});
			$(".select_up").css({
				"display":"none",
			});
			$(this).find(".select_size_place").css({
				"display":"block",
			});
			$(this).find(".select_down").css({
				"display":"none",
			});
			$(this).find(".select_up").css({
				"display":"block",
			});
			openFrame++;
			openSize = 0;
		}else if(openFrame == 1){
			$(this).find(".select_size_place").css({
				"display":"none",
			});
			$(this).find(".select_down").css({
				"display":"block",
			});
			$(this).find(".select_up").css({
				"display":"none",
			});
			openFrame = 0;
		}
	});

	$(".select_frame").click(function(e){
		e.stopPropagation();
		window.frameText = $(this).text();
		$(".select_size_place").css({
    		"display":"none",
    	});
    	$(".select_down").css({
			"display":"block",
		});
		$(".select_up").css({
			"display":"none",
		});
		$(this).parent().parent().children(":first").text(frameText);
		openFrame = 0;
	});
	// product open size & frame
});

shareFbPage = function(){

	var pathName = window.location.pathname;

	FB.ui({
		method: 'feed',
		link: 'http://theelementsofnature.com/'+pathName
	}, function(response){});
};