<?php
require("includes/database.php");#добавление всех переменных из файла
$id=$_GET['item'];
#если не пришёл get запрос, то возвращаемся на главную страницу
if(!isset($id)){
  header("Location: /");
}
#запоминаем id юзера, если в куках ничё не нашли, то значит юзер не вошёл в акк и помечаем, что id у него -1
$userid=$_COOKIE["userid"];
if(!isset($userid)) $userid=-1;
$q=mysqli_query($link,"SELECT * FROM `users` WHERE `id`='$userid' AND `isAdmin`='1'");
$user=mysqli_fetch_assoc($q);
#мы смотрим в бд, и если у юзера есть пометка, что он админ, то ставим в переменную true
if(count($user)==0){
  $isAdmin=false;
}
else{
  $isAdmin=true;
}
#получаем всю инфу о предмете, id которого передался в get запросе
$q=mysqli_query($link,"SELECT * FROM `items` WHERE `id`='$id'");
$item=mysqli_fetch_assoc($q);
?>
<!DOCTYPE html>
<html lang="ru" dir="ltr">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="css/style.css">
  <title>M-shop</title>
  <style>
  input, textarea {
    background-color : #e4dada;
  }
  </style>
</head>
<body>
  <?php include 'includes/header.php';
  #если чел зашёл под акком админа, то появляются разные плюшки для редактирования
  if($isAdmin){
    echo '<div style="margin:20px 35%; width:30%; text-align:center;">
            <form action="item.php?item='.$item['id'].'" method="post" enctype="multipart/form-data">
            <p>Картинка:</p>
            <input type="file" name="upload">
            <button>Загрузить</button>
          </form>';
            $filePath  = $_FILES['upload']['tmp_name'];
            if(isset($filePath)){
              if (!move_uploaded_file($filePath, __DIR__ . '/img/' . $_FILES['upload']['name'])) {
                die('При записи изображения на диск произошла ошибка.');
              }
              $imm=$_FILES['upload']['name'];
              $itid= $item['id'];
              mysqli_query($link,"UPDATE `items` SET `img`='$imm' WHERE `id`='$itid'");
              $q=mysqli_query($link,"SELECT * FROM `items` WHERE `id`='$id'");
              $item=mysqli_fetch_assoc($q);
            }
            echo '</div>';

  }
  if($isAdmin){
    echo '<form id="edit" action="admin.php" method="post">
          <input type="hidden" name="uid" value="'.$item['id'].'">
          <input type="hidden" name="Ucategories_id" value="'.$item['categoryId'].'">';
  }
  echo '<div style="margin:20px 35%; width:30%; text-align:center;">
  <img src="img/'.$item['img'].'" width="100%">';

  echo '
  </div>
  <div style="font-family: sans serif; margin:20px 15%; width:70%;text-align:center;">';
  if($isAdmin) echo '<input name="Uname" type="text" value="'.$item['name'].'">';
  else{
    echo '<h1>'.$item['name'].'</h1>';
  }
  echo '<table>
  <tr>
  <td class="bottomDesc">';
  if($isAdmin) echo 'Материал: <input name="Umaterial" type="text" size="40" value="'.$item['material'].'">';
  else {
    echo 'Материал:'.$item['material'];
  }
  echo '</td>
  <td rowspan="3" style="border-bottom: 2px dashed #737373; font-size:13pt;">';
  if($isAdmin){
    echo '<textarea name="Udescription" rows=10 cols=50>'.$item['description'].'</textarea>';
  } else {
    echo $item['description'];
  }
  echo '</td>
  </tr>
  <tr>
  <td class="bottomDesc">';
  if($isAdmin){
    echo 'Страна производитель: <input name="Ucountry" type="text" value="'.$item['country'].'">';
  }else{
    echo 'Страна производитель: '.$item['country'];
  }
  echo '</td>
  </tr>
  <tr>
  <td class="bottomDesc">';
  if($isAdmin){
    echo 'Цена: <input type="number" type="text" name="Uprice" value="'.$item['price'].'">';
  }else{
    echo 'Цена: '.$item['price'].'₽';
  }
  if($isAdmin){
    echo '</td></tr></table><button form="edit" class="submit">Отредактировать</button></form></div>';
  }else{
    echo '</td>
    </tr>
    </table>
    <form id="add" action="add.php" method="post">
    <input type="hidden" name="id" value="'.$item['id'].'">
    <button form="add" class="submit">В корзину</button>
    </form>
    </div>';
  }
  ?>

</body>
</html>
