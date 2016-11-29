<?php header("location:index.php"); session_start() ?>
<?php require_once 'config.inc.php'; include_once 'module.php'; include('libauth.php');  ?>
<?php


$auth = new auth(); //~ Создаем новый объект класса
if (isset($_GET['exit'])) $auth->exit_user();
unset($_SESSION['user']);

exit();





?>