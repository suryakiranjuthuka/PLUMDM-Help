<?php 

require_once("../../includes/initialize.php");


$templates_p_e = Template::get_all_templates_p_e();
$templates_c_e = Template::get_all_templates_c_e();
$templates_p_lp = Template::get_all_templates_p_lp();
$templates_c_lp = Template::get_all_templates_c_lp();

$sales_reps = SalesRep::get_all_salesrep();


//**************Plum Email Form Submittion***************
if(isset($_POST['p_e_submit'])){
	
	$plum_email = new PlumEmail();
	
	if($_POST['p_e_client_name']){	
		$plum_email->client_name = trim($_POST['p_e_client_name']);}
		
	if($_POST['p_e_sales_rep']){	
		$plum_email->salesrep_id = trim($_POST['p_e_sales_rep']);}
		
	if($_POST['p_e_send_date']){	
		$plum_email->send_date = trim($_POST['p_e_send_date']);}
		
	if($_POST['p_e_email_list']){	
		$plum_email->email_list = trim($_POST['p_e_email_list']);}
		
	if($_POST['p_e_notes']){	
		$plum_email->notes = trim($_POST['p_e_notes']);}
	
	if($_POST['p_e_website_url']){	
		$plum_email->website_url = trim($_POST['p_e_website_url']);}
		
	if($_POST['p_e_url_path']){	
		$plum_email->url_path = trim($_POST['p_e_url_path']);}
	
	
	$sucess_p_e = $plum_email->create_p_e_template_info();
	
	//Verifying if information is updated
	if($sucess_p_e){
		$session->message("Successfully saved information to Plum Emails Template.");
		redirect_to("index.php");
	} else{
		$session->message("Failed to save information to Plum Emails Template.");
		redirect_to("index.php");
	}
}


//**************Client Email Form Submittion***************
if(isset($_POST['c_e_submit'])){
	
	$client_email = new ClientEmail();
	
	if($_POST['c_e_client_name']){	
		$client_email->client_name = trim($_POST['c_e_client_name']);}
		
	if($_POST['c_e_sales_rep']){	
		$client_email->salesrep_id = trim($_POST['c_e_sales_rep']);}
		
	if($_POST['c_e_send_date']){	
		$client_email->send_date = trim($_POST['c_e_send_date']);}
		
	if($_POST['c_e_email_list']){	
		$client_email->email_list = trim($_POST['c_e_email_list']);}
		
	if($_POST['c_e_notes']){	
		$client_email->notes = trim($_POST['c_e_notes']);}
	
	if($_POST['c_e_website_url']){	
		$client_email->website_url = trim($_POST['c_e_website_url']);}
		
	if($_POST['c_e_url_path']){	
		$client_email->url_path = trim($_POST['c_e_url_path']);}
	
	
	$sucess_c_e = $client_email->create_c_e_template_info();
	
	//Verifying if information is updated
	if($sucess_c_e){
		$session->message("Successfully saved information to Client Emails Template.");
		redirect_to("index.php");
	} else{
		$session->message("Failed to save information to Client Emails Template.");
		redirect_to("index.php");
	}
}



//**************Plum Landing Page Form Submittion***************
if(isset($_POST['p_lp_submit'])){
	
	$plum_landing_page = new PlumLP();
	
	if($_POST['p_lp_client_name']){	
		$plum_landing_page->client_name = trim($_POST['p_lp_client_name']);}
		
	if($_POST['p_lp_sales_rep']){	
		$plum_landing_page->salesrep_id = trim($_POST['p_lp_sales_rep']);}
		
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
		
	if($_POST['p_lp_start_date']){	
		$plum_landing_page->start_date = trim($_POST['p_lp_start_date']);}
		
	if($_POST['p_lp_expire_date']){	
		$plum_landing_page->expire_date = trim($_POST['p_lp_expire_date']);}
		
	if($_POST['p_lp_notes']){	
		$plum_landing_page->notes = trim($_POST['p_lp_notes']);}
	
	if($_POST['p_lp_website_url']){	
		$plum_landing_page->website_url = trim($_POST['p_lp_website_url']);}
		
	if($_POST['p_lp_url_path']){	
		$plum_landing_page->url_path = trim($_POST['p_lp_url_path']);}
	
	
	
	
	$sucess_p_lp = $plum_landing_page->create_p_lp_template_info();
	
	//Verifying if information is updated
	if($sucess_p_lp){
		$session->message("Successfully saved information to Plum Landing Pages Template.");
		redirect_to("index.php");
	} else{
		$session->message("Failed to save information to Plum Landing Pages Template.");
		redirect_to("index.php");
	}
}



