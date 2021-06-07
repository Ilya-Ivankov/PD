<?php
session_start();//Начало сессии
require("connect.php");

?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Олимпиады - Главная</title>
</head>
<body>
    <div class="nofooter">
   <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="index.php"><img src="img/logo.png" alt="" height="40px"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item ">
                        <a class="nav-link" href="index.php">Главная</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Олимпиады
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
  							<?php
								$kurs_nemu = $pdo->query("SELECT * FROM `kurs`");
								while($kurs_M = $kurs_nemu->fetch(PDO::FETCH_ASSOC)){
									echo '<a class="dropdown-item" href="kurs.php?kurs_id='.$kurs_M['id'].'">'.$kurs_M['title'].'</a>';
								}
							?>
                        </div>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="lk.php">Личный кабинет</a>
                    </li>

					  <li class="nav-item">
                        <a class="nav-link" href="news.php">Календарь мероприятий</a>
                    </li>
					    <li class="nav-item active">
                        <a class="nav-link" href="contacts.php">Контакты</a>
                    </li>
					<li class="nav-item">
						<?php
						if(!isset($_SESSION['$emailS']) and !$_SESSION['nameS'] and !$_SESSION['statusS']){
							echo '<a class="nav-link" href="login_sot.php">Вход</a>';
						}
						else{
							echo '<a class="nav-link" href="exit.php">Выход</a>';
						}
						?>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="main-container container">
        <h1 class="text-center mt-3">Контакты</h1>
        <p class="tel_number">Ректор по образовательной работе: <a href="tel:+79270089382">8(927)008-93-82</a></p>
        <p class="tel_number">Секретарь: <a href="tel:+79270089382">8(927)008-93-82</a></p>
        <p class="tel_number">По вопросам получения призов обращаться к Елене Анатольевне: <a href="tel:+79270089382">8(927)008-93-82</a></p>
        <p class="tel_number">По вопросам работы сайта обращаться к Анастасии Владимировне: <a href="tel:+79636521241">8(963)652-12-41</a></p>
        <h1 class="text-center">Адреса</h1>
        <iframe src="https://yandex.ru/map-widget/v1/?um=constructor%3A164cdcc6008eabd1f1e9b6e0ccb21bbbb04225bfa0fe7b47497ebdd71cb4914f&amp;source=constructor" width="100%" height="400" frameborder="0" class="mb-5"></iframe>
    </div>
    </div>
    <footer class="bg-dark">
        <div class="row mx-auto">
            <div class="col-md-4">
                <p class="text-light text-center mt-5">Московский политех &#169;2021</p>
            </div>
            <div class="col-md-4 text-center align-self-center">
                <img src="img/logo.png" alt="" width="200px">
            </div>
            <div class="col-md-4">
                <h5 class="text-light text-center mt-2">Контакты</h5>
                <p class="text-light">Тел: <a href="tel:+84956839983" class="text-light">(495) 683-99-83*329</a></p>
                <p class="text-light">Адрес: г. Москва, ул. Павла Корчагина, д.22, ауд. 2ПК309</p>
            </div>
        </div>           
    </footer>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>