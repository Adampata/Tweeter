<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['whatsup'])) {
	


	if ($_POST['ref'] != $_SESSION['ref']) {
		require_once ('connection.php');

		$query = "INSERT INTO `comments`(`content`, `property`, `adDate`) VALUES (:content, :property, NOW())";
		
		$chUser = $conn -> prepare($query);
		$chUser -> bindValue (':content',$_POST['whatsup'], PDO::PARAM_STR);
		$chUser -> bindValue (':property',$_SESSION['user'], PDO::PARAM_STR);
		$chUser -> execute();

		$_SESSION['ref'] = $_POST['ref'];
		
	}
}




?>