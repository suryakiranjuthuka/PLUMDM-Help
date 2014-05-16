<?php 

require_once("../../includes/initialize.php");


$templates = Template::get_all_templates();
?>

<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="google" content="notranslate">
<meta http-equiv="Content-Language" content="en">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
<title>Choose a Template</title>
<link href="../stylesheets/plum_help.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" media="only screen and (min-width: 641px) and (max-width: 1366px)" href="../stylesheets/lowres.css">
</head>

<body>
<div id="container">

<header class="bottomShadow">
	<div id="headerImage"><a href="www.plumdm.com"><img src="../site_images/plum_logo_name.png" height="100px"></a></div>
</header>

<section id="mainButtonsBackgroundContainer">
    <div id="mainButtonsContainer">
            <div class="allShadow" id="emailButton">Email</div>
            <div class="allShadow" id="landingPageButton">Landing Pages</div>
    </div>
</section>

<section id="allTemplatesContainer">

<?php foreach($templates as $template): ?>
		
		<div class="full_template_container">
        
        <div class="browser_bar">
        	<div class="dot1"></div>
            <div class="dot1"></div>
            <div class="dot1"></div>
        </div> 
        
        <div class="templateAllShadow show_template"><a href="<?php echo $template->website_url; ?>"><img height="263" src="<?php echo $template->url_path; ?>"></a></div>
        
        <!--<div class="template_website_url"><h3><?php echo $template->website_url; ?></h3></div>-->
        
        </div>
        
<?php endforeach; ?>
</section>



</div>
</body>
</html>
