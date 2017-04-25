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