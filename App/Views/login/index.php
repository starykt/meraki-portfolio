<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link href="http://<?php echo APP_HOST; ?>/public/css/login-page.css" rel="stylesheet">
<body>

	<div class="loader-wrapper">
		<span class="loader">
			<span class="loader-inner"></span>
		</span>
	</div>

	<div class="wrapper">
		<div class="top-bar"></div>

		<div class="login-form">
			<h2 class="sign-in">Login</h2>
			<br>
			<form action="http://<?php echo APP_HOST; ?>/login/validation" method="POST">
				<input type="text" placeholder="Nickname#2728" name="email" required>
				<div class="input-purple">
					<input type="password" id="password" placeholder="Senha" name= "password" required>
					<div class="eye-button" onclick="togglePasswordVisibility()">
						<img src="">
					</div>
				</div>
				<div class="forgot-password">Esqueceu a senha?</div>
				<button class="btn-login" type="submit" class="">Login</button>
			</form>
			<div class="register-link">
				<a href="http://<?= APP_HOST ?>/login/register">
					<button class="not-a-player-button">Not a player?</button>
				</a>
			</div>
		</div>
		<div class="bottom-wave">
			<img src="/public/images/wave.svg">
		</div>
	</div>
	
</body>
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
		
		$(window).on("load",function(){
			$(".loader-wrapper").fadeOut("slow");
		});
	</script>