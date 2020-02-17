<?php
require 'includes/bd.php';
$userid=$_COOKIE['userid'];

$sumOfPrice=0;
if(!isset($userid)){
  header("Location: /login.php");
}else{
  if(isset($_GET['buy'])){
    mysqli_query($link, "DELETE FROM `orders` WHERE `user_id`='$userid'");
    echo '<p>Поздравляем с покупкой</p> <a href="/">На главную</a>';
    exit();
  }
}
if(isset($_POST["delorder"])){
  $or=$_POST["delorder"];
  mysqli_query($link,"DELETE FROM `orders` WHERE `id`='$or'");
}
 ?>
<!DOCTYPE html>
<html lang="ru" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link href="https://fonts.googleapis.com/css?family=Courier+Prime&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <title>Корзина</title>
  </head>
  <body>
    <?php include 'includes/header.php'; ?>
    <div>
      <?php
      $q=mysqli_query($link,"SELECT * FROM `orders` WHERE `user_id`='$userid'");
      $count_of_orders=mysqli_fetch_assoc(mysqli_query($link,"SELECT COUNT(`id`) as `a` FROM `orders` WHERE `user_id`='$userid'"))['a'];
      while ($order = mysqli_fetch_assoc($q)) {
        $itemid=$order['item_id'];
        $title=mysqli_fetch_assoc(mysqli_query($link,"select `name` from `items` where `id`=$itemid"))['name'];
        $img=mysqli_fetch_assoc(mysqli_query($link,"select `img` from `items` where `id`=$itemid"))['img'];
        $orderid=$order['id'];
        $sumOfPrice+=$order['price'];
        echo '
        <form style="float:left; margin:20px 0px; padding:20px; width:25%;" method="POST" action="cart.php">
          <img style="width:100%" src="img/'.$img.'">
          <p class="text" style="width:auto; margin-bottom:10px; height:auto; color:#595959">' . $title . ' Цена:' . $order['price'] . ' </p>
          <input type="hidden" name="delorder" value="'. $orderid .'">
          <input class="submit" type="submit" value="Удалить из корзины">
        </form>';

      }

      if($count_of_orders==0){
        echo '<p style="color:#595959; margin-left:10%; font-size: 20pt; width:100%">Ваша корзина пуста, сначала добавьте в неё товары </p><br>';
      }else{
        echo '<button type="button" class="submit center" style="width:20%;" name="button"><a href="?buy=1" style="text-decoration:none; color:white;">Купить всё!</a></button>';
        echo '<p class="center" style="color:#595959; font-size: 20pt;">Сумма:' . $sumOfPrice . '₽</p>';
      }
       ?>
    </div>
  </body>
</html>
