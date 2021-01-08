<?php 
    try{
        require("../included/checkifadmin.php");
        require("../included/dbconnect.php");
        require("../misc/formbuilder.php");
        
        $form = new formBuilder();
        
        $typesTable = "";
        
        // Query 1 => show list by name of book types
        $sql = "SELECT typeId, name FROM categorieProd";
        $result = $dbh->query($sql);
        while ( ($entry = $result->fetch(PDO::FETCH_ASSOC)) != FALSE) {
            $typesTable .= '<option value="'.$entry['typeId'].'">'.$entry['name'].'</option>';
        }
    }catch(Exception $e){
        $e->getMessage();
    }

    //---FUNCTIONS---//


    function checkInput(PDO $dbh){
        if(isset($_POST['idProduct'])
        && isset($_POST['nameProduct'])
        && isset($_POST['description'])
        && isset($_POST['stock'])){

            // Assign result to variable
            $idProduct = $_POST['idProduct'];
            $nameProduct = $_POST['nameProduct'];
            $description = $_POST['description'];
            $fairtrade;
            // check is fairtrade is true or false 
            if(isset($_POST['fairtrade']) && $_POST['fairtrade'] == 'Yes'){$fairtrade = 1;}else{$fairtrade = 0;}
            $typeId = (string) filter_input(INPUT_POST, 'types', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $price = $_POST['price'];
            $stock = $_POST['stock'];
            // check if there is a discount
            if(!isset($_POST['discount'])){
                $discount = 0;
            }else{
                $discount = $_POST['discount'];
            }
            $discount = $_POST['discount'];
            
            // Query 1 => create book with attributs
            $sql = "INSERT INTO Product (idProduct, nameProduct, description, fairtrade, typeId, price, stock, discount) 
            VALUES ('$idProduct', '$nameProduct', '$description','$fairtrade','$typeId', '$price', '$stock', '$discount');";
            try{
                $dbh->query($sql);
            }catch(Exception $e){
                /* if(strpos("$e->getMessage()",'Duplicate entry')){
                    echo "<div class='error'>'An entry already exists with this ID'</div>";
                } */
                echo $e->getMessage();
            }
            
            
        }
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
                            // form edit new book with text field for attributs
                            // form from misc/formbuilder.php  
                            echo $form->addBook($typesTable);
                            checkInput($dbh);
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