/*
    Main Developer: Jonathan Schemoul - JMS Informatique SARL, 64 Rue Alexandre Dumas 75011 Paris France
    Contractor: miloIIIIVII, web design and graphics - 3oneseven.com  GmbH 80805 Munich Germany
*/

var featureGallery = new Class({
	Extends: gallery,
	initialize: function(element, options) {
		this.setOptions({
			showArrows: false,
			showCarousel: false,
			embedLinks: true,
			buttonContainer: false,
			thumbIdleOpacity: .5,
			defaultTransition: "fadeslideleft"
		});
		this.setOptions(options);
		
		this.buttonContainer = $(this.options.buttonContainer);		
		
		this.addEvent('onPopulated', this.createButtons.bind(this));
		this.addEvent('onChanged', this.updateActiveButton.bind(this));
		this.parent(element, this.options);
		this.initReadButton();
		this.updateActiveButton();
	},
	populateData: function() {
		options = this.options;
		
		var data = $A(this.galleryData);
		
		this.options.showCarousel = true;
		data.extend(this.populateGallery(this.populateFrom, data.length));
		this.options.showCarousel = false;
		
		this.galleryData = data;
		
		this.fireEvent('onPopulated');
	},
	createButtons: function() {
		this.featureButtons = $A([]);
		this.galleryData.each(function(item, index) {
			var button = new Element('a').addClass('featureButton').injectInside(
				this.buttonContainer
			).setStyles({
				backgroundImage: "url('" + item.thumbnail + "')",
				opacity: this.options.thumbIdleOpacity
			});
			if (index == 0)
				button.addClass('first');
			button.addEvents({
				'mouseover': function(myself, number){
					myself.addClass('hover').morph({opacity: 1});
				}.pass([button,, index], this),
				'mouseout': function(myself, number){
					if (this.currentIter!=number)
						myself.removeClass('hover').morph({opacity: this.options.thumbIdleOpacity});
				}.pass([button, index], this),
				'click': function(myself, number){
					this.goTo.pass(number,this)();
				}.pass([button, index], this)
			});
			this.featureButtons[index] = button;
		}.bind(this));
	},
	updateActiveButton: function () {
		this.setActiveButton(this.currentIter);
	},
	setActiveButton: function (num) {
		this.featureButtons.each(function(button, index) {
			if (index == num)
				button.morph({opacity: 1});
			else
				button.morph({opacity: this.options.thumbIdleOpacity});
		});
	},
	initReadButton: function() {
		this.readButton = new Element('a', {
			'class': 'readon', 'text': 'read on =>'
		}).inject(this.slideInfoZone.element);
	}
});