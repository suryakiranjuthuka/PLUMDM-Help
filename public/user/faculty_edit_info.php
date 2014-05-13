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

$faculty_main = Faculty::find_by_id($session->user_id);

if(isset($_POST['update'])){
	if($_POST['first_name']){	
	$faculty_main->first_name = trim($_POST['first_name']);}
	if($_POST['last_name']){
	$faculty_main->last_name = trim($_POST['last_name']);}
	if($_POST['qualification']){
	$faculty_main->qualification = trim($_POST['qualification']);}
	if($_POST['designation']){
	$faculty_main->designation = trim($_POST['designation']);}
	if($_POST['department']){
	$faculty_main->department = trim($_POST['department']);}
	if($_POST['email']){
	$faculty_main->email = trim($_POST['email']);}
	if($_POST['password']){
	$faculty_main->password = trim($_POST['password']);}
	if($_POST['mobile']){
	$faculty_main->mobile = trim($_POST['mobile']);}
	
	$updated = $faculty_main->update_faculty();
	if($updated){
		$session->message("Successfully Updated Faculty Information.");
		redirect_to("faculty_index.php");
	} else{
		$message1 = "Failed to Update...!!";
		//redirect_to("faculty_register.php");
	}
}

 //Below is related to upload user profile picture....!
 
 // In an application, this could be moved to a config file
$upload_errors = array(
	// http://www.php.net/manual/en/features.file-upload.errors.php
	UPLOAD_ERR_OK 				=> "No errors.",
	UPLOAD_ERR_INI_SIZE  	=> "Larger than upload_max_filesize.",
  UPLOAD_ERR_FORM_SIZE 	=> "Larger than form MAX_FILE_SIZE.",
  UPLOAD_ERR_PARTIAL 		=> "Partial upload.",
  UPLOAD_ERR_NO_FILE 		=> "No file.",
  UPLOAD_ERR_NO_TMP_DIR => "No temporary directory.",
  UPLOAD_ERR_CANT_WRITE => "Can't write to disk.",
  UPLOAD_ERR_EXTENSION 	=> "File upload stopped by extension."
);
 
 if(isset($_POST['upload'])) {
	// process the form data
	$tmp_file = $_FILES['file_upload']['tmp_name'];
	$file_type = $_FILES['file_upload']['type'];
	$if_image = substr($file_type, 0 , 5);
	$replaced_file_type = str_replace('image/', '', $file_type);
	$target_file = $faculty_main->id. "_" . $faculty_main->first_name. "." . $replaced_file_type;
	$upload_dir = "images";
  
	// You will probably want to first use file_exists() to make sure
	// there isn't already a file by the same name.
	
	// move_uploaded_file will return false if $tmp_file is not a valid upload file 
	// or if it cannot be moved for any other reason
	if($if_image == "image"){
	if(move_uploaded_file($tmp_file, "../".$upload_dir."/".$target_file)) {
		$message7 = "File uploaded successfully.";
	} else {
		$error = $_FILES['file_upload']['error'];
		$message7 = $upload_errors[$error];
	}
	}else{
		$message7 = "Invalid Image Format";
		}
		
	$profile_pic_url = "../".$upload_dir."/".$target_file;
	Faculty::insert_profile_pic_url($profile_pic_url, $faculty_main->id);
}
 
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
<script language="JavaScript">
function testing(val,x){
maxlen = x;
if(val.length > maxlen){
alert('Limit of characters is '+ maxlen);
document.chars.tests.value = val.substring(0,maxlen);

}
}

function Minimum(obj,min){
 if (obj.value.length<min) alert('Min No.of Characters: '+min);
}
</script>
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

