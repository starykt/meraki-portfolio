<link href="http://<?php echo APP_HOST; ?>/public/css/new-user-page.css" rel="stylesheet">
<body>
  <div class="top-bar"></div>
  <div class="wrapper">
    <div class="signup-form">
      
      <form action="http://<?php echo APP_HOST; ?>/login/save" method="post">
        <h2>Novo perfil</h2>
          <div>
            <input type="text" name="nickname" placeholder="Nickname" required>
          </div>
          <div>
            <input type="email" name="email" placeholder="Email" required>
          </div>
          <div>
            <input type="password" name="password" placeholder="Senha" required>
          </div>
          <div>
            <input type="password" name="password_confirm" placeholder="Confirmação de senha" required>
          </div>
          <button type="submit" class="continue-button">
            CONTINUE
            <img src="/public/images/playButton.png" />
          </button>
          <div class="gameControl">
            <img src="/public/images/videoGameControl.svg" />
          </div>
        </form>
    </div>

    <div class="bottom-wave">
      <img src="/public/images/wave.svg">
    </div>
  </div>
</body>