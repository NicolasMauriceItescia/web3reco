<?php


?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Formulaire post</title>
</head>
<body>
	<h1>Formulaire post</h1>
		<form action="reponsepost.php" method="post"> <!--la réponse va être envoyer à "action". POST: analyse puis envois les données appropriés -->
			<!-- <label for="name">Nom :</label> -->
        	<input type="text" id="name" name="Coordonnée">
        	<button type="submit">Envoyer</button>
		</form>
</body>

</html>