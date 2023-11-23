
<?php if ($Sessao::retornaMensagem()) { ?>
    <div class="alert alert-warning" role="alert">
        <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <?= $Sessao::retornaMensagem() ?>
        <br>
    </div>
<?php } ?>

<b> Meus salvos</b>

<?php foreach ($viewVar['savedProjects'] as $savedProject) { ?>
    <br>
    <img src="http://<?php echo APP_HOST; ?>/public/images/users/<?= $savedProject->getUser()->getAvatar(); ?>" width="50px" height="50px" alt="Foto de Perfil">
    <?= $savedProject->getUser()->getNickname() ?> #<?= $savedProject->getUser()->getTag() ?> <br>
    <div class="card-project">
        <strong><?= $savedProject->getTitle() ?></strong> <br>
        <strong><?= $savedProject->getDescription() ?></strong> <br>
        <strong><?= $savedProject->getCreated_At()->format('d/m/Y H:i:s') ?></strong> <br>

        <?php if ($savedProject->hasImages()) { ?>
            <?php foreach ($savedProject->getImages() as $image) { ?>
                <img src="http://<?php echo APP_HOST; ?>/public/images/projects/<?= $image->getImage() ?>" width="200px" height="200px" alt="Imagem do projeto">
            <?php } ?>
        <?php } ?>

        <?php if ($savedProject->hasFiles()) { ?>
            <div class="project-files">
                <?php foreach ($savedProject->getFiles() as $file) { ?>
                    <a href="http://<?php echo APP_HOST; ?>/public/files/projects/<?= $file->getFile() ?>" download><?= $file->getFile() ?></a><br>
                <?php } ?>
            </div>
        <?php } ?>

        <?php if ($savedProject->hasHashtags()) { ?>
            <div class="project-hashtags">
                <?php foreach ($savedProject->getHashtags() as $hashtagProject) { ?>
                    <span>#<?= $hashtagProject->getHashtag()->getHashtag() ?></span>
                <?php } ?>
            </div>
        <?php } if($savedProject->getUser()->getIdUser() == $_SESSION["idUser"] ){ ?>

        <a href="http://<?= APP_HOST ?>/project/alter/<?= $savedProject->getIdProject() ?>"> editar </a><br>
        <a href="http://<?= APP_HOST ?>/project/delete?idProject=<?= $savedProject->getIdProject() ?>"> excluir </a></br>
        <a href="http://<?= APP_HOST ?>/project/report/<?= $savedProject->getIdProject() ?>"> report </a>

        <?php } ?>
        <form method="POST" action="http://<?php echo APP_HOST; ?>/project/like/<?= $savedProject->getIdProject(); ?>">
            <button id="likeButton" type="submit" name="likeButton" class="like-button" onclick="likeButtonClick(this);">
                <span class="heart" <?php if (isset($savedProject) && $savedProject->getLikeStatus()) { ?> style="color:#FF57B2;" <?php } else { ?> style="background-color:none;" <?php } ?>>
                    &#10084;
                </span>
                <span class="like-count"><?= $savedProject->getLikeCount(); ?></span>
            </button>
            <br>
        </form>

        <form method="POST" action="http://<?php echo APP_HOST; ?>/project/saveProjectFavorite/<?= $savedProject->getIdProject(); ?>">
            <button id="likeButton" type="submit" name="likeButton" class="like-button" onclick="likeButtonClick(this);">
                <span class="heart" <?php if (isset($savedProject) && $savedProject->getSaveStatus()) { ?> style="color:red;" <?php } else { ?> style="background-color:none;" <?php } ?>>
                &#128190; 
                </span>
            </button>
            <br>
        </form>

        <form class="newCommentsForm" action="http://<?php echo APP_HOST; ?>/project/comment/<?= $savedProject->getIdProject() ?>" method="post" id="form_cadastro">
            <textarea cols="70" rows="5" name="text" id="text" value="<?php echo $Sessao::retornaValorFormulario('text'); ?>" required></textarea>
            <div class="newCommentsFormFooter">
                <button type="submit" class="buttonSubmit">Comentar</button>
            </div>
        </form>
    </div>
    <?php foreach ($savedProject->getComments() as $comment) {
        $user = $comment->getUser(); ?>
    <div class="comment">
        Comentado por:  <img src="http://<?php echo APP_HOST; ?>/public/images/users/<?= $user->getAvatar(); ?>" width="50px" height="50px" alt="Foto de Perfil">
      <?= $comment->getUser()->getNickname() ?> #<?= $user->getTag() ?> <br>
      <strong><?= $comment->getText() ?></strong> <br>
      <?= $comment->getDateCreate()->format('d-m-Y H:i:s') ?> <br>
      <form action="http://<?php echo APP_HOST; ?>/project/deleteComment/<?= $comment->getIdComment() ?>/<?= $project->getIdProject(); ?>" method="post" id="form_cadastro">
                <button type="submit" class="buttonSubmit">Excluir</button>
        </div>
        </form>
<?php } ?>

    </form>
    </div>
    <br>
<?php } ?>