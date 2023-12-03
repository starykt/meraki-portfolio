<link href="http://<?php echo APP_HOST; ?>/public/css/profiles.css" rel="stylesheet">

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
              <img class="level-icon" src="/public/images/icons/levelStarIcon.png" />
              <p class="level-number"><?= $viewVar['user']->getLevel() ?></p>
            </div>
            <div class="profile-message">
              <a href="http://<?php echo APP_HOST; ?>/conversation/index/<?= $viewVar['user']->getIdUser() ?>">
                <button class="button like" style="background-color: #2a8194; cursor: default;" type="button">
                  <img src="/public/images/icons/chatIcon.png" style="height: 30px; width: 30px" alt="likes" />
                </button>
              </a>
              <img src="http://<?php echo APP_HOST; ?>/public/images/users/<?= $viewVar['user']->getAvatar() ?>"
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
            <p style="width: 90%;">
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



          <!-- Starts the edit profile modal -->
          <div id="#editProfileModal" class="modal-background" style="display: none;">
            <div class="modal-container-edit-profile">
              <button class="button-close-edit-profile" onclick="closeEditProfile()">
                <div class="close-modal">
                  <img src="/public/images/icons/deleteIcon.png"></img>
                </div>
              </button>
              <div class="wrapper-chat-modal">
                <form class="new-form" method="post" action="http://<?php echo APP_HOST; ?>/user/update" enctype="multipart/form-data">
                  <div class="first-line">
                    <p class="nickname"><?= $viewVar['user']->getNickname() ?>#<?= $viewVar['user']->getTag() ?></p>
                    <img src="/public/images/icons/quotationMark.png" style="height: 32px; width: 32px" alt="quotation" />
                  </div>
                  <div class="profile-input-resume">
                    <img src="http://<?php echo APP_HOST; ?>/public/images/users/<?= $viewVar['user']->getAvatar() ?>""
                    alt=" profileAvatar" class="avatar-profile" />
                    <div class="resume-text">
                      <label for="resume">Insert your resume and job</label>
                      <textarea type="text" id="resume" name="resume" maxlength="250"><?= $viewVar['user']->getResume() ?></textarea>
                      <div class="formation">
                        <?php foreach ($viewVar['educations'] as $education) : ?>
                          <div class="one-formation-edit">
                            <p><?= $education->getFormation() ?></p>
                            <a href="http://<?php echo APP_HOST; ?>/user/dropEducation/<?= $education->getIdEducation() ?>">
                              <div class="delete-education">
                                <img src="/public/images/icons/deleteIcon.png"></img>
                              </div>
                            </a>
                          </div>
                        <?php endforeach; ?>
                        <div class="one-formation-edit">
                          <input type="text" id="formation" placeholder="insert your formation..." name="formation" maxlength="50">
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="image-tools-location-wrapper">
                    <div class="image-tools-location">
                      <div class="first-part">
                        <p>For your new avatar here</p>
                        <div id="fileInputContainer">
                          <input type="file" id="avatar" name="avatar" accept="image/*" multiple>
                          <img src="/public/images/icons/upImageIcon.png"></img>
                          </input>
                        </div>
                      </div>
                      <div class="second-part">
                        <label for="location">Insert your location</label>
                        <input type="text" id="location" value="<?= $viewVar['user']->getLocation() ?>" name="location">
                      </div>
                    </div>
                    <div class="image-tools-location-2">
                      <?php foreach ($viewVar['userTools'] as $tool) : ?>
                        <div class="tools-options">
                          <img src="http://<?php echo APP_HOST; ?>/public/images/tools/<?= $tool->getIcon() ?>"" />
                          <a href=" http://<?php echo APP_HOST; ?>/user/deleteTool/?idTool=<?= $tool->getIdTool() ?>">
                          <div class="delete-tool">
                            <img src="/public/images/icons/deleteIcon.png"></img>
                          </div>
                          </a>
                        </div>
                      <?php endforeach; ?>
                    </div>
                  </div>
                  <div class="tools-and-render-button">
                    <div class="adding-tools">
                      <label for="tools">Adding more tools</label>
                      <select class="selectButton" name="tools[]" id="tools" multiple>
                        <?php foreach ($viewVar['tools'] as $tool) { ?>
                          <option value="<?= $tool->getIdTool() ?>"><?= $tool->getCaption() ?></option>
                        <?php } ?>
                      </select>
                    </div>
                    <div class="render-button">
                      <button type="submit">
                        RENDER
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>






          <div class="buttons">
            <button class="button-project like" style="background-color: #2a8194; cursor: default;" type="button">
              <img src="/public/images/icons/whiteLikeIcon.png" style="height: 30px; width: 30px" alt="likes" />
              <span class="count-for-project"><?= $viewVar['like'] ?></span>
            </button>
            <button class="button-project blue message-button" style="background-color: #2a8194; cursor: default;" type="button">
              <img src="/public/images/icons/whiteCommentIcon.png" style="height: 35px; width: 35px;" alt="comments" />
              <span class="count-for-project"><?= $viewVar['commentCount'] ?></span>
            </button>
            <button class="button-project blue favorite" style="background-color: #2a8194; cursor: default;" type="button">
              <img src="/public/images/icons/whiteSaveIcon.png" style="height: 30px; width: 30px" alt="" />
              <span class="count-for-project"><?= $viewVar['saveCount'] ?></span>
            </button>
            <button type="button" class="button blue favorite" style="background-color: #2a8194" onclick="openEditProfile()">
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
                <span class="count-for-project"><?php echo $project->getCommentCount(); ?></span>
              </button>

              <div id="#modalComment<?= $project->getIdProject() ?>" class="modal-background" style="display: none;">
                <div class="modal-container">
                  <button class="button-close" onclick="closeModalComment(<?= $project->getIdProject() ?>)">
                    <div class="close-modal">
                      <img src="/public/images/icons/deleteIcon.png"></img>
                    </div>
                  </button>
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
                            <a href="http://<?= APP_HOST ?>/user/profileUsers/<?= $comment->getUser()->getIdUser() ?>">
                              <img src="http://<?php echo APP_HOST; ?>/public/images/users/<?= $comment->getUser()->getAvatar() ?>"></img>
                            </a>
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

  function closeModalComment(idproject) {
    document.getElementById("#modalComment" + idproject).style.display = "none";
  }

  function openEditProfile() {
    document.getElementById("#editProfileModal").style.display = "flex";
  }

  function closeEditProfile() {
    document.getElementById("#editProfileModal").style.display = "none";
  }

  new MultiSelectTag('tools') // id

  $(document).ready(function() {
    $("#formation").keypress(function(event) {
      if (event.which === 13) {
        event.preventDefault();

        var formationValue = $("#formation").val();

        $.ajax({
          type: "POST",
          url: "http://<?php echo APP_HOST; ?>/user/saveEducation",
          data: {
            formation: formationValue
          },
          success: function(response) {
            console.log(response);
            $("#formation").val('');
            location.reload();
          },
          error: function(error) {
            console.error(error);
          }
        });
      }
    });
  });
</script>