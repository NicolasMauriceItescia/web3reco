<?php
    session_start();
    if(isset($_SESSION['connect'])){
        if($_SESSION['usertype']!='user'){
            header('location: index.php');
            exit();
        }
    }else{
        header('location: index.php');
        exit();
    }
