<?php 
include 'functions.php';

if ($_GET['cat'] > count($categories)) {
    header("HTTP/1.1 404 Not Found");
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
<?php endif; ?>

<?php
  $error = "Заполните это поле";
  $name = $_POST["name"];
  $project =$_POST["project"];
  $date =$_POST["date"];
?>

<body>

    <?=$header, $main, $footer; ?>

    <script type="text/javascript" src="js/script.js"></script>
</body>
</html>