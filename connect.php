<?php 
		ini_set('display_errors', 1);
		error_reporting(E_ALL ^ E_NOTICE);

		include_once('include/initialization.php');

						require "lib/phpmailer/PHPMailerAutoload.php";

?>
<!DOCTYPE html>

<html lang="fr">

	<head>

		<title>Christelle Beernaert | Examen PHP</title>
		<meta charset="UTF-8" />

		<meta name="viewport" content="width=device-width, initial-scale=1">

		<!-- Link -->
		<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
		<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/grids-responsive-min.css">
		<link rel="stylesheet" type="text/css" href="style.css">


	</head>

	<body>
		<div class="container">
		
			<h1>Merci de vous être connecté.</h1>

			<a href="logout.php">Log out</a>

		

			


		</div>
		
		

		


	</body>

</html>