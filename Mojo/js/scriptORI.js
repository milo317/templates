$(document).ready(function(){
		moving = 1;
		tempImage ="";
		thisIndex =0;
		
		number_columns = $('#img_container').width() / $('.img').width();
		number_lines = $('.img').size() / number_columns;
		$('#img_container').css("height", number_lines * $('.img').height());
		
		$('.img').mouseenter(function(element) {
			if(moving == 1){
				$(this).stop().animate(
					{opacity: "1"},
					{duration:200, easing:"linear"}
				);
				var position = $(this).position();				
				
				if($('#h_line').css("top") != position.top){				
					$('#h_line').css("top",position.top);
					$('#h_line2').css("top",position.top+242);
				}
				
				if($('#v_line').css("left") != position.left){
					$('#v_line').css("left",position.left);		
					$('#v_line2').css("left",position.left+358);		
				}
				
				$('#h_line').stop().animate(
					{opacity:1,left: position.left+40},
					{duration:300, easing:"easeOutBack"}
				);
				$('#h_line2').stop().animate(
					{opacity:1,left: position.left-40},
					{duration:500, easing:"easeOutBack"}
				);
				$('#v_line').stop().animate(
					{opacity:1,top: position.top+30},
					{duration:700, easing:"easeOutBack"}
				);
				$('#v_line2').stop().animate(
					{opacity:1,top: position.top-30},
					{duration:900, easing:"easeOutBack"}
				);
			}
			if(moving == -1 && thisIndex == $('.img').index(this)){
				$(this).css("background-image","url(images/close.jpg)");
			}
		});
		$('.img').mouseleave(function(element) {			
			if(moving == 1){
			$(this).stop().animate(
				{opacity: "0.1"},
				{duration:500, easing:"linear"}
			);	
			}
			if(moving == -1 && thisIndex == $('.img').index(this)){
				$(this).css("background-image",tempImage);
			}
		});
		$('.img').click(function(element) {				
			if(moving == 1){				
				colorBG = $(this).attr("title");
				var position = $(this).position();
				var offset = $(this).offset();
				thisIndex = $('.img').index(this);
				thisDescription = $(this).find('.description').html();
				thisSlide = $(this).find('.slide').html();
				tempImage =	$(this).css("background-image");
				$('#h_line, #h_line2, #v_line, #v_line2, #logo').stop().animate(
					{opacity: 0},
					{duration:400, easing:"linear"}
				);
				$('.img').not(this).eachDelay(function(index){ 				
					$(this).stop().animate(
						{opacity:"0"},
						{duration:50}
					)
					if(index == ($('.img').size() - 2)){						
						$('.img').eq(thisIndex).css("position","fixed");
						$('.img').eq(thisIndex).css("left",offset.left);
						$('.img').eq(thisIndex).css("top",offset.top);
						
						$('#logo').css("left","50%");
						$('#logo').css("top","50%");
						$('#logo').css("margin-left","-500px");
						$('#logo').css("margin-top","-242px");
						
						$('.img').eq(thisIndex).stop().animate(
							{left: "50%", marginLeft: "-500px", top:"50%",marginTop: "-242px"},
							{duration:1000, easing:"easeOutBack",
							complete: function(){
								$('#logo').css("opacity",1);
								$('.img').eq(thisIndex).css("opacity",0.3);
								$('#info_container').css("left","50%");
								$('#info_container').css("marginLeft","-500px");
								$('#info_container').css("top","50%");	
								$('#info_container').stop().animate(
									{height: 241},
									{duration:500, easing:"easeOutBack",complete: function(){
										$('#slide_container').css("left","50%");
										$('#slide_container').css("marginLeft","-140px");
										$('#slide_container').css("top","50%");
										$('#slide_container').css("marginTop","-242px");
										$('#slide_container').stop().animate(
											{height: 482},
											{duration:500, easing:"easeOutBack"}
										);
										$('#info_container').html("<div style='padding:20px'>"+thisDescription+"</div>");
										$('#slide_container').html(thisSlide);
										$('#slide_container').cycle({
											fx: 'fade'
										}); 
									}
								}
								);
								
								$('#v_strip').stop().animate(
								{height: "100%", backgroundColor:"#000"},
								{duration:600, easing:"linear"});
							}
						});												
					}				
				}, 50, "linear");
			}		
			if(moving == -1){
				$('#logo').css("left","0");
				$('#logo').css("top","0");
				$('#logo').css("margin","0");				
				$('.img').eq(thisIndex).css("position","relative");
				$('.img').eq(thisIndex).css("margin","0");
				$('.img').eq(thisIndex).css("left",0);
				$('.img').eq(thisIndex).css("top",0);
				$('#slide_container').stop().animate(
					{height: 0},
					{duration:20, easing:"linear"}
				);
				$('#info_container').html("");
				$('#v_strip').stop().animate(
					{height: 0, backgroundColor:"#931928"},
					{duration:10, easing:"linear"}
				);
				$('#info_container').stop().animate(
					{height: 0},
					{duration:100, easing:"linear"}
				);				
				$('.img').eq(thisIndex).css("background-image",tempImage);				
				$('.img').eachDelay(function(index){ 				
					$(this).stop().animate(
						{opacity:"0.1"},
						{duration:40}
					)								
				}, 30, "linear");
			}			
			moving = -moving;
		});
		
		$('.img').css("opacity","0.1");
				
		$(window).resize(function() {
			browser_W = $(window).width();
			browser_H = $(window).height();
			diff_W = $('#img_container').width() - browser_W;
			diff_H = $('#img_container').height() - browser_H;
		});
		$(window).trigger("resize");	
		
		$('#img_container').mousemove(function(e) {
			margin_left = -e.pageX/browser_W * diff_W;
			margin_top = -e.pageY/browser_H * diff_H;
			koord_x = e.pageX - (browser_W/2);
			if(moving == 1){
			$('#img_container, #line_container').stop().animate(
				{marginLeft: margin_left,
				top: margin_top
				},
				{duration:10, easing:"linear"}
			);		
			}
		});
		
	
		
	});