// From http://devgrow.com/iphone-style-switches/
window.addEvent('domready', function()
{ 
    $$("label.cb-enable").each(function(el)
    {
    	el.addEvent('click', function()
    	{
            var parent = this.getParent('p.switch');
            var name = parent.getElement('input.radiobutton').name;
            
            parent.getElement('label.cb-disable').removeClass('selected');
            this.addClass('selected');

            document.id(name+'1').checked = "checked";
    	});
    });
    
    $$("label.cb-disable").each(function(el)
    {
    	el.addEvent('click', function()
    	{
            var parent = this.getParent('p.switch');
            var name = parent.getElement('input.radiobutton').name;
            
            parent.getElement('label.cb-enable').removeClass('selected');
            this.addClass('selected');
         
            document.id(name+'0').checked = "checked";
    	});
    });
});