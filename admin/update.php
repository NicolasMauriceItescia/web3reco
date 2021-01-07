<?php 
    function getBooks(){

        require("../included/dbconnect.php");
        $sql = "SELECT idProduct, nameProduct FROM produit";
        $result = $dbh->query($sql);
        var_dump($result);
        $booksTable = "";
        while ( ($entry = $result->fetch(PDO::FETCH_ASSOC)) != FALSE) {
            $booksTable .= '<option value='.$entry['idProduct'].'>'.$entry['nameProduct'].' '.$entry['idProduct'].'</option>';
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
                            require("../misc/formbuilder.php");
                            $form = new formBuilder();
                            //Get a list of options of couples [Book Name + Book ID] to choose from
                            getBooks();
                            //$idProduct = $_GET['idProduct'];
                            //Display form with the book array
                            $form->selectBook($booksTable);

                            //Get result

                            //Initiate SQL request with these values
                            
                            /* echo $form->editBook();
                            if(isset($_GET['namestring'])){
                                
                                $namestring = $_GET['namestring'];
                                $sql = "SELECT * FROM product WHERE nameProduct LIKE '%$namestring%'";
                                $result = $dbh->query($sql);
                                $resultTable = $result->fetchAll(PDO::FETCH_ASSOC);
                                foreach ($resultTable as $entry) {
                                    //var_dump($entry);
                                    echo '<li>'.$entry["nameProduct"].'</li><br>';
                                }
                            } */

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