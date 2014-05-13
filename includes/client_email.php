<?php 

require_once(LIB_PATH.DS.'database.php');

class ClientEmail extends DatabaseObject{
	
	protected static $table_name="clientemail";
	public $id;
	public $salesrep_id;
	public $client_name;
	public $send_date;
	public $email_list;
	public $notes;
	public $leads;
	public $page_complete;
	public $attachment_url;
	

	
	
}


?>