<?php 

require_once("../../includes/initialize.php"); 


$current_user = SalesRep::find_by_id(1);


if(isset($_POST['search_input_p_e'])){
	$search_in = trim($_POST['search_input_p_e']);
	$plum_emails = PlumEmail::search_p_e($search_in, $current_user->id);
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
$( "#p_e_overlay" ).click(function() {
  
  	document.getElementById("p_e_form").reset();
  
});

</script>

<script src="../javascripts/modalEffects.js"></script>


<div id="search_results_p_e">
<?php foreach($plum_emails as $plum_email):?>			<!--Start PLUM EMAIL CONTENT --> 
	<div class=" allShadow1 each_user_p_lp">
        
        
        <div class="p_lp_top_container">
        	<!--<img alt="Client" class=" allShadow userImage" height="30" src="../site_images/user.png">-->
        	<h1 class="p_lp_client_name"><?php echo $plum_email->client_name;?></h1>

            
            <div class="p_lp_leads_container">
            	<span class="pound">
                #
                </span>
                <div class="leadsCircle">
				<span class="inside_leads_circle_text">
					<?php echo $plum_email->leads;?>
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
        		<h4 class="horizontal_scroll p_lp_url"><a href="<?php echo $plum_email->website_url; ?>" target="_blank"><?php echo $plum_email->website_url."&nbsp; &nbsp;"; ?></a></h4>
            </div>
            <div class="p_lp_email_container">
            	<img alt="email" class=" allShadow m_c_i" height="30" src="../site_images/email.png">
                <span>EMAIL :</span>
				<h4 class="horizontal_scroll p_lp_email"><?php echo $plum_email->email_list; ?></h4>
            </div>
            <div class="p_lp_notes_container">
            	<img alt="notes" class="allShadow m_c_i" height="30" src="../site_images/notes.png">
            	<span>NOTES :</span>
				<h4 class="content light mCustomScrollbar p_lp_notes"><?php echo $plum_email->notes; ?></h4>
            </div>
          </div>
          
          <div class="p_lp_middle_second_container">
                <div class="page_complete_container" style="margin-top:80px;">
                	<h5 style="">PAGE COMPLETE :</h5>
                	<h4 style="margin-right:10px;" class="<?php if($plum_email->page_complete == 0){ echo "red"; } else{ echo "green"; } ?>">
						<?php if($plum_email->page_complete == 0){ echo "NO"; } else{ echo "YES"; } ?></h4>
                </div>
          </div>
        </div>
        
        
        <div class="p_lp_bottom_container">
        		<div class="start_date_container">
                	<h4>Send Date :</h4>
          			<h5><?php echo $plum_email->send_date; ?></h5>
                </div>
                <a title="Edit" class="md-trigger" data-modal="p_e_modal"><button class="editButton transition1" language="javascript"  onclick="return p_e(this);" style="border-style:none; outline:0; border:0; background:none;" value="
				<?php echo $plum_email->client_name."***".$plum_email->leads."***".$plum_email->website_url."***".$plum_email->email_list."***".$plum_email->notes."***".$plum_email->page_complete."***".$plum_email->send_date."***".$plum_email->id."***".$plum_email->salesrep_id; ?>
                "><img alt="Edit" class="allShadow transition1 edit_template_info" height="30" src="../site_images/edit.png"></button></a>
                
               <a href="user.php?p_e_id=<?php echo $plum_email->id ; ?>&current_user_id=<?php echo $plum_email->salesrep_id; ?>&p_e_hide=<?php if($plum_email->hidden == 1){echo 0;}else if($plum_email->hidden == 0){echo 1;} ?>" title="Hide"  id="p_e_hide"><img alt="Hide" class="allShadow transition1 hide_template_info" height="30" src="../site_images/hide.png"></a> 
                
				<?php if(!empty($plum_email->attachment_url)): ?>
         <a href="user.php?attachment_url=<?php echo $plum_email->attachment_url; ?>" title="Attachment"><img alt="Attachment" class="allShadow transition1 download_attachment_img" height="30" src="../site_images/download.png"></a>
         <?php endif ?>
        </div>
        
        
        <div style="float:right; position:absolute; top:115px; right:-280px; border: 5px solid #f7f7f7;" class="full_template_container">
          <div class="browser_bar">		<!-- BROWSER BAR-->
              <div class="dot1"></div>
              <div class="dot1"></div>
              <div class="dot1"></div>
          </div> 
          <div  class="templateAllShadow show_template template_info_image"><a href="<?php echo $plum_email->website_url; ?>" target="_blank">		<!-- Template Image -->
          <img style="margin:0 auto;" class="templateImage" src="<?php echo $plum_email->url_path; ?>" height="150"></a>
          </div>
       </div>
        
        
	</div>
	<?php endforeach; ?>
</div>