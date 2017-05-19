<?php 
/**
 * Class User
 */
class AuthUser {
		
	public function doAuth($email, $password) {
		$db = new DataBase;
		$sql = "SELECT id, dt_reg, name, password, avatar FROM users WHERE email = ?;";
		$search_user = $db->selectData($sql, $email);
		if (!empty($search_user) and password_verify($password, $search_user[0][3])) {
		    print_r($search_user[0][3]);
			$_SESSION['user'] = [
				'auth_user_id' => $search_user[0][0],
				'auth_dt_reg' => $search_user[0][1],
				'auth_username' => $search_user[0][2],
				'auth_avatar' => $search_user[0][4]
				];
			return true;
		}
	}

	public function haveAuth() {
		if (isset($_SESSION['user'])) {
				return true;
		} else {
				return false;
		}
	}

	public function endAuth() {
		if ($this->haveAuth()) {
			unset($_SESSION['user']);
		}
	}

	public function getUserdata() {
		if ($this->haveAuth()) {
			foreach ($_SESSION['user'] as $key => $val) {
					 $userdata[protect_code($key)] = protect_code($val);     
			}
			if ($userdata['auth_avatar']=='') $userdata['auth_avatar'] = 'img/user-pic.jpg';
			return $userdata;
		}
	}

}

 ?>