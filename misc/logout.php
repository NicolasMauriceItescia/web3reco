<?php
	session_start();
	session_unset(); //Disable session
	session_destroy(); //Destroys session
	header('location: ../index.php');
?>