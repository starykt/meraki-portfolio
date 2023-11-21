<link href="http://<?php echo APP_HOST; ?>/public/css/new-user-page.css" rel="stylesheet">
<body>
  <div class="top-bar"></div>
  <div class="wrapper">
    <div class="signup-form">
      <?php
        if ($Sessao::retornaErro()) { ?>
        <div class="alert alert-warning" role="alert">
          <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <?php foreach ($Sessao::retornaErro() as $key => $mensagem) {
            echo $mensagem . "<br />";
          } ?>
        </div>
      <?php } ?>
      <form action="http://<?php echo APP_HOST; ?>/login/save" method="post">
          <div>
            <input type="text" name="nickname" placeholder="Nickname" required>
          </div>
          <div>
            <input type="email" name="email" placeholder="E-mail" required>
          </div>
          <div>
            <input type="password" name="password" placeholder="Password" required>
          </div>
          <div>
            <input type="password" name="password_confirm" placeholder="Confirm password" required>
          </div>
          <div class="button-position">
            <button type="submit" class="continue-button">
              CONTINUE
              <img src="/public/images/playButton.png" />
            </button>
          </div>
        </form>
    </div>
    <div class="gameControl">
      <img src="/public/images/videoGameControl.svg"></img>
    </div>
    <div class="bottom-wave">
      <img src="/public/images/wave.svg">
    </div>
  </div>
</body>