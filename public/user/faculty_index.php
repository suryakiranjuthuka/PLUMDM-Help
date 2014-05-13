<?php 

require_once("../../includes/initialize.php");


if(!$session->is_logged_in()){ 
  redirect_to("login.php");
}else{
	$session->faculty_page();
	  
	$session->verify_found_user_page();
	
	$test_faculty = true;
	
	if($session->verify_admin_page){
		if($session->verify_admin_page && $test_admin){
		
		}else{
		redirect_to("admin_index.php");
		}
	}else if($session->verify_faculty_page){
			  if($session->verify_faculty_page && $test_faculty){
	  
			  }else{
			  redirect_to("faculty_index.php");
			  }
	}else if($session->verify_student_page){
			  if($session->verify_student_page && $test_student){
	  
			  }else{
			  redirect_to("student_index.php");
			  }	
	}
	  
 }

 if(isset($_GET['logout'])){
  $session->logout(); 
  redirect_to("login.php");
 }
 
 if(isset($_GET['dep'])){
		   		redirect_to("faculty_index.php");
		   }
 
 if(isset($_GET['url'])){
 $file = $_GET['url'];
			
			if (file_exists($file)) {
				header('Content-Description: File Transfer');
				header('Content-Type: application/octet-stream');
				header('Content-Disposition: attachment; filename='.$file);
				header('Content-Transfer-Encoding: binary');
				header('Expires: 0');
				header('Cache-Control: must-revalidate');
				header('Pragma: public');
				header('Content-Length: ' . filesize($file));
				ob_clean();
				flush();
				readfile($file);
				exit;
			}
 }
 
 $upload_errors = array(
	UPLOAD_ERR_OK 				=> "No errors.",
	UPLOAD_ERR_INI_SIZE  	=> "Larger than upload_max_filesize.",
  UPLOAD_ERR_FORM_SIZE 	=> "Larger than form MAX_FILE_SIZE.",
  UPLOAD_ERR_PARTIAL 		=> "Partial upload.",
  UPLOAD_ERR_NO_FILE 		=> "No file.",
  UPLOAD_ERR_NO_TMP_DIR => "No temporary directory.",
  UPLOAD_ERR_CANT_WRITE => "Can't write to disk.",
  UPLOAD_ERR_EXTENSION 	=> "File upload stopped by extension."
);

$faculty_main = Faculty::find_by_id($session->user_id);

