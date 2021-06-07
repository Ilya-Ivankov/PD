<?php
session_start();//Начало сессии
require("connect.php");
$id_kurs_red = $_GET['id_kurs_red'];
$del = $pdo->query("DELETE FROM `std_1396_olymp`.`news` WHERE `news`.`id` = $id_kurs_red");
header('location: lk.php');
?>