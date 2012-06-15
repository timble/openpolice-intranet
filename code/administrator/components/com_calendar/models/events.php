<?php
class ComCalendarModelEvents extends ComDefaultModelDefault
{
	public function __construct(KConfig $config)
	{
		parent::__construct($config);
	
		$this->_state
			->insert('search', 'string');
	}
	
	protected function _buildQueryWhere(KDatabaseQuery $query)
	{
		$state = $this->_state;
		
		if(!$state->isUnique())
		{
			if($state->search)
			{
				$query->where('title', 'LIKE', '%'.$state->search.'%');
				$query->where('description', 'LIKE', '%'.$state->search.'%', 'OR');
			}
		}
	}
}