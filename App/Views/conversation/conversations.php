<link rel="stylesheet" href="\public\css\conversation-list.css" />
<body>
    <div class="container-wrapper">
        <?php if (empty($viewVar['conversations'])) : ?>
            <p>Nenhuma conversa disponível.</p>
        <?php else : ?>
            <?php foreach ($viewVar['conversations'] as $conversation) : ?>
                <a href="http://<?php echo APP_HOST; ?>/conversation/index/<?= $conversation['user']->getIdUser() ?>" class="conversation-container">
                    <div class="user-info">
                        <img class="avatar" src="http://<?php echo APP_HOST; ?>/public/images/users/<?= $conversation['user']->getAvatar() ?>" alt="Avatar">
                        <div class="text-info">
                            <?php if (isset($conversation['lastMessage']) && $conversation['lastMessage']) : ?>
                                <?= $conversation['lastMessage'] ?><br>
                            <?php else : ?>
                                <p class="no-message">Nenhuma mensagem disponível.</p>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="user-name">
                        <?= $conversation['user']->getNickname() ?> #<?= $conversation['user']->getTag() ?>
                    </div>
                </a>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</body>