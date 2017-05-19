<?php 
/**
 * Class DataBase
 */
class DataBase {
	 
	/**
	 * @var string $host Имя хоста для подключения к БД
	 */
	private $host = "localhost";
	 
	/**
	 * @var string $user Имя пользователя для подключения к БД
	 */
	private $user = "root";
	 
	/**
	 * @var string $password Пароль пользователя для подключения к БД
	 */
	private $password = "root";
	 
	/**
	 * @var string $database Имя БД
	 */
	private $database = "todolist";


	/**
	 * Подключение к БД
	 */ 
	public function connectDB()
	{
		$con = mysqli_connect($this->host, $this->user, $this->password, $this->database);
		if ($con == false) {
			print("Ошибка подключения: " . mysqli_connect_error());
		} else {
			return $con;
		}
	}

	/**
	 * Чтение данных из БД
	 */ 
	public function selectData($sql, $data)
	{
		$con = $this->connectDB();
		$stmt = db_get_prepare_stmt($con, $sql, $data);
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);
		mysqli_stmt_close($stmt);
		$data = mysqli_fetch_all($result, MYSQLI_NUM);
		mysqli_close($con);
		return $data;
	}

	/**
	 * Вставка данных в БД
	 */ 
	public function insertData($sql, $data)
	{
        $con = $this->connectDB();
        $stmt = db_get_prepare_stmt($con, $sql, $data);
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);
		$result_id = mysqli_stmt_insert_id($stmt); 
		mysqli_stmt_close($stmt);
		mysqli_close($con);
		return $result_id;
	}

	/**
	 * Обновление(перезапись) данных в БД
	 */ 
	public function updateData($table, $new_data, $instruction)
	{
        $con = $this->connectDB();
        $sql = "UPDATE ". $table . "SET ";
		foreach ($new_data as $key => $val) {
			$data[] = $new_data[$key][$key($val)];
			$sql .= $key($val) . " = ?";
			if ($key < count($new_data) - 1) $sql .= ", ";
		}
		$sql .= " WHERE " . key($instruction) . " = ?;";
		$data[] = $instruction[key($instruction)];
		$stmt = db_get_prepare_stmt($con, $sql, $data);
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_affected_rows($stmt);
		mysqli_stmt_close($stmt);
		mysqli_close($con);
		return $result;
	}

}

 ?>