if(isset($_POST['create_message'])){
	 
	 $message = new Message();
	
	$message->faculty_id = $faculty_main->id;
	$message->created_at = getIST();
	$message->body = trim($_POST['body']);
	$message->isActive = 1;
	//$message->spam = 0;
	$message->document_url = "";
	$message->branch = trim($_POST['branch']);
	$message->branch_year = trim($_POST['branch_year']);
	$message->sub_branch = trim($_POST['sub_branch']);
	//$message->year = trim($_POST['year']);
	$message->type = trim($_POST['type']);
	$message->display = "";
	
	$inserted = $message->insert_new_message();
	
	if(!empty($_FILES['file_upload']['tmp_name'])){
	$tmp_file = $_FILES['file_upload']['tmp_name'];
	$original_file = basename($_FILES['file_upload']['name']);
	$replaced_space = str_replace(' ','_',$original_file);
	$target_file = $faculty_main->id. "_" .$replaced_space;
	$upload_dir = "attachments";
	
	move_uploaded_file($tmp_file, "../".$upload_dir."/".$target_file);
	$profile_pic_url = "../".$upload_dir."/".$target_file;
	Message::insert_attachment_url($profile_pic_url, $message->id);
	}
	
	if($inserted){
		
		$session->message("Your Post Has Been Successfully Created");
		redirect_to("faculty_index.php");
	} else{
		$message1 = "Falied To Create The Post";
	}
	
 }
 
 if(isset($_POST['post_all'])){
	$message = new Message();
	
	$message->faculty_id = $faculty_main->id;
	$message->created_at = strftime("%Y-%m-%d %H:%M:%S", time());
	$message->body = trim($_POST['body']);
	$message->isActive = 1;
	//$message->spam = 0;
	$message->document_url = "";
	$message->branch = trim($_POST['branch']);
	$message->branch_year = "";
	$message->sub_branch = "";
	//$message->year = trim($_POST['year']);
	$message->type = trim($_POST['type']);
	$message->display = "";
	
	$inserted = $message->insert_new_message();
	
	$tmp_file = $_FILES['file_upload_all']['tmp_name'];
	$original_file = basename($_FILES['file_upload_all']['name']);
	$replaced_space = str_replace(' ','_',$original_file);
	$target_file = $faculty_main->id. "_" .$replaced_space;
	$upload_dir = "attachments";
	
	
	move_uploaded_file($tmp_file, "../".$upload_dir."/".$target_file);
	
	$profile_pic_url = "../".$upload_dir."/".$target_file;
	Message::insert_attachment_url($profile_pic_url, $message->id);
	
	if($inserted){
		
		$session->message("Your Post Has Been Successfully Created...!");
		redirect_to("faculty_index.php");
	} else{
		$message1 = "Falied To Create The Post...!";
	}	 
 }
 

 $tasks_array = Message::find_type($faculty_main->department, "tasks");
 $news_array = Message::find_type($faculty_main->department, "news");
 $events_array = Message::find_type($faculty_main->department, "events");
 
 //For Total Branch
 $concatinating = $faculty_main->department;
 $concatinated = "total-" . $concatinating;
 $type_array_tb = Message::find_type_tb($concatinated);
 
 //For All Branches
 $type_array_ab = Message::find_type_ab();

?>



<!doctype html>
<!--[if lt IE 7]> <html class="ie6 oldie"> <![endif]-->
<!--[if IE 7]>    <html class="ie7 oldie"> <![endif]-->
<!--[if IE 8]>    <html class="ie8 oldie"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="">
<!--<![endif]-->
<head>
<meta charset="utf-8">
<title>KG Reddy College: Faculty</title>
<link href="../stylesheets/mainproject.css" rel="stylesheet" type="text/css">
<!--[if lt IE 9]>
<script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
</head>
<body>
<header class="extendFullHeader" id="mainHeader">
	<div class="facultyHeader"><a id="headerPicture" href="../home_page/index.php"></a></div>
      <h1 class="textIndentHidden">KG REDDY COLLEGE: Faculty</h1>
    
    <div id="facultyAccountIcons">
    <div id="homePageIcon" class="sprites">
    <a class="oneImage" href="faculty_index.php"> <img src="../site_images/home_page_black.png" width="30" height="30" title="Home Page" alt="Home_Page_Icon"> </a>
    <a class="twoImage" href="faculty_index.php"> <img src="../site_images/home_page_white.png" width="30" height="30" title="Home Page" alt="Home_Page_Icon"> </a></div>
    
    <div id="facultyOwnPosts" class="sprites">
    <a class="oneImage" href="faculty_own_type.php"> <img src="../site_images/user_page_black.png" width="30" height="30" title="Faculty Posts Page" alt="Faculty_updated_page_Icon"> </a>
    <a class="twoImage" href="faculty_own_type.php"> <img src="../site_images/user_page_white.png" width="30" height="30" title="Faculty Posts Page" alt="Faculty_updated_page_Icon"> </a></div>
    
    <div id="logout" class="sprites">
    <a class="oneImage" href="faculty_index.php?logout=true"><img src="../site_images/logout_black.png" width="30" height="30" title="LOGOUT" alt="Logout_icon"></a>
    <a class="twoImage" href="faculty_index.php?logout=true"><img src="../site_images/logout_white.png" width="30" height="30" title="LOGOUT" alt="Logout_icon"></a></div>
    </div>
