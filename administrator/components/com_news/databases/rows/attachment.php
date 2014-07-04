<?php
class ComNewsDatabaseRowAttachment extends ComAttachmentsDatabaseRowAttachment
{
	public function __get($name)
	{
	    if($name == 'file')
	    {
	    	$this->file = $this->getService('com://admin/files.model.files')
	    					->container($this->container)
	    					->folder($this->path)
	    					->name($this->name)
	    					->getItem();
	    }

	    if($name == 'thumbnail')
	    {
	    	$file = $this->file;

	    	if($file && $file->isImage())
	    	{
	    		$this->thumbnail = $this->getService('com://admin/files.controller.thumbnail')
	    				->container($this->container)
	    				->filename($this->path)
	    				->read();
	    	}
	    }

	    return parent::__get($name);
	}
}