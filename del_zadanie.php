<?php
session_start();//Начало сессии
require("connect.php");
$kurs_id = $_GET['kurs_id'];
$id_users = $_SESSION["idS"];
$del = $pdo->query("DELETE FROM `std_1396_olymp`.`link_work` WHERE `link_work`.`id_kurs` = $kurs_id AND `link_work`.`id_user` = $id_users");
header('location: kurs.php?kurs_id='.$kurs_id.'');
?>