 <?php  include('head.php'); require_once 'config.inc.php'; ?>


<?php
$reg = new auth();  //~ Создаем новый объект класса
$r='';
$form='
 <body class="login" style="">
    <!-- Login Screen -->
    <div class="login-container">
         <a href="index.php"><img width="288" height="59" src="./images/logo-2x.png"></a>
	<form action="" method="post">
	 
	 <div class="form-group">
          <div class="input-group">
            <span class="input-group-addon"><i class="icon-envelope"></i></span><input class="form-control" type="text" name="login" id="" value="'.@$_POST['login'].'"  placeholder="IvanPetrov@mail.ru">
          </div>
        </div>
		
			 <div class="form-group">
          <div class="input-group">
            <span class="input-group-addon"><i class="icon-envelope"></i></span><input class="form-control" type="text" name="mail" value=""  placeholder="IvanPetrov@mail.ru">
          </div>
        </div>
	

		       
 	   
		<input class="btn btn-lg btn-primary btn-block login-submit" type="submit" value="Запросить" name="send" />
	</form>
	
	
';

if (isset($_POST['send'])) {
	//~ запрос на восстановление пароля
	$reply = $reg->recovery_pass($_POST['login'], $_POST['mail']);
	if ($reply=='good') {
		//~ положительный ответ
		$r.='Новый пароль был выслан вам на почту';
	} else {
		//~ ошибка во время восстановления
		$r.=$reply.$form;
	}
} else $r.=$form;
print $r;

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
	   
	   
	   
  
        <a class="btn btn-default-outline btn-block"  href="login.php">Войти СЕЙЧАС</a>
  
    </div>
    <!-- End Login Screen -->
  
</body></html>