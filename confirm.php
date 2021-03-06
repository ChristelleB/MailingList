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
		

			<?php 
				
				$mail = new PHPMailer;


				//conecter ma db

				$connect = $type.":host=".$server.";dbname=mailing".$db.";charset=".$charset;


				if (isset($_GET['id']) && $_GET['id'] != "") {
				    $sql = "SELECT id,timing,validate FROM users WHERE id = :id";
				    $req = $connexion->prepare($sql);
				    $req->execute( array(':id' => $_GET['id']) );

				    $result = $req->fetch();

				    if ($result != "") {
				        if (!$result['validate']) {
				            $user_date = new DateTime($result['created_at']);
				            $user_date->add(new DateInterval('PT30M'));
				            $now_date = new DateTime("now");

				            if ($user_date > $now_date) {
				                $sql = "UPDATE users SET validate=1 WHERE  id=:id;";
				                $req = $connexion->prepare($sql);
				                $req->execute( array(':id' => $result['id']) );

				                echo "<p>Merci de votre confiance ! David Bowie sera bientôt rien que pour vous ! Attention car il est pas donné...</p>";
				            } else {
				                $sql = "DELETE FROM users WHERE id=:id;";
				                $req = $connexion->prepare($sql);
				                $req->execute( array(':id' => $result['id']) );

				                echo "<p>Oups vous avez dépassé les 30 minutes autorisées, veuillez vous réinscrire.</p>";
				            }
				        } else {
				            echo "<p>Vous avez déjà validé votre email.</p>";
				        }
				    } else {
				        echo "<p>Houston on a un problème !</p>";
				    }

				    
				} else {
				    echo "<p>Toi t'as essayé de faire le malin ! </p>";
				}


				
			


			
			?>


		

			


		</div>
		
		

		


	</body>

</html>