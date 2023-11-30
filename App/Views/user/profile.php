<link href="http://<?php echo APP_HOST; ?>/public/css/my-profile.css" rel="stylesheet">

<body>
  <div class="container">
    <aside>
    </aside>

    <section>
      <div class="align-container">
        <div class="profile-container">
          <div class="wrapper-profile">
            <div class="first-line">
              <p class="nickname"><?= $viewVar['user']->getNickname() ?>#<?= $viewVar['user']->getTag() ?></p>
              <img src="/public/images/icons/quotationMark.png" style="height: 32px; width: 32px" alt="quotation" />
            </div>
            <div class="profile-message">
              <button class="button like" style="background-color: #2a8194; cursor: default;" type="button">
                <img src="/public/images/icons/chatIcon.png" style="height: 30px; width: 30px" alt="likes" />
              </button>
              <img src="http://<?php echo APP_HOST; ?>/public/images/users/<?= $viewVar['user']->getAvatar() ?>""
                  alt=" profileAvatar" class="avatar-profile" />
              <footer>
                <span><?= $viewVar['user']->getLocation() ?>.</span>
                <span>since <?= $viewVar['user']->getCreatedAt()->format('Y') ?></span>
              </footer>
            </div>

            <?php foreach ($viewVar['userAwards'] as $award) : ?>

              <div class="award">
                <span><?= $award->getDescription(); ?></span>
                <img src="http://<?php echo APP_HOST; ?>/public/images/awards/<?= $award->getImagePath() ?>" style="height: 45px; width: 45px;  border-radius: 10px;" alt="" />
              </div>
            <?php endforeach; ?>
          </div>

          <div class="wrapper-info">
            <p>
              <?= $viewVar['user']->getResume() ?>
            </p>

            <strong>Academic background and featured courses.</strong>
            <?php foreach ($viewVar['educations'] as $education) : ?>
              <span><?= $education->getFormation() ?>.</span>
            <?php endforeach; ?>

            <div class="certificado">
              <?php foreach ($viewVar['userTools'] as $tool) : ?>
                <img src="http://<?php echo APP_HOST; ?>/public/images/tools/<?= $tool->getIcon() ?>" alt="<?= $tool->getCaption() ?>" />
              <?php endforeach; ?>
            </div>
          </div>

          <div class="buttons">
            <button class="button like" style="background-color: #2a8194; cursor: default;" type="button">
              <img src="/public/images/icons/whiteLikeIcon.png" style="height: 30px; width: 30px" alt="likes" />
              <span class="count">100</span>
            </button>
            <button class="button blue message-button" style="background-color: #2a8194; cursor: default;" type="button">
              <img src="/public/images/icons/whiteCommentIcon.png" style="height: 35px; width: 35px;" alt="comments" />
              <span class="count">100</span>
            </button>
            <button class="button blue favorite" style="background-color: #2a8194; cursor: default;" type="button">
              <img src="/public/images/icons/whiteSaveIcon.png" style="height: 30px; width: 30px" alt="" />
              <span class="count">100</span>
            </button>
            <button type="button" class="button blue favorite" style="background-color: #2a8194">
              <img src="/public/images/icons/penIcon.png" style="height: 30px; width: 30px" alt="" />
            </button>
          </div>
        </div>
      </div>

      <div class="header-best-project">
        <img src="/public/images/icons/mainStarIcon.png" alt="" />
        <h2>BEST PROJECTS</h2>
      </div>

      <div class="wrapper-chat">
        <?php foreach ($viewVar['projects'] as $project) : ?>
          <div class="text-bubble-project">
            <p class="title">
              <?php echo $project->getTitle(); ?>
            </p>
            <p class="description-post">
              <?php echo $project->getDescription(); ?>
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

            <div class="buttons-for-project">
              <a href="http://<?php echo APP_HOST; ?>/project/like/<?= $project->getIdProject() ?>">
                <button class="button-project like">
                  <img src="<?php echo $project->getLikeStatus() ? '/public/images/icons/blueLikeIcon.png' : '/public/images/icons/whiteLikeIcon.png'; ?>" style="height: 30px; width: 30px" />
                  <span class="count-for-project"><?php echo $project->getLikesCount(); ?></span>
                </button>
              </a>
              <!-- COMMENTS HERE STARTS -->
              <button class="button-project blue message-button" onclick="openModalComment(<?= $project->getIdProject() ?>)">
                <img src="/public/images/icons/whiteCommentIcon.png" style="height: 40px; width: 40px" />
                <span class="count-for-project"><?php echo $project->getLikesCount(); ?></span>
              </button>

              <div id="#modalComment<?= $project->getIdProject() ?>" class="modal-background" style="display: none;">
                <button class="button-close" onclick="closeModalComment(<?= $project->getIdProject() ?>)">
                  <div class="close-modal">
                    <img src="/public/images/icons/deleteIcon.png"></img>
                  </div>
                </button>
                <div class="modal-container">
                  <div class="wrapper-chat-modal">
                    <div class="message-modal">
                      <div class="text-bubble-project">
                        <p class="title">
                          <?php echo $project->getTitle(); ?>
                        </p>
                        <p class="description-post">
                          <?php echo $project->getDescription(); ?>
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

                        <div class="buttons-for-project">
                          <a href="http://<?php echo APP_HOST; ?>/project/like/<?= $project->getIdProject() ?>">
                            <button class="button-project like">
                              <img src="<?php echo $project->getLikeStatus() ? '/public/images/icons/blueLikeIcon.png' : '/public/images/icons/whiteLikeIcon.png'; ?>" style="height: 30px; width: 30px" />
                              <span class="count-for-project"><?= $project->getLikeCount(); ?></span>
                            </button>
                          </a>
                          <a href="http://<?php echo APP_HOST; ?>/project/saveProjectFavorite/<?= $project->getIdProject(); ?>">
                            <button class="button-project blue favorite">
                              <img src="<?php echo $project->getSaveStatus() ? '/public/images/icons/blueSaveIcon.png' : '/public/images/icons/whiteSaveIcon.png'; ?>" style="<?php echo $project->getSaveStatus() ? 'height: 30px; width: 30px;' : 'height: 35px; width: 35px;' ?>" />
                              <span class="count-for-project"><?= $project->getSaveCount(); ?></span>
                            </button>
                          </a>
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
                  </div>
                  <div class="comments">
                    <?php foreach ($project->getComments() as $comment) {
                      $user = $comment->getUser(); ?>
                      <div class="line">
                        <div class="one-comment">
                          <div class="user-avatar-comment">
                            <img src="http://<?php echo APP_HOST; ?>/public/images/users/<?= $comment->getUser()->getAvatar() ?>"></img>
                            </div>
                            <div class=" comment-text">
                            <p><?= $user->getAvatar(); ?></p>
                          </div>
                          <?php
                          if ($user->getIdUser() == $_SESSION["idUser"] || $viewVar['user']->getAdmin() == true  ||  $project->getUser()->getIdUser() == $_SESSION["idUser"]) {
                          ?>
                            <a href="http://<?php echo APP_HOST; ?>/project/deleteComment/<?= $comment->getIdComment() ?>/<?= $project->getIdProject(); ?>">
                              <div class="delete-button">
                                <img src="/public/images/icons/deleteIcon.png" alt="Delete Icon">
                              </div>
                            </a>
                          <?php } ?>
                        </div>
                      </div>
                    <?php } ?>
                    <div class="new-comment">
                      <div class="user-avatar-comment">
                        <img src="http://<?php echo APP_HOST; ?>/public/images/users/<?= $viewVar['user']->getAvatar() ?>"></img>
                      </div>
                      <form method="post" action="http://<?php echo APP_HOST; ?>/project/comment/<?= $project->getIdProject() ?>">
                        <div class="new-comment-text">
                          <input type="text" placeholder="Make here a comment :)" name="text" id="text" maxlength="50" required>
                        </div>
                        <button type="submit">
                          <img src="/public/images/playButton.png"></img>
                        </button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>




              <a href="http://<?php echo APP_HOST; ?>/project/saveProjectFavorite/<?= $project->getIdProject(); ?>">
                <button class="button-project blue favorite">
                  <img src="<?php echo $project->getSaveStatus() ? '/public/images/icons/blueSaveIcon.png' : '/public/images/icons/whiteSaveIcon.png'; ?>" style="<?php echo $project->getSaveStatus() ? 'height: 30px; width: 30px;' : 'height: 35px; width: 35px;' ?>" />
                  <span class="count-for-project"><?= $project->getSaveCount(); ?></span>
                </button>
              </a>
              <?php
              if ($viewVar['user']->getIdUser() == $_SESSION["idUser"] || $viewVar['user']->getAdmin() == true) {
              ?>
                <a href="http://<?= APP_HOST ?>/project/delete?idProject=<?= $project->getIdProject() ?>">
                  <button class="button-project blue favorite">
                    <img src="/public/images/icons/trashIcon.png" style="height: 40px; width: 40px;" />
                  </button>
                </a>
              <?php } ?>
            </div>

            <div class="hashtags">
              <?php if ($project->hasHashtags()) { ?>
                <?php foreach ($project->getHashtags() as $hashtagProject) { ?>
                  <span style="margin: 10px 30px 0 0;">#<?= $hashtagProject->getHashtag()->getHashtag() ?></span>
                <?php } ?>
              <?php } ?>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
  </div>
  </section>
  </div>
</body>

<script>
  function openModalComment(idproject) {
    document.getElementById("#modalComment" + idproject).style.display = "flex";
  }

  function closeModalComplain(idproject) {
    document.getElementById("#complaint" + idproject).style.display = "none";
  }
</script>