<?php 
session_start();
require_once 'config.inc.php'; include_once 'module.php';

$result = mysql_query('SELECT * FROM users WHERE id_user = '.$_SESSION['id_user'].'', $db);
while ($row = mysql_fetch_assoc($result)) {   
	$socialId_user=$row['id_user'];
	$name_user=$row['name'];
	$email_user=$row['email'];
	$sex_user=$row['sex'];
	$birthday_user=$row['birthday'];
	$avatar_user=$row['avatar'];
	$type_user='local';
	$prev_user=$row['prev'];
}

echo '<form method="get" action="change.php">
			<label for="username">Cтарый пароль:</label>
			<input  name="old_pass" class="form-control" type="password">
			<label for="username">Новый пароль:</label>
			<input name="new_pass" class="form-control" type="password">
			<label for="44">Подтвердите ноый пароль:</label>
			<input class=" name="conf_new_pass" form-control" type="password">
			<button type="submit">Cменить пароль </button>
</form>
' ;


echo "<br>".$name_user;
 ?>
