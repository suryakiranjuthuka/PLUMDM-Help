<?php 

require_once("../../includes/initialize.php");

if (!$session->is_logged_in()) { redirect_to("login.php"); }

$templates_p_e = Template::get_all_templates_p_e();
$templates_c_e = Template::get_all_templates_c_e();
$templates_p_lp = Template::get_all_templates_p_lp();
$templates_c_lp = Template::get_all_templates_c_lp();


//********** Hide Template **************
if(isset($_GET['template_id'])){
	
	$template = new Template();
	
	$template->id = trim($_GET['template_id']);
	
	$hidden = $template->hide_template();
	
	//Verifying if information is hidden
	if($hidden){
		$session->message("Template Sucessfully HIDDEN.");
		redirect_to("edit_templates.php");
	} else{
		$session->message("Failed to HIDE the Template.");
		redirect_to("edit_templates.php");
	}
}


//**************EDIT TEMPLATE***************
if(isset($_POST['edit_template_form'])){
	
	$template_edit = new Template();
	
	if($_POST['template_id']){	
		$template_edit->id = trim($_POST['template_id']);}
		
	if($_POST['template_type']){	
		$template_edit->type = trim($_POST['template_type']);}
		
	if($_POST['website_url']){	
		$template_edit->website_url = trim($_POST['website_url']);}
		
	if($_POST['template_image_path']){	
		$template_edit->url_path = trim($_POST['template_image_path']);}
	
	$sucess = $template_edit->edit_template();
	
	//Verifying if information is updated
	if($sucess){
		$session->message("Successfully UPDATED Template Information.");
		redirect_to("edit_templates.php");
	} else{
		$session->message("Failed to Update Template Information.");
		redirect_to("edit_templates.php");
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
<title>Plumdm Edit Templates</title>
<link rel="shortcut icon" href="../site_images/plum_logo-favicon.ico" >
<link href="../stylesheets/plum_help.css" rel="stylesheet" type="text/css" media="screen,projection">
<link rel="stylesheet" type="text/css" href="../stylesheets/component_user.css" />
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
	<h1>WELCOME TO PLUMDM-HELP EDIT</h1>
    <h2>Edit <span style="color:#4ad486";>Email</span> Templates / <span style=" color:rgb(58,190,192);">Landing Page</span> Templates</h2>
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
          <div class="edit_icons">	<!-- Hide & Edit Icons-->
          	<a href="edit_templates.php?template_id=<?php echo $template_p_e->id; ?>" title="Hide Template"><img class="allShadow transition1 hide_icon" height="30"src="../site_images/hide.png"></a>
            <a class="md-trigger edit_icon_button" data-modal="template_modal" title="Edit Template"><button class="editButton transition1" language="javascript"  onclick="return edit_template(this);" style=" cursor:pointer; border-style:none; outline:0; border:0; background:none;" value="<?php echo $template_p_e->id."***".$template_p_e->type."***".$template_p_e->website_url."***".$template_p_e->url_path; ?>"><img class="allShadow transition1 edit_icon" height="30"src="../site_images/edit.png"></button></a>
          </div>
     </div><!-- END of PLUM EMAILS Container-->
<?php endforeach; ?>
</div>





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
          <div class="edit_icons">	<!-- Hide & Edit Icons-->
          	<a href="edit_templates.php?template_id=<?php echo $template_c_e->id; ?>" title="Hide Template"><img class="allShadow transition1 hide_icon" height="30"src="../site_images/hide.png"></a>
            <a class="md-trigger edit_icon_button" data-modal="template_modal" title="Edit Template"><button class="editButton transition1" language="javascript"  onclick="return edit_template(this);" style=" cursor:pointer; border-style:none; outline:0; border:0; background:none;" value="<?php echo $template_c_e->id."***".$template_c_e->type."***".$template_c_e->website_url."***".$template_c_e->url_path; ?>"><img class="allShadow transition1 edit_icon" height="30"src="../site_images/edit.png"></button></a>
          </div>
     </div><!-- END of CLIENT EMAILS Container-->
<?php endforeach; ?>
</div>

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
          <div class="edit_icons">	<!-- Hide & Edit Icons-->
          	<a href="edit_templates.php?template_id=<?php echo $template_p_lp->id; ?>" title="Hide Template"><img class="transition1 hide_icon" height="30"src="../site_images/hide.png"></a>
            <a class="md-trigger edit_icon_button" data-modal="template_modal" title="Edit Template"><button class="editButton transition1" language="javascript"  onclick="return edit_template(this);" style=" cursor:pointer; border-style:none; outline:0; border:0; background:none;" value="<?php echo $template_p_lp->id."***".$template_p_lp->type."***".$template_p_lp->website_url."***".$template_p_lp->url_path; ?>"><img class="allShadow transition1 edit_icon" height="30"src="../site_images/edit.png"></button></a>
          </div>
     </div><!-- END of PLUM LP Container-->
<?php endforeach; ?>
</div>



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
          <div class="edit_icons">	<!-- Hide & Edit Icons-->
          	<a href="edit_templates.php?template_id=<?php echo $template_c_lp->id; ?>" title="Hide Template"><img class="transition1 hide_icon" height="30"src="../site_images/hide.png"></a>
            <a class="md-trigger edit_icon_button" data-modal="template_modal" title="Edit Template"><button class="editButton transition1" language="javascript"  onclick="return edit_template(this);" style=" cursor:pointer; border-style:none; outline:0; border:0; background:none;" value="<?php echo $template_c_lp->id."***".$template_c_lp->type."***".$template_c_lp->website_url."***".$template_c_lp->url_path; ?>"><img class="allShadow transition1 edit_icon" height="30"src="../site_images/edit.png"></button></a>
          </div>
     </div><!-- END of CLIENT LP Container-->
<?php endforeach; ?>
</div>
</section><!--****************************************** END OF EMAIL TEMPLATES CONTAINER ******************************************************-->



																<!--Start EDIT TEMPLATE MODAL CONTENT -->  
      
      <div class="md-modal md-effect-1" id="template_modal">
		<div id="upload_template_modal_content" class="md-content"></br>
      		<h2>Upload Template</h2>
            
            <form id="uploadForm" method="post" action="edit_templates.php">
            
            	  <p><label>Template Type</label><select name="template_type" id="template_type" required>
                  <option id="select_p_e" value="p_e">Plum Email</option>
                  <option id="select_c_e" value="c_e">Client Email</option>
                  <option id="select_p_lp" value="p_lp">Plum Landing Page</option>
                  <option id="select_c_lp" value="c_lp">Client Landing Page</option>
                  </select></p>
                  <p><label>Website URL</label><input id="website_url" value="" name="website_url" required type="text" /></p>
                  <p><label>Template Image Path</label><input value="" id="template_image_path" name="template_image_path" required type="text" /></p>
                  <input type="hidden" id="template_id" name="template_id">
                  
                  <button id="edit_template_form" class="md-close" name="edit_template_form" type="submit">Submit</button></br>  
                 </form>
        
        </div>
      </div><!--END EDIT TEMPLATE MODAL CONTENT --> 

<div id="overlay" class="md-overlay"></div><!-- the overlay element -->



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


//**************************************************************Form Reset Funcationality
$( "#overlay" ).click(function() {
  	document.getElementById("uploadForm").reset();
});


function edit_template(button) {
		var button_value = button.value;
		var button_values = button_value.split("***");
		
		$("#template_id")
		.attr("value",button_values[0]);
		
		if(button_values[1] == "p_e"){
			$('[name=template_type]').val( 'p_e' );
		};
		
		if(button_values[1] == "c_e"){
			$('[name=template_type]').val( 'c_e' );
		};
		
		if(button_values[1] == "p_lp"){
			$('[name=template_type]').val( 'p_lp' );
		};
		
		if(button_values[1] == "c_lp"){
			$('[name=template_type]').val( 'c_lp' );
		};
		
		$("#website_url")
		.attr("value",button_values[2]);
		
		$("#template_image_path")
		.attr("value",button_values[3]);
}

</script>

<script type="text/javascript" src="../javascripts/plumdm_help.js"></script>
<script src="../javascripts/classie.js"></script>
<script src="../javascripts/modalEffects.js"></script>
</body>
</html>
