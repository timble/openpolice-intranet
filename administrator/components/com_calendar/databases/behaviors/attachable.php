<?php
class ComCalendarDatabaseBehaviorAttachable extends ComAttachmentsDatabaseBehaviorAttachable
{
	public function getAttachments()
	{
		return $this->getService('com://admin/calendar.model.attachments')
				->row($this->id)
				->table($this->getTable()->getBase())
				->getList();
	}
}