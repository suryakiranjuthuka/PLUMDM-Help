<?php 

require_once("../../includes/initialize.php");


$current_user = SalesRep::find_by_id(1);

$plum_emails = PlumEmail::find_all_user_p_e($current_user->id);

$client_emails = ClientEmail::find_all_user_c_e($current_user->id);

$plum_lps = PlumLP::find_all_user_p_lp($current_user->id);
//$search_in = trim($_POST['search_input']);
//$plum_lps = PlumLP::search_p_lp($current_user->id,$search_in);

$client_lps = ClientLP::find_all_user_c_lp($current_user->id);


if(isset($_GET['attachment_url'])){
 $file = $_GET['attachment_url'];
			
			if (file_exists($file)) {
				header('Content-Description: File Transfer');
				header('Content-Type: application/octet-stream');
				header('Content-Disposition: attachment; filename='.$file);
				header('Content-Transfer-Encoding: binary');
				header('Expires: 0');
				header('Cache-Control: must-revalidate');
				header('Pragma: public');
				header('Content-Length: ' . filesize($file));
				ob_clean();
				flush();
				readfile($file);
				exit;
			}
}


//**************Plum Email Form Submittion***************
if(isset($_POST['p_e_submit'])){

	$plum_email = new PlumEmail();
	

	$plum_email->salesrep_id = $current_user->id;

	
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
		
	if($_POST['p_e_page_complete']){	
		$plum_email->page_complete = 1; }
		else{ $plum_email->page_complete = 0; }
		
	if($_POST['p_e_leads']){	
		$plum_email->leads = trim($_POST['p_e_leads']);}
		
	if($_POST['p_e_id']){	
		$plum_email->id = trim($_POST['p_e_id']);}
	
/*if($_POST['p_e_update_developer']){

 $to = "suryakiran.kittu@gmail.com";
 $subject = "Modification from {$current_user->first_name}!";
 $body = "{$plum_email->client_name}";
 //$mailheader = "Surya Test <landings@plumdm.com>";
 mail($to, $subject, $body);
}*/
	
	
	$sucess_p_e = $plum_email->update_p_e_template_info();
	
	//Verifying if information is updated
	if($sucess_p_e){
		$session->message("<span class='bold'>Successfully UPDATED</span> <span class='boldCreamColor'> information to Plum Emails.</span>");
		redirect_to("user.php");
	} else{
		$session->message("<span class='bold'>Failed</span> <span class='boldCreamColor'> to</span> <span class='bold'> UPDATE</span> <span class='boldCreamColor'> information to Plum Emails Template.</span>");
		redirect_to("user.php");
	}
}


//********** Hide p_e Template Info **************
if(isset($_GET['p_e_id'])){

	$p_e_id = trim($_GET['p_e_id']);
	$current_user_id = trim($_GET['current_user_id']);
	
	$hidden = PlumEmail::hide_p_e_template_info($p_e_id, $current_user_id);
	
	//Verifying if information is hidden
	if($hidden){
		$session->message("<span class='boldCreamColor'>Plum Emails Template Info</span> <span class='bold'> Successfully HIDDEN.</span>");
		redirect_to("user.php");
	} else{
		$session->message("<span class='bold'>Failed</span> <span class='boldCreamColor'> to</span> <span class='bold'> HIDE</span> <span class='boldCreamColor'> Plum Emails Template Info.</span>");
		redirect_to("user.php");
	}
}



//**************Client Email Form Submittion***************
if(isset($_POST['c_e_submit'])){

	$client_email = new ClientEmail();
	

	$client_email->salesrep_id = $current_user->id;

	
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
		
	if($_POST['c_e_page_complete']){	
		$client_email->page_complete = 1; }
		else{ $client_email->page_complete = 0; }
		
	if($_POST['c_e_leads']){	
		$client_email->leads = trim($_POST['c_e_leads']);}
		
	if($_POST['c_e_id']){	
		$client_email->id = trim($_POST['c_e_id']);}
	
/*if($_POST['c_e_update_developer']){

 $to = "suryakiran.kittu@gmail.com";
 $subject = "Modification from {$current_user->first_name}!";
 $body = "{$client_email->client_name}";
 //$mailheader = "Surya Test <landings@plumdm.com>";
 mail($to, $subject, $body);
}*/
	
	
	$sucess_c_e = $client_email->update_c_e_template_info();
	
	//Verifying if information is updated
	if($sucess_c_e){
		$session->message("<span class='bold'>Successfully UPDATED</span> <span class='boldCreamColor'> information to Client Emails.</span>");
		redirect_to("user.php");
	} else{
		$session->message("<span class='bold'>Failed</span> <span class='boldCreamColor'> to</span> <span class='bold'> UPDATE</span> <span class='boldCreamColor'> information to Client Emails Template.</span>");
		redirect_to("user.php");
	}
}


//********** Hide c_e Template Info **************
if(isset($_GET['c_e_id'])){

	$c_e_id = trim($_GET['c_e_id']);
	$current_user_id = trim($_GET['current_user_id']);
	
	$hidden = ClientEmail::hide_c_e_template_info($c_e_id, $current_user_id);
	
	//Verifying if information is hidden
	if($hidden){
		$session->message("<span class='boldCreamColor'>Client Emails Template Info</span> <span class='bold'> Successfully HIDDEN.</span>");
		redirect_to("user.php");
	} else{
		$session->message("<span class='bold'>Failed</span> <span class='boldCreamColor'> to</span> <span class='bold'> HIDE</span> <span class='boldCreamColor'> Client Emails Template Info.</span>");
		redirect_to("user.php");
	}
}