//**************Client Landing Page Form Submittion***************
if(isset($_POST['c_lp_submit'])){
	
	$client_landing_page = new ClientLp();
	
	if($_POST['c_lp_client_name']){	
		$client_landing_page->client_name = trim($_POST['c_lp_client_name']);}
		
	if($_POST['c_lp_sales_rep']){	
		$client_landing_page->salesrep_id = trim($_POST['c_lp_sales_rep']);}
		
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
		
	if($_POST['c_lp_start_date']){	
		$client_landing_page->start_date = trim($_POST['c_lp_start_date']);}
		
	if($_POST['c_lp_expire_date']){	
		$client_landing_page->expire_date = trim($_POST['c_lp_expire_date']);}
		
	if($_POST['c_lp_notes']){	
		$client_landing_page->notes = trim($_POST['c_lp_notes']);}
	
	if($_POST['c_lp_website_url']){	
		$client_landing_page->website_url = trim($_POST['c_lp_website_url']);}
		
	if($_POST['c_lp_url_path']){	
		$client_landing_page->url_path = trim($_POST['c_lp_url_path']);}
	
	
	
	$sucess_c_lp = $client_landing_page->create_c_lp_template_info();
	
	//Verifying if information is updated
	if($sucess_c_lp){
		$session->message("Successfully saved information to Client Landing Pages Template.");
		redirect_to("index.php");
	} else{
		$session->message("Failed to save information to Client Landing Pages Template.");
		redirect_to("index.php");
	}
}



?>

<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<!--<meta name="google" content="notranslate">-->
<meta http-equiv="Content-Language" content="en">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
<title>PLUMDM-HELP</title>
<link rel="shortcut icon" href="../site_images/plum_logo-favicon.ico" >
<link href="../stylesheets/plum_help.css" rel="stylesheet" type="text/css" media="screen,projection">
<link rel="stylesheet" type="text/css" href="../stylesheets/component.css" />
</head>

<body>
<div id="container"><!-- ***** START CONTAINER***** -->

<a id="TOP"></a>

<header class="bottomShadow">
	<div id="headerImage"><a href="http://plumdirectmarketing.com" target="_blank";><img src="../site_images/plum_logo_name.png" height="81px"></a></div>
</header>

<section id="mainButtonsBackgroundContainer">
    <div id="mainButtonsContainer">
            <div class="allShadow" id="emailButton">Email</div>
            <div class="allShadow" id="landingPageButton">Landing Pages</div>
            <div id="sliderLine"></div>
            <div id="selectCircle"></div>
            <div id="circleLetter"></div>
    </div>
</section>


<div   id="fixedSidebar">
    <li ><a href="#TOP" class="scroller-link"><div class="allShadow" id="plumScrollFix"><span>P</span></div></a></li>
    <li><a href="#CLIENT" class="scroller-link"><div class="allShadow" id="clientScrollFix"><span>C</span></div></a></li>
    <li><a href="#TOP" class="scroller-link"><div class="allShadow" id="topFix"><span>T</span></div></a></li>
</div>

<!--****** Error Message after submitting form *******-->
<?php if($session->message): ?>
	<div id="error_check"><span><?php echo $session->message; ?></span></div>
<?php endif; ?>

<div id="introduction">
	<div id="introductionContainer">
	<h1>WELCOME TO PLUMDM-HELP</h1>
    <h2>Choose <span style="color:#4ad486";>Email</span> Templates (or) <span style=" color:rgb(58,190,192);">Landing Page</span> Templates</h2>
    </div>
