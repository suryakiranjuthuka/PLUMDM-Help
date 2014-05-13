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
	public $google_ad;
	public $google_ad_setup;
	public $page_complete;
	public $review_page;
	public $leads;
	public $city;
	public $state;
	public $zip_code;
	public $notes;
	public $attachment_url;

	
	
}


?>