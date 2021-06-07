<?php
session_start();//Начало сессии
require("connect.php");
if(!isset($_SESSION['$emailS']) and !$_SESSION['nameS'] and !$_SESSION['statusS']){
	header('location: login_sot.php');
}
	$id_users = $_SESSION["idS"];
	$kurs2 = $pdo->query("SELECT * FROM `kurs` WHERE `id_users` = $id_users");
	$id_kurs_red = $_GET['id_kurs_red'];
	$red = $pdo->query("SELECT * FROM `news` WHERE `id` = $id_kurs_red");
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$title = $_POST['title'];
	$text = $_POST['text'];
	$date = $_POST['date'];
	$name_autor = $_SESSION['nameS'];
	$id_autor = $_SESSION['idS'];
	$kurs_id = $_POST['kurs'];
	
	//echo $title," ", $text," ", $date ," ", $name_autor," ", $id_autor," ", $kurs_id;
		
	$id_users = $_SESSION['idS'];
	$add_news = $pdo->query("UPDATE `olymp`.`news` SET `title` = '$title',
`text` = '$text',
`date` = '$date',
`name_autor` = '$name_autor',
`id_autor` = '$id_users',
`kurs` = '$kurs_id' WHERE `news`.`id` = $id_kurs_red");	
	
			if($add_news){
		header('location: lk.php');
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <title>Олимпиады - Главная</title>
  <script>
    function resizeBody() {
      if (!document.getElementById('cont_course'))
				return;
			var obj = document.getElementById('cont_course'); 
			var width = obj.offsetWidth;

      var textarea = document.getElementById('text');
      textarea.style.width = width-220 + "px";
      var textarea = document.getElementById('name');
      textarea.style.width = width-217 + "px";
    }
  </script>
</head>
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
                    <li class="nav-item">
                        <a class="nav-link" href="#">Календарь мероприятий</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="main-container container mx-auto" id="cont_course">
      <h1 class="text-center my-2">Добавление новости</h1>
      <div class="course_form mb-2">
        <form action="" method="post" >
		<?php
			while($kurs = $red->fetch(PDO::FETCH_ASSOC)){
		?>
          <div>
            <p>Заголовок новости:</p>
            <input type="text" name="title" id="name" value="<?php echo $kurs['title'];?>" required >
          </div>
          <div>
            <p>Описание Новости:</p>
            <textarea name="text" id="text" required><?php echo $kurs['text']; }?></textarea>
          </div>
          <div>
            <input type="hidden" name = "date" id = "date" value ="<?php echo date("Y-m-d");?>" />
            <input type="hidden" name = "id_autor" id = "id_autor" value ="<?php $_SESSION['idS']?>" />
          </div>
          <div>
              <p>Название курса:</p>
                <select name="kurs" required>
				<option value=""></option>
                 <?php
		
			while($kurs_all = $kurs2->fetch(PDO::FETCH_ASSOC)){
			echo "<option value='".$kurs_all['id']."'>".$kurs_all['title']."</option>";
			}
			?>
                </select>
            </div>
          <div class="text-center">
            <input type="submit" value="Добавить новость" class="button-stl bg-dark">
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