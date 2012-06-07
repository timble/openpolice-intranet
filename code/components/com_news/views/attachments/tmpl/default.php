<?= @helper('behavior.mootools') ?>

<? $list = (isset($row) && isset($table)) ? $attachments->find(array('row' => $row, 'table' => $table)) : $attachments ?>

<? if(count($list)) : ?>
    <div class="attachments-gallery">
    <? foreach($list as $item) : ?>
    	<? if($item->file->isImage()) : ?>
    	<a href="<?= @route('view=attachment&format=file&id='.$item->id) ?>" class="modal" rel="{handler: 'image'}">
    	   <img src="/sites/default/attachments/<?= @escape($item->path) ?>" />
    	</a>
    	<? endif ?>
    <? endforeach ?>
	</div>
    
    <ul class="attachments-list">
    <? foreach($list as $item) : ?>        
    	<? if(!$item->file->isImage()) : ?>
    	<li><a href="<?= @route('view=attachment&format=file&id='.$item->id) ?>"><?= @escape($item->name) ?></a> </li>
    	<? endif ?>
    <? endforeach ?>
    </ul>
<? endif ?>