</header>


<div id="centerBody">
<section id="coverPage" class="boxShadow">
		<div id="profilePicture" class="profilePicture boxShadow">
        <?php if(!empty($faculty_main->photo_url)): ?>
        <a href="faculty_edit_info.php"><img src="<?php echo $faculty_main->photo_url?>" width="120" height="120" title="Profile Picture" alt="Faculty Profile Picture"></a>
        <?php endif; ?>
        <?php if(empty($faculty_main->photo_url)): ?>
        <a href="faculty_edit_info.php"><img src="../images/default.png" width="120" height="120" title="Profile Picture" alt="Faculty Profile Picture"></a>
        <?php endif; ?>
        </div>
        <div id="coverPageInfo">
        <?php 
		echo "<h3>".ucwords($faculty_main->first_name) . " " . ucfirst($faculty_main->last_name) ."</h3>";
		echo "<h4>".ucwords($faculty_main->designation)." (".$faculty_main->department. ")</h4>";
		echo "<h5>". "Email Id: " . $faculty_main->email . "</h5>";
		echo "<h6>". "Mobile No: " . $faculty_main->mobile. "</h6>";
		?>
      <div id="editFacultyInfo"><a href="faculty_edit_info.php">(Edit)</a></div>
      </div>
</section>

<section id="post" class="boxShadow">
    <div id="update">
    <h1>update</h1>
    <div id="backgroundSprites">
    <div class="bigSprites">
    <a class="oneImage" href="faculty_index.php?name=post_to_all"> <img src="../site_images/all_branches_black.png" width="40" height="40" title="Post to All" alt="All Type Icon"> </a>
    <a class="twoImage" href="faculty_index.php?name=post_to_all"> <img src="../site_images/all_branches_white.png" width="40" height="40" title="Post to All" alt="All Type Icon"> </a>
    </div>
    <div class="bigSprites">
    <a class="oneImage" href="faculty_index.php?dep=post_to_dep"> <img src="../site_images/total_branch_black.png" width="40" height="40" title="Post To Department" alt="Dep Type Icon"> </a>
    <a class="twoImage" href="faculty_index.php?dep=post_to_dep"> <img src="../site_images/total_branch_white.png" width="40" height="40" title="Post To Department" alt="Dep Type Icon"> </a>
    </div>
    </div>
    </div>
    
    <div id="postForm">
	<?php if(!isset($_GET['name'])): ?>       
       <form action="faculty_index.php" class="postForm" enctype="multipart/form-data" method="post">
       <tr>
       <textarea name="body" class="inputFormField" cols="40" rows="4" required onfocus="this.placeholder=''" placeholder="Enter the message you want to POST..." ></textarea>
       </tr>
       <br/>
       <?php
	   $cse = $faculty_main->department;
	   if($cse == "cse"){   
       echo "<tr>";
       echo "<td>";
       echo '<select class="selectFormField" name="branch_year">';
         echo '<option value="cse 1st year" >cse 1st year</option>';
         echo '<option value="cse 2nd year" >cse 2nd year</option>';
         echo '<option value="cse 3rd year" >cse 3rd year</option>';
         echo '<option value="cse 4th year" >cse 4th year</option>';
       echo "</select>";
       echo "</td>";
       echo "</tr>";
	   
	   echo "<tr>";
       echo "<td>";
       echo '<select class="selectFormField" name="sub_branch">';
         echo '<option value="cse-a" >cse-a</option>';
         echo '<option value="cse-b" >cse-b</option>';
       echo "</select>";
       echo "</td>";
       echo "</tr>";
	   
	   echo '<input type="hidden" name="branch" value="cse"/>';   
	   }
	   
	   $ece = $faculty_main->department;
	   if($ece == "ece"){
       echo "<tr>";
       echo "<td>";
       echo '<select class="selectFormField" name="branch_year">';
         echo '<option value="ece 1st year" >ece 1st year</option>';
         echo '<option value="ece 2nd year" >ece 2nd year</option>';
         echo '<option value="ece 3rd year" >ece 3rd year</option>';
         echo '<option value="ece 4th year" >ece 4th year</option>';
       echo "</select>";
       echo "</td>";
       echo "</tr>";
	   
	   echo "<tr>";
       echo "<td>";
       echo '<select class="selectFormField" name="sub_branch">';
         echo '<option value="ece-a" >ece-a</option>';
         echo '<option value="ece-b" >ece-b</option>';
       echo "</select>";
       echo "</td>";
       echo "</tr>";
	   
	   echo '<input type="hidden" name="branch" value="ece"/>';  
	   }
	   
	   $eee = $faculty_main->department;
	   if($eee == "eee"){
       echo "<tr>";
       echo "<td>";
       echo '<select class="selectFormField" name="branch_year">';
         echo '<option value="eee 1st year" >eee 1st year</option>';
         echo '<option value="eee 2nd year" >eee 2nd year</option>';
         echo '<option value="eee 3rd year" >eee 3rd year</option>';
         echo '<option value="eee 4th year" >eee 4th year</option>';
       echo "</select>";
       echo "</td>";
       echo "</tr>";
	   
	   echo "<tr>";
       echo "<td>";
       echo '<select class="selectFormField" name="sub_branch">';
         echo '<option value="eee-a" >eee-a</option>';
         echo '<option value="eee-b" >eee-b</option>';
       echo "</select>";
       echo "</td>";
       echo "</tr>";
	   
	   echo '<input type="hidden" name="branch" value="eee"/>';  
	   }
	   
	   $mech = $faculty_main->department;
	   if($mech == "mech"){
       echo "<tr>";
       echo "<td>";
       echo '<select class="selectFormField" name="branch_year">';
         echo '<option value="mech 1st year" >mech 1st year</option>';
         echo '<option value="mech 2nd year" >mech 2nd year</option>';
         echo '<option value="mech 3rd year" >mech 3rd year</option>';
         echo '<option value="mech 4th year" >mech 4th year</option>';
       echo "</select>";
       echo "</td>";
       echo "</tr>";
	   
	   echo "<tr>";
       echo "<td>";
       echo '<select class="selectFormField" name="sub_branch">';
         echo '<option value="mech-a" >mech-a</option>';
         echo '<option value="mech-b" >mech-b</option>';
       echo "</select>";
       echo "</td>";
       echo "</tr>";
	   
	   echo '<input type="hidden" name="branch" value="mech"/>';  
	   }
	   
	   $civil = $faculty_main->department;
	   if($civil == "civil"){
       echo "<tr>";
       echo "<td>";
       echo '<select class="selectFormField" name="branch_year">';
         echo '<option value="civil 1st year" >civil 1st year</option>';
         echo '<option value="civil 2nd year" >civil 2nd year</option>';
         echo '<option value="civil 3rd year" >civil 3rd year</option>';
         echo '<option value="civil 4th year" >civil 4th year</option>';
       echo "</select>";
       echo "</td>";
       echo "</tr>";
	   
	   echo "<tr>";
       echo "<td>";
       echo '<select class="selectFormField" name="sub_branch">';
         echo '<option value="civil-a" >civil-a</option>';
         echo '<option value="civil-b" >civil-b</option>';
       echo "</select>";
       echo "</td>";
       echo "</tr>";
	   
	   echo '<input type="hidden" name="branch" value="civil"/>';  
	   }
	   ?>
       <tr>
       <td>
       <select class="selectFormField" name="type">
           <option value="tasks" <?php if (!(strcmp("tasks", ""))) {echo "SELECTED";} ?>>Tasks</option>
           <option value="news" <?php if (!(strcmp("news", ""))) {echo "SELECTED";} ?>>News</option>
           <option value="events" <?php if (!(strcmp("events", ""))) {echo "SELECTED";} ?>>Events</option>
         </select>
       </td>
       </tr>
       
        <br/>
        <div class="postAttach">
       <tr>
       <td>Attachment: </td>
       <td>
       <input type="hidden" name="MAX_FILE_SIZE" value="2000000" />
       <input type="file" name="file_upload" />
       </td>
       </tr>
       </div>
       <div id="formButton">
       <tr>
          <td colspan="2">
            <input class="formButton" type="submit" name="create_message" value="POST" />
          </td>
        </tr>
        </div>
       </form>
       <?php endif; ?>
       
       
      <?php if(isset($_GET['name'])): ?>
	   <form action="faculty_index.php" method="post">
       <tr>
       <textarea class="inputFormField" name="body" cols="40" rows="4" placeholder="Enter the message you want to POST..." required ></textarea>
       </tr>
       <br/>
       <?php $dep = $faculty_main->department; ?>
       <tr>
       <td>
       <select class="selectFormField" name="branch">
        <option value="<?php echo "total-" .$dep ?>" ><?php echo "Total " .$dep ?></option>
         <option value="all-branches" >All Branches</option>
       </select>
       </td>
       </tr>
       <tr>
       <td>
       <select class="selectFormField" name="type">
           <option value="tasks" <?php if (!(strcmp("tasks", ""))) {echo "SELECTED";} ?>>Tasks</option>
           <option value="news" <?php if (!(strcmp("news", ""))) {echo "SELECTED";} ?>>News</option>
           <option value="events" <?php if (!(strcmp("events", ""))) {echo "SELECTED";} ?>>Events</option>
         </select>
       </td>
       </tr>
       <br/>
       <div class="postAttach" >
       <tr>
       <td>
       <td>Attachment: </td>
       <input type="hidden" name="MAX_FILE_SIZE" value="2000000" />
       <input type="file" name="file_upload_all" />
       </td>
       </tr>
       </div>
       <div id="formButton">
       <tr>
          <td colspan="2">
            <input class="formButton" type="submit" name="post_all" value="POST" />
          </td>
        </tr>
        </div>
       </form>
	   <?php endif; ?>
       </div>
       
       <div id="myType">
       <h2> <a href="faculty_own_type.php">My Tasks</a></h2>
       <h2><a href="faculty_own_type.php">My News</a></h2>
       <h3><a href="faculty_own_type.php">My Events</a></h3>
       </div>
       <?php if(!empty($message)){
	   echo '<div class="outputMessage">'.output_message($message).'</div>';
	   }?>

       <?php if(isset($message1)){ 
	   echo '<div class="outputMessage">'.$message1.'</div>'; 
	   } ?>
