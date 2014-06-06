<?php 

require_once(LIB_PATH.DS.'database.php');

class PlumLP extends DatabaseObject{
	
	protected static $table_name="plumlp";
	public $id;
	public $salesrep_id;
	public $client_name;
	public $start_date;
	public $expire_date;
	public $email;
	public $website_url;
	public $url_path;
	public $google_ad;
	public $google_ad_setup;
	public $page_complete;
	public $renewing_page;
	public $leads;
	public $city;
	public $state;
	public $zip_code;
	public $notes;
	public $attachment_url;
	public $hidden;
	
	

	public function create_p_lp_template_info(){
		global $database;
		
		$client_name = $database->escape_value($this->client_name);
		$salesrep_id = $database->escape_value($this->salesrep_id);
		$website_url = $database->escape_value($this->website_url);
		$url_path = $database->escape_value($this->url_path);
		$start_date = $database->escape_value($this->start_date);
		$expire_date = $database->escape_value($this->expire_date);
		$email = $database->escape_value($this->email);
		$notes = $database->escape_value($this->notes);
		$city = $database->escape_value($this->city);
		$state = $database->escape_value($this->state);
		$zip_code = $database->escape_value($this->zip_code);
		$google_ad = $database->escape_value($this->google_ad);
		$attachment_url = $database->escape_value($this->attachment_url);
		
		
		
		$sql="INSERT INTO plumlp (client_name, salesrep_id, website_url, url_path, start_date, expire_date, email, notes, city, state, zip_code, google_ad, attachment_url) VALUES ('{$client_name}', '{$salesrep_id}', '{$website_url}', '{$url_path}', '{$start_date}', '{$expire_date}', '{$email}', '{$notes}', '{$city}', '{$state}', '{$zip_code}', '{$google_ad}', '{$attachment_url}')";
		
		if($database->query($sql)){
			return true;	
		}else{
			return false;
		}
	}

	
	public function update_p_lp_template_info(){
		global $database;
		
		$client_name = $database->escape_value($this->client_name);
		$website_url = $database->escape_value($this->website_url);
		$start_date = $database->escape_value($this->start_date);
		$expire_date = $database->escape_value($this->expire_date);
		$email = $database->escape_value($this->email);
		$notes = $database->escape_value($this->notes);
		$city = $database->escape_value($this->city);
		$state = $database->escape_value($this->state);
		$zip_code = $database->escape_value($this->zip_code);
		$google_ad = $database->escape_value($this->google_ad);
		$google_ad_setup = $database->escape_value($this->google_ad_setup);
		$page_complete = $database->escape_value($this->page_complete);
		$renewing_page = $database->escape_value($this->renewing_page);
		$leads = $database->escape_value($this->leads);
		$id = $database->escape_value($this->id);
		$salesrep_id = $database->escape_value($this->salesrep_id);
		 
		$sql  = "UPDATE plumlp SET client_name='{$client_name}', website_url='{$website_url}', ";
		$sql .= "start_date='{$start_date}', expire_date='{$expire_date}', ";
		$sql .= "email='{$email}', notes='{$notes}', ";
		$sql .= "city='{$city}', state='{$state}', ";
		$sql .= "start_date='{$start_date}', expire_date='{$expire_date}', ";
		$sql .= "zip_code='{$zip_code}', google_ad='{$google_ad}', ";
		$sql .= "google_ad_setup='{$google_ad_setup}', page_complete='{$page_complete}', renewing_page='{$renewing_page}', leads='{$leads}' ";
		$sql .= "WHERE id={$id} && salesrep_id={$salesrep_id}";
		
		$database->query($sql);
		return ($database->affected_rows() == 1) ? true : false;
	}
	
	
	public static function hide_p_lp_template_info($p_lp_id="",$current_user_id=""){
		global $database;
		
		$sql  = "UPDATE plumlp SET hidden=1 WHERE id={$p_lp_id} && salesrep_id={$current_user_id}";
		
		$database->query($sql);
		return ($database->affected_rows() == 1) ? true : false;
	}
	
	
	public static function find_all_user_p_lp($id=""){
		global $database;
		
		$sql = "SELECT * from plumlp WHERE salesrep_id='{$id}' && hidden=0 ORDER BY id DESC ";
		
		return static::find_by_sql($sql);	
	}
	
	public static function search_p_lp($id="",$search_term=""){
		global $database;
		
		$sql = " SELECT * FROM  plumlp WHERE ((client_name LIKE '%$search_term%') OR (email LIKE '%$search_term%')) AND ((salesrep_id={$id}) AND (hidden=0)) ORDER BY id DESC";
		
		return static::find_by_sql($sql);
	}
	
}
?>