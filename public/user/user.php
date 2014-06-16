<?php 

require_once("../../includes/initialize.php");

if (!$session->is_logged_in()) { redirect_to("login.php"); }

//Logging Out
if(isset($_GET['logout'])){
  $session->logout(); 
  redirect_to("login.php");
}



$current_user = SalesRep::find_by_id($session->user_id);

$sales_reps = SalesRep::get_all_salesrep();

$plum_emails = PlumEmail::find_all_user_p_e($current_user->id);

$client_emails = ClientEmail::find_all_user_c_e($current_user->id);

$plum_lps = PlumLP::find_all_user_p_lp($current_user->id);

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





//********** Hide p_e Template Info **************
if(isset($_GET['p_e_id'])){
	
	$p_e_id = trim($_GET['p_e_id']);
	$current_user_id = trim($_GET['current_user_id']);
	$p_e_hide = trim($_GET['p_e_hide']);
	
	$hidden = PlumEmail::hide_p_e_template_info($p_e_id, $current_user_id, $p_e_hide);
	
	//Verifying if information is hidden
	if($hidden){
		$session->message("<span class='boldCreamColor'>Plum Emails Template Info</span> <span class='bold'> Successfully HIDDEN.</span>");
		redirect_to("user.php");
	} else{
		$session->message("<span class='bold'>Failed</span> <span class='boldCreamColor'> to</span> <span class='bold'> HIDE</span> <span class='boldCreamColor'> Plum Emails Template Info.</span>");
		redirect_to("user.php");
	}
}






//********** Hide c_e Template Info **************
if(isset($_GET['c_e_id'])){

	$c_e_id = trim($_GET['c_e_id']);
	$current_user_id = trim($_GET['current_user_id']);
	$c_e_hide = trim($_GET['c_e_hide']);
	
	$hidden = ClientEmail::hide_c_e_template_info($c_e_id, $current_user_id, $c_e_hide);
	
	//Verifying if information is hidden
	if($hidden){
		$session->message("<span class='boldCreamColor'>Client Emails Template Info</span> <span class='bold'> Successfully HIDDEN.</span>");
		redirect_to("user.php");
	} else{
		$session->message("<span class='bold'>Failed</span> <span class='boldCreamColor'> to</span> <span class='bold'> HIDE</span> <span class='boldCreamColor'> Client Emails Template Info.</span>");
		redirect_to("user.php");
	}
}





//********** Hide p_lp Template Info **************
if(isset($_GET['p_lp_id'])){

	$p_lp_id = trim($_GET['p_lp_id']);
	$current_user_id = trim($_GET['current_user_id']);
	$p_lp_hide = trim($_GET['p_lp_hide']);
	
	$hidden = PlumLP::hide_p_lp_template_info($p_lp_id, $current_user_id, $p_lp_hide);
	
	//Verifying if information is hidden
	if($hidden){
		$session->message("<span class='boldCreamColor'>Plum Landing Pages Template Info</span> <span class='bold'> Successfully HIDDEN.</span>");
		redirect_to("user.php");
	} else{
		$session->message("<span class='bold'>Failed</span> <span class='boldCreamColor'> to</span> <span class='bold'> HIDE</span> <span class='boldCreamColor'> Plum Landing Pages Template Info.</span>");
		redirect_to("user.php");
	}
}





//********** Hide c_lp Template Info **************
if(isset($_GET['c_lp_id'])){

	$c_lp_id = trim($_GET['c_lp_id']);
	$current_user_id = trim($_GET['current_user_id']);
	$c_lp_hide = trim($_GET['c_lp_hide']);
	
	$hidden = ClientLp::hide_c_lp_template_info($c_lp_id, $current_user_id, $c_lp_hide);
	
	//Verifying if information is hidden
	if($hidden){
		$session->message("<span class='boldCreamColor'>Client Landing Pages Template Info</span> <span class='bold'> Successfully HIDDEN.</span>");
		redirect_to("user.php");
	} else{
		$session->message("<span class='bold'>Failed</span> <span class='boldCreamColor'> to</span> <span class='bold'> HIDE</span> <span class='boldCreamColor'> Client Landing Pages Template Info.</span>");
		redirect_to("user.php");
	}
}