</section>


<section id="tasksNewsEvents">
<div class="tasksBanner"></div>
<div class="newsBanner"></div>
<div class="eventsBanner"></div>

<article id="tasks" class="boxShadow">
   <div class="scrollPannel">
	<?php foreach($tasks_array as $task): ?>
		 <?php 
		 $faculty = Faculty::find_by_id($task->faculty_id);
		 if($faculty_main->id == $faculty->id){
			continue; }
		 if(!$task->isActive){
			continue; }?>  
    <div class="facultyTypePost">
    <div class="profileNameDesig">
      <div class="smallProfilePicture smallBoxShadow">
         <?php if(!empty($faculty->photo_url)): ?>
         <img src="<?php echo $faculty->photo_url?>" width="40" height="40" title="Profile Picture" alt="Faculty Profile Picture">
         <?php endif; ?>
         <?php if(empty($faculty->photo_url)): ?>
         <img src="../images/default.png" width="40" height="40" title="Profile Picture" alt="Faculty Profile Picture">
         <?php endif; ?>
      </div>
		 <h1><?php echo $faculty->first_name ?></h1>
         <span><?php echo "(" . $faculty->designation . ")"  ?></span>
    </div>
         <h2><?php echo "to: ".$task->branch_year . "(" . $task->sub_branch . ")";  ?></h2>
		 <h3><?php echo $task->body; ?></h3>
         <h4><?php echo "posted on: " . $task->created_at; ?>
		<div class="attachmentIcon"><?php if(!empty($task->document_url)): ?>
         <a href="faculty_index.php?url=<?php echo $task->document_url; ?>"> <img src="../site_images/attachment_icon.png" width="25" height="25" title="Download Attachemnt" alt="Attachment Icon"> </a>
         <?php endif; ?></div></h4>
     </div>
	<?php endforeach; ?> 
  </div>
