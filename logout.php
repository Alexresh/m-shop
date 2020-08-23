<?php #убираем у куки время, чтобы они исчезли и переходим на главную
setcookie('userid',$user['id'],time()-3600,"/");
setcookie('username',$user['name'],time()-3600,"/");
header('Location: /');
 ?>
