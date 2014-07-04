<!-- <style src="media://lib_koowa/css/koowa.css" /> -->

<?= @template('default_sidebar') ?>

<form action="" method="get" class="-koowa-grid">
    <table class="adminlist">
        <thead>
            <tr>
                <th width="10"></th>
                <th>
                    <?= @helper('grid.sort', array('title' => 'Title', 'column' => 'title')) ?>
                </th>
                <th width="10%">
                    <?= @helper('grid.sort', array('title' => 'Published', 'column' => 'published')) ?>
                </th>
                <th width="10%">
                    <?= @helper('grid.sort', array('title' => 'Created by', 'column' => 'created_by')) ?>
                </th>
                <th width="10%">
                    <?= @helper('grid.sort', array('title' => 'Created on', 'column' => 'created_on')) ?>
                </th>
            </tr>
            <tr>
                <td align="center">
                    <?= @helper( 'grid.checkall'); ?>
                </td>
                <td>
                    <?= @helper( 'grid.search'); ?>
                </td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <td colspan="5">
                    <?= @helper('paginator.pagination', array('total' => $total)) ?>
                </td>
            </tr>
        </tfoot>
        <tbody>
        <? foreach($articles as $article) : ?>
            <tr>
                <td align="center">
                    <?= @helper('grid.checkbox' , array('row' => $article)) ?>
                </td>
                <td>
                    <a href="<?= @route('view=article&id='.$article->id) ?>">
                        <?= @escape($article->title) ?>
                    </a>
                </td>
                <td align="center" width="15px">
                    <?= @helper('grid.enable', array('row' => $article)) ?>
                </td>
                <td>
                    <?= @escape($article->created_by_name) ?>
                </td>
                <td>
                    <?= $article->created_on == '0000-00-00 00:00:00' ? '' : @helper('date.humanize', array('date' => $article->created_on)) ?>
                </td>
            </tr>
        <? endforeach ?>
        </tbody>
    </table>
</form>