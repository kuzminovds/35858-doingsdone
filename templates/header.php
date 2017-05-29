    <h1 class="visually-hidden">Дела в порядке</h1>

    <div class="page-wrapper">
    <?php if (!isset($_SESSION['user'])): ?>

        <div class="container">
            <header class="main-header">
                <a href="#">
                    <img src="img/logo.png" width="153" height="42" alt="Логитип Дела в порядке">
                </a>

                <div class="main-header__side">
                    <a class="main-header__side-item button button--transparent" href="?login">Войти</a>
                </div>
            </header>

    <?php else: ?>

        <div class="container container--with-sidebar">
            <header class="main-header">
                <a href="#">
                    <img src="img/logo.png" width="153" height="42" alt="Логитип Дела в порядке">
                </a>

                <div class="main-header__side">
                    
                    <a class="main-header__side-item button button--plus" href="index.php?add">Добавить задачу</a>

                    <div class="main-header__side-item user-menu">
                        <div class="user-menu__image">
                            <img src="img/user-pic.jpg" width="40" height="40" alt="Пользователь">
                        </div>

                        <div class="user-menu__data">
                            <p><?=strip_tags($_SESSION['user']['auth_username']);?></p>

                            <a href="?logout">Выйти</a>
                        </div>
                    </div>
                </div>
            </header>
            
        <?php endif ?>
