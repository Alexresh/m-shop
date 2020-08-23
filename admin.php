<?php
require 'includes/database.php';
$userid=$_COOKIE["userid"];
if(!isset($userid)) $userid=-1;
$q=mysqli_query($link,"SELECT * FROM `users` WHERE `id`='$userid' AND `isAdmin`='1'");
$user=mysqli_fetch_assoc($q);
if(isset($_POST['Uname'])){
  $uid=$_POST['uid'];
  $uname=$_POST['Uname'];
  $udescription=$_POST['Udescription'];
  $uprice=$_POST['Uprice'];
  $umaterial=$_POST['Umaterial'];
  $ucountry=$_POST['Ucountry'];
  $ucatgories_id=$_POST['Ucategories_id'];
  $uimg=$_POST['Uimg'];
  mysqli_query($link,"UPDATE `items` SET `name`='$uname',
                                   `description`='$udescription',
                                   `price`='$uprice',
                                   `material`='$umaterial',
                                   `country`='$ucountry',
                                   `categoryId`='$ucatgories_id',
                                   `img`='$uimg' WHERE `id`='$uid'");
header('Location: /item.php?item='.$uid);
}
if(count($user)==0):
  header("Location: /");
else:?>
<!DOCTYPE html>
<html lang="ru" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link href="https://fonts.googleapis.com/css?family=Courier+Prime&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <title>Админ-панель</title>
  </head>
  <body>
  <?php include 'includes/header.php'; ?>
  <div class="center">
    <div style="padding: 10px;">
      <p>Добавить товар:</p>
      <form action="admin.php" method="post">
        <p>Товар:<input type="text" name="name"></p>
        <p>Описание:<textarea name="description" rows="8" cols="30"></textarea></p>
        <p>Цена:<input type="number" name="price"></p>
        <p>Материал:<input type="text" name="material"></p>
        <p>Страна производитель:<input type="text" name="country"></p>
        <p>Категория:<input type="number" name="categories_id" value="1"></p>
        <p>Номер картинки:<input type="text" name="img"></p>
        <p style="font-size:15px">1-Кроссовки; 2-Куртки; 3-Свитера; 4-Рубашки;<br> 5-Парки; 6-Аксессуары;</p>
        <input type="submit" value="Добавить товар">
      </form>
    </div>
    <div style="padding: 10px;border-bottom:5px dotted red">
      <form action="admin.php" method="post" enctype="multipart/form-data">
        <p>Картинка:</p>
        <input type="file" name="upload">
        <button>Загрузить</button>
      </form>
      <?php
        $filePath  = $_FILES['upload']['tmp_name'];
        if(isset($filePath)){
          if (!move_uploaded_file($filePath, __DIR__ . '/img/' . $_FILES['upload']['name'])) {
            die('При записи изображения на диск произошла ошибка.');
          }
        }
      ?>
    </div>
    <?php
      if (isset($_POST["name"])) {
        $name=$_POST['name'];
        $description=$_POST['description'];
        $material=$_POST['material'];
        $country=$_POST['country'];
        $img=$_POST['img'];
        $price=$_POST['price'];
        $categories_id=$_POST['categories_id'];
        mysqli_query($link,"INSERT INTO `items` VALUES(NULL,'$name','$description','$price','$material','$country','$categories_id','$img')");
        echo mysqli_error($link);
      }
     ?>
    <div style="padding: 10px;border-bottom:5px dotted red">
      <p>Удаление товара:</p>
       <form action="admin.php" method="post">
         <input type="text" name="delid" placeholder="Название">
         <input type="submit" value="Удалить">
       </form>
       <?php
        if(isset($_POST['delid'])){
          $delid=$_POST['delid'];
          mysqli_query($link,"DELETE FROM `items` WHERE `name`='$delid'");
        }
        ?>
    </div>

    </div>

  </div>

  </body>
</html>
<?php endif; ?>
