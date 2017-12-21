
<?php  
	include ('wszechobiekt.php');
	
	$User = new User($_SESSION['userId']);

// Odbieranie formularza edycji

	if ($_SERVER['REQUEST_METHOD'] == "POST") {
	
//Zmiana nazwy użytkownika
		if ($_POST['newName'] !== $User->__getUserName()) {
			if (strlen($_POST['newName']) < 4) {
			$nnError = "Podana nazwa użytkownika jest zbyt krótka. Musi zawierać conajmniej 4 znaki.";
			} else {
				$setNN = $User -> __setUserName($_POST['newName']);
			} 
		}
	
//Zmiana adresu email
		if ($_POST['newEmail'] !== $User->__getUserEmail()) {
			$User -> __setUserEmail($_POST['newEmail']);
			$setNM = true;
		}

	}
	
// Zmiana hasła
		if (isset($_POST['oldPass'])) {
			if ($User -> CheckPassCorrect ($_POST['oldPass']) == true){
				if (strlen($_POST['oldPass']) > 0 || strlen($_POST['newPass']) > 0 || strlen($_POST['newPass2']) > 0) {
					if (strlen($_POST['oldPass']) > 0 && strlen($_POST['newPass']) > 0 && strlen($_POST['newPass2']) > 0) {
						if ($_POST['newPass'] == $_POST['newPass2']) {
							$User -> __setNewUserPass($_POST['oldPass'], $_POST['newPass']);
							$passError = "Hasło zostało zmienione";
						} else {
							$passError2 = "Pola nowego hasła muszą posiadać to samo hasło";
						}
					} else {
						$passError2 = "Wszystkie pola zmiany hasła musza być wypełnione.";
					}	
				}
			} else {
				$passError2 = "Stare hasło jest niepoprawne.";
			}
		}
?>

			<div style="margin-top: 10px; margin-left: 10px; font-size: 20px;">
				Co zmianiamy?
			</div>

				<form action="" method="POST">
					<table>
						<tr>
							<td style="width: 200px;">
								Nazwa użytkownika:  
							</td>
							<td style="width: 200px;">
								<input type="text" name="newName" value="<?php echo $User->__getUserName(); ?>">
							</td>
							<?php
								if (isset($nnError)) { 
									echo '<td style="width: auto; color: red;">'. $nnError .'</td>';
								}

								if (isset($setNN)) {
									if ($setNN) {
										echo '<td style="width: auto; color: green;">' . " Zmieniono nazwę użytkownika. " . '</td>';
									} else {
										echo '<td style="width: auto; color: red;">' . " Ta nazwa użytkownika już istnieje. Podaj inną. " . '</td>';
									}
								}
							?>
						</tr>
						<tr>
							<td>
								Email użytkownika: 
							</td>
							<td>
								<input type="text" name="newEmail" value="<?php echo $User->__getUserEmail(); ?>">
							</td>
							<?php
								if (isset($setNM)) { 
									echo '<td style="width: auto; color: green;">'. 'Zmieniono adres email.' .'</td>';
								}
							?>
						</tr>
						<tr>
							<td style="height: 40px;"></td>
						</tr>
						<tr>
							<td>
								Hasło użytkownika: 
							</td>
							<?php
								if (isset($passError2) || isset($passError)) {
									if (isset($passError)) { 
										echo '<td style="width: auto; color: green;">'. 'Twoje hasło zostało zmienione' .'</td>';
									} elseif (isset($passError2)) {
										echo '<td style="width: auto; color: red;">'. $passError2 .'</td>';
									} 
								}
							?>
						</tr>
						<tr>
							<td>
								Twoje obecne hasło:
							</td>
							<td>
								<input type="password" name="oldPass">
							</td>
						</tr>
						<tr>
							<td>
								Podaj nowe hasło:
							</td>
							<td>
								<input type="password" name="newPass">
							</td>
						</tr>
						<tr>
							<td>
								 Powtórz nowe hasło:
							</td>
							<td>
								<input type="password" name="newPass2">
							</td>
						</tr>
						<tr>
							<td>
								
							</td>
							<td>
								<input type="submit" name="SetNewData" value="Wyślij">
							</td>
						</tr>
					</table>
				</form>