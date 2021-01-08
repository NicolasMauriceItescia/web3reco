<?php 
	session_start();
    if(isset($_POST['username']) && isset($_POST['password'])){
		$username = htmlspecialchars($_POST['username']);
		$password = htmlspecialchars($_POST['password']);

		if($username=='john' && $password=="azert"){
			$_SESSION['connect'] = 1;
			$_SESSION['usertype'] = 'user';
			header('location: ./customer.php');
		}else if($username=='admin'&& $username=='root'){
			$_SESSION['connect'] = 1;
			$_SESSION['usertype'] = 'admin';
			header('location: ./admin.php');
		}else{
			header('location: index.php?error=1&message=Votre adresse email est invalide.');
			exit();
		}

	}
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Péhachepet Market - Accueil</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <link rel="stylesheet" type="text/css" href="./css/styles.css">
    </head>
    <body>
    	<?php include_once("./included/banner.html") ?>
    	<main>
    		<article>
    			<header class="sub-banner">
    				<h2>What do you want to do?</h2>
    			</header>
				<div>
					<form method="POST" action="index.php">
						<input type="text" name="username" placeholder="Username" required />
						<input type="password" name="password" placeholder="Password" required />
						<button type="submit">Login</button>
					</form>
				</div>
    		</article>
    	</main>
    	<?php include_once("./included/footer.html") ?>
    </body>
</html>