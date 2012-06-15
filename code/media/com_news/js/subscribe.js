if(!News) var News = {};

News.Subscribe = new Class({
	Implements: Options,
	
	initialize: function(options) {
		options.button = document.id(options.holder).getElement('a.subscribe');
		this.setOptions(options);
		
		this.options.button.addEvent('click', function(event)
		{
			event.stop();
			
			if(this.options.button.hasClass('disabled')) {
				return;
			}
			
			this.options.button.addClass('disabled').set('text', 'Wait...');
			this.submit();
		}.bind(this));
	},
	
	submit: function(data) {
		var url = this.options.url, data = this.options.data, button = this.options.button;
		
		var request = new Request({
			method: 'post',
			url: url,
			data: data,
			onSuccess: function() {
				button.removeClass('disabled');
				
				if (data.action == 'add') {
					data.action = 'delete';
					button.set('html', '<i class="icon-star"></i> Unsubscribe');
				} else {
					data.action = 'add';
					button.set('html', '<i class="icon-star-empty"></i> Subscribe');
				}
			}.bind(this),
			onFailure: function() {
				// TODO: Display the error in a nicer way.
				alert('Request failed!');
			}.bind(this)
		}).send();
	}
});