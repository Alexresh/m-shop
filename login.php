<?php
  require 'includes/database.php';
  if((isset($_POST['email']))&&(isset($_POST['pass']))){
    #если в пост запросе пришли данные email и pass, то ищем их в бд
    $email=filter_var(trim($_POST['email']),FILTER_SANITIZE_STRING);
	
    $pass=filter_var(trim($_POST['pass']),FILTER_SANITIZE_STRING);
	echo "SELECT * FROM `users` WHERE `email`='$email' AND `pass`='$pass'   ";
    $query = mysqli_query($link,"SELECT * FROM `users` WHERE `email`='$email' AND `pass`='$pass'") or die(mysqli_error());
    $user = mysqli_fetch_assoc($query);
    if(count($user)==0){#ес ничё не нашли, то сообщение
      echo 'Такой пользователь не найден! <a href="">Вернуться</>';
      exit();
    }
    #устанавливаем куки, чтобы из любой страницы сайта знать о аккаунте
    setcookie('userid',$user['id'],time()+3600,"/");
    setcookie('username',$user['name'],time()+3600,"/");
    header('Location: /');
  }
 ?>
<!DOCTYPE html>
<html lang="ru" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link href="https://fonts.googleapis.com/css?family=Courier+Prime&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <title>Вход</title>
  </head>
  <body>
    <?php include 'includes/header.php'; ?>
    <div class="center">
      <form action="login.php" method="post">
        <table>
            <tr><td style="font-family: Sans, serif; font-size:13pt;">E-mail:</td><td><input class="input" type="text" name="email"></td></tr>
            <tr><td style="font-family: Sans, serif; font-size:13pt;">Пароль:</td><td><input class="input" type="password" name="pass"></td></tr>
        </table>
        <br>
        <button class="submit" type="submit" style="margin:0px 25%;">Войти</button>
      </form>
    </div>
  </body>
</html>
