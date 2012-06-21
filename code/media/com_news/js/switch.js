// From http://devgrow.com/iphone-style-switches/
window.addEvent('domready', function()
{ 
    $$("label.cb-enable").each(function(el)
    {
    	el.addEvent('click',  function()
    	{
            var parent = $(this).getParent('p.switch');
            parent.getElement('label.cb-disable').removeClass('selected');
            
            $(this).addClass('selected');

            parent.getElement('input.radiobutton').value = 1;
    	});
    });
    
    $$("label.cb-disable").each(function(el)
    {
    	el.addEvent('click',  function()
    	{
            var parent = $(this).getParent('p.switch');
            parent.getElement('label.cb-enable').removeClass('selected');
            
            $(this).addClass('selected');
            
            parent.getElement('input.radiobutton').value = 0;
    	});
    });
});