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
<?php
	$id_users = $_SESSION["idS"];
	$id_news = $_GET['id_news'];
	$kurs = $pdo->query("SELECT `news`.`text` , `news`.`title` , `news`.`date` , `users`.`name` , `users`.`surname` , `kurs`.`title`
FROM `news`
INNER JOIN `users` ON `users`.`id` = `news`.`id_autor`
INNER JOIN `kurs` ON `kurs`.`id` = `news`.`kurs` WHERE `news`.`id` = $id_news");	
?>
<body>
    <div class="nofooter">
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
  							<?php
								$kurs_nemu = $pdo->query("SELECT * FROM `kurs`");
								while($kurs_M = $kurs_nemu->fetch(PDO::FETCH_ASSOC)){
									echo '<a class="dropdown-item" href="#">'.$kurs_M['title'].'</a>';
								}
							?>
                        </div>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="lk.php">Личный кабинет</a>
                    </li>

					  <li class="nav-item">
                        <a class="nav-link" href="news.php">Календарь мероприятий</a>
                    </li>
					    <li class="nav-item">
                        <a class="nav-link" href="contacts.php">Контакты</a>
                    </li>
					<li class="nav-item">
                        <a class="nav-link" href="exit.php">Выход</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
		<?php
		while($news = $kurs->fetch(PDO::FETCH_ASSOC)){
			echo '   <div class="main-container container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="mt-3">Новость</h1>
                <div class="card mt-3" onclick="window.location=\'#\'" style="position: relative; cursor: pointer;">
                    <div class="card-header bg-dark text-light">
                        Курс: '.$news['title'].'
                    </div>
                    <div class="card-body">
                        <blockquote class="blockquote mb-0">
                          <p>'.$news['text'].'</p>
                        </blockquote>
                      </div>
                      <div class="author_date">
                          <p>'.$news['name']." ".$news['surname'].'</p>
                          <p>'.$news['date'].'</p>
                      </div>
                </div>
            </div>
        </div>
    </div>';
			echo '<p>Курс: '.$news['title'].' Новость: '.$news['text'].'  АВТОР: '.$news['name']." ".$news['surname'].' ДАТА ПУБЛИКАЦИИ: '.$news['date'].' </p>';
		}
	?>
    <div class="main-container container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="mt-3">Новость</h1>
                <div class="card mt-3" onclick="window.location='news1.html'" style="position: relative; cursor: pointer;">
                    <div class="card-header bg-dark text-light">
                        Курс:
                    </div>
                    <div class="card-body">
                        <blockquote class="blockquote mb-0">
                          <p>Здесь будет описание данного курса</p>
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
                <p class="text-light text-center mt-5">Кафедра математики &#169;2021</p>
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