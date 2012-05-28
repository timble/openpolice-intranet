<?php
class ComForaControllerToolbarForums extends ComDefaultControllerToolbarDefault
{
    public function getCommands()
    {
        $this->addSeparator()
            ->addPublish()
            ->addUnpublish();
        
        return parent::getCommands();
    }
    
    protected function _commandPublish(KControllerToolbarCommand $command)
    {
        $command->append(array(
            'attribs'  => array(
                'data-action' => 'edit',
                'data-data'   => '{enabled:1}'
            )
        )); 
    }
    
    protected function _commandUnpublish(KControllerToolbarCommand $command)
    {
        $command->append(array(
            'attribs'  => array(
                'data-action' => 'edit',
                'data-data'   => '{enabled:0}'
            )
        )); 
    }
    
    protected function _commandNew(KControllerToolbarCommand $command)
    {
        if($category = $this->getController()->getModel()->get('category'))
        {
            $command->attribs = array(
                'class' => array(),
                'href'  => JRoute::_('index.php?option=com_fora&view=forum&category='.$category)
            );
        }
        else
        {
            $command->attribs = array(
                'class'   => array('disabled'),
                'onclick' => 'return false'
            );
        }
    }
}