<?php
    session_start();
    if(isset($_SESSION['connect'])){
        if($_SESSION['usertype']!='admin'){
            header('location: index.php');
            exit();
        }
    }else{
        header('location: index.php');
        exit();
    }