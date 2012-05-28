<?php
class ComForaControllerToolbarCategories extends ComDefaultControllerToolbarDefault
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
}