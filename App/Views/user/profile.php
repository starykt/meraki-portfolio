Nickname: <?= $viewVar['user']->getNickname() ?>#<?= $viewVar['user']->getTag() ?> <br>
Email: <?= $viewVar['user']->getEmail() ?><br>
Level: <?= $viewVar['user']->getLevel() ?><br>
XP: <?= $viewVar['user']->getXp() ?><br>
Admin? <?php if ($viewVar['user']->getAdmin() == true) { ?>
  Sim, adm
<?php } else { ?>
  não, pobre
<?php } ?> <br>
Perfil criado em: <?= $viewVar['user']->getCreatedAt()->format('Y-m-d H:i:s') ?><br>
<br>