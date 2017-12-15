<?php

session_start();


	if ( !isset ($_SESSION['userIsSet']) ) {
		header ('Location: includes/login.php');
	} elseif ($_SESSION['userIsSet']==1) {
		echo '<div style="font:21px Tahoma">Witaj ' . $_SESSION['user'] . '!</div>';
		echo '<div style="font:16px Tahoma"> <a href="includes/logout.php?logout=1">Wyloguj się!</a></div>';
		$h = $_SESSION['h'];
	} 

	require_once ('includes/addComment.php');
	require_once ('includes/importComments.php');

?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
	<title>Tweetee</title>
	<style type="text/css">
		.title
		{
			color:blue;
			background: white;
			margin-top: 10px;
			margin-bottom: 10px;
			font:25px Tahoma, cursive;
			font-weight: 1000;
			border-radius:3px;
			border:1px solid blue;
		}

		.leftmenu
		{
			float: left;
			background: white;
			width: 15%;
			height: 90%;
			margin-left:;
			margin-right: 20px;
			font:18px Tahoma, cursive;
			border-radius:3px;
			border:1px solid blue;
		}

		.zawartosc
		{
			float: left;
			margin-right:;
			width: 50%;
			font:10px Tahoma, cursive;
			margin-left: 20px;
		}

		.comments
		{
		width: 95%;
		height: auto;
		line-height:1.5;
		padding:15px 15px 30px;
		border-radius:3px;
		border:1px solid #F7E98D;
		font:13px Tahoma, cursive;
		transition:box-shadow 0.5s ease;
		box-shadow:0 4px 6px rgba(0,0,0,0.1);
		font-smoothing:subpixel-antialiased;
		margin-left: 10px;
		margin-top: 30px;
		background: #F2F2F2;"
		}
	</style>
</head>
<body style="background: #EFFBFB;">
	<div>
		<div align="center" class="title">
			Strona główna
		</div>
		<div class="leftmenu">
			<div>
				Twoje wiadomości
			</div>
			<div>
				Ustawienia konta
			</div>
		</div>
		<div class="zawartosc">
			<div style="margin-top: 10px; margin-left: 10px; font-size: 20px;
">
				Co u ciebie słychać? :)
			</div>
			<div>
				<form action="" method="POST">
					<div>
						<textarea type="text" name="whatsup" 
						style=" width: 95%;
					    direction:ltr;
					    line-height:1.5;
					    padding:15px 15px 30px;
					    border-radius:3px;
					    border:1px solid #F7E98D;
					    font:13px Tahoma, cursive;
					    transition:box-shadow 0.5s ease;
					    box-shadow:0 4px 6px rgba(0,0,0,0.1);
					    font-smoothing:subpixel-antialiased;
					    margin-left: 10px;
					    margin-top: 10px;">

    				</textarea>
    			</div>
    			<div>
    				<input type="submit" name="gogogo" value="Wyślij wiadomość" style="float: right; margin-right: 20px; margin-top: 10px; margin-bottom: 20px; border-radius:3px; border:1px solid #F7E98E; font-weight: 600;">
    				<input type="hidden" name="ref" value="<?php $r=random_bytes(5); echo $r; ?>">
    			</div>
    			<div style="margin-top: 60px;">
    				<?php
    					if (isset($tablica)) {
    						for ($i=0; $i < count($tablica); $i++) { 
    							echo '<div class="comments">'.$tablica[$i]['content'].'</div><div>'.$tablica[$i]['adDate'].' '.$tablica[$i]['property'].'</div>';
    						}
    					}
    				?>
    			</div>
				</form>
			</div>
		</div>
	</div>

</body>
</html>