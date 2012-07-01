<?php

class ComNewsDatabaseRowArticle extends KDatabaseRowDefault
{
	public function __get($column)
	{
		if($column == 'text' && !isset($this->_data['text'])) {
			$this->_data['text'] = $this->fulltext ? $this->introtext.'<hr id="system-readmore" />'.$this->fulltext : $this->introtext;
		}

		return parent::__get($column);
	}

	public function save()
	{
		//Set the introtext and the full text
		$text    = str_replace('<br>', '<br />', $this->text);
		$pattern = '#<hr\s+id=("|\')system-readmore("|\')\s*\/*>#i';

		if(preg_match($pattern, $text))
		{
			list($introtext, $fulltext) = preg_split($pattern, $text, 2);

			$this->introtext = trim($introtext);
			$this->fulltext = trim($fulltext);
		} else {
			$this->introtext = trim($text);
			$this->fulltext = '';
		}

		$modified = $this->_modified;
		$result   = parent::save();

		return $result;
	}
}