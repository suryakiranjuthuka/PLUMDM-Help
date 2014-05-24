<?php 

require_once(LIB_PATH.DS.'database.php');

class Template extends DatabaseObject{
	
	protected static $table_name="template";
	public $id;
	public $type;
	public $website_url;
	public $url_path;
	public $visibility;

	
	
	public static function get_all_templates_p_e(){
		global $database;
		$sql = "SELECT * from template WHERE visibility=1 && type='p_e'";
		return static::find_by_sql($sql);
	}
	
	public static function get_all_templates_c_e(){
		global $database;
		$sql = "SELECT * from template WHERE visibility=1 && type='c_e'";
		return static::find_by_sql($sql);
	}
	
	public static function get_all_templates_p_lp(){
		global $database;
		$sql = "SELECT * from template WHERE visibility=1 && type='p_lp'";
		return static::find_by_sql($sql);
	}
	
	public static function get_all_templates_c_lp(){
		global $database;
		$sql = "SELECT * from template WHERE visibility=1 && type='c_lp'";
		return static::find_by_sql($sql);
	}
	
	
	
}
?>