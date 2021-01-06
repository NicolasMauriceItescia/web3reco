<?php 
    try{
        require("../included/dbconnect.php");
        $sql = "SELECT typeId, name FROM categorieprod";
        $result = $dbh->query($sql);
        $typesTable = "";
        while ( ($entry = $result->fetch(PDO::FETCH_ASSOC)) != FALSE) {
            $typesTable .= '<option value="'.$entry['typeId'].'">'.$entry['name'].'</option>';
        }
    }catch(Exception $e){
        $e->getMessage();
    }

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
    				<h2>Add products to inventory</h2>
                </header>
                <section>
                    <div class="operation">
                        <?php 
                            require("../misc/formbuilder.php");
                            $form = new formBuilder();
                            echo $form->addBook($typesTable);
                            
                        ?>

                    </div>
                    <div class="result">

                    </div>
                </section>
    			<ul>
                    <li class="back"><a href="../admin.php">Previous page</a></li>
                </ul>
    		</article>
    	</main>
    	<?php include_once("../included/footer.html") ?>
    </body>
</html>