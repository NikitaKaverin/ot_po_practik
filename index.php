<?php
session_start();
if(empty($_SESSION['id'])) $result_id = 0;
else $result_id = $_SESSION['id'];
include("header.php");
?>
<?php
        $host = '127.0.0.1:3306';  // Хост, у нас все локально
        $user = 'root';    // Имя созданного вами пользователя
        $pass = ''; // Установленный вами пароль пользователю
        $db_name = 'aftoru';   // Имя базы данных
        $link = mysqli_connect($host, $user, $pass, $db_name); // Соединяемся с базой
        if (!$link) {
          echo 'Не могу соединиться с БД. Код ошибки: ' . mysqli_connect_errno() . ', ошибка: ' . mysqli_connect_error();
          exit;
        }        
        if (isset($_POST["car2"])){
            $sql=mysqli_query($link,"SELECT `id_kategor` FROM `Kategor` where `kategor`='B'");
            $result = mysqli_fetch_array($sql);
            $primer=$result['id_kategor'];
            $_SESSION['dat']=$primer;
            $_SESSION['id']=1;
            header("Location: /ot_po_practik/car.php");
            exit;
} 
        if(isset($_POST["car1"])){
            $sql=mysqli_query($link,"SELECT`id_kategor` FROM `Kategor` where `kategor`='C'");
            $result = mysqli_fetch_array($sql);//var_dump($result);die();
            $primer=$result['id_kategor'];
            $_SESSION['dat']=$primer;
            header("Location: /ot_po_practik/car.php");
            exit;
}
        if(isset($_POST["car3"])){
            $sql=mysqli_query($link,"SELECT`id_kategor` FROM `Kategor` where `kategor`='A,M,B1'");
            $result = mysqli_fetch_array($sql);//var_dump($result);die();
            $primer=$result['id_kategor'];
            $_SESSION['dat']=$primer;
            header("Location: /ot_po_practik/car.php");
            exit;
}
?>
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
<main role="main">
  <section class="jumbotron text-center">
    <div class="container">
    <img src="image/Car2.png" width="90" height="80" viewBox="24 24 24 24" fill="none" stroke="currentColor" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" class="mr-2" focusable="false" aria-hidden="true">
    <img src="image/Car.png" width="120" height="140" viewBox="24 24 24 24" fill="none" stroke="currentColor" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" class="mr-2" focusable="false" aria-hidden="true">
    <img src="image/mot.png" width="80" height="120" viewBox="24 24 24 24" fill="none" stroke="currentColor" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" class="mr-2" focusable="false" aria-hidden="true">
      <p class="lead text-muted"><h5>Выбирете ниже категорию транспорта, которая вам нужна и соответствует вашим требованиям</h5></p>
    </div>
  </section>
  <div class="album py-5 bg-light">
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <div class="card mb-12 shadow-sm">
            <img class="bd-placeholder-img card-img-top" width="100%" height="225" src="image/Kamaz.jpg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>Placeholder</title><rect fill="#55595c" width="100%" height="100%"/>
            <div class="card-body">
              <p class="card-text">Данный тип транспорта предназначен для перевозки грузов и других обьектов. Tребование категории водительских прав:<h4>С</h4></p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                <form class="form-signin" action="" method="POST">
                <input class="btn btn-lg btn-primary btn-block" name="car1" type="submit" value="Посмотреть транспорт">
                </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card mb-4 shadow-sm">
            <img class="bd-placeholder-img card-img-top" width="100%" height="225" src="image/mach.jpg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>Placeholder</title><rect fill="#55595c" width="100%" height="100%"/>
            <div class="card-body">
              <p class="card-text">На выбор представлен широкий класс машин, начиная от эконом класса до бизнеса. Взять в аренду можно если вы имеете в водительских правах категорию<h4>B</h4> </p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                <form class="form-signin" action="" method="POST">
                <input class="btn btn-lg btn-primary btn-block" name="car2" type="submit" value="Посмотреть транспорт">
                </form>
                 </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card mb-4 shadow-sm">
            <img class="bd-placeholder-img card-img-top" width="100%" height="225" src="image/mot.jpg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>Placeholder</title><rect fill="#55595c" width="100%" height="100%"/>
            <div class="card-body">
              <p class="card-text">Каждый из нас мечтал хотя бы раз прокатиться на байке. В нашем же автопрокате это мечта может осучествиться. Обязательно иметь в воодительских правах категорию <h4>A,M,B1</h4>   </p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                <form class="form-signin" action="" method="POST">
                <input class="btn btn-lg btn-primary btn-block" name="car3" type="submit" value="Посмотреть транспорт">
                </form>
                </div>             
              </div>
            </div>
          </div>
        </div>
</main>
<footer class="text-muted">
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