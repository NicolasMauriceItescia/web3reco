<?php 
    try{
        require("../included/dbconnect.php");
        require("../misc/formbuilder.php");

        $form = new formbuilder();
        $booksTable="";
        $bookTypes="";
        $test = "";
        $idProduct = "";
        $nameProduct ="" ;
        $description = "";
        $price = "";
        $stock = "";
        $typeId ="";
        $fairtrade ="";
        $discount ="";
        //Get a list of options of couples [Book Name + Book ID] to choose from
        $sql = "SELECT * FROM Product ";
        $result = $dbh->query($sql);
        while ( ($entry = $result->fetch(PDO::FETCH_GROUP)) != FALSE) {
            $booksTable .= '<option value='.$entry['idProduct'].'>'.$entry['nameProduct'].'</option>';
        }

        $sql = "SELECT name, typeId FROM CategorieProd"; 
        $result = $dbh->query($sql);
        // Show all the categories
        while ( ($oneType = $result->fetch(PDO::FETCH_ASSOC)) != FALSE) {
            $bookTypes .= '<option value ='.$oneType['typeId'].' >' .$oneType['name']. '</option>';
        };
        
    }catch(Exception $e){
        echo '<!DOCTYPE html>';
        echo '<html lang="fr"><head>';
        echo '<meta charset="utf-8">';
        echo '<title>Problème rencontré</title>';
        echo '</head><body>';
        echo '</body></html>';

        // Stop script
        die;
    }
    function checkInput(PDO $dbh, $selectedBook){
        if(isset($_POST['idProduct'])
        && isset($_POST['nameProduct'])
        && isset($_POST['description'])
        && isset($_POST['stock'])){
            $idProduct = $_POST['idProduct'];
            $nameProduct = $_POST['nameProduct'];
            $description = $_POST['description'];
            $fairtrade;
            if(isset($_POST['fairtrade'])){$fairtrade = 1;}else{$fairtrade = 0;}
            $typeId = (string) filter_input(INPUT_POST, 'types', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $price = $_POST['price'];
            $stock = $_POST['stock'];
            $discount = $_POST['discount'];

            $sql = "UPDATE Product SET idProduct='$idProduct' , nameProduct='$nameProduct' , description='$description' , fairtrade='$fairtrade' , typeId='$typeId', price='$price' , stock='$stock' , discount='$discount' WHERE idProduct='$selectedBook'" ;

            try{
                $dbh->query($sql);
            }catch(Exception $e){
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
                    <h2>Edit products</h2>
                </header>
                <section>
                    <div class="operation">
                        <?php 
                            //Display form with the book array
                            echo $form->getSelect($booksTable);
                            if(isset($_GET['list'])){
                                //Get result
                                $selectedBook = (string)filter_input(INPUT_GET,'list',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                                $sql = "SELECT * FROM Product WHERE idProduct='$selectedBook'";
                                $result = $dbh->query($sql);

                                while ( ($entry = $result->fetch(PDO::FETCH_GROUP)) != FALSE) {
                                    $idProduct .= $entry['idProduct'];
                                    $nameProduct .= $entry['nameProduct'];
                                    $description .= $entry['description'];
                                    $price .= $entry['price'];
                                    $stock .= $entry['stock'];
                                    $typeId .= $entry['typeId'];
                                    $fairtrade .= $entry['fairtrade'];
                                    $discount .= $entry['discount'];
                                }
                                echo $form->editBook($bookTypes, $idProduct,$nameProduct,$description,$fairtrade,$typeId,$price,$stock,$discount);
                                checkInput($dbh, $selectedBook);
                            }
                        ?>
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