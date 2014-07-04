<?php
class ComNewsViewArticlesRss extends KViewHtml
{
    protected function _initialize(KConfig $config)
    {
        $config->append(array('mimetype' => 'application/rss+xml'));
        
        parent::_initialize($config);
    }
         
    public function display()
    {   
		$this->setLayout('rss');

        return parent::display();
    }
}