
var avScroll = new Class({

    options: {
		imgWidth: 0,
		scrollRange: 0,
		leftHandle: null,
		rightHandle: null,
		container: null,
		leftClicks: 0,
		rightClicks: 0,
		speed: 500		
	},
	
	initialize: function(options){
	this.setOptions(options)
	
		this.imgWidth = options['imgWidth'];
		this.scrollRange = options['scrollRange'];
		this.leftHandle = options['leftHandle'];
		this.rightHandle = options['rightHandle'];	
		this.container = $(options['container']);
		
		if($(options['ff'])){
			this.ff = $(options['ff']);
			$(this.ff).addEvent('click',this.fastForward.bindWithEvent(this));
		}
		if($(options['rw'])){
			this.rw = $(options['rw']);
			$(this.rw).addEvent('click',this.speedReverse.bindWithEvent(this));
		}
		
		this.leftClicks = 0;
		this.rightClicks = 0;
		this.speed = options['speed'];		
		$(this.leftHandle).addEvent('click',this.leftClick.bindWithEvent(this));
		$(this.rightHandle).addEvent('click',this.rightClick.bindWithEvent(this));
	},
	leftClick: function(){
		
				if(this.leftClicks > 0){
					var start= this.leftClicks * this.imgWidth;
					var end = ( this.leftClicks - 1 ) * this.imgWidth;
					$(this.container).effect('right',{ duration: this.speed, wait:true, transition:Fx.Transitions.Back.easeIn }).start(start,end);
					this.leftClicks--;
				}
				
				
	},
		
	rightClick: function(){
				var start= this.leftClicks * this.imgWidth;
				var end = (this.leftClicks * this.imgWidth) + this.imgWidth;
				$(this.container).effect('right',{ duration: this.speed, wait:true, transition: Fx.Transitions.Back.easeIn }).start(start,end);
				this.leftClicks++;
				
	},
	
	fastForward: function(){
				// scroll 4 images to the right, calculate it on base of the clicks and the image width
				var start= (this.leftClicks) * this.imgWidth;			
				var end = (( this.leftClicks + 4 ) * this.imgWidth);
				$(this.container).effect('right',{ duration: this.speed, wait:true, transition:Fx.Transitions.Back.easeIn }).start(start,end);
				this.leftClicks = this.leftClicks +  4;
				
				
	},
	
	speedReverse: function(){
				var start= (this.leftClicks *  this.imgWidth );
				var end = ((this.leftClicks  - 4 ) * this.imgWidth);
				$(this.container).effect('right',{ duration: this.speed, wait:true, transition: Fx.Transitions.Back.easeIn }).start(start,end);
				this.leftClicks-= 4;
				
	}
				
});
avScroll.implement(new Options, new Events);

