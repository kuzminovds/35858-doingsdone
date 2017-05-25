<?php

/**
* 
*/
class UserRecord extends BaseRecord {
	
	private $tableName = "users";
	private $id;
	private $dt_red;
	private $email;
	private $name;
	private $password;
	private $avatar;

	public function changePassword($pwd) {
		$pwd_h = password_hash($pwd, PASSWORD_DEFAULT);
		$data = ['password' => $pwd_h];
		parent::update($data, [$this->$id]);
	}
	
}
?>