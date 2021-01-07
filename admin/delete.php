<?php 
    try{
        require("../included/dbconnect.php");
        require("../misc/formbuilder.php");
        $form = new formbuilder();
        $sql = "SELECT typeId, name FROM Product ORDER BY "
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
                            echo $form-> getBooksByCat();
                        ?>
                    </div>
                    <div class = "result">

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