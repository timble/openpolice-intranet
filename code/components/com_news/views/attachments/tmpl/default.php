<?= @helper('behavior.mootools') ?>

<? $list = (isset($row) && isset($table)) ? $attachments->find(array('row' => $row, 'table' => $table)) : $attachments ?>

<? if(count($list)) : ?>
    <div class="attachments-gallery">
    <? foreach($list as $item) : ?>
    	<? if (in_array(strtolower(pathinfo($item->name, PATHINFO_EXTENSION)), array('jpg', 'jpeg', 'gif', 'png', 'tiff', 'tif', 'xbm', 'bmp'))) : ?>
    	<a href="<?= @route('view=attachment&format=file&id='.$item->id) ?>" class="modal" rel="{handler: 'image'}">
    	   <img src="/sites/default/attachments/<?= @escape($item->path) ?>" />
    	</a>
    	<? endif ?>
    <? endforeach ?>
	</div>
    
    <ul class="attachments-list">
    <? foreach($list as $item) : ?>        
    	<? if (!in_array(strtolower(pathinfo($item->name, PATHINFO_EXTENSION)), array('jpg', 'jpeg', 'gif', 'png', 'tiff', 'tif', 'xbm', 'bmp'))) : ?>
    	<li><a href="<?= @route('view=attachment&format=file&id='.$item->id) ?>"><?= @escape($item->name) ?></a> </li>
    	<? endif ?>
    <? endforeach ?>
    </ul>
<? endif ?>