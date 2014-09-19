<?php
	include ('connectbd.php');
	
	$xml_parser = xml_parser_create();
	xml_set_element_handler($xml_parser, 'startElement', 'endElement');
	xml_set_character_data_handler($xml_parser, 'stringElement');
	$i = false;
	$amount = 0;
	$user = array();
	$elem = null;
	$temp = array();
	
	function stringElement($parser, $str){
		global $i, $user, $elem, $temp;
		if ($elem != 'USER' && $i ){
			$temp[$elem] = $str;
		}
	}
	
	function startElement($parser, $name){
		global $i, $user, $elem;
		if ($name == 'USER'){
			$i = true;
		}
		
		$elem = $name;
	}
	
	function endElement($parser, $name) { 
		global $i, $amount, $user, $temp;
		if ($name == 'USER') {
			$i = false;
			if (isset($temp['LOGIN'])){
				$user[$temp['LOGIN']] = array('NAME' => $temp['NAME'], 'EMAIL' => $temp['EMAIL']);
				$amount++;
			}
			$temp = array();
		}
		$elem = null;
	
	}

	
$ok = false;	
	if (isset($_POST['submit'])){
		if ($_FILES['xmlfile']['type'] == 'text/xml'){
			if(is_uploaded_file($_FILES["xmlfile"]["tmp_name"]))
			   {
					$n = explode('.', $_FILES["xmlfile"]["name"]);
					$filename = $n[0].'_'.time().'.xml';
					move_uploaded_file($_FILES["xmlfile"]["tmp_name"], $filename);
					$ok = true;
			   } 
			   else {
				  echo("Ошибка загрузки файла");
			   } 
		}
		else {echo 'Не верный формат файла';} 
	}
	
	if ($ok){
		$fp = fopen($filename, 'r');
		while ($data = fgets($fp)) {
			if (!xml_parse($xml_parser, $data, feof($fp))){
				echo "XML Error: ".xml_error_string(xml_get_error_code($xml_parser)); 
				echo " at line ".xml_get_current_line_number($xml_parser); 
				break;
			}
		}

		xml_parser_free($xml_parser);
		
		$sql = "SELECT * FROM `users`";
		$r = mysql_query($sql, $db);
		$del = 0;
		$upd = 0;
		$all = 0;
	
		while ($table = mysql_fetch_array($r)){
			
			if (isset($user[$table['login']])){
				$name = $user[$table['login']]['NAME'];
				$email = $user[$table['login']]['EMAIL'];
				if ($name != $table['name']) {
					if ($email != $table['email'])
						$sql = "UPDATE `users` SET `name`='$name',`email`='$email' WHERE `login` = '".$table['login']."'";
					else
						$sql = "UPDATE `users` SET `name`='$name' WHERE `login` = '".$table['login']."'";
					
					$query = mysql_query($sql, $db);
					$upd++;
				}
				else {
					if ($email != $table['email']){
						$sql = "UPDATE `users` SET `email`='$email' WHERE `login` = '".$table['login']."'";
						$query = mysql_query($sql, $db);
						$upd++;
					}
				}
				
			}
			else {
				$sql = "DELETE FROM `users` WHERE `login` = '".$table['login']."'";
				$query = mysql_query($sql, $db);
				$del++;
			}
			$all++;
			
		}
		
		$report = "Отчет: <br>
						Всего обработано $all записей. Из них удалено $del записей, обновлено $upd записей";
		echo $report;
		

		$thm='Отчет об обновлении данных';
		$headers  = "Content-type: text/html; charset=utf-8 \r\n";
		$headers .= "From: sitename.com \r\n";
		$mail_to=$_POST['email'];
		if (mail($mail_to, $thm, $report, $headers)){
			echo 'Письмо с отчетом отправлено на указанный адрес';
		}
		else {echo 'Произошла ошибка при отправке сообщения.';}
	}
	
?>
