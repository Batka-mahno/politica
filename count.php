
<?php
$count_versionclient = $_SERVER['HTTP_USER_AGENT'];
//$name = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
$count_name = $_SERVER['REQUEST_URI'];
$count_user = $_SERVER['REMOTE_ADDR'];



if (isset($_SERVER['HTTP_REFERER']) ) {	
$count_site = $_SERVER['HTTP_REFERER'];
	} else {$count_site = 'local';} 

$count_da = date("d.m.Y");
$count_ho = date("h")+6;
$count_min = date(":i:s");
$count_tim = $count_ho.$count_min;

$count_db = new mysql();
$count_db->query("INSERT INTO `cont` (`versionclient`, `name`, `user`,`site`,`date`,`time`) VALUES ('".$count_versionclient."', '".$count_name."', '".$count_user."', '".$count_site."', '".$count_da."', '".$count_tim."');", '', '');
?>




	<div class="def" >

</div>