<link href="http://<?php echo APP_HOST; ?>/public/css/search-style.css" rel="stylesheet">
<link href="http://<?php echo APP_HOST; ?>/public/css/feed-page.css" rel="stylesheet">
<div class="search-container">
  <form action="http://<?php echo APP_HOST; ?>/project/search/" method="get">
    <input type="text" id="searchTerm" name="term" placeholder="Enter username or project hashtag">
    <select id="searchType" name="type">
      <option value="user">User</option>
      <option value="project">Project</option>
    </select>
    <button type="submit"><img src="\public\images\playButton.png"></button>
  </form>
</div>
<?php if (!empty($viewVar['results'])) : ?>
  <?php foreach ($viewVar['results'] as $result) : ?>
    <?php if ($viewVar['type'] === 'user') : ?>
      <div>
        <a href="http://<?= APP_HOST ?>/user/profileUsers/<?= $result->getIdUser() ?>">
          <p>
            <img src="http://<?php echo APP_HOST; ?>/public/images/users/<?= $result->getAvatar(); ?>" width="30px" height="30px" alt="Foto de Perfil">
            <?= $result->getNickname(); ?> #<?= $result->getTag(); ?>
          </p>
        </a>
      </div>
    <?php elseif ($viewVar['type'] === 'project') : ?>
      <article>
        <div class="wrapper-chat">
          <div class="message">
            <div class="ideia-circles">
              <div class="circles-1"></div>
              <div class="circles-2"></div>
            </div>
            <a href="http://<?= APP_HOST ?>/user/profileUsers/<?= $result->getUser()->getIdUser() ?>">
              <div class="user-avatar">
                <img src="http://<?php echo APP_HOST; ?>/public/images/users/<?= $result->getUser()->getAvatar() ?>"></img>
              </div>
            </a>
            <div class="text-bubble">
              <header>
                <p class="nametag">
                  <?= $result->getUser()->getNickname() ?>#<?= $result->getUser()->getTag() ?>
                </p>
              </header>
              <p class="title">
                <?= $result->getTitle() ?>
              </p>
              <p class="description-post">
                <?= $result->getDescription() ?>
              </p>
              <div class="files">
                <?php if ($result->hasFiles()) { ?>
                  <div class="project-files">
                    <?php foreach ($result->getFiles() as $file) { ?>
                      <a href="http://<?php echo APP_HOST; ?>/public/files/projects/<?= $file->getFile() ?>" download>Download a file here (Carefull, this link hasn't been checked)</a><br>
                    <?php } ?>
                  </div>
                  <br>
                <?php } ?>
              </div>

              <div class="images">
                <?php if ($result->hasImages()) { ?>
                  <?php foreach ($result->getImages() as $image) { ?>
                    <img class="one-image" src="http://<?php echo APP_HOST; ?>/public/images/projects/<?= $image->getImage() ?>" width="200px" height="200px" alt="Imagem do projeto">
                  <?php } ?>
                <?php } ?>
              </div>

              <div class="buttons">

                <button id="likeButton<?= $result->getIdProject(); ?>" class="button like" onclick="handleLike(<?= $result->getIdProject(); ?>)">
                  <img id="likeIcon<?= $result->getIdProject(); ?>" src="<?php echo $result->getLikeStatus() ? '/public/images/icons/blueLikeIcon.png' : '/public/images/icons/whiteLikeIcon.png'; ?>" style="height: 30px; width: 30px" />
                  <span class="count" id="likeCount<?= $result->getIdProject(); ?>"><?= $result->getLikeCount(); ?></span>
                </button>



                <!-- COMMENTS HERE STARTS -->
                <button class="button blue message-button" onclick="openModalComment(<?= $result->getIdProject() ?>)">
                  <img src="/public/images/icons/whiteCommentIcon.png" style="height: 40px; width: 40px" />
                  <span class="count"><?= $result->getCommentCount(); ?></span>
                </button>

                <div id="#modalComment<?= $result->getIdProject(); ?>" class="modal-background" style="display: none;">
                  <button class="button-close" onclick="closeModalComment(<?= $result->getIdProject() ?>)">
                    <div class="close-modal">
                      <img src="/public/images/icons/deleteIcon.png"></img>
                    </div>
                  </button>
                  <div class="modal-container">
                    <div class="wrapper-chat-modal">
                      <div class="message-modal">
                        <a href="http://<?= APP_HOST ?>/user/profileUsers/<?= $result->getUser()->getIdUser() ?>">
                          <div class="user-avatar">
                            <img src="http://<?php echo APP_HOST; ?>/public/images/users/<?= $result->getUser()->getAvatar() ?>"></img>
                          </div>
                        </a>
                        <div class="text-bubble">
                          <header>
                            <p class="nametag">
                              <?= $result->getUser()->getNickname() ?>#<?= $result->getUser()->getTag() ?></p>
                          </header>
                          <p class="title">
                            <?= $result->getTitle() ?>
                          </p>
                          <p class="description-post">
                            <?= $result->getDescription() ?>
                          </p>
                          <div class="files">
                            <?php if ($result->hasFiles()) { ?>
                              <div class="project-files">
                                <?php foreach ($result->getFiles() as $file) { ?>
                                  <a href="http://<?php echo APP_HOST; ?>/public/files/projects/<?= $file->getFile() ?>" download>Download a file here (Carefull, this link hasn't been checked)</a><br>
                                <?php } ?>
                              </div>
                              <br>
                            <?php } ?>
                          </div>

                          <div class="images">
                            <?php if ($result->hasImages()) { ?>
                              <?php foreach ($result->getImages() as $image) { ?>
                                <img class="one-image" src="http://<?php echo APP_HOST; ?>/public/images/projects/<?= $image->getImage() ?>" width="200px" height="200px" alt="Imagem do projeto">
                              <?php } ?>
                            <?php } ?>
                          </div>

                          <div class="buttons">
                            <button id="likeButton2<?= $result->getIdProject(); ?>" class="button like" onclick="handleLike(<?= $project->getIdProject(); ?>)">
                              <img id="likeIcon2<?= $result->getIdProject(); ?>" src="<?php echo $result->getLikeStatus() ? '/public/images/icons/blueLikeIcon.png' : '/public/images/icons/whiteLikeIcon.png'; ?>" style="height: 30px; width: 30px" />
                              <span id="likeCount2<?= $result->getIdProject(); ?>" class="count"><?= $result->getLikeCount(); ?></span>
                            </button>
                            <a href="http://<?php echo APP_HOST; ?>/project/saveProjectFavorite/<?= $result->getIdProject(); ?>">
                              <button class="button blue favorite">
                                <img src="<?php echo $result->getSaveStatus() ? '/public/images/icons/blueSaveIcon.png' : '/public/images/icons/whiteSaveIcon.png'; ?>" style="<?php echo $result->getSaveStatus() ? 'height: 30px; width: 30px;' : 'height: 35px; width: 35px;' ?>" />
                                <span class="count"><?= $result->getSaveCount(); ?></span>
                              </button>
                            </a>
                          </div>
                          <div class="hashtags">
                            <?php if ($result->hasHashtags()) { ?>
                              <?php foreach ($result->getHashtags() as $hashtagProject) { ?>
                                <span style="margin: 10px 30px 0 0;">#<?= $hashtagProject->getHashtag()->getHashtag() ?></span>
                              <?php } ?>
                            <?php } ?>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="comments">
                      <?php foreach ($result->getComments() as $comment) {
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
                            if ($user->getIdUser() == $_SESSION["idUser"] || $viewVar['user']->getAdmin() == true  ||  $result->getUser()->getIdUser() == $_SESSION["idUser"]) {
                            ?>
                              <a href="http://<?php echo APP_HOST; ?>/project/deleteComment/<?= $comment->getIdComment() ?>/<?= $result->getIdProject(); ?>">
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
                        <form method="post" action="http://<?php echo APP_HOST; ?>/project/comment/<?= $result->getIdProject() ?>">
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


                <a href="http://<?php echo APP_HOST; ?>/project/saveProjectFavorite/<?= $result->getIdProject(); ?>">
                  <button class="button blue favorite">
                    <img src="<?php echo $result->getSaveStatus() ? '/public/images/icons/blueSaveIcon.png' : '/public/images/icons/whiteSaveIcon.png'; ?>" style="<?php echo $result->getSaveStatus() ? 'height: 30px; width: 30px;' : 'height: 35px; width: 35px;' ?>" />
                    <span class="count"><?= $result->getSaveCount(); ?></span>
                  </button>
                </a>
                <?php
                if ($result->getUser()->getIdUser() == $_SESSION["idUser"] || $viewVar['user']->getAdmin() == true) {
                ?>
                  <a href="http://<?= APP_HOST ?>/project/delete?idProject=<?= $result->getIdProject() ?>">
                    <button class="button blue favorite">
                      <img src="/public/images/icons/trashIcon.png" style="height: 40px; width: 40px;" />
                    </button>
                  </a>
                <?php } ?>
                <div class="warning-wrapper" onclick="openModalComplain(<?= $result->getIdProject() ?>)">
                  <img src="/public/images/icons/warningIcon.png" style=" height: 50px; width: 50px;" class="warning-button" />
                </div>
              </div>


              <div class="hashtags">
                <?php if ($result->hasHashtags()) { ?>
                  <?php foreach ($result->getHashtags() as $hashtagProject) { ?>
                    <span style="margin: 10px 30px 0 0;">#<?= $hashtagProject->getHashtag()->getHashtag() ?></span>
                  <?php } ?>
                <?php } ?>
              </div>

            </div>
          </div>
        </div>
      </article>
      </section>
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

        document.querySelector('.addingImages').addEventListener('click', function() {
          document.querySelector('#images').click();
        });

        document.querySelector('.addingFiles').addEventListener('click', function() {
          document.querySelector('#files').click();
        });

        function openModalComplain(idproject) {
          document.getElementById("#complaint" + idproject).style.display = "flex";
        }

        function closeModalComplain(idproject) {
          document.getElementById("#complaint" + idproject).style.display = "none";
        }

        new MultiSelectTag('idHashtags')

        function handleLike(projectId) {
          $.ajax({
            url: 'http://<?= APP_HOST ?>/project/like/' + projectId,
            type: 'GET',
            success: function(response) {
              updateLikeButton(projectId, !response.likeStatus, response.likeCount);
            },
            error: function(error) {
              console.error('Erro ao enviar solicitação de like:', error);
            }
          });
          return false;
        }

        function updateLikeButton(projectId, likeStatus, likeCount) {
          const likeIcon = document.getElementById('likeIcon' + projectId);
          const likeCountElement = document.getElementById('likeCount' + projectId);

          const likeIcon2 = document.getElementById('likeIcon2' + projectId);
          const likeCountElement2 = document.getElementById('likeCount2' + projectId);

          likeIcon.src = likeStatus ? '/public/images/icons/blueLikeIcon.png' : '/public/images/icons/whiteLikeIcon.png';
          likeCountElement.textContent = likeCount;

          likeIcon2.src = likeStatus ? '/public/images/icons/blueLikeIcon.png' : '/public/images/icons/whiteLikeIcon.png'; // Corrigido
          likeCountElement2.textContent = likeCount;
        }
      </script>
      </body>

    <?php endif; ?>
  <?php endforeach; ?>
<?php else : ?>
  <p>No results found.</p>
<?php endif; ?>