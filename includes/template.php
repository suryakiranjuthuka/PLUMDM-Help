<?php 

require_once(LIB_PATH.DS.'database.php');

class Template extends DatabaseObject{
	
	protected static $table_name="template";
	public $id;
	public $type;
	public $website_url;
	public $url_path;

	
	
}


?>