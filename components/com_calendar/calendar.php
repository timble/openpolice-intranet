<?php
KLoader::loadIdentifier('com://site/calendar.aliases');

echo KService::get('com://site/calendar.dispatcher')->dispatch();
