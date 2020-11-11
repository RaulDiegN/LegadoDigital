
$(function () {
		
	$('#id01').on('click',function(e) {
		e.preventDefault();
		$('.modal').fadeIn();

	});

	$('.close').on('click',function(e) {
		e.preventDefault();
		$('.modal').fadeOut();

	});

	window.onclick = function(event) {
		var $modal = $('.modal');
	    if (event.target.matches('.modal')) {
	        $modal.fadeOut();
	    }
	}

});

