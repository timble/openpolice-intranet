<ul class="filter">
    <? foreach($categories as $category) : ?>
        <li class="<?= $state->category == $category->id ? 'active' : '' ?>">
            <a href="<?= @route('view=articles&category='.$category->id) ?>"><?= $category->title ?></a>
        </li>
    <? endforeach ?>
</ul>