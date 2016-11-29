 <?php  include('head.php');  ?>
 <?php require_once 'config.inc.php'; include_once 'module.php'; include('libauth.php'); ?>
 
 <?php
$reg = new auth();  //~ Создаем новый объект класса
$form = '

	<form action="" method="post">
	 <body class="login" style="">
    <div class="login-container">
      <a href="index.php"><img width="288" height="59" src="./images/logo-2x.png"></a>
 
        <div class="form-group">
          <div class="input-group">
            <span class="input-group-addon"><i class="icon-envelope"></i></span><input class="form-control" type="text" name="mail" value="'.@$_POST['mail'].'" placeholder="Введите ваш адрес электронной почты">
          </div>
        </div>
		
        <div class="form-group">
          <div class="input-group">
            <span class="input-group-addon"><i class="icon-lock"></i></span><input class="form-control" type="password" name="passwd" placeholder="Пароль">
          </div>
        </div>
		
        <div class="form-group">
          <div class="input-group">
            <span class="input-group-addon"><i class="icon-lock"></i></span><input class="form-control" "password" name="passwd2" placeholder="Подтверждение пароля">
          </div>
        </div>
       
    		<div class="form-group">
          <div class="input-group">
            <span class="input-group-addon"><i class="icon-user"></i></span><input class="form-control" type="text" name="login" id="" value="'.@$_POST['login'].'" placeholder="Фамилия Имя Отчество">
          </div>
        </div>
		
	
		<input class="btn btn-lg btn-primary btn-block login-submit" type="submit" value="Зарегистрироваться" name="send" />
	</form>
	
	';
if (isset($_POST['send'])) {
	if ($reg->reg($_POST['login'], $_POST['passwd'], $_POST['passwd2'], $_POST['mail'])) {
		print '
			<h2>Регистрация успешна.</h2>
			Вы можете войти <a href="login.php">авторизоваться</a>.<br><br>
		';
	} else print $form;
} else print $form;


//var_dump($_POST);
?>


	
	      <body class="login" style="">
    <!-- Login Screen -->
    <div class="login-container">
    

	<div class="social-login clearfix">
<?php
if (isset($_SESSION['user'])) 
{    echo '<p><a href="info.php">Скрытый контент</a></p>';}
 else if (!isset($_GET['code']) && !isset($_SESSION['user'])) 
{   foreach ($adapters as $title => $adapter) {    echo '<a class="btn btn-primary pull-' . ucfirst($title) . ' ' . ucfirst($title) . '" href="' . $adapter->getAuthUrl() . '"><i class="icon-' . ucfirst($title) . '"></i> Войти с ' . ucfirst($title) . ' </a>';  }}
?>
        </div>
		
        <p>
          Уже зарегистрировались?
        </p>
        <a class="btn btn-default btn-block"  href="login.php">Войти СЕЙЧАС</a>
     
    </div>
    <!-- End Signup Screen -->
  
</body></html>