</div>

<!--*************************************************************** START EMAIL TEMPLATES CONTAINER ******************************************************-->
<section id="allEmailTemplatesContainer">

<!-- *****************************PLUM EMAILS Heading****************************-->
	<h1 id="plumEmails" class="innerShadow2">
    	<div id="plumEmailsContainer">
          <!--<div class="topLineHeading"></div>-->
              PLUM MARKETING EMAILS
          <!--<div class="bottomLineHeading"></div>-->
        </div>
    </h1>


<div id="allPlumEmailsContainer">	<!-- Start All Plum Emails Container-->
<?php foreach($templates_p_e as $template_p_e): ?>
	<div class="full_template_container">
          <div class="browser_bar">		<!-- BROWSER BAR-->
              <div class="dot1"></div>
              <div class="dot1"></div>
              <div class="dot1"></div>
          </div> 
          <div class="templateAllShadow show_template"><a href="<?php echo $template_p_e->website_url; ?>" target="_blank">		<!-- Template Image -->
          <img class="templateImage" height="220" src="<?php echo $template_p_e->url_path; ?>"></a>
          </div>
          <div class="templateAllShadow eachTemplateButtonsContainer">	<!-- VIEW & SELECT Buttons-->
          <a class="md-trigger" data-modal="p_e_modal"><button class="selectButton" language="javascript"  onclick="return p_e(this);" style="border-style:none; cursor:pointer; background-color:rgba(123,123,123,.0);" value="<?php echo $template_p_e->website_url."***".$template_p_e->url_path;?>"><div class="insideSelectButton">SELECT</div></button></a>
          <div class="buttonsBorder"></div>
          <a href="<?php echo $template_p_e->website_url; ?>" target="_blank"><div class="viewButton">VIEW</div></a>
          </div>
     </div><!-- END of PLUM EMAILS Container-->
<?php endforeach; ?>
</div>
																<!--Start PLUM EMIAL MODAL CONTENT -->  
      
      <div class="md-modal md-effect-1" id="p_e_modal">
		<div class="md-content"></br>
      		<h2>Template</h2>
				<form action="index.php" method="post">
                  <p><label>Client Name</label><input name="p_e_client_name" type="text" /></p>
                  <p><label>Sales Rep</label><select name="p_e_sales_rep">
                  <?php foreach($sales_reps as $sales_rep): ?>
                  <option value="<?php echo $sales_rep->id; ?>"><?php echo $sales_rep->first_name; ?></option>
                  <?php endforeach; ?>
                  </select></p>
                  <p><label>Send Date</label><input name="p_e_send_date" type="text" /></p>
                  <p><label>Email List</label><input name="p_e_email_list" type="text" /></p>
                  <p><label>Notes</label><textarea name="p_e_notes"  cols="40" rows="4" ></textarea></p>
                  <input type="hidden" id="p_e_website_url" type="text" name="p_e_website_url" value="" />
                  <input type="hidden" id="p_e_url_path" type="text" name="p_e_url_path" value="" />
                  <button class="md-close" name="p_e_submit" type="submit">Submit</button></br>
                </form>
      	</div>
      </div><!--END PLUM EMIAL MODAL CONTENT --> 





<!--******************************** CLIENT EMAILS Heading************************-->
	<h1 id="clientEmails" class="innerShadow2">
    	<a class="eClientScroll" style="float:left; margin-top:-30px;" id="CLIENT"></a>
    	<div id="clientEmailsContainer">
                CLIENT MARKETING EMAILS
        </div>
    </h1>
    

