<?php



$user = $_POST['userName'];
$password = $_POST['userPassword'];

$query = "SELECT * FROM users WHERE userName=:user AND password=:password";
//$query = "SELECT * FROM users WHERE userName='Adam' AND password='qwerty'";

$chUser = $conn -> prepare($query);
$chUser -> bindValue (':user',$user, PDO::PARAM_STR);
$chUser -> bindValue (':password',$password, PDO::PARAM_STR);
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
	$_SESSION['user'] = $user;
	$_SESSION['userIsSet'] = 1;
	$_SESSION['userId'] = $res[0]['id'];
	$_SESSION['h'] = 10;
	$_SESSION['ref'] = null;
	header('Location:../index.php');
}

?>