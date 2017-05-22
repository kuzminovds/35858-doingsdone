<?php
include 'mysql_helper.php';

function counter_task($array, $string) {
	$countTask = 0;

	if ($string == 'Все') {
		$countTask = count($array);
	} else {
		foreach ($array as $key => $val) {
			if ($val[3] == $string) {
				$countTask = $countTask + 1;
			}
		}
	}

	return $countTask;
}

function protect_code($in_data) {
	return htmlspecialchars(strip_tags(trim($in_data)));
}

/**
 * @param  string $filename
 * @param  array  $data
 * @return string
 */
function includeTemplate($filename, $data) {
	if ('templates/'.str_replace('..','',$filename).'.php') {
		htmlspecialchars($data);
		ob_start();
		include 'templates/'.$filename.'.php';
		$text = ob_get_contents();
		ob_end_clean();
		return $text;
		
	} else {
		return '';
	}
}

function email_used($email) {
	$email = protect_code($email);
	if (!empty($email)) {
		$db = new DataBase;
		$sql = "SELECT email FROM users WHERE email = ?;";
		$data = [$email];
		$result = $db->selectData($sql, $data);
		return $result;
	}
}

if (isset($_GET['logout'])) {
	unset($_SESSION['user']);
}

$header = includeTemplate('header', []);
$footer = includeTemplate('footer', []);