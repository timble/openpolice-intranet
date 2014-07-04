if(!Attachments) var Attachments = {};

Attachments.Upload = new Class({
	Implements: Options,
	
	initialize: function(options){
		var holder = document.id(options.holder);
		
		this.setOptions({
			list: document.id(options.holder).getElement('ul.attachments')
		});
		
		this.options.list.getChildren()[0].getChildren()[0].addEvent('change', function(){
			this.add(event.target);
		}.bind(this));
	},
	
	add: function(target){
		target.setStyle('display', 'none').getParent().adopt(
			new Element('span', {text: target.value.replace(/c:\\fakepath\\/i, '')}),
			new Element('a', {text: 'remove'}).addEvent('click', function(event){
				event.stop();
				
				this.remove(event.target);
			}.bind(this))
		);
		
		this.options.list.grab(
			new Element('li').grab(
				new Element('input', {type: 'file', name: 'attachments[]'}).addEvent('change', function(event){
					this.add(event.target);
				}.bind(this))
			)
		);
	},
	
	remove: function(target){
		target.getParent().destroy();
	}
});