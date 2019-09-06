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
          <h4 class="text-white">Как арендовать?</h4>
          <p class="text-muted">Весь список представлен снизу, как только вам понравилась та или иная машина,позвоните по номеру и просто договоритесь о встрече. Так же можете от сортировать нужные вам машины по стоимости аренды. </p>
        </div>
      </div>
    </div>
  </div>
  <div class="navbar navbar-dark bg-dark shadow-sm">
    <div class="container d-flex justify-content-between">
      <a href="index.php" class="navbar-brand d-flex align-items-center">
        <img src="image/car.png" width="50" height="50" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-2" focusable="false" aria-hidden="true"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"></path><circle cx="12" cy="13" r="4"></circle></svg>
        <strong>Автопрокат_Оренбурга</strong>
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>
  </div>
</header>
<br>
<form action="" method="post">
    <div class="form-group col-md-2">
        <label for="min"><h3>Сумма от:</h3></label>
            <input type="number" min="500" max="10000" class="form-control" name="min" value="500" required><br>
        <label for="max"><h3>Сумма до:</h3></label>
            <input type="number" min="500" max="10000" class="form-control" name="max" value="10000" required><br>
            <input type="submit" class="btn btn-primary" value="Поиск" name="bron">   
     </div>   
     </div>   
  </form>
<div class="row">
<?php
      $host = '127.0.0.1:3306'; 
      $user = 'root';  
      $pass = ''; 
      $db_name = 'aftoru';
      $link = mysqli_connect($host, $user, $pass, $db_name); 
      if (!$link) {
        echo 'Не могу соединиться с БД. Код ошибки: ' . mysqli_connect_errno() . ', ошибка: ' . mysqli_connect_error();
        exit;
      }
    session_start();
    $primer = $_SESSION['dat'];
    $sql = mysqli_query($link, "SELECT `car`.`name`,`car`.`telephone`,`car`.`photo`,`car`.`arenda`
    FROM `car`where `id_kategor`=$primer");//var_dump($sql);die();
     while ($result = mysqli_fetch_array($sql))
     if(empty($_POST["bron"]))
{
    {
    $name=$result['name'];
    $tel=$result['telephone'];
    $photo=$result['photo'];
    $are=$result['arenda'];
        echo '
        <div class="col-md-6">
        <div class="card mb-6 shadow-sm">
        <div class="navbar navbar-dark bg-dark shadow-sm">
        <div class="container d-flex justify-content-between">
          <a href="#" class="navbar-brand d-flex align-items-center">
            <img src="'.$photo.'" width="300" height="200" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-2" focusable="false" aria-hidden="true"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"></path><circle cx="12" cy="13" r="4"></circle></svg>
            <b>'.$name.'<br>Телефон:89'.$tel.'<br>Час аренды:'.$are.' руб.</b>
          </a>
        </div>
      </div>
      </div>
      </div>';
    ;
      
    }
}
    else
    {
        if(isset($_POST["bron"]))
        { 
       $primer = $_SESSION['dat'];
       $min=$_POST['min'];
       $max=$_POST['max'];//var_dump($max);die();
       $sql = mysqli_query($link, "SELECT `car`.`name`,`car`.`telephone`,`car`.`photo`,`car`.`arenda`
       FROM `car` where `id_kategor`=$primer and `arenda`>$min and `arenda`<$max"); 
       while ($result = mysqli_fetch_array($sql))
        {
        $name=$result['name'];
        $tel=$result['telephone'];
        $photo=$result['photo'];
        $are=$result['arenda'];
          echo '
          <div class="col-md-6">
          <div class="card mb-6 shadow-sm">
          <div class="navbar navbar-dark bg-dark shadow-sm">
          <div class="container d-flex justify-content-between">
            <a href="#" class="navbar-brand d-flex align-items-center">
              <img src="'.$photo.'" width="300" height="200" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-2" focusable="false" aria-hidden="true"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"></path><circle cx="12" cy="13" r="4"></circle></svg>
              <b>'.$name.'<br>Телефон:89'.$tel.'<br>Час аренды:'.$are.' руб.</b>
            </a>
          </div>
        </div>
        </div>
        </div>';
    }
  }
};

    ?>
</div>
<footer class="text-muted">
<br>
<br>
<br>
  <div class="container">
    <p class="float-right">
      <a href="#">Back to top</a>
    </p>
    <p>iNikiCorp &copy; 2019</p>
    <p>Кто же создал столь замечательныю страницу? Ответ найдем перейдя по ссылки-><a href="https://vk.com/id317126234">Разработчик.</a> </p>
  </div>
</footer>
</body>
</html>