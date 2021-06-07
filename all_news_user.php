<?php
session_start();//Начало сессии
require("connect.php");
if(!isset($_SESSION['$emailS']) and !$_SESSION['nameS'] and !$_SESSION['statusS']){
	header('location: login_sot.php');
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Документ без названия</title>
</head>
<?php
	$id_users = $_SESSION["idS"];
	$kurs_news = $pdo->query("SELECT * FROM `news` WHERE `id_autor` = $id_users");
	$members2 = $pdo->query("SELECT * FROM `news` WHERE `id_autor` = $id_users")->rowCount();//кол-во записей в запросе
	echo $members2;
?>
<body>
	<h1>Мои новости:</h1>
	<?php
	$add2 = 0;

	if($members2 == 1){
	while($kurs_all = $kurs_news->fetch(PDO::FETCH_ASSOC)){
	echo "<p><a href='#'>".$kurs_all['title']."</a>  <a href='red_news.php?id_kurs_red=".$kurs_all['id']."'>редактировать</a>  <a href='del_news.php?id_kurs_red=".$kurs_all['id']."'>удалить</a></p>","<br>";
	$add2 = 0;
			}
		}
	else if($members2 == 0){
	echo "<p>У вас нет новостей!</p>","<br>";
	$add2 = 1;
	}
	if($add2 > 0){
		echo "<a href='add_news.php'>Добавить новость</a>";
	}
	else if($add2 == 0){
		echo "Больше 1 новости добовлять нельзя!";
	}
	?>
</body>
</html>