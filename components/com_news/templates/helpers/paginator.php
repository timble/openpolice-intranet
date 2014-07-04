<?php

class ComNewsTemplateHelperPaginator extends KTemplateHelperPaginator
{

    public function pagination($config = array())
    {
        $config = new KConfig($config);
        $config->append(array(
            'total'      => 0,
            'display'    => 4,
            'offset'     => 0,
            'limit'      => 0,
            'show_limit' => true,
		    'show_count' => true
        ));
        
        $this->_initialize($config);
        
        $html  = '<div class="pagination">';
        if($config->show_limit) {
            $html .= '<div class="limit">'.JText::_('Display NUM').' '.$this->limit($config).'</div>';
        }
        $html .=  $this->_pages($this->_items($config));
        if($config->show_count) {
            $html .= '<div class="limit"> '.JText::_('Page').' '.$config->current.' '.JText::_('of').' '.$config->count.'</div>';
        }
        $html .= '</div>';
        
        return $html;
    }

	protected function _pages($pages)
	{
		$html = '<ul>';

		$html .= $this->_link($pages['previous'], 'Previous');

		foreach($pages['pages'] as $page) {
			$class = $page->current ? 'class="active"' : '';
			$html .= $this->_link($page, $page->page);
		}

		$html .= $this->_link($pages['next'], 'Next');

		$html .= '</ul>';
		return $html;
	}

	protected function _link($page, $title)
	{
		$url   = clone KRequest::url();
		$query = $url->getQuery(true);

		$query['limit']  = $page->limit;
		$query['offset'] = $page->offset;
		
		$url->setQuery($query);

		if(!$page->active && $page->current) {
			$html = '<li class="active"><a href="#">'.JText::_($title).'</a></li>';
		} elseif (!$page->active && !$page->current) {
			$html = '<li class="disabled"><a href="#">'.JText::_($title).'</a></li>';
		} else {
			$html = '<li><a href="'.$url.'">'.JText::_($title).'</a></li>';
		}

		return $html;
	}
}