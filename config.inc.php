<?php
$host       = "localhost";
$dbuser     = "c14105_ruso";
$dbpass     = "a123456b";
$dbk        = "c14105_ruso";
$link = mysql_connect($host, $dbuser, $dbpass) or die(mysql_error()); 
mysql_select_db($dbk, $link); 
include_once 'module.php'; 
$db = mysql_connect($host, $dbuser, $dbpass);
$_DB = new mysqli($host,$dbuser,$dbpass,$dbk);
$_DB->set_charset("utf8");
mysql_select_db($dbk);
mysql_query("SET NAMES utf8");
?>
