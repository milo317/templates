var Locations = (function($) {

	var $locations;

	var init = function() {

		// cache selector
		$locations = $('.location-map');

		// location map event
		$locations.find('a').on("mouseover", showLocation);

		// location list map event
		$('.location-list').find('a').on("mouseover", showLocation);

	};

	var showLocation = function() {

		// remove active location class
		$('.location-list').find('a').removeClass('active');
		$locations.removeClass('location-emea');
		$locations.removeClass('location-latam');
		$locations.removeClass('location-apac');

		// add location active class
		$('.location-list').find('.link-' + $(this).data('location')).addClass('active');
		$locations.addClass('location-' + $(this).data('location'));
		
	};
	
	return {
		init: init,
	};

}(jQuery));