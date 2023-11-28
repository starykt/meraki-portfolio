    <script src="script.js"></script>
    <link href="http://<?php echo APP_HOST; ?>/public/css/login-page.css" rel="stylesheet">

<body>
<div class="top-bar"></div>
        <div class="login-form">
            <div class="wrapper">
                <div class="signup-form">
                    <form action="http://<?= APP_HOST ?>/login/processRecovery" method="post">
                        <h3 class="sign-in">Choose your registered email to recover your password</h3>
                        <div class="input-purple">
                            <input type="text" id="usernameOrEmail" name="usernameOrEmail" placeholder="user@gmail.com" class="input" required>
                        </div>
                        <button type="submit" class="btn-login">Send</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="bottom-wave">
        <img src="/public/images/wave.svg">
    </div>
</body>