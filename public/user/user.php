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
<link rel="stylesheet" href="../stylesheets/jquery.mCustomScrollbar.css" />
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


<div class="bottomShadow" id="userNameContainer">
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
		<div class=" each_user_p_lp">
        
        
        
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
        </div>
        
        
        
        
        
        
        
        
        
        
        
        
        
        
		<?php
		echo $plum_lp->start_date;
		echo $plum_lp->expire_date;
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
<script type="text/javascript" src="../javascripts/jquery.mCustomScrollbar.concat.min.js"></script>
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


</script>

<script type="text/javascript" src="../javascripts/plumdm_help.js"></script>
<!--<script src="../javascripts/classie.js"></script>
<script src="../javascripts/modalEffects.js"></script>-->
</body>
</html>
