<?php 
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
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Дела в Порядке!</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body><!--class="overlay"-->
    <h1 class="visually-hidden">Дела в порядке</h1>

    <div class="page-wrapper">
        <div class="container container--with-sidebar">
            <header class="main-header">
                <a href="#">
                    <img src="img/logo.png" width="153" height="42" alt="Логитип Дела в порядке">
                </a>

                <div class="main-header__side">
                    <a class="main-header__side-item button button--plus" href="#">Добавить задачу</a>

                    <div class="main-header__side-item user-menu">
                        <div class="user-menu__image">
                            <img src="img/user-pic.jpg" width="40" height="40" alt="Пользователь">
                        </div>

                        <div class="user-menu__data">
                            <p>Константин</p>

                            <a href="#">Выйти</a>
                        </div>
                    </div>
                </div>
            </header>