<?php 

require_once("../../includes/initialize.php");

if($session->is_logged_in()) {
  redirect_to("user.php");
}


if (isset($_POST['submit'])) { // Form has been submitted.

  $username = trim($_POST['username']);
  $password = trim($_POST['password']);
  
  // Check database to see if username/password exist.
	$found_user = SalesRep::authenticate($username, $password);
	
  if ($found_user) {
    $session->login($found_user);
    redirect_to("user.php");
  } else {
    // username/password combo was not found in the database
	$session->message("<span class='bold'>Username/Password</span> <span class='boldCreamColor'> combination incorrect!</span>");
	redirect_to("login.php");
  }
  
}
?>


<html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="Content-Language" content="en">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
<title>PLUMDM: Login</title>
<link href="../stylesheets/login.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="../stylesheets/component_user.css" />
<script type="text/javascript" src="../javascripts/jquery-2.0.2.min.js"></script>

<script type="text/javascript">
$(document).ready(function() {
	$("#userName").focus(function() {
		$("#userIcon").css("left","-80px").css("border","1px solid white");
		$(this).css("padding-left",30+"px");
		
	});
	$(".userName").blur(function() {
		$("#userIcon").css("left",25+"px").css("border","0px solid white");
		$(this).css("padding-left",85+"px");
	});
	
	$(".password").focus(function() {
		$("#passwordIcon").css("left","-80px").css("border","1px solid white");
		$(this).css("padding-left",30+"px");
	});
	$(".password").blur(function() {
		$("#passwordIcon").css("left",25+"px").css("border","0px solid white");
		$(this).css("padding-left",85+"px");
	});
});

//**************************************************************Error Message Modal Popup Function
$(document).ready(function() {
        // trigger the click event
        $('#error_message_div_id').click();
});
</script>
  </head>
  
  <body>


	<div id="plumLogo"><img height="163" src="../site_images/login_logo.png"></div>


	<div id="loginForm">
	<!--LOGIN FORM-->
		<form name="login-form" class="login-form" action="login.php" method="post">
        
          <!--CONTENT-->
    <div id="userPass">
    <img id="userIcon" src="../site_images/login_user.png">
	<!--USERNAME--><input id="userName" name="username" type="text" class="input username" placeholder="EMAIL" required /><!--END USERNAME-->
    <img id="passwordIcon" src="../site_images/login_password.png">
    <!--PASSWORD--><input id="password" name="password" type="password" class="input password" placeholder="PASSWORD" required /><!--END PASSWORD-->
    </div>
    <!--END CONTENT-->
    
   <!--FOOTER-->
    <div class="logIn">
    <!--LOGIN BUTTON-->
    	<input id="login" type="submit" name="submit" value="Login" class="button" />
    	<label id="forLogin" for="login">LOGIN</label>
    <!--END LOGIN BUTTON-->
    </div>
    <!--END FOOTER-->
    </form>
    <!--END LOGIN FORM-->
    </div>
    
    
    <!--***************************************** Error Message after submitting form *******************************************-->
<?php if($session->message): ?>
<div class="md-trigger" data-modal="error_message_modal" id="error_message_div_id"></div>
<?php endif; ?>

<div class="md-modal md-effect-1" id="error_message_modal">
		<div style="padding:0;" id="error_message_modal_content" class="md-content"></br>
        <div id="error_check_message"><?php echo $session->message; ?></div>
        <div id="error_message_modal_close" class="md-close"><a title="close"><img class="transition1" src="../site_images/close.png" height="30"></a></div>
        </div>
</div>

<div class="md-overlay"></div><!-- the overlay element -->


<script src="../javascripts/classie.js"></script>
<script src="../javascripts/modalEffects.js"></script>
</body>
</html>