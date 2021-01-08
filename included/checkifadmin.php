<?php
    //Start the session mechanism for the page calling this script
    session_start();
    if(isset($_SESSION['connect'])){ //If an account logged in from index.php, continue
        if($_SESSION['accounttype']!='admin'){ //Then if the account type is not an admin: redirect to index.php
            header('location: index.php');
            exit();
        }
    }else{ //Else if the accounttype is not defined, redirect to index.php
        header('location: index.php');
        exit();
    }
