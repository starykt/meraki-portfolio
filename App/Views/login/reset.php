<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Redefinição de Senha</title>
    <link href="http://<?php echo APP_HOST; ?>/public/css/login-page.css" rel="stylesheet">
</head>

<body>
    <div class="top-bar"></div>
    <div class="login-form">
        <div class="wrapper">
            <h1>Redefine password</h1>
            <form action="http://<?= APP_HOST ?>/login/processResetPassword" method="post">
                <div class="input-purple">
                    <input type="password" id="newPassword" placeholder="Password" name="newPassword" required>
                </div>
                
                <input type="hidden" name="token" value="<?= $_GET['token'] ?>">

                <button type="submit" class="btn-login">Redefine</button>
            </form>
        </div>
    </div>
    <div class="bottom-wave">
        <img src="/public/images/wave.svg">
    </div>
    <script src="script.js"></script>
</body>

</html>
