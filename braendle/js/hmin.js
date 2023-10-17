$(document).ready(function() {
/***************** Header BG Scroll ******************/
	$(function() {
		$(window).scroll(function() {
			var scroll = $(window).scrollTop();

			if (scroll >= 300) {
				$('section.navigation').addClass('fixed');
				$('header').css({
					"background-color":"#111",
				});	
			} else {
				$('section.navigation').removeClass('fixed');
				$('header').css({
					"background-color":"transparent",
				});
			}
		});
	});
	/***************** Smooth Scrolling ******************/
	$(function() {
		$('a[href*=#]:not([href=#])').click(function() {
			if (location.pathname.replace(/^\//, '') === this.pathname.replace(/^\//, '') && location.hostname === this.hostname) {
				var target = $(this.hash);
				target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
				if (target.length) {
					$('html,body').animate({
						scrollTop: target.offset().top
					}, 2000);
					return false;
				}
			}
		});
	});
});