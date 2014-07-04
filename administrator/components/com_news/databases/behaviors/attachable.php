<?php
class ComNewsDatabaseBehaviorAttachable extends ComAttachmentsDatabaseBehaviorAttachable
{
	public function getAttachments()
	{
		return $this->getService('com://admin/news.model.attachments')
				->row($this->id)
				->table($this->getTable()->getBase())
				->getList();
	}
}