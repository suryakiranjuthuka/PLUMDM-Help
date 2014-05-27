<?php 

require_once("../../includes/initialize.php");


$templates_p_e = Template::get_all_templates_p_e();
$templates_c_e = Template::get_all_templates_c_e();
$templates_p_lp = Template::get_all_templates_p_lp();
$templates_c_lp = Template::get_all_templates_c_lp();
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
<script type="text/javascript" src="../javascripts/d3.min.js"></script>
</head>

<body><img id="test">
<div id="container"><!-- ***** START CONTAINER***** -->

<a id="TOP"></a>

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


<div   id="fixedSidebar">
    <li ><a href="#TOP" class="scroller-link"><div class="allShadow" id="plumScrollFix"><span>P</span></div></a></li>
    <li><a href="#CLIENT" class="scroller-link"><div class="allShadow" id="clientScrollFix"><span>C</span></div></a></li>
    <li><a href="#TOP" class="scroller-link"><div class="allShadow" id="topFix"><span>T</span></div></a></li>
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
          <img class="templateImage" height="238" src="<?php echo $template_p_e->url_path; ?>"></a>
          </div>
          <div class="templateAllShadow eachTemplateButtonsContainer">	<!-- VIEW & SELECT Buttons-->
          <a class="md-trigger" data-modal="p_e_modal"><button class="selectButton" language="javascript"  onclick="return ClickMenu(this);" style="border-style:none; cursor:pointer; background-color:rgba(123,123,123,.0);"><div class="insideSelectButton">SELECT</div></button></a>
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
          <img class="templateImage" height="238" src="<?php echo $template_c_e->url_path; ?>"></a>
          </div>
          <div class="templateAllShadow eachTemplateButtonsContainer">	<!-- VIEW & SELECT Buttons-->
              <a class="md-trigger" data-modal="c_e_modal"><button class="selectButton" language="javascript"  onclick="return ClickMenu(this);" style="border-style:none; cursor:pointer; background-color:rgba(123,123,123,.0);"><div class="insideSelectButton">SELECT</div></button></a>
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
          <img class="templateImage" height="238" src="<?php echo $template_p_lp->url_path; ?>"></a>
          </div>
          <div class="templateAllShadow eachTemplateButtonsContainer">	<!-- VIEW & SELECT Buttons-->
              <a class="md-trigger" data-modal="p_lp_modal"><button class="selectButton" language="javascript"  onclick="return ClickMenu(this);" style="border-style:none; cursor:pointer; background-color:rgba(123,123,123,.0);"><div class="insideSelectButton">SELECT</div></button></a>
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
          <img class="templateImage" height="238" src="<?php echo $template_c_lp->url_path; ?>"></a>
          </div>
          <div class="templateAllShadow eachTemplateButtonsContainer">	<!-- VIEW & SELECT Buttons-->
              <a class="md-trigger" data-modal="c_lp_modal"><button class="selectButton" language="javascript"  onclick="return ClickMenu(this);" style="border-style:none; cursor:pointer; background-color:rgba(123,123,123,.0);"><div class="insideSelectButton">SELECT</div></button></a>
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

<script type="text/javascript" src="../javascripts/jquery-2.0.2.min.js"></script>

<script type="text/javascript">
$(function(){
    /*-- Scroll to link --*/
    $('.scroller-link').click(function(e){
        e.preventDefault(); //Don't automatically jump to the link
        id = $(this).attr('href').replace('#', ''); //Extract the id of the element to jump to
        $('html,body').animate({scrollTop: $("#"+id).offset().top-$(this).closest('ul').height()},'normal');
    });
});
</script>

<script type="text/javascript" src="../javascripts/plumdm_help.js"></script>
<script src="../javascripts/classie.js"></script>
<script src="../javascripts/modalEffects.js"></script>
</body>
</html>
