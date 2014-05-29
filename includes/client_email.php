<?php 

require_once(LIB_PATH.DS.'database.php');

class ClientEmail extends DatabaseObject{
	
	protected static $table_name="clientemail";
	public $id;
	public $salesrep_id;
	public $client_name;
	public $website_url;
	public $send_date;
	public $email_list;
	public $notes;
	public $leads;
	public $page_complete;
	public $attachment_url;
	

	public function create_c_e_template_info(){
		global $database;
		
		$client_name = $database->escape_value($this->client_name);
		$salesrep_id = $database->escape_value($this->salesrep_id);
		$website_url = $database->escape_value($this->website_url);
		$send_date = $database->escape_value($this->send_date);
		$email_list = $database->escape_value($this->email_list);
		$notes = $database->escape_value($this->notes);
		
		
		$sql="INSERT INTO clientemail (client_name, salesrep_id, website_url, send_date, email_list, notes) VALUES ('{$client_name}', '{$salesrep_id}', '{$website_url}', '{$send_date}', '{$email_list}', '{$notes}')";
		
		if($database->query($sql)){
			return true;	
		}else{
			return false;
		}
	}
	
	
	public static function find_all_user_c_e($id=""){
		global $database;
		
		$sql = "SELECT * from clientemail WHERE salesrep_id='{$id}'";
		
		return static::find_by_sql($sql);	
	}

	
}
?>