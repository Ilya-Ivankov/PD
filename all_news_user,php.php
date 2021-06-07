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
	$kurs = $pdo->query("SELECT * FROM `news` WHERE `id_users` = $id_users");
	$members = $pdo->query("SELECT * FROM `news` WHERE `id_users` = $id_users")->rowCount();//кол-во записей в запросе
?>
<body>
	<h1>Мои новости:</h1>
	<?php
	$add = 0;
	 if($members > 1){
	while($kurs_all = $kurs->fetch(PDO::FETCH_ASSOC)){
	echo "<p><a href='#'>".$kurs_all['title']."</a>  <a href='red_kurs.php?kurs_id=".$kurs_all['id']."'>редактировать</a>  <a href='del_kurs.php?kurs_id=".$kurs_all['id']."'>удалить</a></p>","<br>";
	$add = 0 ;
			}	
	}
	else if($members != 0){
	while($kurs_all = $kurs->fetch(PDO::FETCH_ASSOC)){
	echo "<p><a href='#'>".$kurs_all['title']."</a>  <a href='red_kurs.php?kurs_id=".$kurs_all['id']."'>редактировать</a>  <a href='del_kurs.php?kurs_id=".$kurs_all['id']."'>удалить</a></p>","<br>";
	$add = 1;
			}
		}
	else if($members == 0){
	echo "<p>У вас нет курсов</p>","<br>";
	$add = 1;
	}
	if($add > 0){
		echo "<a href='add_kurs.php'>Добавить курс</a>";
	}
	else if($add == 0){
		echo "Больше 5 курсов добовлять нельзя!";
	}
	?>
</body>
</html>