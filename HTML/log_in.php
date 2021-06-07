<?php
	session_start();//Начало сессии
	require("connect.php");
	if(isset($_SESSION['$emailS']) and $_SESSION['nameS'] and $_SESSION['statusS']){
		header('location: index.php');	
	}
	

	if($_SERVER['REQUEST_METHOD'] == 'POST'){
	if(isset($_POST['email']) && isset($_POST['password'])){//Условие, был ли запущен POST запрос из формы регистрации
	
	$email = $_POST['email'];
	$password = $_POST['password'];
	$status = $_POST['status'];
				
	$password = md5($password."dsf32dsaf12s");//Кодировка пароля
	
	$user = array();
	$found = $pdo->query("SELECT * FROM `users` WHERE `email` = '$email' AND `password` = '$password' AND `status` = '$status'");
	$user = $found->fetch(PDO::FETCH_ASSOC);

	if(count($user) > 0){
		$_SESSION['$emailS'] = $user['email'];
		$_SESSION['nameS'] = $user['name'];
		$_SESSION['surnameS'] = $surname['surname'];
		$_SESSION['statusS'] = $user['status'];
		$_SESSION['idS'] = $user['id'];
		
		}
	if (!$user){
		$fmsg = "Ошибка: проверте логин или пароль!";
	}
	if(isset($_SESSION['$emailS']) and $_SESSION['nameS'] and $_SESSION['statusS']){
	header('location: index.php');
	//	echo "<script>
	//	window.open('index.php', '_self')
	//	</script>";

	}
		}
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
    <title>Олимпиады - Вход</title>
</head>
<body>
    <div id="log">
        <form action="" method="post">
            <h1>Вход</h1>
            <div>
                <input type="email" name="email" id="email" value="example@mail.ru" style="width: 250px">
            </div>
            <div>
                <input type="password" name="password" id="password" value="Пароль" style="width: 250px">
            </div>
			<div>
		Статус:<select name="status" style="width: 250px" required>
		<option value = "">Выбрать</option>
		<option value="sot">Сотрудник</option>
		<option value="std">Студент</option>
		</select><br>	
			</div>
            <div class="lbut">
                <input type="submit" value="Войти" onclick="" class="bg-dark">
                <input type="button" value="Регистрация" onclick="window.location='registration.html'" class="bg-dark">
            </div>
			<?php
	if(isset($fmsg)){
?>		
		<div class="alert alert-danger" role="alert" style="margin-top: 15px; text-align: center; margin-left: 23px;">
                <?php echo $fmsg; ?>
        </div>
<?php
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
                            <a class="dropdown-item" href="">Выполните вход!</a>

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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>