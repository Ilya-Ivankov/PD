<?php
session_start();//Начало сессии
require("connect.php");
if(!isset($_SESSION['$emailS']) and !$_SESSION['nameS'] and !$_SESSION['statusS']){
	header('location: login_sot.php');
}
?>
<!DOCTYPE html>
<html lang="ru">
<?php
	$id_users = $_SESSION["idS"];
	$kurs = $pdo->query("SELECT * FROM `kurs` WHERE `id_users` = $id_users");
	$members = $pdo->query("SELECT * FROM `kurs` WHERE `id_users` = $id_users")->rowCount();//кол-во записей в запросе
	
?>
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
                        <a class="nav-link " href="index.php">Главная</a>
                    </li>
                    <li class="nav-item dropdown ">
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
		//\Основной контрент

	
	
		?>
		
    <div class="main-container container">
        <div class="row">
           
	<?php
	if(isset($_SESSION['$emailS']) && isset($_SESSION['nameS']) && $_SESSION['statusS'] == "sot"){
		echo '	<div class="col-md-12">
                <h1 class="text-center">Добро пожаловать в личный кабинет!</h1>
                <p>Это ваш личный кабинет преподователя. Здесь вы можете создать и провести свою олимпиаду, а также многое другое</p>
            </div>
			<div id="accordion" style="margin-bottom: 20px;">';
	$add = 0;
	 if($members == 5){
		 echo '<div class="card">
                  <div class="card-header bg-dark" id="headingOne">
                    <h5 class="mb-0">
                      <button class="btn btn-link collapsed text-light" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Мои курсы
                      </button>
                    </h5>
                  </div>
                  <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">';
	while($kurs_all = $kurs->fetch(PDO::FETCH_ASSOC)){
	
	echo '                               
                    <div class="card-body row ">
                        <div  onclick="window.location=\'kurs.php?kurs_id='.$kurs_all['id'].'\'" class="col-md-10" style="background-color: rgb(226, 76, 17);">'.$kurs_all['title'].'</div>
                        <div onclick="window.location=\'red_kurs.php?kurs_id='.$kurs_all['id'].'\'" class="col-md-1 text-center py-1" style="background-color: rgb(131, 131, 143)"><img src="img/edit.svg" width="20px"></div>
                        <div onclick="window.location=\'del_kurs.php?kurs_id='.$kurs_all['id'].'\'" class="col-md-1 text-center py-1" style="background-color: rgb(48, 143, 39)"><img src="img/trashbin.svg" width="20px"></div>
                    </div>';
	$add = 0 ;
			}	
	}
	else if($members != 0){
			 echo '<div class="card">
                  <div class="card-header bg-dark" id="headingOne">
                    <h5 class="mb-0">
                      <button class="btn btn-link collapsed text-light" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Мои курсы
                      </button>
                    </h5>
                  </div>
                  <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">';
	while($kurs_all = $kurs->fetch(PDO::FETCH_ASSOC)){
	echo '                               
                    <div class="card-body row ">
                        <div  onclick="window.location=\'kurs.php?kurs_id='.$kurs_all['id'].'\'" class="col-md-10" style="background-color: rgb(226, 76, 17);">'.$kurs_all['title'].'</div>
                        <div onclick="window.location=\'red_kurs.php?kurs_id='.$kurs_all['id'].'\'" class="col-md-1 text-center py-1" style="background-color: rgb(131, 131, 143)"><img src="img/edit.svg" width="20px"></div>
                        <div onclick="window.location=\'del_kurs.php?kurs_id='.$kurs_all['id'].'\'" class="col-md-1 text-center py-1" style="background-color: rgb(48, 143, 39)"><img src="img/trashbin.svg" width="20px"></div>
                    </div>';
	$add = 1;
			}
		}
	else if($members == 0){
	echo '   <div class="card">
                  <div class="card-header bg-dark" id="headingOne">
                    <h5 class="mb-0">
                      <button class="btn btn-link collapsed text-light" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Мои курсы
                      </button>
                    </h5>
                  </div>
                  <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
				  <div class="card-body row ">';
	echo ' <div class="text-center">
			<p class="text-center my-2">У вас нет курсов</p>	
                    </div>  </div>';
	$add = 1;
	}
	if($add > 0){
		
		echo ' <div class="text-center">
                        <input type="button" value="Добавить курс" class="bg-dark button-stl" onclick="window.location=\'add_kurs.php\'">
                    </div> </div>';
	
	}		


	else if($add == 0){
		
		echo ' <div class="text-center">
                        
                        <div class="alert alert-danger mx-auto" role="alert" style="margin-top: 15px; text-align: center;">
                            Больше 5 курсов добовлять нельзя!
                        </div>
					</div>
                    </div>';
	}

	//До этого были КУРСЫ
	//Внизу это НОВОСТИ
	$id_users = $_SESSION["idS"];
	$kurs_news = $pdo->query("SELECT * FROM `news` WHERE `id_autor` = $id_users");
	$members2 = $pdo->query("SELECT * FROM `news` WHERE `id_autor` = $id_users")->rowCount();//кол-во записей в запросе
	
	$add2 = 0;

	if($members2 == 1){
		echo '<div class="card">
                  <div class="card-header bg-dark" id="headingTwo">
                    <h5 class="mb-0">
                      <button class="btn btn-link collapsed text-light" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                        Мои новости
                      </button>
                    </h5>
                  </div>
                  <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                    ';
	while($kurs_all = $kurs_news->fetch(PDO::FETCH_ASSOC)){
	echo ' <div class="card-body row ">
                       <div  onclick="window.location=\'news_id.php?id_news='.$kurs_all['id'].'\'"  class="col-md-10" style="background-color: rgb(226, 76, 17);">'.$kurs_all['title'].'</div>
                       <div onclick="window.location=\'red_news.php?id_kurs_red='.$kurs_all['id'].'\'" class="col-md-1 text-center py-1" style="background-color: rgb(131, 131, 143)"><img src="img/edit.svg" width="20px"></div>
                       <div onclick="window.location=\'del_news.php?id_kurs_red='.$kurs_all['id'].'\'" class="col-md-1 text-center py-1" style="background-color: rgb(48, 143, 39)"><img src="img/trashbin.svg" width="20px"></div>
                    </div>';//МНОГО !!!!DIV!!!!
	$add2 = 0;
			}
		}
	else if($members2 == 0){
	echo '<div class="card">
                  <div class="card-header bg-dark" id="headingTwo">
                    <h5 class="mb-0">
                      <button class="btn btn-link collapsed text-light" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                        Мои новости
                      </button>
                    </h5>
                  </div>
                  <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
				  <div class="card-body row ">
				  <div class="text-center">
				  	<p>У вас нет новостей!</p>
                    </div></div>
	';
	$add2 = 1;
	}
	if($add2 > 0){
		echo '<div class="text-center">
		<input type="button" value="Добавить новость" class="bg-dark button-stl" onclick="window.location=\'add_news.php\'"> </div></div></div>';
	}
	else if($add2 == 0){
		echo '<div class="text-center">
		                        <div class="alert alert-danger mx-auto" role="alert" style="margin-top: 15px; text-align: center;">
                            Больше 1 новости добовлять нельзя!
                        </div>
		 </div></div>';
	}
		echo '			</div>
				  </div></div> ';
	}
	//Конец новостей
	//СТУДЕНТ____________________________________________________________________________________________
	if(isset($_SESSION['$emailS']) && isset($_SESSION['nameS']) && $_SESSION['statusS'] == "std"){
	$id_users = $_SESSION["idS"];
	$kurs_user = $pdo->query("SELECT * FROM `kurs_user` WHERE `id_user` = $id_users");
	$members3 = $pdo->query("SELECT * FROM `kurs_user` WHERE `id_user` = $id_users")->rowCount();//кол-во записей в запросе
	echo '	<div class="col-md-12">
                <h1 class="text-center">Добро пожаловать в личный кабинет!</h1>
                <p>Это ваш личный кабинет студента. Здесь вы можете выбрать себе олимпиаду и поучавствовать в ней. Все результаты будут добавлены в раздел "Оценки"</p>
            </div>
			<div id="accordion" style="margin-bottom: 20px;">
			';
	
	$add = 0;
		
	if($members3 != 0){
				 echo '<div class="card">
                  <div class="card-header bg-dark" id="headingOne">
                    <h5 class="mb-0">
                      <button class="btn btn-link collapsed text-light" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Мои курсы
                      </button>
                    </h5>
                  </div>
                  <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">';
		
		while($kurs_all = $kurs_user->fetch(PDO::FETCH_ASSOC)){
			echo '       <div class="card-body row ">
                        <div onclick="window.location=\'kurs.php?kurs_id='.$kurs_all['id_kurs'].'\'" class="col-md-12" style="background-color: rgb(226, 76, 17);">'.$kurs_all['name-kurs'].'</div>
                 </div>';
		}
		echo '</div></div>';
	}
	if($members3 == 0){
			echo '<div class="card">
                  <div class="card-header bg-dark" id="headingOne">
                    <h5 class="mb-0">
                      <button class="btn btn-link collapsed text-light" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Мои курсы
                      </button>
                    </h5>
                  </div>
                  <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion"><div class="text-center">
		                        <div class="alert alert-danger mx-auto" role="alert" style="margin-top: 15px; text-align: center;">
                            <p>У вас нет курсов!</p>
                        </div></div></div>
		 </div>';
	}
	//Новости начало
			echo '<div class="card">
                  <div class="card-header bg-dark" id="headingTwo">
                    <h5 class="mb-0">
                      <button class="btn btn-link collapsed text-light" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                        Мои новости
                      </button>
                    </h5>
                  </div>
                  <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                    <div class="card-body row ">
                       <div onclick="window.location=\'news.php\'" class="col-md-12" style="background-color: rgb(226, 76, 17);">Все новости</div>
                    </div></div></div>';
	//Новости конец
	
	echo '</div>';
		
	}
?>

        </div>
    </div>
<?php
	 //Конец основного контента
?>
		<p style="text-align: center">*Премечание: для взаимодействия с конкретной олиприады перейдите на соотвестсвующий курс</p>
    </div>
    <footer class="bg-dark">
        <div class="row mx-auto">
            <div class="col-md-4">
                <p class="text-light text-center mt-5">Олимпиады онлайн &#169;2021</p>
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