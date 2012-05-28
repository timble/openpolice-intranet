window.addEvent('domready', (function() {
    $$('.-koowa-grid div.star').addEvent('click', function(event) {
        event.stop();

        var data = {
            action: 'edit',
            _token: $$('.-koowa-grid')[0].get('data-token-value'),
            starred: Number(this.get('data-starred'))
        }

        new Request({
            method: 'post',
            url: this.get('data-url'),
            data: data,
            onSuccess: function() {
                this.setStyle('background-position', data.starred ? '0px 0px' : '-16px 0px');
                this.set('data-starred', Number(!data.starred));
            }.bind(this)
        }).send();
    });
}));
