<div class="btn-group">
    <a class="btn<?= $state->category == null ? ' active' : '' ?>" href="<?= @route('view=articles&category=') ?>"><?= @text('All') ?></a>
    <? foreach($categories as $category) : ?>
        <a class="btn<?= $state->category == $category->id ? ' active' : '' ?>" href="<?= @route('view=articles&category='.$category->id) ?>"><?= $category->title ?></a>
    <? endforeach ?>
</div>