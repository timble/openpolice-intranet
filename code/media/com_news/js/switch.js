window.addEvent('domready', function()
{ 
    $$("label.cb-enable").each(function(el)
    {
    	el.addEvent('click',  function()
    	{
            var parent = $(this).getParent('p.switch');
            parent.getElement('label.cb_disabled').removeClass('selected');
            
            $(this).addClass('selected');
            
            
            parent.getElement('input.checkbox').checked = true;
    	});
    });
    
    $$("label.cb-disable").click(function()
    {
        var parent = $(this).parents('.switch');
        $('.cb-enable',parent).removeClass('selected');
        $(this).addClass('selected');
        $('.checkbox',parent).attr('checked', false);
    });
});