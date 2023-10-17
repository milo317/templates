// JavaScript Document

jQuery(document).ready(function(){
										  
	/*** Navigation ***/
	/** ----------------------------------------------------- **/
											  
	jQuery('#main_menu').superfish({
		delay:       800,
		animation:   { opacity: 'show', height:'show' },
		speed:       1000,
		autoArrows:  true,
		anchorClass : 'sf-with-ul',
		arrowClass  : 'sf-sub-indicator',
		dropShadows: false,
		easing: 'easeOutQuart'
	}); 
	
	jQuery('.widget_pages ul, .widget_categories ul').superfish({
		delay:       800,
		animation:   { opacity: 'show', height:'show' },
		speed:       1000,
		autoArrows:  true,
		anchorClass : 'sf-with-ul',
		arrowClass  : 'sf-sub-indicator',
		dropShadows: false,
		easing: 'easeOutQuart'
	});
	
	lava_lamp();
		
	/*** Slides ***/
	/** ----------------------------------------------------- **/
		
	slides();
		
	/*** Hover Effects ***/
	/** ----------------------------------------------------- **/
		
	jQuery('#feature_controller ul li a').hover(
		function () {
		jQuery(this).find('img').stop(false, true).animate({top: -7},{duration: 350, easing: 'easeInOutBack'});
	},
		function () {
		jQuery(this).find('img').stop(false, true).animate({top: 3},{duration: 350, easing: 'easeInOutBack'});
	})
	
	jQuery('#feature_scroll_left').hover(
		function () {
		jQuery(this).stop(false, true).animate({right: 102},{duration: 350, easing: 'easeInOutBack'});
	},
		function () {
		jQuery(this).stop(false, true).animate({right: 92},{duration: 350, easing: 'easeInOutBack'});
	})
	
	jQuery('#feature_scroll_right').hover(
		function () {
		jQuery(this).stop(false, true).animate({right: 7},{duration: 350, easing: 'easeInOutBack'});
	},
		function () {
		jQuery(this).stop(false, true).animate({right: 15},{duration: 350, easing: 'easeInOutBack'});
	})
	
	jQuery('#start_search_button, #widget_twitter_next, #widget_twitter_prev').hover(
		function () {
		jQuery(this).css({backgroundPosition: 'top left'});
	},
		function () {
		jQuery(this).css({backgroundPosition: 'bottom right'});
	})
	
	jQuery('#widget_twitter_holder').hover(
		function () {
		jQuery(this).css({backgroundPosition: 'top left'});
		jQuery('.twitter_follow_button').stop(false, true).show(400);
	})
	
	jQuery('#widget_twitter_holder').mouseleave(function () {
	
		jQuery('.twitter_follow_button').stop(false, true).hide(400);
		
	});
	
	/*** Contact Form ***/
	/** ----------------------------------------------------- **/
	
	var loader = jQuery('<div id="loader"><span>Sending Message...</span></div>')
		.appendTo('#form_result')
		.hide();
	jQuery().ajaxStart(function() {
		jQuery('#contact_form').hide(250);
		loader.show(250);
	}).ajaxStop(function() {
		loader.hide(250);
	}).ajaxError(function(a, b, e) {
		throw e;
	});
	
	$("#contact_form").validate({
			
		rules: {
			input_name: 'required',
			input_email: {
				required: true,
				email: true
			},
			input_subject: 'required',
			textarea_message: 'required'
		},
		messages: {
			input_name: 'Name is required',
			input_email: {
				required: 'Email is required',
				email: 'Invalid email format'
			},
			input_subject: 'Please specify a subject',
			textarea_message: 'Message is empty'
		},
		errorElement: 'span',
		errorClass: 'error_message',
		errorPlacement: function(error, element) {
			error.appendTo(element.parent('span').prev('label'));
		},
		submitHandler: function(form) {
			jQuery(form).ajaxSubmit({
				target : '#form_result'
			});
		}
			
	});
	
	/*** Miscellaneous ***/
	/** ----------------------------------------------------- **/
	
	jQuery('.basic_style_1 blockquote p').addClass('fix_png');
	
	zebra_table('.archive_table table');
		
	jQuery(window).status='Elegant Real Estate';
	
	jQuery('#widget_holder ul').addClass('parent_drop_downs')
	
	jQuery('#widget_holder ul ul').removeClass('parent_drop_downs');

});

/*** Functions ***/
/** ----------------------------------------------------- **/

