<?php 
abstract class BaseRecord {

	protected $tableName;
	protected $dbInstanse;

	public function __construct($dbInstanse) {
		$this->$dbInstanse = $dbInstanse;
	}

	public function __get($name) {
		$result = null;

		if (property_exists($this, $name)) {
			$result = $this->$name;
		}

		return $result;
	}

	public function __set($prop, $val) {
		$this->$prop = $val;
	}

	public function insert($data) {
		$sql = "INSERT INTO " . $this->tableName . " VALUES ";
		foreach ($data as $key => $val) {
			$arg[] = $data[$key][key($val)];
			$sql .= key($data) . " = ?";
			if ($key < count($new_data) - 1) $sql .= ", ";
		}
		$sql .= ";";
		$stmt = db_get_prepare_stmt($this->$dbInstanse, $sql, $arg);
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);
		mysqli_stmt_close($this->$dbInstanse);
		mysqli_close($con);
		if ($result) {
			return true;
		} else {
			return false;
		}	
	}

	public function update($new_data, $instruction) {
		$sql = "UPDATE ". $this->tableName . " SET ";
		foreach ($new_data as $key => $val) {
			$data[] = $new_data[$key][key($val)];
			$sql .= key($new_data) . " = ?";
			if ($key < count($new_data) - 1) $sql .= ", ";
		}
		$sql .= " WHERE " . key($instruction) . " = ?;";
		$data[] = $instruction[key($instruction)];
		$stmt = db_get_prepare_stmt($this->$dbInstanse, $sql, $data);
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_affected_rows($stmt);
		mysqli_stmt_close($stmt);
		mysqli_close($this->$dbInstanse);
		if ($result) {
			return true;
		} else {
			return false;
		}
	}

	public function delete($data) {
		$sql = "DELETE FROM" . $this->tableName . " WHERE ";
		foreach ($data as $key => $val) {
			$arg[] = $data[$key][key($val)];
			$sql .= key($data) . " = ?";
			if ($key < count($new_data) - 1) $sql .= ", ";
		}
		$sql .= ";";
		$stmt = db_get_prepare_stmt($this->$dbInstanse, $sql, $arg);
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);
		mysqli_stmt_close($this->$dbInstanse);
		mysqli_close($con);
		if ($result) {
			return true;
		} else {
			return false;
		}
	}
}
?>