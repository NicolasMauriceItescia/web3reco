<?php 
    
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Péhachepet Market - Administrator</title>
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
					<li><a href="./admin/insert.php">Add products to inventory</a></li>
					<li><a href="./admin/delete.php">Remove products from inventory</a></li>
                    <li><a href="./admin/update.php">Edit products</a></li>
					<li class="back"><a href="./index.php">Retour à l'accueil</a></li>
    			</ul>
    		</article>
    	</main>
    	<?php include_once("./included/footer.html") ?>
    </body>
</html>