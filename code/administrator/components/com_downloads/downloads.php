<?php
echo KService::get('com://admin/files.controller.files')
		->container('downloads-downloads')
		->display();