<?php 

require_once("../../includes/initialize.php"); 


$current_user = SalesRep::find_by_id(1);


if(isset($_POST['search_input_c_lp'])){
	$search_in = trim($_POST['search_input_c_lp']);
	$client_lps = ClientLP::search_c_lp($search_in, $current_user->id);
}

?>


<script type="text/javascript">

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

//Form Reset Funcationality
$( "#c_lp_overlay" ).click(function() {
  
  	document.getElementById("c_lp_form").reset();
  
});

</script>

<script src="../javascripts/modalEffects.js"></script>


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
				<?php echo $client_lp->client_name."***".$client_lp->email."***".$client_lp->city."***".$client_lp->state."***".$client_lp->zip_code."***".$client_lp->google_ad."***".$client_lp->google_ad_setup."***".$client_lp->website_url."***".$client_lp->start_date."***".$client_lp->expire_date."***".$client_lp->notes."***".$client_lp->page_complete."***".$client_lp->renewing_page."***".$client_lp->leads."***".$client_lp->id."***".$client_lp->salesrep_id; ?>
                "><img alt="Edit" class="allShadow transition1 edit_template_info" height="30" src="../site_images/edit.png"></button></a>
                
                <a href="user.php?c_lp_id=<?php echo $client_lp->id ; ?>&current_user_id=<?php echo $client_lp->salesrep_id; ?>&c_lp_hide=<?php if($client_lp->hidden == 1){echo 0;}else if($client_lp->hidden == 0){echo 1;} ?>" title="Hide"  id="c_lp_hide"><img alt="Hide" class="allShadow transition1 hide_template_info" height="30" src="../site_images/hide.png"></a>
                
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