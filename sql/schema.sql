CREATE DATABASE todolist;
USE todolist;

CREATE TABLE projects (
	id INT AUTO_INCREMENT PRIMARY KEY,
	name CHAR(128)
);

CREATE TABLE tasks (
	id INT AUTO_INCREMENT PRIMARY KEY,
	dt_add datetime,
	dt_ready datetime,
	title CHAR(255),
	file_path CHAR(255),
	deadline datetime,
	img_path CHAR(255),
	user_id int UNSIGNED,
	project_id int UNSIGNED
);

CREATE TABLE users (
	id INT AUTO_INCREMENT PRIMARY KEY,
	dt_reg datetime,
	email CHAR(255),
	name CHAR(255),
	password CHAR(64),
	contact CHAR(255),
	task_id int UNSIGNED,
	project_id int UNSIGNED
);

INSERT INTO projects SET name = 'Входящие';
INSERT INTO projects SET name = 'Учеба';
INSERT INTO projects SET name = 'Работа';
INSERT INTO projects SET name = 'Домашние дела';
INSERT INTO projects SET name = 'Авто';

CREATE UNIQUE INDEX email ON users(email);

CREATE INDEX project ON projects(name);
CREATE INDEX task ON tasks(title);
