<?php
KLoader::loadIdentifier('com://site/fora.aliases');

echo KService::get('com://site/fora.dispatcher')->dispatch();