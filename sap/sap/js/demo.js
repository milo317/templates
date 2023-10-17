$(function(){
	$('#slider-one').movingBoxes({
		startPanel   : 2,      // start with this panel
		width        : 890,    // overall width of movingBoxes (not including navigation arrows)
		imageRatio   : 1/1,      // Image ration set to 1:1 (square image)
		wrap         : true,   // if true, the panel will "wrap" (it really rewinds/fast forwards) at the ends
		buildNav     : true,   // if true, navigation links will be added
		panelType    : '> li', // selector to find the immediate ">" children "li" of "#slider-one" in this case
		navFormatter : function(){ return "&#9679;"; } // function which returns the navigation text for each panel
	});
	var i, t = '', len = $('#slider-one .mb-panel').length + 1;
	for ( i=1; i<len; i++ ){
		t += '<a href="#" rel="' + i + '">' + i + '</a> ';
	}
	$('.dlinks')
		.find('span').html(t).end()
		.find('a').click(function(){
			slider.movingBoxes( $(this).attr('rel') );
			return false;
		});
	$('.mb-slider').bind('initialized.movingBoxes initChange.movingBoxes beforeAnimation.movingBoxes completed.movingBoxes',function(e, slider, tar){
		if (window.console && window.console.firebug){
			var txt = slider.$el[0].id + ': ' + e.type + ', now on panel #' + slider.curPanel + ', targeted panel is ' + tar;
			console.debug( txt );
		}
	});
});