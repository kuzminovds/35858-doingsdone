            <div class="content">
                <section class="content__side">
                    <h2 class="content__side-heading">Проекты</h2>

                    <nav class="main-navigation">
                        <ul class="main-navigation__list">


                            <?php if ($_GET['cat']): ?>
                                <li class="main-navigation__list-item">
                            <?php else: ?>
                                <li class="main-navigation__list-item main-navigation__list-item--active">
                            <?php endif ?>
                                    <a class="main-navigation__list-item-link" href="/index.php">Все</a>
                                    <span class="main-navigation__list-item-count"><?php print (counter_task($data['tasks'], "Все")); ?></span>
                                </li>

                            <?php foreach($data[categories] as $cat): ?>
                                <?php if ($_GET['cat'] == $cat[0]): ?>
                                    <li class="main-navigation__list-item main-navigation__list-item--active">
                                <?php else: ?>
                                    <li class="main-navigation__list-item">
                                <?php endif ?>
                                    <a class="main-navigation__list-item-link" href="/index.php?cat=<?= $cat['0']; ?>"><?= $cat[1]; ?></a>
                                    <span class="main-navigation__list-item-count"><?php print (counter_task($data['tasks'], $cat[0])); ?></span>
                                </li>
                            <?php endforeach; ?>

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
                            <nav class="tasks-switch"> 
                              <a href="/" class="tasks-switch__item tasks-switch__item--active">Все задачи</a> 
                              <a href="/" class="tasks-switch__item">Повестка дня</a> 
                              <a href="/" class="tasks-switch__item">Завтра</a> 
                              <a href="/" class="tasks-switch__item">Просроченные</a> 
                            </nav>
                        </div>

                        <label class="checkbox">
                            <?php if (isset($_COOKIE["show_completed"]) && $_COOKIE["show_completed"] == 1): ?>
                                <input id="show-complete-tasks" class="checkbox__input visually-hidden" type="checkbox" checked>
                            <?php else: ?>
                                <input id="show-complete-tasks" class="checkbox__input visually-hidden" type="checkbox">

                            <?php endif ?>
                            <span class="checkbox__text">Показывать выполненные</span>
                            
                        </label>
                    </div>

                    <table class="tasks">
                        <?php foreach ($data['tasks'] as $key => $val): ?>
                            <?php if ($_GET['cat'] == 0): ?>
                                <?php if ($_COOKIE["show_completed"] == 0 AND $val[5] == 1): ?>
                                    <tr class="tasks__item task <?='task--completed'?> hidden">
                                
                                <?php else: ?>
                                    <?php if ($val[5] == 1): ?>
                                        <tr class="tasks__item task <?='task--completed'?>">
                                    <?php else: ?>
                                        <tr class="tasks__item task">
                                    <?php endif; ?>
                                <?php endif ?>
                                    <td class="task__select">
                                        <label class="checkbox task__checkbox">
                                            <input class="checkbox__input visually-hidden" type="checkbox">
                                            <span class="checkbox__text"><?=$val[1];?></span>
                                        </label>
                                    </td>
                                    <td class="task__date"><?=date_create($val[2])->Format('d-m-Y');?></td>

                                    <td class="task__controls">
                                        <button class="expand-control" type="button" name="button">Выполнить первое задание</button>

                                        <ul class="expand-list hidden">
                                            <li class="expand-list__item">
                                                <a href="/change-status.php?id=<?=$val[0];?>&status=1">Выполнить</a>
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
                            <?php elseif ($_GET['cat'] == $val[3]): ?>

                                <?php if ($_COOKIE["show_completed"] == 0 AND $val[5] == 1): ?>
                                    <tr class="tasks__item task <?='task--completed'?> hidden">
                                
                                <?php else: ?>
                                    <?php if ($val[5] == 1): ?>
                                        <tr class="tasks__item task <?='task--completed'?>">
                                    <?php else: ?>
                                        <tr class="tasks__item task">
                                    <?php endif; ?>
                                <?php endif ?>
                                    <td class="task__select">
                                        <label class="checkbox task__checkbox">
                                            <input class="checkbox__input visually-hidden" type="checkbox">
                                            <span class="checkbox__text"><?= $val[1]; ?></span>
                                        </label>
                                    </td>
                                    <td class="task__date"><?=date_create($val[2])->Format('d-m-Y');?></td>

                                    <td class="task__controls">
                                        <button class="expand-control" type="button" name="button">Выполнить первое задание</button>

                                        <ul class="expand-list hidden">
                                            <li class="expand-list__item">
                                                <a href="/change-status.php?id=<?=$val[0];?>&status=1">Выполнить</a>
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
                                
                            <?php endif; ?>

                        <?php endforeach; ?>

                    </table>
                </main>
            </div>
        </div>
    </div>
