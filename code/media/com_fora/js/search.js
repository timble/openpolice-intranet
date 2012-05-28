if (!Fora) {
	var Fora = {};
}

Fora.Search = new Class({
	Implements: Options,
	
	initialize: function(options) {
		this.setOptions(options);
		
		if(this.options.text.value.trim().length > 3) {
			this.options.button.set('disabled', '');
		}
		
		this.options.text.addEvents({
			change: function(event) {
				this.options.button.set('disabled', event.target.value.trim().length >= 3 ? '' : 'disabled');
			}.bind(this),
			
			keyup: function(event) {
				this.options.button.set('disabled', event.target.value.trim().length >= 3 ? '' : 'disabled');
			}.bind(this),
			
			keypress: function(event) {
				if (event.key == 'enter' && this.value.trim().length < 3) {
					event.stop();
				}
			}
		});
	}
});