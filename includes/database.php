<?php
$db_host='localhost';
$db_user='root';
$db_pass='';
$db_database='m-shop';
$link = mysqli_connect($db_host,$db_user,$db_pass);#подключение к серверу бд по заданным параметрам
mysqli_select_db($link,$db_database) or exit("database dont work".mysqli_error()); #выбирам нужную бд
?>
