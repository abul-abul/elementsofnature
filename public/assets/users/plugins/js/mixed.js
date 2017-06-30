$(document).ready(function(){
	// mixed_images

		window.width = $(window).width();

		window.$grid_demo_multiple_columns = $('#masonry_hybrid_demo2');
		window.grid2 = new MasonryHybrid($grid_demo_multiple_columns, {col: 3, space: 20});

		$('#custom-col-gird, #custom-col-space').on('input', function(){
		    gridUpdate(grid2, $('#custom-col-gird').val(), $('#custom-col-space').val());
		}).trigger('input');

		if(width <= 1000 && width > 820){
			$('#custom-col-gird').val(2);
			$('#custom-col-space').val(20);

			$('#custom-col-gird, #custom-col-space').on('input', function(){
			    gridUpdate(grid2, $('#custom-col-gird').val(), $('#custom-col-space').val());
			}).trigger('input');
		}else if(width <= 820){
			$('#custom-col-gird').val(1);
			$('#custom-col-space').val(20);

			$('#custom-col-gird, #custom-col-space').on('input', function(){
			    gridUpdate(grid2, $('#custom-col-gird').val(), $('#custom-col-space').val());
			}).trigger('input');
		}

		function gridUpdate(gridObj, col, space) {
		    gridObj.elem.trigger('grid:refresh', {col: col, space: space});
		};

	// mixed_images
});