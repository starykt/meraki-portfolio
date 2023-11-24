<link href="http://<?php echo APP_HOST; ?>/public/css/feed-page.css" rel="stylesheet">
<body>
  <section>
    <div class="card-new-post">
      <div class="avatar">
        <img class="user-icon"src="http://<?php echo APP_HOST; ?>/public/images/users/<?= $viewVar['user']->getAvatar() ?>" />
      </div>

      <p class="text-card">Its me... Mario?</p>
      <p class="new-post-notification">NEW POST</p>
    </div>

    <article>
      <div class="wrapper-chat">
        <?php foreach ($viewVar['listProject'] as $project) { ?>
          <div class="message">
            <div class="ideia-circles">
              <div class="circles-1"></div>
              <div class="circles-2"></div>
            </div>
            <a href="http://<?= APP_HOST ?>/user/profileUsers/<?= $project->getUser()->getIdUser() ?>">
              <div class="user-avatar">
                <img src="http://<?php echo APP_HOST; ?>/public/images/users/<?= $project->getUser()->getAvatar() ?>"></img>
              </div>
            </a>
            <div class="text-bubble">
              <header>
                <p class="nametag">
                  <?= $project->getUser()->getNickname() ?>
                  #
                  <?= $project->getUser()->getTag() ?></p>
              </header>
              <p class="title">
                <?= $project->getTitle() ?>
              </p>
              <p class="description-post">
                <?= $project->getDescription() ?>
              </p>
              <div class="files">
                <?php if ($project->hasFiles()) { ?>
                  <div class="project-files">
                    <?php foreach ($project->getFiles() as $file) { ?>
                      <a href="http://<?php echo APP_HOST; ?>/public/files/projects/<?= $file->getFile() ?>" download>Download a file here (Carefull, this link hasn't been checked)</a><br>
                    <?php } ?>
                  </div>
                  <br>
                <?php } ?>
              </div>

              <div class="images">
                <?php if ($project->hasImages()) { ?>
                  <?php foreach ($project->getImages() as $image) { ?>
                    <img class="one-image" src="http://<?php echo APP_HOST; ?>/public/images/projects/<?= $image->getImage() ?>" width="200px" height="200px" alt="Imagem do projeto">
                  <?php } ?>
                <?php } ?>
              </div>

              <div class="buttons">
              <a href="http://<?php echo APP_HOST; ?>/project/like/<?= $project->getIdProject(); ?>">
                <button class="button like">
                  <img
                    src="<?php echo $project->getLikeStatus() ? '/public/images/icons/blueLikeIcon.png' : '/public/images/icons/whiteLikeIcon.png'; ?>"
                    style="height: 30px; width: 30px"
                    />
                    <span class="count"><?= $project->getLikeCount(); ?></span>
                  </button>
              </a>
                <button
                  class="button blue message-button"
                >
                  <img
                    src="/public/images/icons/whiteCommentIcon.png"
                    style="height: 40px; width: 40px"
                  />
                  <span class="count"><?= $project->getCommentCount(); ?></span>
                </button>
                <a href="http://<?php echo APP_HOST; ?>/project/saveProjectFavorite/<?= $project->getIdProject(); ?>">
                  <button
                    class="button blue favorite"
                  >
                    <img
                      src="<?php echo $project->getSaveStatus() ? '/public/images/icons/blueSaveIcon.png' : '/public/images/icons/whiteSaveIcon.png'; ?>"
                      style="<?php echo $project->getSaveStatus() ? 'height: 30px; width: 30px;' : 'height: 35px; width: 35px;' ?>"
                    />
                    <span class="count"><?= $project->getSaveCount(); ?></span>
                  </button>
                </a>
                  <img
                    src="/public/images/icons/warningIcon.png"
                    style=" height: 50px; width: 50px;"
                    class="warning-button"
                  />
              </div>
              <div class="hashtags">
                <?php if ($project->hasHashtags()) { ?>
                    <?php foreach ($project->getHashtags() as $hashtagProject) { ?>
                      <span style="margin: 10px 30px 0 0;">#<?= $hashtagProject->getHashtag()->getHashtag() ?></span>
                    <?php } ?>
                <?php } ?>
              </div>

            </div>
          </div>
        <?php } ?>
      </div>
    </article>
  </section>
</body>