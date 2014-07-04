if(!Tickets) var Tickets = {};

Tickets.Request = new Class({
    request: function(data){
        data.action = this.sidebar.getElement('input[name=action]').get('value');
        data._token = this.sidebar.getElement('input[name=_token]').get('value');

        new Request({
            method: 'post',
            url: this.sidebar.getElement('form').get('action'),
            data: data,
            onSuccess: function(){
                var status = this.sidebar.getElement('div.status');
                status.fade('in');

                (function(){
                    status.fade('out');
                }).delay(1500);
            }.bind(this)
        }).send();
    }
});

Tickets.Ticket = new Class({
    Implements: Tickets.Request,

    initialize: function(){
        this.sidebar = document.id('ticket-sidebar');

        this.sidebar.getElements('select.updatable').addEvent('change', function(event){
            this.update(event);
        }.bind(this));
    },

    update: function(event){
        var data = {};
        data[event.target.get('name')] = event.target.get('value');

        this.request(data);
    }
});

Tickets.Assembla = new Class({
    Implements: Tickets.Request,

    initialize: function(){
        this.sidebar = document.id('ticket-sidebar');
        this.holder = this.sidebar.getElement('div.assembla');

        var associate = this.holder.getElement('a.associate');
        associate.addEvent('click', function(event){
            this.showSelection(event);
        }.bind(this));

        if(associate.hasClass('hidden')){
            this.showAssociation();
        }
    },

    showSelection: function(event){
        event.target.addClass('hidden');
        this.holder.getElement('table.associate').removeClass('hidden');

        this.holder.getElement('select.space').addEvent('change', function(event){
            var data = this.getTickets(event);

            if(data instanceof XMLHttpRequest) {
                this.holder.getElement('td.ticket').set('text', '');
                return false;
            }

            this.setTickets(JSON.decode(data));
        }.bind(this));
    },

    showAssociation: function(){
        var element = this.holder.getElement('div.ticket');
        var url     = element.get('data-url') + '&space=' + element.get('data-space') + '&ticket=' + element.get('data-ticket');
        var data    = this.getTicket(url);

        if(data instanceof XMLHttpRequest) {
            return false;
        }

        this.setTicket(JSON.decode(data));

        this.holder.getElement('a.delete').addEvent('click', function(event){
            this.deleteAssociation(event);
        }.bind(this));

        element.removeClass('hidden');
    },

    deleteAssociation: function(event){
        this.request({assembla_space_id: '', assembla_ticket_id: 0});

        this.holder.getElement('div.ticket').addClass('hidden');
        this.holder.getElement('a.associate').removeClass('hidden');
        this.holder.getElement('select.space').set('value', 0);
        this.holder.getElement('td.ticket').empty();
    },

    getTicket: function(url){
        var data, request = new Request({
            method: 'get',
            url: url,
            async: false,
            onSuccess: function(response){
                data = response;
            },
            onFailure: function(response){
                data = response;
                alert('Assembla returned with the following error:\n\n' + response.status + ': ' + response.statusText);
            }
        }).send();

        return data;
    },

    setTicket: function(data){
        var holder = this.holder.getElement('div.ticket');

        $each(data.item, function(value, name){
            holder.getElement('span.' + name).set('text', value);
        });
    },

    getTickets: function(event){
        var data, request = new Request({
            method: 'get',
            url: event.target.get('data-url') + '&space=' + event.target.get('value'),
            async: false,
            onRequest: function(){
                this.holder.getElement('td.ticket').set('text', 'Loading...');
            }.bind(this),
            onSuccess: function(response){
                data = response;
            },
            onFailure: function(response){
                data = response;
                alert('Assembla returned with the following error:\n\n' + response.status + ': ' + response.statusText);
            }
        }).send();

        return data;
    },

    setTickets: function(data){
        var select = new Element('select', {
            name: 'assembla_ticket_id',
            class: 'ticket'
        });

        var option = new Element('option', {
            value: 0,
            text: '- Select -'
        });

        select.adopt(option);

        $each(data.items, function(ticket) {
            var option = new Element('option', {
                value: ticket.number,
                text: '#' + ticket.number + ': ' + (ticket.summary.length > 50 ? ticket.summary.substr(0, 50).trim() + '...' : ticket.summary)
            });

            select.adopt(option);
        });

        select.addEvent('change', function(event){
            this.update(event);
        }.bind(this));

        this.holder.getElement('td.ticket').set('text', '').adopt(select);
    },

    update: function(event){
        var data = {};
        data.assembla_space_id = this.holder.getElement('select.space').get('value');
        data.assembla_ticket_id = event.target.get('value');

        this.request(data);

        this.holder.getElement('table.associate').addClass('hidden');
        this.holder.getElement('div.ticket').set('data-space', data.assembla_space_id).set('data-ticket', data.assembla_ticket_id).removeClass('hidden');

        this.showAssociation();
    }
});

window.addEvent('load', function() {
    new Tickets.Ticket();
    new Tickets.Assembla();
});
