<?php

session_start();

require_once  ('connection.php')  ;

if (isset($_SESSION['userIsSet'])) {
		header('Location: ../index.php');
		exit;
	}	

//var_dump($_SESSION['userIsSet']);
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	if (isset($_POST['login'])) {
		include ('chUser.php');
	}
	
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
	<title>Tweetee</title>
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

	<form action="" method="POST">
		<div>
			Zaloguj się!<br>
<?php
	if (isset($_POST['login'])) {
		if ($loginError=1) {
			echo '<div class="error">Nazwa użytkownika lub hasło są nieprawidłowe. Spróbuj ponownie!</div>';
		}
	}
?>


		</div>
		<div>
			<div>
				<br>Login:
			</div>
			<div>
				<input type="text" name="userName">
			</div>
		</div>
		<div>
			<div>
				Hasło:
			</div>
			<div>
				<input type="password" name="userPassword">
			</div>
		</div>
		<div>
			<input type="submit" name="login" value="Zaloguj się!">
		</div>
	</form>
	<form action="register.php" method="POST">
	<div>
		<br>
		<br>
		Nie posiadasz jeszcze konta?
	</div>
	<div>
		<input type="submit" name="register" value="Utwórz nowe konto!">
	</div>
	</form>

</body>
</html>