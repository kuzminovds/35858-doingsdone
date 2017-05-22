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