</article>

<article id="news" class="boxShadow">
  <div class="scrollPannel">
	<?php foreach($news_array as $news): ?>
		 <?php  
		 $faculty = Faculty::find_by_id($news->faculty_id);
		 if($faculty_main->id == $faculty->id){
			continue; }
		 if(!$news->isActive){
			continue; } ?>
      <div class="facultyTypePost">
      <div class="profileNameDesig">
      <div class="smallProfilePicture smallBoxShadow">
         <?php if(!empty($faculty->photo_url)): ?>
         <img src="<?php echo $faculty->photo_url?>" width="40" height="40" title="Profile Picture" alt="Faculty Profile Picture">
         <?php endif; ?>
         <?php if(empty($faculty->photo_url)): ?>
         <img src="../images/default.png" width="40" height="40" title="Profile Picture" alt="Faculty Profile Picture">
         <?php endif; ?>
      </div>
		 <h1><?php echo $faculty->first_name ?></h1>
         <span><?php echo "(" . $faculty->designation . ")"  ?></span>
    </div>
         <h2><?php echo "to: ".$news->branch_year . "(" . $news->sub_branch . ")";  ?></h2>
		 <h3><?php echo $news->body; ?></h3>
         <h4><?php echo "posted on: " . $news->created_at; ?>
		<div class="attachmentIcon"><?php if(!empty($news->document_url)): ?>
         <a href="faculty_index.php?url=<?php echo $news->document_url; ?>"> <img src="../site_images/attachment_icon.png" width="25" height="25" title="Download Attachemnt" alt="Attachment Icon"> </a>
         <?php endif; ?></div></h4>
     </div>
	<?php endforeach; ?>
  </div>
