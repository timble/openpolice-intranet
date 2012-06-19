<?php
class ComDownloadsViewDownloadsHtml extends ComDefaultViewHtml
{
	protected function _initialize(KConfig $config)
    {
        $config->append(array(
            'template_filters' => array('module'),
        ));

        parent::_initialize($config);
    }
	
	public function display()
	{
		$cwd = base64_decode(KRequest::get('get.folder', 'base64', null));

		$files = $this->getService('com://admin/files.model.files')
						->container('downloads-downloads')
						->folder($cwd)
						->getList();
		
		$folders = $this->getService('com://admin/files.model.folders')
					->container('downloads-downloads')
					->folder($cwd)
					->getList();

		if($cwd) 
		{
			$parts = explode('/', $cwd);
			array_pop($parts);
			
			$this->assign('toplevel', implode('/', $parts));
		}
		
		$this->assign('cwd', $cwd);
		$this->assign('folders', $folders);
		$this->assign('files', $files);
		
		return parent::display();
	}
}