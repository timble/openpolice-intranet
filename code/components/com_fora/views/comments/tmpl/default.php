<?= @helper('behavior.mootools') ?>

<? if($topic->total_comments) : ?>
<?= @service('com://site/fora.controller.comment', array('request' => array('type' => $topic->type)))
    ->view('comments')
    ->layout('default_comments')
    ->table('fora_topics')
    ->row($topic->id)
    ->display();
?>

<? endif ?>
