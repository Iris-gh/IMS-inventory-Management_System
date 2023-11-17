<?php
	// Connect to database
	try{
		$pdo = new PDO(DSN, DB_USER, DB_PASSWORD);
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} catch(PDOException $e){
		$errorMessage = $e->getMessage();
		echo $errorMessage;
		exit();
	}

?>
