<?= @helper('behavior.validator') ?>

<form method="post" action="" id="article-form" class="-koowa-form">
    <input type="hidden" name="fora_forum_id" value="<?= $article->id ? $article->fora_forum_id : $state->forum ?>" />
    
    <div id="main" class="grid_8">
        <div class="panel title group">
            <input class="inputbox required" type="text" name="title" id="title" size="40" maxlength="255" value="<?= $article->title ?>" placeholder="<?= @text('Title') ?>" />
            <label for="slug"><?= @text('Slug') ?></label>
            <input class="inputbox" type="text" name="slug" id="slug" size="40" maxlength="255" value="<?= $article->slug ?>" placeholder="<?= @text('Slug') ?>" />
        </div>
        
        <?= @service('com://admin/editors.view.editor.html')->name('text')->data($article->text)->display() ?>
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
                        <?= @helper('select.booleanlist', array('name' => 'enabled', 'selected' => $article->enabled)) ?>
                    </td>
                </tr>
                <tr>
                    <td class="paramlist_key">
                        <label><?= @text('Commentable') ?></label>
                    </td>
                    <td>
                        <?= @helper('select.booleanlist', array('name' => 'commentable', 'selected' => $article->commentable)) ?>
                    </td>
                </tr>
                <tr>
                	<td class="key">
                		<label for="slug"><?= @text( 'Location' ); ?>:</label>
                	</td>
                	<td>
                		<?= @helper('listbox.categories', array('name' => 'news_category_id', 'selected' => $article->news_category_id)) ?>
                	</td>
                </tr>
            </table>
        </div>
        
        <? if($article->id) : ?>
            <div class="panel">
                <h3><?= @text('Details') ?></h3>
                <table class="paramlist admintable">
                    <tr>
                        <td class="paramlist_key">
                            <label><?= @text('Created by') ?></label>
                        </td>
                        <td>
                            <?= $article->created_by_name ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="paramlist_key">
                            <label><?= @text('Created on') ?></label>
                        </td>
                        <td>
                            <?= $article->created_on == '0000-00-00 00:00:00' ? '' : @helper('date.format', array('date' => $article->created_on, 'format' => @text('DATE_FORMAT_LC2'))) ?>
                        </td>
                    </tr>
                    <? if($article->modified_by) : ?>
                        <tr>
                            <td class="paramlist_key">
                                <label><?= @text('Modified by') ?></label>
                            </td>
                            <td>
                                <?= $article->modified_by_name ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="paramlist_key">
                                <label><?= @text('Modified on') ?></label>
                            </td>
                            <td>
                                <?= @helper('date.format', array('date' => $article->modified_on, 'format' => @text('DATE_FORMAT_LC2'))) ?>
                            </td>
                        </tr>
                    <? endif ?>
                </table>
            </div>
        <? endif ?>
    </div>
</form>
