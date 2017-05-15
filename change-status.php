<?php 

include 'functions.php';

if (isset($_GET['id']) AND isset($_GET['status'])) {
	$status = $_GET['status'];
	$id = $_GET['id'];

	$con = mysqli_connect("localhost", "root", "root", "todolist");

	if ($con == false){
		print("Ошибка подключения: " . mysqli_connect_error());
	} else {

		// Функция изменения статуса задачи. 
		$sql = "UPDATE tasks SET ready = " . $status . " WHERE  id = " . $id;
		$new = db_get_prepare_stmt($con, $sql, []);
		$add = mysqli_stmt_execute($new);
	}
}

header('Location: /index.php', 200);

?>