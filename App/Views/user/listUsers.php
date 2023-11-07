
<ul>
  <?php foreach ($viewVar['users'] as $user) { ?>
    <a href="http://<?= APP_HOST ?>/user/profileUsers/<?= $user->getIdUser() ?>">
    <img src="http://<?php echo APP_HOST; ?>/public/images/users/<?= $user->getAvatar() ?>" width="50px" height="50px">
    <strong><?= $user->getNickname() ?></strong> <br>
  </a>
  <?php } ?>
  </div>
