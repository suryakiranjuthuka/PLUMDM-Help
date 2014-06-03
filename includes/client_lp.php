<?php 

require_once(LIB_PATH.DS.'database.php');

class ClientLp extends DatabaseObject{
	
	protected static $table_name="clientlp";
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

	
	public function create_c_lp_template_info(){
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
		
		
		$sql="INSERT INTO clientlp (client_name, salesrep_id, website_url, url_path, start_date, expire_date, email, notes, city, state, zip_code, google_ad) VALUES ('{$client_name}', '{$salesrep_id}', '{$website_url}', '{$url_path}', '{$start_date}', '{$expire_date}', '{$email}', '{$notes}', '{$city}', '{$state}', '{$zip_code}', '{$google_ad}')";
		
		if($database->query($sql)){
			return true;	
		}else{
			return false;
		}
	}
	
	
	public static function find_all_user_c_lp($id=""){
		global $database;
		
		$sql = "SELECT * from clientlp WHERE salesrep_id='{$id}'";
		
		return static::find_by_sql($sql);	
	}
	
}
?>