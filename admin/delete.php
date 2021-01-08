<?php 
    try{
        require("../included/checkifadmin.php");
        require("../included/dbconnect.php");
        require("../misc/formbuilder.php");
        $form = new formbuilder();
        $bookListSuppr="";
        
        // Query 1 => scrolling name of book
        $sql = "SELECT idProduct, nameProduct FROM Product ";
        $result = $dbh->query($sql);
        while(($oneBook = $result->fetch(PDO::FETCH_ASSOC)) !=FALSE){
            $bookListSuppr .= '<option value ='.$oneBook['idProduct'].' >' .$oneBook['nameProduct']. '</option>';
        };
        
        //---FUNCTIONS---//

        // Delete book selected in scrolling bar
        function deleteBook(PDO $dbh, $selectedBook){
            $sql = "DELETE FROM product WHERE idProduct='$selectedBook'";
            $result = $dbh->query($sql);
        }

        // Check if book erase from database
        function checkIfRemoved(PDO $dbh, $selectedBook){
            $sql = "SELECT idProduct FROM product WHERE idProduct='$selectedBook'";
            $result = $dbh->query($sql);
            if($result){
                return true;
            }else{
                return false;
            }
        }

        
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
                    <h2>Remove products from inventory</h2>
                </header>
                <section>
                    <div class = "operation">
                        <?php
                            // form scrolling name
                            // form from misc/formbuilder.php  
                            echo $form-> deleteBook($bookListSuppr);

                            //Remove the book + show messages
                            if(isset($_POST['bookToDelete'])){
                                $selectedBook = (string) filter_input(INPUT_POST,'bookToDelete',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                                deleteBook($dbh, $selectedBook);
                                if(checkIfRemoved($dbh, $selectedBook)){
                                    echo('<div class="success">Product removed</div>');
                                }else{
                                    echo('<div class="error">Error: The product still exists</div>');
                                }
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