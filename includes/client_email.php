<?php 

require_once(LIB_PATH.DS.'database.php');

class ClientEmail extends DatabaseObject{
	
	protected static $table_name="clientemail";
	public $id;
	public $salesrep_id;
	public $client_name;
	public $website_url;
	public $url_path;
	public $send_date;
	public $email_list;
	public $notes;
	public $leads;
	public $page_complete;
	public $attachment_url;
	public $hidden;
	

	public function create_c_e_template_info(){
		global $database;
		
		$client_name = $database->escape_value($this->client_name);
		$salesrep_id = $database->escape_value($this->salesrep_id);
		$website_url = $database->escape_value($this->website_url);
		$url_path = $database->escape_value($this->url_path);
		$send_date = $database->escape_value($this->send_date);
		$email_list = $database->escape_value($this->email_list);
		$notes = $database->escape_value($this->notes);
		$attachment_url = $database->escape_value($this->attachment_url);
		
		$sql="INSERT INTO clientemail (client_name, salesrep_id, website_url, url_path, send_date, email_list, notes, attachment_url) VALUES ('{$client_name}', '{$salesrep_id}', '{$website_url}', '{$url_path}', '{$send_date}', '{$email_list}', '{$notes}', '{$attachment_url}')";
		
		if($database->query($sql)){
			return true;	
		}else{
			return false;
		}
	}
	
	
	public function update_c_e_template_info(){
		global $database;
		$client_name = $database->escape_value($this->client_name);
		$email_list = $database->escape_value($this->email_list);
		$website_url = $database->escape_value($this->website_url);
		$send_date = $database->escape_value($this->send_date);
		$notes = $database->escape_value($this->notes);
		$page_complete = $database->escape_value($this->page_complete);
		$leads = $database->escape_value($this->leads);
		$id = $database->escape_value($this->id);
		$salesrep_id = $database->escape_value($this->salesrep_id);
		 
		$sql  = "UPDATE clientemail SET client_name='{$client_name}', website_url='{$website_url}', ";
		$sql .= "send_date='{$send_date}', ";
		$sql .= "email_list='{$email_list}', notes='{$notes}', ";
		$sql .= "page_complete='{$page_complete}', leads='{$leads}' ";
		$sql .= "WHERE id={$id} && salesrep_id={$salesrep_id}";
		
		$database->query($sql);
		return ($database->affected_rows() == 1) ? true : false;
	}


	
	public static function hide_c_e_template_info($c_e_id="",$current_user_id=""){
		global $database;
		$sql  = "UPDATE clientemail SET hidden=1 WHERE id={$c_e_id} && salesrep_id={$current_user_id}";
		
		$database->query($sql);
		return ($database->affected_rows() == 1) ? true : false;
	}
	
	
	
	public static function find_all_user_c_e($id=""){
		global $database;
		$sql = "SELECT * from clientemail WHERE salesrep_id='{$id}' && hidden=0 ORDER BY id DESC ";
		
		return static::find_by_sql($sql);	
	}


	public static function search_c_e($id="",$search_term=""){
		global $database;
		$sql = "SELECT * FROM  clientemail WHERE ((client_name LIKE '%$search_term%') OR (send_date LIKE '%$search_term%') OR (email_list LIKE '%$search_term%') OR (website_url LIKE '%$search_term%'))";
		$sql .= " AND ((salesrep_id={$id}) AND (hidden=0)) ORDER BY id DESC";
		
		return static::find_by_sql($sql);
	}
	


	
}
?>