<?php 

require_once(LIB_PATH.DS.'database.php');

class Student extends DatabaseObject{
	
	protected static $table_name="student";
	public $id;
	public $name;
	public $branch;
	public $sub_branch;
	public $year;
	public $email;
	public $password;
	public $isActive;
	
	public function insert_new_student(){
		global $database;
		$name = $database->escape_value($this->name);
		$branch = $database->escape_value($this->branch);
		$sub_branch = $database->escape_value($this->sub_branch);
		$year = $database->escape_value($this->year);
		$email = $database->escape_value($this->email);
		$password = $database->escape_value($this->password);
		$isActive = $database->escape_value($this->isActive);
		
		$sql="INSERT INTO student (name, branch, sub_branch, year, email, password, isActive) VALUES ('{$name}', '{$branch}', '{$sub_branch}', '{$year}', '{$email}', '{$password}', {$isActive})";
		
		if($database->query($sql)){
			$this->id = $database->insert_id();
			return true;	
		}else{
			return false;
		}
	}
	
	public static function admin_update_student($id="", $name="", $branch="", $sub_branch="", $year="", $email="", $password=""){
		global $database;
		$id = $database->escape_value($id);
		$name = $database->escape_value($name);
		$branch = $database->escape_value($branch);
		$sub_branch = $database->escape_value($sub_branch);
		$year = $database->escape_value($year);
		$email = $database->escape_value($email);
		$password = $database->escape_value($password);
		
		$sql="UPDATE student SET name='{$name}', branch='{$branch}', sub_branch='{$sub_branch}', year='{$year}', email='{$email}', password='{$password}' WHERE id={$id}";
		
		$database->query($sql);
		
		return ($database->affected_rows() == 1)? true : false;
			
	}
	
	public static function find_all_student(){
		global $database;
		$sql = "SELECT * FROM " . static::$table_name;
		$sql .= " ORDER BY branch DESC";
		return static::find_by_sql($sql);
	}
	
}

?>