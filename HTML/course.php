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
	$kurs_id = $_GET['kurs_id'];
	$id_autor = $_SESSION['idS'];
	$kurs = $pdo->query("SELECT * FROM `kurs` WHERE `id` = $kurs_id");
	$id_users = $_SESSION["idS"];
?>
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
                    <li class="nav-item">
                        <a class="nav-link" href="index.html">Главная</a>
                    </li>
                    <li class="nav-item dropdown active">
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
                        <a class="nav-link" href="exit.php">Выход</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="main-container container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="mt-3">Курс</h1>
                <div class="card my-3" style="position: relative;">
					<?php
	while($kurs_info = $kurs->fetch(PDO::FETCH_ASSOC)){
		$name_kurs = $kurs_info['title'];
			
		
	
?>
                    <div class="card-header bg-dark text-light">
                        <?php 
						echo $kurs_info['title'];
						?>
                    </div>
                    <div class="card-body">
                        <img src="<?php echo $kurs_info['link']?>" alt="фото курса" class="ml-3 img-thumbnail float-right" width="400px">
                      <blockquote class="blockquote mb-0">
                        <p style="text-align: justify;"><?php echo $kurs_info['description']; }?> </p>
                      </blockquote>
                    </div>
					<?php
					//Дальше начинается код дял студента
					
if(isset($_SESSION['$emailS']) && isset($_SESSION['nameS']) && $_SESSION['statusS'] == "std"){
$members = $pdo->query("SELECT * FROM `kurs_user` WHERE `id_user` = $id_users AND `id_kurs` = $kurs_id")->rowCount();//кол-во записей в запросе
if($members == 1){//Если уже записан на курс
echo '<div class="alert alert-success" role="alert" style="text-align: center; margin-right: 25px; width: 100%;">Вы записаны на курс!</div>';
echo '<div class="text-center mb-2">
<form action="" method="post">
<input type="hidden" name="del_kurs" value="true">
<input type="submit" value="Удалиться с курса" class="button-stl bg-dark">
</form
</div>';
$del_kurs = $_POST['del_kurs'];	
if(isset($del_kurs)){
$del_user_kurs = $pdo->query("DELETE FROM `olymp`.`kurs_user` WHERE `kurs_user`.`id_user` = $id_users  AND `kurs_user`.`id_kurs` = $kurs_id");
if($del_user_kurs){
$msg = "Вы были удалены с курса";
}
if(isset($msg)){
echo ' <div class="alert alert-success" role="alert" style="text-align: center; margin-right: 25px; width: 100%;">
                        '.$msg.'
                    </div>';
echo "<script>setTimeout(function(){
		location.reload();
		}, 1000);</script>";
				}
			}
