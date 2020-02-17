<?php
$db_host='localhost';
$db_user='root';
$db_pass='';
$db_database='m-shop';
$link = mysqli_connect($db_host,$db_user,$db_pass);
mysqli_select_db($link,$db_database) or exit("database dont work".mysqli_error());
$db=null;
$ItemCount=mysqli_fetch_assoc(mysqli_query($link,"SELECT COUNT(`id`)as `c` FROM `items`"))['c'];


 ?>
