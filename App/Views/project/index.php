<link href="http://<?php echo APP_HOST; ?>/public/css/feed-page.css" rel="stylesheet">

<body>
  <section>
    <div class="card-new-post">
      <div class="avatar">
        <a href="http://<?= APP_HOST ?>/user/profile">
          <img class="user-icon" src="http://<?php echo APP_HOST; ?>/public/images/users/<?= $viewVar['user']->getAvatar() ?>" />
      </a>
      </div>

      <p class="text-card">Its me... Mario?</p>
      <button onclick="openModalNewProject()">
        <p class="new-post-notification">NEW POST</p>
      </button>
    </div>

  <div id="#newPostWrapper" class="modal-background" style="display: none;">
    <form class="new-form" action="http://<?php echo APP_HOST; ?>/project/save" method="POST" enctype="multipart/form-data">
      <div class="wrapper-options">
        <button class="button-close-2" onclick="closeModalNewProject()">
          <div class="close-modal-new-post">
            <div class="purple-button-close">
              <p>X</p>
            </div>
          </div>
        </button>
        <div class="render-button-modal">
          <button type="submit">
            <div class="purple-button-render">
                  <p>RENDER</p>
                </div>
            </div>
          </button>
      </div>
      <div class="all-options">
        <div class="modal-container-new-post">
          <div class="icon-user">
            <img src="http://<?php echo APP_HOST; ?>/public/images/users/<?= $viewVar['user']->getAvatar() ?>"></img>
          </div>
          <div class="inputs-project">
            <div class="label-title">
              <input type="text" placeholder="Here for your title :)" id="title" name="title" maxlength="35" required>
            </div><br>
            <div class="label-description">
              <input type="text" placeholder="Have fun and write your ideia here." id="description" name="description" maxlength="400" required>
            </div>
          </div>
          <div class="new-file-project">
            <a class="addingImages">
              <input type="file" id="images" name="images[]" accept="image/*" multiple>
                  <img src="/public/images/icons/upImageIcon.png"></img>
              </input>
            </a>
          </div>
          <div class="new-file-project-2">
            <a class="addingFiles">
              <input type="file" id="files" name="files[]" multiple>
                  <img src="/public/images/icons/upFileIcon.png"></img>
              </input>
            </a>
          </div>
      </div>
        <div class="wrapper-hashtags">
          <div class="title-hashtag">
            <p>HASHTAGS</p>
          </div>
          <select class="selectButton" name="idHashtags[]" id="idHashtags" multiple>
              <?php foreach ($viewVar['listHashtag'] as $hashtag) { ?>
                <option value="<?= $hashtag->getIdHashtag() ?>"><?= $hashtag->getHashtag() ?></option>
              <?php } ?>
          </select>
        </div>
      </div>
    </form>
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
                  <?= $project->getUser()->getNickname() ?>#<?= $project->getUser()->getTag() ?>
                </p>
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
                    <img src="<?php echo $project->getLikeStatus() ? '/public/images/icons/blueLikeIcon.png' : '/public/images/icons/whiteLikeIcon.png'; ?>" style="height: 30px; width: 30px" />
                    <span class="count"><?= $project->getLikeCount(); ?></span>
                  </button>
                </a>



                <!-- COMMENTS HERE STARTS -->
                <button class="button blue message-button" onclick="openModalComment(<?= $project->getIdProject() ?>)">
                  <img src="/public/images/icons/whiteCommentIcon.png" style="height: 40px; width: 40px" />
                  <span class="count"><?= $project->getCommentCount(); ?></span>
                </button>

                <div id="#modalComment<?= $project->getIdProject(); ?>" class="modal-background" style="display: none;">
                  <div class="modal-container">
                    <button class="button-close" onclick="closeModalComment(<?= $project->getIdProject() ?>)">
                      <div class="close-modal">
                        <img src="/public/images/icons/deleteIcon.png"></img>
                      </div>
                    </button>
                    <div class="wrapper-chat-modal">
                      <div class="message-modal">
                        <a href="http://<?= APP_HOST ?>/user/profileUsers/<?= $project->getUser()->getIdUser() ?>">
                          <div class="user-avatar">
                            <img src="http://<?php echo APP_HOST; ?>/public/images/users/<?= $project->getUser()->getAvatar() ?>"></img>
                          </div>
                        </a>
                        <div class="text-bubble">
                          <header>
                            <p class="nametag">
                              <?= $project->getUser()->getNickname() ?>#<?= $project->getUser()->getTag() ?></p>
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
                                <img src="<?php echo $project->getLikeStatus() ? '/public/images/icons/blueLikeIcon.png' : '/public/images/icons/whiteLikeIcon.png'; ?>" style="height: 30px; width: 30px" />
                                <span class="count"><?= $project->getLikeCount(); ?></span>
                              </button>
                            </a>
                            <a href="http://<?php echo APP_HOST; ?>/project/saveProjectFavorite/<?= $project->getIdProject(); ?>">
                              <button class="button blue favorite">
                                <img src="<?php echo $project->getSaveStatus() ? '/public/images/icons/blueSaveIcon.png' : '/public/images/icons/whiteSaveIcon.png'; ?>" style="<?php echo $project->getSaveStatus() ? 'height: 30px; width: 30px;' : 'height: 35px; width: 35px;' ?>" />
                                <span class="count"><?= $project->getSaveCount(); ?></span>
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
                              <a href="http://<?= APP_HOST ?>/user/profileUsers/<?= $comment->getUser()->getIdUser() ?>">
                                <img src="http://<?php echo APP_HOST; ?>/public/images/users/<?= $comment->getUser()->getAvatar() ?>"></img>
                              </a>
                            </div>
                            <div class="comment-text">
                              <p><?= $comment->getText() ?></p>
                            </div>
                            <?php
                            if ($user->getIdUser() == $_SESSION["idUser"] || $viewVar['user']->getAdmin() == true  ||  $project->getUser()->getIdUser() == $_SESSION["idUser"]) {
                            ?>
                              <a href="http://<?php echo APP_HOST; ?>/project/deleteComment/<?= $comment->getIdComment() ?>/<?= $project->getIdProject(); ?>">
                                <div class="delete-button">
                                  <img src="/public/images/icons/deleteIcon.png" alt="Delete Icon">
                                </div>
                              </a>
                            <?php
                            }
                            ?>
                          </div>
                        </div>
                      <?php
                      }
                      ?>
                      <div class="new-comment">
                        <div class="user-avatar-comment">
                          <a href="http://<?= APP_HOST ?>/user/profile">
                            <img src="http://<?php echo APP_HOST; ?>/public/images/users/<?= $viewVar['user']->getAvatar() ?>"></img>
                          </a>
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
                  <button class="button blue favorite">
                    <img src="<?php echo $project->getSaveStatus() ? '/public/images/icons/blueSaveIcon.png' : '/public/images/icons/whiteSaveIcon.png'; ?>" style="<?php echo $project->getSaveStatus() ? 'height: 30px; width: 30px;' : 'height: 35px; width: 35px;' ?>" />
                    <span class="count"><?= $project->getSaveCount(); ?></span>
                  </button>
                </a>
                <?php
                if ($project->getUser()->getIdUser() == $_SESSION["idUser"] || $viewVar['user']->getAdmin() == true) {
                ?>
                  <a href="http://<?= APP_HOST ?>/project/delete?idProject=<?= $project->getIdProject() ?>">
                    <button class="button blue favorite">
                      <img src="/public/images/icons/trashIcon.png" style="height: 40px; width: 40px;" />
                    </button>
                  </a>
                <?php } ?>
                <div class="warning-wrapper" onclick="openModalComplain(<?= $project->getIdProject() ?>)">
                  <img src="/public/images/icons/warningIcon.png" style=" height: 50px; width: 50px;" class="warning-button" />
                </div>
              </div>
              
              <div id="#complaint<?= $project->getIdProject(); ?>" class="modal-background-complain" style="display: none;">
                <form class="new-form" action="http://<?php echo APP_HOST; ?>/project/saveReport/<?= $project->getIdProject() ?>" method="POST">
                  <div class="modal-container-complain">
                    <div class="title">
                      <p>Wish make a complain about the post of "<?= $project->getUser()->getNickname() ?>#<?= $project->getUser()->getTag() ?>" ?</p>
                      <img src="/public/images/icons/warningIcon.png" style=" height: 50px; width: 50px;" />
                    </div>
                    <div class="label-complain">
                      <textarea type="text" placeholder="Write the problem here" id="report" name="report" rows="4" cols="50" maxlength="400" required></textarea>
                    </div>
                  </div>
                  <div class="button-options">
                    <button type="submit" class="send-button">
                      SEND
                    </button>
                    <button type="button" class="cancel-button" onclick="closeModalComplain(<?= $project->getIdProject() ?>)">
                      CANCEL
                    </button>
                  </div>
                </form>
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
<script>
  function openModalComment(idproject) {
    document.getElementById("#modalComment" + idproject).style.display = "flex";
  }

  function closeModalComment(idproject) {
    document.getElementById("#modalComment" + idproject).style.display = "none";
  }

  function openModalNewProject() {
    document.getElementById("#newPostWrapper").style.display = "flex";
  }

  function closeModalNewProject() {
    document.getElementById("#newPostWrapper").style.display = "none";
  }

  document.querySelector('.addingImages').addEventListener('click', function () {
    document.querySelector('#images').click();
  });

  document.querySelector('.addingFiles').addEventListener('click', function () {
      document.querySelector('#files').click();
  });

  function openModalComplain(idproject) {
    document.getElementById("#complaint" + idproject).style.display = "flex";
  }

  function closeModalComplain(idproject) {
    document.getElementById("#complaint" + idproject).style.display = "none";
  }

  new MultiSelectTag('idHashtags')  // id

</script>