<?php 

/* Since we want to use these below methods like "find_all()" & "find_by_id" in other class like student & faculty we create a class called DatabaseObject & we inherit this parent class(DatabaseObject) to admin, faculty & student classes, so that they can all use these methods.

LATE STATIC BINDING: because normally we use self:: to reffer static methods, but when we use self:: in this DataBase Class & when we will try to access those methods with static from admin or student class then this self will not reffer to admin or student, but it will REFFER TO THE DatabaseObject CLASS, so we replace the word self by "static" in the methods. What this static word does over here is that, it will bind the things at the run time, so it will not take the database class but the class calling that method.

In the same fasion, if we want to instantiate a object here we use a function called "get_called_class" to get the called class's name & then assign it to that.
*/

require_once(LIB_PATH.DS.'database.php');


class DatabaseObject{
	
	protected static $table_name;
	protected static $class_name;
	
	
	public static function find_by_id($id=0){
		global $database;
		$result_array = static::find_by_sql("SELECT * FROM ". static::$table_name ." WHERE id={$id} LIMIT 1");
		return !empty($result_array) ? array_shift($result_array) : false;	
	}
	
	public static function find_by_sql($sql=""){
		global $database;
		$result = $database->query($sql);
		$object_array = array();
		while($row = $database->fetch_array($result)) {
			$object_array[] = static::instantiate($row);
		}
		return $object_array;
	}
	
	public static function delete_faculty_and_student($id=""){
		global $database;
		$id = $database->escape_value($id);
		
		$sql = "Delete FROM ". static::$table_name ." WHERE id={$id}"; 	
		$database->query($sql);
		return ($database->affected_rows() == 1)? true : false;
	}
	
	public static function hide_faculty_message($message_id){
		global $database;
		$sql = "UPDATE message SET isActive=0 WHERE id={$message_id}";
		$database->query($sql);
		
		return ($database->affected_rows() == 1)? true : false;	
	}
	
	
	public function full_name(){
		if(isset($this->first_name)&&isset($this->last_name)){
			return $this->first_name . " ". $this->last_name;
		}
	}
	
	public static function instantiate($record){
		// This is the Long-Form Approach.
		$class_name = get_called_class();
 		$object = new $class_name;
		  /*$object->id		=$result_set['id'];
			$object->name	  =$result_set['name'];
			$object->email	 =$result_set['email'];
			$object->password  =$result_set['password'];
			$object->isAdmin   =$result_set['isAdmin'];
			$object->isActive  =$result_set['isActive'];
			return $object;*/
		
		// This is the Short-Form Approach , Which is more Dynamic.
		foreach($record as $attribute=>$value){
		  if($object->has_attribute($attribute)) {
		    $object->$attribute = $value;
		  }
		}
		return $object;
	}
	
	private function has_attribute($attribute) {
	  // get_object_vars returns an associative array with all attributes 
	  // (incl. private ones!) as the keys and their current values as the value
	  $object_vars = get_object_vars($this);
	  // We don't care about the value, we just want to know if the key exists
	  // Will return true or false
	  return array_key_exists($attribute, $object_vars);
	}
	
	
}
?>