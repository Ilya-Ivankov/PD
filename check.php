<?php
	session_start();//Начало сессии
	require("connect.php");
	
	if(isset($_SESSION['$emailS']) and $_SESSION['nameS'] and $_SESSION['statusS'] == 'std'){
		header('location: index_std.php');
	}
	else if(isset($_SESSION['$emailS']) and $_SESSION['nameS'] and $_SESSION['statusS'] == 'sot'){
		header('location: index_sot.php');
	}
	else{
		header('location: login_sot.php');
	}
?>