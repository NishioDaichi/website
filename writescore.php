<?php 
	
	$memberId = $_POST['memberId'];
	$memberName = $_POST['memberName'];
	$judge = $_POST['judge'];
	$clear = $_POST['clear'];
	$coop = $_POST['coop'];
	$compe = $_POST['compe'];
	$idea = $_POST['idea'];
	$total = $_POST['total'];
	$comment = $_POST['comment'];
	
	
	$dsn = 'mysql:dbname=website;host=localhost';
	$user = '';
	$password = '';

    $db = new PDO($dsn, $user, $password);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	$sql = "INSERT INTO score(memberId, memberName, judge, clear, coop, compe, idea, total, comment)
			VALUES(?,?,?,?,?,?,?,?,?);";
	
	
	$data = array($memberId, $memberName,$judge,$clear,$coop,$compe,$idea,$total,$comment);
	
	$rs = $db->prepare($sql);
	$rs->execute($data);
	
	
	
	header("location:root.php");
	

 