<a href="http://<?= APP_HOST ?>/project/register">
    <button class="not-a-player-button">Cadastrar projeto</button>
</a>

<?php if ($Sessao::retornaMensagem()) { ?>
    <div class="alert alert-warning" role="alert">
        <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <?= $Sessao::retornaMensagem() ?>
        <br>
    </div>
<?php } ?>

<?php foreach ($viewVar['listProject'] as $project) { ?>
    <br>
    <div class="card-project">
        <strong><?= $project->getTitle() ?></strong> <br>
        <strong><?= $project->getDescription() ?></strong> <br>
        <strong><?= $project->getCreated_At()->format('Y-m-d H:i:s') ?></strong> <br>

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
        <a href="http://<?= APP_HOST ?>/project/report/<?= $project->getIdProject() ?>"> report </a>
        <form method="POST" action="http://<?php echo APP_HOST; ?>/project/like/<?= $project->getIdProject(); ?>">
            <button id="likeButton" type="submit" name="likeButton" class="like-button" onclick="likeButtonClick(this);">
                <span class="heart" <?php if (isset($viewVar['likeStatus']) && $viewVar['likeStatus']) { ?>style="color:#FF57B2;" <?php } else { ?>style="background-color:none;" <?php } ?>>&#10084;</span>
                <span class="like-count"><?= $project->getLikeCount(); ?></span>
            </button>


        </form>
    </div>
    <br>
<?php } ?>