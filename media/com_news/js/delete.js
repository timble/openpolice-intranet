if(!News) var News = {};

News.Delete = new Class({
	Implements: Options,
	
	initialize: function(options) {
		options.button = document.id(options.holder).getElement('a.delete');
		this.setOptions(options);

		this.options.button.addEvent('click', function(event)
		{
			event.stop();
			
			if(this.options.button.hasClass('disabled')) {
				return;
			}
			
			if(!confirm('Are you sure you want to delete this article?')) {
				return;
			}
			
			this.options.button.addClass('disabled').set('text', 'Wait...');
			this.submit();
		}.bind(this));
	},
	
	submit: function(data) {
		var url = this.options.url, data = this.options.data, button = this.options.button, forward = this.options.forward;
		
		var request = new Request({
			method: 'post',
			url: url,
			data: data,
			onSuccess: function() {
				button.removeClass('disabled').set('text', 'Deleted!');
				data.action = '';
				window.location.href = forward;
			}.bind(this),
			onFailure: function() {
				// TODO: Display the error in a nicer way.
				alert('Request failed!');
			}.bind(this)
		}).send();
	}
});