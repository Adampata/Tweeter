<?php

require_once  ('connection.php') ;



	function isUserInBase ($user, $conn){
		$query = "SELECT id FROM users WHERE userName=:user";

		$isUser = $conn -> prepare($query);
		$isUser ->bindValue(':user', $user, PDO::PARAM_STR);
		$isUser -> execute();

		$numUsers = $isUser -> fetchAll();
		return count($numUsers);
	}



if (isset($_POST['registerNow'])){

	$user = $_POST['userName'];
	$password = $_POST['userPassword'];
	$password2 = $_POST['userPassword2'];
	$email = $_POST['userEmail'];
	$email2 = $_POST['userEmail2'];
	$emailB = filter_var($email, FILTER_SANITIZE_EMAIL);
	$allCorrect = true;
	
	//sprawdzenie captcha
		$secretCap = "6LfoKD0UAAAAAITbl4BWSEKMZftEqZrsMfHt0jab";
		$chCap = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secretCap.'&response='.$_POST['g-recaptcha-response']);
		$capResponse = json_decode($chCap);

	$isUserInBase=isUserInBase($user, $conn);

	if (!ctype_alnum($user)) {
		$userError = "Nazwa użytkownika musi składać sie z liter i cyfr (bez polskich znaków).";
		$allCorrect = false;
	}

	if (strlen($user)<3) {
		$userError = "Nazwa użytkownika musi składać sie minimum z 4 znaków";
		$allCorrect = false;
	}

	if ($isUserInBase>0) {
		$userError = "Ta nazwa użytkownika jest już używana. Wybierz inną.";
		$allCorrect = false;
	}

	if (strlen($password)<5) {
		$passwordError = "Hasło  musi składać sie z minimum z 6 znaków";
		$allCorrect = false;
	}

	if ($password!=$password2) {
		$passwordError = "Podane hasła muszą być jednakowe!";
		$allCorrect = false;
	}


	if ($email!=$emailB){
		$emailError = "Nieprawidłowy adres email.";
		$allCorrect = false;
	}


	if (!strstr($email, '@') == true){
		$emailError = "Nieprawidłowy adres email.";
		$allCorrect = false;
	}

	if ($email!=$email2) {
		$emailError = "Podane adresy email muszą być jednakowe!";
		$allCorrect = false;
	}	

	if ($capResponse -> success == false) {
		$capError = "Jesteś BOTEM!!!";
		$allCorrect = false;
	}
}
?>