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
<title>testwebsitek</title>
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
	<div class="roottop">管理室</div>
	
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
	<h2>お知らせ更新</h2>
	<form method="POST" action="writeinfo.php">
	<p><textarea name="infoText" rows="4" cols="40"></textarea></p>
	<p><input type="submit" value="送信"  name="infoSend" class="btn-dark"></p>
	</form>
	</div>
	
	
	<div class="main">
	<h2>成績表書込</h2>
	<p><select name="member">
	<option>
	<?php
	$sql2 = "select memberId,memberName
			from member;";
	$rs2 = $db->prepare($sql2);
	$rs2->execute();
	while($row = $rs->fetch(PDO::FETCH_ASSOC)){
	print(htmlspecialchars($row['memberName']));
	}
	?>
	</option></select></p>
	<?php print(htmlspecialchars($row)); ?>
	<form method="POST" action="writescore.php">
	会員番号
	<p><input type="text" name="memberId"></p>
	名前
	<p><input type="text" name="memberName"></p>
	決断力
	<select name="judge">
	<option value="S">"S"</option>
	<option value="A">"A"</option>
	<option value="B">"B"</option>
	<option value="C">"C"</option>
	<option value="D">"D"</option>
	</select>
	透明性
	<select name="clear">
	<option value="S">"S"</option>
	<option value="A">"A"</option>
	<option value="B">"B"</option>
	<option value="C">"C"</option>
	<option value="D">"D"</option>
	</select>
	協調性
	<select name="coop">
	<option value="S">"S"</option>
	<option value="A">"A"</option>
	<option value="B">"B"</option>
	<option value="C">"C"</option>
	<option value="D">"D"</option>
	</select>
	競争性
	<select name="compe">
	<option value="S">"S"</option>
	<option value="A">"A"</option>
	<option value="B">"B"</option>
	<option value="C">"C"</option>
	<option value="D">"D"</option>
	</select>
	発想力
	<select name="idea">
	<option value="S">"S"</option>
	<option value="A">"A"</option>
	<option value="B">"B"</option>
	<option value="C">"C"</option>
	<option value="D">"D"</option>
	</select>
	</p>
	<p>
	総合力
	<select name="total">
	<option value="S">"S"</option>
	<option value="A">"A"</option>
	<option value="B">"B"</option>
	<option value="C">"C"</option>
	<option value="D">"D"</option>
	</select>
	</p>
	<p>先生から一言</p>
	<textarea name="comment" rows="4" cols="40"></textarea>
	<p><input type="submit" value="送信" name="scoresend" class="btn-dark"></p>
	</form>
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