<?php 

require_once("../../includes/initialize.php");


$templates_p_e = Template::get_all_templates_p_e();
$templates_c_e = Template::get_all_templates_c_e();
?>

<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="google" content="notranslate">
<meta http-equiv="Content-Language" content="en">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
<title>PLUMDM-HELP</title>
<link rel="shortcut icon" href="../site_images/plum_logo-favicon.ico" >
<link href="../stylesheets/plum_help.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" media="only screen and (min-width: 641px) and (max-width: 1366px)" href="../stylesheets/lowres.css">
<script type="text/javascript" src="../javascripts/d3.min.js"></script>
</head>

<body><img id="test">
<div id="container"><!-- ***** START CONTAINER***** -->

<header class="bottomShadow">
	<div id="headerImage"><a href="http://plumdirectmarketing.com" target="_blank";><img src="../site_images/plum_logo_name.png" height="90px"></a></div>
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

<!--****************************************** START EMAIL TEMPLATES CONTAINER ******************************************************-->
<section id="allEmailTemplatesContainer">

	<h1 id="plumEmails" class="innerShadow2">	<!-- PLUM EMAILS Heading-->
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
          <img class="templateImage" height="238" src="<?php echo $template_p_e->url_path; ?>"></a>
          </div>
          <div class="templateAllShadow eachTemplateButtonsContainer">	<!-- VIEW & SELECT Buttons-->
              <div class="selectButton">SELECT</div>
              <div class="buttonsBorder"></div>
              <div class="viewButton"><a href="<?php echo $template_p_e->website_url; ?>" target="_blank">VIEW</a></div>
          </div>
     </div><!-- END of PLUM EMAILS Container-->
<?php endforeach; ?>
</div>


	<h1 id="clientEmails" class="innerShadow2">		<!-- CLIENT EMAILS Heading-->
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
          <img class="templateImage" height="238" src="<?php echo $template_c_e->url_path; ?>"></a>
          </div>
          <div class="templateAllShadow eachTemplateButtonsContainer">	<!-- VIEW & SELECT Buttons-->
              <div class="selectButton">SELECT</div>
              <div class="buttonsBorder"></div>
              <div class="viewButton"><a href="<?php echo $template_c_e->website_url; ?>" target="_blank">VIEW</a></div>
          </div>
     </div><!-- END of PLUM EMAILS Container-->
<?php endforeach; ?>
</div>
    
</section><!--****************************************** END OF EMAIL TEMPLATES CONTAINER ******************************************************-->







<!--****************************************** START LANDINGPAGE TEMPLATES CONTAINER ******************************************************-->
<section id="allLandingPageTemplatesContainer">

	<h1 id="plumEmails" class="innerShadow2">	<!-- PLUM EMAILS Heading-->
    	<div id="plumEmailsContainer">
          <!--<div class="topLineHeading"></div>-->
              PLUM LANDING PAGES
          <!--<div class="bottomLineHeading"></div>-->
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
          <img class="templateImage" height="238" src="<?php echo $template_c_e->url_path; ?>"></a>
          </div>
          <div class="templateAllShadow eachTemplateButtonsContainer">	<!-- VIEW & SELECT Buttons-->
              <div class="selectButton">SELECT</div>
              <div class="buttonsBorder"></div>
              <div class="viewButton"><a href="<?php echo $template_c_e->website_url; ?>" target="_blank">VIEW</a></div>
          </div>
     </div><!-- END of PLUM EMAILS Container-->
<?php endforeach; ?>
</div>


	<h1 id="clientEmails" class="innerShadow2">		<!-- CLIENT EMAILS Heading-->
    	<div id="clientEmailsContainer">
                CLIENT LANDING PAGES
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
          <img class="templateImage" height="238" src="<?php echo $template_p_e->url_path; ?>"></a>
          </div>
          <div class="templateAllShadow eachTemplateButtonsContainer">	<!-- VIEW & SELECT Buttons-->
              <div class="selectButton">SELECT</div>
              <div class="buttonsBorder"></div>
              <div class="viewButton"><a href="<?php echo $template_p_e->website_url; ?>" target="_blank">VIEW</a></div>
          </div>
     </div><!-- END of PLUM EMAILS Container-->
<?php endforeach; ?>
</div>
    
</section><!--****************************************** END OF EMAIL TEMPLATES CONTAINER ******************************************************-->







<footer><div class="topLineHeading"></div>
	<a href="http://plumdirectmarketing.com" target="_blank"><img class="transition" src="../site_images/plum_logo.png" width="60px" height="60px" ></a>
</footer>

</div><!-- ***** END OF CONTAINER***** -->

<script type="text/javascript" src="../javascripts/plumdm_help.js"></script>
</body>
</html>
