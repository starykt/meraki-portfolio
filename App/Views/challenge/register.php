<link href="http://<?php echo APP_HOST; ?>/public/css/new-challenge.css" rel="stylesheet">

<body>
  <section>
    <img class="light-bulb" src="/public/images/icons/lightIcon.png" />
    <div class="background-challenge-wrapper">
      <form method="POST" action="http://<?php echo APP_HOST; ?>/challenge/create" enctype="multipart/form-data">
        <div class="image-and-description">
          <div class="first-part">
            <div id="fileInputContainer">
              <input type="file" id="imagePath" name="imagePath" accept="image/*" required>
              <img src="/public/images/icons/upImageIcon.png"></img>
              </input>
            </div>
            <p>On the left, add the icon award.</p>
          </div>
          <div class="name-award-part">
            <input type="text" id="description" name="description" placeholder="Here is the title of award."></input>
          </div>
          <div class="description-part">
            <textarea type="text" id="goal" placeholder="Description of goal for the challenge." name="goal" maxlength="300" required></textarea>
          </div>
        </div>
        <div class="name-and-xps">
          <div class="name-part">
            <textarea type="text" id="name" placeholder="Insert here title for the challenge." name="name" maxlength="80" required></textarea>
          </div>
          <div class="xp-part">
            <label for="reward">How much xps is it worth?</label>
            <div class="input-star">
              <input type="number" id="reward" name="reward" required></input>
              <img src="/public/images/userFight/yellowStar.png"></img>
            </div>
          </div>
        </div>
        <div class="hashtags-and-deadline">
          <div class="hashtag-main">
            <label for="hashtag">Create the main hashtag</label>
            <input type="text" id="hashtag" name="hashtag" placeholder="HALLOWEEN2023" required></input>
          </div>
          <div class="date-main">
            <label for="deadline">Choose a date to finalize the game</label>
            <input type="date" id="deadline" name="deadline" required></input>
          </div>
        </div>
        <div class="second-files-challenge">
          <div id="fileChallengeBanner">
            <input type="file" id="banner" name="banner" accept="image/*" required>
            <img src="/public/images/icons/upImageIcon.png"></img>
            </input>
          </div>
        </div>
        <div class="button-start-war">
          <button type="submit">START A WAR</button>
        </div>
      </form>
    </div>
  </section>
</body>
</html>