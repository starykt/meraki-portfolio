<link href="http://<?php echo APP_HOST; ?>/public/css/list-challenges.css" rel="stylesheet">

<html>

<body>
  <section>
    <div class="top-list-title">
      <img class="mushroom" src="/public/images/gifs/mush.gif"></img>
      <div class="title-message">
        <p>CHALLENGES THAT YOU</p>
        <p>CAN DO IT RIGHT NOW</p>
      </div>
      <a href="http://<?php echo APP_HOST; ?>/challenge/register">
        <img class="light-bulb" src="/public/images/icons/lightBulbPlus.png"></img>
      </a>
    </div>
  </section>
  <div class="wrapper-all-challenges">
    <?php foreach ($viewVar['challenges'] as $challenge) : ?>
      <?php
        $user = $viewVar['usersList'][$challenge->getIdChallenge()];
      ?>
      <div class="wrapper-challenge">
        <div class="first-line-challenge">
          <div class="icon-award">
            <?php $awards = $viewVar['awardsList'][$challenge->getIdChallenge()]; ?>
              <?php  foreach ($awards as $award) :?>
                <img src="http://<?php echo APP_HOST; ?>/public/images/awards/<?= $award->getImagePath() ?>" width="200px" height="200px">
            <?php endforeach; ?>
          </div>
          <div class="title-challenge-list">
            <p><?= $challenge->getName() ?></p>
          </div>
          <div class="button-join-to-win">
            <button type="button" onclick="">JOIN TO WIN</button>
            <img src="/public/images/icons/admin.png"></img>
          </div>
        </div>
        <div class="second-line-challenge-list">
          <div class="goal-challenge-list">
            <p><?= $challenge->getGoal() ?></p>
          </div>
          <div class="xps-label-quantity">
            <p><?= $challenge->getReward() ?> xps</p>
            <img class="star-challenge-xp" src="/public/images/userFight/yellowStar.png"></img>
          </div>
        </div>
        <div class="third-line-challenge-list">
          <div class="banner-image-challenge">
            <div class="wrapper-banner-challenge">
              <img class="banner" src="http://<?php echo APP_HOST; ?>/public/images/challenges/<?= $challenge->getBanner() ?>"></img>
            </div>
          </div>
          <div class="hashtag-for-challenge-list">
            <div class="englobe-hashtag-label">
              <label>Don't forget to use this hashtag on your post:</label>
              <p>#<?php $hashtag = $viewVar['hashtagsList'][$challenge->getIdChallenge()]; ?><?= $hashtag->getHashtag() ?>
              </p>
            </div>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</body>
</html>