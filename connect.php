<?php
	$host = 'std-mysql';
    $db   = 'std_1396_olymp';
    $user = 'std_1396_olymp';
    $pass = '89161184027';
    $charset = 'utf8';
    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
    $pdo = new PDO($dsn, $user, $pass);
?>