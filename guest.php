<?php
require_once 'functions.php';
require_once 'classes/AuthUser.php';
require_once 'classes/DataBase.php';
session_start();
$db = new DataBase;
$auth = new AuthUser;

if (!empty($_POST)) {
	$email = protect_code($_POST['email']);
	$password = protect_code($_POST['password']);

	$login_data = [
	'email' => $email
	];
}

if (isset($email)) {
	if (strlen($email) == 0) {
		$login_errors['email'] = "Вы не указали - E-mail";
	} elseif (filter_var($email, FILTER_VALIDATE_EMAIL) == false) {
		$login_errors['email'] = "E-mail введён некорректно";
	}
}
if (isset($password)) {
	if (strlen($password) == 0) {
		$login_errors['password'] = "Вы не указали - Пароль";
	}
}

if ($auth->doAuth($email, $password)) { //Пользователь выполнил вход
	header("Location: /index.php");
}


	$form = includeTemplate('login', ['login_errors' => $login_errors, 'login_data' => $login_data]);

	?>
	<!DOCTYPE html>
	<html lang="en">

	<head>
		<meta charset="UTF-8">
		<title>Дела в порядке - welcome page</title>
		<link rel="stylesheet" href="../css/normalize.css">
		<link rel="stylesheet" href="../css/style.css">
	</head>

	<?php if (isset($_GET['login'])): ?>
		<body class="body-background overlay">
			<?=$form; ?>
		<?php else: ?>
			<body class="body-background">
			<?php endif; ?>

			<?=$header; ?>

			<div class="content">
				<section class="welcome">
					<h2 class="welcome__heading">«Дела в порядке»</h2>

					<div class="welcome__text">
						<p>«Дела в порядке» — это веб приложение для удобного ведения списка дел. Сервис помогает пользователям не забывать о предстоящих важных событиях и задачах.</p>

						<p>После создания аккаунта, пользователь может начать вносить свои дела, деля их по проектам и указывая сроки.</p>
					</div>

					<a class="welcome__button button" href="/register.php">Зарегистрироваться</a>
				</section>
			</div>
		</div>
	</div>

	<?=$footer; ?>
