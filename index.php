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
		
			<h1>Bonjour,</h1>
			<p>Inscrivez-vous à notre newsletter pour recevoir un mail dès la sortie du David Bowie plus vrai que nature !</p>


			<?php 
				
				$mail = new PHPMailer;


				//conecter ma db

				$connect = $type.":host=".$server.";dbname=mailing".$db.";charset=".$charset;

				
				//$mail->SMTPDebug = 3;                               // Enable verbose debug output

				/*
				$to = "christellebeernaert11@gmail.com";
				$from = "no-reply@supersiteproduit.com";

				$headers = "De: " . $from . "\r\n";

				$subject = "Valider votre adresse mail";
				$body = "Si cette adresse est bien la votre " . $_POST['email'] . ", cliquer sur ce lien" . "\r\n" . "";
				*/

				if( filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) )
				{ 
					$sql = "INSERT INTO users (mail, timing, validate)
					VALUES (:email, NOW(), '0')";

					 $req = $connexion->prepare($sql);
    				 $req->execute( array(':email' => $_POST['email']) );
    				 $lastId = $connexion->lastInsertId();

					// creation de mail

					$mail->isSMTP();                                      // Set mailer to use SMTP
					$mail->Host = 'smtp.mandrillapp.com';  // Specify main and backup SMTP servers
					$mail->SMTPAuth = true;                               // Enable SMTP authentication
					$mail->Username = 'alexandre@pixeline.be';                 // SMTP username
					$mail->Password = 'bDMUEuWn1H4r3FCGQjyO-g';                           // SMTP password
					$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
					$mail->Port = 587;                                    // TCP port to connect to

					$mail->setFrom('christellebeernaert11@gmail.com', 'Mailer');
					$mail->addAddress($_POST['email']);     // Add a recipient
				

		
					$mail->isHTML(true);                                  // Set email format to HTML

					$mail->Subject = 'Validation mail';
					$mail->Body    = 'Cliquez sur ce lien pour valider votre adresse mail ('. $_POST['email'] . ')' . '<a href="http://christellebeernaert.be/mailinglist/confirm.php?id='.$lastId.'"> Confirmer</a>';
					
				    if(!$mail->send()) {
					    echo "Le message n'a pas pu être envoyé.";
					    echo 'Erreur: ' . $mail->ErrorInfo;
					} else {
					    echo 'Une validation vous a été envoyé, confirmez dans les 30 minutes';


					}
				}
				else if(!empty($_POST['email']))
				{
				   echo "Il n'y a pas de mail au nom de (" . $_POST['email'] . ')';
				}


			


			
			?>


		

			<form method="POST">


				<div class="mail">
					<input id="mail" type="text" name="email" placeholder="Entrez votre adresse mail" >
					<input class="envoi" name="submit" type="submit" value="Envoyer">
				</div>



			</form>


			


		</div>
		
		

		


	</body>

</html>