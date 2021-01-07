<?php 
    require("../included/checkifuser.php"); 
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Péhachepet Market - Customer</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <link rel="stylesheet" type="text/css" href="../css/styles.css">
    </head>
    <body>
    	<?php include_once("../included/banner.html") ?>
    	<main>
    		<article>
    			<header class="sub-banner">
    				<h2>Search by description</h2>
    			</header>
                <section>
                    <div class="operation">
                        <?php 
                            require("../misc/formbuilder.php");
                            $form = new formBuilder();
                            echo $form->getBooksByDesc();
                            
                        ?>
                    </div>
                    <div class="result">
                        <ul>
                            <?php 
                                if(isset($_GET['namestring'])){
                                    require("../included/dbconnect.php");
                                    $namestring = $_GET['namestring'];
                                    $sql = "SELECT nameProduct, price FROM Product WHERE description LIKE '%$namestring%'";
                                    $result = $dbh->query($sql);
                                    $resultTable = $result->fetchAll(PDO::FETCH_ASSOC);
                                    foreach ($resultTable as $entry) {
                                        //var_dump($entry);
                                        echo '<li>'.$entry["nameProduct"].' prix:'.$entry["price"].'</li><br>';
                                    }
                                }
                            ?>
                        </ul>
                    </div>
                </section>
    			<ul>
                    <li class="back"><a href="../customer.php">Previous page</a></li>
                </ul>
    		</article>
    	</main>
    	<?php include_once("../included/footer.html") ?>
    </body>
</html>