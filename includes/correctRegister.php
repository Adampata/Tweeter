<?php
	
$query = "INSERT  INTO `users`(`userName`, `password`, `mail`) VALUES (:user, :password, :mail)";
$password_hash = password_hash($password, PASSWORD_DEFAULT);
$addNewUser = $conn->prepare($query);
	$addNewUser->bindValue(':user', $user, PDO::PARAM_STR);
	$addNewUser->bindValue(':password', $password_hash, PDO::PARAM_STR);
	$addNewUser->bindValue(':mail', $email, PDO::PARAM_STR);
$addNewUser->execute();

echo "Gratujacje! Twoje konto zostało utworzone pomyślnie!<br>";
echo 'Teraz możesz się zalogować!<br><br><a href="login.php">Przejdź do strony logowania</a>';
?>