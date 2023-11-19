<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

<body>
    <h1>Conversas</h1>

    <?php if (empty($viewVar['conversations'])) : ?>
        <p>Nenhuma conversa disponível.</p>
    <?php else : ?>
        <table border="1">
            <thead>
                <tr>
                    <th>Usuário</th>
                    <th>Avatar</th>
                    <th>Última Mensagem</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($viewVar['conversations'] as $conversation) : ?>
                        <td><a href="http://<?php echo APP_HOST; ?>/conversation/index/<?= $conversation['user']->getIdUser() ?>"><?= $conversation['user']->getNickname() ?></a></td>
                        <td><img src="http://<?php echo APP_HOST; ?>/public/images/users/<?= $conversation['user']->getAvatar() ?>" alt="Avatar" width="50px" height="50px"></td>
                        <td>
                            <?php if (isset($conversation['lastMessage']) && $conversation['lastMessage']) : ?>
                                <strong>Mensagem:</strong> <?= $conversation['lastMessage'] ?><br>
                                <strong>Enviado em:</strong> <?= date('d/m/Y H:i:s', strtotime($conversation['lastSentAt'])) ?>
                            <?php else : ?>
                                <p>Nenhuma mensagem disponível.</p>
                            <?php endif; ?>
                        </td>
                    </tr>
                    </a>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</body>
