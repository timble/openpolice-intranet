if(!Fora) var Fora = {};

Fora.Subscribe = new Class({
	Implements: Options,
	
	initialize: function(options) {
		options.button = document.id(options.holder).getElement('button.subscribe');
		this.setOptions(options);
		
		this.options.button.addEvent('click', function(event) {
			event.stop();
			this.options.button.set('disabled', 'disabled').set('text', 'Wait...');
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
				button.set('disabled', '')
				
				if (data.action == 'add') {
					data.action = 'delete';
					button.set('disabled', '').set('text', 'Unsubscribe');
				} else {
					data.action = 'add';
					button.set('disabled', '').set('text', 'Subscribe');
				}
			}.bind(this),
			onFailure: function() {
				// TODO: Display the error in a nicer way.
				alert('Request failed.');
			}.bind(this)
		}).send();
	}
});