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
 ?>
            <div class="content">
                <section class="content__side">
                    <h2 class="content__side-heading">Проекты</h2>

                    <nav class="main-navigation">
                        <ul class="main-navigation__list">

                            <?php 
                            $index = 0;
                            $num = count($categories);

                            while ($index < $num) {
                                $cat = $categories[$index];

                                if ($index == 0): ?>
                                <li class="main-navigation__list-item main-navigation__list-item--active">
                                <?php else: ?>
                                <li class="main-navigation__list-item">                     
                                <?php endif; ?>
                                <a class="main-navigation__list-item-link" href="#"><?=$cat; ?></a>
                                <span class="main-navigation__list-item-count"><?php print (counter_task($tasks, $cat)); ?></span>
                            </li>
                            <?php 
                            $index++; } ?>

                        </ul>
                    </nav>

                    <a class="button button--transparent button--plus content__side-button" href="#">Добавить проект</a>
                </section>

                <main class="content__main">
                    <h2 class="content__main-heading">Список задач</h2>

                    <form class="search-form" action="index.php" method="post">
                        <input class="search-form__input" type="text" name="" value="" placeholder="Поиск по задачам">

                        <input class="search-form__submit" type="submit" name="" value="Искать">
                    </form>

                    <div class="tasks-controls">
                        <div class="radio-button-group">
                            <label class="radio-button">
                                <input class="radio-button__input visually-hidden" type="radio" name="radio" checked="">
                                <span class="radio-button__text">Все задачи</span>
                            </label>

                            <label class="radio-button">
                                <input class="radio-button__input visually-hidden" type="radio" name="radio">
                                <span class="radio-button__text">Повестка дня</span>
                            </label>

                            <label class="radio-button">
                                <input class="radio-button__input visually-hidden" type="radio" name="radio">
                                <span class="radio-button__text">Завтра</span>
                            </label>

                            <label class="radio-button">
                                <input class="radio-button__input visually-hidden" type="radio" name="radio">
                                <span class="radio-button__text">Просроченные</span>
                            </label>
                        </div>

                        <label class="checkbox">
                            <input id="show-complete-tasks" class="checkbox__input visually-hidden" type="checkbox" checked>
                            <span class="checkbox__text">Показывать выполненные</span>
                        </label>
                    </div>

                    <table class="tasks">
                        <?php foreach ($tasks as $key => $val): ?>

                            <?php if ($val['ready'] == "Да"): ?>
                                <tr class="tasks__item task <?='task--completed'?>">
                            <?php else: ?>
                                <tr class="tasks__item task">
                            <?php endif; ?>
                                <td class="task__select">
                                    <label class="checkbox task__checkbox">
                                        <input class="checkbox__input visually-hidden" type="checkbox">
                                        <span class="checkbox__text"><?=$val['task'];?></span>
                                    </label>
                                </td>
                                <td class="task__date"><?=$val['date'];?></td>

                                <td class="task__controls">
                                    <button class="expand-control" type="button" name="button">Выполнить первое задание</button>

                                    <ul class="expand-list hidden">
                                        <li class="expand-list__item">
                                            <a href="#">Выполнить</a>
                                        </li>

                                        <li class="expand-list__item">
                                            <a href="#">Удалить</a>
                                        </li>

                                        <li class="expand-list__item">
                                            <a href="#">Дублировать</a>
                                        </li>
                                    </ul>
                                </td>
                            </tr>


                        <?php endforeach; ?>

                    </table>
                </main>
            </div>
        </div>
    </div>