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

<h1>Projetos Mais Curtidos</h1>

<ul>
    <?php foreach ($viewVar['projects'] as $project): ?>
        <li>
            <br>
            <strong>Título: </strong><?php echo $project->getTitle(); ?>
            <br>
            <strong>Descrição: </strong><?php echo $project->getDescription(); ?>
            <br>
            <strong>Data de Criação: </strong><?php echo $project->getCreated_At()->format('Y-m-d H:i:s'); ?>
            <br>
            <strong>Número de Curtidas: </strong><?php echo $project->getLikesCount(); ?>
            <br>

            
        <?php if ($project->hasImages()) { ?>
            <?php foreach ($project->getImages() as $image) { ?>
                <img src="http://<?php echo APP_HOST; ?>/public/images/projects/<?= $image->getImage() ?>" width="200px" height="200px" alt="Imagem do projeto">
            <?php } ?>
        <?php } ?>

        <?php if ($project->hasFiles()) { ?>
            <div class="project-files">
                <?php foreach ($project->getFiles() as $file) { ?>
                    <a href="http://<?php echo APP_HOST; ?>/public/files/projects/<?= $file->getFile() ?>" download><?= $file->getFile() ?></a><br>
                <?php } ?>
            </div>
        <?php } ?>

        <?php if ($project->hasHashtags()) { ?>
            <div class="project-hashtags">
                <?php foreach ($project->getHashtags() as $hashtagProject) { ?>
                    <span>#<?= $hashtagProject->getHashtag()->getHashtag() ?></span>
                <?php } ?>
            </div>
        <?php } ?>

        <a href="http://<?= APP_HOST ?>/project/alter/<?= $project->getIdProject() ?>"> editar </a><br>
        <a href="http://<?= APP_HOST ?>/project/delete?idProject=<?= $project->getIdProject() ?>"> excluir </a></br>
        </li>
        <form method="POST" action="http://<?php echo APP_HOST; ?>/project/like/<?= $project->getIdProject(); ?>">
            <button id="likeButton" type="submit" name="likeButton" class="like-button" onclick="likeButtonClick(this);">
                <span class="heart" <?php if (isset($project) && $project->getLikeStatus()) { ?> style="color:#FF57B2;" <?php } else { ?> style="background-color:none;" <?php } ?>>
                    &#10084;
                </span>
                <span class="like-count"><?= $project->getLikeCount(); ?></span>
            </button>
            <br>
        </form>
    <?php endforeach; ?>
</ul>
