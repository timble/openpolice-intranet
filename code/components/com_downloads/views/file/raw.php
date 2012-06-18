<?php
class ComDownloadsViewFileRaw extends KViewFile
{
	public function display()
	{
		$path = base64_decode(KRequest::get('get.path', 'base64'));

		$container = $this->getService('com://admin/files.model.containers')
						->slug('downloads-downloads')
						->getItem();
		
		$this->path = $container->path.DS.$path;
		$this->filename = basename($path);

		return parent::display();
	}
}