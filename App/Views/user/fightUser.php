<div style="margin-left: 200px;">
<h1>Top 3 Usuários por Likes</h1>
<table border="1">
    <thead>
        <tr>
            <th>Posição</th>
            <th>Avatar</th>
            <th>Nome do Usuário</th>
            <th>Quantidade de Likes</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>1</td>
            <td><img src="http://<?= APP_HOST ?>/public/images/users/<?= $viewVar['topUsersByLikes'][0]->getAvatar() ?>" width="30px" height="30px"></td>
            <td><?= $viewVar['topUsersByLikes'][0]->getNickname() ?></td>
            <td><?= $viewVar['topUsersByLikes'][0]->getLikes() ?></td>
        </tr>
        <tr>
            <td>2</td>
            <td><img src="http://<?= APP_HOST ?>/public/images/users/<?= $viewVar['topUsersByLikes'][1]->getAvatar() ?>" width="30px" height="30px"></td>
            <td><?= $viewVar['topUsersByLikes'][1]->getNickname() ?></td>
            <td><?= $viewVar['topUsersByLikes'][1]->getLikes() ?></td>
        </tr>

        <tr>
            <td>3</td>
            <td><img src="http://<?= APP_HOST ?>/public/images/users/<?= $viewVar['topUsersByLikes'][2]->getAvatar() ?>" width="30px" height="30px"></td>
            <td><?= $viewVar['topUsersByLikes'][2]->getNickname() ?></td>
            <td><?= $viewVar['topUsersByLikes'][2]->getLikes() ?></td>
        </tr>

        <?php if ($viewVar['userPositionByLikes'] > 3) : ?>
            <tr>
                <td><?= $viewVar['userPositionByLikes'] ?></td>
                <td><img src="http://<?= APP_HOST ?>/public/images/users/<?= $viewVar['userLoggedin']->getAvatar() ?>" width="30px" height="30px"></td>
                <td><?= $viewVar['userLoggedin']->getNickname() ?></td>
                <td><?= $viewVar['loggedInUserLikes'] ?></td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>

<h1>Top 3 Usuários por Prêmios</h1>
<table border="1">
    <thead>
        <tr>
            <th>Posição</th>
            <th>Avatar</th>
            <th>Nome do Usuário</th>
            <th>Quantidade de Prêmios</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>1</td>
            <td><img src="http://<?= APP_HOST ?>/public/images/users/<?= $viewVar['topUsersByAwards'][0]->getAvatar() ?>" width="30px" height="30px"></td>
            <td><?= $viewVar['topUsersByAwards'][0]->getNickname() ?></td>
            <td><?= $viewVar['topUsersByAwards'][0]->getAwards() ?></td>
        </tr>
        <tr>
            <td>2</td>
            <td><img src="http://<?= APP_HOST ?>/public/images/users/<?= $viewVar['topUsersByAwards'][1]->getAvatar() ?>" width="30px" height="30px"></td>
            <td><?= $viewVar['topUsersByAwards'][1]->getNickname() ?></td>
            <td><?= $viewVar['topUsersByAwards'][1]->getAwards() ?></td>
        </tr>
        <tr>
            <td>3</td>
            <td><img src="http://<?= APP_HOST ?>/public/images/users/<?= $viewVar['topUsersByAwards'][2]->getAvatar() ?>" width="30px" height="30px"></td>
            <td><?= $viewVar['topUsersByAwards'][2]->getNickname() ?></td>
            <td><?= $viewVar['topUsersByAwards'][2]->getAwards() ?></td>
        </tr>
        <?php if ($viewVar['userPositionByAwards'] > 3) : ?>
            <tr>
                <td><?= $viewVar['userPositionByAwards'] ?></td>
                <td><img src="http://<?= APP_HOST ?>/public/images/users/<?= $viewVar['userLoggedin']->getAvatar() ?>" width="30px" height="30px"></td>
                <td><?= $viewVar['userLoggedin']->getNickname() ?></td>
                <td><?= $viewVar['loggedInUserAwards'] ?></td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>


<h1>Top 3 Usuários por Nível</h1>
<table border="1">
    <thead>
        <tr>
            <th>Posição</th>
            <th>Avatar</th>
            <th>Nome do Usuário</th>
            <th>Nível</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>1</td>
            <td><img src="http://<?= APP_HOST ?>/public/images/users/<?= $viewVar['topUsersByLevel'][0]->getAvatar() ?>" width="30px" height="30px"></td>
            <td><?= $viewVar['topUsersByLevel'][0]->getNickname() ?></td>
            <td><?= $viewVar['topUsersByLevel'][0]->getLevel() ?></td>
        </tr>

        <tr>
            <td>2</td>
            <td><img src="http://<?= APP_HOST ?>/public/images/users/<?= $viewVar['topUsersByLevel'][1]->getAvatar() ?>" width="30px" height="30px"></td>
            <td><?= $viewVar['topUsersByLevel'][1]->getNickname() ?></td>
            <td><?= $viewVar['topUsersByLevel'][1]->getLevel() ?></td>
        </tr>

        <tr>
            <td>3</td>
            <td><img src="http://<?= APP_HOST ?>/public/images/users/<?= $viewVar['topUsersByLevel'][2]->getAvatar() ?>" width="30px" height="30px"></td>
            <td><?= $viewVar['topUsersByLevel'][2]->getNickname() ?></td>
            <td><?= $viewVar['topUsersByLevel'][2]->getLevel() ?></td>
        </tr>
        <?php if ($viewVar['userPositionByLevel'] > 3) : ?>
            <tr>
                <td><?= $viewVar['userPositionByLevel'] ?></td>
                <td><img src="http://<?= APP_HOST ?>/public/images/users/<?= $viewVar['userLoggedin']->getAvatar() ?>" width="30px" height="30px"></td>
                <td><?= $viewVar['userLoggedin']->getNickname() ?></td>
                <td><?= $viewVar['loggedInUserLevel'] ?></td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>
</div>