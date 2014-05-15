<?php 

require_once(LIB_PATH.DS.'database.php');

class Template extends DatabaseObject{
	
	protected static $table_name="template";
	public $id;
	public $type;
	public $website_url;
	public $url_path;

	
	
	public static function get_all_templates(){
		global $database;
		
		$sql = "SELECT * from template";
		
		return static::find_by_sql($sql);
		
	}
	
	
}


?>