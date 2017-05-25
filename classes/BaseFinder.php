<?php 

abstract class BaseFinder {

	protected $tableName;
	protected $dbInstance;

	public function __construct($dbInstance) {
		$this->$dbInstanse = $dbInstanse;
	}

	public function FindById($id) {
		$sql = "SELECT * FROM " . $tableName . " WHERE id = " . $id . ";";
		$stmt = db_get_prepare_stmt($this->$dbInstanse, $sql);
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);
		mysqli_stmt_close($stmt);
		$data = mysqli_fetch_all($result, MYSQLI_NUM);
		mysqli_close($con);
		return $data;
	}

	public function FindAllBy($where = []) {
		$sql = "SELECT * FROM " . $tableName . " WHERE " . key($where) . " = ?;";
		$stmt = db_get_prepare_stmt($this->$dbInstanse, $sql, $where);
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);
		mysqli_stmt_close($stmt);
		$data = mysqli_fetch_all($result, MYSQLI_NUM);
		mysqli_close($con);
		return $data;
	}
}

?>