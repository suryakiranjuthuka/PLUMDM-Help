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
	
	

	public function create_p_lp_template_info(){
		global $database;
		
		$client_name = $database->escape_value($this->client_name);
		$salesrep_id = $database->escape_value($this->salesrep_id);
		$website_url = $database->escape_value($this->website_url);
		$start_date = $database->escape_value($this->start_date);
		$expire_date = $database->escape_value($this->expire_date);
		$email = $database->escape_value($this->email);
		$notes = $database->escape_value($this->notes);
		$city = $database->escape_value($this->city);
		$state = $database->escape_value($this->state);
		$zip_code = $database->escape_value($this->zip_code);
		$google_ad = $database->escape_value($this->google_ad);
		
		
		$sql="INSERT INTO plumlp (client_name, salesrep_id, website_url, start_date, expire_date, email, notes, city, state, zip_code, google_ad) VALUES ('{$client_name}', '{$salesrep_id}', '{$website_url}', '{$start_date}', '{$expire_date}', '{$email}', '{$notes}', '{$city}', '{$state}', '{$zip_code}', '{$google_ad}')";
		
		if($database->query($sql)){
			return true;	
		}else{
			return false;
		}
	}
	
	
	public static function find_all_user_p_lp($id=""){
		global $database;
		
		$sql = "SELECT * from plumlp WHERE salesrep_id='{$id}'";
		
		return static::find_by_sql($sql);	
	}
	
}
?>