<!-- <style src="media://lib_koowa/css/koowa.css" /> -->

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
            </tr>
        </thead>
        <tfoot>
            <tr>
                <td colspan="6">
                    <?= @helper('paginator.pagination', array('total' => $total)) ?>
                </td>
            </tr>
        </tfoot>
        <tbody>
        <? foreach($categories as $category) : ?>
            <tr>
                <td align="center">
                    <?= @helper('grid.checkbox' , array('row' => $category)) ?>
                </td>
                <td>
                    <a href="<?= @route('view=category&id='.$category->id) ?>">
                        <?= @escape($category->title) ?>
                    </a>
                </td>
                <td align="center" width="15px">
                    <?= @helper('grid.enable', array('row' => $category)) ?>
                </td>
                <td align="center">
                    <?= @helper('grid.order', array('row' => $category, 'total' => $total)) ?>
                </td>
                <td>
                    <?= @escape($category->created_by_name) ?>
                </td>
                <td>
                    <?= @helper('date.humanize', array('date' => $category->created_on)) ?>
                </td>
            </tr>
        <? endforeach ?>
        </tbody>
    </table>
</form>