//Если есть ссылка->||
		$count_link2 = $pdo->query("SELECT * FROM `link_work` WHERE  `id_kurs` = $kurs_id");//кол-во записей в запросе
		$link = $count_link2->fetch(PDO::FETCH_ASSOC);
	
		$count_link = $pdo->query("SELECT * FROM `link_work` WHERE  `id_kurs` = $kurs_id")->rowCount();//кол-во записей в запросе
		
		if($count_link == 1){
			echo '<p class="ml-3">Ссылка на олимпиаду: <a href="zadanie.php?id_zadanie="'.$link['id'].'">ОЛИМПИАДА</a></p>';
		}
		else{
			echo "<p>Ссылка на олимпиаду ещё не добавлена</p>";
		}
		//Еслить ли загруженные результаты
		$count_rez = $pdo->query("SELECT * FROM `rez_work` WHERE  `id_kurs` = $kurs_id")->rowCount();
		$count_rez2 = $pdo->query("SELECT * FROM `rez_work` WHERE  `id_kurs` = $kurs_id");
		$link_f = $count_rez2->fetch(PDO::FETCH_ASSOC);
		//print_r($link_f);//DS____________________________________ВЫВОД МАССИВА с данными
		echo '   <div class="card my-3"  style="position: relative; cursor: pointer;">
                    <div class="card-header bg-dark text-light">
                        Результаты олимпиады:
                    </div>';
		if($count_rez == 1){
			echo '        <div class="card-body">
                        <blockquote class="blockquote mb-0">
                        </blockquote>Комментарий: 
                          <p>'.$link_f['comment'].'</p>
                          <a href="dow_file.php?filename='.$link_f['link_file'].'">Скачать результаты</a>
                      </div>';
	}
		else{
			echo "<p>Ссылка на результат скоро появится</p>";
		}
	}
			else{//Если не записан на курс_____________________________________________________________________________________________________________________
		echo '
		 <div class="text-center mb-2">
		 <form action="" method="post">
		<input type="hidden" name="add_kurs" value="true">
        <input type="submit" value="Записаться на курс" class="button-stl bg-dark">
         </form></div> ';
		$add_kurs = $_POST['add_kurs'];
		if(isset($add_kurs)){
		$check_user_kurs = $pdo->query("SELECT * FROM `kurs_user` WHERE `id_user` = $id_users AND `id_kurs` = $kurs_id");
		$members = $pdo->query("SELECT * FROM `kurs_user` WHERE `id_user` = $id_users AND `id_kurs` = $kurs_id")->rowCount();//кол-во записей в запросе
		
		
		if($members == 1){
			$fmsg = "Вы уже были записаны на данный курс!";
		}
		else{
			$add_user_kurs = $pdo->query("INSERT INTO `olymp`.`kurs_user` (`id`, `id_user`, `id_kurs`, `name-kurs`) VALUES (NULL, '$id_users', '$kurs_id', '$name_kurs');");
			$msg = "Вы были успешно записаны на курс.";
				}
			}
			if(isset($fmsg)){
		echo "<div>".$fmsg."</div>";
		}
		if(isset($msg)){
		echo '<div class="alert alert-success" role="alert" style="text-align: center; margin-right: 25px; width: 100%;">
                        '.$msg.'
                    </div>';
		echo "<script>setTimeout(function(){
		location.reload();
		}, 1000);</script>";
			}
		}
	echo '                </div>
                
 </div>';
}
//Далее идёт сотрудник________________________________________________________________________________________________________________________________________
//Далее идёт сотрудник________________________________________________________________________________________________________________________________________
//Далее идёт сотрудник________________________________________________________________________________________________________________________________________
	if(isset($_SESSION['$emailS']) && isset($_SESSION['nameS']) && $_SESSION['statusS'] == "sot"){
	echo '                <div class="card my-3" style="position: relative;">
                    <div class="card-header bg-dark text-light">
                        Студенты на данном курсе:
                    </div>
                    <div class="card-body">
                        <blockquote class="blockquote mb-0">
                          <table>
                            <tr>
                                <th width="70%">Фамилия</th>
                                <th width="30%">Имя</th>
                            </tr>
';
	$kurs_id = $_GET['kurs_id'];
	$id_autor = $_SESSION['idS'];
	$student_in_kurs = $pdo->query("SELECT `kurs_user`.`name-kurs` , `users`.`name` , `users`.`surname`
FROM `kurs_user`
INNER JOIN `users` ON `users`.`id` = `kurs_user`.`id_user`
WHERE `kurs_user`.`id_kurs` =$kurs_id");
	while($stud = $student_in_kurs->fetch(PDO::FETCH_ASSOC)){	
		echo ' <tr>
                                <td>'.$stud['surname'].'</td>
                                <td>'.$stud['name'].'</td>
                            </tr>';
		
	}
	$check_user_in_kurs = $pdo->query("SELECT `kurs_user`.`name-kurs` , `users`.`name` , `users`.`surname`
FROM `kurs_user`
INNER JOIN `users` ON `users`.`id` = `kurs_user`.`id_user`
WHERE `kurs_user`.`id_kurs` =$kurs_id")->rowCount();
	if($check_user_in_kurs == 0){
		echo '<p>На данный курс не записался ни один студент</p>';
	}
	echo '      </table>
                </blockquote>
                 </div>
                </div>';	
	//выше были выведены студенты на данном курсе
	$check_sot = $pdo->query("SELECT * FROM `kurs` WHERE `id_users` = $id_autor AND `id` = $kurs_id")->rowCount();
	if($check_sot != 0 ){//Если это курс этого самого сотрудника
	$kurs_id = $_GET['kurs_id'];
	$id_autor = $_SESSION['idS'];
	echo ' <div class="alert alert-success" role="alert" style="text-align: center; margin-right: 25px; width: 100%;">
                    Это ваш курс!
                </div>';
	echo '<div class="card my-3" style="position: relative;">                     <div class="card-header bg-dark text-light">
                        Загрузка задания на данный курс
                    </div>
                    <div class="card-body">';
	$check_have_zadanie = $pdo->query("SELECT * FROM `link_work` WHERE `id_kurs`= $kurs_id  AND `id_user` = $id_autor")->rowCount();
			if($check_have_zadanie ==1){//Если задание уже было загружено
				echo ' <div class="alert alert-success mt-2" role="alert" style="text-align: center; margin-right: 25px; width: 100%;">
                            Задание было успешно загружено!
                        </div>
						 <div class="text-center">
                                <input type="submit" value="Удалить задание"  onclick="window.location=\'del_zadanie.php?kurs_id='.$kurs_id.'\'" class="button-stl bg-dark">
                            </div>';
							}
			else{//Если задание ещё небыло добавлено__________________________________________________________________||||||||||||||||++++++++______
			echo '        <blockquote class="blockquote mb-0" id="cont_form">
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="mb-4">
                                <p>Доп сведения к заданию:</p>
                                <textarea name="more" id="text"></textarea>
                            </div>
                            <div>
                                <input type="button" id="loadFileXml" value="Добавить файл" onclick="addfile()" class="button-stl bg-dark"/><p id="addfile">Файл не добавлен</p>
                                <input type="file" name="link" style="display:none;" id="file" onchange="func1()">
                            </div>
                            <div class="text-center">
                                <input type="submit" value="Загрузить задание" class="button-stl bg-dark">
                            </div>         
                        </form>
                      </blockquote>';

	if(isset($_POST['more'])){//Если бла нажата кнопка загрузить результаты
	$more = $_POST['more'];
	$id_users = $_SESSION['idS'];
	$getMime = explode('.', $_FILES['link']['name']);
	$mime = strtolower(end($getMime));
	$types = array('docx', 'pdf');
	if(!in_array($mime, $types)){
		$fmsgZ = "Загрузка файла обязательна! <br> Не допустимый тип фапйла <br> Доступные расширения:'PDF', 'DOCX'";
		}
	else{
	$path = 'zadanie/'.time().$_FILES['link']['name'];
	move_uploaded_file($_FILES['link']['tmp_name'],$path);
	$res = $pdo->query("INSERT INTO `olymp`.`link_work` (`id`, `more`, `id_kurs`, `link_file`, `id_user`) VALUES (NULL, '$more', '$kurs_id', '$path', '$id_users');");
				if($res){
					$msgZ = "Задание успешно добавлено!";
				}
			}
			if(isset($msgZ)){
				echo ' <div class="alert alert-success mt-2" role="alert" style="text-align: center; margin-right: 25px; width: 100%;">
                            Задание было успешно загружено!
                        </div><script>setTimeout(function(){
		location.reload();
		}, 1000);</script> ';
			}
				if(isset($fmsgZ)){
				echo ' <div class="alert alert-danger mx-auto" role="alert" style="margin-top: 15px; text-align: center; margin-left: 23px;">
              '.$fmsgZ.'
            </div>';
			}	
			}
		}///________________________________ТУТ Я ЗАКОНЧИЛ ДАЛЕЕ ОСТАЛАСЬ ЗАГРУЗКА РЕЗУЛЬТАТОВ!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
		echo '</div></div>';
		//ПРОВЕРКА: загрузуи результатов 
			echo ' <div class="card my-3" style="position: relative;">
                    <div class="card-header bg-dark text-light">
                        Загрузка результатов
                    </div>';
$check_have_rez = $pdo->query("SELECT * FROM `rez_work` WHERE `id_kurs`= $kurs_id  AND `id_user` = $id_autor")->rowCount();//Проверка кол-во загруженных результатов
			if($check_have_rez ==1){//Если результаты были загружены
				echo ' <div class="card-body"> 
				<div class="alert alert-success mt-2" role="alert" style="text-align: center; margin-right: 25px; width: 100%;">
                            Результаты были успешно загружены!
                        </div>';
				echo '  <blockquote class="blockquote mb-0">
                            <div class="text-center">
                                <input type="submit" onclick="window.location=\'del_rez.php?kurs_id='.$kurs_id.'\'" value="Удалить результаты" class="button-stl bg-dark">
                            </div>
                        </blockquote>
                    </div>';
					
			}
			else{//Если результаты ещё не были загружены
			echo '                    <div class="card-body">
                      <blockquote class="blockquote mb-0" id="cont_form">
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="mb-4">
                                <p>Комментарий к результатам:</p>
                                <textarea name="comment" id="text2"></textarea>
                            </div>
                            <div>
                                <input type="button" id="loadFileXml" value="Добавить файл" onclick="addfile2()" class="button-stl bg-dark"/><p id="addfile2">Файл не добавлен</p>
                                <input type="file" name="link2" style="display:none;" id="file2" onchange="func2()">
                            </div>
                            <div class="text-center">
                                <input type="submit" value="Загрузить результаты" class="button-stl bg-dark">
                            </div>         
                        </form>
                      </blockquote>';
	if(isset($_POST['comment'])){
	$comment = $_POST['comment'];
	$kurs_id = $_GET['kurs_id'];
	$id_users = $_SESSION['idS'];
	$getMime = explode('.', $_FILES['link2']['name']);
	$mime = strtolower(end($getMime));
	$types = array('docx', 'pdf');
	if(!in_array($mime, $types)){
		$fmsgR = "Загрузка файла обязательна! <br> Не допустимый тип фапйла <br> Доступные расширения:'PDF', 'DOCX'";
		}
	else{
	$path2 = 'rezult/'.time().$_FILES['link2']['name'];
	move_uploaded_file($_FILES['link2']['tmp_name'],$path2);
	$resR = $pdo->query("INSERT INTO `olymp`.`rez_work` (`id`, `comment`, `link_file`, `id_kurs`, `id_user`) VALUES (NULL, '$comment', '$path2', '$kurs_id', '$id_users');");
				if($resR){
					$msgR = "Задание успешно добавлено!";
				}
			}
			if(isset($msgR)){
				echo '<div class="alert alert-success mt-2" role="alert" style="text-align: center; margin-right: 25px; width: 100%;">
                            Задание было успешно загружено!
                        </div>><script>setTimeout(function(){
		location.reload();
		}, 1000);</script> ';
			}
				if(isset($fmsgR)){
				echo ' <div class="alert alert-danger mx-auto" role="alert" style="margin-top: 15px; text-align: center; margin-left: 23px;">
              '.$fmsgR.'
            </div>';
			}	
			}
				echo '</div>';
			}
			//КОНЕЦ ПРОВЕРКИ РЕЗУЛЬТАТОВ
		echo '</div>';
//ДАлее начинается вывод файлов с папки 
			echo '   <div class="card my-3" style="position: relative;">
                    <div class="card-header bg-dark text-light">
                        Работы студентов:
                    </div>
                    <div class="card-body">';
	$file_outletCe = $pdo->query("SELECT `otv`.`link_otv` , `otv`.`id` , `users`.`name` , `users`.`surname`
FROM `otv`
INNER JOIN `users` ON `users`.`id` = `otv`.`id_std`
WHERE `otv`.`id_kurs` = $kurs_id")->rowCount();
	$file_outlet = $pdo->query("SELECT `otv`.`link_otv` , `otv`.`id` , `users`.`name` , `users`.`surname`
FROM `otv`
INNER JOIN `users` ON `users`.`id` = `otv`.`id_std`
WHERE `otv`.`id_kurs` = $kurs_id");		
	
	if($file_outletCe == 0){
		echo '<blockquote class="blockquote mb-0">
		       <p class="mt-2 text-center">Загруженных работ нет</p>
               </blockquote>';
	}
	else{
		echo '<blockquote class="blockquote mb-0">
                          <table>
                            <tr>
                                <th width="40%">Фамилия</th>
                                <th width="20%">Имя</th>
                                <th width="20%">Ответ</th>
                                <th width="20%">Изменить</th>
                            </tr>';
		while($std = $file_outlet->fetch(PDO::FETCH_ASSOC)){
			echo '          <tr>
                                <td>'.$std['surname'].'</td>
                                <td>'.$std['name'].'</td>
                                <td><a href="dow_zadanie.php?filename='.$std['link_otv'].'">Скачать</a></td>
                                <td><a href="del_otv.php?kurs_id='.$kurs_id.'&otv_id='.$std['id'].'">Удалить</a></td>
                            </tr>
                          ';

		}
	}
	}
	//внизу последняя скобка	
	}
					
					echo '</table>
                        </blockquote></div> </div>';
					?>
               
                </div>
                
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