<div id="allClientEmailsContainer">	<!-- Start All Client Emails Container-->    
<?php foreach($templates_c_e as $template_c_e): ?>
	<div class="full_template_container">
          <div class="browser_bar">		<!-- BROWSER BAR-->
              <div class="dot1"></div>
              <div class="dot1"></div>
              <div class="dot1"></div>
          </div> 
          <div class="templateAllShadow show_template"><a href="<?php echo $template_c_e->website_url; ?>" target="_blank">		<!-- Template Image -->
          <img class="templateImage" height="220" src="<?php echo $template_c_e->url_path; ?>"></a>
          </div>
          <div class="templateAllShadow eachTemplateButtonsContainer">	<!-- VIEW & SELECT Buttons-->
              <a class="md-trigger" data-modal="c_e_modal"><button class="selectButton" language="javascript"  onclick="return c_e(this);" style="border-style:none; cursor:pointer; background-color:rgba(123,123,123,.0);" value="<?php echo $template_c_e->website_url."***".$template_c_e->url_path;?>"><div class="insideSelectButton">SELECT</div></button></a>
              <div class="buttonsBorder"></div>
              <a href="<?php echo $template_c_e->website_url; ?>" target="_blank"><div class="viewButton">VIEW</div></a>
          </div>
     </div><!-- END of CLIENT EMAILS Container-->
<?php endforeach; ?>
</div>
    
    																<!--Start CLIENT EMAIL MODAL CONTENT -->  
      
      <div class="md-modal md-effect-1" id="c_e_modal">
		<div class="md-content"></br>
      		<h2>Template</h2>
				<form action="index.php" method="post">
                  <p><label>Client Name</label><input name="c_e_client_name" type="text" /></p>
                  <p><label>Sales Rep</label><select name="c_e_sales_rep">
                  <?php foreach($sales_reps as $sales_rep): ?>
                  <option value="<?php echo $sales_rep->id; ?>"><?php echo $sales_rep->first_name; ?></option>
                  <?php endforeach; ?>
                  </select></p>
                  <p><label>Send Date</label><input name="c_e_send_date" type="text" /></p>
                  <p><label>Email List</label><input name="c_e_email_list" type="text" /></p>
                  <p><label>Notes</label><textarea name="c_e_notes"  cols="40" rows="4" ></textarea></p>
                  <input type="hidden" id="c_e_website_url" type="text" name="c_e_website_url" value="" />
                  <input type="hidden" id="c_e_url_path" type="text" name="c_e_url_path" value="" />
                  <button class="md-close" name="c_e_submit" type="submit">Submit</button></br>
                </form>
      	</div>
      </div><!--END CLIENT EMAIL MODAL CONTENT --> 
      
	<div id="overlayemail" class="md-overlay"></div><!-- the overlay element -->
</section><!--**************************************************** END OF EMAIL TEMPLATES CONTAINER ******************************************************-->








<!--******************************************************** START LANDINGPAGE TEMPLATES CONTAINER ******************************************************-->
<section id="allLandingPageTemplatesContainer">

	<h1 id="plumEmails" class="innerShadow2">	<!-- **********PLUM LANDING PAGES Heading**********-->
    	<div id="plumEmailsContainer">
          <!--<div class="topLineHeading"></div>-->
              PLUM LANDING PAGES
          <!--<div class="bottomLineHeading"></div>-->
        </div>
    </h1>
    

<div id="allClientEmailsContainer">	<!-- Start All Plum Landing Pages Container-->    
<?php foreach($templates_p_lp as $template_p_lp): ?>
	<div class="full_template_container">
          <div class="browser_bar">		<!-- BROWSER BAR-->
              <div class="dot1"></div>
              <div class="dot1"></div>
              <div class="dot1"></div>
          </div> 
          <div class="templateAllShadow show_template"><a href="<?php echo $template_p_lp->website_url; ?>" target="_blank">		<!-- Template Image -->
          <img class="templateImage" height="220" src="<?php echo $template_p_lp->url_path; ?>"></a>
          </div>
          <div class="templateAllShadow eachTemplateButtonsContainer">	<!-- VIEW & SELECT Buttons-->
              <a class="md-trigger" data-modal="p_lp_modal"><button class="selectButton" language="javascript"  onclick="return p_lp(this);" style="border-style:none; cursor:pointer; background-color:rgba(123,123,123,.0);" value="<?php echo $template_p_lp->website_url."***".$template_p_lp->url_path;?>"><div class="insideSelectButton">SELECT</div></button></a>
              <div class="buttonsBorder"></div>
              <a href="<?php echo $template_p_lp->website_url; ?>" target="_blank"><div class="viewButton">VIEW</div></a>
          </div>
     </div><!-- END of PLUM LP Container-->
