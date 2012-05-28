<?= @helper('behavior.mootools') ?>
<?= @helper('behavior.keepalive') ?>
<?= @helper('behavior.modal') ?>

<!-- Used to add tabs to window head for use in modal window ("Move") -->
<script src="media://lib_koowa/js/tabs.js" />

<div id="fora-topic-default">
		<div class="frame">	
			<div class="frame__header group">
				<h1 style="float: left;"><?= @escape($topic->title) ?></h1>
			    <div style="float: right;">
			   	    <div class="btn-group">
			   	    <? if ($topic->created_by == $user->id || $agent) : ?>
			        <a class="btn btn-danger btn-small" href="<?= @route('layout=form&id='.$topic->id) ?>"><?= @text('Edit') ?></a>
			        <? endif ?>
			        <? if($agent) : ?>
			        <a class="btn btn-small modal" href="<?=  @route('view=categories&topic='.$topic->id.'&layout=select&tmpl=component') ?>" rel="{size: {x:600, y:450}}"><?= @text('Move') ?></a>
			        <? endif ?>
			        <? if ($topic->commentable) : ?>
			        <?= @template('default_subscribe') ?>
			        <? endif ?>
			        </div>
			    </div>
			</div>
			<div class="content spacing">
				<div class="separator gray">
					<?= @helper('com://admin/comments.template.helper.grid.gravatar', array('email' => $topic->created_by_email)) ?>
					<?= @escape($topic->created_by_name) ?><br />
					<?= @text('Posted this on') ?> <?= @helper('date.format', array('date' => $topic->created_on, 'format' => @text('DATE_FORMAT_LC2'))) ?>
					<? if($topic->status) : ?>
					<div style="float:right;"><span class="label"> <?= $topic->status ?></span></div>
					<? endif; ?>
				</div>
				<div class="separator">
					<?= $topic->text ?>
				</div>
				<?= @template('com://site/fora.view.attachments.default') ?>
				<div class="gray" style="height: 28px;">
				    <?= @template('default_vote'); ?>
				</div>
			</div>
		</div>
		<div class="frame">
			<div class="frame__header">
			    <h2><?= @text('Comments') ?></h2>
			</div>
			<? if($topic->total_comments) : ?>
			<div class="content spacing">
				<?= @service('com://site/fora.controller.comment', array('request' => array('type' => $topic->type)))
				    ->view('comments')
				    ->table('fora_topics')
				    ->row($topic->id)
				    ->display();
				?>
			</div>
			<? endif ?>
			<div class="content comments">
				<? if($topic->commentable) : ?>
				<?= @service('com://site/fora.controller.comment')
				    ->view('comment')
				    ->layout('form')
				    ->table('fora_topics')
				    ->row($topic->id)
				    ->display();
				?>
				<? else : ?>
				<p class="spacing"><?= @text('Topic is closed for comments') ?></p>
				<? endif; ?>
			</div>
		</div>
</div>

<? if($agent) : ?>
    <module title="You are a moderator" position="right3"><?= @template('default_sidebar'); ?></module>
<? endif ?>