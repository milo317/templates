(function($){
	$.movingBoxes = function(el, options){
		var base = this;
		base.$el = $(el).addClass('mb-slider');
		base.el = el;
		base.$el.data('movingBoxes', base);
		base.init = function(){
			base.options = $.extend({}, $.movingBoxes.defaultOptions, options);
			base.$el.wrap('<div class="movingBoxes mb-wrapper"><div class="mb-scroll" /></div>');
			base.$window = base.$el.parent();
			base.$wrap = base.$window.parent()
				.css({ width : base.options.width }) // override css width
				.prepend('<a class="mb-scrollButtons mb-left"></a>')
				.append('<a class="mb-scrollButtons mb-right"></a><div class="mb-left-shadow"></div><div class="mb-right-shadow"></div>');
			base.$panels = base.$el.find(base.options.panelType).addClass('mb-panel');
			base.runTime = $('.mb-slider').index(base.$el) + 1; // Get index (run time) of this slider on the page
			base.regex = new RegExp('slider' + base.runTime + '=(\\d+)', 'i'); // hash tag regex
			base.initialized = false;
			base.currentlyMoving = false;
			base.curPanel = 1;
			base.update();
			base.$wrap.find('.mb-right').click(function(){
				base.goForward();
				return false;
			}).end().find('.mb-left').click(function(){
				base.goBack();
				return false;
			});
			base.$el.delegate('.mb-panel', 'click', function(){
				base.change( base.$panels.index($(this)) + 1 );
			});
			base.$wrap.click(function(){
				base.active();
			});
			base.$panels.delegate('a', 'focus' ,function(){
				// focused link centered in moving box
				var loc = base.$panels.index($(this).closest('.mb-panel')) + 1;
				if (loc !== base.curPanel){ base.change( base.$panels.index($(this).closest('.mb-panel')) + 1, {}, false ); }
			});
			$(document).keyup(function(e){
				if (e.target.tagName.match('TEXTAREA|INPUT|SELECT')) { return; }
				switch (e.which) {
					case 39: case 32: // right arrow & space
						if (base.$wrap.is('.mb-active-slider')){
							base.goForward();
						}
						break;
					case 37: // left arrow
						if (base.$wrap.is('.mb-active-slider')){
							base.goBack();
						}
						break;
				}
			});
			var startPanel = (base.options.hashTags) ?  base.getHash() || base.options.startPanel : base.options.startPanel;
			setTimeout(function(){
				base.change(startPanel, function(){
					$.each('initialized.movingBoxes initChange.movingBoxes beforeAnimation.movingBoxes completed.movingBoxes'.split(' '), function(i,o){
						var evt = o.split('.')[0];
						if ($.isFunction(base.options[evt])){
							base.$el.bind(o, base.options[evt]);
						}
					});
					base.initialized = true;
					base.$el.trigger( 'initialized.movingBoxes', [ base, startPanel ] );
				});
			}, base.options.speed * 2 );
		};
		base.update = function(){
			var t;
			base.$panels = base.$el.find(base.options.panelType)
				.addClass('mb-panel')
				.css({ width : base.options.width * base.options.panelWidth })
				.each(function(){
					if ($(this).find('.mb-inside').length === 0) {
						$(this).wrapInner('<div class="mb-inside" />');
					}
				});
			base.totalPanels = base.$panels.length;
			t = base.$panels.eq(base.curPanel - 1);
			base.curWidth = base.curWidth || t.outerWidth();
			base.curImgWidth = base.curImgWidth || t.find('img').outerWidth(true);
			base.curImgHeight = base.curImgHeight || base.curImgWidth / base.options.imageRatio; // set images fit a 4:3 ratio
			base.regWidth = base.curWidth * base.options.reducedSize;
			base.regImgWidth = base.curImgWidth * base.options.reducedSize;
			base.regImgHeight = base.curImgHeight * base.options.reducedSize;
			base.$panels
				.css({ width: base.curWidth, fontSize: '1em' }) // make all panels big
				.find('img').css({ height: base.curImgHeight, width: base.curImgWidth });
			base.heights = base.$panels.map(function(i,e){ return $(e).outerHeight(true); }).get();
			base.returnToNormal(base.curPanel, true); // resize new panel
			base.growBigger(base.curPanel, true);
			base.$el.css({
				position : 'absolute',
				width    : (base.curWidth + 100) * base.totalPanels + (base.options.width - base.curWidth) / 2,
				height   : Math.max.apply( this, base.heights ) + 10
			});
			base.$window.css({ height : (base.options.fixedHeight) ? Math.max.apply( this, base.heights ) : base.heights[base.curPanel-1] });
			base.$panels.eq(0).css({ 'margin-left' : (base.options.width - base.curWidth) / 2 });
			base.buildNav();
			base.change(base.curPanel, {}, false); // initialize from first panel... then scroll to start panel
		};
		base.buildNav = function() {
			base.$navLinks = {};
			if (base.$nav) { base.$nav.remove(); }
			if (base.options.buildNav && (base.totalPanels > 1)) {
				base.$nav = $('<div class="mb-controls"><a class="mb-testing"></a></div>').appendTo(base.$wrap);
				var j, a = '',
				navFormat = $.isFunction(base.options.navFormatter),
				hiddenText = parseInt( base.$nav.find('.mb-testing').css('text-indent'), 10) < 0;
				base.$panels.each(function(i) {
					j = i + 1;
					a += '<a href="#" class="mb-panel' + j;
					if (navFormat) {
						var tmp = base.options.navFormatter(j, $(this));
						a += (hiddenText) ? ' ' + base.options.tooltipClass +'" title="' + tmp : '';
						a += '">' + tmp + '</a> ';
					} else {
						a += '">' + j + '</a> ';
					}
				});
				base.$navLinks = base.$nav
					.html(a)
					.find('a').bind('click', function() {
						base.change( base.$navLinks.index($(this)) + 1 );
						return false;
					});
			}
		};
		base.returnToNormal = function(num, quick){
			base.$panels.not(':eq(' + (num-1) + ')')
				.removeClass(base.options.currentPanel)
				.animate({ width: base.regWidth, fontSize: base.options.reducedSize + 'em' }, (quick) ? 0 : base.options.speed)
				.find('img').animate({ width: base.regImgWidth, height: base.regImgHeight }, (quick) ? 0 : base.options.speed);
		};
		base.growBigger = function(num, quick){
			base.$panels.eq(num-1)
			.addClass(base.options.currentPanel)
			.animate({ width: base.curWidth, fontSize: '1em' }, (quick) ? 0 : base.options.speed)
			.find('img').animate({ width: base.curImgWidth, height: base.curImgHeight }, (quick) ? 0 : base.options.speed, function(){
				if (base.initialized) { base.$el.trigger( 'completed.movingBoxes', [ base, num ] ); }
			});
		};
		base.goForward = function(){ base.change(base.curPanel + 1); };
		base.goBack = function(){ base.change(base.curPanel - 1); };
		base.change = function(curPanel, callback, flag){
			curPanel = parseInt(curPanel, 10);
			if (base.initialized) {
				base.active();
				base.$el.trigger( 'initChange.movingBoxes', [ base, curPanel ] );
			}
			if ( base.options.wrap ) {
				if ( curPanel < 1 ) { curPanel = base.totalPanels; }
				if ( curPanel > base.totalPanels ) { curPanel = 1; }
			} else {
				if ( curPanel < 1 ) { curPanel = 1; }
				if ( curPanel > base.totalPanels ) { curPanel = base.totalPanels; }
			}
			if (base.initialized && base.curPanel == curPanel && !flag) { return false; }
			if (!base.currentlyMoving) {
				base.currentlyMoving = true;
				var ani, leftValue = base.$panels.eq(curPanel-1).position().left - (base.options.width - base.curWidth) / 2;
				if (curPanel > base.curPanel) { leftValue -= ( base.curWidth - base.regWidth ); }
				ani = (base.options.fixedHeight) ? { scrollLeft : leftValue } : { scrollLeft: leftValue, height: base.heights[curPanel - 1] };
				if (base.initialized) { base.$el.trigger( 'beforeAnimation.movingBoxes', [ base, curPanel ] ); }
				base.$window.animate( ani,
					{
						queue    : false,
						duration : base.options.speed,
						easing   : base.options.easing,
						complete : function(){
							base.curPanel = curPanel;
							if (base.initialized) {
								base.$window.scrollTop(0); // Opera fix - otherwise, it moves the focus link to the middle of the viewport
							}
							base.currentlyMoving = false;
							if (typeof(callback) === 'function') { callback(base); }
						}
					}
				);
				base.returnToNormal(curPanel);
				base.growBigger(curPanel);
				if (base.options.hashTags && base.initialized) { base.setHash(curPanel); }
			}
			base.$wrap.find('.mb-controls a')
				.removeClass(base.options.currentPanel)
				.eq(curPanel - 1).addClass(base.options.currentPanel);
		};
		base.getHash = function(){
			var n = window.location.hash.match(base.regex);
			return (n===null) ? '' : parseInt(n[1],10);
		};
		base.setHash = function(n){
			var s = 'slider' + base.runTime + "=",
				h = window.location.hash;
			if ( typeof h !== 'undefined' ) {
				window.location.hash = (h.indexOf(s) > 0) ? h.replace(base.regex, s + n) : h + "&" + s + n;
			}
		};
		base.active = function(el){
			$('.mb-active-slider').removeClass('mb-active-slider');
			base.$wrap.addClass('mb-active-slider');
		};
		base.currentPanel = function(panel, callback){
			if (typeof(panel) !== 'undefined') {
				base.change(panel, callback); // parse in case someone sends a string
			}
			return base.curPanel;
		};
		base.init();
	};
	$.movingBoxes.defaultOptions = {
		startPanel   : 2,         // start with this panel
		width        : 890,       // overall width of movingBoxes
		panelWidth   : 0.5,       // current panel width adjusted to 50% of overall width
		reducedSize  : 0.8,       // non-current panel size: 80% of panel size
		imageRatio   : 4/3,       // Image ratio set to 4:3
		fixedHeight  : true,     // if true, slider height set to max panel height; if false, slider height will auto adjust.
		speed        : 500,       // animation time in milliseconds
		hashTags     : true,      // if true, hash tags are enabled
		wrap         : true,     // if true, the panel will "wrap" (it really rewinds/fast forwards) at the ends
		buildNav     : false,     // if true, navigation links will be added
		navFormatter : null,      // function which returns the navigation text for each panel
		easing       : 'swing',   // anything other than "linear" or "swing" requires the easing plugin
		currentPanel : 'current', // current panel class
		tooltipClass : 'tooltip', // added to the navigation, but the title attribute is blank unless the link text-indent is negative
		panelType    : '> div',   // selector to find the immediate (">") children "div" of the movingBoxes object)
		initialized     : null,   // callback when MovingBoxes has completed initialization
		initChange      : null,   // callback upon change panel initialization
		beforeAnimation : null,   // callback before any animation occurs
		completed       : null    // callback after animation completes
	};
	$.fn.movingBoxes = function(options, callback){
		var num, mb = this.data('movingBoxes');
		return this.each(function(){
			if ((typeof(options)).match('object|undefined')){
				if (mb) {
					mb.update();
				} else {
					(new $.movingBoxes(this, options));
				}
			} else if (/\d/.test(options) && !isNaN(options) && mb) {
				num = (typeof(options) === "number") ? options : parseInt($.trim(options),10); // accepts "  4  "
				if ( num >= 1 && num <= mb.totalPanels ) {
					mb.change(num, callback); // page #, autoplay, one time callback
				}
			}
		});
	};
	$.fn.getMovingBoxes = function(){
		return this.data('movingBoxes');
	};
})(jQuery);