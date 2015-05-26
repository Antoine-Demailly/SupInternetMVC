<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Welcome Home</title>
	<link rel="stylesheet" href="css/main.css">
</head>
<body>
	<h1>Welcome Home !</h1>
	
	<h2>Notifications:</h2>
	<?php
		if (isset($_SESSION['flashBag'])) {
	        echo '<div class="flashbag">';
	        foreach ($_SESSION['flashBag'] as $type => $flash) {
	            foreach ($flash as $key => $message) {
	                echo '<div class="'.$type.'" role="'.$type.'" >'.$message.'</div>';
	                // un fois affiché le message doit être supprimé
	                unset($_SESSION['flashBag'][$type][$key]);
	            }
	        }
	        echo '</div>';
	    }
    ?>

	<h2>Connexion</h2>
	<form action="?p=user_login" method="POST">
		<label for="pseudo">Pseudo: </label><input type="text" name="pseudo"><br>
		<label for="password">Password: </label><input type="password" name="password"><br>
		<input type="submit" value="Connexion">
	</form>
	<p>Admin 1234</p>
	
	<h2>Inscription</h2>
	<form action="?p=user_register" method="POST">
		<label for="pseudo">Pseudo: </label><input type="text" name="pseudo"><br>
		<label for="password">Password: </label><input type="password" name="password"><br>
		<label for="password-check">Password Check: </label><input type="password" name="password-check"><br>
		<label for="email">Email: </label><input type="email" name="email"><br>
		<input type="submit" value="Inscription">
	</form>

	<h2>Déconnexion</h2>
	<a href="?p=user_logout">Logout</a>


	<?php var_dump($_SESSION); ?>
</body>
</html>