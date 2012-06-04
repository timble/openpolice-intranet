<?php

class ComForaDatabaseBehaviorAttachable extends ComAttachmentsDatabaseBehaviorAttachable
{
	public function getAttachments()
	{
		return $this->getService('com://admin/fora.model.attachments')
				->row($this->id)
				->table($this->getTable()->getBase())
				->getList();
	}
}