</article>

<article id="events" class="boxShadow">
  <div class="scrollPannel">
	<?php foreach($events_array as $event): ?>
		 <?php 
		 $faculty = Faculty::find_by_id($event->faculty_id);
		 if($faculty_main->id == $faculty->id){
			continue; }
		 if(!$event->isActive){
			continue; } ?>
      <div class="facultyTypePost">
      <div class="profileNameDesig">
      <div class="smallProfilePicture smallBoxShadow">
         <?php if(!empty($faculty->photo_url)): ?>
         <img src="<?php echo $faculty->photo_url?>" width="40" height="40" title="Profile Picture" alt="Faculty Profile Picture">
         <?php endif; ?>
         <?php if(empty($faculty->photo_url)): ?>
         <img src="../images/default.png" width="40" height="40" title="Profile Picture" alt="Faculty Profile Picture">
         <?php endif; ?>
      </div>
		 <h1><?php echo $faculty->first_name ?></h1>
         <span><?php echo "(" . $faculty->designation . ")"  ?></span>
    </div>
         <h2><?php echo "to: ".$event->branch_year . "(" . $event->sub_branch . ")";  ?></h2>
		 <h3><?php echo $event->body; ?></h3>
         <h4><?php echo "posted on: " . $event->created_at; ?>
		<div class="attachmentIcon"><?php if(!empty($event->document_url)): ?>
         <a href="faculty_index.php?url=<?php echo $event->document_url; ?>"> <img src="../site_images/attachment_icon.png" width="25" height="25" title="Download Attachemnt" alt="Attachment Icon"> </a>
         <?php endif; ?></div></h4> 
     </div>
	<?php endforeach; ?>
  </div>
