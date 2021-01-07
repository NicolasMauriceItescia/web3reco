<?php 
	define('DB_HOST', 'localhost');
	define('DB_USER', 'usr_bobby');
	define('DB_PASSWORD', 'klm');
	define('DB_NAME', 'base3reco');
	define('DB_DSN', 'mysql:dbname='.DB_NAME.';host='.DB_HOST.';port=3306;charset=UTF8');

	try {
			$dbh = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
			$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch (Exception $e) {
			die('Erreur : '.$e->getMessage());
		}