var Programs = (function($) {

	var programSlider;

	var init = function() {

		var startSlide = $('.program-slider').find('.program').length / 2;

		// add program active class
		$('.program-slider').find('.program:eq(' + Math.floor(startSlide) + ')').addClass('program-active');

		// set up royal slider 
		programSlider = $('.program-slider').royalSlider({
			startSlideId: Math.floor(startSlide),
			fadeinLoadedSlide: true,
			numImagesToPreload: 20,
			addActiveClass: true,
			arrowsNav: false,
			arrowsNavAutoHide: false,
			controlNavigation: 'none',
			slidesSpacing: 0,
			navigateByClick: false,
			loop: true,
		}).data('royalSlider');
		
		// mouseover active state
		$('.program-slider .program').on("mouseover", function() {
			$('.program-slider .program').removeClass('program-active');
			$(this).addClass('program-active');
		});

	};

	// programs next
	var next = function() {

		programSlider.next();

	};

	// programs prev
	var previous = function() {

		programSlider.prev();
		
	};

	return {
		init: init,
		next: next,
		previous: previous
	};

}(jQuery));