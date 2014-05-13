<?php 

require_once("initialize.php");


$admin1 = new Admin();
		
	$admin1->name = "ADMIN1";
	$admin1->id = 1;
	$admin1->email = "admin1@kgr.ac.in";
	$admin1->password = "adminofcollegeKGRCET";
	$admin1->isAdmin = 1;
	$admin1->isActive = 1;
	
	$created_admin1 = $admin1->create_admin();
	


$admin2 = new Admin();
		
	$admin2->name = "ADMIN2";
	$admin2->id = 2;
	$admin2->email = "admin2@kgr.ac.in";
	$admin2->password = "adminofcollegeKGRCET";
	$admin2->isAdmin = 1;
	$admin2->isActive = 1;
	
	$created_admin2 = $admin2->create_admin();


?>