<?php endforeach; ?>
</div>


    																<!--Start PLUM LP MODAL CONTENT -->  
      
      <div class="md-modal md-effect-1" id="p_lp_modal">
		<div class="md-content1"></br>
      		<h2>Template</h2>
				<form action="index.php" method="post">
                  <div class="firstHalfForm">
                  <p><label>Client Name</label><input name="p_lp_client_name" type="text" /></p>
                  <p><label>Email</label><input name="p_lp_email" type="text" /></p>
                  <p><label>City</label><input name="p_lp_city" type="text" /></p>
                  <p><label>State</label><input name="p_lp_state" type="text" /></p>
                  <p><label>Zip Code</label><input name="p_lp_zip_code" type="text" /></p>
                  <p><label>Google AdWords</label><input name="p_lp_google_ad" style="position:relative; right:-120px; top:-15px;" type="checkbox" /></p>
                  </div>
                  
                  <div class="formDividerLine"></div>
                  
                  <div class="secondHalfForm">
                  <p><label>Sales Rep</label>
                  <select name="p_lp_sales_rep">
                      <?php foreach($sales_reps as $sales_rep): ?>
                      <option value="<?php echo $sales_rep->id; ?>"><?php echo $sales_rep->first_name; ?></option>
                      <?php endforeach; ?>
                  </select></p>
                  <p><label>Start Date</label><input name="p_lp_start_date" type="text" /></p>
                  <p><label>Expire Date</label><input name="p_lp_expire_date" type="text" /></p>
                  <p><label>Notes</label><textarea name="p_lp_notes"  cols="40" rows="4" ></textarea></p>
                  <input type="hidden" id="p_lp_website_url" type="text" name="p_lp_website_url" value="" />
                  <input type="hidden" id="p_lp_url_path" type="text" name="p_lp_url_path" value="" />
                  </div>
                  
                  <button class="md-close" name="p_lp_submit" type="submit">Submit</button></br>
                </form>
      	</div>
      </div><!--END PLUM LP MODAL CONTENT --> 



	<h1 id="clientEmails" class="innerShadow2">		<!--*****************CLIENT LANDING PAGE Heading***************-->
    	<a class="lpClientScroll" style="float:left; margin-top:-30px;" id="CLIENT"></a>
    	<div id="clientEmailsContainer">
                CLIENT LANDING PAGES
        </div>
    </h1>
    

<div id="allPlumEmailsContainer">	<!-- Start All CLIENT LP Container-->
<?php foreach($templates_c_lp as $template_c_lp): ?>
	<div class="full_template_container">
          <div class="browser_bar">		<!-- BROWSER BAR-->
              <div class="dot1"></div>
              <div class="dot1"></div>
              <div class="dot1"></div>
          </div> 
          <div class="templateAllShadow show_template"><a href="<?php echo $template_c_lp->website_url; ?>" target="_blank">		<!-- Template Image -->
          <img class="templateImage" height="220" src="<?php echo $template_c_lp->url_path; ?>"></a>
          </div>
          <div class="templateAllShadow eachTemplateButtonsContainer">	<!-- VIEW & SELECT Buttons-->
              <a class="md-trigger" data-modal="c_lp_modal"><button class="selectButton" language="javascript"  onclick="return c_lp(this);" style="border-style:none; cursor:pointer; background-color:rgba(123,123,123,.0);" value="<?php echo $template_c_lp->website_url."***".$template_c_lp->url_path;?>"><div class="insideSelectButton">SELECT</div></button></a>
              <div class="buttonsBorder"></div>
              <a href="<?php echo $template_c_lp->website_url; ?>" target="_blank"><div class="viewButton">VIEW</div></a>
          </div>
     </div><!-- END of CLIENT LP Container-->
