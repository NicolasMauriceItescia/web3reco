<?php 
    require("../included/dbconnect.php");
    require("../misc/formbuilder.php");   
    require("../included/checkifuser.php"); 
    $form = new formBuilder();
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
    				<h2>Search by name</h2>
    			</header>
                <section>
                    <div class="operation">
                        <?php
                            //form from misc/formbuilder.php      
                            echo $form->getBooksByName();    
                        ?>

                    </div>
                    <div class="result">
                        <ul>
            
                        <?php 
                            if(isset($_GET['namestring'])){
                                
                                //get the user entry
                                $namestring = $_GET['namestring'];

                                // Query 1 => get all the book with name like user entry
                                $sql = "SELECT * FROM product WHERE nameProduct LIKE '%$namestring%'";
                                $result = $dbh->query($sql);
                                $resultTable = $result->fetchAll(PDO::FETCH_ASSOC);

                                //Show list of books if query not empty
                                if(!empty($resultTable)){   
                                    foreach ($resultTable as $entry) {
                                        echo '<li>'.$entry["nameProduct"].'</li><br>';
                                    }
                                }else{
                                    echo 'No Book answering you research!';
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