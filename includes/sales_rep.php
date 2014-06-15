<?php 

require_once(LIB_PATH.DS.'database.php');

class SalesRep extends DatabaseObject{
	
	protected static $table_name="salesrep";
	public $id;
	public $username;
	public $password;
	public $first_name;
	public $last_name;
	public $user_dp_url;
	
	
	public static function get_all_salesrep(){
		global $database;
		
		$sql = "SELECT * from salesrep";
		return static::find_by_sql($sql);
	}
	
	public static function authenticate($username="", $password=""){
		global $database;
		$username = $database->escape_value($username);
		$password = $database->escape_value($password);
		
		$sql  = "SELECT * FROM ". static::$table_name;
		$sql .= " WHERE username = '{$username}' ";
		$sql .= "AND password = '{$password}' ";
		$sql .= "LIMIT 1";
		$result_array = static::find_by_sql($sql);
		return !empty($result_array) ? array_shift($result_array) : false;
	}
	
	
}
?>