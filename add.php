<?php
  include 'includes/bd.php';
  $userid=$_COOKIE['userid'];
  $itemid = $_POST['id'];
  $q = mysqli_fetch_assoc(mysqli_query($link,"select * from `orders` where `item_id`='$itemid' AND `user_id`='$userid'"))['id'];
  if((isset($userid))&&(isset($userid))&&(count($q)==0)){
    $price = mysqli_fetch_assoc(mysqli_query($link,"SELECT `price` from `items` where `id`='$itemid'"))['price'];
    mysqli_query($link,"INSERT INTO `orders` VALUES(null,'$itemid','$userid','$price')");
  }
  header("Location: /");
?>
