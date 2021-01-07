<?php 
    try{
        require("../included/dbconnect.php");
      
        $bookTypes="";
        
        
        // Query 1 => categories scroll
        $sql = "SELECT name, typeId FROM CategorieProd"; 
        $result = $dbh->query($sql);
        // Show all the categories
        while ( ($oneType = $result->fetch(PDO::FETCH_ASSOC)) != FALSE) {
            $bookTypes .= '<option value ='.$oneType['typeId'].' >' .$oneType['name']. '</option>';
        }

        function checkInput($dbh){
            
        }

        $dbh = null;
    }catch (Exception $e) {
        // Error handeling
        echo '<!DOCTYPE html>';
        echo '<html lang="fr"><head>';
        echo '<meta charset="utf-8">';
        echo '<title>Problème rencontré</title>';
        echo '</head><body>';

        //Encoding error type
        echo '<p>' . mb_convert_encoding($e->getMessage(), 'UTF-8', 'Windows-1252') . '</p>';
        
        // Synthaxe error type
        if (isset($dbh) && $dbh->errorInfo()[0] == "42000") {
            echo '<p>Erreur de syntaxe dans la requête SQL :</p>';
            echo '<pre>' . $sql . '</pre>';
        }
        echo '</body></html>';

        // Stop script
        die;
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
    				<h2>Search by category</h2>
    			</header>
                <section>
                    <div class="operation">
                        <?php 
                            require("../misc/formbuilder.php");
                            $form = new formBuilder();
                            echo $form->getBooksByCat($bookTypes);
                            
                                
                        ?>
                    </div>
                    <div class="result">
                        <ul>
                            <?php
                            require("../included/dbconnect.php");
                            $selectedTypeId = (string) filter_input(INPUT_GET,'namestring',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                            // Query 3 => show books of categorie choosen
                            $bookList = "";
                            $sql="SELECT nameProduct, price FROM Product WHERE typeId ='$selectedTypeId'";
                            echo $sql;
                            $result = $dbh->query($sql);
                            echo $result;
                             $resultTable = $result->fetchAll(PDO::FETCH_ASSOC);
                                foreach ($resultTable as $entry) {
                                    //var_dump($entry);
                                    echo '<li>'.$entry["nameProduct"].'</li><br>';
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