<?php

if ($_SERVER['REQUEST_METHOD']!=='POST') {
	header('Location: login.php');
	exit;
}
	require_once ('chReg.php');

if (isset($_POST['registerNow'])) {
	if ($allCorrect) {
		require_once ('correctRegister.php');
		exit;
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	
	<meta charset="utf-8"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
	<title>Tweetee</title>
	<script src='https://www.google.com/recaptcha/api.js'></script>
	<style type="text/css">
		.error
		{
			color:red;
			margin-top: 10px;
			margin-bottom: 10px;
		}
	</style>
</head>
<body>
<div style="float: left; margin-left: 20px; margin-top: 20px;">
	<form action="" method="POST">
		
			<div>
				Tworzenie nowego konta!<br>
			</div>
			<div>
				<div>
					<br>Login:
				</div>
				<div>
					<input type="text" name="userName" value="<?php if (isset($user)) echo $user; ?>">
						
						<?php
							if (isset($userError)) {
								echo '<div class="error">' . $userError . '</div>';
							} 
						?>

				</div>
			</div>
			<div>
				<div>
					Hasło:
				</div>
				<div>
					<input type="password" name="userPassword" value="<?php if (isset($password)) echo $password; ?>">

						<?php
							if (isset($passwordError)) {
								echo '<div class="error">' . $passwordError . '</div>';
							}
						?>

				</div>
			</div>
			<div>
				<div>
					Powtórz hasło:
				</div>
				<div>
					<input type="password" name="userPassword2" value="<?php if (isset($password2)) echo $password2; ?>">
				</div>
			</div>
			<div>
				<div>
					Adres e-mail:
				</div>
				<div>
					<input type="text" name="userEmail" value="<?php if (isset($email)) echo $email; ?>">

						<?php
							if (isset($emailError)) {
								echo '<div class="error">' . $emailError . '</div>';
							}
						?>

				</div>
			</div>
			<div>
				<div>
					Powtórz adres e-mail:
				</div>
				<div>
					<input type="text" name="userEmail2" value="<?php if (isset($email2)) echo $email2; ?>">

				</div>
			</div>
			<div>
				<label>
					<br><input type="checkbox" name="regulamin"> Zaakceptuj regulamin lub nie :)
				</label>
			</div>
			<div style="margin-top: 10px" class="g-recaptcha" data-sitekey="6LfoKD0UAAAAAEk5MSqPYKsWSBcMmu_efyiUXsCX">
			</div>
			<?php
				if (isset($emailError)) {
					echo '<div class="error">' . $capError . '</div>';
				}
			?>
			<div style="margin-top: 10px;"">
				<input type="submit" name="registerNow" value="Utwórz konto">
			</div>
		
	</form>
	<a href="login.php">Powrót do strony logowania</a>
</div>
</body>
</html>
