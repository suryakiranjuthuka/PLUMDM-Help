<?php 

require_once("../../includes/initialize.php"); 

if (!$session->is_logged_in()) { redirect_to("login.php"); }

$current_user = SalesRep::find_by_id($session->user_id);



//**************Plum Email Form Submittion***************
if(isset($_POST['p_e_submit'])){

	$plum_email = new PlumEmail();

	
	if($_POST['p_e_client_name']){	
		$plum_email->client_name = trim($_POST['p_e_client_name']);}
		
	if($_POST['p_e_email_list']){	
		$plum_email->email_list = trim($_POST['p_e_email_list']);}
		
	if($_POST['p_e_website_url']){	
		$plum_email->website_url = trim($_POST['p_e_website_url']);}
		
	if($_POST['p_e_send_date']){	
		$plum_email->send_date = trim($_POST['p_e_send_date']);}
		
	if($_POST['p_e_notes']){	
		$plum_email->notes = trim($_POST['p_e_notes']);}
		
	if($_POST['p_e_page_complete'] == 1){	
		$plum_email->page_complete = 1; }
		else{ $plum_email->page_complete = 0; }
		
	if($_POST['p_e_leads']){	
		$plum_email->leads = trim($_POST['p_e_leads']);}
		
	if($_POST['p_e_id']){	
		$plum_email->id = trim($_POST['p_e_id']);}
	
	if($_POST['p_e_salesrep_id']){	
		$plum_email->salesrep_id = trim($_POST['p_e_salesrep_id']);}
	
	
/*if($_POST['p_e_update_developer']){

 $to = "suryakiran.kittu@gmail.com";
 $subject = "Modification from {$current_user->first_name}!";
 $body = "{$plum_email->client_name}";
 //$mailheader = "Surya Test <landings@plumdm.com>";
 mail($to, $subject, $body);
}*/
	
	
	$sucess_p_e = $plum_email->update_p_e_template_info();
	
	//Verifying if information is updated
//	if($sucess_p_e){
//		$session->message("<span class='bold'>Successfully UPDATED</span> <span class='boldCreamColor'> information to Plum Emails.</span>");
//		redirect_to("user.php");
//	} else{
//		$session->message("<span class='bold'>Failed</span> <span class='boldCreamColor'> to</span> <span class='bold'> UPDATE</span> <span class='boldCreamColor'> information to Plum Emails Template.</span>");
//		redirect_to("user.php");
//	}
}



//**************Client Email Form Submittion***************
if(isset($_POST['c_e_submit'])){

	$client_email = new ClientEmail();

	
	if($_POST['c_e_client_name']){	
		$client_email->client_name = trim($_POST['c_e_client_name']);}
		
	if($_POST['c_e_email_list']){	
		$client_email->email_list = trim($_POST['c_e_email_list']);}
		
	if($_POST['c_e_website_url']){	
		$client_email->website_url = trim($_POST['c_e_website_url']);}
		
	if($_POST['c_e_send_date']){	
		$client_email->send_date = trim($_POST['c_e_send_date']);}
		
	if($_POST['c_e_notes']){	
		$client_email->notes = trim($_POST['c_e_notes']);}
		
	if($_POST['c_e_page_complete'] == 1){	
		$client_email->page_complete = 1; }
		else{ $client_email->page_complete = 0; }
		
	if($_POST['c_e_leads']){	
		$client_email->leads = trim($_POST['c_e_leads']);}
		
	if($_POST['c_e_id']){	
		$client_email->id = trim($_POST['c_e_id']);}
		
	if($_POST['c_e_salesrep_id']){	
		$client_email->salesrep_id = trim($_POST['c_e_salesrep_id']);}
	
/*if($_POST['c_e_update_developer']){

 $to = "suryakiran.kittu@gmail.com";
 $subject = "Modification from {$current_user->first_name}!";
 $body = "{$client_email->client_name}";
 //$mailheader = "Surya Test <landings@plumdm.com>";
 mail($to, $subject, $body);
}*/
	
	
	$sucess_c_e = $client_email->update_c_e_template_info();
	
	//Verifying if information is updated
//	if($sucess_c_e){
//		$session->message("<span class='bold'>Successfully UPDATED</span> <span class='boldCreamColor'> information to Client Emails.</span>");
//		redirect_to("user.php");
//	} else{
//		$session->message("<span class='bold'>Failed</span> <span class='boldCreamColor'> to</span> <span class='bold'> UPDATE</span> <span class='boldCreamColor'> information to Client Emails Template.</span>");
//		redirect_to("user.php");
//	}
}





