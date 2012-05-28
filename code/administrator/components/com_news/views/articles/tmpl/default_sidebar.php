<div id="sidebar">
	<h3><?= @text('Categories') ?></h3>
    <? foreach($categories as $category) : ?>
        <ul class="filter">
            <li class="<?= $state->category == $category->id ? 'active' : '' ?>">
                <a href="<?= @route('category='.$category->id ) ?>">
                    <?= $category->title ?>
                </a>
            </li>
        </ul>
    <? endforeach ?>
</div>
