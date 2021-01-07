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

    function checkInput(PDO $dbh){
        if(isset($_POST['idProduct'])
        && isset($_POST['nameProduct'])
        && isset($_POST['description'])
        && isset($_POST['stock'])){
            $idProduct = $_POST['idProduct'];
            $nameProduct = $_POST['nameProduct'];
            $description = $_POST['description'];
            $fairtrade;
            if(isset($_POST['fairtrade']) && $_GET['fairtrade'] == 'Yes'){$fairtrade = 1;}else{$fairtrade = 0;}
            $typeId = (string) filter_input(INPUT_POST, 'types', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $price = $_POST['price'];
            $stock = $_POST['stock'];
            if(!isset($_POST['discount'])){
                $discount = 0;
            }else{
                $discount = $_POST['discount'];
            }
            $discount = $_POST['discount'];

            $sql = "INSERT INTO Product (idProduct, nameProduct, description, fairtrade, typeId, price, stock, discount) 
            VALUES ('$idProduct', '$nameProduct', '$description','$fairtrade','$typeId', '$price', '$stock', '$discount');";
            try{
                $dbh->query($sql);
            }catch(Exception $e){
                /* if(strpos("$e->getMessage()",'Duplicate entry')){
                    echo "<div class='error'>'An entry already exists with this ID'</div>";
                } */
                echo $e->getMessage()
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
                            require("../misc/formbuilder.php");
                            $form = new formBuilder();
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