</article>
</section>


<section id="totalAllBranches">
<div class="totalBranchBanner"></div>
<div class="allBranchesBanner"></div>

<article id="totalBranch" class="boxShadow">
<div class="scrollPannelAll">
<?php foreach($type_array_tb as $type): ?>
		 <?php 
		 $faculty = Faculty::find_by_id($type->faculty_id);
		 if($faculty_main->id == $faculty->id){
			continue; }
		 if(!$task->isActive){
			continue; }?>  
    <div class="facultyTypePost">
    <div class="profileNameDesig">
      <div class="smallProfilePicture smallBoxShadow">
         <?php if(!empty($faculty->photo_url)): ?> 
         <img src="<?php echo $faculty->photo_url?>" width="40" height="40" title="Profile Picture" alt="Faculty Profile Picture">
         <?php endif; ?>
         <?php if(empty($faculty->photo_url)): ?>
         <img src="../images/default.png" width="40" height="40" title="Profile Picture" alt="Faculty Profile Picture">
         <?php endif; ?>
      </div>
		 <h1><?php echo $faculty->first_name ?></h1>
         <span><?php echo $faculty->designation ." (" .$faculty->department. ")"  ?></span>
    </div>
         <h2><?php echo "to: ".$type->branch;  ?></h2>
		 <h3><?php echo $type->body; ?></h3>
         <h4><?php echo "posted on: " . $type->created_at; ?>
		<div class="attachmentIcon"><?php if(!empty($type->document_url)): ?>
         <a href="faculty_index.php?url=<?php echo $type->document_url; ?>"> <img src="../site_images/attachment_icon.png" width="25" height="25" title="Download Attachemnt" alt="Attachment Icon"> </a>
         <?php endif; ?></div></h4>
     </div>
<?php endforeach; ?> 
</div>
</article>

<article id="allBranches" class="boxShadow">
<div class="scrollPannelAll">
<?php foreach($type_array_ab as $type): ?>
		 <?php 
		 $faculty = Faculty::find_by_id($type->faculty_id);
		 if($faculty_main->id == $faculty->id){
			continue; }
		 if(!$task->isActive){
			continue; }?>  
    <div class="facultyTypePost">
    <div class="profileNameDesig">
      <div class="smallProfilePicture smallBoxShadow">
         <?php if(!empty($faculty->photo_url)): ?>
         <img src="<?php echo $faculty->photo_url?>" width="40" height="40" title="Profile Picture" alt="Faculty Profile Picture">
         <?php endif; ?>
         <?php if(empty($faculty->photo_url)): ?>
         <img src="../images/default.png" width="40" height="40" title="Profile Picture" alt="Faculty Profile Picture">
         <?php endif; ?>
      </div>
		 <h1><?php echo $faculty->first_name ?></h1>
         <span><?php echo $faculty->designation ." (" .$faculty->department. ")"  ?></span>
    </div>
         <h2><?php echo "to: ".$type->branch;  ?></h2>
		 <h3><?php echo $type->body; ?></h3>
         <h4><?php echo "posted on: " . $type->created_at; ?>
		<div class="attachmentIcon"><?php if(!empty($type->document_url)): ?>
         <a href="faculty_index.php?url=<?php echo $type->document_url; ?>"> <img src="../site_images/attachment_icon.png" width="25" height="25" title="Download Attachemnt" alt="Attachment Icon"> </a>
         <?php endif; ?></div></h4>
     </div>
<?php endforeach; ?> 
</div>
</article>
</section>

</div>

<footer class="extendFullFooter" id="mainFooter">
	<p>Copyright © 2013 KG Reddy College of Engineering & Technology.</p>
</footer>

</body>
</html>