// Global variables
if(!HeaderMan) var HeaderMan = {};

HeaderMan.isEnabled = true;
HeaderMan.person = 'P0000000001';

// Called when the url of a tab changes.
function checkForValidUrl(tabId, changeInfo, tab)
{
	if (tab.url.indexOf('police') > -1) {
		chrome.pageAction.show(tabId);
	}
};

// Reloads all tabs
function reload()
{
	chrome.tabs.getAllInWindow(null, function(tabs)
	{
		for(var i=0;i<tabs.length;i++)
		{
			if(tabs[i].url.indexOf('police') > -1) {
				chrome.tabs.reload(tabs[i].id);
			}
	    }
	});
};

// Listener, inserts the P identifier into the HTTP headers when enabled
function forgeHeader(details)
{
	if(!HeaderMan.isEnabled) {
		return;
	}
	
	if(details.url.indexOf('police') > -1)
	{
		var header = {name: 'P-SSO-IDENTIFIER', value: HeaderMan.person};
		
		details.requestHeaders.push(header);

		return {requestHeaders: details.requestHeaders};
	}
};

// Handles incoming requests
function requestController(request, sender, sendResponse) {
	if(request.task == 'update')
	{
		var isNew = (HeaderMan.isEnabled != request.mode || HeaderMan.person != request.person);
		
		HeaderMan.isEnabled = request.mode;
		HeaderMan.person = request.person;
		
		if(isNew) reload();
	}
	
	sendResponse({'mode': HeaderMan.isEnabled, 'person': HeaderMan.person});
};

// Register all listeners :

// Listen for any changes to the URL of any tab.
chrome.tabs.onUpdated.addListener(checkForValidUrl);
// Request listener
chrome.extension.onRequest.addListener(requestController);
// Web Request listener
chrome.webRequest.onBeforeSendHeaders.addListener(forgeHeader, {urls: ["http://*/*"]}, ["blocking", "requestHeaders"]);