$(document).ready(function(){

	// bg_volume bg_music

	var openVolume = 0;
	var pageMusic = new Audio("assets/users/plugins/music/page_music.mp3");
	pageMusic.play();
	pageMusic.onended = function(){
		pageMusic.play();
	}
	$(".vulume_abs").click(function(){
		if(openVolume == 0){
			$(this).children(".fa-volume-up").css({
				"display":"none",
			});
			$(this).children(".fa-volume-off").css({
				"display":"block",
			});
			$(this).children(".fa-times").css({
				"display":"block",
			});
			openVolume++;
			pageMusic.pause();
		}else if(openVolume == 1){
			$(this).children(".fa-volume-up").css({
				"display":"block",
			});
			$(this).children(".fa-volume-off").css({
				"display":"none",
			});
			$(this).children(".fa-times").css({
				"display":"none",
			});
			openVolume = 0;
			pageMusic.play();
		}
	});

	// bg_volume bg_music

});