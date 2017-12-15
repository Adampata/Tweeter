<?php
	
	try {
		
		$conn = new PDO( 'mysql:host=localhost; dbname=tweeter' , 'root' , '' );
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$conn->setAttribute( PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC );

	} catch (\PDOException $e) {
		
		echo " Problem z połączeniem z bazą danych. <br>" . $e ;

	}

	
?>