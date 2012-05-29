<?

class ComNewsTemplateHelperArticle extends KTemplateHelperAbstract
{
	public function text($config = array())
	{	
		$config = new KConfig($config);
		$config->append(array(
			'row'      => ''
		));
		
		//Set the introtext and the full text
        $pattern = '#<hr\s+id=("|\')system-readmore("|\')\s*\/*>#i';

        if(preg_match($pattern, $config->row->text))
        {
            list($introtext, $fulltext) = preg_split($pattern, $config->row->text, 2);

            $text = trim($introtext);
        } else {
        	$text = trim($config->row->text);
        }
        
        return $text;
	}
}