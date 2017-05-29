INSERT INTO projects SET name = 'Входящие';
INSERT INTO projects SET name = 'Учеба';
INSERT INTO projects SET name = 'Работа';
INSERT INTO projects SET name = 'Домашние дела';
INSERT INTO projects SET name = 'Авто';


INSERT INTO users 
SET dt_reg = NOW(), email = 'ignat.v@gmail.com', name = 'Игнат', password = '$2y$10$OqvsKHQwr0Wk6FMZDoHo1uHoXd4UdxJG/5UDtUiie00XaxMHrW8ka';

INSERT INTO users 
SET dt_reg = NOW(), email = 'kitty_93@li.ru', name = 'Леночка', password = '$2y$10$bWtSjUhwgggtxrnJ7rxmIe63ABubHQs0AS0hgnOo41IEdMHkYoSVa';

INSERT INTO users 
SET dt_reg = NOW(), email = 'warrior07@mail.ru', name = 'Руслан', password = '$2y$10$2OxpEH7narYpkOT1H5cApezuzh10tZEEQ2axgFOaKW.55LxIJBgWW';


INSERT INTO tasks 
SET dt_add = NOW(), title = 'Собеседование в IT компании', deadline = ADDDATE(NOW(), INTERVAL 14 DAY), user_id = 1, project_id = 3;

INSERT INTO tasks 
SET dt_add = NOW(), title = 'Выполнить тестовое задание', deadline = ADDDATE(NOW(), INTERVAL 10 DAY), user_id = 1, project_id = 3;

INSERT INTO tasks 
SET dt_add = NOW(), title = 'Сделать задание первого раздела', deadline = ADDDATE(NOW(), INTERVAL 7 DAY), user_id = 1, project_id = 2;

INSERT INTO tasks 
SET dt_add = NOW(), title = 'Встреча с другом', deadline = ADDDATE(NOW(), INTERVAL 8 DAY), user_id = 3, project_id = 1;

INSERT INTO tasks 
SET dt_add = NOW(), title = 'Купить корм для кота', deadline = ADDDATE(NOW(), INTERVAL 15 DAY), user_id = 2, project_id = 4;

INSERT INTO tasks 
SET dt_add = NOW(), title = 'Заказать пиццу', deadline = ADDDATE(NOW(), INTERVAL 13 DAY), user_id = 2, project_id = 4;