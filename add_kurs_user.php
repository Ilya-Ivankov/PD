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
	$kurs_id = $_GET['kurs_id'];
	$add_kurs = $_POST['add_kurs'];
	$id_users = $_SESSION["idS"];
	if(isset($add_kurs)){
		$check_user_kurs = $pdo->query("SELECT * FROM `kurs_user` WHERE `id_user` = $id_users AND `id_kurs` = $kurs_id");
		$members = $pdo->query("SELECT * FROM `kurs_user` WHERE `id_user` = $id_users AND `id_kurs` = $kurs_id")->rowCount();//кол-во записей в запросе
		
		echo $members;
		if($members == 1){
			$fmsg = "Вы уже были записаны на данный курс!";
		}
		else{
			$add_user_kurs = $pdo->query("INSERT INTO `std_1396_olymp`.`kurs_user` (`id`, `id_user`, `id_kurs`) VALUES (NULL, '$id_users', '$kurs_id');");
			$msg = "Вы были успешно записаны на курс.";
		}
	}
?>
<body>
	
	<form action="" method="post">
		<input type="hidden" name="add_kurs" value="true">
		<input type="submit" value="Записатся">
	</form>
<?php
	if(isset($fmsg)){
		echo "<div>".$fmsg."</div>";
	}
		if(isset($msg)){
		echo "<div>".$msg."</div>";
	}
?>
</body>
</html>