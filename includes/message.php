<?php 

require_once(LIB_PATH.DS.'database.php');

class Message extends DatabaseObject{
	
	protected static $table_name="message";
	public $id;
	public $faculty_id;
	public $created_at; 
	public $body; 
	public $isActive; 
	public $spam;
	public $document_url; 
	public $branch;
	public $branch_year;
	public $sub_branch;
	public $year;
	public $type;
	public $display;
	
	
	public function insert_new_message(){
		global $database;
		$faculty_id = $database->escape_value($this->faculty_id);
		$created_at = $database->escape_value($this->created_at);
		$body = $database->escape_value($this->body);
		$isActive = $database->escape_value($this->isActive);
		//$spam = $database->escape_value($this->spam);
		$document_url = $database->escape_value($this->document_url);
		$branch = $database->escape_value($this->branch);
		$branch_year = $database->escape_value($this->branch_year);
		$sub_branch = $database->escape_value($this->sub_branch);
		//$year = $database->escape_value($this->year);
		$type = $database->escape_value($this->type);
		$display = $database->escape_value($this->display);
		
		$sql="INSERT INTO message (faculty_id, created_at, body, isActive, document_url, branch, branch_year,sub_branch, type) VALUES ({$faculty_id}, '{$created_at}', '{$body}', '{$isActive}', '{$document_url}', '{$branch}', '{$branch_year}','{$sub_branch}', '{$type}')";
		
		if($database->query($sql)){
			$this->id = $database->insert_id();
			return true;	
		}else{
			return false;	
		}	
	}
	
	public static function find_messages_of($faculty_id=0){
		global $database;
		$sql = "SELECT * FROM message";
		$sql .= " WHERE faculty_id=" . $database->escape_value($faculty_id);
		$sql .= " ORDER BY created_at DESC";
		return static::find_by_sql($sql);	
	}
	
	public static function find_all_admin_type($type){
		global $database;
		$sql = "SELECT * FROM message WHERE type='{$type}' ORDER BY created_at DESC ";
		return static::find_by_sql($sql);	
	}
	
	public static function find_type($branch, $type){
		global $database;
		$sql = "SELECT * FROM message WHERE branch='{$branch}'";
		$sql .= " AND type='{$type}' ORDER BY created_at DESC ";
		return static::find_by_sql($sql);
			
	}
	
	public static function find_type_tb($branch){
		global $database;
		$sql = "SELECT * FROM message WHERE branch='{$branch}'";
		$sql .= " ORDER BY created_at DESC ";
		return static::find_by_sql($sql);
			
	}
	
	public static function find_type_ab(){
		global $database;
		$all_branches = "all-branches";
		$sql = "SELECT * FROM message WHERE branch='{$all_branches}'";
		$sql .= " ORDER BY created_at DESC ";
		return static::find_by_sql($sql);	
	}
	
	public static function find_admin_tb(){
		global $database;
		$sql = "SELECT * FROM message WHERE branch like 'total%'";
		$sql .= " ORDER BY created_at DESC ";
		return static::find_by_sql($sql);	
	}
	
	public static function find_own_type($id, $type){
		global $database;
		$sql = "SELECT * FROM message WHERE faculty_id='{$id}'";
		$sql .= " AND type='{$type}' ORDER BY created_at DESC ";
		return static::find_by_sql($sql);
	}
	
	public static function find_own_type_id($id){
		global $database;
		$sql = "SELECT * FROM message WHERE faculty_id='{$id}' ORDER BY created_at DESC ";
		return static::find_by_sql($sql);
	}
	
	public static function find_student_type($branch_year, $sub_branch, $type){
		global $database;
		$sql = "SELECT * FROM message WHERE branch_year='{$branch_year}'";
		$sql .= " AND sub_branch='{$sub_branch}' AND type='{$type}' ORDER BY created_at DESC ";
		return static::find_by_sql($sql);
			
	}
	
	public static function insert_attachment_url($url, $id){
		global $database;
		
		$sql = "UPDATE message SET document_url='{$url}' Where id='{$id}' ";
		$database->query($sql);
		
		return ($database->affected_rows() == 1)? true : false;
	}
	
}


?>