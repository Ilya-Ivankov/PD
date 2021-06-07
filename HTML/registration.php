<?php
	session_start();//Начало сессии

	require("connect.php");
		if(isset($_SESSION['$emailS']) and $_SESSION['nameS'] and $_SESSION['statusS']){
		header('location: index.php');	
	}
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Олимпиады - Регистрация</title>
</head>
<?php
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
	if(isset($_POST['email']) && isset($_POST['password'])){//Условие, был ли запущен POST запрос из формы регистрации
	$name = $_POST['name'];//Определяются переменные
	$surname = $_POST['surname'];
	$email = $_POST['email'];
	$status = $_POST['status'];
	$password = $_POST['password'];
	$password2 = $_POST['password2'];

	if($password === $password2){
	
	$password = md5($password."dsf32dsaf12s");//Кодировка пароля

	$input = $pdo->query("INSERT INTO `olymp`.`users` (`id`, `name`, `surname`, `email`, `status`, `password`)
	VALUES (NULL, '$name', '$surname', '$email', '$status', '$password');");//QUERY запрос на добавление пользователя в БД

	if($input){//Ответ на регистрацию
		$smsg = "Регистрация прошла успешно";
	}
	}
	else{
		$fsmsg = "Ошибка регистрации, пароли не совпадают!";
	}
		}
	}
?>
<body>
    <div id="reg">
        <form action="" method="post">
            <h1>Регистрация</h1>
            <div>
                <p>Имя:</p>
                <input type="text" name="name" id="name"class="" placeholder="Введите имя" minlength="2" required>
            </div>
            <div>
                <p>Фамилия:</p>
                <input type="text" name="surname" id="surname"lass="" placeholder="Введите фамилию" minlength="2" required>
            </div>
            <div>
                <p>Логин:</p>
                <input type="email" id="email" name="email" class="" placeholder="Введите логин" required>
            </div>
            <div>
                <p>Статус:</p>
                <select name="status" required>
					<option value = "">Выбрать</option>
                    <option value="sot">Сотрудник</option>
                    <option value="std">Студент</option>
                </select>
            </div>
            <div>
                <p>Пароль:</p>
                <input type="password" id="password" name="password" class="" placeholder="Введите пароль" minlength="6" required>
            </div>
            <div>
                <p>Повторите пароль:</p>
                <input type="password" id="password2" name="password2" class="" placeholder="Повторите пароль" required>
            </div>
            <div class="rbut">
                <input type="button" value="Есть аккаунт?" onclick="window.location='login_sot.php'" class="bg-dark">
                <input type="submit" value="Зарегистрироватся" class="bg-dark">
            </div>
<?php
	if(isset($smsg)){

          echo '<div class="alert alert-success" role="alert" style="margin-top: 15px; text-align: center;">
                '.$smsg.'
                <input type="button" value="Войти" onclick="window.location=\'login_sot.php\'" class="bg-success">
            </div>';

	}
	if(isset($fsmsg)){
		echo '            <div class="alert alert-danger" role="alert" style="margin-top: 15px; text-align: center;">
                '.$fsmsg.'
            </div>';
				
	}		
	
?>
        </form>
    </div>
    
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="index.html"><img src="img/logo.png" alt="" height="40px"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.html">Главная</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Олимпиады
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Русский язык</a>
                            <a class="dropdown-item" href="#">Математика</a>
                            <a class="dropdown-item" href="#">Физика</a>
                        </div>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Личный кабинет</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Контакты</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="main-container container">
        <div class="row">
            
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>