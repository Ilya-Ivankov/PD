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
    <title>Олимпиады - Задание</title>
    <script>
        function resizeBody() {
          if (!document.getElementById('cont_form'))
                    return;
                var obj = document.getElementById('cont_form'); 
                var width = obj.offsetWidth;
    
          var textarea = document.getElementById('text');
          textarea.style.width = width-250 + "px";
          var textarea2 = document.getElementById('text2');
          textarea2.style.width = width-282 + "px";
        }

        function func1() {
            if($('#file').val()){
                var splittedFakePath = $('#file').val().split('\\');
                $("#addfile").text(splittedFakePath[splittedFakePath.length - 1]);
            } else { // Если после выбранного тыкнули еще раз, но дальше cancel
                $("#addfile").text('Файл не добавлен');
            }
        }
        function addfile() {
            document.getElementById('file').click(); 
        }
        function func2() {
            if($('#file2').val()){
                var splittedFakePath = $('#file2').val().split('\\');
                $("#addfile2").text(splittedFakePath[splittedFakePath.length - 1]);
            } else { // Если после выбранного тыкнули еще раз, но дальше cancel
                $("#addfile2").text('Файл не добавлен');
            }
        }
        function addfile2() {
            document.getElementById('file2').click(); 
        }
      </script>
</head>
<?php
	$id_zadanie = $_GET['id_zadanie'];
	$id_users = $_SESSION["idS"];
	$zadanie = $pdo->query("SELECT `link_work`.`more` , `link_work`.`link_file` , `kurs`.`title` , `kurs`.`description` , `kurs`.`link` , `kurs`.`id`
FROM `link_work`
INNER JOIN `kurs` ON `kurs`.`id` = `link_work`.`id_kurs`
WHERE `link_work`.`id` = $id_zadanie");
	$zadanie_g = $zadanie->fetch(PDO::FETCH_ASSOC);
	$b = $zadanie_g['id'];
	?>
<body onload="resizeBody()" onresize="resizeBody()">
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
<?php
	echo '    <div class="main-container container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="mt-3">Курс</h1>
                <div class="card my-3" style="position: relative;">
                    <div class="card-header bg-dark text-light">
                        '.$zadanie_g['title'].'
                    </div>
                    <div class="card-body">
                        
                      <blockquote class="blockquote mb-0">
                        <p style="text-align: justify;">'.$zadanie_g['description'].' </p>
                      </blockquote>
                    </div>
                </div>
                <div class="card my-3" style="position: relative;">
                    <div class="card-header bg-dark text-light">
                        Дополнительная информация
                    </div>
                    <div class="card-body">
                        <blockquote class="blockquote mb-0">
                          <p>'.$zadanie_g['more'].'</p>
						  
                        </blockquote>
						
                      </div>
                </div>
								    <div class="card my-3" style="position: relative;">
                    <div class="card-header bg-dark text-light">
                        Задание на курс
                    </div>
                    <div class="card-body">
                      <blockquote class="blockquote mb-0">
                        <p style="text-align: justify;"><a href="dow_zadanie.php?filename='.$zadanie_g['link_file'].'">ЗАДАНИЕ</a></p>
                      </blockquote>
                    </div>
                </div>
				';	
			$check_user = $pdo->query("SELECT * FROM `otv` WHERE `id_std`= $id_users  AND `id_kurs` = $b")->rowCount();
			if($check_user == 1){//Если задание было отправленно
		
		echo '                   <div class="card my-3" style="position: relative;">
                    <div class="card-header bg-dark text-light">
                        Загрузка ответа
                    </div>
                    <div class="card-body">  <div class="alert alert-success mt-2" role="alert" style="text-align: center; margin-right: 25px; width: 100%;">
                            Ответ был успешно загружен!
                        </div></div></div>';
	}
		//Если задание не было отправленно 
			else{
			echo '<div class="card my-3" style="position: relative;">
                    <div class="card-header bg-dark text-light">
                        Загрузка ответа
                    </div>
                    <div class="card-body">
                      <blockquote class="blockquote mb-0" id="cont_form">
                        <form action="" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="check_REZ" value="true">
                            <div>
                                <input type="button" id="loadFileXml" value="Добавить файл" onclick="addfile2()" class="button-stl bg-dark"/><p id="addfile2">Файл не добавлен</p>
                                <input type="file" name="link2" style="display:none;" id="file2" onchange="func2()">
                            </div>
                            <div class="text-center">
                                <input type="submit" value="Загрузить ответ" class="button-stl bg-dark">
                            </div>         
                        </form>
                      </blockquote>
                    </div>
                </div>
';

	if(isset($_POST['check_REZ'])){
	$getMime = explode('.', $_FILES['link2']['name']);
	$mime = strtolower(end($getMime));
	$types = array('docx', 'pdf');
	if(!in_array($mime, $types)){
		$fmsgR = "Загрузка файла обязательна! <br> Не допустимый тип фапйла <br> Доступные расширения:'PDF', 'DOCX'";
		}
	else{
	$path2 = 'otvet/'.time().$_FILES['link2']['name'];
	$a = $zadanie_g['id'];
	move_uploaded_file($_FILES['link2']['tmp_name'],$path2);
	$resR = $pdo->query("INSERT INTO `std_1396_olymp`.`otv` (`id`, `link_otv`, `id_std`, `id_kurs`) VALUES (NULL, '$path2', '$id_users', '$a')");
				if($resR){
					$msgR = "Задание успешно добавлено!";
				}
			}
			if(isset($msgR)){
echo ' <div class="alert alert-success mt-2" role="alert" style="text-align: center; margin-right: 25px; width: 100%;">
                            Ответ был успешно загружен!
                        </div><script>setTimeout(function(){
		location.reload();
		}, 1000);</script> ';
			}
				if(isset($fmsgR)){
				echo '<div class="alert alert-danger mx-auto" role="alert" style="margin-top: 15px; text-align: center; margin-left: 23px;">
              '.$fmsgR.'
            </div>';
			}
	}
	}
?>
   
		<?php
		echo '</div> </div>';
		?>
    </div></div>
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