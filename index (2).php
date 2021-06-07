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
                    <li class="nav-item dropdown active">
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
					    <li class="nav-item">
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
        <div class="row">
            <div class="col-md-9">
                <h1 class="text-center mt-4">Олимпиада студентов Политеха</h1>
                <p class="main-text">Олимпиада студентов Политеха проводится с 2021 года под девизом «via scientiarum», что в переводе с латыни означает «путь к знаниям». Она помогает студентам расскрыть свой потенциал и получить уважение преподавателей и однокурсников. Победители и призеры награждаются мерчом с символикой Московского Политеха. Так же победителей ждет поездка в летний лагерь со множеством интересных мастер-классов.</p>
                <hr>
                <h3 class="text-center">По итогам участия можно получить:</h3>
                <div class="row">
                    <div class="col-md-4 mb-2">
                        <div class="card">
                            <img src="img/cloth1.jpg" alt="">
                            <p class="text-center">Женская толстовка</p>
                        </div>
                    </div>
                    <div class="col-md-4 mb-2">
                        <div class="card">
                            <img src="img/cloth2.jpg" alt="">
                            <p class="text-center">Мужская  толстовка</p>
                        </div>
                    </div>
                    <div class="col-md-4 mb-2">
                        <div class="card">
                            <img src="img/cloth3.jpg" alt="">
                            <p class="text-center">Женская рубашка поло</p>
                        </div>
                    </div>
                    <div class="col-md-4 mb-2">
                        <div class="card">
                            <img src="img/cloth4.jpg" alt="">
                            <p class="text-center">Женская толстовка</p>
                        </div>
                    </div>
                    <div class="col-md-4 mb-2">
                        <div class="card">
                            <img src="img/cloth5.jpg" alt="">
                            <p class="text-center">Мужская толстовка</p>
                        </div>
                    </div>
                    <div class="col-md-4 mb-2">
                        <div class="card">
                            <img src="img/cloth6.jpg" alt="">
                            <p class="text-center">Мужская футболка</p>
                        </div>
                    </div>
                </div>
                <h3 class="text-center">Как участвовать в олимпиаде:</h3>
                <h5><span class="text-info">Шаг 1. </span>Зарегистрируйтесь</h5>
                <p>Пройдите быструю регистрацию после чего вы сможете принять участие в любой олимпиаде</p>
                <h5><span class="text-info">Шаг 2. </span>Выберите интересующий вас предмет</h5>
                <p>Вы можете выбрать любой предмет, нажав на вкладку "Олимпиады" или перейдя к олимпиаде с вкладок "Календарь мероприятий" или "Главная"</p>
                <h5><span class="text-info">Шаг 3. </span>Запишитесь на курс</h5>
                <p>Нажмите на кнопку "Записаться на курс"</p>
                <h5><span class="text-info">Шаг 4. </span>Примите участие</h5>
                <p>В день начала олимпиады на вкладке с ней появится ссылка. Перейдите по ней и покажите на что способны</p>
            </div>
            <div class="col-md-3">
                <h1 class="mt-3">Новости</h1>
                <div class="card mt-3" onclick="window.location='news1.html'" style="position: relative; cursor: pointer;">
                    <div class="card-header bg-dark text-light">
                        Открылся сайт
                    </div>
                    <div class="card-body">
                      <blockquote class="blockquote mb-0">
                        <p>Начинает работу сайт с олимпиадами Московского политеха...</p>
                      </blockquote>
                    </div>
                    <div class="author_date">
                        <p>Автор</p>
                        <p>12.06.21</p>
                    </div>
                </div>
                <div class="card mt-3 mb-3">
                    <div class="card-header bg-dark text-light">
                        Открылся сайт
                    </div>
                    <div class="card-body">
                      <blockquote class="blockquote mb-0">
                        <p>Начинает работу сайт с олимпиадами Московского политеха... пропорпаорорпоарпорапорпораорпораоп паропароап рап апоропа паорапо ар параопр апопа рапорапо  hgfjghgfjh gffgjhgj fgjghj</p>
                      </blockquote>
                    </div>
                    <div class="author_date">
                        <p>Автор</p>
                        <p>12.06.21</p>
                    </div>
                </div>
            </div>
        </div>
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