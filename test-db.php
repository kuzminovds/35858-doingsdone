<?php
	include 'mysql_helper.php';

	$con = mysqli_connect("localhost", "root", "root", "todolist");

	if ($con == false){
	print("Ошибка подключения: " . mysqli_connect_error());
	} else {

		// Функция для получения данных. 
		$sql_1 = "SELECT id, name FROM projects";

		$result_1 = mysqli_query($con, $sql_1);

		// while ($row = mysqli_fetch_array($result_1)) { 
		// 	print("Проект: " . $row['name'] . '</br>');
		// }

		function first($result, $sql, $data = []) {
			$stmt = db_get_prepare_stmt($result, $sql, $data);
			if ($stmt == false) {
				print('Ошибка');
				print($stmt);
			} else {
				print($stmt);
			}
		}

		first($result_1, $sql_1);



		// Функция для вставки данных.
		$sql_2 = "INSERT INTO users (dt_reg, name, email, password) VALUES (NOW(), ?, ?, ?)";

		$email = 'mark.v@gmail.com';
		$name = 'Марк';
		$password = 'secret';

		function second($result, $sql, $data) {
			$new = db_get_prepare_stmt($result, $sql, $data);
			$add = mysqli_stmt_execute($new);
			if ($add == false) {
				print('Ошибка при добавлении данных');
			} else {
				print ("ID новой записи: " . mysqli_insert_id($result));
			}
		}

		second($con, $sql_2, [$name, $email, $password]);

		function third($result, $tb_name, $sql, $data) {

		}

	}