<?php
	
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'GET'){
	if ($_GET['logout']==1) {
		session_destroy();
		header('Location: login.php');
	}
}

	
?>