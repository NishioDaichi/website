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
 ?>
 
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>twstwebsite</title>
<!--reset-->
<link href="css/reset.css" rel="stylesheet">
<!-- Bootstrap -->
<link href="css/bootstrap-4.3.1.css" rel="stylesheet">
<!--設定用css-->
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
	<h2>授業紹介</h2>
		授業内容の一部を紹介します
		<div class="atext"><img src="images/study.png"  class="img-fluid">
		<p>周辺地域のゴミを拾っています</p></div>
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