 <?php  include('head.php');  ?>
 <?php require_once 'config.inc.php'; include_once 'module.php';  ?>

<?php
$r='';

$auth = new auth(); //~ Создаем новый объект класса

//~ Авторизация
if (isset($_POST['send'])) {
	if (!$auth->authorization()) {
		$error = $_SESSION['error'];
		unset ($_SESSION['error']);
	}
 ?>	
	


<?php
}


//~ выход
if (isset($_GET['exit'])) $auth->exit_user();

//~ Проверка авторизации
if ($auth->check()) $r.='Добро пожаловать '.$_SESSION['id_user'].'<br/>  <a href="index.php"><img width="288" height="59" src="./images/logo-2x.png"></a><br><a class="btn btn-default btn-block" href="?exit">Выйти</a><br><br>';




 

else {
	//~ если есть ошибки выводим и предлагаем восстановить пароль
	if (isset($error)) $r.=$error.'<a href="recovery.php">Восстановить пароль</a><br/>';

	$r.='
	 <body class="login" style="">
    <!-- Login Screen -->
    <div class="login-container">
      <a href="index.php"><img width="288" height="59" src="./images/logo-2x.png"></a>
	<form action="" method="post">
	   <div class="form-group">
          <div class="input-group">
            <span class="input-group-addon"><i class="icon-envelope"></i></span><input class="form-control" type="text" name="login" value="'.@$_POST['login'].'"  placeholder="IvanPetrov@mail.ru">
          </div>
        </div>
		
		  <div class="form-group">
          <div class="input-group">
            <span class="input-group-addon"><i class="icon-lock"></i></span><input class="form-control" type="password" name="passwd" placeholder="Пароль">
          </div>
        </div>

		  <a class="pull-right" href="recovery.php">Забыли пароль?</a><br><br>
        
 	   
		<input class="btn btn-lg btn-primary btn-block login-submit" type="submit" value="Войти" name="send" />
	</form>
	';
}
	print $r;
?>




     
      
       
       
	         <body class="login" style="">
    <!-- Login Screen -->
    <div class="login-container">
    
	   
	  <div class="social-login clearfix">
<?php
if (!isset($_GET['code']) && !isset($_SESSION['user'])) 
{   foreach ($adapters as $title => $adapter) {    echo '<a class="btn btn-primary pull-' . ucfirst($title) . ' ' . ucfirst($title) . '" href="' . $adapter->getAuthUrl() . '"><i class="icon-' . ucfirst($title) . '"></i> Войти с ' . ucfirst($title) . ' </a>';  }}
?>
        </div> 
	   
	   
	   
     <p>
          Еще нет учетной записи?
        </p>
        <a class="btn btn-default btn-block" href="sign.php">Зарегистрироваться</a>
  
    </div>
    <!-- End Login Screen -->
  
</body></html>