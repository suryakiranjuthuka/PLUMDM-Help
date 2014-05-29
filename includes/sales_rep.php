<?php 

require_once(LIB_PATH.DS.'database.php');

class SalesRep extends DatabaseObject{
	
	protected static $table_name="salesrep";
	public $id;
	public $username;
	public $password;
	public $first_name;
	public $last_name;
	
	
	public static function get_all_salesrep(){
		global $database;
		
		$sql = "SELECT * from salesrep";
		return static::find_by_sql($sql);
	}
	
	public static function get_1st_salesrep(){
		global $database;
		
		$sql = "SELECT * from salesrep where id=1";
		return static::find_by_sql($sql);
	}
	
	
}
?>