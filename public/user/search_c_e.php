<?php 

require_once("../../includes/initialize.php"); 


$current_user = SalesRep::find_by_id(1);


if(isset($_POST['search_input_c_e'])){
	$search_in = trim($_POST['search_input_c_e']);
	$client_emails = ClientEmail::search_c_e($current_user->id,$search_in);
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
$( "#c_e_overlay" ).click(function() {
  
  	document.getElementById("c_e_form").reset();
  
});

</script>

<script src="../javascripts/modalEffects.js"></script>


<div id="search_results_c_e">
<?php foreach($client_emails as $client_email):?>			<!--Start CLIENT EMAIL CONTENT --> 
	<div class=" allShadow1 each_user_p_lp">
        
        
        <div class="p_lp_top_container">
        	<!--<img alt="Client" class=" allShadow userImage" height="30" src="../site_images/user.png">-->
        	<h1 class="p_lp_client_name"><?php echo $client_email->client_name;?></h1>

            
            <div class="p_lp_leads_container">
            	<span class="pound">
                #
                </span>
                <div class="leadsCircle">
				<span class="inside_leads_circle_text">
					<?php echo $client_email->leads;?>
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
        		<h4 class="horizontal_scroll p_lp_url"><a href="<?php echo $client_email->website_url; ?>" target="_blank"><?php echo $client_email->website_url."&nbsp; &nbsp;"; ?></a></h4>
            </div>
            <div class="p_lp_email_container">
            	<img alt="email" class=" allShadow m_c_i" height="30" src="../site_images/email.png">
                <span>EMAIL :</span>
				<h4 class="horizontal_scroll p_lp_email"><?php echo $client_email->email_list; ?></h4>
            </div>
            <div class="p_lp_notes_container">
            	<img alt="notes" class="allShadow m_c_i" height="30" src="../site_images/notes.png">
            	<span>NOTES :</span>
				<h4 class="content light mCustomScrollbar p_lp_notes"><?php echo $client_email->notes; ?></h4>
            </div>
          </div>
          
          <div class="p_lp_middle_second_container">
                <div class="page_complete_container" style="margin-top:80px;">
                	<h5 style="">PAGE COMPLETE :</h5>
                	<h4 style="margin-right:10px;" class="<?php if($client_email->page_complete == 0){ echo "red"; } else{ echo "green"; } ?>">
						<?php if($client_email->page_complete == 0){ echo "NO"; } else{ echo "YES"; } ?></h4>
                </div>
          </div>
        </div>
        
        
        <div class="p_lp_bottom_container">
        		<div class="start_date_container">
                	<h4>Send Date :</h4>
          			<h5><?php echo $client_email->send_date; ?></h5>
                </div>
                <a title="Edit" class="md-trigger" data-modal="c_e_modal"><button class="editButton transition1" language="javascript"  onclick="return c_e(this);" style="border-style:none; outline:0; border:0; background:none;" value="
				
				<?php echo $client_email->client_name."***".$client_email->leads."***".$client_email->website_url."***".$client_email->email_list."***".$client_email->notes."***".$client_email->page_complete."***".$client_email->send_date."***".$client_email->id; ?>
                
                "><img alt="Edit" class="allShadow transition1 edit_template_info" height="30" src="../site_images/edit.png"></button></a>
                
                <a href="user.php?c_e_id=<?php echo $client_email->id ; ?>&current_user_id=<?php echo $current_user->id; ?>" title="Hide"><img alt="Hide" class="allShadow transition1 hide_template_info" height="30" src="../site_images/hide.png"></a>
                
				<?php if(!empty($client_email->attachment_url)): ?>
         <a href="user.php?attachment_url=<?php echo $client_email->attachment_url; ?>" title="Attachment"><img alt="Attachment" class="allShadow transition1 download_attachment_img" height="30" src="../site_images/download.png"></a>
         <?php endif ?>
        </div>
        
        
        <div style="float:right; position:absolute; top:115px; right:-280px; border: 5px solid #f7f7f7;" class="full_template_container">
          <div class="browser_bar">		<!-- BROWSER BAR-->
              <div class="dot1"></div>
              <div class="dot1"></div>
              <div class="dot1"></div>
          </div> 
          <div  class="templateAllShadow show_template template_info_image"><a href="<?php echo $client_email->website_url; ?>" target="_blank">		<!-- Template Image -->
          <img style="margin:0 auto;" class="templateImage" src="<?php echo $client_email->url_path; ?>" height="150"></a>
          </div>
       </div>
        
        
	</div>
	<?php endforeach; ?>

</div>