<?= @helper('behavior.mootools') ?>
<?= @helper('behavior.keepalive') ?>

<script src="media://lib_koowa/js/koowa.js" />
<script src="media://com_fora/js/subscribe.js" />

<script>
    window.addEvent('domready', (function() {
        new Fora.Subscribe({
            holder: 'fora-topics-default',
            url: '<?= html_entity_decode(@route('view=subscription&type=forum&row='.$forum->id.'&user_id='.JFactory::getUser()->id)) ?>',
            data: {
                action: '<?= $subscribed ? 'delete' : 'add' ?>',
                type: 'forum',
                row: '<?= $forum->id ?>',
                user_id: '<?= JFactory::getUser()->id ?>',
                _token: '<?= JUtility::getToken() ?>'
            }
        });
    }));
</script>

<button class="btn btn-small subscribe"><?= @text($subscribed ? 'Unsubscribe' : 'Subscribe') ?></button>