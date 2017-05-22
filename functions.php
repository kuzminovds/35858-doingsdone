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


if (!empty($_POST)) {
	$name = $_POST["name"];
	$project = $_POST["project"];
	$date = $_POST["date"];

	// $last_data = [
	// 'name' => $name,
	// 'project' => $project,
	// 'date' => $date
	// ];

	if (isset($name)) {
		if (strlen($name) == 0) {
			$errors["name"] = "Заполните поле - Название";
		}
	}

	if (isset($project)) {
		if (strlen($project) == 0) {
			$errors["project"] = "Заполните поле - Проект";
		}
	}

	if (isset($date)) {
		if (strlen($date) == 0) {
			$errors["date"] = "Заполните поле - Дата выполнения";
		}
	}
	if (isset($_FILES['preview'])) {
		$file = $_FILES['preview'];
		$uploaddir = __DIR__.DIRECTORY_SEPARATOR.uploads.DIRECTORY_SEPARATOR;
		$uploadfile = $uploaddir . basename($file['name']);
		move_uploaded_file($file["tmp_name"], $uploadfile);
	}
	if ($errors == []) {
		unset($_GET['add']);
		// $last_data = [];
		$sql = "INSERT INTO tasks (dt_add, title, deadline, project_id, user_id) VALUES (NOW(), ?, ?, ?, ?)";
		$db->insertData($sql, [$name, $date, $project, $_SESSION['user']['id']]);
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