<?php

	require_once ('connection.php');

	$query = "SELECT * FROM `comments` ORDER BY id DESC LIMIT :h";
	
	$importCom = $conn -> prepare($query);
	$importCom -> bindValue (':h',$h, PDO::PARAM_INT);
	$importCom -> execute();

	$tablica = $importCom -> fetchAll();
	

?>