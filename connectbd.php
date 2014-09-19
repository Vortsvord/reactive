<?php
	$db=@mysql_connect("localhost","root") or die ("Ошибка подключения к серверу БД");
	mysql_query("SET NAMES utf8");
	mysql_select_db("reactive",$db);
?>
