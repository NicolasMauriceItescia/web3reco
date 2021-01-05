<?php 
    
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Péhachepet Market - Customer</title>
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
    			<ul>
					<li><a href="./customer/searchbycat.php">Search by category</a></li>
					<li><a href="./customer/searchnamedesc.php">Search by name or description</a></li>
					<li class="back"><a href="index.php">Retour à l'accueil</a></li>
    			</ul>
    		</article>
    	</main>
    	<?php include_once("./included/footer.html") ?>
    </body>
</html>