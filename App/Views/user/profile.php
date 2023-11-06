<?php if ($Sessao::retornaErro()) { ?>
  <div class="alert alert-warning" role="alert">
    <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <?php foreach ($Sessao::retornaErro() as $key => $mensagem) {
      echo "<b>" . $mensagem . "</b><br>";
    } ?>
  </div>
<?php } ?>

<img id="avatarImage" style="margin-top: 300px;" src="http://<?php echo APP_HOST; ?>/public/images/users/<?= $viewVar['user']->getAvatar() ?>" width="200px" height="200px"><br>


Nickname: <?= $viewVar['user']->getNickname() ?>#<?= $viewVar['user']->getTag() ?> <br>
Email: <?= $viewVar['user']->getEmail() ?><br>
Level: <?= $viewVar['user']->getLevel() ?><br>
XP: <?= $viewVar['user']->getXp() ?><br>
Resumo: <?= $viewVar['user']->getResume() ?><br>
Local: <?= $viewVar['user']->getLocation() ?><br>
Admin? <?php if ($viewVar['user']->getAdmin() == true) { ?>
  Sim, adm
<?php } else { ?>
  não, pobre
<?php } ?> <br>
Perfil criado em: <?= $viewVar['user']->getCreatedAt()->format('Y-m-d H:i:s') ?><br>
<br>
<form action="http://<?php echo APP_HOST; ?>/user/delete/<?= $viewVar['user']->getIdUser() ?>" method="post" id="form_cadastro">
  <button type="submit" class="buttonSubmit">Excluir conta</button>
  </div>
</form>

<form action="http://<?php echo APP_HOST; ?>/user/profileEdit/<?= $viewVar['user']->getIdUser() ?>" method="post" id="form_cadastro">
  <button type="submit" class="buttonSubmit">Editar conta</button>
  </div>
</form>