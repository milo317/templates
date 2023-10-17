$(function(){
	$('#nav a')
		.css( {backgroundPosition: "-20px 35px"} )
		.mouseover(function(){
			$(this).stop().animate({backgroundPosition:"(-20px 94px)"}, {duration:500})
		})
		.mouseout(function(){
			$(this).stop().animate({backgroundPosition:"(40px 35px)"}, {duration:200, complete:function(){
				$(this).css({backgroundPosition: "-20px 35px"})
			}})
		})
	$('.domtabs a')
		.css( {backgroundPosition: "-20px 35px"} )
		.mouseover(function(){
			$(this).stop().animate({backgroundPosition:"(-20px 94px)"}, {duration:500})
		})
		.mouseout(function(){
			$(this).stop().animate({backgroundPosition:"(40px 35px)"}, {duration:200, complete:function(){
				$(this).css({backgroundPosition: "-20px 35px"})
			}})
		})    
$('#head a')
		.css( {backgroundPosition: "0 0"} )
		.mouseover(function(){
			$(this).stop().animate({backgroundPosition:"(-304px 0)"}, {duration:1100})
		})
		.mouseout(function(){
			$(this).stop().animate({backgroundPosition:"(-304px 0)"}, {duration:300, complete:function(){
				$(this).css({backgroundPosition: "0 0"})
			}})
		})    
});