<?php 

require_once(LIB_PATH.DS.'database.php');

class PlumEmail extends DatabaseObject{
	
	protected static $table_name="plumemail";
	public $id;
	public $salesrep_id;
	public $client_name;
	public $send_date;
	public $email_list;
	public $notes;
	public $leads;
	public $page_complete;
	public $attachment_url;
	
	
/*	public static function secret_key($secret_key){
		global $database;
		$secret_key = $database->escape_value($secret_key);
		if(self::$key == $secret_key){
			self::$faculty_register = true;
			return true;	
		}else {

			return false;
		}
	}
	
	public static function is_registered(){
		return self::$faculty_register;	
	}
	
	public function save_faculty(){
		//A new record won't have an id yet...
		return isset($this->id)? $this->update_faculty() : $this->insert_faculty_registration();	
	}
	
	public function insert_faculty_registration(){
		global $database;
		$first_name = $database->escape_value($this->first_name);
		$last_name = $database->escape_value($this->last_name);
		$qualification = $database->escape_value($this->qualification);
		$designation = $database->escape_value($this->designation);
		$department = $database->escape_value($this->department);
		$email = $database->escape_value($this->email);
		$password = $database->escape_value($this->password);
		$mobile = $database->escape_value($this->mobile);
		$isActive = $database->escape_value($this->isActive);
		
		$sql="INSERT INTO faculty (first_name, last_name, qualification, designation, department, email, password, mobile, isActive) VALUES ('{$first_name}', '{$last_name}', '{$qualification}', '{$designation}', '{$department}', '{$email}', '{$password}', '{$mobile}', {$isActive})";
		
		if($database->query($sql)){
			$this->id = $database->insert_id();
			return true;	
		}else{
			return false;	
		}
	}
	
	
		public function update_faculty(){
		global $database;
		$first_name = $database->escape_value($this->first_name);
		$last_name = $database->escape_value($this->last_name);
		$qualification = $database->escape_value($this->qualification);
		$designation = $database->escape_value($this->designation);
		$department = $database->escape_value($this->department);
		$email = $database->escape_value($this->email);
		$password = $database->escape_value($this->password);
		$mobile = $database->escape_value($this->mobile);
		$isActive = $database->escape_value($this->isActive);
		$id = $database->escape_value($this->id);
		
		$sql="UPDATE faculty SET first_name='{$first_name}', last_name='{$last_name}', qualification='{$qualification}', designation='{$designation}', department='{$department}', email='{$email}', password='{$password}', mobile='{$mobile}', isActive={$isActive} WHERE id={$id}";
		
		$database->query($sql);
		
		return ($database->affected_rows() == 1)? true : false;
	}
	
	public static function find_all_faculty(){
		global $database;
		$sql = "SELECT * FROM " . static::$table_name;
		$sql .= " ORDER BY department ASC";
		return static::find_by_sql($sql);
	}
	
	public static function insert_profile_pic_url($url, $id){
		global $database;
		
		$sql = "UPDATE faculty SET photo_url='{$url}' Where id='{$id}' ";
		$database->query($sql);
		
		return ($database->affected_rows() == 1)? true : false;
	}*/
	
	
}


?>