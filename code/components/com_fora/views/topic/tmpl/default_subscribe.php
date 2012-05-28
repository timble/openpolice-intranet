<?= @helper('behavior.mootools') ?>
<script src="media://lib_koowa/js/koowa.js" />
<script src="media://com_fora/js/subscribe.js" />

<script>
    window.addEvent('domready', (function() {
        new Fora.Subscribe({
            holder: 'fora-topic-default',
            url: '<?= html_entity_decode(@route('view=subscription&type=topic&row='.$topic->id.'&user_id='.JFactory::getUser()->id)) ?>',
            data: {
                action: '<?= $subscribed ? 'delete' : 'add' ?>',
                type: 'topic',
                row: '<?= $topic->id ?>',
                user_id: '<?= JFactory::getUser()->id ?>',
                _token: '<?= JUtility::getToken() ?>'
            }
        });
    }));
</script>

<button class="btn btn-small subscribe"><?= @text($subscribed ? 'Unsubscribe' : 'Subscribe') ?></button>