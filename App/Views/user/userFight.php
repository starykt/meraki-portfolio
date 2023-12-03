<link href="http://<?php echo APP_HOST; ?>/public/css/user-fight.css" rel="stylesheet">

<body>
  <div class="container">
    <aside>
    </aside>
    <section>
      <div class="list">
        <div class="list-item pb-9">
          <div class="liquid">
            <h2>THE MOST LIKED</h2>
          </div>
        </div>
        <button type="button" onclick="changeTextLikes()">
          <img src="/public/images/icons/infoIcon.png" style="height: 32px; width: 32px;" alt="" />
        </button>
      </div>

      <div class="box">
        <div class="ranking-most-liked">
          <div class="user-ranking">
            <div class="point">
              <span><?= $viewVar['topUsersByLikes'][2]->getLikes() ?></span>
              <img src="/public/images/userFight/blackLike.png" style="width: 25px; height: 25px;" />
            </div>

            <div style="display: flex; flex-direction: column; align-items: center; justify-content: center; position: relative;">
              <div style="display: flex; flex-direction: column; align-items: center; justify-content: center;">

                <img src="http://<?= APP_HOST ?>/public/images/users/<?= $viewVar['topUsersByLikes'][2]->getAvatar() ?>" class="user-icon" style="height: 90px; width: 90px;" alt="" />

                <img src="/public/images/userFight/position3.png" alt="" style="position: absolute; left: -20px; top: 10px; width: 80px; height: 80px;" />
              </div>
              <div class="bar" style="height: 300px;"></div>
              <div class="user-name">
                <?= $viewVar['topUsersByLikes'][2]->getNickname() ?>#<?= $viewVar['topUsersByLikes'][2]->getTag() ?>
              </div>
            </div>
          </div>
          <div class="user-ranking">
            <div class="point">
              <span><?= $viewVar['topUsersByLikes'][0]->getLikes() ?></span>
              <img src="/public/images/userFight/blackLike.png" style="width: 25px; height: 25px;" />
            </div>

            <div style="display: flex; flex-direction: column; align-items: center; justify-content: center; position: relative;">
              <div style="display: flex; flex-direction: column; align-items: center; justify-content: center;">

                <img src="http://<?= APP_HOST ?>/public/images/users/<?= $viewVar['topUsersByLikes'][0]->getAvatar() ?>" class="user-icon" style="height: 90px; width: 90px;" alt="" />

                <img src="/public/images/userFight/position1.png" alt="" style="position: absolute; left: 45px; top: 35px; width: 80px; height: 80px;" />
              </div>
              <div class="bar" style="height: 300px;"></div>
              <div class="user-name one">
                <?= $viewVar['topUsersByLikes'][0]->getNickname() ?>#<?= $viewVar['topUsersByLikes'][0]->getTag() ?>
              </div>
            </div>


          </div>


          <div class="user-ranking">
            <div class="point">
              <span><?= $viewVar['topUsersByLikes'][1]->getLikes() ?></span>
              <img src="/public/images/userFight/blackLike.png" style="width: 25px; height: 25px;" />
            </div>

            <div style="display: flex; flex-direction: column; align-items: center; justify-content: center; position: relative;">
              <div style="display: flex; flex-direction: column; align-items: center; justify-content: center;">
                <img src="http://<?= APP_HOST ?>/public/images/users/<?= $viewVar['topUsersByLikes'][1]->getAvatar() ?>" class="user-icon" style="height: 90px; width: 90px;" alt="" />
                <img src="/public/images/userFight/position2.png" alt="" style="position: absolute; left: -20px; top: 32px; width: 80px; height: 80px;" />
              </div>
              <div class="bar" style="height: 300px;"></div>
              <div class="user-name">
                <?= $viewVar['topUsersByLikes'][1]->getNickname() ?>#<?= $viewVar['topUsersByLikes'][1]->getTag() ?>
              </div>
            </div>
          </div>



        </div>

        <div class="icons">
          <img src="/public/images/gifs/heartMinecraft.gif" alt="" style=" height: 40px; width: 140px;" />
          <img src="/public/images/gifs/fantasminha.gif" alt="" style=" height: 100px; width: 150px;" />
        </div>

        <div class="user-ranking" style="height: auto;">
          <div></div>
          <div style="display: flex; flex-direction: column; align-items: center; justify-content: center; position: relative;">
            <div style="display: flex; flex-direction: column; align-items: center; justify-content: center;">

              <img src="http://<?= APP_HOST ?>/public/images/users/<?= $viewVar['userLoggedin']->getAvatar() ?>" style="height: 70px; width: 70px; border-radius: 100%" alt="" />
              <div class="container-me">
                <img src="/public/images/userFight/yellowStar.png" style="width: 80px; height: 80px;" />
                <span><?= $viewVar['userPositionByLikes'] ?></span>
              </div>

            </div>
            <div class="bar" style="height: 100px;"></div>
            <div class="user-name">
              ME
            </div>
          </div>
        </div>
      </div>
      <div class="texts-container" id="likeText">
        <p>How many friends this guys have? Alexa, search please: How to become</p>
        <h2>THE MOST LIKED.</h2>
        <p>But really, how so many? Where can i find it?</p>
      </div>
      <div class="list">
        <div class="list-item pb-9">
          <div class="liquid">
            <h2>THE MOST AWARDED</h2>
          </div>
        </div>
        <button type="button " onclick="changeTextAwards()">
          <img src="/public/images/icons/infoIcon.png" style="height: 32px; width: 32px;" alt="" />
        </button>
      </div>


      <div class="box-awared">
        <div class="wrapper-awared">
          <div class="card-user-awared" style="max-width: 70%;">
            <h1><?= $viewVar['topUsersByAwards'][0]->getNickname() ?>#<?= $viewVar['topUsersByAwards'][0]->getTag() ?></h1>
            <div class="trofeu-card ">
              <span><?= $viewVar['topUsersByAwards'][0]->getAwards() ?></span>
              <img src="/public/images/userFight/blackAward.png" alt="" style="height: 16px; width: 16px;" />
            </div>
            <div class="container-image-awared">
              <img src="http://<?= APP_HOST ?>/public/images/users/<?= $viewVar['topUsersByAwards'][0]->getAvatar() ?>" style="height: 100px; width: 100px; border-radius: 100%;" alt="" />
            </div>

            <div class="start">
              <img src="/public/images/userFight/position1.png" style="width: 80px; height: 80px;" alt="" />
            </div>
          </div>

          <div class="card-user-awared" style="max-width: 60%;">
            <h1><?= $viewVar['topUsersByAwards'][1]->getNickname() ?>#<?= $viewVar['topUsersByAwards'][1]->getTag() ?></h1>
            <div class="trofeu-card ">
              <span><?= $viewVar['topUsersByAwards'][1]->getAwards() ?></span>
              <img src="/public/images/userFight/blackAward.png" alt="" style="height: 16px; width: 16px;" />

              <div class="container-image-awared">
                <img src="http://<?= APP_HOST ?>/public/images/users/<?= $viewVar['topUsersByAwards'][1]->getAvatar() ?>" style="height: 100px; width: 100px; border-radius: 100%;" alt="" />
              </div>

              <div class="start">
                <img src="/public/images/userFight/position2.png" alt="" style="width: 80px; height: 80px; " />
              </div>
            </div>
          </div>


          <div class="card-user-awared" style="max-width: 50%;">
            <h1><?= $viewVar['topUsersByAwards'][2]->getNickname() ?>#<?= $viewVar['topUsersByAwards'][2]->getTag() ?></h1>
            <div class="trofeu-card ">
              <span><?= $viewVar['topUsersByAwards'][2]->getAwards() ?></span>
              <img src="/public/images/userFight/blackAward.png" alt="" style="height: 16px; width: 16px;" />
            </div>
            <div class="container-image-awared">
              <img src="http://<?= APP_HOST ?>/public/images/users/<?= $viewVar['topUsersByAwards'][2]->getAvatar() ?>" style="height: 100px; width: 100px; border-radius: 100%;" alt="" />
            </div>
            <div class="start">
              <img src="/public/images/userFight/position3.png" alt="" style="width: 80px; height: 80px; " />
            </div>
          </div>


          <div class="card-user-awared" style="max-width: 40%;">
            <h1><?= $viewVar['userLoggedin']->getNickname() ?>#<?= $viewVar['userLoggedin']->getTag() ?></h1>
            <div class="trofeu-card ">
              <span><?= $viewVar['loggedInUserAwards'] ?></span>

              <img src="/public/images/userFight/blackAward.png" alt="" style="height: 16px; width: 16px;" />

              <div class="container-image-awared">
                <img src="http://<?= APP_HOST ?>/public/images/users/<?= $viewVar['userLoggedin']->getAvatar() ?>" style="height: 100px; width: 100px; border-radius: 100%" alt="" />
              </div>
              <div class="container-me-2">
                <img src="/public/images/userFight/yellowStar.png" alt="" style="width: 80px; height: 80px; " />
                <span><?= $viewVar['userPositionByAwards'] ?></span>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="texts-container" style="text-align: center;" id="awardText">
        <p>
          Do you want to become <span>THE MOST AWARDED</span>
        <p> and have all the cool icons in your profile? Jesus, enjoy us in ours challenges, you’re gonna love
          it</p>
        </p>
      </div>
      <div class="list">
        <div class="list-item pb-9">
          <div class="liquid">
            <h2>THE TRY HARDER</h2>
          </div>
        </div>
        <button type="button" onclick="changeTextLevel()">
          <img src="/public/images/icons/infoIcon.png" style="height: 32px; width: 32px;" alt="" />
        </button>
      </div>

      <div class="box-custom">
        <div class="ranking-most-liked-custom">
          <div class="user-try-harder">
            <h2><?= $viewVar['topUsersByLevel'][0]->getNickname() ?>#<?= $viewVar['topUsersByLevel'][0]->getTag() ?></h2>
            <img src="http://<?= APP_HOST ?>/public/images/users/<?= $viewVar['topUsersByLevel'][0]->getAvatar() ?>" style="height: 70px; width: 70px;" class="user-icon" alt="" />
            <div class="container-me-3">
              <img class="level-try-harder" src="/public/images/icons/levelStarIcon.png" alt="" />
              <span><?= $viewVar['topUsersByLevel'][0]->getLevel() ?></span>
            </div>
          </div>


          <div class="user-try-harder">
            <h2><?= $viewVar['topUsersByLevel'][1]->getNickname() ?>#<?= $viewVar['topUsersByLevel'][1]->getTag() ?></h2>
            <img src="http://<?= APP_HOST ?>/public/images/users/<?= $viewVar['topUsersByLevel'][1]->getAvatar() ?>" style="height: 70px; width: 70px;" class="user-icon" alt="" />
            <div class="container-me-3">
              <img class="level-try-harder" src="/public/images/icons/levelStarIcon.png" alt="" />
              <span><?= $viewVar['topUsersByLevel'][1]->getLevel() ?></span>
            </div>
          </div>


          <div class="user-try-harder">
            <h2><?= $viewVar['topUsersByLevel'][2]->getNickname() ?>#<?= $viewVar['topUsersByLevel'][2]->getTag() ?></h2>
            <img src="http://<?= APP_HOST ?>/public/images/users/<?= $viewVar['topUsersByLevel'][2]->getAvatar() ?>" style="height: 70px; width: 70px;" class="user-icon" alt="" />
            <div class="container-me-3">
              <img class="level-try-harder" src="/public/images/icons/levelStarIcon.png" alt="" />
              <span><?= $viewVar['topUsersByLevel'][2]->getLevel() ?></span>
            </div>

          </div>
        </div>
        <div class="sonic-container">
          <div style="display: flex; align-items: end; gap: 16px;">
            <h2>YOU HERE SIR <img src="/public/images/playButton.png" /></h2>
            <div>
              <p>position #<?= $viewVar['userPositionByLevel']?></p>
              <img class="user-icon" src="http://<?= APP_HOST ?>/public/images/users/<?= $viewVar['userLoggedin']->getAvatar() ?>" style="height: 70px; width: 70px;" alt="" />
            </div>
          </div>

          <img src="/public/images/gifs/sonic.gif" alt="" />
        </div>
      </div>

      <div class="texts-container" style="text-align: center;" id="levelText">
        <p>
          Wishing to become <span>THE MOST AWARDED</span> here on the server?
        <p> C’mon, you can do it. Find the little details, fill the void, fight and fight. I don’t know what I’m saying.</p>
        </p>
      </div>

    </section>
  </div>
</body>

</html>

<script>
  var stateLikeText = false;
  var stateAwardText = false;
  var stateLevelText = false;

  function changeTextLikes() {
    var likeText = document.getElementById("likeText");

    if (stateLikeText) {
      likeText.style.display = "none";
    } else {
      likeText.style.display = "flex";
    }

    stateLikeText = !stateLikeText;
  }

  function changeTextAwards() {
    var awardText = document.getElementById("awardText");

    if (stateAwardText) {
      awardText.style.display = "none";
    } else {
      awardText.style.display = "flex";
    }

    stateAwardText = !stateAwardText;
  }

  function changeTextLevel() {
    var levelText = document.getElementById("levelText");

    if (stateLevelText) {
      levelText.style.display = "none";
    } else {
      levelText.style.display = "flex";
    }

    stateLevelText = !stateLevelText;
  }
</script>