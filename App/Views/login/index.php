<body>
    <div class="login-form">
        <h2 class="white-text">Sign In</h2>
        <br>
        <form  action="http://<?php echo APP_HOST; ?>/login/validation" method="POST">
            <div class="input-container">
                <input type="text" placeholder="Nickname#2728" name="email" required>
            </div>
            <div class="input-container">
                <input type="password" id="password" placeholder="Password" name= "password" required>
                <i class="toggle-password fas fa-eye" onclick="togglePasswordVisibility()"></i>
            </div>
            <button type="submit" class="purple-button">Login</button>
        </form>
        <div class="register-link">
        <a href="http://<?= APP_HOST ?>/login/register">
            <button class="not-a-player-button">Not a player?</button>
        </a>
        </div>

    </div>

    <script>
        function togglePasswordVisibility() {
            var passwordInput = document.getElementById("password");
            var togglePasswordIcon = document.querySelector(".toggle-password");
            
            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                togglePasswordIcon.classList.remove("fa-eye");
                togglePasswordIcon.classList.add("fa-eye-slash");
            } else {
                passwordInput.type = "password";
                togglePasswordIcon.classList.remove("fa-eye-slash");
                togglePasswordIcon.classList.add("fa-eye");
            }
        }
    </script>
</body>