<div id="centerBody" class="unwantedHeight">
<section id="facultyEditInfo">
		<h1>Update My Information:<div class="updateFacultyAccountIcon">
           <img src="../site_images/update_icon.png" width="30" height="30" title="update">
        </div>
        </h1>
        
 
        
        
        <?php if(!empty($message7)) { echo "<p>{$message7}</p>"; } ?>
        
        <div id="facultyUploadPicture">
		<form action="faculty_edit_info.php" enctype="multipart/form-data" method="POST">
			<span>Upload Profile Picture:</span>
            <br/>
		  <input type="hidden" name="MAX_FILE_SIZE" value="2000000" />
          <input type="file" name="file_upload" />
		 <input type="submit" name="upload" value="Upload" />
		</form>
        </div>
        <br/>
        
        
      <form class="facultyEditInfoForm" action="faculty_edit_info.php" method="post">
		  <table>
		    <tr>
		      <span class="formFieldsPosition">First Name:</span>
              	<input class="inputFormField" type="text" name="first_name" title="5 Charecters Minimun" required maxlength="30" value="<?php echo $faculty_main->first_name ?>" />
		    </tr>
            <br/>
            <tr>
		      <span class="formFieldsPosition">Last Name:</span>
		        <input class="inputFormField" type="text" name="last_name" title="5 Charecters Minimun" required maxlength="30" value="<?php echo $faculty_main->last_name ?>" />
		    </tr>
            <br/>
		    <tr>
		      <span class="formFieldsPosition">Qualification:</span>
		        <input class="inputFormField" type="text" name="qualification" title="5 Charecters Minimun" required maxlength="30" value="<?php echo $faculty_main->qualification ?>" />
		    </tr>
            <br/>
            <tr>
		      <span class="formFieldsPosition">Designation:</span>
		        <input class="inputFormField" type="text" name="designation" title="5 Charecters Minimun" required maxlength="30" value="<?php echo $faculty_main->designation ?>" />
		    </tr>
            <br/>
            <tr>
		      <span class="formFieldsPosition">Department:</span>
		        <select class="selectFormField" name="department">
                <?php echo '<option value="'. $faculty_main->department .'">'.$faculty_main->department.'</option>'  ?>
		          <option value="cse" <?php if (!(strcmp("cse", ""))) {echo "SELECTED";} ?>>cse</option>
		          <option value="ece" <?php if (!(strcmp("ece", ""))) {echo "SELECTED";} ?>>ece</option>
		          <option value="eee" <?php if (!(strcmp("eee", ""))) {echo "SELECTED";} ?>>eee</option>
		          <option value="mech" <?php if (!(strcmp("mech", ""))) {echo "SELECTED";} ?>>mech</option>
		          <option value="civil" <?php if (!(strcmp("civil", ""))) {echo "SELECTED";} ?>>civil</option>
	          </select>
             </tr>
             <br/>
            <tr>
		      <span class="formFieldsPosition">Email ID:</span>
              <input class="inputFormField" type="email" name="email" title="7 Charecters Minimun" required maxlength="30" value="<?php echo $faculty_main->email ?>" />
		    </tr>
            <br/>
            <tr>
		      <span class="formFieldsPosition">Password:</span>
		        <input  class="inputFormField" type="password" name="password" onBlur="Minimum(this,8);" title="8 Charecters Minimun" required maxlength="30" value="<?php echo $faculty_main->password ?>" />
		    </tr>
		    <br/>
            <tr>
		      <span class="formFieldsPosition">Mobile No:</span>
              <input class="inputFormField" type="number" name="mobile" min="10"  maxlength="30" value="<?php echo $faculty_main->mobile ?>" />
		    </tr>
            <br/>
		    <tr>
		      <td colspan="2"><input class="button" type="submit" name="update" value="Update" /></td>
		    </tr>
		  </table>
		</form>
        <?php 
		if(isset($message1)){echo out_message($message1);} ?>
   </section>
</div>
   
   
   
<footer class="extendFullFooter" id="mainFooter">
	<p>Copyright © 2013 KG Reddy College of Engineering & Technology.</p>
</footer>

</body>
</html>
<?php if(isset($database)) { $database->close_connection(); } ?>