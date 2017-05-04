-- получить список из всех проектов;
SELECT * FROM projects;

-- получить список из всех задач для одного проекта;
SELECT * FROM tasks WHERE project_id = 1;

-- пометить задачу как выполненную;
INSERT INTO tasks SET title = 'Встреча с другом', deadline = '2017.05.05', project_id = 1; -- создаем задачу
UPDATE tasks SET dt_ready = '2017.05.05'; WHERE id = 1 AND title = 'Встреча с другом';     -- помечаем задачу

-- добавить новый проект;
INSERT INTO projects SET name = 'Сайт';

-- добавить новую задачу (включает указание проекта, дату завершения, название);
INSERT INTO tasks SET title = 'Встреча с другом', deadline = '2017.05.05', project_id = 1;

-- получить все задачи для завтрашнего дня;
SELECT * FROM tasks WHERE deadline = '2017.05.05';

-- обновить название задачи по её идентификатору.
UPDATE tasks SET title = 'Встреча с подругой' WHERE id = 1;