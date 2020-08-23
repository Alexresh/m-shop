<?php include 'includes/bd.php';
$category=$_GET['cat'];
if(isset($category)){
  $items=mysqli_query($link,"SELECT * FROM `items` WHERE `categoryid`='$category'");
}else{
  $items=mysqli_query($link,"SELECT * FROM `items`");
}
?>
<!DOCTYPE html>
<html lang="ru" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link href="https://fonts.googleapis.com/css?family=Courier+Prime&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Inria+Serif&display=swap" rel="stylesheet">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/css.css">
    <link rel="stylesheet" href="css/style.css">
    <title>M-shop</title>
  </head>
  <body>
    <?php include 'includes/header.php'; ?>
    <?php include 'includes/slider.html'; ?>
    <div class="sidebar"id="thi">
      <ul>
        <li><a href="/">Все товары</a></li>
        <li><a href="?cat=1">Кроссовки</a></li>
        <li><a href="?cat=2">Куртки</a></li>
        <li><a href="?cat=3">Свитера</a></li>
        <li><a href="?cat=4">Рубашки</a></li>
        <li><a href="?cat=5">Парки</a></li>
        <li ><a href="?cat=6">Аксессуары</a></li>
      </ul>
    </div>
    <div class="content">
      <?php
      while($item = mysqli_fetch_assoc($items)) {
        echo '
        <div class="item" onclick="item('. $item['id'] .')">
          <img src="img/'. $item['img'] .'" width="100%" height="auto">
          <div class="item-desc">
            <h3>'. $item['name'].'</h3>
            <p>' .$item['material'] . '</p>
            <p><b>'. $item['price'].'₽</b></p>
          </div>
        </div>';
      }
       ?>
    </div>
    <?php include 'includes/footer.php'; ?>
  </body>
</html>
