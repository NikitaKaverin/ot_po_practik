<?php
include("header.php");
?>
<!doctype html>
<html lang="ru">
    <header>
  <div class="collapse bg-dark" id="navbarHeader">
    <div class="container">
      <div class="row">
        <div class="col-sm-8 col-md-7 py-4">
          <h4 class="text-white">Машины</h4>
          <p class="text-muted">Наши авто соответствуют всем требованияи комфорта и страндартам чистоты. Любой желающий может прокататься на любой машине что ему понравилась. </p>
        </div>
      </div>
    </div>
  </div>
  <div class="navbar navbar-dark bg-dark shadow-sm">
    <div class="container d-flex justify-content-between">
      <a href="#" class="navbar-brand d-flex align-items-center">
        <img src="image/car.png" width="50" height="50" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-2" focusable="false" aria-hidden="true"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"></path><circle cx="12" cy="13" r="4"></circle></svg>
        <strong>Автопрокат_Оренбурга</strong>
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>
  </div>
</header>
<?php
      $host = '127.0.0.1:3306';  // Хост, у нас все локально
      $user = 'root';    // Имя созданного вами пользователя
      $pass = ''; // Установленный вами пароль пользователю
      $db_name = 'aftoru';   // Имя базы данных
      $link = mysqli_connect($host, $user, $pass, $db_name); // Соединяемся с базой
      
      // Ругаемся, если соединение установить не удалось
      if (!$link) {
        echo 'Не могу соединиться с БД. Код ошибки: ' . mysqli_connect_errno() . ', ошибка: ' . mysqli_connect_error();
        exit;
      }
    session_start();
    $primer = $_SESSION['dat']; 
    $sql = mysqli_query($link, "SELECT `car`.`name`,`car`.`telephone`,`car`.`photo`,`car`.`arenda`
    FROM `car`where `id_kategor`=$primer");//var_dump($sql);die();
     while ($result = mysqli_fetch_array($sql))
      {
    $name=$result['name'];
    $tel=$result['telephone'];
    $photo=$result['photo'];
    $are=$result['arenda'];

        echo '<div class="col-lg-4">
        <h2>'.$name.'. </h2>
        <h2>'.$tel.'.'.$are.'</h2>
        <p> <img src="'.$photo.'" class="d-block w-100" width="250" height="350"></p>
      </div><!-- /.col-lg-4 -->';
    };
    ?>
</body>
</html>