<?php
class ComNewsTemplateHelperActivity extends KTemplateHelperAbstract
{
	public function message($config = array())
	{
		$config = new KConfig($config);
		$config->append(array(
				'row'      => ''
		));
	
		$row  = $config->row;

		$message   = '<span class="user">'.$row->created_by_name.'</span>';
		$message  .= ' <span class="action">';
		
		switch($row->name)
		{
			case 'comment':
				$message .= $row->action == 'add' ? JText::_('commented on') : $row->status;
				break;
			default:
				$message .= $row->status;
				break;
		}

		$message  .= '</span> ';	
		
		if(!in_array($row->name, array('comment')) || $row->action != 'add') {
			$message .= ' <span class="ellipsis" class="package">'. $row->name.'</span>';
		}
		
		if($row->news_article_id)
		{
			$topic = $this->getTemplate()->getView()->createRoute('view=article&id='.$row->news_article_id.'&slug='.$row->article_slug);
			if($row->name == 'comment') {
				$topic .= '#comment-'.$row->row;
			}
			
			$message .= ' <a href="'.$topic.'" class="activity-title">'.$row->title.'</a>';
		}
		else {
			$message .= ' <span class="activity-title">'.$row->title.'</a>';
		}
	
		return $message;
	}
	
	
	public function summary($config = array())
	{
		$config = new KConfig($config);
		$config->append(array(
				'text' => '',
				'length' => 50,
				'wordlength_min' => 3,
				'wordlength_max' => 25
		));
	
		$config->text = trim(strip_tags($config->text));
		$text = '';
		$len = 0;
	
		foreach(explode(' ', $config->text) as $word)
		{
			$part = (($text != '') ? ' ' : '') . $word;
	
			if(strlen($word) > $config->wordlength_max && $len + strlen($part) > $config->length) {
				$part = (($text != '') ? ' ' : '') . substr($word, 0, ($config->length - $len));
			}
	
			$text .= $part;
			$len += strlen($part);
	
			if(strlen($word) > $config->wordlength_min && strlen($text) >= $config->length) {
				break;
			}
		}
	
		return  $text . (($len < strlen($config->text)) ? ' ...' : '');
	}
}