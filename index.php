<?php
session_start();
include 'functions.php';

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
  $expire = "Mon, 25-Jan-2027 10:00:00 GMT";
  $path   = "/";

  setcookie($name, $value, $expire, $path);

  print($name.$value.$expire.$path);

  header('Location: /index.php', 200);
}

if (isset($_COOKIE["show_completed"])) {
  $show_comleted = $_COOKIE['show_completed'];
  if ($show_comleted == 1) {
    $show_comleted_status['now'] = 1;
    print($show_comleted_status['now']);
  } else if ($show_comleted == 0) {
    $show_comleted_status['now'] = 0;
  }
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
