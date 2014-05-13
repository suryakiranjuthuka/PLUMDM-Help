<?php 

require_once(LIB_PATH.DS.'database.php');

class SalesRep extends DatabaseObject{
	
	protected static $table_name="salesrep";
	public $id;
	public $username;
	public $password;
	public $first_name;
	public $last_name;

	
	
}


?>