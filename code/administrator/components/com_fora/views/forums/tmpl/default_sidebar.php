<div id="sidebar">
    <h3><?= @text('Categories') ?></h3>
    <ul class="filter">
        <? foreach($categories as $category) : ?>
            <li class="<?= $state->category == $category->id ? 'active' : '' ?>">
                <a href="<?= @route('category='.$category->id) ?>"><?= $category->title ?></a>
            </li>
        <? endforeach ?>
    </ul>
</div>