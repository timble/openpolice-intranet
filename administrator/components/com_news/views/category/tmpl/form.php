<form method="post" action="" class="-koowa-form">
    <div class="grid_8">
        <div class="panel title group">
            <input class="inputbox required" type="text" name="title" id="title" size="40" maxlength="255" value="<?= $category->title ?>" placeholder="<?= @text('Title') ?>" />
            <label for="slug"><?= @text('Slug') ?></label>
            <input class="inputbox" type="text" name="slug" id="slug" size="40" maxlength="255" value="<?= $category->slug ?>" placeholder="<?= @text('Slug') ?>" />
        </div>

        <?= @service('com://admin/editors.view.editor.html')->name('description')->data($category->description)->display() ?>
    </div>
    
    <div class="grid_4">
        <div class="panel">
            <h3><?= @text('Settings') ?></h3>
            <table class="paramlist admintable">
                <tr>
                    <td class="paramlist_key">
                        <label><?= @text('Published') ?></label>
                    </td>
                    <td>
                        <?= @helper('select.booleanlist', array('name' => 'published', 'selected' => $category->enabled)) ?>
                    </td>
                </tr>
                <tr>
                    <td class="paramlist_key">
                        <label><?= @text('Color') ?></label>
                    </td>
                    <td>
                        <?= @helper('listbox.color', array('name' => 'params[color]', 'selected' => $category->params->color)) ?>
                    </td>
                </tr>
            </table>
        </div>
    
        <? if($category->id) : ?>
            <div class="panel">
                <h3><?= @text('Details') ?></h3>
                <table class="paramlist admintable">
                    <tr>
                        <td class="paramlist_key">
                            <label><?= @text('Created by') ?></label>
                        </td>
                        <td>
                            <?= $category->created_by_name ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="paramlist_key">
                            <label><?= @text('Created on') ?></label>
                        </td>
                        <td>
                            <?= @helper('date.format', array('date' => $category->created_on, 'format' => @text('DATE_FORMAT_LC2'))) ?>
                        </td>
                    </tr>
                    <? if($category->modified_by) : ?>
                        <tr>
                            <td class="paramlist_key">
                                <label><?= @text('Modified by') ?></label>
                            </td>
                            <td>
                                <?= $category->modified_by_name ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="paramlist_key">
                                <label><?= @text('Modified on') ?></label>
                            </td>
                            <td>
                                <?= @helper('date.format', array('date' => $category->modified_on, 'format' => @text('DATE_FORMAT_LC2'))) ?>
                            </td>
                        </tr>
                    <? endif ?>
                </table>
            </div>
        <? endif ?>
    </div>
</form>
