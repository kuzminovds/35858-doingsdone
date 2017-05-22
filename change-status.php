<?php 
require_once 'init.php';
$db = new DataBase;
$auth = new AuthUser;

if (isset($_GET['id']) AND isset($_GET['status'])) {
	$status = ['ready' => $_GET['status']];
	$id = ['id' => $_GET['id']];
	$table = 'tasks';

	$db->updateData($table, $status, $id);
}

header('Location: /', 200);

?>