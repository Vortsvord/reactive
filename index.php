<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title></title>
    <meta http-equiv="Content-Type" content="text/html;"/>
	<!--<link href="style.css" rel="stylesheet" type="text/css"/> -->
</head>
<body>
	<?php 
		//include('firstpars.php');
	?>
	<form method='post' action='dateupdate.php' enctype="multipart/form-data">
		<label>Выберете файл (формат xml)</label> <br>
		<input type='file' name='xmlfile'><br>
		<label>Введите e-mail:</label><br>
		<input type = 'text' name = 'email'><br>
		<input type='submit' name='submit' value='Отправить'>
	</form>
<body>
</html>
