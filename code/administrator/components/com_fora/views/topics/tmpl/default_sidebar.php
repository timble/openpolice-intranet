<div id="sidebar">
    <? foreach($categories as $category) : ?>
        <h3><?= @escape($category->title) ?></h3>
        <ul class="filter">
            <? foreach($forums->find(array('fora_category_id' => $category->id)) as $forum) : ?>
                <li class="<?= $state->forum == $forum->id ? 'active' : '' ?>">
                    <a href="<?= @route('forum='.$forum->id ) ?>">
                        <?= $forum->title ?>
                    </a>
                </li>
            <? endforeach ?>
        </ul>
    <? endforeach ?>
</div>
