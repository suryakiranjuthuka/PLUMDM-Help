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
<link rel="stylesheet" type="text/css" href="../stylesheets/component.css" />
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
          <img class="templateImage" height="238" src="<?php echo $template_p_e->url_path; ?>"></a>
          </div>
          <div class="templateAllShadow eachTemplateButtonsContainer">	<!-- VIEW & SELECT Buttons-->
          <a class="md-trigger" data-modal="p_e_modal"><button class="selectButton" language="javascript"  onclick="return ClickMenu(this);" style="border-style:none; cursor:pointer; background-color:rgba(123,123,123,.0);"><div class="insideSelectButton">SELECT</div></button></a>
          <div class="buttonsBorder"></div>
          <div class="viewButton"><a href="<?php echo $template_p_e->website_url; ?>" target="_blank">VIEW</a></div>
          </div>
     </div><!-- END of PLUM EMAILS Container-->
<?php endforeach; ?>
</div>
																<!--Start PLUM EMIAL MODAL CONTENT -->  
      
      <div class="md-modal md-effect-1" id="p_e_modal">
		<div class="md-content"></br>
      		<h2>Template</h2>
				<form action="index.php" method="post">
                  <p><label>Client Name</label><input type="text" /></p>
                  <p><label>Sales Rep</label><select>
                      <option value="volvo">Volvo</option>
                      <option value="saab">Saab</option>
                      <option value="mercedes">Mercedes</option>
                      <option value="audi">Audi</option>
                  </select></p>
                  <p><label>Send Date</label><input type="text" /></p>
                  <p><label>Email List</label><input type="text" /></p>
                  <p><label>Notes</label><textarea id="updateArticleTextArea" name="body"  cols="40" rows="4" ></textarea></p>
                  <input type="hidden" id="updateArticleId" type="text" name="inputHiddenFieldId" value="" />
                  <button class="md-close" name="update_article" type="submit">Submit</button></br>
                </form>
      	</div>
      </div><!--END PLUM EMIAL MODAL CONTENT --> 





<!--******************************** CLIENT EMAILS Heading************************-->
	<h1 id="clientEmails" class="innerShadow2">
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
              <a class="md-trigger" data-modal="c_e_modal"><button class="selectButton" language="javascript"  onclick="return ClickMenu(this);" style="border-style:none; cursor:pointer; background-color:rgba(123,123,123,.0);"><div class="insideSelectButton">SELECT</div></button></a>
              <div class="buttonsBorder"></div>
              <div class="viewButton"><a href="<?php echo $template_c_e->website_url; ?>" target="_blank">VIEW</a></div>
          </div>
     </div><!-- END of CLIENT EMAILS Container-->
