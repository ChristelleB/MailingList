<?php
include_once('include/initialization.php');
if($admins = getConnectedUser($connexion)){
	redirectTo('index.php');
}

$errors = array();

if(!empty($_POST)){
	if(empty($_POST['login'])){
		$errors['login'] = 'Le login est obligatoire';
	}

	if(empty($_POST['password'])){
		$errors['password'] = 'Le password est obligatoire';
	}

	if(empty($errors)){
		$sql = 'SELECT * FROM admins WHERE login = :login';
		$preparedStatement = $connexion->prepare($sql);
		$preparedStatement->bindValue(':login', $_POST['login']);
		$preparedStatement->execute();
		$admin = $preparedStatement->fetch();
		if(!empty($admin)
		&& ($_POST['password'] == $admin['password'])){
			$_SESSION['user_secret'] = $admin['secret'];
			redirectTo('connect.php');
		}
	}
}
?>


<!doctype html>
<html class="no-js" lang="fr">
<head>
		<meta charset="UTF-8">
		<title>Login admin</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!-- Link -->
		<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
		<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/grids-responsive-min.css">
		
		<link rel="stylesheet" type="text/css" href="style.css">

</head>
<body>

  	<div class="container_log">

  		 <h1>Login</h1>

			<?php foreach($errors as $error): ?>
				<div class="alert error"><?php echo $error; ?></div>
			<?php endforeach; ?>

		  <form method="post" action="">
		    <div class="field">
		      <label>Login Administrateur</label>
		      <input class="champ" type="text" name="login" />
		    </div>

		    <div class="field">
		      <label>Mot de passe</label>
		      <input class="champ" type="password" name="password" />
		    </div>

				<div class="field">
		      <input type="submit" class="button" name="envoyer" />
		    </div>

		  </form>
		</div>

</body>
</html>
