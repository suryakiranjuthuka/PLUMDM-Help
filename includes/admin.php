<?php 

require_once(LIB_PATH.DS.'database.php');

class Admin extends DatabaseObject{
	
	protected static $table_name="admin";
	public $id;
	public $name;
	public $email;
	public $password;
	public $isAdmin;
	public $isActive;
	//public static $test_important;
	
	
	public function create_admin(){
		global $database;
		$name = $database->escape_value($this->name);
		$id = $database->escape_value($this->id);
		$email = $database->escape_value($this->email);
		$password = $database->escape_value($this->password);
		$isAdmin = $database->escape_value($this->isAdmin);
		$isActive = $database->escape_value($this->isActive);
		
		$sql="INSERT INTO admin (name, id, email, password, isAdmin, isActive) VALUES ('{$name}', '{$id}', '{$email}', '{$password}', {$isAdmin}, {$isActive})";
		
		if($database->query($sql)){
			return true;	
		}else{
			return false;
		}
	}
	
}





?>
