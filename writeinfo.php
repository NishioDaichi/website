<?php
	$infoText = $_POST['infoText'];
	$infoDate = date("Y-m-d");
	
	$dsn = 'mysql:dbname=website;host=localhost';
	$user = '';
	$password = '';

    $db = new PDO($dsn, $user, $password);
    
	$sql = "INSERT INTO info(infoText, infoDate) "
		 . "VALUES(?, ?)";
	
	$data = array($infoText, $infoDate);
	
	
	$rs = $db->prepare($sql);
	
	$rs->execute($data);
	
	$db = null;
	
	header("location:root.php");
	