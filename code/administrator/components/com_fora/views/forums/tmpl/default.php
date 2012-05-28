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
                    <?= @helper('grid.sort', array('title' => 'Type', 'column' => 'type')) ?>
                </th>
                <th width="10%">
                    <?= @helper('grid.sort', array('title' => 'Published', 'column' => 'published')) ?>
                </th>
                <th width="10%">
                    <?= @helper('grid.sort', array('title' => 'Ordering', 'column' => 'ordering')) ?>
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
                    <?= @helper('grid.checkall') ?>
                </td>
                <td>
                    <?= @helper('grid.search') ?>
                </td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <td colspan="7">
                    <?= @helper('paginator.pagination', array('total' => $total)) ?>
                </td>
            </tr>
        </tfoot>
        <tbody>
        <? foreach($forums as $forum) : ?>
            <tr>
                <td align="center">
                    <?= @helper('grid.checkbox' , array('row' => $forum)) ?>
                </td>
                <td>
                    <a href="<?= @route('view=forum&id='.$forum->id) ?>">
                        <?= @escape($forum->title) ?>
                    </a>
                </td>
                <td>
                    <?= @text(ucfirst($forum->type)) ?>
                </td>
                <td align="center" width="15px">
                    <?= @helper('grid.enable', array('row' => $forum)) ?>
                </td>
                <td align="center">
                    <?= @helper('grid.order', array('row' => $forum, 'total' => $total)) ?>
                </td>
                <td>
                    <?= @escape($forum->created_by_name) ?>
                </td>
                <td>
                    <?= @helper('date.humanize', array('date' => $forum->created_on)) ?>
                </td>
            </tr>
        <? endforeach ?>
        </tbody>
    </table>
</form>