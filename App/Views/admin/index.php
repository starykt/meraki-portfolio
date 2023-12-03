<link href="http://<?php echo APP_HOST; ?>/public/css/admin-style.css" rel="stylesheet">
<div class="overlay-container">
  <div class="users-container">
    <p class="users-text">USERS</p>
    <img src="\public\images\icons\whiteProfile.png" class="users-icon" alt="Users Icon" width="55px" height="56px">
  </div>
  <hr style="color: #fff;">
  <div class="info-container">
    <div class="icon-container">
      <img src="\public\images\icons\admin.png" class="icon" alt="Ícone 1" width="35px" height="35px">
      <p class="legend">Admin</p>
    </div>
    <div class="icon-container">
      <img src="\public\images\icons\darkProfile.png" class="icon" alt="Ícone 2" width="35px" height="35px">
      <p class="legend">User</p>
    </div>
  </div>
</div>

<?php foreach ($viewVar['users'] as $user) { ?>
  <?php if ($user->getIdUser() != $_SESSION["idUser"] && $user->getStatus() != "banned") { ?>
    <div class="user-container">
      <a href="http://<?= APP_HOST ?>/user/profileUsers/<?= $user->getIdUser() ?>" class="user-link">
        <img src="http://<?php echo APP_HOST; ?>/public/images/users/<?= $user->getAvatar() ?>" class="user-avatar" alt="User Avatar">
        <strong class="user-info"><?= $user->getNickname() ?> #<?= $user->getTag() ?></strong>
      </a>
      <form method="POST" action="http://<?php echo APP_HOST; ?>/admin/ban/<?= $user->getIdUser() ?>" class="ban-form">
        <button type="submit" class="ban-button">
          BAN USER <?php if ($user->getAdmin() == true) { ?> <img src="\public\images\icons\admin.png" width="38px" height="38px" style="margin-left: 20px;"> <?php } else { ?>
            <img src="\public\images\icons\darkProfile.png" style="margin-left: 20px;" width="35px" height="35px">
          <?php } ?>
        </button>
      </form>
    </div>
    <br>
  <?php } ?>
<?php } ?>
