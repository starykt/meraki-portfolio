<body>   
    <div class="signup-form">
        <h2>Register</h2>
        
        <form action="http://<?php echo APP_HOST; ?>/login/save" method="post">
            <div class="input-container">
                <input type="text" name="nickname" placeholder="Nickname" required>
            </div>
            <div class="input-container">
                <input type="email" name="email" placeholder="Email" required>
            </div>
            <div class="input-container">
                <input type="password" name="password" placeholder="Senha" required>
            </div>
            <div class="input-container">
                <input type="password" name="password_confirm" placeholder="Confirme a Senha" required>
            </div>
            <button type="submit" class="continue-button">Continue</button>
        </form>
    </div>
</body>