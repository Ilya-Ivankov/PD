<?php
session_start();//Начало сессии
require("connect.php");
$kurs_id = $_GET['kurs_id'];
$id_users = $_SESSION["idS"];

$del = $pdo->query("DELETE FROM `std_1396_olymp`.`kurs` WHERE `kurs`.`id` = $kurs_id");
$del_user_kurs = $pdo->query("DELETE FROM `std_1396_olymp`.`kurs_user` WHERE  `kurs_user`.`id_kurs` = $kurs_id");
$del_user_news = $pdo->query("DELETE FROM `std_1396_olymp`.`news` WHERE  `news`.`kurs` = $kurs_id");
header('location: lk.php');
?>