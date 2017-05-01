<?php
function counter_task($array, $string) {
    $countTask = 0;
    
    if ($string == 'Все') {
        $countTask = count($array);
    } else {
        foreach ($array as $key => $val) {
            if ($val['category'] == $string) {
                $countTask = $countTask + 1;
            }
        }
    }

    return $countTask;
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

$categories = ['Все', 'Входящие', 'Учеба', 'Работа', 'Домашние дела', 'Авто'];

$task1 = [
    'task' => 'Собеседование в IT компании',
    'date' => '01.06.2017',
    'category' => 'Работа',
    'ready' => 'Нет'
];
$task2 = [
    'task' => 'Выполнить тестовое задание',
    'date' => '25.05.2017',
    'category' => 'Работа',
    'ready' => 'Нет'
];
$task3 = [
    'task' => 'Сделать задание первого раздела',
    'date' => '21.04.2017',
    'category' => 'Учеба',
    'ready' => 'Да'
];
$task4 = [
    'task' => 'Встреча с другом',
    'date' => '22.04.2017',
    'category' => 'Входящие',
    'ready' => 'Нет'
];
$task5 = [
    'task' => 'Купить корм для кота',
    'date' => 'Нет',
    'category' => 'Домашние дела',
    'ready' => 'Нет'
];
$task6 = [
    'task' => 'Заказать пиццу',
    'date' => 'Нет',
    'category' => 'Домашние дела',
    'ready' => 'Нет'
];

$tasks = [$task1, $task2, $task3, $task4, $task5, $task6];


if (!empty($_POST)) {
  $name = $_POST["name"];
  $project = $_POST["project"];
  $date = $_POST["date"];

  $last_data = [
                  'name' => $name, 
                  'project' => $project,
                  'date' => $date
                ];

  if (isset($name)) {
    if (strlen($name) == 0) {
      $errors["name"] = "Заполните поле - Название";
      // print($errors["name"]);
    }
  }

  if (isset($project)) {
    if (strlen($project) == 0) {
      $errors["project"] = "Заполните поле - Проект";
      // print($errors["project"]);
    }
  }

  if (isset($date)) {
    if (strlen($date) == 0) {
      $errors["date"] = "Заполните поле - Дата выполнения";
      // print($errors["date"]);
    }
  }

	  // Проверка сущестования переменных...
	  // if ($errors != []) {
	  //   print("Есть ошибка!!!");
	  //   print($errors['name']);
	  //   print($last_data['name']);
	  // }
}

$header = includeTemplate('header', []);
$main = includeTemplate('main', ['categories' => $categories, 'tasks' => $tasks]);
$footer = includeTemplate('footer', []);
$form = includeTemplate('form', ['errors' => $errors, 'last_data' => $last_data]); 