<?php endforeach; ?>
</div>
    
    
    
    																<!--Start CLIENT LP MODAL CONTENT -->  
      
      <div class="md-modal md-effect-1" id="c_lp_modal">
		<div class="md-content1"></br>
      		<h2>Template</h2>
				<form action="index.php" method="post">
                  <div class="firstHalfForm">
                  <p><label>Client Name</label><input name="c_lp_client_name" type="text" /></p>
                  <p><label>Email</label><input name="c_lp_email" type="text" /></p>
                  <p><label>City</label><input name="c_lp_city" type="text" /></p>
                  <p><label>State</label><input name="c_lp_state" type="text" /></p>
                  <p><label>Zip Code</label><input name="c_lp_zip_code" type="text" /></p>
                  <p><label>Google AdWords</label><input name="c_lp_google_ad" style="position:relative; right:-120px; top:-15px;" type="checkbox" /></p>
                  </div>
                  
                  <div class="formDividerLine"></div>
                  
                  <div class="secondHalfForm">
                  <p><label>Sales Rep</label>
                  <select name="c_lp_sales_rep">
                      <?php foreach($sales_reps as $sales_rep): ?>
                      <option value="<?php echo $sales_rep->id; ?>"><?php echo $sales_rep->first_name; ?></option>
                      <?php endforeach; ?>
                  </select></p>
                  <p><label>Start Date</label><input name="c_lp_start_date" type="text" /></p>
                  <p><label>Expire Date</label><input name="c_lp_expire_date" type="text" /></p>
                  <p><label>Notes</label><textarea name="c_lp_notes"  cols="40" rows="4" ></textarea></p>
                  <input type="hidden" id="c_lp_website_url" type="text" name="c_lp_website_url" value="" />
                  <input type="hidden" id="c_lp_url_path" type="text" name="c_lp_url_path" value="" />
                  </div>
                  
                  <button class="md-close" name="c_lp_submit" type="submit">Submit</button></br>
                </form>
      	</div>
      </div><!--END CLIENT LP MODAL CONTENT --> 
    
    <div id="overlaylp" class="md-close md-overlay1"></div><!-- the overlay element -->
</section><!--****************************************** END OF EMAIL TEMPLATES CONTAINER ******************************************************-->







<footer><div class="topLineHeading"></div>
	<a href="http://plumdirectmarketing.com" target="_blank"><img class="transition" src="../site_images/plum_logo.png" width="60px" height="60px" ></a>
</footer>




</div><!-- ***** END OF CONTAINER***** -->

<script type="text/javascript" src="../javascripts/jquery-2.0.2.min.js"></script>
<script type="text/javascript" src="../javascripts/d3.min.js"></script>

<script type="text/javascript">
$(function(){
    /*-- Scroll to link --*/
    $('.scroller-link').click(function(e){
        e.preventDefault(); //Don't automatically jump to the link
        id = $(this).attr('href').replace('#', ''); //Extract the id of the element to jump to
        $('html,body').animate({scrollTop: $("#"+id).offset().top-$(this).closest('ul').height()},'normal');
    });
});


function p_e(button) {
		var button_value = button.value;
		var button_values = button_value.split("***");
		
		$("#p_e_website_url")
		.attr("value",button_values[0]);
		
		$("#p_e_url_path")
		.attr("value",button_values[1]);
}

function p_lp(button) {
		var button_value = button.value;
		var button_values = button_value.split("***");
		
		$("#p_lp_website_url")
		.attr("value",button_values[0]);
		
		$("#p_lp_url_path")
		.attr("value",button_values[1]);
}

function c_e(button) {
		var button_value = button.value;
		var button_values = button_value.split("***");
		
		$("#c_e_website_url")
		.attr("value",button_values[0]);
		
		$("#c_e_url_path")
		.attr("value",button_values[1]);
}

function c_lp(button) {
		var button_value = button.value;
		var button_values = button_value.split("***");
		
		$("#c_lp_website_url")
		.attr("value",button_values[0]);
		
		$("#c_e_url_path")
		.attr("value",button_values[1]);
}



</script>

<script type="text/javascript" src="../javascripts/plumdm_help.js"></script>
<script src="../javascripts/classie.js"></script>
<script src="../javascripts/modalEffects.js"></script>
</body>
</html>
