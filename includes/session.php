<?php

// A class to help work with Sessions
// In our case, primarily to manage logging users in and out

// Keep in mind when working with sessions that it is generally 
// inadvisable to store DB-related objects in sessions 

class Session {
	
	private $logged_in = false;
	public $user_id;
	public $register_faculty = false;
	public $admin_page = false;
	public $faculty_page = false;
	public $student_page = false;
	public $verify_admin_page = false;
	public $verify_faculty_page = false;
	public $verify_student_page = false;
	public $message;
	
	public function __construct(){
		session_start();
		$this->check_message();
		$this->check_login();
		if($this->logged_in) {
		  // actions to take right away if user is logged in
		} else {
		  // actions to take right away if user is not logged in
		}
	}
	
	public function login($user){
		// database should find user based on username/password
		if($user){
			$this->user_id = $_SESSION['user_id'] = $user->id;
			$this->logged_in = true;
		}	
	}
	
	public function logout(){
		unset($_SESSION['user_id']);
		unset($this->user_id);
		$this->logged_in = false;
	}
	
	private function check_login() {
		if(isset($_SESSION['user_id'])){
			$this->user_id = $_SESSION['user_id'];
			$this->logged_in = true;
		} else {
				unset($this->user_id);
				$this->logged_in = false;
			}
	}
	
	public function is_logged_in(){
		return $this->logged_in;	
	}
	
	public function message($msg="") {
	  if(!empty($msg)) {
	    // then this is "set message"
	    // make sure you understand why $this->message=$msg wouldn't work
	    $_SESSION['message'] = $msg;
	  } else {
	    // then this is "get message"
			return $this->message;
	  }
	}
	
	private function check_message() {
		// Is there a message stored in the session?
		if(isset($_SESSION['message'])) {
			// Add it as an attribute and erase the stored version
      $this->message = $_SESSION['message'];
      unset($_SESSION['message']);
    } else {
      $this->message = "";
    }
	}
	
	public function register_faculty(){
		$_SESSION['register_faculty'] = true;	
	}
	
	public function verify_register_faculty(){
		$this->register_faculty = $_SESSION['register_faculty'];
		//unset($_SESSION['register_faculty']);
	}
	
	public function session_unsett_verify_register_faculty(){
		unset($_SESSION['register_faculty']);	
	}
	
	public function admin_page(){
			$_SESSION['admin_page'] = true;
			$_SESSION['faculty_page'] = false;
			$_SESSION['student_page'] = false;
	}
	
	public function faculty_page(){
			$_SESSION['admin_page'] = false;
			$_SESSION['faculty_page'] = true;
			$_SESSION['student_page'] = false;
	}
	
	public function student_page(){
			$_SESSION['admin_page'] = false;
			$_SESSION['faculty_page'] = false;
			$_SESSION['student_page'] = true;
	}
	
	public function found_user_page(){
		$this->admin_page = $_SESSION['admin_page'];
		$this->faculty_page = $_SESSION['faculty_page'];
		$this->student_page = $_SESSION['student_page'];
		unset($_SESSION['admin_page']);
		unset($_SESSION['faculty_page']);
		unset($_SESSION['student_page']);
	}
	
	public function verify_admin_page(){
			$_SESSION['verify_admin_page'] = true;
			$_SESSION['verify_faculty_page'] = false;
			$_SESSION['verify_student_page'] = false;
	}
	public function verify_faculty_page(){
			$_SESSION['verify_admin_page'] = false;
			$_SESSION['verify_faculty_page'] = true;
			$_SESSION['verify_student_page'] = false;
	}
	
	public function verify_student_page(){
			$_SESSION['verify_admin_page'] = false;
			$_SESSION['verify_faculty_page'] = false;
			$_SESSION['verify_student_page'] = true;
	}
	
	public function verify_found_user_page(){
		$this->verify_admin_page = $_SESSION['verify_admin_page'];
		$this->verify_faculty_page = $_SESSION['verify_faculty_page'];
		$this->verify_student_page = $_SESSION['verify_student_page'];
		
	}
	
	
	
	
}

$session = new Session();
$message = $session->message();

?>