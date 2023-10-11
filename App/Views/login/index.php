<script src="script.js"></script>
<link href="http://<?php echo APP_HOST; ?>/public/css/login-page.css" rel="stylesheet">
<body>

	<div class="loader-wrapper">
		<span class="loader">
			<span class="loader-inner"></span>
		</span>
	</div>

	<div class="top-bar"></div>
	<div class="wrapper">
	<?php
   if ($Sessao::retornaErro()) { ?>
     <div class="alert alert-warning" role="alert">
       <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
       <?php foreach ($Sessao::retornaErro() as $key => $mensagem) {
         echo "<b>". $mensagem . "<br />";
       } ?>
     </div>
   <?php } ?>
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

		window.addEventListener("load", function() {
			var loader = document.querySelector(".loader-wrapper");

			loader.classList.add("loader-fade-out");
			setTimeout(function() {
					loader.style.display = "none";
			}, 1000);
		});
		
	</script>