<?php
	$memberName = $_POST['memberName'];
	
	
	$dsn = 'mysql:dbname=website;host=localhost';
	$user = '';
	$password = '';

    $db = new PDO($dsn, $user, $password);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	
	
	$sql = "INSERT INTO member(memberName)
		 	VALUES(?)";
	
	$data = array($memberName);
	
	
	$rs = $db->prepare($sql);
	
	$rs->execute($data);
	
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>g8 promotion network</title>
<!--reset-->
<link href="css/reset.css" rel="stylesheet">
<!-- Bootstrap -->
<link href="css/bootstrap-4.3.1.css" rel="stylesheet">
<!--css-->
<link href="css/style.css" rel="stylesheet" type="text/css">
</head>
<body>
<header>
	<h1>testwebsite</h1>
</header>

<nav class="navbar navbar-expand-lg navbar-light bg-light"> <a class="navbar-brand" href="index.php"><img src="images/logo.png" alt=""/></a>
		<button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#Navber" aria-controls="Navber" aria-expanded="false" aria-label="ナビゲーションの切替"> <span class="navbar-toggler-icon"></span> </button>
		<div class="collapse navbar-collapse" id="Navber">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item"> <a class="nav-link" href="main.php">概要</a> </li>
				<li class="nav-item"> <a class="nav-link" href="teacher.php">役員紹介</a> </li>
				<li class="nav-item"> <a class="nav-link" href="business.php">事業紹介</a> </li>
				<li class="nav-item"> <a class="nav-link" href="newmember.php">会員登録</a> </li>
			</ul>
			<form class="form-inline my-2 my-lg-0" method="POST" action="index.php">
				
				<input type="text" name="pass" >
				<input type="submit" value="ログイン" name="login" class="btn-dark">
				
			</form>
		</div>
		<!-- /.navbar-collapse --> 
	</nav>

<?php
$err = "";

	if(isset($_POST['login'])) {
		if($_POST['pass'] == "pass") {
			header("Location: member.php");
			exit; }
		$err = "パスワードが間違っています";
		if($_POST['pass'] == "root") {
			header("Location: root.php");
			exit; }
		$err = "パスワードが間違っています";
	}
?>

<?php	
	if($err){ ?>
	<script>
      alert('<?php if($err){echo $err;} ?>');
    </script>
	<?php } 
?>

<div class="col-lg-8 offset-lg-2 contens">


	<div class="main">
	<h2>新規会員登録</h2>
	
	<p>登録完了しました</p>
	
	<p>名前：
	<?php
	$sql2 = "select memberName
			from member
			order by memberName DESC
			limit 1;";
	$rs2 = $db->prepare($sql2);
	$rs2->execute();
	 while($row2 = $rs2->fetch(PDO::FETCH_ASSOC)){
	print($row2['memberName']);
	 }
	?></p>
	
	
	<p>会員番号：
	<?php
	$sql3 = "select memberId
			from member
			order by memberId DESC
			limit 1;";
	$rs3 = $db->prepare($sql3);
	$rs3->execute();
	while($row3 = $rs3->fetch(PDO::FETCH_ASSOC)){
	print($row3['memberId']);
	 }
	?></p>
	</div>
	
	<div class="logintext">ログインパスワードは<strong>pass</strong>です
	<p>お忘れのない様お願い致します</p></div>
	
	<p><a href="index.php"><button  class="btn-dark">トップページに戻る</button></a></p>

	<?php $db = null; ?>

</div>
<footer>
	<p><small>copyright testwebsite All Right Reseved.</small></p>
</footer>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
<script src="js/jquery-3.3.1.min.js"></script> 
<script src="js/jquery.easing.1.3.js"></script> 
<!-- Include all compiled plugins (below), or include individual files as needed --> 
<script src="js/popper.min.js"></script> 
<script src="js/bootstrap-4.3.1.js"></script> 
<!--スムーススクロール用--> 
<script src="js/smoothscroll.js"></script>
<!--ページの先頭へ戻る--> 
<script src="js/totop.js"></script>
</body>
</html>
	