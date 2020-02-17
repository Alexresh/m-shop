<?php
  require 'includes/bd.php';
  if(isset($_POST['email'])){
    $email=filter_var(trim($_POST['email']),FILTER_SANITIZE_STRING);
    $name=filter_var(trim($_POST['name']),FILTER_SANITIZE_STRING);
    $surname=filter_var(trim($_POST['surname']),FILTER_SANITIZE_STRING);
    $pass=filter_var(trim($_POST['pass']),FILTER_SANITIZE_STRING);
    $cpass=filter_var(trim($_POST['confirmPass']),FILTER_SANITIZE_STRING);
    $adres=filter_var(trim($_POST['adr']),FILTER_SANITIZE_STRING);
$query=mysqli_query($link,"SELECT `name` AS `name` FROM `users` WHERE `email`='$email'");
$username=mysqli_fetch_assoc($query)['name'];
if(mb_strlen($username)>0){
  echo "Пользователь с именем $username и данной почтой уже зарегистрирован";
  exit();
}
if($pass!=$cpass){
  echo "Пароли не совпадают";
  exit();
}
    if((mb_strlen($pass)>3) && (mb_strlen($pass)<12)&&(mb_strlen($name)!=0)&&(mb_strlen($adres)!=0)&&(mb_strlen($email)!=0)){
      mysqli_query($link, "INSERT INTO `users`(`email`,`adres`,`name`,`surname`,`pass`) VALUES('$email','$adres','$name','$surname','$pass')");
      header("Location: /login.php");
    }else{
      $error='!';
    }

  }
 ?>
<!DOCTYPE html>
<html lang="ru" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link href="https://fonts.googleapis.com/css?family=Courier+Prime&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <title>Регистрация</title>
  </head>
  <body>
    <?php include 'includes/header.php'; ?>

    <div class="center">
      <?php
      if($error=='!'){
        echo '<p class="text" style="width:100%; color:#595959">Заполните поля</p><br>';
      }
       ?>
      <form action="reg.php" method="post">
        <table>
            <tr><td>Имя:</td><td><input class="input" type="text" name="name"></td></tr>
            <tr><td>Фамилия:</td><td><input class="input" type="text" name="surname"></td></tr>
            <tr><td>E-mail:</td><td><input class="input" type="email" name="email"></td></tr>
            <tr><td>Пароль:</td><td><input class="input" type="password" name="pass"></td></tr>
            <tr><td>Подтверждение:</td><td><input class="input" type="password" name="confirmPass"></td></tr>
            <tr><td>Адрес доставки:</td><td><input class="input" type="text" name="adr" value="Россия"></td></tr>
        </table>
        <br>
        <button class="submit" type="submit" style="margin:0px 25%;">Зарегистрироваться</button>
      </form>
    </div>
  </body>
</html>
