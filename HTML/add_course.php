<?php
session_start();//Начало сессии
require("connect.php");
if(!isset($_SESSION['$emailS']) and !$_SESSION['nameS'] and !$_SESSION['statusS']){
	header('location: login_sot.php');
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <title>Олимпиады - Главная</title>
  <script>
    function resizeBody() {
      if (!document.getElementById('cont_course'))
				return;
			var obj = document.getElementById('cont_course'); 
			var width = obj.offsetWidth;

      var textarea = document.getElementById('text');
      textarea.style.width = width-200 + "px";
      var textarea = document.getElementById('name');
      textarea.style.width = width-197 + "px";
    }
      function func1() {
        console.log("Измена")
        if($('#file').val()){
          var splittedFakePath = $('#file').val().split('\\');
          $("#addfile").text(splittedFakePath[splittedFakePath.length - 1]);
          console.log("Файл добавлен")
        } else { // Если после выбранного тыкнули еще раз, но дальше cancel
          $("#addfile").text('Файл не добавлен');
          console.log("Файл не добавлен")
        }
      }
    function addfile() {
      document.getElementById('file').click(); 
    }
  </script>
</head>
<?php
	$kurs_id = $_GET['kurs_id'];
	$res = $pdo->query("SELECT * FROM `kurs` WHERE `id` = $kurs_id");
	while($kurs = $res->fetch(PDO::FETCH_ASSOC)){
	$link = $kurs['link'];
?>
<body onload="resizeBody()" onresize="resizeBody()">

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
                            <a class="dropdown-item" href="#">Русский язык</a>
                            <a class="dropdown-item" href="#">Математика</a>
                            <a class="dropdown-item" href="#">Физика</a>
                        </div>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="log_in.html">Личный кабинет</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Контакты</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="main-container container mx-auto" id="cont_course">
      <h1 class="text-center my-2">Добавление курса</h1>
      <div class="course_form mb-2">
        <form action="" method="post" enctype="multipart/form-data">
          <div>
            <p>Название курса:</p>
            <input type="text" name="title" id="name">
          </div>
          <div>
            <p>Описание курса:</p>
            <textarea name="description" id="text"></textarea>
          </div>
          <div>
            <p>Фото для курса:</p>
            <input type="button" id="loadFileXml" value="Добавить изображение" onclick="addfile()" class="button-stl bg-dark"/><p id="addfile">Файл не добавлен</p>
            <input type="file" name="link" style="display:none;" id="file" onchange="func1()">
          </div>
          <div class="text-center">
            <input type="submit" value="Добавить курс" class="button-stl bg-dark">
          </div>
        </form>

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