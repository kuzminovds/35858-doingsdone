<?php
session_start();
require_once 'init.php';
$db = new DataBase;
$auth = new AuthUser;
$user = $_SESSION['user'];

if (isset($_GET['cat'])) {
  if (!isset($categories[$_GET['cat']])) {
    header("HTTP/1.1 404 Not Found");
  }
}

if (!isset($_SESSION['user'])) {
  header("Location: /guest.php");
}

if (isset($_GET['show_completed'])) {
  $name = "show_completed";
  $value = $_GET['show_completed'];
  $expire = time()+3600;
  $path   = "/";

  setcookie($name, $value, $expire, $path);

  header('Location: /index.php', 200);
}
$sql = "SELECT id, name FROM projects";
$categories = $db->selectData($sql);

$sql = "SELECT id, title, deadline, project_id, dt_ready, ready FROM tasks WHERE user_id = '". $user[auth_user_id] . "';";
$tasks = $db->selectData($sql);

$main = includeTemplate('main', ['categories' => $categories, 'tasks' => $tasks, 'show_comleted_status' => $show_comleted_status]);

if (!empty($_POST)) {
  $name = $_POST["name"];
  $project = $_POST["project"];
  $date = $_POST["date"];

  if (isset($name)) {
    if (strlen($name) == 0) {
      $errors["name"] = "Заполните поле - Название";
    }
  }

  if (isset($project)) {
    if (strlen($project) == 0) {
      $errors["project"] = "Заполните поле - Проект";
    }
  }

  if (isset($date)) {
    if (strlen($date) == 0) {
      $errors["date"] = "Заполните поле - Дата выполнения";
    }
  }
  if (isset($_FILES['preview'])) {
    $file = $_FILES['preview'];
    $uploaddir = __DIR__.DIRECTORY_SEPARATOR.uploads.DIRECTORY_SEPARATOR;
    $uploadfile = $uploaddir . basename($file['name']);
    move_uploaded_file($file["tmp_name"], $uploadfile);
  }
  if ($errors == []) {
    unset($_GET['add']);
    print('Всё круто работает!');
    $sql = "INSERT INTO tasks (dt_add, title, deadline, project_id, user_id) VALUES (NOW(), ?, ?, ?, ?)";
    $db->insertData($sql, [$name, $date, $project, $_SESSION['user']['auth_user_id']]);
  }
}

$form = includeTemplate('form', ['categories' => $categories, 'errors' => $errors, 'last_data' => $last_data]);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Дела в Порядке!</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<?php if (isset($_GET['add'])): ?>
    <body class="overlay">
    <?=$form; ?>
<?php else: ?>
    <body>
<?php endif; ?>

    <?=$header, $main, $footer; ?>

    <script type="text/javascript" src="js/script.js"></script>
</body>
</html>
