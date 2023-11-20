<br>
<br><br><br><br><br><br><br><br><br><br><br><br>
<ul>
  <?php foreach ($viewVar['users'] as $user) { ?>
    <?php if($user->getIdUser() != $_SESSION["idUser"] && $user->getStatus() != "banned") { ?>
      <a href="http://<?= APP_HOST ?>/user/profileUsers/<?= $user->getIdUser() ?>">
        <img src="http://<?php echo APP_HOST; ?>/public/images/users/<?= $user->getAvatar() ?>" width="50px" height="50px">
        <strong><?= $user->getNickname() ?></strong> 
      </a>
      <form method="POST" action="http://<?php echo APP_HOST; ?>/admin/ban/<?= $user->getIdUser() ?>">
        <button type="submit">
          Banir
        </button>
        <br>
      </form><br>
    <?php } ?>
  <?php } ?>
</ul>