<?php endforeach; ?>
</div>
    
    																<!--Start CLIENT EMAIL MODAL CONTENT -->  
      
      <div class="md-modal md-effect-1" id="c_e_modal">
		<div class="md-content"></br>
      		<h2>Template</h2>
				<form action="index.php" method="post">
                  <div class="firstHalfForm">
                  <p><label>Client Name</label><input type="text" /></p>
                  <p><label>Email</label><input type="text" /></p>
                  <p><label>City</label><input type="text" /></p>
                  <p><label>State</label><input type="text" /></p>
                  <p><label>Zip Code</label><input type="text" /></p>
                  <p><label>Google AdWords</label><input style="position:relative; right:-120px; top:-15px;" type="checkbox" /></p>
                  </div>
                  
                  <div class="formDividerLine"></div>
                  
                  <div class="secondHalfForm">
                  <p><label>Sales Rep</label>
                  <select>
                      <option value="volvo">Volvo</option>
                      <option value="saab">Saab</option>
                      <option value="mercedes">Mercedes</option>
                      <option value="audi">Audi</option>
                  </select></p>
                  <p><label>Start Date</label><input type="text" /></p>
                  <p><label>Expire Date</label><input type="text" /></p>
                  <p><label>Notes</label><textarea id="updateArticleTextArea" name="body"  cols="40" rows="4" ></textarea></p>
                  <input type="hidden" id="updateArticleId" type="text" name="inputHiddenFieldId" value="" />
                  </div>
                  
                  <button class="md-close" name="update_article" type="submit">Submit</button></br>
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
              <a class="md-trigger" data-modal="p_lp_modal"><button class="selectButton" language="javascript"  onclick="return ClickMenu(this);" style="border-style:none; cursor:pointer; background-color:rgba(123,123,123,.0);"><div class="insideSelectButton">SELECT</div></button></a>
              <div class="buttonsBorder"></div>
              <div class="viewButton"><a href="<?php echo $template_c_e->website_url; ?>" target="_blank">VIEW</a></div>
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
                  <p><label>Client Name</label><input type="text" /></p>
                  <p><label>Email</label><input type="text" /></p>
                  <p><label>City</label><input type="text" /></p>
                  <p><label>State</label><input type="text" /></p>
                  <p><label>Zip Code</label><input type="text" /></p>
                  <p><label>Google AdWords</label><input style="position:relative; right:-120px; top:-15px;" type="checkbox" /></p>
                  </div>
                  
                  <div class="formDividerLine"></div>
                  
                  <div class="secondHalfForm">
                  <p><label>Sales Rep</label>
                  <select>
                      <option value="volvo">Volvo</option>
                      <option value="saab">Saab</option>
                      <option value="mercedes">Mercedes</option>
                      <option value="audi">Audi</option>
                  </select></p>
                  <p><label>Start Date</label><input type="text" /></p>
                  <p><label>Expire Date</label><input type="text" /></p>
                  <p><label>Notes</label><textarea id="updateArticleTextArea" name="body"  cols="40" rows="4" ></textarea></p>
                  <input type="hidden" id="updateArticleId" type="text" name="inputHiddenFieldId" value="" />
                  </div>
                  
                  <button class="md-close" name="update_article" type="submit">Submit</button></br>
                </form>
      	</div>
      </div><!--END PLUM LP MODAL CONTENT --> 



	<h1 id="clientEmails" class="innerShadow2">		<!--*****************CLIENT LANDING PAGE Heading***************-->
    	<div id="clientEmailsContainer">
                CLIENT LANDING PAGES
        </div>
    </h1>
    

<div id="allPlumEmailsContainer">	<!-- Start All CLIENT LP Container-->
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
              <a class="md-trigger" data-modal="c_lp_modal"><button class="selectButton" language="javascript"  onclick="return ClickMenu(this);" style="border-style:none; cursor:pointer; background-color:rgba(123,123,123,.0);"><div class="insideSelectButton">SELECT</div></button></a>
              <div class="buttonsBorder"></div>
              <div class="viewButton"><a href="<?php echo $template_p_e->website_url; ?>" target="_blank">VIEW</a></div>
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
                  <p><label>Client Name</label><input type="text" /></p>
                  <p><label>Email</label><input type="text" /></p>
                  <p><label>City</label><input type="text" /></p>
                  <p><label>State</label><input type="text" /></p>
                  <p><label>Zip Code</label><input type="text" /></p>
                  <p><label>Google AdWords</label><input style="position:relative; right:-120px; top:-15px;" type="checkbox" /></p>
                  </div>
                  
                  <div class="formDividerLine"></div>
                  
                  <div class="secondHalfForm">
                  <p><label>Sales Rep</label>
                  <select>
                      <option value="volvo">Volvo</option>
                      <option value="saab">Saab</option>
                      <option value="mercedes">Mercedes</option>
                      <option value="audi">Audi</option>
                  </select></p>
                  <p><label>Start Date</label><input type="text" /></p>
                  <p><label>Expire Date</label><input type="text" /></p>
                  <p><label>Notes</label><textarea id="updateArticleTextArea" name="body"  cols="40" rows="4" ></textarea></p>
                  <input type="hidden" id="updateArticleId" type="text" name="inputHiddenFieldId" value="" />
                  </div>
                  
                  <button class="md-close" name="update_article" type="submit">Submit</button></br>
                </form>
      	</div>
      </div><!--END CLIENT LP MODAL CONTENT --> 
    
    <div id="overlaylp" class="md-close md-overlay1"></div><!-- the overlay element -->
</section><!--****************************************** END OF EMAIL TEMPLATES CONTAINER ******************************************************-->







<footer><div class="topLineHeading"></div>
	<a href="http://plumdirectmarketing.com" target="_blank"><img class="transition" src="../site_images/plum_logo.png" width="60px" height="60px" ></a>
</footer>




</div><!-- ***** END OF CONTAINER***** -->

<script type="text/javascript" src="../javascripts/plumdm_help.js"></script>
<script src="../javascripts/classie.js"></script>
<script src="../javascripts/modalEffects.js"></script>
</body>
</html>
