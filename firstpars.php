<?php
	include ('connectbd.php');
	
	$file = 'users.xml';
	if (!($fp = fopen($file, 'r'))) { die('файл не найден');}
	$xml_parser = xml_parser_create();
	xml_set_element_handler($xml_parser, 'startElement', 'endElement');
	xml_set_character_data_handler($xml_parser, 'stringElement');
	$i = 0;
	$user = array();
	$elem = null;
	function stringElement($parser, $str){
		global $i, $user, $elem;
		if ($elem == 'LOGIN' || $elem == 'PASSWORD'){
			$user[$i][$elem] = $str;
			
		}
	}
	
	function startElement($parser, $name){
		global $i, $user, $elem;
		if ($name == 'USER'){
			$user[$i] = array();
		}
		
		$elem = $name;
	}
	
	function endElement($parser, $name) { 
		global $i;
		if ($name == 'USER')
			$i++;
		
		$elem = null;
	}

	
	while ($data = fgets($fp)) {
		if (!xml_parse($xml_parser, $data, feof($fp))){
			echo "XML Error: ".xml_error_string(xml_get_error_code($xml_parser)); 
			echo " at line ".xml_get_current_line_number($xml_parser); 
			break;
		}
	}

	xml_parser_free($xml_parser);
	

	for ($j = 0; $j < $i; $j++){
		$login = $user[$j]['LOGIN'];
		$pass = $user[$j]['PASSWORD'];
		$sql = "INSERT INTO users(login, password, name, email) 
				VALUES ('$login', '$pass', '$login', '".$login."@example.com')";
		$r = mysql_query($sql, $db);
	}
	echo 'Всего обработано '.$i.' записей<br>';
	
?>