//**************Plum Email Form Submittion***************
if(isset($_POST['upload_template_form'])){
	
	$template = new Template();
	
	if($_POST['template_type']){	
		$template->type = trim($_POST['template_type']);}
		
	if($_POST['website_url']){	
		$template->website_url = trim($_POST['website_url']);}
		
	if($_POST['template_image_path']){	
		$template->url_path = trim($_POST['template_image_path']);}
		
	
	$sucess_upload = $template->upload_template();
	
	//Verifying if information is updated
	if($sucess_upload){
		$session->message("<span class='bold'> Successfully UPLOADED </span><span class='boldCreamColor'> template to PLUMDM/HELP.</span>");
		redirect_to("user.php");
	} else{
		$session->message("<span class='bold'>Failed</span> <span class='boldCreamColor'> to</span> <span class='bold'> UPLOAD</span> <span class='boldCreamColor'> template to PLUMDM/HELP</span>");
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
<div id="container"><!-- *********************************** START CONTAINER*********************************** -->

<a id="user_info_templates_TOP"></a><!--Scroll Top User Info Template-->

<nav id="firstNav">
	<div id="firstNavTriangle"></div>
    <div id="firstNavUserImage"><img height="100" src="../site_images/default_user.png"></div>
    <h1>Admin Settings</h1>
    <div id="firstNavLinks">
        <a href="#user_info_templates_TOP" class="scroller-link"><div class="transition" id="allPlumEmailLink">All Plum Emails</div></a>
        <a href="#user_info_templates_TOP" class="scroller-link"><div class="transition" id="allClientEmailLink">All Client Emails</div></a>
        <a href="#user_info_templates_TOP" class="scroller-link"><div class="transition" id="allPlumLPLink">All Plum Landing Pages</div></a>
        <a href="#user_info_templates_TOP" class="scroller-link"><div class="transition" id="allClientLPLink">All Client Landing Pages</div></a>
    </div>
</nav>


<nav class="rightShadow" id="secondNav">
<div class="transition" id="userImage"><a href="user.php"><img height="100" src="<?php if($current_user->user_dp_url !== NULL){echo $current_user->user_dp_url;} else{ echo "../site_images/default_user.png";} ?>"></a></div>
<h1 class="textShadow"><a href="user.php">Plum Direct Marketing</a></h1>
<div id="secondNavIcons">
    <a href="edit_templates.php" target="_blank" title="Edit Templates"><img class="transition1" height="30" src="../site_images/settings.png"></a>
    <a class="md-trigger" data-modal="upload_template_modal" title="Upload Template"><img class="transition1" height="30"src="../site_images/upload.png"></a>
    <a title="Logout" href="user.php?logout=true"><img class="transition1" height="30" src="../site_images/logout.png"></a>
</div>


<div id="secondNavLinks">
    <a href="#user_info_templates_TOP" class="scroller-link"><div class="transition" id="plumEmailLink">Plum Emails</div></a>
    <a href="#user_info_templates_TOP" class="scroller-link"><div class="transition" id="clientEmailLink">Client Emails</div></a>
    <a href="#user_info_templates_TOP" class="scroller-link"><div class="transition" id="plumLPLink">Plum Landing Pages</div></a>
    <a href="#user_info_templates_TOP" class="scroller-link"><div class="transition" id="clientLPLink">Client Landing Pages</div></a>
</div>

<div id="love">
	<h4>Made with  <span id="loveIcon"><img height="15px;" src="../site_images/love.png"></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; at Plum.</h4>
    <h3>-Surya</h3>
</div>
</nav>




<div class="bottomShadow" id="userNameContainer">
<img height="30" src="../site_images/user.png">
<h1><?php echo $current_user->first_name." ".$current_user->last_name; ?></h1>
</div>

<section id="allUserInfoTemplatesContainer"><!--********************** Main Templates Info Container ***********************************--> 



<div id="startGlobalPEContainer"><!--Start of All PE & USER PE CONTAINER -->

<section id="all_user_p_e"><!--***** Admin View Plum Emails ******--> 

<div id="all_p_e_search_container">
	<div id="all_p_e_select">
	<select id="search_input_all_p_e_user_id" name="search_input_all_p_e_user_id" >
		<?php foreach($sales_reps as $sales_rep): ?>
    	<?php if($sales_rep->id == 1){ continue; } ?>
    	<option value="<?php echo $sales_rep->id; ?>"><?php echo $sales_rep->first_name." ".$sales_rep->last_name; ?></option>
    	<?php endforeach; ?>
    </select>
    </div>
    <!--<input id="search_input_all_p_e_user_hidden" name="search_input_all_p_e_user_hidden" type="checkbox" />-->
    <div id="all_p_e_search">
    <a href="#user_info_templates_TOP" class="scroller-link"><input type="search" name="search_input_all_p_e" id="search_input_all_p_e" placeholder="search..."></a>
    </div>
	<div class="loader" id="loader_all_p_e"></div><!--LOADER-->
	<div id="all_p_e_check" class="slideCheckBox">	
    	<p class="all_p_e_check_text">Hidden</p>
		<input type="checkbox" value="None" id="p_e_checkbox" name="search_input_all_p_e_user_hidden" onChange="search_all_p_e();" />
		<label for="p_e_checkbox"></label>
	</div>
</div>

<div id="search_all_results_p_e">
</div>

</section>



<section id="user_p_e">

<div id="p_e_search_container">
<a href="#user_info_templates_TOP" class="scroller-link"><input type="search" name="search_input_p_e" id="search_input_p_e" placeholder="search..."></a>
<div class="loader" id="loader_p_e"></div><!--LOADER-->
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
				<?php echo $plum_email->client_name."***".$plum_email->leads."***".$plum_email->website_url."***".$plum_email->email_list."***".$plum_email->notes."***".$plum_email->page_complete."***".$plum_email->send_date."***".$plum_email->id."***".$plum_email->salesrep_id; ?>
                "><img alt="Edit" class="allShadow transition1 edit_template_info" height="30" src="../site_images/edit.png"></button></a>
                
               <a href="user.php?p_e_id=<?php echo $plum_email->id ; ?>&current_user_id=<?php echo $plum_email->salesrep_id; ?>&p_e_hide=<?php if($plum_email->hidden == 1){echo 0;}else if($plum_email->hidden == 0){echo 1;} ?>" title="Hide" id="p_e_hide"><img alt="Hide" class="allShadow transition1 hide_template_info" height="30" src="../site_images/hide.png"></a> 
                
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



</section>


    																<!--Start PLUM EMAIL EDIT MODAL CONTENT -->  
      
      <div class="md-modal md-effect-1" id="p_e_modal">
		<div id="p_lp_modal_popup" class="md-content"></br>
      		<h2>Edit Info</h2>
				<form id="p_e_form">
				  <div class="emailLeadsField">
                    <p><label>#Leads</label><input id="p_e_leads" name="p_e_leads" type="text" /></p>
                  </div>
                  <p><label>Client Name</label><input id="p_e_client_name" name="p_e_client_name" type="text" /></p>
                  <p><label>URL</label><input id="p_e_website_url" name="p_e_website_url" type="text" /></p>
                  <p><label>Email List</label><input name="p_e_email_list" id="p_e_email_list" type="text" /></p>
                  <p><label>Send Date</label><input name="p_e_send_date" id="p_e_send_date" type="text" /></p>
                  <p><label>Notes</label><textarea name="p_e_notes" id="p_e_notes"  cols="40" rows="4" ></textarea></p>
                  <p><label style="float:left;">Page Complete</label><input id="p_e_page_complete" name="p_e_page_complete" style="float:left; margin-top:10px; margin-left:6px;" type="checkbox" /></p>
                  <p style=" position:relative;"><input id="p_e_update_developer" name="p_e_update_developer" style="float:right; margin-top:10px; margin-left:5px;" type="checkbox" /><label style="float:right; color:#EB7572;">Update Developer</label></p>
                  <input type="hidden" id="p_e_id" type="text" name="p_e_id" value="" />
                  <input type="hidden" id="p_e_salesrep_id" type="text" name="p_e_salesrep_id" value="" />
                  
                  <button id="p_e_submit" class="md-close" name="p_e_submit" type="submit">Submit</button></br>  
                </form>
      	</div>
      </div><!--END PLUM LP EDIT MODAL CONTENT --> 

<div id="p_e_overlay" class="md-overlay4"></div><!-- the overlay element -->
</div><!--End of All PE & USER PE CONTAINER -->







<div id="globalCEContainer"><!--Start of All CE & USER CE CONTAINER -->


<section id="all_user_c_e"><!--***** Admin View Client Emails ******--> 

<div id="all_c_e_search_container">
	<div id="all_c_e_select">
	<select id="search_input_all_c_e_user_id" name="search_input_all_c_e_user_id" >
		<?php foreach($sales_reps as $sales_rep): ?>
    	<?php if($sales_rep->id == 1){ continue; } ?>
    	<option value="<?php echo $sales_rep->id; ?>"><?php echo $sales_rep->first_name." ".$sales_rep->last_name; ?></option>
    	<?php endforeach; ?>
    </select>
    </div>
    <!--<input id="search_input_all_p_e_user_hidden" name="search_input_all_p_e_user_hidden" type="checkbox" />-->
    <div id="all_c_e_search">
    <a href="#user_info_templates_TOP" class="scroller-link"><input type="search" name="search_input_all_c_e" id="search_input_all_c_e" placeholder="search..."></a>
    </div>
	<div class="loader" id="loader_all_c_e"></div><!--LOADER-->
	<div id="all_p_e_check" class="slideCheckBox">	
    	<p class="all_p_e_check_text">Hidden</p>
		<input type="checkbox" value="None" id="c_e_checkbox" name="search_input_all_c_e_user_hidden" onChange="search_all_c_e();" />
		<label for="c_e_checkbox"></label>
	</div>
</div>

<div id="search_all_results_c_e">
</div>

</section>



<section id="user_c_e">

<div id="c_e_search_container">
<a href="#user_info_templates_TOP" class="scroller-link"><input type="search" name="search_input_c_e" id="search_input_c_e" placeholder="search..."></a>
<div class="loader" id="loader_c_e"></div><!--LOADER-->
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
				<?php echo $client_email->client_name."***".$client_email->leads."***".$client_email->website_url."***".$client_email->email_list."***".$client_email->notes."***".$client_email->page_complete."***".$client_email->send_date."***".$client_email->id."***".$client_email->salesrep_id; ?>
                "><img alt="Edit" class="allShadow transition1 edit_template_info" height="30" src="../site_images/edit.png"></button></a>
                
                <a href="user.php?c_e_id=<?php echo $client_email->id ; ?>&current_user_id=<?php echo $client_email->salesrep_id; ?>&c_e_hide=<?php if($client_email->hidden == 1){echo 0;}else if($client_email->hidden == 0){echo 1;} ?>" title="Hide" id="c_e_hide"><img alt="Hide" class="allShadow transition1 hide_template_info" height="30" src="../site_images/hide.png"></a>
                
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

</section>


    																<!--Start CLIENT EMAIL EDIT MODAL CONTENT -->  
      
      <div class="md-modal md-effect-1" id="c_e_modal">
		<div id="p_lp_modal_popup" class="md-content"></br>
      		<h2>Edit Info</h2>
            
            <form id="c_e_form">
				  <div class="emailLeadsField">
                    <p><label>#Leads</label><input id="c_e_leads" name="c_e_leads" type="text" /></p>
                  </div>
                  <p><label>Client Name</label><input id="c_e_client_name" name="c_e_client_name" type="text" /></p>
                  <p><label>URL</label><input id="c_e_website_url" name="c_e_website_url" type="text" /></p>
                  <p><label>Email List</label><input name="c_e_email_list" id="c_e_email_list" type="text" /></p>
                  <p><label>Send Date</label><input name="c_e_send_date" id="c_e_send_date" type="text" /></p>
                  <p><label>Notes</label><textarea name="c_e_notes" id="c_e_notes"  cols="40" rows="4" ></textarea></p>
                  <p><label style="float:left;">Page Complete</label><input id="c_e_page_complete" name="c_e_page_complete" style="float:left; margin-top:10px; margin-left:6px;" type="checkbox" /></p>
                  <p style=" position:relative;"><input id="c_e_update_developer" name="c_e_update_developer" style="float:right; margin-top:10px; margin-left:5px;" type="checkbox" /><label style="float:right; color:#EB7572;">Update Developer</label></p>
                  <input type="hidden" id="c_e_id" type="text" name="c_e_id" value="" />
                  <input type="hidden" id="c_e_salesrep_id" type="text" name="c_e_salesrep_id" value="" />
                  
                  <button id="c_e_submit" class="md-close" name="c_e_submit" type="submit">Submit</button></br>  
                 </form>
                
      	</div>
      </div><!--END PLUM LP EDIT MODAL CONTENT --> 

<div id="c_e_overlay" class="md-overlay3"></div><!-- the overlay element -->
</div><!--End of All CE & USER CE CONTAINER -->





<div id="globalPLPContainer"><!--Start of All PLP & USER PLP CONTAINER -->


<section id="all_user_p_lp"><!--***** Admin View Plum Landing Pages ******--> 

<div id="all_p_lp_search_container">
	<div id="all_p_lp_select">
	<select id="search_input_all_p_lp_user_id" name="search_input_all_p_lp_user_id" >
		<?php foreach($sales_reps as $sales_rep): ?>
    	<?php if($sales_rep->id == 1){ continue; } ?>
    	<option value="<?php echo $sales_rep->id; ?>"><?php echo $sales_rep->first_name." ".$sales_rep->last_name; ?></option>
    	<?php endforeach; ?>
    </select>
    </div>
    <!--<input id="search_input_all_p_e_user_hidden" name="search_input_all_p_e_user_hidden" type="checkbox" />-->
    <div id="all_p_lp_search">
    <a href="#user_info_templates_TOP" class="scroller-link"><input type="search" name="search_input_all_p_lp" id="search_input_all_p_lp" placeholder="search..."></a>
    </div>
	<div class="loader" id="loader_all_p_lp"></div><!--LOADER-->
	<div id="all_p_e_check" class="slideCheckBox">	
    	<p class="all_p_e_check_text">Hidden</p>
		<input type="checkbox" value="None" id="p_lp_checkbox" name="search_input_all_p_lp_user_hidden" onChange="search_all_p_lp();" />
		<label for="p_lp_checkbox"></label>
	</div>
</div>

<div id="search_all_results_p_lp">
</div>

</section>


<section id="user_p_lp">

<div id="p_lp_search_container">
<a href="#user_info_templates_TOP" class="scroller-link"><input type="search" name="search_input_p_lp" id="search_input_p_lp" placeholder="search..."></a>
<div class="loader" id="loader_p_lp"></div><!--LOADER-->
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
				<?php echo $plum_lp->client_name."***".$plum_lp->email."***".$plum_lp->city."***".$plum_lp->state."***".$plum_lp->zip_code."***".$plum_lp->google_ad."***".$plum_lp->google_ad_setup."***".$plum_lp->website_url."***".$plum_lp->start_date."***".$plum_lp->expire_date."***".$plum_lp->notes."***".$plum_lp->page_complete."***".$plum_lp->renewing_page."***".$plum_lp->leads."***".$plum_lp->id."***".$plum_lp->salesrep_id; ?>
                "><img alt="Edit" class="allShadow transition1 edit_template_info" height="30" src="../site_images/edit.png"></button></a>
                
                <a href="user.php?p_lp_id=<?php echo $plum_lp->id ; ?>&current_user_id=<?php echo $plum_lp->salesrep_id; ?>&p_lp_hide=<?php if($plum_lp->hidden == 1){echo 0;}else if($plum_lp->hidden == 0){echo 1;} ?>" title="Hide" id="p_lp_hide"><img alt="Hide" class="allShadow transition1 hide_template_info" height="30" src="../site_images/hide.png"></a>
                
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
	
</section><!--END "user_p_lp" SECTION --> 


    																<!--Start PLUM LP EDIT MODAL CONTENT -->  
      
      <div class="md-modal md-effect-1" id="p_lp_modal">
		<div id="p_lp_modal_popup" class="md-content1"></br>
      		<h2>Edit Info</h2>
				<form id="p_lp_form">
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
                  <input type="hidden" id="p_lp_salesrep_id" type="text" name="p_lp_salesrep_id" value="" />
                  </div>
                  <p style=" position:relative; right:70px; top:60px;"><label style="float:right; color:#EB7572;">Update Developer</label><input id="p_lp_update_developer" name="p_lp_update_developer" style="float:right; margin-top:10px; margin-left:6px;" type="checkbox" /></p>
                  
                  <button id="p_lp_submit" class="md-close" name="p_lp_submit" type="submit">Submit</button></br>
                </form>
      	</div>
      </div><!--END PLUM LP EDIT MODAL CONTENT --> 

<div id="p_lp_overlay" class="md-overlay2"></div><!-- the overlay element -->
</div><!--End of All PLP & USER PLP CONTAINER -->






<div id="startGlobalCLPContainer"><!--Start of All CLP & USER CLP CONTAINER -->


<section id="all_user_c_lp"><!--***** Admin View Client Landing Pages ******--> 

<div id="all_c_lp_search_container">
	<div id="all_c_lp_select">
	<select id="search_input_all_c_lp_user_id" name="search_input_all_c_lp_user_id" >
		<?php foreach($sales_reps as $sales_rep): ?>
    	<?php if($sales_rep->id == 1){ continue; } ?>
    	<option value="<?php echo $sales_rep->id; ?>"><?php echo $sales_rep->first_name." ".$sales_rep->last_name; ?></option>
    	<?php endforeach; ?>
    </select>
    </div>
    <!--<input id="search_input_all_p_e_user_hidden" name="search_input_all_p_e_user_hidden" type="checkbox" />-->
    <div id="all_c_lp_search">
    <a href="#user_info_templates_TOP" class="scroller-link"><input type="search" name="search_input_all_c_lp" id="search_input_all_c_lp" placeholder="search..."></a>
    </div>
	<div class="loader" id="loader_all_c_lp"></div><!--LOADER-->
	<div id="all_p_e_check" class="slideCheckBox">	
    	<p class="all_p_e_check_text">Hidden</p>
		<input type="checkbox" value="None" id="c_lp_checkbox" name="search_input_all_c_lp_user_hidden" onChange="search_all_c_lp();" />
		<label for="c_lp_checkbox"></label>
	</div>
</div>

<div id="search_all_results_c_lp">
</div>

</section>


<section id="user_c_lp">

<div id="c_lp_search_container">
<a href="#user_info_templates_TOP" class="scroller-link"><input type="search" name="search_input_c_lp" id="search_input_c_lp" placeholder="search..."></a>
<div class="loader" id="loader_c_lp"></div><!--LOADER-->
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
				<?php echo $client_lp->client_name."***".$client_lp->email."***".$client_lp->city."***".$client_lp->state."***".$client_lp->zip_code."***".$client_lp->google_ad."***".$client_lp->google_ad_setup."***".$client_lp->website_url."***".$client_lp->start_date."***".$client_lp->expire_date."***".$client_lp->notes."***".$client_lp->page_complete."***".$client_lp->renewing_page."***".$client_lp->leads."***".$client_lp->id."***".$client_lp->salesrep_id; ?>              "><img alt="Edit" class="allShadow transition1 edit_template_info" height="30" src="../site_images/edit.png"></button></a>
                
                <a href="user.php?c_lp_id=<?php echo $client_lp->id ; ?>&current_user_id=<?php echo $client_lp->salesrep_id; ?>&c_lp_hide=<?php if($client_lp->hidden == 1){echo 0;}else if($client_lp->hidden == 0){echo 1;} ?>" title="Hide" id="c_lp_hide"><img alt="Hide" class="allShadow transition1 hide_template_info" height="30" src="../site_images/hide.png"></a>
                
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

</section><!--END "user_c_lp" SECTION --> 


    																<!--Start CLIENT LP EDIT MODAL CONTENT -->  
      
      <div class="md-modal md-effect-1" id="c_lp_modal">
		<div id="c_lp_modal_popup" class="md-content1"></br>
      		<h2>Edit Info</h2>
				<form id="c_lp_form">
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
                  <input type="hidden" id="c_lp_salesrep_id" type="text" name="c_lp_salesrep_id" value="" />
                  </div>
                  <p style=" position:relative; right:70px; top:60px;"><label style="float:right; color:#EB7572;">Update Developer</label><input id="c_lp_update_developer" name="c_lp_update_developer" style="float:right; margin-top:10px; margin-left:6px;" type="checkbox" /></p>
                  
                  <button id="c_lp_submit" class="md-close" name="c_lp_submit" type="submit">Submit</button></br>
                </form>
      	</div>
      </div><!--END CLIENT LP EDIT MODAL CONTENT --> 

<div id="c_lp_overlay" class="md-overlay1"></div><!-- the overlay element -->
</div><!--End of All CLP & USER CLP CONTAINER -->


</section> <!--********************************************** END of User Info Templates Container ***************************************-->





</div><!-- ***** END OF CONTAINER***** -->


<!--***************************************** Error Message after submitting form *******************************************-->


<?php  if($session->message): ?>
<div class="md-trigger" data-modal="error_message_modal" id="error_message_div_id"></div>
<?php  endif; ?>

<div class="md-modal md-effect-1" id="error_message_modal">
		<div style="padding:0;" id="error_message_modal_content" class="md-content"></br>
        <div id="error_check_message"><?php echo $session->message; ?></div>
        <div id="error_message_modal_close" class="md-close"><a title="close"><img class="transition1" src="../site_images/close.png" height="30"></a></div>
        </div>
</div>



<div class="md-modal md-effect-1" id="upload_template_modal">
		<div id="upload_template_modal_content" class="md-content"></br>
      		<h2>Upload Template</h2>
            
            <form id="uploadForm" method="post" action="user.php">
            
            	  <p><label>Template Type</label><select name="template_type" id="template_type" required>
                  <option value="p_e">Plum Email</option>
                  <option value="c_e">Client Email</option>
                  <option value="p_lp">Plum Landing Page</option>
                  <option value="c_lp">Client Landing Page</option>
                  </select></p>
                  <p><label>Website URL</label><input id="website_url" value="http://www.sample.com" name="website_url" required type="text" /></p>
                  <p><label>Template Image Path</label><input value="../template_images/lp_images/client_lp/01.png" id="template_image_path" name="template_image_path" required type="text" /></p>
                  
                  <button id="upload_template_form" class="md-close" name="upload_template_form" type="submit">Submit</button></br>  
                 </form>
        
        </div>
</div>

<!-- OPTIONAL START -->
<div class="md-trigger" data-modal="error_message_modal1" id="error_message_div_id1"></div>

<div class="md-modal md-effect-1" id="error_message_modal1">
		<div style="padding:0;" id="error_message_modal_content" class="md-content"></br>
        <div id="error_check_message"><span class='bold'>Successfully UPDATED</span> <span class='boldCreamColor'> information to Client Emails.</span></div>
        <div id="error_message_modal_close" class="md-close"><a title="close"><img class="transition1" src="../site_images/close.png" height="30"></a></div>
        </div>
</div>
<!-- OPTIONAL END -->

<div class="md-overlay"></div><!-- the overlay element -->


<script type="text/javascript">
$(function(){
    //*********************************************************************Scroll to link 
    $('.scroller-link').click(function(e){
        e.preventDefault(); //Don't automatically jump to the link
        id = $(this).attr('href').replace('#', ''); //Extract the id of the element to jump to
        $('html,body').animate({scrollTop: $("#"+id).offset().top-$(this).closest('ul').height()},'normal');
    });
});

$(".content").mCustomScrollbar({
    theme:"dark",
	scrollbarPosition:"outside"
});

$(".horizontal_scroll").mCustomScrollbar({
    axis:"x",
	theme:"dark",
	autoExpandScrollbar:true,
	advanced:{autoExpandHorizontalScroll:true},
	scrollButtons:{enable:true}
});

//**************************************************************Error Message Modal Popup Function
$(document).ready(function() {
        // trigger the click event
        $('#error_message_div_id').click();
});

//**************************************************************Form Reset Funcationality
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

//********************************************************On Click Submit Button Loader
//$( "#p_e_submit" ).click(function() {
//	$("#loader_all_p_e").fadeIn();
//	$("#loader_p_e").fadeIn();
//});
//$( "#c_e_submit" ).click(function() {
//	$("#loader_all_p_e").fadeIn();
//	$("#loader_p_e").fadeIn();
//});
//$( "#p_lp_submit" ).click(function() {
//	$("#loader_all_p_e").fadeIn();
//	$("#loader_p_e").fadeIn();
//});
//$( "#c_lp_submit" ).click(function() {
//	$("#loader_all_p_e").fadeIn();
//	$("#loader_p_e").fadeIn();
//});


//*********************************************************On Click Hide Button Loader
$( "#p_e_hide" ).click(function() {
	$("#loader_all_p_e").fadeIn();
	$("#loader_p_e").fadeIn();
});
$( "#c_e_hide" ).click(function() {
	$("#loader_all_p_e").fadeIn();
	$("#loader_p_e").fadeIn();
});
$( "#p_lp_hide" ).click(function() {
	$("#loader_all_p_e").fadeIn();
	$("#loader_p_e").fadeIn();
});
$( "#c_lp_hide" ).click(function() {
	$("#loader_all_p_e").fadeIn();
	$("#loader_p_e").fadeIn();
});

//***************************************************************Enter on Search
//All Enter on Search
$(document).ready(function() {
    $('#search_input_all_p_e').keydown(function(event) {
        if (event.keyCode == 13) {
			 search_all_p_e();
         }
    });
});

$(document).ready(function() {
    $('#search_input_all_c_e').keydown(function(event) {
        if (event.keyCode == 13) {
			 search_all_c_e();
         }
    });
});

$(document).ready(function() {
    $('#search_input_all_p_lp').keydown(function(event) {
        if (event.keyCode == 13) {
			 search_all_p_lp();
         }
    });
});

$(document).ready(function() {
    $('#search_input_all_c_lp').keydown(function(event) {
        if (event.keyCode == 13) {
			 search_all_c_lp();
         }
    });
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




//*********************************************************Reload Function
$('#p_e_form').submit(function(event) {
    event.preventDefault();

		var p_e_client_name = $("#p_e_client_name").val();
		var p_e_leads = $("#p_e_leads").val();
		var p_e_website_url = $("#p_e_website_url").val();
		var p_e_email_list = $("#p_e_email_list").val();
		var p_e_notes = $("#p_e_notes").val();
		var p_e_page_complete = p_e_page_complete();
		function p_e_page_complete(){if($("#p_e_page_complete").is(':checked')){ return 1;} else{ return 0;}};
		var p_e_send_date = $("#p_e_send_date").val();
		var p_e_id = $("#p_e_id").val();
		var p_e_salesrep_id = $("#p_e_salesrep_id").val();
		var p_e_submit = 1;
		var p_e_update_developer = p_e_update_developer();
		function p_e_update_developer(){if($("#p_e_update_developer").is(':checked')){ return 1;} else{ return 0;}};
	
	$.post('reload.php', {p_e_client_name:p_e_client_name ,p_e_leads:p_e_leads ,p_e_website_url:p_e_website_url ,p_e_email_list:p_e_email_list ,p_e_notes:p_e_notes ,p_e_page_complete:p_e_page_complete ,p_e_send_date:p_e_send_date ,p_e_id:p_e_id ,p_e_salesrep_id: p_e_salesrep_id, p_e_submit: p_e_submit, p_e_update_developer: p_e_update_developer});

	search_all_p_e();
	search_p_e();
	
	$(document).ready(function() {
		$( "#p_e_overlay" ).click();
        //$('#error_message_div_id1').click();
	});
	
});


$('#c_e_form').submit(function(event) {
    event.preventDefault();

		var c_e_client_name = $("#c_e_client_name").val();
		var c_e_leads = $("#c_e_leads").val();
		var c_e_website_url = $("#c_e_website_url").val();
		var c_e_email_list = $("#c_e_email_list").val();
		var c_e_notes = $("#c_e_notes").val();
		var c_e_page_complete = c_e_page_complete();
		function c_e_page_complete(){if($("#c_e_page_complete").is(':checked')){ return 1;} else{ return 0;}};
		var c_e_send_date = $("#c_e_send_date").val();
		var c_e_id = $("#c_e_id").val();
		var c_e_salesrep_id = $("#c_e_salesrep_id").val();
		var c_e_submit = 2;
		var c_e_update_developer = c_e_update_developer();
		function c_e_update_developer(){if($("#c_e_update_developer").is(':checked')){ return 1;} else{ return 0;}};
	
	$.post('reload.php', {c_e_client_name:c_e_client_name ,c_e_leads:c_e_leads ,c_e_website_url:c_e_website_url ,c_e_email_list:c_e_email_list ,c_e_notes:c_e_notes ,c_e_page_complete:c_e_page_complete ,c_e_send_date:c_e_send_date ,c_e_id:c_e_id ,c_e_salesrep_id: c_e_salesrep_id, c_e_submit: c_e_submit, c_e_update_developer: c_e_update_developer});

	search_all_c_e();
	search_c_e();
	
	$(document).ready(function() {
		$( "#c_e_overlay" ).click();
        $('#error_message_div_id').click();
	});
	
});


$('#p_lp_form').submit(function(event) {
    event.preventDefault();

		var p_lp_client_name = $("#p_lp_client_name").val();
		var p_lp_email = $("#p_lp_email").val();
		var p_lp_city = $("#p_lp_city").val();
		var p_lp_state = $("#p_lp_state").val();
		var p_lp_zip_code = $("#p_lp_zip_code").val();
		var p_lp_website_url = $("#p_lp_website_url").val();
		var p_lp_start_date = $("#p_lp_start_date").val();
		var p_lp_expire_date = $("#p_lp_expire_date").val();
		var p_lp_notes = $("#p_lp_notes").val();
		var p_lp_leads = $("#p_lp_leads").val();
		var p_lp_google_ad = p_lp_google_ad();
		function p_lp_google_ad(){if($("#p_lp_google_ad").is(':checked')){ return 1;} else{ return 0;}};
		var p_lp_google_ad_setup = p_lp_google_ad_setup();
		function p_lp_google_ad_setup(){if($("#p_lp_google_ad_setup").is(':checked')){ return 1;} else{ return 0;}};
		var p_lp_page_complete = p_lp_page_complete();
		function p_lp_page_complete(){if($("#p_lp_page_complete").is(':checked')){ return 1;} else{ return 0;}};
		var p_lp_renewing_page = p_lp_renewing_page();
		function p_lp_renewing_page(){if($("#p_lp_renewing_page").is(':checked')){ return 1;} else{ return 0;}};
		var p_lp_id = $("#p_lp_id").val();
		var p_lp_salesrep_id = $("#p_lp_salesrep_id").val();
		var p_lp_submit = 3;
		var p_lp_update_developer = p_lp_update_developer();
		function p_lp_update_developer(){if($("#p_lp_update_developer").is(':checked')){ return 1;} else{ return 0;}};
	
	$.post('reload.php', {p_lp_client_name:p_lp_client_name, p_lp_email:p_lp_email, p_lp_city:p_lp_city, p_lp_state:p_lp_state, p_lp_zip_code:p_lp_zip_code, p_lp_website_url:p_lp_website_url, p_lp_start_date:p_lp_start_date, p_lp_expire_date:p_lp_expire_date, p_lp_notes:p_lp_notes, p_lp_leads:p_lp_leads, p_lp_google_ad:p_lp_google_ad, p_lp_google_ad_setup:p_lp_google_ad_setup, p_lp_page_complete:p_lp_page_complete, p_lp_renewing_page:p_lp_renewing_page, p_lp_id:p_lp_id, p_lp_salesrep_id:p_lp_salesrep_id, p_lp_submit:p_lp_submit, p_lp_update_developer:p_lp_update_developer});

	search_all_p_lp();
	search_p_lp();
	
	$(document).ready(function() {
		$( "#p_lp_overlay" ).click();
        $('#error_message_div_id').click();
	});
	
});


$('#c_lp_form').submit(function(event) {
    event.preventDefault();

		var c_lp_client_name = $("#c_lp_client_name").val();
		var c_lp_email = $("#c_lp_email").val();
		var c_lp_city = $("#c_lp_city").val();
		var c_lp_state = $("#c_lp_state").val();
		var c_lp_zip_code = $("#c_lp_zip_code").val();
		var c_lp_website_url = $("#c_lp_website_url").val();
		var c_lp_start_date = $("#c_lp_start_date").val();
		var c_lp_expire_date = $("#c_lp_expire_date").val();
		var c_lp_notes = $("#c_lp_notes").val();
		var c_lp_leads = $("#c_lp_leads").val();
		var c_lp_google_ad = c_lp_google_ad();
		function c_lp_google_ad(){if($("#c_lp_google_ad").is(':checked')){ return 1;} else{ return 0;}};
		var c_lp_google_ad_setup = c_lp_google_ad_setup();
		function c_lp_google_ad_setup(){if($("#c_lp_google_ad_setup").is(':checked')){ return 1;} else{ return 0;}};
		var c_lp_page_complete = c_lp_page_complete();
		function c_lp_page_complete(){if($("#c_lp_page_complete").is(':checked')){ return 1;} else{ return 0;}};
		var c_lp_renewing_page = c_lp_renewing_page();
		function c_lp_renewing_page(){if($("#c_lp_renewing_page").is(':checked')){ return 1;} else{ return 0;}};
		var c_lp_id = $("#c_lp_id").val();
		var c_lp_salesrep_id = $("#c_lp_salesrep_id").val();
		var c_lp_submit = 4;
		var c_lp_update_developer = c_lp_update_developer();
		function c_lp_update_developer(){if($("#c_lp_update_developer").is(':checked')){ return 1;} else{ return 0;}};
	
	$.post('reload.php', {c_lp_client_name:c_lp_client_name, c_lp_email:c_lp_email, c_lp_city:c_lp_city, c_lp_state:c_lp_state, c_lp_zip_code:c_lp_zip_code, c_lp_website_url:c_lp_website_url, c_lp_start_date:c_lp_start_date, c_lp_expire_date:c_lp_expire_date, c_lp_notes:c_lp_notes, c_lp_leads:c_lp_leads, c_lp_google_ad:c_lp_google_ad, c_lp_google_ad_setup:c_lp_google_ad_setup, c_lp_page_complete:c_lp_page_complete, c_lp_renewing_page:c_lp_renewing_page, c_lp_id:c_lp_id, c_lp_salesrep_id:c_lp_salesrep_id, c_lp_submit:c_lp_submit, c_lp_update_developer:c_lp_update_developer});

	search_all_c_lp();
	search_c_lp();
	
	$(document).ready(function() {
		$( "#c_lp_overlay" ).click();
        $('#error_message_div_id').click();
	});
	
});



//*********************************************************Search Function
//All Search Function
function search_all_p_e(){
	$("#loader_all_p_e").fadeIn(function(){
	$.post('search_all_p_e.php', { search_input_all_p_e: document.getElementById("search_input_all_p_e").value,
									search_input_all_p_e_user_id: document.getElementById("search_input_all_p_e_user_id").value,
									search_input_all_p_e_user_hidden: function(){
										if(document.getElementById("p_e_checkbox").checked == true){return 1;}else{ return 0; }
									}},
		function(output) {
			$('#search_all_results_p_e').html(output).show();
		});
	});
	$("#loader_all_p_e").fadeOut(500);
}

function search_all_c_e(){
	$("#loader_all_c_e").fadeIn(function(){
	$.post('search_all_c_e.php', { search_input_all_c_e: document.getElementById("search_input_all_c_e").value,
									search_input_all_c_e_user_id: document.getElementById("search_input_all_c_e_user_id").value,
									search_input_all_c_e_user_hidden: function(){
										if(document.getElementById("c_e_checkbox").checked == true){return 1;}else{ return 0; }
									}},
		function(output) {
			$('#search_all_results_c_e').html(output).show();
		});
	});
	$("#loader_all_c_e").fadeOut(500);
}

function search_all_p_lp(){
	$("#loader_all_p_lp").fadeIn(function(){
	$.post('search_all_p_lp.php', { search_input_all_p_lp: document.getElementById("search_input_all_p_lp").value,
									search_input_all_p_lp_user_id: document.getElementById("search_input_all_p_lp_user_id").value,
									search_input_all_p_lp_user_hidden: function(){
										if(document.getElementById("p_lp_checkbox").checked == true){return 1;}else{ return 0; }
									}},
		function(output) {
			$('#search_all_results_p_lp').html(output).show();
		});
	});
	$("#loader_all_p_lp").fadeOut(500);
}

function search_all_c_lp(){
	$("#loader_all_c_lp").fadeIn(function(){
	$.post('search_all_c_lp.php', { search_input_all_c_lp: document.getElementById("search_input_all_c_lp").value,
									search_input_all_c_lp_user_id: document.getElementById("search_input_all_c_lp_user_id").value,
									search_input_all_c_lp_user_hidden: function(){
										if(document.getElementById("c_lp_checkbox").checked == true){return 1;}else{ return 0; }
									}},
		function(output) {
			$('#search_all_results_c_lp').html(output).show();
		});
	});
	$("#loader_all_c_lp").fadeOut(500);
}



//Search Function
function search_p_e(){
	$("#loader_p_e").fadeIn(function(){
	$.post('search_p_e.php', { search_input_p_e: document.getElementById("search_input_p_e").value },
		function(output) {
			$('#search_results_p_e').html(output).show();
		});
	});
	$("#loader_p_e").fadeOut(500);
}

function search_c_e(){
	$("#loader_c_e").fadeIn(function(){
	$.post('search_c_e.php', { search_input_c_e: document.getElementById("search_input_c_e").value },
		function(output) {
			$('#search_results_c_e').html(output).show();
		});
	});
	$("#loader_c_e").fadeOut(500);
}

function search_p_lp(){
	$("#loader_p_lp").fadeIn(function(){
	$.post('search_p_lp.php', { search_input_p_lp: document.getElementById("search_input_p_lp").value },
		function(output) {
			$('#search_results_p_lp').html(output).show();
		});
	});
	$("#loader_p_lp").fadeOut(500);
}

function search_c_lp(){
	$("#loader_c_lp").fadeIn(function(){
	$.post('search_c_lp.php', { search_input_c_lp: document.getElementById("search_input_c_lp").value },
		function(output) {
			$('#search_results_c_lp').html(output).show();
		});
	});
	$("#loader_c_lp").fadeOut(500);
}


//*********************************************************Prepopulated Forms
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
		
		$("#p_e_salesrep_id")
		.attr("value",button_values[8]);
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
		
		$("#c_e_salesrep_id")
		.attr("value",button_values[8]);
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
		
		$("#p_lp_salesrep_id")
		.attr("value",button_values[15]);
		
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
		
		$("#c_lp_salesrep_id")
		.attr("value",button_values[15]);
}

//*********************************************SELECT BOX JAVASCRIPT FUNCTION
$('select').each(function(){
    var $this = $(this), numberOfOptions = $(this).children('option').length;
  
    $this.addClass('select-hidden'); 
    $this.wrap('<div class="select"></div>');
    $this.after('<div class="select-styled"></div>');

    var $styledSelect = $this.next('div.select-styled');
    $styledSelect.text($this.children('option').eq(0).text());
  
    var $list = $('<ul />', {
        'class': 'select-options'
    }).insertAfter($styledSelect);
  
    for (var i = 0; i < numberOfOptions; i++) {
        $('<li />', {
            text: $this.children('option').eq(i).text(),
            rel: $this.children('option').eq(i).val()
        }).appendTo($list);
    }
  
    var $listItems = $list.children('li');
  
    $styledSelect.click(function(e) {
        e.stopPropagation();
        $('div.select-styled.active').each(function(){
            $(this).removeClass('active').next('ul.select-options').hide();
        });
        $(this).toggleClass('active').next('ul.select-options').toggle();
    });
  
    $listItems.click(function(e) {
        e.stopPropagation();
        $styledSelect.text($(this).text()).removeClass('active');
        $this.val($(this).attr('rel'));
        $list.hide();
        //console.log($this.val());
		if(window.all_p_e == 1){
		search_all_p_e();
		}
		if(window.all_c_e == 1){
		search_all_c_e();
		}
		if(window.all_p_lp == 1){
		search_all_p_lp();
		}
		if(window.all_c_lp == 1){
		search_all_c_lp();
		}
		document.getElementById('search_input_all_p_e').value='' ; 
		document.getElementById('search_input_all_c_e').value='' ; 
		document.getElementById('search_input_all_p_lp').value='' ; 
		document.getElementById('search_input_all_c_lp').value='' ; 
    });
  
    $(document).click(function() {
        $styledSelect.removeClass('active');
        $list.hide();
    });

});
</script>





<script type="text/javascript" src="../javascripts/d3.min.js"></script>
<script type="text/javascript" src="../javascripts/plumdm_help_user.js"></script>
<script src="../javascripts/classie.js"></script>
<script src="../javascripts/modalEffects.js"></script>
</body>
</html>
