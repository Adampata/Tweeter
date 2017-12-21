<?php
///////////////////////////// OBIEKT wykonujący operacje na bazie danych

class User
{
	// Łączy się z bazą
		public $userId;
		public $userName;
		public $userPassword;
		public $userEmail;
		private $pass_hashed;
		


	// konstruktor
		public function __construct($id){
			
			$conn = new PDO( 'mysql:host=localhost; dbname=tweeter' , 'root' , '' );
			$conn -> setAttribute (PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$conn -> setAttribute (PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
			
			$this->userId = $id;
			
			$table = $conn->query("SELECT * FROM `users` WHERE id=$this->userId");
			$table = $table->fetchAll();
			
			
			
			$this->userName = $table[0]['userName'];
			
			$this->userEmail = $table[0]['mail'];

			$this->pass_hashed = $table[0]['password'];

		}

	//Wewnętrzna - sprawdzanie usera w bazie
		// private function isUserInBase ($user, $conn)
		// {
			
		// }

	// Pokazuje nazwę użytkownika
		public function __getUserName()
		{
			return ($this->userName);
		}


	// Pokazuje email użytkownika
		public function __getUserEmail()
		{
			return ($this->userEmail);
		}

	// Pokazuje test użytkownika
		// public function __getUserTest()
		// {
		// 	return ($this->test);
		// }

	// Zmienia nazwę użytkownika
		public function __setUserName($nn)
		{
			$conn = new PDO( 'mysql:host=localhost; dbname=tweeter' , 'root' , '' );

			$query = "SELECT id FROM users WHERE userName=:user";

			$isUser = $conn -> prepare($query);
			$isUser ->bindValue(':user', $nn, PDO::PARAM_STR);
			$isUser -> execute();

			$numUsers = $isUser -> fetchAll();
			$isUserInBase = count($numUsers);

			if ($isUserInBase>0) {
				$isUserInBase = false;
				//echo "Zmiana nazwy nie powiodła się! Ta nazwa już istnieje";
			} elseif ($isUserInBase == 0) {
				$setNN = $conn -> query ("UPDATE `users` SET `userName` = '$nn' WHERE id=$this->userId");
				$this->userName = $nn;
				$isUserInBase = true;
				//echo "Zmieniono nazwę użytkownika";
				
			}
			return $isUserInBase;	
		}


	// Zmienia email użytkownika
		public function __setUserEmail($nm)
		{
			$conn = new PDO( 'mysql:host=localhost; dbname=tweeter' , 'root' , '' );
			$setNE = $conn -> query ("UPDATE `users` SET `mail` = '$nm' WHERE id=$this->userId");
			$this->userEmail = $nm;
		}

	// Zmiana hasła użytkownika
		public function __setNewUserPass($oldPass, $newPass)
		{
			if (password_verify($oldPass, $this->pass_hashed)) {

				$conn = new PDO( 'mysql:host=localhost; dbname=tweeter' , 'root' , '' );

				$newPass_hash = password_hash($newPass, PASSWORD_DEFAULT);
				
				$setNP = $conn->query("UPDATE `users` SET `password` = '$newPass_hash' WHERE id=$this->userId");

				$passError = false;

			} else {
				$passError = true;
			}
			return $passError;
		}

	// Sprawdzenie hasła
		public function CheckPassCorrect($passToCeck)
		{
			if (password_verify($passToCeck, $this->pass_hashed)) {
				$passIsTrue = true;
			} else {
				$passIsTrue = false;
			}
			return $passIsTrue;
		}
		


}



 ?>