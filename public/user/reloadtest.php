<?php 

require_once("../../includes/initialize.php"); 

if (!$session->is_logged_in()) { redirect_to("login.php"); }

$current_user = SalesRep::find_by_id($session->user_id);





//**************Client Landing Page Form Submittion***************
if(isset($_POST['c_lp_submit'])){
	
	$client_landing_page = new ClientLp();

	
	if($_POST['c_lp_client_name']){	
		$client_landing_page->client_name = trim($_POST['c_lp_client_name']);}
		
	if($_POST['c_lp_email']){	
		$client_landing_page->email = trim($_POST['c_lp_email']);}
		
	if($_POST['c_lp_city']){	
		$client_landing_page->city = trim($_POST['c_lp_city']);}
		
	if($_POST['c_lp_state']){	
		$client_landing_page->state = trim($_POST['c_lp_state']);}
		
	if($_POST['c_lp_zip_code']){	
		$client_landing_page->zip_code = trim($_POST['c_lp_zip_code']);}
		
	if($_POST['c_lp_google_ad'] == 1){	
		$client_landing_page->google_ad = 1; }
		else{ $client_landing_page->google_ad = 0; }
		
	if($_POST['c_lp_google_ad_setup'] == 1){	
		$client_landing_page->google_ad_setup = 1; }
		else{ $client_landing_page->google_ad_setup = 0; }
		
	if($_POST['c_lp_website_url']){	
		$client_landing_page->website_url = trim($_POST['c_lp_website_url']);}
		
	if($_POST['c_lp_start_date']){	
		$client_landing_page->start_date = trim($_POST['c_lp_start_date']);}
		
	if($_POST['c_lp_expire_date']){	
		$client_landing_page->expire_date = trim($_POST['c_lp_expire_date']);}
		
	if($_POST['c_lp_notes']){	
		$client_landing_page->notes = trim($_POST['c_lp_notes']);}
		
	if($_POST['c_lp_page_complete'] == 1){	
		$client_landing_page->page_complete = 1; }
		else{ $client_landing_page->page_complete = 0; }
		
	if($_POST['c_lp_renewing_page'] == 1){	
		$client_landing_page->renewing_page = 1; }
		else{ $client_landing_page->renewing_page = 0; }
		
	if($_POST['c_lp_leads']){	
		$client_landing_page->leads = trim($_POST['c_lp_leads']);}
		
	if($_POST['c_lp_id']){	
		$client_landing_page->id = trim($_POST['c_lp_id']);}
		
	if($_POST['c_lp_salesrep_id']){	
		$client_landing_page->salesrep_id = trim($_POST['c_lp_salesrep_id']);}
	
	
/*if($_POST['c_lp_update_developer']){

 $to = "suryakiran.kittu@gmail.com";
 $subject = "Modification from {$current_user->first_name}!";
 $body = "{$client_landing_page->client_name}";
 //$mailheader = "Surya Test <landings@plumdm.com>";
 mail($to, $subject, $body);
}*/
	
	
	
	$sucess_c_lp = $client_landing_page->update_c_lp_template_info();
	
	//Verifying if information is updated
//	if($sucess_c_lp){
//		$session->message("<span class='bold'>Successfully UPDATED</span> <span class='boldCreamColor'> information to Client Landing Pages.</span>");
//		redirect_to("user.php");
//	} else{
//		$session->message("<span class='bold'>Failed</span> <span class='boldCreamColor'> to</span> <span class='bold'> UPDATE</span> <span class='boldCreamColor'> information to Client Landing Pages Template.</span>");
//		redirect_to("user.php");
//	}
}

?>
