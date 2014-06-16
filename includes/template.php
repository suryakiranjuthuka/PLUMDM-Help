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
		$sql = "SELECT * from template WHERE visibility=1 && type='p_e' ORDER BY id DESC";
		return static::find_by_sql($sql);
	}
	
	public static function get_all_templates_c_e(){
		global $database;
		$sql = "SELECT * from template WHERE visibility=1 && type='c_e' ORDER BY id DESC";
		return static::find_by_sql($sql);
	}
	
	public static function get_all_templates_p_lp(){
		global $database;
		$sql = "SELECT * from template WHERE visibility=1 && type='p_lp' ORDER BY id DESC";
		return static::find_by_sql($sql);
	}
	
	public static function get_all_templates_c_lp(){
		global $database;
		$sql = "SELECT * from template WHERE visibility=1 && type='c_lp' ORDER BY id DESC";
		return static::find_by_sql($sql);
	}
	
	
	public function upload_template(){
		global $database;
		$type = $database->escape_value($this->type);
		$website_url = $database->escape_value($this->website_url);
		$url_path = $database->escape_value($this->url_path);
		
		$sql="INSERT INTO template (type, website_url, url_path) VALUES ('{$type}', '{$website_url}', '{$url_path}')";
		
		if($database->query($sql)){
			return true;	
		}else{
			return false;
		}
	}
	
	
	public function edit_template(){
		global $database;
		$type = $database->escape_value($this->type);
		$website_url = $database->escape_value($this->website_url);
		$url_path = $database->escape_value($this->url_path);
		$id = $database->escape_value($this->id);
		 
		$sql  = "UPDATE template SET type='{$type}', website_url='{$website_url}', ";
		$sql .= "url_path='{$url_path}' ";
		$sql .= "WHERE id={$id}";
		
		$database->query($sql);
		return ($database->affected_rows() == 1) ? true : false;
	}
	
	
	public function hide_template(){
		global $database;
		$id = $database->escape_value($this->id);
		
		$sql  = "UPDATE template SET visibility=0 WHERE id={$id}";
		
		$database->query($sql);
		return ($database->affected_rows() == 1) ? true : false;
	}
	
}
?>