jQuery(function(){ //smoothscroll
					 
	jQuery('.smooth_scroll a').click(function() {
		if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') 
			&& location.hostname == this.hostname) {
				var $target = $(this.hash);
				$target = $target.length && $target || $('[name=' + this.hash.slice(1) +']');
			if ($target.length) {
				var targetOffset = $target.offset().top;
				$('html,body').animate({scrollTop: targetOffset}, 1000);
				return false;
			}
		}
	});
	
});

function zebra_table($object){ 

	jQuery( $object + ' tbody tr:nth-child(odd)').addClass('odd');
	
	jQuery( $object + ' tbody tr').hover(
		function () {
		jQuery(this).addClass('trover');
	},
		function () {
		jQuery(this).removeClass('trover');
	})
  
}

function feature_carousel_initCallback($carousel) {
	
	jQuery('.jcarousel-control a').bind('click', function() {
		$carousel.scroll(jQuery.jcarousel.intval(jQuery(this).attr('rel')));
		$carousel.startAuto(0);
		return false;
	});
	
	jQuery('#feature_scroll_right a, #feature_desc_wrapper a.carousel_desc_next').bind('click', function() {
		$carousel.next();
		$carousel.startAuto(0);
		return false;
	});
	
	jQuery('#feature_scroll_left a, #feature_desc_wrapper a.carousel_desc_prev').bind('click', function() {
		$carousel.prev();
		$carousel.startAuto(0);
		return false;
	});

};

function twitter_carousel_initCallback($carousel) {
	
	jQuery('#widget_twitter_next').bind('click', function() {
		$carousel.next();
		return false;
	});
	
	jQuery('#widget_twitter_prev').bind('click', function() {
		$carousel.prev();
		return false;
	});

};
	
function lava_lamp() {
	
	jQuery('#lava_box_holder').width(jQuery('#mast_head').width());
	jQuery('#lava_box_holder').height(jQuery('#mast_head').height());

	var style = 'easeOutElastic';
	
	var default_left = Math.round(jQuery('#mast_head #main_menu li.current_page_item, #mast_head li.current_page_ancestor').offset().left - jQuery('#mast_head').offset().left);
	var default_width = jQuery('#mast_head li.current_page_item, #mast_head li.current_page_ancestor').width();
	
	jQuery('#lava_box').css({left: default_left});
	jQuery('#lava_box').css({bottom: 0});
	jQuery('#lava_box').css({width: default_width});
	
	jQuery('#mast_head #main_menu li').addClass('put_lava');
	jQuery('#mast_head #main_menu li li').removeClass('put_lava').addClass('no_lava');
	
	jQuery('#mast_head #main_menu li.put_lava').hover(function () {
																		
		if ( jQuery(this).attr('class') != 'no_lava' ) {
				
				left = Math.round(jQuery(this).offset().left - jQuery('#mast_head').offset().left);
				width = jQuery(this).width();
				
				jQuery('#lava_box').stop(false, true).animate({left: left, width: width},{duration: 1500, easing: style});
				
		}
	
	}).click(function () {
				
		jQuery('#mast_head #main_menu li').removeClass('current_page_item');	
		
		jQuery(this).addClass('current_page_item');
	
	});
	
	jQuery('#mast_head #main_menu').mouseleave(function () {
																		  
		if (jQuery('#main_menu li.put_lava').is('.current_page_item, .current_page_ancestor')) {
			
			default_left = Math.round(jQuery('#mast_head #main_menu li.current_page_item, #mast_head li.current_page_ancestor').offset().left - jQuery('#mast_head').offset().left);
			default_width = jQuery('#mast_head li.current_page_item, #mast_head li.current_page_ancestor').width();
			
			jQuery('#lava_box').stop(false, true).animate({left: default_left, width: default_width},{duration: 1500, easing: style});
			
		} else {
			
			jQuery('#lava_box').hide(1);
			
		}
		
	});
	
}

/*** Cufon ***/
/** ----------------------------------------------------- **/

Cufon.replace(
				  
	'#feature_desc_wrapper h2 a,' +
	'#feature_desc_wrapper p.carousel_desc_info,' +
	'#feature_desc_wrapper p.carousel_desc_price,' +
	'.post_preview_content .post_listing_info,' +
	'.post_preview .post_preview_title,' +
	'.archive_list_content .post_listing_info,' +
	'.archive_list .archive_list_title,' +
	'.basic_style_1 h1,' +
	'.basic_style_1 h2,' +
	'.basic_style_1 h3,' +
	'.basic_style_1 h4,' +
	'.basic_style_1 h5,' +
	'.comment-author cite,' +
	'.comment-author span.says,' +
	'.sidebar_style_1 .widget_title,' +
	'.footer_style1 li.widget h3,' +
	'.font_geo_sans'
				  
,{ fontFamily: 'Geo Sans', hover: true });
