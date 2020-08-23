<script type="text/javascript" src="js/script.js"></script>
<div class="head" id="up">
  <a href="/" id="logo">M-shop</a>
  <div id="auth">
    <?php #если в куках есть данные о юзере(он в своём аккаунте), то:...
    if (isset($_COOKIE['username'])): ?>
      <?php
        $userid=$_COOKIE["userid"];#запоминаем его id
        if(isset($userid)){
          $q=mysqli_query($link,"SELECT * FROM `users` WHERE `id`='$userid' AND `isAdmin`='1'");#узнаём из бд, админ ли он
          $user=mysqli_fetch_assoc($q);
          #если этот юзер ещё и админ, то даём ему ссыль на админ панель
          if(count($user)!=0)
            echo '<a href="admin.php">Админ-панель</a>';
        }
      ?>
    <span style="font-family: 'Courier Prime', monospace; color:#6c6c6c;margin-right: 20px;"><?php echo $_COOKIE['username'];#выводим имя юзера ?></span> 
    <a href="logout.php">Выход</a>

  <?php else: #если в куках мы не нашли данных, то... ?>
    <a href="reg.php">Регистрация</a> <a href="login.php">Вход</a>
    <?php endif; ?>
  </div>

</div style="z-index:1">
  <div class="main-menu">
    <div style="width:33%; float:left">
      <a class="mm-a" onclick="down()">Контакты</a>
      <div id="about" style="position:relative; display:none">
        <p style="margin:10px 0 0 0;"><a style="margin:auto" href="https://vk.com/rewogi">Илья Размахнин</a></p>
        <p style="margin:0px;"><a style="margin:auto" href="https://vk.com/magnus_fragor">Данила Григорьев</a></p>
      </div>
    </div>
    <div style="width:33%; float:left">
      <a class="mm-a" href="/">Главная</a>
    </div>
    <div style="width:33%; float:left">
      <a class="mm-a" href="/cart.php">Корзина</a>
    </div>
  </div>
