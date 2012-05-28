<!--
<script src="media://lib_koowa/js/koowa.js" />
<style src="media://lib_koowa/css/koowa.css" />
-->

<?= @helper('behavior.validator') ?>

<form method="post" action="" class="-koowa-form">
    <input type="hidden" name="fora_category_id" value="<?= $forum->id ? $forum->fora_category_id : $state->category ?>" />
    
    <div class="grid_8">
        <div class="panel title group">
            <input class="inputbox required" type="text" name="title" id="title" size="40" maxlength="255" value="<?= $forum->title ?>" placeholder="<?= @text('Title') ?>" />
            <label for="slug"><?= @text('Slug') ?></label>
            <input class="inputbox" type="text" name="slug" id="slug" size="40" maxlength="255" value="<?= $forum->slug ?>" placeholder="<?= @text('Slug') ?>" />
        </div>

        <?= @service('com://admin/editors.view.editor.html')->name('description')->data($forum->description)->display() ?>
    </div>
    
    <div class="grid_4">
        <div class="panel">
            <h3><?= @text('Settings') ?></h3>
            <table class="paramlist admintable">
                <tr>
                    <td class="paramlist_key">
                        <label><?= @text('Type') ?></label>
                    </td>
                    <td>
                        <?= @helper('listbox.types', array('selected' => $forum->type, 'attribs' => array('class' => 'required'))) ?>
                    </td>
                </tr>
                <tr>
                    <td class="paramlist_key">
                        <label><?= @text('Published') ?></label>
                    </td>
                    <td>
                        <?= @helper('select.booleanlist', array('name' => 'published', 'selected' => $forum->enabled)) ?>
                    </td>
                </tr>
                <tr>
                    <td class="paramlist_key">
                        <label><?= @text('Users can add topics') ?></label>
                    </td>
                    <td>
                        <?= @helper('select.booleanlist', array('name' => 'open', 'selected' => $forum->open)) ?>
                    </td>
                </tr>
                <tr>
                    <td class="paramlist_key">
                        <label><?= @text('Users can subscribe') ?></label>
                    </td>
                    <td>
                        <?= @helper('select.booleanlist', array('name' => 'subscribable', 'selected' => $forum->subscribable)) ?>
                    </td>
                </tr>
            </table>
        </div>
        
        <? if($forum->id) : ?>
            <div class="panel">
                <h3><?= @text('Details') ?></h3>
                <table class="paramlist admintable">
                    <tr>
                        <td class="paramlist_key">
                            <label><?= @text('Created by') ?></label>
                        </td>
                        <td>
                            <?= $forum->created_by_name ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="paramlist_key">
                            <label><?= @text('Created on') ?></label>
                        </td>
                        <td>
                            <?= @helper('date.format', array('date' => $forum->created_on, 'format' => @text('DATE_FORMAT_LC2'))) ?>
                        </td>
                    </tr>
                    <? if($forum->modified_by) : ?>
                        <tr>
                            <td class="paramlist_key">
                                <label><?= @text('Modified by') ?></label>
                            </td>
                            <td>
                                <?= $forum->modified_by_name ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="paramlist_key">
                                <label><?= @text('Modified on') ?></label>
                            </td>
                            <td>
                                <?= @helper('date.format', array('date' => $forum->modified_on, 'format' => @text('DATE_FORMAT_LC2'))) ?>
                            </td>
                        </tr>
                    <? endif ?>
                </table>
            </div>
        <? endif ?>
    </div>
</form>
