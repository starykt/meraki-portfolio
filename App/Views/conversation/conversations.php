<style>
    .container-wrapper {
        background: rgba(217, 217, 217, 0.50);
        backdrop-filter: blur(5px);
        margin-left: 100px;
        margin-top: 0;
        padding-top: 40px;
        height: 100vh;
        overflow: hidden;
        text-decoration: none;
    }

    .conversation-container {
        width: 1207px;
        height: 100px;
        flex-shrink: 0;
        border-radius: 50px;
        background: #212121;
        box-shadow: 10px 10px 4px 0px rgba(0, 0, 0, 0.25);
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 10px;
        margin-bottom: 30px;
        margin-left: 40px;
    }

    .user-info {
        display: flex;
        align-items: center;
    }

    a {
        text-decoration: none;
    }

    .avatar {
        border-radius: 200px;
        box-shadow: 5px 5px 4px 0px rgba(0, 0, 0, 0.25);
        width: 80px;
        height: 80px;
        flex-shrink: 0;
        margin-right: 20px;
    }

    .text-info {
        color: #FFF;
        font-family: 'Inter', sans-serif;
        font-size: 32px;
        font-style: normal;
        font-weight: 700;
        line-height: normal;
    }

    .user-name {
        color: #FFF;
        text-decoration: none;
        font-family: 'Inter', sans-serif;
        font-size: 28px;
        font-style: normal;
        font-weight: 700;
        line-height: normal;
        margin-right: 30px;
    }

    .user-name {
        margin-bottom: 50px;
    }

    .no-message {
        color: #FFF;
        font-family: 'Inter', sans-serif;
        font-size: 16px;
        font-style: italic;
    }
</style>

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