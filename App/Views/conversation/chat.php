<div id="chat-messages">
    <?php foreach ($viewVar['messages'] as $message) { ?>
        <div class="message">
            <img src="<?= $message->getSender()->getAvatar() ?>">
            <strong><?= $message->getSender()->getNickname() ?>:</strong> <?= $message->getMessage() ?>
        </div>
    <?php } ?>
</div>
