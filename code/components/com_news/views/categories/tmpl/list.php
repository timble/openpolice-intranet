<ul class="filter">
    <li class="<?= $state->category == null ? 'active' : '' ?>">
        <a href="<?= @route('view=articles&category=') ?>"><?= @text('All categories') ?></a>
    </li>
    <? foreach($categories as $category) : ?>
        <li class="<?= $state->category == $category->id ? 'active' : '' ?>">
            <a href="<?= @route('view=articles&category='.$category->id) ?>"><?= $category->title ?></a>
        </li>
    <? endforeach ?>
</ul>