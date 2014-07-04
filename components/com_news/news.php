<?php
KLoader::loadIdentifier('com://site/news.aliases');

echo KService::get('com://site/news.dispatcher')->dispatch();
