var Modal = (function($) {

	var init = function() {

		// handle close modal
		$('.modal .close').on("click", close);

		// handle kaltura video clicks
		$('.kaltura').on("click", showKaltura);

	};

	var show = function(id) {
		
		// swap out open classes
		$('body').addClass('body-modal-open');
		$('.modal').removeClass('modal-open');
		
		// set timeout to fix css3 animation issues 
		setTimeout(function() {
			$(id).addClass('modal-open');
		},25);
		
	}

	var showKaltura = function() {

		// grab href value
		var videoSrc = $(this).attr('href');

		// insert new iframe src
		$('.kaltura-modal iframe').attr('src', videoSrc);

		// show modal
		show('.kaltura-modal');

		return false;

	};

	var close = function() {

		// swap out open classes
		$('body').removeClass('body-modal-open');

		// set timeout to fix css3 animation issues 
		setTimeout(function() {
			$('.modal').removeClass('modal-open');
		},25);
		
	};
	
	return {
		init: init,
		show: show,
		close: close
	};

}(jQuery));