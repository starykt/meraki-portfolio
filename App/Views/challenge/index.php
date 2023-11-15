<h1>Lista de Desafios</h1>

<?php foreach ($viewVar['challenges'] as $challenge) : ?>
    <div>
        <h3>Publicado por:</h3>
        <?php
        $user = $viewVar['usersList'][$challenge->getIdChallenge()];
        if ($user) { ?>
            <img src="http://<?php echo APP_HOST; ?>/public/images/users/<?= $user->getAvatar() ?>" width="50px" height="50px">
            <p>Usuário: <?= $user->getNickname() ?></p>
        <?php } else { ?>
            <p>Usuário não encontrado</p>
        <?php }
        ?>
        <h2><?= $challenge->getName() ?></h2>
        <p>Meta: <?= $challenge->getGoal() ?></p>
        <p>Recompensa: <?= $challenge->getReward() ?></p>
        <img src="http://<?php echo APP_HOST; ?>/public/images/challenges/<?= $challenge->getBanner() ?>" width="200px" height="200px">
        <h3>Hashtags Associadas:</h3>
        <ul>
            <?php $hashtag = $viewVar['hashtagsList'][$challenge->getIdChallenge()]; ?>
            <?php if ($hashtag) : ?>
                <li><?= $hashtag->getHashtag() ?></li>
            <?php else : ?>
                <li>Nenhuma hashtag associada</li>
            <?php endif; ?>
        </ul>

        <h3>Prêmios:</h3>
        <ul>
            <?php $awards = $viewVar['awardsList'][$challenge->getIdChallenge()]; ?>
            <?php if (!empty($awards)) : ?>
                <?php foreach ($awards as $award) : ?>
                    <li><?= $award->getDescription() ?></li>
                    <img src="http://<?php echo APP_HOST; ?>/public/images/awards/<?= $award->getImagePath() ?>" width="200px" height="200px">
                <?php endforeach; ?>
            <?php else : ?>
                <li>Nenhum prêmio associado</li>
            <?php endif; ?>
        </ul>
    </div>
    <?php  if($viewVar['user']->getAdmin() == true){?>
        
    <a href="http://<?= APP_HOST ?>/challenge/alter/<?= $challenge->getIdChallenge() ?>"> editar </a><br>
        <a href="http://<?= APP_HOST ?>/project/<?= $challenge->getIdChallenge()?>"> excluir </a></br>
    <hr>
<?php } endforeach; ?>