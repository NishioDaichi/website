<?php
	$num = htmlspecialchars($_POST['num']);

	
	$dsn = 'mysql:dbname=website;host=localhost';
	$user = '';
	$password = '';

    $db = new PDO($dsn, $user, $password);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	$sql = "select memberId
			from score;";
	
	
	$rs = $db->prepare($sql);
	
	$rs->execute();
	
	
	header("Location: score.php?memberId=<?php print($num); ?>");
	
	?>
	