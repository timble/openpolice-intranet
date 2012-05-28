<div class="content__header">
	<h2>
	    <a href="<?= @route('view=category&id='.$category->id.'&slug='.$category->slug) ?>">
	        <?= @escape($category->title) ?>
	    </a>
	</h2>
</div>
<div class="category-content clearfix">
<? foreach($forums->find(array('fora_category_id' => $category->id)) as $forum) : ?>
    <h3>
        <a href="<?= @route('view=topics&forum='.$forum->id.'&slug='.$forum->slug) ?>">
            <?= @escape($forum->title) ?>
        </a>
    </h3>
    <ul>
        <? foreach($topics->find(array('fora_forum_id' => $forum->id)) as $topic) : ?>
            <li>
                <a href="<?= @route('view=topic&id='.$topic->id.'&slug='.$topic->slug) ?>">
                    <?= @escape($topic->title) ?>
                </a>
            </li>
        <? endforeach ?>
    </ul>
    <? if (($count = (int) $topics_count->find(array('fora_forum_id' => $forum->id))->top()->count) > 3) : ?>
        <a class="read-all" href="<?= @route('view=topics&forum='.$forum->id.'&slug='.$forum->slug) ?>">
            <?= sprintf(@text('Read all %d '.KInflector::pluralize($forum->type)), $count) ?> &rarr;
        </a>
    <? endif ?>
<? endforeach ?>
</div>