//**************Plum Landing Page Form Submittion***************
if(isset($_POST['p_lp_submit'])){
	
	$plum_landing_page = new PlumLP();
	

	$plum_landing_page->salesrep_id = $current_user->id;

	
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
		
	if($_POST['p_lp_google_ad']){	
		$plum_landing_page->google_ad = 1; }
		else{ $plum_landing_page->google_ad = 0; }
		
	if($_POST['p_lp_google_ad_setup']){	
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
		
	if($_POST['p_lp_page_complete']){	
		$plum_landing_page->page_complete = 1; }
		else{ $plum_landing_page->page_complete = 0; }
		
	if($_POST['p_lp_renewing_page']){	
		$plum_landing_page->renewing_page = 1; }
		else{ $plum_landing_page->renewing_page = 0; }
		
	if($_POST['p_lp_leads']){	
		$plum_landing_page->leads = trim($_POST['p_lp_leads']);}
		
	if($_POST['p_lp_id']){	
		$plum_landing_page->id = trim($_POST['p_lp_id']);}
	
/*if($_POST['p_lp_update_developer']){

 $to = "suryakiran.kittu@gmail.com";
 $subject = "Modification from {$current_user->first_name}!";
 $body = "{$plum_landing_page->client_name}";
 //$mailheader = "Surya Test <landings@plumdm.com>";
 mail($to, $subject, $body);
}*/
	
	
	$sucess_p_lp = $plum_landing_page->update_p_lp_template_info();
	
	//Verifying if information is updated
	if($sucess_p_lp){
		$session->message("<span class='bold'>Successfully UPDATED</span> <span class='boldCreamColor'> information to Plum Landing Pages.</span>");
		redirect_to("user.php");
	} else{
		$session->message("<span class='bold'>Failed</span> <span class='boldCreamColor'> to</span> <span class='bold'> UPDATE</span> <span class='boldCreamColor'> information to Plum Landing Pages Template.</span>");
		redirect_to("user.php");
	}
}


//********** Hide p_lp Template Info **************
if(isset($_GET['p_lp_id'])){

	$p_lp_id = trim($_GET['p_lp_id']);
	$current_user_id = trim($_GET['current_user_id']);
	
	$hidden = PlumLP::hide_p_lp_template_info($p_lp_id, $current_user_id);
	
	//Verifying if information is hidden
	if($hidden){
		$session->message("<span class='boldCreamColor'>Plum Landing Pages Template Info</span> <span class='bold'> Successfully HIDDEN.</span>");
		redirect_to("user.php");
	} else{
		$session->message("<span class='bold'>Failed</span> <span class='boldCreamColor'> to</span> <span class='bold'> HIDE</span> <span class='boldCreamColor'> Plum Landing Pages Template Info.</span>");
		redirect_to("user.php");
	}
}



//**************Client Landing Page Form Submittion***************
if(isset($_POST['c_lp_submit'])){
	
	$client_landing_page = new ClientLp();
	

	$client_landing_page->salesrep_id = $current_user->id;

	
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
		
	if($_POST['c_lp_google_ad']){	
		$client_landing_page->google_ad = 1; }
		else{ $client_landing_page->google_ad = 0; }
		
	if($_POST['c_lp_google_ad_setup']){	
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
		
	if($_POST['c_lp_page_complete']){	
		$client_landing_page->page_complete = 1; }
		else{ $client_landing_page->page_complete = 0; }
		
	if($_POST['c_lp_renewing_page']){	
		$client_landing_page->renewing_page = 1; }
		else{ $client_landing_page->renewing_page = 0; }
		
	if($_POST['c_lp_leads']){	
		$client_landing_page->leads = trim($_POST['c_lp_leads']);}
		
	if($_POST['c_lp_id']){	
		$client_landing_page->id = trim($_POST['c_lp_id']);}
	
	
/*if($_POST['c_lp_update_developer']){

 $to = "suryakiran.kittu@gmail.com";
 $subject = "Modification from {$current_user->first_name}!";
 $body = "{$client_landing_page->client_name}";
 //$mailheader = "Surya Test <landings@plumdm.com>";
 mail($to, $subject, $body);
}*/
	
	
	
	$sucess_c_lp = $client_landing_page->update_c_lp_template_info();
	
	//Verifying if information is updated
	if($sucess_c_lp){
		$session->message("<span class='bold'>Successfully UPDATED</span> <span class='boldCreamColor'> information to Client Landing Pages.</span>");
		redirect_to("user.php");
	} else{
		$session->message("<span class='bold'>Failed</span> <span class='boldCreamColor'> to</span> <span class='bold'> UPDATE</span> <span class='boldCreamColor'> information to Client Landing Pages Template.</span>");
		redirect_to("user.php");
	}
}


//********** Hide c_lp Template Info **************
if(isset($_GET['c_lp_id'])){

	$c_lp_id = trim($_GET['c_lp_id']);
	$current_user_id = trim($_GET['current_user_id']);
	
	$hidden = ClientLp::hide_c_lp_template_info($c_lp_id, $current_user_id);
	
	//Verifying if information is hidden
	if($hidden){
		$session->message("<span class='boldCreamColor'>Client Landing Pages Template Info</span> <span class='bold'> Successfully HIDDEN.</span>");
		redirect_to("user.php");
	} else{
		$session->message("<span class='bold'>Failed</span> <span class='boldCreamColor'> to</span> <span class='bold'> HIDE</span> <span class='boldCreamColor'> Client Landing Pages Template Info.</span>");
		redirect_to("user.php");
	}
}
?>

<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="Content-Language" content="en">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
<title>Plum User</title>
<link rel="shortcut icon" href="../site_images/plum_logo-favicon.ico" >
<link href="../stylesheets/plum_help_user.css" rel="stylesheet" type="text/css" media="screen,projection">
<link rel="stylesheet" type="text/css" href="../stylesheets/component_user.css" />
<link rel="stylesheet" href="../stylesheets/jquery.mCustomScrollbar.css" />
<script type="text/javascript" src="../javascripts/jquery-2.0.2.min.js"></script>
<script type="text/javascript" src="../javascripts/jquery.mCustomScrollbar.concat.min.js"></script>
</head>
<body>
<div id="container"><!-- ***** START CONTAINER***** -->


<nav id="firstNav">
</nav>


<nav id="secondNav">
<h1>Plum Direct Marketing</h1>
<a title="Upload Template">Upload Template</a>
<a title="Logout">Logout</a>



<div id="plumEmailLink">Plum Email's</div>
<div id="clientEmailLink">Client Email's</div>
<div id="plumLPLink">Plum Landing Page's</div>
<div id="clientLPLink">Client Landing Page's</div>
</nav>




<div class="bottomShadow" id="userNameContainer">
<h1><?php echo $current_user->first_name; ?></h1>
</div>


<section id="allUserInfoTemplatesContainer">



<section id="user_p_e">

<div id="p_e_search_container">
<input type="search" name="search_input_p_e" id="search_input_p_e" placeholder="">
</div>

<div id="search_results_p_e">
<?php foreach($plum_emails as $plum_email):?>			<!--Start PLUM EMAIL CONTENT --> 
	<div class=" allShadow1 each_user_p_lp">
        
        
        <div class="p_lp_top_container">
        	<!--<img alt="Client" class=" allShadow userImage" height="30" src="../site_images/user.png">-->
        	<h1 class="p_lp_client_name"><?php echo $plum_email->client_name;?></h1>

            
            <div class="p_lp_leads_container">
            	<span class="pound">
                #
                </span>
                <div class="leadsCircle">
				<span class="inside_leads_circle_text">
					<?php echo $plum_email->leads;?>
                </span>
                </div>
                <div class="leadsPlaceHolder">
                LEADS
                </div>
            </div>
        </div>
        
        <div class="p_lp_middle_container">
          <div class="p_lp_middle_first_container">
        	<div class="p_lp_url_container">
            	<img alt="url" class=" allShadow m_c_i" height="30" src="../site_images/link.png">
                <span class="url_span">URL :</span>
        		<h4 class="horizontal_scroll p_lp_url"><a href="<?php echo $plum_email->website_url; ?>" target="_blank"><?php echo $plum_email->website_url."&nbsp; &nbsp;"; ?></a></h4>
            </div>
            <div class="p_lp_email_container">
            	<img alt="email" class=" allShadow m_c_i" height="30" src="../site_images/email.png">
                <span>EMAIL :</span>
				<h4 class="horizontal_scroll p_lp_email"><?php echo $plum_email->email_list; ?></h4>
            </div>
            <div class="p_lp_notes_container">
            	<img alt="notes" class="allShadow m_c_i" height="30" src="../site_images/notes.png">
            	<span>NOTES :</span>
				<h4 class="content light mCustomScrollbar p_lp_notes"><?php echo $plum_email->notes; ?></h4>
            </div>
          </div>
          
          <div class="p_lp_middle_second_container">
                <div class="page_complete_container" style="margin-top:80px;">
                	<h5 style="">PAGE COMPLETE :</h5>
                	<h4 style="margin-right:10px;" class="<?php if($plum_email->page_complete == 0){ echo "red"; } else{ echo "green"; } ?>">
						<?php if($plum_email->page_complete == 0){ echo "NO"; } else{ echo "YES"; } ?></h4>
                </div>
          </div>
        </div>
        
        
        <div class="p_lp_bottom_container">
        		<div class="start_date_container">
                	<h4>Send Date :</h4>
          			<h5><?php echo $plum_email->send_date; ?></h5>
                </div>
                <a title="Edit" class="md-trigger" data-modal="p_e_modal"><button class="editButton transition1" language="javascript"  onclick="return p_e(this);" style="border-style:none; outline:0; border:0; background:none;" value="
				
				<?php echo $plum_email->client_name."***".$plum_email->leads."***".$plum_email->website_url."***".$plum_email->email_list."***".$plum_email->notes."***".$plum_email->page_complete."***".$plum_email->send_date."***".$plum_email->id; ?>
                
                "><img alt="Edit" class="allShadow transition1 edit_template_info" height="30" src="../site_images/edit.png"></button></a>
                
                <a href="user.php?p_e_id=<?php echo $plum_email->id ; ?>&current_user_id=<?php echo $current_user->id; ?>" title="Hide"><img alt="Hide" class="allShadow transition1 hide_template_info" height="30" src="../site_images/hide.png"></a>
                
				<?php if(!empty($plum_email->attachment_url)): ?>
         <a href="user.php?attachment_url=<?php echo $plum_email->attachment_url; ?>" title="Attachment"><img alt="Attachment" class="allShadow transition1 download_attachment_img" height="30" src="../site_images/download.png"></a>
         <?php endif ?>
        </div>
        
        
        <div style="float:right; position:absolute; top:115px; right:-280px; border: 5px solid #f7f7f7;" class="full_template_container">
          <div class="browser_bar">		<!-- BROWSER BAR-->
              <div class="dot1"></div>
              <div class="dot1"></div>
              <div class="dot1"></div>
          </div> 
          <div  class="templateAllShadow show_template template_info_image"><a href="<?php echo $plum_email->website_url; ?>" target="_blank">		<!-- Template Image -->
          <img style="margin:0 auto;" class="templateImage" src="<?php echo $plum_email->url_path; ?>" height="150"></a>
          </div>
       </div>
        
        
	</div>
	<?php endforeach; ?>

</div>


    																<!--Start PLUM EMAIL EDIT MODAL CONTENT -->  
      
      <div class="md-modal md-effect-1" id="p_e_modal">
		<div id="p_lp_modal_popup" class="md-content"></br>
      		<h2>Edit Info</h2>
				<form id="p_e_form" action="user.php" method="post">
				  <div class="emailLeadsField">
                    <p><label>#Leads</label><input id="p_e_leads" name="p_e_leads" type="text" /></p>
                  </div>
                  <p><label>Client Name</label><input id="p_e_client_name" name="p_e_client_name" type="text" /></p>
                  <p><label>URL</label><input id="p_e_website_url" name="p_e_website_url" type="text" /></p>
                  <p><label>Email List</label><input name="p_e_email_list" id="p_e_email_list" type="text" /></p>
                  <p><label>Send Date</label><input name="p_e_send_date" id="p_e_send_date" type="text" /></p>
                  <p><label>Notes</label><textarea name="p_e_notes" id="p_e_notes"  cols="40" rows="4" ></textarea></p>
                  <p><label style="float:left;">Page Complete</label><input id="p_e_page_complete" name="p_e_page_complete" style="float:left; margin-top:10px; margin-left:6px;" type="checkbox" /></p>
                  <p style=" position:relative;"><input name="p_e_update_developer" style="float:right; margin-top:10px; margin-left:5px;" type="checkbox" /><label style="float:right; color:#EB7572;">Update Developer</label></p>
                  <input type="hidden" id="p_e_id" type="text" name="p_e_id" value="" />
                  
                  <button class="md-close" name="p_e_submit" type="submit">Submit</button></br>  
                </form>
      	</div>
      </div><!--END PLUM LP EDIT MODAL CONTENT --> 

<div id="p_e_overlay" class="md-overlay4"></div><!-- the overlay element -->

</section>






<section id="user_c_e">

<div id="c_e_search_container">
<input type="search" name="search_input_c_e" id="search_input_c_e" placeholder="">
</div>

<div id="search_results_c_e">
<?php foreach($client_emails as $client_email):?>			<!--Start CLIENT EMAIL CONTENT --> 
	<div class=" allShadow1 each_user_p_lp">
        
        
        <div class="p_lp_top_container">
        	<!--<img alt="Client" class=" allShadow userImage" height="30" src="../site_images/user.png">-->
        	<h1 class="p_lp_client_name"><?php echo $client_email->client_name;?></h1>

            
            <div class="p_lp_leads_container">
            	<span class="pound">
                #
                </span>
                <div class="leadsCircle">
				<span class="inside_leads_circle_text">
					<?php echo $client_email->leads;?>
                </span>
                </div>
                <div class="leadsPlaceHolder">
                LEADS
                </div>
            </div>
        </div>
        
        <div class="p_lp_middle_container">
          <div class="p_lp_middle_first_container">
        	<div class="p_lp_url_container">
            	<img alt="url" class=" allShadow m_c_i" height="30" src="../site_images/link.png">
                <span class="url_span">URL :</span>
        		<h4 class="horizontal_scroll p_lp_url"><a href="<?php echo $client_email->website_url; ?>" target="_blank"><?php echo $client_email->website_url."&nbsp; &nbsp;"; ?></a></h4>
            </div>
            <div class="p_lp_email_container">
            	<img alt="email" class=" allShadow m_c_i" height="30" src="../site_images/email.png">
                <span>EMAIL :</span>
				<h4 class="horizontal_scroll p_lp_email"><?php echo $client_email->email_list; ?></h4>
            </div>
            <div class="p_lp_notes_container">
            	<img alt="notes" class="allShadow m_c_i" height="30" src="../site_images/notes.png">
            	<span>NOTES :</span>
				<h4 class="content light mCustomScrollbar p_lp_notes"><?php echo $client_email->notes; ?></h4>
            </div>
          </div>
          
          <div class="p_lp_middle_second_container">
                <div class="page_complete_container" style="margin-top:80px;">
                	<h5 style="">PAGE COMPLETE :</h5>
                	<h4 style="margin-right:10px;" class="<?php if($client_email->page_complete == 0){ echo "red"; } else{ echo "green"; } ?>">
						<?php if($client_email->page_complete == 0){ echo "NO"; } else{ echo "YES"; } ?></h4>
                </div>
          </div>
        </div>
        
        
        <div class="p_lp_bottom_container">
        		<div class="start_date_container">
                	<h4>Send Date :</h4>
          			<h5><?php echo $client_email->send_date; ?></h5>
                </div>
                <a title="Edit" class="md-trigger" data-modal="c_e_modal"><button class="editButton transition1" language="javascript"  onclick="return c_e(this);" style="border-style:none; outline:0; border:0; background:none;" value="
				
				<?php echo $client_email->client_name."***".$client_email->leads."***".$client_email->website_url."***".$client_email->email_list."***".$client_email->notes."***".$client_email->page_complete."***".$client_email->send_date."***".$client_email->id; ?>
                
                "><img alt="Edit" class="allShadow transition1 edit_template_info" height="30" src="../site_images/edit.png"></button></a>
                
                <a href="user.php?c_e_id=<?php echo $client_email->id ; ?>&current_user_id=<?php echo $current_user->id; ?>" title="Hide"><img alt="Hide" class="allShadow transition1 hide_template_info" height="30" src="../site_images/hide.png"></a>
                
				<?php if(!empty($client_email->attachment_url)): ?>
         <a href="user.php?attachment_url=<?php echo $client_email->attachment_url; ?>" title="Attachment"><img alt="Attachment" class="allShadow transition1 download_attachment_img" height="30" src="../site_images/download.png"></a>
         <?php endif ?>
        </div>
        
        
        <div style="float:right; position:absolute; top:115px; right:-280px; border: 5px solid #f7f7f7;" class="full_template_container">
          <div class="browser_bar">		<!-- BROWSER BAR-->
              <div class="dot1"></div>
              <div class="dot1"></div>
              <div class="dot1"></div>
          </div> 
          <div  class="templateAllShadow show_template template_info_image"><a href="<?php echo $client_email->website_url; ?>" target="_blank">		<!-- Template Image -->
          <img style="margin:0 auto;" class="templateImage" src="<?php echo $client_email->url_path; ?>" height="150"></a>
          </div>
       </div>
        
        
	</div>
	<?php endforeach; ?>

</div>


    																<!--Start CLIENT EMAIL EDIT MODAL CONTENT -->  
      
      <div class="md-modal md-effect-1" id="c_e_modal">
		<div id="p_lp_modal_popup" class="md-content"></br>
      		<h2>Edit Info</h2>
				<form id="c_e_form" action="user.php" method="post">
				  <div class="emailLeadsField">
                    <p><label>#Leads</label><input id="c_e_leads" name="c_e_leads" type="text" /></p>
                  </div>
                  <p><label>Client Name</label><input id="c_e_client_name" name="c_e_client_name" type="text" /></p>
                  <p><label>URL</label><input id="c_e_website_url" name="c_e_website_url" type="text" /></p>
                  <p><label>Email List</label><input name="c_e_email_list" id="c_e_email_list" type="text" /></p>
                  <p><label>Send Date</label><input name="c_e_send_date" id="c_e_send_date" type="text" /></p>
                  <p><label>Notes</label><textarea name="c_e_notes" id="c_e_notes"  cols="40" rows="4" ></textarea></p>
                  <p><label style="float:left;">Page Complete</label><input id="c_e_page_complete" name="c_e_page_complete" style="float:left; margin-top:10px; margin-left:6px;" type="checkbox" /></p>
                  <p style=" position:relative;"><input name="c_e_update_developer" style="float:right; margin-top:10px; margin-left:5px;" type="checkbox" /><label style="float:right; color:#EB7572;">Update Developer</label></p>
                  <input type="hidden" id="c_e_id" type="text" name="c_e_id" value="" />
                  
                  <button class="md-close" name="c_e_submit" type="submit">Submit</button></br>  
                </form>
      	</div>
      </div><!--END PLUM LP EDIT MODAL CONTENT --> 

<div id="c_e_overlay" class="md-overlay3"></div><!-- the overlay element -->
</section>






<section id="user_p_lp">

<div id="p_lp_search_container">
<input type="search" name="search_input_p_lp" id="search_input_p_lp" placeholder="">
</div>

<div id="search_results_p_lp">
<?php foreach($plum_lps as $plum_lp):?>			<!--Start PLUM LP CONTENT --> 
	<div class=" allShadow1 each_user_p_lp">
        
        
        <div class="p_lp_top_container">
        	<!--<img alt="Client" class=" allShadow userImage" height="30" src="../site_images/user.png">-->
        	<h1 class="p_lp_client_name"><?php echo $plum_lp->client_name;?></h1>
            
            <div class="p_lp_location">
                <h5><?php echo "( ".$plum_lp->city;?></h5>
                <h5><?php echo "&nbsp / ".$plum_lp->state;?></h5>
                <h5><?php echo "&nbsp / ".$plum_lp->zip_code." )";?></h5>
            </div>
            
            <div class="p_lp_leads_container">
            	<span class="pound">
                #
                </span>
                <div class="leadsCircle">
				<span class="inside_leads_circle_text">
					<?php echo $plum_lp->leads;?>
                </span>
                </div>
                <div class="leadsPlaceHolder">
                LEADS
                </div>
            </div>
        </div>
        
        <div class="p_lp_middle_container">
          <div class="p_lp_middle_first_container">
        	<div class="p_lp_url_container">
            	<img alt="url" class=" allShadow m_c_i" height="30" src="../site_images/link.png">
                <span class="url_span">URL :</span>
        		<h4 class="horizontal_scroll p_lp_url"><a href="<?php echo $plum_lp->website_url; ?>" target="_blank"><?php echo $plum_lp->website_url."&nbsp; &nbsp;"; ?></a></h4>
            </div>
            <div class="p_lp_email_container">
            	<img alt="email" class=" allShadow m_c_i" height="30" src="../site_images/email.png">
                <span>EMAIL :</span>
				<h4 class="p_lp_email"><?php echo $plum_lp->email; ?></h4>
            </div>
            <div class="p_lp_notes_container">
            	<img alt="notes" class="allShadow m_c_i" height="30" src="../site_images/notes.png">
            	<span>NOTES :</span>
				<h4 class="content light mCustomScrollbar p_lp_notes"><?php echo $plum_lp->notes; ?></h4>
            </div>
          </div>
          
          <div class="p_lp_middle_second_container">
          		<div class="google_ad_container">
                	<h5>GOOGLE ADWORDS :</h5>
          			<h4 class="<?php if($plum_lp->google_ad == 0){ echo "red"; } else{ echo "green"; } ?>">
						<?php if($plum_lp->google_ad == 0){ echo "NO"; } else{ echo "YES"; } ?></h4>
                </div>
                <div class="google_ad_setup_container">
                	<h5>AD-WORDS SETUP :</h5>
                	<h4 class="<?php if($plum_lp->google_ad_setup == 0){ echo "red"; } else{ echo "green"; } ?>">
						<?php if($plum_lp->google_ad_setup == 0){ echo "NO"; } else{ echo "YES"; } ?></h4>
                </div>
                <div class="page_complete_container">
                	<h5>PAGE COMPLETE :</h5>
                	<h4 class="<?php if($plum_lp->page_complete == 0){ echo "red"; } else{ echo "green"; } ?>">
						<?php if($plum_lp->page_complete == 0){ echo "NO"; } else{ echo "YES"; } ?></h4>
                </div>
                <div class="renewing_page_container">
                	<h5>RENEWING PAGE :</h5>
                	<h4 class="<?php if($plum_lp->renewing_page == 0){ echo "red"; } else{ echo "green"; } ?>">
						<?php if($plum_lp->renewing_page == 0){ echo "NO"; } else{ echo "YES"; } ?></h4>
                </div>
          </div>
        </div>
        
        
        <div class="p_lp_bottom_container">
        		<div class="start_date_container">
                	<h4>Starts :</h4>
          			<h5><?php echo $plum_lp->start_date; ?></h5>
                </div>
                <div class="expire_date_container">
                	<h4>Expires :</h4>
          			<h5><?php echo $plum_lp->expire_date; ?></h5>
                </div>
                <a title="Edit" class="md-trigger" data-modal="p_lp_modal"><button class="editButton transition1" language="javascript"  onclick="return p_lp(this);" style="border-style:none; outline:0; border:0; background:none;" value="
				
				<?php echo $plum_lp->client_name."***".$plum_lp->email."***".$plum_lp->city."***".$plum_lp->state."***".$plum_lp->zip_code."***".$plum_lp->google_ad."***".$plum_lp->google_ad_setup."***".$plum_lp->website_url."***".$plum_lp->start_date."***".$plum_lp->expire_date."***".$plum_lp->notes."***".$plum_lp->page_complete."***".$plum_lp->renewing_page."***".$plum_lp->leads."***".$plum_lp->id; ?>
                
                "><img alt="Edit" class="allShadow transition1 edit_template_info" height="30" src="../site_images/edit.png"></button></a>
                
                <a href="user.php?p_lp_id=<?php echo $plum_lp->id ; ?>&current_user_id=<?php echo $current_user->id; ?>" title="Hide"><img alt="Hide" class="allShadow transition1 hide_template_info" height="30" src="../site_images/hide.png"></a>
                
				<?php if(!empty($plum_lp->attachment_url)): ?>
         <a href="user.php?attachment_url=<?php echo $plum_lp->attachment_url; ?>" title="Attachment"><img alt="Attachment" class="allShadow transition1 download_attachment_img" height="30" src="../site_images/download.png"></a>
         <?php endif ?>
        </div>
        
        
        <div style="float:right; position:absolute; top:115px; right:-280px; border: 5px solid #f7f7f7;" class="full_template_container">
          <div class="browser_bar">		<!-- BROWSER BAR-->
              <div class="dot1"></div>
              <div class="dot1"></div>
              <div class="dot1"></div>
          </div> 
          <div  class="templateAllShadow show_template template_info_image"><a href="<?php echo $plum_lp->website_url; ?>" target="_blank">		<!-- Template Image -->
          <img style="margin:0 auto;" class="templateImage" src="<?php echo $plum_lp->url_path; ?>" height="150"></a>
          </div>
       </div>
        
        
	</div>
	<?php endforeach; ?>

</div>


    																<!--Start PLUM LP EDIT MODAL CONTENT -->  
      
      <div class="md-modal md-effect-1" id="p_lp_modal">
		<div id="p_lp_modal_popup" class="md-content1"></br>
      		<h2>Edit Info</h2>
				<form id="p_lp_form" action="user.php" method="post">
                	<div class="leadsField">
                    <p><label>#Leads</label><input id="p_lp_leads" name="p_lp_leads" type="text" /></p>
                    </div>
                  <div class="firstHalfForm">
                  <p><label>Client Name</label><input id="p_lp_client_name" name="p_lp_client_name" type="text" /></p>
                  <p><label>Email</label><input id="p_lp_email" name="p_lp_email" type="text" /></p>
                  <p><label>City</label><input id="p_lp_city" name="p_lp_city" type="text" /></p>
                  <p><label>State</label><input id="p_lp_state" name="p_lp_state" type="text" /></p>
                  <p><label>Zip Code</label><input id="p_lp_zip_code" name="p_lp_zip_code" type="text" /></p>
                  <p><label style="float:left;">Google AdWords</label><input id="p_lp_google_ad" name="p_lp_google_ad" style="float:left; margin-top:10px; margin-left:6px;" type="checkbox" /></p>
                  <p><label style="float:left; margin-left:30px;">AdWords Setup</label><input id="p_lp_google_ad_setup" name="p_lp_google_ad_setup" style="float:left; margin-top:10px; margin-left:6px;" type="checkbox" /></p>
                  </div>
                  
                  <div class="formDividerLine"></div>
                  
                  <div class="secondHalfForm">
                  <p><label>URL</label><input id="p_lp_website_url" name="p_lp_website_url" type="text" /></p>
                  <p><label>Start Date</label><input id="p_lp_start_date" name="p_lp_start_date" type="text" /></p>
                  <p><label>Expire Date</label><input id="p_lp_expire_date" name="p_lp_expire_date" type="text" /></p>
                  <p><label>Notes</label><textarea id="p_lp_notes" name="p_lp_notes"  cols="40" rows="4" ></textarea></p>
                  <p><label style="float:left;">Page Complete</label><input id="p_lp_page_complete" name="p_lp_page_complete" style="float:left; margin-top:10px; margin-left:6px;" type="checkbox" /></p>
                  <p><label style="float:left; margin-left:45px;">Renewing Page</label><input id="p_lp_renewing_page" name="p_lp_renewing_page" style="float:left; margin-top:10px; margin-left:6px;" type="checkbox" /></p>
                  <input type="hidden" id="p_lp_id" type="text" name="p_lp_id" />
                  </div>
                  <p style=" position:relative; right:70px; top:60px;"><label style="float:right; color:#EB7572;">Update Developer</label><input name="p_lp_update_developer" style="float:right; margin-top:10px; margin-left:6px;" type="checkbox" /></p>
                  
                  <button class="md-close" name="p_lp_submit" type="submit">Submit</button></br>
                </form>
      	</div>
      </div><!--END PLUM LP EDIT MODAL CONTENT --> 

<div id="p_lp_overlay" class="md-overlay2"></div><!-- the overlay element -->
	
</section><!--END "user_p_lp" SECTION --> 








<section id="user_c_lp">


<div id="c_lp_search_container">
<input type="search" name="search_input_c_lp" id="search_input_c_lp" placeholder="">
</div>

<div id="search_results_c_lp">
<?php foreach($client_lps as $client_lp):?>			<!--Start CLIENT LP CONTENT --> 
	<div class="allShadow1 each_user_p_lp">
        
        
        <div class="p_lp_top_container">
        	<!--<img alt="Client" class=" allShadow userImage" height="30" src="../site_images/user.png">-->
        	<h1 class="p_lp_client_name"><?php echo $client_lp->client_name;?></h1>
            
            <div class="p_lp_location">
                <h5><?php echo "( ".$client_lp->city;?></h5>
                <h5><?php echo "&nbsp / ".$client_lp->state;?></h5>
                <h5><?php echo "&nbsp / ".$client_lp->zip_code." )";?></h5>
            </div>
            
            <div class="p_lp_leads_container">
            	<span class="pound">
                #
                </span>
                <div class="leadsCircle">
				<span class="inside_leads_circle_text">
					<?php echo $client_lp->leads;?>
                </span>
                </div>
                <div class="leadsPlaceHolder">
                LEADS
                </div>
            </div>
        </div>
        
        <div class="p_lp_middle_container">
          <div class="p_lp_middle_first_container">
        	<div class="p_lp_url_container">
            	<img alt="url" class=" allShadow m_c_i" height="30" src="../site_images/link.png">
                <span class="url_span">URL :</span>
        		<h4 class="horizontal_scroll p_lp_url"><a href="<?php echo $client_lp->website_url; ?>" target="_blank"><?php echo $client_lp->website_url."&nbsp; &nbsp;"; ?></a></h4>
            </div>
            <div class="p_lp_email_container">
            	<img alt="email" class=" allShadow m_c_i" height="30" src="../site_images/email.png">
                <span>EMAIL :</span>
				<h4 class="p_lp_email"><?php echo $client_lp->email; ?></h4>
            </div>
            <div class="p_lp_notes_container">
            	<img alt="notes" class="allShadow m_c_i" height="30" src="../site_images/notes.png">
            	<span>NOTES :</span>
				<h4 class="content light mCustomScrollbar p_lp_notes"><?php echo $client_lp->notes; ?></h4>
            </div>
          </div>
          
          <div class="p_lp_middle_second_container">
          		<div class="google_ad_container">
                	<h5>GOOGLE ADWORDS :</h5>
          			<h4 class="<?php if($client_lp->google_ad == 0){ echo "red"; } else{ echo "green"; } ?>">
						<?php if($client_lp->google_ad == 0){ echo "NO"; } else{ echo "YES"; } ?></h4>
                </div>
                <div class="google_ad_setup_container">
                	<h5>AD-WORDS SETUP :</h5>
                	<h4 class="<?php if($client_lp->google_ad_setup == 0){ echo "red"; } else{ echo "green"; } ?>">
						<?php if($client_lp->google_ad_setup == 0){ echo "NO"; } else{ echo "YES"; } ?></h4>
                </div>
                <div class="page_complete_container">
                	<h5>PAGE COMPLETE :</h5>
                	<h4 class="<?php if($client_lp->page_complete == 0){ echo "red"; } else{ echo "green"; } ?>">
						<?php if($client_lp->page_complete == 0){ echo "NO"; } else{ echo "YES"; } ?></h4>
                </div>
                <div class="renewing_page_container">
                	<h5>RENEWING PAGE :</h5>
                	<h4 class="<?php if($client_lp->renewing_page == 0){ echo "red"; } else{ echo "green"; } ?>">
						<?php if($client_lp->renewing_page == 0){ echo "NO"; } else{ echo "YES"; } ?></h4>
                </div>
          </div>
        </div>
        
        
        <div class="p_lp_bottom_container">
        		<div class="start_date_container">
                	<h4>Starts :</h4>
          			<h5><?php echo $client_lp->start_date; ?></h5>
                </div>
                <div class="expire_date_container">
                	<h4>Expires :</h4>
          			<h5><?php echo $client_lp->expire_date; ?></h5>
                </div>
                <a title="Edit" class="md-trigger" data-modal="c_lp_modal"><button class="editButton transition1" language="javascript"  onclick="return c_lp(this);" style="border-style:none; outline:0; border:0; background:none;" value="
				
				<?php echo $client_lp->client_name."***".$client_lp->email."***".$client_lp->city."***".$client_lp->state."***".$client_lp->zip_code."***".$client_lp->google_ad."***".$client_lp->google_ad_setup."***".$client_lp->website_url."***".$client_lp->start_date."***".$client_lp->expire_date."***".$client_lp->notes."***".$client_lp->page_complete."***".$client_lp->renewing_page."***".$client_lp->leads."***".$client_lp->id; ?>
                
                "><img alt="Edit" class="allShadow transition1 edit_template_info" height="30" src="../site_images/edit.png"></button></a>
                
                <a href="user.php?c_lp_id=<?php echo $client_lp->id ; ?>&current_user_id=<?php echo $current_user->id; ?>" title="Hide"><img alt="Hide" class="allShadow transition1 hide_template_info" height="30" src="../site_images/hide.png"></a>
                
				<?php if(!empty($client_lp->attachment_url)): ?>
         <a href="user.php?attachment_url=<?php echo $client_lp->attachment_url; ?>" title="Attachment"><img alt="Attachment" class="allShadow transition1 download_attachment_img" height="30" src="../site_images/download.png"></a>
         <?php endif ?>
        </div>
        
        
        <div style="float:right; position:absolute; top:115px; right:-280px; border: 5px solid #f7f7f7;" class="full_template_container">
          <div class="browser_bar">		<!-- BROWSER BAR-->
              <div class="dot1"></div>
              <div class="dot1"></div>
              <div class="dot1"></div>
          </div> 
          <div  class="templateAllShadow show_template template_info_image"><a href="<?php echo $client_lp->website_url; ?>" target="_blank">		<!-- Template Image -->
          <img style="margin:0 auto;" class="templateImage" src="<?php echo $client_lp->url_path; ?>" height="150"></a>
          </div>
       </div>
        
        
	</div>
	<?php endforeach; ?>

</div>


    																<!--Start CLIENT LP EDIT MODAL CONTENT -->  
      
      <div class="md-modal md-effect-1" id="c_lp_modal">
		<div id="c_lp_modal_popup" class="md-content1"></br>
      		<h2>Edit Info</h2>
				<form id="c_lp_form" action="user.php" method="post">
                	<div class="leadsField">
                    <p><label>#Leads</label><input id="c_lp_leads" name="c_lp_leads" type="text" /></p>
                    </div>
                  <div class="firstHalfForm">
                  <p><label>Client Name</label><input id="c_lp_client_name" name="c_lp_client_name" type="text" /></p>
                  <p><label>Email</label><input id="c_lp_email" name="c_lp_email" type="text" /></p>
                  <p><label>City</label><input id="c_lp_city" name="c_lp_city" type="text" /></p>
                  <p><label>State</label><input id="c_lp_state" name="c_lp_state" type="text" /></p>
                  <p><label>Zip Code</label><input id="c_lp_zip_code" name="c_lp_zip_code" type="text" /></p>
                  <p><label style="float:left;">Google AdWords</label><input id="c_lp_google_ad" name="c_lp_google_ad" style="float:left; margin-top:10px; margin-left:6px;" type="checkbox" /></p>
                  <p><label style="float:left; margin-left:30px;">AdWords Setup</label><input id="c_lp_google_ad_setup" name="c_lp_google_ad_setup" style="float:left; margin-top:10px; margin-left:6px;" type="checkbox" /></p>
                  </div>
                  
                  <div class="formDividerLine"></div>
                  
                  <div class="secondHalfForm">
                  <p><label>URL</label><input id="c_lp_website_url" name="c_lp_website_url" type="text" /></p>
                  <p><label>Start Date</label><input id="c_lp_start_date" name="c_lp_start_date" type="text" /></p>
                  <p><label>Expire Date</label><input id="c_lp_expire_date" name="c_lp_expire_date" type="text" /></p>
                  <p><label>Notes</label><textarea id="c_lp_notes" name="c_lp_notes"  cols="40" rows="4" ></textarea></p>
                  <p><label style="float:left;">Page Complete</label><input id="c_lp_page_complete" name="c_lp_page_complete" style="float:left; margin-top:10px; margin-left:6px;" type="checkbox" /></p>
                  <p><label style="float:left; margin-left:45px;">Renewing Page</label><input id="c_lp_renewing_page" name="c_lp_renewing_page" style="float:left; margin-top:10px; margin-left:6px;" type="checkbox" /></p>
                  <input type="hidden" id="c_lp_id" type="text" name="c_lp_id" value="" />
                  </div>
                  <p style=" position:relative; right:70px; top:60px;"><label style="float:right; color:#EB7572;">Update Developer</label><input name="c_lp_update_developer" style="float:right; margin-top:10px; margin-left:6px;" type="checkbox" /></p>
                  
                  <button class="md-close" name="c_lp_submit" type="submit">Submit</button></br>
                </form>
      	</div>
      </div><!--END CLIENT LP EDIT MODAL CONTENT --> 

<div id="c_lp_overlay" class="md-overlay1"></div><!-- the overlay element -->

</section><!--END "user_c_lp" SECTION --> 



</section> <!--********************************************** END of User Info Templates Container ***************************************-->





</div><!-- ***** END OF CONTAINER***** -->

<!--***************************************** Error Message after submitting form *******************************************-->
<?php if($session->message): ?>
<div class="md-trigger" data-modal="error_message_modal" id="error_message_div_id"></div>
<?php endif; ?>

<div class="md-modal md-effect-1" id="error_message_modal">
		<div style="padding:0;" id="error_message_modal_content" class="md-content"></br>
        <div id="error_check_message"><?php echo $session->message; ?></div>
        <div id="error_message_modal_close" class="md-close"><a title="close"><img class="transition1" src="../site_images/close.png" height="30"></a></div>
        </div>
</div>

<div class="md-overlay"></div><!-- the overlay element -->


<script type="text/javascript">
$(function(){
    /*-- Scroll to link --*/
    $('.scroller-link').click(function(e){
        e.preventDefault(); //Don't automatically jump to the link
        id = $(this).attr('href').replace('#', ''); //Extract the id of the element to jump to
        $('html,body').animate({scrollTop: $("#"+id).offset().top-$(this).closest('ul').height()},'normal');
    });
});

$(".content").mCustomScrollbar({
    theme:"dark"
});

$(".horizontal_scroll").mCustomScrollbar({
    axis:"x",
	theme:"dark",
	autoExpandScrollbar:true,
	advanced:{autoExpandHorizontalScroll:true},
	scrollButtons:{enable:true}
});

//Error Message Modal Popup Function
$(document).ready(function() {
        // trigger the click event
        $('#error_message_div_id').click();
});

//Form Reset Funcationality
$( "#p_e_overlay" ).click(function() {
  
  	document.getElementById("p_e_form").reset();
  
});

$( "#c_e_overlay" ).click(function() {
  
  	document.getElementById("c_e_form").reset();
  
});

$( "#p_lp_overlay" ).click(function() {
  
  	document.getElementById("p_lp_form").reset();
  
});

$( "#c_lp_overlay" ).click(function() {
  
  	document.getElementById("c_lp_form").reset();
  
});

//Enter on Search
$(document).ready(function() {
    $('#search_input_p_e').keydown(function(event) {
        if (event.keyCode == 13) {
			 search_p_e();
         }
    });
});

$(document).ready(function() {
    $('#search_input_c_e').keydown(function(event) {
        if (event.keyCode == 13) {
			 search_c_e();
         }
    });
});

$(document).ready(function() {
    $('#search_input_p_lp').keydown(function(event) {
        if (event.keyCode == 13) {
			 search_p_lp();
         }
    });
});

$(document).ready(function() {
    $('#search_input_c_lp').keydown(function(event) {
        if (event.keyCode == 13) {
			 search_c_lp();
         }
    });
});

//Search Function
function search_p_e(){
	$.post('search_p_e.php', { search_input_p_e: document.getElementById("search_input_p_e").value },
		function(output) {
			$('#search_results_p_e').html(output).show();
		});
}

function search_c_e(){
	$.post('search_c_e.php', { search_input_c_e: document.getElementById("search_input_c_e").value },
		function(output) {
			$('#search_results_c_e').html(output).show();
		});
}

function search_p_lp(){
	$.post('search_p_lp.php', { search_input_p_lp: document.getElementById("search_input_p_lp").value },
		function(output) {
			$('#search_results_p_lp').html(output).show();
		});
}

function search_c_lp(){
	$.post('search_c_lp.php', { search_input_c_lp: document.getElementById("search_input_c_lp").value },
		function(output) {
			$('#search_results_c_lp').html(output).show();
		});
}


//Prepopulated Forms
function p_e(button) {
		var button_value = button.value;
		var button_values = button_value.split("***");
		
		
		$("#p_e_client_name")
		.attr("value",function(){
				return $.trim(button_values[0]);
		});
		
		$("#p_e_leads")
		.attr("value",button_values[1]);
		
		$("#p_e_website_url")
		.attr("value",button_values[2]);
		
		$("#p_e_email_list")
		.attr("value",button_values[3]);
		
		$("#p_e_notes")
		.text(button_values[4]);
		
		$("#p_e_page_complete")
		.attr("checked",function(){
			if(button_values[5]==0){ return false;} else{ return true; }	
		});
		
		$("#p_e_send_date")
		.attr("value",button_values[6]);
		
		$("#p_e_id")
		.attr("value",button_values[7]);
}

function c_e(button) {
		var button_value = button.value;
		var button_values = button_value.split("***");
		
		
		$("#c_e_client_name")
		.attr("value",function(){
				return $.trim(button_values[0]);
		});
		
		$("#c_e_leads")
		.attr("value",button_values[1]);
		
		$("#c_e_website_url")
		.attr("value",button_values[2]);
		
		$("#c_e_email_list")
		.attr("value",button_values[3]);
		
		$("#c_e_notes")
		.text(button_values[4]);
		
		$("#c_e_page_complete")
		.attr("checked",function(){
			if(button_values[5]==0){ return false;} else{ return true; }	
		});
		
		$("#c_e_send_date")
		.attr("value",button_values[6]);
		
		$("#c_e_id")
		.attr("value",button_values[7]);
}

function p_lp(button) {
		var button_value = button.value;
		var button_values = button_value.split("***");
		
		
		$("#p_lp_client_name")
		.attr("value",function(){
				return $.trim(button_values[0]);
		});
		
		$("#p_lp_email")
		.attr("value",button_values[1]);
		
		$("#p_lp_city")
		.attr("value",button_values[2]);
		
		$("#p_lp_state")
		.attr("value",button_values[3]);
		
		$("#p_lp_zip_code")
		.attr("value",button_values[4]);
		
		$("#p_lp_google_ad")
		.attr("checked",function(){
			if(button_values[5]==0){ return false;} else{ return true; }	
		});
		
		$("#p_lp_google_ad_setup")
		.attr("checked",function(){
			if(button_values[6]==0){ return false;} else{ return true; }	
		});
		
		$("#p_lp_website_url")
		.attr("value",button_values[7]);
		
		$("#p_lp_start_date")
		.attr("value",button_values[8]);
		
		$("#p_lp_expire_date")
		.attr("value",button_values[9]);
		
		$("#p_lp_notes")
		.text(button_values[10]);
		
		$("#p_lp_page_complete")
		.attr("checked",function(){
			if(button_values[11]==0){ return false;} else{ return true; }	
		});
		
		$("#p_lp_renewing_page")
		.attr("checked",function(){
			if(button_values[12]==0){ return false;} else{ return true; }	
		});
		
		$("#p_lp_leads")
		.attr("value",button_values[13]);
		
		$("#p_lp_id")
		.attr("value",button_values[14]);
		
}

function c_lp(button) {
		var button_value = button.value;
		var button_values = button_value.split("***");
		
		
		$("#c_lp_client_name")
		.attr("value",function(){
				return $.trim(button_values[0]);
		});
		
		$("#c_lp_email")
		.attr("value",button_values[1]);
		
		$("#c_lp_city")
		.attr("value",button_values[2]);
		
		$("#c_lp_state")
		.attr("value",button_values[3]);
		
		$("#c_lp_zip_code")
		.attr("value",button_values[4]);
		
		$("#c_lp_google_ad")
		.attr("checked",function(){
			if(button_values[5]==0){ return false;} else{ return true; }	
		});
		
		$("#c_lp_google_ad_setup")
		.attr("checked",function(){
			if(button_values[6]==0){ return false;} else{ return true; }	
		});
		
		$("#c_lp_website_url")
		.attr("value",button_values[7]);
		
		$("#c_lp_start_date")
		.attr("value",button_values[8]);
		
		$("#c_lp_expire_date")
		.attr("value",button_values[9]);
		
		$("#c_lp_notes")
		.text(button_values[10]);
		
		$("#c_lp_page_complete")
		.attr("checked",function(){
			if(button_values[11]==0){ return false;} else{ return true; }	
		});
		
		$("#c_lp_renewing_page")
		.attr("checked",function(){
			if(button_values[12]==0){ return false;} else{ return true; }	
		});
		
		$("#c_lp_leads")
		.attr("value",button_values[13]);
		
		$("#c_lp_id")
		.attr("value",button_values[14]);
}


</script>





<script type="text/javascript" src="../javascripts/d3.min.js"></script>
<script type="text/javascript" src="../javascripts/plumdm_help_user.js"></script>
<script src="../javascripts/classie.js"></script>
<script src="../javascripts/modalEffects.js"></script>
</body>
</html>
