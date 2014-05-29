<?php 

require_once("../../includes/initialize.php");


$current_user = SalesRep::find_by_id(1);

$plum_emails = PlumEmail::find_all_user_p_e($current_user->id);

$client_emails = ClientEmail::find_all_user_c_e($current_user->id);

$plum_lps = PlumLP::find_all_user_p_lp($current_user->id);

$client_lps = ClientLP::find_all_user_c_lp($current_user->id);



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
<!--<link href="../stylesheets/plum_help.css" rel="stylesheet" type="text/css" media="screen,projection">
<link rel="stylesheet" type="text/css" href="../stylesheets/component.css" />-->
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


<div id="userNameContainer">
<h1><?php echo $current_user->first_name; ?></h1>
</div>


<section id="allUserInfoTemplatesContainer">



<!--<section id="user_p_e">
	<?php 
	
	/*foreach($plum_emails as $plum_email){
		echo $plum_email->client_name."</br>";
		echo $plum_email->website_url."</br>";
		echo $plum_email->send_date."</br>";
		echo $plum_email->email_list."</br>";
		echo $plum_email->notes."</br>";
		echo $plum_email->leads."</br>";
		echo $plum_email->page_complete."</br><hr></hr>";		
	}*/
	
	?>
</section>


</br><hr></hr>

<section id="user_c_e">
	
</section>

</br><hr></hr>-->

<section id="user_p_lp">
	<?php 
	
	foreach($plum_lps as $plum_lp):?>
		<div class="allShadow each_user_p_lp">
		<?php
        echo $plum_lp->client_name."</br>";	
		echo $plum_lp->city."</br>";
		echo $plum_lp->state."</br>";
		echo $plum_lp->zip_code."</br>";
		echo $plum_lp->leads."</br>";
		echo $plum_lp->website_url."</br>";
		echo $plum_lp->email."</br>";
		echo $plum_lp->notes."</br>";
		echo $plum_lp->start_date."</br>";
		echo $plum_lp->expire_date."</br>";
		echo $plum_lp->google_ad."</br>";
		echo $plum_lp->google_ad_setup."</br>";
		echo $plum_lp->page_complete."</br>";
		echo $plum_lp->renewing_page;	
		?>
	</div>
	<?php endforeach;
	
	?>
</section>


<!--</br><hr></hr>

<section id="user_c_lp">
	
</section>-->

</section> <!--***** END of User Info Templates Container ******-->









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
		
		$("#p_e_website_url")
		.attr("value",button_value);
}
</script>

<script type="text/javascript" src="../javascripts/plumdm_help.js"></script>
<!--<script src="../javascripts/classie.js"></script>
<script src="../javascripts/modalEffects.js"></script>-->
</body>
</html>
