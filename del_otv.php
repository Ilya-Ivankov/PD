<?php
session_start();//Начало сессии
require("connect.php");
$kurs_id = $_GET['kurs_id'];
$otv_id = $_GET['otv_id'];
$id_users = $_SESSION["idS"];
$del = $pdo->query("DELETE FROM `std_1396_olymp`.`otv` WHERE `otv`.`id` = $otv_id");
header('location: kurs.php?kurs_id='.$kurs_id.'');
?>