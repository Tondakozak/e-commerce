<?php
//require
require "common.php";
if (isset($_POST["email"])) {
	//connect to database
	$collection = (new MongoDB\Client)->ecomerce->users;

	//Convert to PHP array
	$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
	$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

	$dataArray = [ 
	   "email" => strtolower(trim($email)),
	   "password" => trim($password),
	   ];

	$error = false;
	if (empty($dataArray["email"])) {
		$error = true;
		$_SESSION["message"]["error"][] = "Email Required";
	}
	
	 if (empty($dataArray["password"])) {
		$error = true;
		$_SESSION["message"]["error"][] = "Password Required";
	}
	  	
	if (!$error) {
		$document = $collection->findOne(['email' => $dataArray['email']]);
		if ($document == null) {
			$_SESSION["message"]["error"][] = "Email Doesn't Exist";
		
		}
		else{
			echo $document ['password'];
			
			
			
		}
	
	}

}





generate_header("login");



include'src/view/login_form.php';
login_form("login");
generate_footer();

