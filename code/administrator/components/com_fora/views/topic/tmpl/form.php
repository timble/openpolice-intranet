<style src="media://com_fora/css/topic-form.css" />

<?= @helper('behavior.validator') ?>

<form method="post" action="" id="article-form" class="-koowa-form">
    <input type="hidden" name="fora_forum_id" value="<?= $topic->id ? $topic->fora_forum_id : $state->forum ?>" />
    
    <div id="main" class="grid_8">
        <div class="panel title group">
            <input class="inputbox required" type="text" name="title" id="title" size="40" maxlength="255" value="<?= $topic->title ?>" placeholder="<?= @text('Title') ?>" />
            <label for="slug"><?= @text('Slug') ?></label>
            <input class="inputbox" type="text" name="slug" id="slug" size="40" maxlength="255" value="<?= $topic->slug ?>" placeholder="<?= @text('Slug') ?>" />
        </div>
        
        <?= @service('com://admin/editors.view.editor.html')->name('text')->data($topic->text)->display() ?>
    </div>

    <div id="panels" class="grid_4">
        <div class="panel">
            <h3><?= @text('Settings') ?></h3>
            <table class="paramlist admintable">
                <tr>
                    <td class="paramlist_key">
                        <label><?= @text('Published') ?></label>
                    </td>
                    <td>
                        <?= @helper('select.booleanlist', array('name' => 'enabled', 'selected' => $topic->enabled)) ?>
                    </td>
                </tr>
                <tr>
                    <td class="paramlist_key">
                        <label><?= @text('Commentable') ?></label>
                    </td>
                    <td>
                        <?= @helper('select.booleanlist', array('name' => 'commentable', 'selected' => $topic->commentable)) ?>
                    </td>
                </tr>
            </table>
        </div>
        
        <? if($topic->id) : ?>
            <div class="panel">
                <h3><?= @text('Details') ?></h3>
                <table class="paramlist admintable">
                    <tr>
                        <td class="paramlist_key">
                            <label><?= @text('Created by') ?></label>
                        </td>
                        <td>
                            <?= $topic->created_by_name ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="paramlist_key">
                            <label><?= @text('Created on') ?></label>
                        </td>
                        <td>
                            <?= $topic->created_on == '0000-00-00 00:00:00' ? '' : @helper('date.format', array('date' => $topic->created_on, 'format' => @text('DATE_FORMAT_LC2'))) ?>
                        </td>
                    </tr>
                    <? if($topic->modified_by) : ?>
                        <tr>
                            <td class="paramlist_key">
                                <label><?= @text('Modified by') ?></label>
                            </td>
                            <td>
                                <?= $topic->modified_by_name ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="paramlist_key">
                                <label><?= @text('Modified on') ?></label>
                            </td>
                            <td>
                                <?= @helper('date.format', array('date' => $topic->modified_on, 'format' => @text('DATE_FORMAT_LC2'))) ?>
                            </td>
                        </tr>
                    <? endif ?>
                </table>
            </div>
            
	        <div class="panel categories group">
	            <h3><?= @text('Forum') ?></h3>
	            <?= @template('form_categories', array('categories' => $categories, 'topic' => $topic, 'forums' => $forums)) ?>
	        </div>
        <? endif ?>
    </div>
</form>
