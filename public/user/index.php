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
<meta name="viewport" content="width=2000">
<title>Choose a Template</title>
<link href="../stylesheets/plum_help.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="container">
<div id="2container">

<h1 style=" font-size:16px;">Hi Surya Kiran Juthuka</h1>

<?php foreach($templates as $template): ?>
		
		<div class="full_template_container">
        
        <div class="browser_bar"></div> 
        
        <div class="show_template"><a href="<?php echo $template->website_url; ?>"><img height="263" src="<?php echo $template->url_path; ?>"></a></div>
        
        <div class="template_website_url"><h3><?php echo $template->website_url; ?></h3></div>
        
        </div>
        
<?php endforeach; ?>

</div>

</div>


</body>
</html>
