<?php 

/**
* Возвращает объекты для таблицы Users
*/
class UserFinder extends BaseFinder {
	
	public $tableName = "users";

	public function getActiveUsers(){
		parent::FindAllBy();
	}
}

?>