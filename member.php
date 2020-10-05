<?php header("Content-Type:text/html;charset=utf-8");
	
	$dsn = 'mysql:dbname=website;host=localhost';
	$user = '';
	$password = '';

    $db = new PDO($dsn, $user, $password);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sql = "select infoText, infoDate
			from info
			order by infoId DESC
			limit 5;";
	$rs = $db->prepare($sql);
	$rs->execute();
	
	$sql2 = "select memberId, memberName, judge, clear, coop, compe, idea, total
			from score 
			where total = 'D'
			order by memberId ;";
			
	$rs2 = $db->prepare($sql2);
	$rs2->execute();
 ?>
 
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>testwebsite</title>
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
	<h2>お知らせ</h2>
	<?php while($row = $rs->fetch(PDO::FETCH_ASSOC)){ ?>
	<p>
	<span class="infotext"><?php print($row['infoText']); ?></span>
	<?php print("　"); ?>
	<span class="infodate"><?php print($row['infoDate']); ?></span>
	</p>
	<?php } ?>
	</div>
	
	<div class="main">
	<h2>会員情報確認</h2>
	<div class="atext">会員番号を入力してください</div>
	<p><form method="POST" action="#/*test.php*/">
	<div class="abtn">
	<input type="text" name="num" value="システム調整中...">
	<input type="submit" value="確認" name="" class="btn-dark"></div>
	</form></p>
	</div>

	<div class="main">
	<h2>現在の会員上位者</h2>
	<div class="atext"><p>月に一度更新</p>
	<p>次回の評価判定日　<strong>1月1日</strong></p></div>
	<p></p>
	<?php while($row2 = $rs2->fetch(PDO::FETCH_ASSOC)){ ?>
	----------------------------------------------
	<p>学籍番号：	<?php print($row2['memberId']); ?></p>
	<p>名　　前：	<?php print($row2['memberName']); ?></p>
	<p>総合評価：	<?php print($row2['total']); ?></p>
	----------------------------------------------
	<?php } ?>
	</div>
	
	
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