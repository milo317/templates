var ESPN = (function($) {

	var init = function() {
		
		// add animate class to animate in any css items
		setTimeout(function() {
			$('body').addClass('animate-in');
		}, 150);

		// handle search body click
		// handle body click
		$(document).mouseup(function(e) {
		    if (!$('.search-bar').is(e.target) && !$('.input').is(e.target) && !$('span.search svg').is(e.target) && $('body').hasClass('search-active')) {
				toggleSearch();
		    }
		});

		// category select hover
		$('.category-select a').on("mouseover click", categoryListItem);

		// programs functionality
		if(typeof Programs !== 'undefined') 
			Programs.init();

		// schedule functionality
		if(typeof Schedule !== 'undefined') 
			Schedule.init();

		// categories functionality
		if(typeof Categories !== 'undefined') 
			Categories.init();

		// modal functionality
		if(typeof Modal !== 'undefined') 
			Modal.init();

		// locations functionality
		// if(typeof Locations !== 'undefined') 
		// 	Locations.init();

		if(Modernizr.appleios) {
			$('video').remove();
			$('.hero-mobile').css({ display:"block" });
		}

		// Parallax Functionality
		if ($.fn.Parallax && !Modernizr.appleios) {
			$('.hero-parallax').Parallax({ property:'translateY', speed:0.12, start:0, delay:0 });
		}

		// handle the lack of SVG support
		if(!Modernizr.svg) {
			
			$('img[src*="svg"]').attr('src', function() {
				return $(this).attr('src').replace('.svg', '.png');
			});
		
		} else {

			// replace svg with svg code
			jQuery('img.svg-raw').each(function(){
	            var $img = jQuery(this);
	            var imgID = $img.attr('id');
	            var imgClass = $img.attr('class');
	            var imgURL = $img.attr('src');

	            jQuery.get(imgURL, function(data) {
	                // Get the SVG tag, ignore the rest
	                var $svg = jQuery(data).find('svg');

	                // Add replaced image's ID to the new SVG
	                if(typeof imgID !== 'undefined') {
	                    $svg = $svg.attr('id', imgID);
	                }
	                // Add replaced image's classes to the new SVG
	                if(typeof imgClass !== 'undefined') {
	                    $svg = $svg.attr('class', imgClass+' replaced-svg');
	                }

	                // Remove any invalid XML tags as per http://validator.w3.org
	                $svg = $svg.removeAttr('xmlns:a');

	                // Replace image with new SVG
	                $img.replaceWith($svg);

	            }, 'xml');

	        });

		}

		// set backgrounds with data attribute
		$('.set-background').each(function(index) {

			$(this).css({ 'background-image':'url(' + $(this).data('background') + ')' });

		});

		// header waypoint
		$('.header-waypoint').waypoint(function(direction) {

			$('.header').toggleClass('header-active', direction === 'down');

		}, { offset:0 });

		// categories waypoint
		$('.categories').waypoint(function(direction) {

			$('.categories-nav').toggleClass('categories-nav-active', direction === 'down');

		}, { offset:60 });

		// programs waypoint
		$('.programs').waypoint(function(direction) {

			$('.categories-nav').toggleClass('categories-nav-bottom', direction === 'down');

		}, { offset:120 });

		// syndication waypoint
		$('.syndication').waypoint(function(direction) {

			$('.syndication').toggleClass('syndication-active', direction === 'down');

		}, { offset:600 });

		// worldwide waypoint
		$('.worldwide').waypoint(function(direction) {

			$('.worldwide').toggleClass('worldwide-active', direction === 'down');

		}, { offset:600 });

		// preload hero images
		$('.hero-bg').fadeOut(0);
		preloadHero();

	};

	var categoryListItem = function() {

		// toggle active classes
		$('.category-select a').removeClass('active');
		$(this).addClass('active');

		// set count and link
		$('#show-total').html($(this).data('total') + " PROPERTIES");
		$('#show-link').attr("href", $(this).data('link'));

	};

	var toggleSearch = function() {

		$('body').toggleClass('search-active');

	};

	var scrollTo = function(id) {
		
		// Stop any currently active scroll
		$('html, body').dequeue();
		// Scroll to #id offset by 90 pixels
		$('html, body').animate({ scrollTop: $(id).offset().top-60 }, 1000, 'easeOutExpo');
	
	};

	var preloadHero = function() {

		// check to see if hero-bg exists
		if(!$('.hero-bg')[0]) return false;

		// create blank image object
		var imgLoad = new Image();

		// load image + fade in container
		$(imgLoad).load(function() {
			
			$('.hero-bg').fadeIn(250);

		}).attr('src', $('.hero-bg').data('background'));

	}

	var loginAuth = function(urlAuth) {

		 $.ajax({
            type: "POST",
            url: urlAuth + '/login-check.php',
            data: $('#login').serialize(),
            success: function (data) {
                
                if(data.length === 0) {

					$('#login-success').html('<span>INVALID PASSWORD - PLEASE TRY AGAIN!</span>');

                } else {

                	$('#login-success').html('<span>YOU HAVE BEEN LOGGED IN SUCCESSFULLY!</span>');
					setTimeout(function() {
						window.location.reload(true); 
					}, 1500);

                }
				
            },
            error: function(data) {
            	$('#login-success').html('<span>SOMETHING WENT WRONG - PLEASE TRY AGAIN!</span>');
            }
        });
	};

	var loginReq = function(urlReq) {

		// check for valid email address
		var re = /\S+@\S+\.\S+/;

		if(!re.test($('#email-address').val())) {
			$('#request-success').html('<span>PLEASE PROVIDE A VALID EMAIL ADDRESS!</span>');
			return false;
		}

		// process ajax 
		 $.ajax({
            type: "POST",
            url: urlReq + '/login-req.php',
            data: $('#request').serialize(),
            success: function (data) {
                $('#request-success').html('<span>PLEASE CHECK YOUR EMAIL FOR A PASSWORD!</span>');
                $('#email-address').val('EMAIL ADDRESS');
            },
            error: function(data) {
            	$('#request-success').html('<span>SOMETHING WENT WRONG - PLEASE TRY AGAIN LATER!</span>');
            }
        });
	};
	
	return {
		init: init,
		scrollTo: scrollTo,
		toggleSearch: toggleSearch,
		preloadHero: preloadHero,
		loginAuth: loginAuth,
		loginReq: loginReq
	};

}(jQuery));

$(function() {
	ESPN.init();
});

/* iOS
 * There may be times when we need a quick way to reference whether iOS is in play or not.
 * While a primative means, will be helpful for that.
 */
Modernizr.addTest('ipad', function () {
  return !!navigator.userAgent.match(/iPad/i);
});
 
Modernizr.addTest('iphone', function () {
  return !!navigator.userAgent.match(/iPhone/i);
});
 
Modernizr.addTest('ipod', function () {
  return !!navigator.userAgent.match(/iPod/i);
});
 
Modernizr.addTest('appleios', function () {
  return (Modernizr.ipad || Modernizr.ipod || Modernizr.iphone);
});
