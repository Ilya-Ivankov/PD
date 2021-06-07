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
<body onload="resizeBody()" onresize="resizeBody()">
    <div class="nofooter">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#"><img src="img/logo.png" alt="" height="40px"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Главная</a>
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
                    <li class="nav-item">
                        <a class="nav-link" href="log_in.html">Личный кабинет</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Контакты</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="calendar.html">Календарь мероприятий</a>
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
                    <div class="card-header bg-dark text-light">
                        Название курса
                    </div>
                    <div class="card-body">
                        <img src="img/video.jpg" alt="..." class="ml-3 img-thumbnail float-right" width="400px">
                      <blockquote class="blockquote mb-0">
                        <p style="text-align: justify;">Здесь будет длинное-длинное описание курса, содержащее разные факты и т.п. Самое крутое в картинке, что у нее получается идеальное оптекание. Сами посмотрите. Сначала текст просто находится слева, а потом он обтекает изображение снизу. красота да и только. </p>
                      </blockquote>
                    </div>
                </div>
                <div class="card my-3" style="position: relative;">
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
                            <tr>
                                <td>Соколов</td>
                                <td>Олег</td>
                            </tr>
                            <tr>
                                <td>Соколов</td>
                                <td>Олег</td>
                            </tr>
                            <tr>
                                <td>Соколов</td>
                                <td>Олег</td>
                            </tr>
                            <tr>
                                <td>Соколов</td>
                                <td>Олег</td>
                            </tr>
                            <tr>
                                <td>Соколов</td>
                                <td>Олег</td>
                            </tr>
                          </table>
                        </blockquote>
                      </div>
                </div>
                <div class="alert alert-success" role="alert" style="text-align: center; margin-right: 25px; width: 100%;">
                    Это ваш курс!
                </div>
                <div class="card my-3" style="position: relative;">
                    <div class="card-header bg-dark text-light">
                        Загрузка задания на данный курс
                    </div>
                    <div class="card-body">
                      <blockquote class="blockquote mb-0" id="cont_form">
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
                      </blockquote>
                        <div class="alert alert-success mt-2" role="alert" style="text-align: center; margin-right: 25px; width: 100%;">
                            Задание было успешно загружено!
                        </div>
                        <blockquote class="blockquote mb-0">
                            <div class="text-center">
                                <input type="submit" value="Удалить задание" class="button-stl bg-dark">
                            </div>
                        </blockquote>
                    </div>
                </div>
                <div class="card my-3" style="position: relative;">
                    <div class="card-header bg-dark text-light">
                        Загрузка результатов
                    </div>
                    <div class="card-body">
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
                      </blockquote>
                        <div class="alert alert-success mt-2" role="alert" style="text-align: center; margin-right: 25px; width: 100%;">
                            Результаты были успешно загружены!
                        </div>
                        <blockquote class="blockquote mb-0">
                            <div class="text-center">
                                <input type="submit" value="Удалить результаты" class="button-stl bg-dark">
                            </div>
                        </blockquote>
                    </div>
                </div>
                <div class="card my-3" style="position: relative;">
                    <div class="card-header bg-dark text-light">
                        Работы студентов:
                    </div>
                    <div class="card-body">
                        <blockquote class="blockquote mb-0">
                          <table>
                            <tr>
                                <th width="40%">Фамилия</th>
                                <th width="20%">Имя</th>
                                <th width="20%">Ответ</th>
                                <th width="20%">Изменить</th>
                            </tr>
                            <tr>
                                <td>Соколов</td>
                                <td>Олег</td>
                                <td><a href="">Скачать</a></td>
                                <td><a href="">Удалить</a></td>
                            </tr>
                          </table>
                          <p class="mt-2 text-center">Загруженных работ нет</p>
                        </blockquote>
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