//**************Plum Landing Page Form Submittion***************
if(isset($_POST['p_lp_submit'])){
	
	$plum_landing_page = new PlumLP();

	
	if($_POST['p_lp_client_name']){	
		$plum_landing_page->client_name = trim($_POST['p_lp_client_name']);}
		
	if($_POST['p_lp_email']){	
		$plum_landing_page->email = trim($_POST['p_lp_email']);}
		
	if($_POST['p_lp_city']){	
		$plum_landing_page->city = trim($_POST['p_lp_city']);}
		
	if($_POST['p_lp_state']){	
		$plum_landing_page->state = trim($_POST['p_lp_state']);}
		
	if($_POST['p_lp_zip_code']){	
		$plum_landing_page->zip_code = trim($_POST['p_lp_zip_code']);}
		
	if($_POST['p_lp_google_ad'] == 1){	
		$plum_landing_page->google_ad = 1; }
		else{ $plum_landing_page->google_ad = 0; }
		
	if($_POST['p_lp_google_ad_setup'] == 1){	
		$plum_landing_page->google_ad_setup = 1; }
		else{ $plum_landing_page->google_ad_setup = 0; }
		
	if($_POST['p_lp_website_url']){	
		$plum_landing_page->website_url = trim($_POST['p_lp_website_url']);}
		
	if($_POST['p_lp_start_date']){	
		$plum_landing_page->start_date = trim($_POST['p_lp_start_date']);}
		
	if($_POST['p_lp_expire_date']){	
		$plum_landing_page->expire_date = trim($_POST['p_lp_expire_date']);}
		
	if($_POST['p_lp_notes']){	
		$plum_landing_page->notes = trim($_POST['p_lp_notes']);}
		
	if($_POST['p_lp_page_complete'] == 1){	
		$plum_landing_page->page_complete = 1; }
		else{ $plum_landing_page->page_complete = 0; }
		
	if($_POST['p_lp_renewing_page'] == 1){	
		$plum_landing_page->renewing_page = 1; }
		else{ $plum_landing_page->renewing_page = 0; }
		
	if($_POST['p_lp_leads']){	
		$plum_landing_page->leads = trim($_POST['p_lp_leads']);}
		
	if($_POST['p_lp_id']){	
		$plum_landing_page->id = trim($_POST['p_lp_id']);}
		
	if($_POST['p_lp_salesrep_id']){	
		$plum_landing_page->salesrep_id = trim($_POST['p_lp_salesrep_id']);}
	
/*if($_POST['p_lp_update_developer']){

 $to = "suryakiran.kittu@gmail.com";
 $subject = "Modification from {$current_user->first_name}!";
 $body = "{$plum_landing_page->client_name}";
 //$mailheader = "Surya Test <landings@plumdm.com>";
 mail($to, $subject, $body);
}*/
	
	
	$sucess_p_lp = $plum_landing_page->update_p_lp_template_info();
	
	//Verifying if information is updated
//	if($sucess_p_lp){
//		$session->message("<span class='bold'>Successfully UPDATED</span> <span class='boldCreamColor'> information to Plum Landing Pages.</span>");
//		redirect_to("user.php");
//	} else{
//		$session->message("<span class='bold'>Failed</span> <span class='boldCreamColor'> to</span> <span class='bold'> UPDATE</span> <span class='boldCreamColor'> information to Plum Landing Pages Template.</span>");
//		redirect_to("user.php");
//	}
}






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
