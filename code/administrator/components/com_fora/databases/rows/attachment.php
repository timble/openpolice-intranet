<?php
class ComForaDatabaseRowAttachment extends ComAttachmentsDatabaseRowAttachment
{
	public function __get($name)
	{
	    if($name == 'file' && is_null($this->file))
	    {
	    	$this->file = $this->getService('com://admin/files.model.files')
	    					->container($this->container)
	    					->folder($this->path)
	    					->name($this->name)
	    					->getItem();
	    }
	    
	    return parent::__get($name);
	}
}