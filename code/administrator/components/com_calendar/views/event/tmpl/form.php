<?= @helper('behavior.validator') ?>

<form method="post" action="" id="event-form" class="-koowa-form">
    <input type="hidden" name="fora_forum_id" value="<?= $event->id ? $event->fora_forum_id : $state->forum ?>" />
    
    <div id="main" class="grid_8">
        <div class="panel title group">
            <input class="inputbox required" type="text" name="title" id="title" size="40" maxlength="255" value="<?= $event->title ?>" placeholder="<?= @text('Title') ?>" />
            <label for="slug"><?= @text('Slug') ?></label>
            <input class="inputbox" type="text" name="slug" id="slug" size="40" maxlength="255" value="<?= $event->slug ?>" placeholder="<?= @text('Slug') ?>" />
        </div>
        
        <?= @service('com://admin/editors.view.editor.html')->name('description')->data($event->description)->display() ?>
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
                        <?= @helper('select.booleanlist', array('name' => 'enabled', 'selected' => $event->enabled)) ?>
                    </td>
                </tr>
                <tr>
                    <td class="paramlist_key">
                        <label><?= @text('Date') ?></label>
                    </td>
                    <td>
                        <?= @helper('behavior.calendar', array('date' => $event->start_date, 'name' => 'start_date')); ?>
                    </td>
                </tr>
            </table>
        </div>
        
        <? if($event->id) : ?>
            <div class="panel">
                <h3><?= @text('Details') ?></h3>
                <table class="paramlist admintable">
                    <tr>
                        <td class="paramlist_key">
                            <label><?= @text('Created by') ?></label>
                        </td>
                        <td>
                            <?= $event->created_by_name ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="paramlist_key">
                            <label><?= @text('Created on') ?></label>
                        </td>
                        <td>
                            <?= $event->created_on == '0000-00-00 00:00:00' ? '' : @helper('date.format', array('date' => $event->created_on, 'format' => @text('DATE_FORMAT_LC2'))) ?>
                        </td>
                    </tr>
                    <? if($event->modified_by) : ?>
                        <tr>
                            <td class="paramlist_key">
                                <label><?= @text('Modified by') ?></label>
                            </td>
                            <td>
                                <?= $event->modified_by_name ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="paramlist_key">
                                <label><?= @text('Modified on') ?></label>
                            </td>
                            <td>
                                <?= @helper('date.format', array('date' => $event->modified_on, 'format' => @text('DATE_FORMAT_LC2'))) ?>
                            </td>
                        </tr>
                    <? endif ?>
                </table>
            </div>
        <? endif ?>
    </div>
</form>
