<?php



$user = $_POST['userName'];
$password = $_POST['userPassword'];
$loginError = null;
$passError = null;

$query = "SELECT * FROM users WHERE userName=:user";
//$query = "SELECT * FROM users WHERE userName='Adam' AND password='qwerty'";

$chUser = $conn -> prepare($query);
$chUser -> bindValue (':user',$user, PDO::PARAM_STR);
$chUser -> execute();

$res = $chUser -> fetchAll();

//print_r($res);
//var_dump(count($res));
//var_dump($query);
//var_dump($user);
//var_dump($password);


if (count($res)!==1){
	$loginError = 1;
} else {
	$pass_hashed = $res[0]['password'];
		if (password_verify($password, $pass_hashed)) {
			$_SESSION['user'] = $user;
			$_SESSION['userIsSet'] = 1;
			$_SESSION['userId'] = $res[0]['id'];
			$_SESSION['h'] = 10;
			$_SESSION['ref'] = null;
			header('Location:../index.php');
		} else {
			$passError = 1;
			}
	}
	

?>